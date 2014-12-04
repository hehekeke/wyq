<?php /* Smarty version Smarty-3.1.14, created on 2014-11-29 13:58:13
         compiled from "admin\tpl\addactivity\viewactivity1.html" */ ?>
<?php /*%%SmartyHeaderCode:321154796075691d45-05143510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e923245044cd4bc8796eee40b124e3c58c32d7b5' => 
    array (
      0 => 'admin\\tpl\\addactivity\\viewactivity1.html',
      1 => 1417240634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '321154796075691d45-05143510',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'id' => 0,
    'result' => 0,
    'activityInfo' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547960757a7303_98650604',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547960757a7303_98650604')) {function content_547960757a7303_98650604($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/xheditor-1.2.1/xheditor-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/xheditor-1.2.1/xheditor_lang/zh-cn.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/uploadify.css">
<title>活动维护</title>
<script type="text/javascript">
	$(function() {
		$("input").attr('disabled',true);
		$("#content").attr('disabled','disabled');
		$('#file_upload').uploadify({
			'formData'     : {
			},
			'swf'      : '<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/uploadify.swf',
			'uploader' : '<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/school/upload/filetype/file',
			'queueSizeLimit': 1 , 
			'multi':false,
			'auto':true,
			'fileTypeDesc':"请选择文件", 
			'fileTypeExts':'*.txt;*.pdf;*.doc;*.docx;*.xls;*.xslx;*.rar;*.zip;*.ppt;*.pptx',
			'fileSizeLimit': '5120KB', 
			'buttonText':"选择文件",
			'width' : 100, 
			'height':20, 
			'cancelImg' : '<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/uploadify-cancel.png',
			'onUploadError' : function(file, errorCode, errorMsg, errorString) {
		            alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
		    },
		    'onUploadStart' : function(file) {
		    	$("#filestate").val("1"); 
	        },
	        'onCancel' : function(file) {
	        	$("#filestate").val("0"); 
	        },
		    'onUploadSuccess' : function(file, data, response) {
	           // alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
	          	//alert(data);//size
	            var myObject = eval('(' + data + ')');
	           // alert(myObject.result);
	           //alert(myObject.msg);
	            if(myObject.result == '0'){
	            	$("#file").html("上传失败！");
		            $("#filestate").val("0");//0表示没有图片上传 1表示图片上传中 2表示图片上传成功
	            }else{
	            	$("#hidFileID").attr("value",myObject.result);
	            	//$("#fsize").val(myObject.size);
	            	//$("#filetitle").val(myObject.name);
	            	var str = "<a id= \"link"+myObject.result+"\" href='"+myObject.msg+"'><font size='2px' color='#080719'>"+myObject.name+"</font></a>";
	            	str += "<a id=\"del"+myObject.result+"\"  href=\"#\" onClick=\"delfile("+myObject.result+");\" return false;><font size='2px' color='#D6504B'>[删除]</font></a>";
	            	$("#file").html(str);
		            $("#filestate").val("2");
	            }
	            
		    }
		});
		
		var editor = $('#content').xheditor({
			upLinkUrl:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload.php",
			upLinkExt:"zip,rar,txt",
			upImgUrl:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload.php",
			upImgExt:"jpg,jpeg,gif,png",
			upFlashUrl:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload.php",
			upFlashExt:"swf",
			upMediaUrl:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload.php",
			upMediaExt:"avi",
			remoteImgSaveUrl:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload.php",
			cleanPaste:2,
			internalScript:false,
			inlineScript:false,
			internalStyle:false,
			inlineStyle:false
		});
		
		
		$("#start").focus(function(){
			WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});
		});
		
		$("#end").focus(function(){
			WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});
		});		
	});
	
	function delfile(id){
		if(!confirm("确定要删除？")){
			return false;
		}
		$.ajax({
			url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/school/delfile/fileid/"+id,
			type:"post",
			async: false,
			dataType:"json",
			success:function(data){
				if (data.json.state == 1){
					$("#link"+id).remove();
					$("#del"+id).remove();
					$("#hidFileID").val("");
					$("#filestate").val("0");
					alert("删除成功");
				}else{
					alert("删除失败");
				}
			},
			error:function(msg){
				alert("网络出现问题，请稍后再试");
			//$("#news-all-container").html("");
			}
		});
	}
</script>
</head>
<body>
	<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
		<TR height=28><TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/title_bg1.jpg">当前位置:查看活动</TD></TR>
	<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
		</TR>
	</TABLE>
	<table width="800px" border="0"  cellpadding="0" cellspacing="0">
		<form id="form1"   target="_self" name="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/editActivity">
			<input type="hidden" name="activity_id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
			<tr>
				<td width="130" height="40px"><div align="right"></div></td>
				<td height="40" colspan="2">
					<div align="left"><font id="result" color="#0000FF"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font></div>
				</td>
			</tr>
			
			<tr>
   				<td height="40"><div align="right">活动名称</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_title" type="text" name="activity_title" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_title'];?>
" />
					&nbsp;&nbsp; &nbsp;&nbsp;<font color="red"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
<font>
				</td>
			</tr>
       		<tr>
				<td height="130"><div align="right">活动内容</div></td>
				<td height="130" colspan="2">&nbsp;
						<textarea rows="12" cols="15" style="width:600px" disabled="disabled"><?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_content'];?>
</textarea>
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">活动主题</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_theme" type="text" name="activity_theme" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_theme'];?>
"/>
				</td>
			</tr>
			 <tr>
        		<td height="40"><div align="right">活动时间:</div></td>
            	<td height="40" colspan="2">&nbsp;
             		<input id="start" name="activity_start_time" class="Wdate" type="text" style="width:200px; height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_start_time'];?>
"/>至<input id="end" name="activity_end_time" class="Wdate" type="text" style="width:200px; height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_end_time'];?>
"/>
           	 	</td>
       	   </tr>
		   <tr>
   				<td height="40"><div align="right">活动地点</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_address" type="text" name="activity_address" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_address'];?>
"/>
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">规模</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_scale" type="text" name="activity_scale" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_scale'];?>
" />人
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">专业性级别</div></td>
       	 		<td height="40" colspan="2">&nbsp;
					
						<?php if ($_smarty_tpl->tpl_vars['activityInfo']->value['activity_level']==0){?>0<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['activityInfo']->value['activity_level']==1){?>1<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['activityInfo']->value['activity_level']==2){?>2<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['activityInfo']->value['activity_level']==3){?>3<?php }?>
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">关键词</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_keywords" type="text" name="activity_keywords" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_keywords'];?>
"/>
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">负责人</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="activity_duty_preson" type="text" name="activity_duty_preson" style="width:340px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_duty_preson'];?>
"/>
				</td>
			</tr>
    		
    	</form>
	</table>
</body>
</html><?php }} ?>