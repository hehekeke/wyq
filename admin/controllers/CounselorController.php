<?php
/**
* Create On 2014-5-17 ����3:29:04
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class CounselorController extends Controller{
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	//辅导员评估工作
	public function Index(){
		$type = $this->getRequest()->get("type") ? $this->getRequest()->get("type") : 1;
		$userinfo = $this->getData("userinfo");
		//var_dump($userinfo);
		if ($type == 1){
			$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
			$pageSize = 10;
			$admin = new admin();
			$ar = new adminrole();
			$do = $this->getRequest()->get("do");
			if ($do == "del"){
				$id = $this->getRequest()->get("id");
				if ($id){
					$isDel = $admin->delAdmin($id);
					$ar->delAdminroleByAdminId($id);
					if ($isDel){
						$this->view->result = $this->_lang->shanchuchenggong;
					}else{
						$this->view->result = $this->_lang->shanchushibai;
					}
				}else{
					$this->view->result = $this->_lang->shanchushibai;
				}
			}
			if ($userinfo['admin_id'] == 1){
				$admin_list = $admin->getPgxzPageModel($page, $pageSize);
			}else {
				$admin_list = $admin->getPgxzPageModel($page, $pageSize, $userinfo['admin_college']);
			}
			$this->view->list = $admin_list;
		}else if ($type == 2) {
			$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
			$pageSize = 10;
			$article = new article();
			$gd = new grademajor();
			$fu = new frontuser();
            //接受是新生入学评估还是学年末评估
            $select = $this->getRequest()->get("selected") ? $this->getRequest()->get("selected") : 0;
			$article_list = $article->getXuanjiangPageModel(1, 10, $userinfo['admin_college'], $select);
			$list = $gd->getGrademajorListPageModel($page, $pageSize,$select, $userinfo['admin_college'], 0);
			for ($i = 0; $i <count($list['list']); $i++){
				$fu_list = $fu->getPingshenList($list['list'][$i]['major_id'], $list['list'][$i]['gd_grade']);
				if ($fu_list){
					$list['list'][$i]['num'] = count($fu_list);
				}else{
					$list['list'][$i]['num'] = 0;
				}
			}

			$info['title'] = $article_list['list'][0]['article_title'];
			$info['begin'] = $article_list['list'][0]['article_begin_time'];
			$info['end'] = $article_list['list'][0]['article_end_time'];
			$this->view->isnew = $article_list['list'][0]['article_isnew'];
			$this->view->info = $info;
			$this->view->list = $list;
		}else if ($type == 3){
			$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
			$pageSize = 10;
			$nopartstu = new nopartstu();
			if ($userinfo['admin_id'] == 1){
				$list = $nopartstu->getList($page, $pageSize);
			}else{
				$list = $nopartstu->getList($page, $pageSize, $userinfo['admin_college']);
			}
			$this->view->list = $list;
		}else if ($type == 4) {
			$profile = new profile();
			$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
			$pageSize = 10;
			$do = $this->getRequest()->get("do");
			if ($do) {
				if ($do == 'pass') {
					$id = $this->getRequest()->get("id");
					if ($id) {
						$isUpdate = $profile->setProfileState($id, 3);
						if ($isUpdate) {
							$this->view->result = $this->_lang->shenpitongguochenggong;
						}else{
							$this->view->result = $this->_lang->shenpitongguoshibai;
						}
					}else{
						$this->view->result = $this->_lang->shenpitongguoshibai;
					}
				}
				if ($do == 'nopass') {
					$id = $this->getRequest()->get("id");
					if ($id) {
						$isUpdate = $profile->setProfileState($id, 4);
						if ($isUpdate) {
							$this->view->result = $this->_lang->shenpibutongguochenggong;
						}else{
							$this->view->result = $this->_lang->shenpibutongguoshibai;
						}
					}else {
						$this->view->result = $this->_lang->shenpibutongguoshibai;
					}
				}
			}
			$pro_list = $profile->getSelfplanListPageModel(2, $userinfo['admin_college'], $page, $pageSize);
			$this->view->list = $pro_list;
		}else if ($type == 5){
			$userinfo = $this->getData("userinfo");
			$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
			$grade = $this->getRequest()->get("grade") ? $this->getRequest()->get("grade") : 0;
			$pageSize = 10;
			$major = $this->getRequest()->get("major") ? $this->getRequest()->get("major") : 0;
			$name = $this->getRequest()->get("name") ? $this->getRequest()->get("name") : "null";
			$mj = new major();
			$us = new user_score();
			$profile = new profile();
			$fu = new frontuser();
			$major_list = $mj->getMajorByCollId($userinfo['admin_college']);
			$asspro = new assessment();
			$asspro_list = $asspro->getSchoolAss($page, $pageSize, 0, $userinfo['admin_college']);
			$select = $this->getRequest()->get("selected") ? $this->getRequest()->get("selected") : $asspro_list[0]['asspro_id'];
            $isnew_info=$us->getisnew_info($select);
            $isnew_info_isnew=$isnew_info['asspro_isnew'];
			if ($isnew_info_isnew == 1){
				$isnew = 3;
				$school_asspro_list = $asspro->getSchoolAss(1,10,0);
				$asspro_id = $school_asspro_list[0]['asspro_id'];
				$this->view->num = $school_asspro_list[0]['asspro_neng_num'] + 5;
				$this->view->isnew = 1;
				$zhibiao_arr = explode(",", $school_asspro_list[0]['asspro_second_content']);
				$neng_second = array_slice($zhibiao_arr, $school_asspro_list[0]['asspro_gong_num'], $school_asspro_list[0]['asspro_neng_num']);
				$us_list = $us->getSearchlist($select, $page, $pageSize, $isnew, $grade, $major, $userinfo['admin_college'], $name);
				if ($us_list['list']){
					for($i = 0; $i < count($us_list['list']); $i++){
						$score_arr = explode(",", $us_list['list'][$i]['us_score']);
						$us_list['list'][$i]['score'] = $score_arr;
						$fb = $profile->getFbById($us_list['list'][$i]['fu_id'], $school_asspro_list[0]['asspro_xuenian'], 1);
						if ($fb){
							$us_list['list'][$i]['isfb'] = 1;
							$us_list['list'][$i]['pid'] = $fb['id'];
						}else{
							$us_list['list'][$i]['isfb'] = 0;
						}
					}
				}
			}else{
				$isnew = 2;
				$asspro_id = $asspro_list[0]['asspro_id'];
				$this->view->num = $asspro_list[0]['asspro_neng_num'] + 5;
				$this->view->isnew = 0;
				$scorenum = $asspro_list[0]['asspro_neng_num'] + 1;
				$zhibiao_arr = explode(",", $asspro_list[0]['asspro_second_content']);
				$neng_second = array_slice($zhibiao_arr, $asspro_list[0]['asspro_gong_num'], $asspro_list[0]['asspro_neng_num']);
				$us_list = $us->getNotZipingSearchlist($select, $page, $pageSize, $isnew, $grade, $major, $userinfo['admin_college'], $name);
				$score_arr = array();
				if ($us_list['list']){
					for ($i = 0; $i < count($us_list['list']); $i++){
						for ($sm = 0; $sm < $scorenum; $sm++){
							$score_arr[$sm] = 0;
						}
						$frontuserDetail = $fu->getUserByUserID($us_list['list'][$i]['fu_id']);
						$us_list['list'][$i]['fu_username'] = $frontuserDetail['fu_username'];
						$us_list['list'][$i]['fu_realname'] = $frontuserDetail['fu_realname'];
						$fb = $profile->getFbById($us_list['list'][$i]['fu_id'], $asspro_list[0]['asspro_xuenian'], 0);
						if ($fb){
							$us_list['list'][$i]['isfb'] = 1;
							$us_list['list'][$i]['pid'] = $fb['id'];
						}else{
							$us_list['list'][$i]['isfb'] = 0;
						}
						$taping_score_str = $us->getScore($us_list['list'][$i]['fu_id'], $isnew);
						for ($j = 0; $j < count($taping_score_str); $j++){
							$taping_score_arr[$j] = explode(",", $taping_score_str[$j]['us_score']);
							for($z = 0 ; $z < $scorenum; $z++){
								$score_arr[$z] += $taping_score_arr[$j][$z];
							}
						}
						for ($y = 0; $y < $scorenum; $y++){
							$score_arr[$y] = round($score_arr[$y] / count($taping_score_str), 1);
						}
						$us_list['list'][$i]['score'] = $score_arr;
					}
				}
			}
			//var_dump($us_list['list']);
			$this->view->majorlist = $major_list;
			$this->view->noticelist = $asspro_list;
			$this->view->nenglist = $neng_second;
			$this->view->list = $us_list;
			$this->view->grade = $grade;
			$this->view->major = $major;
			$this->view->select = $select;
			$this->view->name = $name;
			$this->view->page = $page;
		}else{
		}
		$this->view->type = $type;
		echo $this->view->render("index.html");
	}
	
	public function Adduser(){
		$admin = new admin();
		$ar = new adminrole();
		$userinfo = $this->getData("userinfo");
		if ($_POST){
			if (trim($_POST['number']) == ""){
				$this->view->result = $this->_lang->zhigonghaobunengweikong;
			}else if($_POST['leixing'] == ""){
				$this->view->result = $this->_lang->renyuanleixingbunengweikong;
			}else{
				if ($_POST['sfzh']){
					if (strlen($_POST['sfzh']) > 6){
						$pw = substr($_POST['sfzh'], -6);
					}else{
						$pw = "111111";
					}
				}else{
					$pw = "111111";
				}
				//echo $pw;
				$id = $admin->addAdmin(trim($_POST['number']), $pw, $_POST['name'], $userinfo['admin_id'], $userinfo['admin_college'], $_POST['leixing']);
				$arId = $ar->addAminrole($id, 10);
				if ($id){
					$this->view->result = $this->_lang->tianjiachenggong;
				}else{
					$this->view->result = $this->_lang->tianjiashibai;
				}
			}
		}
		echo $this->view->render("adduser.html");
	}
	
	/**
	 * 根据职工号或者查找
	 */
	public function Search(){
		$userNum = $this->getRequest()->get("number");
		if ($userNum){
			$fu = new frontuser();
			$userinfo = $fu->authUser($userNum);
			if ($userinfo){
				$this->view->setState("1");
				$this->view->setData($userinfo);
				$this->view->setMsg("success!");
			}else{
				$this->view->setState("0");
				$this->view->setMsg("failed!");
			}
		}else{
			$this->view->setState("0");
			$this->view->setMsg("failed!");
		}
		$this->view->display("json");
	}
	
	/**
	 * 批量通过审核成长训练
	 */
	public function Passselfplan(){
		$id = $this->getRequest()->get("id");
		$id_arr = explode(",", $id);
		$profile = new profile();
		for ($i = 0; $i < count($id_arr); $i++){
			$isUpdate = $profile->setProfileState($id_arr[$i], 3);
		}
		if ($isUpdate){
			$this->view->setState(1);
			$this->view->setMsg("success!");
		}else{
			$this->view->setState(0);
			$this->view->setMsg("failed!");
		}
		$this->view->display("json");
	}
	/**
	 * 审核个人成长训练详情页面
	 */
	public function Shenhe(){
		$id = $this->getRequest()->get("id");
		$profile = new profile();
		$detail = $profile->getDetailById($id);
		$this->view->detail = $detail;
		$this->view->id = $id;
		echo $this->view->render("shenhe.html");
	}
	
	/**
	 * 增加评审人员
	 */
	public function Addpingshen(){
		$userinfo = $this->getData("userinfo");
		$realname = $this->getRequest()->get("name");
		$major = $this->getRequest()->get("major");
		$nianji = $this->getRequest()->get("grade");
		$type = $this->getRequest()->get("type");
		$username = $this->getRequest()->get("code");
		$pw = $this->getRequest()->get("password");
		$fu = new frontuser();
		$isExist = $fu->reCheck($username);
		if ($isExist){
			$this->view->setState(0);
			$this->view->setMsg("已经存在此评审委员");
		}else{
			$fuId = $fu->addFrontuser($username, $realname, 11, 'NULL', NULL, $pw, $type, $major, 'NULL', $nianji, NULL, NULL, NULL, $userinfo['admin_id']);
			if ($fuId){
				$this->view->setState(1);
				$this->view->setMsg("success!");
			}else{
				$this->view->setState(0);
				$this->view->setMsg("添加失败!");
			}
		}
		$this->view->display("json");
	}
	public function Changemajortime(){
		$userinfo = $this->getData('userinfo');
		$id = $this->getRequest()->get("id");
		$start_time = $this->getRequest()->get("start");
		$end_time = $this->getRequest()->get("end");
		$article = new article();
		$gd = new grademajor();
		$article_list = $article->getXuanjiangPageModel(1, 10, $userinfo['admin_college'], 0);
		$begin = strtotime($start_time);
		$end = strtotime($end_time);
		$college_begin = strtotime($article_list['list'][0]['article_begin_time']) ;
		$college_end = strtotime($article_list['list'][0]['article_end_time']);
		if ($begin < $college_begin || $begin > $college_end || $end < $college_begin || $end > $college_end ) {
			$this->view->setState(0);
			$this->view->setMsg("评估时间不在学院评估时间内");
		}else if ($begin > $end) {
			$this->view->setState(0);
			$this->view->setMsg("开始时间不能晚于结束时间");
		}else {
			$isUpdate = $gd->setTime($id, $start_time, $end_time);
			if ($isUpdate) {
				$this->view->setState(1);
				$this->view->setMsg("success!");
			}else{
				$this->view->setState(0);
				$this->view->setMsg("修改失败");
			}
		}
		$this->view->display("json");
	}
	
	function Setstate(){
		$userinfo = $this->getData("userinfo");
		$id = $this->getRequest()->get("id");
		$state = $this->getRequest()->get("state");
        $isnew = $this->getRequest()->get("isnew");
		$gd = new grademajor();
		$college = new college();
		$isUpdate = $gd->setState($id, $state);
		if ($isUpdate) {
			if ($state == 1){
				$college->setState02($userinfo['admin_college'], 4,$isnew);
			}
			$this->view->setState(1);
			$this->view->setMsg("success!");
		}else{
			$this->view->setState(0);
			$this->view->setMsg("failed");
		}
		$this->view->display("json");
	}
	
	public function Addnopartstu(){
		$ass = new assessment();
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
		//var_dump($info);
		$this->view->gongnum = $school[0]['asspro_gong_num'];
		$this->view->nengnum = $school[0]['asspro_neng_num'];
		$this->view->aid = $school[0]['asspro_id'];
		$this->view->info = $info;
		echo $this->view->render("addnopartstu.html");
	}
	
	public function Savescore(){
		$asspro_id = $this->getRequest()->get("aid");
		$score_str = $this->getRequest()->get("score");
		$stu_no = $this->getRequest()->get("no");
		$stu_name = $this->getRequest()->get("name");
		$stu_major = $this->getRequest()->get("major");
		$stu_college = $this->getRequest()->get("college");
		$stu_grade = $this->getRequest()->get("grade");
		$reason = $this->getRequest()->get("reason");
		$nps = new nopartstu();
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
		$id = $nps->Add($stu_no, $stu_name, $stu_major, $stu_grade, $str, $stu_college, $score_str, $reason, $asspro_id);
		if ($id){
			$this->view->setState(1);
			$this->view->setMsg("success!");
		}else{
			$this->view->setState(0);
			$this->view->setMsg("failed");
		}
		$this->view->display("json");
	}
	
	public function Editnopartstu(){
		$id = $this->getRequest()->get("id");
		$nps = new nopartstu();
		$detail = $nps->getDetail($id);
		$scoreArr = explode(',', $detail['nps_score']);
		$ass = new assessment();
		$school = $ass->getAticleById($detail['asspro_id']);
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
		$z = 1;
		for ($y = 0; $y < $school['asspro_neng_num']; $y++){
			$info['neng'][$y]['second'] = $school_second_neng[$y];
			$info['neng'][$y]['third'] = $school_third_neng[$y];
			$info['neng'][$y]['score'] = $scoreArr[$z];
			$z++;
		}
		//var_dump($info);
		$this->view->detail = $detail;
		$this->view->gongnum = $school['asspro_gong_num'];
		$this->view->nengnum = $school['asspro_neng_num'];
		$this->view->aid = $school['asspro_id'];
		$this->view->info = $info;
		$this->view->gongscore = $scoreArr[0];
		$this->view->id = $id;
		echo $this->view->render("editnopartstu.html");
	}
	
	public function Updatanopartstu(){
		$id = $this->getRequest()->get("id");
		$reason = $this->getRequest()->get("reason");
		$score = $this->getRequest()->get("score");
		$nps = new nopartstu();
		$isUpdate = $nps->editScore($id, $score, $reason);
		if ($isUpdate){
			$this->view->setState(1);
			$this->view->setMsg("success!");
		}else{
			$this->view->setState(0);
			$this->view->setMsg("failed");
		}
		$this->view->display("json");
	}
	
	public function Classdetail(){
		$gm_id = $this->getRequest()->get("id");
        $type_stu = $this->getRequest()->get("type_stu");
		$gd = new grademajor();
		$gm = $gd->getgm($gm_id);
		$grade = $gm['gd_grade'];
		$up = new urpinfo();
		$major = $gm['major_id'];
		$college = $gm['college_id'];
		$this->view->grade = $grade;
		$mj= new major();
		$major_content = $mj->getItem($major);
		$major_name = $major_content['major_name'];
		$this->view->major_name = $major_name;
		$total = $up->getSameMajorNum($major_name, $grade);
		$this->view->total = $total[0]['NUM'];
		//参与互评
		$us = new user_score();
		//echo $grade;
		$huping = $us->getHupinglist($major, $grade);
		//var_dump($huping);
		if ($huping){
			for ($i = 0; $i < count($huping); $i++){
				$row = $us->getNum(1, $major, $huping[$i]['us_create_user_id']);
				$huping[$i]['num'] = $row['NUM'];
			}
		}
		$this->view->huping = $huping;
		
		//他评人员
		$fu = new frontuser();
		$taping = $fu->getPingshenList($major, $grade);
		if ($taping){
			for ($i = 0; $i < count($taping); $i++){
				$row = $us->getNum(2, $major, $taping[$i]['fu_id']);
				$taping[$i]['num'] = $row['NUM'];
			}
		}
		$this->view->taping = $taping;
		
		//被评同学
		$beiping = $us->getTapinglist($major, $grade);
		if ($beiping){
			for($i = 0; $i < count($beiping); $i++){
				$huping_row = $us->getBeipingNum($major, $beiping[$i]['fu_id'], 1, $grade);
				$taping_row = $us->getBeipingNum($major, $beiping[$i]['fu_id'], 2, $grade);
				$beiping[$i]['hupingnum'] = $huping_row['NUM'];
				$beiping[$i]['tapingnum'] = $taping_row['NUM'];
			}
		}

		$this->view->beiping = $beiping;
		
		//未参评
		$model4 = new nopartstu();
		$wcp_stu = $model4->getAll($grade,$major);
		$this->view->wcp_stu = $wcp_stu;
	
		//自评
		$ziping = $us->getUslist(0, $major, 0, $grade);
		$curnum = $us->getUslist($type_stu, $major, 1, $grade);
		$process = round($curnum[0]['NUM'] / $total[0]['NUM'] * 100, 2);
		$beipingnum = $us->getUslist(2, $major, 1, $grade);
		$this->view->bnum = $beipingnum[0]['NUM'];
		$bpp = round($beipingnum[0]['NUM'] / $total[0]['NUM'] * 100, 2);
		$this->view->bpp = $bpp;
		$this->view->cur = $curnum[0]['NUM'];
		$this->view->jindu = $process;
		$this->view->ziping = $ziping;
		if($type_stu==0){
            echo $this->view->render("classdetail.html");
        }else{
            echo $this->view->render("classdetail_xsrx.html");
        }
	}
	
	public function Feedback(){
		$userinfo = $this->getData("userinfo");
		$id = $this->getRequest()->get("id");
		$aid = $this->getRequest()->get("aid");
		//var_dump($aid);
		$profile = new profile();
		$asspro = new assessment();
		$asspro_detail = $asspro->getAticleById($aid);
		if ($_POST){
			if ($_POST['content'] == ""){
				$this->view->result = $this->_lang->neirongbunengweikong;
			}else{
				//var_dump($asspro_detail['asspro_isnew']);
				if ($_POST['fileid']){
					$id = $profile->insertItem($id, 4, $_POST['content'], 1, 2, $asspro_detail['asspro_isnew'], $userinfo['admin_id'], $_POST['fileid']);
				}else{
					$id = $profile->insertItem($id, 4, $_POST['content'], 1, 2, $asspro_detail['asspro_isnew'], $userinfo['admin_id'], 'NULL');
				}
				if ($id){
					$this->view->result = $this->_lang->tianjiachenggong;
				}else{
					$this->view->result = $this->_lang->tianjiashibai;
				}
			}
		}
		$this->view->id = $id;
		$this->view->aid = $aid;
		echo $this->view->render("feedback.html");
	}
	
	public function Feedbackdetail(){
		$id = $this->getRequest()->get("id");
		$profile = new profile();
		$detail = $profile->getDetailById($id);
		$this->view->detail = $detail;
		echo $this->view->render("fbdetail.html");
	}
	
	public function Seepswy(){
		$major_id = $this->getRequest()->get("major");
		$grade = $this->getRequest()->get("grade");
		$fu = new frontuser();
		$pswy_list = $fu->getPingshenList($major_id, $grade);
		if ($pswy_list){
			$this->view->setState(1);
			$this->view->setData($pswy_list);
			$this->view->setMsg("success!");
		}else{
			$this->view->setState(0);
			$this->view->setMsg("failed!");
		}
		$this->view->display("json");
	}
	
	public function Delpswy(){
		$id = $this->getRequest()->get("id");
		$fu = new frontuser();
		$isDel = $fu->delUser($id);
		if ($isDel){
			$this->view->setState(1);
			$this->view->setMsg("success!");
		}else{
			$this->view->setState(0);
			$this->view->setMsg("failed!");
		}
		$this->view->display("json");
	}
	
	public function Tongjirenshu(){
		$type = $this->getRequest()->get("type");
		$create_user_id = $this->getRequest()->get("userid");
		$us = new user_score();
		$list = $us->getTongjiNum($type, $create_user_id);
		if ($list){
			$this->view->setState(1);
			$this->view->setData($list);
			$this->view->setMsg("sucess!");
		}else{
			$this->view->setState(0);
			$this->view->setMsg("failed!");
		}
		$this->view->display("json");
	}
}
