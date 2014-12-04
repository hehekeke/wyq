<?php
/**
*  Create On 2010-7-12
*  Author Been
*  QQ:281443751
*  Email:binbin1129@126.com
**/
class IndexController extends Controller{
	public function __construct(){
		
		parent::__construct();
		//print_r($this->getRequest());
		$this->view->web_url = $this->getRequest()->hostUrl;
		//var_dump($this->getRequest()->hostUrl);
		
	}
	
public function setInfo(){
    $file=file_get_contents('V_XSJBXX_GNSZ.json');
    $arr=json_decode($file,true);
    // $result=array();
      $aa = new aaa();
	    for($i=0;$i<count($arr['RECORDS']);$i++){
        $result['bks_code']=$arr['RECORDS'][$i]['XH'];
		$result['bks_name']=$arr['RECORDS'][$i]['XM'];
		if($arr['RECORDS'][$i]['XBDM']==1){
		  $result['bks_gender']="男";
		}else{
		  $result['bks_gender']="女";
		}
		$result['bks_sfzh']=$arr['RECORDS'][$i]['SFZJH'];
		$result['bks_grade']=$arr['RECORDS'][$i]['RXNF'];
		$result['bks_college']=$arr['RECORDS'][$i]['YXSH_DISPLAYVALUE'];
		$result['bks_major']=$arr['RECORDS'][$i]['ZYDM_DISPLAYVALUE'];
        $if_exists=$aa->getInfo($result['bks_code']);
        if(!$if_exists){
         $resultmmm=$aa->setInfo($result['bks_code'],$result['bks_name'],$result['bks_gender'],$result['bks_sfzh'],$result['bks_grade'],$result['bks_college'],$result['bks_major']);
        }
        }
	echo "OK";
     
	}
	
	

}