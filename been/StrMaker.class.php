<?php
/**
*  
*  Create On 2013-9-10����12:00:57
*  Author lidianbin
*  QQ: 281443751
*  Email: lidianbin@iwind-tech.com
**/
class StrMarker{
	
	//截取字符串
	public static function cut_str_utf($string, $length,$adder="…") {
		preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $info);
		$wordscut="";
		$j=0;
		for($i=0; $i<count($info[0]); $i++) {
			$wordscut .= $info[0][$i];
			$j = ord($info[0][$i]) > 127 ? $j + 2 : $j + 1;
			if ($j > $length - 1) {
				return $wordscut.$adder;
			}
		}
		return join('', $info[0]);
	}
	
	
	/**
	 * 过滤字符串防止被恶意代码攻击
	 * @param 要过滤的字符串
	 * @return 过滤后的字符串
	 */
	public static function filterSomeBadTag($str){
 
		if (!get_magic_quotes_gpc()) {    // 判断magic_quotes_gpc是否为打开  
			$str = addslashes($str);    // 进行magic_quotes_gpc没有打开的情况对提交数据的过滤  
		}  
		$str = str_replace("_", "\_", $str);    // 把 '_'过滤掉  
		$str = str_replace("%", "\%", $str);    // 把 '%'过滤掉  
		$str = nl2br($str);    // 回车转换  
		$str = htmlspecialchars($str);    // html标记转换  
		return $str;    
	}
	
	/**
	 * 检查是否含有非法字符
	 * @param unknown_type $sql_str
	 * @return boolean
	 */
	public static function haveInjectTag($sql_str){
		return eregi('select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);
	}
	
	
	
}
