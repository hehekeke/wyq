<?php

class ActivityController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->web_host = $this->getRequest()->hostUrl;
        $this->view->web_app_url = $this->getRequest()->hostUrl . "/index.php";
    }

    public function getActivityList()
    {
        $actType = $this->getRequest()->get('activityType');
        $pageType = $this->getRequest()->get('pageType');
        $timeStamp = $this->view->getRequest()->get("timeStamp");
        if (count($timeStamp) == 0) {
            $timeStamp = 0;
        }
        $pageSize = $this->getRequest()->get("pageSize") ? (strtolower($this->getRequest()->get("pageSize")) == "null" ? 20 : $this->getRequest()->get("pageSize")) : 20;
        $m = new activity();
        if ($actType == "0") {
            $data = $m->getActivityListPageModel();
        } else if ($actType == "1") {
            $userinfo = $this->getData('userinfo');
            $data = $m->getMyconcernedActivity($userinfo ['fu_id']);
        }
        if (!$data['list']) {
            $this->echoNoListData();
        } else {
            for ($i = 0; $i < count($data['list']); $i++) {
                $data['list'] [$i] ['id'] = $data['list'] [$i] ['activity_id'];
                $data['list'] [$i] ['title'] = $data['list'] [$i] ['activity_title'];
                $data['list'] [$i] ['piclink'] = "";
                $data['list'] [$i] ['isrecom'] = $data['list'] [$i] ['activity_recommend'];
                $data['list'] [$i] ['time'] = $data['list'] [$i] ['activity_time'];
                $data['list'] [$i] ['addr'] = "主楼227";
                $data['list'] [$i] ['sponsor'] = "计控学院";
                $data['list'] [$i] ['url'] = "http://www.baidu.com";
            }
            $this->echoSuccessListData($data['list']);
        }
    }

    public function getActTypeList()
    {
        $m = new activity();
        $data = $m->getActivityTypeList();
        if (!$data) {
            $this->echoNoListData();
        } else {
            for ($i = 0; $i < count($data); $i++) {
                $data [$i] ['id'] = $data [$i] ['at_id'];
                $data [$i] ['title'] = $data [$i] ['at_name'];
            }
            $this->echoSuccessListData($data);
        }
    }

    public function getSponsorList()
    {
        $m = new organizers();
        $data = $m->getOrganizersList();
        if (!$data) {
            $this->echoNoListData();
        } else {
            for ($i = 0; $i < count($data); $i++) {
                $data [$i] ['id'] = $data [$i] ['organizers_id'];
                $data [$i] ['title'] = $data [$i] ['organizers_name'];
            }
            $this->echoSuccessListData($data);
        }
    }

    public function signin()
    {
        $id = $this->getRequest()->get('id');
        $userid = $this->getRequest()->get('userid');
        $lng = $this->getRequest()->get('lng');
        $lat = $this->getRequest()->get('lat');
        $picids = $lng = $this->getRequest()->get('picids');
// 		$m = new activity();
// 		$m->addActivityRegistration($userid, $lng, $lat);
        $this->echoSuccessData();
    }

    public function getScoreTypeList()
    {
        $this->echoSuccessListData();
    }

    public function score()
    {
        $this->echoSuccessData();
    }

    public function getDetail()
    {
        $id = $this->getRequest()->get('id');
        if (!$id) {
            $this->echoParamsMissing();
            return;
        }
        $data['scoreCount'] = '10';
        $data['commentCount'] = '20';
        $data['zanCount'] = '30';
        $data['caiCount'] = '40';
        $data['favCount'] = '50';
        $this->echoSuccessData($data);
    }

    /** 获取主页图片信息 */
    public function indexImages()
    {
        $activity = new activity();
        $images = $activity->getLocationimages();
        $url = $this->view->web_host;
        for ($i = 0; $i < count($images); $i++) {
            $images[$i]['activityPicture'] = $url . $images[$i]['activityPicture'];
        }
        if ($images) {
            $this->view->setAppStatus("1");
            $this->view->setAppMsg('请求图片成功');
            $this->view->setAppData($images);
        } else {
            $defaultimages = $activity->getDefaultimages();
            $this->view->setAppStatus("0");
            $this->view->setAppMsg('目前没有活动图片');
            $this->view->setAppData($defaultimages);
        }
        $this->view->appdisplay("json");
        return;
    }

    /** 周活动 */
    public function Week_activity()
    {
        $size = $this->getRequest()->get('size');
        $activity = new activity();
        $week_activity = $activity->getAppWeekActivity($size);
        /** @var 获取活动主办方 $org_arr */
        if($week_activity){
            for($i=0;$i<count($week_activity);$i++){
                $org_string="";
                $act_id=$week_activity[$i][activityId];
                $org_arr=$activity->getAppOrganiser($act_id);
                if($org_arr){
                    for($j=0;$j<count($org_arr);$j++){
                        $org_string.=$org_arr[$j][organizers_name].",";
                        rtrim($org_string,',');
                    }
                    $week_activity[$i][activitySponsor]=rtrim($org_string,',');
                }
            }
        }
        //$num=count($week_activity);
        if ($week_activity) {

                $this->view->setAppStatus("1");
                $this->view->setAppMsg('请求成功！');
                $this->view->setAppData($week_activity);


        } else {
            $this->view->setAppStatus("0");
            $this->view->setAppMsg('没有更多活动了！');
        }
        $this->view->appdisplay("json");
    }

    /** 活动详情 */
    public function Show_activity_msg()
    {
        $url = $this->view->web_host;
        $at_id = $this->getRequest()->get('activityId');
        $username = $this->getRequest()->get('userName');
        //var_dump($username);
        $user = new frontuser();
        $arr = $user->getUserIdByUsername($username);
        //var_dump($arr);
        $id = $arr[fu_id];
        $activity = new activity();
        $message = $activity->getActivityMsg($at_id);
        $message["activity_content"]=strip_tags($message["activity_content"]);
        $message["activity_content"]=str_replace("&nbsp;","",$message["activity_content"]);
        $pic_arr=$activity->getActivityPic($at_id);
        //var_dump($pic_arr);
        $message[pic_link] = $url.$pic_arr[pic_link];
        //var_dump($message[pic_link]);
        $organizer=$activity->getOrganizer($at_id);
        $undertake=$activity->getUndertake($at_id);
        $ac_type_arr=$activity->getActivitytype($at_id);
        $message[activity_type]=$ac_type_arr[at_name];
        $score_num=$activity->getactivityscorenum($at_id);
        if($score_num){
            $number=count($score_num);
        }else{
            $number=0;
        }
        $s_goal=$activity->getsecondgoal($at_id);
        $num=floor($number/count($s_goal));
        $activity->update_see_num($at_id);
        for($i=0;$i<count($organizer);$i++){
            $arr_or[]=$organizer[$i][organizers_name];
        }
        $string_org=implode(',',$arr_or);
        for($i=0;$i<count($undertake);$i++){
            $arr_un[]=$undertake[$i][undertake_name];
        }
        $string_un=implode(',',$arr_un);
        $message[activity_organizer]=$string_org;
        $message[activity_undertake]=$string_un;
        $message[score_num]=$num;
        /** @var 判断是不是已经签到 已经评论 $activity */
        if($activity->if_regist($at_id,$id)){
            $message[registration]=1;
        }else{
            $message[registration]=0;
        }
        if($activity->if_have_score($at_id,$id)){
            $message[argument]=1;
        }else{
            $message[argument]=0;
        }
        if ($message) {
            $this->view->setAppStatus("1");
            $this->view->setAppMsg('请求成功！');
            $this->view->setAppData($message);
        } else {
            $this->view->setAppStatus("0");
            $this->view->setAppMsg('没有找到该活动！');
        }
        $this->view->appdisplay("json");
    }

    /** 查询签到人的信息! */
    public function Show_activity_registration_person()
    {
        $username = $this->getRequest()->get('userName');
        $user = new frontuser();
        $arr = $user->getUserIdByUsername($username);
        if ($arr) {
            $fu_realname = $arr[fu_realname];
            $id = $arr[fu_id];

            $time = date('Y-m-d H:i:s', time());
            $data[fu_id] = $id;
            $data[fu_realname] = $fu_realname;
            $data[time] = $time;
            $this->view->setAppStatus("1");
            $this->view->setAppMsg('获取用户信息成功！');
            $this->view->setAppData($data);
        } else {
            $this->view->setAppStatus("0");
            $this->view->setAppMsg('获取用户信息失败！');
        }
        $this->view->appdisplay("json");
    }
    /** 周活动签到 */
    public function Activity_registration()
    {
        $fu_id = $this->getRequest()->get('fu_id');
        $activity_id = $this->getRequest()->get('activity_id');
        $targetPath = "common/upload/images/upload/";
        $adder = 'img';
        $activity = new activity();
        $count = count($_FILES["pictureArray"]["name"]);
        $arr_attitude=$activity->getActivityUserIfWant($fu_id,$activity_id);
        /** 判断此活动是否过期 */
        $now_time=date("Y-m-d H:i:s",time());
        $if_out=$activity->getifouttime($activity_id,$now_time);
        if($if_out){
            if($arr_attitude[if_want]==1){
                /** 判断是否之前签到 */
                if($activity->getifregistration($fu_id, $activity_id)){
                    $this->view->setAppStatus("0");
                    $this->view->setAppMsg("您已签过到！");
                }else{
                    if($count!=0){
                        $reg_num = $activity->activity_registration($fu_id, $activity_id);
                        for ($i = 0; $i <$count; $i++) {
                            //获取当前图片的信息
                            $fileParts = $_FILES["pictureArray"]["tmp_name"][$i];
                            $newfilename = $adder . time() . ".png" ;
                            if (move_uploaded_file($fileParts, $targetPath . $newfilename)) {
                                $filePath = '/'. $targetPath . $newfilename;
                                $pic = new picture();
                                $pic_num = $pic->addPic('png', $filePath);
                                $pic->add_activity_registration_picture($reg_num, $pic_num);
                            }
                        }
                        $this->view->setAppStatus("2");
                        $this->view->setAppMsg("签到成功！");

                    }else{
                        $reg_num = $activity->activity_registration($fu_id, $activity_id);
                        $this->view->setAppStatus("2");
                        $this->view->setAppMsg("签到成功！");
                    }
                }
            }else{
                $this->view->setAppStatus("0");
                $this->view->setAppMsg("您未关注此活动！不能签到！");
            }
        }else{
            $this->view->setAppStatus("0");
            $this->view->setAppMsg("此活动已过期，不能签到！");
        }

        $this->view->appdisplay("json");
    }

    /**周活动评论显示Week_activity_comment*/
    public function Week_activity_comment(){
        $activity_id = $this->getRequest()->get('activity_id');
        $activity = new activity();
        $arr = $activity->getActivityComment($activity_id);

        if ($arr) {
            for($i=0;$i<count($arr);$i++){
                if($arr[$i][parent_id]!=0){
                    $comment_num=$arr[$i][parent_id];
                    $parents_msg=$activity->show_comment_parent_name($comment_num);
                    $arr[$i][parent_name]=$parents_msg[fu_realname];
                    $arr[$i][par_username]=$parents_msg[fu_username];
                }else{
                    $arr[$i][parent_name]=null;
                }
            }
            $this->view->setAppData($arr);
            $this->view->setAppStatus("1");
            $this->view->setAppMsg("周活动评论显示成功！");
        } else {
            $this->view->setAppStatus("0");
            $this->view->setAppMsg("暂无评论！");
        }
        $this->view->appdisplay("json");
    }

//    /** 周活动评论提交 */
//    public function Week_comment_submit()
//    {
//
//
//
//        $username = $this->getRequest()->get('userName');
//
//        $activity_id = $this->getRequest()->get('activity_id');
//        $comment_content = $this->getRequest()->get('comment_content');
//        $comment_create_time = $this->getRequest()->get('comment_create_time');
//        $comment_parentId = $this->getRequest()->get('comment_parentId');
//
//        $activity = new activity();
//        $user = new frontuser();
//        $arr = $user->getUserIdByUsername($username);
//        $id = $arr[fu_id];
//
//        $comment = $activity->week_comment_submit($id, $activity_id, $comment_content, $comment_create_time, $comment_parentId);
//
//        if ($comment) {
//
//
//
//            $this->view->setAppStatus("1");
//            $this->view->setAppMsg("评论成功！");
//        } else {
//            $this->view->setAppStatus("0");
//            $this->view->setAppMsg("评论失败！");
//        }
//
//        $this->view->appdisplay("json");
//
//    }

    /** 周活动-点击有用 */
    public function comment_useful()
    {
        $comment_id = $this->getRequest()->get('comment_id');
        $activity = new activity();

        if ($activity->week_click_useful($comment_id)) {
            $this->view->setAppStatus("1");
            $this->view->setAppMsg("成功！");
        } else {

            $this->view->setAppStatus("0");
            $this->view->setAppMsg("失败！");
        }
        $this->view->appdisplay("json");
    }

    /** 我关注的活动 */
    public function my_week_comment()
    {
        $username = $this->getRequest()->get('userName');
        $size = $this->getRequest()->get('size');
        $user = new frontuser();
        $arr = $user->getUserIdByUsername($username);
        if ($arr) {
            $id = $arr[fu_id];
            $activity = new activity();
            $mycommentmsg = $activity->getMyWeekComment($id,$size);
            for($i=0;$i<count($mycommentmsg);$i++){
                $org_string="";
                $act_id=$mycommentmsg[$i][activityId];
                $org_arr=$activity->getAppOrganiser($act_id);
                if($org_arr){
                    for($j=0;$j<count($org_arr);$j++){
                        $org_string.=$org_arr[$j][organizers_name].",";
                        rtrim($org_string,',');
                    }
                    $mycommentmsg[$i][activitySponsor]=rtrim($org_string,',');
                }

            }
            $num=count($mycommentmsg);
            if ($mycommentmsg) {

                    $this->view->setAppData($mycommentmsg);
                    $this->view->setAppStatus("1");
                    $this->view->setAppMsg("请求成功！");

            } else {
                $this->view->setAppStatus("0");
                $this->view->setAppMsg("没有更多活动了！");
            }

        } else {
            $this->view->setAppStatus("0");
            $this->view->setAppMsg("无此用户！");
        }
        $this->view->appdisplay("json");

    }

    /** 添加想参加的活动 */
    public function Add_wanting_activity()
    {
        $username = $this->getRequest()->get('userName');
        $activity_id = $this->getRequest()->get('activity_id');
        $user = new frontuser();
        $activity = new activity();
        $arr = $user->getUserIdByUsername($username);
        if ($arr) {
            $id = $arr[fu_id];
            if ($activity->add_wanting_activity($id, $activity_id)) {
                $this->view->setAppStatus("1");
                $this->view->setAppMsg("请求成功，已添加到我的活动！");
            } else {
                $this->view->setAppStatus("0");
                $this->view->setAppMsg("请求失败！");
            }

        } else {
            $this->view->setAppStatus("0");
            $this->view->setAppMsg("无此用户！");
        }
        $this->view->appdisplay("json");
    }

    /**  周活动-评分 */
    public function Week_activity_score()
    {
        $username = $this->getRequest()->get('userName');
        $user = new frontuser();
        $arr = $user->getUserIdByUsername($username);
        $id = $arr[fu_id];
        $arr_score = $this->getRequest()->get('activityThemeScore');
        $activity_id = $this->getRequest()->get('activityId');
        $arr_id = $this->getRequest()->get('activityThemeId');
        $activity = new activity();
        /** @var  判断是否已经评分过 */
        $if_have_score=$activity->if_have_score($activity_id,$id);
        //var_dump($if_have_score);
        if($if_have_score){
            $this->view->setAppStatus("0");
            $this->view->setAppMsg("不要重复评分！");

        }else{
            $score_num = substr_count($arr_score, ',');
            $id_num = substr_count($arr_id, ',');
            $num = $score_num;
            /** 获取分数内容 */
            for ($i = 0; $i < $score_num; $i++) {
                $pos = strpos($arr_score, ',');
                $sub_score = substr($arr_score, 0, $pos);
                $arr_score = substr($arr_score, $pos + 1);
                $data[sub_score][] = $sub_score;
            }
            $data[sub_score][] = $arr_score;
            /** 获取类型ID */
            for ($i = 0; $i < $id_num; $i++) {
                $pos = strpos($arr_id, ',');
                $sub_id = substr($arr_id, 0, $pos);
                $arr_id = substr($arr_id, $pos + 1);
                $data[sub_id][] = $sub_id;
                $sg_name = $activity->getSgName($sub_id);
                $data[sg_name][] = $sg_name[sg_name];
            }
            $data[sub_id][] = $arr_id;
            $sg_name = $activity->getSgName($arr_id);
            $data[sg_name][] = $sg_name[sg_name];
            $if_score = $activity->score_week_activity($activity_id, $data[sub_id], $data[sub_score], $num, $id, $data[sg_name]);
            if ($if_score) {
                $this->view->setAppStatus("2");
                $this->view->setAppMsg("评分成功！");
            } else {
                $this->view->setAppStatus("0");
                $this->view->setAppMsg("评分失败！");
            }
        }

        $this->view->appdisplay("json");
    }

    /** 周活动评分显示 */
    public function Show_week_activity_score()
    {
        $activity = new activity();
        $activity_id = $this->getRequest()->get('activityId');
        $arr = $activity->show_week_activity_score($activity_id);
        //var_dump($arr);
        if ($arr) {
            $this->view->setAppData($arr);
            $this->view->setAppStatus("1");
            $this->view->setAppMsg("请求成功！");

        } else {

            $this->view->setAppStatus("0");
            $this->view->setAppMsg("该活动没有评分！");
        }
        $this->view->appdisplay("json");
    }
    /** 仍鲜花、鸡蛋、想要参加 */
    public function addfloweroregg(){
        $activity_id=$this->getRequest()->get('activityId');
        $username=$this->getRequest()->get('userName');
        $praiseOrEgg=$this->getRequest()->get('praiseOrEgg');
        $time=$this->getRequest()->get('time');

        $user = new frontuser();
        $activity=new activity();
        $arr = $user->getUserIdByUsername($username);
        $id = $arr[fu_id];
        $if_activity_user=$activity->find_activity_user($activity_id,$id);

        if($if_activity_user){

            if($praiseOrEgg=="praise"){
                if($if_activity_user[if_flower]==null){
                    if($if_activity_user[if_egg]==null){
                        $praise=$activity->update_activity_user_praise($activity_id,$id,$praiseOrEgg,$time);
                        if($praise){
                            $activity->addpraiseoregg($praiseOrEgg,$activity_id,$time);
                            $this->view->setAppStatus("2");
                            $this->view->setAppMsg("送鲜花成功！");
                        }else{
                            $this->view->setAppStatus("0");
                            $this->view->setAppMsg("送鲜花失败！");
                        }
                    }else{
                        $this->view->setAppStatus("0");
                        $this->view->setAppMsg("不能同时扔鲜花和鸡蛋！");
                    }

                }else{

                    $this->view->setAppStatus("0");
                    $this->view->setAppMsg("已点过赞！");
                }


            }elseif($praiseOrEgg=="egg"){
                if($if_activity_user[if_egg]==null){
                    if($if_activity_user[if_flower]==null){
                        $egg=$activity->update_activity_user_praise($activity_id,$id,$praiseOrEgg,$time);
                        if($egg){
                            $activity->addpraiseoregg($praiseOrEgg,$activity_id,$time);
                            $this->view->setAppStatus("2");
                            $this->view->setAppMsg("送鸡蛋成功！");
                        }else{
                            $this->view->setAppStatus("0");
                            $this->view->setAppMsg("送鸡蛋失败！");
                        }
                    }else{
                        $this->view->setAppStatus("0");
                        $this->view->setAppMsg("不能同时扔鲜花和鸡蛋！");
                    }

                }else{
                    $this->view->setAppStatus("0");
                    $this->view->setAppMsg("已送过鸡蛋！");
                }
            }elseif($time){
                if($if_activity_user[if_want]==null){
                    $want=$activity->update_activity_user_praise($activity_id,$id,$praiseOrEgg,$time);
                    if($want){
                        $activity->addpraiseoregg($praiseOrEgg,$activity_id,$time);
                        //$activity->add_want($activity_id);
                        $this->view->setAppStatus("1");
                        $this->view->setAppMsg("想参加添加成功！");
                    }else{
                        $this->view->setAppStatus("0");
                        $this->view->setAppMsg("想参加添加失败！");
                    }
                }else{
                    $activity->update_activity_user_praise($activity_id,$id,$praiseOrEgg,$time);
                    $data['type']=2;
                    $this->view->setAppData($data);
                    $this->view->setAppStatus("1");
                    $this->view->setAppMsg("想参加时间修改成功！");

                }

            }
        }else{
            if($praiseOrEgg=="praise"){
                $praise=$activity->add_activity_user_praise($activity_id,$id,$praiseOrEgg,$time);

                $arr_attitude=$activity->show_activity_user_attitude($activity_id);

                if($praise){
                    if($arr_attitude){
                        $activity->addpraiseoregg($praiseOrEgg,$activity_id,$time);
                    }else{
                        $activity->add_activity_user_attitude($activity_id,$praiseOrEgg,$time);
                    }
                    $this->view->setAppStatus("2");
                    $this->view->setAppMsg("送鲜花成功！");
                }else{
                    $this->view->setAppStatus("0");
                    $this->view->setAppMsg("送鲜花失败！");
                }
            }elseif($praiseOrEgg=="egg"){
                $egg=$activity->add_activity_user_praise($activity_id,$id,$praiseOrEgg,$time);
                $arr_attitude=$activity->show_activity_user_attitude($activity_id);
                if($egg){
                    if($arr_attitude){
                        $activity->addpraiseoregg($praiseOrEgg,$activity_id,$time);
                    }else{
                        $activity->add_activity_user_attitude($activity_id,$praiseOrEgg,$time);
                    }

                    $this->view->setAppStatus("2");
                    $this->view->setAppMsg("送鸡蛋成功！");
                }else{
                    $this->view->setAppStatus("0");
                    $this->view->setAppMsg("送鸡蛋失败！");
                }
            }elseif($time){
                $want=$activity->add_activity_user_praise($activity_id,$id,$praiseOrEgg,$time);
                $arr_attitude=$activity->show_activity_user_attitude($activity_id);
                if($want){
                    if($arr_attitude){
                        $activity->addpraiseoregg($praiseOrEgg,$activity_id,$time);
                    }else{
                        $activity->add_activity_user_attitude($activity_id,$praiseOrEgg,$time);
                    }
                    $data['type']=1;
                    $this->view->setAppData($data);
                    $this->view->setAppStatus("1");
                    $this->view->setAppMsg("想参加添加成功！");
                }else{
                    $this->view->setAppStatus("0");
                    $this->view->setAppMsg("想参加添加失败！");
                }
            }

        }
        $this->view->appdisplay("json");
    }
    /** 提交评论信息 */
    public function Addcomment(){
        $username=$this->getRequest()->get('userName');
        $comment_content=$this->getRequest()->get('comment_content');
        $activity_id=$this->getRequest()->get('activity_id');
        $parent_id=$this->getRequest()->get('parent_id');
        $par_nickname=$this->getRequest()->get('par_nickname');
        $par_username=$this->getRequest()->get('par_username');
        //var_dump($par_username);
        $user = new frontuser();
        $activity=new activity();
        $arr = $user->getUserIdByUsername($username);
        $id = $arr[fu_id];
        $par_arr = $user->getUserIdByUsername($par_username);
        $par_id = $par_arr[fu_id];

        $comment_user_nickname=$arr[fu_nickname];
        $num=$activity->addcommentinfo($id,$comment_content,$activity_id,$parent_id,$par_id);

        if($num){
            $len=strlen($comment_content);
            if($len>39){
                $comment_content=substr($comment_content,0,33).'......';
                $flag='0';
            }else{
                $flag='1';
            }
                /** @var
             * 测试推送内容！
             * $username */
            if($parent_id!=0){
                //echo "234";

                $s=$par_arr[if_sound];
                $platform = 'android,ios'; // 接受此信息的系统
                $msg_content = json_encode(array('n_builder_id'=>0,'n_title'=>'标题', 'n_content'=>$comment_content,'n_extras'=>array('type'=>1,'content'=>$comment_content,'flag'=>$flag,'comment_id'=>$num,'comment_user_nickname'=>$comment_user_nickname, 'par_nickname'=>$par_nickname,'type'=>'1','time'=>date('Y-m-d H:i:s',time()))));
                $j=new jpush();
                $j->send(18,3,$par_id,1,$msg_content,$platform,$s);
//                $j->send(18,4,"",1,$msg_content,$platform,$s);

            }
            $this->view->setAppStatus("2");
            $this->view->setAppMsg("添加评论成功！");
        }else{
            $this->view->setAppStatus("0");
            $this->view->setAppMsg("添加评论失败！");
        }
        $this->view->appdisplay("json");
    }
    /** 用户评论消息显示列表 mes_type 0-活动提醒；1-活动评论回复；2-学校消息*/
    public function Meslists(){
        $fu_id=$this->getRequest()->get('fu_id');
        $mes_type=$this->getRequest()->get('mes_type');
        $num=$this->getRequest()->get('num');
        $activity=new activity();
        $mes_arr=$activity->getAppMesLists($fu_id,$mes_type,$num);
        //var_dump($mes_arr);
        if($mes_arr){
            for($i=0;$i<count($mes_arr);$i++){
                $data[$i][mes_id]=$mes_arr[$i][mes_id];
                $data[$i][mes_content]=$mes_arr[$i][mes_content];
                $data[$i][mes_time]=$mes_arr[$i][mes_create_time];
            }
            $this->view->setAppData($data);
            $this->view->setAppStatus("1");
            $this->view->setAppMsg("获取消息成功！");
        }else{
            $this->view->setAppStatus("0");
            $this->view->setAppMsg("暂无最新消息！");
        }
        $this->view->appdisplay("json");
    }
    /** 用户消息长按删除 */
    public function Delmes(){
        $mes_id=$this->getRequest()->get('mes_id');
        $activity=new activity();
        if($activity->delAppMes($mes_id)){
            $this->view->setAppStatus("2");
            $this->view->setAppMsg("删除消息成功！");
        }else{
            $this->view->setAppStatus("0");
            $this->view->setAppMsg("删除消息失败！");
        }
        $this->view->appdisplay("json");
    }
    /** 提交评论有用数目  */
    public function Addcommentuseful(){
        $useful=$this->getRequest()->get('comment_useful');
        $comment_id=$this->getRequest()->get('comment_id');
        /** @var 第一个评论人的fu_id  $username */
        $username=$this->getRequest()->get('userName');
        $activity_id=$this->getRequest()->get('activity_id');
        $user = new frontuser();
        $arr = $user->getUserIdByUsername($username);
        $fu_id = $arr[fu_id];
        $activity=new activity();
        $arr=$activity->show_comment_one($comment_id);
        if($useful=="useful"){
            $content="您的评论被其他人评为有用";
            $num=$activity->update_useful_num($comment_id,$arr[comment_useful_num],$fu_id,$activity_id, $content);
            //var_dump($num);

            if($num){
                    $this->view->setAppStatus("2");
                    $this->view->setAppMsg("添加有用数成功！");
             }else{
                    $this->view->setAppStatus("0");
                    $this->view->setAppMsg("添加有用数失败！");
             }
            $platform = 'android,ios'; // 接受此信息的系统
            $msg_content = json_encode(array('n_builder_id'=>0,'n_title'=>'标题', 'n_content'=>$content,'n_extras'=>array('type'=>1)));
            $j=new jpush();
            $j->send(18,3,$fu_id,1,$msg_content,$platform);
            //$j->send(18,4,"",1,$msg_content,$platform);

        }
        $this->view->appdisplay("json");
    }
    /** 活动提醒（通过活动ID获取活动内容） */
    public function GetActivityInfoById(){
        $activity=new activity();
        $activity_id=$this->getRequest()->get('activity_id');
        $activity_info=$activity->getActivityInfoById($activity_id);

        if($activity_info){
            $this->view->setAppData($activity_info);
            $this->view->setAppStatus('1');
            $this->view->setAppMsg("获取活动内容成功！");
        }else{
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("获取活动内容成功！");
        }
        $this->view->appdisplay("json");
    }
    /** 活动提醒（通过评论ID获取评论内容 */
    public function GetCommentInfoById(){
        $activity=new activity();
        $comment_id=$this->getRequest()->get('comment_id');
        $comment_info=$activity->getCommentInfoById($comment_id);

        if($comment_info){
            $this->view->setAppData($comment_info);
            $this->view->setAppStatus('1');
            $this->view->setAppMsg("获取活动内容成功！");
        }else{
            $this->view->setAppStatus('0');
            $this->view->setAppMsg("获取活动内容成功！");
        }
        $this->view->appdisplay("json");
    }


}