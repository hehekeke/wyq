<?php /* Smarty version Smarty-3.1.14, created on 2014-10-28 09:49:21
         compiled from "admin\tpl\college\assdetail.html" */ ?>
<?php /*%%SmartyHeaderCode:7879544ef6217da4e2-84078644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49dbf9579fdba8eabbd1982e755bc44d12b4a3e5' => 
    array (
      0 => 'admin\\tpl\\college\\assdetail.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7879544ef6217da4e2-84078644',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'info' => 0,
    'zbdj' => 0,
    'file_result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544ef62190ad79_87921034',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ef62190ad79_87921034')) {function content_544ef62190ad79_87921034($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<title>学院评估工作-评估细则详情</title>
<style type="text/css"> 
.title-container{margin-left:10px;  height:27px; width:500px;}
.title-input{margin:0px 20px 0px 0px; width:450px; height:25px;}
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
.meau-container{ padding:5px 0px; margin:5px 10px;width:600px;height:40px;}
.pinggu-meau{ font-size:12px; color:#000; text-align:left; width:600px; height:40px;min-height:20px;  float:left;}
.pinggu-meau-btn{cursor:pointer;font-size:11px;line-height:30px; background:#DBEAF9; margin:0px 10px 0px 10px;  border:1px solid #CCC; text-align:center; width:108px;height:30px;float:left;}
.pinggu-meau-btn:hover{background:#FCF1CA;}
</style>
</head>
<body>
	<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  		<TR height=28><TD background=images/title_bg1.jpg>当前位置:学院评估工作-评估细则详情</TD></TR>
  		<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
		</TR>
	</TABLE>
	<div id="title-container" class = "title-container" >
		<div class="title">
		标题：<input type="text" id="title" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['asspro_title'];?>
" style="width:400px;height:20px;"/>
		</div>
		<div style="clear:both;" ></div>
	</div>
	<div id="leixing-container" class = "title-container" >
		<div class="title">
		类型：<?php if ($_smarty_tpl->tpl_vars['info']->value['asspro_isnew']==0){?>
				学年末
			<?php }elseif($_smarty_tpl->tpl_vars['info']->value['asspro_isnew']==1){?>
				新生入学后
			<?php }?>
		</div>
		<div style="clear:both;" ></div>
	</div>
	<div id="info" style=" margin:10px 0px 10px 10px;">
		<table id="mytable" cellspacing="0" >  
  			<tr>  
    		    <th scope="col" width="80px" style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->tpl_vars['zbdj']->value[0]['zbdj_name'];?>
</th>
    			<th scope="col" width="150px" ><?php echo $_smarty_tpl->tpl_vars['zbdj']->value[1]['zbdj_name'];?>
</th> 
    			<th scope="col" width="200px" ><?php echo $_smarty_tpl->tpl_vars['zbdj']->value[2]['zbdj_name'];?>
</th>   
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['gl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['gl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['name'] = 'gl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['info']->value['gong']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['total']);
?>
 		 	<tr class = "gong">  
    			<td style="border-left:1px solid #adceff;" >公</td>
    			<td class="gong-second"><?php echo $_smarty_tpl->tpl_vars['info']->value['gong'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['second'];?>
</td>
    			<td class="gong-third"><?php echo $_smarty_tpl->tpl_vars['info']->value['gong'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['third'];?>
</td>
  			</tr>
  			<?php endfor; endif; ?>
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['nl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['nl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['name'] = 'nl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['info']->value['neng']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
 		 	<tr class = "neng">  
    			<td style="border-left:1px solid #adceff;" >能</td>
    			<td class="neng-second"><?php echo $_smarty_tpl->tpl_vars['info']->value['neng'][$_smarty_tpl->getVariable('smarty')->value['section']['nl']['index']]['second'];?>
</td>
    			<td class="neng-third"><?php echo $_smarty_tpl->tpl_vars['info']->value['neng'][$_smarty_tpl->getVariable('smarty')->value['section']['nl']['index']]['third'];?>
</td>
  			</tr>
  			<?php endfor; endif; ?>
		</table>
        <div style="margin-top: 10px">
            <p>评估细则:</p><br>
            <?php if (isset($_smarty_tpl->tpl_vars['file_result']->value)){?>
            <ul style="margin-top: 0">
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['files'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['files']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['name'] = 'files';
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['file_result']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['files']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['files']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['files']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['files']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['files']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['files']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['total']);
?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['file_result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['files']['index']]['file_link'];?>
"><li style="color: red"><?php echo $_smarty_tpl->tpl_vars['file_result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['files']['index']]['file_name'];?>
</li></a>
                <?php endfor; endif; ?>
            </ul>
            <?php }else{ ?>
               无评估细则
            <?php }?>
        </div>
	</div>
</body>
</html><?php }} ?>