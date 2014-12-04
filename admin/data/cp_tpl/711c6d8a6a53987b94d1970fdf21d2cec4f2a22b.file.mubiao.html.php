<?php /* Smarty version Smarty-3.1.14, created on 2014-11-25 16:51:43
         compiled from "admin\tpl\activitymanage\mubiao.html" */ ?>
<?php /*%%SmartyHeaderCode:284765474431f97d8d6-84013497%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '711c6d8a6a53987b94d1970fdf21d2cec4f2a22b' => 
    array (
      0 => 'admin\\tpl\\activitymanage\\mubiao.html',
      1 => 1412909666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '284765474431f97d8d6-84013497',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'msg' => 0,
    'result' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5474431fa295a4_70195767',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5474431fa295a4_70195767')) {function content_5474431fa295a4_70195767($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<title>个人成果类型维护</title>
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
</head>
<body>
	<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  		<TR height=28><TD background=images/title_bg1.jpg>当前位置:活动目标维护</TD></TR>
  		<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background=images/shadow_bg.jpg></TD>
		</TR>
	</TABLE>
	<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
		<a href ="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/addmu" >添加活动目标</a> 
	</div>
	&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</font>
	<div id="info" style=" margin-left:10px;">
		<font color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font>
		<table id="mytable" cellspacing="0" >  
  			<tr>  
  				<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>  
   				<th scope="col" width="250px" >目标名称</th> 
    			<th scope="col" width="150px" >操作</th>
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sg'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sg']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['name'] = 'sg';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sg']['total']);
?>
  			<tr>  
    			<td style="border-left:1px solid #adceff;"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sg']['index']]['sg_id'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sg']['index']]['sg_name'];?>
</td>
				<td>
					<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/editmu/id/<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sg']['index']]['sg_id'];?>
">修改</a>
					<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/delmu/id/<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sg']['index']]['sg_id'];?>
">删除</a>
				</td>
  			</tr>  
  			<?php endfor; else: ?>
  			<tr >
    			<th class="spec" colspan="3">暂无类型</td>
 			</tr>
			<?php endif; ?>
		</table>  
	</div>
</body>
</html><?php }} ?>