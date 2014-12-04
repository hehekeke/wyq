<?php
class AssessController extends Controller {
	public function __construct() {
		parent::__construct ();
		$this->view->web_host = $this->getRequest ()->hostUrl;
		$this->view->web_app_url = $this->getRequest ()->hostUrl . "/index.php";
	}
	
	public function getStuList() {
		$msgType = $this->getRequest ()->get ( 'msgType' );
		$pageType = $this->getRequest ()->get ( 'pageType' );
		$timeStamp = $this->view->getRequest ()->get ( "timeStamp" );
		if (count ( $timeStamp ) == 0) {
			$timeStamp = 0;
		}
		$pageSize = $this->getRequest ()->get ( "pageSize" ) ? (strtolower ( $this->getRequest ()->get ( "pageSize" ) ) == "null" ? 20 : $this->getRequest ()->get ( "pageSize" )) : 20;
		$list [0] ['name'] = 'aasa';
		$list [0] ['userId'] = '099901267';
		$list [1] ['name'] = '测试1010603';
		$list [1] ['userId'] = '1010603';
		$this->echoSuccessListData($list);
	}
	
	public function postScore() {

		$scoreTypeIds = explode("_", $this->getRequest ()->get ( 'scoreTypeIds' ));
		$scores = explode("_", $this->getRequest ()->get ( 'scores' ));
		$good1 = $this->getRequest ()->get ( 'good1' );
		$good2 = $this->getRequest ()->get ( 'good2' );
		$good3 = $this->getRequest ()->get ( 'good3' );
		$bad1 = $this->getRequest ()->get ( 'bad1' );
		$bad2 = $this->getRequest ()->get ( 'bad2' );
		$bad3 = $this->getRequest ()->get ( 'bad3' );
		if (!$userid || !$good1 || !$bad1) {
			$this->echoParamsMissing();
			return;
		}
		$this->view->setAppData ( (Object) null );
		$this->view->setAppState ( "1" );
		$this->view->setAppStatus( "1" );
		$this->view->setAppMsg ( "评价成功" );
		$this->view->appdisplay ( "json" );
	}
	
	public function getResultList() {
		$type = $this->getRequest ()->get ( 'type' );
		$userid = $this->getRequest ()->get ( 'userID' );
		if ($type == 0) {
			echo $this->view->render("huping.html");
			return;
		} else if ($type == 1) {
			echo $this->view->render("taping.html");
			return;
		} else {
			echo "类型不正确";
		}
		if (!$userid) {
			echo "没有找到该用户的评分结果";
			return;
		}
	}
	
	public function getGoodOrBadList() {
		$type = $this->getRequest ()->get ( 'type' );
		if ($type == "0") {
			$list [0] ['title'] = '最好1';
			$list [1] ['title'] = '最好2';
			$list [2] ['title'] = '最好3';
		} else if ($type == "1") {
			$list [0] ['title'] = '最差1';
			$list [1] ['title'] = '不好2';
			$list [2] ['title'] = '需要改进3';
		} else if ($type == "2") {
			$list [0] ['title'] = '他评good1';
			$list [1] ['title'] = '他评好2';
			$list [2] ['title'] = '他评g3';
		} else if ($type == "3") {
			$list [0] ['title'] = '他评最差1';
			$list [1] ['title'] = '他评不好2';
			$list [2] ['title'] = '他评需要改进3';
		} else {
			$this->echoParamsMissing();
			return;
		}
		$userinfo = $this->getData ( 'userinfo' );
		$userid = $userinfo ["fu_id"];
		
		$this->echoSuccessListData($list);
	}

    /** hjw评估互评做的最好 */
    public function Do_good(){
        $username=$this->getRequest()->get('userName');
        $size=$this->getRequest()->get('size');
        $user=new frontuser();
        $ass=new assessment();
        $arr=$user->getUserIdByUsername($username);
        if($arr){
            $id=$arr[fu_id];
            $assess=$ass->get_do_good($id);
            $good_content = $ass->gethp1goodcontent($id,$size);
            $num=count($good_content);
            if($good_content){

                    $this->view->setAppData($good_content);
                    $this->view->setAppStatus("1");
                    $this->view->setAppMsg("操作成功！");

            }else{
                $this->view->setAppStatus("0");
                $this->view->setAppMsg("没有更多数据了！");
            }
        }else{
            $this->view->setAppStatus("0");
            $this->view->setAppMsg("无此用户！");
        }
        $this->view->appdisplay("json");
    }
    /** hjw评估互评做的最坏 */
    public function Do_bad(){
        $username=$this->getRequest()->get('userName');
        $size=$this->getRequest()->get('size');
        $user=new frontuser();
        $ass=new assessment();
        $arr=$user->getUserIdByUsername($username);

        if($arr){
            $id=$arr[fu_id];
            $assess=$ass->get_do_bad($id);
            $bad_content = $ass->gethp1badcontent($id,$size);
            $num=count($bad_content);
            if($bad_content){

                    $this->view->setAppData($bad_content);
                    $this->view->setAppStatus("1");
                    $this->view->setAppMsg("操作成功！");


            }else{
                $this->view->setAppStatus("0");
                $this->view->setAppMsg("没有更多数据了！");
            }
        }else{
            $this->view->setAppStatus("0");
            $this->view->setAppMsg("无此用户！");
        }
        $this->view->appdisplay("json");
    }



}