<?php
require("jpgraph/jpgraph.php");
require("jpgraph/jpgraph_pie.php");
require("jpgraph/jpgraph_pie3d.php");
require 'jpgraph/jpgraph_line.php';
class Graph2Controller extends Controller{
    public function getGraph(){
        /*$data = array();
        $dataLegend = array();
        $at = $_SESSION['atByYear'];
		echo "".$at;
        for($i=0;$i<count($at);$i++){
            $data[]=$at[$i]['count'];
            $dataLegend[] = $at[$i]['at_name'];
        }
        $dataNum = 0;
        for($i=0;$i<count($at);$i++){
            $dataNum = $at[$i]['count']+$dataNum;
        }
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
        $graph->Stroke();*/
	     $graph = new Graph(600,500);
		 $graph->SetScale('textlin');
		 $graph->img->SetMargin(60,30,30,50);
		 $graph->title->Set('2012年1至9月PHP使用率趋势图');
		 $graph->title->SetFont(FF_SIMSUN,FS_BOLD);
		 $graph->xaxis->title->Set('月份');
		 $graph->xaxis->title->SetFont(FF_SIMSUN,FS_BOLD);
		 $graph->yaxis->title->Set('使用率(%)');
		 $graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD);
		 $graph->yaxis->SetTitleMargin(40);
		 $datay = array('5.7','5.6','5.5','5.3','5.7','5.3','5','5.5','5.6');
		 $line = new LinePlot($datay);
		 $line->SetLegend('PHP');
		 $graph->Add($line);
		 var_dump($graph);
		 //生成并输出
		 $graph->stroke();
    }
}