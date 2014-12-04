<?php

class AssistController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	/**
	*DATA:2014-07-31
	*辅学活动:周年活动
	*author:tcl@tiptimes.com
	**/
	public function AssistActivity(){
        $info = $this->getData ( 'userinfo' );
        $id = $info['fu_id'];

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

        $activity_class = $this->getRequest()->get("activity_class");
       if($activity_class==1){
          //查询此学生是否开启了课程格子
           $syllabus = new syllabus();
           $resultifopen=$syllabus->getsyllabus($id);
           if($resultifopen &&  $resultifopen['if_open']==1){
              //获取此学生的课程信息
               $syllabusList = $syllabus->getSyllabusById($id);
               $this->view->syllabusList=$syllabusList;

           }
       }
		//$activityType = $this->getRequest()->get("type")?$this->getRequest()->get("type"):0;
		$keywords =$this->getRequest()->get("keywords")?$this->getRequest()->get("keywords"):null;
    	if($keywords!==null){
			$keywords =urldecode($keywords);
		}
		$activity = new activity();
		$this->view->activity_class=$activity_class;
		//活动介绍
		$weekActivity = $activity->getWeekActivity($activity_class);
		$this->view->weekActivity = $weekActivity;
		//活动类型
		$weekActivityType = $activity->getWeekActivityType();
		$this->view->weekActivityType=$weekActivityType;
		//活动主办方
		$weekActivityOrg = $activity->getWeekActivityOrg();
		$this->view->weekActivityOrg=$weekActivityOrg;
		//活动详情
        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 16;
        $all_activity=$activity->getActivity01($activity_class,$keywords,$page,$pageSize);
        $this->view->all_activity=$all_activity;
        $activity_info=array();
        if($all_activity['list']){
            for($i=0;$i<count($all_activity["list"]);$i++){
                $activity = new activity();
                //var_dump($all_activity["list"][$i]['activity_id']);
                $where_activity_id=$all_activity["list"][$i]['activity_id'];
                $where_activity_user=$id;

                $result['naozhong']=$activity->get_Clock($where_activity_id,$where_activity_user);
                $result['activity_title']=$all_activity["list"][$i]['activity_title'];
                $result['activity_id']=$all_activity["list"][$i]['activity_id'] ;
                if($activity_class == 1 && $resultifopen['if_open']==1){
                    $result['activity_start_time']=$all_activity["list"][$i]['activity_start_time'];
                    $result['activity_end_time']=$all_activity["list"][$i]['activity_end_time'];
                    $result['activity_address']=$all_activity["list"][$i]['activity_address'];
                }else{
                    $result['time']=$all_activity["list"][$i]['activity_start_time'];
                    $result['end_time']=$all_activity["list"][$i]['activity_end_time'];
                    $result['didian']=$all_activity["list"][$i]['activity_address'];
                }


                $result["if_import"]=$all_activity["list"][$i]["activity_if_import"];

                $activity_id=$all_activity["list"][$i]['activity_id'];
                $activity_at_id=$all_activity["list"][$i]['at_id'];
                $result_zhubanfangid=$activity->getZhubanfangid($activity_id);
                $zhubanfang='';
                for($j=0;$j<count($result_zhubanfangid);$j++){
                    $m=$j+1;
                    $result_zhubanfangname=$activity->getZhubanfangname($result_zhubanfangid[$j]['organizers_id']);
                    $zhubanfang=$zhubanfang.$m.",".$result_zhubanfangname['organizers_name'];
                }
                $result['zhubanfang']=$zhubanfang;
                $result_leixing=$activity->getHuodongleixing($activity_at_id);
                $result['leixing']=$result_leixing['at_name'];
                $activity_info[]=$result;
            }
        }

        //活动的具体的详情
        $this->view->activity_info=$activity_info;
		//热门活动
		$HotActivityList = $activity->getHotActivity02($activity_class);
		$this->view->HotActivityList=$HotActivityList;

        $this->view->selectMenu=0;
        if( $activity_class == 1 && $resultifopen['if_open']==1){
            //活动的具体的详情
            $dataResult=json_encode($activity_info);
            $this->view->data_json=$dataResult;
            echo $this->view->display("weekAssistActivity_open.html");
        }else if($activity_class == 1){
		    echo $this->view->display("weekAssistActivity.html");
		}else{
		    echo $this->view->display("yearAssistActivity.html");
		}
	}
	/**
	 * 活动筛选
	 * author:tcl@tiptimes.com
	 */
	public function AssistActivityQurey(){
        $activity_class = $_POST["activity_class"];
        $typesValues = $_POST["typesValue"];
        $organizersValues = $_POST["organizersValue"];
        $statusValues = $_POST["statusValue"];
        $recommendValue = $_POST["recommendValue"];
        $time = $_POST["time"];
        $info = $this->getData ( 'userinfo' );
        $id = $info['fu_id'];
        if(count($typesValues)!=0 && count($organizersValues)!=0){
            $typesValues = strtr(json_encode($typesValues),"[]","()");
            $organizersValues = strtr(json_encode($organizersValues),"[]","()");
            $activity = new activity();
            $activitySelectList = $activity->getSelectAllActivity($typesValues,$organizersValues,$activity_class);
        }else if(count($typesValues)!=0 && count($organizersValues)==0){
            $typesValues = strtr(json_encode($typesValues),"[]","()");
            $activity = new activity();
            $activitySelectList = $activity->getSelectAllActivity2($typesValues,$activity_class);
        }else if(count($typesValues)==0 && count($organizersValues)!=0){
            $organizersValues = strtr(json_encode($organizersValues),"[]","()");
            $activity = new activity();
            $activitySelectList = $activity->getSelectAllActivity3($organizersValues,$activity_class);
        }else{
            $activity = new activity();
            $activitySelectList = $activity->getSelectAllActivity4($activity_class);
        }

        if($activitySelectList==false){
            $countNum = 0;
        }else{
            $countNum = count($activitySelectList);
        }
        //判断活动状态，判断有点多
        $arr = array();
        if(count($statusValues)==1){
            if($statusValues[0]==1){
                for($i=0;$i<$countNum;$i++){
                    if(strtotime($activitySelectList[$i]["activity_start_time"])>time()){
                        $arr[] = $activitySelectList[$i];
                    }
                }
            }else if($statusValues[0]==2){
                for($i=0;$i<$countNum;$i++){
                    if(strtotime($activitySelectList[$i]["activity_start_time"])<time() && time()<strtotime($activitySelectList[$i]["activity_end_time"])){
                        $arr[] = $activitySelectList[$i];
                    }
                }
            }else if($statusValues[0]==3){
                for($i=0;$i<$countNum;$i++){
                    if(time()>strtotime($activitySelectList[$i]["activity_end_time"])){
                        $arr[] = $activitySelectList[$i];
                    }
                }
            }
        }
        if(count($statusValues)==2){
            if($statusValues[0]==1 && $statusValues[1]==2){
                for($i=0;$i<$countNum;$i++){
                    if(time()<strtotime($activitySelectList[$i]["activity_end_time"])){
                        $arr[] = $activitySelectList[$i];
                    }
                }
            }else if($statusValues[0]==2 && $statusValues[1]==3){
                for($i=0;$i<$countNum;$i++){
                    if(time()>strtotime($activitySelectList[$i]["activity_start_time"])){
                        $arr[] = $activitySelectList[$i];
                    }
                }
            }else{
                for($i=0;$i<$countNum;$i++){
                    if(time()<strtotime($activitySelectList[$i]["activity_start_time"]) || time()>strtotime($activitySelectList[$i]["activity_end_time"])){
                        $arr[] = $activitySelectList[$i];
                    }
                }
            }
        }
        if(count($statusValues)==3 || count($statusValues)==0){
            for($i=0;$i<$countNum;$i++){
                $arr[] = $activitySelectList[$i];
            }
        }

        $arr1 = $arr;
        //合并多主办方算法
        for($i=0;$i<count($arr1);$i++){
            for($j=0;$j<count($arr1);$j++){
                if($i != $j){
                    if($arr[$i]["activity_id"]==$arr[$j]["activity_id"]){
                        if($i>$j){
                            unset($arr[$i]);
                        }else{
                            $arr[$i]["organizers_name"] = $arr[$i]["organizers_name"]."、".$arr[$j]["organizers_name"];
                        }
                    }
                }
            }
        }

        $arr = array_values($arr);
        //过滤是否推荐
        $arrSelectAll = array();
        if($recommendValue==1){
            for($i=0;$i<count($arr);$i++){
                if($arr[$i]["activity_if_import"]==1){
                    $arrSelectAll[] = $arr[$i];
                }
            }
        }else{
            $arrSelectAll = $arr;
        }
        //过滤日期
        $arrSelectAll1 = array();
        if($time!=null){
            for($i=0;$i<count($arrSelectAll);$i++){
                if(date("Y-m-d",strtotime($arrSelectAll[$i]["activity_start_time"]))==$time){
                    $arrSelectAll1[] = $arrSelectAll[$i];
                }
            }
        }else{
            $arrSelectAll1 = $arrSelectAll;
        }

        if($arrSelectAll1==false){
            $ListLength = 0;
        }else{
            $ListLength = count($arrSelectAll1);
        }

        for($i=0;$i<$ListLength;$i++){
            $arrSelectAll1[$i]['naozhong'] = $activity->get_Clock( $arrSelectAll1[$i]["activity_id"],$id);
        }
        $path = $this->getRequest()->hostUrl;

        if($activity_class==1){
            //查询此学生是否开启了课程格子
            $syllabus = new syllabus();
            $resultifopen02=$syllabus->getsyllabus($id);
        }
         if($activity_class == 1 && $resultifopen02['if_open']==1){
               echo json_encode($arrSelectAll1);
         }else{
        for($i=0;$i<$ListLength;$i++){
            echo "
           <div class='col-md-3'>";
            if($arrSelectAll1[$i]["activity_if_import"]==0){
                 if(time()<=strtotime($arrSelectAll1[$i]["activity_start_time"])){
                     echo "<div class='site-activity-table active' style='height:230px;width: 180px;background-color:#99cc99'>";
                 }else if( strtotime($arrSelectAll1[$i]["activity_start_time"])<=time() && time()<=strtotime($arrSelectAll1[$i]["activity_end_time"]) ){
                     echo "<div class='site-activity-table active' style='height:230px;width: 180px;background-color:#FFCCFF'>";
                 }else{
                     echo "<div class='site-activity-table active' style='height:230px;width: 180px;background-color:#CCCCCC'>";
                 }

            }else{
                if(time()<=strtotime($arrSelectAll1[$i]["activity_start_time"])){
                    echo "<div class='site-activity-table recommend' style='height:230px;width: 180px;background-color:#99cc99'>";
                }else if( strtotime($arrSelectAll1[$i]["activity_start_time"])<=time() && time()<=strtotime($arrSelectAll1[$i]["activity_end_time"]) ){
                    echo "<div class='site-activity-table recommend' style='height:230px;width: 180px;background-color:#FFCCFF'>";
                }else{
                    echo "<div class='site-activity-table recommend' style='height:230px;width: 180px;background-color:#CCCCCC'>";
                }
            }
            echo "
            <a style='color:white' href='".$this->getRequest()->hostUrl."/index.php/Assist/getWeekActivityContent/activity_class/".$activity_class."/activityId/".$arrSelectAll1[$i]["activity_id"]."'>
                    <div class='title' style='margin: 0px 0px;height:3em'>".$arrSelectAll1[$i]['activity_title']."</div>
                    <div class='description'>
                        <p>时间：".$arrSelectAll1[$i]["activity_start_time"]."</p>
                        <p>地点：".$arrSelectAll1[$i]["activity_address"]."</p>
                        <p>类型：".$arrSelectAll1[$i]["at_name"]."</p>
                        <p>主办方：".$arrSelectAll1[$i]["organizers_name"]."</p>
                    </div>
             </a>";
            if($arrSelectAll1[$i]["naozhong"]==1){
                echo "<div class='notification'>
                         <button style='background-image: url($path/common/app/images/1.jpg)' class='btn btn-xs' onclick=javascript:if(confirm('确实要取消提醒?'))removeClock(".$arrSelectAll1[$i]["activity_id"].")><i class='fa fa-bell'></i></button>
                        </div>";
            }else{
                echo "<div class='notification' >
                          <button style='background-image:url($path/common/app/images/2.jpg)'  class='btn btn-xs btn-info' data-activity_title='".$arrSelectAll1[$i]['activity_title']."' data-activity_start_time='".$arrSelectAll1[$i]['activity_start_time']."' data-activity_id='".$arrSelectAll1[$i]['activity_id']."' onclick='setClock2(this)'><i class='fa fa-bell'></i></button>
                      </div>";
            }
            echo  "
                </div>
            </div>
            ";
        }
         }
	}
	/**
	 * data:2014-08-10
	 * 辅学活动评分
	 * author:tcl@tiptimes.com
	 */
	public  function  fuxuepingfen(){
		$userId = $_POST['userId'];
		$score = $_POST['score'];
		$sg_name = $_POST['sg_name'];
        $sg_id=$_POST['sg_id'];
	    $activity_id=$_POST['activityId'];
		echo "$sg_name";
		$activity = new activity();
		$as_ids= $activity->fuxue_as_id($sg_id,$activity_id);
		$as_id=$as_ids['as_id'];
        //echo $as_id;
        //exit();
		$result_user=$activity->fuxue_as_user($userId,$as_id);
		if($result_user){
			echo '您已参与评分，请勿重复评分!';
			exit();
		}else{
           // echo "nihao";
            //exit();
            $activity = new activity();
			$result_insert=$activity->fuxue_as_insert($as_id,$userId,$score);
			if($result_insert){
			  echo "您已评分，谢谢参与!";
			  exit();
			}else {
			     echo "评分失败，请稍后再试！";
			     exit();
			}
		}
	}
	/**
	 * 周活动详情
	 * author:tcl@tiptimes.com
	 */
	public function getWeekActivityContent(){
        $info = $this->getData ( 'userinfo' );
        $id = $info['fu_id'];
        $activityId = $this->getRequest()->get("activityId");
        //浏览次数加1 8-31
        $activity = new activity();
        $activity->addActivityReadNum($activityId);
        //标志消息为已读
        $if_read = $this->getRequest()->get("if_read");
        $mes_id = $this->getRequest()->get("mes_id");
        $message = new message();
        if($if_read==1){
             $message->readMessage($mes_id);
        }
        //得出未读消息总数
        $notReadMessage = $message->getNotReadMessageCountById($id);
        if($notReadMessage==false){
            $this->view->countNotReadMessage = 0;
        }else{
            $this->view->countNotReadMessage = $notReadMessage["count(*)"];
        }

        //得出消息总数
        $AllMessageList = $message->getAllMessageById($id);
        if($AllMessageList==false){
            $this->view->countMessage = 0;
        }else{
            $this->view->countMessage = count($AllMessageList);
        }
	    $activity = new activity();
	    //$activityComment = $this->getRequest()->get("");
		$activity_class = $this->getRequest()->get("activity_class");
		
		$this->view->activityId=$activityId;
		
		$weekActivityContent = $activity->getActivityDetail($activityId);
		$this->view->weekActivityContent=$weekActivityContent;
		//获取该活动主办方
		$weekActivityOrg = $activity->getOriByActivityId($activityId);
		$this->view->weekActivityOrg=$weekActivityOrg;
		//获取该活动承办方
		$weekActivityUdt = $activity->getUdtakeByActivityId($activityId);
		$this->view->weekActivityUdt=$weekActivityUdt;
		//获取评论数
		$commentCounts = $activity->getCommentCounts($activityId);
		//var_dump($commentCounts);
		$this->view->commentCounts= $commentCounts;

		//想参加,鲜花鸡蛋
		$attitude = $activity->getUserAttitude($activityId);
		$this->view->attitude=$attitude;
		
		//该活动辅学目标总的评分人数
		$sumPerson = $activity->getSumPerson($activityId);
		//var_dump($sumPerson);
		$this->view->sumPerson = $sumPerson;
		//求指定的辅学目标平均分
		$activityAvg = $activity->getAveragescoreOfActivity($activityId);
		$this->view->activityAvg=$activityAvg;
		//var_dump($activityAvg);
		//辅学目标
		$activityGoals = $activity->getAssistGoalList($activityId);
		$this->view->activityGoals=$activityGoals;
		//var_dump($activityGoals);		
		$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
		//var_dump($page);//int 1
		$pageSize = 2;
		//实例化commentmodel
		$comment=new comment();
		//$commentlist = $comment->getSonById($activityId,'0',$page, $pageSize);
		$commentlist = $comment->deepSonList($activityId,'0',$page, $pageSize);
		//var_dump($commentlist['list'][0]['sonList']);
		$this->view->list = $commentlist;

        //获取活动海报
        $activity = new activity();
        $picList = $activity->getPicListById($activityId);
        $this->view->picList = $picList;


		//热门活动
		$HotActivityList = $activity->getHotActivity02($activity_class);
		$this->view->HotActivityList=$HotActivityList;
		if($activity_class == 1){
		    echo $this->view->display("weekActivityDesc1.html");
		}else{
		    echo $this->view->display("yearActivityDesc.html");
		}
	}
    /**
     * 设置评论有用
     * author:tcl@tiptimes.com
     */
    public function comment_userful(){
        $comment_id=$_POST['comment_id'];
        $activity = new activity();
        $arr=$activity->show_comment_one($comment_id);
        //获取这个评论的详情
        $result_comInfo=$activity->getcomInfo($comment_id);
        if($result_comInfo){
            $useful_num=$result_comInfo['comment_useful_num'];
            $useful_num++;
        }
        $content="您的评论被其他人评为有用";
        $fu_id=$result_comInfo['comment_user_id'];
        $fu_arr=$activity->getuserinfo($fu_id);
        $s=$fu_arr[if_sound];
        $activity_id=$result_comInfo['activity_id'];
        /** @var 推送 $platform */
        $platform = 'android,ios'; // 接受此信息的系统
        $msg_content = json_encode(array('n_builder_id'=>0,'n_title'=>'标题', 'n_content'=>$content,'n_extras'=>array('type'=>1)));
        $j=new jpush();
        //$j->send(18,3,$fu_id,1,$msg_content,$platform);
        $j->send(18,3,$fu_id,1,$msg_content,$platform,$s);
        //增加这条评论有用的次数
        $result_Infonum=$activity->update_comuseful($comment_id,$useful_num,$fu_id,$activity_id,$content);
        if($result_Infonum){
          echo  $useful_num;
        }else{
            echo 0;
        }
    }
	/**
	 * 活动评论
	 * author:tcl@tiptimes.com
	 */
	public function UpActivityComment(){
        $userId = $_POST['userId'];
		var_dump($userId);
		$content = $_POST['content'];
		$activityId = $_POST['activityId'];
		$activity = new activity();
		//获取所有的关键字
        $result_sensitive=$activity->getAllsensitive();
        if($result_sensitive){
            $all_sensitive=array();
         for($i=0;$i<count($result_sensitive);$i++){
            $all_sensitive[]=$result_sensitive[$i]['sw_name'];
         }
          $badword1 = array_combine($all_sensitive,array_fill(0,count($all_sensitive),'*'));
          $content = strtr($content, $badword1);
          $activityCommentList = $activity->addComment($userId, $content, $activityId);
        }else{
            $activityCommentList = $activity->addComment($userId, $content, $activityId);
        }

		echo $activityCommentList;
	}
	//活动评分，态度,存在
	public function UpActivityAttitudewant(){
        $activityId = $_POST['activityId'];
        $userId = $_POST['userId'];
        $activity = new activity();
        //查询是否已经关注了这活动，不可重复关注
        $result = $activity->ifExistIsWantFollowActivity($activityId,$userId);
        if($result==false){
            $result2 = $activity->ifExistFollowActivity($activityId,$userId);
            if($result2==false){
                //往activity_user添加数据，得到关注活动。
                $activity->addFollowActivity($activityId,$userId);
                $activity->addAttitudewant($activityId,$userId);
				$egg_num = $activity->getAttitudeegg($activityId);
				$array = array("status" => 1,
							"msg" => "关注成功！，请到个人中心查看！",
							"data"=>$egg_num);
            }else{
                $array = array("status" => 0,
							"msg" => "关注成功！，请到个人中心查看！",
							"data"=>null);
            }
        }else{
		$egg_num = $activity->getAttitudeegg($activityId);
			$array = array("status" => 0,
							"msg" => "你已经关注过了，请不要重复操作！！",
							"data"=>$egg_num);
        }
		echo json_encode($array);
	}
	public function UpActivityAttitudeflowers(){
		$activityId = $_POST['activityId'];
        $userId = $_POST['userId'];
		$activity = new activity();
        //查询是否已存在鲜花活动
        $result = $activity->ifExistIsFlowerActivity($activityId,$userId);
        if($result==false){
                $activity->addFlowerActivity($activityId,$userId);
                $activity->addAttitudeflowers($activityId);
				$egg_num = $activity->getAttitudeegg($activityId);
				$array = array("status" => 1,
							"msg" => "献鲜花成功",
							"data"=>$egg_num);
        }else{
			$array = array("status" => 0,
							"msg" => "你已经献过鲜花了，请不要重复操作！！",
							"data"=>null);
			 
			
        }
		 echo json_encode($array);
	}
	public function UpActivityAttitudeegg(){
		$activityId = $_POST['activityId'];
        $userId = $_POST['userId'];
		$activity = new activity();

        //查询是否已存在鲜花活动
        $result = $activity->ifExistIsEggActivity($activityId,$userId);
        if($result==false){
                $activity->addEggActivity($activityId,$userId);
                $activity->addAttitudeegg($activityId);
                $egg_num = $activity->getAttitudeegg($activityId);
				$array = array("status" => 1,
								"msg" => "扔鸡蛋成功！！",
								"data"=>$egg_num);
        }else{
			$array = array("status" => 0,
							"msg" => "你经过扔过鸡蛋了，请不要重复操作！",
							"data"=>null);
        }
		echo json_encode($array);
	}
	//丢鸡蛋
	public function AddActivityAttitudeegg(){
        $activityId = $_POST['activityId'];
        $userId = $_POST['userId'];
        $activity = new activity();
        $egg_num = $activity->getAttitudeegg($activityId);
		

        //查询是否已存在鸡蛋活动
        $result = $activity->ifExistIsEggActivity($activityId,$userId);
        if($result==false){
            
                $activity->addEggActivity($activityId,$userId);
                $activity->addUserAttitudeegg($activityId);
                echo "扔鸡蛋成功！！";
				echo $egg_num[0]["activity_egg_num"]."人";
        }else{
				echo "你已经扔过鸡蛋,请不要重复操作";
		
            
        }
	}
	public function AddActivityAttitudewant(){
        $activityId = $_POST['activityId'];
        $userId = $_POST['userId'];
        $activity = new activity();
        //查询是否已经关注了这活动，不可重复关注
        $result = $activity->ifExistIsWantFollowActivity($activityId,$userId);
        if($result==false){
            $result2 = $activity->ifExistFollowActivity($activityId,$userId);
            if($result2==false){
                //往activity_user添加数据，得到关注活动。
                $activity->addFollowActivity($activityId,$userId);
                $activity->addUserAttitudewant($activityId);
                echo "关注成功！，请到个人中心查看！";
            }else{
                $activity->addIfWant($activityId,$userId);
                $activity->addUserAttitudewant($activityId);
                echo "关注成功！，请到个人中心查看！";
            }
        }else{
            echo "以关注此活动，请到个人中心查看！！";
        }
	}
	public function AddActivityAttitudeflowers(){
        $activityId = $_POST['activityId'];
        $userId = $_POST['userId'];
        $activity = new activity();
        //查询是否已存在鲜花活动
        $result = $activity->ifExistIsFlowerActivity($activityId,$userId);
        if($result==false){
            $result2 = $activity->ifExistFollowActivity($activityId,$userId);
            if($result2==false){
                $activity->addFlowerActivity($activityId,$userId);
                $activity->addUserAttitudeflowers($activityId);
                echo "献鲜花成功！！";
            }else{
                $activity->addIfFlower($activityId,$userId);
                $activity->addUserAttitudeflowers($activityId);
                echo "献鲜花成功！！";
            }
        }else{
            echo "你已经献过鲜花了，请不要重复操作！！";
        }
	}
	//热门搜索(周活动)
	public function getWeekKeyHotActivity(){
		$activity = new activity();
		$queryKeyword= $_POST['keywords']?$_POST['keywords']:null;
	    if($queryKeyword !== null){
			$queryKeywords =urldecode($queryKeyword);			 
		}
		$queryKeywordInfo = $activity->getWeekHotKeywords($queryKeywords);
		//var_dump($queryKeywordInfo);
		echo json_encode($queryKeywordInfo);
	}
	//热门搜索（年活动）
	public function getYearKeyHotActivity(){
		$activity = new activity();
		$queryKeyword= $_POST['keywords']?$_POST['keywords']:null;
		if($queryKeyword !== null){
			$queryKeywords =urldecode($queryKeyword);
		}
		$queryKeywordInfo = $activity->getYearHotKeywords($queryKeywords);
		//var_dump($queryKeywordInfo);
		echo json_encode($queryKeywordInfo);
	}
	
	/**
	 * data:2014-08-04
	 * author:tcl@tiptimes.com
	 * 学生课表结合周活动
	 */
	//课表
	public function getCourseList(){
		$activity = new activity();
		
		echo $this->view->display("weekAssistActivity_courselist.html");
	}

    public function inserComment(){
        $data['comment_content']=$_POST['comment_content'];
        $data['parent_id']=$_POST['parent_id'];
        $data['activity_id']=$_POST['activityId'];
        $data['comment_user_id']=$_POST['userId'];
        $data["parent_user_id"] =  $_POST["comment_user_id"];
        //查询出昵称APP推送用
        $commentModel = new comment();
        $comment_user_nickname = $commentModel->getNickNameById($data['comment_user_id']);
        $par_nickname = $commentModel->getNickNameById($data["parent_user_id"]);
        $comment_user_nickname = $comment_user_nickname["fu_nickname"];
        $par_nickname = $par_nickname["fu_nickname"];
        $username = $commentModel->getUserNameById($data["parent_user_id"]);
        $par_username = $username["fu_username"];
        //var_dump($par_username);
        $activity = new activity();
        //获取所有的敏感词
        $result_sensitive=$activity->getAllsensitive();
        //去除所有的敏感词
        if($result_sensitive){
            $all_sensitive=array();
            for($i=0;$i<count($result_sensitive);$i++){
                $all_sensitive[]=$result_sensitive[$i]['sw_name'];
            }
            $badword1 = array_combine($all_sensitive,array_fill(0,count($all_sensitive),'*'));
            $data['comment_content'] = strtr($data['comment_content'], $badword1);
        }else{
            $data['comment_content']=$_POST['comment_content'];
        }

        $activityInfo = $activity->getActivityById($data['activity_id']);
        $message = new message();
        $mes_content = '您的评论被其他人回复" '.$data['comment_content'].'" ';
        $message->addMessage($data["parent_user_id"],$data['activity_id'],1,$mes_content,date("Y-m-d H:i:s",time()));
        $comment=new comment();
        $result=$comment->insertComment($data);

        //app推送
        $len=strlen($data['comment_content']);
        if($len>75){
            $comment_content=substr($data['comment_content'],0,75).'......';
        }
        /** @var
         * 测试推送内容！
         * $username */
        if($data['parent_id']!=0){
            $platform = 'android,ios'; // 接受此信息的系统
            $msg_content = json_encode(array('n_builder_id'=>0,'n_title'=>'标题', 'n_content'=>$comment_content,'n_extras'=>array('type'=>1,'comment_user_nickname'=>$comment_user_nickname, 'par_nickname'=>$par_nickname,'type'=>'1')));
            $j=new jpush();
            $j->send(18,3,$data["parent_user_id"],1,$msg_content,$platform);
            //$j->send(18,4,"",1,$msg_content,$platform);
        }

        echo $result ? '回复成功' : '回复失败';
    }

}