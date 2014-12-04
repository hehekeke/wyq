<?php
/**
* Create On 2014-4-18 ����3:22:57
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class setting extends Model{
	
	/**
	 * 获取系统设置
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getSystemSetting(){
		$sql = "SELECT * FROM `system_setting` ";
		return $this->fetchAll($sql);
	}
	
	/**
	 * 修改logo图片
	 * @param unknown_type $picId
	 * @return resource
	 */
	public function updataLogo($picId){
		$sql = "UPDATE `system_setting` SET `ss_logo` = '".$picId."' WHERE `system_setting`.`ss_id` = '1';";
		return $this->update($sql);
	}
	
	/**
	 * 修改个人成果填写截止时间
	 * @param unknown_type $day
	 * @return resource
	 */
	public function updatePAT($day){
		$sql = "UPDATE `system_setting` SET `ss_personal_achievements_time` = '".$day."' WHERE `system_setting`.`ss_id` = '1';";
		return $this->update($sql);
	}
	
	/**
	 * 修改是否允许查看其他学院评估进度
	 * @param unknown_type $isAllow
	 * @return resource
	 */
	public function updateVOC($isAllow){
		$sql = "UPDATE `system_setting` SET `ss_view_other_college` = '".$isAllow."' WHERE `system_setting`.`ss_id` = '1';";
		return $this->update($sql);
	}
	
	/**
	 * 修改是否允许所有用户查看所有人自我规划
	 * @param unknown_type $isAllow
	 * @return resource
	 */
	public function updateVASP($isAllow){
		$sql = "UPDATE `system_setting` SET `ss_view_all_self_planning` = '".$isAllow."' WHERE `system_setting`.`ss_id` = '1';";
		return $this->update($sql);
	}
	
	/**
	 * 修改是否允许辅导员查看本学院所有班级自我规划
	 * @param unknown_type $isAllow
	 * @return resource
	 */
	public function updateVOCSP($isAllow){
		$sql = "UPDATE `system_setting` SET `ss_view_own_college_self_planning` = '".$isAllow."' WHERE `system_setting`.`ss_id` = '1';";
		return $this->update($sql);
	}
	
	/**
	 * 修改学期开始填写规划时间
	 * @param unknown_type $day
	 * @return resource
	 */
	public function updateBPT($day){
		$sql = "UPDATE `system_setting` SET `ss_begin_planning_time` = '".$day."' WHERE `system_setting`.`ss_id` = '1';";
		return $this->update($sql);
	}
}
