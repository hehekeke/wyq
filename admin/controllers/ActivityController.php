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
		
	public function Getactivitylist(){
		$activity = new activity();
		$admin = new admin();
		$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
		$pageSize = 10;
		$activityType = $this->getRequest()->get("type") ? $this->getRequest()->get("type") : 0;
		$source = $this->getRequest()->get("source")? $this->getRequest()->get("source") : 0;
		$createId = $this->getRequest()->get("create") ? $this->getRequest()->get("create") : 0;
        $xuenian = $this->getRequest()->get("xuenian") ? $this->getRequest()->get("xuenian") : 0;
		$activity_list = $activity->getActivityListPageModel($xuenian,$page, $pageSize, $activityType, $source,'','1',$createId);
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
        $this->view->xuenian=$xuenian;
		$this->view->source = $source;
		$this->view->type = $activityType;
		$this->view->list = $activity_list;
		$this->view->create = $createId;
		$this->view->user = $create_user_list;
		$this->view->typelist = $type_list;
		echo $this->view->render("activitylist.html");
	}
	
	public function Detail(){
		$id=$this->getRequest()->get("id");
		$type=$this->getRequest()->get("type");
		$activity = new activity();
		$activityInfo=$activity->getActivityInfo($id);
		$this->view->activityInfo = $activityInfo;
		
		echo $this->view->render('viewactivity.html');
	
	}
	/**
	 * 2014-07-29
	 * 作者：tcl@tiptimes.com
	 */
	
	//活动数据维护
	public function Getactivitydata(){
    	$activity = new activity();
		$admin = new admin();
		$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
		$pageSize = 10;
		$activityType = $this->getRequest()->get("type") ? $this->getRequest()->get("type") : 0;
		$source = $this->getRequest()->get("source")? $this->getRequest()->get("source") : null;
		$createId = $this->getRequest()->get("create") ? $this->getRequest()->get("create") : 0;
		$activity_start_time = $this->getRequest()->get("activity_start_time")?$this->getRequest()->get("activity_start_time"):null;
		$activity_list = $activity->getActivityListPageModel03($page, $pageSize, $activityType, $source, $keywords='',$state = 1,$createId, $isajex=0,$showRemove=1,$organizers = 0,  $recommend = 2,$activity_start_time);
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
	public function getEditactivitydata(){
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
		//获取活动具体内容
		$this->view->activityId = $activityId;
		$detail = $activity->getActivityDetail($activityId);
		$this->view->detail = $detail;
		//获取扔鸡蛋，献鲜花，想参加人数
		$attitude = $activity->getUserAttitude($activityId);
		$this->view->attitude = $attitude;
		//获取活动对应的辅学目标及平均分
		
		echo $this->view->render("editactivitydata.html");
	}
	//修改活动数据
	public function editactivitydata(){
		$activityId = $this->getRequest()->get("activityId");
		
		
		$activity_title = $_POST['activity_title'];
		$activity_content = $_POST['activity_content'];
		$activity_start_time = $_POST['activity_start_time'];
		$activity_type = $_POST['activity_type'];
		$activity_level = $_POST['activity_level'];
		$activity_duty_preson = $_POST['activity_duty_preson'];
		$activity_create_time = $_POST['activity_create_time'];
		
		
		$dataArray = array(
				"activity_title"=>$activity_title,
				"activity_content"=>$activity_content,
				"activity_start_time"=>$activity_start_time,
				"activity_level"=>$activity_level,
				"activity_duty_preson"=>$activity_duty_preson,
				"activity_create_time"=>$activity_create_time,
		);
		
		
		$activity = new activity();
		$activity->editActivityInfo($activityId,$dataArray);
		
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
		//获取活动具体内容
		$this->view->activityId = $activityId;
		$detail = $activity->getActivityDetail($activityId);
		$this->view->detail = $detail;
		//获取扔鸡蛋，献鲜花，想参加人数
		$attitude = $activity->getUserAttitude($activityId);
		$this->view->attitude = $attitude;
		//获取活动对应的辅学目标及平均分
		
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

    public function selectHisActivity(){
        $typeId = $_POST["typeId"];
        $level = $_POST["level"];
        $weekYear = $_POST["weekYear"];

        $activity = new activity();
        $activityList = $activity->getAllHisActivityList();
        $arr1 = array();
        if($typeId!=0){
            for($i=0;$i<count($activityList);$i++){
                if($activityList[$i]["at_id"]==$typeId){
                    $arr1[] = $activityList[$i];
                }
            }
        }else{
            $arr1 = $activityList;
        }
        $arr2 = array();
        if($level!=-1){
            for($i=0;$i<count($arr1);$i++){
                if($arr1[$i]["activity_level"]==$level){
                    $arr2[] = $arr1[$i];
                }
            }
        }else{
            $arr2 = $arr1;
        }
        $arr3 = array();
        if($weekYear!=-1){
           for($i=0;$i<count($arr2);$i++){
                if($arr2[$i]["activity_class"]==$weekYear){
                    $arr3[] = $arr2[$i];
                }
           }
        }else{
            $arr3 = $arr2;
        }
        echo json_encode($arr3);
    }

}
