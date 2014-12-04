<?php
class AssessmentController extends Controller{
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	
	public function Getasslist(){
		$ass = new assessment();
		$page = $this->getRequest()->get("page") ?  $this->getRequest()->get("page") : 1;
		$pageSize = 10;
		$ass_list = $ass->getSchoolAss($page, $pageSize, 1);
		if ($ass_list['list']) {
			for($i = 0; $i <count($ass_list['list']); $i++){
				$ass_list['list'][$i]['version'] = strtotime($ass_list['list'][$i]['asspro_create_time']);
			}
		}
		$this->view->list = $ass_list;
		echo $this->view->render("asslist.html");
	}
	
	public function Thelastass(){
		$userinfo = $this->getData("userinfo");
		$ass = new assessment();
		$zbdj = new zbdj();
		$zbdj_arr = $zbdj->getZbdjList();
		$school = $ass->getSchoolAss();
		$school_second = explode(",", $school[0]['asspro_second_content']);
		$school_third = explode(",", $school[0]['asspro_third_content']);
		$school_second_gong = array_slice($school_second, 0, $school[0]['asspro_gong_num']);
		$school_second_neng = array_slice($school_second, $school[0]['asspro_gong_num'], $school[0]['asspro_neng_num']);
		$school_third_gong = array_slice($school_third, 0, $school[0]['asspro_gong_num']);
		$school_third_neng = array_slice($school_third, $school[0]['asspro_gong_num'], $school[0]['asspro_neng_num']);
		$info = array();
		for ($i = 0; $i < $school[0]['asspro_gong_num']; $i++){
			$info['gong'][$i]['second'] = $school_second_gong[$i];
			$info['gong'][$i]['third'] = $school_third_gong[$i];
		}
		for ($y = 0; $y < $school[0]['asspro_neng_num']; $y++){
			$info['neng'][$y]['second'] = $school_second_neng[$y];
			$info['neng'][$y]['third'] = $school_third_neng[$y];
		}
		$info['admin_realname'] = $school[0]['admin_realname'];
		$info['create_time'] = $school[0]['asspro_create_time'];
		$info['version'] = strtotime($school[0]['asspro_create_time']);
		//var_dump($zbdj_arr);
		$this->view->zbdj = $zbdj_arr;
		$this->view->info = $info;
		echo $this->view->render("lastass.html");	
	}
	
	public function Insertass(){
		$userinfo = $this->getData('userinfo');
		$gong_num = $this->getRequest()->get("gongnum");
		$neng_num = $this->getRequest()->get("nengnum");
		$second_content = $this->getRequest()->get("second");
		$third_content = $this->getRequest()->get("third");
		$ass = new assessment();
		$article = new article();
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
		$the_last_notice = $article->getNoticeListByXuenian($str, 0, 1);
		$cur_time = time();
		if (strtotime($the_last_notice[0]['article_begin_time']) <= $cur_time && strtotime($the_last_notice[0]['article_end_time']) >= $cur_time){
			$this->view->setState(2);
			$this->view->setMsg("failed!");
		}else{
			$id = $ass->addAss("",0, $str, $gong_num, $neng_num, $second_content, $third_content, 0, $userinfo['admin_id']);
			if ($id) {
				$this->view->setState("1");
				$this->view->setMsg("success!");
			}else{
				$this->view->setState("0");
				$this->view->setMsg("failed!");
			}
		}
		$this->view->display("json");
	}
	
	public function Detail(){
		$id = $this->getRequest()->get("id");
		$ass = new assessment();
		$zbdj = new zbdj();
		$zbdj_arr = $zbdj->getZbdjList();
		$school = $ass->getAticleById($id);
		$school_second = explode(",", $school['asspro_second_content']);
		$school_third = explode(",", $school['asspro_third_content']);
		$school_second_gong = array_slice($school_second, 0, $school['asspro_gong_num']);
		$school_second_neng = array_slice($school_second, $school['asspro_gong_num'], $school['asspro_neng_num']);
		$school_third_gong = array_slice($school_third, 0, $school['asspro_gong_num']);
		$school_third_neng = array_slice($school_third, $school['asspro_gong_num'], $school['asspro_neng_num']);
		$info = array();
		for ($i = 0; $i < $school['asspro_gong_num']; $i++){
			$info['gong'][$i]['second'] = $school_second_gong[$i];
			$info['gong'][$i]['third'] = $school_third_gong[$i];
		}
		for ($y = 0; $y < $school['asspro_neng_num']; $y++){
			$info['neng'][$y]['second'] = $school_second_neng[$y];
			$info['neng'][$y]['third'] = $school_third_neng[$y];
		}
		$info['admin_realname'] = $school['admin_realname'];
		$info['create_time'] = $school['asspro_create_time'];
		$info['version'] = strtotime($school['asspro_create_time']);
		$this->view->zbdj = $zbdj_arr;
		$this->view->info = $info;
		echo $this->view->render("detail.html");
	}
	
	public function Zbdjlist(){
		$zbdj = new zbdj();
		$zbdj_list = $zbdj->getZbdjList();
		$this->view->list = $zbdj_list;
		echo $this->view->render("zbdjindex.html");
	}
	
	public function Editzbdj(){
		$id = $this->getRequest()->get("id");
		$zbdj = new zbdj();
		if ($_POST){
			if ($_POST['name'] == ""){
				$this->view->result = $this->_lang->mingchengbunengweikong;
			}else{
				$isUpdate = $zbdj->editZbdj($id, $_POST['name']);
				if ($isUpdate){
					$this->view->result = $this->_lang->xiugaichenggong;
				}else{
					$this->view->result = $this->_lang->xiugaishibai;
				}
			}
		}
		$detail = $zbdj->getDetail($id);
		$this->view->detail = $detail;
		$this->view->id = $id;
		echo $this->view->render("editzbdj.html");
	}
}