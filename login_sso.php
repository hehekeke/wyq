<?php
/**
	 * 使用门户单点登录模式。获取一个UID后进入系统。
	 * @link 
	 */
/**
 * 获取当前登录的id
 * 
 */
require_once("class_http.php");
$method="?method=getImUser";
$wParam="&wParam=".urlencode($_COOKIE['iPlanetDirectoryPro']);

$proxy_url="http://uid.cnu.edu.cn/ids_sso.jsp".$method.$wParam;
if (!$h = new http()) 
{
    header("HTTP/1.0 501 Script Error");
    echo "proxy.php failed trying to initialize the http object";
    exit();
}

$h->url = $proxy_url;
$h->postvars = $_POST;
if (!$h->fetch($h->url)) {
    header("HTTP/1.0 501 Script Error");
    echo "proxy.php had an error attempting to query the url";
    exit();
}
//echo $h->body;


//设置当前登录用户;
$f_username = trim($h->body);

//接下来是业务系统的认证过程。