<?php
/**
* Create On 2014-4-25 ����3:13:02
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class ActivityController extends Controller{
	
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	//历史活动库维护	
	public function Getactivitylist(){
		$activity = new activity();
		$admin = new admin();
		$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
		$pageSize = 1;
		$activityType = $this->getRequest()->get("type") ? $this->getRequest()->get("type") : 0;
		$source = $this->getRequest()->get("source")? $this->getRequest()->get("source") : 0;
		$createId = $this->getRequest()->get("create") ? $this->getRequest()->get("create") : 0;
		$activity_list = $activity->getActivityListPageModel($page, $pageSize, $activityType, $source, $createId);
		if ($activity_list['list']) {
			for ($j = 0; $j < count($activity_list['list']); $j++){
				$orilist = $activity->getOriByActivityId($activity_list['list'][$j]['activity_id']);
				$activity_list['list'][$j]['ori'] = $orilist;
			}
		}
		$create_user_list = $activity->getCreateUserId($activityType, $source);
		if ($create_user_list) {
			for ($i = 0; $i < count($create_user_list); $i++){
				$admininfo = $admin->getAdminInfoByAdminid($create_user_list[$i]['activity_create_user_id']);
				$create_user_list[$i]['name'] = $admininfo['admin_realname'];
			}
		}
		$type_list = $activity->getActivityTypeList();
		$this->view->page = $page;
		$this->view->source = $source;
		$this->view->type = $activityType;
		$this->view->list = $activity_list;
		$this->view->create = $createId;
		$this->view->user = $create_user_list;
		$this->view->typelist = $type_list;
		echo $this->view->render("activitylist.html");
	}
	
	public function Detail(){
		$id = $this->getRequest()->get("id");
	}
	/**
	 * 2014-07-29
	 * 作者：tcl@tiptimes.com
	 */
	//辅学活动介绍维护
	public function getAssistActivity(){
		$activity = new activity();
		$assistactivitylist = $activity->getAssistActivityPageModel();
		$this->view->assistactivitylist = $assistactivitylist;
		//var_dump($assistactivitylist);
		echo $this->view->render("assisiactivitylist.html");
	}
	//辅学活动内容修改
	public function Editfuactivity(){
		$id = $this->getRequest()->get("id");
		$activity = new activity();
		if ($_POST){
			if (trim($_POST['sa_content']) == ""){
				$this->view->result = $this->_lang->修改内容不能为空！;
			}else{
				$isEdit = $activity->editFuactivity($id, trim($_POST['sa_content']));
					if ($isEdit){
						$this->view->result=$this->_lang->xiugaichenggong;
					}else{
						$this->view->result=$this->_lang->xiugaishibai;
					}
			}
		}
		$this->view->id = $id;
		$detail = $activity->getAssistDetailById($id);
		$this->view->detail  = $detail;
		echo $this->view->render("editfuactivity.html");
	}
	
	//活动数据维护
	public function Getactivitydata(){
		$activity = new activity();
		$admin = new admin();
		$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
		$pageSize = 10;
		$activityType = $this->getRequest()->get("type") ? $this->getRequest()->get("type") : 0;
		$source = $this->getRequest()->get("source")? $this->getRequest()->get("source") : 0;
		$createId = $this->getRequest()->get("create") ? $this->getRequest()->get("create") : 0;
		$activity_start_time = $this->getRequest()->get("activity_start_time")?$this->getRequest()->get("activity_start_time"):null;
		var_dump($activity_start_time);
		$activity_list = $activity->getActivityListPageModel($page, $pageSize, $activityType, $source, $createId,$activity_start_time);
		if ($activity_list['list']) {
			for ($j = 0; $j < count($activity_list['list']); $j++){
				$orilist = $activity->getOriByActivityId($activity_list['list'][$j]['activity_id']);
				$activity_list['list'][$j]['ori'] = $orilist;
			}
		}
		$create_user_list = $activity->getCreateUserId($activityType, $source);
		if ($create_user_list) {
			for ($i = 0; $i < count($create_user_list); $i++){
				$admininfo = $admin->getAdminInfoByAdminid($create_user_list[$i]['activity_create_user_id']);
				$create_user_list[$i]['name'] = $admininfo['admin_realname'];
			}
		}
		$type_list = $activity->getActivityTypeList();
		$this->view->page = $page;
		$this->view->source = $source;
		$this->view->type = $activityType;
		$this->view->list = $activity_list;
		$this->view->create = $createId;
		$this->view->user = $create_user_list;
		$this->view->typelist = $type_list;
		$this->view->activity_start_time = $activity_start_time;
		echo $this->view->render("activitydata.html");
	}
	//修改活动数据
	public function editactivitydata(){
		$activityId = $this->getRequest()->get("activityId");
		$activity = new activity();
		//想参加，扔鸡蛋，献鲜花
	    if ($_POST){
			if (trim($_POST['flowers']) == ""){
				
			}else if (trim($_POST['egg']) == ""){
				
			}else if(trim($_POST['want']) == ""){
				
			}else{
				$isEdit = $activity->editActivitydata($activityId, trim($_POST['flowers']),trim($_POST['egg']),trim($_POST['want']));
				if ($isEdit){
					$this->view->result=$this->_lang->xiugaichenggong;
				}else{
					$this->view->result=$this->_lang->xiugaishibai;
				}
			}
		}
		if ($_POST){
			if (trim($_POST['flowers0']) == ""){
				
			}else if (trim($_POST['egg0']) == ""){
				
			}else if(trim($_POST['want0']) == ""){
				
			}else{
				$isEdit = $activity->addActivitydata($activityId, trim($_POST['flowers0']),trim($_POST['egg0']),trim($_POST['want0']));
				if ($isEdit){
					$this->view->result=$this->_lang->xiugaichenggong;
				}else{
					$this->view->result=$this->_lang->xiugaishibai;
				}
			}
		}
		//辅学目标平均分修改
		
		
		//获取活动具体内容
		$this->view->activityId = $activityId;
		$detail = $activity->getActivityDetail($activityId);
		$this->view->detail = $detail;
		//获取扔鸡蛋，献鲜花，想参加人数
		$attitude = $activity->getUserAttitude($activityId);
		$this->view->attitude = $attitude;
		//获取活动对应的辅学目标及平均分
		
		//$secondaryActivityScore = $activity->getActivityScore($activityId);
		//$this->view->secondaryActivityScore = $secondaryActivityScore;
		echo $this->view->render("editactivitydata.html");
	}
	//活动评论维护
	public function GetCommentsList(){
		$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
		$pageSize = 10;
		$activity_title = $this->getRequest()->get("activity_title")?$this->getRequest()->get("activity_title"):null;
		if($activity_title!==null){
			$activity_title = urldecode($activity_title);
		}
		$this->view->activity_title = $activity_title;
		$activity = new activity();
		$do = $this->getRequest()->get("do");
		if($do){
			if($do == "del"){
				$id = $this->getRequest()->get("commentId");
				if($id){
					$result = $activity->delComment($id);
					//$ar->delAdminroleByAdminId($id);
					if($result){
						$this->view->result = $this->_lang->shanchuchenggong;
					}else{
						$this->view->result = $this->_lang->shanchushibai;
					}
				}
			}
		}
		$activityCommentList = $activity->getActivityCommentList($page,$pageSize,$activity_title);
		$this->view->list = $activityCommentList;
		echo $this->view->render("activitycommentslist.html");
	}
}
