<?php

class AccountController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->view->web_url=$this->getRequest()->hostUrl;

		
	}

	public function login(){
		
		$this->getView()->display("login.html");
	}
	/**
	 * 登录
	 */
	public function doLogin(){
		if ($_POST){
			if (($_POST['username']) == ""){
				$this->view->zz_cuowu = "请输入用户名";
			}else if (($_POST['password']) == ""){
				$this->view->zz_cuowu = "请输入密码";
			}else{
				$f_user = new frontuser();
				$result = $f_user->getUserAccount(($_POST['username']),($_POST['password']));
				if ($result){
					$sessionUtil = $this->getApp()->loadUtilClass("SessionUtil");
					$sessionUtil->set( "session_userinfo", $result);
					$this->gotoUrl('index','index');
				}else{
					$this->view->zz_cuowu = "用户名或者密码错误";
					$this->getView()->display("login.html");
				}
			}
		}else{
			$this->view->zz_cuowu = "请输入用户名和密码";
		}
	}
	
	/**
	 * 注册
	 */
	public function Register(){
		
		$this->getView()->reg_flag = "register";
		$this->getView()->zzhList = array();
		$this->getView()->form_userinfo = array();
		if($_POST){
			$email = $this->getRequest()->get("form_email");
			$name = $this->getRequest()->get("form_name");
			$password = $this->getRequest()->get("form_password");
			$dwxz = $this->getRequest()->get("form_dwxz");
			$hy = $this->getRequest()->get("form_hy");
			$zczb = $this->getRequest()->get("form_zczb");
			$yzbm = $this->getRequest()->get("form_yzbm");
			$xian = $this->getRequest()->get("form_xian");
			$xxdz = $this->getRequest()->get("form_xxdz");
			$lxr = $this->getRequest()->get("form_lxr");
			$gddh = $this->getRequest()->get("form_gddh");
			$phone = $this->getRequest()->get("form_phone");
			$chz = $this->getRequest()->get("form_chz");
			$gsjj = $this->getRequest()->get("gsjj");//公司简介
			$qygm = $this->getRequest()->get("form_qygm");
			
			$fileList = explode(",", trim($this->getRequest()->get("fileid"),  "," ) ) ;
			
			$f_user = new frontuser();
			$result = $f_user->addCorpUser($email, $password);
			//print_r($result);
			if($result["state"] ){
				$id = $result["code"];
				//
				$dataArr["id"] = $id;
				$dataArr["name"] = $name;
				$dataArr["indId"] = $hy;
				$dataArr["corpId"] = $dwxz;
				$dataArr["capital"] = $zczb;
				$dataArr["contacter"] = $lxr;
				$dataArr["phone"] = $gddh;
				$dataArr["fax"] = $chz;
				$dataArr["mobile"] = $phone;
				$dataArr["post"] = $yzbm;
				$dataArr["email"] = "";
				$dataArr["website"] = "";
				$dataArr["areaId"] = $xian;
				$dataArr["address"] = $xxdz;
				$dataArr["intro"] = $gsjj;
				$dataArr["picId"] = "";//logo
				$dataArr['esId'] = $qygm;
				$r1 = $f_user->setCorpUserInfo($dataArr);
				$r2 = $f_user->setCorpZzh($id, $fileList);
				
				$this->getView()->reg_flag = "succeed";
			}else{
				if( $result["code"] > 0 ){
					$this->getView()->reg_result = "注册失败，该邮箱已被占用！";
				}else{
					$this->getView()->reg_result = "注册失败，邮箱格式不正确！";
				}
				$pic = new picture();
				$zzhlist = $pic->getPic($fileList);
				$this->getView()->zzhList = $zzhlist;
				$this->getView()->form_userinfo = $_POST; 
			}
			
		}
		$corptype = new corptype();
		$list = $corptype->getcorptype();
		$this->getView()->dwxzList = $list;
		unset($list);
		
		//行业列表
		$ind = new industry();
		$list = $ind->get_industry();
		$this->getView()->hyList = $list;
		unset($list);
		
		$es = new enterprisescale();
		$eslist = $es->getEsList();
		$this->view->es = $eslist;
		//省 
		$area = new area();
		$list = $area->getAreaByParentId(0);
		$this->getView()->provinceList = $list;
		unset($list);
		
		$this->getView()->display("register.html");
	}
	
	/**
	 * 注销登录
	 */
	public function Logout() {
		$session = $this->getApp ()->loadUtilClass ( "SessionUtil" );
		$session->clear ();
		$this->gotoUrl("index","index");
	}
	
}