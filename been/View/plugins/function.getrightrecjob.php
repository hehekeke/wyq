<?php
/**
*  
*  Create On 2013-8-14����2:48:43
*  Author lidianbin
*  QQ: 281443751
*  Email: lidianbin@iwind-tech.com
**/
function smarty_function_getrightrecjob($params, &$smarty)
{
	$num = array_key_exists("num", $params) ? $params['num'] : 5 ;
	//print_r($params);
	$jobfairmsg = new jobfairmsg();
	$uplist = $jobfairmsg->getRecentCorpMsg($num);
	$smarty->assign("recommend",$uplist);
	//style="color:#C69AB1"
	$color = array_key_exists("color", $params) ? $params['color'] : "green" ;
	if($color=="red")$color="purple";
	$smarty->assign("color",$color);
	//echo $params['web_url'].$params['url'];
	//echo $smarty->fetch("page.htm");
	return $smarty->fetch("right_recommend.htm");
}
