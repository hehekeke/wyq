<?php
error_reporting(0);
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
define("DIR",dirname(__FILE__));
define("APPNAME","app");
define("VERSION","1.6.2");
//echo DIR;
ini_set("include_path", ini_get("include_path").PATH_SEPARATOR.DIR."/been");//设置框架所在目录为目录为include_path

include_once 'App.class.php';
include_once 'Db.php';
include_once 'View.class.php';
include_once 'Lang.class.php';
include_once './app/filter/appFilter.php';
//include_once './setting/app_config.php';
//判断浏览器，只允许火狐和chrom浏览器访问

$browswer = $_SERVER["HTTP_USER_AGENT"];
$google = 'chrome';
$ff = 'Firefox';
$b1 = stripos($browswer, $google);
$b2 = stripos($browswer, $ff);
//echo $browswer;
/*
if($b1==false && $b2==false){
	exit('<center><span style="color:#f00;font-size:30px;">为保证顺畅浏览，请您使用火狐或谷歌浏览器</span><br/>
			<a href="http://www.firefox.com.cn/"  target="_Blank">火狐(firefox)浏览器下载地址</a><br/>
			<a href="http://www.google.cn/intl/zh-CN/chrome/browser/"  target="_Blank">谷歌(chrome)浏览器下载地址</a><br/></center>');
}*/
$app=App::getInstance();
$app->setConfPath(DIR."/setting")->setVersion(VERSION);

$app->setDb(new Db($app->loadConf("db")));
$app->setView(new View($app->loadConf("view")));
$lang = include_once DIR.'/'.APPNAME.'/lang/langConf.php';
//print_r($lang);

$app->setLang(new Lang($lang));
$app->setFilter(new appFilter());
//echo 1111;
$app->run(DIR.'/'.APPNAME.'/controllers');
 
