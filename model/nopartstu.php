<?php
/**
* Create On 2014-5-26 下午1:04:23
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class nopartstu extends Model{
	/**
	 * 获取为参评的学生的列表
	 * @param number $page
	 * @param number $num
	 * @param number $collegeId
	 * @return multitype:number unknown
	 */
	public function getList($page = 1, $num = 10, $collegeId = 0){
		$select = "SELECT `no_part_stu`.*, `major`.`major_name` FROM `no_part_stu` "
				. "LEFT JOIN `major` ON `no_part_stu`.`nps_major` = `major`.`major_id` ";
		$filter = "WHERE 1 ";
		if ($collegeId){
			$filter .="AND `no_part_stu`.`nps_college` = '".$collegeId."' ";
		}
		$order = "ORDER BY `no_part_stu`.`nps_create_time` DESC ";
		$limit = "LIMIT ".($page-1)*$num.",".$num."";
		$sql = $select.$filter.$order.$limit;
		//echo $sql;
		$sqltotal = $select.$filter.$order;
		$list = $this->fetchAll($sql);
		$total = count($this->fetchAll($sqltotal));
		$totalPage = ceil($total / $num);
		return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}
	
	/**
	 * 添加
	 * @param unknown $stu_no
	 * @param unknown $stu_name
	 * @param unknown $stu_major
	 * @param unknown $stu_grade
	 * @param unknown $stu_xuenian
	 * @param unknown $stu_college
	 * @param unknown $score
	 * @param unknown $reason
	 * @param unknown $assproId
	 * @return Ambigous <boolean, number>
	 */
	public function Add($stu_no, $stu_name, $stu_major, $stu_grade, $stu_xuenian, $stu_college, $score, $reason, $assproId){
		$sql = "INSERT INTO `no_part_stu` "
			 . "(`nps_id`, `nps_no`, `nps_name`, `nps_major`, `nps_grade`, `nps_xuenian`, `nps_college`, "
			 . "`nps_score`, `nps_reason`, `asspro_id`, `nps_create_time`) "
			 . "VALUES "
			 . "(NULL, '".$stu_no."', '".$stu_name."', '".$stu_major."', '".$stu_grade."', '".$stu_xuenian."', '".$stu_college."', "
			 . "'".$score."', '".$reason."', '".$assproId."', NOW());";
		return $this->insert($sql);
	}
	
	/**
	 * 获取详情
	 * @param unknown $id
	 */
	public function getDetail($id){
		$sql = "SELECT `no_part_stu`.*, `major`.`major_name` FROM `no_part_stu` "
			 . "LEFT JOIN `major` ON `no_part_stu`.`nps_major` = `major`.`major_id` "
			 . "WHERE `no_part_stu`.`nps_id` = '".$id."' ";
		return $this->fetchRow($sql);
	}
	
	/**
	 * 
	 * @param unknown $id
	 * @param unknown $score
	 * @param unknown $reason
	 */
	public function editScore($id, $score, $reason){
		$sql = "UPDATE `no_part_stu` SET `nps_score` = '".$score."', `nps_reason` = '".$reason."' WHERE `no_part_stu`.`nps_id` = '".$id."';";
		return $this->update($sql);
	}
	
	public function getAll($grade,$major){
		$sql = "SELECT * FROM `no_part_stu` WHERE `nps_major`=".$major." AND `nps_grade`=".$grade;
		return $this->fetchAll($sql);
	}
}