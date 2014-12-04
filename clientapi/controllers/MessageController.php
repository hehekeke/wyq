<?php
class MessageController extends Controller {
	public function __construct() {
		parent::__construct ();
		$this->view->web_host = $this->getRequest ()->hostUrl;
		$this->view->web_app_url = $this->getRequest ()->hostUrl . "/index.php";
	}
	
	public function getMsgList() {
		$msgType = $this->getRequest ()->get ( 'msgType' );
		$pageType = $this->getRequest ()->get ( 'pageType' );
		$timeStamp = $this->view->getRequest ()->get ( "timeStamp" );
		if (count ( $timeStamp ) == 0) {
			$timeStamp = 0;
		}
		$pageSize = $this->getRequest ()->get ( "pageSize" ) ? (strtolower ( $this->getRequest ()->get ( "pageSize" ) ) == "null" ? 20 : $this->getRequest ()->get ( "pageSize" )) : 20;
		$data ['list'] = array();
		$data ['totalCount'] = "0";
		$this->view->setAppData ( $data );
		$this->view->setAppState ( "1" );
		$this->view->setAppStatus( "1" );
		$this->view->setAppMsg ( "暂无数据" );
		$this->view->appdisplay ( "json" );
	}
	
	public function delMsg() {
		$id = $this->getRequest ()->get ( 'id' );
		if (!$id) {
			$this->view->setAppData ( (Object) null );
			$this->view->setAppState ( "0" );
			$this->view->setAppStatus( "1" );
			$this->view->setAppMsg ( "参数缺失" );
			$this->view->appdisplay ( "json" );
			return;
		}
		$this->view->setAppData ( (Object) null );
		$this->view->setAppState ( "0" );
		$this->view->setAppStatus( "1" );
		$this->view->setAppMsg ( "删除失败" );
		$this->view->appdisplay ( "json" );
	}
}