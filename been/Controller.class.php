<?php
/**
*  Create On 2010-7-12
*  Author Been
*  QQ:281443751
*  Email:binbin1129@126.com
**/
class Controller{
	protected $_app=null;
	protected $_request;
	protected $_lang = null;
	public $view=null;
	public function __construct(){
		$this->view=$this->getApp()->getView();		
		$this->_lang = $this->getApp()->getLang();
		//print_r($this->_lang);	
	}
	
	public function echoSuccessListData($list = array()) {
		$this->view->setState ( "1" );
		if (!$this->view->jsonArray["json"]["msg"]) {
			$this->view->setMsg ( "成功" );
		}
		$data['list'] = $list;
		$data['totalCount'] = count($list);
		$this->view->setData ( $data );		
		$this->view->display ( "json" );
	}
	
	public function echoSuccessData($data = null) {
		$this->view->setState ( "1" );
		if (!$this->view->jsonArray["json"]["msg"]) {
			$this->view->setMsg ( "成功" );
		}
		if (!$data) {
			$this->view->setData ( ( object ) null );
		} else {
			$this->view->setData ( $data );
		}
		$this->view->display ( "json" );
	}
	
	public function echoParamsMissing() {
		$this->view->setState ( "0" );
		$this->view->setMsg ( "参数缺失" );
		$this->view->setData ( ( object ) null );
		$this->view->display ( "json" );
	}
	
	public function echoNoData() {
		$this->view->setState ( "1" );
		$this->view->setMsg ( "暂无数据" );
		$this->view->setData ( ( object ) null );
		$this->view->display ( "json" );
	}
	
	public function echoNoListData() {
		$data['list'] = array();
		$data['totalCount'] = 0;
		$this->view->setState ( "1" );
		$this->view->setMsg ( "暂无数据" );
		$this->view->setData ( $data );
		$this->view->display ( "json" );
	}
	
	public function echoFail() {
		$this->view->setState ( "0" );
		if (!$this->view->jsonArray["json"]["msg"]) {
			$this->view->setMsg ( "操作失败，请重试" );
		}
		$this->view->setData ( ( object ) null );
		$this->view->display ( "json" );
	}
	
	public function echoNotLogin() {
		$this->view->setState ( 0 );
		$this->view->setMsg ( "用户未登录" );
		$this->view->setData ( ( object ) null );
		$this->view->display ( "json" );
	}
	
	/**
	 * 获取应用
	 * @return App
	 */
	public function getApp(){
		if (null !== $this->_app) {
            return $this->_app;
        }
        
        if (class_exists('App')) {
            $this->_app = App::getInstance();
            return $this->_app;
        }
        else{
        	exit("没有App.class.php类这个文件");
        }
	}
	
	/**
	 * 
	 * @return Request
	 */
	public function  getRequest(){
		if (null !== $this->_request) {
            return $this->_request;
        }
		return $this->getApp()->getRequest();	
	}
	
	public function getDb(){
		return $this->getApp()->getDb();
	}
	
	public function getView(){
		return $this->getApp()->getView();
	}
	
	/**
	 * 返回APP类中用户自定义存储的数据
	 * @param unknown_type $key
	 */
	public function getData($key){
		return $this->getApp()->getData($key);
	}
	
	/**
	 * 控制页面跳转
	 * @param  $cName 控制器名
	 * @param  $aName 方法名
 	 * @param  $time  停留时间
	 * @param  $message 显示信息
	 * @param $flag 是否直接输出str,0-直接输出，其他不是
	 * @param $param 参数值
	 * @return 空
	 */
	public function gotoUrl($cName="index",$aName="index",$time=0,$message="",$param=array(), $flag = 0){
		return $this->getApp()->gotoUrl($cName,$aName,$time,$message,$param,$flag);
	}
	
	public function error404($msg = "404 NO Found!"){
		$this->getApp()->error404($msg);
	}
	
	public function upload(){
		if (!empty($_FILES)) {
			//echo 2222222;
			//print_r($_FILES);
			$tempFile = $_FILES['Filedata']['tmp_name'];
			$targetPath = "common/upload/images/";
			$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
			$adder = 'img';
			$fileType = $this->getRequest()->get("filetype");
			if($fileType){
				if(strtolower($fileType) == "file"){
					$targetPath = "common/upload/files/";
					$fileTypes = array('txt','rar','zip','doc','docx','ppt','pptx','pdf','xls','xlsx'); // File extensions
					$adder = 'file';
				}
				if((strtolower($fileType) == "apk"))
				{
					$targetPath = "common/upload/files/";
					$fileTypes = array('zip','rar','apk');
					$adder = 'apk';
				}
			}
				
			//echo $_FILES['Filedata']['name'];
			$fileParts = pathinfo( $_FILES['Filedata']['name'] );
			$newfilename = strtolower($this->getRequest()->cName)."/".$adder.time().".".$fileParts["extension"];
			//print_r(pathinfo( $_FILES['Filedata']['name'] ));
			//echo $newfilename;
			//exit();
			$targetFile = rtrim($targetPath,'/') . '/' . $newfilename;
			//echo $targetFile;
			// Validate the file type
				
	
			if (in_array(strtolower($fileParts['extension']),$fileTypes)) {
				$this->createDir(dirname($targetFile));
				move_uploaded_file($tempFile,$targetFile);
				@chmod($targetFile, 0755);
				if($adder == "img"){
					$pic = new picture();
					$id = $pic->addpic($fileParts['extension'],$newfilename);
				}else{
					$file = new file();
					$id = $file->addfile($newfilename, $fileParts['extension'], $_FILES['Filedata']['name']);
				}
	
				$re['result'] = $id ? $id : 0;
				$re['name'] = $_FILES['Filedata']['name'];
				$re['size'] = $_FILES['Filedata']['size'];//kb
				if($re['size']>1024){
					$re['size'] /= 1024;
					if($re['size']>1024){
						$re['size'] = sprintf("%.2f", ($re['size'] / 1024));
						$re['size'] .= "M";
					}else{
						$re['size'] = sprintf("%.2f", $re['size']);
						$re['size'] .= "KB";
					}
				}else{
					$re['size'] .= "B";
				}
				$re['msg'] = $this->getRequest()->hostUrl."/".$targetPath.$newfilename;
			} else {
				$re['result'] = 0;
				$re['msg'] ='Invalid file type【'+$fileTypes+'】.';
			}
			$jsonstr = json_encode($re);
		}else{
			$re['result'] = 0;
			$re['msg'] ='no file.';
			$jsonstr = json_encode($re);
		}
		echo $jsonstr;
	
	}
	
	protected function createDir($path){
		if (!file_exists($path)){
			$this->createDir(dirname($path));
			mkdir($path, 0777);
		}
	}
}