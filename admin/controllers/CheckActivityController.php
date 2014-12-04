<?php
class CheckActivityController extends Controller{
	
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	//�����б�
	public function ActivityList(){
	    $userinfo = $this->getData("userinfo");
		$source=$_POST['source'];
		$checkstatus=$_POST['checkstatus'];
        $organizers_id = $_POST['organizers'];

		if($source=='-1'){
			$source=null;
		}
		if($checkstatus=='-1'){
			$checkstatus=null;
		}
        if($organizers_id=='-1'){
            $organizers_id=null;
        }
		$msg=$this->getRequest()->get("msg");
		$activity=new activity();
		$page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
		if($page == -1){
		     $page = 1;
		}
		$pageSize = 9;
        if($userinfo['admin_id']=="1"||$userinfo['admin_college']=="23"){
            $listInfoArr=$activity->getCheckActivity($organizers_id,$source,$checkstatus,$page,$pageSize);
			
        }else{
            $listInfoArr=$activity->getCheckActivity02($userinfo['admin_college'],$source,$checkstatus,$page,$pageSize);
			
        }
        //合并多主办方算法
        $arr1['list'] = $listInfoArr['list'];
		
        for($i=0;$i<count($arr1['list']);$i++){
            for($j=0;$j<count($arr1['list']);$j++){
                if($i != $j){
                    if($listInfoArr['list'][$i]["activity_id"]==$listInfoArr['list'][$j]["activity_id"]){
                        if($i>$j){
                            unset($listInfoArr['list'][$i]);
                        }else{
                            $listInfoArr['list'][$i]["organizers_id"] = $listInfoArr['list'][$i]["organizers_id"].",".$listInfoArr[$j]['list']["organizers_id"];
                            $listInfoArr['list'][$i]["organizers_name"] = $listInfoArr['list'][$i]["organizers_name"].",".$listInfoArr[$j]['list']["organizers_name"];
                        }
                    }
                }
            }
        }
        
		
        $arr = $listInfoArr;
		$arr['page'] = $page;
		$arr['total'] = $listInfoArr['total'];
		$arr['totalPage'] = $listInfoArr['totalPage'];

        for($i=0;$i<count($arr);$i++){
            if($arr['list'][$i]["activity_approval"]==0){
                $donotTijiao = 1;

            }
        }

        //获取主办方
        $activityOrg = $activity->getWeekActivityOrg02($userinfo['admin_id'],$userinfo['admin_college']);
        $this->view->activityOrg=$activityOrg;

        $this->view->donotTijiao=$donotTijiao;
		
		$this->view->listInfoArr=$arr;
		
		$this->view->msg = $msg;//
		echo $this->view->render("checkactivitylist.html");	
	}
	
	//����meige  xinxi duqu
	public function checkPer(){
		$id=$this->getRequest()->get("id");
		$activity=new activity();
		$activityInfo=$activity->getActivityInfo($id);
		//var_dump($activityInfo);
		$this->view->activityInfo=$activityInfo;
		echo $this->view->render('viewactivity.html');
	}
	//�����ύ
	public function managePer(){
        $userinfo = $this->getData("userinfo");
        $user_id = $userinfo["admin_id"];
		$id=$_POST['id'] ? $_POST['id'] : $this->getRequest()->get("id");;
		$flag=$_POST['flag'] ? $_POST['flag'] : $this->getRequest()->get("flag");//��������agree/tijiao/imnport
		$resflag=$_POST['resflag'] ? $_POST['resflag'] : $this->getRequest()->get("resflag");//������ǩ
		if($flag=='agree'){
			$data['activity_approval']=$resflag;
            $data['activity_approve_user_id']=$user_id;
			$activity=new activity();
			echo $result=$activity->editActivityInfo($id,$data)? '1' : '0';
			exit;
		}elseif($flag=='tijiao'){
			$data['activity_if_tijiao']=$resflag;
		}elseif($flag=='import'){
			$data['activity_if_import']=$resflag;
		}
		$activity=new activity();
		$res=$result=$activity->editActivityInfo($id,$data)? '1' : '0';
		if($res){
			$this->getApp()->gotoUrl('CheckActivity','ActivityList','0','',array('msg'=>'ok!!!!'));
			exit;
		}else{
			$this->getApp()->gotoUrl('CheckActivity','ActivityList','0','',array('msg'=>'fail!!!'));
			exit;
		}
	}
	
	//���ͨ���ͨ��
	public function manageAll(){
        $userinfo = $this->getData("userinfo");
        $user_id = $userinfo["admin_id"];
		$activity=new activity();
		$listArr=$_POST['listArr'];
		$flag=$_POST['flag'];
		$do=$_POST['do'];
		if($do=='check'){
			$data['activity_approval']=$flag;
            $data['activity_approve_user_id']=$user_id;
            for($i=0;$i<count($listArr);$i++){
                $result=$activity->editActivityInfo($listArr[$i],$data);
            }
		}else{
            $activity_id=array();
            for($k=0;$k<count($listArr);$k++){
              $info_activity=$activity->get_ActInfo($listArr[$k]);
              if($info_activity['activity_approval']==1){
                  $activity_id[]=$listArr[$k];
              }
            }
			$data['activity_if_tijiao']='1';
            for($i=0;$i<count($activity_id);$i++){
                $result=$activity->editActivityInfo($activity_id[$i],$data);
            }
		}		

   	if($result){
			echo '1';
		}else{
			echo '0';
		} 
	}
}
?>		