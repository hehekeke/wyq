<?php
/**
* Create On 2014-6-10 下午2:55:40
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class SuggestController extends Controller{
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	
	public function Index(){
		$sy = new suggestyuju();
		$sy_list = $sy->getSyList();
		$this->view->list = $sy_list;
		echo $this->view->render("index.html");
	}
	
	public function Del(){
		$id = $this->getRequest()->get("id");
		$sy = new suggestyuju();
		$isDel = $sy->delSy($id);
		if ($isDel){
			$this->view->setState(1);
			$this->view->setMsg("success!");
		}else{
			$this->view->setState(0);
			$this->view->setMsg("failed!");
		}
		$this->view->display("json");
	}
	
	public function Addsy(){
		$begin_str = $this->getRequest()->get("begin");
		$end_str = $this->getRequest()->get("end");
		$content_str = $this->getRequest()->get("content");
		$begin_arr = explode(",", $begin_str);
		$end_arr = explode(",", $end_str);
		$content_arr = explode("||", $content_str);
		$sy = new suggestyuju();
		$rows = $sy->getSyList();
		for ($i = 0; $i < count($rows); $i++){
			$sy->delSy($rows[$i]['sy_id']);
		}
		for ($i = 0; $i < count($begin_arr); $i++){
			$id = $sy->addSy($begin_arr[$i], $end_arr[$i], $content_arr[$i]);
		}
		if ($id > 0){	
			$this->view->setState(1);
			$this->view->setMsg("success!");
		}else{
			$this->view->setState(0);
			$this->view->setMsg("failed!");
		}
		$this->view->display("json");
	}
}