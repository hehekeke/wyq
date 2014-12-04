<?php /* Smarty version Smarty-3.1.14, created on 2014-11-28 13:05:55
         compiled from "admin\tpl\activitymanage\sensitivewordslist.html" */ ?>
<?php /*%%SmartyHeaderCode:15827547802b3589ec0-08982125%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad95a6adb1492e34196457181d8841ea81ee88fe' => 
    array (
      0 => 'admin\\tpl\\activitymanage\\sensitivewordslist.html',
      1 => 1412909666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15827547802b3589ec0-08982125',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'result' => 0,
    'sensitive_words' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547802b3680070_50652969',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547802b3680070_50652969')) {function content_547802b3680070_50652969($_smarty_tpl) {?><?php if (!is_callable('smarty_function_page')) include 'C:\\Myphp\\apache\\htdocs\\nkgn\\been/View/plugins\\function.page.php';
?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                $("#result").val("");
                if($("#sensitiveword").val() == ""){
                    $("#sensitiveword").focus();
                    $("#result").text("查询敏感词不能为空！");
                    return false;
                }

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
    <TR height=28><TD background=images/title_bg1.jpg>当前位置:敏感词维护</TD></TR>
    <TR><TD bgColor=#b1ceef height=1></TD></TR>
    <TR height=20>
        <TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
    </TR>
</TABLE>
<div style="color: #036;margin-bottom: 20px;margin-left: 30px" >
    <form action="" id="form1" name="form1" method="post">
    <span style="margin-right: 10px">敏感词:</span>
    <input type="text"  name="sensitiveword" id="sensitiveword" value=""/>
    <a style="margin-left: 10px" style="cursor: pointer" onclick="document.getElementById('form1').submit()">查询</a>
        <!--document.getElementById('form1').submit()-->
    </form>
</div>
<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
    <a href ="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/addsensitivewords" >添加敏感词</a>
</div>
<div id="info" style=" margin-left:10px;">
    <font color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font>
    <table id="mytable" cellspacing="0" >
        <tr>
            <th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>
            <th scope="col" width="150px" >敏感词名称</th>
            <th scope="col" width="250px" >操作</th>
        </tr>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ut'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ut']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['name'] = 'ut';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ut']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['sensitive_words']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

            <td style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->tpl_vars['sensitive_words']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ut']['index']]['sw_id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['sensitive_words']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ut']['index']]['sw_name'];?>
</td>
            <td>
                &nbsp;&nbsp;
                [<a onClick="return confirm('确认要删除此敏感词：<?php echo $_smarty_tpl->tpl_vars['sensitive_words']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ut']['index']]['sw_name'];?>
？');" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/sensitive_words_list/do/del/id/<?php echo $_smarty_tpl->tpl_vars['sensitive_words']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ut']['index']]['sw_id'];?>
">删除</a>]
                &nbsp;&nbsp;
                [<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/modifysensitivewords/id/<?php echo $_smarty_tpl->tpl_vars['sensitive_words']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ut']['index']]['sw_id'];?>
" >修改</a>]
            </td>
        </tr>
        <?php endfor; else: ?>
        <tr >
            <th class="spec" colspan="5">暂无敏感词！</td>
        </tr>
        <?php endif; ?>

    </table>
    <?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['sensitive_words']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/activityManage/sensitive_words_list/page/".((string)$_smarty_tpl->tpl_vars['page']->value)),$_smarty_tpl);?>

</div>


</body>
</html>
<?php }} ?>