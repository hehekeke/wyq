<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-24
 * Time: 下午8:00
 */
  class NoticeController extends Controller{
      public function __construct(){

          parent::__construct();
          //print_r($this->getRequest());
          $this->view->web_url = $this->getRequest()->hostUrl;

      }

      /******************lwj****************************/
      /**
       * 通知公告类型
       */
      public function noticeTypeList(){
          $notice_type = new notice();
          $list=$notice_type->getNoticeTypeList();
          $this->view->typeList = $list;
          echo $this->view->render("noticeTypeList.html");

      }

      public function notice_type_modify(){
          $id = $this->getRequest()->get("id");
          $notice_type = new notice();
          $nt=$notice_type->getNoticeTypeById($id);
          // var_dump($nt);
          $this->view->nt = $nt;
          echo $this->view->render('noticeTypeModify.html');
      }

      public function ntEdit(){
          $nt_name= $_POST['nt_name'];
          $nt_id=$_POST['nt_id'];
          $notice_type = new notice();
          $result=$notice_type->ntEditById($nt_id,$nt_name);
          if($result){
              $s = new NoticeController();
              $s->noticeTypeList();
          }else{
              echo "更新出错";
          }


      }

      public function noticeTypeAdd(){
          echo $this->view->render('noticeTypeAdd.html');
      }
      public  function ntAdd(){
          $nt_name=$_POST['nt_name'];
          $nt_create_time=date("Y-m-d H:i:s", time()) ;
          $notice_type = new notice();
          $notice_type->ntAdd($nt_name,$nt_create_time);
          $s = new NoticeController();
          $s->noticeTypeList();
      }

      public function nt_delete(){
          $id = $this->getRequest()->get("id");
          $notice_type = new notice();
          $result=$notice_type->ntDeleteById($id);
          if($result){
              $s = new NoticeController();
              $s->noticeTypeList();
          }else{
              echo '删除出错！' ;
          }
      }

      /**
       * 通知公告
       */
      public function noticeList(){
          $notice=new notice();
          $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
          $pageSize = 10;
          $noList = $notice->getNoticePageModel($page,$pageSize);

          $len=count($noList['list']);
          $notice= new notice();
          //判断类型是否为空。如果为空，类型插入为“其他”
          for($x=0;$x<$len;$x++){
              if($noList['list'][$x]['nt_name']==null){
                  $nt_id = $notice->getNoticeTypeIdByName();
                  $sql="update notice set nt_id = ".$nt_id["nt_id"]." where notice_id = ".$noList['list'][$x]['notice_id'];
                  $notice->update($sql);
              }
          }

          $this->view->noList=$noList;
          echo $this->view->render("noticeList.html");
      }

      public function noAdd(){
          //读出通知公告类型
          $notice_type = new notice();
          $list=$notice_type->getNoticeTypeList();
          $this->view->typeList = $list;
          echo $this->view->render("noticeAdd.html");
      }

      public function noticeAdd(){
          $type=$_POST['type'];
          $title=$_POST['title'];
          $content=$_POST['content'];
          $time=$_POST['time'];
          $notice=new notice();
          if($_FILES['file']['name']){
              if($_FILES['file']['error']=='0' && $_FILES['file']['size']<=20*1024*1024){
                  $path="/common/upload/files/notice/";
                  $realpath=str_replace('\\','/',DIR).$path;
                  $saveName = iconv("UTF-8","GBK",$_FILES['file']['name']);
                  $fileSave=$realpath.$saveName;
                  $fileSaveToDB=$path.$_FILES['file']['name'];
                  $num = "";
                  if(file_exists($fileSave)){
                      $num = rand(0,100);
                      $fileSave=$realpath.$num.$saveName;
                      $fileSaveToDB=$path.$num.$_FILES['file']['name'];
                  }
                  $su=move_uploaded_file($_FILES['file']['tmp_name'],$fileSave) ? '1' : '0';
                  if($su=='1'){
                      $file_id=$notice->moveFile($num.$_FILES['file']['name'],$fileSaveToDB);
                  }
              }else{
                  die('文件上传失败，请<a href="">点此返回</a>重新添加');
              }
          }else{
              $file_id=null;
          }
          $result= $notice->addNotice($type,$title,$content,$time,$file_id);
          if($result>0){
              $s=new NoticeController();
              $s->noticeList();
          }else{
              echo "新增出错！！";
          }

      }

      public function noticeModify(){
          //读出通知公告类型
          $notice_type = new notice();
          $list=$notice_type->getNoticeTypeList();
          $this->view->typeList = $list;

          $id = $this->getRequest()->get("id");
          $notice=new notice();
          $noInfo = $notice->getNoticeById($id);

          $this->view->noInfo=$noInfo;
          echo $this->view->render("noticeModify.html");
      }

      public function noticeEdit(){
          $id=$_POST['notice_id'];
          $title=$_POST['title'];
          $type=$_POST['type'];
          $content=$_POST['content'];
          $time=$_POST['time'];
          $old_file_id=$_POST["file1"];
          $notice = new notice();
          if($_FILES['file']['name']){
              if($_FILES['file']['error']=='0' && $_FILES['file']['size']<=20*1024*1024){
                  $path="/common/upload/files/notice/";
                  $realpath=str_replace('\\','/',DIR).$path;
                  $saveName = iconv("UTF-8","GBK",$_FILES['file']['name']);
                  $fileSave=$realpath.$saveName;
                  $fileSaveToDB=$path.$_FILES['file']['name'];
                  $num="";
                  if(file_exists($fileSave)){
                      $num = rand(0,100);
                      $fileSave=$realpath.$num.$saveName;
                      $fileSaveToDB=$path.$num.$_FILES['file']['name'];
                  }
                  $su=move_uploaded_file($_FILES['file']['tmp_name'],$fileSave) ? '1' : '0';
                  if($su=='1'){
                      if($old_file_id !=0 || $old_file_id != null){
                          $notice->updateMoveFile($num.$_FILES['file']['name'],$old_file_id,$fileSaveToDB);
                          $file_id = $old_file_id;
                      }else{
                         $file_id=$notice->moveFile($num.$_FILES['file']['name'],$fileSaveToDB);
                      }
                  }
              }else{
                  die('文件上传失败，请<a href="<{$web_url/mannkgn.php/notice/noticeEdit}>">点此返回</a>重新添加');
              }
          }else{
              $file_id=$_POST["file1"];
          }

          $result=$notice->noticeEditById($title,$content,$type,$file_id,$time,$id);
          if($result){
              $s=new NoticeController();
              $s->noticeList();
          }else{
              echo '更新出错';
          }
      }

      public function notice_delete(){
          $id = $this->getRequest()->get("id");
          $notice=new notice();
          $result=$notice->delNoticeById($id);
          if($result){
              $s=new NoticeController();
              $s->noticeList();
          }else{
              echo "删除出错！！！";
          }
      }
  }