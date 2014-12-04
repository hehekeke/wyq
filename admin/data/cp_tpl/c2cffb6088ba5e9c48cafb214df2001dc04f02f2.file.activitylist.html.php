<?php /* Smarty version Smarty-3.1.14, created on 2014-11-30 14:18:05
         compiled from "admin\tpl\activity\activitylist.html" */ ?>
<?php /*%%SmartyHeaderCode:9456544de9e9f0bd15-40524011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2cffb6088ba5e9c48cafb214df2001dc04f02f2' => 
    array (
      0 => 'admin\\tpl\\activity\\activitylist.html',
      1 => 1417327921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9456544de9e9f0bd15-40524011',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544de9ea206618_79648651',
  'variables' => 
  array (
    'web_url' => 0,
    'page' => 0,
    'xuenian' => 0,
    'type' => 0,
    'typelist' => 0,
    'create' => 0,
    'user' => 0,
    'source' => 0,
    'result' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544de9ea206618_79648651')) {function content_544de9ea206618_79648651($_smarty_tpl) {?><?php if (!is_callable('smarty_function_page')) include 'C:\\Myphp\\apache\\htdocs\\nkgn\\been/View/plugins\\function.page.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<title>历史活动库维护</title>
<script type="text/javascript">
	$(function() {
		$("#search_button").live("click",function() {
			var leixing = $("#type").val();
			var chuangjianzhe = $("#chuanjian").val();
			var laiyuan = $("#source").val();
            var xuenian = $("#xuenian").val();
            var activity_start_time = $("#activity_start_time").val();
            var activity_end_time = $("#activity_end_time").val();
			window.location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/activity/getactivitylist/page/<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
/type/"+
                    leixing+"/source/"+laiyuan+"/create/"+chuangjianzhe+"/xuenian/"+xuenian
                    +"/activity_start_time/"+activity_start_time+"/activity_end_time/"+activity_end_time;
		});
	});
	
	//点击选中
	$(function(){
		$(":checkBox#quanxuan").click(function(){
				//点击一次
				var checked=$(this).attr('checked');
				if(checked=='checked'){
					$(":checkBox").attr("checked",true);
				}
				if(checked!='checked'){
					$(":checkBox").attr("checked",false);
				}				
			});
	});
	
	//添加历史新纪录
	function mkseleect(){
		var selectTo=$("#selectTo").val();
		//获取所有选择狂
		var i=0;
		var selectValue=new Array();
		var checkBoxs=$(":checkBox[id='selectchecked[]']");
		//alert(checkBoxs.length);
		for(var j=0;j<checkBoxs.length;j++){
			if(checkBoxs[j].checked==true){
				selectValue[i]=checkBoxs[j].value;//假如数组
				i++;
			}
		}
		selectValue=JSON.stringify(selectValue);
		$.post('<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ActivityFromH',{"checkedValue":selectValue,"activity_class":selectTo},function(data){
			if(data=='1'){
				$("#msg2").html('<font color="red">添加成功,</font><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ActivityList/type/'+selectTo+'">点此查看</a>');
			}
			if(data=='2'){
				$("#msg2").html('<font color="red">请选择至少一项</font>');
			}		
		});
	}
	$(function(){
		$("#activity_start_time").focus(function(){
			WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});
		});
		$("#activity_end_time").focus(function(){
			WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});
		});
		
		}
);
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
  	<TR height=28><TD background=images/title_bg1.jpg>当前位置:历史活动库维护</TD></TR>
  	<TR><TD bgColor=#b1ceef height=1></TD></TR>
  	<TR height=20>
    	<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
	</TR>
</TABLE>
<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
	
</div>
</br>
<div id="search_activity" style="margin-left:20px;">
		学年:
		<select name="xuenian" id="xuenian">
		<option value="0" >全部</option>
        <option value="2013" <?php if ($_smarty_tpl->tpl_vars['xuenian']->value==2013){?>selected="selected"<?php }?> >2013</option>
        <option value="2014" <?php if ($_smarty_tpl->tpl_vars['xuenian']->value==2014){?>selected="selected"<?php }?> >2014</option>
        <option value="2015" <?php if ($_smarty_tpl->tpl_vars['xuenian']->value==2015){?>selected="selected"<?php }?> >2015</option>
        <option value="2016" <?php if ($_smarty_tpl->tpl_vars['xuenian']->value==2016){?>selected="selected"<?php }?> >2016</option>
        <option value="2017" <?php if ($_smarty_tpl->tpl_vars['xuenian']->value==2017){?>selected="selected"<?php }?> >2017</option>
        <option value="2018" <?php if ($_smarty_tpl->tpl_vars['xuenian']->value==2018){?>selected="selected"<?php }?> >2018</option>
		</select>
		&nbsp;
		类型：
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
		创建人:
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
		数据来源:
		<select name="source" id="source"> 
		<option value="0" <?php if ($_smarty_tpl->tpl_vars['source']->value==0){?>selected="selected"<?php }?> >全部</option>
		<option value="1" <?php if ($_smarty_tpl->tpl_vars['source']->value==1){?>selected="selected"<?php }?> >学年活动</option>
		<option value="2" <?php if ($_smarty_tpl->tpl_vars['source']->value==2){?>selected="selected"<?php }?> >周活动</option>
		</select>
		&nbsp;
		活动时间：
		<input class="Wdate" id="activity_start_time" name="activity_start_time">到
		
		<input class="Wdate" id="activity_end_time" name="activity_end_time">
		&nbsp;
		<input id ="search_button" type="button" value="查询" />
</div>
</br>
<div id="info" style=" margin-left:10px;">
	<font color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font>
	<table id="mytable" cellspacing="0" >  
  		<tr>  
    		<th scope="col" width="50px" style="border-left:1px solid #adceff;" ><input type="checkBox" id="quanxuan" />全选</th>  
    		<th scope="col" width="150px" >学年</th> 
    		<th scope="col" width="400px" >名称</th>   
    		<th scope="col" width="80px" >类型</th>
    		<th scope="col" width="80px" >专业性级别</th>
    		<th scope="col" width="80px" >主办方</th>
    		<th scope="col" width="80px" >创建者</th>
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
    		<td style="border-left:1px solid #adceff;" ><input type="checkBox" id="selectchecked[]" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_id'];?>
"/></td>
    		<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_school_year'];?>
</td>
   		    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_title'];?>
</td>
   		    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['at_name'];?>
</td>
   		    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_level'];?>
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
/mannkgn.php/activity/detail/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_id'];?>
">查看</a></td>
  		</tr>  
  		<?php endfor; else: ?>
  		<tr >
    		<th class="spec" colspan="5">暂无活动！</td>
  		</tr>
  		<?php endif; ?>
	</table>
	添加至<select id="selectTo" >
		<option value="0">学年活动</option>
		<option value="1">周活动</option>	
	</select>
	<input type="button" value="添加选中" id="mkselect" onclick="mkseleect();" style="float:rigth;margin:10px 20px"/>
	<span id="msg2"></span>
	<div>
		<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/activity/getactivitylist/page/".((string)$_smarty_tpl->tpl_vars['page']->value)."/type/".((string)$_smarty_tpl->tpl_vars['type']->value)."/source/<".((string)$_smarty_tpl->tpl_vars['source']->value).">/create/".((string)$_smarty_tpl->tpl_vars['create']->value)),$_smarty_tpl);?>

	</div>
	
</div>
</body>
</html><?php }} ?>