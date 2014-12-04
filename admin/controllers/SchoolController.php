<?php
/**
* Create On 2014-5-6 ����3:29:24
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/

class SchoolController extends Controller{
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	
	public function Index(){
		$type = $this->getRequest()->get("type") ? $this->getRequest()->get("type") : 1;
		if ($type == 1){
			$article = new article();
			$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
			$pageSize = 10;
			$do = $this->getRequest()->get("do");
			if ($do){
				if ($do == "del"){
					$id = $this->getRequest()->get("id");
					$isDel = $article->delArticle($id);
					if($isDel){
						$this->view->result = $this->_lang->shanchuchenggong;
					}else{
						$this->view->result = $this->_lang->shanchushibai;
					}
				}
			}
			$list = $article->getNoticeListPageModel($page, $pageSize);
			$this->view->list = $list;
		}else if ($type == 2){
			$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
            //接受是新生入学评估还是学年末评估
            $select = $this->getRequest()->get("selected") ? $this->getRequest()->get("selected") : 0;
			$pageSize = 10; 
			$college = new college();
			$college_list = $college->getCollegePageModel($page, $pageSize);
            $this->view->isnew = $select;
			$this->view->list = $college_list;
		}else if ($type == 3){
			$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
			//echo $page;
			$xuenian = $this->getRequest()->get("xuenian") ? $this->getRequest()->get("xuenian") : 0;
			$state = $this->getRequest()->get("state");
			//echo $state;
			$pageSize = 10;
			$ass = new assessment();
			$xuenian_list = $ass->getXuenian();
			//print_r($xuenian_list);
			$ass_list = $ass->getAssPageModel($page, $pageSize, $xuenian, $state);
			$this->view->list = $ass_list;
			$this->view->xuenian = $xuenian_list;
			$this->view->state = $state;
			$this->view->year = $xuenian;
		}else if ($type == 4){
			$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
			$pageSize = 10;
			$grade = $this->getRequest()->get("grade") ? $this->getRequest()->get("grade") : 0;
			$major = $this->getRequest()->get("major") ? $this->getRequest()->get("major") : 0;
			$college = $this->getRequest()->get("college") ? $this->getRequest()->get("college") : 0;
			$name = $this->getRequest()->get("name");
			$article = new article();
			$asspro = new assessment();
			$article_list = $article->getNoticeListPageModel(1, 10, 1);
			$selected = $this->getRequest()->get("selected") ? $this->getRequest()->get("selected") : $article_list[0]['article_id'];
			//var_dump($us_list['list']);
			$coll = new college();
			$college_list = $coll->getCollegePageModel(1,10,1);
			$detail = $article->getAticleById($selected);
        	$asspro_list = $asspro->getAssproByYear($detail['article_id'],$detail['article_xuenian']);
			$zhibiao_arr = explode(",", $asspro_list[0]['asspro_second_content']);
			$neng_second = array_slice($zhibiao_arr, $asspro_list[0]['asspro_gong_num'], $asspro_list[0]['asspro_neng_num']);
			$us = new user_score();
			if ($detail['article_isnew'] == 1) {
				$isnew = 3;
			}else{
				$isnew = 0;
			}
			$us_list = $us->getSearchlist02($asspro_list, $page, $pageSize, $isnew, $grade, $major, $college, $name);
			if ($us_list['list']){
				for($i = 0; $i < count($us_list['list']); $i++){
					$score_arr = explode(",", $us_list['list'][$i]['us_score']);
					$us_list['list'][$i]['score'] = $score_arr;
				}
			}
			$this->view->nenglist = $neng_second;
			$this->view->colllist = $college_list;
			$this->view->list = $us_list;
			$this->view->noticelist = $article_list;
			$this->view->isnew = $detail['article_isnew'];
			$this->view->grade = $grade;
			$this->view->college = $college;
			$this->view->major = $major;
			$this->view->select = $selected;
			$this->view->num = $asspro_list[0]['asspro_neng_num'] + 4;
			//var_dump($selected);
		}
		$this->view->type = $type; 
		echo $this->view->render("index.html");
	}
	
	public function Addnotice(){
		$userinfo = $this->getData('userinfo');
        //生成随机数
        $mm=rand(0,100);
        $this->view->mm = $mm;
		$article = new article();
		if ($_POST){
			if (trim($_POST['isnew']) == ""){
				$this->view->result = $this->_lang->leixingbunengweikong;
			}else if (trim($_POST['title']) == ""){
				$this->view->result = $this->_lang->biaotibunengweikong;
			}else if ($_POST['start'] == ""){
				$this->view->result = $this->_lang->kaishishijianbunengweikong;
			}else if ($_POST['end'] == ""){
				$this->view->result = $this->_lang->jiesushijianbunengweikong;
			}else{
				$year = date("Y");
				$month = date("m");
				$day = date("d");
				if ($month > 8){
					$xuenian = $year + 1;
					$str = $year."-".$xuenian."学年";
				}else if ($month == 8){
					if ($day > 15){
						$xuenian = $year + 1;
						$str = $year."-".$xuenian."学年";
					}else {
						$xuenian = $year - 1;
						$str = $xuenian."-".$year."学年";
					}
				}else {
					$xuenian = $year - 1;
					$str = $xuenian."-".$year."学年";
				}
				if ($_POST['fileid']){
					$articleId = $article->addArticle(addslashes($_POST['content']), 3, $userinfo['admin_id'], trim($_POST['title']), $str, "", $_POST['fileid'], $_POST['start'], $_POST['end'], 'NULL', $_POST['isnew']);
				}else{
					$articleId = $article->addArticle(addslashes($_POST['content']), 3, $userinfo['admin_id'], trim($_POST['title']), $str, "", 'NULL', $_POST['start'], $_POST['end'], 'NULL', $_POST['isnew']);
				}
				if ($articleId){
                         //清空答题的数据表
                         $article->clear_stu_ex();
                    //重置college表里面的college_isstate
                     $chongzhi=$article->collegeChongzhi($_POST['isnew']);
					$this->view->result = $this->_lang->tianjiachenggong;
				}else{
					$this->view->result = $this->_lang->tianjiashibai;
				}
			}
		}
		echo $this->view->render("addnotice.html");
	}
	
	public function Delfile(){
		$fileId = $this->getRequest()->get("fileid");
		if ($fileId){
			$file = new file();
			$isDel = $file->delFile($fileId);
			if ($isDel){
				$this->view->setState(1);
				$this->view->setMsg("success!");
			}else {
				$this->view->setState(0);
				$this->view->setMsg("failed!");
			}
			;
		}else{
			$this->view->setState(0);
			$this->view->setMsg("failed!");
		}
		$this->view->display("json");
	}
	
	public function Getassdetail(){
		$id = $this->getRequest()->get("id");
		$ass = new assessment();
		$zbdj = new zbdj();

        $college= new college();
        //根据评估细则的id获取上传到附件
        $ass_file=$college->getAllass_file($id);
        if($ass_file){
            $file_result=array();
            for($m=0;$m<count($ass_file);$m++){
                $file_result[]=$college->getfile_rel($ass_file[$m]['af_id']);
            }
            $this->view->file_result=$file_result;
        }

		$zbdj_arr = $zbdj->getZbdjList();
		if ($id) {
			$info = $ass->getAticleById($id);
			if ($info){
				$second_list = explode(",", $info['asspro_second_content']);
				$third_list = explode(",", $info['asspro_third_content']);
				$gong_second = array_slice($second_list, 0, $info['asspro_gong_num']);
				$neng_second= array_slice($second_list, $info['asspro_gong_num'], $info['asspro_neng_num']);
				$gong_third = array_slice($third_list, 0, $info['asspro_gong_num']);
				$neng_third = array_slice($third_list, $info['asspro_gong_num'], $info['asspro_neng_num']);
				for ($i = 0; $i < $info['asspro_gong_num']; $i++){
					$info['gong'][$i]['second'] = $gong_second[$i];
					$info['gong'][$i]['third'] = $gong_third[$i];
				}
				for ($y = 0; $y < $info['asspro_neng_num']; $y++){
					$info['neng'][$y]['second'] = $neng_second[$y];
					$info['neng'][$y]['third'] = $neng_third[$y];
				}
				$info['zbdj']['first']= $zbdj_arr[0]['zbdj_name'];
				$info['zbdj']['second']= $zbdj_arr[1]['zbdj_name'];
				$info['zbdj']['third']= $zbdj_arr[2]['zbdj_name'];
				//var_dump($info);
				$this->view->setState(1);
				$this->view->setData($info);
				$this->view->setMsg("success!");
			}else{
				$this->view->setState(0);
				$this->view->setMsg("failed!");
			}
		}else{
			$this->view->setState(0);
			$this->view->setMsg("failed!");
		}
		$this->view->display("json");
	}
	
	public function Setassstate(){
		$id = $this->getRequest()->get("id");
		$type = $this->getRequest()->get("type");
		$ass = new assessment();
		$detail = $ass->getAticleById($id);
		$college = new college();
		if ($id && $type){
			$isUpdate =$ass->setState($id, $type);
			if ($isUpdate){
				if ($type == 1){
					$college->setState($detail['asspro_college'], 2);
				}else if($type == 2){
					$college->setState($detail['asspro_college'], 1);
				}
				$this->view->setState(1);
				$this->view->setMsg("success!");
			}else{
				$this->view->setState(0);
				$this->view->setMsg("failed!");
			}
		}else{
			$this->view->setState(0);
			$this->view->setMsg("failed!");
		}
		$this->view->display("json");
	}
	
	public function Getmajorlist(){
		$id = $this->getRequest()->get('id');
		$major = new major();
		$major_list = $major->getMajorByCollId($id);
		if ($major_list){
			$this->view->setState(1);
			$this->view->setData($major_list);
			$this->view->setMsg("success!");
		}else{
			$this->view->setState(0);
			$this->view->setMsg("failed!");
		}
		$this->view->display("json");
	}
}
