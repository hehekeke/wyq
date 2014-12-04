<?php /* Smarty version Smarty-3.1.14, created on 2014-10-27 14:33:42
         compiled from "admin\tpl\addactivity\addactivity.html" */ ?>
<?php /*%%SmartyHeaderCode:26408544de746d91c54-22131847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7c131e19af030c2076086a5ae43dd0e34c250ca' => 
    array (
      0 => 'admin\\tpl\\addactivity\\addactivity.html',
      1 => 1413553029,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26408544de746d91c54-22131847',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'show_type' => 0,
    'result' => 0,
    'msg' => 0,
    'ac_type' => 0,
    'typeInfo' => 0,
    'ac_zhubanfang' => 0,
    'ac_chengbanfang' => 0,
    'chengbanfangInfo' => 0,
    'ac_mubiao' => 0,
    'mubiaoInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544de7470626a5_69969626',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544de7470626a5_69969626')) {function content_544de7470626a5_69969626($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/xheditor-1.2.1/xheditor-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/xheditor-1.2.1/xheditor_lang/zh-cn.js"></script>
    <script language="javascript" type="text/javascript"  src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/jquery.uploadify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/uploadify.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/bootstrap/bootstrap.min.css">
    <title>活动维护</title>
    <style type="text/css">
        * {
            list-style: none;
            text-decoration: none;
        }

        .file_box {
            position: relative;
            height: 100%;
            margin: 0 auto;
        }

        .file_input {
            position: absolute;
            top: 0;
            right: 80px;
            height: 24px;
            filter: alpha(opacity:0);
            opacity: 0;
        }
    </style>
    <script type="text/javascript">
        $(function () {
            var editor = $('#content').xheditor({
                upLinkUrl: "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload.php",
                upLinkExt: "zip,rar,txt",
                upImgUrl: "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload.php",
                upImgExt: "jpg,jpeg,gif,png",
                upFlashUrl: "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload.php",
                upFlashExt: "swf",
                upMediaUrl: "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload.php",
                upMediaExt: "avi",
                remoteImgSaveUrl: "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload.php",
                cleanPaste: 2,
                internalScript: false,
                inlineScript: false,
                internalStyle: false,
                inlineStyle: false
            });

            $("#start").focus(function () {
                WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});
            });

            $("#end").focus(function () {
                WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});
            });
            $("#form1").submit(function () {
                $('#content').val(editor.getSource());//加上这句防止提交数据为空

                var activity_title= $('#activity_title').val();
                var content= $('#content').val();
                var activity_theme= $('#activity_theme').val();
                var start= $('#start').val();
                var end= $('#end').val();
                var activity_address= $('#activity_address').val();
                var at_id= $('#at_id').val();
                var activity_scale= $('#activity_scale').val();
                var activity_keywords= $('#activity_keywords').val();
                var activity_duty_preson= $('#activity_duty_preson').val();
              //  var activity_fuxue_mubiao= $('#activity_fuxue_mubiao').val();
               var b2=0;
                $(".activity_organizer").each(function(){
                    if(this.checked){
                        b2++;
                    }
                });
				//alert(b2);
                var checkNum = 0;
                $(".activity_fuxue_mubiao").each(function(){
                    if(this.checked){
                        checkNum++;
                  }
                });
               // alert(activity_organizer);

                if(activity_title == ""){
                    $("#type").focus();
                    $("#result").text("活动名称不能为空！");
                    return false;
                 }
                 if(content == ""){
                    $("#type").focus();
                    $("#result").text("活动内容不能为空！");
                    return false;
                }
                if(activity_theme == ""){
                    $("#type").focus();
                    $("#result").text("活动主题不能为空！");
                    return false;
                }
                if(start == ""){
                    $("#type").focus();
                    $("#result").text("活动开始时间不能为空！");
                    return false;
                }
                if(end == ""){
                    $("#type").focus();
                    $("#result").text("活动结束时间不能为空！");
                    return false;
                }
                if(activity_address == ""){
                    $("#type").focus();
                    $("#result").text("活动地点不能为空！");
                    return false;
                }
                if(at_id == ""){
                    $("#type").focus();
                    $("#result").text("活动类型不能为空！");
                    return false;
                }
                if(b2==0){
                    $("#type").focus();
                    $("#result").text("请至少选择一个活动主办方！");
                    return false;
                }
                if(activity_scale == ""){
                    $("#type").focus();
                    $("#result").text("活动规模不能为空！");
                    return false;
                }
                if(activity_keywords == ""){
                    $("#type").focus();
                    $("#result").text("活动关键字不能为空！");
                    return false;
                }
                if(activity_duty_preson == ""){
                    $("#type").focus();
                    $("#result").text("活动负责人不能为空！");
                    return false;
                }
                if(checkNum==0){
                    $("#type").focus();
                    $("#result").text("请至少选择一个辅学目标！");
                    return false;
                }
                return true;
            });
        });

        function add(ele) {
            if ($(ele).text() == "删除") {
                $($(ele).parent()).remove();
            } else {
                $($(ele).next()).trigger('click');
            }
        }
        function fileChoose(ele) {
            $($(ele).next()).text($(ele).val());
            $($(ele).prev()).text("删除")
            $("#file_contain").append('<div class="file_block"><button  type="button" class="btn btn-danger btn-xs" onclick="add(this)">继续添加</button> 	<input  name="file[]" type="file" class="file_input"  onchange="fileChoose(this)">	<span></span>	</div>');
        }
        function openOrganizer() {
            $("#organizer").css("display", "block");
        }
        function selectOg() {
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
        function selectCb(){
            var inputs = $("#myModal1 input");
            var selectStr = new Array();
            var selectId = new Array();
            var j = 0;
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].checked) {
                    selectStr[j] = $(inputs[i]).next("span").html();
                    selectId[j++] = $(inputs[i]).val();
                }

            }

            $("#selectCbDiv").html(selectStr.join(","));
        }
    </script>
</head>
<body>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
    <?php if ($_smarty_tpl->tpl_vars['show_type']->value==0){?>
    <TR height=28>
        <TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/title_bg1.jpg">当前位置:学年活动维护-发布学年活动</TD>
    </TR>
    <?php }else{ ?>
    <TR height=28>
        <TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/title_bg1.jpg">当前位置:周活动维护-发布周活动</TD>
    </TR>
    <?php }?>
    <TR>
        <TD bgColor=#b1ceef height=1></TD>
    </TR>
    <TR height=20>
        <TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
    </TR>
</TABLE>
<form id="form1" target="_self" name="form1" method="post" action="" enctype="multipart/form-data">
    <table width="800px" border="0" cellpadding="0" cellspacing="0">
        <input type="hidden" name="activity_class" value="<?php echo $_smarty_tpl->tpl_vars['show_type']->value;?>
"/>
        <input type="hidden" name="activity_approval" value="3" title="审核"/>
        <input type="hidden" name="activity_remove" value="1" title="删除"/>
        <tr>
            <td width="130" height="40px">
                <div align="right"></div>
            </td>
            <td height="40" colspan="2">
                <div align="left"><font id="result" color="#0000FF"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font></div>
            </td>
        </tr>

        <tr>
            <td height="40">
                <div align="right">活动名称</div>
            </td>
            <td height="40" colspan="2">&nbsp;
                <input id="activity_title" type="text" name="activity_title" style="width:340px;height:20px;"/>
                &nbsp;&nbsp; &nbsp;&nbsp;<font color="red"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
<font>
            </td>
        </tr>
        <tr>
            <td height="130">
                <div align="right">活动内容</div>
            </td>
            <td height="130" colspan="2">&nbsp;
                <textarea id="content" name="activity_content" rows="15" cols="12" style="width:600px"></textarea>
            </td>
        </tr>
        <tr>
            <td height="40">
                <div align="right">活动主题</div>
            </td>
            <td height="40" colspan="2">&nbsp;
                <input id="activity_theme" type="text" name="activity_theme" style="width:340px;height:20px;"/>
            </td>
        </tr>
        <tr>
            <td height="40">
                <div align="right"> 活动时间:</div>
            </td>
            <td height="40" colspan="2">&nbsp;
                <input id="start" name="activity_start_time" class="Wdate" type="text"
                       style="width:200px; height:20px;"/>至<input id="end" name="activity_end_time" class="Wdate"
                                                                  type="text" style="width:200px; height:20px;"/>
            </td>
        </tr>
        <tr>
            <td height="40">
                <div align="right">活动地点</div>
            </td>
            <td height="40" colspan="2">&nbsp;
                <input id="activity_address" type="text" name="activity_address" style="width:340px;height:20px;"/>
            </td>
        </tr>
        <tr>
            <td height="40">
                <div align="right">类型</div>
            </td>
            <td height="40" colspan="2">&nbsp;
                <select id="at_id" name="at_id">
                    <?php  $_smarty_tpl->tpl_vars['typeInfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['typeInfo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ac_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['typeInfo']->key => $_smarty_tpl->tpl_vars['typeInfo']->value){
$_smarty_tpl->tpl_vars['typeInfo']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['typeInfo']->value['at_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['typeInfo']->value['at_name'];?>
</option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td height="40">
                <div align="right">主办方</div>
            </td>
            <td height="40" colspan="2">&nbsp;
                <!-- Button trigger modal -->
                <input style="float: left" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal"
                       value="选择主办方"><div style="line-height:25px;white-space:nowrap;text-overflow:ellipsis;font-weight:bold;float: left;margin-left: 10px;width: 500px;height:20px;overflow: hidden" id="selectOgDiv"></div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">主办方</h4>
                            </div>
                            <div class="modal-body">
                                <table>
                                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['ac_zhubanfang']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

                                    <td><input type='checkBox' class="activity_organizer" name='activity_organizer[]'
                                               value='<?php echo $_smarty_tpl->tpl_vars['ac_zhubanfang']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['organizers_id'];?>
'/><span><?php echo $_smarty_tpl->tpl_vars['ac_zhubanfang']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['organizers_name'];?>
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


            </td>
        </tr>
        <tr>
            <td height="40">
                <div align="right">承办方</div>
            </td>
            <td height="40" colspan="2">&nbsp;
                <!-- Button trigger modal -->
                <input style="float: left" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal1"
                       value="选择承办方"><div style="line-height:25px;white-space:nowrap;text-overflow:ellipsis;font-weight:bold;float: left;margin-left: 10px;width: 500px;height:20px;overflow: hidden" id="selectCbDiv"></div>
                <!-- Modal -->
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel1">承办方</h4>
                            </div>
                            <div class="modal-body">
                                <table>
                                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['ac_chengbanfang']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

                                        <td><input type='checkBox' name='activity_undertake[]'
                                                   value='<?php echo $_smarty_tpl->tpl_vars['ac_chengbanfang']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['undertake_id'];?>
'/><span><?php echo $_smarty_tpl->tpl_vars['ac_chengbanfang']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['undertake_name'];?>
</span>&nbsp;&nbsp;&nbsp;
                                        </td>

                                        <?php if (!(($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']+1) % 4)){?>
                                    </tr>
                                    <?php }?>
                                    <?php endfor; endif; ?>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="selectCb()">
                                    确定
                                </button>
                            </div>
                <!--<?php  $_smarty_tpl->tpl_vars['chengbanfangInfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['chengbanfangInfo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ac_chengbanfang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['chengbanfangInfo']->key => $_smarty_tpl->tpl_vars['chengbanfangInfo']->value){
$_smarty_tpl->tpl_vars['chengbanfangInfo']->_loop = true;
?>-->
                <!--<input id="activity_undertake" type="checkBox" name="activity_undertake[]"-->
                       <!--value="<?php echo $_smarty_tpl->tpl_vars['chengbanfangInfo']->value['undertake_id'];?>
"/><?php echo $_smarty_tpl->tpl_vars['chengbanfangInfo']->value['undertake_name'];?>
&nbsp;&nbsp;&nbsp;-->
                <!--<?php } ?>-->
            </td>
        </tr>
        <tr>
            <td height="40">
                <div align="right">规模</div>
            </td>
            <td height="40" colspan="2">&nbsp;
                <input id="activity_scale" type="text" name="activity_scale" style="width:340px;height:20px;"/>人
            </td>
        </tr>
        <tr>
            <td height="40">
                <div align="right">专业性级别</div>
            </td>
            <td height="40" colspan="2">&nbsp;
                <select id="activity_level" name="activity_level">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </td>
        </tr>
        <tr>
            <td height="40">
                <div align="right">关键词</div>
            </td>
            <td height="40" colspan="2">&nbsp;
                <input id="activity_keywords" type="text" name="activity_keywords"
                       style="width:340px;height:20px;"/><span style="color:red">多个关键字中间用“,“隔开</span>
            </td>
        </tr>
        <tr>
            <td height="40">
                <div align="right">负责人</div>
            </td>
            <td height="40" colspan="2">&nbsp;
                <input id="activity_duty_preson" type="text" name="activity_duty_preson"
                       style="width:340px;height:20px;"/>
            </td>
        </tr>
        <tr>
            <td height="40">
                <div align="right">辅学目标</div>
            </td>
            <td height="40" colspan="2">&nbsp;
                <?php  $_smarty_tpl->tpl_vars['mubiaoInfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mubiaoInfo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ac_mubiao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mubiaoInfo']->key => $_smarty_tpl->tpl_vars['mubiaoInfo']->value){
$_smarty_tpl->tpl_vars['mubiaoInfo']->_loop = true;
?>
                <input class="activity_fuxue_mubiao" type="checkBox" name="activity_fuxue_mubiao[]"
                       value="<?php echo $_smarty_tpl->tpl_vars['mubiaoInfo']->value['sg_id'];?>
"/><?php echo $_smarty_tpl->tpl_vars['mubiaoInfo']->value['sg_name'];?>
&nbsp;&nbsp;&nbsp;
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td height="40">
                <div align="right">活动海报</div>
            </td>
            <td height="40" colspan="2" id="pic">&nbsp;
                <div class="file_box">
                    <div id="file_contain">
                        <div class="file_block">
                            <button type='button' class="btn btn-danger btn-xs" onclick="add(this)"/>
                            添加图片</button>
                            <input name="file[]" type="file" class="file_input" onchange="fileChoose(this)">
                            <span></span>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td height="40">
                <div align="right"></div>
            </td>
            <td height="40" colspan="2">&nbsp;
                <input id="submit" type="submit" name="submit" value="保存" style="width:80px;height:30px;"/>
                <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/addactivity/ActivityList"><input id="back" type="button" name="back"
                                                                                   value="返回"
                                                                                   style="width:80px;height:30px;"/></a>
            </td>
        </tr>
    </table>
</form>
</body>
</html><?php }} ?>