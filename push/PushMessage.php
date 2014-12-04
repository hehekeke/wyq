<?php
include_once 'been/Push.class.php';
class PushMessage extends Push
{
	public $pusherID;
	
	/**
	 * 
	 * @param unknown_type $pushConf
	 */
	public function __construct($pushConf){
		//print_r($pushConf);
		parent::__construct($pushConf["pushServerUrl"],$pushConf["pushKey"]);
		$this->pusherID = $pushConf["codePusher"];
	}
	
	/**
	 * 关注
	 * @param unknown_type $token
	 * @param unknown_type $title
	 * @param unknown_type $content
	 * @param unknown_type $msgType
	 * @param unknown_type $userID
	 * @param unknown_type $userName
	 * @return Ambigous <NULL, multitype:NULL >
	 */
	public function pushAttentionMsg($token, $title, $content, $msgType, $userID, $userName)
	{
		$param = array();
		$param['id'] = $userID;
		$param['name'] = $userName;
		$param['type'] = $msgType;
		return $this->push2Terminals($this->pusherID, $token, $title, $content, $param);
	}
	
	/**
	 * 资质审核推送
	 * @param unknown_type $title
	 * @param unknown_type $content
	 * @param unknown_type $msgType
	 */
	public function pushQualificationMsg($token,$title, $content, $msgType)
	{
		$param = array();
		$param['type'] = $msgType;
		return $this->push2Terminals($this->pusherID, $token, $title, $content, $param);
	}
	
	/**
	 * 审核消息推送
	 * @param unknown_type $title
	 * @param unknown_type $content
	 * @param unknown_type $msgType
	 * @param unknown_type $ID
	 * @return Ambigous <NULL, multitype:NULL >
	 */
	public function pushVerifyMsg($token, $title, $content, $msgType, $ID){
		$param = array();
		$param['type'] = $msgType;
		$param['id'] = $ID;
		return $this->push2Terminals($this->pusherID, $token, $title, $content, $param);
	}
	
	public function pushMsg($token, $title, $content, $msgType, $url)
	{
		//var_dump($this->pusherID);
		$param = array();
		$param['url'] = $url;
		$param['type'] = $msgType;
		return $this->push2Terminals($this->pusherID, $token, $title, $content, $param);
	}
}