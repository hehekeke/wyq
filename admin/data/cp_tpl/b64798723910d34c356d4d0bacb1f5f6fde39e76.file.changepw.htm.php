<?php /* Smarty version Smarty-3.1.14, created on 2014-11-25 16:54:03
         compiled from "admin\tpl\account\changepw.htm" */ ?>
<?php /*%%SmartyHeaderCode:21701547443ab23d395-35834692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b64798723910d34c356d4d0bacb1f5f6fde39e76' => 
    array (
      0 => 'admin\\tpl\\account\\changepw.htm',
      1 => 1412909666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21701547443ab23d395-35834692',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547443ab2bde27_10758481',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547443ab2bde27_10758481')) {function content_547443ab2bde27_10758481($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
</head>

<body>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  	<TR height=28><TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/title_bg1.jpg">当前位置:修改密码</TD></TR>
  	<TR><TD bgColor=#b1ceef height=1></TD></TR>
  	<TR height=20>
    	<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
	</TR>
</TABLE>
<div id="info" style=" margin-left:10px;">
<form id="form1" target="_self" name="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/account/changepw">
  <p>
  <label>旧密码：
  <input type="password" name="old" />
  </label>
  </p>
  <br />
  <p>
    <label>新密码：
    <input type="password" name="new" />
    </label>
  </p>
  <br />
  <p>
    <label>第二遍：
    <input type="password" name="renew" />
    </label>
  </p>
    <br />
  <p>
    <label>
    <input type="submit" name="Submit" value="提交" />
	<font color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font>
    </label>
  </p>
</form>
</div>
</body>
</html>
<?php }} ?>