<?php
/**
* Create On 2014-3-25 ����4:40:49
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class college extends Model{
	
	public function getCollegePageModel($page = 1 , $num = 10, $flag = 0){
		if($flag){
			$sql = "SELECT * FROM `college`";
			return $this->fetchAll($sql);
		}else{
			$sql = "SELECT * FROM `college` LIMIT ".($page-1)*$num.",".$num." ";
			$list = $this->fetchAll($sql);
			$total = $this->getTotal('college');
			$totalPage = ceil($total / $num);
			return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
		}
	}
	
	public function addCollege($collName){
		$sql = "INSERT INTO `college` (`college_id`, `college_name`) VALUES (NULL, '".$collName."');";
		return $this->insert($sql);
	}
	
	public function editCollege($collId, $collName){
		$sql = "UPDATE `college` SET `college_name` = '".$collName."' WHERE `college`.`college_id` = '".$collId."';";
		return $this->update($sql);
	}
	
	public function delCollegeById($collId){
		$sql = "DELETE FROM `college` WHERE `college`.`college_id` = '".$collId."'";
		return $this->del($sql);
	}
	
	public function getDetailById($collId){
		$sql = "SELECT * FROM `college` WHERE `college`.`college_id` = '".$collId."'";
		return $this->fetchRow($sql);
	}
	
	public function reCheck($collName, $collId = 0){
		if ($collId){
			$sql = "SELECT * FROM `college` WHERE `college_id` != '".$collId."' AND `college_name` = '".$collName."'";
		}else{
			$sql = "SELECT * FROM `college` WHERE `college_name` = '".$collName."'";
		}
		return $this->fetchAll($sql);
	}
	
	public function getDetailByName($collName){
		$sql = "SELECT * FROM `college` WHERE `college`.`college_name` = '".$collName."'";
		return $this->fetchRow($sql);
	}
	
	public function setState($id, $state){
		$sql = "UPDATE `college` SET `college_isstate` = '".$state."' WHERE `college`.`college_id` = '".$id."';";
		return $this->update($sql);
	}

    public function setState02($id, $state,$isnew){
        if($isnew==0){
            $sql = "UPDATE `college` SET `college_isstate` = '".$state."' WHERE `college`.`college_id` = '".$id."';";
        }else{
            $sql = "UPDATE `college` SET `college_xsstate` = '".$state."' WHERE `college`.`college_id` = '".$id."';";
        }

        return $this->update($sql);
    }

    public function getAllCollege(){
        $sql="select * from college ";
        return $this->fetchAll($sql);
    }

    //文件上传
    public function uploadfile($filename,$fileUrl,$filetype){
        $sql="insert into `file` (`file_name`,`file_link`,`file_type`) values('".$filename."','".$fileUrl."','".$filetype."')";
        return $this->insert($sql);
    }
   //关联活动和文件的id
    public  function  addass_file($id,$file_id){
        $sql="insert into `assessment_file` (`assessment_id`,`file_id`) values('".$id."','".$file_id."')";
        return $this->insert($sql);
    }

  //获取上传文件的id
    public  function getAllass_file($id){
        $sql="select * from  assessment_file where assessment_id=$id";
        return $this->fetchAll($sql);
    }
  //获取上传的文件
    public function  getfile_rel($af_id){
        $sql="select * from file where file_id=$af_id";
        return $this->fetchRow($sql);
    }
}
