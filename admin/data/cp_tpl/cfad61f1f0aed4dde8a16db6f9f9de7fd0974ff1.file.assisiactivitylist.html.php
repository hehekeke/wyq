<?php /* Smarty version Smarty-3.1.14, created on 2014-11-10 18:35:35
         compiled from "admin\tpl\activitymanage\assisiactivitylist.html" */ ?>
<?php /*%%SmartyHeaderCode:25956546094f799aa93-87134116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfad61f1f0aed4dde8a16db6f9f9de7fd0974ff1' => 
    array (
      0 => 'admin\\tpl\\activitymanage\\assisiactivitylist.html',
      1 => 1412909666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25956546094f799aa93-87134116',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'result' => 0,
    'assistactivitylist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_546094f7a74d87_55523575',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546094f7a74d87_55523575')) {function content_546094f7a74d87_55523575($_smarty_tpl) {?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<title>辅学活动介绍维护列表</title>
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
  	<TR height=28><TD background=images/title_bg1.jpg>当前位置:辅学活动介绍维护--列表</TD></TR>
  	<TR><TD bgColor=#b1ceef height=1></TD></TR>
  	<TR height=20>
    	<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
	</TR>
</TABLE>
<div id="info" style=" margin-left:10px;">
	<font color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font>
	<table id="mytable" cellspacing="0" >  
  		<tr>  
    		<th scope="col" width="100px" style="border-left:1px solid #adceff;" >ID</th>  
    		<th scope="col" width="250px" >活动类别</th> 
    		<th scope="col" width="250px" >操作</th>
  		</tr>
  		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['al'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['al']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['name'] = 'al';
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['assistactivitylist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
  		<tr >  
    		<td style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->tpl_vars['assistactivitylist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sa_id'];?>
</td>
   		    <td>
			   <?php if ($_smarty_tpl->tpl_vars['assistactivitylist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['secondary_class']=='1'){?>周活动
			   <?php }else{ ?>年活动
			   <?php }?>
            </td>
   		    <td><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/Editfuactivity/id/<?php echo $_smarty_tpl->tpl_vars['assistactivitylist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sa_id'];?>
">修改活动介绍</a></td>
  		</tr>
  		<?php endfor; else: ?>
  		<tr >
    		<th class="spec" colspan="5">暂无活动！</td>
  		</tr>
  		<?php endif; ?>
	</table>  
</div>
</body>
</html><?php }} ?>