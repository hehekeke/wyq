<?php 
function smarty_function_getapp($params, &$smarty)
{
	
	$version = new version();
	//echo date("Y-m-d H:i:s",strtotime("today"))."--".date("Y-m-d H:i:s",strtotime("tomorrow"))."--";
	if(strtolower($params['info']) == "android"){
		$app = $version->getAppLastVersion("android");
		
		return $app ? $app["NAME_FILE"] : "#";  
	}
	if(strtolower($params['info']) == "iphone"){
		
		$app = $version->getAppLastVersion("iphone");
		return $app ? $app["NAME_FILE"] : "#";
		//return  $totalVisitNum;
	}
	return "#";
	
}

?>