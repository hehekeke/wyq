<?php
class growthprofile extends Model{
	
	public function getgpt(){
		$sql = "SELECT `gpt_id`,`gpt_name` FROM `growth_profile_type`";
		return $this->fetchAll($sql);
	}
	
	public function getgprofilexx($userID,$gpt_id){
		$sql = "SELECT * FROM `growth_profile` WHERE `growth_profile`.`fu_id`='".$userID."' AND `growth_profile`.`gpt_id`='".$gpt_id."' order by gp_id desc limit 0,5    ";
		return $this->fetchAll($sql);
	}

    //自己添加
    public function getgprofileByExport($userID,$gpt_id){
        $sql = "SELECT * FROM `growth_profile` WHERE `growth_profile`.`fu_id`='".$userID."' AND `growth_profile`.`gpt_id`='".$gpt_id."'order by gp_id desc";
        return $this->fetchAll($sql);
    }
    //自己添加
    public  function getgprofile($userID,$gpt_id){
        $sql = "SELECT * FROM `growth_profile` WHERE `growth_profile`.`fu_id`='".$userID."' AND `growth_profile`.`gpt_id`='".$gpt_id."'";
        return $this->fetchAll($sql);
    }
    //自己添加
    public function getgprofilePageModel($start_time,$end_time,$userID,$gpt_id,$page = 1 , $num = 10, $flag = 0){
        if($flag){
            $sql = "SELECT * FROM `growth_profile` left join growth_profile_type on growth_profile.gpt_id = growth_profile_type.gpt_id WHERE `growth_profile`.`fu_id`='".$userID."' AND `growth_profile`.`gpt_id`='".$gpt_id."'and gp_create_time between ".$start_time." and ".$end_time." order by gp_create_time desc";
            return $this->fetchAll($sql);
        }else{
            $sql = "SELECT * FROM `growth_profile` left join growth_profile_type on growth_profile.gpt_id = growth_profile_type.gpt_id WHERE `growth_profile`.`fu_id`='".$userID."' AND `growth_profile`.`gpt_id`='".$gpt_id."' and gp_create_time between ".$start_time." and ".$end_time." order by gp_create_time desc LIMIT ".($page-1)*$num.",".$num."";
            $list = $this->fetchAll($sql);
            $filter=" `growth_profile`.`fu_id`='".$userID."' AND `growth_profile`.`gpt_id`='".$gpt_id."' and gp_create_time between ".$start_time." and ".$end_time;
            $total = $this->getTotal('growth_profile',$filter);
            $totalPage = ceil($total / $num);
            return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
        }
    }

    //自己添加
    public function getgprofilePageModelAll($fu_grade,$userID,$gpt_id,$page = 1 , $num = 10, $flag = 0){
        if($flag){
            $sql = "SELECT * FROM `growth_profile` left join growth_profile_type on growth_profile.gpt_id = growth_profile_type.gpt_id WHERE `growth_profile`.`fu_id`='".$userID."' AND `growth_profile`.`gpt_id`='".$gpt_id."' order by gp_create_time desc";
            return $this->fetchAll($sql);
        }else{
            $sql = "SELECT * FROM `growth_profile` left join growth_profile_type on growth_profile.gpt_id = growth_profile_type.gpt_id WHERE `growth_profile`.`fu_id`='".$userID."' AND `growth_profile`.`gpt_id`='".$gpt_id."' order by gp_create_time desc LIMIT ".($page-1)*$num.",".$num."";
            $list = $this->fetchAll($sql);
            $filter=" `growth_profile`.`fu_id`='".$userID."' AND `growth_profile`.`gpt_id`='".$gpt_id."'";
            $total = $this->getTotal('growth_profile',$filter);
            $totalPage = ceil($total / $num);
            return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
        }
    }
    //自己添加
    public function getGptIdByGptName($gpt_name){
        $sql = "SELECT `gpt_id` FROM `growth_profile_type` where gpt_name= '".$gpt_name."'";
        return $this->fetchAll($sql);
    }
    //自己添加
    public function addGp($fu_id,$gpt_id,$content,$year,$time,$rule){
        $sql="insert into growth_profile(fu_id,gpt_id,gp_content,grade_id,gp_create_time,rule) values(".$fu_id.",".$gpt_id.",'".$content."','".$year."','".$time."',".$rule.") ";
        return $this->insert($sql);
    }
    //自己添加
    public function editGp($gp_id,$gp_content,$rule){
        $sql="update growth_profile set gp_content = '".$gp_content."',rule = ".$rule." where gp_id = ".$gp_id;
        return $this->update($sql);
    }
    //自己添加
    public function getgprofileByYear($userID,$gpt_id,$start_time,$end_time){
        $sql = "SELECT * FROM `growth_profile` WHERE `growth_profile`.`fu_id`='".$userID."' AND `growth_profile`.`gpt_id`='".$gpt_id."'and gp_create_time between ".$start_time." and ".$end_time." order by gp_id desc limit 0,5 ";
        return $this->fetchAll($sql);
    }
    //自己添加
    public function getAllProfileById($userID){
        $sql =  $sql = "SELECT * FROM `growth_profile` WHERE `growth_profile`.`fu_id`= ".$userID;
        return $this->fetchAll($sql);
    }

    //自己添加
    public function getGrowthProfileByMajorGrade($fu_major,$fu_grade){
        $sql = "select * from growth_profile g left join front_user f on g.fu_id = f.fu_id where fu_major = ".$fu_major." and fu_grade = ".$fu_grade." order by gp_create_time desc limit 0,2";
        return $this->fetchAll($sql);
    }
    //自己添加
    public function getGrowthProfileByAll(){
        $sql = "select * from growth_profile g left join front_user f on g.fu_id = f.fu_id  order by gp_create_time desc limit 0,2";
        return $this->fetchAll($sql);
    }
    //自己添加
    public function getGrowthProfileByCollege($college){
        $sql = "select * from growth_profile g left join front_user f on g.fu_id = f.fu_id where fu_college = ".$college." order by gp_create_time desc limit 0,2";
        return $this->fetchAll($sql);
    }

    //自己添加
    public function getCollegeNameById($college_id){
        $sql = "select college_name from college where college_id = ".$college_id;
        return $this->fetchAll($sql);
    }
    //自己添加
    public function getMajorNameById($major_id){
        $sql = "select major_name from major where major_id = ".$major_id;
        return $this->fetchAll($sql);
    }
    //8-30
    public function getgprofilePageModelAll2($fu_grade,$userID,$gpt_id,$page = 1 , $num = 10, $flag = 0){
        if($flag){
            $sql = "SELECT * FROM `growth_profile` left join growth_profile_type on growth_profile.gpt_id = growth_profile_type.gpt_id WHERE rule = 0 and `growth_profile`.`fu_id`='".$userID."' AND `growth_profile`.`gpt_id`='".$gpt_id."' order by gp_create_time desc";
            return $this->fetchAll($sql);
        }else{
            $sql = "SELECT * FROM `growth_profile` left join growth_profile_type on growth_profile.gpt_id = growth_profile_type.gpt_id WHERE rule = 0 and `growth_profile`.`fu_id`='".$userID."' AND `growth_profile`.`gpt_id`='".$gpt_id."' order by gp_create_time desc LIMIT ".($page-1)*$num.",".$num."";
            $list = $this->fetchAll($sql);
            $filter=" `growth_profile`.`fu_id`='".$userID."' AND rule = 0 and  `growth_profile`.`gpt_id`='".$gpt_id."'";
            $total = $this->getTotal('growth_profile',$filter);
            $totalPage = ceil($total / $num);
            return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
        }
    }
    public function getgprofilePageModel2($start_time,$end_time,$userID,$gpt_id,$page = 1 , $num = 10, $flag = 0){
        if($flag){
            $sql = "SELECT * FROM `growth_profile` left join growth_profile_type on growth_profile.gpt_id = growth_profile_type.gpt_id WHERE rule = 0 and `growth_profile`.`fu_id`='".$userID."' AND `growth_profile`.`gpt_id`='".$gpt_id."'and gp_create_time between ".$start_time." and ".$end_time." order by gp_create_time desc";
            return $this->fetchAll($sql);
        }else{
            $sql = "SELECT * FROM `growth_profile` left join growth_profile_type on growth_profile.gpt_id = growth_profile_type.gpt_id WHERE rule = 0 and `growth_profile`.`fu_id`='".$userID."' AND `growth_profile`.`gpt_id`='".$gpt_id."' and gp_create_time between ".$start_time." and ".$end_time." order by gp_create_time desc LIMIT ".($page-1)*$num.",".$num."";
            $list = $this->fetchAll($sql);
            $filter=" `growth_profile`.`fu_id`='".$userID."' AND rule = 0 and `growth_profile`.`gpt_id`='".$gpt_id."' and gp_create_time between ".$start_time." and ".$end_time;
            $total = $this->getTotal('growth_profile',$filter);
            $totalPage = ceil($total / $num);
            return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
        }
    }

    //8-31
    public function getArticleStartTimeByYear($str,$fu_college){
        $sql = "select article_begin_time from article where article_type =3 and article_isnew = 0  and article_xuenian = '".$str."'";
        return $this->fetchRow($sql);
    }
    public function getAchievementsTime(){
        $sql  =  "select ss_personal_achievements_time from system_setting ";
        return $this->fetchRow($sql);
    }
    public function addGpReadNum($fu_id){
        $sql = "update growth_profile set gp_read_num = gp_read_num + 1 where fu_id = ".$fu_id;
        return $this->update($sql);
    }
}