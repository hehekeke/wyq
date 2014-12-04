<?php
/**
*  
*  Create On 2013-9-5����3:25:56
*  Author lidianbin
*  QQ: 281443751
*  Email: lidianbin@iwind-tech.com
**/
error_reporting(0);
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
define("DIR",dirname(__FILE__));
define("APPNAME","clientapi");
ini_set("include_path", ini_get("include_path").PATH_SEPARATOR.DIR."/been");//设置框架所在目录为目录为include_path
// echo DIR;
include_once 'App.class.php';
include_once 'Db.php';
//include_once './push/PushMessage.php';
include_once 'View.class.php';
include_once 'Filter.class.php';
include_once 'Lang.class.php';
include_once './clientapi/filter/clientapiFilter.php';

$app=App::getInstance();
$app->setConfPath(DIR."/setting");

$app->setDb(new Db($app->loadConf("db")));
$app->setView(new View($app->loadConf("view")));

$app->setFilter(new clientapiFilter());

include_once DIR.'/push/PushMessage.php';
$app->setPush(new PushMessage($app->loadConf("push")));

// print_r($lang);
// $app->setLang(new Lang($lang));
$app->run(DIR.'/'.APPNAME.'/controllers');