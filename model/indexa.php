<?php
/**
* Create On 2014-6-6 下午1:48:44
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class indexa extends Model{
    public function setMydb(){
        $sql02="select * from user_score where asspro_id=8";
        $result02=$this->fetchAll($sql02);
        var_dump(count($result02));
        for($j=0;$j<count($result02);$j++){
            $fu_id=$result02[$j]['fu_id'];
            $sql03="select * from front_user where fu_id=$fu_id";
            $result03=$this->fetchRow($sql03);
            var_dump($result03['fu_college']);
        }
    }
     public function getMydb(){
             $asspro_id=14;
             $college_id=17;
             $sql02="select * from front_user where fu_college=$college_id ";
             $result02=$this->fetchAll($sql02);
         var_dump(count($result02));
            for($j=0;$j<count($result02);$j++){
                $fu_id=$result02[$j]['fu_id'];
                 $sql03="update user_score  set asspro_id=$asspro_id where fu_id=$fu_id";
                 $result03=$this->update($sql03);
            }
     }

         public function mmm(){
             $sql02="select * from user_score where asspro_id=8";
             $result02=$this->fetchAll($sql02);
             for($j=0;$j<count($result02);$j++){
                 $us_id=$result02[$j]['us_id'];
                 $fu_id=$result02[$j]['fu_id'];
                 $sql03="select * from front_user where fu_id=$fu_id";
                 $result03=$this->fetchRow($sql03);
                 $college=$result03['fu_college'];
                 $sql_04="select * from assessment_project where asspro_college=$college";
                 $result04=$this->fetchRow($sql_04);
                 $asspro_id=$result04['asspro_id'];
                 $sql05="update user_score  set asspro_id=$asspro_id where us_id=$us_id";
                 $result05=$this->update($sql05);
                 if($result05){
                     var_dump("chenggong");
                 }else{
                     var_dump('0');
                 }
             }
         }


}