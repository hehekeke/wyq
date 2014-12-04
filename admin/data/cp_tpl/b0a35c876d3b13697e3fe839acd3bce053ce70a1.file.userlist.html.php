<?php /* Smarty version Smarty-3.1.14, created on 2014-10-28 09:28:52
         compiled from "admin\tpl\system\userlist.html" */ ?>
<?php /*%%SmartyHeaderCode:21576544ef154c48e68-46037643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0a35c876d3b13697e3fe839acd3bce053ce70a1' => 
    array (
      0 => 'admin\\tpl\\system\\userlist.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21576544ef154c48e68-46037643',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'result' => 0,
    'userlist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544ef154d72bd3_00218753',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ef154d72bd3_00218753')) {function content_544ef154d72bd3_00218753($_smarty_tpl) {?><?php if (!is_callable('smarty_function_page')) include 'E:\\wamp\\www\\nkgn\\been/View/plugins\\function.page.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
</head>
<script type="text/javascript">
    $(function() {
        $("#form1").submit( function () {
            $("#result").val("");
            if($("#username").val() == ""){
                $("#username").focus();
                $("#result").text("用户名不能为空！");
                return false;
            }

            return true;
        } );
    });
</script>
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
<body>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  	<TR height=28><TD background=images/title_bg1.jpg>当前位置:用户列表</TD></TR>
  	<TR><TD bgColor=#b1ceef height=1></TD></TR>
  	<TR height=20>
    	<TD background=images/shadow_bg.jpg></TD>
	</TR>
</TABLE>
<div style="color: #036;margin-bottom: 20px;margin-left: 30px" >
    <form action="" id="form1" name="form1" method="post">
        <span style="margin-right: 10px">用户名:</span>
        <input type="text"  name="username" id="username" value=""/>
        <a style="margin-left: 10px" style="cursor: pointer" onclick="document.getElementById('form1').submit()">查询</a>
        <!--document.getElementById('form1').submit()-->
    </form>
</div>
<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
	<a href ="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/system/adduser" >添加用户</a>
</div>

<div id="info" style=" margin-left:10px;">
<font color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font>
<table id="mytable" cellspacing="0" >  
  <tr>  
    
    <th scope="col" width="50px" style="border-left:1px solid #adceff;" >用户id</th>  
    <th scope="col" width="150px" >用户名</th> 
    <th scope="col" width="150px" >真实姓名</th> 
     <th scope="col" width="150px" >角色</th> 
 	<th scope="col"  width="200px" >注册时间</th>
    <th scope="col" width="250px" >操作</th>
  </tr>  
  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sn'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sn']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['name'] = 'sn';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['userlist']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sn']['total']);
?>
  <tr >  
    <td style="border-left:1px solid #adceff;"><?php echo $_smarty_tpl->tpl_vars['userlist']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['admin_id'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['userlist']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['admin_name'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['userlist']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['admin_realname'];?>
</td>
    <td>
    	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['rl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['name'] = 'rl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['userlist']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['role']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['rl']['total']);
?>
   	 		<?php echo $_smarty_tpl->tpl_vars['userlist']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['role'][$_smarty_tpl->getVariable('smarty')->value['section']['rl']['index']]['role_name'];?>

   	 	<?php endfor; endif; ?>
   	</td>
    <td><?php echo $_smarty_tpl->tpl_vars['userlist']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['admin_create_time'];?>
</td>
	<td>
		<?php if ($_smarty_tpl->tpl_vars['userlist']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['admin_id']==1){?>
		不能对此用户进行操作
		<?php }else{ ?>
		&nbsp;&nbsp;
		[<a onClick="if (confirm('确认要删除管理员：<?php echo $_smarty_tpl->tpl_vars['userlist']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['admin_name'];?>
？')) return true; else return false;" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/system/userlist/do/del/id/<?php echo $_smarty_tpl->tpl_vars['userlist']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['admin_id'];?>
">删除</a>]
		&nbsp;&nbsp;
		[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/system/modifyuser/id/<?php echo $_smarty_tpl->tpl_vars['userlist']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sn']['index']]['admin_id'];?>
">修改</a>]
		<?php }?>
	</td>
  </tr>  
  <?php endfor; else: ?>
  <tr >
    <th class="spec" colspan="5">暂无用户！</td>
  </tr>
  <?php endif; ?>
</table>  
<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['userlist']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/system/userlist"),$_smarty_tpl);?>

</div>


</body>
</html>
<?php }} ?>