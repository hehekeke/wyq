<?php
/**
* Create On 2014-6-6 下午1:48:44
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class zbdj extends Model{
	/**
	 * 编辑评估项目等级
	 * @param unknown $id
	 * @param unknown $name
	 */
	public function editZbdj($id, $name){
		$sql = "UPDATE `zbdj` SET `zbdj_name` = '".$name."' WHERE `zbdj`.`zbdj_id` = '".$id."';";
		return $this->update($sql);
	}
	
	/**
	 * 获取评估项目等级列表
	 */
	public function getZbdjList(){
		$sql = "SELECT * FROM `zbdj` LIMIT 0, 3 ";
		return $this->fetchAll($sql);
	}
	
	public function getTitle(){
		$sql = "SELECT `zbdj`.`zbdj_name` FROM `zbdj`";
		
		return $this->fetchAll($sql);
	}
	
	/**
	 * 获取详情
	 * @param unknown $id
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getDetail($id){
		$sql = "SELECT * FROM `zbdj` WHERE `zbdj_id` = '".$id."'";
		return $this->fetchRow($sql);
	}
}