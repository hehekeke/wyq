<?php /* Smarty version Smarty-3.1.14, created on 2014-11-28 13:19:40
         compiled from "admin\tpl\activitymanage\edittype.html" */ ?>
<?php /*%%SmartyHeaderCode:7856547805ec22b523-26983835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49a510cfac078953cc43701621de02d8d9061228' => 
    array (
      0 => 'admin\\tpl\\activitymanage\\edittype.html',
      1 => 1412909666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7856547805ec22b523-26983835',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'result' => 0,
    'oriArr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547805ec2ac3c1_67439188',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547805ec2ac3c1_67439188')) {function content_547805ec2ac3c1_67439188($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<script type="text/javascript">
		$(function() {
			$("#form1").submit( function () {
				if($("#name").val() == ""){
					$("#result").text("请填写类型名称！");
					$("#name").focus();
					return false;
				}
				return true;
			});
		});
</script>
<title>修改活动类型</title>
</head>
<body>
	<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  		<TR height=28><TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/title_bg1.jpg">当前位置:修改活动类型</TD></TR>
  		<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
		</TR>
	</TABLE>
	<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
		<form id="form1" target="_self" name="form1" method="post" action="" >
    		<tr>
				<td width="80" height="30"><div align="right"></div></td>
				<td height="40" colspan="2">
					<div align="left"><font id="result" color="#0000FF"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font></div>
				</td>
			</tr>
       	 	<tr>
        		<td height="40"><div align="center">活动类型：</div></td>
            	<td height="40" colspan="2">&nbsp;
					<input id="name" name="name" type="text" value="<?php echo $_smarty_tpl->tpl_vars['oriArr']->value['at_name'];?>
" style="width:250px;height:20px;" />				
             	</td>
         	</tr>
		 	<tr>
		 		<td height="40"><div align="center"></div></td>
				<td height="40" colspan="2">&nbsp;
					<input id="submit" name="submit" type="submit" value="保存" style="width:60px; height:30px;" />	
					<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/type"><input id="back" name="back" type="button" value="返回" style="width:60px; height:30px;" /></a>				
				</td>
			</tr>
     	</form>
	</table>
</body>
</html><?php }} ?>