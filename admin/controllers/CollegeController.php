<?php
/**
* Create On 2014-5-13 ����4:28:25
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class CollegeController extends Controller{
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	
	public function Index(){
		$type = $this->getRequest()->get("type") ? $this->getRequest()->get("type") : 1;
		$ss = new setting();
		$ssdetail = $ss->getSystemSetting();
		if ($type == 1){
			$article = new article();
			$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
			$pageSize = 10;
			$list = $article->getNoticeListPageModel($page, $pageSize);
			$this->view->list = $list;
		}else if ($type == 2){
			$ass = new assessment();
			$userinfo = $this->getData("userinfo");
			$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
			$pageSize = 10;
			$list = $ass->getAssPageModel($page, $pageSize, NULL, 4, $userinfo['admin_college']);
// 			if ($list['list']){
// 				for ($i = 0; $i < count($list['list']); $i++){
// 					$year = date("Y",strtotime($list['list'][$i]['asspro_create_time']));
// 					$month = date("m",strtotime($list['list'][$i]['asspro_create_time']));
// 					$day = date("d",strtotime($list['list'][$i]['asspro_create_time']));
// 					if ($month > 8){
// 						$xuenian = $year + 1;
// 						$str = $year."-".$xuenian."学年";
// 					}else if ($month == 8){
// 						if ($day > 15){
// 							$xuenian = $year + 1;
// 							$str = $year."-".$xuenian."学年";
// 						}else {
// 							$xuenian = $year - 1;
// 							$str = $xuenian."-".$year."学年";
// 						}
// 					}else {
// 						$xuenian = $year - 1;
// 						$str = $xuenian."-".$year."学年";
// 					}
// 					$list['list'][$i]['xuenian']= $str;
// 				}
// 			}
			$this->view->list = $list;
		}else if ($type == 3){
			$userinfo = $this->getData("userinfo");
			$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
			$pageSize = 10;
			$article = new article();
			$ss = new setting();
			if ($userinfo['admin_id'] == 1){
				$article_list = $article->getXuanjiangPageModel02($page, $pageSize);
			}else{
				$article_list = $article->getXuanjiangPageModel02($page, $pageSize, $userinfo['admin_college']);
			}
			$this->view->list = $article_list;
		}else if ($type == 4){
			$userinfo = $this->getData("userinfo");
			$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
			$pageSize = 10;
			$gd = new grademajor();
            $asspro = new assessment();
            $asspro_list = $asspro->getSchoolAss($page, $pageSize, 0, $userinfo['admin_college']);
            $select = $this->getRequest()->get("selected") ? $this->getRequest()->get("selected") : 0;
            $this->view->isnew = $select;
           //获取此评估项目对应的gd_isnew
            $this->view->noticelist = $asspro_list;
			if ($userinfo['admin_id'] == 1){
				$gd_list = $gd->getGrademajorListPageModel($page, $pageSize,$select);
			}else{
				$gd_list = $gd->getGrademajorListPageModel($page, $pageSize,$select, $userinfo['admin_college']);
			}
			if ($gd_list['list']) {
				for ($i = 0; $i < count($gd_list['list']); $i++){
					$cur_year = date("Y");
					if ($gd_list['list'][$i]['gd_grade'] == $cur_year) {
						$gd_list['list'][$i]['new'] = 1;
					}else{
						$gd_list['list'][$i]['new'] = 0;
					}
				}
			}
			$this->view->list = $gd_list;
		}else if ($type == 5){
			$userinfo = $this->getData("userinfo");
            $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
            $grade = $this->getRequest()->get("grade") ? $this->getRequest()->get("grade") : 0;
            $pageSize = 10;
			$major = $this->getRequest()->get("major") ? $this->getRequest()->get("major") : 0;
            $name = $this->getRequest()->get("name") ? $this->getRequest()->get("name") : "null";
            $mj = new major();
			$us = new user_score();
			$fu = new frontuser();
			$major_list = $mj->getMajorByCollId($userinfo['admin_college']);
            $asspro = new assessment();
		    $asspro_list = $asspro->getSchoolAss($page, $pageSize, 0, $userinfo['admin_college']);
           // echo($asspro_list[0]['asspro_isnew']);
            //var_dump($asspro_list);
            // $asspro_list = $asspro->getSchoolAss($page, $pageSize, 0, 0);
          	$select = $this->getRequest()->get("selected") ? $this->getRequest()->get("selected") : $asspro_list[0]['asspro_id'];
            //根据$select获取活动是学年评估还是新生入学的评估
            $isnew_info=$us->getisnew_info($select);
            $isnew_info_isnew=$isnew_info['asspro_isnew'];
         // var_dump($isnew_info_isnew);
          if ($isnew_info_isnew == 1){
                $isnew = 3;
				$school_asspro_list = $asspro->getSchoolAss(1,10,0);
				$this->view->num = $school_asspro_list[0]['asspro_neng_num'] + 4;
				$this->view->isnew = 1;
				$zhibiao_arr = explode(",", $school_asspro_list[0]['asspro_second_content']);
				$neng_second = array_slice($zhibiao_arr, $school_asspro_list[0]['asspro_gong_num'], $school_asspro_list[0]['asspro_neng_num']);
				$us_list = $us->getSearchlist($select, $page, $pageSize, $isnew, $grade, $major, $userinfo['admin_college'], $name);
				if ($us_list['list']){
					for($i = 0; $i < count($us_list['list']); $i++){
						$score_arr = explode(",", $us_list['list'][$i]['us_score']);
						$us_list['list'][$i]['score'] = $score_arr;
					}
				}
			}else{
                $isnew=0;
				$this->view->num = $asspro_list[0]['asspro_neng_num'] + 4;
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
						$taping_score_str = $us->getScore($us_list['list'][$i]['fu_id'], $isnew);
						//var_dump($taping_score_str);
						for ($j = 0; $j < count($taping_score_str); $j++){
							 $taping_score_arr[$j] = explode(",", $taping_score_str[$j]['us_score']);
							for($z = 0 ; $z < $scorenum; $z++){
							    $score_arr[$z] += $taping_score_arr[$j][$z];
							}
						}
						for ($y = 0; $y < $scorenum; $y++){
							$score_arr[$y] = round($score_arr[$y] / count($taping_score_str),1);
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
		}else {
			$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
			$pageSize = 10;
			$college = new college();
			$college_list = $college->getCollegePageModel($page, $pageSize);
			$this->view->list = $college_list;
		}
		$this->view->setting = $ssdetail[0];
		$this->view->type = $type;
		echo $this->view->render("index.html");
	}
	
	public function Detail(){
		$id = $this->getRequest()->get("id");
		$article = new article();
		$detail = $article->getDetail($id);
		$this->view->detail = $detail;
		echo $this->view->render("detail.html");
	}
	
	public function Modifyass(){
		$id = $this->getRequest()->get("id");
		$ass = new assessment();
		$zbdj = new zbdj();
		$zbdj_arr = $zbdj->getZbdjList();
		$school = $ass->getSchoolAss();
		$school_second = explode(",", $school[0]['asspro_second_content']);
		$school_second_gong = array_slice($school_second, 0, $school[0]['asspro_gong_num']);
		$school_second_neng = array_slice($school_second, $school[0]['asspro_gong_num'], $school[0]['asspro_neng_num']);
		$info = $ass->getAticleById($id);
		$second_list = explode(",", $info['asspro_second_content']);
		$third_list = explode(",", $info['asspro_third_content']);
		$gong_second = array_slice($second_list, 0, $info['asspro_gong_num']);
		$neng_second= array_slice($second_list, $info['asspro_gong_num'], $info['asspro_neng_num']);
		$gong_third = array_slice($third_list, 0, $info['asspro_gong_num']);
		$neng_third = array_slice($third_list, $info['asspro_gong_num'], $info['asspro_neng_num']);
		for ($i = 0; $i < $info['asspro_gong_num']; $i++){
			$info['gong'][$i]['second'] = $gong_second[$i];
			$info['gong'][$i]['third'] = $gong_third[$i];
			if (in_array($gong_second[$i], $school_second_gong)){
				$info['gong'][$i]['is_school'] = 1;
			}else{
				$info['gong'][$i]['is_school'] = 0;
			}
		}
		for ($y = 0; $y < $info['asspro_neng_num']; $y++){
			$info['neng'][$y]['second'] = $neng_second[$y];
			$info['neng'][$y]['third'] = $neng_third[$y];
			if (in_array($neng_second[$y], $school_second_neng)){
				$info['neng'][$y]['is_school'] = 1;
			}else{
				$info['neng'][$y]['is_school'] = 0;
			}
		}
		//var_dump($info);
		//var_dump($school_second_neng);
		$this->view->zbdj = $zbdj_arr;
		$this->view->info = $info;
		$this->view->id = $id;
		echo $this->view->render("modifyass.html");
	}
	
	public function Editass(){
		$id = $this->getRequest()->get("id");
		$userinfo = $this->getData("userinfo");
		$title = $this->getRequest()->get("title");
		$leixing = $this->getRequest()->get("leixing");
		$gong_num = $this->getRequest()->get("gongnum");
		$neng_num = $this->getRequest()->get("nengnum");
		$second_content = $this->getRequest()->get("second");
		$third_content = $this->getRequest()->get("third");
		$ass = new assessment();
		if ($id){
			$isUpdate = $ass->updateAss($id, $title, $gong_num, $neng_num, $second_content, $third_content, $leixing);
			if ($isUpdate){
				$this->view->setState("1");
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
	
	public function Assdetail(){
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
		$school = $ass->getSchoolAss();
		$school_second = explode(",", $school[0]['asspro_second_content']);
		$school_second_gong = array_slice($school_second, 0, $school[0]['asspro_gong_num']);
		$school_second_neng = array_slice($school_second, $school[0]['asspro_gong_num'], $school[0]['asspro_neng_num']);
		$info = $ass->getAticleById($id);
		$second_list = explode(",", $info['asspro_second_content']);
		$third_list = explode(",", $info['asspro_third_content']);
		$gong_second = array_slice($second_list, 0, $info['asspro_gong_num']);
		$neng_second= array_slice($second_list, $info['asspro_gong_num'], $info['asspro_neng_num']);
		$gong_third = array_slice($third_list, 0, $info['asspro_gong_num']);
		$neng_third = array_slice($third_list, $info['asspro_gong_num'], $info['asspro_neng_num']);
		for ($i = 0; $i < $info['asspro_gong_num']; $i++){
			$info['gong'][$i]['second'] = $gong_second[$i];
			$info['gong'][$i]['third'] = $gong_third[$i];
			if (in_array($gong_second[$i], $school_second_gong)){
				$info['gong'][$i]['is_school'] = 1;
			}else{
				$info['gong'][$i]['is_school'] = 0;
			}
		}
		for ($y = 0; $y < $info['asspro_neng_num']; $y++){
			$info['neng'][$y]['second'] = $neng_second[$y];
			$info['neng'][$y]['third'] = $neng_third[$y];
			if (in_array($neng_second[$y], $school_second_neng)){
				$info['neng'][$y]['is_school'] = 1;
			}else{
				$info['neng'][$y]['is_school'] = 0;
			}
		}

		$this->view->zbdj = $zbdj_arr;
		$this->view->info = $info;
		$this->view->id = $id;


		echo $this->view->render("assdetail.html");
	}
	
	public function Addass(){
		$ass = new assessment();
		$zbdj = new zbdj();
		$school = $ass->getSchoolAss();
    	$zbdj_arr = $zbdj->getZbdjList();
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
		$this->view->zbdj = $zbdj_arr;
		$this->view->info = $info;
		echo $this->view->render("addass.html");
	}
	
	public function Insertass(){
        $userinfo = $this->getData('userinfo');
		$title =$_POST['title'];
		$isnew =$_POST['leixing'];
		$gong_num =$_POST['gong_num'];
		$neng_num = $_POST['neng_num'];
		$second_content =$_POST['second'];
		$third_content =$_POST['third'];

		$ass = new assessment();
		$college = new college();
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
		$cur_time = time();

		$the_last_notice = $article->getNoticeListByXuenian($str, $isnew);
        $the_last_acticle_id=$the_last_notice[0]['article_id'];
		$the_last_xuejiang = $article->getXuejiangByXuenianAndCollege($str, $userinfo['admin_college'], $isnew);
		if ($the_last_notice){
			if (strtotime($the_last_notice[0]['article_begin_time']) <= $cur_time && strtotime($the_last_notice[0]['article_end_time']) >= $cur_time){
				$id = $ass->addAss($title,$the_last_acticle_id, $str, $gong_num, $neng_num, $second_content, $third_content, $userinfo['admin_college'], $userinfo['admin_id'], $isnew);
				if ($id) {
                    if($_FILES['file']){
                   //评估细则附件的上传
                        for($i=0;$i<count($_FILES['file']['name'])-1;$i++){
                            $new_name=iconv("utf-8","gbk",$_FILES['file']['name'][$i]);
                            $path="/common/upload/files/college/".$new_name;
                            $realpath=str_replace('\\','/',DIR).$path;
                            $su=move_uploaded_file($_FILES['file']['tmp_name'][$i],$realpath) ? '1' : '0';
                            if($su){
                                $path = "/common/upload/files/college/".$_FILES['file']['name'][$i];
                                $file_type=explode(".",$new_name);
                                $file_id=$college->uploadfile(iconv("gbk","utf-8",$new_name),$path,$file_type[1]);
                                $college->addass_file($id,$file_id);
                            }
                        }
                    }
					$college->setState02($userinfo['admin_college'], 1,$isnew);
                    echo "<div id='error' style='display:none'>添加成功!</div>";
                    $college = new CollegeController();
                    $college->Addass();
                    exit;
				}else{
                    $college->setState02($userinfo['admin_college'], 1,$isnew);
                    echo "<div id='error' style='display:none'>添加失败!</div>";
                    $college = new CollegeController();
                    $college->Addass();
                    exit;

                }
			}else{
                $college->setState02($userinfo['admin_college'], 1,$isnew);
                echo "<div id='error' style='display:none'>此时间段内不能新建评估细则!</div>";
                $college = new CollegeController();
                $college->Addass();
                exit;
			}
		}else{
            $college->setState02($userinfo['admin_college'], 1,$isnew);
            echo "<div id='error' style='display:none'>还没开始评估，不能创建评估细则!</div>";
            $college = new CollegeController();
            $college->Addass();
            exit;
		}
		//$this->view->display("json");
	}
	
	public function Addxuejiang(){
		$article = new article();
		$college = new college();
		$asspro = new assessment();
		$userinfo = $this->getData("userinfo");
        //生成随机数
        $mm=rand(0,100);
        $this->view->mm = $mm;
		$schoolnotice = $article->getNoticeListPageModel(1,10);
		$last_notice = $schoolnotice['list'][0];
		if ($_POST){
			if ($_POST['start'] == ""){
				$this->view->result = $this->_lang->kaishishijianbunengweikong;
			}else if ($_POST['end'] == ""){
				$this->view->result = $this->_lang->jiesushijianbunengweikong;
			}else if ($_POST['isnew']==""){
				$this->view->result = $this->_lang->leixingbunengweikong;
			}else if (trim($_POST['title']) == ""){
				$this->view->result = $this->_lang->biaotibunengweikong;
			}else if ($_POST['content'] == ""){
				$this->view->result = $this->_lang->neirongbunengweikong;
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
				$the_last_pingguxize = $asspro->getSchoolAss(1, 10, 0, $userinfo['admin_college']);
				if ($the_last_pingguxize[0]['asspro_xuenian'] == $str){
					if ($the_last_pingguxize[0]['asspro_state'] == 3){
						if ($_POST['fileid']){
							$articleId = $article->addArticle(addslashes($_POST['content']), 2, $userinfo['admin_id'], trim($_POST['title']), $str, "", $_POST['fileid'], $_POST['start'], $_POST['end'], $userinfo['admin_college'], $_POST['isnew']);
						}else{
							$articleId = $article->addArticle(addslashes($_POST['content']), 2, $userinfo['admin_id'], trim($_POST['title']), $str, "", 'NULL', $_POST['start'], $_POST['end'], $userinfo['admin_college'], $_POST['isnew']);
						}
						if ($articleId){
							$college->setState02($userinfo['admin_college'], 3,$_POST['isnew']);
							$this->view->result = $this->_lang->tianjiachenggong;
						}else{
							$this->view->result = $this->_lang->tianjiashibai;
						}
					}else{
						$this->view->result = $this->_lang->xueyuandepingguzizemeiyoushengxiaocishijianduanneibunengfabu;
					}
				}else{
					$this->view->result = $this->_lang->xuenianhaimeiyoufabupingguzize;
				}
			}
		}
		$this->view->last = $last_notice;
		echo $this->view->render("addxuejiang.html");
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
	
	public function  Detailxuejiang(){
		$id = $this->getRequest()->get('id');
		$article = new article();
		$detail = $article->getDetail($id);
		$this->view->detail = $detail;
		echo $this->view->render("xuejiangdetail.html");
	}
}
