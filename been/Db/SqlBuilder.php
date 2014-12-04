<?php
/**
*  
*  Create On 2013-11-19 15:32:48
*  Author lidianbin
*  QQ: 281443751
*  Email: lidianbin@iwind-tech.com
**/

class SqlBuilder{

	protected $_sql = "";
	
	
	public function getSql(){
		return $this->_sql;
	}
	
	public function setSql($sql){
		$this->_sql = $sql;
		return $this;
	}
	
	/**
	 * SQL组装-组装SELECT语句
	 * @param $val array("table1"=>array("字段  [别名]","字段2"),"table2"=>array("colum1","colum2"),"table3"=>"*");
	 * @return SqlBuilder
	 */
	public function Select($val){
		$str = "SELECT ";
		if(!is_array($val) || empty($val)){
			return $this;
		}else{
			$colums = "";
			foreach($val as $k=>$v){
				$info = "";
				if( is_array($v) && !empty($v) ){
					$i=0;
					do{
						$arr = $this->str2arr($v[$i]);
						if( $i == 0 ){
							$info .= " {$k}.{$arr[0]} ";
							if(array_key_exists(1, $arr)){
								$info .= ' AS '. $arr[1];
							}
						}else{
							$info .= " , `{$k}`.`{$arr[0]}` ";
							if(array_key_exists(1, $arr)){
								$info .= ' AS '. $arr[1];
							}
						}
						$i++;
					}while ( $i < count($v));
				}else if(!empty($v)){
					$info .= " $k.$v ";
				}
				if($colums == ""){
					$colums .= $info;
				}else{
					$colums .= " , ".$info;
				}
			}
			
		}
		$this->_sql = $str.$colums;
		return $this;
	}
	
	/**
	 * 
	 * @param $val array("table [nickname]" [,"table1"] )
	 * @return SqlBuilder
	 */
	public function From($val){
		if(empty($val)){
			return $this;
		}
		if(is_array($val)){
			$tables = "";
			foreach($val as $v){
				$tables .= $tables ? " , ".$v." " : " ".$v." ";
			}
		}else{
			$tables = " ".$val." ";
		}
		$this->_sql .=" FROM " . $tables;
		return $this;
	
	}
	/**
	 * @param $val array("table 别名" => array("table colum" =>"table2 colum"),"table1"=>array( "table colum" =>"table2 colum" )));
	 * @return SqlBuilder
	 */
	public function Leftjoin($val){
		if(!is_array($val) || empty($val)){
			return $this;
		}
		$leftjoin = "";
		foreach ($val as $k => $v){
			$tableArr = $this->str2arr($k);
			list($key, $value) = each($v);
			
			$arrTmp1 = $this->str2arr($key);
			$arrTmp2 = $this->str2arr($value); 
			
			$table = $tableArr[0];
			if(array_key_exists(1, $tableArr)){
				$table .= ' AS '. $tableArr[1];
			}
			$leftjoin .= " LEFT JOIN ".$table." ON ".$arrTmp1[0].".".$arrTmp1[1]." = ".$arrTmp2[0].".".$arrTmp2[1]." ";
		}
		$this->_sql .= $leftjoin;
		return $this;
	}
	
	
	/**
	 * SQL组装-组装AND符号的WHERE语句
	 * @param array $val array('table key' => 'val')
	 * @return SqlBuilder
	 */
	public function Where($val) {
		if (!is_array($val) || empty($val)) return $this;
		$temp = array();
		foreach ($val as $k => $v) {
			$temp[] = $this->build_kv($k, $v);
		}
		$this->_sql .= ' WHERE ' . implode(' AND ', $temp);
		return $this;
	}
	
	/**
	 * 
	 * @param  $val array("table key desc"," table2 key2 asc")
	 * @return SqlBuilder
	 */
	public function Order($val){
		if (!is_array($val) || empty($val)) return $this;
		$order = "";
		foreach ($val as $v){
			$arrTmp = $this->str2arr($v);
			if($order){
				$order .= " , $arrTmp[0].$arrTmp[1] ".strtoupper( $arrTmp[2] )." ";
			}else{
				$order .= " $arrTmp[0].$arrTmp[1] ".strtoupper( $arrTmp[2] )." ";
			}
			
		}
		$this->_sql .= ' ORDER BY '.$order;
		return $this;
	}
	
	/**
	 * 
	 * @param unknown_type $start
	 * @param unknown_type $num
	 * @return SqlBuilder
	 */
	public function Limit($start,$num=NULL){
		$start = (int) $start;
		$start = ($start < 0) ? 0 : $start;
		if ($num === NULL) {
			$this->_sql .= ' LIMIT ' . $start;
		} else {
			$num = abs((int) $num);
			$this->_sql .= ' LIMIT ' . $start .' ,'. $num;
		}
		
		return $this;	
	}
	
	/**
	 * SQL组装-组装INSERT语句
	 * 返回：('key') VALUES ('value')
	 * 使用方法：$this->build_insert($val)
	 * @param  array $val 参数  array('key' => 'value')
	 * @return string
	 */
	public function Insert( $table, $val) {
		if (!is_array($val) || empty($val)) return '';
		$temp_v = '(' . $this->build_implode($val). ')';
		$val = array_keys($val);
		$temp_k = '(' . $this->build_implode($val, 1). ')';
		$this->_sql = " INSERT INTO ".$table." " . $temp_k . ' VALUES ' . $temp_v;
		return $this;
	}
	
	/**
	 * SQL组装-组装UPDATE语句
	 * @param  array $val  array('key' => 'value')
	 * @param $where array("[table] key"=>'value',"[table] key"=>'value')
	 * @return SqlBuilder
	 */
	public function Update($table,$val,$where) {
		if (!is_array($val) || empty($val)) return '';
		$temp = array();
		foreach ($val as $k => $v) {
			$temp[] = $this->build_kv($k, $v);
		}
		$this->_sql = "UPDATE ".$table." SET " . implode(',', $temp);
		$this->Where(($where));
		return $this;
	}
	
	/**
	 * 
	 * @param unknown_type $table
	 * @param $where array("[table] key"=>'value',"[table] key"=>'value')
	 * @return SqlBuilder
	 */
	public function Delete($table,$where){
		$this->_sql = "DELETE FROM ".$table." ";
		$this->Where($where);
		return $this;
	}
	
	/**
	 * SQL组装-组装KEY=VALUE形式
	 * 返回：a = 'a'
	 * DAO中使用方法：$this->dao->db->build_kv($k, $v)
	 * @param  string $k KEY值
	 * @param  string $v VALUE值
	 * @return string
	 */
	protected function build_kv($k, $v) {
		return $this->build_escape($k, 1) . ' = ' . $this->build_escape($v);
	}
	
	/**
	 * SQL组装-单个或数组参数过滤
	 * @param  string|array $val
	 * @param  int          $iskey 0-过滤value值，1-过滤字段
	 * @return string
	 */
	protected function build_escape($val, $iskey = 0) {
		if (is_array($val)) {
			foreach ($val as $k => $v) {
				$val[$k] = trim($this->build_escape_single($v, $iskey));
			}
			return $val;
		}
		return $this->build_escape_single($val, $iskey);
	}
	
	/**
	 * SQL组装-私有SQL过滤
	 *
	 * @param  string $val 过滤的值
	 * @param  int    $iskey 0-过滤value值，1-过滤字段
	 * @return string
	 */
	protected function build_escape_single($val, $iskey = 0) {
		if ($iskey === 0) {
			if (is_numeric($val)) {
				return " '" . $val . "' ";
			} else if( "NOW()" == strtoupper( trim($val) ) ) {
				return strtoupper( trim($val) );
			} else if( null === $val ){
				return "NULL";
			} else {
				return " '" . addslashes(stripslashes($val)) . "' ";
			}
		} else {
			$arr = $this->str2Arr($val);
			if(array_key_exists(1, $arr)){
				return " ".$arr[0]."."."".$arr[1]." ";
			}else{
				return " ".$arr[0]." ";
			}
				
		}
	}
	
	/**
	 * SQL组装-将数组值通过，隔开
	 * 返回：'1','2','3'
	 * DAO中使用方法：$this->dao->db->build_implode($val, $iskey = 0)
	 * @param  array $val   值
	 * @param  int   $iskey 0-过滤value值，1-过滤字段
	 * @return string
	 */
	protected function build_implode($val, $iskey = 0) {
		if (!is_array($val) || empty($val)) return '';
		return implode(',', $this->build_escape($val, $iskey));
	}
	
	/**
	 * 将用空格隔开的字符串转成数组
	 * @param unknown_type $str
	 * @return array
	 */
	protected function str2arr($str){
		$str = preg_replace('/\s(?=\s)/', '', trim($str) );
		return explode(" ", $str);
		
	}
		
}


/**
$sqlbuild = new SqlBuilder();
$sqlbuild->Select(array("table1"=>array("c1 aa","c3  sss","ss"),"table2"=>"*"))
		->From(array("t1","t2"))
		->Leftjoin(array("table1 id "=>"table2  id"))
		->Where(array("ss sss"=>"1","sss  id"=>"2"))
		->Order(array("aaa sss desc","sss  sss  asc"))
		->Limit(0, 10);
echo $sqlbuild->getSql()."<br/>";
$sqlbuild->Insert("aaaa", array("sss"=>"NoW()","ss"=>null,"aaa"=>"ssssfddf"));
echo $sqlbuild->getSql()."<br/>";
$sqlbuild->Update("table",array("key"=>"11","key1"=>0,"key2"=>null,"key"=>"NOW()"),array("table key"=>"222"));
echo $sqlbuild->getSql()."<br/>";
$sqlbuild->Delete("table", array("table key"=>"11","table key1"=>0,"key2"=>null,"key"=>"NOW()") );
echo $sqlbuild->getSql()."<br/>";
*/
