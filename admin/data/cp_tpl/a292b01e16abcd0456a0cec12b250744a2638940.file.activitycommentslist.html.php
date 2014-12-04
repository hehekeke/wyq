<?php /* Smarty version Smarty-3.1.14, created on 2014-11-27 11:22:09
         compiled from "admin\tpl\activity\activitycommentslist.html" */ ?>
<?php /*%%SmartyHeaderCode:2791547698e1b60cf3-00946491%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a292b01e16abcd0456a0cec12b250744a2638940' => 
    array (
      0 => 'admin\\tpl\\activity\\activitycommentslist.html',
      1 => 1412909666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2791547698e1b60cf3-00946491',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'result' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547698e1c24221_32284165',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547698e1c24221_32284165')) {function content_547698e1c24221_32284165($_smarty_tpl) {?><?php if (!is_callable('smarty_function_page')) include 'C:\\Myphp\\apache\\htdocs\\nkgn\\been/View/plugins\\function.page.php';
?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<title>活动评论维护</title>
<script type="text/javascript">
	$(function() {
		$("#search_button").click(function() {
			var activity_title = $("#activity_title").val();
			//alert(activity_title);
			window.location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/activity/getCommentsList/activity_title/"+activity_title;
		});
	});
</script>
</head>
<body>
<style type="text/css">
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

<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  	<TR height=28><TD background=images/title_bg1.jpg>当前位置:活动评论维护</TD></TR>
  	<TR><TD bgColor=#b1ceef height=1></TD></TR>
  	<TR height=20>
    	<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
	</TR>
</TABLE>
<div id="search_comments" style="margin-left:20px;">
		活动名称
		<input name="activity_title" id="activity_title" width="100px;"/>
		&nbsp;
		<input id ="search_button" type="submit" value="查询" />
</div>
</br>
<div id="info" style=" margin-left:10px;">
	<font color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font>
	<?php if (isset($_smarty_tpl->tpl_vars['list']->value)){?>
	<table id="mytable" cellspacing="0" >  
  		<tr>  
    		<th scope="col" width="50px" style="border-left:1px solid #adceff;text-align: center;" >序号</th>  
    		<th scope="col" width="800px" style="text-align: center;">评论内容</th> 
    		<th scope="col" width="50px" style="text-align: center;">操作</th>
  		</tr>  
  		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['al'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['al']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['name'] = 'al';
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total']);
?>
  		<tr id="comment-<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['comment_id'];?>
">  
    		<td style="border-left:1px solid #adceff;text-align: center;" ><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['comment_id'];?>
</td>
   		    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['fu_realname'];?>
：<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['comment_content'];?>
</td>
   		    <td style="text-align: center;">
   		    [<a onClick="if (confirm('确认要删除？')) return true; else return false;" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/activity/GetCommentsList/do/del/commentId/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['comment_id'];?>
">删除</a>]
   		    </td>
  		</tr>  
  		<?php endfor; else: ?>
  		<tr >
    		<th class="spec" colspan="5">暂无活动评论！</td>
  		</tr>
  		<?php endif; ?>
	</table> 
	<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/activity/GetCommentsList"),$_smarty_tpl);?>

	<?php }?>
</div>
</body>
</html><?php }} ?>