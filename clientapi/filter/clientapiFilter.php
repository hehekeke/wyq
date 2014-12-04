<?php
include_once "Filter.class.php";
class clientapiFilter extends Filter{
	
	protected $_openRS = array(
			'Account' => array('If_sound','Schoolmsg','Hpactive','Login','Logout','Showuserinfo','Getnotifymsg','Updatenickname','Updateuserpic','Tousercomment','Showactivitymsg','Showschoolmsg','Delmsg','Gp_msg','Show_class_students','Assesstostudent','Showassessresult','Gp_msg_type','Show_tp_result','Show_tp_dogood','Show_tp_dobad','Assessmsgcommit','Show_activity_type','Show_organizers','Queryactivity'),
            'Activity'=>array('Delmes','Meslists','Getcommentinfobyid','Getactivityinfobyid','Indeximages','Week_activity','Comment_useful','My_week_comment','Add_wanting_activity','Week_activity_score','Show_week_activity_score','Show_activity_msg','Show_week_activity_score','Show_activity_registration_person','Activity_registration','Week_activity_comment','Addfloweroregg','Addcomment','Addcommentuseful','Week_comment_submit'),
			'Assess' => array('Getresultlist','Do_good','Do_bad','hp2_active')
	); // 允许不用登陆访问的资源
	   
	// 属于账号的资源
	    protected $_selfRS = array(
        'Account' => array('Login','Logout'),
	    'Index' => array('Test') );
	   
	// 最终的资源列表
	 protected $_RSList = array();
	public function doFilter() {
		$session = $this->getApp ()->loadUtilClass ( "SessionUtil" );
		$userid = $session->get ( "session_userid" );
		if ($userid) { // 有session
			$user = new frontuser ();
			$userdata = $user->getUserByUserID ( $userid['fu_id'] );
			if ($userdata) {
				$this->getApp ()->getView ()->setStatus ( "1" );
				// 设置用户的信息
				$this->getApp ()->putData ( 'userinfo', $userdata );
			} else {
				$session->clear ();
				$view = $this->getApp ()->getView ();
				$view->setState ( "0" );
				$view->setMsg ( "error:invalid session infomation!" );
				$view->setStatus ( "0" );
				$view->setData ( "" );
				$view->display ( "json" );
				exit ();
			}
		} else { // 无session
			$view = $this->getApp ()->getView ();
			if ($this->canViste ( $this->getCName (), $this->getAName () )) {
				$view->setStatus ( "0" );
			} else { // 必须登录
				$view->setState ( "0" );
				$view->setMsg ( "错误:请登录!" );
				$view->setStatus ( "0" );
				$view->setData ( "" );
				$view->display ( "json" );
				exit ();
			}
		}
	}
	
	// 检查是否可以访问
	public function canViste($cName, $aName) {
		if ($this->isOpenRS ( $cName, $aName )) {
			return true;
		} else {
  			//echo $cName."|". $aName;
			return array_key_exists ( $cName, $this->_RSList ) ? in_array ( $aName, $this->_RSList [$cName] ) : false;
		}
        return true;
	}
	public function isOpenRS($cName, $aName) {
		return array_key_exists ( $cName, $this->_openRS ) ? in_array ( $aName, $this->_openRS [$cName] ) : false;
	}
}

?>