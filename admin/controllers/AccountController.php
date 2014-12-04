<?php
/**
*  Create On 2013-7-25
*  Author Been
*  QQ:281443751
*  Email:binbin1129@126.com
**/
class AccountController extends Controller{
	
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	
	public function Index(){
		$this->login();
	}
	
	public function Login(){	
		if($_POST){
			$admin = new admin();
			$loginre = $admin->authAdmin($_POST['username'],$_POST['password']); //$user->authUser($_POST['username'],$_POST['password']);
			if($loginre['result'] > 0){
				$session = $this->getApp()->loadUtilClass("SessionUtil");
				$session->set( "session_userid", $loginre["result"] );
				$this->gotoUrl("index","index");
				exit();
			}else if($loginre['result'] == -1){
				$mess = $loginre['msg'];
			}elseif($loginre['result'] == -2){
				$mess = $loginre['msg'];
			}else{
				$mess=$this->_lang->dengluchucuole;
			}
			$this->view->message=$mess;
			$this->view->username=$_POST['username'];
		}else{
			$session = $this->getApp()->loadUtilClass("SessionUtil");
			if( $session->get( "session_userid") ){
				$this->gotoUrl("index","index");
				exit("跳转中");
			}
		}
		echo $this->view->render("login.htm");
	}
	
	public function Logout(){
		$session = $this->getApp()->loadUtilClass("SessionUtil");
		$session->clear();
		$this->gotoUrl("account","login");
		
	}
	
	public function Changepw(){
		if($_POST){
			if($_POST['old'] && $_POST['new'] && $_POST['renew']){
				if($_POST['new'] != $_POST['renew']) $result = $this->_lang->liangcimimabuyizhi;
				else{
					
					$userinfo = $this->getData('userinfo');
					$user = new admin();
					$result = $user -> changePw( $userinfo['admin_id'], $_POST['old'], $_POST['new'] ); //修改密码	
					$reCode = $result['result'];
					if( $reCode == 1){
						$result = $this->_lang->xiugaichenggong;
					}else if( $reCode == -1 ){
						$result = $this->_lang->mimashurucuowu;
					}else{
						$result = $this->_lang->xiugaishibai;
					}
				}
			}else{
				$result = $this->_lang->xinxishurubuwanzheng;
			}
		}else{
			$result="";
		}
		
		$this->view->result=$result;
		echo $this->view->render("changepw.htm");
	}
	
	public function Myinfo(){
		//Array ( [user_id] => 1 [user_name] => admin [user_realname] => ewwewe [user_pw] => ccad7b1ca9998882f9188310e67cdccb 
		//[user_salt] => 74cb7abedafeded8 [role_id] => 1 [user_regtime] => 2012-02-02 00:00:00 [role_name] => 超级管理员 )
		$userinfo = $this->getData("userinfo");
		if($_POST){
			$id = $userinfo["user_id"];
			$user = new user();
			$result = $user->modUserInfo($id, array("user_realname"=>$_POST["realname"]));
			if($result){
				$userinfo["user_realname"] = $_POST["realname"];
				$this->view->result = $this->_lang->xiugaichenggong;
			}else{
				$this->view->result = $this->_lang->xiugaibufenshibai;
			}
		}
		
		
		$this->view->userInfo = $userinfo;
		$log = new log();
		$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1 ;
		$logList = $log->getUserLoginLogPageModel($userinfo["user_id"],$page);
		//print_r($logList);
		$this->view->logList = $logList; 
		echo $this->view->render("myinfo.htm");
	}
}