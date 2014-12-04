<?php
header("Content-type:application/vnd.ms-excel");

header("Content-Disposition:filename=achievement.xls");
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
 class ExportExcelOfAchController extends Controller{

     public function export(){
          $id = $this->getRequest()->get("id");
          $gpt_id = $this->getRequest()->get("gpt_id");
          $gpt = $this->getRequest()->get("gpt");
         $realName = $this->getRequest()->get("realName");
          $model = new growthprofile();
          $achievement = $model->getgprofileByExport($id,$gpt_id);
         echo '<table border="1" width=100%><tr>
            <td>姓名</td>
            <td>类型</td>
            <td>内容</td>
            <td>学年</td>
            <td>创建时间</td>
            </tr>';
         for($i=0;$i<count($achievement);$i++){
             echo '<tr>
                <td>'.urldecode($realName).'</td>
                <td>'.urldecode($gpt).'</td>
                <td>'.$achievement[$i]["gp_content"].'</td>
                <td>'.$achievement[$i]["grade_id"].'</td>
                <td>'.date('Y-m-d',$achievement[$i]["gp_create_time"]).'</td>
                </tr>';
         }
         echo '</table>';



     }
 }