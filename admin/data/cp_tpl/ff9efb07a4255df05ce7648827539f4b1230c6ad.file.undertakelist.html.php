<?php /* Smarty version Smarty-3.1.14, created on 2014-11-25 16:51:49
         compiled from "admin\tpl\activitymanage\undertakelist.html" */ ?>
<?php /*%%SmartyHeaderCode:3127754744325df8f17-58273636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff9efb07a4255df05ce7648827539f4b1230c6ad' => 
    array (
      0 => 'admin\\tpl\\activitymanage\\undertakelist.html',
      1 => 1412909666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3127754744325df8f17-58273636',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'result' => 0,
    'undertakelists' => 0,
    'rolelist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54744325ea24d1_39661112',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54744325ea24d1_39661112')) {function content_54744325ea24d1_39661112($_smarty_tpl) {?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
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
    <TR height=28><TD background=images/title_bg1.jpg>当前位置:承办方维护</TD></TR>
    <TR><TD bgColor=#b1ceef height=1></TD></TR>
    <TR height=20>
        <TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
    </TR>
</TABLE>
<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
    <a href ="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/addundertake" >添加承办方</a>
</div>
<div id="info" style=" margin-left:10px;">
    <font color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font>
    <table id="mytable" cellspacing="0" >
        <tr>
            <th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>
            <th scope="col" width="150px" >承办方名称</th>
            <th scope="col" width="250px" >操作</th>
        </tr>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ut'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ut']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['name'] = 'ut';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['undertakelists']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['total']);
?>
        <tr >

            <td style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->tpl_vars['undertakelists']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ut']['index']]['undertake_id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['undertakelists']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ut']['index']]['undertake_name'];?>
</td>
            <td>
                &nbsp;&nbsp;
                [<a onClick="return confirm('确认要删除角色：<?php echo $_smarty_tpl->tpl_vars['rolelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rl']['index']]['role_name'];?>
？');" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/undertakelist/do/del/id/<?php echo $_smarty_tpl->tpl_vars['undertakelists']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ut']['index']]['undertake_id'];?>
">删除</a>]
                &nbsp;&nbsp;
                [<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/modifyundertake/id/<?php echo $_smarty_tpl->tpl_vars['undertakelists']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ut']['index']]['undertake_id'];?>
" >修改</a>]
            </td>
        </tr>
        <?php endfor; else: ?>
        <tr >
            <th class="spec" colspan="5">暂无承办方！</td>
        </tr>
        <?php endif; ?>
    </table>
</div>


</body>
</html>
<?php }} ?>