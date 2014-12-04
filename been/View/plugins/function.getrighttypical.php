<?php
/**
 * @desc: ��������(description)
 * @author: dongguanjun
 * @Emal:kaigeer1992@gmail.com
 * @date: 2014-2-14
**/
function smarty_function_getrighttypical($params, &$smarty){
	$num = array_key_exists("num",$params)?$params["num"]:4;
	$west = new westWork();
	$westPersonList = $west->getPersons(1,$num);
	$smarty->assign("persons",$westPersonList);
	return $smarty->fetch("right_typicalperson.html");
}
