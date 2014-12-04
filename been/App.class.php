<?php
/**
*  Create On 2010-7-12
*  Author Been
*  QQ:281443751
*  Email:binbin1129@126.com
**/
include_once 'Controller.class.php';
include_once 'Model.class.php';
include_once 'Request.class.php';
include_once 'AutoLoad.php';

class App{
	protected static $_instance = null;
	/**
	 * 
	 * @var Request
	 */
	protected $_request;
	protected $_cPath;
	protected $_view;
	protected $_db;
	protected $_lang;
	protected $_push;//用于推送
	protected $_filter=null;//过滤器
	protected $_data=array();//用于存储一些自定义的数据
	protected $_utils = array();//用于存储加载过的工具类
	
	protected $_confPath = "./";
	protected $_confs = array();//用于存储加载过的配置项
	protected $_version = null;
	
	
	protected function __construct(){
		$this->_request=new Request();
	}
	
	/**
	 * 获取实例 
	 * @return APP
	 */
	public static function getInstance(){
        if (null === self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
    /**
     * 
     * @return unknown_type
     */
    public function run($cPath="./controllers"){
    	if(!$this->_cPath)$this->setCPath($cPath);
    	
    	$this->preDispatch();
    	
    	$this->dispatch();
    	
    	return true;
    }
    /**
     * 设置controller路径
     * @param string $path
     * @return APP
     */
    public function setCPath($path){
    	$this->_cPath=$path;
    }
    
	/**
	 * 获取request数据
	 * */
	public function getRequest(){
		return $this->_request;
	}
	
	/**
	 * 根据用户的请求进行分发到控制器
	 */
	public function  dispatch(){
	
		//判断当前有没有这个类和方法
		$cName=$this->_request->cName.'Controller';
		$aName=$this->_request->aName;
		//echo $this->_cPath.'/'.$this->_request->cName;
		
		$controller=$this->checkCA($cName,$aName);
		
		if( is_object($controller) ){
			$controller->$aName();
		}else{
			if($controller==0){
				$this->error404();
				//exit('没有控制器：'.$cName.'.php');
			}
			else if($controller==-1){
				$this->error404();
				//exit('没有方法：'.$cName.'::'.$aName);
			}
			else{
				$this->error404();
				//exit('未知错误！'.$cName.'::'.$aName);
			}
		}
		
	}
	
	/**
	 * 重新分发
	 */
	public function reDispatch($cName = null, $aName = null){
		if($cName){$this->getRequest()->cName = $cName; }
		if($aName){$this->getRequest()->aName = $aName; }
		$this->dispatch();
	}
	
	/**
	 * 分发之前
	 * 可以在这里对用户的访问进行控制
	 * @return boolean
	 */
	public function preDispatch(){
		if($this->_filter){
			$this->_filter->doFilter();
		}
		return true;
	}
	
	
	/**
	 * 
	 * @param unknown_type $cName
	 * @param unknown_type $aName
	 * @return controller
	 */
	public function checkCA($cName,$aName){
		
		if(!file_exists($this->_cPath.'/'.$cName.'.php')){
			
			return 0;
		}else{ 
			
			include_once($this->_cPath.'/'.$cName.'.php');
			//echo $this->_cPath.'/'.$cName.'.php';
			//echo $cName;
			
			$controller=new $cName();
			
			//判断实例$instance中是否存在$action方法, 不存在则提示错误 
			if(!method_exists($controller, $aName)){
				return -1;
				//exit('不存在的方法' . $cName.'::'.$aName);
			}else{
				return $controller;
			}
		}		
	
	}
	/**
	 * 
	 * @param unknown_type $Viewarr
	 * @return string
	 */
	public function setView(View $view){
		$this->_view=$view;
		$this->_view->__VERSION__ =  $this->getVersion();
		return $this;
	}
	
	
	/**
	 * 
	 * @return 模板类：View
	 */
	public function getView(){
		return $this->_view;
	}
	
	/**
	 * @return Push
	 */
	public function getPush(){
		return $this->_push;
	}
	
	public function setPush($push){
		$this->_push = $push;
		return $this;
	}
	
	public function setDb($db){
		$this->_db=$db;
		return $this;
	}
	
	/**
	 * 
	 */
	public function getDb(){
		return $this->_db;		
	}
	
	public function setLang($lang){
		$this->_lang=$lang;
		return $this;
	}
	
	/**
	 *
	 */
	public function getLang(){
		return $this->_lang;
	}
	
	/**
	 * 
	 * @param unknown_type $filter
	 * @return App
	 */
	public function setFilter($filter){
		$this->_filter = $filter;
		return $this;
	}
	
	/**
	 * 
	 * @return Object / NULL
	 */
	public function getFilter(){
		return $this->_filter;
	}
	
	/**
	 * 添加数据
	 * @param unknown_type $key
	 * @param unknown_type $value
	 */
	public function putData($key,$value){
		$this->_data[$key]=$value;
		return $this;
	}
	
	/**
	 * 通过key获取数据
	 * @param unknown_type $key
	 * @return multitype:
	 */
	public function getData($key){
		return array_key_exists($key, $this->_data ) ? $this->_data[$key] : false;
	}
	
	/**
	 * 设置系统的版本
	 * @param unknown_type $version
	 */
	public function setVersion($version){
		$this->_version=$version;
		return $this;
	}
	
	/**
	 * 获取系统的版本
	 * @return NULL
	 */
	public function getVersion(){
		return $this->_version;
	}
	
	/**
	 * 通过key获取数据
	 * @param unknown_type $key
	 * @return multitype:
	 */
	public function error404($msg = "404 NO Found!"){
		header('HTTP/1.1 404 Not Found');
		header("status: 404 Not Found");
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">";
		echo $msg;
	}
	/**
	 * 控制页面跳转
	 * @param  $cName 控制器名
	 * @param  $aName 方法名
	 * @param  $time  停留时间
	 * @param  $message 显示信息
	 * @param $flag 是否直接输出str,0-直接输出，其他不是
	 * @return 空
	 */
	public function gotoUrl($cName="index",$aName="index",$time=0,$message="", $param=array(), $flag = 0){
		$str = "";
		if($time>0){
			$str .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">";
			$str .= $message."<br/>".$time."秒后自动跳转！";
		}
		$url = $this->getRequest()->phpUrl."/".$cName."/".$aName;
		if ($param){
			while (list($key,$val) = each($param)){
				$url .="/".$key."/".$val;
			}
		}
		//echo $url;exit;
		$str .= "<meta http-equiv=refresh content='".$time."; url=".$url."' >";
		if ($flag == 0) {
			echo $str;
			return true;
		}else{
			return $str;
		}
	}
	
	/**
	 * 设置cookie 只有变量名为删除
	 * @param $var
	 * @param $value
	 * @param $second
	 * @return $this or false
	 */
	public function setcookie($var,$value="",$second="0"){
		$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
		if($second==0){
			$expire = $second;
		}else{
			$expire = time()+$second;
		}
		return setcookie($var,$value, $expire,'/', $domain, false) ? $this : false;
	}
	
	/**
	 * 加载工具类
	 * @param  $classname
	 * @return  @param
	 */
	public function loadUtilClass($classname){
		if(array_key_exists($classname, $this->_utils))return $this->_utils[$classname];
		$new_filename = 'Util/'.$classname.".php";
		
		require_once($new_filename);// 载入文件
		
		if (class_exists($classname)) {
			$this->_utils[$classname] =  new $classname();
			return $this->_utils[$classname];
		}else{
			return false;
		}
		
	
	}
	
	/**
	 * 设置配置文件的路径末尾不加 /
	 * @param unknown_type $path
	 * @return App
	 */
	public function setConfPath($path){
		$this->_confPath=rtrim($path,"/");
		return $this;
	}
	
	/**
	 * 获取配置变量
	 * @param unknown_type $confName
	 * @return multitype:
	 */
	public function loadConf($confName){

		if(array_key_exists($confName, $this->_confs)) return $this->_confs[$confName];		
		return  $this->_confs[$confName] = require_once($this->_confPath."/".$confName.".php");// 载入文件
		//print($confName);
		//return $confName;
	}
	

}