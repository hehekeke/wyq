<?php
/**
* Create On 2014-4-15 ����9:39:13
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/

class admin extends Model{
	
	/**
	 * 添加管理员
	 * @param unknown_type $adminName
	 * @param unknown_type $roleId
	 * @param unknown_type $pw
	 * @return Ambigous <boolean, number>
	 */
	public function addAdmin($adminName, $pw, $adminRealname, $createAdminId, $college = "", $type = ""){
		$salt = $this->_getSalt($adminName);
		$password = $this->generatePw($pw, $salt);
		$sql = "INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_realname`, `admin_pw`, `admin_salt`, `admin_college`, `admin_type`, `admin_create_admin_id`, `admin_create_time`) "
			 . "VALUES "
			 . "(NULL, '".$adminName."', '".$adminRealname."', '".$password."', '".$salt."', '".$college."', '".$type."', '".$createAdminId."', NOW());";
		//echo $sql;
		return $this->insert($sql);
	}
	
	/**
	 * 生成字符窜
	 * @param unknown_type $str
	 * @return string
	 */
	protected function _getSalt($str = ""){
		return substr(md5($str.time()),2,16);
	}
	
	/**
	 * 删除管理员用户
	 * @param unknown_type $adminId
	 * @return resource
	 */
	public function delAdmin($adminId){
		$sql = "DELETE FROM `admin` WHERE `admin`.`admin_id` = '".$adminId."'";
		return $this->del($sql);
	}
	
	/**
	 * 根据管理员ID获取管理员详情
	 * @param unknown_type $adminId
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getAdminInfoByAdminid($adminId){
		$sql = "SELECT `admin`.* FROM `admin` WHERE `admin`.`admin_id` = '".$adminId."' ";
		return $this->fetchRow($sql);
	}
	
	/**
	 * 根据管理员用户名获取管理员详情
	 * @param unknown_type $adminName
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getAdminInfoByAdminname($adminName){
		$sql = "SELECT `admin`.* FROM `admin` WHERE `admin`.`admin_name` = '".$adminName."' ";
		return $this->fetchRow($sql);
	}
	
	public function authAdmin($adminName, $password){
		$result = array();
		$userinfo = $this->getAdminInfoByAdminname($adminName);
		if($userinfo){
			$pw = $this->generatePw($password, $userinfo['admin_salt']);
			if($userinfo['admin_pw'] == $pw){
				$result['result'] = $userinfo['admin_id'];
				$result['userinfo'] = $userinfo;
				$result['msg'] = "yangzhengchenggong";

			}else{
				$result['result'] = -1;
				$result['userinfo'] = null;
				$result['msg'] = "密码错误";
			}

		}else{
			$result['result'] = -2;
			$result['userinfo'] = null;
			$result['msg'] = "用户不存在";
		}
		//print_r($result);
		return $result;
	}
	
	/**
	 * 生成加密后的密码
	 * @param unknown_type $pw
	 * @param unknown_type $salt
	 * @return string
	 */
	public function generatePw($pw,$salt){
		return md5(md5($pw.$salt));
	}
	
	/**
	 * 获取所有管理员(分页)
	 * @param unknown_type $page
	 * @param unknown_type $num
	 * @return multitype:unknown number Ambigous <boolean, multitype:>
	 */
	public function getAdminlistPageModel($page = 1, $num = 10){
		$sqltotal = "SELECT `admin`.* FROM `admin` ORDER BY `admin`.`admin_create_time` ASC";
		$sql = "SELECT `admin`.* FROM `admin` ORDER BY `admin`.`admin_create_time` ASC Limit ".($page-1)*$num.",".$num." ";
		$list = $this->fetchAll($sql);
		$total = count($this->fetchAll($sqltotal));
		$totalPage = ceil($total / $num);
		return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}

    public function getAdminlistPageModel02($page = 1, $num = 10,$username){
        $sqltotal = "SELECT `admin`.* FROM `admin` where admin_name=$username ORDER BY `admin`.`admin_create_time` ASC";
        $sql = "SELECT `admin`.* FROM `admin` where admin_name=$username ORDER BY `admin`.`admin_create_time` ASC Limit ".($page-1)*$num.",".$num." ";
        $list = $this->fetchAll($sql);
        $total = count($this->fetchAll($sqltotal));
        $totalPage = ceil($total / $num);
        return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }
	  public function getAdminlistPageModel06($page = 1, $num = 10,$username){
        $sqltotal = "SELECT `admin`.* FROM `admin` where admin_name=$username ORDER BY `admin`.`admin_create_time` ASC";
        $sql = "SELECT `admin`.* FROM `admin` where admin_name=$username ORDER BY `admin`.`admin_create_time` ASC Limit ".($page-1)*$num.",".$num." ";
        $list = $this->fetchAll($sql);
        $total = count($this->fetchAll($sqltotal));
        $totalPage = ceil($total / $num);
        return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }
	
    public function getadmin_info($username){
        $sql="select * from admin where admin_name=$username";
        $result=$this->fetchRow($sql);
        return $result;
    }
	
	/**
	 * 获取评估小组人员
	 * @param unknown_type $page
	 * @param unknown_type $num
	 * @param unknown_type $collegeId
	 * @return multitype:unknown number Ambigous <boolean, multitype:>
	 */
	public function getPgxzPageModel($page = 1, $num = 10, $collegeId = 0){
		$select = "SELECT `admin_role`.*, a.`admin_name`, a.`admin_realname`, a.`admin_type`, a.`admin_create_time`, b.`admin_realname` AS create_real_name FROM `admin_role` "
				. "LEFT JOIN `admin` a ON `admin_role`.`admin_id` = a.`admin_id` "
				. "LEFT JOIN `admin` b ON a.`admin_create_admin_id` = b.`admin_id` ";
		$filter = "WHERE `admin_role`.`role_id` = 10 ";
		if ($collegeId){
			$filter .= "AND a.`admin_college` = '".$collegeId."' ";
		}
		$order = "ORDER BY a.`admin_create_time` DESC ";
		$limit = "LIMIT ".($page-1)*$num.",".$num."";
		$sql = $select.$filter.$order.$limit;
		//echo $sql;
		$sqltotal = $select.$filter.$order;
		$list = $this->fetchAll($sql);
		$total = count($this->fetchAll($sqltotal));
		$totalPage = ceil($total / $num);
		return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}
	
	/**
	 * 修改密码
	 * @param unknown_type $uid
	 * @param unknown_type $pw
	 * @param unknown_type $newpw
	 * @return multitype:number string |multitype:string Ambigous <string, number, NULL, unknown, Ambigous <Ambigous, boolean, multitype:>>
	 */
	public function changePw($uid,$pw,$newpw){
		$result = $this->authAdminById( $uid, $pw);
		if($result['result'] > 0 ){
			$salt = $this->_getSalt($result['userinfo']['admin_name']);
			$passWord = $this->generatePw($newpw, $salt);
			if($this->modAdminInfo($uid, array( 'admin_pw' => $passWord,'admin_salt'=>$salt ))){
				return array('result'=>1,'newPw'=>$passWord);
			}else{
				return array('result'=>0,'newPw'=>$passWord);
			}
		}else{
			return array('result'=>$result['result'],'newPw'=>"");
		}
	}
	
	/**
	 * 修改用户资料
	 * @param  $userId用户id ,$arr[key] = value
	 * @return bool
	 */
	public function modAdminInfo($userId,$arr){
		if($arr){
			reset($arr);
			list($key, $val) = each($arr);
			$str = " `".$key."` = '".$val."' ";
			while (list($key, $val) = each($arr)) {
				//echo "$key => $val\n";
				if($val){
					$str .= " , `".$key."` = '".$val."' ";
				}else{
					$str .= " , `".$key."` = NULL ";
				}
			}
			$sql = "UPDATE `admin` SET ".$str." WHERE `admin_id` =".$userId."  LIMIT 1" ;
			//echo $sql;
			return $this->update($sql);
		}else{
			return false;
		}
	}
	
	public function authAdminById($adminId, $password){
		$result = array();
		$userinfo = $this->getAdminInfoByAdminid($adminId);
		if($userinfo){
			$pw = $this->generatePw($password, $userinfo['admin_salt']);
			if($userinfo['admin_pw'] == $pw){
				$result['result'] = $userinfo['admin_id'];
				$result['userinfo'] = $userinfo;
				$result['msg'] = "yangzhengchenggong";
	
			}else{
				$result['result'] = -1;
				$result['userinfo'] = null;
				$result['msg'] = "密码错误";
			}
	
		}else{
			$result['result'] = -2;
			$result['userinfo'] = null;
			$result['msg'] = "用户不存在";
		}
		//print_r($result);
		return $result;
	}

    //获取所有的管理员的组织列表(分页)

    public function  getAlladminorg_list($page = 1,$num = 10){
        $sqltotal = "select * from admin_organize";
        $sql = "select * from admin_organize Limit ".($page-1)*$num.",".$num." ";
        $list = $this->fetchAll($sql);
        $total = count($this->fetchAll($sqltotal));
        $totalPage = ceil($total / $num);
        return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }

    //获取所有的管理员的组织列表

    public function  getAlladminorg_list02(){
        $sqltotal = "select * from admin_organize";
        return $this->fetchAll($sqltotal);
    }

    //删除组织列表
    public function delAdminorg($adminId){
        $sql = "DELETE FROM `admin_organize` WHERE `admin_organize`.`id` = '".$adminId."'";
        return $this->del($sql);
    }

    /**
     * 根据ID获取组织列表详情
     * @param unknown_type $adminId
     * @return Ambigous <boolean, multitype:>
     */
    public function getAdminorgInfoByAdminid($adminId){
        $sql = "SELECT  * FROM `admin_organize` WHERE `admin_organize`.`id` = '".$adminId."' ";
        return $this->fetchRow($sql);
    }

    //修改用户组织
    public function  updateOrg($id,$name){
        $sql="update admin_organize set organize_name='".$name."' where id=$id";
        return $this->update($sql);
    }
    //新增用户组织
    public function  addadminorg($name){
        $sql="INSERT INTO  admin_organize ( `organize_name`) VALUES ('$name')";
        return $this->insert($sql);
    }
}
