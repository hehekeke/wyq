<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-4
 * Time: 下午3:18
 */
class adminmessage extends Model{

    public function getmessagelist($page,$pageSize=10,$id,$xuenian='',$riqi='',$zhuangtai=''){
        $select = "select * from admin_message where admin_id=$id and if_flag!=2 ";
        $where = " and 1";
        if($xuenian!==0){
            $where .= " and xuenian = '".$xuenian."'";
        }
        if($riqi!==0){
            $where .= " and create_time = '".$riqi."'";
        }
        if($zhuangtai ==12){
            $where .= " and if_flag =1";
        }
        if($zhuangtai ==11){
            $where .= " and if_flag =0";
        }

        $order=  " order by create_time desc  limit ".($page-1)*$pageSize.",".$pageSize."";
        $sql = $select.$where;
        $sql2=$select.$where.$order;
        $list = $this->fetchAll($sql2);
        $total = count($this->fetchAll($sql));
        $totalPage = ceil($total / $pageSize);
        return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }

    //消息标志为已读
    public  function  setmessage($id,$flag){
        if($flag==1){
            $sql="update  admin_message set if_flag=1  where `id`='".$id."'";
            $this->update($sql);
            $sql02="select * from admin_message where id=$id";
            return $this->fetchRow($sql02);
        }else if($flag==2){
            $sql="update  admin_message set if_flag=1  where `id`='".$id."'";
             return $this->update($sql);
        }else{
            $sql="update  admin_message set if_flag=2  where `id`='".$id."'";
            return $this->update($sql);
        }
    }
}