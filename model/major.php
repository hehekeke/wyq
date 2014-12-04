<?php
/**
* Create On 2014-3-25 ����4:36:58
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/

class major extends Model{
	
	public function addMajor($collId, $majorName){
		$sql = "INSERT INTO `nkjob`.`major` (`major_id`, `college_id`, `major_name`) VALUES (NULL, '".$collId."', '".$majorName."');";
		return $this->insert($sql);
	}
	
	public function editMajor($majorId, $collId, $majorName){
		$sql = "UPDATE `nkjob`.`major` "
			 . "SET `college_id` = '".$collId."', `major_name` = '".$majorName."' "
			 . "WHERE `major`.`major_id` = '".$majorId."';";
		return $this->update($sql);
	}
	
	public function getDetailById($majorId){
		$sql = "SELECT `major`.*, `college`.`college_name` FROM `major` "
			 . "LEFT JOIN `college` ON `major`.`college_id` = `college`.`college_id` "
			 . "WHERE `major`.`major_id` = '".$majorId."' ";
		return $this->fetchRow($sql);
	}
	
	public function getDetailByName($majorName){
		$sql = "SELECT `major`.*, `college`.`college_name` FROM `major` "
			. "LEFT JOIN `college` ON `major`.`college_id` = `college`.`college_id` "
			. "WHERE `major`.`major_name` = '".$majorName."' ";
		return $this->fetchRow($sql);
	}
	
	public function getMajorPageModel($page = 1, $num = 10){
		$sql = "SELECT `major`.*, `college`.`college_name` FROM `major` "
			 . "LEFT JOIN `college` ON `major`.`college_id` = `college`.`college_id` "
			 . "LIMIT ".($page-1)*$num.",".$num."";
		//echo $sql;
		$list = $this->fetchAll($sql);
		$total = $this->getTotal('major');
		$totalPage = ceil($total / $num);
		return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}
	
	public function getAllMajor(){
		$sql = "SELECT `major`.*, `college`.`college_name` FROM `major` "
			 . "LEFT JOIN `college` ON `major`.`college_id` = `college`.`college_id` ";
       // echo$sql;
		return $this->fetchAll($sql);
	}
	
	public function getMajorIds(){
		$sql = "SELECT * FROM `major`";
		return $this->fetchAll($sql);
	}
	
	public function reCheck($collId, $majorName, $majorId = 0){
		if ($majorId){
			$sql = "SELECT * FROM `major` WHERE `major_id` != '".$majorId."' AND `college_id` = '".$collId."' AND `major_name` = '".$majorName."'";
		}else{
			$sql = "SELECT * FROM `major` WHERE `college_id` = '".$collId."' AND `major_name` = '".$majorName."'";
		}
		return $this->fetchAll($sql);
	}
	
	public function delMajor($majorId){
		$sql = "DELETE FROM `nkjob`.`major` WHERE `major`.`major_id` = '".$majorId."'";
		return $this->del($sql);
	}
	
	public function getMajorByCollId($collId){
		$sql = "SELECT `major`.*, `college`.`college_name` FROM `major` "
			. "LEFT JOIN `college` ON `major`.`college_id` = `college`.`college_id` "
			. "WHERE `major`.`college_id` = '".$collId."' ";
		return $this->fetchAll($sql);
	}
	
	public function getItem($id){
		$sql = "SELECT * FROM `major` WHERE `major_id` =".$id;
		return $this->fetchRow($sql);
	}
    public function getMajorIdByMajorName($major){
        $sql = "select major_id from major where major_name = '".$major."'";
        return $this->fetchRow($sql);
    }
}
