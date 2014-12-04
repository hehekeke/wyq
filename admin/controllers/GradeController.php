<?php

class GradeController extends Controller{
	public function __construct(){
	
		parent::__construct();
		$this->view->web_url = $this->getRequest()->hostUrl;
	
	}
	public function Newstu(){
		$model = new major();
		$major = $model->getAllMajor();
		$year = array();
		for($i=0;$i<20;$i++){
			$year[$i]=$i+2010;
		}
		$this->view->year = $year;
		
		$model2 = new grademajor();
		$grade = $model2->getAllNew();
		for ($j=0;$j<sizeof($major);$j++){
			$major[$j]['grade']=0;//初始化为0
		}
		for ($i=0;$i<sizeof($grade);$i++){
			for ($j=0;$j<sizeof($major);$j++){
				if ($major[$j]['major_id']==$grade[$i]['major_id'])
					$major[$j]['grade']=$grade[$i]['gd_grade'];//如果有grade则赋值
			}
		}
		$this->view->major = $major;
		echo $this->view->render("newstu.html");
	}
	
	public  function yearEnd(){
		$model = new major();
		$major = $model->getAllMajor();
		
		$year = array();
		for($i=0;$i<20;$i++){
			$year[$i]=$i+2010;
		}
		$this->view->year = $year;
		
		
		$model2 = new grademajor();
		$grade = $model2->getAllYear();
		if ($grade){//展示，不许修改
			for ($j=0;$j<sizeof($major);$j++){
				$major[$j]['start']=10000;
				$major[$j]['end']=0;
			}
			for ($i=0;$i<sizeof($grade);$i++){
				for ($j=0;$j<sizeof($major);$j++){
					if ($major[$j]['major_id']==$grade[$i]['major_id']){
						if ($grade[$i]['gd_grade']<$major[$j]['start']) $major[$j]['start']=$grade[$i]['gd_grade'];
						if ($grade[$i]['gd_grade']>$major[$j]['end']) $major[$j]['end']=$grade[$i]['gd_grade'];
					}
				}
			}
			$this->view->major = $major;
			echo $this->view->render("yearEnd2.html");
		}else{
			$this->view->major = $major;
			echo $this->view->render("yearEnd.html");//首次设置
		}
	}
	
	public function updateGrade1(){//新生
		$model = new grademajor();
		$model2 = new major();
		$majorId = $model2->getMajorIds();
		foreach ($majorId as $id){
			$item = $model->getItemByMajorId($id['major_id']);
			$name = "year".$id['major_id'];
			if ($item){
				$model->updateGrade($id['major_id'],$_POST[$name]);
			}else{
				$model->insertGrade($id['major_id'],$id['college_id'],$_POST[$name]);
			}
		}
		$this->newStu();
	}
	
	public function updateGrade2(){//学年末
		$model = new grademajor();
		$model2 = new major();
		$majorId = $model2->getMajorIds();
		foreach ($majorId as $id){
			$start = "start".$id['major_id'];
			$end = "end".$id['major_id'];
			for ($i=$_POST[$start];$i<=$_POST[$end];$i++){
				$model->insertGrade2($id['major_id'],$id['college_id'],$i);
			}
		}
		$this->yearEnd();
	}
	
	public function resetAll(){
		$model = new grademajor();
		$model->resetAll();
		$this->yearEnd();
	}
	
	public function Xinsheng(){
		$major = new major();
		$gm = new grademajor();
		if ($_POST){
			if ($_POST['nianji'] == ""){
				$this->view->result = $this->_lang->xinshengnianjibunengweikong;
			}else{
				if (strlen($_POST['nianji']) > 4){
					$this->view->result = $this->_lang->nianfengeshibuduiqingshuruzhengquegeshiliru2014;
				}else{
					$preg = "/[0-9]{3}[1-9]|[0-9]{2}[1-9][0-9]{1}|[0-9]{1}[1-9][0-9]{2}|[1-9][0-9]{3}/";
					$isTrue = preg_match($preg, $_POST['nianji']);
					if ($isTrue){
						   $major_list = $major->getAllMajor();
                        //重置grade-major这张表的新生的数据
                        $gm->new_xinsheng();
                       for ($i = 0; $i < count($major_list); $i++){
							$id = $gm->insertGrade($major_list[$i]['major_id'], $major_list[$i]['college_id'], $_POST['nianji']);
                            }
            	 if ($id){
							$this->view->result = $this->_lang->tianjiachenggong;
						}else{
							$this->view->result = $this->_lang->tianjiashibai;
						}
					}else{
						$this->view->result = $this->_lang->nianfengeshibuduiqingshuruzhengquegeshiliru2014;
					}
				}
			}
		}
		echo $this->view->render("xinsheng.html");
	}
}
