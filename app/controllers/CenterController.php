<?php

class CenterController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->web_url=$this->getRequest()->hostUrl;
    }

    public function mycenter(){
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
        $model = new frontuser();
        $student = $model->getUserByUserID($id);//在这方法做了修改
        $this->view->student = $student;

        $picture = new picture();
        $headPicture = $picture->getPicById($student["pic_id"]);
        if($headPicture==false){
            $this->view->headPicture = "common/app/images/headPicture.jpg";
        }else{
            $this->view->headPicture = $headPicture["pic_link"];
        }
        $this->getView()->display("center.html");
    }



    public function followActivity(){
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

        $model = new frontuser();
        $student = $model->getUserByUserID($id);//在这方法做了修改
        $this->view->student = $student;

        $activity = new activity();
        //获取主办方
        $organizers = $activity->getWeekActivityOrg();
        $this->view->organizers = $organizers;
        // var_dump($organizers);
        //取得活动类型
        $activityTypeList = $activity->getActivityTypeList();
        $this->view->activityTypeList = $activityTypeList;
        //var_dump($activityTypeList);
        //取得关注的活动
        $followActivity = $activity->getFollowActivity($id);

        //合并多主办方算法
        $arr1 = $followActivity;
        for($i=0;$i<count($arr1);$i++){
            for($j=0;$j<count($arr1);$j++){
                if($i != $j){
                    if($followActivity[$i]["au_id"]==$followActivity[$j]["au_id"]){
                        if($i>$j){
                           unset($followActivity[$i]);
                        }else{
                            $followActivity[$i]["organizers_name"] = $followActivity[$i]["organizers_name"].",".$followActivity[$j]["organizers_name"];
                        }
                    }
                }
            }
        }

        $this->view->followActivity = array_values($followActivity);

        $this->getView()->display("followActivity1.html");
    }

    public function selectActivity(){
        $info = $this->getData ( 'userinfo' );
        $id = $info['fu_id'];
        $typesValues = $_POST["typesValues"];
        $organizersValues = $_POST["organizersValues"];
        $statusValues = $_POST["statusValues"];
        $time = $_POST["time"];

        if(count($typesValues)!=0 && count($organizersValues)!=0){
            $typesValues = strtr(json_encode($typesValues),"[]","()");
            $organizersValues = strtr(json_encode($organizersValues),"[]","()");
            $activity = new activity();
            $activitySelectList = $activity->getSelectActivity($id,$typesValues,$organizersValues);
        }else if(count($typesValues)!=0 && count($organizersValues)==0){
            $typesValues = strtr(json_encode($typesValues),"[]","()");
            $activity = new activity();
            $activitySelectList = $activity->getSelectActivity2($id,$typesValues);
        }else if(count($typesValues)==0 && count($organizersValues)!=0){
            $organizersValues = strtr(json_encode($organizersValues),"[]","()");
            $activity = new activity();
            $activitySelectList = $activity->getSelectActivity3($id,$organizersValues);
        }else{
            $activity = new activity();
            $activitySelectList = $activity->getFollowActivity($id);
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
                    if($arr[$i]["au_id"]==$arr[$j]["au_id"]){
                        if($i>$j){
                            unset($arr[$i]);
                        }else{
                            $arr[$i]["organizers_name"] = $arr[$i]["organizers_name"].",".$arr[$j]["organizers_name"];
                        }
                    }
                }
            }
        }

        $arr = array_values($arr);

        //过滤日期
        $arrSelectAll = array();
        if($time!=null){
            for($i=0;$i<count($arr);$i++){
                if(date("Y-m-d",strtotime($arr[$i]["activity_start_time"]))==$time){
                    $arrSelectAll[] = $arr[$i];
                }
            }
        }else{
             $arrSelectAll = $arr;
        }

        if($arrSelectAll==false){
            $countNum = 0;
        }else{
            $countNum = count($arrSelectAll);
        }
        $path = $this->getRequest()->hostUrl;
        //$path=$path.'/common/app/images/2.jpg';
        for($i=0;$i<$countNum;$i++){
            echo "
           <div class='col-md-3'>";
            if($arrSelectAll[$i]["activity_if_import"]==0){
                if(time()<=strtotime($arrSelectAll[$i]["activity_start_time"])){
                    echo "<div class='site-activity-table active' style='height:230px;width: 200px;background-color:#99cc99'>";
                }else if( strtotime($arrSelectAll[$i]["activity_start_time"])<=time() && time()<=strtotime($arrSelectAll[$i]["activity_end_time"]) ){
                    echo "<div class='site-activity-table active' style='height:230px;width: 200px;background-color:#FFCCFF'>";
                }else{
                    echo "<div class='site-activity-table active' style='height:230px;width: 200px;background-color:#CCCCCC'>";
                }

            }else{
                if(time()<=strtotime($arrSelectAll[$i]["activity_start_time"])){
                    echo "<div class='site-activity-table recommend' style='height:230px;width: 200px;background-color:#99cc99'>";
                }else if( (strtotime($arrSelectAll[$i]["activity_start_time"])<=time()) && (strtotime($arrSelectAll[$i]["activity_end_time"])>=time()) ){
                    echo "<div class='site-activity-table recommend' style='height:230px;width: 200px;background-color:#FFCCFF'>";
                }else {
                    echo "<div class='site-activity-table recommend' style='height:230px;width: 200px;background-color:#CCCCCC'>";
                }
            }
            echo"
            <a style='color:white' href='".$this->getRequest()->hostUrl."/index.php/Assist/getWeekActivityContent/activity_class/".$arrSelectAll[$i]["activity_class"]."/activityId/".$arrSelectAll[$i]["activity_id"]."'>
                    <div class='title' style='margin: 0px 0px'>".$arrSelectAll[$i]['activity_title']."</div>
                    <div class='description'>
                        <p>时间：".$arrSelectAll[$i]["activity_start_time"]."</p>
                        <p>地点：".$arrSelectAll[$i]["activity_address"]."</p>
                        <p>类型：".$arrSelectAll[$i]["at_name"]."</p>
                        <p>主办方：".$arrSelectAll[$i]["organizers_name"]."</p>
                    </div>
            </a>";
                if($arrSelectAll[$i]["if_clock"]==1){
                    echo "<div class='notification'>";
                        if($arrSelectAll[$i]["activity_registration_id"]){
                            echo "<button class='btn btn-primary btn-xs' onclick='overSign()')'>已签到</button>";
                        }else{
                            if((strtotime($arrSelectAll[$i]["activity_start_time"])<=time()) && (strtotime($arrSelectAll[$i]["activity_end_time"])>=time())){
                                echo" <button class='btn btn-primary btn-xs' data-toggle='modal' data-target='#myModal' data-activity_id=".$arrSelectAll[$i]['activity_id']." data-activity_title='".$arrSelectAll[$i]['activity_title']."' onclick='subTitle1(this)'>签到</button>";
                            }else{
                                echo "<button class='btn btn-primary btn-xs' onclick='overTime()'>签到</button>";
                            }
                        }
                        echo" <button style='background-image: url($path/common/app/images/1.jpg)' class='btn btn-xs' onclick=javascript:if(confirm('确实要取消提醒?'))removeClock(".$arrSelectAll[$i]["au_id"].")><i class='fa fa-bell'></i></button>
                        </div>";
                }else{
                   echo "<div class='notification' >";
                    if($arrSelectAll[$i]["activity_registration_id"]){
                        echo "<button class='btn btn-primary btn-xs' onclick='overSign()')'>已签到</button>";
                    }else{
                        if((strtotime($arrSelectAll[$i]["activity_start_time"])<=time()) && (strtotime($arrSelectAll[$i]["activity_end_time"])>=time())){
                            echo "<button data-activity_id=".$arrSelectAll[$i]['activity_id']." data-activity_title='".$arrSelectAll[$i]['activity_title']."' onclick='subTitle1(this)' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#myModal' >签到</button>";
                        }else{
                            echo "<button class='btn btn-primary btn-xs' onclick='overTime()'>签到</button>";
                        }
                    }
                         echo "<button style='background-image:url($path/common/app/images/2.jpg)' class='btn btn-xs btn-info' data-activity_title='".$arrSelectAll[$i]['activity_title']."' data-activity_start_time='".$arrSelectAll[$i]['activity_start_time']."' data-activity_id='".$arrSelectAll[$i]['activity_id']."' onclick='setClock1(this)'><i class='fa fa-bell'></i></button>
                      </div>";
                }
                 echo  "
                </div>
            </div>
            ";
        }
    }

    public function message(){
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
        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 10;
        $messageListPage = $message->getMessagePageModel($id,$page,$pageSize);
        $this->view->messageListPage = $messageListPage;
        $this->getView()->display("message.html");
    }

    public function delMessage(){
        $mes_id = $_POST["mes_id"];
        $message = new message();
        $result= $message->delMessageById($mes_id);
        echo $result;
    }
    public function delAll(){
        $messageValues = $_POST["messageValues"];

        $message = new message();
        for($i=0;$i<count($messageValues);$i++){
            $messageList = $message->delMessageById($messageValues[$i]);
        }

        if($messageList !=false){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function readMessage(){
        $activity_id = $_POST["activity_id"];
        echo $activity_id;
    }
    public function syllabus(){
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
        $syllabus = new syllabus();
        $syllabusList = $syllabus->getSyllabusById($id);

        if($syllabusList==false){
            $syllabus->createSyllabus($id);
            $syllabusList = $syllabus->getSyllabusById($id);

            $if_open=$syllabus->setsyllabus($id);
        }
       //查询本人是否开启课程格子
        $get_ifopen=$syllabus->getsyllabus($id);
        $model = new frontuser();
        $student = $model->getUserByUserID($id);//在这方法做了修改
        $this->view->student = $student;

        //var_dump($syllabusList);
        $this->view->get_ifopen=$get_ifopen['if_open'];
	
        $this->view->syllabusList=$syllabusList;
        //var_dump($syllabusList);
		//header("Pragma:no-cache");
		//header("Expires: -1");
		//header("cache-control:no-cache");
		//header("Location:syllabus");
		$this->getView()->display("syllabus.html");
        
    }

    //更改是否开启课程格子
    public function  update_ifopen(){
        $info = $this->getData ( 'userinfo' );
        $id = $info['fu_id'];
        $if_open=$_POST['if_open'];

        $syllabus = new syllabus();
        $syllabusList = $syllabus->update_ifopen($id,$if_open);
   }
    //头像上传
    public function pictureUpload(){
        $info = $this->getData ( 'userinfo' );
        $id = $info['fu_id'];

        $arrType=array('image/jpg','image/gif','image/png','image/bmp','image/jpeg');
        $max_size='500000';      // 最大文件限制（单位：byte）
        $upFile='common/upload/images/upload'; //图片目录路径
        $file=$_FILES['upFile'];

        if(!is_uploaded_file($file['tmp_name'])){ //判断上传文件是否存在
            $this->view->smg = "文件不存在";
            $c = new CenterController();
            $c->mycenter();
        }

        if(!in_array($file['type'],$arrType)){  //判断图片文件的格式
            $this->view->smg = "文件格式不正确";
            $c = new CenterController();
            $c->mycenter();
            exit();
        }
        if(!file_exists($upFile)){  // 判断存放文件目录是否存在
            mkdir($upFile,0777,true);
        }
        $num = rand(1,1000000000);
        $num2  = rand(1,99);
        $picName = $upFile.'/'.$num2.time().$num;


        if(!move_uploaded_file($file['tmp_name'],$picName)){
            $this->view->smg = "上传失败";
            $c = new CenterController();
            $c->mycenter();
            exit();
        }else{
            $picture = new picture();
            $picId =$picture->addPic(substr($file["type"],6),$picName);
            $user = new frontuser();
            $result = $user->updatePicId($picId,$id);

            if($result){
                $this->view->smg = "上传成功";
                $c = new CenterController();
                $c->mycenter();
                exit();
            }else{
                $this->view->smg = "上传失败";
                $c = new CenterController();
                $c->mycenter();
                exit();
            }

        }
    }

    public function editName(){
        $name = $_POST["name"];
        $id = $_POST["id"];

        $front_user = new frontuser();
        $result = $front_user->updateNickName($id,$name);
        ;
        if($result>0){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function addSyllabus(){
        $fu_id = $_POST['fu_id'];
        $week = $_POST['week'];
        $point = $_POST["point"];
        $name = $_POST["name"];
		
        $address = $_POST['address'];
        $class = $name."(".$address.")";
        $syllabus = new syllabus();
        $result = $syllabus->ifExistSyllabus($fu_id,$point);
		
        if($result==false){
            switch($week){
                case 1: $syllabus->addClassToMon($fu_id,$point,$class);break;
                case 2: $syllabus->addClassToTue($fu_id,$point,$class);break;
                case 3: $syllabus->addClassToWed($fu_id,$point,$class);break;
                case 4: $syllabus->addClassToThu($fu_id,$point,$class);break;
                case 5: $syllabus->addClassToFri($fu_id,$point,$class);break;
                case 6: $syllabus->addClassToSat($fu_id,$point,$class);break;
                case 7: $syllabus->addClassToSun($fu_id,$point,$class);break;
            }
        }else{
            switch($week){
                case 1: $syllabus->updateClassToMon($fu_id,$point,$class);break;
                case 2: $syllabus->updateClassToTue($fu_id,$point,$class);break;
                case 3: $syllabus->updateClassToWed($fu_id,$point,$class);break;
                case 4: $syllabus->updateClassToThu($fu_id,$point,$class);break;
                case 5: $syllabus->updateClassToFri($fu_id,$point,$class);break;
                case 6: $syllabus->updateClassToSat($fu_id,$point,$class);break;
                case 7: $syllabus->updateClassToSun($fu_id,$point,$class);break;
            }
        }

          $C = new CenterController();
        $C->syllabus();
    }

    public function editSyllabus(){
        $sy_id = $_POST["sy_id"];
        $sy_class = $_POST["sy_class"];
        $sy_address = $_POST["sy_address"];
        $week = $_POST["week"];
        $class = $sy_class."(".$sy_address.")";
        $syllabus = new syllabus();
        switch($week){
            case 1: $syllabus->editMonSyllabusById($sy_id,$class);break;
            case 2: $syllabus->editTueSyllabusById($sy_id,$class);break;
            case 3: $syllabus->editWedSyllabusById($sy_id,$class);break;
            case 4: $syllabus->editThuSyllabusById($sy_id,$class);break;
            case 5: $syllabus->editFriSyllabusById($sy_id,$class);break;
            case 6: $syllabus->editSatSyllabusById($sy_id,$class);break;
            case 7: $syllabus->editSunSyllabusById($sy_id,$class);break;
        }
		$C = new CenterController();
        $C->syllabus();
    }

    public function deleteSyllabus(){
        $sy_id = $_POST["sy_id"];
        $week = $_POST["week"];
        $syllabus = new syllabus();
        switch($week){
            case 1: $syllabus->delMonSyllabusById($sy_id);break;
            case 2: $syllabus->delTueSyllabusById($sy_id);break;
            case 3: $syllabus->delWedSyllabusById($sy_id);break;
            case 4: $syllabus->delThuSyllabusById($sy_id);break;
            case 5: $syllabus->delFriSyllabusById($sy_id);break;
            case 6: $syllabus->delSatSyllabusById($sy_id);break;
            case 7: $syllabus->delSunSyllabusById($sy_id);break;
        }

    }
    //设置闹钟
    public function setClock(){
        $info = $this->getData ( 'userinfo' );
        $fu_id = $info['fu_id'];
        $clock_time = $_POST["clock_time"];
        $activity_id = $_POST["activity_id"];

        $message = new message();
        $result = $message->getMessageByTypeFuidAcId($fu_id,$activity_id);
        $activity = new activity();
        $activityInfo = $activity->getActivityById($activity_id);

        $mes_content = "活动提醒:离‘".$activityInfo[0]["activity_title"]."’活动还有";
        if($result==false){
            $message->addMessage($fu_id,$activity_id,0,$mes_content,date("Y-m-d H:i:s",time()));
        }



        $activity = new activity();
        $result = $activity->ifExistFollowActivity($activity_id,$fu_id);
        if($result==false){
            $activity->addClockActivity($activity_id,$fu_id,strtotime($clock_time));
        }else{

            $activity->updateClock($activity_id,$fu_id,strtotime($clock_time));
        }

        echo 1;
    }

    public function readAll(){
        $messageValues = $_POST["messageValues"];
        $message = new message();
        for($i=0;$i<count($messageValues);$i++){
            $result = $message->readMessage($messageValues[$i]);
        }
        if($result !=false){
            echo 1;
        }else{
            echo 2;
        }
    }
    //9.9签到
    public function signOn(){

        $ac_id = $_POST["ac_id"];
        $activity = new activity();
        $info = $this->getData ( 'userinfo' );
        $userId = $info['fu_id'];
        if($_FILES['file']){
            $pic_id=array();
            $uptypes=array(
                'image/jpg',
                'image/jpeg',
                'image/png',
                'image/pjpeg',
                'image/gif',
                'image/bmp',
                'image/x-png'
            );
           for($m=0;$m<count($_FILES['file']['name'])-1;$m++){
               if(!in_array($_FILES['file']["type"][$m], $uptypes))
                   //检查文件类型
               {
                   echo "<div id='error' style='display:none'>".$_FILES['file']['name'][$m]."文件类型不符!</div>";
                   $center = new CenterController();
                   $center->followActivity();
                   exit;
               }
           }
            for($i=0;$i<count($_FILES['file']['name'])-1;$i++){
                $new_name=iconv("utf-8","gbk",time().$_FILES['file']['name'][$i]);
                $path="/common/upload/images/upload/".$new_name;
                $realpath=str_replace('\\','/',DIR).$path;
                $su=move_uploaded_file($_FILES['file']['tmp_name'][$i],$realpath) ? '1' : '0';
                if($su){
                    $path = "/common/upload/images/upload/".time().$_FILES['file']['name'][$i];
                    $pic_id[]=$activity->uploadPic($path);
                }
            }
        }
        if($pic_id==false){
            $activity->signOnActivity($ac_id,$userId,date("Y-m-d H:i:s",time()));//签到活动
            $center = new CenterController();
            $center->followActivity();
        }else{
            $activity_registration_id = $activity->signOnActivity($ac_id,$userId,date("Y-m-d H:i:s",time()));//签到活动
            for($i=0;$i<count($pic_id);$i++){
                $result = $activity->addARP($activity_registration_id,$pic_id[$i]);
            }
            if($result){
                $center = new CenterController();
                $center->followActivity();
            }else{
                echo "上传失败";
            }
        }
    }
}