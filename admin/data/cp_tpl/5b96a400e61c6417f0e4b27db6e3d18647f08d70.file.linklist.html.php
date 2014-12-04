<?php /* Smarty version Smarty-3.1.14, created on 2014-11-25 16:38:58
         compiled from "admin\tpl\other\linklist.html" */ ?>
<?php /*%%SmartyHeaderCode:265195474402254b6a1-62025543%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b96a400e61c6417f0e4b27db6e3d18647f08d70' => 
    array (
      0 => 'admin\\tpl\\other\\linklist.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '265195474402254b6a1-62025543',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'result' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547440226a1c58_76941234',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547440226a1c58_76941234')) {function content_547440226a1c58_76941234($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\Myphp\\apache\\htdocs\\nkgn\\been/Smarty/plugins\\modifier.truncate.php';
if (!is_callable('smarty_function_page')) include 'C:\\Myphp\\apache\\htdocs\\nkgn\\been/View/plugins\\function.page.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<title>友情链接管理</title>
</head>
<body>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  	<TR height=28><TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/title_bg1.jpg">当前位置:友情链接管理</TD></TR>
  	<TR><TD bgColor=#b1ceef height=1></TD></TR>
  	<TR height=20>
    	<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
	</TR>
</TABLE>

<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
	<a href ="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/other/addlink" >添加友情链接</a>
</div>
<div style="padding-left:30px;" >
	<font color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font>
</div>
<div>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ll'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ll']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['name'] = 'll';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['link']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['total']);
?>
	<div style="padding-left:30px;padding-top:10px;background-color:white;width:400px;height:160px; float:left">
		<?php if ($_smarty_tpl->tpl_vars['link']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['fl_istop']==''||$_smarty_tpl->tpl_vars['link']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['fl_istop']=="0000-00-00 00:00:00"){?>
		<div style ="width:400px; height:160px;background-color:#FFC1C1;">
		<?php }else{ ?>
		<div style ="width:400px; height:160px;background-color:#4DB849;">
		<?php }?>
			<div style="height:20px; width:400px; text-align: right; ">
    			<a style="line-height:20px; height: 20px;"  href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/other/Editlink/id/<?php echo $_smarty_tpl->tpl_vars['link']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['fl_id'];?>
">编辑</a>
				&nbsp;&nbsp;
		   		<a onclick="return confirm('确认删除这个友情链接吗？');" style="line-height:20px; height: 20px;"  href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/other/linklist/do/del/id/<?php echo $_smarty_tpl->tpl_vars['link']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['fl_id'];?>
">删除</a>
				&nbsp;&nbsp;
				<?php if ($_smarty_tpl->tpl_vars['link']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['fl_istop']==''||$_smarty_tpl->tpl_vars['link']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['fl_istop']=="0000-00-00 00:00:00"){?>
				<a style="line-height:20px; height: 20px;"  href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/other/linklist/do/settop/id/<?php echo $_smarty_tpl->tpl_vars['link']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['fl_id'];?>
">置顶</a>
				<?php }else{ ?>
				<a style="line-height:20px; height: 20px;"  href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/other/linklist/do/canceltop/id/<?php echo $_smarty_tpl->tpl_vars['link']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['fl_id'];?>
">取消置顶</a>
				<?php }?>
			</div>
			<div style="height:120px; margin:10px; width:380; text-align:left;" >
				<div style="float:left;width:360px;height:120px;margin:5px 10px 10px 10px;">
					<div style="width:360px;height:30px;">标题:<?php echo $_smarty_tpl->tpl_vars['link']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['fl_name'];?>
</div>
					<div style="width:360px; height:30px;">链接地址:<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['fl_link'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['link']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['fl_link'],40,'..',true,true);?>
</a></div>
					<div style="width:360px; height:30px;">创建者:<?php echo $_smarty_tpl->tpl_vars['link']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['admin_realname'];?>
</div>
					<div style="width:360px; height:30px;">创建时间:<?php echo $_smarty_tpl->tpl_vars['link']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['fl_create_time'];?>
</div>
				</div>
			</div>
		</div>
	</div>
<?php endfor; else: ?>
	暂时没有友情链接
<?php endif; ?>
	<div style="clear: both;"></div>
</div>
<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['link']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/link/linklist"),$_smarty_tpl);?>

</body>
</html><?php }} ?>