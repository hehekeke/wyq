<?php /* Smarty version Smarty-3.1.14, created on 2014-11-02 16:26:45
         compiled from "admin\tpl\grade\yearend2.html" */ ?>
<?php /*%%SmartyHeaderCode:103475455eac567f354-76825187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31d8d70d56313b1c2b6c9663c993531f43713296' => 
    array (
      0 => 'admin\\tpl\\grade\\yearend2.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103475455eac567f354-76825187',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'major' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5455eac56f1e99_22007666',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5455eac56f1e99_22007666')) {function content_5455eac56f1e99_22007666($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<title>学年末评估年级设置</title>
<script type="text/javascript">
</script>
</head>
<body>
	<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  		<TR height=28><TD background=images/title_bg1.jpg>当前位置:学年末评估年级设置</TD></TR>
  		<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background=images/shadow_bg.jpg></TD>
		</TR>
	</TABLE>
	
	<table border="1" cellspacing="1" style="margin-left:10%;background-color:#fff;width:80%;border-collapse:collapse;">
	  <tr>
	    <td>学院</td>
	    <td>专业</td>
	    <td>起始年份</td>
	    <td>终止年份</td>
	  </tr>
	  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['major']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total']);
?>
	  <tr>
	    <td><?php echo $_smarty_tpl->tpl_vars['major']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['college_name'];?>
</td>
	    <td><?php echo $_smarty_tpl->tpl_vars['major']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['major_name'];?>
</td>
	    <td><?php echo $_smarty_tpl->tpl_vars['major']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['start'];?>
</td>
	    <td><?php echo $_smarty_tpl->tpl_vars['major']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['end'];?>
</td>
	  </tr> 
	  <?php endfor; endif; ?>
	  <tr><td colspan="4"><center>
	  <input type="reset" value="重置" onclick="location='<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/grade/resetAll'"/></center></td>
	  </tr>
	</table>

</body>
</html><?php }} ?>