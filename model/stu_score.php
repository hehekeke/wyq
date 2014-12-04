<?php
class stu_score extends Model{
	
	public function add_score($fu_id,$type,$ex_name,$ex_score){
		$sql = "insert into stu_score(fu_id,finshtime,type,ex_name,ex_score) 
				values('".$fu_id."',NOW(),'".$type."','".$ex_name."','".$ex_score."')";
		return $this->insert($sql);
	}
	/**
	 * 验证此学期这个学生是否答卷了
	 * @param unknown_type $fu_id
	 * @param unknown_type $type
	 * @return Ambigous <boolean, multitype:>
	 */
	public function get_score($fu_id,$type){
		$thisyear = date('Y');
		$sql = "select * from stu_score 
				where finshtime >'".$thisyear."-01-01 00:00:00' 
				and finshtime < '2".$thisyear."-12-12 23:59:59' 
				and fu_id = '".$fu_id."' 
				and type = '".$type."' limit 1";
		return $this->fetchRow($sql);
	}

}

?>