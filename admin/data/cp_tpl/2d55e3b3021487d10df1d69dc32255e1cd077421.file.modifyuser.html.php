<?php /* Smarty version Smarty-3.1.14, created on 2014-10-28 09:28:58
         compiled from "admin\tpl\system\modifyuser.html" */ ?>
<?php /*%%SmartyHeaderCode:737544ef15ab35fa5-70204726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d55e3b3021487d10df1d69dc32255e1cd077421' => 
    array (
      0 => 'admin\\tpl\\system\\modifyuser.html',
      1 => 1412910686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '737544ef15ab35fa5-70204726',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'id' => 0,
    'result' => 0,
    'admininfo' => 0,
    'adminorg' => 0,
    'rolelist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544ef15ac57b69_19549571',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ef15ac57b69_19549571')) {function content_544ef15ac57b69_19549571($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/recruit/style.css" />
    <LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
    <title>修改用户</title>
</head>
<body>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
    <TR height=28><TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/title_bg1.jpg">当前位置:修改用户</TD></TR>
    <TR><TD bgColor=#b1ceef height=1></TD></TR>
    <TR height=20>
        <TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
    </TR>
</TABLE>

<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
    <form id="form1"   target="_self" name="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/system/modifyuser/id/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" >
        <tr>
            <td width="107" height="30"><div align="right"></div></td>
            <td height="40" colspan="2">
                <div align="left"><font id="result" color="#0000FF"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font></div>
            </td>
        </tr>
        <tr>
            <td width="107" height="30"><div align="right">职工号:</div></td>
            <td height="40" colspan="2">&nbsp;
                <input id="number" type="text" name="number" size="20" value="<?php echo $_smarty_tpl->tpl_vars['admininfo']->value['admin_name'];?>
" onfocus=this.blur() />
            </td>
        </tr>
        <tr>
            <td width="107" height="30"><div align="right">姓名:</div></td>
            <td height="40" colspan="2">&nbsp;
                <input id ="name" type="text" name="name" size="20" value="<?php echo $_smarty_tpl->tpl_vars['admininfo']->value['admin_realname'];?>
" onfocus=this.blur() />
            </td>
        </tr>
        <tr>
            <td width="107" height="30"><div align="right">部门:</div></td>
            <td height="40" colspan="2">&nbsp;
                <select id="bumen_select" name="college" value="<?php echo $_smarty_tpl->tpl_vars['admininfo']->value['admin_college'];?>
">
                    <option value=0>-请选择部门-</option>
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['bumen'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['name'] = 'bumen';
$_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['adminorg']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['bumen']['total']);
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['adminorg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['bumen']['index']]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['admininfo']->value['admin_college']==$_smarty_tpl->tpl_vars['adminorg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['bumen']['index']]['id']){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['adminorg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['bumen']['index']]['organize_name'];?>
</option>
                    <?php endfor; endif; ?>
                </select>
            </td>
        </tr>
        <!--
        <tr>
                <td width="400" colspan="2">&nbsp;
                 <div style=" padding:5px 0px;margin:5px 10px;">
                     <div style=" font-size:12px; line-height:22px; color:#000; text-align:right; width:100px; float:left;">选择角色：</div>
                     <div style="width:400px;float:left;">
                     <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['rl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['name'] = 'rl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['rolelist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['total']);
?>
                         <div style=" font-size:12px; color:#000; text-align:left;min-height:20px; float:left;">
                             <input name="res[]" type="checkbox" id="res" value="<?php echo $_smarty_tpl->tpl_vars['rolelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rl']['index']]['role_id'];?>
" />
                         </div>
                            <div style="font-size:11px; line-height:20px; color:#000;text-align:center;float:left;">
                                <?php echo $_smarty_tpl->tpl_vars['rolelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rl']['index']]['role_name'];?>

                            </div>
                        <?php endfor; endif; ?>
                        </div>
                       <div style="clear:both"></div>
                  </div>
              </td>
        </tr>
         -->
        <tr>
            <td height="40"><div align="right">选择角色:</div></td>
            <td height="40" colspan="2">&nbsp;
                <div style="width:400px; height:auto;">
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['rl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['name'] = 'rl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['rolelist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['total']);
?>
                    <div style="height:18px;float:left;">
                        <div style="height:18px;float:left;">
                            <input name="res[]" type="checkbox" id="res" value="<?php echo $_smarty_tpl->tpl_vars['rolelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rl']['index']]['role_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['rolelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rl']['index']]['selected']==1){?> checked="checked"<?php }?> />
                        </div>
                        <div style="height:18px;float:left;">
                            <?php echo $_smarty_tpl->tpl_vars['rolelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['rl']['index']]['role_name'];?>

                        </div>
                    </div>
                    <?php endfor; endif; ?>
                </div>
                <div style="clear:both;"></div>
            </td>
        </tr>
        <tr>
            <td width="107" height="30"><div align="right"></div></td>
            <td height="40" colspan="2">&nbsp;
                <input name="submit" type="submit" value="提交" style="width:80px;height:30px;"/>
            </td>
        </tr>
    </form>
</table>
</body>
</html>
<?php }} ?>