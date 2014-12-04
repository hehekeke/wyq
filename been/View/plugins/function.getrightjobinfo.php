<?php
/**
 * @desc: 获取右侧热点排行(description)
 * @author: dongguanjun
 * @Emal:kaigeer1992@gmail.com
 * @date: 2014-2-14
**/
function smarty_function_getrightjobinfo($params, &$smarty){
	$num = array_key_exists("num",$params)?$params["num"]:3;
	$type = array_key_exists("type",$params)?$params["type"]:1;
	$jobinfo = new jobinfo();
	$uplist = $jobinfo->getfrontnews($num,$type);
	$smarty->assign("uplist",$uplist);
	if($type == 1){
		return $smarty->fetch("right_hot.html");
	}else{
		return $smarty->fetch("right_notice.html");
	}
	
}