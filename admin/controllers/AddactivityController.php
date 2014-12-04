<?php
/**
* Create On 2014-4-28 ����9:42:00
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class AddactivityController extends Controller{
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	
	public function Addactivity(){
		$activity = new activity();
		$typelist = $activity->getActivityTypeList();
		$this->view->typelist = $typelist;
		echo $this->view->render("addactivity1.html");
	}
  //学年活动维护
	public function ActivityList(){
	     $userinfo = $this->getData("userinfo");
        $ajex=$_POST['is_ajex'] ? '1' : '0';
         $activity=new activity();
        $msg=$this->getRequest()->get("msg");
        $show_type=($this->getRequest()->get("type")!==null) ? $this->getRequest()->get("type") : $_POST['show_type'] ;
        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 10;
        $activityType = $_POST['ac_type'] ?  $_POST['ac_type'] : 0;//活动类型
        $createId = $_POST['createId'] ?  $_POST['createId'] : 0;//创建人
        $showRemove = $_POST['showRemove'] ?  $_POST['showRemove'] : null;//创建人
        $source = $show_type;//周年活动区分
        $keywords =$_POST['keywords'] ?  $_POST['keywords'] : 0;//活动关键字
        $state = ($_POST['shenhe'] !== null) ?  $_POST['shenhe'] : '-1';//活动是否审核
		 if($userinfo['admin_id']=="1"||$userinfo['admin_college']=="23"){
             $list=$activity->getActivityListPageModel02($page, $pageSize, $activityType, $source, $keywords,$state,$createId,$ajex,$showRemove);
        }else{
              $list=$activity->getActivityListPageModel05($userinfo['admin_college'],$page, $pageSize, $activityType, $source, $keywords,$state,$createId,$ajex,$showRemove);
        }
        if($ajex){
            $pageSize = 10;
            $ajaxPage = $_POST["ajaxPage"]?$_POST["ajaxPage"]:1;
            $list = $activity->getHisActivityList($ajaxPage,$pageSize);
            //echo var_dump($list);
            echo json_encode($list);
            exit;
        }
        $ac_type=$activity->type();
        $this->view->ac_type = $ac_type;//分类目标显示
        $this->view->show_type = $show_type;//分类显示
        $this->view->list = $list;//分页显示
        //var_dump($list);
        $this->view->msg = $msg;//分页显示
        echo $this->view->render("activitytmp.html");
	}
	
	//添加学年活动
	public function addANew(){
        $userinfo = $this->getData("userinfo");

		$activity=new activity();
		$show_type=$this->getRequest()->get("type");
		//注意要记录admin的id
		if($_POST['submit']){
	    $data=$_POST;
   if(trim($_POST['activity_title'])==""){
             $this->view->result = $this->_lang->huodongmingchengbunengweikong;
         }
         else if(trim($_POST['activity_content'])==""){
                $this->view->result = $this->_lang->huodongneirongbunengweikong;
        }
         else  if(trim($_POST['activity_theme'])==""){
            $this->view->result = $this->_lang->huodongzhutibunengweikong;
        }
         else if($_POST['activity_start_time']==""){
            $this->view->result = $this->_lang->huodongkaishishijianbunengweikong;
        }
         else if($_POST['activity_end_time']==""){
            $this->view->result = $this->_lang->huodongjieshushijianbunengweikong;
        }
         else if(trim($_POST['activity_address'])==""){
            $this->view->result = $this->_lang->huodongdidianbunengweikong;
        }
         else  if($_POST['at_id']==""){
            $this->view->result = $this->_lang->huodongleixingbunengweikong;
        }
         else if($_POST['activity_organizer']==""){
            $this->view->result = $this->_lang->huodongzhubanfangbunengweikong;
        }
         else  if($_POST['activity_scale']==""){
            $this->view->result = $this->_lang->huodongguimobunengweikong;
        }
        else  if(trim($_POST['activity_keywords'])==""){
            $this->view->result = $this->_lang->huodongguanjianzibunengweikong;
        }
        else  if(trim($_POST['activity_duty_preson'])==""){
            $this->view->result = $this->_lang->huodongfuzerenbunengweikong;
        }
        else  if($_POST['activity_fuxue_mubiao']==""){
            $this->view->result = $this->_lang->fuxuemubiaobunengweikong;
        }else{
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
                      echo "活动海报只能上传图片";
                      exit();
                     }
                }
                 for($i=0;$i<count($_FILES['file']['name'])-1;$i++){
                     $imgname = $_FILES["file"]["name"][$i];
                     $filetype = pathinfo($imgname, PATHINFO_EXTENSION);
                     $new_name=iconv("utf-8","gbk",time().'.'.$filetype);
                     $path="/common/upload/images/activity/".$new_name;
                     $realpath=str_replace('\\','/',DIR).$path;
                     $su=move_uploaded_file($_FILES['file']['tmp_name'][$i],$realpath) ? '1' : '0';
                     if($su){
                         $path = "/common/upload/images/activity/".time().'.'.$filetype;
                         $pic_id[]=$activity->uploadPic($path);
                     }
                 }
             }
             unset($data['submit']);
             $data['activity_create_user_id']=$_SESSION['session_userid'];
             foreach($data as $key=>$value){
                 $key=$value;
                 if($value=='' || $value==null){
                     unset($data[$key]);
                 }
             }
             $data['activity_school_year']=date('Y');
            if(empty($userinfo['admin_college'])){
                $data['activity_college']=0;
            }else{
                $data['activity_college']=$userinfo['admin_college'];
            }
            echo "".$data['activity_college'];
             $activity=new activity();
             //插入活动
             $msg=$activity->addANew($data,$pic_id) ? '添加成功' : '添加失败';
         }
        }
		//取出活动目标
		$ac_mubiao=$activity->mubiao();
        //取出活动的主办方
       $ac_zhubanfang=$activity->zhubanfang();
        //取出活动的承办方
        $ac_chengbanfang=$activity->chengbanfang();
		//活动类型
		$ac_type=$activity->type();
		$this->view->ac_type = $ac_type;//分类目标显示
		$this->view->ac_mubiao = $ac_mubiao;//分类目标显示
        $this->view->ac_zhubanfang=$ac_zhubanfang;//活动的主办方显示
        $this->view->ac_chengbanfang=$ac_chengbanfang;//活动的承办方显示
		$this->view->show_type = $show_type;//分类显示
		$this->view->msg = $msg;
		echo $this->view->render('addactivity.html');
	}
	
	//修改辅学活动
	public function editActivity(){
		$id=$this->getRequest()->get("id");
		if($_POST['submit']){
			$id=$_POST['activity_id'];
			$data=$_POST;
			unset($data['submit']);
			$activity=new activity();
			$activity->editActivityInfo($id,$data);
			$this->getApp()->gotoUrl('AddActivity','editActivity','0','',array('id'=>$id,'msg'=>'ok'));
			exit;
		}
		$activity=new activity();
		$activityInfo=$activity->get_ActInfo($id);
		$this->view->id = $id;
		$this->view->activityInfo = $activityInfo;	
		echo $this->view->render('editactivity.html');
	}
	
	//删除辅学活动
	public function delActivity(){
		$id=$this->getRequest()->get("id");
		$type=$this->getRequest()->get("type");
		$activity = new activity();
		$activity->delActivity($id);
		$this->getApp()->gotoUrl('AddActivity','ActivityList','0','',array('type'=>$type,'msg'=>'ok'));
	}
	//提交活动
	public function TjActivity(){
		$id=$this->getRequest()->get("id");
		$type=$this->getRequest()->get("type");
		$activity = new activity();
		$msg=$activity->ManageActivity($id,'0') ? '提交成功' : '提交失败';
		$this->view->msg = $msg;
		$this->getApp()->gotoUrl('AddActivity','ActivityList','0','',array('type'=>$type,'msg'=>'ok'));	
		
	}
	//撤销辅学活动
	public function removeActivity(){
        $userinfo = $this->getData("userinfo");
        $user_name = $userinfo["admin_realname"];
        $id=$this->getRequest()->get("id");
        $type=$this->getRequest()->get("type");
        $activity = new activity();
        $info_approve=$activity->get_ActInfo($id);
        if($info_approve['activity_approval'] !==0 && $info_approve['activity_ispublish']==null){
        $year = date("Y");
        $date=date("Y-m-d");
        $create_id=$info_approve['activity_approve_user_id'];
        $activity_tit=$info_approve['activity_title'];
        $content="您审核的标题为"."$activity_tit"."的活动被"."$user_name"."撤消了。";
       // $content="您审核的标题为";
        $activity->insert_message($year,$create_id,$content,$date);
        }
        $activity->ManageActivity($id,'','0');
        $this->getApp()->gotoUrl('AddActivity','ActivityList','0','',array('type'=>$type,'msg'=>'ok'));
	}
	//查看辅学活动需要进行结果取出
	public function ViewActivity(){
		$id=$this->getRequest()->get("id");
		$type=$this->getRequest()->get("type");
		$activity = new activity();
		$activityInfo=$activity->getActivityInfo($id);
		
		$this->view->activityInfo = $activityInfo;
		echo $this->view->render('viewactivity1.html');
	}
	//删除之间的查看
	public function ViewActivity02(){
		$id=$this->getRequest()->get("id");
		$type=$this->getRequest()->get("type");
		
		$activity = new activity();
		$activityInfo=$activity->getActivityInfo($id);
		
		$this->view->activityInfo = $activityInfo;
		$this->view->show_type = $type;
		
		echo $this->view->render('viewactivity2.html');
	}
	
	
	//从历史数据库中添加活动
	public function ActivityFromH(){
        $userinfo = $this->getData("userinfo");
        $admin_college=$userinfo['admin_college'];
		if($admin_college == null){
			$admin_college = 0;
		}
		$checkedValue=$_POST['checkedValue'];
		$activity_class=$_POST['activity_class'];
		
		$checkedValue=json_decode($checkedValue,true);
		if(!$checkedValue){
			echo '2';exit;
		}
		$activity = new activity();
		foreach($checkedValue as $value){
			$activity->updateCopyRow($value,$activity_class,$admin_college);
		}
		echo '1';
	}
	
}
