<?php
/**
* Create On 2014-4-28 ����5:17:22
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class personalachievements extends Model{
	
	/**
	 * 添加个人成果类型
	 * @param unknown_type $title
	 * @param unknown_type $adminId
	 * @param unknown_type $preId
	 * @return Ambigous <boolean, number>
	 */
    public function addPA($title){
        $sql = "INSERT INTO `growth_profile_type` (gpt_name,gpt_create_time) values ('".$title."', NOW())";
        return $this->insert($sql);
    }
	
	/**
	 * 编辑个人成果类型
	 * @param unknown_type $id
	 * @param unknown_type $title
	 * @return resource
	 */
    public function editPA($name,$id){
        $sql = "UPDATE `growth_profile_type` SET `gpt_name` = '".$name."' WHERE gpt_id = '".$id."';";
        return $this->update($sql);
    }

    //自己添加，删除个人成果类型
    public function deleteById($id){
        $sql = "delete  from growth_profile_type where gpt_id = ".$id;
        return $this->del($sql);
    }
	
	/**
	 * 获取个人成果类型列表
	 * @return Ambigous <boolean, multitype:>
	 */
    public function getList(){
        $sql = "SELECT * FROM `growth_profile_type` ";
        return $this->fetchAll($sql);
    }
	
	/**
	 * 获取详情
	 * @param unknown_type $id
	 * @return Ambigous <boolean, multitype:>
	 */
    public function getDetail($id){
        $sql = "SELECT * FROM `growth_profile_type` WHERE `gpt_id` = '".$id."'";
        return $this->fetchRow($sql);
    }
}
