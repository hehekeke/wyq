<?php
//class DemoController extends Controller {
//	public function __construct() {
//		parent::__construct ();
//		$this->view->web_host = $this->getRequest ()->hostUrl;
//		$this->view->web_app_url = $this->getRequest ()->hostUrl . "/index.php";
//	}
	

//	public function demo() {
//        print_r($_POST);
        $name=$_POST['name'];
        //$status=$this->_request->get('status');
        //$name=$this->_request->get('name');
        // $pwd=$this->getRequest()->get("pwd");
//        var_dump($name);
        $ret = json_encode($_POST);
        echo $ret;

        // var_dump($pwd);
//        echo $this->view->render("a.html");
//     }

//}
?>0