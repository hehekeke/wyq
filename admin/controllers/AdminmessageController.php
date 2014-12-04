<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-3
 * Time: 下午5:41
 */
class AdminmessageController extends Controller{

    public function __construct(){
        parent::__construct();
        //$this->view->url_path=$this->getRequest()->appPath;
        $this->view->web_url=$this->getRequest()->hostUrl;
    }

    public function getmymessage(){

        $userinfo = $this->getData("userinfo");
        $id = $userinfo["admin_id"];
        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 10;
        $xuenian = $this->getRequest()->get("xuenian") ? $this->getRequest()->get("xuenian") : 0;
        $zhuangtai = $this->getRequest()->get("zhuangtai") ? $this->getRequest()->get("zhuangtai") : 0;
        $riqi = $this->getRequest()->get("riqi") ? $this->getRequest()->get("riqi") : 0;
        $mess= new adminmessage();
        $list=$mess->getmessagelist($page,$pageSize,$id,$xuenian,$riqi,$zhuangtai);
        $this->view->page = $page;
        $this->view->xuenian = $xuenian;
        $this->view->zhuangtai = $zhuangtai;
        $this->view->riqi = $riqi;
        $this->view->list = $list;//分页显示

        echo $this->view->render("getmymessage.html");
    }

    public  function dispose(){
    $id = $this->getRequest()->get("id") ;
    $flag= $this->getRequest()->get("flag") ;
    $mess= new adminmessage();
    $result=$mess->setmessage($id,$flag);
        if($flag==1){
            $this->view->activityInfo = $result;
            echo $this->view->render("messagedetail.html");
        }else{
            $this->getmymessage();
        }
}
}
