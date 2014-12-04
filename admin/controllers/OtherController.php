<?php
/**
* Create On 2014-4-18 ����3:25:35
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class OtherController extends Controller{
	
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	
	public function Linklist(){
		$friendlink = new friendlink();
		$this->view->result = $this->_doLink($friendlink);
		$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
		$pageSize = 9;
		$friend_link_list = $friendlink->getLinklistPageModel($page,$pageSize);
		$this->view->link = $friend_link_list;
		echo $this->view->render("linklist.html");
	}
	/**
	 * 添加友情链接
	 */
	public function AddLink(){
		$friendlink = new friendlink();
		$userinfo = $this->getData("userinfo");
		if ($_POST){
			if ($_POST['url'] == ""){
				$this->view->result = $this->_lang->lianjiebunengweikong;
			}else{
				$url = trim($_POST['url']);
				if(substr($url,0,7) != "http://"){
					$url ="http://".$url;
				}
				$id = $friendlink->addLink($url, $_POST['title'], $userinfo['admin_id']);
				if ($id > 0){
					$this->view->result = $this->_lang->tianjiachenggong;
				}else{
					$this->view->result = $this->_lang->tianjiashibai;
				}
			}
		}
		echo $this->view->render("addlink.html");
	}
	
	public function Editlink(){
		$id = $this->getRequest()->get("id");
		$friendlink = new friendlink();
		if ($_POST){
			if ($_POST['url'] == ""){
				$this->view->result = $this->_lang->lianjiebunengweikong;
			}else{
				$url = trim($_POST['url']);
				if(substr($url,0,7) != "http://"){
					$url ="http://".$url;
				}
				$isUpdate = $friendlink->updateLinkById($id, $url, $_POST['title']);
				if ($isUpdate){
					$this->view->result = $this->_lang->xiugaichenggong;
				}else{
					$this->view->result = $this->_lang->xiugaishibai;
				}
			}
		}
		$detail = $friendlink->getLinkDetailById($id);
		$this->view->id = $id;
		$this->view->detail = $detail;
		echo $this->view->render("editlink.html");
	}
	
	protected function _doLink($link){
		$do = $this->getRequest()->get("do");
		if ($do) {
			if($do == "del"){
				$id = $this->getRequest()->get('id');
				if($id){
					if($link->delLink($id)){
						return  $this->_lang->shanchuchenggong;
					}else{
						return  $this->_lang->shanchushibai;
					}
				}else{
					return $this->_lang->shanchushibai;
				}
			}else if($do == "settop"){
				$id = $this->getRequest()->get('id');
				if($id){
					if($link->setTop($id)){
						return  $this->_lang->zhidingchenggong;
					}else{
						return  $this->_lang->zhidingshibai;
					}
				}else{
					return $this->_lang->zhidingshibai;
				}
			}else if($do == "canceltop"){
				$id = $this->getRequest()->get('id');
				if($id){
					if($link->cancelTop($id)){
						return $this->_lang->quxiaochenggong;
					}else{
						return $this->_lang->quxiaoshibai;
					}
				}else{
					return $this->_lang->quxiaoshibai;
				}
			}else{
				return $this->_lang->buzhichicixiangcaozuo;
			}
		}else{
			return "";
		}
	}
	
	public function logo(){
		$setting = new setting();
		$pic = new picture();
		if($_POST){
			if ($_POST['picid'] == ""){
				$this->view->result = $this->_lang->tupianbunengweikong;
			}else{
				$isUpdate = $setting->updataLogo($_POST['picid']);
				if ($isUpdate){
					$this->view->result = $this->_lang->xiugaichenggong;
				}else{
					$this->view->result = $this->_lang->xiugaishibai;
				}
			}
		}
		$set = $setting->getSystemSetting();
		$detail = $pic->getPicById($set[0]['ss_logo']);
		$this->view->detail = $detail;
		echo $this->view->render("logo.html");
	}

}
