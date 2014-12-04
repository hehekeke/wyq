<?php /* Smarty version Smarty-3.1.14, created on 2014-11-02 16:26:44
         compiled from "admin\tpl\grade\xinsheng.html" */ ?>
<?php /*%%SmartyHeaderCode:209225455eac48559e4-58526738%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a37c240f46aacc605c706987a6200a25765c7b33' => 
    array (
      0 => 'admin\\tpl\\grade\\xinsheng.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209225455eac48559e4-58526738',
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
  'unifunc' => 'content_5455eac4940ff7_18544364',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5455eac4940ff7_18544364')) {function content_5455eac4940ff7_18544364($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<title>新生入学年级管理<</title>
<script type="text/javascript">
	$(function() {
		var myDate = new Date();
		var year = myDate.getFullYear();  
		$("#nianji").val(year);
	});
</script>
</head>
<body>
	<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  		<TR height=28><TD background=images/title_bg1.jpg>当前位置:新生入学年级设置</TD></TR>
  		<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background=images/shadow_bg.jpg></TD>
		</TR>
	</TABLE>
	<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
		<form id="form1"   target="_self" name="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/grade/xinsheng" >
    		<tr>
				<td width="107" height="30"><div align="right"></div></td>
				<td height="40" colspan="2">
					<div align="left"><font id="result" color="#0000FF"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font></div>
				</td>
			</tr>
       	   <tr>
        		<td width="107" height="30"><div align="center">新生年级:</div></td>
            	<td height="40" colspan="2">&nbsp;
             		 <input type="text" id="nianji" name="nianji" value="" style="width:120px; height:25px;" />
           	 	</td>
       	   </tr>
           <tr>
        		<td width="107" height="30"><div align="center"></div></td>
            	<td height="40" colspan="2">&nbsp;
            		<input name="submit" type="submit" value="提交" style="width:80px;height:30px;"/>
            	</td>
        	</tr> 
		</form>
	</table>
</body>
</html><?php }} ?>