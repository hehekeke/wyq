<?php /* Smarty version Smarty-3.1.14, created on 2014-11-29 12:02:36
         compiled from "admin\tpl\publishactivity\publishactivitylist.html" */ ?>
<?php /*%%SmartyHeaderCode:3775455eae9ac5893-98569011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4962b5cbabbef88e12376b345ee13aaa9d0049e7' => 
    array (
      0 => 'admin\\tpl\\publishactivity\\publishactivitylist.html',
      1 => 1417233752,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3775455eae9ac5893-98569011',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5455eae9cbc8d0_95014225',
  'variables' => 
  array (
    'web_url' => 0,
    'msg' => 0,
    'list' => 0,
    'listInfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5455eae9cbc8d0_95014225')) {function content_5455eae9cbc8d0_95014225($_smarty_tpl) {?><?php if (!is_callable('smarty_function_page')) include 'C:\\Myphp\\apache\\htdocs\\nkgn\\been/View/plugins\\function.page.php';
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<title>辅学活动发布</title>
<script type="text/javascript">
</script>
</head>
<body>
<style type="text/css">
 .myth{height:10px;border-right: 1px solid #adceff;  
 border-bottom: 1px solid #adceff;  
 border-top: 1px solid #adceff;
  letter-spacing: 2px;  
 text-transform: uppercase;  
 text-align: left;  
 padding: 6px 6px 6px 12px;  
 } 
.mytd{  
 border-right: 1px solid #adceff;  
 border-bottom: 1px solid #adceff;  
 background: #fff;  
 font-size:11px;  
 padding: 6px 6px 6px 12px;  
 
}  
</style> 
<script>
function manageall(){
	if($("input[id='isnotcheck[]']").length==0){
		alert('您没有要发布的年活动');
		return false;
	}
	var returnArr=new Array();
	//置
	var notcheck=$("input[id='isnotcheck[]']");
	for(var i=0;i<notcheck.length;i++){
		returnArr[i]=notcheck[i].value;
	}
	$.post('<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/PublishActivity/publishYear',{"listArr":returnArr},function(data){
		if(data==1){
			alert('操作成功');
			location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/PublishActivity/ActivityList";
		}else{
			alert('操作失败');
			location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/PublishActivity/ActivityList";
		}
	});
	
}

function submitall(){
	if($("input[id='tijiaoall[]']").length=='0'){
		alert('您没有可以发布的周活动');
		return false;
	}
	var tijiaoreturnArr=new Array();
	var tijiao=$("input[id='tijiaoall[]']");
	for(var i=0;i<tijiao.length;i++){
	    
		tijiaoreturnArr[i]=tijiao[i].value;
	}
	
	$.post('<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/PublishActivity/publishWeek',{"listArr":tijiaoreturnArr},function(data){
		if(data==1){
			alert('发布成功');
			location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/PublishActivity/ActivityList";
		}else{
			alert('操作失败');
			location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/PublishActivity/ActivityList";
		}
	});
}

</script>
<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
	
</div>
<form action="" method="post">
<div id="search_activity" style="margin-left:20px;">
		&nbsp;
		活动类型:
		<select name="source" id="source"> 
		<option value="-1" >全部</option>
		<option value="0" >学年活动</option>
		<option value="1" >周活动</option>
		</select>
		&nbsp;
		&nbsp;
		审核状态:
		<select name="publshStatus" id="publshStatus"> 
		<option value="-1">全部</option>
		<option value="0">未发布</option>
		<option value="1">已发布</option>
		</select>
		<input id ="search_button" type="submit" value="查询" />
</div>
</form>
</br>

<div id="info" style=" margin-left:10px;">
	<font color="#CC0000"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</font>
	<table cellspacing="0" >  
  		<tr>  
    		<th class="myth" width="60px;">id</th>
    		<th class="myth" width="430px;">活动名称</th>   
    		<th class="myth" width="60px;">类型</th>
			<th class="myth" width="180px;">发布状态</th>
    		<th class="myth" width="120;">数据来源</th>
    		<th class="myth" width="250px;">操作</th>
  		</tr> 
		<?php  $_smarty_tpl->tpl_vars['listInfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['listInfo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['listInfo']->key => $_smarty_tpl->tpl_vars['listInfo']->value){
$_smarty_tpl->tpl_vars['listInfo']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['listInfo']->value!=false){?>
		<tr>  
    		<td class="mytd" width="46px;"><?php if ($_smarty_tpl->tpl_vars['listInfo']->value['activity_if_import']==1){?><font color="red">【重点】</font><?php }else{ ?>【<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
】<?php }?></td>  
    		<td class="mytd" width="430px;"><?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_title'];?>
</td>   
    		<td class="mytd" width="120px;"><?php echo $_smarty_tpl->tpl_vars['listInfo']->value['at_name'];?>
</td>
			<?php if ($_smarty_tpl->tpl_vars['listInfo']->value['activity_ispublish']==0){?>
				<td  class="mytd" width="120;">未发布</td>
				<?php if ($_smarty_tpl->tpl_vars['listInfo']->value['activity_class']==0){?>
				<td class="mytd" width="120px;">年活动</td>
				<td  class="mytd"  width="250px;">				
					<input type="hidden" id="isnotcheck[]"  value="<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
" />
					[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/PublishActivity/editPer/id/<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
" >修改</a>]		
				</td>		
				<?php }else{ ?>
				<td class="mytd" width="120px;">周活动</td>
				<td  class="mytd"  width="250px;">				
					<input type="hidden" id="tijiaoall[]"  value="<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
" />
					[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/PublishActivity/editPer/id/<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
" >修改</a>]
					<?php if ($_smarty_tpl->tpl_vars['listInfo']->value['activity_if_import']==0){?>
					[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/PublishActivity/managePer/id/<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
/flag/import" >重点推荐</a>]		
					<?php }else{ ?>
					[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/PublishActivity/managePer/id/<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
/flag/noimport" ><font color="gray">取消推荐</font></a>]	
					<?php }?>
				</td>
				<?php }?>				
			<?php }elseif($_smarty_tpl->tpl_vars['listInfo']->value['activity_ispublish']==1){?>
				<td  class="mytd" width="120;"><font color="gray">已发布</font></td>
				<?php if ($_smarty_tpl->tpl_vars['listInfo']->value['activity_class']==0){?>				
				<td  class="mytd"  width="120px;">年活动</td>
				<td  class="mytd"  width="250px;">
				[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/PublishActivity/editPer/id/<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
" >修改</a>]
				<?php }elseif($_smarty_tpl->tpl_vars['listInfo']->value['activity_class']==1){?>
				<td  class="mytd"  width="120px;">周活动</td>
				<td  class="mytd"  width="250px;">
				[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/PublishActivity/editPer/id/<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
" >修改</a>]		
				<?php if ($_smarty_tpl->tpl_vars['listInfo']->value['activity_if_import']==0){?>
					[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/PublishActivity/managePer/id/<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
/flag/import" >重点推荐</a>]		
					<?php }else{ ?>
					[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/PublishActivity/managePer/id/<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
/flag/noimport" ><font color="gray">取消推荐</font></a>]	
					<?php }?>
				[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/PublishActivity/removeActivity/id/<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
" >撤销</a>]
				<?php }?>				
				</td>
			<?php }?>   		
  		</tr>
		<?php }else{ ?>
		 <b>暂无需要发布活动</b></br>
		<?php }?>
		<?php } ?>
	</table>
	
	<input type="button" onclick="manageall()" value="发布年活动"> 
	<input type="button" onclick="submitall()" value="发布周活动"> 
	<span id="msg2"></span>
	
</div>
<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/publishAcivity/ActivityList"),$_smarty_tpl);?>

<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
</div>
</br>

</body>
</html><?php }} ?>