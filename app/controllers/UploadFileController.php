<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-26
 * Time: 下午3:33
 */

     class UploadFileController extends Controller{
        public function uploadFile(){
            $fileLink = $this->getRequest()->get("file_link");
            $fileName = $this->getRequest()->get("file_name");
            $fileLink =  strtr(urldecode($fileLink),"=","/");
            $fileName = urldecode($fileName);
            $file = @ fopen($fileLink,"r");
            if (!$file) {
                echo "文件找不到";
            } else {
                Header("Content-type: application/octet-stream");
                Header("Content-Disposition: attachment; filename=" . $fileName);
                while (!feof ($file)) {
                    echo fread($file,50000);
                }
                fclose ($file);
            }

        }
     }