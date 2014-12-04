<?php
/**
* Create On 2014-4-10 ����2:52:07
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/

header("Content-type: text/html; charset=utf-8");
error_reporting(0);
date_default_timezone_set('Asia/Shanghai');
define("DIR",dirname(__FILE__));
define("APPNAME","admin");
ini_set("include_path", ini_get("include_path").PATH_SEPARATOR.DIR."/been");//设置框架所在目录为目录为include_path

include_once 'App.class.php';
include_once 'Db.php';
include_once 'View.class.php';
include_once 'Lang.class.php';
include_once DIR.'/'.APPNAME.'/filter/adminFilter.php';

$browswer = $_SERVER["HTTP_USER_AGENT"];
$google = 'chrome';
$ff = 'Firefox';
$b1 = stripos($browswer, $google);
$b2 = stripos($browswer, $ff);

$app=App::getInstance();
$app->setConfPath(DIR."/setting");

$app->setDb(new Db($app->loadConf("db")));
$app->setView(new View($app->loadConf("view")));



$lang = include_once DIR.'/'.APPNAME.'/lang/langConf.php';
//print_r($lang);
$app->setLang(new Lang($lang));
//print_r($app);
$app->setFilter(new adminFilter());

include_once DIR.'/push/PushMessage.php';
//print_r($app->loadConf("push"));
$app->setPush(new PushMessage($app->loadConf("push")));

$app->run(DIR.'/'.APPNAME.'/controllers');
//print_r($_SERVER);

