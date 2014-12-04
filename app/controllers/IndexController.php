<?php

class IndexController extends Controller{
	
	public function __construct(){
		parent::__construct();
		$this->view->web_url=$this->getRequest()->hostUrl;
	}
	
	public function Index(){
	$picture = new Picture();
		$getPicture =  $picture->get_lastest_picture();
		$this->view->getPicture=$getPicture;
         //获取新浪微博的数据
        set_time_limit(0);
        $url="http://v.t.sina.com.cn/widget/widget_blog.php?uid=1851774145";
		
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_HEADER,false);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $content=curl_exec($ch);
        curl_close($ch);
        $content =$this-> yang_gbk2utf8($content);
		
        preg_match_all('/<p class="wgtCell_txt">(.*)<\/p>/iUs',$content,$text);//获取文字
        preg_match_all('/<span class="wgtCell_tm">(.*)<\/span>/iUs',$content,$time);//获取时间
		
        for($i=0; $i<6; $i++){
            $weibo[$i]['content']=strip_tags($text[0][$i]);
            $weibo[$i]['time'] = strip_tags($time[0][$i]);
        }
      
       $this->view->weibo=$weibo;
		
        $info = $this->getData ( 'userinfo' );
        $id = $info['fu_id'];
		$model = new notice();
		
		$notice = $model->getnotice();
		
		if($notice == false){
			$flag = 0;
		}else{
			$this->view->notice = $notice;
			$flag = 1;
		}
		
        if($id){
            //得出消息总数
            $message = new message();
            //得出未读消息总数
            $notReadMessage = $message->getNotReadMessageCountById($id);
            if($notReadMessage==false){
                $this->view->countNotReadMessage = 0;
            }else{
                $this->view->countNotReadMessage = $notReadMessage["count(*)"];
            }
            $AllMessageList = $message->getAllMessageById($id);
            if($AllMessageList==false){
                $this->view->countMessage = 0;
            }else{
                $this->view->countMessage = count($AllMessageList);
            }

        }

		$this->view->flag = $flag;
		
		echo $this->view->render("index.htm");
	}

	function yang_gbk2utf8($str){
        $charset = mb_detect_encoding($str,array('UTF-8','GBK','GB2312'));
		
        $charset = strtolower($charset);
        if('cp936' == $charset){
            $charset='GBK';
        }
        if("utf-8" != $charset){
            $str = iconv($charset,"UTF-8//IGNORE",$str);
        }
		
        return $str;
		
    }
	
}