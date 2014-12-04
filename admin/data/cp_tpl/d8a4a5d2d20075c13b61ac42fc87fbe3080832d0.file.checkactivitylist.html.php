<?php /* Smarty version Smarty-3.1.14, created on 2014-12-04 11:55:38
         compiled from "admin\tpl\checkactivity\checkactivitylist.html" */ ?>
<?php /*%%SmartyHeaderCode:25331544ded28ba6450-98436058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8a4a5d2d20075c13b61ac42fc87fbe3080832d0' => 
    array (
      0 => 'admin\\tpl\\checkactivity\\checkactivitylist.html',
      1 => 1417665322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25331544ded28ba6450-98436058',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544ded28d586d7_67601103',
  'variables' => 
  array (
    'web_url' => 0,
    'donotTijiao' => 0,
    'activityOrg' => 0,
    'msg' => 0,
    'listInfoArr' => 0,
    'listInfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ded28d586d7_67601103')) {function content_544ded28d586d7_67601103($_smarty_tpl) {?><?php if (!is_callable('smarty_function_page')) include 'C:\\Myphp\\apache\\htdocs\\nkgn\\been/View/plugins\\function.page.php';
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
<title>活动审批</title>
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
function manageall(flagvalue){
	if($("input[id='isnotcheck[]']").length==0){
		alert('您没有未审批的活动');
		return false;
	}
	var returnArr=new Array();
	//置
	var notcheck=$("input[id='isnotcheck[]']");
	for(var i=0;i<notcheck.length;i++){
		//alert(notcheck[i].value);
		returnArr[i]=notcheck[i].value;
	}

	$.post('<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/CheckActivity/manageAll',{"listArr":returnArr,"flag":flagvalue,"do":"check"},function(data){
		if(data==1){
			alert('操作成功');
			location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/CheckActivity/ActivityList";
		}else{
			alert('操作失败');
			location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/CheckActivity/ActivityList";
		}
	});
	
}

function submitall(){
    var donotTijiao = '<?php echo $_smarty_tpl->tpl_vars['donotTijiao']->value;?>
';

	if($("input[id='tijiaoall[]']").length=='0'){
		alert('您没有可以提交的活动');
		return false;
	}
    /*
    if(donotTijiao==1){
        alert("全部审核才可以提交！！");
        return false;
    }
    */
	var tijiaoreturnArr=new Array();
	var tijiao=$("input[id='tijiaoall[]']");
	for(var i=0;i<tijiao.length;i++){
		tijiaoreturnArr[i]=tijiao[i].value;
		//alert(tijiao[i].title);
	}
   $.post('<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/CheckActivity/manageAll',{"listArr":tijiaoreturnArr,"do":"tijiao"},function(data){
		if(data==1){
			alert('提交成功,请等待活动发布');
			location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/CheckActivity/ActivityList";
		}else{
			alert('操作失败');
			location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/CheckActivity/ActivityList";
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
		<select name="checkstatus" id="checkstatus"> 
		<option value="-1">全部</option>
		<option value="0">未审核</option>
		<option value="2">未通过</option>
		<option value="1">已通过</option>
		</select>
        &nbsp;
        &nbsp;
        活动来源:
        <select name="organizers" id="organizers">
            <option value="-1">全部</option>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['og'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['og']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['name'] = 'og';
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['activityOrg']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['og']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['og']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['og']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['og']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['og']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['og']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['og']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['og']['total']);
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['activityOrg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['og']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['activityOrg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['og']['index']]['organize_name'];?>
</option>
            <?php endfor; endif; ?>
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
    		<th class="myth" width="20px;">id</th>  
    		<th class="myth" width="430px;">活动名称</th>   
    		<th class="myth" width="60px;">类型</th>
			<th class="myth" width="180px;">提交时间</th>
    		<th class="myth" width="120;">审批状态</th>
    		<th class="myth" width="250px;">操作</th>
  		</tr> 
		<?php  $_smarty_tpl->tpl_vars['listInfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['listInfo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listInfoArr']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['listInfo']->key => $_smarty_tpl->tpl_vars['listInfo']->value){
$_smarty_tpl->tpl_vars['listInfo']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['listInfo']->value!=false){?>
		<tr>  
    		<td class="mytd" width="20px;"><input type="hidden" id="tijiaoall[]" value="<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
" /><?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
</td>  
    		<td class="mytd" width="430px;"><?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_title'];?>
</td>   
    		<td class="mytd" width="120px;"><?php echo $_smarty_tpl->tpl_vars['listInfo']->value['at_name'];?>
</td>
			<td class="mytd" width="120px;"><?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_create_time'];?>
</td>
			<?php if ($_smarty_tpl->tpl_vars['listInfo']->value['activity_approval']==0||$_smarty_tpl->tpl_vars['listInfo']->value['activity_approval']==4){?>
				<td  class="mytd" width="120;">未审批</td>
				<td  class="mytd"  width="250px;">				
				<input type="hidden" id="isnotcheck[]"  value="<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
" />
				[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/CheckActivity/checkPer/id/<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
" >审批</a>]		
				</td>
			<?php }elseif($_smarty_tpl->tpl_vars['listInfo']->value['activity_approval']==1){?>
				<td  class="mytd" width="120;"><font color="gray">审批通过</font></td>
				<td  class="mytd"  width="250px;">
				[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/CheckActivity/checkPer/id/<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
" >重新审批</a>]
				<?php if ($_smarty_tpl->tpl_vars['listInfo']->value['activity_if_import']==0&&$_smarty_tpl->tpl_vars['listInfo']->value['activity_class']==1){?>
				[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/CheckActivity/managePer/id/<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
/flag/import/resflag/1" >重点推荐</a>]
				<?php }elseif($_smarty_tpl->tpl_vars['listInfo']->value['activity_if_import']==1&&$_smarty_tpl->tpl_vars['listInfo']->value['activity_class']==1){?>
				[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/CheckActivity/managePer/id/<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
/flag/import/resflag/0" ><font color="gray">取消推荐</font></a>]
				<?php }?>				
				</td>
			<?php }elseif($_smarty_tpl->tpl_vars['listInfo']->value['activity_approval']==2){?>
				<td  class="mytd" width="120;"><font color="red">审批未通过</font></td>
				<td  class="mytd"  width="250px;">				
				[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/CheckActivity/checkPer/id/<?php echo $_smarty_tpl->tpl_vars['listInfo']->value['activity_id'];?>
" >重新审批</a>]
				</td>
			<?php }?>
    		
  		</tr>
		<?php }else{ ?>
		 <b>暂无需要审批活动</b></br>
		<?php }?>
		<?php } ?>
	</table>
	
	<input type="button" onclick="manageall(1)" value="全部通过"> 
	<input type="button" onclick="manageall(2)" value="全部不通过"> 
	<input type="button" onclick="submitall()" value="提交当前页活动"> 
	<span id="msg2"></span>
	<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['listInfoArr']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/checkActivity/ActivityList"),$_smarty_tpl);?>

</div>
<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
</div>
</br>

</body>
</html><?php }} ?>