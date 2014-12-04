<?php /* Smarty version Smarty-3.1.14, created on 2014-11-28 11:58:32
         compiled from "admin\tpl\activity\activitydata.html" */ ?>
<?php /*%%SmartyHeaderCode:10564547443232d46c8-38096222%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6535cb184cbc4dfe0801d356631961cff7d747a8' => 
    array (
      0 => 'admin\\tpl\\activity\\activitydata.html',
      1 => 1417147102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10564547443232d46c8-38096222',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547443234176e6_83669157',
  'variables' => 
  array (
    'web_url' => 0,
    'page' => 0,
    'type' => 0,
    'typelist' => 0,
    'create' => 0,
    'user' => 0,
    'result' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547443234176e6_83669157')) {function content_547443234176e6_83669157($_smarty_tpl) {?><?php if (!is_callable('smarty_function_page')) include 'C:\\Myphp\\apache\\htdocs\\nkgn\\been/View/plugins\\function.page.php';
?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
 <script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/My97DatePicker/WdatePicker.js"></script>
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<title>活动数据维护</title>
<script type="text/javascript">
	$(function() {
		$("#search_button").live("click",function() {
			//alert("111");
			var leixing = $("#type").val();
			var chuangjianzhe = $("#chuanjian").val();
			var activity_start_time = $("#activity_start_time").val();
			window.location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/activity/getactivitydata/page/<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
/type/"+leixing+"/create/"+chuangjianzhe+"/activity_start_time/"+activity_start_time;
		});

        $("#activity_start_time").focus(function(){
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});
        });
	});

</script>
</head>
<body>
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

<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  	<TR height=28><TD background=images/title_bg1.jpg>当前位置:活动数据维护</TD></TR>
  	<TR><TD bgColor=#b1ceef height=1></TD></TR>
  	<TR height=20>
    	<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
	</TR>
</TABLE>
<div id="search_activity" style="margin-left:20px;">
		活动类型:
		<select name="type" id="type"> 
		<option value="0" <?php if ($_smarty_tpl->tpl_vars['type']->value==0){?> selected="selected" <?php }?>>全部</option>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['tl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['tl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['name'] = 'tl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['typelist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['tl']['total']);
?>
		<option value="<?php echo $_smarty_tpl->tpl_vars['typelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['tl']['index']]['at_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['type']->value==$_smarty_tpl->tpl_vars['typelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['tl']['index']]['at_id']){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['typelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['tl']['index']]['at_name'];?>
</option>
		<?php endfor; endif; ?>
		</select>
		&nbsp;
		创建人：
		<select name="chuanjian" id="chuanjian"> 
		<option value="0" <?php if ($_smarty_tpl->tpl_vars['create']->value==0){?> selected="selected" <?php }?>>全部</option>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ul'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ul']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['name'] = 'ul';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['user']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['total']);
?>
		<option value="<?php echo $_smarty_tpl->tpl_vars['user']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ul']['index']]['activity_create_user_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['create']->value==$_smarty_tpl->tpl_vars['user']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ul']['index']]['activity_create_user_id']){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['user']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ul']['index']]['name'];?>
</option>
		<?php endfor; endif; ?>
		</select>
		&nbsp;
		日期:
		<input type="text" name="activity_start_time" id="activity_start_time" style="width:200px" class="Wdate"/>
		&nbsp;
		<input id ="search_button" type="button" value="查询" />
</div>
</br>
<div id="info" style=" margin-left:10px;">
	<font color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font>
	<table id="mytable" cellspacing="0" >  
  		<tr>  
    		<th scope="col" width="50px" style="border-left:1px solid #adceff;" >活动ID</th>
    		<th scope="col" width="400px" >活动名称</th>
    		<th scope="col" width="200px" >主办方<?php echo $_smarty_tpl->tpl_vars['create']->value;?>
</th>
    		<th scope="col" width="200px" >创建人</th>
    		<th scope="col" width="50px" >操作</th>
  		</tr>  
  		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['al'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['al']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['name'] = 'al';
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total']);
?>
  		<tr >  
    		<td style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_id'];?>
</td>
   		    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_title'];?>
</td>
   		    <td>
   		    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ol'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ol']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['name'] = 'ol';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['ori']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ol']['total']);
?>
   		    	<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['ori'][$_smarty_tpl->getVariable('smarty')->value['section']['ol']['index']]['organizers_name'];?>

   		    <?php endfor; else: ?>
   		    	无主办方
   		    <?php endif; ?>
   		    </td>
   		    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['admin_realname'];?>
</td>
   		    <td><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/activity/getEditactivitydata/activityId/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_id'];?>
">修改数据</a></td>
  		</tr>  
  		<?php endfor; else: ?>
  		<tr >
    		<th class="spec" colspan="5">暂无活动！</td>
  		</tr>
  		<?php endif; ?>
	</table>  
	<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/activity/Getactivitydata/page/".((string)$_smarty_tpl->tpl_vars['page']->value)."/type/".((string)$_smarty_tpl->tpl_vars['type']->value)."/create/".((string)$_smarty_tpl->tpl_vars['create']->value)),$_smarty_tpl);?>

</div>
</body>
</html><?php }} ?>