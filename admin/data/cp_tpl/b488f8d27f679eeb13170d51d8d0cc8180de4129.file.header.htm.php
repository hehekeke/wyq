<?php /* Smarty version Smarty-3.1.14, created on 2014-10-27 14:33:34
         compiled from "admin\tpl\index\header.htm" */ ?>
<?php /*%%SmartyHeaderCode:32012544de73eced2a4-75494000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b488f8d27f679eeb13170d51d8d0cc8180de4129' => 
    array (
      0 => 'admin\\tpl\\index\\header.htm',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32012544de73eced2a4-75494000',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544de73ee522d2_03294292',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544de73ee522d2_03294292')) {function content_544de73ee522d2_03294292($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
</HEAD>
<BODY>
<TABLE cellSpacing=0 cellPadding=0 width="100%" background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/header_bg.jpg" border=0>
  	<TR height=56>
    	<TD width=260><IMG height=56 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/header_left.jpg" width=260></TD>
    	<TD style="FONT-WEIGHT: bold; COLOR: #fff; PADDING-TOP: 20px" align=middle>
			当前用户：<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value)===null||$tmp==='' ? "admin" : $tmp);?>
 &nbsp;&nbsp; 
			<A style="COLOR: #fff" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/Account/Changepw" target=main>修改密码</A> &nbsp;&nbsp; 
            <A style="COLOR: #fff" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/index/main" target=main>返回首页</A> &nbsp;&nbsp; 
	  		<A style="COLOR: #fff" onClick="if (confirm('确认要退出吗？')) return true; else return false;" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/Account/logout" target=_top>退出系统</A> 
    	</TD>
   	 	<TD align=right width=268>
			<IMG height=56 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/header_right.jpg" width=268>
		</TD>
	</TR>
</TABLE>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
	<TR bgColor=#1c5db6 height=4><TD></TD></TR>
</TABLE>
</BODY>
</HTML>
<?php }} ?>