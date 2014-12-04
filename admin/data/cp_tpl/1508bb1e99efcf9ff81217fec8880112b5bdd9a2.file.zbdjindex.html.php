<?php /* Smarty version Smarty-3.1.14, created on 2014-11-27 16:53:44
         compiled from "admin\tpl\assessment\zbdjindex.html" */ ?>
<?php /*%%SmartyHeaderCode:261695476e698d8a714-93253371%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1508bb1e99efcf9ff81217fec8880112b5bdd9a2' => 
    array (
      0 => 'admin\\tpl\\assessment\\zbdjindex.html',
      1 => 1412909666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '261695476e698d8a714-93253371',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5476e698e07739_21037910',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5476e698e07739_21037910')) {function content_5476e698e07739_21037910($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>评估项目等级管理</title>
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
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
  	<TR height=28><TD background=images/title_bg1.jpg>当前位置:评估项目等级管理</TD></TR>
  	<TR><TD bgColor=#b1ceef height=1></TD></TR>
  	<TR height=20>
    	<TD background=images/shadow_bg.jpg></TD>
	</TR>
</TABLE>
<div id="info" style=" margin-left:10px;">
<table id="mytable" cellspacing="0" >  
  <tr>  
    
    <th scope="col" width="80px" style="border-left:1px solid #adceff;" >序号</th>  
    <th scope="col" width="250px" >等级名称</th>  
    <th scope="col" width="150px" >操作</th> 
  </tr>  
  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['al'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['al']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['name'] = 'al';
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <td style="border-left:1px solid #adceff;"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['zbdj_id'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['zbdj_name'];?>
</td>
    <td><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/assessment/editzbdj/id/<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['zbdj_id'];?>
">修改</a></td>
  </tr>  
  <?php endfor; else: ?>
  <tr >
    <th class="spec" colspan="5">暂无评估等级</td>
  </tr>
  <?php endif; ?>
</table>  
</div>
</body>
</html>
<?php }} ?>