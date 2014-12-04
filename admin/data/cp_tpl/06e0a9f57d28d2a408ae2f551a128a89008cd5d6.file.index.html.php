<?php /* Smarty version Smarty-3.1.14, created on 2014-10-28 09:25:00
         compiled from "admin\tpl\college\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1031544ef06cb5ffa6-45501370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06e0a9f57d28d2a408ae2f551a128a89008cd5d6' => 
    array (
      0 => 'admin\\tpl\\college\\index.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1031544ef06cb5ffa6-45501370',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'type' => 0,
    'setting' => 0,
    'list' => 0,
    'isnew' => 0,
    'noticelist' => 0,
    'select' => 0,
    'grade' => 0,
    'majorlist' => 0,
    'major' => 0,
    'nenglist' => 0,
    'num' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544ef06d1f1c39_75266323',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ef06d1f1c39_75266323')) {function content_544ef06d1f1c39_75266323($_smarty_tpl) {?><?php if (!is_callable('smarty_function_page')) include 'E:\\wamp\\www\\nkgn\\been/View/plugins\\function.page.php';
?> <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<title>学院评估工作</title>
<script type="text/javascript">
	$(function(){
		$(".leibie").click(function(){
			//alert("111");
			var type_id = $(this).attr("data");
			$(".leibie-selected").removeClass("leibie-selected");
			$(this).addClass("leibie-selected");
			location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/college/index/type/"+type_id;
		});
	});
	function chaxun(){
		var selectId = $("#pinggutonggao").val();
		var majorId = $("#xuesheng_zhuanye").val();
		var grade = $("#xuesheng_nianji").val();
		//alert(grade);
		var name = $("#xingming_text").val();
		location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/college/index?type=5&selected="+selectId+"&grade="+grade+"&major="+majorId+"&name="+name;
	}
    function chaxun_banji(){
        var selectid=$("#pingguxiangmu").val();
        location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/college/index?type=4&selected="+selectid;
    }
</script>
<style type="text/css"> 
.leibie-container{margin-left:10px;  height:27px; width:auto; border-left: #999 double 1px; }
.leibie{cursor:pointer; width:190px; height:25px; line-height:25px;border-right: #999 double 1px; border-bottom: #999 double 1px; border-top: #999 double 1px; float:left; text-align:center; background:#E7E7E7;}
.leibie:hover{background:#FCF1CA;}
.leibie-selected{	width:190px; height:25px; line-height:25px;border-right: #999 double 1px;border-bottom: #999 double 1px; border-top: #999 double 1px; float:left; text-align:center; background: #FCF1CA;}
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
.jindu{position:relative; border:1px #CCC solid; height:28px; width:240px; margin:0 auto; padding:1px;float:left;}
.jindu_text{margin:0px 0px 0px 5px; width:100px; height:28px; line-height: 20px; font-size:10px;float:left;}
.jindu-weiqidong{ display:block;width:0px; height:28px;}
.jindu-daishenhe{ display:block;width:60px; height:28px;background:#FFCC99;}
.jindu-gognshi{ display:block;width:120px; height:28px;background:#FFFF99;}
.jindu-pinggu{ display:block;width:180px; height:28px;background:#9900FF;}
.jindu-jiesu{ display:block;width:240px; height:28px;background:#008000;}
.jindu-nonew-ziping{ display:block;width:60px; height:28px;background:#FFCC99;}
.jindu-nonew-kaopinghui{ display:block;width:120px; height:28px;background:#FFFF99;}
.jindu-nonew-fankui{ display:block;width:180px; height:28px;background:#9900FF;}
.school-jindu-weiqidong{ display:block;width:0px; height:28px;}
.school-jindu-daishenhe{ display:block;width:48px; height:28px;background:#FFCC99;}
.school-jindu-gognshi{ display:block;width:96px; height:28px;background:#FFFF99;}
.school-jindu-xuanjiang{ display:block;width:144px; height:28px;background:#CCCCFF;}
.school-jindu-pinggu{ display:block;width:192px; height:28px;background:#9900FF;}
.school-jindu-jiesu{ display:block;width:240px; height:28px;background:#008000;
</style> 
</head>
<body>
	<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  		<TR height=28><TD background=images/title_bg1.jpg>当前位置:学院评估工作</TD></TR>
  		<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
		</TR>
	</TABLE>
	<div id="leibie-container" class = "leibie-container" >
		<div <?php if ($_smarty_tpl->tpl_vars['type']->value==1){?> class="leibie leibie-selected"<?php }else{ ?>class="leibie"<?php }?> data="1">学校评估通知</div>
		<div <?php if ($_smarty_tpl->tpl_vars['type']->value==2){?> class="leibie leibie-selected"<?php }else{ ?>class="leibie"<?php }?> data="2">学院项目说明</div>
		<div <?php if ($_smarty_tpl->tpl_vars['type']->value==3){?> class="leibie leibie-selected"<?php }else{ ?>class="leibie"<?php }?> data="3">学院评估方案、通知和宣讲方案</div>
		<div <?php if ($_smarty_tpl->tpl_vars['type']->value==4){?> class="leibie leibie-selected"<?php }else{ ?>class="leibie"<?php }?> data="4">查看班级评估进度</div>
		<?php if ($_smarty_tpl->tpl_vars['setting']->value['ss_view_other_college']==1){?><div <?php if ($_smarty_tpl->tpl_vars['type']->value==6){?> class="leibie leibie-selected"<?php }else{ ?>class="leibie"<?php }?> data="6">查看其他学院进度</div><?php }?>
		<div <?php if ($_smarty_tpl->tpl_vars['type']->value==5){?> class="leibie leibie-selected"<?php }else{ ?>class="leibie"<?php }?> data="5">查看评估结果</div>
		<div style="clear:both;" ></div>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['type']->value==1){?>
	</br>
	<div id="info" style=" margin-left:10px;">
		<table id="mytable" cellspacing="0" >  
  			<tr>  
    			<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>  
    			<th scope="col" width="150px" >学年</th> 
    			<th scope="col" width="200px" >标题</th>   
    			<th scope="col" width="80px" >评估时间段</th>
    			<th scope="col" width="100px" >发布时间</th>
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
    			<td style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['article_id'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['article_xuenian'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['article_title'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['article_begin_time'];?>
至<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['article_end_time'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['article_create_time'];?>
</td>
			<td>
		    	<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/college/detail/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['article_id'];?>
">查看通知</a>
			</td>
  		</tr>  
  		<?php endfor; else: ?>
 		 <tr >
    		<th class="spec" colspan="6">暂无评估通告！</td>
  		</tr>
  		<?php endif; ?>
	</table> 
	<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/college/index/type/".((string)$_smarty_tpl->tpl_vars['type']->value)),$_smarty_tpl);?>
 
	</div>
	<?php }elseif($_smarty_tpl->tpl_vars['type']->value==2){?>
		</br>
		<div style="margin-left:50px;margin-top:0px;background-color:white;width:400px;height:30px;font-size:10px;">
			<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/college/addass">制定评估细则</a>
		</div>
		</br>
			<div id="info" style=" margin-left:10px;">
		<table id="mytable" cellspacing="0" >  
  			<tr>  
    			<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>  
    			<th scope="col" width="150px" >学年</th> 
    			<th scope="col" width="250px" >标题</th>   
    			<th scope="col" width="100px" >发布时间</th> 
    			<th scope="col" width="80px" >操作</th> 
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['name'] = 'cl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total']);
?>
 		 	<tr>  
    			<td style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['asspro_id'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['asspro_xuenian'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['asspro_title'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['asspro_create_time'];?>
</td>
    			<td>
    			<?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['asspro_state']==1||$_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['asspro_state']==3){?>
    				<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/college/assdetail/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['asspro_id'];?>
">查看</a>
    			<?php }else{ ?>
    				<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/college/modifyass/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['asspro_id'];?>
">修改</a>
    			<?php }?>
    			</td>
  			</tr>  
  		<?php endfor; endif; ?>
	</table> 
	<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/college/index/type/".((string)$_smarty_tpl->tpl_vars['type']->value)),$_smarty_tpl);?>
 
	</div>
	<?php }elseif($_smarty_tpl->tpl_vars['type']->value==3){?>
	</br>
	<div style="margin-left:50px;margin-top:0px;background-color:white;width:400px;height:30px;font-size:10px;">
			<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/college/addxuejiang">发布学院评估方案、通知和宣讲方案</a>
	</div>
	</br>
	<div id="info" style=" margin-left:10px;">
		<table id="mytable" cellspacing="0" >  
  			<tr>  
    			<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>  
    			<th scope="col" width="150px" >学年</th> 
    			<th scope="col" width="250px" >本学院评估时段</th>   
    			<th scope="col" width="100px" >发布时间</th> 
    			<th scope="col" width="80px" >操作</th> 
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pgl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['name'] = 'pgl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pgl']['total']);
?>
 		 	<tr>  
    			<td style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pgl']['index']]['article_id'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pgl']['index']]['article_xuenian'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pgl']['index']]['article_begin_time'];?>
至<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pgl']['index']]['article_end_time'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pgl']['index']]['article_create_time'];?>
</td>
    			<td>
    				<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/college/detailxuejiang/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pgl']['index']]['article_id'];?>
">查看</a>
    			</td>
  			</tr>  
  			<?php endfor; else: ?>
  			<th class="spec" colspan="5">暂无！</th>
  		<?php endif; ?>
	</table> 
	<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/college/index/type/".((string)$_smarty_tpl->tpl_vars['type']->value)),$_smarty_tpl);?>
 
	</div>
	<?php }elseif($_smarty_tpl->tpl_vars['type']->value==4){?>
	</br>
    <div style="width:600px;height:30px">
    <div id="notice_search" style="margin-left:20px;float: left">
        评估:
        <select name="pingguxiangmu" id="pingguxiangmu">
                <option value="0"  <?php if ($_smarty_tpl->tpl_vars['isnew']->value==0){?>selected="selected"<?php }?>>学年末评估</option>
                <option value="1"  <?php if ($_smarty_tpl->tpl_vars['isnew']->value==1){?>selected="selected"<?php }?>>新生入学</option>

        </select>
     </div>
    <div id="anniu_search" style="margin-left:20px;float: right">
        <input type="button" id= "chaxuan_bj" onclick="chaxun_banji();" style="width:80px; height:25px;" value="查询" />
    </div>
    </div>
	<div id="info" style=" margin-left:10px;margin-top: 15px">
		<table id="mytable" cellspacing="0" >  
  			<tr>  
    			<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>  
    			<th scope="col" width="200px" >专业</th> 
    			<th scope="col" width="100px" >年级</th>   
    			<th scope="col" width="380px" >进度</th> 
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['gdl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['name'] = 'gdl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['gdl']['total']);
?>
 		 	<tr>  
    			<td style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gdl']['index']]['gd_id'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gdl']['index']]['major_name'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gdl']['index']]['gd_grade'];?>
</td>
    			<td>
    				<?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gdl']['index']]['new']==0){?>
    					<?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gdl']['index']]['gd_state']==0){?>
    						<div class="jindu">
    				 			<div class="jindu-weiqidong"></div>
    						</div>
    						<div class="jindu_text">
    							未启动
    						</div>
    						<div style="clear:both;"></div>
    					<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gdl']['index']]['gd_state']==1){?>
    						<div class="jindu">
    					 		<div class="jindu-nonew-ziping"></div>
    						</div>
    						<div class="jindu_text">
    							自评
    						</div>
    					<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gdl']['index']]['gd_state']==2){?>
    						<div class="jindu">
    					 		<div class="jindu-nonew-kaopinghui"></div>
    						</div>
    						<div class="jindu_text">
    							班级公开展示
    						</div>
    					<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gdl']['index']]['gd_state']==3){?>
    						<div class="jindu">
    					 		<div class="jindu-nonew-fankui"></div>
    						</div>
    						<div class="jindu_text">
    							结果统计和反馈
    						</div>
    					<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gdl']['index']]['gd_state']==4){?>
    						<div class="jindu">
    					 		<div class="jindu-jiesu"></div>
    						</div>
    						<div class="jindu_text">
    							完成
    						</div>
    					<?php }else{ ?>
    					<?php }?>
    				<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gdl']['index']]['new']==1){?>
    					<?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gdl']['index']]['gd_state']==0){?>
    						<div class="jindu">
    				 			<div class="jindu-weiqidong"></div>
    						</div>
    						<div class="jindu_text">
    							未启动
    						</div>
    						<div style="clear:both;"></div>
    					<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gdl']['index']]['gd_state']==1){?>
    						<div class="jindu">
    					 		<div class="jindu-daishenhe"></div>
    						</div>
    						<div class="jindu_text">
    							自评
    						</div>
    					<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gdl']['index']]['gd_state']==2){?>
    						<div class="jindu">
    					 		<div class="jindu-gognshi"></div>
    						</div>
    						<div class="jindu_text">
    							班级公开展示
    						</div>
    					<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gdl']['index']]['gd_state']==3){?>
    						<div class="jindu">
    					 		<div class="jindu-pinggu"></div>
    						</div>
    						<div class="jindu_text">
    							辅导员反馈
    						</div>
    					<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gdl']['index']]['gd_state']==4){?>
    						<div class="jindu">
    					 		<div class="jindu-jiesu"></div>
    						</div>
    						<div class="jindu_text">
    							完成
    						</div>
    					<?php }else{ ?>
    					<?php }?>
    				<?php }else{ ?>
    				<?php }?>
    			</td>
  			</tr>  
  		<?php endfor; endif; ?>
	</table> 
	      <?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/college/index/type/".((string)$_smarty_tpl->tpl_vars['type']->value)),$_smarty_tpl);?>

	</div>	
	<?php }elseif($_smarty_tpl->tpl_vars['type']->value==5){?>
	</br>
	<div id="notice_search" style="margin-left:20px;">
		评估:
		<select name="pinggutonggao" id="pinggutonggao"> 
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['name'] = 'pgtgl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['noticelist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['total']);
?>
		<option value="<?php echo $_smarty_tpl->tpl_vars['noticelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pgtgl']['index']]['asspro_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['select']->value==$_smarty_tpl->tpl_vars['noticelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pgtgl']['index']]['asspro_id']){?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['noticelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pgtgl']['index']]['asspro_title'];?>
</option>
		<?php endfor; endif; ?>
		</select>
	</div>
	</br>
	<div id="xuesheng_search" style="margin-left:20px;">
		年级:
		<select name="xuesheng_nianji" id="xuesheng_nianji"> 
		<option value="0" <?php if ($_smarty_tpl->tpl_vars['grade']->value==0){?>selected="selected"<?php }?>>所有</option>
		<option value="2007" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2007){?>selected="selected"<?php }?>>2007</option>
		<option value="2008" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2008){?>selected="selected"<?php }?>>2008</option>
		<option value="2009" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2009){?>selected="selected"<?php }?>>2009</option>
		<option value="2010" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2010){?>selected="selected"<?php }?>>2010</option>
		<option value="2011" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2011){?>selected="selected"<?php }?>>2011</option>
		<option value="2012" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2012){?>selected="selected"<?php }?>>2012</option>
		<option value="2013" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2013){?>selected="selected"<?php }?>>2013</option>
		<option value="2014" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2014){?>selected="selected"<?php }?>>2014</option>
        <option value="2015" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2013){?>selected="selected"<?php }?>>2015</option>
        <option value="2016" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2014){?>selected="selected"<?php }?>>2016</option>
		</select>
		&nbsp;
		专业：
		<select name="xuesheng_zhuanye" id="xuesheng_zhuanye"> 
		<option value="0" selected="selected">所有</option>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['zyl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['name'] = 'zyl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['majorlist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['total']);
?>
		<option value="<?php echo $_smarty_tpl->tpl_vars['majorlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zyl']['index']]['major_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['major']->value==$_smarty_tpl->tpl_vars['majorlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zyl']['index']]['major_id']){?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['majorlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zyl']['index']]['major_name'];?>
</option>
		<?php endfor; endif; ?>
		</select>
	</div>
	</br>
	<div id="anniu_search" style="margin-left:20px;">
		姓名：<input type="text" id= "xingming_text" style="width:100px; height:20px;" value="" />
		&nbsp;
		<input type="button" id= "shousuo" onclick="chaxun();" style="width:80px; height:25px;" value="查询" />
	</div>
	</br>
	<div id="info" style=" margin-left:10px;">
		<table id="mytable" cellspacing="0" >  
  			<tr>  
    			<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>  
    			<th scope="col" width="80px" >学号</th> 
    			<th scope="col" width="120px" >姓名</th>
    			<th scope="col" width="150px" >公指标</th>
    			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['nl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['nl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['name'] = 'nl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['nenglist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['total']);
?>
    				<th scope="col" width="150px" ><?php echo $_smarty_tpl->tpl_vars['nenglist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nl']['index']];?>
</th>
    			<?php endfor; endif; ?>
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ul'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ul']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['name'] = 'ul';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
  				<tr>
  					<td style="border-left:1px solid #adceff;"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['ul']['index_next'];?>
</td>
  					<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ul']['index']]['fu_username'];?>
</td>
  					<td><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/common/index/fuid/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ul']['index']]['fu_id'];?>
/isnew/<?php echo $_smarty_tpl->tpl_vars['isnew']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ul']['index']]['fu_realname'];?>
</a></td>
  					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['snl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['snl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['name'] = 'snl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ul']['index']]['score']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['total']);
?>
  						<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ul']['index']]['score'][$_smarty_tpl->getVariable('smarty')->value['section']['snl']['index']];?>
</td>
  					<?php endfor; endif; ?>
  				</tr>
  			<?php endfor; else: ?>
  				<th class="spec" colspan="<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
">暂无评估学生！</td>
  			<?php endif; ?>
		</table>
         <?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/college/index/type/".((string)$_smarty_tpl->tpl_vars['type']->value)."/selected/".((string)$_smarty_tpl->tpl_vars['select']->value)."/grade/".((string)$_smarty_tpl->tpl_vars['grade']->value)."/major/".((string)$_smarty_tpl->tpl_vars['major']->value)."/name/".((string)$_smarty_tpl->tpl_vars['name']->value)),$_smarty_tpl);?>

	</div>
	<?php }elseif($_smarty_tpl->tpl_vars['type']->value==6){?>
	</br>
		<div style="margin-left:200px;margin-top:0px;background-color:white;width:400px;height:30px;font-size:20px;">
			2013-2014学年各个学院进度表
		</div>
		</br>
			<div id="info" style=" margin-left:10px;">
		<table id="mytable" cellspacing="0" >  
  			<tr>  
    			<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>  
    			<th scope="col" width="200px" >学院</th> 
    			<th scope="col" width="380px" >进度</th>   
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['name'] = 'cl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total']);
?>
 		 	<tr>  
    			<td style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_id'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_name'];?>
</td>
    			<td>
    			<?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_isstate']==0){?>
    				<div class="jindu">
    				 	<div class="school-jindu-weiqidong"></div>
    				</div>
    				<div class="jindu_text">
    				未启动
    				</div>
    				<div style="clear:both;"></div>
    			<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_isstate']==1){?>
    				<div class="jindu">
    					 <div class="school-jindu-daishenhe"></div>
    				</div>
    				<div class="jindu_text">
    					待审核
    				</div>
    			<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_isstate']==2){?>
    				<div class="jindu">
    					 <div class="school-jindu-gognshi"></div>
    				</div>
    				<div class="jindu_text">
    					公示
    				</div>
    			<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_isstate']==3){?>
    				<div class="jindu">
    					 <div class="school-jindu-xuanjiang"></div>
    				</div>
    				<div class="jindu_text">
    					宣讲
    				</div>
    			<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_isstate']==4){?>
    				<div class="jindu">
    					 <div class="school-jindu-pinggu"></div>
    				</div>
    				<div class="jindu_text">
    					评估
    				</div>
    			<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_isstate']==5){?>
    				<div class="jindu">
    					 <div class="school-jindu-jiesu"></div>
    				</div>
    				<div class="jindu_text">
    					结束
    				</div>
    			<?php }else{ ?>
    			<?php }?>
    			</td>
  		</tr>  
  		<?php endfor; endif; ?>
	</table> 
	<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/college/index/type/".((string)$_smarty_tpl->tpl_vars['type']->value)),$_smarty_tpl);?>
 
	</div>
	<?php }?>
</body>
</html><?php }} ?>