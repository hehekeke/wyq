<?php
/**
*  Create On 2010-7-12
*  Author Been
*  QQ:281443751
*  Email:binbin1129@126.com
**/
class IndexController extends Controller{
	public function __construct(){
		
		parent::__construct();
		//print_r($this->getRequest());
		$this->view->web_url = $this->getRequest()->hostUrl;
		
	}
	public function Index(){
		//echo "dddddd";
		echo $this->view->render("index.htm");
	}
	public function Header(){
		$userinfo = $this->getData("userinfo");
		//var_dump($userinfo);
		//$this->view->roleid = $userinfo["role_id"];
		$this->view->adminID = $userinfo['admin_id'];
		$this->view->user = $userinfo["admin_name"]."[".$userinfo['admin_realname']."]";
		echo $this->view->render("header.htm");
	}
	public function Menu(){
		$resource = $this->getData("resource");
		$menu = array();
		$menu['system'] = 0;
		$menu['other'] = 0;
		$menu['activity'] = 0;
		$menu['addactivity'] = 0;
		$menu['assessment'] = 0;
		$menu['basedata'] = 0;
		$menu['college'] = 0;
		$menu['counselor'] = 0;
		$menu['grade'] = 0;
		$menu['otherset'] = 0;
		$menu['personnal'] = 0;
		$menu['questionnaire'] = 0;
		$menu['school'] = 0;
		$menu['suggest'] = 0;
		$menu['tips'] = 0;
		$menu['checkactivity'] = 0;
		$menu['publishactivity'] = 0;
		$menu['activitymanage'] = 0;
        $menu['notice']=0;
        $menu['adminmessage']=0;
		if ($resource){
			foreach($resource as $key){
				if(array_key_exists($key, $menu)){
					$menu[$key] = 1;
				}
			}	
		}
		$this->view->menu = $menu;
		echo $this->view->render("menu.htm");
	}
	public function Main(){
		$userinfo = $this->getData("userinfo");
		//$this->view->roleid = $userinfo["role_id"];
		echo $this->view->render("main.htm");
	}
	

}