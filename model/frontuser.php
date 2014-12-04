<?php
/**
* Create On 2014-4-16 ����2:22:16
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/

class frontuser extends Model{
	
	/**
	 * 用户登录
	 * @param unknown $userName
	 * @param unknown $pw
	 * @return Ambigous <boolean, multitype:>|Ambigous <Ambigous, boolean, number>|boolean
	 */
	public function getUserAccount($userName, $pw){
		$info = $this->getUserByUserName($userName);
		if ($info){
			$password = $this->generatePw($pw, $info['fu_salt']);
			$sql = "SELECT * FROM `front_user` LEFT JOIN picture ON front_user.pic_id = picture.pic_id "
				 . "WHERE `fu_username` = '".$userName."' AND `fu_pw` = '".$password."' ";
			$result = $this->fetchRow($sql);
			if ($result){
				return $result;
			}else{
				return false;	
			}
		}else{
			$urp_info = new urpinfo();
			$result = $urp_info->getInfoByCode($userName);
			if ($result){
				if ($result['role_id'] == 8){
					if (strlen($result['fu_sfzh']) >= 6){
						$password = substr($result['fu_sfzh'], -6);
					}else{
						$password = "111111";
					}
					$fu_id = $this->addFrontuser($result['fu_username'], $result['fu_realname'], $result['role_id'], 'NULL', $result['fu_sfzh'], $password, NULL, 'NULL', $result['fu_college']);
					$result['fu_id'] = $fu_id;
				}else{
					if (strlen($result['fu_sfzh']) >= 6){
						$password = substr($result['fu_sfzh'], -6);
					}else{
						$password = "111111";
					}
					$fu_id = $this->addFrontuser($result['fu_username'], $result['fu_realname'], $result['role_id'], $result['fu_gender'], $result['fu_sfzh'], $password, NULL, $result['fu_major'], $result['fu_college'], $result['fu_grade'], $result['fu_mz'], $result['fu_birth'], $result['fu_nianzhi']);
					$result['fu_id'] = $fu_id;
				}
				if ($pw == $password){
					return $result;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}		
	}
	/**
	 * 验证用户
	 * @param unknown $userName
	 * @return boolean
	 */
	public function authUser($userName){
		$result = $this->getUserByUserName($userName, 1);
		if ($result){
			return $result;
		}else{
			$urp_info = new urpinfo();
			$result = $urp_info->getInfoByCode($userName);
			if ($result){
				if ($result['role_id'] == 8){
					if (strlen($result['fu_sfzh']) >= 6){
						$pw = substr($result['fu_sfzh'], -6);
					}else{
						$pw = "111111";
					}
					$fu_id = $this->addFrontuser($result['fu_username'], $result['fu_realname'], $result['role_id'], 'NULL', $result['fu_sfzh'], $pw, NULL, 'NULL', $result['fu_college']);
					$result['fu_id'] = $fu_id;
				}else{
					if (strlen($result['fu_sfzh']) >= 6){
						$pw = substr($result['fu_sfzh'], -6);
					}else{
						$pw = "111111";
					}
					$fu_id = $this->addFrontuser($result['fu_username'], $result['fu_realname'], $result['role_id'], $result['fu_gender'], $result['fu_sfzh'], $pw, NULL, $result['fu_major'], $result['fu_college'], $result['fu_grade'], $result['fu_mz'], $result['fu_birth'], $result['fu_nianzhi']);
					$result['fu_id'] = $fu_id;
				}
				return $result;
			}else{
				return false;
			}
		}
	}
	
	public function searchStudent($username, $major, $grade){
        $sql01="select * from major where major_id=$major";
        $major_info=$this->fetchRow($sql01);
        $w1 = $major_info['major_name'];
        $sql="select * from v_bks where bks_grade=$grade and  bks_major='$w1' and bks_name='$username'";
        $result = $this->fetchAll($sql);

        if ($result){
            return $result;
        }else{
            return false;
        }
     }
    public function searchStudent_02($username, $major, $grade){
        $sql01="select * from major where major_id=$major";
        $major_info=$this->fetchRow($sql01);
        $w1 = $major_info['major_name'];
        $sql="select * from v_bks where bks_grade=$grade and  bks_major='$w1' and bks_name='$username'";
        $result = $this->fetchAll($sql);

        if ($result){
            return $result;
        }else{
            return false;
        }
    }

    public function searchStudent_03( $major, $grade,$page=1,$num=10){
        $sql01="select * from major where major_id=$major";
        $major_info=$this->fetchRow($sql01);
        $w1 = $major_info['major_name'];
        $sqltotle="select * from v_bks where bks_grade=$grade and  bks_major='$w1'";
        $sql="select * from v_bks where bks_grade=$grade and  bks_major='$w1' LIMIT ".($page-1)*$num.",".$num."";
        $total =count($this->fetchAll($sqltotle));
        $totalPage = ceil($total / $num);
        $list = $this->fetchAll($sql);
       if ($list){
            return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
        }else{
            return false;
        }
    }

	public function getBeidafengStu($username, $major, $grade){
		$sql = "SELECT * FROM `front_user` WHERE `fu_username` = '".$username."' AND `fu_major` = '".$major."' AND `fu_grade` = '".$grade."'";
		$result = $this->fetchRow($sql);
		if ($result){
			return $result;
		}else{
			$urp_info = new urpinfo();
			$mj = new major();
			$mj_row = $mj->getDetailById($major);
			$result = $urp_info->getSameStu($username, $mj_row['major_id'], $grade);
			if ($result){
				return $result;
			}else {
				return false;
			}
		}
	}


	/**
	 * 根据用户账号获取用户信息
	 * @param unknown_type $userName
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getUserByUserName($userName, $roleflag= 0){
		if ($roleflag){
			$sql = "SELECT * FROM `front_user` LEFT JOIN picture ON front_user.pic_id = picture.pic_id
				WHERE `fu_username` = '".$userName."' AND `role_id` != '11' ";
		}else{
			$sql = "SELECT * FROM `front_user` LEFT JOIN picture ON front_user.pic_id = picture.pic_id
				WHERE `fu_username` = '".$userName."'";
		}
		return $this->fetchRow($sql);
	}
	
	/**
	 * 根据用户id获取用户信息
	 * @param unknown_type $userName
	 * @return Ambigous <boolean, multitype:>
	 */

    //自己做了修改，添加了select role_id
    public function getUserByUserID($userID){
        $sql = "SELECT  front_user.pic_id,front_user.role_id, `front_user`.`fu_username`,`front_user`.`fu_realname`,`front_user`.`fu_username`,`front_user`.`fu_id`,`front_user`.`fu_major`,`front_user`.`fu_college`,`front_user`.`fu_grade`,`major`.`major_name`,`college`.`college_name` FROM `front_user` LEFT JOIN picture ON front_user.pic_id = picture.pic_id LEFT JOIN major ON front_user.fu_major = major.major_id LEFT JOIN college ON front_user.fu_college = college.college_id
				WHERE `fu_id` = ".$userID."";
        return $this->fetchRow($sql);
    }

    public function getStudentByMajor($fu_major,$fu_grade,$fu_realname){
        $sql = "select * from front_user left join picture ON front_user.pic_id = picture.pic_id LEFT JOIN major ON front_user.fu_major = major.major_id LEFT JOIN college ON front_user.fu_college = college.college_id
                where role_id = 7 and fu_major = ".$fu_major." and fu_grade = ".$fu_grade." and fu_realname like '%".$fu_realname."%'";
        return $this->fetchAll($sql);
    }

    public function getStudentPageModelByMajor($major_name,$fu_grade,$fu_realname,$page = 1 , $num = 10, $flag = 0){
        if($flag){
            $sql = "select * from v_bks v left join front_user f ON v.bks_code = f.fu_username  left join major m on v.bks_major = m.major_name left join college c on v.bks_college = c.college_name
               where bks_major = '".$major_name."' and bks_grade = ".$fu_grade." and bks_name like '%".$fu_realname."%'";
            return $this->fetchAll($sql);
        }else{
            $sql = $sql = "select * from v_bks v left join front_user f ON v.bks_code = f.fu_username left join major m on v.bks_major = m.major_name left join college c on v.bks_college = c.college_name
               where bks_major = '".$major_name."' and bks_grade = ".$fu_grade." and bks_name like '%".$fu_realname."%' LIMIT ".($page-1)*$num.",".$num." ";
            $list = $this->fetchAll($sql);
            $filter="bks_major = '".$major_name."' and bks_grade = ".$fu_grade." and bks_name like '%".$fu_realname."%'";
            $total = $this->getTotal('v_bks',$filter);
            $totalPage = ceil($total / $num);
            return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
        }
    }

    public function getStudentPageModelByMajorA($major_name,$fu_realname,$page = 1 , $num = 10, $flag = 0){
        if($flag){
            $sql = "select * from v_bks v left join front_user f ON v.bks_code = f.fu_username left join major m on v.bks_major = m.major_name left join college c on v.bks_college = c.college_name
               where bks_major = '".$major_name."'  and bks_name like '%".$fu_realname."%'";
            return $this->fetchAll($sql);
        }else{
            $sql = $sql = "select * from v_bks v left join front_user f ON v.bks_code = f.fu_username left join major m on v.bks_major = m.major_name left join college c on v.bks_college = c.college_name
               where bks_major = '".$major_name."' and bks_name like '%".$fu_realname."%' LIMIT ".($page-1)*$num.",".$num." ";
            $list = $this->fetchAll($sql);
            $filter="bks_major = '".$major_name."' and bks_name like '%".$fu_realname."%'";
            $total = $this->getTotal('v_bks',$filter);
            $totalPage = ceil($total / $num);
            return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
        }
    }

    public function getStudentByCollege($fu_college,$major_id,$fu_realname){
        $sql = "select * from front_user left join picture ON front_user.pic_id = picture.pic_id LEFT JOIN major ON front_user.fu_major = major.major_id LEFT JOIN college ON front_user.fu_college = college.college_id
                where role_id = 7 and fu_college = ".$fu_college." and fu_realname like '%".$fu_realname."%' and major_id like '%".$major_id."%'";
        return $this->fetchAll($sql);
    }

    public function getStudentPageModelByCollege($grade,$college_name,$major_name,$fu_college,$major_id,$fu_realname,$page = 1 , $num = 10, $flag = 0){

        if($flag){
            $sql ="select * from v_bks v left join front_user f ON v.bks_code = f.fu_username left join major m on v.bks_major = m.major_name left join college c on v.bks_college = c.college_name
                where  c.college_id = ".$fu_college." and bks_name like '%".$fu_realname."%' and m.major_id like '%".$major_id."%' and bks_grade like '%".$grade."%' ";
            return $this->fetchAll($sql);
        }else{
            $sql = "select * from v_bks v left join front_user f ON v.bks_code = f.fu_username left join major m on v.bks_major = m.major_name left join college c on v.bks_college = c.college_name
                where c.college_id = ".$fu_college." and bks_name like '%".$fu_realname."%' and m.major_id like '%".$major_id."%' and bks_grade like '%".$grade."%' LIMIT ".($page-1)*$num.",".$num." ";
            $list = $this->fetchAll($sql);
            $filter="  bks_college = '".$college_name."' and bks_name like '%".$fu_realname."%' and bks_major like '%".$major_name."%' and bks_grade like '%".$grade."%' ";
            $total = $this->getTotal('v_bks',$filter);
            $totalPage = ceil($total / $num);
            return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
        }
    }

    public function getStudentByAll($college_id,$grade,$major_id,$fu_realname){
        $sql = "select * from front_user left join picture ON front_user.pic_id = picture.pic_id LEFT JOIN major ON front_user.fu_major = major.major_id LEFT JOIN college ON front_user.fu_college = college.college_id
                where role_id = 7 and fu_realname like '%".$fu_realname."%' and fu_major like '%".$major_id."%' and fu_college like '%".$college_id."%' and fu_grade like '%".$grade."%'";
        return $this->fetchAll($sql);
    }

    public  function getStudentPageModel($page = 1 , $num = 10, $flag = 0){
        if($flag){
            $sql ="select * from v_bks v left join front_user f ON v.bks_code = f.fu_username";

            return $this->fetchAll($sql);
        }else{
            $sql = "select * from v_bks v left join front_user f ON v.bks_code = f.fu_username  LIMIT ".($page-1)*$num.",".$num." ";

            $list = $this->fetchAll($sql);
            $filter="";
            $total = $this->getTotal('v_bks',$filter);
            $totalPage = ceil($total / $num);
            return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
        }
    }

    public function getStudentBySelect($college_id,$grade,$major_id,$fu_realname){
        if($college_id=='' && $major_id==''){
            $sql = "select * from front_user left join picture ON front_user.pic_id = picture.pic_id LEFT JOIN major ON front_user.fu_major = major.major_id LEFT JOIN college ON front_user.fu_college = college.college_id
                where role_id = 7 and fu_realname like '%".$fu_realname."%' and fu_grade like '%".$grade."%'";
        }else if($college_id==''){
            $sql = "select * from front_user left join picture ON front_user.pic_id = picture.pic_id LEFT JOIN major ON front_user.fu_major = major.major_id LEFT JOIN college ON front_user.fu_college = college.college_id
                where role_id = 7 and fu_realname like '%".$fu_realname."%' and fu_grade like '%".$grade."%' and fu_major =".$major_id;
        }else if($major_id==''){
            $sql = "select * from front_user left join picture ON front_user.pic_id = picture.pic_id LEFT JOIN major ON front_user.fu_major = major.major_id LEFT JOIN college ON front_user.fu_college = college.college_id
                where role_id = 7 and fu_realname like '%".$fu_realname."%' and fu_grade like '%".$grade."%' and fu_college =".$college_id;
        }else{
            $sql = "select * from front_user left join picture ON front_user.pic_id = picture.pic_id LEFT JOIN major ON front_user.fu_major = major.major_id LEFT JOIN college ON front_user.fu_college = college.college_id
                where role_id = 7 and fu_realname like '%".$fu_realname."%' and fu_major = ".$major_id." and fu_college = ".$college_id." and fu_grade like '%".$grade."%'";
        }
        return $this->fetchAll($sql);
    }

    public function getStudentPageModelBySel($college_name,$major_name,$college_id,$grade,$major_id,$fu_realname,$page = 1 , $num = 10, $flag = 0){

        if($college_id=='' && $major_id==''){
            if($flag){
                $sql = "select * from v_bks v left join front_user f ON v.bks_code = f.fu_username left join major m on v.bks_major = m.major_name left join college c on v.bks_college = c.college_name
                where  bks_name like '%".$fu_realname."%' and bks_grade like '%".$grade."%'";
                return $this->fetchAll($sql);
            }else{
                $sql = "select * from v_bks v left join front_user f ON v.bks_code = f.fu_username left join major m on v.bks_major = m.major_name left join college c on v.bks_college = c.college_name
                where  bks_name like '%".$fu_realname."%' and bks_grade like '%".$grade."%' limit ".($page-1)*$num.",".$num." ";
                $list = $this->fetchAll($sql);
                $filter=" bks_name like '%".$fu_realname."%' and bks_grade like '%".$grade."%'";
                $total = $this->getTotal('v_bks',$filter);
                $totalPage = ceil($total / $num);
                return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
            }
        }else if($college_id==''){
            if($flag){
                $sql =  "select * from v_bks v left join front_user f ON v.bks_code = f.fu_username left join major m on v.bks_major = m.major_name left join college c on v.bks_college = c.college_name
                where  bks_name like '%".$fu_realname."%' and bks_grade like '%".$grade."%' and m.major_id =".$major_id;
                return $this->fetchAll($sql);
            }else{
                $sql =  "select * from v_bks v left join front_user f ON v.bks_code = f.fu_username left join major m on v.bks_major = m.major_name left join college c on v.bks_college = c.college_name
                where bks_name like '%".$fu_realname."%' and bks_grade like '%".$grade."%' and m.major_id =".$major_id." limit ".($page-1)*$num.",".$num." ";
                $list = $this->fetchAll($sql);
                $filter= "bks_name like '%".$fu_realname."%' and bks_grade like '%".$grade."%' and m.bks_major = '".$major_name."'";
                $total = $this->getTotal('v_bks',$filter);
                $totalPage = ceil($total / $num);
                return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
            }
        }else if($major_id==''){
            if($flag){
                $sql =  "select * from v_bks v left join front_user f ON v.bks_code = f.fu_username left join major m on v.bks_major = m.major_name left join college c on v.bks_college = c.college_name
                where  bks_name like '%".$fu_realname."%' and bks_grade like '%".$grade."%' and c.college_id =".$college_id;
                return $this->fetchAll($sql);
            }else{
                $sql = "select * from v_bks v left join front_user f ON v.bks_code = f.fu_username left join major m on v.bks_major = m.major_name left join college c on v.bks_college = c.college_name
                where bks_name like '%".$fu_realname."%' and bks_grade like '%".$grade."%' and c.college_id =".$college_id." limit ".($page-1)*$num.",".$num." ";
                $list = $this->fetchAll($sql);
                $filter=" bks_name like '%".$fu_realname."%' and bks_grade like '%".$grade."%' and bks_college = '".$college_name."'";
                $total = $this->getTotal('v_bks',$filter);
                $totalPage = ceil($total / $num);
                return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
            }
        }else{
            if($flag){
                $sql = "select * from v_bks v left join front_user f ON v.bks_code = f.fu_username left join major m on v.bks_major = m.major_name left join college c on v.bks_college = c.college_name
                where  bks_name like '%".$fu_realname."%' and major_id = ".$major_id." and c.college_id = ".$college_id." and bks_grade like '%".$grade."%'";
                return $this->fetchAll($sql);
            }else{
                $sql = "select * from v_bks v left join front_user f ON v.bks_code = f.fu_username left join major m on v.bks_major = m.major_name left join college c on v.bks_college = c.college_name
                where bks_name like '%".$fu_realname."%' and major_id = ".$major_id." and c.college_id = ".$college_id." and bks_grade like '%".$grade."%' limit ".($page-1)*$num.",".$num." ";
                $list = $this->fetchAll($sql);
                $filter="  bks_name like '%".$fu_realname."%' and bks_major = '".$major_name."' and bks_college = '".$college_name."' and bks_grade like '%".$grade."%'";
                $total = $this->getTotal('v_bks',$filter);
                $totalPage = ceil($total / $num);
                return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
            }
        }


    }
	

	/**
	 * 更新个人信息
	 */
	public function updateInfo($userID, $fileID, $username) {
		if ($fileID && $username) {
			$sql = "UPDATE `front_user` SET (`pic_id` = $fileID, `fu_realname` = '$username') WHERE `fu_id` = $userID";
		} else if ($fileID) {
			$sql = "UPDATE `front_user` SET `pic_id` = $fileID WHERE `fu_id` = $userID";
		} else if ($username) {
			$sql = "UPDATE `front_user` SET `fu_realname` = '$username' WHERE `fu_id` = $userID";
		} else {
			return false;
		}
		return $this->update ( $sql );
	}
	

	
	/**
	 * 根据用户id获取用户信息
	 *
	 * @param unknown_type $userid
	 * @return Ambigous <boolean, multitype:>
	 */
	public function _getUserFromUserid($userid) {
		$sql = "SELECT * FROM  `front_user` WHERE  `fu_id` =  '" . $userid . "' LIMIT 1";
		//echo  $sql;
		return $this->fetchRow ( $sql );
	}
	
	public function getpw($id){
		$sql = "SELECT `fu_pw`,`fu_salt`,`fu_realname` FROM `front_user` WHERE `fu_id` = ".$id."";
		return $this->fetchRow ( $sql );
	}
	/**
	 * 生成加密后的密码
	 *
	 * @param unknown_type $pw
	 * @param unknown_type $salt
	 * @return string
	 */
	public function generatePw($pw, $salt) {
		return md5 ( md5 ( $pw . $salt ) );
	}
	
	public function getuserid($num){
		$sql = "SELECT `front_user`.`fu_id` FROM `front_user` WHERE `front_user`.`fu_realname` = '".$num."'";
		return $this->fetchRow($sql);
	}
	/**
	 * 获取一个随机生成的字符串
	 *
	 * @param unknown_type $username
	 */
	protected function _getSalt($str = "") {
		return substr ( md5 ( $str . time () ), 2, 16 );
	}
	
	public function getAllStu($major,$grade){
		$sql = "SELECT `front_user`.`fu_salt`,`front_user`.`fu_id`,`front_user`.`fu_username`,`front_user`.`fu_realname` From `front_user` WHERE `front_user`.`fu_major`='".$major."' AND `front_user`.`fu_grade`='".$grade."' AND `front_user`.`role_id`=7";
		return $this->fetchAll($sql);
	}
	

	
	public function getchaxun($username){
		$sql = "SELECT `front_user`.`fu_id`,`front_user`.`fu_salt`,`front_user`.`fu_username`,`front_user`.`fu_realname` From `front_user` WHERE `front_user`.`fu_username`=".$username."";
		return $this->fetchRow($sql);
	}
	
	public function getasspro($id){
		$sql = "SELECT `assessment_project`.`asspro_id`,`assessment_project`.`asspro_college` FROM `assessment_project` WHERE `assessment_project`.`asspro_create_user_id`='".$id."'";
		return $this->fetchRow($sql);
	}
	
	public function getPingshenMess($username){
		$sql = "SELECT `front_user`.`fu_id`,`front_user`.`fu_major`,`front_user`.`fu_grade` FROM `front_user`
				WHERE `front_user`.`fu_realname` = '".$username."'";
		return $this->fetchRow($sql);
	}
	

	
	/**
	 * 添加前台用户
	 * @param unknown $code
	 * @param unknown $name
	 * @param unknown $roleId
	 * @param unknown $gender
	 * @param string $type
	 * @param string $major
	 * @param string $college
	 * @param string $grade
	 * @param string $mz
	 * @param string $birth
	 * @param string $nianzhi
	 * @param string $picid
	 * @param string $createId
	 * @return Ambigous <boolean, number>
	 */
	public function addFrontuser($code, $name, $roleId, $gender, $sfzh, $pw = NULL, $type = NULL, $major = 'NULL', $college = 'NULL', $grade = NULL, $mz = NULL, $birth = NULL, $nianzhi = NULL, $picid = 'NULL', $createId = 'NULL'){
		$salt = $this->_getSalt ( $code );
		if ($pw){
			$passWord = $this->generatePw ( $pw, $salt );
		}else{
			$passWord = $this->generatePw ( "111111", $salt );
		}
		$sql = "INSERT INTO `front_user` "
			 . "(`fu_id`, `fu_username`, `fu_pw`, `fu_salt`, `fu_realname`, `fu_gender`, "
			 . "`fu_type`, `fu_major`, `fu_college`, `fu_grade`, `role_id`, `fu_sfzh`, `fu_mz`, `fu_birth`, "
			 . "`fu_nianzhi`, `pic_id`, `fu_islogin`, `fu_create_user_id`, `fu_create_time`) "
			 . "VALUES "
			 . "(NULL, '".$code."', '".$passWord."', '".$salt."', '".$name."', ".$gender.", "
			 . "'".$type."', ".$major.", ".$college.", '".$grade."', '".$roleId."', '".$sfzh."', '".$mz."', '".$birth."', "
			 . "'".$nianzhi."', ".$picid.", '0', ".$createId.", NOW());";
		//echo $sql;
		return $this->insert($sql);

	}
	
	
	/**
	 * 删除用户
	 * @param unknown_type $id
	 * @return resource
	 */
	public function delUser($id){
		$sql = "DELETE FROM `front_user` WHERE `front_user`.`fu_id` = '".$id."' ";
		return $this->del($sql);
	}
	
	/**
	 * 根据专业和年级获取评审委员
	 * @param unknown $college
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getPingshenList($major, $grade){
		$sql = "SELECT * FROM `front_user` WHERE `role_id` = 11 AND `fu_major` = '".$major."' AND `fu_grade` = '".$grade."'";
		//echo $sql;
		return $this->fetchAll($sql);
	}
	
	/**
	 * 批量删除评审委员
	 */
	public function delPswy(){
		$sql = "DELETE FROM `front_user` WHERE `front_user`.`role_id` = 11 ";
		return $this->del($sql);
	}
	/**
	 * 通过学号，查找fuid
	 * @param unknown_type $fu_username
	 * @return Ambigous <boolean, multitype:>
	 */
	public function zz_fu_id($fu_username){
		$sql = "select fu_id from front_user where fu_username = ".$fu_username;
		$info_res=$this->fetchRow($sql);
        if($info_res){
            return $info_res ['fu_id'];
        }else{
            $sql01 = "SELECT `v_bks`.* FROM `v_bks` WHERE `v_bks`.`bks_code` = '".$fu_username."'";
            $result = $this->fetchRow($sql01);
            if($result['bks_gender']=='男'){
                $sex=0;
            }else{
                $sex=1;
            }
            //获取学生的学院
            $sql_college="select * from college where college_name='".$result['bks_college']."'";
            $college_info=$this->fetchRow($sql_college);
            //获取学生的专业
            $sql_major="select * from major where major_name='".$result['bks_major']."'";
            $major_info=$this->fetchRow($sql_major);
            $password = substr($result['bks_sfzh'], -6);
            $fu_id = $this->addFrontuser($result['bks_code'], $result['bks_name'], 7, $sex, $result['bks_sfzh'], $password, NULL, $major_info['major_id'], $college_info['college_id'], $result['bks_grade'], $result['bks_mz'], $result['bks_birth'], $result['bks_nianzhi']);
            return  $fu_id;
        }
	}
	/**
	 * 获得同年级，同专业的学生
	 * @param unknown_type $major
	 * @param unknown_type $grade
	 * @return Ambigous <boolean, multitype:>
	 */
	public function  getmajor($major,$grade){
		$sql = "select `front_user`.`fu_id` from front_user where fu_major = '".$major."' and fu_grade = '".$grade."' ";
		return $this->fetchAll($sql);
	}
	
	public function updatepw($fu_id,$pw){
		$salt = $this->_getSalt('2222');
		$md5pw = $this->generatePw($pw, $salt);
		 $sql = "update front_user set fu_pw = '".$md5pw."' , fu_salt =  '".$salt."' where fu_id = ".$fu_id;
		return $this->update($sql);
	}
	
	public function reCheck($username){
		$sql = "SELECT * FROM `front_user` WHERE `fu_username` = '".$username."' AND `role_id` = 11";
		$all = $this->fetchAll($sql);
		if ($all){
			return true;
		}else{
			return false;
		}
	}
    //自己添加
    public function updatePicId($picId,$id){
        $sql = "select * from front_user where fu_id = ".$id;
        $head_picture_flag = $this->fetchAll($sql);
        $sql ="update front_user set pic_id = ".$picId." ,head_picture_flag = ".($head_picture_flag[0]["head_picture_flag"]+1)." where fu_id =".$id;
        return $this->update($sql);
    }
    //自己添加
    public function updateNickName($id,$name){
        $sql = "update front_user set fu_nickname = '".$name."' where fu_id = ".$id;
        return $this->update($sql);
    }
    //2014-08-17添加
    public function getBksByCode($bks_code){
        $sql = "select * from v_bks where bks_code = '".$bks_code."'";
        return $this->fetchAll($sql);
    }



    /**
     *APP验证登陆用户名、密码
     */
    public function validata_user($username,$pwd){
        $sql="SELECT * FROM front_user LEFT JOIN picture on front_user.pic_id=picture.pic_id WHERE fu_username='".$username."'and fu_pw='".$pwd."'";
        //var_dump($sql);
        return $this->fetchRow($sql);
    }

    /**
     * 根据用户名获取用户信息
     */
    public function getUserInfoByUserName($userName){
        $sql="SELECT * FROM `front_user` LEFT JOIN picture ON front_user.pic_id = picture.pic_id WHERE `fu_username` = '".$userName."'";
        return $this->fetchRow($sql);
    }

    /**
     *修改用户头像
     */
    public function updateUserPic($id,$pid,$flag){
        $sql="UPDATE front_user set pic_id='".$pid."',head_picture_flag='".$flag."' where fu_id='".$id."'";
        return $this->update($sql);
    }
    /** 修改昵称 */
    public function updateappnickname($username,$nickname){
        $sql="UPDATE front_user set fu_nickname='".$nickname."' WHERE fu_username=$username";

        return $this->update($sql);
    }
    /** 获取用户id，头像修改标志位，学院ID */
    public function getUserIdByUsername($username){
        //var_dump($username);
        $sql="SELECT fu_id,head_picture_flag,fu_college,fu_major,fu_realname,fu_nickname,if_sound FROM front_user where fu_username=$username";
        return $this->fetchRow($sql);
    }


    /** 获取该用户所有评论的新闻ID */
    public function getCommentIdByUserId($userId){
        $sql="SELECT comment_id from comment where comment_user_id=$userId";
        return $this->fetchAll($sql);
    }
    /** 获得对该用户的评论信息 */
    public function getAllCommentToUser($arr){
        $sql="SELECT front_user.fu_username studentName,comment.comment_content discussMsg,comment.comment_id id ,comment.comment_create_time discussDate FROM comment left join front_user on comment.comment_user_id=front_user.fu_id where comment_parent_id in $arr ";

        return $this->fetchAll($sql);
    }
    /** 获取用户活动信息 */
    public function getActivityMsg($id){
        $sql="SELECT message.mes_content notifMsg,activity.activity_title activityName,message.mes_id id,activity.activity_start_time activityDate,message.mes_id ,message.mes_type type from message left join activity on activity.activity_id=message.activity_id where message.fu_id=$id and mes_type=0";
        return $this->fetchAll($sql);
    }
    /** 获取用户学院信息 */
    public function getSchoolMsg($id){
        $sql="SELECT message.mes_content informMsg,activity.activity_title activityName,message.mes_id id,activity.activity_start_time informDate,message.mes_type type from message left join activity on activity.activity_id=message.activity_id where message.fu_id=$id and mes_type=2";
        return $this->fetchAll($sql);
    }

    public function getSchoolMsg1($num){
        $sql="SELECT n.notice_id,n.notice_title,n.notice_content,n.notice_create_time,f.file_name,f.file_link from notice n left join file f on n.file_id=f.file_id  order by notice_create_time desc limit $num,10 ";
        return $this->fetchAll($sql);
    }
    /** 删除提醒信息 */
    public function  delmsg($mesid){
        $sql="DELETE FROM message WHERE mes_id=$mesid";
        return $this->del($sql);
    }
    /** 成长档案类型查询 */
    public function get_gpt_msg(){
        $sql="SELECT gpt_id,gpt_name FROM growth_profile_type ";
        return $this->fetchAll($sql);
    }
    /** 成长档案-学习成果查询growth_profile */
    public function get_gp_msg($id,$gpt_id,$size){
        $sql="SELECT gp_content specificMsg,gp_create_time specificDate FROM growth_profile WHERE fu_id=$id and gpt_id=$gpt_id limit $size,5";
        return $this->fetchAll($sql);
    }
    /** 获取学生班级号 */
    public function getfuclass($username){
        $sql="SELECT fu_major,fu_id,fu_grade FROM front_user WHERE fu_username=$username ";
        return $this->fetchRow($sql);
    }
    /** 获取班级同学信息 */
    public function getStudents($num,$id,$grade){
        $sql="SELECT f.fu_id,f.fu_username userName,f.fu_realname studentName,p.pic_link FROM front_user f left join picture p on p.pic_id=f.pic_id WHERE  f.fu_grade=$grade and f.fu_major=$num and f.fu_id<>$id and f.fu_type='' order by f.fu_username ASC";

        return $this->fetchAll($sql);
    }
    /** 获取班级同学信息数量 */
    public function getStudentsnum($num,$id){
        $sql="SELECT f.fu_username userName,f.fu_realname studentName,p.pic_link FROM front_user f left join picture p on p.pic_id=f.pic_id WHERE  fu_major=$num and fu_id<>$id";
        return $this->fetchAll($sql);
    }
    /**获取被评论学生头像*/
    public function getUserPic($id){
        $sql="SELECT picture.pic_link headPicture FROM picture left join front_user on picture.pic_id=front_user.pic_id where front_user.fu_id=$id";
        return $this->fetchRow($sql);
    }
    /** 8月31 */
    /** 查询此用户名是否在front_user表中 */
    public function get_username_info($username){
        $sql="select * from front_user where fu_username=$username";
        return $this->fetchRow($sql);
    }
    /** 从本科生表查询学生信息 */
    public function getinfofrom_bks($username){
        $sql="select * from v_bks where bks_code='".$username."'";

        return $this->fetchRow($sql);
    }
    /** 将从bks表查出的信息放入front_user表 */
    public function insertuserinfo($bks_info,$fu_major_id,$fu_college_id){

        $pw=substr($bks_info['bks_sfzh'], -6);
        $salt=substr ( md5 ( $bks_info['bks_code'] . time () ), 2, 16 );
        $pwd=md5(md5($pw.$salt));
        $sql="insert into front_user (fu_realname,fu_username,fu_salt,fu_pw,fu_gender,fu_sfzh,fu_mz,fu_birth,fu_grade,fu_nianzhi,fu_college,fu_major,role_id) value ('".$bks_info[bks_name]."','".$bks_info[bks_code]."','".$salt."','".$pwd."','".$bks_info[bks_gender]."','".$bks_info[bks_sfzh]."','".$bks_info[bks_mz]."','".$bks_info[bks_birth]."','".$bks_info[bks_grade]."','".$bks_info[bks_nianzhi]."','".$fu_major_id."','".$fu_college_id."',7);";
        return $this->insert($sql);
    }
    /** 从bks表查询学生年级 */
    public function get_user_major($major){
        $sql="select major_id from major where major_name='".$major."'";

        return $this->fetchRow($sql);
    }
    /** 从college表查询学生所在学院 */
    public function get_user_college($college){
        $sql="select college_id from college where college_name='".$college."'";
        return $this->fetchRow($sql);
    }
    /** 根据用户ID获取用户信息 */
    public function  getUserInfoById($parent_id){
        $sql="select fu_username from front_user where fu_id=$parent_id";
        return $this->fetchRow($sql);
    }
    /** 根据用户major_id获取同班级所有人major_id */
    public function getfuarrid($major){
        $sql="select fu_id from front_user where fu_major=$major";
        return $this->fetchAll($sql);
    }
}



