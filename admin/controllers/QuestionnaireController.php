<?php
/**
* Create On 2014-5-18 下午12:57:26
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class QuestionnaireController extends Controller{
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	
	public function Addqus(){
		$userinfo = $this->getData("userinfo");
		$ass = new assessment();
		$school = $ass->getSchoolAss();
		$school_second = explode(",", $school[0]['asspro_second_content']);
		$school_second_neng = array_slice($school_second, $school[0]['asspro_gong_num'], $school[0]['asspro_neng_num']);
		$this->view->neng = $school_second_neng;
		//var_dump($school_second_neng);
		echo $this->view->render("addqus.html");
	}
	
	public function Index(){
		$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
		$pageSize = 10;
		$ex = new exercise();
		$choose = new choose();
		$do = $this->getRequest()->get("do");
		if ($do){
			if ($do == "del"){
				$id = $this->getRequest()->get("id");
				if ($id){
					$isDel = $ex->delEx($id);
					$choose->delChoose($id);
					if ($isDel){
						$this->view->result = $this->_lang->shanchuchenggong;
					}else{
						$this->view->result = $this->_lang->shanchushibai;
					}
				}else{
					$this->view->result = $this->_lang->shanchushibai;
				}
			}
		}
		$ex_list = $ex->getExlistPageModel($page, $pageSize);
		//var_dump($ex_list);
		$this->view->list = $ex_list;
		echo $this->view->render("index.html");
	}
	public function Addexercise(){
		$userinfo = $this->getData("userinfo");
		$title = $this->getRequest()->get("title");
		$weidu = $this->getRequest()->get("weidu");
		$content = $this->getRequest()->get("content");
		$fenzhi = $this->getRequest()->get("fenzhi");
		$content_arr = explode(",", $content);
		//var_dump($content_arr);
		$fenzhi_arr = explode(",", $fenzhi);
		$ex = new exercise();
		$choose = new choose();
		$ex_id = $ex->addExercise($weidu, $title, $userinfo['admin_id']);
		$len = count($content_arr) - 1;
		if ($ex_id){
			for ($i = 0; $i < $len; $i++){
				$choose->addChoose($ex_id, $content_arr[$i], $fenzhi_arr[$i]);
			}
			$this->view->setState(1);
			$this->view->setMsg("success!");
		}else {
			$this->view->setState(0);
			$this->view->setMsg("failed!");
		}
		$this->view->display("json");
	}
	
	public function Editqus(){
		$id = $this->getRequest()->get("id");
		$ex = new exercise();
		$ch = new choose();
		$ass = new assessment();
		$school = $ass->getSchoolAss();
		$school_second = explode(",", $school[0]['asspro_second_content']);
		$school_second_neng = array_slice($school_second, $school[0]['asspro_gong_num'], $school[0]['asspro_neng_num']);
		$this->view->neng = $school_second_neng;
		$detail = $ex->getDetail($id);
		$ch_list = $ch->getChooselistByExid($id);
		$detail['len'] = count($ch_list) + 1;
		$detail['remain'] = 8 - count($ch_list);
		$this->view->id = $id;
		$this->view->detail = $detail;
		$this->view->chlist = $ch_list;
		echo $this->view->render("editqus.html");
	}
	
	public function Editexercise(){
		$id = $this->getRequest()->get("id");
		$title = $this->getRequest()->get("title");
		$weidu = $this->getRequest()->get("weidu");
		$content = $this->getRequest()->get("content");
		$fenzhi = $this->getRequest()->get("fenzhi");
		$content_arr = explode(",", $content);
		$fenzhi_arr = explode(",", $fenzhi);
		$ex = new exercise();
		$choose = new choose();
		$isUpdata = $ex -> Editexercise($id, $weidu, $title);
		$len = count($content_arr) - 1;
		if ($isUpdata){
			$choose->delChoose($id);
			for ($i = 0; $i < $len; $i++){
				$choose->addChoose($id, $content_arr[$i], $fenzhi_arr[$i]);
			}
			$this->view->setState(1);
			$this->view->setMsg("success!");
		}else {
			$this->view->setState(0);
			$this->view->setMsg("failed!");
		}
		$this->view->display("json");
	}
}