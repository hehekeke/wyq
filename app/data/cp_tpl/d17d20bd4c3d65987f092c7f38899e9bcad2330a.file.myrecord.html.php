<?php /* Smarty version Smarty-3.1.14, created on 2014-10-27 17:07:26
         compiled from "app\tpl\record\myrecord.html" */ ?>
<?php /*%%SmartyHeaderCode:6250544e0b4e77c7d6-59689096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd17d20bd4c3d65987f092c7f38899e9bcad2330a' => 
    array (
      0 => 'app\\tpl\\record\\myrecord.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6250544e0b4e77c7d6-59689096',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'activityList' => 0,
    'student' => 0,
    'bks' => 0,
    'activityAllList' => 0,
    '__userinfo__' => 0,
    'countActivityByYear' => 0,
    'prePage' => 0,
    'nextPage' => 0,
    'atByYear' => 0,
    'at' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544e0b4ec1d511_10504317',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544e0b4ec1d511_10504317')) {function content_544e0b4ec1d511_10504317($_smarty_tpl) {?><!DOCTYPE html>

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






</head>
<style>
    #news{
        width:363px;
        height:325px;
        position:relative;
    }
    #img_bt{
        position:absolute;
        left:100px;
        top:155px;
    }
    #img_bt li{
        float:left;
        color:red;
        margin-left:10px;cursor:pointer;
    }
    #news img{
        display:none;
    }
    #news img:first-child{
        display:block;
    }

    li{
        list-style: none;
    }
    a{
        color: #ffffff;
    }
    .page a{
        color: wheat;
    }
    #analysis table td{
        border: solid 2px;
        background: #9A2D7C;
        text-align:center;
    }

    #liColor a{
        color: #000000;
        font-weight: bold;
    }


</style>
<script>
    function exportExcel(id){
        location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/exportExcel/getAct/id/"+id;
    }
    var x = 1
    function analysis(){

        if(!(x%2==0)){
            $("#analysis").css("display","block");
            $("#analysisButton").html("关闭");
            x++;
        }else{
            $("#analysis").css("display","none");
            $("#analysisButton").html("分析");
            x++;
        }
    }
    function printExcel(){
        $("#Table").css("display","block");
        $("#bigDiv").css("display","none");
        window.print();
        location.reload();
    }
    function skip(){
        var totalPage = parseInt('<?php echo $_smarty_tpl->tpl_vars['activityList']->value['totalPage'];?>
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
            location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/page/"+num;
        }
    }
    function skipOfOther(){
        var totalPage = parseInt('<?php echo $_smarty_tpl->tpl_vars['activityList']->value['totalPage'];?>
');
        var num = $("#otherNum").val();
        var pattern = /^([0-9]+)$/;
        if(num==""){
            alert("请输入页数！");
        }else if(!pattern.test(num)){
            alert("请输入数字！");
        }else if(num > totalPage){
            alert("超过最大页码");
        }else{
            location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/page/"+num;
        }
    }

    function subTitle(thoughtsContent,ar_id,activity_title){
        $("#ar_id").val(ar_id);
        $("#myModalLabel").html(activity_title);
        $("#thoughtsContent").val(thoughtsContent);
    }
    function writeThoughts(){
        var ar_id = $("#ar_id").val();
        var thoughtsContent = $("#thoughtsContent").val();
        $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/writeThoughts",{"ar_id":ar_id,"thoughtsContent":thoughtsContent},function(data){
            if(data>0){
                alert("保存成功");
                location.reload();
            }else{
                alert("保存失败");
            }
        });
    }
    function readThoughts(activity_title,thoughts){
        $("#myModalLabel2").html(activity_title);
        $(".modal-body").html(thoughts);
    }
    function openPic(index){
        var imgBoxId = "#imgBox"+index;
        $("#lookImg").html($(imgBoxId).html());
        $("#lookImg div").css("display","block");
        $("#lookImg img").css("display","none");
        $("#lookImg img:first").css("display","block");

    }
    function changePic(index,count){
            $("#lookImg img").css("display","none");
            var id = "#img"+index;
            $(id).css("display","block");
    }



</script>
<body>
<div style="display: none" id="Table">
   <table border="1" width=100%<?php ?>>
     <tr>
        <td>姓名</td>
        <td>标题</td>
        <td>内容</td>
        <td>时间</td>
    </tr>
     <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ac'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ac']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['name'] = 'ac';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['activityAllList']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['total']);
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['activityAllList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ac']['index']]['fu_realname'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['activityAllList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ac']['index']]['activity_title'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['activityAllList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ac']['index']]['activity_content'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['activityAllList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ac']['index']]['activity_registration_create_time'];?>
</td>
    </tr>
       <?php endfor; endif; ?>
   </table>
</div>
<div id="bigDiv">
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row" style="padding-top:15px;">
    <div class="col-md-12">
        <div class="page-header"><h3>当前位置：成长档案>成长档案详情</h3></div>
        <?php if ($_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id']==$_smarty_tpl->tpl_vars['student']->value['fu_id']){?>
        <center><h1><?php echo $_smarty_tpl->tpl_vars['student']->value['fu_grade'];?>
级 <?php echo $_smarty_tpl->tpl_vars['student']->value['college_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['student']->value['major_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['student']->value['fu_realname'];?>
 成长档案</h1></center>
        <?php }else{ ?>
        <center><h1><?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_grade'];?>
级 <?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_college'];?>
 <?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_major'];?>
 <?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_name'];?>
 成长档案</h1></center>
        <?php }?>
    </div>
    <div class="col-md-12" id="liColor">
        <ul class="nav nav-tabs navbar-right">
            <?php if ($_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id']==$_smarty_tpl->tpl_vars['student']->value['fu_id']){?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myplan/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">个人成长计划</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievement/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">个人成果清单</a></li>
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">辅学活动成长记录</a></li>
            <?php }else{ ?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myplan/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">个人成长计划</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievement/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">个人成果清单</a></li>
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">辅学活动成长记录</a></li>
            <?php }?>
        </ul>
    </div>

    <div class="col-md-12 panel panel-default" style="height: 560px">
        <div class="panel-body" style="height:500px">
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <button style="float: right" id="analysisButton" type="button" class="btn btn-default" onclick="analysis()">分析</button>
                    <button style="float: right" type="button" class="btn btn-default" onclick="exportExcel('<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
')">导出excel</button>
                    <button style="float: right" type="button" class="btn btn-default" onclick="printExcel()">打印</button>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel" style="color: #000000"></h4>
                        </div>
                        <div class="modal-body" style="color: #000000">
                                <input type="hidden" id="ar_id" name="ar_id"/>
                                <textarea id="thoughtsContent" name="thoughtsContent" style="width: 500px;height: 280px"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="button" class="btn btn-primary" onclick="writeThoughts()">保存</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Large modal -->
            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel1" style="color: #000000">照片浏览</h4>
                        </div>
                        <div class="modal-body" style="color: #000000" id="lookImg">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <center>本学年参加活动 <?php echo $_smarty_tpl->tpl_vars['countActivityByYear']->value;?>
 个，累计参加活动 <?php echo $_smarty_tpl->tpl_vars['activityList']->value['total'];?>
个。</center>
                    <br/><br/><br/><br/>
                    <div style="height: 300px">
                        <table>
                            <?php if ($_smarty_tpl->tpl_vars['activityList']->value['totalPage']>0){?>
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['stu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['stu']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['name'] = 'stu';
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['activityList']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['total']);
?>
                            <tr>
                                <td><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/<?php echo $_smarty_tpl->tpl_vars['activityList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['activity_class'];?>
/activityId/<?php echo $_smarty_tpl->tpl_vars['activityList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['activity_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['student']->value['fu_realname'];?>
参加了“<?php echo $_smarty_tpl->tpl_vars['activityList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['activity_title'];?>
”活动</a>
                                </td>
                                <td width="30%"></td>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['activityList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['activity_registration_create_time'];?>

                                </td>
                                <?php if ($_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id']==$_smarty_tpl->tpl_vars['student']->value['fu_id']){?>

                                <td >
                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" style="margin-left:10px;" onclick="subTitle('<?php echo $_smarty_tpl->tpl_vars['activityList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['activity_registration_thoughts'];?>
','<?php echo $_smarty_tpl->tpl_vars['activityList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['activity_registration_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['activityList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['activity_title'];?>
')">心得</button>
                                    <!--<button class="btn btn-primary btn-xs">照片</button>-->
                                </td>
                                <td>
                                    <div id="imgBox<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['stu']['index'];?>
">
                                        <div id="imgBox" style="display: none;width: 800px" >

                                             <?php if ($_smarty_tpl->tpl_vars['activityList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['pic'][0]!=null){?>
                                               <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pic'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['name'] = 'pic';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['activityList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['pic']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['total']);
?>
                                                <img style="position: relative" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['activityList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['pic'][$_smarty_tpl->getVariable('smarty')->value['section']['pic']['index']];?>
" width="570" height="270" id="img<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pic']['index'];?>
">

                                              <?php endfor; endif; ?>
                                             <ul  style="position:absolute;top:295px;right:20px">
                                                 <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pic'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['name'] = 'pic';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['activityList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['pic']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['total']);
?>
                                                    <li style=" cursor:pointer;float:left;margin-right:5px;text-align:center;line-height:20px;width:20px;height:20px;background-color:#9A2D7C;color: #ffffff" onclick="changePic('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pic']['index'];?>
')"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pic']['index']+1;?>
</li>
                                                 <?php endfor; endif; ?>
                                             </ul>

                                            <?php }else{ ?>
                                            没有照片
                                           <?php }?>

                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal1" onclick="openPic('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['stu']['index'];?>
')">照片</button>
                                </td>

                                <?php }?>
                            </tr>
                            <?php endfor; endif; ?>
                            <?php }?>
                        </table>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['activityList']->value['totalPage']>1){?>
                    <?php if ($_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id']==$_smarty_tpl->tpl_vars['student']->value['fu_id']){?>
                    <div class="page" style="margin-top: 20px;text-align: center" >

                        <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/page/1/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">首页</a>

                        <?php if ($_smarty_tpl->tpl_vars['activityList']->value['page']>1){?>
                        <?php $_smarty_tpl->tpl_vars['prePage'] = new Smarty_variable($_smarty_tpl->tpl_vars['activityList']->value['page']-1, null, 0);?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/page/<?php echo $_smarty_tpl->tpl_vars['prePage']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">上一页</a>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['activityList']->value['page']<$_smarty_tpl->tpl_vars['activityList']->value['totalPage']){?>
                        <?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_variable($_smarty_tpl->tpl_vars['activityList']->value['page']+1, null, 0);?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/page/<?php echo $_smarty_tpl->tpl_vars['nextPage']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">下一页</a>
                        <?php }?>

                        <a  href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/page/<?php echo $_smarty_tpl->tpl_vars['activityList']->value['totalPage'];?>
">尾页</a>
                        跳转到<input id="num" type="text" style="color:#000000;width: 50px;height: 20px;margin-left: 5px"><input style="height:20px;line-height:10px;color: #000000" type="button" value="GO" onclick="skip()">
                        <span style="margin-left: 20px">当前第<?php echo $_smarty_tpl->tpl_vars['activityList']->value['page'];?>
页/共<?php echo $_smarty_tpl->tpl_vars['activityList']->value['totalPage'];?>
页</span>
                    </div>
                    <?php }else{ ?>
                    <div class="page" style="margin-top: 20px;text-align: center" >
                        <?php if ($_smarty_tpl->tpl_vars['activityList']->value['totalPage']>1){?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/page/1/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">首页</a>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['activityList']->value['page']>1){?>
                        <?php $_smarty_tpl->tpl_vars['prePage'] = new Smarty_variable($_smarty_tpl->tpl_vars['activityList']->value['page']-1, null, 0);?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/page/<?php echo $_smarty_tpl->tpl_vars['prePage']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">上一页</a>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['activityList']->value['page']<$_smarty_tpl->tpl_vars['activityList']->value['totalPage']){?>
                        <?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_variable($_smarty_tpl->tpl_vars['activityList']->value['page']+1, null, 0);?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/page/<?php echo $_smarty_tpl->tpl_vars['nextPage']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">下一页</a>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['activityList']->value['totalPage']>1){?>
                        <a  href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/page/<?php echo $_smarty_tpl->tpl_vars['activityList']->value['totalPage'];?>
">尾页</a>
                        <?php }?>
                        跳转到<input id="otherNum" type="text" style="color:#000000;width: 50px;height: 20px;margin-left: 5px"><input style="height:20px;line-height:10px;color: #000000" type="button" value="GO" onclick="skipOfOther()">
                        <span style="margin-left: 20px">当前第<?php echo $_smarty_tpl->tpl_vars['activityList']->value['page'];?>
页/共<?php echo $_smarty_tpl->tpl_vars['activityList']->value['totalPage'];?>
页</span>
                    </div>
                </div>
                <?php }?>
                <?php }?>
                <div class="col-md-2"></div>

                <?php if ($_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id']==$_smarty_tpl->tpl_vars['student']->value['fu_id']){?>
                <div id="analysis" style="width: 1100px;margin-left:20px;height: 500px; background:-webkit-gradient(linear, left top, left bottom,from(#9A2D7C),to(#661550));
                       background:-moz-linear-gradient(top,#9A2D7C,#661550);
                       background:-o-linear-gradient(top,#9A2D7C,#661550);
                       background:-ms-linear-gradient(top,#9A2D7C,#661550);
                       filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#9A2D7C',endColorstr='#661550');
                       background:linear-gradient(top,#9A2D7C,#661550);display:none;position:absolute;z-index: 998;top: 0px;left:-190px">
                    <?php }elseif($_smarty_tpl->tpl_vars['activityList']->value['total']!=0){?>
                    <div id="analysis" style="width: 1100px;margin-left:20px;height: 500px; background:-webkit-gradient(linear, left top, left bottom,from(#9A2D7C),to(#661550));
                       background:-moz-linear-gradient(top,#9A2D7C,#661550);
                       background:-o-linear-gradient(top,#9A2D7C,#661550);
                       background:-ms-linear-gradient(top,#9A2D7C,#661550);
                       filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#9A2D7C',endColorstr='#661550');
                       background:linear-gradient(top,#9A2D7C,#661550);display:none;position:absolute;z-index: 998">
                    <?php }else{ ?>
                    <div id="analysis" style="width: 1100px;margin-left:20px;height: 500px; background:-webkit-gradient(linear, left top, left bottom,from(#9A2D7C),to(#661550));
                       background:-moz-linear-gradient(top,#9A2D7C,#661550);
                       background:-o-linear-gradient(top,#9A2D7C,#661550);
                       background:-ms-linear-gradient(top,#9A2D7C,#661550);
                       filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#9A2D7C',endColorstr='#661550');
                       background:linear-gradient(top,#9A2D7C,#661550);display:none;position:absolute;z-index: 998;top: 0px;left:-190px">
                        <?php }?>
                    <center>本学年参加活动 <?php echo $_smarty_tpl->tpl_vars['countActivityByYear']->value;?>
 个，累计参加活动 <?php echo $_smarty_tpl->tpl_vars['activityList']->value['total'];?>
个。</center>
                    <div style="margin-top: 10px">
                        <div style="width: 400px;height: 220px;display:block;float: left;margin-left: 100px;">
                            本学年
                            <img src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/graph2/getGraph">
                        </div>
                        <div style="width: 400px;height:220px;display:block;float: right;margin-right: 100px;margin-top: 20px;">
                            <table style="border: solid 1px;">
                                <tr>
                                    <td style="width: 200px;">类型</td>
                                    <td style="width: 200px">数量</td>
                                </tr>
                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['at'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['at']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['name'] = 'at';
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['atByYear']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['atByYear']->value[$_smarty_tpl->getVariable('smarty')->value['section']['at']['index']]['at_name'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['atByYear']->value[$_smarty_tpl->getVariable('smarty')->value['section']['at']['index']]['count'];?>
</td>
                                </tr>
                                <?php endfor; endif; ?>
                            </table>
                        </div>
                    </div>

                    <div style="margin-top:10px">
                        <div style="width: 400px;height: 220px;display:block;float: left;margin-left: 100px">
                            累计
                            <img src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/graph/getGraph">
                        </div>
                        <div style="width: 400px;height:220px;display:block;float: right;margin-right: 100px;">
                            <table style="border: solid 1px;">
                                <tr>
                                    <td style="width: 200px;">类型</td>
                                    <td style="width: 200px">数量</td>
                                </tr>
                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['at'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['at']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['name'] = 'at';
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['at']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <tr>

                                    <td><?php echo $_smarty_tpl->tpl_vars['at']->value[$_smarty_tpl->getVariable('smarty')->value['section']['at']['index']]['at_name'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['at']->value[$_smarty_tpl->getVariable('smarty')->value['section']['at']['index']]['count'];?>
</td>

                                </tr>
                                <?php endfor; endif; ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        </ul>
    </div>
</div>
 </div>


<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
</body>
</html><?php }} ?>