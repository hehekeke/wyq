<?php
/**
 * Create On 2014-4-18 ����3:36:58
 * Author: jiangyuchao
 * E-mail: jiangyuchao@iwind-tech.com
 */

class SystemController extends Controller{
    public function __construct(){

        parent::__construct();
        //print_r($this->getRequest());
        $this->view->web_url = $this->getRequest()->hostUrl;

    }

    /**
     * 用户列表
     */
    public function Userlist(){
        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 10;
        $admin = new admin();
        $ar = new adminrole();
        $do = $this->getRequest()->get("do");
        if($do){
            if($do == "del"){
                $id = $this->getRequest()->get("id");
                if($id){
                    $result = $admin->delAdmin($id);
                    $ar->delAdminroleByAdminId($id);
                    if($result){
                        $this->view->result = $this->_lang->shanchuchenggong;
                    }else{
                        $this->view->result = $this->_lang->shanchushibai;
                    }
                }
            }
        }
        if($_POST){
            $username=$_POST["username"];
            $adminList=$admin->getAdminlistPageModel06(1,$pageSize,$username);
        }else{
            $adminList = $admin->getAdminlistPageModel($page,$pageSize);
        }
        if ($adminList['list']){
            for ($i = 0; $i < count($adminList['list']); $i++){
                $adminId = $adminList['list'][$i]['admin_id'];
                $roleList = $ar->getAdminroleByAdminId($adminId);
                $adminList['list'][$i]['role'] = $roleList;
            }
        }
        $this->view->userlist = $adminList;
        echo $this->view->render("userlist.html");
    }

    /**
     * 添加用户
     */
    public  function Adduser(){
        $admin = new admin();
        $ar = new adminrole();
        $role = new role();
        $userinfo = $this->getData("userinfo");
        //获取所有部门
        $adminorg=$admin->getAlladminorg_list02();
        if ($_POST){
            $result_admin=$admin->getadmin_info($_POST['number']);
            if ($_POST['number'] == ""){
                $this->view->result = $this->_lang->zhigonghaobunengweikong;
            }else if ($_POST['name'] == ""){
                $this->view->result = $this->_lang->zhenshixingmingbunengweikong;
            }else if($result_admin){
                $this->view->result = $this->_lang->ciguanlyuanyijingcunzai;
            }else{
                if(isset($_POST['res'])){
                    if ($_POST['sfzh']){
                        if (strlen($_POST['sfzh']) >= 6){
                            $pw = substr($_POST['sfzh'], -6);
                        }else{
                            $pw = "111111";
                        }
                    }else{
                        $pw = "111111";
                    }
                    $adminId = $admin->addAdmin($_POST['number'], $pw, $_POST['name'], $userinfo['admin_id'], $_POST['college']);
                    if ($adminId){
                        foreach ($_POST['res'] as $roleId){
                            $ar->addAminrole($adminId, $roleId);
                        }
                        $this->view->result = $this->_lang->tianjiachenggong;
                    }else{
                        $this->view->result = $this->_lang->tianjiashibai;
                    }
                }else{
                    $this->view->result = $this->_lang->xuanzejuese;
                }
            }
        }
        $roleList = $role->getRoleList();
        $this->view->adminorg=$adminorg;
        $this->view->rolelist = $roleList;
        echo $this->view->render("adduser.html");
    }

    /**
     * 修改用户
     */
    public function Modifyuser(){
        $id = $this->getRequest()->get("id");
        $role = new role();
        $ar = new adminrole();
        $admin = new admin();
        if ($id){
            if ($_POST){
                if (isset($_POST['res'])){
                    $ar->delAdminroleByAdminId($id);
                    foreach ($_POST['res'] as $roleId){
                        $ar->addAminrole($id, $roleId);
                    }
                    if(isset($_POST['college'])){
                        //修改用户信息
                        $ar->updateAdminInfo($id,$_POST['college']);
                    }
                    $this->view->result = $this->_lang->xiugaichenggong;
                }else{
                    $this->view->result = $this->_lang->xuanzejuese;
                }
            }
            //获取所有的用户部门
            $adminorg=$admin->getAlladminorg_list02();
            $adminInfo = $admin->getAdminInfoByAdminid($id);
            $roleList = $role->getRoleList();
            $arlist = $ar->getAdminroleByAdminId($id);
            $roleArr = array();
            foreach ($arlist as $ars){
                $roleArr[] = $ars['role_id'];
            }
            foreach ($roleList as &$rl){
                if (in_array($rl['role_id'], $roleArr)){
                    $rl['selected'] = 1;
                }else{
                    $rl['selected'] = 0;
                }
            }
            $this->view->adminorg=$adminorg;
            $this->view->admininfo = $adminInfo;
            $this->view->rolelist = $roleList;
            $this->view->id = $id;
        }
        echo $this->view->render("modifyuser.html");
    }

    /**
     * 根据职工号查找
     */
    public function Search(){
        $userNum = $this->getRequest()->get("number");
        if ($userNum){
            $fu = new frontuser();
            $userinfo = $fu->authUser($userNum);
            if ($userinfo){
                $this->view->setState("1");
                $this->view->setData($userinfo);
                $this->view->setMsg("success!");
            }else{
                $this->view->setState("0");
                $this->view->setMsg("failed!");
            }
        }else{
            $this->view->setState("0");
            $this->view->setMsg("failed!");
        }
        $this->view->display("json");
    }


    /**
     * 角色列表
     */
    public function Rolelist(){
        //print_r($this->getData("resource"));
        $role = new role();
        $do = $this->getRequest()->get("do");
        if ($do){
            $id = $this->getRequest()->get("id");
            if ($id > 1){
                $isDel = $role -> delRole($id);
                if ($isDel){
                    $this->view->result = $this->_lang->shanchuchenggong;
                }else{
                    $this->view->result = $this->_lang->shanchushibai;
                }
            }else{
                $this->view->result = $this->_lang->jinzhicaozuo;
            }
        }
        $roleList = $role->getRoleList();
        if($roleList){
            for($i=0; $i < count($roleList) ; $i++ ){
                $id = $roleList[$i]["role_id"];
                $adminlist = $role->getAdminByRoleId($id);
                if ($adminlist){
                    $roleList[$i]['is_use'] = 1;
                }else{
                    $roleList[$i]['is_use'] = 0;
                }
                $roleList[$i]['res'] = $role->getResourceOfRole($id);
            }
        }
        $this->view->rolelist = $roleList;
        echo $this->view->render("rolelist.html");
    }


    /**
     * 添加角色
     */
    public function Addrole(){
        //$resource = $this->getData("resource");
        //print_r($resource);
        $role = new role();
        if($_POST){
            if (isset($_POST['res'])){
                $theSameList = $role->reCheck($_POST['rolename']);//检查角色名是否存在
                if ($theSameList){
                    $this->view->result = $this->_lang->juesemingyicunzai;
                }else{
                    $id = $role->addRole($_POST['rolename'], addslashes($_POST['content']));
                    if( $id >0 ){
                        foreach ($_POST['res'] as $resId){
                            $role->addResourceToRole($id, $resId);
                        }
                        $this->view->result = $this->_lang->tianjiachenggong;
                    }else{
                        $this->view->result = $this->_lang->tianjiashibai;
                    }
                }
            }else{
                $this->view->result = $this->_lang->xuanzejuese;
            }
        }
        $res = $role->getCtrlList();
        $this->view->resList = $res;
        echo $this->view->render("addrole.html");
    }

    /**
     * 修改角色
     */
    public function Modifyrole(){
        $role = new role();
        $id = $this->getRequest()->get("id");
        if ($id){
            if ($_POST){
                if($_POST["rolename"] == ""){
                    $this->view->result = $this->_lang->juesemingbunengweikong;
                }else {
                    $theSameList = $role->reCheck($_POST["rolename"], $id);
                    if ($theSameList){
                        $this->view->result = $this->_lang->juesemingyicunzai;
                    }else{
                        if (isset($_POST['res'])){
                            $isUpdate = $role->editRole($id, $_POST["rolename"], addslashes($_POST['content']));
                            if ($isUpdate){
                                $role->delResourceToRole($id);
                                foreach ($_POST['res'] as $resId){
                                    $role->addResourceToRole($id, $resId);
                                }
                                $this->view->result = $this->_lang->xiugaichenggong;
                            }else{
                                $this->view->result = $this->_lang->xiugaishibai;
                            }
                        }else{
                            $this->view->result = $this->_lang->xuanzejuese;
                        }
                    }
                }
            }
            $roleInfo = $role->getRoleByRoleId($id);
            if($roleInfo){
                $id = $roleInfo["role_id"];
                $roleInfo['res'] = $role->getResourceOfRole($id);
                $resarr=array();
                foreach ($roleInfo['res'] as $res){
                    $resarr[] = $res['ctrl_id'];
                }
                $res = $role->getCtrlList();
                foreach($res as &$item){
                    if( in_array( $item['ctrl_id'], $resarr ) ){
                        $item['selected'] = 1;
                    }else{
                        $item['selected'] = 0;
                    }
                }
                $this->view->rolename = $roleInfo["role_name"];
                $this->view->roleintro = $roleInfo['role_intro'];
                $this->view->resList = $res;
            }
        }
        echo $this->view->render("modifyrole.html");
    }

    //用户组织列表
    public function  userorglist(){
        $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
        $pageSize = 10;
        $admin = new admin();
        $do = $this->getRequest()->get("do");
        if($do){
            if($do == "del"){
                $id = $this->getRequest()->get("id");
                if($id){
                    $result = $admin->delAdminorg($id);
                    if($result){
                        $this->view->result = $this->_lang->shanchuchenggong;
                    }else{
                        $this->view->result = $this->_lang->shanchushibai;
                    }
                }
            }
        }

        $adminList = $admin->getAlladminorg_list($page,$pageSize);
        $this->view->userlist = $adminList;
        echo $this->view->render("adminorglist.html");
    }
    //添加用户组织
    public  function Addadminorg(){
        $admin = new admin();
        if ($_POST){
            $result_addadminorg=$admin->addadminorg($_POST['number']);
            if ($result_addadminorg){
                $this->view->result = $this->_lang->tianjiachenggong;
            }else{
                $this->view->result = $this->_lang->tianjiashibai;
            }
        }
        echo $this->view->render("addadminorg.html");
    }


    /**
     * 修改用户组织
     */
    public function Modifyadminorg(){
        $id = $this->getRequest()->get("id");

        $ar = new adminrole();
        $admin = new admin();
        if ($id){
            if ($_POST){
                $updateOrg_result=$admin->updateOrg($_POST['organizer_id'],$_POST['organizer']);
                if($updateOrg_result){
                    $this->view->result = $this->_lang->xiugaichenggong;
                }else{
                    $this->view->result = $this->_lang->xiugaishibai;
                }
            }
            $adminInfo = $admin->getAdminorgInfoByAdminid($id);

            $this->view->admininfo = $adminInfo;
            $this->view->id = $id;
        }
        echo $this->view->render("modifyorganizer.html");
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
            $s = new SystemController();
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
        $s = new SystemController();
        $s->noticeTypeList();
    }

    public function nt_delete(){
        $id = $this->getRequest()->get("id");
        $notice_type = new notice();
        $result=$notice_type->ntDeleteById($id);
        if($result){
            $s = new SystemController();
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
        for($x=0;$x<=$len;$x++){

            if($noList['list'][$x]['nt_name']==null){
                $notice= new notice();
                //nt_id 就是数据库的通知公告类型的’其他‘字段，跟数据库不一样，请注意
                $sql="update notice set nt_id = 4 where notice_id = ".$noList['list'][$x]['notice_id'];
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
            echo 'a';
            if($_FILES['file']['error']=='0' && $_FILES['file']['size']<=20*1024*1024){
                $path="/common/upload/files/notice/";
                $realpath=str_replace('\\','/',DIR).$path;
                $fileSave=$realpath.$_FILES['file']['name'];
                $fileSaveToDB=$path.$_FILES['file']['name'];
                if(file_exists($fileSave)){
                    die('文件已存在，请<a href="<{$web_url/mannkgn.php/System/noticeAdd}>">点此返回</a>重新添加');
                }
                $su=move_uploaded_file($_FILES['file']['tmp_name'],$fileSave) ? '1' : '0';
                if($su=='1'){
                    $file_id=$notice->moveFile($fileSaveToDB);
                }
            }else{
                die('文件上传失败，请<a href="<{$web_url/mannkgn.php/System/noticeAdd}>">点此返回</a>重新添加');
            }
        }else{
            $file_id=null;
        }
        $result= $notice->addNotice($type,$title,$content,$time,$file_id);
        if($result>0){
            $s=new SystemController();
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
        //var_dump($noInfo);
        $this->view->noInfo=$noInfo;
        echo $this->view->render("noticeModify.html");
    }

    public function noticeEdit(){
        $id=$_POST['notice_id'];
        $title=$_POST['title'];
        $type=$_POST['type'];
        $content=$_POST['content'];
        $time=$_POST['time'];
        $file_id=null;
        $notice = new notice();
        $result=$notice->noticeEditById($title,$content,$type,$file_id,$time,$id);
        if($result){
            $s=new SystemController();
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
            $s=new SystemController();
            $s->noticeList();
        }else{
            echo "删除出错！！！";
        }
    }
}
