<?php
header("Content-type:application/vnd.ms-excel");

header("Content-Disposition:filename=weekAssistActivity.xls");
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
class ExportAssistExcelController extends Controller{
    public function getAct(){
        $activity_class =  $this->getRequest()->get("activity_class");
        $model = new activity();
        $activity = $model->getActivityByActivityClass($activity_class);
        $arr1 = $activity;
        //合并多主办方算法
        for($i=0;$i<count($arr1);$i++){
            for($j=0;$j<count($arr1);$j++){
                if($i != $j){
                    if($activity[$i]["activity_id"]==$activity[$j]["activity_id"]){
                        if($i>$j){
                            unset($activity[$i]);
                        }else{
                            $activity[$i]["organizers_name"] = $activity[$i]["organizers_name"]."、".$activity[$j]["organizers_name"];
                        }
                    }
                }
            }
        }
        $activity = array_values($activity);
        echo '<table border="1" width=100%><tr>
            <td>活动标题</td>
            <td>活动内容</td>
            <td>活动地点</td>
            <td>开始时间</td>
            <td>结束时间</td>
            <td>活动主办方</td>
            </tr>';
        for($i=0;$i<count($activity);$i++){
            echo '<tr>
                <td>'.$activity[$i]["activity_title"].'</td>
                <td>'.$activity[$i]["activity_content"].'</td>
                <td>'.$activity[$i]["activity_address"].'</td>
                <td>'.$activity[$i]["activity_start_time"].'</td>
                <td>'.$activity[$i]["activity_end_time"].'</td>
                <td>'.$activity[$i]["organizers_name"].'</td>
                </tr>';
        }
        echo '</table>';
    }
}