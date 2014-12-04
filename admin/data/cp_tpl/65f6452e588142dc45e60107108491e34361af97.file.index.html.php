<?php /* Smarty version Smarty-3.1.14, created on 2014-11-27 16:53:26
         compiled from "admin\tpl\otherset\index.html" */ ?>
<?php /*%%SmartyHeaderCode:79255476e686eaf505-61558029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65f6452e588142dc45e60107108491e34361af97' => 
    array (
      0 => 'admin\\tpl\\otherset\\index.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79255476e686eaf505-61558029',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'result' => 0,
    'detail' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5476e686f2c524_90852797',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5476e686f2c524_90852797')) {function content_5476e686f2c524_90852797($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/recruit/style.css" />
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<script type="text/javascript">
	function delpswy(){
		$.ajax({
			url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/otherset/delpswy",
			type:"POST",
			async:"false",
			dataType:"json",
			success:function(data){
				if(data.json.state == 1){
					$("#result").html("删除成功");
				}else{
					$("#result").html("删除失败");
				}
			},
			error:function(msg){
				$("#result").html("网络出现问题");
			}
		});
	}
</script>
<title>其他设置</title>
</head>
<body>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  	<TR height=28><TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/title_bg1.jpg">当前位置:其他设置</TD></TR>
  	<TR><TD bgColor=#b1ceef height=1></TD></TR>
  	<TR height=20>
    	<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
	</TR>
</TABLE>
<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
	<form id="form1" target="_self" name="form1" method="post" action="" >
    	<tr>
			<td width="280" height="30"><div align="right"></div></td>
			<td height="40" colspan="2">
				<div align="left"><font id="result" color="#0000FF"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font></div>
			</td>
		</tr>
        <tr>
        	<td height="40"><div align="right">允许学院查看其他学院评估进度</div></td>
            <td height="40" colspan="2">&nbsp;
				 <input type="checkbox" name="isallow" value="1" <?php if ($_smarty_tpl->tpl_vars['detail']->value['ss_view_other_college']==1){?>checked="checked"<?php }?> />
             </td>
         </tr>
          <tr>
        	<td height="40"><div align="right">批量删除评审委员账号</div></td>
            <td height="40" colspan="2">&nbsp;
				 <input id="delPswy" type="button" value="执行" onclick="delpswy();" style="width:60px; height:30px;" />	
             </td>
         </tr>
		 <tr>
		 	<td height="40"><div align="center"></div></td>
			<td height="40" colspan="2">
				<input name="submit" type="submit" value="保存" style="width:60px; height:30px;" />				
			</td>
		</tr>
     </form>
</table>
</body>
</html><?php }} ?>