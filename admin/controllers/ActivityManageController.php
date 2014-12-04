<?php
/**
* Create On 2014-4-25 ����3:13:02
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class ActivityManageController extends Controller{
	
	public function __construct(){
		parent::__construct();
		//$this->view->url_path=$this->getRequest()->appPath;
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
			
	//辅学活动目标维护
	public function mubiao(){
		$activity = new activity();
		$mubiaoList = $activity->mubiao();
		$this->view->list = $mubiaoList;
		echo $this->view->render("mubiao.html");	
	}
	//辅学活动目标添加
	public function addmu(){
		//获取
		$activity = new activity();
		if($_POST['submit']){
			$sg_name=$_POST['name'];
			//$activity = new activity();
			$mubiaoList = $activity->addmu($sg_name);
			if($mubiaoList){
			//此处需要进行页面跳转的学习！
				$this->view->msg = '添加成功';
				$this->mubiao();
				exit;
			}	
		}		
		$this->view->list = $mubiaoList;
		echo $this->view->render("addmu.html");	
	}
	//辅学活动目标编辑
	public function editmu(){
		$activity = new activity();
		$id=$this->getRequest()->get("id");
		$oriArr=$activity->getOneMu($id);
		if($_POST['submit']){
			$msg=$activity->updateMu($id,$_POST['name'])? '更新成功':'更新失败';
			$this->view->msg = $msg;
			$this->mubiao();
			exit;
		}
		$this->view->oriArr=$oriArr;
		echo $this->view->render('editmu.html');
	}	
	//辅学活动目标删除
	public function delmu(){
		$activity = new activity();
		$id=$this->getRequest()->get("id");
		$msg=$activity->delMu($id) ? '删除成功':'删除失败';
		$this->view->msg = $msg;
		$this->mubiao();
		exit;
	}
	
	//活动类型维护
	public function type(){
		$activity = new activity();
		$mubiaoList = $activity->type();
		$this->view->list = $mubiaoList;
		echo $this->view->render("type.html");	
	}
	//活动类型维护
	public function addType(){
		$activity = new activity();
		if($_POST['submit']){
			$at_name=$_POST['name'];
			$mubiaoList = $activity->addType($at_name);
			if($mubiaoList){			 
				$this->view->msg = '添加成功';
				$this->type();
				exit;
			}	
		}		
		$this->view->list = $mubiaoList;
		echo $this->view->render("addtype.html");
	}
	//活动类型编辑
	public function editType(){
		$activity = new activity();
		$id=$this->getRequest()->get("id");
		$oriArr=$activity->getOneType($id);
		if($_POST['submit']){
			$msg=$activity->updateType($id,$_POST['name'])? '更新成功':'更新失败';
			$this->view->msg = $msg;
			$this->type();
			exit;
		}
		$this->view->oriArr=$oriArr;
		echo $this->view->render('edittype.html');
	}
	//辅学活动类型删除
	public function delType(){
		$activity = new activity();
		$id=$this->getRequest()->get("id");
		$msg=$activity->delType($id) ? '删除成功':'删除失败';
		$this->view->msg = $msg;
		$this->type();
		exit;
	}
	
	/***********************tcl*******************************/
		//辅学活动介绍维护
	public function getAssistActivity(){
		$activity = new activity();
		$assistactivitylist = $activity->getAssistActivityPageModel();
		$this->view->assistactivitylist = $assistactivitylist;
		echo $this->view->render("assisiactivitylist.html");
	}
	//辅学活动内容修改
	public function Editfuactivity(){
		$id = $this->getRequest()->get("id");
		$activity = new activity();
		if ($_POST){
			if (trim($_POST['sa_content']) == ""){
				$this->view->result = $this->_lang->修改内容不能为空;
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
	
	/***************hjw************************/
	
    /**
     *承办方列表
     */
    public function Undertakelist(){
        $undertake=new undertake();

        $do = $this->getRequest()->get("do");
        if ($do){
            $id = $this->getRequest()->get("id");

            if ($id >= 1){
                $isDel = $undertake -> delUndertake($id);
                if ($isDel){
                    $this->view->result = $this->_lang->shanchuchenggong;
                }else{
                    $this->view->result = $this->_lang->shanchushibai;
                }
            }else{
                $this->view->result = $this->_lang->jinzhicaozuo;
            }
        }




        $undertakelist=$undertake->getUndertakeList();
        if($undertakelist){

            $this->view->undertakelists=$undertakelist;
        }
        echo $this->view->render("undertakelist.html");
    }

    /**
     * 承办方添加
     */
    public function Addundertake(){
        $undertake=new undertake();
        if($_POST){
            $theSameList=$undertake->reCheck($_POST['undertakename']);
            if($theSameList){
                $this->view->result = $this->_lang->cbfmzycz;
            }else{

                $id=$undertake->addUndertake($_POST['undertakename']);
                if($id){
                    $this->view->result= $this->_lang->tianjiachenggong;
                }else{
                    $this->view->result = $this->_lang->tianjiashibai;
                }
            }

        }
        echo $this->view->render("addundertake.html");
    }

    /** 承办方修改 */
    public function Modifyundertake(){
        $undertake=new undertake();
        $id=$this->getRequest()->get("id");
        if($_POST){
            $theSameList=$undertake->reCheck($_POST['undertakename']);
            if( $theSameList){
                $this->view->result = $this->_lang->cbfmzycz;
            }else{
                $num= $undertake->modifyundertake($id,$_POST['undertakename']);
                if($num){
                    $this->view->result= $this->_lang->xiugaichenggong;
                }else{
                    $this->view->result = $this->_lang->xiugaishibai;
                }
            }
            ;
        }
        $undertake_one=$undertake->getUndertakeOne($id);
        //var_dump($undertake_one);
        $this->view->undertakeone=$undertake_one;
        echo $this->view->render("modifyundertake.html");
    }

    /**
     *主办方列表
     */
    public function organizerslist(){
        $organizers = new organizers();

        $do = $this->getRequest()->get("do");
        if ($do){
            $id = $this->getRequest()->get("id");

            if ($id >= 1){
                $isDel = $organizers -> delorganizers($id);
                if ($isDel){
                    $this->view->result = $this->_lang->shanchuchenggong;
                }else{
                    $this->view->result = $this->_lang->shanchushibai;
                }
            }else{
                $this->view->result = $this->_lang->jinzhicaozuo;
            }
        }




        $organizerslist=$organizers->getOrganizerslist();
        if($organizerslist){

            $this->view->organizerslists=$organizerslist;
        }
        echo $this->view->render("organizerslist.html");
    }
    /**
     * 主办方添加
     */
    public function Addorganizers(){
        $organizers=new organizers();
        if($_POST){
            $theSameList=$organizers->reCheck($_POST['organizersname']);
            if($theSameList){
                $this->view->result = $this->_lang->cbfmzycz;
            }else{

                $id=$organizers->addorganizers($_POST['organizersname']);
                if($id){
                    $this->view->result= $this->_lang->tianjiachenggong;
                }else{
                    $this->view->result = $this->_lang->tianjiashibai;
                }
            }

        }
        echo $this->view->render("addorganizers.html");
    }

    /** 主办方修改 */
    public function Modifyorganizers(){
        $organizers=new organizers();
        $id=$this->getRequest()->get("id");
        if($_POST){
            $theSameList=$organizers->reCheck($_POST['organizersname']);
            if( $theSameList){
                $this->view->result = $this->_lang->cbfmzycz;
            }else{
                $num= $organizers->modifyorganizers($id,$_POST['organizersname']);
                if($num){
                    $this->view->result= $this->_lang->xiugaichenggong;
                }else{
                    $this->view->result = $this->_lang->xiugaishibai;
                }
            }
            ;
        }
        $organizers_one=$organizers->getOrganizersOne($id);
        //var_dump($undertake_one);
        $this->view->organizersone=$organizers_one;
        echo $this->view->render("modifyorganizers.html");
    }

	
    /** 敏感词列表 */
    public function sensitive_words_list(){
        $activity=new activity();
        $do=$this->getRequest()->get("do");
        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 10;
        if($do){
            $id=$this->getRequest()->get("id");
            if($id>=1){
                $isDel=$activity->delSensitiveWords($id);
                if($isDel){
                    $this->view->result=$this->_lang->shanchuchenggong;
                }else{
                    $this->view->result=$this->_lang->shanchushibai;
                }
            }else{
                $this->view->result=$this->_lang->this->jinzhicaozuo;
            }

        }
        if($_POST){
            $sensitiveword=$_POST["sensitiveword"];
            $sensitive_word=$activity->searchsensitiveword($page,$pageSize,$sensitiveword);
            $this->view->sensitive_words=$sensitive_word;
            echo $this->view->render("sensitivewordslist.html");

        }else{
			$sensitive_words=$activity->getSensitive_words_lists_02($page,$pageSize);
            $this->view->page = $page;
			$this->view->sensitive_words=$sensitive_words;
			echo $this->view->render("sensitivewordslist.html");
        }
    }
    /** 添加敏感词 */
    public function addsensitivewords(){
        $activity=new activity();
        if($_POST){
            if(trim($_POST['sensitivewordname'])==''){
                $this->view->result=$this->_lang->mingancibunengweikong;
            }else{
                $theSamelist=$activity->reCheckMgc($_POST['sensitivewordname']);
                if($theSamelist){
                    $this->view->result=$this->_lang->mingganciyichunzai;
                }else{
                    $id=$activity->addSensitiveWords($_POST['sensitivewordname']);
                    if($id){
                        $this->view->result=$this->_lang->tianjiachenggong;
                    }else{
                        $this->view->result=$this->_lang->tianjiashibai;
                    }
                }
            }

        }
        echo $this->view->render("addsensitivewords.html");
    }
    /** 修改敏感词 */
    public function modifysensitivewords(){
        $activity=new activity();
        $id=$this->getRequest()->get("id");
        if($_POST){
            $theSameList=$activity->reCheckMgc($_POST['sensitivewordsname']);
            if( $theSameList){
                $this->view->result = $this->_lang->mgcycz;
            }else{
                $num= $activity->modifysensitivewords($id,$_POST['sensitivewordsname']);
                if($num){
                    $this->view->result= $this->_lang->xiugaichenggong;
                }else{
                    $this->view->result = $this->_lang->xiugaishibai;
                }
            }
            ;
        }
        $sensitivewordsone=$activity->getSensitive_words_one($id);
        $this->view->sensitivewordsone=$sensitivewordsone;
        echo $this->view->render("modifysensitivewords.html");
    }
	
    /** 活动发布量统计 */
    public function activity_num_count(){
        $activity=new activity();
		
        if($_POST['st1']==2 || $_POST['st1']==1){
            if($_POST['activity']==0){
              $select_class=$activity->activity_type_counts($_POST['activity'],$_POST['start_time'],$_POST['end_time'],$_POST['time_zn']);
              $this->view->select_class=$select_class;
              $activity_type=$activity->getActivityTypeList();
              $this->view->activity_type=$activity_type;

            }else{
             $select_class=$activity->activity_type_counts($_POST['activity'],$_POST['start_time'],$_POST['end_time'],$_POST['time_zn']);
            }
            

            $this->view->start_time=$_POST['start_time'];
            $this->view->end_time=$_POST['end_time'];
            $this->view->select_class=$select_class;
        }
        if($_POST['st1']==3){
            $select_class=$activity->activity_type_counts($_POST['activity'],$_POST['start_time'],$_POST['end_time']);
            $this->view->select_class=$select_class;
        }
		
        echo $this->view->render("activity_num_count.html");
    }


}
