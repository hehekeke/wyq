<?php

include_once("jpgraph/jpgraph.php");
include_once("jpgraph/jpgraph_pie.php");
include_once("jpgraph/jpgraph_pie3d.php");
class GraphController extends Controller{
    public function getGraph(){
	$at = $_SESSION['at'];
       $data = array();
        $dataLegend = array();
        $at = $_SESSION['at'];
        for($i=0;$i<count($at);$i++){
            $data[]=$at[$i]['count'];
            $dataLegend[] = $at[$i]['at_name'];
        }
        $dataNum = 0;
        for($i=0;$i<count($at);$i++){
            $dataNum = $at[$i]['count']+$dataNum;
        }
		var_dump($dataNum);
		 
        if($dataNum==0){
            $p2 = new PiePlot(array(1));
            $p2->SetLegends(array("无数据"));
            $graph = new PieGraph(400,200);
            $graph->SetShadow();
            $graph->Add($p2);
            $graph->Stroke();
        }
        $p1 = new PiePlot($data);
        $p1->SetLegends($dataLegend);
        $graph = new PieGraph(400,200);
        $graph->SetShadow();
		
        $graph->Add($p1);
       $graph->Stroke();
		
		
    }
}