<?php
/**
* Create On 2014-4-16 ����11:08:18
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class adminrole extends Model{
	
	/** 
	 * 添加管理员和角色
	 * @param unknown_type $adminId
	 * @param unknown_type $roleId
	 */
	public function addAminrole($adminId, $roleId){
		$sql = "INSERT INTO `admin_role` (`ar_id`, `admin_id`, `role_id`) VALUES (NULL, '".$adminId."', '".$roleId."');";
		return $this->insert($sql);
	}
	
	/**
	 * 根据管理员Id获取
	 * @param unknown_type $adminId
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getAdminroleByAdminId($adminId){
		$sql = "SELECT `admin_role`.*, `role`.`role_name` FROM `admin_role` "
			 . "LEFT JOIN `role` ON `admin_role`.`role_id` = `role`.`role_id` "
			 . "WHERE `admin_role`.`admin_id` = '".$adminId."'";
		//echo $sql;
		return $this->fetchAll($sql);
	}

	public function delAdminroleByAdminId($adminId){
		$sql = "DELETE FROM `admin_role` WHERE `admin_role`.`admin_id` = '".$adminId."'";
		return $this->del($sql);
	}

    //修改用户信息
    public function  updateAdminInfo($id,$college){
        $sql="update admin set admin_college=$college where admin_id=$id";
        return$this->update($sql);
    }
}
