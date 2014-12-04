<?php
/**
* Create On 2014-4-15 ����9:24:57
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/

class role extends Model{
	
	/**
	 * 获取后台角色列表
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getRoleList(){
		$sql = "SELECT * FROM `role` WHERE `role`.`role_flag` = '0' AND `role_id` != 1";
		return $this->fetchAll($sql);
	}
	/**
	 * 添加后台角色
	 * @param unknown_type $roleName
	 * @return Ambigous <boolean, number>
	 */
	public function addRole($roleName, $roleIntro){
		$sql = "INSERT INTO `role` (`role_id`, `role_name`, `role_intro`, `role_flag`) VALUES (NULL, '".$roleName."', '".$roleIntro."', '0');";
		return $this->insert($sql);
	}
	
	/**
	 * 修改后台角色
	 * @param unknown_type $roleId
	 * @param unknown_type $roleNmae
	 * @return resource
	 */
	public function editRole($roleId, $roleNmae, $roleIntro){
		$sql = "UPDATE `role` SET `role_name` = '".$roleNmae."', `role_intro` = '".$roleIntro."' WHERE `role`.`role_id` = '".$roleId."';";
		return $this->update($sql);
	}
	
	/**
	 * 删除角色
	 * @param unknown_type $roleId
	 * @return resource
	 */
	public function delRole($roleId){
		$this->delResourceToRole($roleId);
		$sql = "DELETE FROM `role` WHERE `role`.`role_id` = '".$roleId."'";
		return $this->del($sql);
	}
	
	/**
	 * 删除用户的某项权限
	 * @param unknown_type $roleId
	 * @param unknown_type $ctrlId
	 * @return resource
	 */
	public function delResourceToRole($roleId,$ctrlId = NULL){
		if($ctrlId){
			$sql = "DELETE FROM `acl` WHERE `role_id` = '".$roleId."' AND `ctrl_id` = '".$ctrlId."'  LIMIT 1";
		}else{
			$sql = "DELETE FROM `acl` WHERE `role_id` = '".$roleId."'";
		}
		return $this->del($sql);
	}
	/**
	 * 获取用户的所有权限
	 * @param unknown_type $roleId
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getResourceOfRole($roleId){
		$sql = "SELECT `acl`.`ctrl_id`,`acl`.`role_id`, `controller`.`ctrl_name`,`controller`.`ctrl_class` "
			 . "FROM `acl`,`controller` "
			 . "WHERE `acl`.`ctrl_id` = `controller`.`ctrl_id` AND  `acl`.`role_id` = '".$roleId."' "
			 . "ORDER BY `controller`.`ctrl_order` DESC ";
		//echo $sql;
		return $this->fetchAll($sql);
	}
	
	/**
	 * 通过ctrl的id获取他的所有action
	 * @param unknown_type $rs_id
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getActionList($rs_id){
		$sql = "SELECT * FROM  `action` WHERE  `ctrl_id` =".$rs_id ;
		return $this->fetchAll($sql);
	}
	
	/**
	 * 获取所有controller
	 */
	public function getCtrlList(){
		$sql = "SELECT * FROM `controller` ";
		return $this->fetchAll($sql);
	}
	
	/**
	 * 给指定的角色增加权限
	 * @param unknown_type $roleId
	 * @param unknown_type $rsId
	 * @return Ambigous <boolean, number>
	 */
	public function addResourceToRole($roleId,$ctrlId){
		$sql = "INSERT INTO `acl` (`role_id` ,`ctrl_id`)VALUES ('".$roleId."', '".$ctrlId."') ";
		return $this->insert($sql);
	}
	
	
	/**
	 * 查重
	 * @param unknown_type $roleName
	 * @param unknown_type $roleId
	 * @return Ambigous <boolean, multitype:>
	 */
	public function reCheck($roleName, $roleId = 0){
		if ($roleId){
			$sql = "SELECT * FROM `role` WHERE `role_id` != '".$roleId."' AND `role_name` = '".$roleName."'";
		}else{
			$sql = "SELECT * FROM `role` WHERE `role_name` = '".$roleName."'";
		}
		return $this->fetchAll($sql);
	}
	
	/**
	 * 获取某个角色使用的用户
	 * @param unknown_type $roleId
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getAdminByRoleId($roleId){
		$sql = "SELECT `admin_id` FROM `admin` WHERE `role_id` = '".$roleId."'";
		return $this->fetchAll($sql);
	}
	
	/**
	 * 根据ID获取角色
	 * @param unknown_type $roleId
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getRoleByRoleId($roleId){
		$sql = "SELECT * FROM `role` WHERE `role_id` = '".$roleId."'";
		return $this->fetchRow($sql);
	}
}
