<?php
/**
* Create On 2014-5-4 ����5:18:12
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/
class article extends Model{
	
	/**
	 * 添加文章
	 * @param unknown_type $content
	 * @param unknown_type $type
	 * @param unknown_type $adminId
	 * @param unknown_type $title
	 * @param unknown_type $xuenian
	 * @param unknown_type $keywords
	 * @param unknown_type $fileID
	 * @param unknown_type $begin
	 * @param unknown_type $end
	 * @param unknown_type $college
	 * @return Ambigous <boolean, number>
	 */
	public function addArticle($content, $type, $adminId, $title = NULL, $xuenian = NULL, $keywords = NULL, $fileID = 'NULL', $begin = NULL, $end = NULL, $college = 'NULL', $isnew = NULL){
		$sql = "INSERT INTO `article` "
			 . "(`article_id`, `article_title`, `article_xuenian`, `article_content`, `article_college`, `article_type`, `article_isnew`, "
			 . "`article_keywords`, `file_id`, `article_state`, `article_begin_time`, "
			 . "`article_end_time`, `article_create_user_id`, `article_create_time`) "
			 . "VALUES "
			 . "(NULL, '".$title."', '".$xuenian."', '".$content."', ".$college.", '".$type."', '".$isnew."', "
			 . "'".$keywords."', ".$fileID.", '0', '".$begin."', "
			 . "'".$end."', '".$adminId."', NOW());";
		//echo $sql;
		return $this->insert($sql);	
	}
	
	/**
	 * 修改文章
	 * @param unknown_type $id
	 * @param unknown_type $title
	 * @param unknown_type $content
	 * @param unknown_type $type
	 * @param unknown_type $keywords
	 * @param unknown_type $fileID
	 * @param unknown_type $begin
	 * @param unknown_type $end
	 */
	public function editArticle($id, $content, $type, $title = NULL, $keywords = NULL, $fileID = 'NULL', $begin = NULL, $end = NULL ){
		$sql = "UPDATE `article` "
			 . "SET "
			 . "`article_title` = '".$title."', "
			 . "`article_content` = '".$content."', "
			 . "`article_type` = '".$type."', "
			 . "`article_keywords` = '".$keywords."', "
			 . "`file_id` = ".$fileID.", "
			 . "`article_begin_time` = '".$begin."', "
			 . "`article_end_time` = '".$end."' "
			 . "WHERE `article`.`article_id` = '".$id."';";
		return $this->update($sql);
	}
	
	public function getArticleList($type){
		$sql = "SELECT * FROM `article` WHERE article_type=".$type." ORDER BY `article`.`article_create_time` DESC";
		return $this->fetchAll($sql);
	}



    public function getArticleList02($type,$page=1,$num=6){
       // $sql = "SELECT * FROM `article` WHERE article_type=".$type." ORDER BY `article`.`article_create_time` DESC";
        $sqltotle="SELECT * FROM `article` WHERE article_type=$type ";
        $sql = "SELECT * FROM `article` WHERE article_type=$type  ORDER BY `article`.`article_create_time` DESC  LIMIT ".($page-1)*$num.",".$num." ";
        $total =count($this->fetchAll($sqltotle));
        $totalPage = ceil($total / $num);
        $list= $this->fetchAll($sql);
        return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
    }
	/* public function getAticleById($id){
		$sql = "SELECT * FROM `article` WHERE article_id=".$id;
		return $this->fetchRow($sql);
	} */
	
	public function getAticleById($id){
		//$sql = "SELECT * FROM `article` LEFT JOIN file ON article.file_id = file.file_id WHERE article_id=".$id;
        $sql = "SELECT * FROM `article` WHERE article_id=$id";
		return $this->fetchRow($sql);
	}

	//获取上传的文件
    public  function  getfile_info($file_id){
        $sql = "SELECT * FROM `file` WHERE file_id=$file_id";
        return $this->fetchRow($sql);
    }
	/**
	 * 获取小贴士列表(分页)
	 * @param unknown_type $type
	 * @param unknown_type $page
	 * @param unknown_type $num
	 * @return multitype:unknown number Ambigous <boolean, multitype:>
	 */
	public function getTipsPageModel($type, $page = 1, $num = 10){
		$select = "SELECT `article`.*, `admin`.`admin_realname` FROM `article` "
				. "LEFT JOIN `admin` ON `article`.`article_create_user_id` = `admin`.`admin_id` ";
		$filter = "WHERE 1 ";
		if ($type == 3){
			$filter .= "AND `article`.`article_type` = '0' OR `article`.`article_type` = '1' ";
		}else{
			$filter .= "AND `article`.`article_type` = '".$type."' ";
		}
		$order = "ORDER BY `article`.`article_create_time` DESC ";
		$limit = "LIMIT ".($page-1)*$num.",".$num."";
		$sql = $select.$filter.$order.$limit;
		$sqltotal = $select.$filter.$order;
		//echo $sql;
		$list = $this->fetchAll($sql);
		$total = count($this->fetchAll($sqltotal));
		$totalPage = ceil($total / $num);
		return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
	}
	
	/**
	 * 获取文章详情
	 * @param unknown_type $id
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getDetail($id){
		$sql = "SELECT `article`.*, `admin`.`admin_realname`, `file`.`file_name`, `file`.`file_link` FROM `article` "
			 . "LEFT JOIN `admin` ON `article`.`article_create_user_id` = `admin`.`admin_id` "
			 . "LEFT JOIN `file` ON `article`.`file_id` = `file`.`file_id` "
			 . "WHERE `article`.`article_id` = '".$id."' ";
		return $this->fetchRow($sql);
	}
	
	/**
	 * 删除文章
	 * @param unknown_type $id
	 * @return resource
	 */
	public function delArticle($id){
		$sql = "DELETE FROM `article` WHERE `article`.`article_id` = '".$id."'";
		return $this->del($sql);
	}
	
	/**
	 * 获取评估通告（分页）
	 * @param unknown_type $page
	 * @param unknown_type $num
	 * @return multitype:unknown number Ambigous <boolean, multitype:>
	 */
	public function getNoticeListPageModel($page = 1, $num = 10, $flag = 0){
		$select = "SELECT `article`.*, `admin`.`admin_realname` FROM `article` "
				. "LEFT JOIN `admin` ON `article`.`article_create_user_id` = `admin`.`admin_id` ";
		$filter = "WHERE `article`.`article_type` = '3' ";
		$order = "ORDER BY `article`.`article_create_time` DESC ";
		$limit = "LIMIT ".($page-1)*$num.",".$num."";
		$sql = $select.$filter.$order.$limit;
		$sqltotal = $select.$filter.$order;
		//echo $sqltotal;
		if ($flag){
			return $this->fetchAll($sqltotal);
		}else{
			$list = $this->fetchAll($sql);
			$total = count($this->fetchAll($sqltotal));
			$totalPage = ceil($total / $num);
			return array('page'=>$page,'list'=>$list,'total'=>$total,'totalPage'=>$totalPage);
		}
	}
	
	/**
	 * 根据学院获取宣讲方案
	 * @param number $page
	 * @param number $num
	 * @param number $collegeId
	 * @param number $isnew
	 * @return multitype:number Ambigous <boolean, multitype:>
	 */
	public function getXuanjiangPageModel($page = 1, $num = 10, $collegeId = 0, $isnew=0){
		$select = "SELECT * FROM `article` ";
		$filter = "WHERE `article_type` = 2 ";
		if ($collegeId){
			$filter .= "AND `article_college` = '".$collegeId."' ";
		}
			$filter .= "AND `article_isnew` = '".$isnew."' ";
		$order = "ORDER BY `article_create_time` DESC ";
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
     * 根据学院获取宣讲方案
     * @param number $page
     * @param number $num
     * @param number $collegeId
     * @param number $isnew
     * @return multitype:number Ambigous <boolean, multitype:>
     */
    public function getXuanjiangPageModel02($page = 1, $num = 10, $collegeId = 0, $isnew=0){
        $select = "SELECT * FROM `article` ";
        $filter = "WHERE `article_type` = 2 ";
        if ($collegeId){
            $filter .= "AND `article_college` = '".$collegeId."' ";
        }
        $order = "ORDER BY `article_create_time` DESC ";
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
	 * 通过front_user的fu_college 和type 获得Aticle
	 * @param unknown_type $articleId
	 * @param unknown_type $type
	 */
	public function zz_getAticleById($college_id,$type,$isnew){
		date_default_timezone_set('Asia/Shanghai');
		$time = date("Y-m-d H:i:s");
		$sql = "SELECT * FROM `article` LEFT JOIN file ON file.file_id = article.file_id WHERE `article_college` = ".$college_id." and `article_type` = ".$type." and `article_isnew` = ".$isnew."
				order by `article_create_time` limit 1";
		return $this->fetchRow($sql);
	}
	/**
	 * 获得今年是否已经可以开始评价
	 * @param unknown_type $type
	 * @param unknown_type $isnew
	 * @return Ambigous <boolean, multitype:>
	 */
	public function zz_getAticleByyear($type,$isnew){
		date_default_timezone_set('Asia/Shanghai');
		$time = date("Y-m-d H:i:s");
		//echo $time;
		$sql = "SELECT * FROM `article` WHERE article_type = '".$type."' and article_isnew = ".$isnew."
				and article_begin_time <= '".$time."' and article_end_time >= '".$time."'  order by article_create_time limit 1";
		return $this->fetchRow($sql);
	}
	/**
 	* 获得这个id所属学院的最新一个问题是什么
 	* @param unknown_type $fu_id
 	*/
	public function  zz_get_question_isnew($fu_id){
		$sql = "select article.article_isnew from  article LEFT JOIN front_user on article.article_college = front_user.fu_college WHERE fu_id = ".$fu_id." order by  article_begin_time DESC";
		return $this->fetchRow($sql);
	}
	
	/**
	 * 根据学年获取评估通知
	 * @param unknown $xuenian
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getNoticeListByXuenian($xuenian, $isnew, $flag = 0){
		if ($flag){
			$sql = "SELECT * FROM `article` WHERE `article_xuenian` = '".$xuenian."' AND `article_type` = 3 order by  article_create_time DESC ";
		}else{
			$sql = "SELECT * FROM `article` WHERE `article_xuenian` = '".$xuenian."'  AND `article_isnew` = '".$isnew."' AND `article_type` = 3 order by  article_create_time DESC";
		}
		return $this->fetchAll($sql);
	}
	
	/**
	 * 根据学年和学院获取宣讲方案
	 * @param unknown $xuenian
	 * @param unknown $collegeID
	 * @return Ambigous <boolean, multitype:>
	 */
	public function getXuejiangByXuenianAndCollege($xuenian, $collegeID, $isnew){
		$sql = "SELECT * FROM `article` WHERE `article_xuenian` = '".$xuenian."' AND `article_college` = '".$collegeID."' AND `article_isnew` = '".$isnew."' AND `article_type` = 2";
		return $this->fetchAll($sql);
	}

    /**
     * 重置college里的college_isstate
     * @param unknown $xuenian
     * @return Ambigous <boolean, multitype:>
     */
   public function collegeChongzhi($isnew){
       if($isnew==0){
           $sql = "UPDATE college SET college_isstate=0";
       }else{
           $sql = "UPDATE college SET college_xsstate=0";
       }
     return $this->update($sql);
   }

    //清stu_ex这张表
    public function clear_stu_ex(){
        $sql=" truncate table stu_ex";
        return $this->truncate($sql);
    }
}

