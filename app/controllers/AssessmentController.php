<?php
class AssessmentController extends Controller {
	private static $userinfo; // 静态属性，将session的用户信息装入
	public function __construct() {
		//echo 222;
		parent::__construct ();
		 $this->view->web_url = $this->getRequest ()->hostUrl;
		 self::$userinfo = $this->getData ( 'userinfo' );


		
	}

	public function AddScore(){
		$score = $_POST['str'];
		$u_id = $this->getRequest()->get("id");
		$info = $this->getData('userinfo');
		$c_id = $info['fu_id'];
		$model = new assessment();
		$stu = $model->getAllMes2($u_id,0);
		$p_id = $stu['asspro_id'];
		$type = 2;
		$good1 = $this->getRequest ()->get ( "good1" );
		$good2 = $this->getRequest ()->get ( "good2" );
		$good3 = $this->getRequest ()->get ( "good3" );
		$bad1 = $this->getRequest ()->get ( "bad1" );
		$bad2 = $this->getRequest ()->get ( "bad2" );
		$bad3 = $this->getRequest ()->get ( "bad3" );
		$model = new user_score();
		$yes = $model->getisorno($u_id,$c_id);
		if($yes == false){
			$result = $model->AddScore($u_id,$p_id,$type,$score,$c_id);
			$model = new goodorbad ();
			if ($good1 != "输入文本…") {
				$result = $model->saveGood ( $u_id, $good1,$c_id );
			}
			if ($good2 != "输入文本…") {
				$result = $model->saveGood ( $u_id, $good2,$c_id);
			}
			if ($good3 != "输入文本…") {
				$result = $model->saveGood ( $u_id, $good3,$c_id );
			}
			if ($bad1 != "输入文本…") {
				$result = $model->saveBad ( $u_id, $bad1,$c_id );
			}
			if ($bad2 != "输入文本…") {
				$result = $model->saveBad ( $u_id, $bad2,$c_id );
			}
			if ($bad3 != "输入文本…") {
				$result = $model->saveBad ( $u_id, $bad3,$c_id );
			}
		}else{
			$model = new user_score();
			$result = $model->updateScore($u_id,$score,$c_id);
			$model = new goodorbad ();
			$good = $model->getGood($u_id,$c_id);
			$bad = $model->getBad($u_id,$c_id);		
			if(count($good)==1){
				$good = Array(0=>$good[0]['goodorbad_content'],1=>"输入文本…",2=>"输入文本…");
			}else if(count($good)==2){
				$good = Array(0=>$good[0]['goodorbad_content'],1=>$good[1]['goodorbad_content'],2=>"输入文本…");
			}else if(count($good)==3){
				$good = Array(0=>$good[0]['goodorbad_content'],1=>$good[1]['goodorbad_content'],2=>$good[2]['goodorbad_content']);
			}
			if(count($bad)==1){
				$bad = Array(0=>$bad[0]['goodorbad_content'],1=>"输入文本…",2=>"输入文本…");
			}else if(count($bad)==2){
				$bad = Array(0=>$bad[0]['goodorbad_content'],1=>$bad[1]['goodorbad_content'],2=>"输入文本…");
			}else if(count($bad)==3){
				$bad = Array(0=>$bad[0]['goodorbad_content'],1=>$bad[1]['goodorbad_content'],2=>$bad[2]['goodorbad_content']);
			}
			if ($good1 != $good[0]) {
				$content = $good[0];
				$yon = $model->getg($content,$u_id,$c_id);
				$result = $model->updateGood ( $yon['goodorbad_id'], $good1 );
			}
			if ($good2 != $good[1]) {
				$content = $good[1];
				$yon = $model->getg($content,$u_id,$c_id);
				if($yon == false){
					$result = $model->saveGood ( $u_id, $good2,$c_id );
				}else{
					$result = $model->updateGood ( $yon['goodorbad_id'], $good2 );
				}
			}
			if ($good3 != $good[2]) {
				$content = $good[2];
				$yon = $model->getg($content,$u_id,$c_id);
				if($yon == false){
					$result = $model->saveGood ( $u_id, $good3,$c_id );
				}else{
					$result = $model->updateGood ( $yon['goodorbad_id'], $good3 );
				}
			}
			if ($bad1 != $bad[0]) {
				$content = $bad[0];
				$yon = $model->getb($content,$u_id,$c_id);
				$result = $model->updateBad ( $yon['goodorbad_id'], $bad1 );
			}
			if ($bad2 != $bad[1]) {
				$content = $bad[1];
				$yon = $model->getb($content,$u_id,$c_id);
				if($yon == false){
					$result = $model->saveBad ( $u_id, $bad2,$c_id);
				}else{
					$result = $model->updateBad ( $yon['goodorbad_id'], $bad2 );
				}
			}
			if ($bad3 != $bad[2]) {
				$content = $bad[2];
				$yon = $model->getb($content,$u_id,$c_id);
				if($yon == false){
					$result = $model->saveBad ( $u_id, $bad3,$c_id );
				}else{
					$result = $model->updateBad ( $yon['goodorbad_id'], $bad3 );
				}
			}
		}
	}

	public function updateCommit(){
		$str = $this->getRequest()->get("str");
		$numList = explode(",",$str);
		$info = $this->getData('userinfo');
		$p_id = $info['fu_id'];
		for($i=0;$i<count($numList)-1;$i++){
			$num = $numList[$i];
			$model = new user_score();
			$result = $model->updatecommit($num, $p_id);
		}
	}

	public function Committee(){
        $this->view->selectMenu=1;
		$info = $this->getData('userinfo');
		$username = $info['fu_realname'];
		$model = new frontuser();
		$all = $model->getPingshenMess($username);
		$p_id = $all['fu_id'];
 		$major = $all['fu_major'];
		$grade = $all['fu_grade'];
		$model = new grademajor();
        $front = new frontuser ();

        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 10;
        $stu = $front->searchStudent_03($major,$grade,$page,$pageSize);
        if($stu['list']){
            $user_score = new user_score ();
            $mm = new frontuser ();
            for($i=0;$i<count($stu['list']);$i++){
                $id=$mm->zz_fu_id($stu['list'][$i]['bks_code']);
                $stu['list'][$i]['fu_id']=$id;
                $result = $user_score->getisorno($id,$p_id);
                if($result){
                    $stu['list'][$i]['fu_salt']="是";
                }else{
                    $stu['list'][$i]['fu_salt']="否";
                }
            }
        $this->view->stuList=$stu;
        }else{
            $this->view->no_stu=1;
        }
	  $isok = $model->getinfofromfuid($p_id,0);
		if($isok['gd_state'] >= 2){
			$this->getView ()->display ( "committee_score.html" );
		}else{
			$this->getView()->display("noTime.html");
		}
	}
	public function CommitteeDetail() {
		$id = $this->getRequest ()->get ( "id" );
		$info = $this->getData('userinfo');
		$p_id = $info['fu_id'];
		$model = new frontuser ();
		$stu = $model->getUserByUserID ( $id );
		$this->view->stu = $stu;
		$model = new assessment ();
		$allMes = $model->getAllMes ( $id );
		$model = new user_score ();
		$isorno = $model->getisorno($id,$p_id);
		$mesAll1 = explode ( ",", $allMes ['asspro_second_content'] );
		$mesAll2 = explode ( ",", $allMes ['asspro_third_content'] );
		$mesList_gong = array ();
		$mesList_neng = array ();
		if($isorno != false){
			$score = $isorno['us_score'];
			$scoreList = explode(",",$score);
			//var_dump($scoreList);
			//var_dump(count($scoreList));
			for($a = 0;$a<count($scoreList);$a++){
				if($scoreList[$a] == 6){
					$scoreList[$a] = 1;
				}else if($scoreList[$a] == 4){
					$scoreList[$a] = 2;
				}else if($scoreList[$a] == 2){
					$scoreList[$a] = 3;
				}
			}
			//var_dump($scoreList);
			for($i = 0; $i < $allMes ['asspro_gong_num']; $i ++) {
				$mes = array (
						$allMes ['asspro_gong_num'],
						$mesAll1 [$i],
						$mesAll2 [$i],
						$scoreList[0]
				);
				array_push ( $mesList_gong, $mes );
			}
			for($j = $allMes ['asspro_gong_num']; $j < $allMes ['asspro_gong_num'] + $allMes ['asspro_neng_num']; $j ++) {
				$mes = array (
						$allMes ['asspro_neng_num'],
						$mesAll1 [$j],
						$mesAll2 [$j],
						$scoreList[$j-$allMes ['asspro_gong_num']+1]
				);
				array_push ( $mesList_neng, $mes );
			}
			$isno = 0;
		}else{
			for($i = 0; $i < $allMes ['asspro_gong_num']; $i ++) {
				$mes = array (
						$allMes ['asspro_gong_num'],
						$mesAll1 [$i],
						$mesAll2 [$i],
						0
				);
				array_push ( $mesList_gong, $mes );
			}
			for($j = $allMes ['asspro_gong_num']; $j < $allMes ['asspro_gong_num'] + $allMes ['asspro_neng_num']; $j ++) {
				$mes = array (
						$allMes ['asspro_neng_num'],
						$mesAll1 [$j],
						$mesAll2 [$j],
						0
				);
				array_push ( $mesList_neng, $mes );
			}
			$isno = 1;
		}
		$this->view->isno = $isno;
		$this->view->gongnum = $allMes ['asspro_gong_num'];
		$this->view->nengnum = $allMes ['asspro_neng_num'];
		$this->view->mesList_gong = $mesList_gong;
		$this->view->mesList_neng = $mesList_neng;
		$model = new zbdj ();
		$title = $model->getTitle ();
		$this->view->titleList = $title;
		$model = new goodorbad ();
		$good = $model->getGood($id,$p_id);
		$bad = $model->getBad($id,$p_id);
		if($good == false){
			$good = Array(0=>"输入文本…",1=>"输入文本…",2=>"输入文本…");
		}else{
			if(count($good)==1){
				$good = Array(0=>$good[0]['goodorbad_content'],1=>"输入文本…",2=>"输入文本…");
			}else if(count($good)==2){
				$good = Array(0=>$good[0]['goodorbad_content'],1=>$good[1]['goodorbad_content'],2=>"输入文本…");
			}else if(count($good)==3){
				$good = Array(0=>$good[0]['goodorbad_content'],1=>$good[1]['goodorbad_content'],2=>$good[2]['goodorbad_content']);
			}
		}if($bad == false){
			$bad = Array(0=>"输入文本…",1=>"输入文本…",2=>"输入文本…");
		}else{
			if(count($bad)==1){
				$bad = Array(0=>$bad[0]['goodorbad_content'],1=>"输入文本…",2=>"输入文本…");
			}else if(count($bad)==2){
				$bad = Array(0=>$bad[0]['goodorbad_content'],1=>$bad[1]['goodorbad_content'],2=>"输入文本…");
			}else if(count($bad)==3){
				$bad = Array(0=>$bad[0]['goodorbad_content'],1=>$bad[1]['goodorbad_content'],2=>$bad[2]['goodorbad_content']);
			}
		}
		$this->view->goodList = $good;
		$this->view->badList = $bad;
		$this->getView ()->display ( "committee_detail.html" );
	}
	public function Propaganda() {
		$fu_id = self::$userinfo['fu_id'];
		$db = new frontuser();
		$info = $db->getUserByUserID($fu_id);
		$college_id = $info['fu_college']; // $this->getRequest()->get("a_id");
		//echo $college_id;
		$db = new article();
		$content = $db->zz_getAticleById($college_id, 2,1);

		$this->view->content = $content;

		//$this->view->content = $content;
		$this->getView ()->display ( "preach.html" );
	}
	//新生入学模块
    //本学院宣讲方案
	public function xsrxPropaganda(){
        $this->view->selectMenu=1;
        $fu_id = self::$userinfo['fu_id'];
        //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($fu_id);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($fu_id);
        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }

        $db = new frontuser();
        $info = $db->getUserByUserID($fu_id);
        $college_id = $info['fu_college']; // $this->getRequest()->get("a_id");
        $db = new article();
        //echo $college_id;
        $content = $db->zz_getAticleById($college_id, 2,1);
        $this->view->content = $content;
        //var_dump($content);
		$this->getView ()->display ( "xsrxPropaganda.html" );
	}
	//本学院评估细则
    public function xsrxIntroduction(){
        $fu_id = self::$userinfo['fu_id'];
        //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($fu_id);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($fu_id);
        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }

        $db = new frontuser();
        $info = $db->getUserByUserID($fu_id);
        $college_id = $info['fu_college'];
        $db = new assessment();
        $re = $db->zz_getasspro_idbycollegeid($college_id,1);
        $id = $re['asspro_id'];

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

        $model = new assessment();
        $content = $model->getAticleById ( $id );
        $db = new zbdj();
        $re = $db->getTitle();
       if($re){
            $this->view->zz_zhibiao = $re;
        }
     if($content){
            $content ['second'] = explode ( ',', $content ['asspro_second_content'] );
            $content ['third'] = explode ( ',', $content ['asspro_third_content'] );
            $this->view->content = $content;
        }else{
            $content = 0;
            $this->view->content = $content;
        }
        $this->getView ()->display ( "xsrxIntroduction.html" );
    }
    //新生自评
    public function  xsrxSelfAssessment(){
        //生成随机数
        $mm=rand(100,1000);
        $this->view->mm = $mm;
        $fu_id = self::$userinfo['fu_id'];
        //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($fu_id);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($fu_id);
        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }

        //判断是否开始的验证
        $db = new grademajor();
        $re = $db->getinfofromfuid(self::$userinfo['fu_id'],1);

        $state = $re['gd_state'];
        $model = new profile ();
        $stuId = self::$userinfo['fu_id'];
        $type = 1;
        $year = Date ( "Y" );
        $item = $model->getItem( $stuId, $type,1 );
        if ($item) {
            $this->view->item = $item;
        }
        $this->view->stuId = $stuId;
        $this->getArticle ( 4 );

        $db3 = new article();
        $year_row = $db3->zz_getAticleByyear(3, 1);
      //如果全校自评开始
        if($year_row == true){
            $db = new user_score ();
            $row = $db->getyearscore( self::$userinfo ['fu_id'], 3 );
            $this->view->commit = $row;
            if ($row == true) {
                $db4 = new assessment ();
                $row2 = $db4->getSchoolAss(1,10,0);
                $nums = $row2[0]['asspro_gong_num'];
                $str = $row2[0]['asspro_second_content'];
                for($i = 1; $i <= $nums; $i ++) {
                    $pos = strpos ( $str, ',' );
                    $str = substr ( $str, ($pos + 1) );
                }
                $str = '公,' . $str;
                $arr1 = explode ( ',', $str );
                if(strstr($row ['us_score'] , ',')){
                    $arr2 = explode ( ',', $row ['us_score'] );
                }else{
                    if(!empty($row ['us_score'])){
                        $arr2[] = $row ['us_score'];
                    }else{
                        $arr2 = array();
                    }
                }
                $suggest = new suggestyuju();
                $yujv = $suggest->getSyList();
                $arr3 = array ();
                $allnums = count ( $arr1 );
                for($i = 0; $i < $allnums; $i ++) {
                    $arr3 [$i] [] = $arr1 [$i];
                    if($arr2[$i] || $arr2[$i] === '0'){
                        $tmp_score = round(($arr2 [$i]),1); // 最多分是6分
                        $arr3 [$i] [] = $tmp_score;
                        foreach($yujv as $k2=>$v2){
                            if($tmp_score>=$v2['sy_begin'] && $tmp_score <=$v2['sy_end']){
                                $arr3 [$i] [] = $v2['sy_content'];
                            }
                        }

                    }else{
                        $arr3 [$i] [] = '暂无数据';
                        $arr3 [$i] [] = '暂无数据';
                    }
                }
                $this->view->info = $arr3;
            }

        }else{
            //如果自评还没有开始
            $this->view->weikaishi = "未开始";
        }

        $this->getView()->state = $state;


        //评价小贴士
        $db = new article();
        $articleList = $db->getTipsPageModel(1);
        $this->view->name = $item;
        $this->getView()->articleList = $articleList['list'];

        $this->getView ()->display ( "xsrxSelfAssessment.html" );
    }
    //新生成长训练计划
    public function  xsrxtrainningPlan(){
        $model = new profile ();
        $stuId = self::$userinfo['fu_id'];
        //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($stuId);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($stuId);
        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }

        $type = 3;
        $item = $model->getItem ( $stuId, $type,1);
        if ($item) {
            switch ($item ['state']) {
                case 1 :
                    $item ['status'] = "新建";
                    break;
                case 2 :
                    $item ['status'] = "待审核";
                    break;
                case 3 :
                    $item ['status'] = "已通过";
                    break;
                case 4 :
                    $item ['status'] = "未通过";
                    break;
                default :
                    break;
            }
            $this->view->item = $item;
        } else {
            $status = "新建";
            $this->view->status = $status;
        }
        //var_dump($item);
        $type = 4;
        $feedback = $model->getItem ( $stuId, $type,1);
        $db = new grademajor();
        $re = $db->getinfofromfuid(self::$userinfo['fu_id'],1);
        $state = $re['gd_state'];
        $this->view->feedback = $feedback;
        $this->view->stuId = $stuId;
        $this->view->state = $state;
        $this->view->state2 = $item ['state'];
        $this->getView ()->display ( "xsrxtrainningPlan.html" );
    }
	
	public function Introduction() {
		$fu_id = self::$userinfo['fu_id'];
		$db = new frontuser();
		$info = $db->getUserByUserID($fu_id);
		$college_id = $info['fu_college'];
		$db = new assessment();
		$re = $db->zz_getasspro_idbycollegeid($college_id,0);

		$id = $re['asspro_id']; // $this->getRequest()->get("id");

		$model = new assessment ();
		$content = $model->getAticleById ( $id );
		$content ['second'] = explode ( ',', $content ['asspro_second_content'] );
		$content ['third'] = explode ( ',', $content ['asspro_third_content'] );
		// print_r($content);
		$this->view->content = $content;
		$this->getView ()->display ( "introduction.html" );
	}

	public function getstudent(){
		$info = $this->getData('userinfo');
		$username = $info['fu_realname'];
		$model = new frontuser();
		$all = $model->getPingshenMess($username);
		$p_id = $all['fu_id'];
		$major = $all['fu_major'];
		$grade = $all['fu_grade'];
		$username = $this->getRequest()->get('num');
		$model = new frontuser ();
		$stu = $model->searchStudent_02($username,$major,$grade);
		if($stu == false){
		$this->view->setState(0);
		$this->view->display("json");
		}else{
            $model = new user_score ();
            $mm = new frontuser ();
            for($i=0;$i<count($stu);$i++){
                $id=$mm->zz_fu_id($stu[$i]['bks_code']);
                $stu[$i]['fu_id']=$id;
                $result = $model->getisorno($id,$p_id);
                if($result){
                    $stu[$i]['fu_salt']="是";
                }else{
                    $stu[$i]['fu_salt']="否";
                }
            }
			$this->view->setData($stu);
			$this->view->display("json");
		}
	}

	public function selfAssessment() {
		$model = new profile ();
		$stuId = self::$userinfo ['fu_id'];
		$type = 1;
		$year = Date ( "Y" );
		$item = $model->getItem ( $stuId, $type, $year );

		if ($item) {
			$this->view->item = $item;
		}
		$this->view->stuId = $stuId;
		$this->getArticle ( 4 );

		$db3 = new article();
		$year_row = $db3->zz_getAticleByyear(3, 1);
		if($year_row == true){
		$db = new user_score ();
		$row = $db->getyearscore ( self::$userinfo ['fu_id'], 3 );
		$this->view->commit = $row;
		if ($row == true) {
			// echo "<pre>";
			// print_r($row);
			$db4 = new assessment ();
			$row2 = $db4->zz_getscoreorder ();
			$nums = $row2 ['asspro_gong_num'];
			$str = $row2 ['asspro_second_content'];
			for($i = 1; $i <= $nums; $i ++) {
				$pos = strpos ( $str, ',' );
				$str = substr ( $str, ($pos + 1) );
			}
			$str = '公,' . $str;
			$arr1 = explode ( ',', $str );
			/* $arr1 = explode ( ',', $str );
			$arr2 = explode ( ',', $row ['us_score'] );
			$arr3 = array ();
			$allnums = count ( $arr1 );
			for($i = 0; $i < $allnums; $i ++) {
				$arr3 [$i] [] = $arr1 [$i];
				$arr3 [$i] [] = round(($arr2 [$i] * 6),1); // 最多分是6分
			} */
			if(strstr($row ['us_score'] , ',')){
				$arr2 = explode ( ',', $row ['us_score'] );
			}else{
				if(!empty($row ['us_score'])){
					$arr2[] = $row ['us_score'];
				}else{
					$arr2 = array();
				}
			}
			$arr3 = array ();
			$allnums = count ( $arr1 );
			for($i = 0; $i < $allnums; $i ++) {
				$arr3 [$i] [] = $arr1 [$i];
			
				if(!empty($arr2[$i])){
					$arr3 [$i] [] = round(($arr2 [$i] * 6),1); // 最多分是6分
				}else{
					$arr3 [$i] [] = '暂无数据';
				}
			}

			$this->view->info = $arr3;
		}
		}else{
			$this->view->weikaishi = "未开始";
		}

		$this->getView ()->display ( "selfAssessment.html" );
	}
	public function selfPlanning() {
		$model = new profile ();
		$stuId = 1;
		$type = 2;
		$year = Date ( "Y" );
		$item = $model->getItem ( $stuId, $type, $year );
		if ($item) {
			$this->view->item = $item;
		}
		$this->view->stuId = $stuId;
		$this->getArticle ( 5 );
		$this->getView ()->display ( "selfPlanning.html" );
	}
	public function trainningPlan() {
		$model = new profile ();
		$stuId = self::$userinfo['fu_id'];
		$type = 3;
		$year = Date ( "Y" );
		$item = $model->getItem ( $stuId, $type, $year );
		if ($item) {
			switch ($item ['state']) {
				case 1 :
					$item ['status'] = "新建";
					break;
				case 2 :
					$item ['status'] = "待审核";
					break;
				case 3 :
					$item ['status'] = "已通过";
					break;
				case 4 :
					$item ['status'] = "未通过";
					break;
				default :
					$item ['status'] = "新建";
					break;
			}
			$this->view->item = $item;
		} else {
			$status = "新建";
			$this->view->status = $status;
		}
		$this->view->stuId = $stuId;
		$this->getView ()->display ( "trainningPlan.html" );
	}
	public function collegeAssessmentList() {
        $fu_id = self::$userinfo['fu_id'];
        //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($fu_id);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($fu_id);
        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }

        $this->view->selectMenu=1;
        //各学院评估的细则
        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 6;
        $model = new assessment ();
        $assList = $model->getList02 ($page,$pageSize);

        $this->view->assList = $assList;
		$model = new notice();
		$notice = $model->getnotice();
		if($notice == false){
			$flag = 0;
		}else{
			$this->view->notice = $notice;
			$flag = 1;
		}
		$this->view->flag = $flag;
		$this->getView ()->display ( "collegeAssessmentList.html" );
	}
	public function collegePropagandaList() {
        $fu_id = self::$userinfo['fu_id'];
        //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($fu_id);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($fu_id);
        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }

        $this->view->selectMenu=1;
		$model = new article ();
        //各学院宣讲方案
        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 1;
         $assList = $model->getArticleList02 ( 2,$page,$pageSize);
        $this->view->assList = $assList;
		$model = new notice();
		$notice = $model->getnotice();
		if($notice == false){
			$flag = 0;
		}else{
			$this->view->notice = $notice;
			$flag = 1;
		}

		//$this->view->PropagandaList = $PropagandaList;
		$this->view->flag = $flag;
		$this->getView ()->display ( "collegePropagandaList.html" );
	}
	public function collegeAssessmentDetail() {
		$id = $this->getRequest ()->get ( "id" );

        $fu_id = $this->getRequest()->get("id");

        //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($fu_id);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($fu_id);
        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }

		$model = new assessment ();
		$content = $model->getAticleById ( $id );
		$content ['second'] = explode ( ',', $content ['asspro_second_content'] );
		$content ['third'] = explode ( ',', $content ['asspro_third_content'] );
		// print_r($content);
		$this->view->content = $content;

        //获取个学院评估细则
     $assList = $model->getList02 (1,6);
        $this->view->assList = $assList;

		$this->getView ()->display ( "collegeAssessmentDetail.html" );
	}
	public function collegePropagandaDetail() {
		$articleId = $this->getRequest ()->get ( "a_id" );
        $fu_id = $this->getRequest()->get("id");

        //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($fu_id);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($fu_id);
        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }

         $model = new article ();
        $assList = $model->getArticleList02 ( 2,1,6);
        $this->view->assList = $assList;

        $content = $model->getAticleById ( $articleId );
		$this->view->content = $content;
       //根据id获取上传的文件
        $file_info=$model->getfile_info($content['file_id']);
        if($file_info){
            $this->view->file_info = $file_info;
        }
		$this->getView ()->display ( "collegePropagandaDetail.html" );
	}
        public function xnmPropaganda() {
            $this->view->selectMenu=1;
		$fu_id = self::$userinfo['fu_id'];
            //得出消息总数
            $message = new message();
            //得出未读消息总数
            $notReadMessage = $message->getNotReadMessageCountById($fu_id);
            if($notReadMessage==false){
                $this->view->countNotReadMessage = 0;
            }else{
                $this->view->countNotReadMessage = $notReadMessage["count(*)"];
            }
            $AllMessageList = $message->getAllMessageById($fu_id);
            if($AllMessageList==false){
                $this->view->countMessage = 0;
            }else{
                $this->view->countMessage = count($AllMessageList);
            }

		$db = new frontuser();
		$info = $db->getUserByUserID($fu_id);
		$college_id = $info['fu_college']; // $this->getRequest()->get("a_id");
		$db = new article();
		//echo $college_id;
		$content = $db->zz_getAticleById($college_id, 2,0);
		$this->view->content = $content;
		//var_dump($content);
		$this->getView ()->display ( "xnmPropaganda.html" );
	}
	public function xnmIntroduction() {
		$fu_id = self::$userinfo['fu_id'];
        //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($fu_id);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($fu_id);
        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }

		$db = new frontuser();
		$info = $db->getUserByUserID($fu_id);
		$college_id = $info['fu_college'];
		$db = new assessment();
		$re = $db->zz_getasspro_idbycollegeid($college_id,0);
		$id = $re['asspro_id'];

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
		$model = new assessment ();
		$content = $model->getAticleById ( $id );
		//var_dump($content);
		
		$db = new zbdj();
		$re = $db->getTitle();
		
		if($re){
			$this->view->zz_zhibiao = $re;
		} 
		
		if($content){
		$content ['second'] = explode ( ',', $content ['asspro_second_content'] );
		$content ['third'] = explode ( ',', $content ['asspro_third_content'] );
		// print_r($content);
		$this->view->content = $content;
		}else{
			$content = 0;
			$this->view->content = $content;
		}
		$this->getView ()->display ( "xnmIntroduction.html" );
	}
	public function xnmSelfAssessment() {
        //生成随机数
        $mm=rand(100,1000);
        $this->view->mm = $mm;
        $stuId = self::$userinfo['fu_id'];
        //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($stuId);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($stuId);
        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }
        //生成随机数
        $mm=rand(0,100);
        $this->view->mm = $mm;
		//判断是否开始的验证
		$db = new grademajor();
		$re = $db->getinfofromfuid(self::$userinfo['fu_id'],0);
		$state = $re['gd_state'];
		$model = new profile ();
        $type = 1;
		$year = Date ( "Y" );
		$item = $model->getItem ( $stuId, $type,0 );
		if ($item) {
			$this->view->item = $item;
		}
		$this->view->stuId = $stuId;
		$this->getArticle ( 4 );
    	$db3 = new article();
		$year_row = $db3->zz_getAticleByyear(3, 0);
    if($year_row == true){
        $db = new grademajor();
        $re = $db->getinfofromfuid(self::$userinfo['fu_id'],0);
        $state = $re['gd_state'];
        $this->view->state = $state;

		$db = new user_score ();
		$row = $db->getyearscore ( self::$userinfo ['fu_id'], 0 );
		$this->view->commit = $row;
		if ($row == true) {
			$db4 = new assessment ();
            //获取该学生所在的学院
            $coll=$db4->getcollegeId($stuId);
            $coll_Id=$coll['fu_college'];
			$row2 = $db4->getSchoolAss(1,10,0,$coll_Id);
            $nums = $row2[0]['asspro_gong_num'];
			$str = $row2[0]['asspro_second_content'];
			for($i = 1; $i <= $nums; $i ++) {
				$pos = strpos ( $str, ',' );
				$str = substr ( $str, ($pos + 1) );
			}
			$str = '公,' . $str;
			$arr1 = explode ( ',', $str );
			if(strstr($row ['us_score'] , ',')){
			$arr2 = explode ( ',', $row ['us_score'] );
			}else{
				if(!empty($row ['us_score'])){
					$arr2[] = $row ['us_score'];
				}else{
			$arr2 = array();
				}
			}
			$suggest = new suggestyuju();
			$yujv = $suggest->getSyList();
			$arr3 = array ();
			$allnums = count ( $arr1 );
			for($i = 0; $i < $allnums; $i ++) {
				$arr3 [$i] [] = $arr1 [$i];
				if($arr2[$i] || $arr2[$i] === '0'){
				$tmp_score = round(($arr2 [$i]),1); // 最多分是6分
				$arr3 [$i] [] = $tmp_score;
				foreach($yujv as $k2=>$v2){
					if($tmp_score>=$v2['sy_begin'] && $tmp_score <=$v2['sy_end']){
						$arr3 [$i] [] = $v2['sy_content'];
					}
				}

				}else{
				$arr3 [$i] [] = '暂无数据';
				$arr3 [$i] [] = '暂无数据';
				}
			}
			$this->view->info = $arr3;
		}
    }else{
			$this->view->weikaishi = "未开始";
		}
    	$this->getView()->state = $state;
		//评价小贴士
		$db = new article();
		$articleList = $db->getTipsPageModel(1);
		$this->view->name = $item;
		$this->getView()->articleList = $articleList['list'];
		$this->getView ()->display ( "xnmSelfAssessment.html" );
	}
	
	public function mutualAssessment() {
        $stuId = self::$userinfo['fu_id'];
        //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($stuId);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($stuId);
        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }


        $db = new grademajor();
        $re = $db->getinfofromfuid(self::$userinfo['fu_id'],0);
		$state = $re['gd_state'];

		$db = new article();
		$row = $db->zz_getAticleByyear(3, 0);
		if($row == false){
		   $this->view->weikaishi = "未开始";
		}
		$this->getView()->state = $state;
		$this->getView ()->display ( "mutualAssessment.html" );
	}

	/* public function AssessmentResult() {
		//echo "<pre>";
		$checkarr = array("huping","taping","leida");
		$fu_id = self::$userinfo['fu_id'];
		$db = new user_score();
		$mod = $this->getRequest()->get("mod")?$this->getRequest()->get("mod"):'huping';
		if(!in_array($mod, $checkarr)){
			exit("非法参数");
		}
		switch($mod){
			case "huping";
			//取自评的分数
			$result = $db->getziping($fu_id);
			if($result == false){
				$ziping_score_state = false;//自评目前无数据
			}else{
			$str_score = $result['us_score'];
			$ziping_score = explode(',',$str_score);
			foreach($ziping_score as &$v9){
				$v9 = round(($v9*6),1);
			}
			}
			//取互评的分数(平均分)
			$hupingarray = $db->gethuping($fu_id);
			if($hupingarray == false){
				$hupingping_score_state = false;
			}else{
			$hupingnums = count($hupingarray);
			foreach($hupingarray as $v){
				$arr[] = explode(",",$v['us_score']);
			}
			$arr2 = array();
			foreach($arr[0] as $k=>$v){
				$arr2[$k] = 0;
			}
			 foreach($arr as $key => $value){
				foreach($value as $k2=>$v2){
					$arr2[$k2] += $v2;
				}
			}
			foreach($arr2 as $k=>$v){
				$huping_score[$k] = ($v/$hupingnums);
			}
			}
			//取评分细则的内容
			$db2 = new assessment();
			$asspro_row = $db2->zz_getcontentbyfu_college($fu_id);
			$gong_num = $asspro_row['asspro_gong_num'];
			$content = $asspro_row['asspro_second_content'];
			for($i=1;$i<=$gong_num;$i++){
				$position = strpos($content,',');
				$content = substr($content,($position+1));
			}
			//$asspro_content[] = '公';
			$content = '公,'.$content;
			$arr3= explode(',',$content);
			//print_r($arr3);
			//print_r($ziping_score);
			//print_r($huping_score);
			//$info = array_merge_recursive($arr3,$ziping_score,$huping_score);
			$nums = count($arr3);
			for($i = 0 ;$i<$nums;$i++){
				$info[$i][] = $arr3[$i];
				$info[$i][] = $ziping_score[$i];
				$info[$i][] = $huping_score[$i];
			}
			//print_r($info);
			$this->view->info = $info;
			break;
			case "taping";
			$allscore = array();
			$db = new frontuser();
			$userinfo = $db->getUserByUserID($fu_id);
			$students = $db->getmajor($userinfo['fu_major'],$userinfo['fu_grade']);
			//print_r($students);
			$i = 0;
			foreach($students as $k=>$v){
				$db = new user_score();
				$row = $db->getstudentscore($v['fu_id']);
				$arr = explode(',', $row['us_score']);
				if(empty($allscore)){
					foreach($arr as $k2=>$v2){
						$allscore[$k2] = 0;
					}
				}
				//print_r($allscore);
				foreach($arr as $k3=>$v3){
					$allscore[$k3] += $v3;
				}
				$i++;
			}
			foreach($allscore as $v){
				$averagescore[] = round(($v/$i),1);
			}
			$db2 = new assessment();
			$asspro_row = $db2->zz_getcontentbyfu_college($fu_id);
		    $gong_num = $asspro_row['asspro_gong_num'];
		    $neng_num = $asspro_row['asspro_neng_num'];
			//$second_content = $asspro_row['asspro_second_content'];
			$db3= new user_score();
			$taping = $db3->gettaping($fu_id);
			$taping_score = explode(",",$taping['us_score']);
			$second = explode(",",$asspro_row['asspro_second_content']);
			$third = explode(",",$asspro_row['asspro_third_content']);

			$info = array();
			$j = 1;
			for($i=0;$i<($gong_num+$neng_num);$i++){
				if($i<$gong_num){
					$info[$i][] = '公';
					$info[$i][] = $second[$i];
					$info[$i][] = $third[$i];
					$info[$i][] = $averagescore[0];
					$info[$i][] = $taping_score[0];
				}else{
					$info[$i][] = '能';
					$info[$i][] = $second[$i];
					$info[$i][] = $third[$i];
					$info[$i][] = $averagescore[$j];
					$info[$i][] = $taping_score[$j];
					$j++;
				}
			}
			$this->view->info = $info;
			break;
			case "leida";

			break;
		}
		$html = "AssessmentResult_".$mod.".html";
		$this->getView ()->display ( $html );
	} */



	public function AssessmentResult() {


		$checkarr = array("huping","taping","leida");
		$mod = $this->getRequest()->get("mod")?$this->getRequest()->get("mod"):'huping';
		if(!in_array($mod, $checkarr)){
			exit("非法参数");
		}
		switch($mod){
			case "huping":
			$this->view->info = $this->zz_huping();
			break;
			case "taping":
			
			$this->view->info = $this->zz_taping();
			break;
			case "leida":
			$huping = $this->zz_huping();
			$taping = $this->zz_taping();
			foreach($huping as $k=>$v){
				if($v[0]!='公'){
					$huping2[] = $v;
				}
			}
			foreach($taping as $k=>$v){
				if($v[0]!='公'){
					$taping2[] = $v;
				}
			}

			$info_taping = array();
			foreach($huping2 as $k=>$v){
				$info_huping['zhibiao'][] = $v[0];
				$info_huping['ziping'][] = intval($v[1]);
				$info_huping['huping'][] = intval($v[2]);
			}

			foreach($taping2 as $k=>$v){
				$info_taping['zhibiao'][] = $v[1];
				$info_taping['pingjun'][] = intval($v[3]);
				$info_taping['wode'][] = intval($v[4]);
			}

			//print_R($info_huping);
			//print_R($info_taping);

			$json_huping = json_encode($info_huping);
			$json_taping = json_encode($info_taping);
			$this->view->huping = $json_huping;
			$this->view->taping = $json_taping;
			break;
		}
		$html = "AssessmentResult_".$mod.".html";
		$this->getView ()->display ( $html );
	}
	/**
	 * 互评的方法
	 * @return number
	 */
	private function zz_huping(){
		$fu_id = self::$userinfo['fu_id'];
		$db = new user_score();
		$result = $db->getziping($fu_id);
		if($result == false){
			$ziping_score_state = false;//自评目前无数据
		}else{
			$str_score = $result['us_score'];
			$ziping_score = explode(',',$str_score);
			foreach($ziping_score as & $v9){
				$v9 = round(($v9*6),1);
			}
		}
		$hupingarray = $db->gethuping($fu_id);
		if($hupingarray == false){
			$hupingping_score_state = false;
		}else{
			$hupingnums = count($hupingarray);
			foreach($hupingarray as $v){
				$arr[] = explode(",",$v['us_score']);
			}
			$arr2 = array();
			foreach($arr[0] as $k=>$v){
				$arr2[$k] = 0;
			}
			foreach($arr as $key => $value){
				foreach($value as $k2=>$v2){
					$arr2[$k2] += $v2;
				}
			}
			foreach($arr2 as $k=>$v){
				$huping_score[$k] = ($v/$hupingnums);
			}
		}
		$db2 = new assessment();
		$asspro_row = $db2->zz_getcontentbyfu_college($fu_id);
		$gong_num = $asspro_row['asspro_gong_num'];
		$content = $asspro_row['asspro_second_content'];
		for($i=1;$i<=$gong_num;$i++){
			$position = strpos($content,',');
			$content = substr($content,($position+1));
		}
		$content = '公,'.$content;
		$arr3= explode(',',$content);
		$nums = count($arr3);
		
		for($i = 0 ;$i<$nums;$i++){
			$info[$i][] = $arr3[$i];
			if(isset($ziping_score[$i])){
			     $info[$i][] = $ziping_score[$i];//自评
			}else{
				$info[$i][] = '暂无数据';
			}
			if(isset($huping_score[$i])){
			$info[$i][] = $huping_score[$i];//互评
			}else{
			$info[$i][] = '暂无数据';
			}
		}
		return $info;
	}
	/**
	 * 他评的方法
	 * @return Ambigous <multitype:, unknown>
	 */

	private function zz_taping(){
		
		$fu_id = self::$userinfo['fu_id'];
		$db = new user_score();
		$allscore = array();
		$db = new frontuser();
		$userinfo = $db->getUserByUserID($fu_id);
		$students = $db->getmajor($userinfo['fu_major'],$userinfo['fu_grade']);
		//print_r($students);
		$i = 0;
		foreach($students as $k=>$v){
			$db = new user_score();
			$row = $db->getstudentscore($v['fu_id']);
			$arr = explode(',', $row['us_score']);
			if(empty($allscore)){
				foreach($arr as $k2=>$v2){
					$allscore[$k2] = 0;
				}
			}
			//print_r($allscore);
			foreach($arr as $k3=>$v3){
				$allscore[$k3] += $v3;
			}
			$i++;
		}
		foreach($allscore as $v){
			$averagescore[] = round(($v/$i),1);
		}
		$db2 = new assessment();
		$asspro_row = $db2->zz_getcontentbyfu_college($fu_id);
		$gong_num = $asspro_row['asspro_gong_num'];
		$neng_num = $asspro_row['asspro_neng_num'];
		//$second_content = $asspro_row['asspro_second_content'];
		$db3= new user_score();
		$taping = $db3->gettaping($fu_id);
		$taping_score = explode(",",$taping['us_score']);
		$second = explode(",",$asspro_row['asspro_second_content']);
		$third = explode(",",$asspro_row['asspro_third_content']);

		$info = array();
		$j = 1;
		for($i=0;$i<($gong_num+$neng_num);$i++){
			if($i<$gong_num){
				$info[$i][] = '公';
				$info[$i][] = $second[$i];
				$info[$i][] = $third[$i];
				$info[$i][] = $averagescore[0];
				$info[$i][] = $taping_score[0];
			}else{
				$info[$i][] = '能';
				$info[$i][] = $second[$i];
				$info[$i][] = $third[$i];
				$info[$i][] = $averagescore[$j];
				$info[$i][] = $taping_score[$j];
				$j++;
			}
		}
		//echo "<pre>";
		//print_r($info);
		return $info;
		
	}




	public function xnmtrainningPlan() {
		$model = new profile ();
		$stuId = self::$userinfo['fu_id'];
        //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($stuId);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($stuId);
        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }

		$type = 3;
		$item = $model->getItem ( $stuId, $type,0);
		if ($item) {
			switch ($item ['state']) {
				case 1 :
					$item ['status'] = "新建";
					break;
				case 2 :
					$item ['status'] = "待审核";
					break;
				case 3 :
					$item ['status'] = "已通过";
					break;
				case 4 :
					$item ['status'] = "未通过";
					break;
				default :
					break;
			}
			$this->view->item = $item;
		} else {
			$status = "新建";
			$this->view->status = $status;
		}
		//var_dump($item);
		$type = 4;
		$feedback = $model->getItem ( $stuId, $type,0);
		//print_r($feedback);
		$db = new grademajor();
		$re = $db->getinfofromfuid(self::$userinfo['fu_id'],0);
		$state = $re['gd_state'];
		$this->view->feedback = $feedback;
		//print_r($feedback);
		//$this->view->feed = $feedback;
		$this->view->stuId = $stuId;
		$this->view->state = $state;
		$this->view->state2 = $item ['state'];
		$this->getView ()->display ( "xnmtrainningPlan.html" );
	}
	/**
	 * 自我规划
	 */
	public function xnmmyplanning(){
		$model = new profile ();
		$stuId = self::$userinfo['fu_id'];
		$type = 2;
		$item = $model->getItem ( $stuId, $type,0);
		if ($item) {
			switch ($item ['state']) {
				case 1 :
					$item ['status'] = "新建";
					break;
				case 2 :
					$item ['status'] = "待审核";
					break;
				case 3 :
					$item ['status'] = "已通过";
					break;
				case 4 :
					$item ['status'] = "未通过";
					break;
				default :
					break;
			}
			$this->view->item = $item;
		} else {
			$status = "新建";
			$this->view->status = $status;
		}
		$type = 1;
		$feedback = $model->getItem ( $stuId, $type,0);
		$this->view->feedback = $feedback ['content'];
		$this->view->stuId = $stuId;
		$this->getView ()->display ( "xnmmyPlan.html" );
	}
	
	public function oldAssessment() {
		$this->getView ()->display ( "oldAssessment.html" );
	}
	public function saveItem() {
       if($_FILES['file']){
            //评估细则附件的上传
               $college = new college();
                $new_name=iconv("utf-8","gbk",$_FILES['file']['name']);
                $path="/common/upload/files/assessment/".$new_name;
                $realpath=str_replace('\\','/',DIR).$path;
                $su=move_uploaded_file($_FILES['file']['tmp_name'],$realpath) ? '1' : '0';
                if($su){
                    $path = "/common/upload/files/assessment/".$_FILES['file']['name'];
                    $file_type=explode(".",$new_name);
                    $file_id=$college->uploadfile(iconv("gbk","utf-8",$new_name),$path,$file_type[1]);
                }
           }
       if($file_id){
           $fileid=$file_id;
       }else{
           $fileid=0;
       }
		$stuId = $_POST ['stuId'];
		$type = $_POST ['type'];
		$content = $_POST ['content'];
		$id = $_POST ['id'];
        $isnew=$_POST['isnew'];
    	$model = new profile ();
		if ($id) {
			$result = $model->updateItem ( $id, $content);
     } else {
        	$result = $model->insertItem ( $stuId, $type, $content ,0,1,$isnew,'null',$fileid);
		}
		$this->view->result = $result;
        if($result){
            $assessment = new AssessmentController();

            if($isnew==0){
                $assessment->xnmSelfAssessment();
            } else{
                $assessment->xsrxSelfAssessment();
            }
            echo "<div id='error' style='display:none'>成功!</div>";
            exit;
        }
		echo $result;
	}

    public function saveItem02() {
        $stuId = $_POST ['stuId'];
        $type = $_POST ['type'];
        $content = $_POST ['content'];
        $id = $_POST ['id'];
        $isnew=$_POST['isnew'];
        $model = new profile ();
        if ($id) {
            $result = $model->updateItem ( $id, $content);
        } else {
            $result = $model->insertItem ( $stuId, $type, $content ,0,1,$isnew,'null');
        }
        $this->view->result = $result;
        echo $result;
    }

	public function commitItem() {
		$id = $_POST ['id'];
		$content = $_POST ['content'];
		$model = new profile ();
		$result = $model->commitItem ( $id , 2,$content);
		echo $result;
	}
	public function getArticle($type) {
		$model = new article ();
		$articleList = $model->getArticleList ( $type );
		$this->view->articleList = $articleList;
	}

	// public function getData(){
	// $session = $_POST['year'];
	// $model = new user_score();
	// }
	public function helpDetail() {
		$id = $this->getRequest ()->get ( "id" );

        //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($id);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($id);

        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }
		$model = new article ();
		$detail = $model->getAticleById ( $id );
        $file_info=$model->getfile_info($detail['file_id']);

        //根据file_id获取file_name
        $this->view->file_info = $file_info;
        //var_dump($file_info);
		$this->view->detail = $detail;
		$this->getView ()->display ( "helpDetail.html" );
	}
	public function helpList() {
        $id = $this->getRequest ()->get ( "id" );

        //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($id);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($id);

        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }

        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 6;
		$type = $this->getRequest ()->get ( "type" );
		$model = new article ();
		$list = $model->getArticleList02( $type ,$page,$pageSize);
		$this->view->list = $list;
		$this->getView ()->display ( "helpList.html" );
	}
	public function searchStu() {
		$userinfo = $this->getData("userinfo");
		$model = new frontuser ();
		$name = $this->getRequest ()->get( "name" );
        $stu = $model->searchStudent($name, $userinfo['fu_major'], $userinfo['fu_grade']);
		if ($stu) {
			$this->view->setState ( "1" );
			$this->view->setData ( $stu );
			$this->view->setMsg ( "success!" );
		} else {
			$this->view->setState ( "0" );
			$this->view->setMsg ( "failed!" );
		}
		$this->view->display ( "json" );
	}
    //这是学期末评估题目
	public function question() {
		// 存放传过来的方向
		$fangxiang = $this->getRequest ()->get ( "fangxiang" );
		$problem_db = new exercise ();
        $id = self::$userinfo ['fu_id'];
        //获取该学生答道德题目的总数
        $result_stu_ex=$problem_db->getstuex_info($id);
        if($result_stu_ex){
             $nn=count($result_stu_ex);
             $mm=intval($nn / 6)+1;
        }else{
            $mm=1;
        }
        $page = $this->getRequest ()->get ( "pid" ) ? $this->getRequest ()->get ( "pid" ) : $mm; // 不传参数的


       //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($id);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($id);
        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }

        $db2 = new exercise ();

		$allex = $db2->getweizhi ();
        $num_ex=count($allex);//获取题目的页数
        $weizhi=array();
        $weizhi['start']=1;
        $weizhi['end']=	ceil($num_ex / 6);
        $pagesize=6;//每页显示的题目的个数
		$row = $db2->getquestion ($page, $fangxiang,$pagesize ); // 加载题目
        //定义一个数组
        $result=array();
        for($m=0;$m<count($row);$m++){
            $result [$m]['title'] = $row[$m]['ex_title'];
            $result [$m]['ex_id'] = $row [$m]['ex_id'];
            $db3 = new choose ();
            $result [$m]['answer'] = $db3->getChooselistByExid ( $row[$m]['ex_id'] ); // 加载答案
            $db4 = new stu_ex (); // 加载学生的答题信息
            $stu_row = $db4->getexercise ( $id,$row[$m]['ex_id'] );
            $result[$m]['nowchoose']=$stu_row ['ch_id'];
        }
		$this->view->problem = $result;
		$this->view->page = $page;
		$this->view->weizhi = $weizhi;
		echo $this->view->render ( "question.html" );
	}
    //这是新生入学后题目
    public function question_xinsheng() {
        // 存放传过来的方向
        $fangxiang = $this->getRequest ()->get ( "fangxiang" );
        $problem_db = new exercise ();
        $id = self::$userinfo ['fu_id'];
       $result_stu_ex=$problem_db->getstuex_info($id);
        if($result_stu_ex){
            $nn=count($result_stu_ex);

            $mm=intval($nn/ 6)+1;
        }else{
            $mm=1;
        }

        $page = $this->getRequest ()->get ( "pid" ) ? $this->getRequest ()->get ( "pid" ) : $mm; // 不传参数的

        //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($id);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($id);
        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }

         $db2 = new exercise ();
        $allex = $db2->getweizhi ();
        $num_ex=count($allex);//获取题目的页数
        $weizhi=array();
        $weizhi['start']=1;
        $weizhi['end']=	ceil($num_ex / 6);
        $pagesize=6;//每页显示的题目的个数
        $row = $db2->getquestion ($page, $fangxiang,$pagesize ); // 加载题目
        //定义一个数组
        $result=array();
        for($m=0;$m<count($row);$m++){
            $result [$m]['title'] = $row[$m]['ex_title'];
            $result [$m]['ex_id'] = $row [$m]['ex_id'];
            $db3 = new choose ();
            $result [$m]['answer'] = $db3->getChooselistByExid ( $row[$m]['ex_id'] ); // 加载答案
            $db4 = new stu_ex (); // 加载学生的答题信息
            $stu_row = $db4->getexercise ( $id,$row[$m]['ex_id'] );
            $result[$m]['nowchoose']=$stu_row ['ch_id'];
        }
         $this->view->problem = $result;
         $this->view->page = $page;
         $this->view->weizhi = $weizhi;

        echo $this->view->render ( "question_xinsheng.html" );
    }
	public function question_ajax() {
        $fu_id = self::$userinfo ['fu_id'];
        $ex_info = $_REQUEST['answer'];
        $ex_info_result = explode("&",$ex_info);
        $eve_ex=array();
        for($m=0;$m<count($ex_info_result);$m++){
            $mm=explode("=",$ex_info_result[$m]);
            $nn=explode("_",$mm[0]);
            $eve_ex[$m]['fu_id']=$fu_id;
            $eve_ex[$m]['ex_id']=$nn[1];
            $eve_ex[$m]['ch_id']=$mm[1];
        }
		$db = new stu_ex ();
        for($n=0;$n<count($eve_ex);$n++){
            if ($db->getexercise ( $fu_id, $eve_ex[$n]['ex_id'] )) {
                if ($db->update_exercise ( $eve_ex[$n], $eve_ex[$n]['ex_id'], $fu_id )) {
                    $this->getView ()->setState ( "1" );
                    $this->getView ()->setMsg ( "更新成功" );
                } else {
                    $this->getView ()->setState ( "0" );
                    $this->getView ()->setMsg ( "更新失败" );
                }
            } else {
                if ($db->add_stu_ex ( $eve_ex[$n] )) {
                    $this->getView ()->setState ( "1" );
                    $this->getView ()->setMsg ( "插入成功" );
                } else {
                    $this->getView ()->setState ( "0" );
                    $this->getView ()->setMsg ( "插入失败" );
                }
            }
        }
	$this->getView ()->display ( "json" );
	}
	/**
	 * 都填完后，确认提交时，先经过ajax验证
	 */
	public function commit_ajax() {
		$fu_id = self::$userinfo ['fu_id'];
		if ($fu_id == false) {
			exit ( "非法访问" );
		}
		$db6 = new article();
		$db6_re = $db6->zz_get_question_isnew($fu_id);
		$isnew = $db6_re['article_isnew'];
		switch($isnew){
			case 0;
			$us_type = 0;
			break;
			case 1;
			$us_type = 3;
			break;
		}
		//↑↑↑↑↑判断最新一次评估新生入学还是学年末
		
		//判断学生是否已经答过了
		$db5 = new user_score ();
		if ($db5->getyearscore ( $fu_id, $us_type ) == true) {
			$this->getView ()->setState ( "0" );
			$this->getView ()->setMsg ( "此学生已经完成" );
			$this->getView ()->display ( "json" );
			exit ();
		}
		
		$db1 = new exercise ();
		$exercises = $db1->getallexid ();
		$db2 = new stu_ex ();
		$stu_exercises = $db2->getstuexercise ( $fu_id );
		foreach ( $exercises as $v ) {
			$arr1 [] = $v ['ex_id'];
		}
		foreach ( $stu_exercises as $v ) {
			$arr2 [] = $v ['ex_id'];
		}
		$arr3 = array_diff ( $arr1, $arr2 ); // 如果exercise中的题，都在学生回答的表里，证明，学生把所有题都答完了
		$db7 = new stu_ex();
		$result = $db7->check_null($fu_id);
		$isnullnum = $result['nums'];

			$db = new stu_ex ();
			$stu_score = $db->getscore ( $fu_id );
			$db4 = new assessment ();
          //此处需要获取学生所在的学院的id
            $coll=$db4->getcollegeId($fu_id);
            $coll_Id=$coll['fu_college'];
			//$row = $db4->zz_getscoreorder ();
			$row = $db4->getSchoolAss(1,10,0,$coll_Id);
			//print_r($row);
			$nums = $row[0]['asspro_gong_num'];
			$str = $row[0]['asspro_second_content'];
			for($i = 1; $i <= $nums; $i ++) {
				$pos = strpos ( $str, ',' );
				$str = substr ( $str, ($pos + 1) );
			}
			$arr4 = array ();
			foreach ( $stu_score as $k => $v ) {
				if ($v ['ex_class'] == '公') {
					$arr4 [] = round(($v ['sum_score'] / $v ['all_score'])*6,2);
				}
			}
			
			$array = explode ( ',', $str );
			foreach ( $array as $key => $value ) {
				foreach ( $stu_score as $k => $v ) {
					if ($value == $v ['ex_class']) {
						$arr4 [] =  round(($v ['sum_score'] / $v ['all_score'])*6,2);
					}
				}
			}
			$scoreStr = implode ( ',', $arr4 );
			$sql  = $db5->addUserscore ( $fu_id, $row[0]['asspro_id'], $us_type, $scoreStr, '' );
			$this->getView ()->setState ( "1" );
			$this->getView ()->setData($isnullnum);
			$this->getView ()->setMsg ( "成功" );
		$this->getView ()->display ( "json" );
	}
	/**
	 * 开始答卷
	 */
	public function beginask() {
	}
	/**
	 * 班内互评
	 */
	public function appraise() {
		$num = $this->getRequest ()->get ( "num" );
		$db2 = new assessment ();
      	$resutlt = $db2->zz_getasspro_id02($num,0);
		$id = $resutlt ['asspro_id'];
      	$model = new assessment ();
        //获取被评估的学生的id
        $front_info=$model->getFont_user($num);

		$content = $model->getAticleById ( $id );
		if(!empty($content)){
		$content ['second'] = explode ( ',', $content ['asspro_second_content'] );
		$content ['third'] = explode ( ',', $content ['asspro_third_content'] );
		// print_r($content);
		$this->view->content = $content;
        $this->view->front_info=$front_info;
		$this->view->num = $num;
		$this->view->assproid = $id;
		$this->view->exist = 1;
		}else{
			$this->view->exist = 0;
		}
		echo $this->view->render ( "appraise.html" );
	}
	/**
	 * 班内互评接受ajax
	 */
	public function appraise_ajax() {
		if (! $_POST) {
			exit ( '非法访问' );
		}
		$array = $_POST;
     	$gb_good[] = $array['good1']?$array['good1']:'';
		$gb_good[] = $array['good2']?$array['good2']:'';
		$gb_good[] = $array['good3']?$array['good3']:'';
		$gb_bad[] = $array['bad1']?$array['bad1']:'';
		$gb_bad[] = $array['bad2']?$array['bad2']:'';
		$gb_bad[] = $array['bad3']?$array['bad3']:'';
		unset($array['good1']);
		unset($array['good2']);
		unset($array['good3']);
		unset($array['bad1']);
		unset($array['bad2']);
		unset($array['bad3']);
		
		
		$asspro_id = $array ['assproid'];
		unset($array ['assproid']);
		$xuehao = $array ['num'];
		unset($array ['num']);
		$db3 = new frontuser ();
        $this_fu_id = $db3->zz_fu_id ( $xuehao );
		$db = new user_score ();
		$check = $db->checkuser ( $this_fu_id, self::$userinfo ['fu_id'] );
		if ($check == false) {
			$db4 = new assessment ();
			$row = $db4->zz_getasspro ($asspro_id);
			$nums = $row ['asspro_gong_num'];
			$str = $row ['asspro_second_content'];
			for($i = 1; $i <= $nums; $i ++) {
				$pos = strpos ( $str, ',' );
				$str = substr ( $str, ($pos + 1) );
			}
			$arr4 = array ();
			$arr4 [] = $array ['gong'];
			unset($array ['gong']);
			$array2 = explode ( ',', $str );

			//按照自然顺序排序
			foreach($array as $k=>$v){
				$array3[substr($k,-1,1)] = $v;
			}
			ksort($array3);
			$array = array_merge($arr4,$array3);//将两个合并
			$str = implode ( ',', $array );
			$db->addUserscore ( $this_fu_id, $asspro_id, 1, $str, self::$userinfo ['fu_id'] );
			$db2 = new goodorbad();
			//第一个是被评价人的id,第二个是评价人的id
			foreach($gb_good as $v){
				//echo $v;
				if($v != ''){
				$db2->saveGood($this_fu_id, $v,self::$userinfo['fu_id'],1);
				}
			}
			foreach($gb_bad as $v){
				//echo $v;
				if($v != ''){
				$db2->saveBad($this_fu_id, $v,self::$userinfo['fu_id'],1);
				}
			}
			$this->getView ()->setState ( '1' );
			$this->getView ()->setMsg ( '评价完成' );
		} else {
			$this->getView ()->setState ( '0' );
			$this->getView ()->setMsg ( '您已经对此同学评价过了' );
		}
		$this->view->display ( "json" );
		//print_r($array);
	}
	/**
	 * ajax检测是否已经对这个同学评价过了
	 */
	public function pingjia_check() {
		$xuehao = $this->getRequest ()->get ( 'num' );
		$db3 = new frontuser ();
        $this_fu_id = $db3->zz_fu_id( $xuehao );
		$fu_id_info = $db3->_getUserFromUserid(self::$userinfo ['fu_id']);
		$this_fu_id_info = $db3->_getUserFromUserid($this_fu_id); 
	  if($this_fu_id == self::$userinfo ['fu_id']){
			$this->getView ()->setState ( '0' );
			$this->getView ()->setMsg ( '亲，不能对自己评价哦' );
   }else{
		$db = new user_score ();
		$check = $db->checkuser ( $this_fu_id,self::$userinfo ['fu_id'] );
		if ($check == false) {
			$this->getView ()->setState ( '1' );
			$this->getView ()->setMsg ( '可以对此同学评价' );
		} else {
			$this->getView ()->setState ( '0' );
			$this->getView ()->setMsg ( '您已经对此同学评价过了' );
		}
		}
		$this->view->display ( "json" );
	}
	/**
	 * goodbad获取这个学生做的最好，需要改进
	 */
	public function ajax_goodbad(){
		//echo "<pre>";
		$fu_id = self::$userinfo ['fu_id'];
		$flag = $this->getRequest()->get('flag');//0好，1坏
		$type = $this->getRequest()->get('type');
		$page = $this->getRequest()->get('page')?$this->getRequest()->get('page'):1;
		$db = new goodorbad();
		$result = $db->zz_getinfo($fu_id, $flag, $type,$page);
		$nums = count($result);
		if($nums<5){
			$this->getView()->setState('1');//如果是1 则是最后一页
		}else{
			$this->getView()->setState('0');
		}
		$this->getView()->setData($result);
		/* $nums = count($result);
		$info['nums'] = $nums;
		$info['content'] = $result;
		$this->getView()->setData($info); */
		$this->view->display ( "json" );
	}
	
	
}