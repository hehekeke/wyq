<?php
/**
*  
*  Create On 2013-8-14����10:02:00
*  Author lidianbin
*  QQ: 281443751
*  Email: lidianbin@iwind-tech.com
**/
function smarty_function_getdate($params, &$smarty)
{
	$weekArr = array("星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"  );
	$date = array_key_exists("date", $params) ? strtotime($params["date"]) : time();
	if(array_key_exists("format", $params)){
		if($params["format"] == 'cnWeek' ){
			$index = date("w",$date);
			echo $weekArr[$index];
		}
	}else{
		
		//print_r($weekArr);
		$index = date("w",$date);
		$nowWeek = $weekArr[$index];
		echo  $nowWeek;
		//exit();
		echo "&nbsp;";
		echo date("Y年n月j日");

	}
}
?>