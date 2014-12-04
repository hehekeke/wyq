<?php
/**
 * @desc: ��������(description)
 * @author: dongguanjun
 * @Emal:kaigeer1992@gmail.com
 * @date: 2014-6-12
**/
class CommonController extends Controller {
	private static $userinfo; // 静态属性，将session的用户信息装入
	public function __construct() {
		parent::__construct ();
		$this->view->web_url = $this->getRequest ()->hostUrl;
		if (self::$userinfo == false) {
			$info = $this->getData ( 'userinfo' );
			if ($info == false) {
				$this->gotoUrl ( 'Account', 'login' );
				exit ();
			} else {
				self::$userinfo = $info;
			}
		}
	}
	
	
	public function AssessmentResult() {
        $info = $this->getData ( 'userinfo' );
        $userId = $info['fu_id'];
        //得出消息总数
        $message = new message();
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($userId);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }
        $AllMessageList = $message->getAllMessageById($userId);
        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }

		$zanwu = '';
		$checkarr = array("huping","taping","leida");
		$mod = $this->getRequest()->get("mod")?$this->getRequest()->get("mod"):'huping';
		if(!in_array($mod, $checkarr)){
			exit("非法参数");
		}
		//echo "<pre>";
		switch($mod){
			case "huping":
				$result = $this->zz_huping();
				$this->view->info  = $result;
				break;
			case "taping":
				//开始添加默认为存在
				$info['exist'] = 1;
				
				//计算细则
				
				
				$db = new user_score();
				$result = $db->getScore(self::$userinfo['fu_id'],2,1);
				$db = new assessment();
				$asspro = $db->zz_getasspro($result['asspro_id']);
				//echo "<pre>";
				$gong_nums = $asspro['asspro_gong_num'];
				$neng_nums = $asspro['asspro_neng_num'];
				$gong_second = explode(',',$asspro['asspro_second_content']);
				$neng_third = explode(',',$asspro['asspro_third_content']);
				

				//echo "<pre>";
				//计算我的得分
				$myscore = $this->taping_myscore(self::$userinfo['fu_id']);
				//print_r($myscore);
				if($result == false){
					$info['exist'] = 0;
				}
						
				//计算班级平均分
				$average = $this->taping_average(self::$userinfo['fu_id']);
				
				//计算排名
				$ranking = $this->taping_ranking(self::$userinfo['fu_id']); 
				
				$info['myscore'] = $myscore;
				$info['average'] = $average;
				$info['rankding'] = $ranking;
				$info['gong_nums'] = $gong_nums;
				$info['neng_nums'] = $neng_nums;
				$info['second_content'] = $gong_second;
				$info['third_content'] = $neng_third;
				
				//echo "<pre>";
				//print_r($info); 
				$this->view->info  = $info;
				break;
			case "leida":
				
				
				//计算他评
				
				$taping['myscore_exist'] = 1;
				$taping['average_exist'] = 1;
				$taping_myscore = $this->taping_myscore(self::$userinfo['fu_id']);
				//var_dump($taping_myscore);
				if(empty($taping_myscore) || $taping_myscore == false ){
					$taping['myscore_exist'] = 0;
				}
				$taping_average = $this->taping_average(self::$userinfo['fu_id']);
				if($taping_average == false){
				    $taping['average_exist'] = 0;
				}
				$db = new assessment();
				$re = $db->getassprobyfuid(self::$userinfo['fu_id'],2);
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

				
				//计算互评自评
				$hupingziping = $this->zz_huping();
				//print_r($hupingziping);
				$zipinghuping['huping_exist'] = 1;
				$zipinghuping['ziping_exist'] = 1;

				//计算学院的能有几项
				
				$db = new assessment();
				$nkasspro = $db->getnkasspro();
				//echo "<pre>";
				//print_r($nkasspro);
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
				//print_r($zipinghuping);
				
				//整理这两项
				$info['taping'] = $taping;
				$info['hupingziping'] = $zipinghuping;
				
				$nums = count($info['hupingziping']['zhibiao']);
				$k_num = $nums-1;
				//echo $k_num;
				//去掉学院中多余的
				//print_r($info);
				//>>>>>>>>>>>>
				if(!empty($info['hupingziping']['huping_score'])){
				foreach($info['hupingziping']['huping_score'] as $k=>$v){
					if($k>$k_num){
						unset($info['hupingziping']['huping_score'][$k]);
					}
				}
				//>>>>>>>>>>>>>
				//print_r($info);
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
				
				//echo "<pre>";
				//print_r($info);
				$this->view->show = $info;
				//print_r($info);
				$this->view->info = json_encode($info);
				break;
		}
		//$this->view->zanwu  = $zanwu ;
		$html = "AssessmentResult_".$mod.".html";
		$this->getView ()->display ( $html );
	}
	/**
	 * 互评的方法
	 * @return number
	 */
	private function zz_huping(){

		 $db = new user_score();
	   //初始化，默认学院和学校都是存在的
		$info['xy']['exist'] = 1;
	    $info['nk']['exist'] = 1;
	    //检查xy
	    $xy_result = $db->getassproud(self::$userinfo['fu_id']);
	    //var_dump($xy_result);
	    /* if($xy_result){
	    $info['row_nums'] = ($xy_result['asspro_neng_num']+1);
	    }else{
	    	$tmp = $db->getassproud(self::$userinfo['fu_id'],1);
	    	$info['row_nums'] = $tmp['asspro_neng_num']+1;
	    } */
//如果没有这个分数的话
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
	    $hupingarray = $db->gethuping(self::$userinfo['fu_id']);
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
	    //print_r($huping_score);
	    //>>>>>>>>
	    $info['xy']['content'] = explode(',',$zhibiao);
	    $info['xy']['score'] = $huping_score;//explode(',',$huping_score);
	    }else{
	    	$info['xy']['exist'] = 0;
	    }
	    //处理前面的公
	    
	    }else{
	    	$info['xy']['exist'] = 0;
	    }
	  
	    //nk的
	    $nk_result = $db->getassproud(self::$userinfo['fu_id']);
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
	    //如果有差集，进行一下排序
	    if($arr){
	    foreach($arr as $k=>$v){
	    	$arr2['content'][] = $v;
	    	$arr2['score'][] = $info['xy']['score'][$k];
	    	unset($info['xy']['content'][$k]);
	    	unset($info['xy']['score'][$k]);
	    }
	    $info['xy']['content'] = array_values($info['xy']['content']);
	    $info['xy']['score'] = array_values($info['xy']['score']); 
	    //array_merge($info['xy']['content'],$arr2['content']);
	    //array_merge($info['xy']['score'],$arr2['score']);
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
	    	$result = $db->getassproud(self::$userinfo['fu_id'],1);
	    	$info['row_nums'] = ($result['asspro_neng_num']+1);
	    }
	    $db = new user_score();
	    if($info['xy']['exist'] == 1){
	    	$tmp = $db->getassproud(self::$userinfo['fu_id']);
	    	$info['row_nums'] = $tmp['asspro_neng_num']+1;
	    }
	   //echo "<pre>";
	   //print_r($info);
	    return $info; 
	    }


		
	


	/**
	 * 他评中，获得自己的得分
	 * @param unknown_type $fu_id
	 */
	private function taping_myscore($fu_id){
		$db = new user_score();
        $re = $db->getScore($fu_id,2);
        $nums = count($re);
        //echo "<pre>";
        //print_r($re);
        if($re){
        	$ave_myscore = array();
        	foreach($re as $k =>$v){
        		if(empty($ave_myscore)){
        			$tmp = explode(",",$v['us_score']);
        			foreach($tmp as $k2=>&$v2){
        				$ave_myscore[$k2] = 0;
        			}
        		}
        	
        			$tmp = explode(",",$v['us_score']);
        			foreach($tmp as $key2=>$value2 ){
        				$ave_myscore[$key2] +=$value2; 
        			}
        		
        	}
        	foreach($ave_myscore as $k=>&$v){
        		$v = round($v/$nums,1);
        	}
        	return $ave_myscore;
        	//echo "<pre>";
        	//print_r($ave_myscore);
        //return explode(",",$re['us_score']);
        }else{
        	return false;
        }

	}
	/**
	 * 通过fu_id 获得这个学生所在专业，同年级的平均分
	 * @param unknown_type $fu_id
	 */
	private function taping_average($fu_id){
		
		$result = $this->get_taping($fu_id);
		//判断是否有这个结果
		if($result){
		//echo "<pre>";
		//print_r($result);
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
			$average[$k] = round(($v)/$nums,1);
		}
		}else{
			$average = false;
		}
		return $average;
	}
	/**
	 * 获得排名
	 * @param unknown_type $fu_id
	 */
	private function taping_ranking($fu_id){
		//echo "<pre>";
		//echo $fu_id;
		$db = new user_score();
		$userinfo = $db->getScore($fu_id,2,1);
		if($userinfo){
		//print_r($userinfo);
		$userscoreandranking = array();
		//$uscore =  explode(',',$userinfo['us_score']);
		$uscore = $this->taping_myscore(self::$userinfo['fu_id']);
		//>>>>>>>>>>>>>>>
		 $alltaping = $this->get_taping($fu_id);//全部他评学生
		foreach($uscore as $k=>$v){
				$userscoreandranking[$k]['score'] = $v;
				$userscoreandranking[$k]['ranking'] = 1;
		} 
		//1.获得同组的所有学生id;
		$result = $this->getgroup($fu_id);
		//echo "<pre>";
		foreach($result as $k=>$v){
			if($v['fu_id']!= $fu_id){
				$result[$k]['us_score'] = $this->taping_myscore($v['fu_id']);
			}
		}

		//print_r($result);
		//>>>>>>>>>>>>>>
		
		$alltaping = $result;
		foreach($alltaping as $k=>$v){
			if($v['fu_id'] != self::$userinfo['fu_id']){
			$score = $v['us_score'];
			foreach($score as $k2=>$v2){
				if($userscoreandranking[$k2]['score']<$v2){
					++$userscoreandranking[$k2]['ranking'];
				}
			}
			}
		}
		}else{ 
			$userscoreandranking = false;
		}
		//echo "<pre>";
		//print_R($userscoreandranking);
		
		return $userscoreandranking;

	}
	/**
	 * 通过fu_id 获得全部他评学生
	 * @param unknown_type $fu_id
	 * @return Ambigous <Ambigous, boolean, multitype:>
	 */
	private function get_taping($fu_id){
		$db = new frontuser();
		$re = $db->_getUserFromUserid($fu_id);
		$major = $re['fu_major'];
		$grade = $re['fu_grade'];
		$db = new user_score();
		
		$result = $db->getalltaping($major,$grade,2);
		return $result;
	}
	
/**
 * 获得学生分组统计
 * @param unknown_type $fu_id
 * @return Ambigous <Ambigous, boolean, multitype:>
 */
	private function getgroup($fu_id){
		$db = new frontuser();
		$re = $db->_getUserFromUserid($fu_id);
		$major = $re['fu_major'];
		$grade = $re['fu_grade'];
		$db = new user_score();
	
		return  $db->getcount($major,$grade,2);
		
	}
    /**
     * 闹钟提醒
     */
    public function clock(){
        $info = $this->getData ( 'userinfo' );
        $id = $info['fu_id'];
        $activity_user = new activity();
        $clockActivity = $activity_user->getClockActivity($id);
        if($clockActivity==false){
            $num = 0;
        }else{
            $num = count($clockActivity);
        }
        for($i=0;$i<$num;$i++){
            if($clockActivity[$i]["clock_time"]<time()){
                echo "活动提醒！！活动‘".$clockActivity[$i]["activity_title"]."’将在 ".$clockActivity[$i]["activity_start_time"]." 开始　　　";
                $activity_user->removeClock($clockActivity[$i]["au_id"]);
            }else{
                echo 0;
            }
        }
    }
    public function removeClock(){
        $au_id = $_POST["au_id"];
        $activity_user = new activity();
        $result = $activity_user->removeClock($au_id);
        if($result!=false){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function removeClock2(){
        $activity_id = $_POST["activity_id"];
        $fu_id = $_POST["fu_id"];
        $activity_user = new activity();
        $result = $activity_user->removeClock2($activity_id,$fu_id);
        if($result!=false){
            echo 1;
        }else{
            echo 2;
        }
    }
}
