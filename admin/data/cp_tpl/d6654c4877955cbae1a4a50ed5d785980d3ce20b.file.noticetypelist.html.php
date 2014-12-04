<?php /* Smarty version Smarty-3.1.14, created on 2014-11-27 17:21:39
         compiled from "admin\tpl\notice\noticetypelist.html" */ ?>
<?php /*%%SmartyHeaderCode:116705455ead9acdf10-18877807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6654c4877955cbae1a4a50ed5d785980d3ce20b' => 
    array (
      0 => 'admin\\tpl\\notice\\noticetypelist.html',
      1 => 1417080091,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116705455ead9acdf10-18877807',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5455ead9b8c7a6_04513342',
  'variables' => 
  array (
    'web_url' => 0,
    'typeList' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5455ead9b8c7a6_04513342')) {function content_5455ead9b8c7a6_04513342($_smarty_tpl) {?><?php if (!is_callable('smarty_function_page')) include 'C:\\Myphp\\apache\\htdocs\\nkgn\\been/View/plugins\\function.page.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
    <title>通知公告类型维护</title>
</head>
<style>
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
#info2 th{
    border: 1px solid #adceff;
    letter-spacing: 2px;
    text-align: left;
    padding: 6px 6px 6px 12px;
}




</style>

<body>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
    <TR height=28><TD background=images/title_bg1.jpg>当前位置:通知公告类型维护</TD></TR>
    <TR><TD bgColor=#b1ceef height=1></TD></TR>
    <TR height=20>
        <TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
    </TR>
</TABLE>
<div style="margin-bottom: 10px;margin-left: 20px">
    <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/notice/noticeTypeAdd">新增通知公告类型</a>
</div>
<div>
    <table>
        <tr  id="info">
            <th scope="col" width="50px" style="border-left:1px solid #adceff;">编号</th>
            <th scope="col" width="400px">通知公告类型</th>
            <th scope="col" width="300px">创建时间</th>
            <th scope="col" width="200px">操作</th>
        </tr>

        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['no'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['no']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['name'] = 'no';
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['typeList']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['total']);
?>

        <tr id="info2">
            <th><?php echo $_smarty_tpl->tpl_vars['typeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['nt_id'];?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['typeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['nt_name'];?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['typeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['nt_create_time'];?>
</th>
            <?php if ($_smarty_tpl->tpl_vars['typeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['nt_name']=='其他'){?>
                <th></th>
               <?php }else{ ?>
                <th><a style="color: #0000ff" href="javascript:if(confirm('确实要删除吗?'))location='<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/notice/nt_delete/id/<?php echo $_smarty_tpl->tpl_vars['typeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['nt_id'];?>
'">[删除]</a>&nbsp;
                    <a style="color: #0000ff" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/notice/notice_type_modify/id/<?php echo $_smarty_tpl->tpl_vars['typeList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['nt_id'];?>
">[修改]</a></th>
           <?php }?>

        </tr>
        <?php endfor; endif; ?>
    </table>
		<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['typeList']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/notice/noticeTypeList"),$_smarty_tpl);?>

</div>

</body>
</html><?php }} ?>