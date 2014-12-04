<?php
/** 主办方方法 */

class organizers extends Model{
    /** 查重 */
    public function  reCheck($organizersName){
        $sql="SELECT * FROM `organizers` WHERE `organizers_name`='".$organizersName."'";
        return $this->fetchAll($sql);

    }
    /** 添加主办者 */
    public function addorganizers($organizersName){
        $sql="INSERT INTO `organizers`  (`organizers_name`,`organizers_create_time`) VALUES ('".$organizersName."',NOW())";

        return $this->insert($sql);
    }
    /** 获取主办者列表 */
    public function getOrganizerslist(){
        $sql="SELECT * FROM `organizers`" ;
        return $this->fetchAll($sql);
    }
    /** 删除主办方信息 */
    public function delOrganizers($organizersid){
        $sql="DELETE FROM organizers where `organizers_id`='".$organizersid."'";
        return $this->del($sql);
    }
    /** 获取修改的主办方的信息 */
    public function  getOrganizersOne($id){
        $sql="SELECT * FROM `organizers` WHERE `organizers_id`='".$id."'";
        return $this->fetchRow($sql);
    }
    /** 修改主办方信息 */
    public function  modifyOrganizers($id,$organizersname){
        $sql="UPDATE `organizers` SET `organizers_name`='".$organizersname."' WHERE `organizers_id`='".$id."'";
        return $this->update($sql);
    }

}