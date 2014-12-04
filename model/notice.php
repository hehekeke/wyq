<?php
class notice extends Model{
    /**
     * 通知公告类型
     */
    public function getnotice(){
		$sql = "SELECT * FROM `notice` LEFT JOIN notice_type ON notice_type.nt_id = notice.nt_id ORDER BY `notice`.`notice_create_time` DESC LIMIT 4";
		return $this->fetchAll($sql);
	}

    public function getNoticeTypeList(){
        $sql = "select * from notice_type";
        return $this->fetchAll($sql);
    }

    public function getNoticeTypeById($id){
        $sql = "select * from notice_type where nt_id = ".$id;
        return $this->fetchAll($sql);

    }

    public function ntEditById($nt_id,$nt_name){
        $sql="update notice_type set nt_name = "."'".$nt_name."'"." where nt_id = ".$nt_id;
        return $this->update($sql);
    }

    public function ntAdd($nt_name,$nt_time){
        $sql="insert into notice_type(nt_name,nt_create_time) values('".$nt_name."','".$nt_time."') ";
        return $this->insert($sql);
    }

    public function ntDeleteById($id){
       $sql="delete from notice_type where nt_id = ".$id;
        return $this->del($sql);
    }

    /**
     * 通知公告
    */


    public  function getNoticePageModel($page = 1 , $num = 10, $flag = 0){
        if($flag){
			$sql = "select * from notice n left join file f on n.file_id=f.file_id left join notice_type t on n.nt_id=t.nt_id order by n.notice_create_time desc";
			return $this->fetchAll($sql);
		}else{
           $sql = "select * from notice n left join file f on n.file_id=f.file_id left join notice_type t on n.nt_id=t.nt_id order by n.notice_create_time desc LIMIT ".($page-1)*$num.",".$num." ";
            $list = $this->fetchAll($sql);
            $total = $this->getTotal('notice');
            $totalPage = ceil($total / $num);
            return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
        }
    }

    public function addNotice($type,$title,$content,$time,$file_id){
		if($file_id===null){
			$sql="insert into notice(notice_title,notice_content,nt_id,notice_create_time) values('".$title."','".$content."','".$type."','".$time."')";
		}else{
			 $sql="insert into notice(notice_title,notice_content,nt_id,file_id,notice_create_time) values('".$title."','".$content."','".$type."','".$file_id."','".$time."')";
		}       
        return $this->insert($sql);
    }

    public function getNoticeById($id){
       $sql="select * from notice n left join notice_type t on n.nt_id=t.nt_id "
		." left join file on file.file_id=n.file_id"
		." where notice_id = ".$id;
        return $this->fetchAll($sql);
    }

    public function delNoticeById($id){

        $sql="delete from notice where notice_id = ".$id;
        return $this->del($sql);
    }

    public  function  noticeEditById($title,$content,$nt_id,$file_id,$time,$id){
		if($file_id!==null){
			$sql="update notice set notice_title='".$title."',notice_content='".$content."',nt_id='".$nt_id."',file_id='".$file_id."',notice_create_time='".$time."' where notice_id=".$id;
		}else{
			$sql="update notice set notice_title='".$title."',notice_content='".$content."',nt_id='".$nt_id."',notice_create_time='".$time."' where notice_id=".$id;
		}       
        return $this->update($sql);
    }
	//上传文件
	public function moveFile($name,$filename){
		$extend = pathinfo($filename);
		$extend = strtolower($extend["extension"]); 
		$sql="insert into file (`file_name`,`file_type`,`file_link`) values('".$name."','".$extend."','".$filename."')";
		return $this->insert($sql);
	}

    //自己添加
    public function getNoticeReadNumById($notice_id){
        $sql = "select  notice_read_num from notice where notice_id = ".$notice_id;
        return $this->fetchAll($sql);
    }
    //自己添加
    public function updadeReadNum($notice_id,$notice_read_num){
        $sql = "update notice set notice_read_num = ".$notice_read_num." where notice_id = ".$notice_id;
        return $this->update($sql);
    }
    //自己添加
    public function getHotNotice(){
        $sql = "select * from notice n left join notice_type t on n.nt_id=t.nt_id order by notice_read_num desc limit 0,4";
        return $this->fetchAll($sql);
    }
    //自己添加
    public function getPreNotice($notice_id){
        $sql = "select  * from notice n left join notice_type t on n.nt_id=t.nt_id where notice_id = (select MAX(notice_id) from notice where notice_id < ".$notice_id.") ";
        return $this->fetchAll($sql);
    }
    //自己添加
    public function getNextNotice($notice_id){
        $sql = "select  * from notice n left join notice_type t on n.nt_id=t.nt_id where notice_id = (select MIN(notice_id) from notice where notice_id > ".$notice_id.") ";
        return $this->fetchAll($sql);
    }
    //8-26
    public function getNoticeTypeIdByName(){
        $sql = "select * from notice_type where nt_name = '其他'";
        return $this->fetchRow($sql);
    }
    //更新上传文件
    public function updateMoveFile($name,$old_file_id,$filename){
        $extend = pathinfo($filename);
        $extend = strtolower($extend["extension"]);
        $sql="update file set file_name = '".$name."',file_type = '".$extend."',file_link = '".$filename."' where file_id = ".$old_file_id;
        return $this->insert($sql);
    }

}