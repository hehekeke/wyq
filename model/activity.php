<?php
/**
* Create On 2014-4-21 ����3:10:26
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class activity extends Model{
	
	/**
	 * 添加活动
	 * @param unknown_type $title
	 * @param unknown_type $theme
	 * @param unknown_type $content
	 * @param unknown_type $address
	 * @param unknown_type $class
	 * @param unknown_type $starttime
	 * @param unknown_type $endtime
	 * @param unknown_type $type
	 * @param unknown_type $level
	 * @param unknown_type $scale
	 * @param unknown_type $keywords
	 * @param unknown_type $dutyPerson
	 * @param unknown_type $isApproval
	 * @param unknown_type $isRecommend
	 * @param unknown_type $createId
	 * @param unknown_type $lon
	 * @param unknown_type $lat
	 * @return Ambigous <boolean, number>
	 */
	public function addActivity($title, $theme, $content, $address, $class, $schoolyear, $starttime, $endtime, $type, $level, $scale, $keywords, $dutyPerson, $isApproval, $isRecommend, $createId, $lon = null, $lat = null){
		if ($lon){
			$sql = "INSERT INTO `activity` "
				 . "(`activity_id`, `activity_title`, `activity_theme`, `activity_content`, `activity_address` "
				 . "`activity_class`, `activity_school_year`, `activity_start_time`, `activity_end_time`, `at_id`, `activity_level`, "
				 . "`activity_scale`, `activity_keywords`, `activity_duty_preson`, `activity_longitude`, "
				 . "`activity_latitude`, `activity_approval`, `activity_recommend`, `activity_istop`, "
				 . "`activity_remove`, `activity_ispublish`, `activity_create_user_id`, `activity_create_time`) "
				 . "VALUES "
				 . "(NULL, '".$title."', '".$theme."', '".$content."', '".$address."', "
				 . "'".$class."', '".$schoolyear."', '".$starttime."', '".$endtime."', '".$type."', '".$level."', "
				 . "'".$scale."', '".$keywords."', '".$dutyPerson."', '".$lon."', "
				 . "'".$lat."', '0', '0', '".$isRecommend."', NULL, "
				 . "'0', '0', '".$createId."', NOW());";
		}else{
			$sql = "INSERT INTO `activity` "
				 . "(`activity_id`, `activity_title`, `activity_theme`, `activity_content`, `activity_address` "
				 . "`activity_class`, `activity_school_year`, `activity_start_time`, `activity_end_time`, `at_id`, `activity_level`, "
				 . "`activity_scale`, `activity_keywords`, `activity_duty_preson`, `activity_longitude`, "
				 . "`activity_latitude`, `activity_approval`, `activity_recommend`, `activity_istop`, "
				 . "`activity_remove`, `activity_ispublish`, `activity_create_user_id`, `activity_create_time`) "
				 . "VALUES "
				 . "(NULL, '".$title."', '".$theme."', '".$content."', '".$address."', "
				 . "'".$class."', '".$schoolyear."', '".$starttime."', '".$endtime."', '".$type."', '".$level."', "
				 . "'".$scale."', '".$keywords."', '".$dutyPerson."', '".$lon."', "
				 . "'".$lat."', '0', '0', '".$isRecommend."', NULL, "
				 . "'0', '0', '".$createId."', NOW());";
		}
		return $this->insert($sql);
	}
	
	/**
	 * 获取活动列表(分页)
	 * @param number $page
	 * @param number $num
	 * @param number $activitytype
	 * @param number $source
	 * @param number $createId
	 * @param number $organizers
	 * @param number $state
	 * @param number $recommend
	 * @return multitype:number Ambigous <boolean, multitype:>
	 */
	public function getActivityListPageModel($xuenian=0,$page = 1, $num = 10, $activitytype = 0, $source=0, $keywords='',$state = 1,$createId = 0, $isajex=0,$showRemove=1,$organizers = 0,  $recommend = 2,$activity_start_time=null){

		$select = "SELECT `activity`.*, `activity_type`.`at_name`, `admin`.`admin_realname` FROM `activity` "
				. "LEFT JOIN `activity_type` ON `activity`.`at_id` = `activity_type`.`at_id` "
				. "LEFT JOIN `admin` ON `activity`.`activity_create_user_id` = `admin`.`admin_id` ";
		$where = "WHERE 1 ";
        if($xuenian){
            $where .= "AND `activity`.`activity_school_year` = '".$xuenian."' ";
        }
		if ($activitytype){
			$where .= "AND `activity`.`at_id` = '".$activitytype."' ";
		}
        if($source){
            $source=$source-1;
            $where .= "AND `activity`.`activity_class` ='".$source."' ";
        }
    		if($keywords != null){
			$where .= "AND `activity`.`activity_keywords` = '".$keywords."' ";
		}
		if ($showRemove !== null) {
			$where .= "AND `activity`.`activity_remove` = '".$showRemove."' ";
		}
		if ($organizers) {
			$where .= "AND `activity`.`organizers_id` = '".$organizers."' ";
		}
		if ($createId) {
			$where .= "AND `activity`.`activity_create_user_id` = '".$createId."' ";
		}
		    $where .= "AND `activity`.`activity_approval` = '1' and `activity_remove` = '1'";
    	if ($recommend != 2) {
			$where .= "AND `activity`.`activity_recommend` = '".$recommend."' ";
		}
		if($activity_start_time !== null){
			$where .= "AND activity.activity_start_time = '".$activity_start_time."' ";
		}
		$order = " ORDER BY `activity`.`activity_istop` DESC, `activity`.`activity_create_time` DESC ";
		$limit = "LIMIT ".($page-1)*$num.",".$num."";
		$sql = $select.$where.$order.$limit;
		$sqltotal = $select.$where.$order;
		$list = $this->fetchAll($sql);
		if($isajex){
        	return json_encode($list);
			exit;
		}
		$total = count($this->fetchAll($sqltotal));
		$totalPage = ceil($total / $num);
		return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}
	//获取周年活动(超级管理员)
    public function getActivityListPageModel02($page = 1, $num = 10, $activitytype = 0, $source=0, $keywords='',$state = 1,$createId = 0, $isajex=0,$showRemove=1,$organizers = 0,  $recommend = 2,$activity_start_time=null){
        $select = "SELECT `activity`.*, `activity_type`.`at_name`, `admin`.`admin_realname` FROM `activity` "
            . "LEFT JOIN `activity_type` ON `activity`.`at_id` = `activity_type`.`at_id` "
            . "LEFT JOIN `admin` ON `activity`.`activity_create_user_id` = `admin`.`admin_id` ";
        $where = "WHERE 1 ";
        if ($activitytype){
            $where .= "AND `activity`.`at_id` = '".$activitytype."' ";
        }
        $where .= "AND `activity`.`activity_class` = '".$source."' ";
        if($keywords != null){
            $where .= "AND `activity`.`activity_keywords` = '".$keywords."' ";
        }
        if ($showRemove !== null) {
            $where .= "AND `activity`.`activity_remove` = '".$showRemove."' ";
        }
        if ($organizers) {
            $where .= "AND `activity`.`organizers_id` = '".$organizers."' ";
        }
        if ($createId) {
            $where .= "AND `activity`.`activity_create_user_id` = '".$createId."' ";
        }
        if ($state != 6 && $state != '-1' ) {
            $where .= "AND `activity`.`activity_approval` = '".$state."' ";
        }
        if($state==6 || $state===null){
            $where .= "AND `activity`.`activity_approval` = '1' and `activity_remove` = '1'";
        }
        if ($recommend != 2) {
            $where .= "AND `activity`.`activity_recommend` = '".$recommend."' ";
        }
        if($activity_start_time !== null){
            $where .= "AND activity.activity_start_time = '".$activity_start_time."' ";
        }

        $order = " ORDER BY `activity`.`activity_istop` DESC, `activity`.`activity_create_time` DESC ";
        $limit = "LIMIT ".($page-1)*$num.",".$num."";
        $sql = $select.$where.$order.$limit;
        $sqltotal = $select.$where.$order;
        $list = $this->fetchAll($sql);
        if($isajex){
            return json_encode($list);
            exit;
        }
        $total = count($this->fetchAll($sqltotal));
        $totalPage = ceil($total / $num);
        return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }
	//获取周年活动（非超级管理员）
    public function getActivityListPageModel05($activity_college,$page = 1, $num = 10, $activitytype = 0, $source=0, $keywords='',$state = 1,$createId = 0, $isajex=0,$showRemove=1,$organizers = 0,  $recommend = 2,$activity_start_time=null){
        $select = "SELECT `activity`.*, `activity_type`.`at_name`, `admin`.`admin_realname` FROM `activity` "
            . "LEFT JOIN `activity_type` ON `activity`.`at_id` = `activity_type`.`at_id` "
            . "LEFT JOIN `admin` ON `activity`.`activity_create_user_id` = `admin`.`admin_id` ";
        $where = "WHERE 1 ";
		$where .= "AND `activity`.`activity_college` = $activity_college ";
        if ($activitytype){
            $where .= "AND `activity`.`at_id` = '".$activitytype."' ";
        }
        $where .= "AND `activity`.`activity_class` = '".$source."' ";
        if($keywords != null){
            $where .= "AND `activity`.`activity_keywords` = '".$keywords."' ";
        }
        if ($showRemove !== null) {
            $where .= "AND `activity`.`activity_remove` = '".$showRemove."' ";
        }
        if ($organizers) {
            $where .= "AND `activity`.`organizers_id` = '".$organizers."' ";
        }
        if ($createId) {
            $where .= "AND `activity`.`activity_create_user_id` = '".$createId."' ";
        }
        if ($state != 6 && $state != '-1' ) {
            $where .= "AND `activity`.`activity_approval` = '".$state."' ";
        }
        if($state==6 || $state===null){
            $where .= "AND `activity`.`activity_approval` = '1' and `activity_remove` = '1'";
        }
        if ($recommend != 2) {
            $where .= "AND `activity`.`activity_recommend` = '".$recommend."' ";
        }
        if($activity_start_time !== null){
            $where .= "AND activity.activity_start_time = '".$activity_start_time."' ";
        }

        $order = " ORDER BY `activity`.`activity_istop` DESC, `activity`.`activity_create_time` DESC ";
        $limit = "LIMIT ".($page-1)*$num.",".$num."";
        $sql = $select.$where.$order.$limit;
        $sqltotal = $select.$where.$order;
        $list = $this->fetchAll($sql);
        if($isajex){
            return json_encode($list);
            exit;
        }
        $total = count($this->fetchAll($sqltotal));
        $totalPage = ceil($total / $num);
        return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }
	
	
	public function getActivityListPageModel03($page = 1, $num = 10, $activitytype = 0, $source = 0, $keywords='',$state = 1,$createId = 0, $isajex=0,$showRemove=1,$organizers = 0,  $recommend = 2,$activity_start_time=null){
        $select = "SELECT `activity`.*, `activity_type`.`at_name`, `admin`.`admin_realname` FROM `activity` "
            . "LEFT JOIN `activity_type` ON `activity`.`at_id` = `activity_type`.`at_id` "
            . "LEFT JOIN `admin` ON `activity`.`activity_create_user_id` = `admin`.`admin_id` ";
        $where = "WHERE 1 ";
        if ($activitytype){
            $where .= "AND `activity`.`at_id` = '".$activitytype."' ";
        }
        if ($source !== null) {
            $where .= "AND `activity`.`activity_class` = '".$source."' ";
        }
        if($keywords != null){
            $where .= "AND `activity`.`activity_keywords` = '".$keywords."' ";
        }
        if ($showRemove !== null) {
            $where .= "AND `activity`.`activity_remove` = '".$showRemove."' ";
        }
        if ($organizers) {
            $where .= "AND `activity`.`organizers_id` = '".$organizers."' ";
        }
        if ($createId) {
            $where .= "AND `activity`.`activity_create_user_id` = '".$createId."' ";
        }
        if ($state != 6 && $state != '-1' ) {
            $where .= "AND `activity`.`activity_approval` = '".$state."' ";
        }
        if($state==6 || $state===null){
            $where .= "AND `activity`.`activity_approval` = '6' and `activity_remove` = '1'";
        }
        if ($recommend != 2) {
            $where .= "AND `activity`.`activity_recommend` = '".$recommend."' ";
        }
        if($activity_start_time !== null){
            $where .= "AND activity.activity_start_time <= '".$activity_start_time."' AND activity.activity_end_time >= '".$activity_start_time."'  ";
        }

        $order = " ORDER BY `activity`.`activity_istop` DESC, `activity`.`activity_create_time` DESC ";
        $limit = "LIMIT ".($page-1)*$num.",".$num."";
        $sql = $select.$where.$order.$limit;
        //echo $sql;
        $sqltotal = $select.$where.$order;
        $list = $this->fetchAll($sql);
        if($isajex){
            return json_encode($list);
            exit;
        }
        $total = count($this->fetchAll($sqltotal));
        $totalPage = ceil($total / $num);
        return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }
	/**
	 * 根据活动类型和数据来源获取所有活动创建者ID
	 * @param number $activityType
	 * @param number $source
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getCreateUserId($activityType = 0, $source = 0){
		$select = "SELECT DISTINCT `activity`.activity_create_user_id FROM `activity` ";
		$where = "WHERE 1 ";
		if ($activityType){
			$where .= "AND `activity`.`at_id` = '".$activityType."' ";
		}
		if ($source) {
			$where .= "AND `activity`.`activity_class` = '".$source."' ";
		}
		$sql = $select.$where;
		return $this->fetchAll($sql);
	}
	
	public function getactivityDetails($id){
		$sql = "SELECT `activity`.`activity_id`,`activity`.`activity_title`,`activity`.`activity_theme`,`activity`.`activity_start_time`,`activity`.`activity_end_time`,`activity`.`activity_duty_preson`,`activity`.`activity_content` FROM `activity` WHERE `activity`.`activity_id`='".$id."'";
		return $this->fetchRow($sql);
	}
	

	/**
	 * 获取我关注的活动列表（分页）
	 * @param unknown_type $userId
	 * @param unknown_type $page
	 * @param unknown_type $num
	 * @return multitype:unknown number Ambigous <boolean, multitype:>
	 */
	public function getMyconcernedActivity($userId, $page = 1, $num = 10){
		$sql = "SELECT `comment`.`comment_user_id`, `activity`.* FROM `comment` "
			 . "LEFT JOIN `activity` ON `comment`.`activity_id` = `activity`.`activity_id` "
			 . "WHERE `comment`.`comment_user_id` = '".$userId."' AND `comment`.`comment_iswant` = '1' "
			 . "ORDER BY `activity`.`activity_create_time` DESC "
			 . "LIMIT ".($page-1)*$num.",".$num."";
		$sqltotal = "SELECT `comment`.`comment_user_id`, `activity`.* FROM `comment` "
			 	  . "LEFT JOIN `activity` ON `comment`.`activity_id` = `activity`.`activity_id` "
			      . "WHERE `comment`.`comment_user_id` = '".$userId."' AND `comment`.`comment_iswant` = '1' "
			      . "ORDER BY `activity`.`activity_create_time` DESC ";
		$list = $this->fetchAll($sql);
		$total = count($this->fetchAll($sqltotal));
		$totalPage = ceil($total / $num);
		return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}
	
	/**
	 * 插入活动签到记录
	 * @param unknown_type $userId
	 * @param unknown_type $lon
	 * @param unknown_type $lat
	 * @return Ambigous <boolean, number>
	 */
	public function addActivityRegistration($userId, $lon, $lat){
		$sql = "INSERT INTO `activity_registration` "
				. "(`activity_registration_id`, `activity_registration_user_id`, `activity_registration_Longitude`, `activity_registration_latitude`, `activity_registration_create_time`) "
		 		 . "VALUES "
		 		 		. "(NULL, '".$userId."', '".$lon."', '".$lat."', NOW());";
		return $this->insert($sql);
	}
	
	/**
	 * 插入活动签到图片
	 * @param unknown_type $activityId
	 * @param unknown_type $picId
	 * @return Ambigous <boolean, number>
	 */
	public function addActivityRegistrationPicture($activityId, $picId){
		$sql = "INSERT INTO `activity_picture` "
			. "(`ap_id`, `activity_id`, `pic_id`) "
			. "VALUES "
			. "(NULL, '".$activityId."', '".$picId."');";
		return $this->insert($sql);
	}
	
	/**
	 * 获取活动类型列表
	 */
	public function getActivityTypeList(){
		$sql = "SELECT * FROM `activity_type`";
		return $this->fetchAll($sql);
	}
	
	/**
	 * 获取各项平均分,总评分人数
	 * @param unknown_type $activityId
	 * @param unknown_type $sgId
	 */
	public function getActivityScore($activityId, $sgId){
		$sql = "SELECT AVG(`user_activity_secondary`.`uas_score`) AS `avg_score`, COUNT(*) AS total FROM `user_activity_secondary` "
			 . "LEFT JOIN `activity_secondary` ON `activity_secondary`.`as_id` = `user_activity_secondary`.`as_id` "
			 . "LEFT JOIN `activity` ON `activity_secondary`.`activity_id` = `activity`.`activity_id` " 
             . "WHERE `activity`.`activity_id` = '".$activityId."' AND `activity_secondary`.`sg_id` = '".$sgId."' ;";
		return $this->fetchAll($sql);
	}
	
	/**
	 * 插入活动评分
	 * @param unknown_type $asId
	 * @param unknown_type $userId
	 * @param unknown_type $score
	 * @return Ambigous <boolean, number>
	 */
	public function addActivityScore($asId, $userId, $score){
		$sql = "INSERT INTO `user_activity_secondary` "
			 . "(`uas_id`, `as_id`, `user_id`, `uas_score`) "
			 . "VALUES "
			 . "(NULL, '".$asId."', '".$userId."', '".$score."');";
		return $this->insert($sql);
	}
	
	/**
	 * 获取活动评论
	 * @param unknown_type $activityId
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getCommentsByActivityId($activityId){
		$sql = "SELECT `comment`.*, `picture`.`pic_link` FROM `comment` "
			 . "LEFT JOIN `front_user` ON `comment`.`comment_user_id` = `front_user`.`fu_id` "
		     . "LEFT JOIN `picture` ON `front_user`.`pic_id` = `picture`.`pic_id` "
			 . "LEFT JOIN `activity` ON `comment`.`activity_id` = `activity`.`activity_id` "
			 . "WHERE `comment`.`activity_id` = '$activityId' AND `comment`.`comment_content` != NULL "
			.  "ORDER BY `comment`.`comment_create_time` DESC;";
		return $this->fetchAll($sql);
	}
	
	/**
	 * 添加活动评论
	 * @param unknown_type $userId
	 * @param unknown_type $content
	 * @param unknown_type $activityId
	 * @return Ambigous <boolean, number>
	 */
	public function addComment($userId, $content, $activityId){
		$sql = "INSERT INTO `comment` "
			 . "(`comment_id`, `comment_user_id`, `comment_content`, `activity_id`, `comment_iswant`, `comment_user_attitude`, `comment_useful_num`, `comment_create_time`) "
			 . "VALUES "
			 . "(NULL, '".$userId."', '.$content.', '".$activityId."', NULL, NULL, '0', NOW());";
		echo "".$sql;
		return $this->insert($sql);
	}
	
	/**
	 * 设置为有用
	 * @param unknown_type $cid
	 * @return resource
	 */
	public function setUserful($cid){
		$sql = "UPDATE `comment` SET `comment_useful_num` = `comment_useful_num` + 1  WHERE `comment`.`comment_id` = '".$cid."';";
		return $this->update($sql);
	}
	
	/**
	 * 根据活动ID获取主办方
	 * @param unknown $activityId
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getOriByActivityId($activityId){
		$sql = "SELECT `activity_organizer`.*, `organizers`.`organizers_name` FROM `activity_organizer` "
			 . "LEFT JOIN `organizers` ON `activity_organizer`.`organizers_id` = `organizers`.`organizers_id` "
			 . "WHERE `activity_id` = '".$activityId."'";
		return $this->fetchAll($sql);
	}
	
	/**
	 * 根据活动ID获取承办方
	 * @param unknown $activityId
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getUdtByActivityId($activityId){
		$sql = "SELECT `activity_undertake`.*, `undertake`.`undertake_name` FROM `activity_undertake` "
			 . "LEFT JOIN `undertake` ON `activity_undertake`.`undertake_id` = `undertake`.`undertake_id` "
			 . "WHERE `activity_id` = '".$activityId."'";
		return $this->fetchAll($sql);
	}
	
	/**
	 * 获取活动详情
	 * @param unknown $activityId
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getActivityDetail($activityId){
		$sql = "SELECT `activity`.*, `admin`.`admin_realname`, `activity_type`.`at_name` FROM `activity` "
		     . "LEFT JOIN `admin` ON `activity`.`activity_create_user_id` = `admin`.`admin_id` "
             . "LEFT JOIN `activity_type` ON `activity`.`at_id` = `activity_type`.`at_id` "
			 . "WHERE `activity`.`activity_id` = '".$activityId."';";
		return $this->fetchRow($sql);
	}
/***********************qcc***************************/
    /**
    //获取特定的评论的详情
     **/
    public  function getcomInfo($commet_id){
        $sql="select * from comment where comment_id=$commet_id";
        return $this->fetchRow($sql);
    }
    /**
    //评论有用的次数加1
     **/
    public  function  update_comuseful($commet_id,$useful_num,$fu_id,$activity_id,$content){
        $sql1="insert into message (fu_id,activity_id,mes_type,mes_content,mes_create_time) values ('".$fu_id."',$activity_id,1,'".$content."','".date('Y-m-d H:i:s',time())."')";
        // var_dump($sql1);
        $this->insert($sql1);
        $sql=" update comment set comment_useful_num=$useful_num where comment_id=$commet_id";
        return $this->update($sql);
    }
    /**
    //获取所有的敏感词
     **/
    public function getAllsensitive(){
        $sql="SELECT * from sensitive_words";
         return $this->fetchAll($sql);
    }
	/**
		//辅学活动目标维护	
	**/
	public function mubiao(){
		$sql="SELECT * from secondary_goals";
		return $this->fetchAll($sql);
	}
    /**
      // 辅学活动主办方维护
     **/
    public function  zhubanfang(){
        $sql="select *from organizers ";
        return $this->fetchAll($sql);
    }
    /**
    // 辅学活动承办方维护
     **/
    public function  chengbanfang(){
        $sql="select *from undertake ";
        return $this->fetchAll($sql);
    }
	/**
		//辅学活动目标添加	
	**/
	public function addmu($sg_name){
		$sql="insert into secondary_goals (`sg_name`,`sg_create_time`) values ('".$sg_name."',now())";
		return $this->insert($sql);
	}
	//获取单挑目标信息
	public function getOneMu($id){
		$sql="SELECT * from secondary_goals where sg_id='".$id."'";
		return $this->fetchRow($sql);
	}
	
	//更改单条目标
	public function updateMu($id,$name){
		$sql=" update secondary_goals set sg_name='".$name."' where `sg_id`='".$id."'";
		return $this->update($sql);
	}
	//删除单条目标
	public function delMu($id){
		$sql=" delete from secondary_goals where `sg_id`='".$id."'";
		return $this->del($sql);
	}
	
	//获取单挑活动类型信息
	public function getOneType($id){
		$sql="SELECT * from activity_type where at_id='".$id."'";
		return $this->fetchRow($sql);
	}
    //辅学活动类型维护	
	public function type(){
		$sql="SELECT * from activity_type";
		return $this->fetchAll($sql);
	}
	//增加活动类型
	public function addType($at_name){
		$sql="insert into activity_type (`at_name`,`at_create_time`) values ('".$at_name."',now())";
		return $this->insert($sql);
	}
	//更改单条活动类型
	public function updateType($id,$name){
		$sql=" update activity_type set at_name='".$name."' where `at_id`='".$id."'";
		return $this->update($sql);
	}
	//删除单条活动类型
	public function delType($id){
		$sql=" delete from activity_type where `at_id`='".$id."'";
		return $this->del($sql);
	}
	

	//辅学活动维护列表
	public function ActivityList($type){
		//$sql="";
	
	}
	//addANew添加活动
    public function addANew($data,$pic_id='',$flag=""){
        //组装sql语句
        if($data['activity_organizer']){
            $activity_organizer=$data['activity_organizer'];//主办
            unset($data['activity_organizer']);
        }
        if($data['activity_undertake']){
            $activity_undertake=$data['activity_undertake'];
            unset($data['activity_undertake']);
        }
        if($data['activity_fuxue_mubiao']){
            $activity_fuxue_mubiao=$data['activity_fuxue_mubiao'];//mibiao
            unset($data['activity_fuxue_mubiao']);
        }
        $counts=count($data);
        $sql="insert into `activity` (";
        foreach($data as $key=>$value){
            $sql.='`'.$key.'`,';
        }
        $sql.="`activity_create_time`) values (";
        //拼接values值
        foreach($data as $key=>$value){
            $sql.="'".$value."',";
        }
        $sql.="now());";

        $insertId=$this->insert($sql);
        //插入活动添加人的部门
        if($data['activity_college']){
            $sql="insert into `activity_secondary` (`activity_id`,`activity_college`) values ('".$insertId."','".$data['activity_college']."')";
            $this->insert($sql);
        }
        //插入辅学目标
        foreach($activity_fuxue_mubiao as $value){
            $sql="insert into `activity_secondary` (`activity_id`,`sg_id`) values ('".$insertId."','".$value."')";
            $first=$this->insert($sql);
        }
        //插入辅学主办方
        foreach($activity_organizer as $value){
            $sql="insert into `activity_organizer` (`activity_id`,`organizers_id`) values ('".$insertId."','".$value."')";
            $second=$this->insert($sql);
        }
        //插入辅学承办方
        foreach($activity_undertake as $value){
            $sql="insert into `activity_undertake` (`activity_id`,`undertake_id`) values ('".$insertId."','".$value."')";
            $last=$this->insert($sql);
        }
        //插入图片活动表
        if($pic_id){
            for($k=0;$k<count($pic_id);$k++){
                $sql="insert into `activity_picture` (`activity_id`,`pic_id`) values ('".$insertId."','".$pic_id[$k]."')";
                $result_pic=$this->insert($sql);
            }
            if($result_pic){
                $lastPic=1;
            }
        }
        //返回正确
        if($first || $second || $last || $lastPic){
            return true;
        }else{
            return false;
        }
    }
	
	//图片上传
	public function uploadPic($picUrl){
		$sql="insert into `picture` (`pic_link`) values('".$picUrl."')";
		return $this->insert($sql);
	}
	
	//辅学活动单条查看
	public function getActivityInfo($id){
		$sql="select activity.* , activity_type.* , admin.admin_realname  from `activity` "
		."left join activity_type on activity.at_id=activity_type.at_id "
		."left join admin on activity.activity_create_user_id=admin.admin_id "
		." where `activity_id`='".$id."'";
		$activityBaseInfo=$this->fetchRow($sql);
		//取出辅学目标
		$sql1="select secondary_goals.sg_name from secondary_goals"
		." left join activity_secondary on activity_secondary.sg_id=secondary_goals.sg_id"
		." where activity_secondary.activity_id='".$id."'";
		$activityBaseInfo['secondary_goals']=$this->fetchAll($sql1);
		//承办方
		$activityBaseInfo['organizers']=$this->getOriByActivityId($id);
		$activityBaseInfo['undertakers']=$this->getUdtByActivityId($id);
		return $activityBaseInfo;
	}
	//获取活动的approve
    public function  get_ActInfo($id){
        $sql="select * from `activity` where `activity_id` = '".$id."'";
        return $this->fetchRow($sql);
    }
    //撤销活动时发送消息
    public function insert_message($year,$create_id,$content,$date){
        $sql="insert into `admin_message` (xuenian,admin_id,mess_content,create_time) values ('".$year."','".$create_id."','".$content."','".$date."')";
        //$sql="insert into `admin_message` (xuenian,admin_id,mess_content,create_time) values ('204','3','ffff','".$date."')";
        return $this->insert($sql);
    }
	//辅学活动修改
	public function editActivityInfo($id,$data){
			$sql="update activity set ";
			$counts=count($data);
			$tmp=1;
			foreach($data as $key=>$value){
				if($tmp<$counts){
					$sql.= $key."='".$value."',";
					$tmp++;
				}else{
					$sql.= $key."='".$value."'";					
				}			
			}
			$sql.=" where activity_id='".$id."'";
			return $this->update($sql);			

			
	}
    public function editActivityInfo02($id,$data='',$user_id){
        if(!$data){
            //$sql1="select * from `activity` where `activity_id` = '".$id."'";
            return $this->getActivityInfo($id);
        }else{
            $sql="update activity set ";
            $counts=count($data);
            $tmp=1;
            foreach($data as $key=>$value){
                if($tmp<$counts){
                    $sql.= $key."='".$value."',";
                    $tmp++;
                }else{
                    $sql.= $key."='".$value."'";
                }
            }
            $sql.=" where activity_id='".$id."'";
            return $this->update($sql);
        }

    }
	
	//删除单条活动
	public function delActivity($id){
		$sql="delete from activity where `activity_id`='".$id."'";
		return $this->del($sql);
	}
	
	//活动管理
	public function ManageActivity($id,$approval,$remove=''){
		if($remove != null){
			$sql="update  activity set `activity_remove`='".$remove."' where `activity_id`='".$id."'";
			return $this->update($sql);
		}else{
		    $sql="update  activity set `activity_approval`='".$approval."' where `activity_id`='".$id."'";
			return $this->update($sql);
		}
		
	}
	
	//根据活动ID复制记录并修改时间
	public function updateCopyRow($id,$activity_class,$act_college){
		$sql="select * from activity where activity_id='".$id."'";
		$data=$this->fetchRow($sql);
		$counts=count($data);
		foreach($data as $key=>&$value){
			if($value==''){
				unset($data[$key]);
			}
			if($key=='activity_create_time'){
				unset($data[$key]);
			}
			if($key=='activity_approval'){
				$data[$key]='3';
			}
			if($key=='activity_class'){
				$data[$key]=$activity_class;
			}
            if($key=='activity_college'){
                $data[$key]=$act_college;
            }
            if($key=='activity_approve_user_id'){
                $data[$key]='0';
            }
            if($key=='activity_if_tijiao'){
                $data[$key]='0';
            }
            if($key=='activity_ispublish'){
                $data[$key]='1';
            }
            if($key=='parent_id'){
                $data[$key]='0';
            }
		}
		$counts=count($data);
		$sql="insert into `activity` (";
		foreach($data as $key=>$value){
			$sql.='`'.$key.'`,';						
		}
		$sql.="`activity_create_time`) values (";
		foreach($data as $key=>$value){
			if($key=='activity_id'){
				$sql.="null,";
			}else{
				$sql.="'".$value."',";	
			}
					
		}
		$sql.="now());";
		$insertId=$this->insert($sql);
        if($activity_class==0){
             $sql_com="select * from comment where activity_id=$id";//获取原来评论表里面的所有的评论
             $result_com=$this->fetchAll($sql_com);
            if($result_com){
               for($k=0;$k<count($result_com);$k++){
                    $comment_user_id=$result_com[$k]['comment_user_id'];
                    $comment_content =$result_com[$k]['comment_content'];
                    $activity_id=$insertId;
                    $comment_iswant=$result_com[$k]['comment_iswant'];
                    $comment_user_attitude=$result_com[$k]['comment_user_attitude'];
                    $comment_useful_num=$result_com[$k]['comment_useful_num'];
                    $comment_create_time=$result_com[$k]['comment_create_time'];
                    $parent_id=$result_com[$k]['parent_id'];
                    $parent_user_id=$result_com[$k]['parent_user_id'];
                   $if_read=$result_com[$k]['if_read'];
                   $sql_insert = "INSERT INTO `comment` "
                       . "(`comment_user_id`, `comment_content`, `activity_id`, `comment_iswant`, `comment_user_attitude`, `comment_useful_num`, `comment_create_time`, "
                       . "`parent_id`, `parent_user_id`, `if_read`) "
                       . "VALUES "
                       . "('$comment_user_id','$comment_content','$activity_id','$comment_iswant','$comment_user_attitude','$comment_useful_num','$comment_create_time','$parent_id','$parent_user_id','$if_read');";

                   $this->insert($sql_insert);
               }
            }
            //获取原来的活动鲜花次数
            $sql_xianhua="select * from activity_user_attitude where activity_id=$id";
            $result_xianhua=$this->fetchAll($sql_xianhua);
            if($result_xianhua){

                for($n=0;$n<count($result_xianhua);$n++){
                    $activity_id=$insertId;
                    $activity_iswant_num=$result_xianhua[$n]['activity_iswant_num'];
                    $activity_flowers_num=$result_xianhua[$n]['activity_flowers_num'];
                    $activity_egg_num=$result_xianhua[$n]['activity_egg_num'];
                    $sql_huodongxianhua = "INSERT INTO `activity_user_attitude` "
                        . "(`activity_id`, `activity_iswant_num`,`activity_flowers_num`,`activity_egg_num`) "
                        . "VALUES "
                        . "('$activity_id','$activity_iswant_num','$activity_flowers_num','$activity_egg_num');";
                    $this->insert($sql_huodongxianhua);
                }
            }

            //获取原来的活动的主办方
           $sql_zhuban="select * from activity_organizer where activity_id=$id";
            $result_zhuban=$this->fetchAll($sql_zhuban);
            if($result_zhuban){
                for($m=0;$m<count($result_zhuban);$m++){
                    $organizers_id=$result_zhuban[$m]['organizers_id'];
                    $activity_id=$insertId;
                    $sql_zhubanfang = "INSERT INTO `activity_organizer` "
                        . "(`organizers_id`, `activity_id`) "
                        . "VALUES "
                        . "('$organizers_id','$activity_id');";
                    $this->insert($sql_zhubanfang);
                }
            }
          //获取原来活动的辅学目标
            $sql_fuxuemubiao="select * from activity_secondary where activity_id=$id";
            $result_mubiao=$this->fetchAll($sql_fuxuemubiao);
            if($result_mubiao){
                for($m=0;$m<count($result_mubiao);$m++){
                    $activity_id=$insertId;
                    $sg_id=$result_mubiao[$m]['sg_id'];
                    $old_sg_id=$result_mubiao[$m]['as_id'];
                    $sg_name=$result_mubiao[$m]['sg_name'];
                    $sql_chengbanfang = "INSERT INTO `activity_secondary` "
                        . "(`activity_id`, `sg_id`,`sg_name`) "
                        . "VALUES "
                        . "('$activity_id','$sg_id','$sg_name');";
                   $As_id= $this->insert($sql_chengbanfang);

                   $sql_fuxuepingfen="select * from user_activity_secondary where as_id=$old_sg_id";
                    $result_fuxuepingfen=$this->fetchAll($sql_fuxuepingfen);
                    if($result_fuxuepingfen){
                        for($k=0;$k<count($result_fuxuepingfen);$k++){
                            $as_id=$As_id;
                            $user_id=$result_fuxuepingfen[$k]['user_id'];
                            $uas_score=$result_fuxuepingfen[$k]['uas_score'];

                            $sql_pingfen = "INSERT INTO `user_activity_secondary` "
                                . "(`as_id`, `user_id`,`uas_score`) "
                                . "VALUES "
                                . "('$as_id','$user_id','$uas_score');";
                            $As_id= $this->insert($sql_pingfen);
                        }
                    }
                }
            }

       //获取活动的承办方
            $sql_chengban="select * from activity_undertake where activity_id=$id";
            $result_chengban=$this->fetchAll($sql_chengban);
            if($result_chengban){
                for($a=0;$a<count($result_chengban);$a++){
                    $undertake_id=$result_chengban[$a]['undertake_id'];
                    $activity_id=$insertId;
                    $sql_chengbanfang = "INSERT INTO `activity_undertake` "
                        . "(`undertake_id`, `activity_id`) "
                        . "VALUES "
                        . "('$undertake_id','$activity_id');";
                    $this->insert($sql_chengbanfang);
                }
            }

        }
	}
	
	//取出审核活动
    public function getCheckActivity($organizers_id=null,$source=null,$checkstatus=null,$page,$pageSize){
        $sql="select * from activity "
            . "left join activity_type on activity.at_id=activity_type.at_id left join activity_organizer on activity_organizer.activity_id =activity.activity_id left join organizers on organizers.organizers_id = activity_organizer.organizers_id";
        $where=" where 1 and activity.activity_remove=1 ";
        if($organizers_id !== null){
            $where.=" and activity.activity_college='".$organizers_id."'";
        }
        if($source !== null){
            $where.=" and activity.activity_class='".$source."'";
        }
        if($checkstatus !== null){
            if($checkstatus=='0'){
                $where.=" and ( activity.activity_approval='0' and activity.activity_if_tijiao ='0') or ( activity.activity_approval='4' and activity.activity_if_tijiao ='0') ";
            }else{
                $where.=" and activity.activity_approval='".$checkstatus."' and and activity.activity_if_tijiao ='0'";
            }
        }
		//
		if($checkstatus === null){
			$where.=" and ((activity.activity_approval='0' and activity.activity_if_tijiao ='0') "
					." or (activity.activity_approval='4'  and activity.activity_if_tijiao ='0' )"
					." or (activity.activity_approval='1'  and activity.activity_if_tijiao ='0') "
					." or (activity.activity_approval='2'  and activity.activity_if_tijiao ='0')) ";		
		}
		
		$sql.=$where;
		$sql.=" order by activity_create_time desc limit ".($page-1)*$pageSize." ,".$pageSize;
		$list = $this->fetchAll($sql);
		$total = count($list);
		$totalPage = ceil($total/$pageSize);
       return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}

    //取出审核活动
    public function getCheckActivity02($act_college,$source=null,$checkstatus=null,$page,$pageSize){
        $sql="select * from activity "
            . "left join activity_type on activity.at_id=activity_type.at_id left join activity_organizer on activity_organizer.activity_id =activity.activity_id left join organizers on organizers.organizers_id = activity_organizer.organizers_id";
        $where=" where 1 and activity.activity_remove=1 ";
        $where.=" and activity.activity_college=$act_college";
        if($source !== null){
            $where.=" and activity.activity_class='".$source."'";
        }
        if($checkstatus !== null){
            if($checkstatus=='0'){
                $where.=" and ( activity.activity_approval='0' and activity.activity_if_tijiao ='0') or ( activity.activity_approval='4' and activity.activity_if_tijiao ='0') ";
            }else{
                $where.=" and activity.activity_approval='".$checkstatus."' and and activity.activity_if_tijiao ='0'";
            }
        }
        //
        if($checkstatus === null){
            $where.=" and ((activity.activity_approval='0' and activity.activity_if_tijiao ='0') "
                ." or (activity.activity_approval='4'  and activity.activity_if_tijiao ='0' )"
                ." or (activity.activity_approval='1'  and activity.activity_if_tijiao ='0') "
                ." or (activity.activity_approval='2'  and activity.activity_if_tijiao ='0')) ";
        }

        $sql.=$where;
        $sql.=" order by activity_create_time desc limit ".($page-1)*$pageSize." ,".$pageSize;
        $list = $this->fetchAll($sql);
		$total = count($list);
		$totalPage = ceil($total / $pageSize);
       return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }

	//取出发布活动(超级管理员和学工部人员)
	public function getPublishActivity($source=null,$publshStatus=null,$page,$pageSize){
		$sql="select activity.activity_id,activity_ispublish,activity.activity_create_time,activity_if_tijiao,activity_if_import,activity.activity_title,activity.activity_approval,activity.activity_class,activity_type.at_name from activity "
		. "left join activity_type on activity.at_id=activity_type.at_id";
		$where=" where activity_if_tijiao='1' and activity_approval='1' and activity_remove='1'";
		if($source !== null){
			$where.=" and activity.activity_class='".$source."'";
		}
		if($publshStatus !== null){
			$where.=" and activity.activity_ispublish='".$publshStatus."'";
		}
		$sql.=$where;
		$sql.=" order by activity_create_time desc limit ".($page-1)*$pageSize." ,".$pageSize;

		$list = $this->fetchAll($sql);
		$total = count($list);
		$totalPage = ceil($total / $pageSize);
       return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}

    //取出发布活动(非超级管理员和学工部人员)
    public function getPublishActivity02($act_college,$source=null,$publshStatus=null,$page,$pageSize){
       
       
		$sql="select activity.activity_id,activity_ispublish,activity.activity_create_time,activity_if_tijiao,activity_if_import,activity.activity_title,activity.activity_approval,activity.activity_class,activity_type.at_name from activity "
            . "left join activity_type on activity.at_id=activity_type.at_id";
        $where=" where activity_if_tijiao='1' and activity_approval='1' and activity_remove='1' and activity_college=$act_college ";
        if($source !== null){
            $where.=" and activity.activity_class='".$source."'";
        }
        if($publshStatus !== null){
            $where.=" and activity.activity_ispublish='".$publshStatus."'";
        }
        $sql.=$where;
        $sql.=" order by activity_create_time desc limit ".($page-1)*$pageSize." ,".$pageSize;

		$list = $this->fetchAll($sql);
		$total = count($list);
		$totalPage = ceil($total / $pageSize);
       return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }
	
	/*************tcl后台************************/
	//活动数据
	public function getDetailById($activity_id){
		$sql = "SELECT * FROM `activity` WHERE `activity`.`activity_id` = '".$activity_id."'";
		//var_dump($sql);
		return $this->fetchRow($sql);
	}
	//获取活动数据的具体内容
	public function getActivityDesc($activity_id){
		$sql = "SELECT `activity`.*, `admin`.`admin_realname`, `activity_type`.`at_name`, `organizers`.`organizers_name`, `undertake`.`undertake_name` FROM `activity` "
		     . "LEFT JOIN `admin` ON `activity`.`activity_create_user_id` = `admin`.`admin_id` "
             . "LEFT JOIN `activity_type` ON `activity`.`at_id` = `activity_type`.`at_id` "
             . "INNER JOIN `activity_organizer` ON `activity`.`activity_id` = `activity_organizer`.`activity_id` INNER JOIN `organizers` ON `activity`.`activity_id` = `organizers`.`organizers_id`"
             . "INNER JOIN `activity_undertake` ON `activity`.`activity_id` = `activity_undertake`.`activity_id` INNER JOIN `undertake` ON `activity`.`activity_id` = `undertake`.`undertake_id`"
			 . "WHERE `activity`.`activity_id` = '".$activity_id."';";
		//var_dump($sql);
		return $this->fetchRow($sql);
	}
	//获取辅学活动的类型
	public function getAssistActivityPageModel(){
	    $sql = "SELECT * FROM  secondary_activity ";
	    //var_dump($sql);
	    return $this->fetchAll($sql);
	}
	//修改辅学活动介绍
	public function editFuactivity($sa_id, $sa_content){
		$sql = "UPDATE `secondary_activity` SET `sa_content` = '".$sa_content."' WHERE `secondary_activity`.`sa_id` = '".$sa_id."';";
		//var_dump($sql);
		return $this->update($sql);
	}
    public function getAssistDetailById($sa_id){
    	$sql = "SELECT * FROM `secondary_activity` WHERE `secondary_activity`.`sa_id` = '".$sa_id."'";
    	//var_dump($sql);
    	return $this->fetchRow($sql);
    }
    //想参加，扔鸡蛋，献鲜花（后台）
    public function getUserAttitude($activityId){
    	$sql = "select activity_user_attitude.activity_iswant_num,activity_user_attitude.activity_flowers_num,activity_user_attitude.activity_egg_num from activity_user_attitude where activity_user_attitude.activity_id = '".$activityId."'";
		return $this->fetchAll($sql);
    }
	//活动数据
	public function editActivitydata($activityId,$flowers,$egg,$want){
		$sql = "UPDATE `activity_user_attitude` SET `activity_flowers_num` = '".$flowers."',`activity_egg_num` = '".$egg."',`activity_iswant_num` = '".$want."' WHERE `activity_user_attitude`.`activity_id` = '".$activityId."';";
		//var_dump($sql);
		return $this->update($sql);
	}
	//如果数据库中没有数据
	public function addActivitydata($activityId,$flowers0,$egg0,$want0){
		$sql = "insert into activity_user_attitude (aua_id,activity_id,activity_iswant_num,activity_flowers_num,activity_egg_num) values(NULL,'".$activityId."','".$want0."','".$flowers0."','".$egg0."')";
		return $this->insert($sql);
	}
	//活动评论维护(获取所有评论)
	public function getActivityCommentList($page = 1,$num = 10,$activity_title=''){
		$select = "select comment.*,front_user.* from comment left join front_user on comment.comment_user_id=front_user.fu_id ";
		$where = " and 1 order by comment_create_time desc Limit ".($page-1)*$num.",".$num."";
		if($activity_title!==null){
			$sql="select comment.*,front_user.* from comment left join front_user on comment.comment_user_id=front_user.fu_id  left join activity on comment.activity_id = activity.activity_id where activity.activity_title = '".$activity_title."' order by comment_create_time desc Limit ".($page-1)*$num.",".$num."";
			//var_dump($sql);
			$list = $this->fetchAll($sql);
			//var_dump($list);
			$total = count($this->fetchAll($sql));
			//var_dump($total);
			$totalPage = ceil($total / $num);
			return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
		}
		$sql = $select.$where;
		//var_dump($sql);
		$list = $this->fetchAll($sql);
		//var_dump($list);
		$total = count($this->fetchAll($select));
		//var_dump($total);
		$totalPage = ceil($total / $num);
		return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}
	//删除活动评论
	public function delComment($id){
		$sql = "DELETE  FROM `comment` WHERE `comment`.`comment_id` = '".$id."'";
		//var_dump($sql);
		return $this->del($sql);
	}
	/*********************************tcl后台完******************************************/
	/*****************************************唐春林(前台)**所有方法需要加是否发布判断******************************************/
	/**
	 *DATA：2014-7-31
	 *editor:tcl@tiptimes.com
	 *前台:辅学活动
	 */
    //获取所有的周年活动
    public function getActivity01($activity_class,$keywords,$page = 1,$num = 10){
        if($activity_class==1){
            $sql_activity="select * from activity where activity_class=$activity_class AND activity_remove=1 and activity_ispublish = 1 order by activity_start_time desc LIMIT ".($page-1)*$num.",".$num." ";
        }else{
            $sql_activity="select * from activity where activity_class=$activity_class AND activity_remove=1 and activity_ispublish = 1 order by activity_if_import desc LIMIT ".($page-1)*$num.",".$num." ";
        }
        if($keywords!==null){
           $sql_activity="select * from activity where activity_class=$activity_class AND activity_remove=1 and activity_ispublish = 1 AND activity_keywords like '%".$keywords."%' order by activity_start_time desc LIMIT ".($page-1)*$num.",".$num." ";
        }
        $list = $this->fetchAll($sql_activity);
        if($keywords!==null){
            $filter= " activity_class=".$activity_class." AND activity_remove=1 and activity_ispublish = 1 AND activity_keywords like '%".$keywords."%'";
        }else{
            $filter= " activity_class=".$activity_class." AND activity_remove=1 and activity_ispublish = 1";
        }
        $total = $this->getTotal('activity',$filter);
        $totalPage = ceil($total / $num);
        return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }

    //获取活动的主办方的id
    public function getZhubanfangid($activity_id){
        $sql_zhubanfangid="select * from activity_organizer where activity_id=$activity_id";
        return $this->fetchAll($sql_zhubanfangid);
    }
    //获取活动主办方的name
    public function getZhubanfangname($organizers_id){
        $sql_zhubanfangname="select * from organizers where organizers_id=$organizers_id";
      return $this->fetchRow($sql_zhubanfangname);
    }
   //获取活动类型
    public function getHuodongleixing($activity_at_id){
        $sql_huodongleixing="select * from activity_type where at_id=$activity_at_id";
        return $this->fetchRow($sql_huodongleixing);
    }
	//辅学活动：查看周、年活动介绍
	public function getWeekActivity($activity_class){
		$sql = "SELECT secondary_activity.* FROM secondary_activity WHERE secondary_activity.secondary_class = '".$activity_class."'";
		//ar_dump($sql);
		return $this->fetchRow($sql);
	}
	//活动类型
	public function getWeekActivityType(){
		$sql = "select activity_type.* from activity_type";
		return $this->fetchAll($sql);
	}
	//主办方
	public function getWeekActivityOrg(){
		$sql = "select organizers.* from organizers";
		return $this->fetchAll($sql);
	}
    //活动来源
    public function getWeekActivityOrg02($id,$org_id){
       if($id=="1"||$org_id=="23"){
           $sql = "select * from admin_organize";
           }else{
            $sql="select * from admin_organize where id=$org_id";
       }
    return $this->fetchAll($sql);
    }
	//承办方
	public function getUdtakeByActivityId($activityId){
		$sql = "SELECT distinct  `undertake`.* FROM `activity_undertake` "
				. "LEFT JOIN `undertake` ON `activity_undertake`.`undertake_id` = `undertake`.`undertake_id` "
				. "WHERE `activity_id` = '".$activityId."'";
		return $this->fetchAll($sql);
	}
	//活动具体详情
	public function getWeekActivityDesc($activity_class,$keywords=''){
		$select = "select activity.*,organizers.organizers_name from activity left JOIN activity_organizer ON activity.activity_id=activity_organizer.activity_id left JOIN organizers ON organizers.organizers_id=activity.activity_id"
        	." where activity.activity_class = '".$activity_class."' AND activity.activity_remove=0";
		$where = " and 1";
		if($keywords !== null){
			$where .= " and `activity`.`activity_keywords` = '".$keywords."'";
		}
		$sql = $select.$where;
       //var_dump($sql);
		$weekActivityInfo = $this->fetchAll($sql);
        //var_dump($weekActivityInfo);
		return $weekActivityInfo;
	}
	//活动筛选
	public function getWeekActivityByQurey($where,$activity_class=''){
		$sql = "select activity.*,organizers.organizers_name,activity_type.* from activity " ."left JOIN `activity_organizer` ON `activity`.`activity_id` = `activity_organizer`.`activity_id` left JOIN `organizers` ON `activity_organizer`.`organizers_id` = `organizers`.`organizers_id`"
				."left join activity_type on activity.at_id = activity_type.at_id ";
		if(strlen($where)<8){
			$sql.=$where." activity.activity_class='".$activity_class."'";
		}else{
			$sql.= $where." and activity.activity_class='".$activity_class."'";
		}
		$weekActivityInfo = $this->fetchAll($sql);
		return $weekActivityInfo;
	
	}
	
	//热门活动
	public function getHotActivity($activity_class){
        if($activity_class==0){
            $sql = "select activity.* from activity where activity.activity_class = '".$activity_class."' order by activity_start_time desc limit 0,5";
        }else{
		    $sql = "select activity.* from activity where activity.activity_if_import = 1 and activity.activity_class = '".$activity_class."' order by activity_start_time desc";
        }
		return $this->fetchAll($sql);
	}

    //热门活动
    public function getHotActivity02($activity_class){
        $ispublist=1;
        if($activity_class==0){
            $sql = "select activity.* from activity where activity.activity_class = '".$activity_class."' and  activity.activity_ispublish = '".$ispublist."' order by activity_read_num desc limit 0,5";
        }else{
            $sql = "select activity.* from activity where  activity.activity_class = '".$activity_class."' and  activity.activity_ispublish = '".$ispublist."' order by activity_read_num desc  limit 0,5";
        }
        return $this->fetchAll($sql);
    }
	
	//热门关键字搜索(周活动)
	public function getWeekHotKeywords($queryKeywords=''){
		$select = "select activity.* from activity where activity.activity_class = 1 and activity.activity_if_import = 1";
		$where = " and 1";
		if($queryKeywords!==null){
			$where .= " and activity.activity_keywords = '".$queryKeywords."'";
		}
		$sql = $select.$where;
		//var_dump($sql);
		return $this->fetchAll($sql);
	}
	//热门关键字搜索（年活动）
	public function getYearHotKeywords($queryKeywords=''){
		$select = "select activity.* from activity where activity.activity_class = 0 and activity.activity_if_import = 1";
		$where = " and 1";
		if($queryKeywords!==null){
			$where .= " and activity.activity_keywords = '".$queryKeywords."'";
		}
		$sql = $select.$where;
		//var_dump($sql);
		return $this->fetchAll($sql);
	}
	//获取活动的评论数
	public  function getCommentCounts($activityId){
		$sql = "select count(*) from comment where comment.activity_id = '".$activityId."'";
		return $this->fetchRow($sql);
	}
	//获取辅学目标
	public function getAssistGoalList($activityId){
		$sql = "select distinct secondary_goals.* from secondary_goals"
				." inner join activity_secondary on activity_secondary.sg_id=secondary_goals.sg_id "
				." where activity_secondary.activity_id='".$activityId."'";
		//var_dump($sql);
		return $this->fetchAll($sql);
	}
	
	//求得指定的辅学目标的平均分
	public function getAveragescoreOfActivity($activityId){
		$sql_first="select as_id from  activity_secondary where activity_id=$activityId";
		$result_as_id=$this->fetchAll($sql_first);
		//var_dump($result_as_id);
		$M=array();
		for($j=0;$j<count($result_as_id);$j++){
			$ss=$result_as_id[$j]['as_id'];
              $sql01="select uas_score from  user_activity_secondary where as_id=$ss";
              $result_score=$this->fetchAll($sql01);
			  // var_dump($result_score);  
			  $score_num=0;
			 for($i=0;$i<count($result_score);$i++){
			 //	  var_dump($result_score[$i]);
				$score_num+= $result_score[$i]['uas_score'];
			}
		//	var_dump($score_num);
			$result = sprintf("%.1f",$score_num/$i);
          $M[]=$result;
		}
		return $M;
	}
	//求该活动辅学目标总的评分人数
	public function getSumPerson($activityId){
		$sql = "select count(*) from user_activity_secondary" 
				  ." left join activity_secondary on user_activity_secondary.as_id = activity_secondary.as_id" 
		          ." where activity_secondary.activity_id = '".$activityId."'";
		return $this->fetchRow($sql);
	}
	//态度.存在
     public function addAttitudewant($activityId){
     	$sql ="UPDATE `activity_user_attitude` SET `activity_iswant_num` = `activity_iswant_num` + 1  WHERE `activity_user_attitude`.`activity_id` = '".$activityId."'";
     	return $this->update($sql);
     }
     public function addAttitudeflowers($activityId){
     	$sql ="UPDATE `activity_user_attitude` SET `activity_flowers_num` = `activity_flowers_num` + 1  WHERE `activity_user_attitude`.`activity_id` = '".$activityId."'";
     	return $this->update($sql);
     }
     public function addAttitudeegg($activityId){
     	$sql ="UPDATE `activity_user_attitude` SET `activity_egg_num` = `activity_egg_num` + 1  WHERE `activity_user_attitude`.`activity_id` = '".$activityId."'";
     	return $this->update($sql);
     }
     //不存在
     public function addUserAttitudeegg($activityId){
     	$sql = "insert into activity_user_attitude (aua_id,activity_id,activity_iswant_num,activity_flowers_num,activity_egg_num) values (NULL,'".$activityId."','0','0','1')";
     	//var_dump($sql);
     	return $this->insert($sql);
     }
     public function addUserAttitudewant($activityId){
     	$sql = "insert into activity_user_attitude (aua_id,activity_id,activity_iswant_num,activity_flowers_num,activity_egg_num) values (NULL,'".$activityId."','1','0','0')";
     	//var_dump($sql);
     	return $this->insert($sql);
     }
     public function addUserAttitudeflowers($activityId){
     	$sql = "insert into activity_user_attitude (aua_id,activity_id,activity_iswant_num,activity_flowers_num,activity_egg_num) values (NULL,'".$activityId."','0','1','0')";
     	//var_dump($sql);
     	return $this->insert($sql);
     }
	/**
	 * 获取活动评论
	 */
	public function getActivityCommentContent($activityId , $page = 1, $num = 10){
		    $sqltotal = "select comment.* from comment where comment.activity_id = '".$activityId."'";
			$sql = "SELECT `comment`.*, `picture`.`pic_link`,front_user.* FROM `comment` "
					. "LEFT JOIN `front_user` ON `comment`.`comment_user_id` = `front_user`.`fu_id` "
					. "LEFT JOIN `picture` ON `front_user`.`pic_id` = `picture`.`pic_id` "
					. "LEFT JOIN `activity` ON `comment`.`activity_id` = `activity`.`activity_id` "
				    . "WHERE `comment`.`activity_id` = '$activityId' and comment_content !=''"
				    . " order by comment.comment_create_time desc  limit ".($page-1)*$num.",".$num."";
			//var_dump($sql);
			$list = $this->fetchAll($sql);
			$total = count($this->fetchAll($sqltotal));
			//var_dump($total);
			$totalPage = ceil($total / $num);
			//var_dump($sql);
			return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}
	/**
	 * 辅学评分
	 * author:tcl@tiptimes.com
	 * data:2014-08-10
	 */
	public function fuxue_as_id($sg_id,$activity_id){
		 $sql_01="select as_id  from activity_secondary where sg_id='$sg_id' AND activity_id=$activity_id";
		  return  $this->fetchRow($sql_01);
	}
	public function fuxue_as_user($userId,$as_id){
		$sql_02="select * from user_activity_secondary where user_id=$userId AND as_id=$as_id";
		return  $this->fetchAll($sql_02);
	}
	public function  fuxue_as_insert($as_id,$userId,$score){
		$sql_03="insert into user_activity_secondary (as_id,user_id,uas_score) values ($as_id,$userId,$score)  ";
		//$sql_03="insert into user_activity_secondary (as_id,user_id,uas_score) values ()  ";
		return  $this->insert($sql_03);
	}
	/****************************************************THE END 唐春林*****************************************************/
	/****************hjw**********************/
	   /** 查重敏感词 */
    public function  reCheckMgc($sensitivewordsName){
        $sql="SELECT * FROM `sensitive_words` WHERE `sw_name`='".$sensitivewordsName."'";
        return $this->fetchAll($sql);
      }
    /** 获取敏感词列表 */
    public function  getSensitive_words_lists(){
        $sql="SELECT * FROM `sensitive_words` ";
        return $this->fetchAll($sql);
    }
    /** 获取敏感词列表 */
    public function  getSensitive_words_lists_02($page=1,$num=10){
        $sqltotal="SELECT * FROM sensitive_words";
        $sql="SELECT * FROM sensitive_words ";
        $limit = "LIMIT ".($page-1)*$num.",".$num."";
        $sql=$sql.$limit;
        $list= $this->fetchAll($sql);
        $total = count($this->fetchAll($sqltotal));
        $totalPage = ceil($total / $num);
        return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }
    /**添加敏感词  */
    public function addSensitiveWords($sensitivewordsname){
        $sql="INSERT INTO `sensitive_words` (`sw_name`) VALUES ('".$sensitivewordsname."')";
        return $this->insert($sql);

    }

    /** 删除敏感词 */
    public function delSensitiveWords($id){
        $sql="DELETE FROM `sensitive_words` WHERE `sw_id`='".$id."'";
        return $this->del($sql);
    }
    /** 获取一个敏感词信息 */
    public function  getSensitive_words_one($id){
        $sql="SELECT * FROM `sensitive_words` WHERE `sw_id`='".$id."'";
        return $this->fetchRow($sql);
    }
    /** 修改敏感词  */
    public function modifysensitivewords($id,$swname){
        $sql="UPDATE `sensitive_words` SET `sw_name`='".$swname."' WHERE `sw_id`='".$id."'";
        return $this->update($sql);
    }
    /** 查询敏感词 */
    public function searchsensitiveword($page=1,$num=10,$sensitive_word){
        $sql="SELECT * FROM `sensitive_words` WHERE `sw_name` like '%".$sensitive_word."%'";
        $list= $this->fetchAll($sql);
        $total = count($list);
        $totalPage = ceil($total /$num);
        return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }
	    /** 统计按照类型发布的活动量 */
    public function activity_type_counts($zn_id,$start_time,$end_time,$time_zn){
        $starttime=strtotime($start_time);   //获得起始时间时间戳
        $endtime=strtotime($end_time);
        $days=round(($endtime-$starttime)/86400)+1;
        //var_dump($time_zn);
        $num=ceil($days/$time_zn);

        for($i=1;$i<=$num;$i++){
            $starttime=strtotime($start_time);
            $end_time=date('Y-m-d',$starttime+($time_zn-1)*24*60*60);

            $sql="SELECT count(activity.activity_id) num,activity_type.at_id,activity_type.at_name FROM `activity_type`"
           ."left join activity on activity_type.at_id=activity.at_id and activity.activity_class='".$zn_id."' "
           ." and activity.activity_create_time between '".$start_time."' and '".$end_time."+1' group by  `at_id`";
            $arr=$this->fetchAll($sql);
            $sql1="SELECT * FROM `activity_type` ";
            $arr1=$this->fetchAll($sql1);

            $a=array();
            $a[0]=$start_time;
            $a[1]=$end_time;
            $a[2]=$arr;
            $b[]=$a;
            $start_time=date('Y-m-d',$starttime+7*24*60*60);
        }
        return $b;
    }

    //自己添加
    public function getActivityListPageModel2($id,$page = 1, $num = 10,$flag = 0){

        if($flag){
            $sql = "select * from activity_registration ar left join activity a on ar.activity_id = a.activity_id where ar.activity_registration_user_id = ".$id." order by ar.activity_registration_id desc";
            return $this->fetchAll($sql);
        }else{
            $sql = "select * from activity_registration ar left join activity a on ar.activity_id = a.activity_id where ar.activity_registration_user_id = ".$id." order by ar.activity_registration_id desc LIMIT ".($page-1)*$num.",".$num." ";
            $list = $this->fetchAll($sql);
            $filter= "activity_registration.activity_registration_user_id = ".$id;
            $total = $this->getTotal('activity_registration',$filter);
            $totalPage = ceil($total / $num);
            return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
        }
    }
    //自己添加
    public function getActivity($userID){
        $sql = "select * from activity_registration ar left join front_user f on ar.activity_registration_user_id = f.fu_id left join activity a on ar.activity_id = a.activity_id where  ar.activity_registration_user_id = ".$userID;
        return $this->fetchAll($sql);
    }
    //自己添加
    public function getActivityByYear($userID,$year){
        $sql = "select * from activity_registration ar left join activity a on ar.activity_id = a.activity_id where ar.activity_registration_user_id = ".$userID." and activity_school_year = ".$year." order by ar.activity_registration_id desc";
		return $this->fetchAll($sql);
    }
    //自己添加
    public function getAt(){
        $sql = "select * from activity_type";
        return $this->fetchAll($sql);
    }

    //自己添加
    public function getActivityByMajorGrade($fu_major,$fu_grade){
        $sql = "select * from activity_registration ar left join activity a on ar.activity_id = a.activity_id left join front_user f on ar.activity_registration_user_id = f.fu_id where fu_major = ".$fu_major." and fu_grade = ".$fu_grade." order by ar.activity_registration_create_time desc limit 0,2";
        return $this->fetchAll($sql);
    }
    //自己添加
    public function getCommentsByMajorGrade($fu_major,$fu_grade){
        $sql = "select * from comment c left join activity a on c.activity_id = a.activity_id left join front_user f on c.comment_user_id =  f.fu_id where fu_grade = ".$fu_grade." and fu_major = ".$fu_major." order by c.comment_create_time desc limit 0,2";
        return $this->fetchAll($sql);
    }
    //自己添加
    public function getActivityAll(){
        $sql = "select * from activity_registration ar left join activity a on ar.activity_id = a.activity_id left join front_user f on f.fu_id = ar.activity_registration_user_id order by activity_registration_create_time limit 0,2";
        return $this->fetchAll($sql);
    }
    //自己添加
    public function getCommentsByAll(){
        $sql = "select * from comment c left join activity a on c.activity_id = a.activity_id left join front_user f on c.comment_user_id =  f.fu_id order by c.comment_create_time desc limit 0,2";
        return $this->fetchAll($sql);
    }
    //自己添加
    public function getActivityByCollege($college){
        $sql = "select * from activity_registration ar left join activity a on ar.activity_id = a.activity_id left join front_user f on f.fu_id = ar.activity_registration_user_id where f.fu_college = ".$college." order by activity_registration_create_time limit 0,2";
        return $this->fetchAll($sql);
    }
    //自己添加
    public function getCommentsByCollege($college){
        $sql = "select * from comment c left join activity a on c.activity_id = a.activity_id left join front_user f on c.comment_user_id =  f.fu_id where fu_college = ".$college." order by c.comment_create_time desc limit 0,2";
        return $this->fetchAll($sql);
    }
    //个人中心，自己添加
    public function getFollowActivity($id){
        $sql = "select * from activity_user left join activity_registration on activity_registration.activity_id = activity_user.activity_id left join activity on activity.activity_id = activity_user.activity_id left JOIN `activity_organizer` ON `activity`.`activity_id` = `activity_organizer`.`activity_id` left JOIN `organizers` ON `activity_organizer`.`organizers_id` = `organizers`.`organizers_id`
            left join activity_type on activity.at_id = activity_type.at_id  where if_want = 1 and  activity_remove = 1 and fu_id = ".$id;
        return $this->fetchAll($sql);
    }
    //个人中心，自己添加
    public function getSelectActivity($id,$typesValues,$organizersValues){
        $sql = "select * from activity_user left join activity_registration on activity_registration.activity_id = activity_user.activity_id left join activity on activity.activity_id = activity_user.activity_id left JOIN `activity_organizer` ON `activity`.`activity_id` = `activity_organizer`.`activity_id` left JOIN `organizers` ON `activity_organizer`.`organizers_id` = `organizers`.`organizers_id`
           left join activity_type on activity.at_id = activity_type.at_id where if_want = 1 and activity_remove = 1 and fu_id = ".$id." and activity_type.at_id in ".$typesValues." and activity_organizer.organizers_id in ".$organizersValues;
        return $this->fetchAll($sql);

    }
    //个人中心，自己添加
    public function getSelectActivity2($id,$typesValues){
        $sql = "select * from activity_user left join activity_registration on activity_registration.activity_id = activity_user.activity_id left join activity on activity.activity_id = activity_user.activity_id left JOIN `activity_organizer` ON `activity`.`activity_id` = `activity_organizer`.`activity_id` left JOIN `organizers` ON `activity_organizer`.`organizers_id` = `organizers`.`organizers_id`
           left join activity_type on activity.at_id = activity_type.at_id where if_want = 1 and activity_remove = 1 and fu_id = ".$id." and activity_type.at_id in ".$typesValues;
        return $this->fetchAll($sql);

    }
    public function getSelectActivity3($id,$organizersValues){
        $sql = "select * from activity_user left join activity_registration on activity_registration.activity_id = activity_user.activity_id left join activity on activity.activity_id = activity_user.activity_id left JOIN `activity_organizer` ON `activity`.`activity_id` = `activity_organizer`.`activity_id` left JOIN `organizers` ON `activity_organizer`.`organizers_id` = `organizers`.`organizers_id`
           left join activity_type on activity.at_id = activity_type.at_id where if_want = 1 and activity_remove = 1 and fu_id = ".$id." and activity_organizer.organizers_id in ".$organizersValues;
        return $this->fetchAll($sql);
    }
    //8-15自己添加
    public function addFollowActivity($activityId,$userId){
        $sql = "insert into activity_user(activity_id,fu_id,if_want) values(".$activityId.",".$userId.",1)";
        return $this->insert($sql);
    }
    public function ifExistFollowActivity($activityId,$userId){
        $sql = "select * from activity_user where activity_id = ".$activityId." and fu_id = ".$userId;
        return $this->fetchAll($sql);
    }
    public function getAttitudeegg($activityId){
	
        $sql = "select * from activity_user_attitude where activity_id = ".$activityId;
        return $this->fetchAll($sql);
    }
	   //8-19添加
    //关注
    public function ifExistIsWantFollowActivity($activityId,$userId){
        $sql = "select * from activity_user where if_want = 1 and activity_id = ".$activityId." and fu_id = ".$userId;
        return $this->fetchAll($sql);
    }

    public function addIfWant($activityId,$userId){
        $sql = "update activity_user set if_want = 1 where activity_id = ".$activityId." and fu_id = ".$userId;
        return $this->update($sql);
    }
    //鲜花
    public function ifExistIsFlowerActivity($activityId,$userId){
        $sql = "select * from activity_user where if_flower = 1 and activity_id = ".$activityId." and fu_id = ".$userId;
        return $this->fetchAll($sql);
    }
    public function addFlowerActivity($activityId,$userId){
        $sql = "insert into activity_user(activity_id,fu_id,if_flower,if_egg) values(".$activityId.",".$userId.",1,1)";
        return $this->insert($sql);
    }
    public function addIfFlower($activityId,$userId){
        $sql = "update activity_user set if_flower = 1,if_egg = 1 where activity_id = ".$activityId." and fu_id = ".$userId;
        return $this->update($sql);
    }
    //鸡蛋
    public function ifExistIsEggActivity($activityId,$userId){
        $sql = "select * from activity_user where if_egg = 1 and activity_id = ".$activityId." and fu_id = ".$userId;
		return $this->fetchAll($sql);
    }
    public function addEggActivity($activityId,$userId){
        $sql = "insert into activity_user(activity_id,fu_id,if_egg,if_flower) values(".$activityId.",".$userId.",1,1)";
        return $this->insert($sql);
    }
    public function addIfEgg($activityId,$userId){
        $sql = "update activity_user set if_egg = 1,if_flower = 1 where activity_id = ".$activityId." and fu_id = ".$userId;
        return $this->update($sql);
    }
    /**还没放上服务器的*/
    //8-20添加，活动筛选
    public function getSelectAllActivity($typesValues,$organizersValues,$activity_class){
        $sql = "select * from activity left JOIN `activity_organizer` ON `activity`.`activity_id` = `activity_organizer`.`activity_id` left JOIN `organizers` ON `activity_organizer`.`organizers_id` = `organizers`.`organizers_id`
           left join activity_type on activity.at_id = activity_type.at_id where activity_class = ".$activity_class." and activity.activity_ispublish = 1 and activity.activity_remove = 1  and activity_type.at_id in ".$typesValues." and activity_organizer.organizers_id in ".$organizersValues."order by activity_start_time desc";
        return $this->fetchAll($sql);
    }
    public function getSelectAllActivity2($typesValues,$activity_class){
        $sql = "select * from activity left JOIN `activity_organizer` ON `activity`.`activity_id` = `activity_organizer`.`activity_id` left JOIN `organizers` ON `activity_organizer`.`organizers_id` = `organizers`.`organizers_id`
           left join activity_type on activity.at_id = activity_type.at_id where activity_class = ".$activity_class." and activity.activity_ispublish = 1 and activity.activity_remove = 1  and activity_type.at_id in ".$typesValues." order by activity_start_time desc";
        return $this->fetchAll($sql);
    }
    public function getSelectAllActivity3($organizersValues,$activity_class){
        $sql = "select * from activity left JOIN `activity_organizer` ON `activity`.`activity_id` = `activity_organizer`.`activity_id` left JOIN `organizers` ON `activity_organizer`.`organizers_id` = `organizers`.`organizers_id`
           left join activity_type on activity.at_id = activity_type.at_id where activity_class = ".$activity_class." and activity.activity_ispublish = 1 and activity.activity_remove = 1 and activity_organizer.organizers_id in ".$organizersValues." order by activity_start_time desc";
        return $this->fetchAll($sql);
    }
    public function getSelectAllActivity4($activity_class){
        $sql = "select * from activity left JOIN `activity_organizer` ON `activity`.`activity_id` = `activity_organizer`.`activity_id` left JOIN `organizers` ON `activity_organizer`.`organizers_id` = `organizers`.`organizers_id`
           left join activity_type on activity.at_id = activity_type.at_id where activity_class = ".$activity_class." and activity.activity_ispublish = 1 and activity.activity_remove = 1 order by activity_start_time desc";
        return $this->fetchAll($sql);
    }
    //8-21
    public function getActivityByActivityClass($activity_class){
        $sql = "select * from activity left JOIN `activity_organizer` ON `activity`.`activity_id` = `activity_organizer`.`activity_id` left JOIN `organizers` ON `activity_organizer`.`organizers_id` = `organizers`.`organizers_id`
           left join activity_type on activity.at_id = activity_type.at_id where activity.activity_ispublish = 1 and activity.activity_remove = 1 and activity_class = ".$activity_class;
        return $this->fetchAll($sql);
    }
    //8-24
    //判断是否已经设置过闹钟
    public function ifExistIsClockActivity($activityId,$userId){
        $sql = "select * from activity_user where if_clock = 1 and activity_id = ".$activityId." and fu_id = ".$userId;
        return $this->fetchAll($sql);
    }
    //添加活动用户关系字段
    public function addClockActivity($activityId,$userId,$time){
        $sql = "insert into activity_user(activity_id,fu_id,if_clock,clock_time) values(".$activityId.",".$userId.",1,".$time.")";
        return $this->insert($sql);
    }
    public function updateClock($activityId,$userId,$time){
        $sql = "update activity_user set if_clock = 1,clock_time = '".$time."' where activity_id = ".$activityId." and fu_id = ".$userId;
        return $this->update($sql);
    }
    //得出有设置闹钟的所有活动
    public function getClockActivity($id){
        $sql = "select * from activity_user left join activity on activity_user.activity_id = activity.activity_id where if_clock = 1 and fu_id = ".$id;
        return $this->fetchAll($sql);
    }
    public function getActivityById($id){
        $sql = "select * from activity where activity_id = ".$id;
        return $this->fetchAll($sql);
    }
    //8-25
    public function removeClock($au_id){
        $sql = "update activity_user set if_clock = 0 where au_id = ".$au_id;
        return $this->update($sql);
    }
    //闹钟
    public function  get_Clock($activity_id,$fu_id){
        $sql="select * from activity_user where activity_id=$activity_id AND fu_id=$fu_id AND if_clock=1";
        $result=$this->fetchRow($sql);
        if($result){
            return 1;
        }else{
            return 0;
        }
    }
    public function removeClock2($activity_id,$fu_id){
        $sql = "update activity_user set if_clock = 0 where activity_id = ".$activity_id." and fu_id = ".$fu_id;
        return $this->update($sql);
    }
    //8-31
    public function addActivityReadNum($activityId){
        $sql = "update activity set activity_read_num = activity_read_num + 1 where activity_id = ".$activityId;
        return $this->update($sql);
    }

    //9-9
    public function writeThoughts($ar_id,$content){
        $sql = "update activity_registration set activity_registration_thoughts = '".$content."' where activity_registration_id = ".$ar_id;
        return $this->update($sql);
    }
    public function getPicListById($activityId){
        $sql = "SELECT * from activity_picture ap left join picture p on ap.pic_id = p.pic_id where activity_id =".$activityId;
        return $this->fetchAll($sql);
    }
    public function signOnActivity($activity_id,$userId,$time){
        $sql = "insert into activity_registration(activity_id,activity_registration_user_id,activity_registration_create_time) values (".$activity_id.",".$userId.",'".$time."')";
        return $this->insert($sql);
    }
    public function addARP($activity_registration_id,$pic_id){
        $sql = "insert into activity_registration_picture(activity_registration_id,pic_id) values(".$activity_registration_id.",".$pic_id.")";
        return $this->insert($sql);
    }
    public function getPicLinkById($activity_registration_id){
        $sql="select * FROM activity_registration_picture arp LEFT JOIN picture p ON arp.pic_id = p.pic_id WHERE activity_registration_id =".$activity_registration_id;
        return $this->fetchAll($sql);
    }
    //9-11
    public function getHisActivityList($page = 1, $num = 1){
        $sql = "select * from activity left JOIN `activity_organizer` ON `activity`.`activity_id` = `activity_organizer`.`activity_id` left JOIN `organizers` ON `activity_organizer`.`organizers_id` = `organizers`.`organizers_id`
           left join activity_type on activity.at_id = activity_type.at_id where activity.activity_ispublish = 1 and activity.activity_remove = 1 order by activity_start_time desc LIMIT ".($page-1)*$num.",".$num."";
        $list = $this->fetchAll($sql);
        $filter = "activity.activity_ispublish = 1 and activity.activity_remove = 1";
        $total = $this->getTotal('activity',$filter);
        $totalPage = ceil($total / $num);
        return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }
    public function getAllHisActivityList(){
        $sql = "select * from activity left JOIN `activity_organizer` ON `activity`.`activity_id` = `activity_organizer`.`activity_id` left JOIN `organizers` ON `activity_organizer`.`organizers_id` = `organizers`.`organizers_id`
           left join activity_type on activity.at_id = activity_type.at_id where activity.activity_ispublish = 1 and activity.activity_remove = 1 order by activity_start_time desc ";
        return $this->fetchAll($sql);
    }

    /** APP加载首页推荐位滚动活动图片 */
    public function getLocationimages(){
        $now_time=date("Y-m-d H:i:s",time());
        $sql="SELECT a.activity_title activityTitle,p.pic_link activityPicture,a.activity_id FROM activity a,picture p,activity_picture ap where a.activity_id=ap.activity_id and ap.pic_id=p.pic_id and a.activity_if_import=1 and  a.activity_end_time>'".$now_time."'  order by activity_create_time desc limit 0,5";
        return $this->fetchAll($sql);
    }
    /** APP加载首页默认滚动活动图片 */
    public function getDefaultimages(){
        $sql="SELECT  a.activity_title activityTitle,p.pic_link activityPicture FROM activity a,picture p,activity_picture ap where a.activity_id=ap.activity_id and ap.pic_id=p.pic_id order by activity_create_time desc limit 0,5";
        return $this->fetchAll($sql);
    }
    /** 获取周活动 */
    public function getAppWeekActivity($size){
        $now_time=date("Y-m-d H:i:s",time());
        $sql="SELECT activity_id activityId,activity_title activityTitle,activity_start_time activityDate,activity_address activityLocation,activity_if_import recommendFlag FROM activity where activity_class=1 and activity_approval=1  and  activity_end_time>'".$now_time."' order by activity_if_import desc,activity_start_time desc limit $size,10";
        //var_dump($sql);
        return $this->fetchAll($sql);
    }
    /** 获取周活动主办方 */
    public function getAppOrganiser($act_id){
        $sql="select o.organizers_name from organizers o left join activity_organizer ao on o.organizers_id=ao.organizers_id where ao.activity_id=$act_id";
        return $this->fetchAll($sql);
    }

    /** 获取活动详情 */
    public function getActivityMsg($at_id){
        $sql="SELECT a.activity_read_num,aua.activity_iswant_num,aua.activity_flowers_num,aua.activity_egg_num,a.activity_title,a.activity_create_time,a.activity_start_time,a.activity_end_time,a.activity_address,a.activity_theme,a.activity_content,a.activity_scale,a.activity_level,a.activity_duty_preson FROM activity a left join activity_user_attitude aua on aua.activity_id=a.activity_id WHERE a.activity_id=$at_id ";
        //var_dump($sql);
        return $this->fetchRow($sql);
    }
    public function getActivityPic($at_id){
        $sql="SELECT p.pic_link from activity_picture ap left  join  picture p on ap.pic_id=p.pic_id where ap.activity_id=$at_id";
        return $this->fetchRow($sql);
    }
    /** 获取活动类型 */
    public function getActivitytype($at_id){
        $sql="select at.at_name from activity a left join activity_type at on at.at_id=a.at_id where a.activity_id=$at_id";
        return $this->fetchRow($sql);
    }
    /** 修改浏览数 */
    public function update_see_num($at_id){
        $sql="update activity set activity_read_num=activity_read_num+1 where activity_id=$at_id";
        return $this->update($sql);
    }
    /** 获取周活动评论 */
    public function getActivityComment($activity_id){
        $sql="SELECT c.comment_id,f.fu_realname fu_nickname,c.comment_content,c.comment_create_time,c.comment_useful_num,c.parent_id,f.fu_username FROM comment c left join front_user f on f.fu_id=c.comment_user_id  WHERE c.activity_id=$activity_id";
        return $this->fetchAll($sql);
    }
    /** 提交周活动评论 */
    public function week_comment_submit($id,$activity_id,$comment_content,$comment_create_time,$comment_parentId){
        $sql="INSERT INTO `comment` (`comment_user_id`,`activity_id`,`comment_content`,`comment_create_time`,`parent_id`) value ('".$id."','".$activity_id."','".$comment_content."','".$comment_create_time."','".$comment_parentId."')";

        return $this->insert($sql);
    }
    /** 周活动-点击有用 */
    public function week_click_useful($comment_id){
        $sql="UPDATE comment Set comment_useful_num=comment_useful_num+1   where comment_id=$comment_id";
        return $this->update($sql);
    }
    /** 我关注的活动 */
    public function getMyWeekComment($id,$size){
        $now_time=date("Y-m-d H:i:s",time());
        $sql="SELECT activity.activity_id activityId,activity.activity_title activityTitle,activity.activity_start_time activityDate,activity.activity_address activityLocation,activity.activity_duty_preson activitySponsor,activity.activity_if_import	 recommendFlag FROM activity  left join activity_user on activity.activity_id=activity_user.activity_id where activity_user.fu_id=$id and activity_user.if_want=1 and  activity_end_time>'".$now_time."' order by activity_if_import desc,activity_start_time desc limit $size,10";
        return $this->fetchAll($sql);
    }
    /** 添加想参加的周活动 */
    public function add_wanting_activity($id,$activity_id){
        $sql="INSERT INTO `activity_user` (`activity_id`,`fu_id`) value ('".$activity_id."','".$id."')";
        return $this->insert($sql);
    }
    /**周活动评分*/
    public function score_week_activity($activity_id,$sg_id,$sg_score,$num,$id,$sg_name){
        for($i=0;$i<=$num;$i++){
//            $sql="INSERT INTO `activity_secondary` (`activity_id`,`sg_id`,`sg_name`) value ('".$activity_id."','".$sg_id[$i]."','".$sg_name[$i]."')";
//            $sql_num=$this->insert($sql);
            $sql1="INSERT INTO `user_activity_secondary` (`as_id`,`user_id`,`uas_score`) value ('".$sg_id[$i]."','".$id."','".$sg_score[$i]."')";
            $this->insert($sql1);
        }
        return true;
    }
    /** 周活动平均分secondary_goals,user_activity_secondary,activity_secondary,activity */
    public function show_week_activity_score($activity_id){
        //$sql="SELECT Round(avg(activity_secondary.sg_score),1),secondary_goals.sg_name FROM activity_secondary left join secondary_goals on activity_secondary.sg_id=secondary_goals.sg_id where activity_secondary.activity_id=$activity_id group by activity_secondary.sg_id";`
        $sql="SELECT a_s.as_id,sg.sg_id,Round(avg(uas.uas_score),1) average,sg.sg_name FROM (activity_secondary a_s left join user_activity_secondary uas on uas.as_id=a_s.as_id),secondary_goals sg  where a_s.activity_id=$activity_id and a_s.sg_id=sg.sg_id group by a_s.sg_id";

        return $this->fetchAll($sql);
    }
    /** 判断是否已经评分过 */
    public function if_have_score($activity_id,$id){
        $sql="select * from user_activity_secondary uas left join activity_secondary a_s on  uas.as_id=a_s.as_id where uas.user_id=$id and a_s.activity_id=$activity_id";
        //var_dump($sql);
        return $this->fetchAll($sql);
    }
    /** 获取辅学目标内容 */
    public function getSgName($id){
        $sql="SELECT sg_name FROM secondary_goals where sg_id=$id";
        return $this->fetchRow($sql);
    }
    /** 互评班级评分 */
    public function score_commit($fu_id,$asspro_id,$scoreStr,$commentperson_id){
        $sql="INSERT INTO `user_score` (`fu_id`,`asspro_id`,`us_type`,`us_score`,`us_create_user_id`) value ('".$fu_id."','".$asspro_id."',1,'".$scoreStr."','".$commentperson_id."')";

        return $this->insert($sql);
    }
    /** 做的最好 做的最坏提交 */
    public function goodorbad_commit($fu_id,$str){
        for($i=0;$i<6;$i++){
            if($i<3){
                if($str[$i]!=null){
                    $sql="INSERT INTO `goodorbad` (`fu_id`,`goodorbad_content`,`goodorbad_flag`,`goodorbad_type`) value ('".$fu_id."','".$str[$i]."',0,1)";
                    $this->insert($sql);
                }

            }else{
                if($str[$i]!=null){
                    $sql="INSERT INTO `goodorbad` (`fu_id`,`goodorbad_content`,`goodorbad_flag`,`goodorbad_type`) value ('".$fu_id."','".$str[$i]."',1,1)";
                    $this->insert($sql);
                }
            }
        }
        return true;
    }
    /** 查询活动类型 */
    public function show_activity_type(){
        $sql="select at_id themeTypeId,at_name themeTypeName from activity_type ";
        return $this->fetchAll($sql);
    }
    /** 查询主办方类型 */
    public function show_organizers(){
        $sql="select organizers_id organizersTypeId,organizers_name organizersName from organizers ";
        return $this->fetchAll($sql);
    }
    /** 按条件查询 */
    public function query_activity($type_str_query,$recommend){
        $now_time=date("Y-m-d H:i:s",time());
        $sql="select a.activity_start_time,a.activity_end_time,o.organizers_name,a.activity_id activityId,a.activity_title activityTitle,a.activity_start_time activityDate,a.activity_address activityLocation,a.activity_if_import recommendFlag,a.activity_duty_preson activitySponsor
        from activity a left join activity_type a_t on a.at_id=a_t.at_id left join activity_organizer a_o on a_o.activity_id=a.activity_id left join organizers o on o.organizers_id=a_o.organizers_id
        where a_t.at_name in $type_str_query  and a.activity_if_import=$recommend  and a.activity_approval=1 and activity_class=1 and  activity_end_time>'".$now_time."' order by a.activity_if_import desc ,a.activity_create_time desc ";


//var_dump($sql);
        return $this->fetchAll($sql);
    }
    /** 获取所有活动类型 */
    public function getallactivitytype(){
        $sql="SELECT at_name FROM activity_type ";
        return $this->fetchAll($sql);
    }
    /** 添加签到信息 */
    public function activity_registration($fu_id,$activity_id){
        $sql="insert into activity_registration (activity_id,activity_registration_user_id) value ($activity_id,$fu_id)";
        return $this->insert($sql);
    }
    /** 判断是否已经签到过 */
    public function getifregistration($fu_id, $activity_id){
        $sql="select * from activity_registration where activity_id=$activity_id	and activity_registration_user_id=$fu_id";
        return $this->fetchRow($sql);
    }
    /** 判断是否活动过期 */
    public function getifouttime($activity_id,$now_time){
        $sql="select * from activity where activity_id=$activity_id and activity_start_time<'".$now_time."' and  activity_end_time>'".$now_time."'";
        //var_dump($sql);
        return $this->fetchRow($sql);
    }
    /** 查找是否有这条数据 */
    public function find_activity_user($activity_id,$id){
        $sql="select * from activity_user where activity_id=$activity_id and fu_id=$id	";
        return $this->fetchRow($sql);
    }
    /**添加鲜花或鸡蛋*/
    public function add_activity_user_praise($activity_id,$id,$praiseOrEgg,$time){
        if($praiseOrEgg=="praise"){
            $sql="insert into activity_user (activity_id,fu_id,if_flower) value ($activity_id,$id,1)";
        }elseif($praiseOrEgg=="egg"){
            $sql="insert into activity_user (activity_id,fu_id,if_egg) value ($activity_id,$id,1)";
        }elseif($time){
            $sql="insert into activity_user (activity_id,fu_id,if_want,clock_time) value ($activity_id,$id,1,'".$time."') ";
        }
        return $this->insert($sql);
    }
    /** 修改鲜花，鸡蛋 */
    public function update_activity_user_praise($activity_id,$id,$praiseOrEgg,$time){
        if($praiseOrEgg=="praise"){
            $sql="update activity_user set if_flower=1 where activity_id=$activity_id and fu_id=$id";
        }elseif($praiseOrEgg=="egg"){
            $sql="update activity_user set if_egg=1 where activity_id=$activity_id and fu_id=$id";
        }elseif($time){
            $sql="update activity_user set if_want=1,clock_time='".$time."' where activity_id=$activity_id and fu_id=$id";
        }

        return $this->update($sql);
    }
    /** 查询评论父亲名字 */
    public function show_comment_parent_name($comment_num){
        $sql="select f.fu_realname,f.fu_nickname,f.fu_username from front_user f left join comment c on c.comment_user_id=f.fu_id where c.comment_id=$comment_num";
        return $this->fetchRow($sql);
    }
    /** 添加评论 */
    public function addcommentinfo($id,$comment_content,$activity_id,$parent_id,$par_id){
        $sql="insert into comment (comment_user_id,comment_content,activity_id,parent_id) value ('".$id."','".$comment_content."','".$activity_id."','".$parent_id."')";
        if($parent_id!=0){
            $content='您的评论被其他人回复" '.$comment_content.'" ';
            $sql1="insert into message (fu_id,activity_id,mes_type,mes_content,mes_create_time) value ('".$par_id."','".$activity_id."',1,'".$content."','".date('Y-m-d H:i:s',time())."')";
            $this->insert($sql1);
        }
        return $this->insert($sql);
    }
    /** 修改有用数 */
    public function update_useful_num($comment_id,$useful_num='',$fu_id,$activity_id,$content){
        if($useful_num){
            $sql="update comment set comment_useful_num=$useful_num+1 where comment_id=$comment_id";
        }else{
            $sql="update comment set comment_useful_num=1 where comment_id=$comment_id";
        }

        $sql1="insert into message (fu_id,activity_id,mes_type,mes_content,mes_create_time) values ($fu_id,$activity_id,1,'".$content."','".date('Y-m-d H:i:s',time())."')";
       // var_dump($sql1);
        $this->insert($sql1);
        return $this->update($sql);
    }
    /** 查询某一条评论 */
    public function show_comment_one($comment_id){
        $sql="select * from comment where comment_id=$comment_id";
        return $this->fetchRow($sql);
    }
    /** 8月30后添加 */
    public function addpraiseoregg($praiseOrEgg,$activity_id,$time){
        if($praiseOrEgg=="praise"){
            $sql="update activity_user_attitude set activity_flowers_num=activity_flowers_num+1 where activity_id=$activity_id";
        }elseif($praiseOrEgg=="egg"){
            $sql="update activity_user_attitude set activity_egg_num=activity_egg_num+1 where activity_id=$activity_id";
        }elseif($time){
            $sql="update activity_user_attitude set activity_iswant_num=activity_iswant_num+1 where activity_id=$activity_id";
        }

        return $this->update($sql);
    }
    public function add_want($activity_id){
        $sql="update activity_user_attitude set activity_iswant_num=activity_iswant_num+1 where activity_id=$activity_id";
        return $this->update($sql);
    }
    public function show_activity_user_attitude($activity_id){
        $sql="select * from activity_user_attitude where activity_id=$activity_id";
        return $this->fetchRow($sql);
    }
    public function add_activity_user_attitude($activity_id,$praiseOrEgg,$time){
        if($praiseOrEgg=="praise"){
            $sql="insert into activity_user_attitude (activity_id,activity_flowers_num) value ($activity_id,1)";

        }elseif($praiseOrEgg=="egg"){
            $sql="insert into activity_user_attitude (activity_id,activity_egg_num) value ($activity_id,1)";
        }elseif($time){
            $sql="insert into activity_user_attitude (activity_id,activity_iswant_num) value ($activity_id,1)";
        }

        return $this->insert($sql);
    }
    /** 获取主办方 */
    public function getOrganizer($at_id){
        $sql="select o.organizers_name from activity_organizer ao left join organizers o on o.organizers_id=ao.organizers_id left join activity a on a.activity_id=ao.activity_id where a.activity_id=$at_id";
        return $this->fetchAll($sql);
    }
    /** 获取从办方 */
    public function getUndertake($at_id){
        $sql="select u.undertake_name	 from activity_undertake au left join undertake u on u.undertake_id=au.undertake_id left join activity a on a.activity_id=au.activity_id where a.activity_id=$at_id";
        return $this->fetchAll($sql);
    }
    /** 获取评分人数 */
    public function  getactivityscorenum($at_id){
        $sql="select * from activity_secondary where activity_id=$at_id	";
        return $this->fetchAll($sql);
    }
    /** 获取活动个目标 */
    public function getsecondgoal($at_id){
        $sql="select * from activity_secondary where activity_id=$at_id 	";
        return $this->fetchAll($sql);
    }
    /** 活动提醒，根据活动ID获取活动详细 */
    public function getActivityInfoById($activity_id){
        $sql="select activity_content,activity_title from activity where activity_id=$activity_id	";
        return $this->fetchRow($sql);
    }
    /** 根据评论ID获取评论信息 */
    public function getCommentInfoById($comment_id){
        $sql="select comment_content from comment where comment_id=$comment_id";
        return $this->fetchRow($sql);
    }
    /** 签到的时候验证是否关注了此活动 */
    public function getActivityUserIfWant($fu_id,$activity_id){
        $sql="select if_want from activity_user where activity_id=$activity_id and fu_id=$fu_id";
        return $this->fetchRow($sql);
    }
    /** 获取APP消息列表 */
    public function getAppMesLists($fu_id,$mes_type,$num){
        $sql="select * from message where fu_id=$fu_id and mes_type=$mes_type order by mes_create_time desc limit $num,10";
        return $this->fetchAll($sql);
    }
    /** 用户删除消息 */
    public function delAppMes($mes_id){
        $sql="delete from message where 	mes_id=$mes_id";
        return $this->del($sql);
    }
    public function sendmsgpush(){
        $now_time=date('Y-m-d',time());
                $next_time=date("Y-m-d",strtotime("+1 day"));
                $sql="select * from activity_user where clock_time>'".$now_time."'and clock_time<  '".$next_time."'";
                $act_arr=$this->fetchAll($sql);
                for($i=0;$i<count($act_arr);$i++){
                    $activity_id=$act_arr[$i][activity_id];
                    $fu_id=$act_arr[$i][fu_id];
                    $sql2="select * from front_user where fu_id=$fu_id";
                    $front_arr=$this->fetchRow($sql2);
                    $s=$front_arr[if_sound];
                    $sql1="select * from activity where activity_id=$activity_id";
                    $activity_arr=$this->fetchRow($sql1);
                    $act_title=$activity_arr[activity_title];
                    $act_start_time=date('m-d H:m',strtotime($activity_arr[activity_start_time]));
                    //var_dump($act_start_time);
                    $content='"'.$act_title.'"'."活动将在".$act_start_time."举行";
                    //var_dump($content);
                    //var_dump($content);
                    $platform = 'android,ios'; // 接受此信息的系统
                    $msg_content = json_encode(array('n_builder_id'=>0,'n_title'=>'标题', 'n_content'=>$content,'n_extras'=>array('type'=>2)));
                    $j=new jpush();
                    $j->send(18,3,$fu_id,1,$msg_content,$platform,$s);
                    //$j->send(18,4,"",1,$msg_content,$platform);
                    $sql2="insert into message (activity_id,fu_id,mes_type,mes_content,mes_create_time) values ($activity_id,$fu_id,0,'".$content."','".date('Y-m-d H:i:s',time())."')";
                    $this->insert($sql2);

        }

    }
    /** 判断是否已经评论过 签到过 */
    public function if_regist($at_id,$id){
        $sql="select * from activity_registration where activity_id=$at_id and activity_registration_user_id=$id";
        return $this->fetchRow($sql);
    }
    public function if_argument($at_id,$id){
        $sql="select * from activity_registration where activity_id=$at_id and activity_registration_user_id=$id";
        return $this->fetchRow($sql);
    }
    /** 修改静音 */
    public function  update_sound_state($sound_state,$fu_id){
        $sql="update front_user set if_sound=$sound_state where fu_id=$fu_id";

        return $this->update($sql);
    }
    public function getuserinfo($fu_id){
        $sql2="select * from front_user where fu_id=$fu_id";
        return $this->fetchRow($sql2);
    }
	
	
}
?>