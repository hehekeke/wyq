<?php /* Smarty version Smarty-3.1.14, created on 2014-11-28 14:51:00
         compiled from "admin\tpl\activity\editactivitydata.html" */ ?>
<?php /*%%SmartyHeaderCode:239115477e4151b16a4-65629778%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4568e6d02c178e6cf0bd5e8cdc961f39099c2b7e' => 
    array (
      0 => 'admin\\tpl\\activity\\editactivitydata.html',
      1 => 1417157452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '239115477e4151b16a4-65629778',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5477e41529fb63_63622585',
  'variables' => 
  array (
    'web_url' => 0,
    'activityId' => 0,
    'detail' => 0,
    'attitude' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5477e41529fb63_63622585')) {function content_5477e41529fb63_63622585($_smarty_tpl) {?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/xheditor-1.2.1/xheditor-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/xheditor-1.2.1/xheditor_lang/zh-cn.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<title>活动数据维护</title>
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
<script type="text/javascript">
$(function(){
		$("#activity_create_time").focus(function(){
			WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});
		});
		$("#activity_start_time").focus(function(){
			WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});
		});
		
		}
);

</script>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  	<TR height=28><TD background=images/title_bg1.jpg>当前位置:活动数据维护维护-修改数据</TD></TR>
  	<TR><TD bgColor=#b1ceef height=1></TD></TR>
  	<TR height=20>
    	<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
	</TR>
</TABLE>

<div class="activity_info" style="margin-left: 50px;width: 80%">
    <table>
			
    </table>
    <br>
    <br>
 <div class="activity_data_weihu" style="font-size: 14px;font-weight: bold;">活动数据维护</div>
        <hr>
       <div class="activity_data">
                <table>
                <form id="form1" enctype="multipart/form-data"  target="_self" name="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/activity/editactivitydata/activityId/<?php echo $_smarty_tpl->tpl_vars['activityId']->value;?>
" >
                         </tr>   
              <tr>
                    <td>活动名称:</td>
                    <td name="activity_title"><input name="activity_title" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['activity_title'];?>
"></td>
					<td></td>
              </tr>
              <tr>
                    <td>活动内容:</td>
                    <td name="activity_content"><input name="activity_content" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['activity_content'];?>
"></td>
              </tr>
              <tr>
                    <td>活动时间:</td>
                    <td name="activity_start_time"><input class="Wdate" id="activity_start_time" name="activity_start_time" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['activity_start_time'];?>
"></td>
              </tr>
             <tr>
                    <td>活动类型:</td>
                    <td name="activity_type"><input name="activity_type" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['at_name'];?>
"></td>
             </tr>
              <tr>
                    <td>活动级别:</td>
                    <td name="activity_level">
                         <?php if ($_smarty_tpl->tpl_vars['detail']->value['activity_level']=='1'){?><select id="content" name="activity_level" >
																<option value="1"  selected>校级</option>
																<option value="2">院级</option>
																</select>
                         <?php }else{ ?><select id="content" name="activity_level" >
																<option value="1"  >校级</option>
																<option value="2" selected>院级</option>
																</select>
                         <?php }?>
                    </td>
              </tr>
              <tr>
                    <td>活动负责人:</td>
                    <td><input name="activity_duty_preson" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['activity_duty_preson'];?>
"></td>
              </tr>
              
              <tr>
                    <td>创建时间:</td>
                    <td ><input type="text" class="Wdate" id="activity_create_time" name="activity_create_time" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['activity_create_time'];?>
"></td>
              </tr>
						 <tr>
                         <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['al'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['al']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['name'] = 'al';
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['attitude']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                               <td >献鲜花：<input style="width: 50px;text-align: center;" type="text" name="flowers" id="flowers" value="<?php echo $_smarty_tpl->tpl_vars['attitude']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_flowers_num'];?>
"/></td>
                               <td style="float: left;margin-left: 40px;">扔鸡蛋：<input style="width: 50px;text-align: center;" type="text" name="egg" id="egg" value="<?php echo $_smarty_tpl->tpl_vars['attitude']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_egg_num'];?>
"/></td>
                               <td style="float: left;margin-left: 40px;">想参加：<input style="width: 50px;text-align: center;" type="text" name="want" id="want" value="<?php echo $_smarty_tpl->tpl_vars['attitude']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_iswant_num'];?>
"/></td>
                         <?php endfor; else: ?>
                               <td style="float: left;">献鲜花：<input style="width: 50px;text-align: center;" type="text" name="flowers0" id="flowers0" value="0"/></td>
                               <td style="float: left;margin-left: 40px;">扔鸡蛋：<input style="width: 50px;text-align: center;" type="text" name="egg0" id="egg0" value="0"/></td>
                               <td style="float: left;margin-left: 40px;">想参加：<input style="width: 50px;text-align: center;" type="text" name="want0" id="want0" value="0"/></td>
                         <?php endif; ?>
                         </tr>
                         <tr>
                                <td height="40" >
                	            <input name="submit" type="submit" value="保存修改" style="width:65px;height: 30px;" />
                                </td>
                         </tr>
                </form>
                </table>
           </div>
</body>
</html><?php }} ?>