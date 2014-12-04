<?php
/**
* Create On 2014-4-21 ����3:10:26
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class aaa extends Model{
	
	/**
	 * 添加活动
	 * @param unknown_type $title
	 * @param unknown_type $theme
	 * @param unknown_type $content
	 * @param unknown_type $address
	 * @param unknown_type $class
	 * @param unknown_type $starttime
	 * @param unknown_type $endtime
	 * @param unknown_type $type
	 * @param unknown_type $level
	 * @param unknown_type $scale
	 * @param unknown_type $keywords
	 * @param unknown_type $dutyPerson
	 * @param unknown_type $isApproval
	 * @param unknown_type $isRecommend
	 * @param unknown_type $createId
	 * @param unknown_type $lon
	 * @param unknown_type $lat
	 * @return Ambigous <boolean, number>
	 */

    public function  getInfo($code){
        $sql="select * from  v_bks where  bks_code=$code";
        return $this->fetchRow($sql);
    }


	public function setInfo($code,$name,$gender,$sfzh,$grade,$college,$major){

	 $sql = "INSERT INTO `v_bks` "
				. "(`bks_code`, `bks_name`, `bks_gender`, `bks_sfzh`, `bks_grade`, `bks_college`, `bks_major`) "
		 		 . "VALUES "
		 		 		. "($code, '".$name."', '".$gender."', '".$sfzh."', '".$grade."', '".$college."', '".$major."');";
		return $this->insert($sql);
	}
	
	
	

   
}
?>