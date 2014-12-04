<?php
/**
* Create On 2014-4-28 ����4:51:33
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/

class PersonnalController extends Controller{
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	
	public function Personalachievementstype(){
		$pa = new personalachievements();
		$paList = $pa->getList();
		$this->view->list = $paList;
		echo $this->view->render("palist.html");
	}
	
	public function Addpa(){
		//$userinfo = $this->getData("userinfo");
		$pa = new personalachievements();
		if ($_POST){
			if (trim($_POST['name']) == ""){
				//echo "111";
				$this->view->result = $this->_lang->qingtianxieleixingmingcheng;
			}else{
				$paId = $pa->addPA(trim($_POST['name']));
				if ($paId){
					$this->view->result = $this->_lang->tianjiachenggong;
				}else{
					$this->view->result = $this->_lang->tianjiashibai;
				}
			}
		}
		echo $this->view->render("addpa.html");
	}
	
	public function Editpa(){
		$id = $this->getRequest()->get("id");
		$userinfo = $this->getData("userinfo");
		$pa = new personalachievements();
		if ($_POST){
			if (trim($_POST['name']) == ""){
				$this->view->result = $this->_lang->qingtianxieleixingmingcheng;
			}else{
                $paId = $pa->editPA(trim($_POST['name']),$id);

				if ($paId){

					$this->view->result = $this->_lang->xiugaichenggong;
				}else{
					$this->view->result = $this->_lang->xiugaishibai;
				}
			}
		}
		$this->view->id = $id;
		$detailinfo = $pa->getDetail($id);
		$this->view->detail = $detailinfo;
		echo $this->view->render("editpa.html");
	}
	/**
	 * 个人成果填写时间维护
	 */
	public function Personalachievementstime(){
		$setting = new setting();
		if ($_POST){
			if ($_POST['time'] == ""){
				$this->view->result = $this->_lang->xiugaishibai;
			}else{
				$isUpdate = $setting->updatePAT($_POST['time']);
				if ($isUpdate){
					$this->view->result = $this->_lang->xiugaichenggong;
				}else{
					$this->view->result = $this->_lang->xiugaishibai;
				}
			}
		}
		$set = $setting->getSystemSetting();
		$detail = $set[0]['ss_personal_achievements_time'];
		$this->view->detail = $detail;
		echo $this->view->render("pat.html");
	}

    public function deletePa(){
        $id = $this->getRequest()->get("id");
        $pa = new personalachievements();
        $pa->deleteById($id);
        $PersonnalController = new PersonnalController();
        $PersonnalController->Personalachievementstype();
    }
}
