<?php
/**
* Create On 2014-5-4 ����4:53:39
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/

class TipsController extends Controller{
	
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	
	/**
	 * 获取小贴士列表
	 */
	public function Gettipslist(){
		$type = $this->getRequest()->get("type");
		//echo $type;
		$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
		$pageSize = 10;
		$article = new article();
		$do = $this->getRequest()->get("do");
		if($do){
			if($do == "del"){
				$id = $this->getRequest()->get("id");
				if($id){
					$result = $article->delArticle($id);
					if($result){
						$this->view->result = $this->_lang->shanchuchenggong;
					}else{
						$this->view->result = $this->_lang->shanchushibai;
					}
				}
			}
		}
		$list = $article->getTipsPageModel($type, $page, $pageSize);
		$this->view->list = $list;
		$this->view->type = $type;
		echo $this->view->render("tips.html");
	}
	
	public function Addtips(){
		$userinfo = $this->getData("userinfo");
		$article  = new article();
		if ($_POST){
			if ($_POST['type'] == ""){
				$this->view->result = $this->_lang->leixingbunengweikong;
			}else if (trim($_POST['title']) == ""){
				$this->view->result = $this->_lang->biaotibunengweikong;
			}else if ($_POST['content'] == ""){
				$this->view->result = $this->_lang->neirongbunengweikong;
			}else if (trim($_POST['key']) == ""){
				$this->view->result = $this->_lang->guanjianzibunengweikong;
			}else{
				if($_POST['fileid']){
					$articleId = $article->addArticle(addslashes($_POST['content']), $_POST['type'], $userinfo['admin_id'], trim($_POST['title']), "", trim($_POST['key']), $_POST['fileid']);
				}else{
					$articleId = $article->addArticle(addslashes($_POST['content']), $_POST['type'], $userinfo['admin_id'], trim($_POST['title']), "", trim($_POST['key']), 'NULL');
				}
				
				if ($articleId){
					$this->view->result = $this->_lang->tianjiachenggong;
				}else{
					$this->view->result = $this->_lang->tianjiashibai;
				}
			}
		}
		echo $this->view->render("addtips.html");
	}
	
	/**
	 * 编辑小护士
	 */
	public function Edittips(){
		//echo time();
		$article = new article();
		$id = $this->getRequest()->get("id");
		if ($_POST){
			//echo $_POST['type'];
			if ($_POST['type'] == ""){
				$this->view->result = $this->_lang->leixingbunengweikong;
			}else if (trim($_POST['title']) == ""){
				$this->view->result = $this->_lang->biaotibunengweikong;
			}else if ($_POST['content'] == ""){
				$this->view->result = $this->_lang->neirongbunengweikong;
			}else if (trim($_POST['key']) == ""){
				$this->view->result = $this->_lang->guanjianzibunengweikong;
			}else{
				if ($_POST['fileid']){
					$isupdate = $article->editArticle($id, $_POST['content'], $_POST['type'], trim($_POST['title']), trim($_POST['key']), $_POST['fileid']);
				}else{
					$isupdate = $article->editArticle($id, $_POST['content'], $_POST['type'], trim($_POST['title']), trim($_POST['key']), 'NULL');
				}
				if ($isupdate){
					$this->view->result = $this->_lang->xiugaichenggong;
				}else{
					$this->view->result = $this->_lang->xiugaishibai;
				}
			}
		}
		$info = $article->getDetail($id);
		$this->view->detail = $info;
		$this->view->id = $id;
		echo $this->view->render("edittips.html");
	}
}
