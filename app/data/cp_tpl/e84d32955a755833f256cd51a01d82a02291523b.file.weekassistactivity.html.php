<?php /* Smarty version Smarty-3.1.14, created on 2014-10-27 15:01:30
         compiled from "app\tpl\assist\weekassistactivity.html" */ ?>
<?php /*%%SmartyHeaderCode:23472544dedca05daa4-59781530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e84d32955a755833f256cd51a01d82a02291523b' => 
    array (
      0 => 'app\\tpl\\assist\\weekassistactivity.html',
      1 => 1413440718,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23472544dedca05daa4-59781530',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    '__userinfo__' => 0,
    'all_activity' => 0,
    'weekActivity' => 0,
    'weekActivityType' => 0,
    'value' => 0,
    'weekActivityOrg' => 0,
    'activity_info' => 0,
    'prePage' => 0,
    'nextPage' => 0,
    'HotActivityList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544dedca39cd89_82837287',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544dedca39cd89_82837287')) {function content_544dedca39cd89_82837287($_smarty_tpl) {?><!DOCTYPE html>

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
<script type="text/javascript">
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
            //alert(key);exit;
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
/index.php/Assist/AssistActivityQurey",{"time":time,"typesValue":typesValue,"organizersValue":organizersValue,"statusValue":statusValue,"recommendValue":recommendValue,"activity_class":1},function(data){

                $("#listshows").html(data);
            });



        });
    });
    function exportExcel(){
        location.href = "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/exportAssistExcel/getAct/activity_class/1";
    }
    function setClock2(obj){
        var activity_title = $(obj).data('activity_title');
        var activity_id = $(obj).data("activity_id");
        var start_time = $(obj).data("activity_start_time");
        $("#clock_title").val(activity_title);
        $("#activity_id").val(activity_id);
        $("#start_time").val(start_time);
        $("#clockBox").css("display","block");
    }
    function setClock(start_time,activity_title,activity_id){
        $("#clock_title").val(activity_title);
        $("#activity_id").val(activity_id);
        $("#start_time").val(start_time);
        $("#clockBox").css("display","block");
    }

    function cancelBox(){
        $("#clockBox").css("display","none");
    }
    function saveClock(){
        var activity_id = $("#activity_id").val();
        var clock_time = $("#clock_time").val();

        if(clock_time!=false){
            $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/setClock",{"activity_id":activity_id,"clock_time":clock_time},function(data){

                if(data==1){
                    alert("设置成功！");
                    location.reload();

                }
            });
        }else{
            alert("提醒时间不能为空！！");
        }
    }
    function removeClock(activity_id){

        $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/common/removeClock2",{"activity_id":activity_id,"fu_id":'<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
'},function(data){
            if(data==1){
                location.reload();
            }else{
                alert("取消失败");
            }

        });
    }
    function skip(){
        var totalPage = parseInt('<?php echo $_smarty_tpl->tpl_vars['all_activity']->value['totalPage'];?>
');
        var num = $("#num").val();
        var pattern = /^([0-9]+)$/;
        if(num==""){
            alert("请输入页数！");
        }else if(!pattern.test(num)){
            alert("请输入数字！");
        }else if(num > totalPage){
            alert("超过最大页码");
        }else{
            location.href="{$web_url}>/index.php/assist/AssistActivity/activity_class/1/page/"+num;
        }
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
<body style="color: #ffffff">
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-12">
        <div class="page-header"><h3>当前位置：辅学活动>周活动</h3></div>
    </div>
    <div class="col-md-8">
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
        <div id="clockBox" style="width: 350px;height: 170px;background: #ffffff;z-index: 998;position:fixed;*position:absolute;left:30%;top: 40%;display: none">
            <div style="cursor:pointer;color:#000000;position: absolute;left: 340px;z-index: 999" onclick="cancelBox()">X</div>
            <h3 style="text-align: center;background: #428bca;color: #ffffff">设置闹钟</h3>
            <div>
                <input id="activity_id" type="hidden"/>
                <span style="font-weight:bold;color: #000000">　活　动　标　题：</span><input style="color: #000000" id="clock_title" type="text" disabled/><br>
                <span style="font-weight:bold;color: #000000">　开　始　时　间：</span><input style="color: #000000" id="start_time" type="text" disabled/><br>
                <span style="font-weight:bold;color: #000000">　提　醒　时　间：</span><input onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" type="text" id="clock_time" class="Wdate" style="height:30px;color:black;" />
                <button onclick="saveClock()">提交</button>
            </div>
        </div>
        <div class="row" id="listshows" style="">

            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['activity_info']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <div class="col-md-3">
                <div class="site-activity-table <?php if ($_smarty_tpl->tpl_vars['activity_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['if_import']==1){?>recommend<?php }else{ ?>active<?php }?>" style="height:230px;width: 180px;<?php if (time()<=strtotime($_smarty_tpl->tpl_vars['activity_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['time'])){?>background-color:#99cc99
        <?php }elseif(strtotime($_smarty_tpl->tpl_vars['activity_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['end_time'])>=time()&&time()>=strtotime($_smarty_tpl->tpl_vars['activity_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['time'])){?>background-color:#FFCCFF<?php }else{ ?>background-color:#CCCCCC<?php }?>">
                        <a style="color: #ffffff" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/1/activityId/<?php echo $_smarty_tpl->tpl_vars['activity_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_id'];?>
">
                            <div class="title" style="margin: 0 0;height:3em"> <?php echo $_smarty_tpl->tpl_vars['activity_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_title'];?>
</div>
                            <div class="description">
                                <p>时间：<?php echo $_smarty_tpl->tpl_vars['activity_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['time'];?>
</p>
                                <p>地点：<?php echo $_smarty_tpl->tpl_vars['activity_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['didian'];?>
</p>
                                <p>类型：<?php echo $_smarty_tpl->tpl_vars['activity_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['leixing'];?>
</p>
                                <p>主办方：<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['activity_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['zhubanfang'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?><?php echo $_smarty_tpl->tpl_vars['activity_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['zhubanfang'];?>
<?php }else{ ?>无主办方<?php }?></p>
                            </div>
                        </a>
                        <?php if ($_smarty_tpl->tpl_vars['activity_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['naozhong']==0){?>
                        <div class="notification">
                            <button style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/images/2.jpg')" onclick="setClock('<?php echo $_smarty_tpl->tpl_vars['activity_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['time'];?>
','<?php echo $_smarty_tpl->tpl_vars['activity_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_title'];?>
','<?php echo $_smarty_tpl->tpl_vars['activity_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_id'];?>
')" class="btn btn-xs btn-info"><i class="fa fa-bell"></i></button>
                        </div>
                        <?php }else{ ?>
                        <div class="notification">
                            <button style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/images/1.jpg')" class="btn btn-xs" onclick="javascript:if(confirm('确实要取消提醒?'))removeClock('<?php echo $_smarty_tpl->tpl_vars['activity_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_id'];?>
')"><i class="fa fa-bell"></i></button>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <?php endfor; else: ?>
                <div class="col-md-3">
                    <div class="site-activity-table active">
                        无此类活动！
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['activity_info']->value){?>
            <div style="text-align:center;margin-bottom: 20px" id="page">
                <?php if ($_smarty_tpl->tpl_vars['all_activity']->value['page']>1){?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assist/AssistActivity/activity_class/1/page/1">首页</a>
                <?php $_smarty_tpl->tpl_vars['prePage'] = new Smarty_variable($_smarty_tpl->tpl_vars['all_activity']->value['page']-1, null, 0);?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assist/AssistActivity/activity_class/1/page/<?php echo $_smarty_tpl->tpl_vars['prePage']->value;?>
">上一页</a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['all_activity']->value['page']<$_smarty_tpl->tpl_vars['all_activity']->value['totalPage']){?>
                <?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_variable($_smarty_tpl->tpl_vars['all_activity']->value['page']+1, null, 0);?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assist/AssistActivity/activity_class/1/page/<?php echo $_smarty_tpl->tpl_vars['nextPage']->value;?>
">下一页</a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assist/AssistActivity/activity_class/1/page/<?php echo $_smarty_tpl->tpl_vars['all_activity']->value['totalPage'];?>
">尾页</a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['all_activity']->value['page']>1){?>
                跳转到<input id="num" type="text" style="color:#000000;width: 40px;height:20px;margin-left: 5px">
                <button onclick="skip()">GO</button>
                <?php }?>
                <span style="margin-left: 20px">当前第<?php echo $_smarty_tpl->tpl_vars['all_activity']->value['page'];?>
页/共<?php echo $_smarty_tpl->tpl_vars['all_activity']->value['totalPage'];?>
页</span>
            </div>
          <?php }?>
            <input type="hidden" id="show_class" value="1">
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