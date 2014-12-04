<?php /* Smarty version Smarty-3.1.14, created on 2014-11-28 13:15:22
         compiled from "admin\tpl\activitymanage\addsensitivewords.html" */ ?>
<?php /*%%SmartyHeaderCode:19728547802b6a8fd21-61002865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '525f95aebbecfe223a585f037318c5f1c6952e23' => 
    array (
      0 => 'admin\\tpl\\activitymanage\\addsensitivewords.html',
      1 => 1417151716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19728547802b6a8fd21-61002865',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547802b6b011c5_87439644',
  'variables' => 
  array (
    'web_url' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547802b6b011c5_87439644')) {function content_547802b6b011c5_87439644($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>

<script type="text/javascript">
	$(function() {
       $("#form1").submit( function () {
         	return true;
		} );
	});
</script>
</head>
<style type="text/css">/* CSS Document */   
#info th {  
 border-right: 1px solid #adceff;  
 border-bottom: 1px solid #adceff;  
 border-top: 1px solid #adceff;  
 letter-spacing: 2px;  
 text-transform: uppercase;  
 text-align: left;  
 padding: 6px 6px 6px 12px;  
 background: #f4f7fc;  
}  
#info td {  
 border-right: 1px solid #adceff;  
 border-bottom: 1px solid #adceff;  
 background: #fff;  
 font-size:11px;  
 padding: 6px 6px 6px 12px;  
 
}  
#info th.spec {  
 border-left: 1px solid #adceff;  
 border-top: 0;  
 background: #fff;   
}  
</style>  
<body>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  	<TR height=28><TD background=images/title_bg1.jpg>当前位置:添加敏感词</TD></TR>
  	<TR><TD bgColor=#b1ceef height=1></TD></TR>
  	<TR height=20>
    	<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
	</TR>
</TABLE>

<div id="info" style=" margin-left:10px;">
<font id="result" color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font>
<form id="form1" target="_self" name="form1" method="post" action="">
<table id="mytable" cellspacing="0" >  
  <tr>  
    <th scope="col" colspan="2" style="border-left:1px solid #adceff;" >添加敏感词   
						<a style="margin-left:80px;" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/activityManage/sensitive_words_list">返回</a></th>
	
  </tr>  
  <tr >  
    <td style="border-left:1px solid #adceff;" >敏感词名   </td>
    <td> <input type="text" name="sensitivewordname" id="sensitivewordname" style="width:150px"  /></td>
  </tr>  

  <tr >
    <td style="border-left:1px solid #adceff;" >&nbsp;</td>
    <td>
    	<input type="submit" name="Submit" value="提交" />
	</td>
  </tr>
   
</table> 
</form>
</div>
</body>
</html>
<?php }} ?>