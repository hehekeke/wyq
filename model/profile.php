<?php
/**
* Create On 2014-5-6 15:07
* Author: qiuluyu
* E-mail: qiuluyu@iwind-tech.com
* type=3	trainingPlan 
* type=1	selfPlan
* type=2	self assessment->书面总结
* type=4	assistant feedback
*/
class profile extends Model{
	
	public function insertItem($fuId, $type, $content, $commit = 0, $state = 1, $isnew, $admin_id = 'NULL', $fileid = 'NULL'){
		$year = date("Y");
		$month = date("m");
		$day = date("d");
		if ($month > 8){
			$xuenian = $year + 1;
			$str = $year."-".$xuenian."学年";
		}else if ($month == 8){
			if ($day > 15){
				$xuenian = $year + 1;
				$str = $year."-".$xuenian."学年";
			}else {
				$xuenian = $year - 1;
				$str = $xuenian."-".$year."学年";
			}
		}else {
			$xuenian = $year - 1;
			$str = $xuenian."-".$year."学年";
		}
		$sql = "INSERT INTO `profile` "
			 . "(`id`, `stu_id`, `type`, `year`, `commit`, `state`, `content`, `isnew`, `file_id`, `create_user_id`, `create_time`) "
			 . "VALUES "
			 . "(NULL, '".$fuId."', '".$type."', '".$str."', '".$commit."', '".$state."', '".$content."', ".$isnew.", ".$fileid.", ".$admin_id.", NOW());";
		//echo $sql;
		 return $this->insert($sql);
	}
	
	public function getpro($id){
		$year = date("Y");
		$month = date("m");
		$day = date("d");
		if ($month > 8){
			$xuenian = $year + 1;
			$str = $year."-".$xuenian."学年";
		}else if ($month == 8){
			if ($day > 15){
				$xuenian = $year + 1;
				$str = $year."-".$xuenian."学年";
			}else {
				$xuenian = $year - 1;
				$str = $xuenian."-".$year."学年";
			}
		}else {
			$xuenian = $year - 1;
			$str = $xuenian."-".$year."学年";
		}
		$sql = "SELECT * From `profile` LEFT JOIN file ON file.file_id = profile.file_id WHERE `profile`.`type` = 1 AND `profile`.`year` = '".$str."' AND `profile`.`stu_id` = '".$id."'";
		return $this->fetchRow($sql);
	}
	/**
	 * $state标识状态，提交后，状态应该是未审核
	 * @param unknown_type $id
	 * @param unknown_type $state
	 * @return resource
	 */
	public function commitItem($id,$state=1,$content){
		$sql = "UPDATE `profile` SET `commit`=1 , `state` = ".$state." ,`content` = '".$content."'   WHERE id =".$id;
		return $this->update($sql);
	}
	
	public function getItem($stuId,$type,$isnew){
		$year = date("Y");
		$month = (int)date("m");
		$day = (int)date("d");
		if ($month > 8){
			$xuenian = $year + 1;
			$str = $year."-".$xuenian."学年";
		}else if ($month == 8){
			if ($day > 15){
				$xuenian = $year + 1;
				$str = $year."-".$xuenian."学年";
			}else {
				$xuenian = $year - 1;
				$str = $xuenian."-".$year."学年";
			}
		}else {
			$xuenian = $year - 1;
			$str = $xuenian."-".$year."学年";
		}
		$sql = "SELECT * FROM `profile` LEFT JOIN file ON file.file_id = profile.file_id WHERE stu_id=".$stuId." AND isnew=".$isnew." AND type=".$type." AND year= '".$str."'";
		// echo $sql."<br/>";
		return $this->fetchRow($sql);
	}
	
	public function updateItem($id,$content){
		$sql = "UPDATE `profile` SET `content`='".$content."' WHERE id=".$id;
		return $this->update($sql);
	}
	

    public function getProfile($userID){
        $sql = "SELECT * FROM `profile`WHERE `profile`.`stu_id` = '".$userID."'";
        return $this->fetchAll($sql);
    }
    public function getProfile_info($nianji,$userID,$isnew){
        $sql = "SELECT * FROM `profile`WHERE `profile`.`stu_id` = '".$userID."' AND `profile`.`year`='".$nianji."'AND  `profile`.`type`=1 AND `profile`.`isnew`='".$isnew."' ";
        return $this->fetchAll($sql);
    }
    //自己添加
    public function getAProfileById($fuid,$xuenian,$isnew){
        $sql = "SELECT * FROM `profile`WHERE `profile`.`stu_id` = '".$fuid."' AND `profile`.`year`='".$xuenian."'AND  `profile`.`type`=1  AND `profile`.`isnew`='".$isnew."'";
        return $this->fetchRow($sql);
    }
	/**
	 * 获取个人成长计划列表（分页）
	 * @param unknown $state
	 * @param number $page
	 * @param number $num
	 * @return multitype:number unknown
	 */
	public function getSelfplanListPageModel($state, $collegeId, $page = 1, $num = 10){
		$select = "SELECT `profile`.*, `front_user`.`fu_realname`, `fu_username`, `front_user`.`fu_grade`, `major`.`major_name` FROM `profile` "
				. "LEFT JOIN `front_user` ON `profile`.`stu_id` = `front_user`.`fu_id` " 
				. "LEFT JOIN `college` ON `front_user`.`fu_college` = `college`.`college_id` "
				. "LEFT JOIN `major` ON `front_user`.`fu_major` = `major`.`major_id` ";
		$filter = "WHERE `front_user`.`fu_college` = '".$collegeId."' AND `profile`.`type` = 3 AND `profile`.`state` = '".$state."' AND `profile`.`commit` = '1' ";
		$order = "ORDER BY `profile`.`create_time` DESC ";
		$limit = "LIMIT ".($page-1)*$num.",".$num."";
		$sql = $select.$filter.$order.$limit;
		//echo $sql;
		$sqltotal = $select.$filter.$order;
		$list = $this->fetchAll($sql);
		$total = count($this->fetchAll($sqltotal));
		$totalPage = ceil($total / $num);
		return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}
	
	public function setProfileState($id, $state){
		$sql = "UPDATE `profile` SET `state` = '".$state."' WHERE `profile`.`id` = '".$id."';";
		return $this->update($sql);
	}
	
	public function getDetailById($id){
		$sql = "SELECT `profile`.*, `front_user`.`fu_realname`, `fu_username`, `file`.`file_link`, `file`.`file_name` FROM `profile` "
			 . "LEFT JOIN `front_user` ON `profile`.`stu_id` = `front_user`.`fu_id` "
			 . "LEFT JOIN `file` ON `profile`.`file_id` = `file`.`file_id` "
			 . "WHERE `profile`.`id` = '".$id."' ";
		return $this->fetchRow($sql);
	}
	
	public function getFbById($fuId, $xuenian = NULL, $isnew = 0){
		$select = "SELECT * FROM `profile` ";
		$filter = "WHERE `stu_id` = '".$fuId."' AND `type` = 4 AND `isnew` = '".$isnew."' ";
		if ($xuenian){
			$filter .= "AND `year` = '".$xuenian."' ";
		}
		$sql = $select.$filter;
		return $this->fetchRow($sql);
	}
	
	public function getProfileByType($type, $userid, $isnew = 0, $state = 0){
		$select = "SELECT * FROM `profile` ";
		$filter = "WHERE `stu_id` = '".$userid."' AND `type` = '".$type."' AND `isnew` = '".$isnew."' ";
		if ($state){
			$filter .= "AND `state` = '".$state."' ";
		}
		$sql = $select.$filter;
		//echo $sql;
		return $this->fetchRow($sql);
	}
}
