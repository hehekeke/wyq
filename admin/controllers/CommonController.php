<?php
/**
 * @desc: ��������(description)
 * @author: dongguanjun
 * @Emal:kaigeer1992@gmail.com
 * @date: 2014-6-12
**/
class CommonController extends Controller{

	public function __construct(){
		parent::__construct();
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	
	public function Index(){
		$fu = new frontuser();
		$profile = new profile();
		$userid = $this->getRequest()->get("fuid");
		$isnew = $this->getRequest()->get('isnew') ? $this->getRequest()->get("isnew") : 0;

		$xuenian = $this->getRequest()->get("year") ? $this->getRequest()->get("year") : '2013-2014学年';
		$fu_info = $fu->getUserByUserID($userid);
		$school_neng_list = $this->Getasspro($xuenian, 0);
		//var_dump($school_neng_list);
		$college_neng_list = $this->Getasspro($xuenian, $fu_info['fu_college']);
	      if($isnew){
              $ziping = $this->Getziping($userid,3);
          }else{
              $ziping = $this->Getziping($userid,0);
          }
		$info = array();
		if ($ziping){
			for ($i = 0; $i < count($ziping); $i++){
				if ($i == 0){
					$ziping[$i]['zhibiao'] = "公";
				}else{
					$j = $i - 1;
					$ziping[$i]['zhibiao'] = $school_neng_list[$j];
				}
			}
		}
		$taping = $this->Gettaping($userid);
		$taping_list = array();
		//var_dump($taping);
		$av = $this->Gettapingaverage($userid);
		$pai = $this->Getmajorrank($userid);
		if ($taping){
			for ($j = 0; $j < count($taping); $j++){
				if ($j == 0){
					$taping_list[$j]['zhibiao'] = "公";
					$taping_list[$j]['self'] = $taping[$j];
					$taping_list[$j]['aver'] = $av[$j];
					$taping_list[$j]['pai'] = $pai[$j];
				}else{
					$z = $j - 1;
					$taping_list[$j]['zhibiao'] = $college_neng_list[$z];
					$taping_list[$j]['self'] = $taping[$j];
					$taping_list[$j]['aver'] = $av[$j];
					$taping_list[$j]['pai'] = $pai[$j];
				}
			}
		}
		$huping = $this->Gethuping($userid);
		$huping_list = array();
		if ($huping){
			for ($y = 0; $y < count($huping); $y++){
				if ($y == 0){
					$huping_list[$y]['zhibiao'] = "公";
					$huping_list[$y]['score'] = $huping[$y];
				}else{
					$x = $y - 1;
					$huping_list[$y]['zhibiao'] = $college_neng_list[$x];
					$huping_list[$y]['score'] = $huping[$y];
				}
			}
		}
		$shumian = $profile->getProfileByType(1, $userid,$isnew);
		if ($shumian){
			$shumianzongjie = $shumian['content'];
		}else{
			$shumianzongjie = "暂无书面总结";
		}
		$chengzhang = $profile->getProfileByType(3, $userid, $isnew, 3);
		if ($chengzhang){
			$ccxl = $chengzhang['content'];
		}else{
			$ccxl = "暂无成长训练";
		}
		$this->view->show = $info;
		$leida = $this->getRader($userid);
		$this->view->show = $leida;
		$this->view->info = json_encode($leida);
		$this->view->shumian = $shumianzongjie;
		$this->view->ziping = $ziping;
		$this->view->taping = $taping_list;
		$this->view->huping = $huping_list;
		$this->view->stuinfo = $fu_info;
		$this->view->chengzhang = $ccxl;
        if($isnew){
            echo $this->view->render("result_xinsheng.html");
        }else{
            echo $this->view->render("index.html");
        }

	}
	
	protected function Getasspro($year,$collegeId){
		$asspro = new assessment();
		$asspro_list = $asspro->getAssproByYear($year,$collegeId);
		$zhibiao_arr = explode(",", $asspro_list[0]['asspro_second_content']);
		$neng_second = array_slice($zhibiao_arr, $asspro_list[0]['asspro_gong_num'], $asspro_list[0]['asspro_neng_num']);
		return $neng_second;
	}
	
	protected function Getziping($userid,$type){
		$us = new user_score();
		$score_list = $us->getScoreByType($userid,$type);
		$score = array();
		if ($score_list){
			$pjsm = new suggestyuju();
			$score_arr = explode(",", $score_list['us_score']);
			for ($i = 0; $i < count($score_arr); $i++){
				$yuju = $pjsm->getYujuByScore($score_arr[$i]);
				$score[$i]['score'] = number_format($score_arr[$i], 1);
				$score[$i]['yuju'] = $yuju['sy_content'];
			}
			//$score[$i]['score'] = $score_arr;
		}
		return $score;
	}
	
	protected function Gettaping($userid){
		$us = new user_score();
		$score = array();
		$flag_score = array();
		$taping_arr = $us->getScore($userid, 2);
		//var_dump($taping_arr);
		if ($taping_arr){
			$taping_num = count($taping_arr);
			//echo $taping_num;
			for ($j = 0; $j < count($taping_arr); $j++){
				$taping_list = explode(",", $taping_arr[$j]['us_score']);
				for ($x = 0; $x < count($taping_list); $x++){
					if ($j == 0){
						$flag_score[$x] = $taping_list[$x];
					}else{
						$flag_score[$x] += $taping_list[$x];
					}
					//echo $flag_score[$x];
					//echo "</br>";
				}
			}
			//var_dump($flag_score);
			for ($y = 0; $y < count($flag_score); $y++){
				//var_dump($flag_score);
				$score[$y] = number_format($flag_score[$y] / $taping_num, 1);
			}
		}
		return $score;
	}
	
	protected function Gethuping($userid){
		$us = new user_score();
		$score = array();
		$flag_score = array();
		$huping_arr = $us->getScore($userid, 1);
		if ($huping_arr){
			$huping_num = count($huping_arr);
			for ($j = 0; $j < count($huping_arr); $j++){
				$huping_list = explode(",", $huping_arr[$j]['us_score']);
				for ($z = 0; $z < count($huping_list); $z++){
					if ($j == 0){
						$flag_score[$z] = $huping_list[$z];
					}else{
						$flag_score[$z] = $flag_score[$z] + $huping_list[$z];
					}	
				}
			}
			for ($y = 0; $y < count($flag_score); $y++){
				$score[$y] =  number_format($flag_score[$y] / $huping_num, 1);
			}
		}
		return $score;
	}
	
	protected function Gettapingaverage($userid){
		$fu = new frontuser();
		$fu_info = $fu->getUserByUserID($userid);
		$us = new user_score();
		$result = $us->getalltaping($fu_info['fu_major'], $fu_info['fu_grade'], 2);
		if($result){
			$nums = count($result);
			$allscore = array();
			foreach($result as $k=>$v){
				$score = explode(',',$v['us_score']);
				if(empty($allscore)){
					foreach($score as $k2=>$v2){
						$allscore[$k2] = 0;
					}
				}
				foreach($score as $k2=>$v2){
					$allscore[$k2] += $v2;
				}
			}
			$average = array();
			foreach($allscore as $k=>$v){
				$average[$k] = number_format(($v) / $nums, 1);
			}
		}else{
			$average = false;
		}
		return $average;
	}
	
	protected function Getmajorrank($userid){
		$fu = new frontuser();
		$fu_info = $fu->getUserByUserID($userid);
		$flag_ranking = array();
		$ranking = array();
		$us = new user_score();
		$userscore = $us->getScore($userid, 2);
		$score_arr = explode(",", $userscore[0]['us_score']);
		$num = count($score_arr);
		$self = $this->Gettaping($userid);
		$result = $us->getScoreByGradeAndMajor($fu_info['fu_major'], $fu_info['fu_grade'], 2 );
		if ($result){
			for ($i = 0; $i < count($result); $i++){
				$flag_ranking[$i] = $this->Gettaping($result[$i]['fu_id']);
			}
			//var_dump($flag_ranking);
			for ($j = 0; $j < $num; $j++){
				$zhibiao[$j] = $this->Traversa($flag_ranking, $j);
				rsort($zhibiao[$j],SORT_STRING);
				//var_dump($zhibiao[$j]);
				//var_dump($self[$j]);
				$temp = array_keys($zhibiao[$j], $self[$j]);
				$paiming = $temp[0] + 1;;
				//var_dump($paiming);
				//var_dump($zhibiao[$j]);
				//var_dump($temp);
				$ranking[$j] = $paiming;
			}
		}
		return $ranking;
	}
	
	protected function Traversa($arr, $type){
		$traversa_after = array();
		if ($arr){
			for ($i = 0; $i < count($arr); $i++){
				$traversa_after[$i] = $arr[$i][$type];
			}
			return $traversa_after;
		}else{
			return false;
		}
	}
	
	public function Getleida($userid){
		$db = new user_score();
		$info['xy']['exist'] = 1;
		$info['nk']['exist'] = 1;
		$xy_result = $db->getassproud($userid);
		if($xy_result){
			$gong_num = $xy_result['asspro_gong_num'];
			$content = $xy_result['asspro_second_content'];
			for($i=1;$i<=$gong_num;$i++){
				$position = strpos($content,',');
				$content = substr($content,($position+1));
			}
			$content = '公,'.$content;
			$xy_result['asspro_second_content'] = $content;
			$zhibiao =  $xy_result['asspro_second_content'];
			$hupingarray = $db->gethuping($userid);
			if($hupingarray){
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
				$info['xy']['content'] = explode(',',$zhibiao);
				$info['xy']['score'] = $huping_score;//explode(',',$huping_score);
			}else{
				$info['xy']['exist'] = 0;
			}
		}else{
			$info['xy']['exist'] = 0;
		}
		$nk_result = $db->getassproud($userid,1);
		if($nk_result){
			$gong_num = $nk_result['asspro_gong_num'];
			$content = $nk_result['asspro_second_content'];
			for($i=1;$i<=$gong_num;$i++){
				$position = strpos($content,',');
				$content = substr($content,($position+1));
			}
			$content = '公,'.$content;
			$nk_result['asspro_second_content'] = $content;
			$zhibiao =  $nk_result['asspro_second_content'];
			$huping_score = $nk_result['us_score'];
			$info['nk']['content'] = explode(',',$zhibiao);
			$info['nk']['score'] = explode(',',$huping_score);
		}else{
			$info['nk']['exist'] = 0;
		}
		if($info['nk']['exist'] == 1 && $info['xy']['exist'] == 1){
			$arr = array_diff($info['xy']['content'], $info['nk']['content']);
			if($arr){
			foreach($arr as $k=>$v){
				$arr2['content'][] = $v;
				$arr2['score'][] = $info['xy']['score'][$k];
				unset($info['xy']['content'][$k]);
				unset($info['xy']['score'][$k]);
			}
			$info['xy']['content'] = array_values($info['xy']['content']);
			$info['xy']['score'] = array_values($info['xy']['score']);
			array_merge($info['xy']['content'],$arr2['content']);
			array_merge($info['xy']['score'],$arr2['score']);
			foreach($arr2['content'] as $v){
				$info['xy']['content'][] = $v;
			}
			foreach($arr2['score'] as $v){
				$info['xy']['score'][] = $v;
			}
		}
		}
		$db = new user_score();
		if($info['nk']['exist'] == 1){
			$result = $db->getassproud($userid,1);
			$info['row_nums'] = ($result['asspro_neng_num']+1);
		}
		$db = new user_score();
		if($info['xy']['exist'] == 1){
			$tmp = $db->getassproud($userid);
			$info['row_nums'] = $tmp['asspro_neng_num']+1;
		}
		return $info;
	}
	
	public function getRader($userid){
		$taping['myscore_exist'] = 1;
		$taping['average_exist'] = 1;
		$taping_myscore = $this->Gettaping($userid);
		if(empty($taping_myscore) || $taping_myscore == false ){
			$taping['myscore_exist'] = 0;
		}
		$taping_average = $this->Gettapingaverage($userid);
		if($taping_average == false){
			$taping['average_exist'] = 0;
		}
		$db = new assessment();
		$re = $db->getassprobyfuid($userid,2);
		if($re){
			$zhibiao = explode(',',$re['asspro_second_content']);
			foreach($zhibiao as $k=>$v){
				if($k<$re['asspro_gong_num']){
					unset($zhibiao[$k]);
				}
			}
			$zhibiao = array_values($zhibiao);
		}else{
			$zhibiao = false;
		}
		unset($taping_myscore[0]);
		unset($taping_average[0]);
		if($taping_myscore){
			$taping_myscore = array_values($taping_myscore);
		}
		if($taping_average){
			$taping_average = array_values($taping_average);
		}else{
			$taping_average = false;
		}
		$taping['zhibiao'] = $zhibiao;
		$taping['myscore'] = $taping_myscore;
		$taping['average'] = $taping_average;
		$hupingziping = $this->Getleida($userid);
				//print_r($hupingziping);
		$zipinghuping['huping_exist'] = 1;
		$zipinghuping['ziping_exist'] = 1;
		$db = new assessment();
		$nkasspro = $db->getnkasspro();
		$gong_nums = $nkasspro['asspro_gong_num'];
		$arr_second = explode(',',$nkasspro['asspro_second_content']);
		foreach($arr_second as $k =>$v){
			if($k<=($gong_nums-1)){
				unset($arr_second[$k]);
			}
		}
		$zipinghuping['zhibiao'] = array_values($arr_second);
		if(!empty($hupingziping['nk']['score'])){
			unset($hupingziping['nk']['score'][0]);
			$zipinghuping['ziping_score'] = array_values($hupingziping['nk']['score']);
		}else{
			$zipinghuping['ziping_exist'] = 0;
		}
		if(!empty($hupingziping['xy']['score'])){
			unset($hupingziping['xy']['score'][0]);
			$zipinghuping['huping_score'] = array_values($hupingziping['xy']['score']);
		}else{
			$zipinghuping['huping_exist'] = 0;
		}
		$info['taping'] = $taping;
		$info['hupingziping'] = $zipinghuping;
		$nums = count($info['hupingziping']['zhibiao']);
		$k_num = $nums-1;
		if(!empty($info['hupingziping']['huping_score'])){
			foreach($info['hupingziping']['huping_score'] as $k=>$v){
				if($k>$k_num){
					unset($info['hupingziping']['huping_score'][$k]);
				}
			}
		}
		if(!empty($info['hupingziping']['ziping_score'])){
			foreach($info['hupingziping']['ziping_score'] as $k=>&$v){
				$v = round($v,1);
			}
			if(!empty($info['taping']['myscore'])){
				foreach($info['taping']['myscore'] as &$v){
					$v = round($v,1);
				}
			}
		}
		return $info;
	}
	
	public function Getgoodorbad(){
		$type = $this->getRequest()->get("type") ? $this->getRequest()->get("type") : 1;
		$class = $this->getRequest()->get("leixing") ? $this->getRequest()->get("leixing") : 0;
		$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
		$fu_id = $this->getRequest()->get("userid");
		$pageSize = 5;
		$gb = new goodorbad();
		$list = $gb->getGoodorbadPageModel($type, $class, $fu_id, $page, $pageSize);
		if ($list['list']){
			$this->view->setState(1);
			$this->view->setData($list);
			$this->view->setMsg("success!");
		}else{
			$this->view->setState(0);
			$this->view->setMsg("failed!");
		}
		$this->view->display("json");
	}
}