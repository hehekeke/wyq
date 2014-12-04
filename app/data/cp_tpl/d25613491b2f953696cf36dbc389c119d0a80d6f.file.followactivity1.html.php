<?php /* Smarty version Smarty-3.1.14, created on 2014-11-28 16:27:00
         compiled from "app\tpl\center\followactivity1.html" */ ?>
<?php /*%%SmartyHeaderCode:5665544df4db166189-76608465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd25613491b2f953696cf36dbc389c119d0a80d6f' => 
    array (
      0 => 'app\\tpl\\center\\followactivity1.html',
      1 => 1417162638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5665544df4db166189-76608465',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544df4db540344_08983910',
  'variables' => 
  array (
    'web_url' => 0,
    'student' => 0,
    'activityTypeList' => 0,
    'organizers' => 0,
    'followActivity' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544df4db540344_08983910')) {function content_544df4db540344_08983910($_smarty_tpl) {?><!DOCTYPE html>

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

  <script>
      //判断时间格式是否正确
      $(function(){
          $("#time").focus(function(){
              WdatePicker({dateFmt:'yyyy-MM-dd'});
          });
      });
      function selectActivity(){

          var types = $("#selectType input");
          var organizers = $("#selectOrganizers input");
          var status = $("#selectStatus input");
          var typesValues = new Array();
          var organizersValues = new Array();
          var statusValues = new Array();
          var time = $("#time").val();

          var j = 0;
          for(var i = 0;i<types.length;i++){
              if(types[i].checked){
                  typesValues[j++]=types[i].value;
              }
          }
          var j = 0;
          for(var i = 0;i<organizers.length;i++){
              if(organizers[i].checked){
                  organizersValues[j++]=organizers[i].value;
              }
          }
          var j = 0;
          for(var i = 0;i<status.length;i++){
              if(status[i].checked){
                  statusValues[j++]=status[i].value;
              }
          }

          $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/selectActivity",{"time":time,"typesValues":typesValues,"organizersValues":organizersValues,"statusValues":statusValues},function(data){
                        if(data==1){
                            alert("请选择筛选条件！！！");
                        }else{

                            $("#row").html(data);
                        }

                  });
      }
      function setClock1(obj){
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
      function cancelBox(){
          $("#clockBox").css("display","none");
      }
      function removeClock(au_id){
          $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/common/removeClock",{"au_id":au_id},function(data){
              if(data==1){
                  location.reload();
              }else{
                  alert("取消失败");
              }

          });
      }
      function openClock(){
          $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/common/clock",function(data){
              if(data!=false){
                alert(data);
              }
             // $("#body").html(data);
          });
      }
      window.onload = function(){
          setInterval(openClock, 3000);
      }

      function subTitle(ac_id,ac_title){
        $("#ac_id").val(ac_id);
        $("#myModalLabel").html(ac_title);
      }
      function subTitle1(obj){
          $("#ac_id").val($(obj).data("activity_id"));
          $("#myModalLabel").html($(obj).data("activity_title"));
      }

      function fileChoose(ele){
          $($(ele).next()).text($(ele).val());
          $($(ele).prev()).text("删除")
          $("#file_contain").append('<div class="file_block"><button  type="button" class="btn btn-danger btn-xs" onclick="add(this)">继续添加</button> 	<input  name="file[]" type="file" class="file_input"  onchange="fileChoose(this)">	<span></span>	</div>');
      }
      function add(ele){
          if($(ele).text() == "删除"){
              $($(ele).parent()).remove();
          }else{
              $($(ele).next()).trigger('click');
          }
      }
      function signOn(){
          $("#signForm").submit();
      }
      function overTime(){
          alert("活动进行中才可以签到");
      }
      function overSign(){
          alert("此活动已签到");
      }
      $(function(){

        var mm= document.getElementById("error").innerHTML;
          if(mm){
              alert(mm);
          }
      });
  </script>
  <style type="text/css">
      .file_box{position:relative; height:100%; margin-left: 40px;margin-top: 20px}
      .file_input{ position:absolute; top:0; right:80px; height:24px; filter:alpha(opacity:0);opacity: 0; }
  </style>
<body id="body">
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">

    <div class="col-md-12">
        <div class="page-header"><h3><?php echo $_smarty_tpl->tpl_vars['student']->value['fu_realname'];?>
的个人中心
        </h3></div>
    </div>
    <div class="col-md-2">
        <div class="list-group">
            <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/mycenter" class="list-group-item">个人资料</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/followActivity"class="list-group-item active">我关注的活动</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/syllabus" class="list-group-item">我的课程表</a>
        </div>
    </div>
    <div class="col-md-10">
        <form class="form-horizontal">
            <fieldset>
                <legend style="color: #ffffff">我关注的活动</legend>
                <div class="panel panel-default">
                    <div class="panel-heading">活动筛选</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">活动类型：</label>
                            <div class="col-sm-10" id="selectType">
                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['at'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['at']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['name'] = 'at';
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['activityTypeList']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['at']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['at']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['at']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['at']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['at']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['at']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['total']);
?>
                                <label class="checkbox-inline">
                                    <input type="checkbox"  value="<?php echo $_smarty_tpl->tpl_vars['activityTypeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['at']['index']]['at_id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['activityTypeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['at']['index']]['at_name'];?>

                                </label>
                                <?php endfor; endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">主办方：</label>
                            <!-- Modal -->
                            <div style="color: #000000" class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span
                                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="myModalLabel1">主办方</h4>
                                        </div>
                                        <div class="modal-body" id="selectOrganizers">
                                            <table>
                                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['organizers']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                                    <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']>=8){?>
                                                    <td>
                                                        <input type='checkBox' name='activity_organizer[]' value='<?php echo $_smarty_tpl->tpl_vars['organizers']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['organizers_id'];?>
'/><span><?php echo $_smarty_tpl->tpl_vars['organizers']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['organizers_name'];?>
</span>&nbsp;&nbsp;&nbsp;
                                                    </td>
                                                    <?php }?>
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

                            <div class="col-sm-10" id="selectOrganizers">
                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['og'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['og']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['name'] = 'og';
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['organizers']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['og']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['og']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['og']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['og']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['og']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['og']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['total']);
?>
                                <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['og']['index']<8){?>
                                <label class="checkbox-inline">
                                    <input type="checkbox"  value="<?php echo $_smarty_tpl->tpl_vars['organizers']->value[$_smarty_tpl->getVariable('smarty')->value['section']['og']['index']]['organizers_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['organizers']->value[$_smarty_tpl->getVariable('smarty')->value['section']['og']['index']]['organizers_name'];?>

                                </label>
                                <?php }?>
                                <?php endfor; endif; ?>...<input type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal1" value="更多">
                            </div>
                        </div>
                        <div class="form-group" id="selectStatus">
                            <label class="col-sm-2 control-label">状态：</label>
                            <div class="col-sm-10">
                                <label class="checkbox-inline">
                                    <input name="status" type="checkbox" id="inlineCheckbox1"value="1"> 未开始
                                </label>
                                <label class="checkbox-inline">
                                    <input name="status" type="checkbox" id="inlineCheckbox2"value="2"> 进行中
                                </label>
                                <label class="checkbox-inline">
                                    <input name="status" type="checkbox" id="inlineCheckbox3" value="3"> 已结束
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">日期：</label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="text" id="time" class="Wdate" style="height:30px;color:black;" />
                                    <span style="cursor: pointer" class="input-group-addon" onclick="selectActivity()">筛选</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel" style="color: #000000"></h4>
                        </div>
                        <div class="modal-body" style="color: #000000">
                                <form action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/signOn" method="post" id="signForm" enctype="multipart/form-data">
                                      姓名：<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_realname'];?>
" disabled/>
                                      学号：<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_username'];?>
" disabled/>
                                      <input type="hidden" id="ac_id" name="ac_id"/>
                                      <div class="file_box">
                                        <div id="file_contain">
                                            <div class="file_block">
                                                <button  type='button' class="btn btn-danger btn-xs" onclick="add(this)"/>添加图片</button>
                                                <input  name="file[]" type="file" class="file_input"  onchange="fileChoose(this)">
                                                <span></span>
                                            </div>
                                        </div>
                                      </div>
                                </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="button" class="btn btn-primary" onclick="signOn()">签到</button>
                        </div>
                    </div>
                </div>
            </div>

        <div id="clockBox" style="width: 350px;height: 170px;background: #ffffff;z-index: 998;position:fixed;*position:absolute;left:41%;top: 40%;display: none">
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
        <div class="row" id="row">
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['fa'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['fa']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['name'] = 'fa';
$_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['followActivity']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['fa']['total']);
?>
            <div class="col-md-3">

                <div class="site-activity-table <?php if ($_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_if_import']==1){?>recommend<?php }else{ ?>active<?php }?>" style="height:230px;width: 200px;<?php if (time()<=strtotime($_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_start_time'])){?>background-color:#99cc99
        <?php }elseif(strtotime($_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_end_time'])>=time()&&time()>=strtotime($_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_start_time'])){?>background-color:#FFCCFF<?php }else{ ?>background-color:#CCCCCC<?php }?>">
                    <a style="color:white" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/<?php echo $_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_class'];?>
/activityId/<?php echo $_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_id'];?>
">
                    <div class="title" style="margin: 0px 0px"><?php echo $_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_title'];?>
</div>
                    <div class="description">
                        <p>时间：<?php echo $_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_start_time'];?>
</p>
                        <p>地点：<?php echo $_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_address'];?>
</p>
                        <p>类型：<?php echo $_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['at_name'];?>
</p>
                        <p>主办方：<?php echo $_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['organizers_name'];?>
</p>
                    </div>
                    </a>

                     <?php if ($_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['if_clock']==1){?>
                     <div class="notification">
                         <!-- Button trigger modal -->
                         <?php if ($_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_registration_id']){?>
                         <button class="btn btn-primary btn-xs" onclick="alert('此活动已签到')">已签到</button>
                         <?php }else{ ?>
                             <?php if (strtotime($_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_end_time'])>=time()&&time()>=strtotime($_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_start_time'])){?>
                             <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" onclick="subTitle('<?php echo $_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_title'];?>
')">签到</button>
                             <?php }else{ ?>
                             <button class="btn btn-primary btn-xs" onclick="alert('活动进行中才可以签到')">签到</button>
                             <?php }?>
                         <?php }?>
                         <button style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/images/1.jpg')" class="btn btn-xs" onclick="javascript:if(confirm('确实要取消提醒?'))removeClock('<?php echo $_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['au_id'];?>
')"><i class="fa fa-bell"></i></button>

                     </div>
                     <?php }else{ ?>
                    <div class="notification" >
                        <!-- Button trigger modal -->
                        <?php if ($_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_registration_id']){?>
                            <button class="btn btn-primary btn-xs" onclick="alert('此活动已签到')">已签到</button>
                        <?php }else{ ?>
                            <?php if (strtotime($_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_end_time'])>=time()&&time()>=strtotime($_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_start_time'])){?>
                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" onclick="subTitle('<?php echo $_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_title'];?>
')">签到</button>
                            <?php }else{ ?>
                            <button class="btn btn-primary btn-xs" onclick="alert('活动进行中才可以签到')">签到</button>
                            <?php }?>
                        <?php }?>
                        <button style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/images/2.jpg')" id="clockButton<?php echo $_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_id'];?>
" class="btn btn-xs btn-info" onclick="setClock('<?php echo $_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_start_time'];?>
','<?php echo $_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_title'];?>
','<?php echo $_smarty_tpl->tpl_vars['followActivity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fa']['index']]['activity_id'];?>
')"><i class="fa fa-bell"></i></button>
                    </div>
                     <?php }?>
                </div>
            </div>
            <?php endfor; endif; ?>
        </div>

    </div>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</body>
</html><?php }} ?>