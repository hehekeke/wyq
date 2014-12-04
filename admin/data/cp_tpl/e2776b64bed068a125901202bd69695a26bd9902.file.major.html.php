<?php /* Smarty version Smarty-3.1.14, created on 2014-11-27 11:27:37
         compiled from "admin\tpl\basedata\major.html" */ ?>
<?php /*%%SmartyHeaderCode:1705154769a29d6f3f1-81359264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2776b64bed068a125901202bd69695a26bd9902' => 
    array (
      0 => 'admin\\tpl\\basedata\\major.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1705154769a29d6f3f1-81359264',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54769a29e461a6_41794277',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54769a29e461a6_41794277')) {function content_54769a29e461a6_41794277($_smarty_tpl) {?><?php if (!is_callable('smarty_function_page')) include 'C:\\Myphp\\apache\\htdocs\\nkgn\\been/View/plugins\\function.page.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<style type="text/css">/* CSS Document */   
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
	function del(id){
		if(!confirm("确定要删除？")){
			return false;
		}
		//alert($("#college-"+id));
		$.ajax({
			url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/basedata/delmajor/id/"+id,
			type:'POST',
			async:false,
			dataType:"json",
			success:function(data){
				if (data.json.state == 1){
					$("#major-"+id).remove();
					alert("删除成功！");
				}else{
					alert("删除失败！");
				}
			},
			error:function(msg){
				alert("网络出现问题，请检查网络！");
			}
		});
	}
</script> 
<title>专业管理</title>
</head>
<body>
	<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  		<TR height=28><TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/title_bg1.jpg">当前位置:学院管理</TD></TR>
  		<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
		</TR>
	</TABLE>
	<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
		<a href ="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/basedata/addmajor" >添加专业</a>
	</div>
	<div id="info" style=" margin-top:20px; margin-left:10px;">
		<?php if (isset($_smarty_tpl->tpl_vars['list']->value)){?>
		<table id="mytable" cellspacing="0" >  
		  <tr>  
		    <th scope="col" width="50px" style="border-left:1px solid #adceff;" >编号</th>  
		    <th scope="col" width="300px" >学院名称</th>
		    <th scope="col" width="300px" >专业名称</th>
		    <th scope="col" width="100px" >操作</th>   
		  </tr>  
		  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ll'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ll']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['name'] = 'll';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		  <tr id="major-<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['major_id'];?>
">  
		    <td style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['major_id'];?>
</td>
		    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['college_name'];?>
</td>
		    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['major_name'];?>
</td>
		    <td>
		    	<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/basedata/editmajor/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['major_id'];?>
">修改</a>&nbsp;
		    	<a href="#" onclick="del(<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['major_id'];?>
)" return false;>删除</a>
		    </td>
		  </tr>  
		  <?php endfor; else: ?>
		  <tr >
		    <th class="spec" colspan="4">暂无记录</td>
		  </tr>
		  <?php endif; ?>
		</table>  
		<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/basedata/getmajorlist"),$_smarty_tpl);?>

		<?php }?>
</div>
</body>
</html><?php }} ?>