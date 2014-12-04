<?php
include_once("jpgraph/jpgraph.php");
include_once("jpgraph/jpgraph_pie.php");
include_once("jpgraph/jpgraph_pie3d.php");
class RecordController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->view->web_url=$this->getRequest()->hostUrl;
	}

    public function myPlan(){
        $id = $this->getRequest()->get("id");
        $a_id = $this->getRequest()->get("a_id");
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

        //8-17查询无登录学生信息
        $bks_code = $this->getRequest()->get("bks_code");
        $bks = new frontuser();
        $bk = $bks->getBksByCode($bks_code);
        $this->view->bks = $bk[0];
        //end

        $model = new frontuser();
        $student = $model->getUserByUserID($id);
        //获取学生的年级
        $student_niaji=$student['fu_grade'];
        $xinsheng=$student_niaji."-".(1+$student_niaji)."学年";
        $dayi=$student_niaji."-".(1+$student_niaji)."学年";
        $daer=(1+$student_niaji)."-".(2+$student_niaji)."学年";
        $dasan=(2+$student_niaji)."-".(3+$student_niaji)."学年";
        $dasi=(3+$student_niaji)."-".(4+$student_niaji)."学年";



        $this->view->student = $student;

        $model = new profile();
        $chengzhang_info=array();
        $profile_xinsheng = $model->getProfile_info($xinsheng,$id,1);
        $m=0;
        if($profile_xinsheng){
            $chengzhang_info[$m]['value']=$xinsheng;
            $chengzhang_info[$m]['mm']=$xinsheng.','.'1';
            $chengzhang_info[$m]['type']=1;
            $chengzhang_info[$m]['title']="新生自我总结";
            $m++;
        }
        $profile_dayi= $model->getProfile_info($dayi,$id,0);
        if($profile_dayi){
            $chengzhang_info[$m]['value']=$dayi;
            $chengzhang_info[$m]['mm']=$dayi.','.'0';
            $chengzhang_info[$m]['type']=0;
            $chengzhang_info[$m]['title']="大一自我总结";
            $m++;
        }
        $profile_daer = $model->getProfile_info($daer,$id,0);
        if($profile_daer){
            $chengzhang_info[$m]['value']=$daer;
            $chengzhang_info[$m]['mm']=$daer.','.'0';
            $chengzhang_info[$m]['type']=0;
            $chengzhang_info[$m]['title']="大二自我总结";
            $m++;
        }
        $profile_dasan = $model->getProfile_info($dasan,$id,0);
        if($profile_dasan){
            $chengzhang_info[$m]['value']=$dasan;
            $chengzhang_info[$m]['mm']=$dasan.','.'0';
            $chengzhang_info[$m]['type']=0;
            $chengzhang_info[$m]['title']="大三自我总结";
            $m++;
        }
        $profile_dasi = $model->getProfile_info($dasi,$id,0);
        if($profile_dasi){
            $chengzhang_info[$m]['value']=$dasi;
            $chengzhang_info[$m]['mm']=$dasi.','.'0';
            $chengzhang_info[$m]['type']=0;
            $chengzhang_info[$m]['title']="大四自我总结";
            $m++;
        }
       $this->view->profile_info = $chengzhang_info;
        //设置第一次默认显示最后一次总结
        if($chengzhang_info){
            $result= $model->getProfile_info($chengzhang_info[$m-1]['value'],$id,$chengzhang_info[$m-1]['type']);
            $this->view->result_info = $result;
        }

        //$model = new profile();
       // $a_profile = $model->getAProfileById($a_id);
        //$this->view->a_profile = $a_profile;


        $this->getView()->display("myPlan2.html");
    }
    public function myPlanOfContent(){
       $rusult_info=explode(",", $_POST["a_id"]);
        $xuenian = $rusult_info[0];
        $isnew= $rusult_info[1];
        $fu_id=$_POST["id"];
        $model = new profile();
        $a_profile = $model->getAProfileById($fu_id,$xuenian,$isnew);
        echo  $a_profile["content"];
    }

	public function achievement(){
        $id = $this->getRequest()->get("id");
        //8-17查询无登录学生信息
        $bks_code = $this->getRequest()->get("bks_code");
        $bks = new frontuser();
        $bk = $bks->getBksByCode($bks_code);
        $this->view->bks = $bk[0];

        //浏览此次+1

        $growth_profile = new growthprofile();
        $growth_profile->addGpReadNum($id);


		$arr = array();
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

		$model = new frontuser();
		$student = $model->getUserByUserID($id);

		$model = new growthprofile();
		$gpt = $model->getgpt();

		for($i=0;$i<count($gpt);$i++){
			$gpt_id = $gpt[$i]['gpt_id'];
			$gp = $model->getgprofilexx($id,$gpt_id);

			if($gp == false){
				$gp = array($gpt[$i]['gpt_name']);


			}else{
				array_unshift($gp, $gpt[$i]['gpt_name']);	
			}
			array_push($arr, $gp);
		}

        //得出学年末评估的开始时间
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
        };
        $article_start_time = $model->getArticleStartTimeByYear($str,$student['fu_college']);
        if($article_start_time==false){
            $this->view->achievement_end_time = time()+1;
        }else{
            //得出个人成果填写的截止时间
            $achievementsTime = $model->getAchievementsTime();
            //var_dump($achievementsTime);var_dump(strtotime($article_start_time['article_begin_time']));
            $achievement_end_time = strtotime($article_start_time['article_begin_time'])-$achievementsTime["ss_personal_achievements_time"]*60*60*24;
            //var_dump(date("Y-m-d",$achievement_end_time));
            $this->view->achievement_end_time = $achievement_end_time;
        }
        $this->view->limitAddAndEdit = 1;
		$this->view->gpList = $arr;
		$this->view->student = $student;
		$this->getView()->display("achievement.html");
	}
    //根据学年检索achievement
    public function achievementByYear(){
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

        $arr = array();
        //8-17查询无登录学生信息
        $bks_code = $this->getRequest()->get("bks_code");
        $bks = new frontuser();

        $bk = $bks->getBksByCode($bks_code);
        $this->view->bks = $bk[0];
        //end
        $id = $this->getRequest()->get("id");
        $fu_grade=$this->getRequest()->get("fu_grade");
        $start_time = $this->getRequest()->get("start_time");
        $end_time = $this->getRequest()->get("end_time");
//        var_dump(strtotime("2014-8-30"));
//        var_dump(strtotime($start_time));var_dump(time());

        $model = new frontuser();
        $student = $model->getUserByUserID($id);

        $model = new growthprofile();
        $gpt = $model->getgpt();

        for($i=0;$i<count($gpt);$i++){
            $gpt_id = $gpt[$i]['gpt_id'];
            $gp = $model->getgprofileByYear($id,$gpt_id,strtotime($start_time),strtotime($end_time));
            if($gp == false){
                $gp = array($gpt[$i]['gpt_name']);


            }else{
                array_unshift($gp, $gpt[$i]['gpt_name']);
            }
            array_push($arr, $gp);
        }

        //得出学年末评估的开始时间
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
        };

        $article_start_time = $model->getArticleStartTimeByYear($str,$student['fu_college']);
        if($article_start_time==false){
            $this->view->achievement_end_time = time()+1;
        }else{
            //得出个人成果填写的截止时间
            $achievementsTime = $model->getAchievementsTime();
            //var_dump($achievementsTime);var_dump(strtotime($article_start_time['article_begin_time']));
            $achievement_end_time = strtotime($article_start_time['article_begin_time'])-$achievementsTime["ss_personal_achievements_time"]*60*60*24;
            //var_dump(date("Y-m-d",$achievement_end_time));
            $this->view->achievement_end_time = $achievement_end_time;
        }
        if(date(time()>strtotime($start_time) && time()<strtotime($end_time))){
            $this->view->limitAddAndEdit = 1;
        }

        $this->view->gpList = $arr;
        $this->view->student = $student;
        $this->getView()->display("achievement.html");
    }

    public function addAchievement(){
        $gpt_name=$_POST['gpt'];
        $content = $_POST['content'];
        $rule = $_POST['rule'];
        $fu_id = $_POST['fu_id'];
        $year = date("Y", time());
        $time =time();

        $profile_type= new growthprofile();
        $gpt_id = $profile_type->getGptIdByGptName($gpt_name);

        $model = new growthprofile();
        $result = $model->addGp($fu_id,$gpt_id['0']['gpt_id'],$content,$year,$time,$rule);
        echo $result;
    }

    public function editAchievement(){
        $rule = $_POST['rule'];
        $gp_id=$_POST['gp_id'];
        $gp_content=$_POST['gp_content'];


        $model = new growthprofile();
        $result = $model->editGp($gp_id,$gp_content,$rule);
        echo $result;
    }

       public function moreAchievement(){
           $fu_id = $this->getRequest()->get("fu_id");
           $gpt_name = $this->getRequest()->get("gpt_name");
           $fu_grade=$this->getRequest()->get("fu_grade");
           $isALL=$this->getRequest()->get("isALL");
           $start_time = $this->getRequest()->get("start_time");
           $end_time = $this->getRequest()->get("end_time");

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

           $this->view->gpt_name =  urldecode($gpt_name);
           //查询出所有gpt，用于more页面检索用
           $model = new growthprofile();
           $gpt= $model->getgpt();
           $this->view->gpt=$gpt;

           $profile_type= new growthprofile();
           $gpt_id = $profile_type->getGptIdByGptName(urldecode($gpt_name));
           $this->view->gpt_id = $gpt_id[0]["gpt_id"];//用于导出功能
           $this->view->gpt_name = urldecode($gpt_name);//用于导出功能

           $model = new frontuser();
           $student = $model->getUserByUserID($fu_id);
           $this->view->bks_code = $student["fu_username"];
           //分页
           $model =new growthprofile();
           $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
           $pageSize = 10;
           //判断是否是用户本身
           $info = $this->getData ( 'userinfo' );
           if( $info['fu_id']==$fu_id){
               if($isALL==1){
                   $gpListByPage = $model->getgprofilePageModelAll($fu_grade,$fu_id,$gpt_id['0']['gpt_id'],$page,$pageSize);
               }else{
                   $gpListByPage = $model->getgprofilePageModel(strtotime($start_time),strtotime($end_time),$fu_id,$gpt_id['0']['gpt_id'],$page,$pageSize);
               }
           }else{
               if($isALL==1){
                   $gpListByPage = $model->getgprofilePageModelAll2($fu_grade,$fu_id,$gpt_id['0']['gpt_id'],$page,$pageSize);
               }else{
                   $gpListByPage = $model->getgprofilePageModel2(strtotime($start_time),strtotime($end_time),$fu_id,$gpt_id['0']['gpt_id'],$page,$pageSize);
               }
           }

           $AllGpList = $model->getgprofile($fu_id,$gpt_id['0']['gpt_id']);
           echo '<table id="gpTable" style="display: none" border="1" width=100%><tr>
            <td>姓名</td>
            <td>类型</td>
            <td>内容</td>
            <td>学年</td>
            <td>创建时间</td>
            </tr>';
           for($i=0;$i<count($AllGpList);$i++){
               echo '<tr>
                <td>'.urldecode($student["fu_realname"]).'</td>
                <td>'.urldecode($gpt_name).'</td>
                <td>'.$AllGpList[$i]["gp_content"].'</td>
                <td>'.$AllGpList[$i]["grade_id"].'</td>
                <td>'.date('Y-m-d',$AllGpList[$i]["gp_create_time"]).'</td>
                </tr>';
           }
           echo '</table>';

           //得出学年末评估的开始时间
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
           };
           $article_start_time = $model->getArticleStartTimeByYear($str,$student['fu_college']);
           if($article_start_time==false){
               $this->view->achievement_end_time = time()+1;
           }else{
               //得出个人成果填写的截止时间
               $achievementsTime = $model->getAchievementsTime();
               //var_dump($achievementsTime);var_dump(strtotime($article_start_time['article_begin_time']));
               $achievement_end_time = strtotime($article_start_time['article_begin_time'])-$achievementsTime["ss_personal_achievements_time"]*60*60*24;
               //var_dump(date("Y-m-d",$achievement_end_time));
               $this->view->achievement_end_time = $achievement_end_time;
           }

           if(date(time()>strtotime($start_time) && time()<strtotime($end_time)) || $isALL==1){
               $this->view->limitAddAndEdit = 1;
           }

           $this->view->AllGpList = $AllGpList;

           $this->view->gpListPage = $gpListByPage;
           $this->view->student = $student;
           $this->view->display("moreAchievement.html");
       }

	
	public function activityDetails(){
		$id = $this->getRequest()->get("id");
		$model = new activity();
		$activitydetails = $model->getactivityDetails($id);
		$this->view->detail = $activitydetails;
		$this->view->display("activityDetails.html");
	}

	public function myRecord(){
		$id = $this->getRequest()->get("id");
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

        //8-17查询无登录学生信息
        $bks_code = $this->getRequest()->get("bks_code");
        $bks = new frontuser();
        $bk = $bks->getBksByCode($bks_code);
        $this->view->bks = $bk[0];
        //end
		$model = new frontuser();
		$student = $model->getUserByUserID($id);
		$this->view->student = $student;

		$model = new activity();
        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 10;
        $activityList = $model->getActivityListPageModel2($id,$page,$pageSize);
        for($i=0;$i<count($activityList["list"]);$i++){
            $arpList = $model->getPicLinkById($activityList["list"][$i]["activity_registration_id"]);
            for($j=0;$j<count($arpList);$j++){
                $activityList["list"][$i]["pic"][$j]=$arpList[$j]["pic_link"];
            }
        }

       // $activityList = $model->getActivityListPageModel($page, $pageSize, $activitytype = 0, $source = 0, $id, $organizers = 0, $state = 3, $recommend = 2);
        //总的活动
		$activity = $model->getActivity($id);
        $atByYear = $at = $model->getAt();

        //计算出今年的活动
        $year = date("Y",time());
        $activityByYear = $model->getActivityByYear($id,$year);
		
        if($atByYear){
            //两层循环，计算出各at的数量(本学年)
            for($i=0;$i<count($atByYear);$i++){
                $atByYear[$i]['count']=0;
                for($j=0;$j<count($activityByYear);$j++){
                    if($activityByYear[$j]['at_id']==$atByYear[$i]['at_id']){
                        $atByYear[$i]['count']++;
                    }
                }
            }
        }

        if($at){
            //两层循环，计算出各at的数量
            for($i=0;$i<count($at);$i++){
                $at[$i]['count']=0;
               for($j=0;$j<count($activity);$j++){
                    if($activity[$j]['at_id']==$at[$i]['at_id']){
                        $at[$i]['count']++;
                    }
               }
            }
        }
        //想不到更好的办法传值给GraphController,用了session
        $_SESSION['at']=$at;
        $_SESSION['atByYear']=$atByYear;

        if($activityByYear==false){
            $this->view->countActivityByYear = 0;
        }else{
            $this->view->countActivityByYear = count($activityByYear);
        }

        $activityAllList = $activity = $model->getActivity($id);

        $this->view->activityAllList = $activityAllList;
		
        $this->view->atByYear = $atByYear;
        $this->view->activityList = $activityList;
        $this->view->at = $at;
		$this->view->activity = $activity;
        $this->view->selectMenu =3;
		$this->getView()->display("myRecord.html");
	}
	
	public function myclass(){
        $fu_id = $this->getRequest()->get("id");
        $fu_realname =  $this->getRequest()->get("fu_realname");
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

        $model = new frontuser();
        $student = $model->getUserByUserID($fu_id);
        $this->view->student = $student;

        $fu_major = $student['fu_major'];
        $fu_grade = $student['fu_grade'];
        $major_name = $student['major_name'];
       //根据专业,年级，查询出所用的学生
        //分页
        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 10;
        $studentsList = $model->getStudentPageModelByMajor($major_name,$fu_grade,urldecode($fu_realname),$page,$pageSize);

        if($studentsList['list']==true){
        //循环往每个学生填进数据，plans，gps，acts
        for($i=0;$i<count($studentsList['list']);$i++){
            $model = new profile();
            $plans = $model->getProfile($studentsList['list'][$i]['fu_id']);
            if(!$plans){
                $studentsList['list'][$i]['plans'] = 0;
            }else{
                $studentsList['list'][$i]['plans']=count($plans);
            }

            $model = new growthprofile();
            $gps =  $model->getAllProfileById($studentsList['list'][$i]['fu_id']);

            if(!$gps){
                $studentsList['list'][$i]['gps']=0;
            }else{
                $studentsList['list'][$i]['gps']=count($gps);
            }


            $model = new activity();
            $activity = $model->getActivity($studentsList['list'][$i]['fu_id']);
            if(!$activity){
                $studentsList['list'][$i]['acts']=0;
            }else{
                $studentsList['list'][$i]['acts']=count($activity);
            }

          }
        }
        //查询出本年级本专业同学的动态（参加了什么活动）
        $model = new activity();
        $activityByMajorGrade = $model->getActivityByMajorGrade($fu_major,$fu_grade);
        //查询出本专业同学的评论
        $model = new activity();
        $commentByMajorGrade = $model->getCommentsByMajorGrade($fu_major,$fu_grade);
        //查询出本专业同学的个人成长成果
        $model = new growthprofile();
        $growthProfileByMajorGrade = $model->getGrowthProfileByMajorGrade($fu_major,$fu_grade);

        $this->view->growthProfileByMajorGrade = $growthProfileByMajorGrade;
        $this->view->commentByMajorGrade = $commentByMajorGrade;
        $this->view->activityByMajorGrade = $activityByMajorGrade;
        $this->view->studentsList=$studentsList;
        $this->view->selectMenu=3;
		$this->getView()->display("myclass1.html");
	}
	
	public function  assistant(){
        $fu_id = $this->getRequest()->get("id");
        $fu_realname =  $this->getRequest()->get("fu_realname");


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

        $model = new frontuser();
        $student = $model->getUserByUserID($fu_id);
        $this->view->student = $student;

        $fu_major = $student['fu_major'];
        $major_name = $student['major_name'];
        $fu_grade = $student['fu_grade'];
        //根据专业,年级，查询出所用的学生
        //分页
        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 10;
        $studentsList = $model->getStudentPageModelByMajorA($major_name,urldecode($fu_realname),$page,$pageSize);

        if($studentsList['list']==true){
        //循环往每个学生填进数据，plans，gps，acts
        for($i=0;$i<count($studentsList['list']);$i++){
            $model = new profile();
            $plans = $model->getProfile($studentsList['list'][$i]['fu_id']);
            if(!$plans){
                $studentsList['list'][$i]['plans'] = 0;
            }else{
                $studentsList['list'][$i]['plans']=count($plans);
            }

            $model = new growthprofile();
            $gps =  $model->getAllProfileById($studentsList['list'][$i]['fu_id']);

            if(!$gps){
                $studentsList['list'][$i]['gps']=0;
            }else{
                $studentsList['list'][$i]['gps']=count($gps);
            }


            $model = new activity();
            $activity = $model->getActivity($studentsList['list'][$i]['fu_id']);
            if(!$activity){
                $studentsList['list'][$i]['acts']=0;
            }else{
                $studentsList['list'][$i]['acts']=count($activity);
            }

        }
        }

        //查询出本年级本专业同学的动态（参加了什么活动）
        $model = new activity();
        $activityByMajorGrade = $model->getActivityByMajorGrade($fu_major,$fu_grade);
        //查询出本专业同学的评论
        $model = new activity();
        $commentByMajorGrade = $model->getCommentsByMajorGrade($fu_major,$fu_grade);
        //查询出本专业同学的个人成长成果
        $model = new growthprofile();
        $growthProfileByMajorGrade = $model->getGrowthProfileByMajorGrade($fu_major,$fu_grade);

        $this->view->growthProfileByMajorGrade = $growthProfileByMajorGrade;
        $this->view->commentByMajorGrade = $commentByMajorGrade;
        $this->view->activityByMajorGrade = $activityByMajorGrade;
        $this->view->studentsList=$studentsList;
        $this->view->selectMenu=3;
		$this->getView()->display("assistant.html");
	}
	
	public function dean(){
        $fu_id = $this->getRequest()->get("id");
        $fu_realname =  $this->getRequest()->get("fu_realname");
        $major_id = $this->getRequest()->get("major_id");
        $grade = $this->getRequest()->get("grade");
        if($grade=="all"){
            $grade="";
        }

        //得出所有年级
        $toYear = date("Y",time());
        $all_grade[0] =$toYear - 4;
        $all_grade[1] =$toYear - 3;
        $all_grade[2] =$toYear - 2;
        $all_grade[3] =$toYear - 1;
        $all_grade[4] =$toYear ;
        $this->view->allGrade = $all_grade;

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

        //根据$major_id查询出$major_name
        $major = new growthprofile();
        $major_name = $major->getMajorNameById($major_id);
        //设置session，用于刷新后select选项不变
        $_SESSION["seGrade"]=$grade;
        $_SESSION["seMajor_id"]=$major_id;
        $_SESSION["seRealName"]=urldecode($fu_realname);

        if($major_id=='null'){
            $_SESSION["seMajor_id"]=='';
            $major_id='';
        }
        $model = new frontuser();
        $collegePre = $model->getUserByUserID($fu_id);
        $this->view->collegePre = $collegePre;

        $fu_college = $collegePre['fu_college'];

        //根据学院id查出 学院name
        $college = new growthprofile();
        $college_name = $college->getCollegeNameById($fu_college);

        //根据学院查出所有专业
        $majorModel = new major();
        $majors =$majorModel->getMajorByCollId($fu_college);

        $this->view->majors = $majors;
        //根据【学院】查询出所用的学生
        //$students =$model->getStudentByCollege($fu_college,$major_id,urldecode($fu_realname));
        //分页
        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 10;
        $studentsList = $model->getStudentPageModelByCollege($grade,$college_name[0]['college_name'],$major_name[0]['major_name'],$fu_college,$major_id,urldecode($fu_realname),$page,$pageSize);

        if($studentsList['list']==true){
        //循环往每个学生填进数据，plans，gps，acts
        for($i=0;$i<count($studentsList['list']);$i++){
            $model = new profile();
            $plans = $model->getProfile($studentsList['list'][$i]['fu_id']);
            if(!$plans){
                $studentsList['list'][$i]['plans'] = 0;
            }else{
                $studentsList['list'][$i]['plans']=count($plans);
            }

            $model = new growthprofile();
            $gps =  $model->getAllProfileById($studentsList['list'][$i]['fu_id']);
            if(!$gps){
                $studentsList['list'][$i]['gps']=0;
            }else{
                $studentsList['list'][$i]['gps']=count($gps);
            }


            $model = new activity();
            $activity = $model->getActivity($studentsList['list'][$i]['fu_id']);
            if(!$activity){
                $studentsList['list'][$i]['acts']=0;
            }else{
                $studentsList['list'][$i]['acts']=count($activity);
            }

          }
        }

        //查询出本年级本专业同学的动态（参加了什么活动）
        $model = new activity();
        $activityByCollege = $model->getActivityByCollege($fu_college);
        //查询出本专业同学的评论
        $model = new activity();
        $commentByCollege = $model->getCommentsByCollege($fu_college);
        //查询出本专业同学的个人成长成果
        $model = new growthprofile();
        $growthProfileByCollege = $model->getGrowthProfileByCollege($fu_college);
        $this->view->growthProfileByCollege = $growthProfileByCollege;
        $this->view->commentByCollege = $commentByCollege;
        $this->view->activityByCollege = $activityByCollege;

        $this->view->studentsList=$studentsList;
        $this->view->selectMenu=3;
		$this->getView()->display("dean.html");
	}
	
	public function president(){
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

        //得出所有年级
        $toYear = date("Y",time());
        $all_grade[0] =$toYear - 4;
        $all_grade[1] =$toYear - 3;
        $all_grade[2] =$toYear - 2;
        $all_grade[3] =$toYear - 1;
        $all_grade[4] =$toYear ;
        $this->view->allGrade = $all_grade;

        //查出所有学院
        $college = new college();
        $all_college = $college->getAllCollege();
        $this->view->allCollege = $all_college;


        //根据【学院】查询出所用的学生
        $model = new frontuser();

        //分页测试  注意！
        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 10;
        $studentsList = $model->getStudentPageModel($page,$pageSize);

        //查询所有同学的动态（参加了什么活动）
        $model = new activity();
        $activityByAll = $model->getActivityAll();
        //查询所有同学的评论
        $model = new activity();
        $commentByAll = $model->getCommentsByAll();
        //查询所有同学的个人成长成果
        $model = new growthprofile();
        $growthProfileByAll = $model->getGrowthProfileByAll();

        $this->view->growthProfileByAll = $growthProfileByAll;
        $this->view->commentByAll = $commentByAll;
        $this->view->activityByAll = $activityByAll;

        $this->view->studentsList =$studentsList;

        $this->view->selectMenu =3;
        echo $this->view->render("president1.html");
	}

    public function selectPresident(){

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

        //得出所有年级
        $toYear = date("Y",time());
        $all_grade[0] =$toYear - 4;
        $all_grade[1] =$toYear - 3;
        $all_grade[2] =$toYear - 2;
        $all_grade[3] =$toYear - 1;
        $all_grade[4] =$toYear ;
        $this->view->allGrade = $all_grade;
        //查出所有学院
        $college = new college();
        $all_college = $college->getAllCollege();
        $this->view->allCollege = $all_college;

        $fu_realname =  $this->getRequest()->get("name");

        //由于前台传来数据是major_name,所以查询出major_id
        $major =  $this->getRequest()->get("major");
        $majorModel = new major();
        $major_id = $majorModel->getMajorIdByMajorName(urldecode($major));

        $grade= $this->getRequest()->get("grade");
        $college_id=$this->getRequest()->get("college_id");
        $model = new growthprofile();
        $college_name = $model->getCollegeNameById($college_id);

        //设置session,用于查询刷新是SELECT选项不变
        $_SESSION["seGrade"]=$grade;
        $_SESSION["seCollege_id"]=$college_id;
        $_SESSION["seMajor"]=urldecode($major);
        if(!$major_id){
            $major_id='';
        }

        if($grade == "all"){
            $grade='';
        }
        if($college_id=="all"){
            $college_id='';
        }

        //根据【学院】查询出所用的学生
        $model = new frontuser();
        //$students =$model->getStudentBySelect($college_id,$grade,$major_id["major_id"],urldecode($fu_realname));

        //分页
        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 10;
        $studentsList = $model->getStudentPageModelBySel($college_name['0']['college_name'],urldecode($major),$college_id,$grade,$major_id["major_id"],urldecode($fu_realname),$page,$pageSize);
       $this->view->studentsList=$studentsList;

        //查询所有同学的动态（参加了什么活动）
        $model = new activity();
        $activityByAll = $model->getActivityAll();
        //查询所有同学的评论
        $model = new activity();
        $commentByAll = $model->getCommentsByAll();
        //查询所有同学的个人成长成果
        $model = new growthprofile();
        $growthProfileByAll = $model->getGrowthProfileByAll();

        $this->view->growthProfileByAll = $growthProfileByAll;
        $this->view->commentByAll = $commentByAll;
        $this->view->activityByAll = $activityByAll;

        $this->getView()->display("president1.html");
    }


    public function getSelect(){
        //学院和专业的联动select
        $college_id = $_POST['college_id'];
        $model = new major();
        $majors = $model->getMajorByCollId($college_id);
       //echo $majors[0]["major_name"];
        $arr = array();
        for($i=0;$i<count($majors);$i++){
            $arr[$i]=  urldecode($majors[$i]["major_name"]);
        }

        foreach ( $arr as $key => $value ) {
            $arr[$key] = urlencode ( $value );
        }
        echo urldecode (json_encode($arr));

    }

    public function writeThoughts(){
        $ar_id = $_POST["ar_id"];
        $content = $_POST["thoughtsContent"];
        $activity = new activity();
        $result = $activity->writeThoughts($ar_id,$content);
        echo $result;
    }
}

