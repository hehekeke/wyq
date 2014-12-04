<?php
header("Content-type:application/vnd.ms-excel");

header("Content-Disposition:filename=growthRecord.xls");
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
class ExportExcelController extends Controller{
    public function getAct(){
        $id =  $this->getRequest()->get("id");
        $model = new activity();
        $activity = $model->getActivity($id);
        echo '<table border="1" width=100%><tr>
            <td>姓名</td>
            <td>标题</td>
            <td>内容</td>
            <td>时间</td>
            </tr>';
        for($i=0;$i<count($activity);$i++){
            echo '<tr>
                <td>'.$activity[$i]["fu_realname"].'</td>
                <td>'.$activity[$i]["activity_title"].'</td>
                <td>'.$activity[$i]["activity_content"].'</td>
                <td>'.$activity[$i]["activity_registration_create_time"].'</td>
                </tr>';
        }
        echo '</table>';
    }
}