<?php
/**
* Create On 2014-5-18 下午5:08:54
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class OthersetController extends Controller{
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	
	public function Index(){
		$set = new setting();
		if ($_POST){
			$isallow = array_key_exists('isallow', $_POST) ? $_POST['isallow'] : 0;
			if ($isallow){
				$isupdate = $set->updateVOC(1);
				if ($isupdate){
					$this->view->result = $this->_lang->xiugaichenggong;
				}else{
					$this->view->result = $this->_lang->xiugaishibai;
				}
			}else {
				$isupdate = $set->updateVOC(0);
				if ($isupdate){
					$this->view->result = $this->_lang->xiugaichenggong;
				}else{
					$this->view->result = $this->_lang->xiugaishibai;
				}
			}
		}
		$detail = $set->getSystemSetting();
		$this->view->detail = $detail[0];
		echo $this->view->render("index.html");
	}
	
	public function Delpswy(){
		$fu = new frontuser();
		$isDel = $fu->delPswy();
		if ($isDel){
			$this->view->setState(1);
			$this->view->setMsg("success!");
		}else{
			$this->view->setState(0);
			$this->view->setMsg("failed!");
		}
		$this->view->display("json");
	}
}