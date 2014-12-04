<?php /* Smarty version Smarty-3.1.14, created on 2014-10-27 15:52:05
         compiled from "admin\tpl\account\login.htm" */ ?>
<?php /*%%SmartyHeaderCode:5717544df9a5d19229-97766388%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f65a63039ec4d46e4701fa012e08854971702237' => 
    array (
      0 => 'admin\\tpl\\account\\login.htm',
      1 => 1412909666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5717544df9a5d19229-97766388',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'message' => 0,
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544df9a5e51283_97721151',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544df9a5e51283_97721151')) {function content_544df9a5e51283_97721151($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>后台登陆界面</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
</HEAD>
<BODY onload=document.form1.name.focus();>
<TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" bgColor=#002779 border=0>
	<TR>
		<TD align=middle>
      	<TABLE cellSpacing=0 cellPadding=0 width=468 border=0>
        	<TR>
          		<TD><IMG height=23 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/login_1.jpg" width=468>
				</TD>
			</TR>
        	<TR>
        		<TD>
					<IMG height=147 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/login_2.jpg" width=468>
				</TD>
			</TR>
		</TABLE>
      	<TABLE cellSpacing=0 cellPadding=0 width=468 bgColor=#ffffff border=0>
        	<TR>
          		<TD width=16><IMG height=122 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/login_3.jpg" width=16></TD>
          		<TD align=middle>
            		<TABLE cellSpacing=0 cellPadding=0 width=230 border=0>
              		<FORM name="form1" action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/account/Login" method="post">
              			<TR height=5>
                			<TD width=5></TD>
                			<TD width=56></TD>
                			<TD><font color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['message']->value)===null||$tmp==='' ? '' : $tmp);?>
</font></TD>
						</TR>
              			<TR height=36>
                			<TD></TD>
                			<TD>帐号：</TD>
                			<TD>
								<INPUT style="BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid; BORDER-LEFT: #000000 1px solid; BORDER-BOTTOM: #000000 1px solid" maxLength=30 size=24 value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['username']->value)===null||$tmp==='' ? '' : $tmp);?>
" name="username">
							</TD>
						</TR>
              			<TR height=36>
                			<TD>&nbsp; </TD>
                			<TD>密码：</TD>
                			<TD>
								<INPUT style="BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid; BORDER-LEFT: #000000 1px solid; BORDER-BOTTOM: #000000 1px solid" type="password" maxLength=30 size=24 value="" name="password">
							</TD>
						</TR>
              			<TR height=5>
                			<TD colSpan=3></TD>
						</TR>
              			<TR>
                			<TD>&nbsp;</TD>
                			<TD>&nbsp;</TD>
                			<TD><INPUT type="image" height=18 width=70 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/bt_login.gif"></TD>
						</TR>
					</FORM>
					</TABLE>
				</TD>
          		<TD width=16><IMG height=122 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/login_4.jpg" width=16>
				</TD>
			</TR>
		</TABLE>
		<TABLE cellSpacing=0 cellPadding=0 width=468 border=0>
        	<TR>
          		<TD><IMG height=16 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/login_5.jpg" width=468>
				</TD>
			</TR>
		</TABLE>
      	<TABLE cellSpacing=0 cellPadding=0 width=468 border=0>
        	<TR>
          		<TD align=right>
					
				</TD>
			</TR>
		</TABLE>
		</TD>
	</TR>
</TABLE>
</BODY>
</HTML>
<?php }} ?>