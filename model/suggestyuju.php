<?php
/**
* Create On 2014-6-10 下午3:50:58
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class suggestyuju extends Model{
	
	/**
	 * 获取列表
	 */
	public function  getSyList(){
		$sql = "SELECT * FROM `suggest_yuju` ";
		return $this->fetchAll($sql);
	}
	
	/**
	 * 添加建议语句
	 * @param unknown $begin
	 * @param unknown $end
	 * @param unknown $content
	 */
	public function addSy($begin, $end, $content){
// 		$rows = $this->getSyList();
// 		for ($i = 0; $i < count($rows); $i++){
// 			$this->delSy($rows[$i]['sy_id']);
// 		}
		$sql = "INSERT INTO `suggest_yuju` (`sy_id`, `sy_begin`, `sy_end`, `sy_content`) "
			 . "VALUES (NULL, '".$begin."', '".$end."', '".$content."');";
		return $this->insert($sql);
	}
	
	public function delSy($syId){
		$sql = "DELETE FROM `suggest_yuju` WHERE `suggest_yuju`.`sy_id` = '".$syId."' ";
		return $this->del($sql);
	}
	
	public function getYujuByScore($score){
		$sql = "SELECT * FROM `suggest_yuju` WHERE `sy_begin` < '".$score."' AND `sy_end` >= '".$score."' ";
		//echo $sql;
		return $this->fetchRow($sql);
	}
}