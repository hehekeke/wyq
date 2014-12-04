<?php
/**
* Create On 2014-5-6 11:07
* Author: qiuluyu
* E-mail: qiuluyu@iwind-tech.com
*/
class assessment extends Model{
	
	public function getList(){
		$sql = "SELECT * FROM `assessment_project` WHERE `assessment_project`.`asspro_college` != 0 ORDER BY `assessment_project`.`asspro_create_time` DESC";
		return $this->fetchAll($sql);
	}

    public function getList02($page = 1,$num = 6){
     //   <{if $assList[n].asspro_state == 1||$assList[n].asspro_state == 3}>
        $sqltotle="SELECT * FROM `assessment_project` WHERE ( asspro_state=1 or asspro_state=3 ) and `assessment_project`.`asspro_college` != 0";
        $sql = "SELECT * FROM `assessment_project` WHERE `assessment_project`.`asspro_college` != 0 and ( asspro_state=1 or asspro_state=3 ) ORDER BY `assessment_project`.`asspro_create_time` DESC  LIMIT ".($page-1)*$num.",".$num." ";
        $total =count($this->fetchAll($sqltotle));
        $totalPage = ceil($total / $num);
        $list= $this->fetchAll($sql);
        return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }
	
	public function getAticleById($id){
		$sql = "SELECT `assessment_project`.*, `admin`.`admin_realname` FROM `assessment_project` "
			 . "LEFT JOIN `admin` ON `assessment_project`.`asspro_create_user_id` = `admin`.`admin_id` "
			 . "WHERE `assessment_project`.`asspro_id` = '".$id."' ";
		return $this->fetchRow($sql);
	}

    public function getFont_user($num){
        $sql="select * from front_user where fu_username=$num";
        return $this->fetchRow($sql);
    }
	/**
	 * 根据学院筛选评估细则
	 * @param unknown_type $page
	 * @param unknown_type $num
	 * @param unknown_type $isPage
	 * @param unknown_type $collegeId
	 * @return multitype:unknown number Ambigous <boolean, multitype:> |Ambigous <boolean, multitype:>
	 */
	public function getSchoolAss($page = 1, $num = 10, $isPage = 0, $collegeId = 0){
		$select = "SELECT assessment_project.*, admin.admin_realname FROM assessment_project "
				. "LEFT JOIN admin ON assessment_project.asspro_create_user_id = admin.admin_id ";
		$filter = " WHERE assessment_project.asspro_college = '".$collegeId."' ";
		$order =  " ORDER BY assessment_project.asspro_create_time  DESC ";
		$limit = "LIMIT ".($page-1)*$num.",".$num."";
		if ($isPage) {
			$sql = $select.$filter.$order.$limit;
			$sqltotal = $select.$filter.$order;
			$list = $this->fetchAll($sql);
			$total = count($this->fetchAll($sqltotal));
			$totalPage = ceil($total / $num);
			return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
		}else{
            $sql = $select.$filter.$order;
            return $this->fetchAll($sql);
		}
	}
	
	public function getAssPageModel($page = 1, $num = 10, $xuenian = NULL, $state = 4, $collegeId = 0){
		$select = "SELECT `assessment_project`.*, `college`.`college_name` FROM `assessment_project` "
				. "LEFT JOIN `college` ON `assessment_project`.`asspro_college` = `college`.`college_id` ";
		$select1 = "SELECT COUNT(*) AS NUM FROM `assessment_project` "
				  . "LEFT JOIN `college` ON `assessment_project`.`asspro_college` = `college`.`college_id` ";
		if ($collegeId){
			$filter = "WHERE `assessment_project`.`asspro_college` = '".$collegeId."' ";
		}else{
			$filter = "WHERE `assessment_project`.`asspro_college` != 0 ";
		}
		if ($xuenian) {
			$filter .= "AND `assessment_project`.`asspro_xuenian` = '".$xuenian."' ";
		}
		if ($state != 4) {
			$filter .= "AND `assessment_project`.`asspro_state` = '".$state."' ";
		}
		$order = "ORDER BY `assessment_project`.`asspro_create_time` DESC ";
		$limit = "LIMIT ".($page-1)*$num.",".$num."";
		$sql = $select.$filter.$order.$limit;
		//echo $sql;
		$sqltotal = $select1.$filter.$order;
		$list = $this->fetchAll($sql);
		$total_row = $this->fetchRow($sqltotal);
		$total = $total_row['NUM'];
		//echo $total;
		$totalPage = ceil($total / $num);
		return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}
	
	public function addAss($title,$the_last_acticle_id, $xuenian, $gongNum, $nengNum, $secondContent, $thirdContent, $collegeId, $adminId, $isnew = 0){
		$sql = "INSERT INTO `assessment_project` "
			 . "(`asspro_id`,`acticle_id` ,`asspro_xuenian`, `asspro_title`, `asspro_isnew`, `asspro_gong_num`, `asspro_neng_num`, "
			 . "`asspro_second_content`, `asspro_third_content`, `asspro_college`, "
			 . "`asspro_state`, `asspro_isdel`, `asspro_create_user_id`, `asspro_create_time`) "
			 . "VALUES "
			 . "(NULL,'".$the_last_acticle_id."' ,'".$xuenian."', '".$title."', '".$isnew."', '".$gongNum."', '".$nengNum."', "
			 . "'".$secondContent."', '".$thirdContent."', '".$collegeId."', "
			 . "'0', '1', '".$adminId."', NOW());";
		return $this->insert($sql);
	}
	
	public function getAllMes($id){
		$sql = "SELECT `assessment_project`.`asspro_id`,`assessment_project`.`asspro_second_content`,`assessment_project`.`asspro_third_content`,`assessment_project`.`asspro_create_time`,`assessment_project`.`asspro_gong_num`,`assessment_project`.`asspro_neng_num` From `assessment_project` LEFT JOIN front_user ON front_user.fu_college = assessment_project.asspro_college
				WHERE `front_user`.`fu_id`='".$id."'";
		return $this->fetchRow($sql);
	}
    public function getAllMes2($id,$isnew){
        $sql = "SELECT `assessment_project`.`asspro_id`,`assessment_project`.`asspro_second_content`,`assessment_project`.`asspro_third_content`,`assessment_project`.`asspro_create_time`,`assessment_project`.`asspro_gong_num`,`assessment_project`.`asspro_neng_num` From `assessment_project` LEFT JOIN front_user ON front_user.fu_college = assessment_project.asspro_college
				WHERE `front_user`.`fu_id`='".$id."' AND asspro_isnew=$isnew";
        return $this->fetchRow($sql);
    }
	public function updateAss($id, $title, $gongNum, $nengNum, $second_content, $third_content, $isnew = 0){
		$sql = "UPDATE `assessment_project` "
			 . "SET "
			 . "`asspro_title` = '".$title."', "
			 . "`asspro_isnew` = '".$isnew."', "
			 . "`asspro_gong_num` = '".$gongNum."', "
			 . "`asspro_neng_num` = '".$nengNum."', "
			 . "`asspro_second_content` = '".$second_content."', "
			 . "`asspro_third_content` = '".$third_content."', "
			 . "`asspro_state` = '0' "
			 . "WHERE `assessment_project`.`asspro_id` = '".$id."';";
		//echo $sql;
		return $this->update($sql);
	}
	
	public function getXuenian(){
		$sql = "SELECT DISTINCT `assessment_project`.`asspro_xuenian` FROM `assessment_project`";
		//echo $sql;
		return $this->fetchAll($sql);
	}
	
	public function setState($id, $state){
		$sql = "UPDATE `assessment_project` SET `asspro_state` = '".$state."' WHERE `assessment_project`.`asspro_id` = '".$id."';";
		//echo $sql;
		return $this->update($sql);
	}
	/**
	 * 获得本年的功能排序
	 */
	public function zz_getscoreorder(){
		$start = date('Y');
		$end = $start+1;
		$sql = "select asspro_id,asspro_gong_num,asspro_second_content from assessment_project where  asspro_college = 0 and asspro_create_time > '".$start."' and asspro_create_time <'".$end."'";
		return $this->fetchRow($sql);
	}
	/**
	 * 通过$asspro_id获得这条资料
	 * @param unknown_type $asspro_id
	 */
	public function zz_getasspro($asspro_id){
		$sql = "select * from assessment_project where asspro_id = ".$asspro_id;
		return $this->fetchRow($sql); 
	}
	/**
	 * 通过学号，获得这个学生的asspro_id
	 * @param unknown_type $num
	 */
	public function zz_getasspro_id($num){
		$year = date("Y");
		$sql = "select assessment_project.asspro_id,asspro_title from assessment_project 
				LEFT JOIN front_user on assessment_project.asspro_college = front_user.fu_college 
				where front_user.fu_username = '".$num."' 
				and asspro_create_time > '".$year."'
				and asspro_create_time < '".($year+1)."'";
		return $this->fetchRow($sql);
	}

    public function zz_getasspro_id02($num,$isnew){
        $sql01="select * from v_bks where bks_code=$num";
        $result_sql01=$this->fetchRow($sql01);
        $sql02="select * from college where college_name='".$result_sql01['bks_college']."'";
        $result_sql02=$this->fetchRow($sql02);
        $year = date("Y");
        $sql = "select assessment_project.asspro_id,asspro_title from assessment_project where asspro_college='".$result_sql02['college_id']."'  and asspro_create_time > '".$year."'and asspro_create_time < '".($year+1)."'
				and asspro_isnew=$isnew";
        return $this->fetchRow($sql);
    }
	
	public function zz_getasspro_idbycollegeid($college_id,$isnew){
		$sql = "select * from assessment_project where asspro_college = '".$college_id."'AND asspro_isnew='".$isnew."' order by asspro_create_time limit 1";
		return $this->fetchRow($sql);
	}

	/**
	 * 通过fuid对应的collegeid 获得这个学院的gongnum,content
	 * @param unknown_type $fu_id
	 */
	public function zz_getcontentbyfu_college($fu_id){
		$sql = "select * from assessment_project LEFT JOIN front_user on assessment_project.asspro_college = front_user.fu_college WHERE fu_id = ".$fu_id." order by asspro_create_time desc limit 1";
		return $this->fetchRow($sql);
	}
    /**
     * 通过评估项目的id获取项目的isnew
     * @param unknown_type $fu_id
     */
    public function getIfnew($asspro_id){
        $sql="select * from assessment_project  where asspro_id=$asspro_id";
        return $this->fetchRow($sql);
    }
	
	/**
	 * 根据学年筛选
	 * @param unknown $xuenian
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getAssproByYear($article_id,$xuenian){
		$sql = "SELECT * FROM `assessment_project` WHERE `asspro_xuenian` = '".$xuenian."' AND `acticle_id` = '".$article_id."' ORDER BY `asspro_create_time` DESC ";
		return $this->fetchAll($sql);
	}
	/**
	 * 通过学生id获得他的proid,互评type = 2
	 * @param unknown_type $fu_id
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getassprobyfuid($fu_id,$type){
		$sql = "select assessment_project.* from assessment_project left join user_score on assessment_project.asspro_id = user_score.asspro_id where us_type = ".$type." and user_score.fu_id = ".$fu_id;
		//echo $sql;
		return $this->fetchRow($sql);
	}
	/**
	 * 获得本学院的最新评分细则
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getnkasspro(){
		$sql = "select assessment_project.* from assessment_project where asspro_college = 0  order by asspro_create_time desc limit 1";
		//echo $sql;
		return $this->fetchRow($sql);
	}
    /**
     * 获得学院的学生所在的学院的id
     * @return Ambigous <boolean, multitype:>
     */
    public  function getcollegeId($fu_id){
        $sql="select * from front_user where fu_id='".$fu_id."'";
        return  $this->fetchRow($sql);
    }

    /** APP赫建武互评好评查询 */
    public function get_do_good($id,$goodorbad_flag=0,$goodorbad_type=1){
        $sql="SELECT goodorbad_content theBest FROM goodorbad WHERE fu_id=$id and goodorbad_flag=$goodorbad_flag and goodorbad_type=$goodorbad_type";
        return $this->fetchAll($sql);
    }
    /** APP赫建武互评差评查询 */
    public function get_do_bad($id,$goodorbad_flag=1,$goodorbad_type=1){
        $sql="SELECT goodorbad_content needImprove FROM goodorbad WHERE fu_id=$id and goodorbad_flag=$goodorbad_flag and goodorbad_type=$goodorbad_type";
        return $this->fetchAll($sql);
    }
    /** 获取评估功能指标信息 */
    public function getAssessmentProject($college){
        $year=date('Y');
        //var_dump($year);
        $sql="SELECT asspro_id,asspro_gong_num,asspro_neng_num,asspro_second_content FROM assessment_project WHERE asspro_college=$college and asspro_create_time > '".$year."' and asspro_create_time < '".($year+1)."' and asspro_isnew=0 and asspro_state=3";
			//var_dump($sql);
        return $this->fetchRow($sql);
    }
    /** 获取学生互评分数 */
    public function getHpScore($id,$asspro_id){
        $sql="SELECT us_score FROM user_score WHERE fu_id=$id AND asspro_id=$asspro_id AND us_type=1";
        return $this->fetchAll($sql);
    }
    /** 获取学生自评分数 */
    public function getZpScore($id,$asspro_id){
        $sql="SELECT us_score FROM user_score WHERE fu_id=$id AND asspro_id=$asspro_id AND us_type=0";
        //var_dump($sql);
        return $this->fetchRow($sql);
    }
    /** 获取他评,互评内容 */
    public function get_tp_result($college,$str){
        $sql="SELECT *  FROM `assessment_project` WHERE `asspro_xuenian`='".$str."' and `asspro_college`='".$college."' ";

        return $this->fetchRow($sql);
    }
    /** 他评do_good内容 */
    public function gethpgoodcontent($id,$size){
        $sql="SELECT goodorbad_content theBest FROM goodorbad WHERE fu_id=$id and goodorbad_flag=0 and goodorbad_type=2 limit $size,10";
        return $this->fetchAll($sql);
    }
    /** 他评do_bad内容 */
    public function gethpbadcontent($id,$size){
        $sql="SELECT goodorbad_content needImprove	 FROM goodorbad WHERE fu_id=$id and goodorbad_flag=1 and goodorbad_type=2 limit $size,10";
        return $this->fetchAll($sql);
    }
    /** 互评do_good内容 */
    public function gethp1goodcontent($id,$size){
        $sql="SELECT goodorbad_content theBest FROM goodorbad WHERE fu_id=$id and goodorbad_flag=0 and goodorbad_type=1 limit $size,10";
        return $this->fetchAll($sql);
    }
    /** 互评do_bad内容 */
    public function gethp1badcontent($id,$size){
        $sql="SELECT goodorbad_content needImprove	 FROM goodorbad WHERE fu_id=$id and goodorbad_flag=1 and goodorbad_type=1 limit $size,10";
        return $this->fetchAll($sql);
    }
    /** 获取他评对某人评论的所有分数 */
    public function getalltpscoreresult($fu_id,$ass_id){
        //$sql="SELECT us_score from user_score where fu_id=$fu_id and asspro_id=$ass_id and us_type=2";
        //return $this->fetchAll($sql);
        $year = date("Y");
        $sql = "select us_score from user_score where fu_id = ".$fu_id."  and us_type = 2 and us_create_time > '".$year."' and us_create_time < '".($year+1)."' order by us_create_time desc limit 1";
        return $this->fetchAll($sql);
    }
    /** 互评检测是否已经评论过 */
    public function getif_user_comment($asspro_id,$fu_id,$commentperson_id){

        $sql="SELECT * from user_score where fu_id=$fu_id and asspro_id=$asspro_id and us_create_user_id=$commentperson_id and us_type=1";
        //var_dump($sql);
        return $this->fetchAll($sql);
    }



}

