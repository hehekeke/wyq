<?php

class stu_ex extends Model{
	private $table = 'stu_ex';
	/**
	 * 通过uid,检测学生目前这题是否答过
	 * @param unknown_type $uid
	 */
	public function getexercise($uid,$ex_id){
		$sql = "select `stu_ex`.`ex_id`,`stu_ex`.`ch_id` from `stu_ex` where `fu_id` = '".$uid."' and  `ex_id`='".$ex_id."'";
		return $this->fetchRow($sql);
	}
	/**
	 * 插入
	 * @param unknown_type $table
	 * @param unknown_type $val
	 */
    public function add_stu_ex($val){
		$this->_sqlBuilder->Insert($this->table, $val);
	    $this->insert();
	    return 1;//因为没有主键，所以insert没有返回值
		//return $this->_sqlBuilder->getSql();
		 
	}
	/**
	 * 通过ch_id更新学生的答案表
	 * @param unknown_type $val
	 * @param unknown_type $ch_id
	 * @return resource
	 */
	public function update_exercise($val,$ex_id,$fu_id){
		$where = array('stu_ex ex_id'=>$ex_id,'stu_ex fu_id'=>$fu_id);
		$this->_sqlBuilder->Update($this->table, $val, $where);
	    $this->update();
	    return $this->_sqlBuilder->getSql();
	}
	
	public function getstuexercise($fu_id){
		$sql = "select stu_ex.ex_id from stu_ex where fu_id = ".$fu_id;
		return $this->fetchAll($sql);
	}
	/**
	 * 学生都填完了后，通过fuid获得所有题目的分数
	 * @param unknown_type $fu_id
	 */
	public function getscore($fu_id){
		$sql = "select exercise.ex_class,count(*)*4 as all_score,SUM(ch_score) as sum_score from stu_ex LEFT JOIN exercise on stu_ex.ex_id = exercise.ex_id LEFT JOIN choose on stu_ex.ch_id = choose.ch_id where stu_ex.fu_id = ".$fu_id." GROUP BY ex_class";
		return $this->fetchAll($sql);
	}
	/**
	 * 检查这个学生回答的问题中，是否有没选的答案
	 * @param unknown_type $fu_id
	 */
	public function check_null($fu_id){
		$sql = "select count(*) as nums from stu_ex where fu_id = ".$fu_id." and ch_id is null";
		return $this->fetchRow($sql);
		
	}

	
}


?>