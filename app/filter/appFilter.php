<?php
include_once "Filter.class.php";
class appFilter extends Filter{
	protected $_openRS = array('index','account','center','assist','record','common'); //允许不用登陆访问的资源
	protected $_selfRS = array('assessment','index','account','center','assist','record','common');//登陆后才能访问的资源
	protected $_RSList = array();//最终的资源列表

	public function doFilter(){
		$session = $this->getApp()->loadUtilClass("SessionUtil");
		if($userinfo = $session->get("session_userinfo") ){
			$this->getApp()->putData('userinfo', $userinfo );
			$this->getApp()->getView()->__userinfo__=$userinfo;
			$assportinfo = $session->get('session_assportinfo');
			$this->getApp()->putData('assportinfo', $assportinfo );
			$this->getApp()->getView()->__assportinfo__=$assportinfo;
			
			/*echo 22222;
			
			 $f_user=new frontuser();
			$userdata=$f_user->getUserFromAccount($userid,true);
			print_r($userdata);
			//exit();
			if( $userdata && $userdata['isable']== 1 ){//用户存在并且用户未被冻结

				 $this->getApp()->getView()->setStatus(1);
				$this->getApp()->getView()->userinfo=$userdata;
				//设置用户的信息

				//初始化一些信息
				if($userdata["type"] == 0){//学生

				}else if($userdata["type"] == 1){//企业
					//获取带有级别限制的功能的级别限制表
					$degreeresource = new degreeresource();
					$info = $degreeresource->getAllDegreeSource();

					$arr= array();
					foreach($info as $item){
						$arr[ $item["dr_en_name"] ] = array( "limit"=>$item["dr_limit"], "title"=>$item["dr_cn_name"] );
					}
					$this->getApp()->putData('drTable', $arr);


				}else if($userdata["type"] == 2){//教师

				}
				$this->getApp()->putData('userinfo', $userdata );
				$this->getApp()->getView()->__userinfo__=$userdata;

			}else{
				$session->clear();
				$this->getApp()->gotoUrl("Index","Index");
			} */

		}else{
			$view = $this->getApp()->getView();
			if( $this->canViste( $this->getCName() ) ){
				/*echo 111;
				$this->getApp()->gotoUrl("Account","login");
				echo "no login but can access!<br/>";
				$view->setStatus("0");
				//exit();*/
			}else{
				echo $this->getCName();
				echo "你还没有登录，请登录";
				$this->getApp()->gotoUrl("Index","Index","2");
				exit();

			}
		}

		/* if(! $this->canViste( $this->getCName() ) ){//判断用户是否有权限访问
			$this->getApp()->error404();
			$this->getApp()->gotoUrl("Index","index");
			exit();
		} */
	}

	//检查是否可以访问\e
	public function canViste($cName){
		//echo $cName;
		$aname = $this->getAName();
		//echo $aname;
 		if( $this->isOpenRS($cName) ){
 			return true;
 		}else{
 			return in_array(strtolower($cName), $this->_RSList);
 		} 
	/*	if( $this->isOpenRS($cName) ){
			echo "1111";
			return true;
		}elseif(strtolower($aname) == 'upload'){//如果action为upload，就让他过去
			return true;
		}else{
			return in_array(strtolower($cName), $this->_RSList);
		}*/
		/* $cname = $this->getCName();
		$rs = array_merge($this->_openRS,$this->_selfRS);
		if(!in_array(strtolower($cname), $rs)){
			echo '非法访问';
			exit();
		} */
	}


	public function isOpenRS($cName){
		return  in_array(strtolower($cName), $this->_openRS);
	}

}

?>