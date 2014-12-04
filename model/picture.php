<?php
class picture extends Model {
	
	/**
	 * 添加图片
	 * 
	 * @param unknown_type $pictype        	
	 * @param unknown_type $piclink        	
	 */
	public function addPic($pictype, $piclink) {
		$sql = "INSERT INTO `picture` (`pic_id`, `pic_type`, `pic_link`) VALUES (NULL, '" . $pictype . "', '" . $piclink . "');";

		return $this->insert ( $sql );
	}
	/**
	 * 删除图片
	 * 
	 * @param unknown_type $pid        	
	 * @return resource
	 */
	public function delpic($pid) {
		$sql = "DELETE FROM `picture` WHERE `picture`.`pic_id` = '" . $pid . "'";
		// echo $sql;
		return $this->del ( $sql );
	}
	
	/**
	 * 根据ID获取图片详情
	 * 
	 * @param unknown_type $picId        	
	 */
	public function getPicById($picId) {
		$sql = "SELECT * FROM `picture` WHERE `pic_id` = '" . $picId . "' ";
		return $this->fetchRow ( $sql );
	}


    /**  */
    public function add_activity_registration_picture($reg_num,$pic_num){
        $sql="insert into activity_registration_picture (activity_registration_id,pic_id) value ($reg_num,$pic_num)";
        return $this->insert($sql);
    }
	/**
	 * 更新轮播获取最新的四个轮播
	 * 
	 * @param unknown_type $picId        	
	 */
	  public function get_lastest_picture(){
        $sql="select * from picture where 1=1 order by pic_id desc limit 0,4";
        return $this->fetchall($sql);
    }
	 
}