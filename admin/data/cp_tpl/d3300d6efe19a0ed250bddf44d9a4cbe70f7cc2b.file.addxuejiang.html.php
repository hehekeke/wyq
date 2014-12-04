<?php /* Smarty version Smarty-3.1.14, created on 2014-10-28 09:39:23
         compiled from "admin\tpl\college\addxuejiang.html" */ ?>
<?php /*%%SmartyHeaderCode:30503544ef3cb5a4989-40457138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3300d6efe19a0ed250bddf44d9a4cbe70f7cc2b' => 
    array (
      0 => 'admin\\tpl\\college\\addxuejiang.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30503544ef3cb5a4989-40457138',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'mm' => 0,
    'last' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544ef3cb69de82_13041729',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ef3cb69de82_13041729')) {function content_544ef3cb69de82_13041729($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
/common/libs/upload/jquery.uploadify.min.js?ver=<?php echo $_smarty_tpl->tpl_vars['mm']->value;?>
"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/uploadify.css">
<title>学院评估工作-发布宣讲方案和通知</title>
<script type="text/javascript">
	$(function() {
		$('#file_upload').uploadify({
			'formData'     : {
			},
			'swf'      : '<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/uploadify.swf',
			'uploader' : '<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/college/upload/filetype/file',
			'queueSizeLimit': 1 , 
			'multi':false,
			'auto':true,
			'fileTypeDesc':"请选择文件", 
			'fileTypeExts':'*.txt;*.pdf;*.doc;*.docx;*.xls;*.xslx;*.rar;*.zip;*.ppt;*.pptx',
			'fileSizeLimit': '204800KB', 
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
		
		$("#form1").submit( function () {
			$('#content').val(editor.getSource());//加上这句防止提交数据为空
			$("#result").val("");
			var last_begin = new Date("<?php echo $_smarty_tpl->tpl_vars['last']->value['article_begin_time'];?>
").getTime();
			var last_end = new Date("<?php echo $_smarty_tpl->tpl_vars['last']->value['article_end_time'];?>
").getTime();
			var start = new Date($("#start").val()).getTime();
			//alert(start);
			if($("#start").val() == ""){
				$("#start").focus();
				$("#result").text("开始时间不能为空！");
				return false;
			}
			if (start < last_begin ||　start > last_end){
				$("#start").focus();
				$("#result").text("要在学校评估时间内！");
				return false;
			}
			var end = new Date($("#end").val()).getTime();
			if($("#end").val() == ""){
				$("#end").focus();
				$("#result").text("结束时间不能为空！");
				return false;
			}
			if (end < last_begin ||　end > last_end){
				$("#end").focus();
				$("#result").text("要在学校评估时间内！");
				return false;
			}
			if($("#isnew").val() == ""){
				$("#isnew").focus();
				$("#result").text("类型不能为空！");
				return false;
			}
			if($("#title").val() == ""){
				$("#title").focus();
				$("#result").text("标题不能为空！");
				return false;
			}
			if($("#content").val() == ""){
				$("#content").focus();
				$("#result").text("内容不能为空！");
				return false;
			}
			return true;
		});		
	});
	
	function delfile(id){
		if(!confirm("确定要删除？")){
			return false;
		}
		$.ajax({
			url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/college/delfile/fileid/"+id,
			type:"post",
			async: false,
			dataType:"json",
			success:function(data){
				if (data.json.state == 1){
					$("#link"+id).remove();
					$("#del"+id).remove();
					$("#hidFileID").val("");
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
/common/admin/images/title_bg1.jpg">当前位置:学院评估工作-发布宣讲方案和通知</TD></TR>
  		<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
		</TR>
	</TABLE>
	<table width="800px" border="0"  cellpadding="0" cellspacing="0">
		<form id="form1"   target="_self" name="form1" method="post" action="">
			<tr>
				<td width="190" height="40px"><div align="right"></div></td>
				<td height="40" colspan="2">
					<div align="left"><font id="result" color="#0000FF"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font></div>
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">本学院评估时间段</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="start" name="start" class="Wdate" type="text"  style="width:200px; height:20px;" />至<input id="end" name="end" class="Wdate" type="text" style="width:200px; height:20px;" />
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">类型</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<select id = "isnew" name = "isnew">
       	 				<option value="">请选择</option>
       	 				<option value="0">学年末</option>
       	 				<option value="1">新生入学</option>
       	 			</select>
				</td>
			</tr>
			<tr>
   				<td height="40"><div align="right">标题</div></td>
       	 		<td height="40" colspan="2">&nbsp;
       	 			<input id="title" type="text" name="title" style="width:340px;height:20px;" />
				</td>
			</tr>
			<tr>
         	<td height="40"><div align="right">附件:</div></td>
            <td height="40" colspan="2">&nbsp;
				<div id="file"></div>
				<input id="file_upload" name="file_upload" type="file" multiple >
				<input type="hidden" name="fileid" id="hidFileID" value="" />
				<input type="hidden" name="filestate" id="filestate" value="0" />
    			<font size="2px" color="#70A4DA">文件大小不能超过20M,视频文件以及大文件压缩后上传</font>
            </td>
       		</tr>
       		<tr>
				<td height="130"><div align="right">学院评估方案、通知和宣讲方案：</div></td>
				<td height="130" colspan="2">&nbsp;
					<textarea id="content" name="content" rows="15" cols="12" style="width:600px" ></textarea>
				</td>
			</tr>
    		<tr>
            	<td height="40"><div align="right"></div></td>
            	<td height="40" colspan="2">&nbsp;
            		<input id="submit" type="submit" name="submit" value="保存" style="width:80px;height:30px;" />
            		<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/college/index/type/3"><input id="back" type="button" name="back" value="返回" style="width:80px;height:30px;" /></a>
            	</td>
    		</tr>
    	</form>
	</table>
</body>
</html><?php }} ?>