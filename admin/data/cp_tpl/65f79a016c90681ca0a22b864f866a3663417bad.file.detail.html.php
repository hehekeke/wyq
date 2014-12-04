<?php /* Smarty version Smarty-3.1.14, created on 2014-10-28 09:30:30
         compiled from "admin\tpl\college\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:12511544ef1b6530608-25033261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65f79a016c90681ca0a22b864f866a3663417bad' => 
    array (
      0 => 'admin\\tpl\\college\\detail.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12511544ef1b6530608-25033261',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'detail' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544ef1b66f0109_66485540',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ef1b66f0109_66485540')) {function content_544ef1b66f0109_66485540($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<title>评估通告详情</title>
<style>
.container{margin:20px 0px 20px 20px; width:900px;}
.neirong{color:black; font-size:20px; width:800px; height:30px;line-height:30px;float:left;}
.xiaoneirong{color:black; font-size:10px; width:800px; min-height:30px;line-height:30px;float:left;}
</style>
</head>
<body>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  	<TR height=28><TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/title_bg1.jpg">当前位置:评估通告详情</TD></TR>
  	<TR><TD bgColor=#b1ceef height=1></TD></TR>
  	<TR height=20>
    	<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
	</TR>
</TABLE>
<div style="padding-left:30px;border-bottom:2px #333333 solid;height:30px; ">
	<div style="color:red;font-size:25px;height:30px;border-bottom:2px red solid; line-height:30px; float:left;">
		<?php echo $_smarty_tpl->tpl_vars['detail']->value['article_title'];?>

	</div>
</div>
<div class = "container">
	<div class="neirong">评估时间：<?php echo $_smarty_tpl->tpl_vars['detail']->value['article_begin_time'];?>
--<?php echo $_smarty_tpl->tpl_vars['detail']->value['article_end_time'];?>
</div>
	<div class="xiaoneirong"><?php echo $_smarty_tpl->tpl_vars['detail']->value['article_content'];?>
</div>
	<div class="xiaoneirong"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload/files/<?php echo $_smarty_tpl->tpl_vars['detail']->value['file_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['detail']->value['file_name'];?>
</a></div>
	<div style="clear:both;"></div>
</div>
</body>
</html><?php }} ?>