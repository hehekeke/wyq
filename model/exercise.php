<?php
/**
* Create On 2014-5-18 下午2:56:16
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class exercise extends Model{
	/**
	 * 添加习题
	 * @param unknown $class
	 * @param unknown $title
	 * @param unknown $adminId
	 * @return Ambigous <boolean, number>
	 */
	public function addExercise($class, $title, $adminId){
		$sql = "INSERT INTO `exercise` (`ex_id`, `ex_class`, `ex_title`, `ex_create_user_id`, `ex_create_time`) "
			 . "VALUES "
			 . "(NULL, '".$class."', '".$title."', '".$adminId."', NOW());";
		return $this->insert($sql);
	}
	
	/**
	 * 获取题目分页
	 * @param number $page
	 * @param number $num
	 * @return multitype:number Ambigous <boolean, multitype:>
	 */
	public function getExlistPageModel($page= 1, $num = 10){
		$select = "SELECT `exercise`.* FROM `exercise` ";
		$order = "ORDER BY `exercise`.`ex_create_time` DESC ";
		$limit = "LIMIT ".($page-1)*$num.",".$num."";
		$sql = $select.$order.$limit;
		//echo $sql;
		$sqltotal = $select.$order;
		$list = $this->fetchAll($sql);
		$total = count($this->fetchAll($sqltotal));
		$totalPage = ceil($total / $num);
		return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}
	
	/**
	 * 删除题目
	 * @param unknown $id
	 * @return resource
	 */
	public function delEx($id){
		$sql = "DELETE FROM `exercise` WHERE `exercise`.`ex_id` = '".$id."'";
		return $this->del($sql);
	}
	
	/**
	 * 根据ID获取详情
	 * @param unknown $id
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getDetail($id){
		$sql = "SELECT * FROM `exercise` WHERE `ex_id` = '".$id."'";
		return $this->fetchRow($sql);
	}
	
	/**
	 * 更新题目
	 * @param unknown $exId
	 * @param unknown $class
	 * @param unknown $title
	 * @return resource
	 */
	public function Editexercise($exId, $class, $title){
		$sql = "UPDATE `exercise` SET `ex_class` = '".$class."', `ex_title` = '".$title."' WHERE `exercise`.`ex_id` = '".$exId."';";
		return $this->update($sql);
	}
	
	public function getAll(){
		$sql = "SELECT * FROM `exercise`";
		return $this->fetchAll($sql);
	}
	/**
	 * 通过题目id获取题目,因为有可能后台删除主键，所以取一个最接近的
	 * @param unknown_type $ex_id
	 */
	public function getquestion($page=1,$fangxiang=null,$pagesize=6){

		$sql= "select `exercise`.`ex_title`,`exercise`.`ex_id` from `exercise`  ORDER BY ex_id asc ";
        $limit = "LIMIT ".($page-1)*$pagesize.",".$pagesize."";
        $sql=$sql.$limit;
		return $this->fetchAll($sql);
	}

    public function  getstuex_info($id){
        $sql="select * from stu_ex where fu_id=$id";
        return $this->fetchAll($sql);
    }

	/**
	 * 获取最近的第一道题
	 */
	public function getfirstquestion(){
		$sql = "select `exercise`.`ex_title`,`exercise`.`ex_id` from `exercise` where `ex_id`>=1 limit 1";
		$row =  $this->fetchRow($sql);
		return $row['ex_id'];
	}
	/**
	 * 获取所有的题目
	 */
	public function getweizhi(){
		$sql = "select * from `exercise` ";

		return $this->fetchAll($sql);
	}
	/**
	 * 获得指定fu_id的全部题号
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getallexid(){
		$sql = "select exercise.ex_id from exercise ";
		return $this->fetchAll($sql);
	}
}