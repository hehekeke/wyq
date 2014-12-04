<?php
/**
* Create On 2014-5-26 下午2:05:04
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class user_score extends Model{
	
	/**
	 * 添加分数
	 * @param unknown $fuId
	 * @param unknown $assproId
	 * @param unknown $type
	 * @param unknown $scoreStr
	 * @param unknown $createUserId
	 * @return Ambigous <boolean, number>
	 */
	public function addUserscore($fuId, $assproId, $type, $scoreStr, $createUserId){
		$sql = "INSERT INTO `user_score` (`us_id`, `fu_id`, `asspro_id`, `us_type`, `us_score`, `us_create_user_id`, `us_create_time`) "
			 . "VALUES "
			 . "(NULL, '".$fuId."', '".$assproId."', '".$type."', '".$scoreStr."', '".$createUserId."', NOW());";
		 $this->insert($sql);
		 return $sql;
	}
	
	/**
	 * 根据学生ID和评分类型获取评分结果
	 * @param unknown $fuId
	 * @param unknown $type
	 * @return Ambigous <boolean, multitype:>
	 */
public function getScore($fuId, $type, $isziping = 0){
		$sql = "SELECT * FROM `user_score` WHERE `fu_id` = '".$fuId."' AND `us_type` = '".$type."' ";
		//echo $sql;
		if ($isziping){
			return $this->fetchRow($sql);
		}else{
			return $this->fetchAll($sql);
		}
	}
	
	/**
	 * 添加最好或者最差
	 * @param unknown $fuId
	 * @param unknown $content
	 * @param unknown $flag 0-表示最好， 1-表示最差
	 * @param unknown $type 1-互评  2-他评
	 * @return Ambigous <boolean, number>
	 */
	public function addGoodorBad($fuId, $content, $flag, $type){
		$sql = "INSERT INTO `goodorbad` (`goodorbad_id`, `fu_id`, `goodorbad_content`, `goodorbad_flag`, `goodorbad_type`) "
			 . "VALUES "
			 . "(NULL, '".$fuId."', '".$content."', '".$flag."', '".$type."');";
		return $this->insert($sql);
	}
	
	/**
	 * 根据学生ID和类型获取列表
	 * @param unknown $fuId
	 * @param unknown $flag 0-表示最好 1-表示最差
	 * @param unknown $type 1-互评 2-他评
	 */
	public function getGoodorBadList($fuId, $flag, $type){
		$sql = "SELECT * FROM `goodorbad` WHERE `fu_id` = '".$fuId."' AND `goodorbad_flag` = '".$flag."' AND `goodorbad_type` = '".$type."' ";
		return $this->fetchAll($sql);
	}
	
	public function AddScore($u_id,$p_id,$type,$score,$c_id){
		$sql="INSERT INTO `user_score`(`us_id`,`fu_id`,`asspro_id`,`us_type`,`us_score`,`us_iscommit`,`us_create_user_id`,`us_create_time`)
				VALUES(NULL,'".$u_id."','".$p_id."','".$type."','".$score."',0,'".$c_id."',NOW())";
		return $this->insert($sql);
	}
	
	public function updateScore($id,$score,$p_id){
		$sql = "UPDATE `user_score` SET `us_score` = '".$score."' WHERE `fu_id` = '".$id."' AND `us_create_user_id`='".$p_id."'";
		return $this->update($sql);
	}
    public function getSearchlist02($asspro_id, $page = 1, $num = 10, $isnew = 0, $grade = null, $major = 0, $college = 0, $name = null){
        $select = "SELECT `user_score`.*, `front_user`.`fu_username`, `front_user`.`fu_realname`, `assessment_project`.* FROM `user_score` "
            . "INNER JOIN `front_user` ON `user_score`.`fu_id` = `front_user`.`fu_id` "
            . "INNER JOIN `assessment_project` ON `user_score`.`asspro_id` = `assessment_project`.`asspro_id` ";

        $where_asspro_id = array();
        for($i=0; $i<count($asspro_id);$i++){
            $where_asspro_id[$i] = $asspro_id[$i]['asspro_id'];
        }
        $filter = "WHERE `user_score`.`asspro_id` in (".implode(",",$where_asspro_id).")  ";
        $filter .= "AND `user_score`.`us_type` =$isnew ";

        if ($college){
            $filter .= "AND `front_user`.`fu_college` = '".$college."' ";
        }
        if ($grade){
            $filter .= "AND `front_user`.`fu_grade` = '".$grade."' ";
        }
        if ($major){
            $filter .= "AND `front_user`.`fu_college` = '".$college."' ";
        }
        if ($name=null){
            $filter .= "AND `front_user`.`fu_realname` = '".$name."' ";
        }
        $order = "ORDER BY `user_score`.`us_create_time` DESC ";
        $limit = "LIMIT ".($page-1)*$num.",".$num." ";
        $sql = $select.$filter.$order.$limit;
        $sqltotal = $select.$filter.$order;
        $list = $this->fetchAll($sql);
        $total = count($this->fetchAll($sqltotal));
        $totalPage = ceil($total / $num);
        return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }
	/**
	 * 获取筛选列表
	 * @param number $page
	 * @param number $num
	 * @param string $xuenian
	 * @param number $isnew
	 * @param string $grade
	 * @param number $major
	 * @param number $college
	 * @param string $name
	 * @return multitype:number unknown
	 */
	public function getSearchlist($asspro_id, $page = 1, $num = 10, $isnew = 0, $grade = null, $major = 0, $college = 0, $name = null){
		$select = "SELECT `user_score`.*, `front_user`.`fu_username`, `front_user`.`fu_realname`, `assessment_project`.* FROM `user_score` "
				. "INNER JOIN `front_user` ON `user_score`.`fu_id` = `front_user`.`fu_id` "
				. "INNER JOIN `assessment_project` ON `user_score`.`asspro_id` = `assessment_project`.`asspro_id` ";
        $filter = "WHERE `user_score`.`asspro_id` = '".$asspro_id."' ";
			//if ($isnew){
		//$filter .= "AND `user_score`.`us_type` = '".$isnew."' ";
		//}
		if ($college){
			$filter .= "AND `front_user`.`fu_college` = '".$college."' ";
		}
		if ($grade){
			$filter .= "AND `front_user`.`fu_grade` = '".$grade."' ";
		}
		if ($major){
			$filter .= "AND `front_user`.`fu_college` = '".$college."' ";
		}
        if ($name != "null"){
            $filter .= "AND `front_user`.`fu_realname` = '".$name."' ";
        }
		$order = "ORDER BY `user_score`.`us_create_time` DESC ";
		$limit = "LIMIT ".($page-1)*$num.",".$num." ";
		$sql = $select.$filter.$order.$limit;
		$sqltotal = $select.$filter.$order;
		$list = $this->fetchAll($sql);
		$total = count($this->fetchAll($sqltotal));
		$totalPage = ceil($total / $num);
		return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}
	/**
	 * 获得本年内最近一次的得分
	 * @param unknown_type $fu_id
	 * @param unknown_type $type
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getyearscore($fu_id,$type){
		$year = date('Y');
		$sql = "select * from user_score left join assessment_project on user_score.asspro_id = assessment_project.asspro_id where us_type = '".$type."' and fu_id = '".$fu_id."' and us_create_time > '".$year."' and us_create_time < '".($year+1)."' order by us_create_time desc limit 1";
		return $this->fetchRow($sql);
	}

	/**
	 * 检测本学年，这两个学生是否互评
	 * @param unknown_type $fu_id
	 * @param unknown_type $us_create_user_id
	 * @return Ambigous <boolean, multitype:>
	 */
	public function checkuser($fu_id,$us_create_user_id){
		$year = date("Y");
		$sql = "select * from user_score where fu_id = '".$fu_id."' and us_create_user_id = '".$us_create_user_id."' and us_create_time > '".$year."' and us_create_time < '".($year+1)."'";
		return $this->fetchRow($sql);
	}
	
	public function getisorno($id,$p_id){
		$sql = "SELECT `user_score`.`us_id`,`user_score`.`fu_id`,`user_score`.`us_score`,`user_score`.`us_iscommit` FROM `user_score` WHERE `user_score`.`fu_id`='".$id."' AND `user_score`.`us_create_user_id`='".$p_id."'";
		return $this->fetchRow($sql);
	}
	
	public function updatecommit($u_id,$p_id){
		$sql = "UPDATE `user_score` SET `user_score`.`us_iscommit`=1 WHERE `user_score`.`fu_id` = '".$u_id."' AND `user_score`.`us_create_user_id` = '".$p_id."'";
		return $this->update($sql);
	}
	/**
	 * 通过学生id，获得本年的自评得分
	 * @param unknown_type $fu_id
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getziping($fu_id){
		$year = date("Y");
        $sql = "select * from user_score where fu_id = ".$fu_id."  and us_type = 0 and us_create_time > '".$year."' and us_create_time < '".($year+1)."' order by us_create_time desc ";
		return $this->fetchRow($sql);
	}
	/**
	 * 获得本年fuid的所有互评
	 * @param unknown_type $fu_id
	 * @return Ambigous <boolean, multitype:>
	 */
	public function gethuping($fu_id){
		$year = date("Y");
		$sql = "select * from user_score where fu_id = ".$fu_id."  and us_type = 1 and us_create_time > '".$year."' and us_create_time < '".($year+1)."' order by us_create_time desc ";
		return $this->fetchAll($sql);
	}
	/**
	 * 获得这个学生的他评结果
	 * @param unknown_type $fu_id
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getstudentscore($fu_id){
		$year = date("Y");
		$sql = "select us_score from user_score where fu_id = ".$fu_id."  and us_type = 2 and us_create_time > '".$year."' and us_create_time < '".($year+1)."' order by us_create_time desc ";
		//echo $sql;
		return $this->fetchRow($sql);
	}
	/**
	 * 通过学生id，获得本年的她评得分
	 * @param unknown_type $fu_id
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getbeiping($major){
		$sql = "SELECT * FROM `user_socre` LEFT JOIN `front_user` ON `user_score`.fu_id=`front_user`.fu_id WHERE `front_user`.fu_major=".$major;
	    return $this->fetchAll($sql);
	}
	
	public function gethupingbymajor($major){
		$sql = "SELECT * FROM `user_score` LEFT JOIN `front_user` ON `user_score`.fu_id=`front_user`.fu_id WHERE `front_user`.fu_major=".$major;
		return $this->fetchAll($sql);
	}
	
	public function getziping2($major, $flag = 0){
		if ($flag){
			$sql = "SELECT COUNT(*) AS NUM FROM `user_score` LEFT JOIN `front_user` ON `user_score`.fu_id=`front_user`.fu_id WHERE `front_user`.fu_major=".$major." AND `user_score`.us_type=1";
		}else{
			$sql = "SELECT * FROM `user_score` LEFT JOIN `front_user` ON `user_score`.fu_id=`front_user`.fu_id WHERE `front_user`.fu_major=".$major." AND `user_score`.us_type=1";
		}
		return $this->fetchAll($sql);
	}
	
	public function gettaping($fu_id, $flag = 0){
		$year = date("Y");
		$sql = "select * from user_score where fu_id = ".$fu_id."  and us_type = 2 and us_create_time > '".$year."' and us_create_time < '".($year+1)."' order by us_create_time desc limit 1";
		return $this->fetchRow($sql);
	}
	
	public function getUslist($type, $major, $flag = 0, $grade = 0){
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
		if ($flag){
				 if ($type == 2){
				 	$sql = "SELECT COUNT(DISTINCT `user_score`.`fu_id`) AS NUM FROM `user_score` "
				 		. "LEFT JOIN `assessment_project` ON `user_score`.`asspro_id` = `assessment_project`.`asspro_id` "
				 		. "LEFT JOIN `front_user` ON `user_score`.`fu_id` = `front_user`.`fu_id` "
				 		. "WHERE `user_score`.`us_type` = '".$type."' AND `front_user`.fu_major='".$major."' AND `assessment_project`.`asspro_xuenian` = '".$str."' ";
				 }else {
				 	$sql = "SELECT COUNT(*) AS NUM FROM `user_score` "
				 		 . "LEFT JOIN `assessment_project` ON `user_score`.`asspro_id` = `assessment_project`.`asspro_id` "
				 		 . "LEFT JOIN `front_user` ON `user_score`.`fu_id` = `front_user`.`fu_id` "
				 		 . "WHERE `user_score`.`us_type` = '".$type."' AND `front_user`.fu_major='".$major."' AND `assessment_project`.`asspro_xuenian` = '".$str."' ";
				 }
				 if ($grade){
				 	$sql .= "AND `front_user`.fu_grade ='".$grade."' ";
				 }
			//echo $sql;
		}else{
			$sql = "SELECT `user_score`* FROM `user_score` "
				 . "LEFT JOIN `assessment_project` ON `user_score`.`asspro_id` = `assessment_project`.`asspro_id` "
				 . "LEFT JOIN `front_user` ON `user_score`.`fu_id` = `front_user`.`fu_id` "
				 . "WHERE `user_score`.`us_type` = '".$type."' AND `front_user`.fu_major='".$major."' AND `assessment_project`.`asspro_xuenian` = '".$str."'";
			if ($grade){
				$sql .= "AND `front_user`.fu_grade ='".$grade."' ";
			}
		}
		return $this->fetchAll($sql);
	}
	
	public function getNum($type, $major, $createId){
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
		$sql = "SELECT COUNT(*) AS NUM FROM `user_score` "
			. "LEFT JOIN `assessment_project` ON `user_score`.`asspro_id` = `assessment_project`.`asspro_id` "
			. "LEFT JOIN `front_user` ON `user_score`.`fu_id` = `front_user`.`fu_id` "
			. "WHERE `user_score`.`us_type` = '".$type."' AND `front_user`.fu_major='".$major."' AND `user_score`.`us_create_user_id`='".$createId."' AND `assessment_project`.`asspro_xuenian` = '".$str."'";
		//echo $sql;
		return $this->fetchRow($sql);
	}
	
	public function getHupinglist($major, $grade = 0){
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
		$sql = "SELECT DISTINCT `user_score`.`us_create_user_id`, `front_user`.`fu_username`, `front_user`.`fu_realname` FROM `user_score` "
			. "LEFT JOIN `assessment_project` ON `user_score`.`asspro_id` = `assessment_project`.`asspro_id` "
			. "LEFT JOIN `front_user` ON `user_score`.`us_create_user_id` = `front_user`.`fu_id` "
			. "WHERE `user_score`.`us_type` = '1' AND `front_user`.fu_major='".$major."' AND `assessment_project`.`asspro_xuenian` = '".$str."' ";
		if ($grade){
			$sql .= "AND `front_user`.`fu_grade` ='".$grade."' ";
		}
		//echo $sql;
		return $this->fetchAll($sql);
	}

	/**
	 * 通过学生fuid 获得对应的assproid
	 * @param unknown_type $fu_id
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getassproud($fu_id,$college=2){
		//如果$college=1 则是去找校级的，其它都是学院的
		if($college == 1){
			$flag = '=';
		}else{
			$flag = '!=';
		}
		$sql = "select * from user_score left join assessment_project on user_score.asspro_id = assessment_project.asspro_id where assessment_project.asspro_college ".$flag." 0 and user_score.fu_id = ".$fu_id." order by asspro_create_time desc ";
		return $this->fetchRow($sql);
	}

	
	public function getTapinglist($major, $grade = 0){
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
		$sql = "SELECT DISTINCT `user_score`.`fu_id`, `front_user`.`fu_username`, `front_user`.`fu_realname` FROM `user_score` "
			. "LEFT JOIN `assessment_project` ON `user_score`.`asspro_id` = `assessment_project`.`asspro_id` "
			. "LEFT JOIN `front_user` ON `user_score`.`fu_id` = `front_user`.`fu_id` "
			. "WHERE `user_score`.`us_type` = '2' AND `front_user`.fu_major='".$major."' AND `assessment_project`.`asspro_xuenian` = '".$str."' ";
		if ($grade){
			$sql .= "AND `front_user`.fu_grade='".$grade."' ";
		}
		return $this->fetchAll($sql);
	}
	
	public function getBeipingNum($major, $fuid, $type, $grade = 0){
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
		$sql = "SELECT COUNT(*) AS NUM FROM `user_score` "
			. "LEFT JOIN `assessment_project` ON `user_score`.`asspro_id` = `assessment_project`.`asspro_id` "
			. "LEFT JOIN `front_user` ON `user_score`.`fu_id` = `front_user`.`fu_id` "
			. "WHERE `user_score`.`us_type` = '".$type."' AND `front_user`.fu_major='".$major."' AND `user_score`.`fu_id`='".$fuid."' AND `assessment_project`.`asspro_xuenian` = '".$str."' ";
		if ($grade){
			$sql .= "AND `front_user`.fu_grade ='".$grade."' ";
		}
		return $this->fetchRow($sql);

	}
	
	public function getTongjiNum($type, $createId){
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
		if ($type == 1 || $type == 2){
			$sql = "SELECT `user_score`.*, `front_user`.`fu_username`, `front_user`.`fu_realname` FROM `user_score` "
				 . "LEFT JOIN `assessment_project` ON `user_score`.`asspro_id` = `assessment_project`.`asspro_id` "
				 . "LEFT JOIN `front_user` ON `user_score`.`fu_id` = `front_user`.`fu_id` "
				 . "WHERE `user_score`.`us_type` = '".$type."' AND `user_score`.`us_create_user_id` = '".$createId."' AND `assessment_project`.`asspro_xuenian` = '".$str."'";
		}else if ($type == 3 ){
			$sql = "SELECT `user_score`.*, `front_user`.`fu_username`, `front_user`.`fu_realname` FROM `user_score` "
				 . "LEFT JOIN `assessment_project` ON `user_score`.`asspro_id` = `assessment_project`.`asspro_id` "
				 . "LEFT JOIN `front_user` ON `user_score`.`us_create_user_id` = `front_user`.`fu_id` "
				 . "WHERE `user_score`.`us_type` = '1' AND `user_score`.`fu_id` = '".$createId."' AND `assessment_project`.`asspro_xuenian` = '".$str."'";
		}else {
			$sql = "SELECT `user_score`.*, `front_user`.`fu_username`, `front_user`.`fu_realname` FROM `user_score` "
				. "LEFT JOIN `assessment_project` ON `user_score`.`asspro_id` = `assessment_project`.`asspro_id` "
				. "LEFT JOIN `front_user` ON `user_score`.`us_create_user_id` = `front_user`.`fu_id` "
				. "WHERE `user_score`.`us_type` = '2' AND `user_score`.`fu_id` = '".$createId."' AND `assessment_project`.`asspro_xuenian` = '".$str."'";
		}
		//echo $sql;
		return $this->fetchAll($sql);
	}

	/**
	 * 获得同major,同grade的所有学生的得分,互评type=2
	 * @param unknown_type $major
	 * @param unknown_type $grade
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getalltaping($major,$grade,$type){
		$sql = "select user_score.* 
				from user_score 
				LEFT JOIN front_user on user_score.fu_id = front_user.fu_id  
				where user_score.us_type = ".$type." and front_user.fu_major = '".$major."' and front_user.fu_grade = '".$grade."'";
		//echo $sql;
		return $this->fetchAll($sql);
	}
	/**
	 * 获得全部相同专业的学生的分组统计
	 * @param unknown_type $major
	 * @param unknown_type $grade
	 * @param unknown_type $type
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getcount($major,$grade,$type){
		$sql = "select user_score.fu_id,count(*)  as nums
				from user_score 
				LEFT JOIN front_user on user_score.fu_id = front_user.fu_id  
				where user_score.us_type = ".$type." and front_user.fu_major = '".$major."' and front_user.fu_grade = '".$grade."' group by (user_score.fu_id)";
		return $this->fetchAll($sql);
	}


	
	/**
	 * 获取不是自评的列表
	 * @param unknown $asspro_id
	 * @param number $page
	 * @param number $num
	 * @param number $isnew
	 * @param string $grade
	 * @param number $major
	 * @param number $college
	 * @param string $name
	 * @return multitype:number Ambigous <boolean, multitype:>
	 */
	public function getNotZipingSearchlist($asspro_id ,$page = 1, $num = 10, $isnew = 0, $grade = null, $major = 0, $college = 0, $name = "null"){
		$select = "SELECT DISTINCT `user_score`.`fu_id` FROM `user_score` "
				. "INNER JOIN `front_user` ON `user_score`.`fu_id` = `front_user`.`fu_id` "
				. "INNER JOIN `assessment_project` ON `user_score`.`asspro_id` = `assessment_project`.`asspro_id` ";
		$filter = "WHERE `user_score`.`asspro_id` = '".$asspro_id."' ";
		//if ($isnew){
		//$filter .= "AND `user_score`.`us_type` = '".$isnew."' ";
		//}
		if ($grade){
			$filter .= "AND `front_user`.`fu_grade` = '".$grade."' ";
		}
		if ($major){
			$filter .= "AND `front_user`.`fu_major` = '".$major."' ";
		}
		if ($college){
			$filter .= "AND `front_user`.`fu_college` = '".$college."' ";
		}
		if ($name != "null"){
			$filter .= "AND `front_user`.`fu_realname` = '".$name."' ";
		}
		$order = "ORDER BY `user_score`.`us_create_time` DESC ";
		$limit = "LIMIT ".($page-1)*$num.",".$num." ";
		$sql = $select.$filter.$order.$limit;

		$sqltotal = $select.$filter.$order;
		$list = $this->fetchAll($sql);
		$total = count($this->fetchAll($sqltotal));
		$totalPage = ceil($total / $num);
		return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}

	
	public function getScoreByType($userid,$type){
		if ($type == 0||$type==3){
			$sql = "SELECT `user_score`.* FROM `user_score` WHERE `fu_id` = '".$userid."' AND `us_type` = '".$type."' ";
			//echo $sql;
			return $this->fetchRow($sql);
		}else{
			$sql = "SELECT DISTINCT `fu_id` FROM `user_score` WHERE `fu_id` = '".$userid."' AND `us_type` = '".$type."' ";
			return $this->fetchRow($sql);
		}
	}
	
	public function getScoreByGradeAndMajor($major, $grade, $type){
		$sql = "SELECT DISTINCT `user_score`.`fu_id` FROM `user_score` "
			 . "LEFT JOIN `front_user` ON `user_score`.`fu_id` = `front_user`.`fu_id` "
			 . "WHERE `front_user`.`fu_major` = '".$major."' AND `front_user`.`fu_grade` = '".$grade."' AND `user_score`.`us_type` = '".$type."' ";
		return $this->fetchAll($sql);
	}
	/**
	 * 通过这个
	 * @param u
	 */
public function  getisnew_info($select01){
     $sql="select * from assessment_project where asspro_id=$select01 ";
     return $this->fetchRow($sql);
}

}