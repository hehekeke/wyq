<?php
/**
* Create On 2014-3-25 ����4:33:52
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/

class BasedataController extends Controller{
	
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	
	public function Getcollegelist(){
		$college = new college();
		$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
		$pageSize = 10;
		$collegelist = $college->getCollegePageModel($page, $pageSize);
		//var_dump($collegelist);
		$this->view->list = $collegelist;
		echo $this->view->render("college.html");
	}
	
	public function Editcollege(){
		$id = $this->getRequest()->get("id");
		$college = new college();
		if ($_POST){
			if (trim($_POST['name']) == ""){		
				$this->view->result = $this->_lang->xiugaimingchengbunengweikong;
			}else{
				$theSame = $college->reCheck(trim($_POST['name']), $id);
				if ($theSame){
					$this->view->result = $this->_lang->cixueyuanyicunzai;
				}else{
					$isEdit = $college->editCollege($id, trim($_POST['name']));
					if ($isEdit){
						$this->view->result=$this->_lang->xiugaichenggong;
					}else{
						$this->view->result=$this->_lang->xiugaishibai;
					}
				}
			}
		}
		$this->view->id = $id;
		$detail = $college->getDetailById($id);
		$this->view->detail  = $detail;
		echo $this->view->render("editcollege.html");
	}
	
	public function Addcollege(){
		$college = new college();
		if ($_POST){
			if(trim($_POST['name']) == ""){
				$this->view->result = $this->_lang->xiugaimingchengbunengweikong;
			}else{
				$theSame = $college->reCheck(trim($_POST['name']));
				if ($theSame){
					$this->view->result = $this->_lang->cixueyuanyicunzai;
				}else{
					$id = $college->addCollege(trim($_POST['name']));
					if ($id){
						$this->view->result = $this->_lang->tianjiachenggong;
					}else{
						$this->view->result = $this->_lang->tianjiashibai;
					}
				}
			}
		}
		echo $this->view->render("addcollege.html");
	}
	
	public function Delcollege(){
		$id = $this->getRequest()->get("id");
		$college = new college();
		if ($id){
			$isDel = $college->delCollegeById($id);
			if ($isDel){
				$this->view->setState("1");
				$this->view->setMsg("success");
			}else{
				$this->view->setState("0");
				$this->view->setMsg("failed");
			}
		}else{
			$this->view->setState("0");
			$this->view->setMsg("failed");
		}
		$this->view->display("json");
	}
	
	public function Delmajor(){
		$id = $this->getRequest()->get("id");
		$major = new major();
		if ($id){
			$isDel = $major->delMajor($id);
			if ($isDel){
				$this->view->setState("1");
				$this->view->setMsg("success");
			}else{
				$this->view->setState("0");
				$this->view->setMsg("failed");
			}
		}else{
			$this->view->setState("0");
			$this->view->setMsg("failed");
		}
		$this->view->display("json");
	}
	
	public function Getmajorlist(){
		$major = new major();
		$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
		$pageNum = 10;
		$majorlist = $major->getMajorPageModel($page, $pageNum);
		$this->view->list = $majorlist;
		echo $this->view->render("major.html");
	}
	
	public function Addmajor(){
		$college = new college();
		$major = new major();
		if ($_POST){
			if ($_POST['collegeId'] == ""){
				$this->view->result = $this->_lang->qingxuanzexueyuan;
			}else if(trim($_POST['name']) == ""){
				$this->view->result = $this->_lang->zhuanyemingchengbunengweikong;
			}else{
				$theSame = $major->reCheck($_POST['collegeId'], trim($_POST['name']));
				if ($theSame){
					$this->view->result = $this->_lang->cizhuanyeyicunzai;
				}else{
					$id = $major->addMajor($_POST['collegeId'],trim($_POST['name']));
					if ($id){
						$this->view->result = $this->_lang->tianjiachenggong;
					}else{
						$this->view->result = $this->_lang->tianjiashibai;
					}
				}
			}
		}
		$collegelist = $college->getCollegePageModel(1,10,1);
		$this->view->collegelist = $collegelist;
		echo $this->view->render("addmajor.html");
	}
	
	public function Editmajor(){
		$id = $this->getRequest()->get("id");
		$college = new college();
		$major = new major();
		if ($_POST){
			if ($_POST['collegeId'] == ""){
				$this->view->result = $this->_lang->qingxuanzexueyuan;
			}else if(trim($_POST['name']) == ""){
				$this->view->result = $this->_lang->zhuanyemingchengbunengweikong;
			}else{
				$theSame = $major->reCheck($_POST['collegeId'], trim($_POST['name']), $id);
				if ($theSame){
					$this->view->result = $this->_lang->cizhuanyeyicunzai;
				}else{
					$id = $major->editMajor($id, $_POST['collegeId'],trim($_POST['name']));
					if ($id){
						$this->view->result = $this->_lang->xiugaichenggong;
					}else{
						$this->view->result = $this->_lang->xiugaishibai;
					}
				}
			}
		}
		$detail = $major->getDetailById($id);
		$this->view->detail = $detail;
		$collegelist = $college->getCollegePageModel(1,10,1);
		$this->view->collegelist = $collegelist;
		$this->view->id = $id;
		echo $this->view->render("editmajor.html");
	}
}
