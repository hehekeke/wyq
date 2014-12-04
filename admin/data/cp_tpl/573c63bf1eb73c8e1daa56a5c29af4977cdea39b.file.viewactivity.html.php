<?php /* Smarty version Smarty-3.1.14, created on 2014-11-30 15:02:40
         compiled from "admin\tpl\checkactivity\viewactivity.html" */ ?>
<?php /*%%SmartyHeaderCode:25389547ac11037fc42-29410168%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '573c63bf1eb73c8e1daa56a5c29af4977cdea39b' => 
    array (
      0 => 'admin\\tpl\\checkactivity\\viewactivity.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25389547ac11037fc42-29410168',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'activityInfo' => 0,
    'result' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547ac11051dda0_73377113',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547ac11051dda0_73377113')) {function content_547ac11051dda0_73377113($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/xheditor-1.2.1/xheditor-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/xheditor-1.2.1/xheditor_lang/zh-cn.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/uploadify.css">
<title>活动审批</title>
<script>
$(document).ready(function(){
$("input").attr("enable",false);
});
function willAgree(resflag){
	//alert(resflag);	
	var id=$("#activity_id").val();
	$.post('<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/CheckActivity/managePer',{"id":id,"resflag":resflag,"flag":'agree'},function(data){
		//alert(data);
		if(data==1){
		 
			alert('操作成功');
			location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/CheckActivity/ActivityList";
		}else{
			alert('操作失败,网络繁忙');
			location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/CheckActivity/ActivityList";
		}	
	});
}
</script>
</head>
<body>
	<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
		<TR height=28><TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/title_bg1.jpg">当前位置:活动审批</TD></TR>
	<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
		</TR>
	</TABLE>
	<table width="800px" border="0"  cellpadding="0" cellspacing="0">
		 
			<input type="hidden" id="activity_id" name="activity_id" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_id'];?>
" style="enable:false" />
			<tr>
				<td width="130" height="40px"><div align="right"></div></td>
				<td height="40" colspan="2">
					<div align="left"><font id="result" color="#0000FF"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font></div>
				</td>
			</tr>
			
			<tr>
   				<td height="40"><div align="right">活动名称</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_title" type="text" name="activity_title" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_title'];?>
" />
					&nbsp;&nbsp; &nbsp;&nbsp;<font color="red"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
<font>
				</td>
			</tr>
       		<tr>
				<td height="130"><div align="right">活动内容</div></td>
				<td height="130" colspan="2">&nbsp;
					<textarea rows="15" cols="12" style="width:600px"><?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_content'];?>
</textarea>
			   </td>
			</tr>
			<tr>
   				<td height="40"><div align="right">活动主题</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_theme" type="text" name="activity_theme" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_theme'];?>
"/>
				</td>
			</tr>
			 <tr>
        		<td height="40"><div align="right"> 时间:</div></td>
            	<td height="40" colspan="2">&nbsp;
             		<input id="start" name="activity_start_time" class="Wdate" type="text" style="width:200px; height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_start_time'];?>
"/>至<input id="end" name="activity_end_time" class="Wdate" type="text" style="width:200px; height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_end_time'];?>
"/>
           	 	</td>
       	   </tr>
		   <tr>
   				<td height="40"><div align="right">活动地点</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_address" type="text" name="activity_address" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_address'];?>
"/>
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">类型</div></td>
       	 		<td height="40" colspan="2">&nbsp;
				<input id="activity_address" type="text" name="activity_address" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['at_name'];?>
"/>
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">规模</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_scale" type="text" name="activity_scale" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_scale'];?>
" />人
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">专业性级别</div></td>
       	 		<td height="40" colspan="2">&nbsp;
					<input id="activity_scale" type="text" name="activity_scale" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_level'];?>
" />
						 
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">关键词</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_keywords" type="text" name="activity_keywords" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_keywords'];?>
"/>
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">负责人</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_duty_preson" type="text" name="activity_duty_preson" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_duty_preson'];?>
"/>
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">主办方</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_duty_preson" type="text" name="activity_duty_preson" style="width:340px;height:20px;" value="<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['info'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['info']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['name'] = 'info';
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['activityInfo']->value['organizers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total']);
?> <?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['organizers'][$_smarty_tpl->getVariable('smarty')->value['section']['info']['index']]['organizers_name'];?>
,<?php endfor; endif; ?>"/>
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">承办方</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_duty_preson" type="text" name="activity_duty_preson" style="width:340px;height:20px;" value="<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['info'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['info']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['name'] = 'info';
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['activityInfo']->value['undertakers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total']);
?> <?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['undertakers'][$_smarty_tpl->getVariable('smarty')->value['section']['info']['index']]['undertake_name'];?>
,<?php endfor; endif; ?>"/>
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">辅学目标</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_duty_preson" type="text" name="activity_duty_preson" style="width:340px;height:20px;" value="<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['info'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['info']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['name'] = 'info';
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['activityInfo']->value['secondary_goals']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total']);
?> <?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['secondary_goals'][$_smarty_tpl->getVariable('smarty')->value['section']['info']['index']]['sg_name'];?>
,<?php endfor; endif; ?>"/>
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">创建人</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_duty_preson" type="text" name="activity_duty_preson" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_keywords'];?>
"/>
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">创建时间</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_duty_preson" type="text" name="activity_duty_preson" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['at_create_time'];?>
"/>
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">是否重点推荐</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_duty_preson" type="text" name="activity_duty_preson" style="width:340px;height:20px;" value="<?php if ($_smarty_tpl->tpl_vars['activityInfo']->value['activity_istop']==1){?> 是 <?php }else{ ?> 否 <?php }?>"/>
				</td>
			</tr>
    	 
	</table>
	<div style="margin:0 auto;width:400px;height:100px;"><input type="button" value="同意" style="margin:0 auto;" onclick="willAgree(1);"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="margin:0 auto;" value="不同意" onclick="willAgree(2);"/></div>
</body>
</html><?php }} ?>