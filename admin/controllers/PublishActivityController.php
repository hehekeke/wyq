<?php
//发布活动
class PublishActivityController extends Controller{
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	
	//内容列表
	public function ActivityList(){
     //获取管理员信息
     $userinfo = $this->getData("userinfo");
	//获取分类查询条件
		$source=$_POST['source'];
		$publshStatus=$_POST['publshStatus'];
		if($source=='-1'){
			$source=null;
		}
		if($publshStatus=='-1'){
			$publshStatus=null;
		}
		$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
		$pageSize = 9;
		$msg=$this->getRequest()->get("msg");
		$activity=new activity();
        if($userinfo['admin_id']=="1"||$userinfo['admin_college']=="23"){
            $listInfoArr=$activity->getPublishActivity($source,$publshStatus,$page,$pageSize);
        }else{
            $listInfoArr=$activity->getPublishActivity02($userinfo['admin_college'],$source,$publshStatus,$page,$pageSize);
        }

		$this->view->list=$listInfoArr;
	
		$this->view->msg = $msg;
		echo $this->view->render("publishactivitylist.html");		
	}
	
	//更改内容
	public function editPer(){
		$id=$this->getRequest()->get("id");
		$activity=new activity();
		if($_POST['submit']){
			$data=$_POST;
			unset($data['submit']);
			$activity=new activity();
			$msg=$activity->editActivityInfo($id,$data)?'操作成功':'操作失败';
			$this->getApp()->gotoUrl('PublishActivity','ActivityList','0','',array('msg'=>'ok!'));
			exit;
		}
		$activityInfo=$activity->getActivityInfo($id);
		$this->view->activityInfo=$activityInfo;
		echo $this->view->render('viewactivity.html');
	
	}
	//重点推荐
	public function managePer(){
		$id=$this->getRequest()->get("id");
		$flag=$_POST['flag'] ? $_POST['flag'] : $this->getRequest()->get("flag");//操作类型agree/tijiao/imnport
		if($flag=='import'){
			$data['activity_if_import']='1';
		}
		if($flag=='noimport'){
			$data['activity_if_import']='0';
		}
		$activity=new activity();
		$activity->editActivityInfo($id,$data)?'操作成功':'操作失败';
		$this->getApp()->gotoUrl('PublishActivity','ActivityList','0','',array('msg'=>'ok!!!!'));
		exit;
	}
	//多个发布周活动
	public function publishWeek(){
		$listArr=$_POST['listArr'];
		$data['activity_ispublish']='1';
		$activity=new activity();
		foreach($listArr as $value){
			$result=$activity->editActivityInfo($value,$data);	
		}
		echo '1';
	}
	//多个发布年活动
	public function publishYear(){
		$listArr=$_POST['listArr'];
		$data['activity_ispublish']='1';
		$activity=new activity();
		foreach($listArr as $value){
			$result=$activity->editActivityInfo($value,$data);	
		}
		echo '1';
	}
	//撤销活动
	public function removeActivity(){
		$id=$this->getRequest()->get("id");
		$activity=new activity();
		$result=$activity->getActivityInfo($id);
		$now =time();
		$endTime=$result['activity_end_time'];
		if($now < strtotime($endTime)){
			if($activity->ManageActivity($id,'','0')){
				$this->getApp()->gotoUrl('PublishActivity','ActivityList','1','活动撤销成功</br>');
				exit;
			}
			exit;		
		}else{
			$this->getApp()->gotoUrl('PublishActivity','ActivityList','1','活动已结束,无法撤销！');
			exit;
		}
	}
}

?>