<?php /* Smarty version Smarty-3.1.14, created on 2014-11-27 16:53:59
         compiled from "admin\tpl\personnal\pat.html" */ ?>
<?php /*%%SmartyHeaderCode:110035476e6a74a0822-68854511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a974dc2a91a5c1778c811fa4832d5cf749ea32df' => 
    array (
      0 => 'admin\\tpl\\personnal\\pat.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110035476e6a74a0822-68854511',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'result' => 0,
    'detail' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5476e6a751d844_06075266',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5476e6a751d844_06075266')) {function content_5476e6a751d844_06075266($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/recruit/style.css" />
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<title>个人成果填写时间维护</title>
</head>
<body>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  	<TR height=28><TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/title_bg1.jpg">当前位置:个人成果填写时间维护</TD></TR>
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
        	<td height="40"><div align="center"></div></td>
            <td height="40" colspan="2">&nbsp;
				个人成果填写的截止时间为：学年末评估开始的前
				<input id="time" name="time" type="text" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value;?>
" style="width:60px;height:30px;" />	
				天				
             </td>
         </tr>
		 <tr>
		 	<td height="40"><div align="center"></div></td>
			<td height="40" colspan="2">
				<input name="submit" type="submit" value="修改" style="width:60px; height:30px;" />				
			</td>
		</tr>
     </form>
</table>
</body>
</html><?php }} ?>