<?php
/**
* Create On 2014-6-11 下午5:30:52
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class urpinfo extends Model{
	
	/**
	 * 根据学号或者职工号获取信息
	 * @param unknown $code
	 * @return boolean|unknown
	 */
	public function getInfoByCode($code){
		$sql = "SELECT `v_bks`.* FROM `v_bks` WHERE `v_bks`.`bks_code` = '".$code."' ";
		$row = $this->fetchRow($sql);
		if ($row){
			$flag = 0;
		}else{
			$sql = "SELECT `v_jzg`.* FROM `v_jzg` WHERE `v_jzg`.`jzg_code` = '".$code."' ";
			$row = $this->fetchRow($sql);
			if ($row){
				$flag = 1;
			}else{
				return false;
			}
		}
		if ($row){
			$college = new college();
			$major = new major();
			if ($flag){
				$result['role_id'] = "8";
				$result['fu_username'] = $code;
				$result['fu_realname'] = $row['jzg_name'];
				$college_info = $college->getDetailByName($row['jzg_college']);
				$result['fu_sfzh'] = $row['jzg_sfzh'];
				if ($college_info){
					$college_id = $college_info['college_id'];
				}else{
					if ($row['jzg_college'] == "化工学院"){
						$college_info = $college->getDetailByName("化学学院");
						$college_id = $college_info['college_id'];
					}else if ($row['jzg_college'] == "精密仪器与光电子工程学院"){
						$college_info = $college->getDetailByName("电子信息与光学工程学院");
						$college_id = $college_info['college_id'];
					}else{
						$college_id = 'NULL';
					}
				}
				$result['fu_college'] = $college_id;
			}else{
				$result['role_id'] = "7";
				$result['fu_username'] = $code;
				$result['fu_realname'] = $row['bks_name'];
				$result['fu_gender'] = ($row['bks_gender'] == "女") ? 1 : 0;
				$result['fu_grade'] = $row['bks_grade'];
				$major_info = $major->getDetailByName($row['bks_major']);
				if ($major_info){
					$major_id = $major_info['major_id'];
				}else{
					$major_id = 'NULL';
				}
				$result['fu_major'] = $major_id;
				$college_info = $college->getDetailByName($row['bks_college']);
				if ($college_info){
					$college_id = $college_info['college_id'];
				}else{
					if ($row['bks_college'] == "化工学院"){
						$college_info = $college->getDetailByName("化学学院");
						$college_id = $college_info['college_id'];
					}else if ($row['bks_college'] == "精密仪器与光电子工程学院"){
						$college_info = $college->getDetailByName("电子信息与光学工程学院");
						$college_id = $college_info['college_id'];
					}else{
						$college_id = 'NULL';
					}
				}
				$result['fu_college'] = $college_id;
				$result['fu_sfzh'] = $row['bks_sfzh'];
				$result['fu_mz'] = $row['bks_mz'];
				$result['fu_politic'] = $row['bks_politic'];
				$result['fu_birth'] = $row['bks_birth'];
				$result['fu_nianzhi'] = $row['bks_nianzhi'];
			}
			return $result;
		}else{
			return false;
		}
	}
	
	/**
	 * 获取某个专业某个班级的总人数
	 * @param unknown $majorName
	 * @param unknown $grade
	 */
	public function getSameMajorNum($majorName, $grade){
		$sql = "SELECT COUNT(*) AS NUM FROM `v_bks` WHERE `bks_grade` = '".$grade."' AND `bks_major` = '".$majorName."' ";
		return $this->fetchAll($sql);
	}
	
	/**
	 * 验证是否存在
	 * @param unknown $code
	 * @param unknown $majorName
	 * @param unknown $grade
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getSameStu($code,$major, $grade){
		$mj = new major();
		$mj_row = $mj->getDetailById($major);
		$sql = "SELECT * FROM `v_bks` WHERE `bks_code` = '".$code."' AND `bks_grade` = '".$grade."' AND `bks_major` = '".$mj_row['major_name']."'";
		return $this->fetchRow($sql);
	}
	
	public function getStu($code,$major, $grade){
    $mj = new major();
    $mj_row = $mj->getDetailById($major);
    $sql = "SELECT `bks_code`,`bks_name`,`bks_gender`,`bks_grade`,`bks_college`,`bks_major` FROM `v_bks` WHERE `bks_code` = '".$code."' AND `bks_grade` = '".$grade."' AND `bks_major` = '".$mj_row['major_name']."' ";
    return $this->fetchRow($sql);
}
    public function getStu_02($code,$major, $grade){
        $mj = new major();
        $mj_row = $mj->getDetailById($major);
        $sql = "SELECT `bks_code`,`bks_name`,`bks_gender`,`bks_grade`,`bks_college`,`bks_major` FROM `v_bks` WHERE `bks_name` = '".$code."' AND `bks_grade` = '".$grade."' AND `bks_major` = '".$mj_row['major_name']."' ";
        return $this->fetchAll($sql);
    }
	public function getPingshenStu($major, $grade){
		$sql = "SELECT * FROM `v_bks` WHERE  AND `bks_grade` = '".$grade."' AND `bks_major` = '".$major."'";
		return $this->fetchRow($sql);
	}
}