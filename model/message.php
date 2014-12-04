<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-18
 * Time: 下午2:52
 */
class message extends Model{

    public function getMessageById($id){
        $sql = "select * from comment c left join front_user f on c.comment_user_id=f.fu_id where if_read = 0 and parent_user_id = ".$id." order by comment_id desc";
        return $this->fetchAll($sql);
    }

    public function delMessageById($mes_id){
        $sql ="update  message set if_read = 2 where mes_id =".$mes_id ;
        return $this->del($sql);
    }
    //8-24
    public function addMessage($id,$activity_id,$mes_type,$mes_content,$mes_create_time){
        $sql = "insert into message(fu_id,activity_id,mes_type,mes_content,mes_create_time) values(".$id.",".$activity_id.",".$mes_type.",'".$mes_content."','".$mes_create_time."')";
        return $this->insert($sql);
    }
    public function getAllMessageById($id){
        $sql = "select * from message m left join activity a on m.activity_id=a.activity_id where if_read != 2 and a.activity_remove = 1 and fu_id = ".$id." order by mes_create_time desc";
        return $this->fetchAll($sql);
    }
    public function getMessageByTypeFuidAcId($fu_id,$activity_id){
        $sql = "select * from message where mes_type = 0 and activity_id = ".$activity_id." and fu_id = ".$fu_id;
        return $this->fetchAll($sql);
    }
    //8-28
    public function readMessage($mes_id){
        $sql = "update message set if_read =1 where mes_id = ".$mes_id;
        return $this->update($sql);
    }
    public function getNotReadMessageCountById($id){
        $sql = "select count(*) from message m left join activity a on m.activity_id = a.activity_id  where  a.activity_remove = 1 and if_read = 0 and fu_id = ".$id;
        return $this->fetchRow($sql);
    }
    public function getMessagePageModel($id,$page=1,$num=10){
        $sql = "select * from message m left join activity a on m.activity_id=a.activity_id where m.if_read != 2 and a.activity_remove = 1 and fu_id = ".$id." order by mes_create_time desc LIMIT ".($page-1)*$num.",".$num." ";
        $list = $this->fetchAll($sql);
        $sqlTotal = "select count(*) as num from message m left join activity a on m.activity_id = a.activity_id where  m.if_read != 2 and fu_id = ".$id." and a.activity_remove = 1 ";
        $total = $this->fetchRow($sqlTotal);
        $total = $total["num"];
        $totalPage = ceil($total / $num);
        return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }
}