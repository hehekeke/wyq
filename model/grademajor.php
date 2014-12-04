<?php
/**
* Create On 2014-5-17 ����3:03:01
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/

class grademajor extends Model{
	
	public function getGrademajorListPageModel($page = 1, $num = 10,$isnew = 0, $collegeId = 0, $flag = 0, $notNew = 0 ){
		$select = "SELECT `grade_major`.*, `major`.`major_name` FROM `grade_major` "
				. "LEFT JOIN `major` ON `grade_major`.`major_id` = `major`.`major_id` ";
		$filter = "WHERE 1 ";
		if ($collegeId){
			$filter .= "AND `grade_major`.`college_id` = '".$collegeId."' ";
		}
        $filter.="AND `grade_major`.`gd_isnew`='".$isnew."'";
		$limit = "LIMIT ".($page-1)*$num.",".$num."";
		if ($flag){
			$sqltotal = $select.$filter;
			return $this->fetchAll($sqltotal);
		}else{
			$sql = $select.$filter.$limit;
			$sqltotal = $select.$filter;
			$list = $this->fetchAll($sql);
			$total = count($this->fetchAll($sqltotal));
			$totalPage = ceil($total / $num);
			return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
		}
	}
	
	/**
	 * 设置专业评估时间段
	 * @param unknown $id
	 * @param unknown $begin
	 * @param unknown $end
	 */
	public function setTime($id, $begin, $end){
		$sql = "UPDATE `grade_major` SET `gd_begin` = '".$begin."', `gd_end` = '".$end."' WHERE `grade_major`.`gd_id` = '".$id."';";
		return $this->update($sql);
	}
	
	/**
	 * 设置评估进度
	 * @param unknown $id
	 * @param unknown $state
	 */
	public function setState($id, $state){
		$sql = "UPDATE `grade_major` SET `gd_state` = '".$state."' WHERE `grade_major`.`gd_id` = '".$id."'";
		return $this->update($sql);
	}
	
	public function getAllNew(){
		$sql = "SELECT * FROM `grade_major` WHERE gd_isnew=1";
		return $this->fetchAll($sql);
	}
	
	public function getAllYear(){
		$sql = "SELECT * FROM `grade_major` WHERE gd_isnew=0";
		return $this->fetchAll($sql);
	}
	
	public function getItemByMajorId($id){
		$sql = "SELECT * FROM `grade_major` WHERE major_id=".$id;
		return $this->fetchRow($sql);
	}
	
	public function updateGrade($id,$grade){
		$sql = "UPDATE `grade_major` SET `gd_grade` = '".$grade."' WHERE `gd_isnew`=1 AND `major_id`=".$id;
		return $this->update($sql);
	}
	
	public function insertGrade($mid,$cid,$grade){
		$sql = "INSERT INTO `grade_major`(`major_id`,`college_id`,`gd_grade`,`gd_state`,`gd_begin`,`gd_end`,`gd_isnew`)
				VALUES (".$mid.",".$cid.",'".$grade."','0',NULL,NULL,1)";
		return $this->insert($sql);
	}
	
	public function insertGrade2($mid,$cid,$grade){
		$sql = "INSERT INTO `grade_major`(`major_id`,`college_id`,`gd_grade`,`gd_state`,`gd_begin`,`gd_end`,`gd_isnew`)
				VALUES (".$mid.",".$cid.",'".$grade."','0',NULL,NULL,0)";
		return $this->insert($sql);
	}
	
	public function resetAll(){
		$sql = "DELETE FROM grade_major WHERE gd_isnew=0";
		return $this->del($sql);
	}
	
	public function getgm($gm_id){
		$sql = "SELECT * FROM `grade_major` WHERE `gd_id`=".$gm_id;
		return $this->fetchRow($sql);
	}
	/**
	 * 通过fuid获得这个专业的信息
	 * @param unknown_type $fu_id
	 * @return Ambigous <boolean, multitype:>
	 */
	public function  getinfofromfuid($fu_id,$isnew){
		$sql = "select grade_major.gd_state from grade_major LEFT JOIN front_user on front_user.fu_major = grade_major.major_id and front_user.fu_grade = grade_major.gd_grade and grade_major.gd_isnew=".$isnew." where front_user.fu_id = ".$fu_id;
        return $this->fetchRow($sql);

	}

    /**
     * 重置college_major的新生的数据
     * @param unknown_type $fu_id
     * @return Ambigous <boolean, multitype:>
     */
    public function  new_xinsheng(){
        $sql = "DELETE FROM grade_major WHERE gd_isnew =1";
        return $this->del($sql);
    }

    /**
     * 获取所有的学生
     * @param unknown_type $fu_id
     * @return Ambigous <boolean, multitype:>
     */
    public function  getAllstu($info,$page,$pagesize=10){
        $fu_major_id=$info['fu_major'];
        $sql01="select * from major where major_id=$fu_major_id";
        $result_sql01=$this->fetchRow($sql01);
        $major_name=$result_sql01['major_name'];
        $fu_grade=$info['fu_grade'];
        $sql = "select * from v_bks where bks_grade=$fu_grade and  bks_major='".$major_name."'";
        $limit = " LIMIT ".($page-1)*$pagesize.",".$pagesize."";
        $total=count($this->fetchAll($sql));
        $totalPage = ceil($total / $pagesize);
        $sql_03=$sql.$limit;
        $list = $this->fetchAll($sql_03);
        return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }
}
