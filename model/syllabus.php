<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-16
 * Time: 下午4:38
 */

class syllabus extends Model{
    /**插入课程表*/
    public function addClassToMon($fu_id,$point,$class){
        $sql = "insert into syllabus(sy_userid,sy_number,sy_monday) values(".$fu_id.",".$point.",'".$class."')";
		var_dump($sql);
        return $this->insert($sql);
    }
    public function addClassToTue($fu_id,$point,$class){
        $sql = "insert into syllabus(sy_userid,sy_number,sy_tuesday) values(".$fu_id.",".$point.",'".$class."')";
        return $this->insert($sql);
    }
    public function addClassToWed($fu_id,$point,$class){
        $sql = "insert into syllabus(sy_userid,sy_number,sy_wednesday) values(".$fu_id.",".$point.",'".$class."')";
        return $this->insert($sql);
    }
    public function addClassToThu($fu_id,$point,$class){
        $sql = "insert into syllabus(sy_userid,sy_number,sy_thursday) values(".$fu_id.",".$point.",'".$class."')";
        return $this->insert($sql);
    }
    public function addClassToFri($fu_id,$point,$class){
        $sql = "insert into syllabus(sy_userid,sy_number,sy_friday) values(".$fu_id.",".$point.",'".$class."')";
        return $this->insert($sql);
    }
    public function addClassToSat($fu_id,$point,$class){
        $sql = "insert into syllabus(sy_userid,sy_number,sy_saturday) values(".$fu_id.",".$point.",'".$class."')";
        return $this->insert($sql);
    }
    public function addClassToSun($fu_id,$point,$class){
        $sql = "insert into syllabus(sy_userid,sy_number,sy_sunday) values(".$fu_id.",".$point.",'".$class."')";
        return $this->insert($sql);
    }

    /**更新课程表*/
    public function updateClassToMon($fu_id,$point,$class){
        $sql = "update syllabus set sy_monday = '".$class."' where sy_userid = ".$fu_id." and sy_number = ".$point;
        return $this->update($sql);
    }
    public function updateClassToTue($fu_id,$point,$class){
        $sql = "update syllabus set sy_tuesday = '".$class."' where sy_userid = ".$fu_id." and sy_number = ".$point;
        return $this->update($sql);
    }
    public function updateClassToWed($fu_id,$point,$class){
        $sql = "update syllabus set sy_wednesday = '".$class."' where sy_userid = ".$fu_id." and sy_number = ".$point;
        return $this->update($sql);
    }
    public function updateClassToThu($fu_id,$point,$class){
        $sql = "update syllabus set sy_thursday = '".$class."' where sy_userid = ".$fu_id." and sy_number = ".$point;
        return $this->update($sql);
    }
    public function updateClassToFri($fu_id,$point,$class){
        $sql = "update syllabus set sy_friday = '".$class."' where sy_userid = ".$fu_id." and sy_number = ".$point;
        return $this->update($sql);
    }
    public function updateClassToSat($fu_id,$point,$class){
        $sql = "update syllabus set sy_saturday = '".$class."' where sy_userid = ".$fu_id." and sy_number = ".$point;
        return $this->update($sql);
    }
    public function updateClassToSun($fu_id,$point,$class){
        $sql = "update syllabus set sy_sunday = '".$class."' where sy_userid = ".$fu_id." and sy_number = ".$point;
        return $this->update($sql);
    }

    /**判断是否以存在已有几次记录*/
    public function ifExistSyllabus($fu_id,$point){
        $sql = "select * from syllabus where sy_userid = ".$fu_id." and sy_number = ".$point;
		echo "".$sql;
        return $this->fetchAll($sql);
    }

    /**取得课程表所有记录*/
    public function getSyllabusById($fu_id){
	
        $sql = "select * from syllabus where sy_userid = ".$fu_id." order by sy_number asc";
        //echo "".$sql;
		return $this->fetchAll($sql);
    }

    /**根据sy_id更新*/
    public function editMonSyllabusById($sy_id,$class){
        $sql = "update syllabus set sy_monday = '".$class."' where sy_id = ".$sy_id;
        return $this->update($sql);
    }
    public function editTueSyllabusById($sy_id,$class){
        $sql = "update syllabus set sy_tuesday = '".$class."' where sy_id = ".$sy_id;
        return $this->update($sql);
    }
    public function editWedSyllabusById($sy_id,$class){
        $sql = "update syllabus set sy_wednesday = '".$class."' where sy_id = ".$sy_id;
        return $this->update($sql);
    }
    public function editThuSyllabusById($sy_id,$class){
        $sql = "update syllabus set sy_thursday = '".$class."' where sy_id = ".$sy_id;
        return $this->update($sql);
    }
    public function editFriSyllabusById($sy_id,$class){
        $sql = "update syllabus set sy_friday = '".$class."' where sy_id = ".$sy_id;
        return $this->update($sql);
    }
    public function editSatSyllabusById($sy_id,$class){
        $sql = "update syllabus set sy_saturday = '".$class."' where sy_id = ".$sy_id;
        return $this->update($sql);
    }
    public function editSunSyllabusById($sy_id,$class){
        $sql = "update syllabus set sy_sunday = '".$class."' where sy_id = ".$sy_id;
        return $this->update($sql);
    }
	 /**根据sy_id删除*/
    public function delMonSyllabusById($sy_id){
        $sql = "update syllabus set sy_monday = '' where sy_id = ".$sy_id;
        return $this->update($sql);
    }
    public function delTueSyllabusById($sy_id){
        $sql = "update syllabus set sy_tuesday = '' where sy_id = ".$sy_id;
        return $this->update($sql);
    }
    public function delWedSyllabusById($sy_id){
        $sql = "update syllabus set sy_wednesday = '' where sy_id = ".$sy_id;
        return $this->update($sql);
    }
    public function delThuSyllabusById($sy_id){
        $sql = "update syllabus set sy_thursday = '' where sy_id = ".$sy_id;
        return $this->update($sql);
    }
    public function delFriSyllabusById($sy_id){
        $sql = "update syllabus set sy_friday = '' where sy_id = ".$sy_id;
        return $this->update($sql);
    }
    public function delSatSyllabusById($sy_id){
        $sql = "update syllabus set sy_saturday = '' where sy_id = ".$sy_id;
        return $this->update($sql);
    }
    public function delSunSyllabusById($sy_id){
        $sql = "update syllabus set sy_sunday = '' where sy_id = ".$sy_id;
        return $this->update($sql);
    }

    /**初始化课程表*/
    public function createSyllabus($id){
        $sql = "insert syllabus(sy_userid,sy_number) values(".$id.",1)";
        $this->insert($sql);
        $sql = "insert syllabus(sy_userid,sy_number) values(".$id.",2)";
        $this->insert($sql);
        $sql = "insert syllabus(sy_userid,sy_number) values(".$id.",3)";
        $this->insert($sql);
        $sql = "insert syllabus(sy_userid,sy_number) values(".$id.",4)";
        $this->insert($sql);
        $sql = "insert syllabus(sy_userid,sy_number) values(".$id.",5)";
        $this->insert($sql);
        $sql = "insert syllabus(sy_userid,sy_number) values(".$id.",6)";
        $this->insert($sql);
        $sql = "insert syllabus(sy_userid,sy_number) values(".$id.",7)";
        $this->insert($sql);
        $sql = "insert syllabus(sy_userid,sy_number) values(".$id.",8)";
        $this->insert($sql);
        $sql = "insert syllabus(sy_userid,sy_number) values(".$id.",9)";
        $this->insert($sql);
        $sql = "insert syllabus(sy_userid,sy_number) values(".$id.",10)";
        $this->insert($sql);
        $sql = "insert syllabus(sy_userid,sy_number) values(".$id.",11)";
        $this->insert($sql);
        $sql = "insert syllabus(sy_userid,sy_number) values(".$id.",12)";
        $this->insert($sql);
    }
   //设置课程表默认课程表不开启
    public function setsyllabus($id){
        $sql = "insert if_syllabus(stu_id,if_open) values(".$id.",0)";
         $this->insert($sql);
    }

    //获取课程表是否开启
    public function getsyllabus($id){
        $sql="select * from if_syllabus where stu_id='".$id."' ";
        return $this->fetchRow($sql);
    }

    public function  update_ifopen($id,$if_open){
        if($if_open==0){
            $flag=1;
        }else{
            $flag=0;
        }
        $sql = "update if_syllabus set if_open = '".$flag."'  where  stu_id= $id";
        return $this->update($sql);
    }

}