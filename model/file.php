<?php
class file extends Model
{
	public function addfile($link, $type, $name)
	{
		$sql = "INSERT INTO `file` "
			 . "(`file_id`, `file_name`, `file_link`, `file_type`) " 
			 . "VALUES "
			 . "(NULL, '".$name."', '".$link."', '".$type."');";
		//echo $sql;
		return $this->insert($sql);
	}
	
	public function delFile($fileID){
		$sql = "DELETE FROM `file` WHERE `file`.`file_id` = '".$fileID."'";
		return $this->del($sql);
	}
}