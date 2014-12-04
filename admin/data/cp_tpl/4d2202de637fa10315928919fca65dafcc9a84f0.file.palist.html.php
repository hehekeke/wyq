<?php /* Smarty version Smarty-3.1.14, created on 2014-11-27 16:53:54
         compiled from "admin\tpl\personnal\palist.html" */ ?>
<?php /*%%SmartyHeaderCode:52465476e6a223dfb0-19688822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d2202de637fa10315928919fca65dafcc9a84f0' => 
    array (
      0 => 'admin\\tpl\\personnal\\palist.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52465476e6a223dfb0-19688822',
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
  'unifunc' => 'content_5476e6a22d26d5_53753196',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5476e6a22d26d5_53753196')) {function content_5476e6a22d26d5_53753196($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
  		<TR height=28><TD background=images/title_bg1.jpg>当前位置:个人成果类型维护</TD></TR>
  		<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background=images/shadow_bg.jpg></TD>
		</TR>
	</TABLE>
	<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
		<a href ="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/personnal/addpa" >添加个人成果类型</a>
	</div>
	<div id="info" style=" margin-left:10px;">
		<font color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font>
		<table id="mytable" cellspacing="0" >  
  			<tr>  
  				<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>  
   				<th scope="col" width="250px" >类型名称</th> 
    			<th scope="col" width="150px" >操作</th>
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['name'] = 'pl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['total']);
?>
  			<tr>  
    			<td style="border-left:1px solid #adceff;"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['gpt_id'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['gpt_name'];?>
</td>
				<td>
					<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/personnal/editpa/id/<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['gpt_id'];?>
">修改</a>
                    <a href="javascript:if(confirm('确实要删除吗?'))location='<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/personnal/deletePa/id/<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['gpt_id'];?>
'">删除</a>
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