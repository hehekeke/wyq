<?php
/** 承办方方法 */

class undertake extends Model{
    /** 查重 */
    public function  reCheck($undertakeName){
        $sql="SELECT * FROM `undertake` WHERE `undertake_name`='".$undertakeName."'";
        return $this->fetchAll($sql);

    }
    /** 添加承办者 */
    public function addUndertake($undertakeName){
      $sql="INSERT INTO `undertake`  (`undertake_name`,`undertake_create_time`) VALUES ('".$undertakeName."',NOW())";

      return $this->insert($sql);
    }
    /** 获取承办者列表 */
    public function getUndertakeList(){
       $sql="SELECT * FROM `undertake`" ;
       return $this->fetchAll($sql);
    }
    /** 删除承办方信息 */
    public function delUndertake($undertakeid){
        $sql="DELETE FROM undertake where `undertake_id`='".$undertakeid."'";
        return $this->del($sql);
    }
    /** 获取修改的承办方的信息 */
    public function  getUndertakeOne($id){
        $sql="SELECT * FROM `undertake` WHERE `undertake_id`='".$id."'";
        return $this->fetchRow($sql);
    }
    /** 修改承办方信息 */
    public function  modifyundertake($id,$undertakename){
        $sql="UPDATE `undertake` SET `undertake_name`='".$undertakename."' WHERE `undertake_id`='".$id."'";
        return $this->update($sql);
    }

}