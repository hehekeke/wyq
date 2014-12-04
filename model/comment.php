<?php
/**
* Create On 2014-4-15 ����9:39:13
* Author: jiangyuchao
* E-mail: jiangyuchao@iwind-tech.com
*/

class comment extends Model{
	private $userList=array();
	//获取所有评论	
	public function getAllComment($activity_id,$page,$num){
		$counts=$this->getCountsById($activity_id);//总数
        //获取parent_id=0的评论
        $counts_parent=$this->getCountsById_parent($activity_id);
		  $sql = "SELECT `comment`.*, `picture`.`pic_link`,front_user.* FROM `comment` "
					. "LEFT JOIN `front_user` ON `comment`.`comment_user_id` = `front_user`.`fu_id` "
					. "LEFT JOIN `picture` ON `front_user`.`pic_id` = `picture`.`pic_id` "
					. "LEFT JOIN `activity` ON `comment`.`activity_id` = `activity`.`activity_id` "
				    . "WHERE `comment`.`activity_id` = '".$activity_id."' and comment_content !='' and parent_id=0"
				    . " order by comment.comment_create_time desc  limit ".($page-1)*$num.",".$num."";
        $list01=$this->fetchAll($sql);
        $sql02="SELECT `comment`.*, `picture`.`pic_link`,front_user.* FROM `comment` "
            . "LEFT JOIN `front_user` ON `comment`.`comment_user_id` = `front_user`.`fu_id` "
            . "LEFT JOIN `picture` ON `front_user`.`pic_id` = `picture`.`pic_id` "
            . "LEFT JOIN `activity` ON `comment`.`activity_id` = `activity`.`activity_id` "
            . "WHERE `comment`.`activity_id` = '".$activity_id."' and comment_content !='' and parent_id !=0"
            . " order by comment.comment_create_time desc ";
        $list02=$this->fetchAll($sql02);
		$totalPage = ceil($counts_parent / $num);
        if($list02){
            $list=array_merge($list01,$list02);
        }else{
            $list=$list01;
        }
	return array('page'=>$page,'list'=>$list,'total'=>$counts,'totalPage'=>$totalPage);
	}

	//获取对应评论的所有自评论（手机调用方法）
	public function getSonById($activity_id,$parent_id,$page='1',$num='2'){
		$commentList=$this->getAllComment($activity_id,$page,$num);//所有评
		$commentListArr=$commentList['list'];
		unset($commentList['list']);
		$commentList['list']=$this->getSonTree($parent_id,$commentListArr);
    	//构造 谁对谁评论
		$commentList['list']=$this->newTreeArr($this->userList,$commentList['list']);
		return $commentList;
	}
	
	//查询子树
	public function getSonTree($parent_id,$commentArr){
			$tree=array();
			foreach($commentArr as $key=>$value){
				if($value['parent_id']==$parent_id){
					$tree[]=$value;
					$tree=array_merge($tree,$this->getSonTree($value['comment_id'],$commentArr));
				}
				$com_id=$value['comment_id'];
				$this->userList[$com_id]=$value['fu_realname'];				
			}			
			return $tree;	
	}
	
	//根据数组取出对应的用户名字.调用方法
	public function newTreeArr($comArr,$commentArr){
		foreach($commentArr as $key=>&$value){
			if(!$value['parent_id']){
				//如果它是一级的评论
				$value['toUser']='';
			}else{
				//$comArr[$value['parent_id']];exit;
				$value['toUser']=$comArr[$value['parent_id']];
			}
		}
		//var_dump($commentArr);
		return $commentArr;
	}
	
	//是否深度进行子孙查询（电脑调用）
	public function deepSonList($activity_id,$parent_id='0',$page,$num='2'){
		$oriArr=$this->getSonById($activity_id,$parent_id,$page,$num);//原来的一维数组
		$oriArrList=$oriArr['list'];
		unset($oriArr['list']);
		$i=-1;//索引
		foreach($oriArrList as $key=>$value){
			if($value['parent_id']==$parent_id){
				$i++;
				$newReturn[$i]=$value;				
			}else{
				$newReturn[$i]['sonList'][]=$value;
			}
		}
		$oriArr['list']=$newReturn;
		return $oriArr;//构造好的树
	}
	
	
	//插入评论操作
	public function insertComment($data){
		$sql="  insert into `comment` ( ";
		foreach($data as $key=>$value){
			$sql.=" `".$key."`,";
		}
		$sql.=" `comment_create_time` ) values ( ";
		foreach($data as $key=>$value){
			$sql.=" '".$value."',";
		}
		$sql.=" now() ) ";		
		//return  $sql;
		return $this->insert($sql);		
	}
	
	//获取某个活动评论总数
	public function getCountsById($activity_id){
		$sql=" select * from `comment` where `activity_id`='".$activity_id."'";
		$counts=count($this->fetchAll($sql));
		return $counts;
	}

    public function getCountsById_parent($activity_id){
        $sql=" select * from `comment` where `activity_id`='".$activity_id."'and parent_id=0";
        $counts=count($this->fetchAll($sql));
        return $counts;
    }

    //9-7
    public function getNickNameById($user_id){
        $sql = "select fu_nickname from front_user where fu_id =".$user_id;
        return $this->fetchRow($sql);
    }
    public function getUserNameById($user_id){
        $sql = "select fu_username from front_user where fu_id = ".$user_id;
        return $this->fetchRow($sql);
    }
}
