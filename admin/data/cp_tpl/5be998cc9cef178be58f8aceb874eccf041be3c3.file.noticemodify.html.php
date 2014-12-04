<?php /* Smarty version Smarty-3.1.14, created on 2014-11-02 18:27:04
         compiled from "admin\tpl\notice\noticemodify.html" */ ?>
<?php /*%%SmartyHeaderCode:11966545606f8e72969-43500409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5be998cc9cef178be58f8aceb874eccf041be3c3' => 
    array (
      0 => 'admin\\tpl\\notice\\noticemodify.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11966545606f8e72969-43500409',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'typeList' => 0,
    'noInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_545606f90a21c1_14339042',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545606f90a21c1_14339042')) {function content_545606f90a21c1_14339042($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/xheditor-1.2.1/xheditor-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/xheditor-1.2.1/xheditor_lang/zh-cn.js"></script>
    <title>通知公告类型维护</title>
</head>

<script type="text/javascript">
    $(function() {
        var editor = $('#content').xheditor({
            upLinkUrl:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload.php",
            upLinkExt:"zip,rar,txt",
            upImgUrl:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload.php",
            upImgExt:"jpg,jpeg,gif,png",
            upFlashUrl:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload.php",
            upFlashExt:"swf",
            upMediaUrl:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload.php",
            upMediaExt:"avi",
            remoteImgSaveUrl:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload.php",
            cleanPaste:2,
            internalScript:false,
            inlineScript:false,
            internalStyle:false,
            inlineStyle:false
        });

        $("#start").focus(function(){
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});
        });
    });

    function sub(){
        var title=document.addForm.title.value;
        var content= $('#content').val();
        var time=document.addForm.time.value;
        if(title==''||content==''||time==''){
            alert('不能为空');
        }else
        if(title.length>30){
            alert('标题不能超过30个字');

        }else
        if(content.length>4000){
            alert('内容过长');
        }else{
            document.addForm.submit();
        }
    }

</script>
<body>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
    <TR height=28><TD background=images/title_bg1.jpg>当前位置:通知公告类型维护>修改</TD></TR>
    <TR><TD bgColor=#b1ceef height=1></TD></TR>
    <TR height=20>
        <TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
    </TR>
</TABLE>
<form action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/notice/noticeEdit" method="post" name="addForm" enctype="multipart/form-data">
<table>
    <tr>
        <td> 类型：</td>
        <td>
            <select name="type">
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['no'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['no']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['name'] = 'no';
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['typeList']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['total']);
?>
                    <?php if ($_smarty_tpl->tpl_vars['typeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['nt_id']==$_smarty_tpl->tpl_vars['noInfo']->value[0]['nt_id']){?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['typeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['nt_id'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['typeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['nt_name'];?>
</option>
                    <?php }else{ ?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['typeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['nt_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['typeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['nt_name'];?>
</option>
                    <?php }?>
                <?php endfor; endif; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td> 标题：</td>
        <td><input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['noInfo']->value[0]['notice_title'];?>
"/></td>
        <td style="color: #ff0000">文本输入，30字内，必填</td>
    </tr>
    <tr>
        <td>活动内容：</td>
        <td>
            <textarea id="content" name="content" rows="15" cols="12" style="width: 60%"><?php echo $_smarty_tpl->tpl_vars['noInfo']->value[0]['notice_content'];?>
</textarea>
        </td>
    </tr>
	<?php if ($_smarty_tpl->tpl_vars['noInfo']->value[0]['file_name']){?>	
	<tr>
        <td>附件名：</td>
        <td>原文件：<?php echo $_smarty_tpl->tpl_vars['noInfo']->value[0]['file_name'];?>
<input type="file" name="file"/></td>
        <input type="hidden" name="file1" value="<?php echo $_smarty_tpl->tpl_vars['noInfo']->value[0]['file_id'];?>
"/>
    </tr>
	<?php }else{ ?>
	<tr>
        <td>附件：</td>
        <td><input type="file" name="file"/></td>
        <td style="color: #ff0000"></td>
    </tr>
	<?php }?>   
    <tr>
        <td>发布时间：</td>
        <td><input id="start" name="time" class="Wdate" type="text"  value="<?php echo $_smarty_tpl->tpl_vars['noInfo']->value[0]['notice_create_time'];?>
" style="width: 155px"/></td>
        <td style="color: #ff0000">选择当前时间点，可修改。必填。</td>
    </tr>

    </table>
    <input type="hidden" name="notice_id" value="<?php echo $_smarty_tpl->tpl_vars['noInfo']->value[0]['notice_id'];?>
"/>
    <input type="button" value="修改" onclick="sub()"/>
</form>
</body>
</html><?php }} ?>