<?php
/**
* Create On 2014-4-18 ����9:21:26
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class friendlink extends Model{
	
	/**
	 * 添加友情链接
	 * @param unknown_type $url
	 * @param unknown_type $name
	 * @param unknown_type $adminId
	 */
	public function addLink($url, $name, $adminId){
		$sql = "INSERT INTO `nkgn`.`friend_link` "
			 . "(`fl_id`, `fl_link`, `fl_name`, `fl_create_admin_id`, `fl_create_time`, `fl_istop`) "
			 . "VALUES "
			 . "(NULL, '".$url."', '".$name."', '".$adminId."',NOW(), NULL);";
		return $this->insert($sql);
	}
	
	/**
	 * 根据ID编辑友情链接
	 * @param unknown_type $flId
	 * @param unknown_type $url
	 * @param unknown_type $name
	 * @return resource
	 */
	public function updateLinkById($flId, $url, $name){
		$sql = "UPDATE `friend_link` SET `fl_link` = '".$url."', `fl_name` = '".$name."' WHERE `friend_link`.`fl_id` = '".$flId."';";
		//echo $sql;
		return $this->update($sql);
	}
	
	/**
	 * 根据ID删除友情链接
	 * @param unknown_type $flId
	 * @return resource
	 */
	public function delLink($flId){
		$sql = "DELETE FROM `friend_link` WHERE `friend_link`.`fl_id` = '".$flId."'";
		return $this->del($sql);
	}
	/**
	 * 获取友情链接列表(分页)
	 * @param unknown_type $page
	 * @param unknown_type $num
	 * @return multitype:unknown number Ambigous <boolean, multitype:>
	 */
	public function getLinklistPageModel($page = 1, $num = 10){
		$sql = "SELECT `friend_link`.*, `admin`.`admin_realname` FROM `friend_link` "
			 . "LEFT JOIN `admin` ON `friend_link`.`fl_create_admin_id` = `admin`.`admin_id` "
			 . "ORDER BY `friend_link`.`fl_istop` DESC, `friend_link`.`fl_create_time` DESC "
			 . "Limit ".($page-1)*$num.",".$num.";";
		$sqlTotal = "SELECT `friend_link`.*, `admin`.`admin_realname` FROM `friend_link` "
			      . "LEFT JOIN `admin` ON `friend_link`.`fl_create_admin_id` = `admin`.`admin_id` "
			      . "ORDER BY `friend_link`.`fl_istop` DESC, `friend_link`.`fl_create_time` DESC ";
		$list = $this->fetchAll($sql);
		$total = count($this->fetchAll($sqlTotal));
		$totalPage = ceil($total / $num);
		return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}
	
	/**
	 * 根据ID置顶
	 * @param unknown_type $flId
	 * @return resource
	 */
	public function setTop($flId){
		$sql = "UPDATE `friend_link` SET `fl_istop` = NOW() WHERE `friend_link`.`fl_id` = '".$flId."';";
		return $this->update($sql);
	}
	
	/**
	 * 取消置顶
	 * @param unknown_type $flId
	 * @return resource
	 */
	public function cancelTop($flId){
		$sql = "UPDATE `friend_link` SET `fl_istop` = NULL WHERE `friend_link`.`fl_id` = '".$flId."';";
		return $this->update($sql);
	}
	
	/**
	 * 根据ID获取友情链接详情
	 * @param unknown_type $flId
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getLinkDetailById($flId){
		$sql = "SELECT `friend_link`.*, `admin`.`admin_realname` FROM `friend_link` "
			 . "LEFT JOIN `admin` ON `friend_link`.`fl_create_admin_id` = `admin`.`admin_id` "
			 . "WHERE `fl_id` = '".$flId."'";
		return $this->fetchRow($sql);
	}
}
