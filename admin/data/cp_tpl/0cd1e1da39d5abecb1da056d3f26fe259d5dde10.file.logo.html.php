<?php /* Smarty version Smarty-3.1.14, created on 2014-11-28 14:27:26
         compiled from "admin\tpl\other\logo.html" */ ?>
<?php /*%%SmartyHeaderCode:312054757dc8b83292-36351448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cd1e1da39d5abecb1da056d3f26fe259d5dde10' => 
    array (
      0 => 'admin\\tpl\\other\\logo.html',
      1 => 1417059054,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312054757dc8b83292-36351448',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54757dc8c4e4c7_50162528',
  'variables' => 
  array (
    'web_url' => 0,
    'result' => 0,
    'detail' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54757dc8c4e4c7_50162528')) {function content_54757dc8c4e4c7_50162528($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/recruit/style.css" />
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<title>logo图片维护</title>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/uploadify.css">
<script type="text/javascript">
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
				},
				'swf'      : '<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/uploadify.swf',
				'uploader' : '<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/system/upload/',
				'queueSizeLimit': 1 , 
				'multi':false,
				'auto':true,
				'fileTypeDesc':"请选择图片文件",
				'fileTypeExts':'*.jpg;*.jpeg;*.png;*.gif;*.bmp',
				'fileSizeLimit': '2048KB', 
				'buttonText':"选择图片", 
				'width' : 100, 
				'height':20, 
				'cancelImg' : '<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/uploadify-cancel.png',
				'onUploadError' : function(file, errorCode, errorMsg, errorString) {
			            alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
			    },
			    'onUploadStart' : function(file) {
			    	$("#picstate").val("1"); 
		        },
		        'onCancel' : function(file) {
		        	$("#picstate").val("0"); 
		        },
			    'onUploadSuccess' : function(file, data, response) {
		            //alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
		            var myObject = eval('(' + data + ')');
		            //alert(myObject.result);
		            //alert(myObject.msg);
		            if(myObject.result == '0'){
			            $("#img").html(myObject.msg);
			            $("#picstate").val("0");//0表示没有图片上传 1表示图片上传中 2表示图片上传成功
		            }else{
		            	$("#hidFileID").attr("value",myObject.result);
			            $("#img").html("<img style=\" max-width:600px; max-height:200px;\" src='"+myObject.msg+"'/>");
			            $("#picstate").val("2");
		            }
		            
			    }
			});
			
			$("#form1").submit( function () {
				if($("#picstate").val()==1){
					alert("文件上传中，请稍后！");
					return false;
				}
				return true;
			});
		});
	</script>
</head>
<body>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  	<TR height=28><TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/title_bg1.jpg">当前位置:logo图片维护</TD></TR>
  	<TR><TD bgColor=#b1ceef height=1></TD></TR>
  	<TR height=20>
    	<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
	</TR>
</TABLE>
<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
	<form id="form1" enctype="multipart/form-data"  target="_self" name="form1" method="post" action="" >
    	<tr>
			<td width="107" height="30"><div align="right"></div></td>
			<td height="40" colspan="2">
				<div align="left"><font id="result" color="#0000FF"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font></div>
			</td>
		</tr>
        <tr>
        	<td height="40"><div align="center">图片：</div></td>
            <td height="40" colspan="2">&nbsp;
               	<div id="img">
					<?php if ($_smarty_tpl->tpl_vars['detail']->value['pic_link']!=''){?>
						<img style=" max-width:600px; max-height:200px;" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload/images/<?php echo $_smarty_tpl->tpl_vars['detail']->value['pic_link'];?>
"/>
					<?php }?>
				</div>
				<input id="file_upload" name="file_upload" type="file" multiple >
				<input type="hidden" name="picid" id="hidFileID" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['pic_id'];?>
" />
				<input type="hidden" name="picstate" id="picstate" value="<?php if ($_smarty_tpl->tpl_vars['detail']->value['pic_id']!=''){?>2<?php }?>" />	
				<font style="color:red;size:20px">如果更换图片，图片大小不能超过2M</font>						
             </td>
         </tr>
		 <tr>
		 	<td height="40"><div align="center"></div></td>
			<td height="40" colspan="2">
				<input name="submit" type="submit" value="保存" style="width:60px;" />				
			</td>
		</tr>
     </form>
</table>
</body>
</html><?php }} ?>