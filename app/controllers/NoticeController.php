<?php
    class NoticeController extends Controller{
        public function __construct()
        {
            parent::__construct();
            $this->view->web_url=$this->getRequest()->hostUrl;
        }

        public function moreNotice(){
            $fu_id = $this->getRequest()->get("id");

            //得出消息总数
            $message = new message();
            //得出未读消息总数
            $notReadMessage = $message->getNotReadMessageCountById($fu_id);
            if($notReadMessage==false){
                $this->view->countNotReadMessage = 0;
            }else{
                $this->view->countNotReadMessage = $notReadMessage["count(*)"];
            }
            $AllMessageList = $message->getAllMessageById($fu_id);
            if($AllMessageList==false){
                $this->view->countMessage = 0;
            }else{
                $this->view->countMessage = count($AllMessageList);
            }

            $notice = new notice();
            $page = $this->getRequest()->get("page") ? $this->getRequest()->get("page") : 1;
			
            $pageSize = 10;
            $noticeList = $notice->getNoticePageModel($page,$pageSize);
            $this->view->noticeList = $noticeList;
			
            //热门公告
            $hotNotice = $notice->getHotNotice();
            $this->view->hotNotice = $hotNotice;

            $this->getView()->display("moreNotice.html");
        }

        public function noticeDetail(){
            $fu_id = $this->getRequest()->get("id");

            //得出消息总数
            $message = new message();
            //得出未读消息总数
            $notReadMessage = $message->getNotReadMessageCountById($fu_id);
            if($notReadMessage==false){
                $this->view->countNotReadMessage = 0;
            }else{
                $this->view->countNotReadMessage = $notReadMessage["count(*)"];
            }
            $AllMessageList = $message->getAllMessageById($fu_id);
            if($AllMessageList==false){
                $this->view->countMessage = 0;
            }else{
                $this->view->countMessage = count($AllMessageList);
            }

            $notice_id = $this->getRequest()->get("id");
            $notice = new notice();
            $notice_read_num = $notice->getNoticeReadNumById($notice_id);
            $notice_read_num = $notice_read_num['0']['notice_read_num'] +1;

            $notice->updadeReadNum($notice_id,$notice_read_num);
            $notice_detail =  $notice->getNoticeById($notice_id);

            $this->view->notice_detail = $notice_detail;
            //热门新闻
            $notice = new notice();
            $hotNotice = $notice->getHotNotice();
            $this->view->hotNotice = $hotNotice;

            //上一条新闻
            $preNotice = $notice->getPreNotice($notice_id);
            $this->view->preNotice = $preNotice;

            //下一条新闻
            $nextNotice = $notice->getNextNotice($notice_id);
            $this->view->nextNotice = $nextNotice;

            $this->getView()->display("noticeDetail.html");
        }
    }