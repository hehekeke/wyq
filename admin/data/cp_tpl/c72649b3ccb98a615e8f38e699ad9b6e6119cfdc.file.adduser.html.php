<?php /* Smarty version Smarty-3.1.14, created on 2014-10-27 14:40:41
         compiled from "admin\tpl\counselor\adduser.html" */ ?>
<?php /*%%SmartyHeaderCode:10234544de8e970e4b8-93542315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c72649b3ccb98a615e8f38e699ad9b6e6119cfdc' => 
    array (
      0 => 'admin\\tpl\\counselor\\adduser.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10234544de8e970e4b8-93542315',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544de8e97a04b1_45361652',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544de8e97a04b1_45361652')) {function content_544de8e97a04b1_45361652($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<title>本学院评估工作领导小组维护-新增</title>
<script type="text/javascript">
	$(function() {
		$("#form1").submit( function () {
			if($("#number").val() == ""){
				$("#result").text("职工号不能为空！");
				$("#number").focus();
				return false;
			} 
			if ($("#leixing").val() == ""){
				$("#result").text("人员类型不能为空！");
				$("#leixing").focus();
				return false;
			}
			return true;
		});
	});
	
	function searchUser(){
		var userNum = $("#number").val();
		//var url = "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/user/search/number/"+userNum;
		//alert(url);
		if(userNum == ""){
			$("#result").text("请输入职工号/学号后查询！");
		}else{
			$.ajax({
				url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/search/number/"+userNum,
				type:'POST',
				async:false,
				dataType:"json",
				success:function(data){
					if(data.json.state == 1){
						$("#name").val(data.json.data.fu_realname);
						$("#college").val(data.json.data.fu_college);
						$("#major").val(data.json.data.fu_major);
						$("#grade").val(data.json.data.fu_grade);
						$("#picid").val(data.json.data.pic_id);
						$("#sfzh").val(data.json.data.fu_sfzh);
						$("#result").text("查询成功！");
					}else{
						$("#name").val("");
						$("#result").text("没有此职工号/学号信息！");
					}
				},
				error:function(msg){
					alert("网络出现问题！");
					$("#result").text("请检查网络后重试！");
				}
			});
		}
	}
</script>
</head>
<body>
	<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  		<TR height=28><TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/title_bg1.jpg">当前位置:本学院评估工作领导小组维护-新增</TD></TR>
  		<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
		</TR>
	</TABLE> 	
	<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
		<form id="form1"   target="_self" name="form1" method="post" action="" >
    		<tr>
				<td width="107" height="30"><div align="right"></div></td>
				<td height="40" colspan="2">
					<div align="left"><font id="result" color="#0000FF"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font></div>
				</td>
			</tr>
        	<tr>
        		<td width="107" height="30"><div align="right">职工号/学号:</div></td>
            	<td height="40" colspan="2">&nbsp;
            		<input id="number" type="text" name="number" size="45" class="inputcss" />
            		<input id="search" type="button" onclick="searchUser()" value="查询"/>
            	</td>
       		</tr>
       		<tr>
       			<td width="107" height="30"><div align="right">姓名:</div></td>
            	<td height="40" colspan="2">&nbsp;
               	 	<input id ="name" type="text" name="name" size="20" onfocus=this.blur() />
               	 	<input id ="college" type="hidden" name="college" size="20" onfocus=this.blur() />
               	 	<input id ="major" type="hidden" name="major" size="20" onfocus=this.blur() />
               	 	<input id ="grade" type="hidden" name="grade" size="20" onfocus=this.blur() />
               	 	<input id ="picid" type="hidden" name="picid" size="20" onfocus=this.blur() />
               	 	<input id ="sfzh" type="hidden" name="sfzh" size="20" onfocus=this.blur() />
            	</td>
       		</tr>
       		<tr>
       			<td width="107" height="30"><div align="right">人员类型:</div></td>
            	<td height="40" colspan="2">&nbsp;
               	 	<select name="leixing" id="leixing"> 
						<option value="" selected="selected">请选择</option>
						<option value="分管学生工作院领导">分管学生工作院领导</option>
						<option value="专兼职学生工作干部">专兼职学生工作干部</option>
						<option value="教学科研办公室干部">教学科研办公室干部</option>
						<option value="专业教师">专业教师</option>
						<option value="学生代表">学生代表</option>
						<option value="其他">其他</option>
					</select>
            	</td>
       		</tr>
       		<tr>
       			<td width="107" height="30"><div align="right"></div></td>
            	<td height="40" colspan="2">&nbsp;
                	<input name="submit" type="submit" value="提交" style="width:80px;height:30px;"/>
            	</td>
       		</tr> 
		</form>
	</table>
</body>
</html><?php }} ?>