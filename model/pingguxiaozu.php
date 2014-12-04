<?php

class pingguxiaozu extends Model{
	public function getAll($college){
		$sql = "SELECT * FROM `pingguxiaozu` WHERE `college_id`=".$college;
		return $this->fetchAll($sql);
	}
}