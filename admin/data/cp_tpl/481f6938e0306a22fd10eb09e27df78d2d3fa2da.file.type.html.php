<?php /* Smarty version Smarty-3.1.14, created on 2014-11-27 11:21:56
         compiled from "admin\tpl\activitymanage\type.html" */ ?>
<?php /*%%SmartyHeaderCode:166547698d47a8a29-50301098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '481f6938e0306a22fd10eb09e27df78d2d3fa2da' => 
    array (
      0 => 'admin\\tpl\\activitymanage\\type.html',
      1 => 1412909666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166547698d47a8a29-50301098',
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
  'unifunc' => 'content_547698d48603c8_44833324',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547698d48603c8_44833324')) {function content_547698d48603c8_44833324($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<title>活动类型维护</title>
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
  		<TR height=28><TD background=images/title_bg1.jpg>当前位置:活动类型维护</TD></TR>
  		<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background=images/shadow_bg.jpg></TD>
		</TR>
	</TABLE>
	<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
		<a href ="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/addType" >添加活动类型</a> 
	</div>
	&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</font>
	<div id="info" style=" margin-left:10px;">
		<font color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font>
		<table id="mytable" cellspacing="0" >  
  			<tr>  
  				<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>  
   				<th scope="col" width="250px" >类型名称</th> 
    			<th scope="col" width="150px" >操作</th>
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['at'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['at']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['name'] = 'at';
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['at']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['at']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['at']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['at']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['at']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['at']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['at']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['at']['total']);
?>
  			<tr>  
    			<td style="border-left:1px solid #adceff;"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['at']['index']]['at_id'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['at']['index']]['at_name'];?>
</td>
				<td>
					<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/editType/id/<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['at']['index']]['at_id'];?>
">修改</a>
					<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/delType/id/<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['at']['index']]['at_id'];?>
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