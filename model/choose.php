<?php
/**
* Create On 2014-5-18 下午3:01:09
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class choose extends Model{
	/**
	 * 添加选项
	 * @param unknown $exId
	 * @param unknown $content
	 * @param unknown $score
	 * @return Ambigous <boolean, number>
	 */
	public function addChoose($exId, $content, $score){
		$sql = "INSERT INTO `choose` (`ch_id`, `ex_id`, `ch_content`, `ch_score`) "
			 . "VALUES "
			 . "(NULL, '".$exId."', '".$content."', '".$score."');";
		return $this->insert($sql);
	}
	
	/**
	 * 根据题目ID删除选项
	 * @param unknown $exId
	 * @return resource
	 */
	public function delChoose($exId){
		$sql = "DELETE FROM `choose` WHERE `choose`.`ex_id` = '".$exId."'";
		return $this->del($sql);
	}
	
	/**
	 * 根据题目id获取选项
	 * @param unknown $exId
	 */
    public function getChooselistByExid($exId){
        $sql = "SELECT * FROM `choose` WHERE `ex_id` = '".$exId."'";
        return $this->fetchAll($sql);
    }
	/**
	 * 通过选项id获得分数
	 * @param unknown_type $ch_id
	 * @return Ambigous <>
	 */
	public function getscore($ch_id){
		$sql = "select `choose`.`ch_score` from `choose` where `ch_id` = '".$ch_id."'";
		$result = $this->fetchRow($sql);
		return $result['ch_score'];
	}
}