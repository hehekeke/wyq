<?php /* Smarty version Smarty-3.1.14, created on 2014-11-02 18:27:14
         compiled from "admin\tpl\notice\noticetypeadd.html" */ ?>
<?php /*%%SmartyHeaderCode:31519545607023dedb5-72400690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14efa42ad584843cb463429a449d3d2adc31d965' => 
    array (
      0 => 'admin\\tpl\\notice\\noticetypeadd.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31519545607023dedb5-72400690',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54560702427db2_24391366',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54560702427db2_24391366')) {function content_54560702427db2_24391366($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
    <title>通知公告类型维护</title>
    <script>
        function sub(){
            var nt_name=document.addForm.nt_name.value;
            if(nt_name.length==0){
                alert('不能为空');
            }else if(nt_name.length>6){
                alert('最多输入6个字符');
            }else{
                document.addForm.submit();
            }
        }
    </script>
</head>
<body>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
    <TR height=28><TD background=images/title_bg1.jpg>当前位置:通知公告类型维护>新增</TD></TR>
    <TR><TD bgColor=#b1ceef height=1></TD></TR>
    <TR height=20>
        <TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
    </TR>
</TABLE>
<form action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/notice/ntAdd" method="post" name="addForm">
    通知公告类型：<input type="text" name="nt_name" class="nt_name"/>

    <input type="button" value="添加" onclick="sub()"/>
</form>
</body>
</html><?php }} ?>