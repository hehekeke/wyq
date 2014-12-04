<?php

class AccountController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->web_host = $this->getRequest()->hostUrl;
        $this->view->web_app_url = $this->getRequest()->hostUrl . "/index.php";
    }

//	/**
//	 * 登录
//	 */
//	public function Login() {
//		$username = $this->getRequest ()->get ( "userName" );
//		$password = $this->getRequest ()->get ( "password" );
//		$osType = $this->getRequest ()->get ( "platform" ); // 2-代表Android,3-代iOS
//		//$token = $this->getRequest ()->get ( "userToken" );
//		if ($username && $password) {
//
//			$user = new frontuser ();
//			if ($password == "1") {
//				$userinfo = $user->getUserByUserName ( $username );
//				if (!$userinfo) {
//// 					$id = $user->addUser($code, $pw, $name, $roleId)("$username", "测试$username", "测试学院", 8);
//// 					$userinfo = $user->getUserByUserID($id);
//					$this->view->setState ( "0" );
//					$this->view->setAppStatus ( "0" );
//					$this->view->setAppData ( ( object ) null );
//					$this->view->setAppMsg ( '用户不存在' );
//					$this->view->appdisplay ( "json" );
//					return ;
//				}
//				$url = $this->getRequest ()->hostUrl;
//				$data ["userID"] = $userinfo ["fu_id"];
//				$data ['nickName'] = $userinfo ["fu_realname"];
//				$data ["pic"] = $userinfo ["pic_link"] == null ? "" : "$url/common/upload/images/" . $userinfo ["pic_link"];
//				//$session = $this->getApp ()->loadUtilClass ( "SessionUtil" );
//				//$session->set ( "session_userid", $userinfo );
//				$this->echoSuccessData ( $data );
//				return ;
//			} else {
//				//$this->view->setState ( "0" );
//				$this->view->setAppStatus ( "0" );
//				$this->view->setAppData ( ( object ) null );
//				$this->view->setAppMsg ( '用户名或密码错误' );
//                $this->view->setKey ('user', '用户名或密码错误' );
//				$this->view->appdisplay ( "json" );
//				return ;
//			}
//		} else {
//			$this->echoParamsMissing();
//			return;
//		}
//	}
//    /**
//     * 登录
//     */
//    public function Login(){
//        $username=$this->getRequest()->get("userName");
//        $pwd=$this->getRequest()->get("userPwd");
//        $user=new frontuser();
//
//        if($username&$pwd){
//            $userinfo=$user->getUserInfoByUserName($username);
//            if(!$userinfo){
//                $this->echoParamsNoUserInfo();
//                return;
//            }else{
//               if($user->validata_user($username,$pwd)){
//                   $url="http://192.168.1.10/nkgn/";
//                    $data ["userName"] = $userinfo ["fu_username"];
//                    $data ['studentName'] = $userinfo ["fu_realname"];
//                    $data ['headPicture'] = $url.$userinfo ["pic_link"];
//                    $data ['nickName'] = $userinfo ["fu_nickname"];
//                    $data ['headPictureFlag'] = $userinfo ["head_picture_flag"];
//                    $this->echoSuccessData ( $data );
//               }else{
//                    $this->echoLoginError();
//                    return;
//               }
//            }
//        }else{
//            $this->echoParamsMissing();
//            return;
//        }
//
//    }
    /**
     * 登录
     */
    public function Login()
    {

        $username = $this->getRequest()->get("userName");
        $pwd = $this->getRequest()->get("userPwd");
        $user = new frontuser();
        //var_dump($this->view->web_host);
        if ($username == "" || $pwd == "") {
            $this->view->setAppStatus("0");
            $this->view->setAppMsg("请输入用户名/密码~");
        } else {

            $userinfo = $user->get_username_info($username);
            //var_dump($userinfo[salt]);
            $pwd=md5 ( md5 ( $pwd . $userinfo[fu_salt] ) );
            if ($userinfo) {
                $if_front_user_info = $user->validata_user($username, $pwd);

                if ($if_front_user_info) {
                    $url = $this->view->web_host;
                    $data ["userName"] = $userinfo ["fu_username"];
                    $data ['studentName'] = $userinfo ["fu_realname"];
                    $data ['headPicture'] = $url.'/' . $if_front_user_info ["pic_link"];
                    $data ['nickName'] = $userinfo ["fu_nickname"];
                    $data ['headPictureFlag'] = $userinfo ["head_picture_flag"];
                    $data ['fu_id'] = $userinfo ["fu_id"];

                    $this->view->setAppData($data);
                    $this->view->setAppStatus("1");
                    $this->view->setAppMsg("登陆成功！");
                } else {
                    $this->view->setAppStatus("0");
                    $this->view->setAppMsg("用户名/密码错误！");
                }
            } else {
                $bks_info = $user->getinfofrom_bks($username);
                if ($bks_info) {
                    $arr_major = $user->get_user_major($bks_info[bks_major]);
                    $arr_college = $user->get_user_college($bks_info[bks_college]);
                    $fu_major_id = $arr_major[major_id];
                    $fu_college_id = $arr_college[college_id];
                    $user->insertuserinfo($bks_info, $fu_major_id, $fu_college_id);
                    $this->view->setAppStatus("0");
                    $this->view->setAppMsg("请再次输入用户名密码！");
                } else {
                    $this->view->setAppStatus("0");
                    $this->view->setAppMsg("无此学生！");
                }
            }
        }
        $this->view->appdisplay("json");
    }

    /**
     *个人中心获取用户信息
     */
    public function ShowUserInfo()
    {
        $username = $this->getRequest()->get("userName");
        $user = new frontuser();
        $userinfo = $user->getUserInfoByUserName($username);
        if ($userinfo) {
            $data["nickName"] = $userinfo["fu_realname"];
            $url = $this->view->web_host."/common/upload/images/upload/";
            $data["headPicture"] = $url . $userinfo["pic_link"];
            $this->view->setAppStatus("1");
            $this->view->setAppMsg("请求成功!");
            $this->view->setAppData($data);
            $this->view->appdisplay("json");
            return;
        } else {
            $this->view->setAppStatus("0");
            $this->view->setAppMsg("请求失败，请重试!");
            $this->view->appdisplay("json");
            return;
        }
    }

    /**
     * 修改头像模块
     */
    public function UpdateUserPic()
    {
        $user = new frontuser();
        $username = $this->getRequest()->get('userName');

        $targetPath = "common/upload/images/upload/";
        $adder = 'img';
        $arr = $user->getUserIdByUsername($username);
        $id = $arr[fu_id];
        $flag = $arr[head_picture_flag] + 1;
        $newfilename = $adder . time() .".png";
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetPath . $newfilename)) {
            $filePath = $targetPath . $newfilename;
            //$filePath1 ='/'. $targetPath . $newfilename;
            $pic = new picture();
            $pid = $pic->addPic('png', $filePath);
            if ($pid) {
                if ($user->updateUserPic($id, $pid, $flag)) {
                    $this->view->setAppStatus("1");
                    $this->view->setAppMsg("修改成功");
                } else {
                    $this->view->setAppStatus("0");
                    $this->view->setAppMsg("修改失败~");
                }
            } else {
                $this->view->setAppStatus("0");
                $this->view->setAppMsg("添加数据库失败~");
            }
        } else {
            $this->view->setAppStatus("0");
            $this->view->setAppMsg("上传失败~");
        }
        $this->view->appdisplay("json");
        return;
    }

    /**
     *修改昵称模块
     */
    public function UpdateNickname()
    {
        $username = $this->getRequest()->get('userName');
        $nickname = $this->getRequest()->get('newNickname');

        $user = new frontuser();
        if ($user->updateappnickname($username, $nickname)) {
            $this->view->setAppStatus('2');
            $this->view->setAppMsg("请求成功");
        } else {
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("昵称修改失败");
        }
        $this->view->appdisplay("json");
    }

//    /** 活动提醒 */
//    public function getNotifyMsg(){
//        $username=$this->getRequest()->get('userName');
//        $activity=new activity();
//        $activity->getNotifyMsgs($username);
//    }
    /**
     * 注销
     */
    public function Logout()
    {
        $session = $this->getApp()->loadUtilCtlass("SessionUtil");
        $session->clear();
        $this->view->setAppMsg("注销成功!");
        $this->view->setState("1");
        $this->view->setAppStatus("0");
        $this->view->setAppData(( object )null);
        $this->view->appdisplay("json");
    }

    /**
     * 上传图片
     */
    public function Upimage()
    {
        $targetPath = "common/upload/images/";
        $fileTypes = array(
            'jpg',
            'jpeg',
            'gif',
            'png'
        ); // File extensions
        $adder = 'img';

        $img = $_FILES ["image"] ["name"];
        $fileParts = pathinfo($img);
        if (in_array(strtolower($fileParts ['extension']), $fileTypes)) {
            $newfilename = $adder . time() . "." . $fileParts ["extension"];
            $fileUtil = $this->getApp()->loadUtilClass("FileUtil");
            $userinfo = $this->getData('userinfo');
// 			$log = new ulog ();
            if (move_uploaded_file($_FILES ['image'] ["tmp_name"], $targetPath . $newfilename)) {
                $filePath = $newfilename;
                $pic = new picture ();
                $id = $pic->addpic(strtolower($fileParts ['extension']), $filePath);
                if ($id) {
                    $data = array(
                        "fileID" => $id,
                        "filePath" => $filePath
                    );
                    $this->view->setState("1");
                    $this->view->setAppMsg("上传成功~");
// 					$log->addUlog ( $userinfo ["user_id"], 11, true );
                } else {
                    $data = ( object )null;

                    $this->view->setState("0");
                    $this->view->setAppMsg("上传失败~");
// 					$log->addUlog ( $userinfo ["user_id"], 11, false );
                }
            } else {
                $data = ( object )null;
                $this->view->setState("0");
                $this->view->setAppMsg("上传失败~");
// 				$log->addUlog ( $userinfo ["user_id"], 11, false );
            }
        } else {
            $data = ( object )null;
            $this->error404("");
            $this->view->setState("0");
            $this->view->setAppMsg("此文件不是图片~");
// 			$log->addUlog ( $userinfo ["user_id"], 11, false );
        }
        $this->view->setAppData($data);
        $this->view->setAppStatus("1");
        $this->view->appdisplay("json");
    }

    /**
     * 更新用户信息
     */
    public function Updateuserinfo()
    {
        $userinfo = $this->getData('userinfo');
        $userID = $userinfo ['fu_id'];
        $fileID = $this->getRequest()->get('imgID');
        $newname = $this->getRequest()->get('nickName');
        if ($fileID || $newname) {
            $user = new frontuser ();
            if ($user->updateInfo($userID, $fileID, $newname)) {
                $this->view->setState("2");
                $this->view->setAppMsg("修改成功");
            } else {
                $this->view->setState("0");
                $this->view->setAppMsg("修改失败");
            }
        } else {
            $this->view->setState("0");
            $this->view->setAppMsg("参数缺失");
        }

        $this->view->appdisplay("json");
    }

    /**
     * 获取用户信息
     */
    public function Getuserinfo()
    {
        $userinfo = $this->getData('userinfo');
        $url = $this->getRequest()->hostUrl;
        $data ["userID"] = $userinfo ["fu_id"];
        $data ['nickName'] = $userinfo ["fu_realname"];
        $data ["pic"] = $userinfo ["pic_link"] == null ? "" : "$url/common/upload/images/" . $userinfo ["pic_link"];
        $this->view->setState("1");
        $this->view->setAppStatus("1");
        $this->view->setAppMsg("成功");
        $this->view->setAppData($data);
        $this->view->appdisplay("json");
    }

    /** 获取对某一用户评论 */
    public function ToUserComment()
    {
        $user = new frontuser();
        $num = $this->getRequest()->get('userName');
        $arr = $user->getUserIdByUsername($num);
        if ($arr) {
            $id = $arr[fu_id];
            $commentId = $user->getCommentIdByUserId($id);
            if ($commentId) {
                for ($i = 0; $i < count($commentId); $i++) {
                    $inArr[] = $commentId[$i][comment_id];
                }
                $inStr = '(' . implode(',', $inArr) . ')';
                $comments = $user->getAllCommentToUser($inStr);
                if ($comments) {
                    $this->view->setAppStatus('1');
                    $this->view->setAppMsg("请求成功");
                    $this->view->setAppData($comments);
                } else {
                    $this->view->setAppStatus('0');
                    $this->view->setAppMsg("没有他人评论");
                }
            } else {
                $this->view->setAppStatus('0');
                $this->view->setAppMsg("此用户无评论信息！");
            }

        } else {
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("无此用户");
        }
        $this->view->appdisplay("json");
    }

    /** 活动提醒 */
    public function ShowActivityMsg()
    {
        $num = $this->getRequest()->get('userName');
        $user = new frontuser();
        $arr = $user->getUserIdByUsername($num);
        //var_dump($arr);
        if ($arr) {
            $id = $arr[fu_id];
            $messages = $user->getActivityMsg($id);
            //$day_num=;
            //var_dump($messages);
            if ($messages) {

                $this->view->setAppData($messages);
                $this->view->setAppStatus('1');
                $this->view->setAppMsg("请求成功！");
            } else {
                $this->view->setAppStatus('0');
                $this->view->setAppMsg("此用户无活动提醒信息！");
            }

        } else {
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("无此用户！");
        }
        $this->view->appdisplay("json");
    }

    /** 院校通知提醒 */
    public function ShowSchoolMsg()
    {
        $num = $this->getRequest()->get('userName');
        $user = new frontuser();
        $arr = $user->getUserIdByUsername($num);
        if ($arr) {
            $id = $arr[fu_id];
            $messages = $user->getSchoolMsg($id);
            //var_dump($messages);

            if ($messages) {
                $this->view->setAppData($messages);
                $this->view->setAppStatus('1');
                $this->view->setAppMsg("请求成功！");
            } else {
                $this->view->setAppStatus('0');
                $this->view->setAppMsg("此用户无活动提醒信息！");
            }
        } else {
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("无此用户！");
        }
        $this->view->appdisplay("json");
    }

    /** 全校通知提醒 */
    public function SchoolMsg(){
        $user = new frontuser();
        $num=$this->getRequest()->get('num');
        $messages = $user->getSchoolMsg1($num);
        //var_dump($messages);
        if($messages){
            for($i=0;$i<count($messages);$i++){
                //echo "aaa";
                $messages[$i]["notice_title"]=strip_tags($messages[$i]["notice_title"]);
                $messages[$i]["notice_title"]=str_replace("&nbsp;","",$messages[$i]["notice_title"]);
                $messages[$i]["notice_content"]=strip_tags($messages[$i]["notice_content"]);
                //var_dump($message[$i]["notice_content"]);
                $messages[$i]["notice_content"]=str_replace("&nbsp;","",$messages[$i]["notice_content"]);
                if($messages[$i]["file_name"]){
                    $messages[$i]["file_link"]=$this->view->web_host.$messages[$i]["file_link"];
                }else{
                    $messages[$i]["file_name"]="暂无附件";
                    $messages[$i]["file_link"]="";
                }

            }
        }
        //var_dump($messages);
        if ($messages) {
            $this->view->setAppData($messages);
            $this->view->setAppStatus('1');
            $this->view->setAppMsg("请求成功！");
        } else {
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("暂无院校活动提醒信息！");
        }
        $this->view->appdisplay("json");
    }

    /** 删除提醒消息 */
    public function DelMsg()
    {
        $mesid = $this->getRequest()->get('id');
        $user = new frontuser();
        $arr = $user->delmsg($mesid);
        if ($arr) {
            $this->view->setAppStatus('1');
            $this->view->setAppMsg("删除成功！");
        } else {
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("删除失败！");
        }
        $this->view->appdisplay("json");
    }

    /** 成长档案类型 */
    public function Gp_msg_type()
    {
        $user = new frontuser();
        $gpt_msg = $user->get_gpt_msg();

        if ($gpt_msg) {

            $this->view->setAppData($gpt_msg);
            $this->view->setAppStatus('1');
            $this->view->setAppMsg("获取信息成功！");
        } else {
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("无信息！");
        }
        $this->view->appdisplay("json");
    }

    /** 成长档案growth_profile */
    public function Gp_msg()
    {
        $num = $this->getRequest()->get('userName');
        $gpt_id = $this->getRequest()->get('gpt_id');
        $size=$this->getRequest()->get('size');
        $user = new frontuser();
        $arr = $user->getUserIdByUsername($num);
        if($arr){
            $id = $arr[fu_id];
            $gp_msg = $user->get_gp_msg($id,$gpt_id,$size);
            if($gp_msg){
                for($i=0;$i<count($gp_msg);$i++){
                    $gp_msg[$i][specificDate]=date("Y-m-d H:i:s",$gp_msg[$i][specificDate]);
                }
                $this->view->setAppData($gp_msg);
                $this->view->setAppStatus('1');
                $this->view->setAppMsg("获取成长档案信息成功！");
            }else{
                $this->view->setAppStatus('0');
                $this->view->setAppMsg("无成长档案信息！");
            }
        }else {
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("无此用户！");
        }
        $this->view->appdisplay("json");
    }



    public function  Hpactive(){
        $username = $this->getRequest()->get('userName');

        $user = new frontuser();
        $arr = $user->getUserIdByUsername($username);
        $id = $arr[fu_id];
        //var_dump($id);
        $college = $arr[fu_college];
        $assessment = new assessment();
        $ass = $assessment->getAssessmentProject($college);
        //var_dump($ass);
        if($ass){
            $this->view->setAppStatus('2');
            $this->view->setAppMsg("有互评活动！");
        }else{
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("暂无互评活动！");
        }
        $this->view->appdisplay("json");
}

    /** 班级互评表 */
    public function show_class_students()
    {


        $username = $this->getRequest()->get('userName');
        //var_dump($username);
        $user = new frontuser();
        $arr = $user->getUserIdByUsername($username);
        $id = $arr[fu_id];
        //var_dump($id);
        $college = $arr[fu_college];

        $assessment = new assessment();
        $ass = $assessment->getAssessmentProject($college);
        //var_dump($ass);
        $year = date("Y");
        $month = date("m");
        $day = date("d");
        if ($month > 8) {
            $xuenian = $year + 1;
            $str = $year . "-" . $xuenian . "学年";
        } else if ($month == 8) {
            if ($day > 15) {
                $xuenian = $year + 1;
                $str = $year . "-" . $xuenian . "学年";
            } else {
                $xuenian = $year - 1;
                $str = $xuenian . "-" . $year . "学年";
            }
        } else {
            $xuenian = $year - 1;
            $str = $xuenian . "-" . $year . "学年";
        }
        $ass_col = new assessment();
        $tp_result = $ass_col->get_tp_result($college, $str);
        $asspro_id = $tp_result[asspro_id];


        if($ass){
//            $size = $this->getRequest()->get("size");
            $user = new frontuser();
            $fu_class = $user->getfuclass($username);

            //var_dump($fu_class);
            $url =  $this->view->web_host.'/';
            if ($fu_class) {
                $num = $fu_class[fu_major];
                $id = $fu_class[fu_id];
                $grade=$fu_class[fu_grade];
                $arr = $user->getStudents($num, $id,$grade);

                $arr_num=$user->getStudentsnum($num,$id);
                $stu_num=count($arr_num);

                if($arr){
                    for ($i = 0; $i < count($arr); $i++) {
                        $us_create_user_id=$id;
                        $be_score_user_id=$arr[$i][fu_id];
                        //var_dump($url);
                        $arr[$i][pic_link] = $url.$arr[$i][pic_link];
                        if($assessment->getif_user_comment($asspro_id,$be_score_user_id,$us_create_user_id)){
                            $arr[$i][score_flag]=1;
                        }else{
                            $arr[$i][score_flag]=0;
                        }
                    }
                    //var_dump($arr);
                    $this->view->setAppData($arr);
                    $this->view->setAppStatus('1');
                    $this->view->setAppMsg("请求成功！");
                }else{
                    $this->view->setAppStatus('0');
                    $this->view->setAppMsg("没有数据！");
                }

            } else {
                $this->view->setAppStatus('0');
                $this->view->setAppMsg("无班级信息！");
            }
        }else{
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("暂无互评活动！");
        }
        $this->view->appdisplay("json");
    }

    /** 互评信息提交 */
    public function AssessMsgCommit()
    {
        //$username=$this->getRequest()->get('userName');
        $scoreStr = $this->getRequest()->get('scoreStr');
        $commentperson_id = $this->getRequest()->get('commentperson_id');
        $evaluatedPerson = $this->getRequest()->get('evaluatedPerson');
        $str1 = $this->getRequest()->get('str1');
        $str2 = $this->getRequest()->get('str2');
        $str3 = $this->getRequest()->get('str3');
        $str4 = $this->getRequest()->get('str4');
        $str5 = $this->getRequest()->get('str5');
        $str6 = $this->getRequest()->get('str6');
        $content = array(0 => $str1, 1 => $str2, 2 => $str3, 3 => $str4, 4 => $str5, 5 => $str6);
        $user = new frontuser();
        $arr = $user->getUserIdByUsername($evaluatedPerson);
        $fu_id = $arr[fu_id];
        $college = $arr[fu_college];
        $year = date("Y");
        $month = date("m");
        $day = date("d");
        if ($month > 8) {
            $xuenian = $year + 1;
            $str = $year . "-" . $xuenian . "学年";
        } else if ($month == 8) {
            if ($day > 15) {
                $xuenian = $year + 1;
                $str = $year . "-" . $xuenian . "学年";
            } else {
                $xuenian = $year - 1;
                $str = $xuenian . "-" . $year . "学年";
            }
        } else {
            $xuenian = $year - 1;
            $str = $xuenian . "-" . $year . "学年";
        }
        $ass = new assessment();
        $tp_result = $ass->get_tp_result($college, $str);
        $asspro_id = $tp_result[asspro_id];
        $commentperson_arr = $user->getUserIdByUsername($commentperson_id);
        $commentpersonid = $commentperson_arr[fu_id];
        $if_comment=$ass->getif_user_comment($asspro_id,$fu_id,$commentpersonid);

        if($if_comment){
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("你已经对该同学互评过了！");
        }else{
            $gong_num = $tp_result[asspro_gong_num];
            /** 获取公的分数平均值 */
            for ($i = 0; $i < $gong_num; $i++) {
                $pos = strpos($scoreStr, ',');
                $sub_score = substr($scoreStr, 0, $pos);
                $scoreStr = substr($scoreStr, $pos + 1);
                $data[] = $sub_score;
            }
            $sum = 0;
            foreach ($data as $value) {
                $sum += $value;
            }
            $avg = $sum / $gong_num;
            $scoreStr = $avg . "," . $scoreStr;
            $activity = new activity();
            $activity->goodorbad_commit($fu_id, $content);



            $if_suc = $activity->score_commit($fu_id, $asspro_id, $scoreStr,$commentpersonid);
            if ($if_suc) {
                $this->view->setAppStatus('2');
                $this->view->setAppMsg("互评成功！");
            } else {
                $this->view->setAppStatus('0');
                $this->view->setAppMsg("互评失败！");
            }
        }

        $this->view->appdisplay("json");

    }

    /** 互评具体 */
    public function Assesstostudent()
    {
        $url = $this->view->web_host;
        $username = $this->getRequest()->get('userName');
        $user = new frontuser();
        $arr = $user->getUserIdByUsername($username);
        $id = $arr[fu_id];
        //var_dump($id);
        $college = $arr[fu_college];
        //var_dump($college);
        $pic = $user->getUserPic($id);
        $pic_link=$url.$pic[headPicture];
        $assessment = new assessment();

        $ass = $assessment->getAssessmentProject($college);
        if($ass){
            //$asspro_id=$ass[asspro_id];
            $gong_num = $ass[asspro_gong_num];
            $neng_num = $ass[asspro_neng_num];
            $second_content = $ass[asspro_second_content];
            /** 获取公的内容 */
            for ($i = 0; $i < $gong_num; $i++) {
                $pos = strpos($second_content, ',');
                $sub_gong_content = substr($second_content, 0, $pos);
                $second_content = substr($second_content, $pos + 1);
                $data[sub_gong_content][] = $sub_gong_content;
            }
            /** 获取能的内容 */
            for ($i = 0; $i < $neng_num - 1; $i++) {
                $pos = strpos($second_content, ',');
                $sub_neng_content = substr($second_content, 0, $pos);
                $second_content = substr($second_content, $pos + 1);
                $data[sub_neng_content][] = $sub_neng_content;
            }
            $data[sub_neng_content][] = $second_content;
//        $ass_score=$assessment->getHpScore($id,$asspro_id);
//        $score=$ass_score[us_score];

//        /** 获取分数的内容 */
//        for($i=0;$i<$neng_num;$i++){
//            $pos=strpos($score,',');
//            $sub_score=substr($score,0,$pos);
//            $score=substr($score,$pos+1);
//            $data[sub_score][]=$sub_score;
//        }
//        $data[sub_score][]=$score;
            /** 将公能分数生成对象 */
            for ($i = 0; $i < ($neng_num + $gong_num); $i++) {
                if ($i < $gong_num) {
                    $data1[$i]['gong_name'] = '公';
                    $data1[$i]['sub_content'] = $data[sub_gong_content][$i];
                } else {
                    $data1[$i]['gong_name'] = '能';
                    $data1[$i]['sub_content'] = $data[sub_neng_content][$i - $gong_num];
                }
            }
            //var_dump($data1);
            $this->view->setAppData($data1);
            $this->view->setAppStatus('1');
            $this->view->setAppMsg("获取互评成功！");
        }else{
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("暂无互评活动");
        }

        $this->view->appdisplay("json");
    }

    /** 综合素质评估-互评自评结果 */
    public function Showassessresult()
    {
        $username = $this->getRequest()->get('userName');
        $user = new frontuser();
        $arr = $user->getUserIdByUsername($username);
        //var_dump($arr);
        $id = $arr[fu_id];
        $college = $arr[fu_college];
        //var_dump($college);
        $assessment = new assessment();
        $ass = $assessment->getAssessmentProject($college);
        $asspro_id = $ass[asspro_id];
//var_dump($asspro_id);
        $gong_num = $ass[asspro_gong_num];
        $neng_num = $ass[asspro_neng_num];
        $second_content = $ass[asspro_second_content];
        /** 获取公的内容 */
        for ($i = 0; $i < $gong_num; $i++) {
            $pos = strpos($second_content, ',');
            $sub_gong_content = substr($second_content, 0, $pos);
            $second_content = substr($second_content, $pos + 1);
            $data[sub_gong_content][] = $sub_gong_content;
        }
        /** 获取能的内容 */
        for ($i = 0; $i < $neng_num - 1; $i++) {
            $pos = strpos($second_content, ',');
            $sub_neng_content = substr($second_content, 0, $pos);
            $second_content = substr($second_content, $pos + 1);
            $data[sub_neng_content][] = $sub_neng_content;
        }
        $data[sub_neng_content][] = $second_content;
        $ass_score = $assessment->getHpScore($id, $asspro_id);
        //var_dump($ass_score);
        /** @var 将分数求平均值 $score */
        for($i=0;$i<count($ass_score);$i++){
            $score = $ass_score[$i][us_score];
            //var_dump($neng_num);
            /** 获取分数的内容 */
            for ($j = 0; $j < $neng_num; $j++) {
                $pos = strpos($score, ',');
                $sub_score = substr($score, 0, $pos);
                $score = substr($score, $pos + 1);
                $a[$j][] = $sub_score;
                //var_dump($score);
            }
            $a[$j][] = $score;

        }
        //var_dump($a);
        //var_dump(count($data[sub_score]);
       for($i=0;$i<count($a);$i++){
            $sum=0;
            for($j=0;$j<count($a[$i]);$j++){
                $sum += $a[$i][$j];
            }
           $avg_num=$sum/count($a[$i]);
           //var_dump($avg_num);
           $data[sub_score][] = $avg_num;
       }
        //var_dump($data[sub_score]);
//        /** 获取分数的内容 */
//        for ($i = 0; $i < $neng_num; $i++) {
//            $pos = strpos($score, ',');
//            $sub_score = substr($score, 0, $pos);
//            $score = substr($score, $pos + 1);
//            var_dump($score);
//            $data[sub_score][] = $sub_score;
//        }
//        $data[sub_score][] = $score;
//        var_dump($data[sub_score]);
        /** 获取自评分数的内容 */
        $ass_self_score = $assessment->getZpScore($id, $asspro_id);
        $self_score = $ass_self_score[us_score];
        //var_dump($self_score);
        for ($i = 0; $i < $neng_num; $i++) {
            $pos = strpos($self_score, ',');
            $self_sub_score = substr($self_score, 0, $pos);
            $self_score = substr($self_score, $pos + 1);
            $data[self_sub_score][] = $self_sub_score;
        }
        $data[self_sub_score][] = $self_score;
        /** 将公能分数生成对象 */
        for ($i = 0; $i < $neng_num + 1; $i++) {
            if ($i == 0) {
                $data1[$i]['sub_content'] = '公';
                $data1[$i]['sub_score'] = $data[sub_score][$i];
                $data1[$i]['self_sub_score'] = $data[self_sub_score][$i];
            } else {
                $data1[$i]['sub_content'] = $data[sub_neng_content][$i - 1];
                $data1[$i]['sub_score'] = $data[sub_score][$i];
                $data1[$i]['self_sub_score'] = $data[self_sub_score][$i];
            }
        }
        //var_dump($data1);
        $this->view->setAppData($data1);
        $this->view->setAppStatus('1');
        $this->view->setAppMsg("获取分数成功！");
        $this->view->appdisplay("json");
    }

    /** 他评结果查询！ */
    public function Show_tp_result()
    {
        $username = $this->getRequest()->get( 'userName');
        $year = date("Y");
        $month = date("m");
        $day = date("d");
        if ($month > 8) {
            $xuenian = $year + 1;
            $str = $year . "-" . $xuenian . "学年";
        } else if ($month == 8) {
            if ($day > 15) {
                $xuenian = $year + 1;
                $str = $year . "-" . $xuenian . "学年";
            } else {
                $xuenian = $year - 1;
                $str = $xuenian . "-" . $year . "学年";
            }
        } else {
            $xuenian = $year - 1;
            $str = $xuenian . "-" . $year . "学年";
        }
        $user = new frontuser();
        $arr = $user->getUserIdByUsername($username);
        $fu_id=$arr[fu_id];
        $major = $arr[fu_major];
        /** 获取与此用户同班级的学生ID */
        $fu_arr_id=$user->getfuarrid($major);

        $college = $arr[fu_college];
        $ass = new assessment();
        $tp_result = $ass->get_tp_result($college, $str);
        $second_content = $tp_result[asspro_second_content];
        $ass_id=$tp_result[asspro_id];
        $gong_num = $tp_result[asspro_gong_num];
        $neng_num = $tp_result[asspro_neng_num];
//        /** 获取学生班级排名 */
//        for($k=0;$k<count($fu_arr_id);$k++){
//            /** 获取学生功、能平均分！ */
//            var_dump($fu_arr_id[$k][fu_id]);
//            $all_score=$ass->getalltpscoreresult($fu_arr_id[$k][fu_id],$ass_id);
//            for($i=0;$i<count($all_score);$i++){
//                $pos = strpos($all_score[$i][us_score], ',');
//                $sub_gong_score = substr($all_score[$i][us_score], 0, $pos);
//                $all_score[$i][us_score]=substr($all_score[$i][us_score],$pos+1);
//                $data[sub_gong_score][] = $sub_gong_score;
//            }
//            //var_dump($all_score);
//            $pj_score=round(array_sum($data[sub_gong_score])/count($all_score),2);
//            for($i=0; $i<count($all_score);$i++){
//                $all_score[$i]['us_score_array'] = explode(",",$all_score[$i]['us_score']);
//                $count =  count($all_score[$i]['us_score_array']);
//
//                for($j=0; $j<$count; $j++){
//                    $neng_score_array[$i][$j]=$all_score[$i]['us_score_array'][$j];
//                }
//            }
//            for($i=0;$i<$neng_num;$i++){
//                for($j=0;$j<count($all_score);$j++){
//                    $neng_array[$i][]=$neng_score_array[$j][$i];
//                }
//                $avg1[$k][]=round(array_sum($neng_array[$i])/count($all_score),2);
//            }
//        }
//        var_dump($avg1);
        /** 获取学生功、能平均分！ */
        for($k=0;$k<count($fu_arr_id);$k++){
            $all_score=$ass->getalltpscoreresult($fu_arr_id[$k][fu_id],$ass_id);

            //var_dump($all_score);
            if($all_score){
                for($i=0; $i<count($all_score);$i++){
                    $all_score[$i]['us_score_array'] = explode(",",$all_score[$i]['us_score']);
                    $count =  count($all_score[$i]['us_score_array']);

                    for($j=0; $j<$count; $j++){
                        $neng_score_array[$i][$j]=$all_score[$i]['us_score_array'][$j];
                    }

                }
                for($i=0;$i<$neng_num+1;$i++){
                    for($j=0;$j<count($all_score);$j++){
                        $neng_array[$k][$i][]=$neng_score_array[$j][$i];
                    }
                    //var_dump(array_sum($neng_array[$k][$i]));
                    $avg[$fu_arr_id[$k][fu_id]][]=round(array_sum($neng_array[$k][$i])/count($all_score),2);
                }

            }else{
                for($i=0;$i<$neng_num+1;$i++){
                    $avg[$fu_arr_id[$k][fu_id]][]=0;
                }
            }

        }
       //var_dump($avg);
        for($k=0;$k<count($fu_arr_id);$k++){
            for($i=0;$i<$neng_num+1;$i++){

                $avg_array_all[$i][$fu_arr_id[$k][fu_id]]=$avg[$fu_arr_id[$k][fu_id]][$i];
                //var_dump($avg_array_all);
                arsort($avg_array_all[$i]);

            }
        }
        //var_dump($avg_array_all);
        for($i=0;$i<$neng_num+1;$i++){
            $num=0;
            foreach($avg_array_all[$i] as $key =>$value){

                if($fu_id==$key){
                    $num+=1;
                    break;
                }else{
                    $num+=1;
                    continue;
                }
            }
            $pm_array[]=$num;
        }
        //var_dump($pm_array);
       // var_dump($avg_array_all);
        /** 排名 */

//            for($i=0;$i<count($all_score);$i++){
//                $pos = strpos($all_score[$i][us_score], ',');
//                $sub_gong_score = substr($all_score[$i][us_score], 0, $pos);
//                $all_score[$i][us_score]=substr($all_score[$i][us_score],$pos+1);
//                $data[sub_gong_score][] = $sub_gong_score;
//            }
//            //var_dump($all_score);
//            $pj_score=round(array_sum($data[sub_gong_score])/count($all_score),2);


        /** 对班级取出来的平均分进行排名！ */

//        $all_score=$ass->getalltpscoreresult($fu_id,$ass_id);
//        for($i=0;$i<count($all_score);$i++){
//            $pos = strpos($all_score[$i][us_score], ',');
//            $sub_gong_score = substr($all_score[$i][us_score], 0, $pos);
//            $all_score[$i][us_score]=substr($all_score[$i][us_score],$pos+1);
//            $data[sub_gong_score][] = $sub_gong_score;
//         }
//        //var_dump($all_score);
//        $pj_score=round(array_sum($data[sub_gong_score])/count($all_score),2);
//        for($i=0; $i<count($all_score);$i++){
//            $all_score[$i]['us_score_array'] = explode(",",$all_score[$i]['us_score']);
//            $count =  count($all_score[$i]['us_score_array']);
//
//            for($j=0; $j<$count; $j++){
//               $neng_score_array[$i][$j]=$all_score[$i]['us_score_array'][$j];
//            }
//        }
//        for($i=0;$i<$neng_num;$i++){
//            for($j=0;$j<count($all_score);$j++){
//                $neng_array[$i][]=$neng_score_array[$j][$i];
//            }
//            $avg[$fu_id][]=round(array_sum($neng_array[$i])/count($all_score),2);
//        }


        /** 获取公的内容 */
        for ($i = 0; $i < $gong_num; $i++) {
            $pos = strpos($second_content, ',');
            $sub_gong_content = substr($second_content, 0, $pos);
            $second_content = substr($second_content, $pos + 1);
            $data[sub_gong_content][] = $sub_gong_content;
        }
        /** 获取能的内容 */
        for ($i = 0; $i < $neng_num - 1; $i++) {
            $pos = strpos($second_content, ',');
            $sub_neng_content = substr($second_content, 0, $pos);
            $second_content = substr($second_content, $pos + 1);
            $data[sub_neng_content][] = $sub_neng_content;
        }
        $data[sub_neng_content][] = $second_content;
        /** 将公能分数生成对象 */
        for ($i = 0; $i < ($neng_num + $gong_num); $i++) {
            if ($i < $gong_num) {
                $data1[$i]['gong_name'] = '公';
                $data1[$i]['sub_content'] = $data[sub_gong_content][$i];
                $data1[$i]['score']=$avg[$fu_id][0];
                $data1[$i]['rank']=$pm_array[0];
            } else {
                $data1[$i]['gong_name'] = '能';
                $data1[$i]['sub_content'] = $data[sub_neng_content][$i - $gong_num];
                $data1[$i]['score']=$avg[$fu_id][$i-$gong_num+1];
                $data1[$i]['rank']=$pm_array[$i-$gong_num+1];
            }
        }
        $this->view->setAppData($data1);
        $this->view->setAppStatus('1');
        $this->view->setAppMsg("获取分数成功！");
        $this->view->appdisplay("json");
    }

    /**他评结果做的最好查询  */
    public function show_tp_dogood()
    {
        $username = $this->getRequest()->get('userName');
        $size=$this->getRequest()->get(size);
        $user = new frontuser();
        $arr = $user->getUserIdByUsername($username);
        $id = $arr[fu_id];
        $ass = new assessment();
//var_dump($id);
        $good_content = $ass->gethpgoodcontent($id,$size);
        if($good_content){
                $this->view->setAppData($good_content);
                $this->view->setAppStatus('1');
                $this->view->setAppMsg("获取做的最好成功！");

        }else{
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("没有更多数据了！");
        }
        $this->view->appdisplay("json");

    }

    /**他评结果做的最差查询  */
    public function show_tp_dobad()
    {
        $username = $this->getRequest()->get('userName');
        $size=$this->getRequest()->get(size);
        $user = new frontuser();
        $arr = $user->getUserIdByUsername($username);
        $id = $arr[fu_id];
        $ass = new assessment();
        $bad_content = $ass->gethpbadcontent($id,$size);
        $num=count($bad_content);
        if($bad_content){
            $this->view->setAppData($bad_content);
            $this->view->setAppStatus('1');
            $this->view->setAppMsg("获取做的最差成功！");
        }else{
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("没有更多数据了！");
        }
        $this->view->appdisplay("json");
   }

    /** 筛选列表活动类型显示 */
    public function Show_activity_type()
    {
        $activity = new activity();
        $data = $activity->show_activity_type();
        if ($data) {
            $this->view->setAppData($data);
            $this->view->setAppStatus('1');
            $this->view->setAppMsg("获取活动类型成功！");
        } else {
            $this->view->setAppData($data);
            $this->view->setAppStatus('1');
            $this->view->setAppMsg("获取活动类型失败！");
        }
        $this->view->appdisplay("json");
    }


    /** 筛选列表主办方列表显示 */
    public function Show_organizers()
    {
        $activity = new activity();
        $data = $activity->show_organizers();
        if ($data) {
            $this->view->setAppData($data);
            $this->view->setAppStatus('1');
            $this->view->setAppMsg("获取主办方类型成功！");
        } else {
            $this->view->setAppData($data);
            $this->view->setAppStatus('1');
            $this->view->setAppMsg("获取主办方类型失败！");
        }
        $this->view->appdisplay("json");

    }

    /** 筛选活动信息  */
    public function  Queryactivity()
    {
        $activity = new activity();
        $time = $this->getRequest()->get('dataFiltrate');
        $type = $this->getRequest()->get('themeType');
        $departments = $this->getRequest()->get('departments');
        $ras = $this->getRequest()->get('recommendAndStatus');
        //$num = $this->getRequest()->get('num');
        //var_dump($num);
        $arr_type = explode(",", $type);
        $arr_departments = explode(",", $departments);
        $arr_ras = explode(",", $ras);
        /** 生成类型字符串 $i */
        for ($i = 0; $i < count($arr_type); $i++) {
            $arr_type[$i] = explode("/", $arr_type[$i]);
        }
        for ($i = 0; $i < count($arr_type); $i++) {
            if ($arr_type[$i][1] == "true") {
                $arr_type_str[] = "'" . $arr_type[$i][0] . "'";
            }
        }

        $type_str = implode(",", $arr_type_str);
        /** 判断用户是否选择了活动类型 */
        if ($type_str != null) {
            $type_str_query = "(" . $type_str . ")";

        } else {
            /** 获取所有类型 */
            $all_activity_type = $activity->getallactivitytype();
            for ($i = 0; $i < count($all_activity_type); $i++) {
                $arr_type_name_str[] = "'" . $all_activity_type[$i]['at_name'] . "'";
            }
            $type_name_str = implode(",", $arr_type_name_str);
            $type_str_query = "(" . $type_name_str . ")";
        }

        /** 生成主办方字符串 $i */
        for ($i = 0; $i < count($arr_departments); $i++) {
            $arr_departments[$i] = explode("/", $arr_departments[$i]);
        }
        for ($i = 0; $i < count($arr_departments); $i++) {
            if ($arr_departments[$i][1] == "true") {
                $arr_departments_str[] = $arr_departments[$i][0];
            }
        }
        //$departments_str=implode(",",$arr_departments_str);
        //$departments_str_query="(".$departments_str.")";
        /** 生成是否推荐是否进行字符串 */
        for ($i = 0; $i < count($arr_ras); $i++) {
            $arr_ras[$i] = explode("/", $arr_ras[$i]);
        }
        for ($i = 1; $i < count($arr_ras); $i++) {
            if ($arr_ras[$i][1] == "true") {
                $arr_ras_str[] = $arr_ras[$i][0];
            }
        }
        /** 判断活动是否是推荐的！！！ */
        if ($arr_ras[0][1] == "true") {
            $recommend = 1;
        } else {
            $recommend = 0;
        }
//         for($i=0;$i<count($arr_ras);$i++){
//             if($arr_ras[$i][1]=="true"){
//                 $arr_ras_str[]=$arr_ras[$i][0];
//             }
//         }
        $arr_activity = $activity->query_activity($type_str_query, $recommend);
        for($i=0;$i<count($arr_activity);$i++){
            $org_string="";
            $act_id=$arr_activity[$i][activityId];
            $org_arr=$activity->getAppOrganiser($act_id);

            for($j=0;$j<count($org_arr);$j++){
                $org_string.=$org_arr[$j][organizers_name].",";
                rtrim($org_string,',');
            }
            $arr_activity[$i][activitySponsor]=rtrim($org_string,',');
        }
        //var_dump($arr_activity);
        if ($arr_departments_str != null) {
            for ($i = 0; $i < count($arr_activity); $i++) {
                if (in_array($arr_activity[$i]['organizers_name'], $arr_departments_str)) {
                    $arr_activity_de[] = $arr_activity[$i];
                }
            }
        } else {
            $arr_activity_de = $arr_activity;
        }
        $time = str_replace("/", "-", $time);
        if ($time == null) {
            if (count($arr_ras_str) == 0 || count($arr_ras_str) == 3) {
                $arr_activity_ras = $arr_activity_de;

                if($arr_activity_ras){
                    $this->view->setAppData($arr_activity_ras);
                    $this->view->setAppStatus('1');
                    $this->view->setAppMsg("获取数据成功！");
                }else{
                    $this->view->setAppStatus('0');
                    $this->view->setAppMsg("没有符合条件的活动！");
                }
            } elseif (count($arr_ras_str) == 1) {
                if (in_array("已结束", $arr_ras_str)) {
                    for ($i = 0; $i < count($arr_activity_de); $i++) {
                        if (time() > strtotime($arr_activity_de[$i]["activity_end_time"])) {
                            $arr_activity_ras[] = $arr_activity_de[$i];
                        }
                    }
                    if($arr_activity_ras){
                        $this->view->setAppData($arr_activity_ras);
                        $this->view->setAppStatus('1');
                        $this->view->setAppMsg("获取数据成功！");
                    }else{
                        $this->view->setAppStatus('0');
                        $this->view->setAppMsg("没有符合条件的活动！");
                    }

                } elseif (in_array("未进行", $arr_ras_str)) {
                    for ($i = 0; $i < count($arr_activity_de); $i++) {
                        if (time() < strtotime($arr_activity_de[$i]["activity_start_time"])) {
                            $arr_activity_ras[] = $arr_activity_de[$i];
                        }
                    }
                    if($arr_activity_ras){
                        $this->view->setAppData($arr_activity_ras);
                        $this->view->setAppStatus('1');
                        $this->view->setAppMsg("获取数据成功！");
                    }else{
                        $this->view->setAppStatus('0');
                        $this->view->setAppMsg("没有符合条件的活动！");
                    }
                } else {
                    for ($i = 0; $i < count($arr_activity_de); $i++) {
                        if (strtotime($arr_activity_de[$i]["activity_start_time"]) < time() && time() < strtotime($arr_activity_de[$i]["activity_end_time"])) {
                            $arr_activity_ras[] = $arr_activity_de[$i];
                        }
                    }
                    if($arr_activity_ras){
                        $this->view->setAppData($arr_activity_ras);
                        $this->view->setAppStatus('1');
                        $this->view->setAppMsg("获取数据成功！");
                    }else{
                        $this->view->setAppStatus('0');
                        $this->view->setAppMsg("没有符合条件的活动！");
                    }
                }
            } elseif (count($arr_ras_str) == 2) {
                if (in_array("已结束", $arr_ras_str) && in_array("未进行", $arr_ras_str)) {
                    for ($i = 0; $i < count($arr_activity_de); $i++) {
                        if (strtotime($arr_activity_de[$i]["activity_start_time"]) < time() || time() > strtotime($arr_activity_de[$i]["activity_end_time"])) {
                            $arr_activity_ras[] = $arr_activity_de[$i];
                        }
                    }
                    if($arr_activity_ras){
                        $this->view->setAppData($arr_activity_ras);
                        $this->view->setAppStatus('1');
                        $this->view->setAppMsg("获取数据成功！");
                    }else{
                        $this->view->setAppStatus('0');
                        $this->view->setAppMsg("没有符合条件的活动！");
                    }
                } elseif (in_array("已结束", $arr_ras_str) && in_array("进行中", $arr_ras_str)) {
                    for ($i = 0; $i < count($arr_activity_de); $i++) {
                        if (strtotime($arr_activity_de[$i]["activity_start_time"]) < time() || (strtotime($arr_activity_de[$i]["activity_start_time"]) < time() && time() < strtotime($arr_activity_de[$i]["activity_end_time"]))) {
                            $arr_activity_ras[] = $arr_activity_de[$i];
                        }
                    }
                    if($arr_activity_ras){
                        $this->view->setAppData($arr_activity_ras);
                        $this->view->setAppStatus('1');
                        $this->view->setAppMsg("获取数据成功！");
                    }else{
                        $this->view->setAppStatus('0');
                        $this->view->setAppMsg("没有符合条件的活动！");
                    }
                } elseif (in_array("未进行", $arr_ras_str) && in_array("进行中", $arr_ras_str)) {
                    for ($i = 0; $i < count($arr_activity_de); $i++) {
                        if (time() > strtotime($arr_activity_de[$i]["activity_end_time"]) || (strtotime($arr_activity_de[$i]["activity_start_time"]) < time() && time() < strtotime($arr_activity_de[$i]["activity_end_time"]))) {
                            $arr_activity_ras[] = $arr_activity_de[$i];
                        }
                    }
                    if($arr_activity_ras){
                        $this->view->setAppData($arr_activity_ras);
                        $this->view->setAppStatus('1');
                        $this->view->setAppMsg("获取数据成功！");
                    }else{
                        $this->view->setAppStatus('0');
                        $this->view->setAppMsg("没有符合条件的活动！");
                    }
                }
            }
        } else {
            if (count($arr_ras_str) == 0 || count($arr_ras_str) == 3) {
                $arr_activity_ras = $arr_activity_de;

                if($arr_activity_ras){
                    $this->view->setAppData($arr_activity_ras);
                    $this->view->setAppStatus('1');
                    $this->view->setAppMsg("获取数据成功！");
                }else{
                    $this->view->setAppStatus('0');
                    $this->view->setAppMsg("没有符合条件的活动！");
                }
            } elseif (count($arr_ras_str) == 1) {
                if (in_array("已结束", $arr_ras_str)) {
                    for ($i = 0; $i < count($arr_activity_de); $i++) {
                        if (strtotime($time) > strtotime($arr_activity_de[$i]["activity_end_time"])) {
                            $arr_activity_ras[] = $arr_activity_de[$i];
                        }
                    }
                    if($arr_activity_ras){
                        $this->view->setAppData($arr_activity_ras);
                        $this->view->setAppStatus('1');
                        $this->view->setAppMsg("获取数据成功！");
                    }else{
                        $this->view->setAppStatus('0');
                        $this->view->setAppMsg("没有符合条件的活动！");
                    }
                } elseif (in_array("未进行", $arr_ras_str)) {
                    for ($i = 0; $i < count($arr_activity_de); $i++) {
                        if (strtotime($time) < strtotime($arr_activity_de[$i]["activity_start_time"])) {
                            $arr_activity_ras[] = $arr_activity_de[$i];
                        }
                    }
                    if($arr_activity_ras){
                        $this->view->setAppData($arr_activity_ras);
                        $this->view->setAppStatus('1');
                        $this->view->setAppMsg("获取数据成功！");
                    }else{
                        $this->view->setAppStatus('0');
                        $this->view->setAppMsg("没有符合条件的活动！");
                    }
                } else {
                    for ($i = 0; $i < count($arr_activity_de); $i++) {
                        if (strtotime($arr_activity_de[$i]["activity_start_time"]) < strtotime($time) && strtotime($time) < strtotime($arr_activity_de[$i]["activity_end_time"])) {
                            $arr_activity_ras[] = $arr_activity_de[$i];
                        }
                    }
                    if($arr_activity_ras){
                        $this->view->setAppData($arr_activity_ras);
                        $this->view->setAppStatus('1');
                        $this->view->setAppMsg("获取数据成功！");
                    }else{
                        $this->view->setAppStatus('0');
                        $this->view->setAppMsg("没有符合条件的活动！");
                    }
                }
            } elseif (count($arr_ras_str) == 2) {
                if (in_array("已结束", $arr_ras_str) && in_array("未进行", $arr_ras_str)) {
                    for ($i = 0; $i < count($arr_activity_de); $i++) {
                        if (strtotime($arr_activity_de[$i]["activity_start_time"]) < strtotime($time) || strtotime($time) > strtotime($arr_activity_de[$i]["activity_end_time"])) {
                            $arr_activity_ras[] = $arr_activity_de[$i];
                        }
                    }
                    if($arr_activity_ras){
                        $this->view->setAppData($arr_activity_ras);
                        $this->view->setAppStatus('1');
                        $this->view->setAppMsg("获取数据成功！");
                    }else{
                        $this->view->setAppStatus('0');
                        $this->view->setAppMsg("没有符合条件的活动！");
                    }
                } elseif (in_array("已结束", $arr_ras_str) && in_array("进行中", $arr_ras_str)) {
                    for ($i = 0; $i < count($arr_activity_de); $i++) {
                        if (strtotime($arr_activity_de[$i]["activity_start_time"]) < strtotime($time) || (strtotime($arr_activity_de[$i]["activity_start_time"]) < strtotime($time) && strtotime($time) < strtotime($arr_activity_de[$i]["activity_end_time"]))) {
                            $arr_activity_ras[] = $arr_activity_de[$i];
                        }
                    }
                    if($arr_activity_ras){
                        $this->view->setAppData($arr_activity_ras);
                        $this->view->setAppStatus('1');
                        $this->view->setAppMsg("获取数据成功！");
                    }else{
                        $this->view->setAppStatus('0');
                        $this->view->setAppMsg("没有符合条件的活动！");
                    }
                } elseif (in_array("未进行", $arr_ras_str) && in_array("进行中", $arr_ras_str)) {
                    for ($i = 0; $i < count($arr_activity_de); $i++) {
                        if (strtotime($time) > strtotime($arr_activity_de[$i]["activity_end_time"]) || (strtotime($arr_activity_de[$i]["activity_start_time"]) < strtotime($time) && strtotime($time) < strtotime($arr_activity_de[$i]["activity_end_time"]))) {
                            $arr_activity_ras[] = $arr_activity_de[$i];
                        }
                    }
                    if($arr_activity_ras){
                        $this->view->setAppData($arr_activity_ras);
                        $this->view->setAppStatus('1');
                        $this->view->setAppMsg("获取数据成功！");
                    }else{
                        $this->view->setAppStatus('0');
                        $this->view->setAppMsg("没有符合条件的活动！");
                    }
                }
            }
        }

        $this->view->appdisplay("json");
    }

    /** 设置用户是否静音 0代表震动/1代表静音 */
    public function If_sound(){
        $sound_state = $this->getRequest()->get('sound_state');
        $fu_id = $this->getRequest()->get('fu_id');
        $activity=new activity();
        if($activity->update_sound_state($sound_state,$fu_id)){
            $this->view->setAppStatus('2');
            $this->view->setAppMsg("修改成功！");
        }else{
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("修改失败！");
        }
        $this->view->appdisplay("json");
    }


}