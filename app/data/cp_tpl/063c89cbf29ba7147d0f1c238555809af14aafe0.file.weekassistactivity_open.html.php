<?php /* Smarty version Smarty-3.1.14, created on 2014-10-27 15:01:45
         compiled from "app\tpl\assist\weekassistactivity_open.html" */ ?>
<?php /*%%SmartyHeaderCode:15183544dedd916ee12-60930582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '063c89cbf29ba7147d0f1c238555809af14aafe0' => 
    array (
      0 => 'app\\tpl\\assist\\weekassistactivity_open.html',
      1 => 1413550231,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15183544dedd916ee12-60930582',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'data_json' => 0,
    'weekActivity' => 0,
    'weekActivityType' => 0,
    'value' => 0,
    'weekActivityOrg' => 0,
    'syllabusList' => 0,
    'HotActivityList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544dedd9393652_08769934',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544dedd9393652_08769934')) {function content_544dedd9393652_08769934($_smarty_tpl) {?><!DOCTYPE html>

<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/css/index/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/css/index/site.css" rel="stylesheet">
    <script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/js/holder.js"></script>

    <script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/My97DatePicker/WdatePicker.js"></script>

</head>
<style>
    #syllabusTable td{
        border: solid 1px;
        width: 100px;
        text-align: center;
        height: 60px;
        position: relative;
        overflow: visible;
    }
    #addTable td{
        color: #000000;
   }
    .pop_data{
        position: absolute;
        left: 30%;
        top: 30%;
        width: 500px;
        max-height: 300px;
        overflow: auto;
        background-color: #cfc2bb;
        z-index: 9999;
    }
    .one_data{
        width: 500px;
        height: 59px;
        border-bottom: 1px solid #000000;
    }
    .one_data_p{
        text-align:left;
    }
    .data_activity_title:hover{
        text-decoration: none;
    }
</style>
<script type="text/javascript">
        var data = <?php echo $_smarty_tpl->tpl_vars['data_json']->value;?>
;
    //查看年活动
    $(document).ready(function() {
        $(".big_button:last").click(function(){
            location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/AssistActivity/activity_class/0"
        });
    });
    //关键字搜索
    $(function() {
        $("#keyword_search").click(function(){
            var search = $("#search").val();
            //alert(search);
            var key=encodeURI(search);
            window.location.href= "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/AssistActivity/activity_class/1/keywords/"+key;
        });
    });

    $(function(){
        $("#time").focus(function(){
            WdatePicker({dateFmt:'yyyy-MM-dd'});
        });
    });

    //活动筛选
    $(function(){
        $(".shaixuan").click(function(){
            var j=0;
            var types=$("#qurey_type input");
            var typesValue = new Array();
            var organizers=$("#selectOrganizer input");
            var organizersValue  = new Array();
            var status= $("#qurey_status input");
            var statusValue  = new Array();
            var recommend = $("#qurey_recommend input");
            var time = $("#time").val();

            if(recommend[0].checked){
                var recommendValue = recommend[0].value;
            }

            var j=0;
            for(var i=0; i<types.length; i++){
                if(types[i].checked){
                    typesValue[j++] = types[i].value;

                }
            }
            var j=0;
            for(var i=0; i<organizers.length; i++){
                if(organizers[i].checked){
                    organizersValue[j++] = organizers[i].value;
                }
            }
            var j=0;
            for(var i=0; i<status.length;i++){
                if(status[i].checked){
                    statusValue[j++] = status[i].value;
                }
            }

            $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/AssistActivityQurey",{"time":time,"typesValue":typesValue,"organizersValue":organizersValue,"statusValue":statusValue,"recommendValue":recommendValue,"activity_class":1},function(d){
                 data = d;
            },"json");
         });



    });


    var  cjieshu = -1;
    var  cxinqi = -1;

    function editMon(jieshu,xingqi,ele){

        if( cjieshu == jieshu && cxinqi == xingqi){
            return;
         }
        $(".pop_data").remove();
        cjieshu = jieshu;
        cxinqi = xingqi;
        var now= new Date();
        now.setFullYear(now.getFullYear());
        now.setMonth(now.getMonth());
        now.setDate(now.getDate());
        now.setHours(00);
        now.setMinutes(00);
        now.setSeconds(00);
        //将日期转换
        var nowtime=now.getTime();
        var Week=now.getDay();
        var Xday=xingqi-Week;
        var date02=parseInt(nowtime)+(Xday*24*60*60*1000);
        var starttimes;
       var endtimes;
       if(jieshu==1){
             starttimes=date02+(3600*8*1000);
             endtimes=date02+3600*8*1000+45*60*1000;
        }else if(jieshu==2){
             starttimes=date02+3600*8*1000+55*60*1000;
             endtimes=date02+3600*9*1000+40*60*1000;
        }else if(jieshu==3){
            starttimes=date02+3600*10*1000;
            endtimes=date02+3600*10*1000+45*60*1000;
        }else if(jieshu==4){
            starttimes=date02+3600*10*1000+55*60*1000;
            endtimes=date02+3600*11*1000+40*60*1000;
        }else if(jieshu==5){
              starttimes=date02+3600*14*1000;
             endtimes=date02+3600*14*1000+45*60*1000;
        }else if(jieshu==6){
            starttimes=date02+3600*14*1000+45*60*1000;
            endtimes=date02+3600*15*1000+40*60*1000;
        }else if(jieshu==7){
            starttimes=date02+3600*1000*16*1000;
             endtimes=date02+3600*16*1000+45*60*1000;
        }else if(jieshu==8){
            starttimes=date02+3600*16*1000+55*60*1000;
            endtimes=date02+3600*17*1000+40*60*1000;
        }else if(jieshu==9){
            starttimes=date02+3600*18*1000+30*60*1000;
            endtimes=date02+3600*19*1000+15*60*1000;
        }else if(jieshu==10){
           starttimes=date02+3600*19*1000+25*60*1000;
           endtimes=date02+3600*20*1000+10*60*1000;
        }else if(jieshu==11){
            starttimes=date02+3600*20*1000+20*60*1000;
            endtimes=date02+3600*21*1000+5*60*1000;
        }else if(jieshu==12){
            starttimes=date02+3600*21*1000+15*60*1000;
            endtimes=date02+3600*22*1000;
        }
     var html = "<div class='pop_data'   onmouseover='activity_list(this)'  onmouseout='lost(this)'>";
     for(var i=0; i<data.length; i++){
         var start_time = new Date(data[i].activity_start_time.replace(/\-/g,'/'));
         var end_time = new Date(data[i].activity_end_time.replace(/\-/g,'/'));
           if(endtimes>=start_time.getTime() && starttimes<= end_time.getTime()){
             html+="<div class='one_data'>";
             html+="<p  class='one_data_p'>";
             html+="<span><a class='data_activity_title' href='<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/1/activityId/"+data[i].activity_id+"'>"+data[i].activity_title+"</a>";
             html+="</span>";
             html+="<br>";
             html+="<span>结束时间:" +data[i].activity_end_time+ " 地点: "+data[i].activity_address +"";
             html+="</span>";
             html+="</p>";
             html+="</div>";
          }
        }

         html += "</div>";
        if(!ele.getAttribute("data-syll_name")){
            $(ele).append(html);
        }

    }

     function bodyclick(){
            $(".pop_data").remove();
         cjieshu = -1;
         cxinqi = -1;
        }
    function activity_list(o){

        $($(o).parent()).data("holder", 1);
    }
    function exportExcel(){
        location.href = "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/exportAssistExcel/getAct/activity_class/1";
    }
   function selectOg(){
        var inputs = $("#myModal input");
        var selectStr = new Array();
        var selectId = new Array();
        var j = 0;
        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].checked) {
                selectStr[j] = $(inputs[i]).next("span").html();
                selectId[j++] = $(inputs[i]).val();
            }

        }
    $("#selectOgDiv").html(selectStr.join(","));
    }
</script>
<body style="color: #ffffff" onclick="bodyclick()">
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row" style="margin-bottom: 20px" >
    <div class="col-md-12">
        <div class="page-header"><h3>当前位置：辅学活动>周活动(课程格子)</h3></div>
    </div>
    <div class="col-md-8" style="width: 74%">
        <form class="form-horizontal" id="mform">
            <fieldset>
                <div ><p class="p_border"><?php echo $_smarty_tpl->tpl_vars['weekActivity']->value['sa_content'];?>
</p></div>
                <div><table class="table" style="border:1px solid #ddd;background:#D15606;"><tr>
                    <td>按关键字搜索：</td>
                    <td><input class="form-control" id="search" placeholder="请输入关键字"></td>
                    <td><button type="button" id="keyword_search" class="btn btn-default" style="background:#FE6500;color:#fff;">搜索</button></td>
                </tr></table></div>
                <div class="panel panel-default" style="background:#2E3641;">
                    <div class="panel-heading">活动筛选</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">活动类型：</label>
                            <div class="col-sm-10" id="qurey_type">
                                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['weekActivityType']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['at_id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['value']->value['at_name'];?>

                                </label>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">主办方：</label>
                            <!-- Modal -->
                            <div style="color: #000000" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span
                                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="myModalLabel">主办方</h4>
                                        </div>
                                        <div class="modal-body" id="selectOrganizer">
                                            <table>
                                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['weekActivityOrg']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>

                                                <?php if (!($_smarty_tpl->getVariable('smarty')->value['section']['i']['index'] % 4)){?>
                                                <tr>
                                                    <?php }?>

                                                    <td>
                                                        <input type='checkBox' name='activity_organizer[]' value='<?php echo $_smarty_tpl->tpl_vars['weekActivityOrg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['organizers_id'];?>
'/><span><?php echo $_smarty_tpl->tpl_vars['weekActivityOrg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['organizers_name'];?>
</span>&nbsp;&nbsp;&nbsp;
                                                    </td>

                                                    <?php if (!(($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']+1) % 4)){?>
                                                </tr>
                                                <?php }?>

                                                <?php endfor; endif; ?>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="selectOg()">
                                                确定
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-10" id="selectOrganizer">
                            <input style="float: left" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" value="选择主办方">
                                <div style="line-height:25px;white-space:nowrap;text-overflow:ellipsis;font-weight:bold;float: left;margin-left: 10px;width: 500px;height:20px;overflow: hidden" id="selectOgDiv"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">状态：</label>
                            <div class="col-sm-10" id="qurey_status">
                                <label class="checkbox-inline">
                                    <input type="checkbox"  value="1"> 未开始
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="2"> 进行中
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="3"> 已结束
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">重点推荐：</label>
                            <div class="col-sm-10" id="qurey_recommend">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox7" value="1" > 推荐
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" id="selectDate">日期：</label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="text" id="time" class="Wdate" style="height:30px;color:black;" />
                                    <span class="input-group-addon" style="cursor: pointer;"><i class="shaixuan">筛选</i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>

        <div class="row" id="listshows" style="">

            <table id="syllabusTable" style="border: solid 1px;width: 100% ">
                    <tr>
                    <td>时间</td><td>星期一</td><td>星期二</td><td>星期三</td><td>星期四</td><td>星期五</td><td>星期六</td><td>星期日</td>
                </tr>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sy'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sy']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['name'] = 'sy';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['syllabusList']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['total']);
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_number'];?>
</td>
                    <td style="cursor: pointer;position:relative;" data-holder="0"  data-syll_name="<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_monday'];?>
"  onmouseover="editMon('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']+1;?>
',1,this)"><?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_monday'];?>


                    </td>
                    <td style="cursor: pointer;position:relative;" data-holder="0"  data-syll_name="<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_tuesday'];?>
"    onmouseover="editMon('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']+1;?>
',2,this)"><?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_tuesday'];?>


                    </td>
                    <td style="cursor: pointer;position:relative" data-holder="0" data-syll_name="<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_wednesday'];?>
"   onmouseover="editMon('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']+1;?>
',3,this)"><?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_wednesday'];?>


                    </td>
                    <td style="cursor: pointer;position:relative" data-holder="0"  data-syll_name="<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_thursday'];?>
"   onmouseover="editMon('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']+1;?>
',4,this)"><?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_thursday'];?>


                    </td>
                    <td style="cursor: pointer;position:relative" data-holder="0" data-syll_name="<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_friday'];?>
"   onmouseover="editMon('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']+1;?>
',5,this)"><?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_friday'];?>


                    </td>
                    <td style="cursor: pointer;position:relative" data-holder="0" data-syll_name="<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_saturday'];?>
"  onmouseover="editMon('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']+1;?>
',6,this)"><?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_saturday'];?>


                    </td>
                    <td style="cursor: pointer;position:relative" data-holder="0" data-syll_name="<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_sunday'];?>
"   onmouseover="editMon('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']+1;?>
',7,this)"><?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_sunday'];?>


                    </td>
                </tr>
                <?php endfor; endif; ?>
            </table>
        </div>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-default big_button" onclick="exportExcel()">下载本周活动安排</button>
            <button type="button" id="year" class="btn btn-default big_button">查看学年活动</button>
            <table class="table table-striped"  style="border:1px solid #ddd;">
                <thead>
                <tr style="background:#2E3641"><td><center>周热门活动</center></td></tr>
                </thead>
                <tbody style="background:#FFFFFF;color:#ADBECA;">
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['HotActivityList']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total']);
?>
                <tr>
                    <td>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/1/activityId/<?php echo $_smarty_tpl->tpl_vars['HotActivityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_id'];?>
">
                            <?php if ($_smarty_tpl->tpl_vars['HotActivityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_if_import']==1){?>【推荐】 <?php echo $_smarty_tpl->tpl_vars['HotActivityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_title'];?>

                            <?php }else{ ?>⊙ <?php echo $_smarty_tpl->tpl_vars['HotActivityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_title'];?>

                            <?php }?>
                        </a>
                    </td>

                </tr>

                <tr style="background-color:gray;"><td>发布日期：<?php echo $_smarty_tpl->tpl_vars['HotActivityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_create_time'];?>
</td></tr>
                <?php endfor; endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>