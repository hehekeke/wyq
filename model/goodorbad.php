<?php
class goodorbad extends Model{
	public function saveGood($id,$good,$p_id=null,$type=2){
		$sql = "INSERT INTO `goodorbad`(`goodorbad_id`,`fu_id`,`goodorbad_content`,`goodorbad_flag`,`goodorbad_type`,`goodorbad_create_user_id`)
				VALUES(NULL,".$id.",'".$good."',0,".$type.",".$p_id.")";
		return $this->insert($sql);
	}
	
	public function saveBad($id,$bad,$p_id,$type = 2){
		$sql = "INSERT INTO `goodorbad`(`goodorbad_id`,`fu_id`,`goodorbad_content`,`goodorbad_flag`,`goodorbad_type`,`goodorbad_create_user_id`)
				VALUES(NULL,".$id.",'".$bad."',1,".$type.",".$p_id .")";
		return $this->insert($sql);
	}
	
	public function getGood($id,$p_id){
		$sql = "SELECT `goodorbad_content` FROM `goodorbad` WHERE `fu_id`='".$id."' AND `goodorbad_flag`=0 AND `goodorbad_create_user_id`='".$p_id."'";
		return $this->fetchAll($sql);
	}
	
	public function updateGood($id,$content){
		$sql = "UPDATE `goodorbad` SET `goodorbad_content` = '".$content."' WHERE `goodorbad_id` = '".$id."'";
		return $this->update($sql);
	}
	
	public function getg($content,$id,$p_id){
		$sql = "SELECT `goodorbad_id` FROM `goodorbad` WHERE `goodorbad_content` = '".$content."' AND `fu_id`='".$id."' AND `goodorbad_flag` = 0 AND `goodorbad_create_user_id`='".$p_id."'";
		return $this->fetchRow($sql);
	}
	
	public function getBad($id,$p_id){
		$sql = "SELECT `goodorbad_content` FROM `goodorbad` WHERE `fu_id`='".$id."' AND `goodorbad_flag`=1 AND `goodorbad_create_user_id`='".$p_id."'";
		return $this->fetchAll($sql);
	}
	
	public function updateBad($id,$content){
		$sql = "UPDATE `goodorbad` SET `goodorbad_content` = '".$content."' WHERE `goodorbad_id` = '".$id."'";
		return $this->update($sql);
	}
	
	public function getb($content,$id,$p_id){
		$sql = "SELECT `goodorbad_id` FROM `goodorbad` WHERE `goodorbad_content` = '".$content."' AND `fu_id`='".$id."' AND `goodorbad_flag` = 1 AND `goodorbad_create_user_id`='".$p_id."'";
		return $this->fetchRow($sql);
	}
	
	public function zz_getinfo($fu_id,$flag,$type,$page=1){
		$position = ($page-1)*5;
		$sql = "select * from goodorbad where fu_id = ".$fu_id." and goodorbad_flag = ".$flag." and goodorbad_type = ".$type." order by goodorbad_id desc limit ".$position.",5";
		return $this->fetchAll($sql);
	}
	
	public function getGoodorbadPageModel($type, $flag, $userid, $page = 1, $num = 10){
		$select = "SELECT `goodorbad`.* FROM `goodorbad` ";
		$select1 = "SELECT COUNT(*) AS num FROM `goodorbad` ";
		$filter = "WHERE `goodorbad_flag` = '".$flag."' AND `goodorbad_type` = '".$type."' AND `fu_id`='".$userid."' ";
		$limit = "LIMIT ".($page-1)*$num.",".$num."";
		$sql = $select.$filter.$limit;
		$sqltotal = $select1.$filter;
		//echo $sql;
		$list = $this->fetchAll($sql);
		$row = $this->fetchRow($sqltotal);
		$total = $row['num'];
		$totalPage = ceil($total / $num);
		return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}
}