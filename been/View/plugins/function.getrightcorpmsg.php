<?php
/**
 * @desc: 获取右侧招聘信息(description)
 * @author: dongguanjun
 * @Emal:kaigeer1992@gmail.com
 * @date: 2014-2-14
**/
function smarty_function_getrightcorpmsg($params, &$smarty){
	$num = array_key_exists("num",$params)?$params["num"]:6;
	$corpinternmsg = new corpinternmsg();
	$frontlist = $corpinternmsg->getfrontmsg($num);
	$smarty->assign("frontlist",$frontlist);
	return $smarty->fetch("right_corpmsg.html");
}
