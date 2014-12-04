<?php
include_once "Filter.class.php";
class adminFilter extends Filter{

	protected $_openRS = array('account', 'upload'); //允许不用登陆访问的资源

	//属于账号的资源
	protected $_selfRS = array('account','index','common');


	//最终的资源列表
	protected $_RSList = array();

	public function doFilter(){
		$session = $this->getApp()->loadUtilClass("SessionUtil");
		$userid = $session->get("session_userid");
		//echo $userid;
		if($userid){
			$user = new admin();
			$ar = new adminrole();
			$userdata = $user->getAdminInfoByAdminid($userid);
			if($userdata){
				$arlist = $ar->getAdminroleByAdminId($userdata['admin_id']);
				$this->getApp()->getView()->setStatus("1");
				//设置用户的信息
				$this->getApp()->putData('userinfo', $userdata );
				$this->_RSList = array_merge( $this->_RSList, $this->_selfRS );
				$role = new role();
				if ($arlist){
					foreach ($arlist as $ars){
						$resList = $role->getResourceOfRole($ars['role_id']);
						if( $resList ){
							foreach ($resList as $res){
								$this->_RSList[] = strtolower($res['ctrl_class']);
							}
						}
					}
				}
				if($this->canViste($this->getCName())){
					$this->getApp()->putData('resource', array_unique($this->_RSList) );
				}else{
					echo "access deny!";
					exit();
				}

			}else{
				$session->clear();
				echo "session error, access deny!";
				exit();
			}
		}else{
			if( $this->canViste( $this->getCName()) ){
				//可以访问
				$this->getApp()->getView()->setStatus("0");
			}else{
				$this->getApp()->gotoUrl("account","login");
				exit("no login access deny!");
			}
		}

	}

	//检查是否可以访问
	public function canViste($cName){
		//echo $cName;
		//echo $aName;
		//print_r($this->_RSList);
		//var_dump($this->isOpenRS($cName));
		if( $this->isOpenRS($cName) ){
			return true;
		}else{
			//var_dump(array_key_exists($cName, $this->_RSList));
			return in_array(strtolower($cName), $this->_RSList);
		}
	}


	public function isOpenRS($cName){
		//print_r($this->_openRS);
		//var_dump(array_key_exists($cName, $this->_openRS));
		return  in_array(strtolower($cName), $this->_openRS);
	}

}

?>