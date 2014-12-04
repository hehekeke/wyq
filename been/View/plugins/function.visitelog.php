<?php 
function smarty_function_visitelog($params, &$smarty)
{
	
	$log = new log();
	//echo date("Y-m-d H:i:s",strtotime("today"))."--".date("Y-m-d H:i:s",strtotime("tomorrow"))."--";
	if($params['info']=="today"){
		$todayVisitNum = $log->getSiteVisteNum(date("Y-m-d H:i:s",strtotime("today")),date("Y-m-d H:i:s",strtotime("tomorrow")));	
		return $todayVisitNum;
	}
	if($params['info']=="total"){
		$totalVisitNum = $log->getSiteVisteNum();
		return  $totalVisitNum;
	}
	return "";
	
}

?>