<?php /* Smarty version Smarty-3.1.14, created on 2014-10-28 09:40:43
         compiled from "admin\tpl\college\xuejiangdetail.html" */ ?>
<?php /*%%SmartyHeaderCode:27517544ef41bba0323-03736243%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '236a83564caecc44ef89639bfdb877d1ccbff552' => 
    array (
      0 => 'admin\\tpl\\college\\xuejiangdetail.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27517544ef41bba0323-03736243',
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
  'unifunc' => 'content_544ef41bdaee06_44881410',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ef41bdaee06_44881410')) {function content_544ef41bdaee06_44881410($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/xheditor-1.2.1/xheditor-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/xheditor-1.2.1/xheditor_lang/zh-cn.js"></script>
<title>学院评估工作-发布宣讲方案和通知详情</title>
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
	});
</script>
</head>
<body>
	<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  		<TR height=28><TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/title_bg1.jpg">当前位置:学院评估工作-发布宣讲方案和通知详情</TD></TR>
  		<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
		</TR>
	</TABLE>
	<table width="800px" border="0"  cellpadding="0" cellspacing="0">
			<tr>
				<td width="130" height="40px"><div align="right"></div></td>
				<td height="40" colspan="2">
					<div align="left"><font id="result" color="#0000FF"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font></div>
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">本学院评估时间段：</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="start" name="start" type="text" readonly style="width:200px; height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['article_begin_time'];?>
" />至<input id="end" name="end" type="text"  readonly value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['article_end_time'];?>
" style="width:200px; height:20px;" />
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">标题：</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="title" type="text"  readonly name="title" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['article_title'];?>
" />
				</td>
			</tr>
			<tr>
         	<td height="40"><div align="right">附件:</div></td>
            <td height="40" colspan="2">&nbsp;
					<?php if ($_smarty_tpl->tpl_vars['detail']->value['file_id']){?>
						<a id="link<?php echo $_smarty_tpl->tpl_vars['detail']->value['file_id'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload/files/<?php echo $_smarty_tpl->tpl_vars['detail']->value['file_link'];?>
"><font size="2px" color="#080719"><?php echo $_smarty_tpl->tpl_vars['detail']->value['file_name'];?>
</font></a>
					<?php }else{ ?>
					暂无附件
					<?php }?>
            </td>
       		</tr>
       		<tr>
				<td height="130"><div align="right">宣讲方案：</div></td>
				<td height="130" colspan="2">&nbsp;
					<textarea id="content" name="content" rows="15" cols="12" readonly style="width:600px"><?php echo $_smarty_tpl->tpl_vars['detail']->value['article_content'];?>
</textarea>
				</td>
			</tr>
    		<tr>
            	<td height="40"><div align="right"></div></td>
            	<td height="40" colspan="2">&nbsp;
            		<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/college/index/type/3"><input id="back" type="button" name="back" value="返回" style="width:80px;height:30px;" /></a>
            	</td>
    		</tr>
	</table>
</body>
</html><?php }} ?>