<?php /* Smarty version Smarty-3.1.14, created on 2014-11-27 16:53:08
         compiled from "admin\tpl\suggest\index.html" */ ?>
<?php /*%%SmartyHeaderCode:174525476e6745dd425-31487227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '978a01d32baa337c212c86335ed14eccff2c23f1' => 
    array (
      0 => 'admin\\tpl\\suggest\\index.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174525476e6745dd425-31487227',
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
  'unifunc' => 'content_5476e674669e44_56785770',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5476e674669e44_56785770')) {function content_5476e674669e44_56785770($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<title>自评结果建议维护</title>
<style type="text/css"> 
.title-container{margin-left:10px;  height:27px; width:700px;}
.title-input{margin:0px 20px 0px 0px; width:650px; height:25px;}
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
.suggest-meau{ font-size:12px; color:#000; text-align:left; width:600px; height:40px;min-height:20px;  float:left;}
.suggest-meau-btn{cursor:pointer;font-size:11px;line-height:30px; background:#DBEAF9; margin:0px 10px 0px 10px;  border:1px solid #CCC; text-align:center; width:108px;height:30px;float:left;}
.suggest-meau-btn:hover{background:#FCF1CA;}
</style>
<script type="text/javascript">
	function addTr(){
    //获取table最后一行 $("#tab tr:last")
    //获取table第一行 $("#tab tr").eq(0)
    //获取table倒数第二行 $("#tab tr").eq(-2)
   //var row = $("#mytable").find("tr").length;
    	var row = $("#mytable").find("tr").length;
    	var $tr=$("#mytable tr:last");
    	var str = "<tr>";
    	str += "<td style=\"border-left:1px solid #adceff;\">"+row+"</td>";
    	str += "<td><input type=\"text\" class=\"beginclass\" style=\"width:50px;height:20px;\" />至<input type=\"text\" class=\"endclass\" style=\"width:50px;height:20px;\" /></td>";
    	str +="<td><input type=\"text\" class=\"contentclass\" style=\"width:400px;height:20px;\" /></td>";
   		str +="<td><a href=\"#\" onclick=\"delTr(this)\">删除</td>";
    	str += "</tr>";
    	$tr.after(str);
	 }
	 function delTr(objBtn){
		 if (!confirm("确定要删除！")){
			 return false;
		 }
		 var tb = document.getElementById('mytable');
		 var tr = objBtn.parentNode.parentNode;
		 tb.deleteRow(tr.rowIndex);
	 }
	 function delsy(objA, syId){
		 if (!confirm("确定要删除！")){
			 return false;
		 }
		 $.ajax({
			 url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/suggest/del/id/"+syId,
			 type:"POST",
			 async:false,
			 dataType:"json",
			 success:function(data){
				 if(data.json.state == 1){
					 var tb = document.getElementById('mytable');
					 var tr = objA.parentNode.parentNode;
					 tb.deleteRow(tr.rowIndex);
					 alert("删除成功！");
				 }else{
					 alert("删除失败！");
				 }
			 },
			 error:function(msg){
				 alert("网络出现问题！");
			 }
		 })
	 }
	 function tijiao(){
		// alert("111");
		var flag = true;
		var begin_str = "";
		var begin_len = $(".beginclass").length - 1;
		//alert(begin_len);
		var end_str = "";
		var end_len = $(".endclass").length - 1;
		//alert(end_len);
		var content_str = "";
		var content_len = $(".contentclass").length - 1;
		$(".beginclass").each(function(i, doEle){
			if($(doEle).val() == ""){
				alert("有未填写的字段！");
				$(doEle).focus();
				flag = false;
				return false;
			}else{
				if(i < begin_len){
					begin_str += $(doEle).val();
					begin_str +=",";
				}else{
					begin_str += $(doEle).val();
				}	
			}
		});
		$(".endclass").each(function(index, endEle){
			if($(endEle).val() == ""){
				alert("有未填写的字段！");
				$(endEle).focus();
				flag = false;
				return false;
			}else{
				if(index < end_len){
					end_str += $(endEle).val();
					end_str +=",";
				}else{
					end_str += $(endEle).val();
				}	
			}
		});
		$(".contentclass").each(function(contentid, contentEle){
			if($(contentEle).val() == ""){
				alert("有未填写的字段！");
				$(contentEle).focus();
				flag = false;
				return false;
			}else{
				if (contentid < content_len){
					content_str += $(contentEle).val();
					content_str += "||";
				}else{
					content_str += $(contentEle).val();
				}
			}
		});
		if (flag == true){
			$.ajax({
				url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/suggest/addsy",
				data:{begin:begin_str, end:end_str, content:content_str},
				type:"POST",
				async:false,
				dataType:"json",
				success:function(data){
					if(data.json.state == 1){
						alert("保存成功！");
					}else{
						alert("保存失败！");
					}
				},
				error:function(msg){
					alert("网络出现问题！");
				}
			});
		}
	 }
</script>
</head>
<body>
	<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  		<TR height=28><TD background=images/title_bg1.jpg>当前位置:自评结果建议维护</TD></TR>
  		<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
		</TR>
	</TABLE>
	<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
		<input type="button" id="addnewline" onclick="addTr()" value="添加一行" style="width:100px;height:30px;" />
	</div>
	<div id="info" style=" margin:10px 0px 10px 10px;">
		<table id="mytable" cellspacing="0" >  
  			<tr>  
    			<th scope="col" width="80px" style="border-left:1px solid #adceff;" >序号</th>  
    			<th scope="col" width="200px" >分数段</th> 
    			<th scope="col" width="450px" >建议内容</th>   
    			<th scope="col" width="100px" >操作</th> 
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['name'] = 'sl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['total']);
?>
 		 	<tr>  
    			<td style="border-left:1px solid #adceff;"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['sl']['index_next'];?>
</td>
    			<td><input type="text" class="beginclass" value="<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sl']['index']]['sy_begin'];?>
" style="width:50px;height:20px;" />至<input type="text" class="endclass" value="<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sl']['index']]['sy_end'];?>
" style="width:50px;height:20px;" /></td>
    			<td><input type="text" class="contentclass" style="width:400px;height:20px;" value="<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sl']['index']]['sy_content'];?>
" /></td>
    			<td><a href="#" onclick="delsy(this,<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sl']['index']]['sy_id'];?>
)">删除</a></td>
  			</tr>
  			<?php endfor; endif; ?>
		</table> 
	</div>
	<div class ="meau-container">
       <div class="suggest-meau">
       		<div style="padding-left:350px;padding-top:10px;height:20px; float:left;">
      		 	<div class="suggest-meau-btn" onclick="tijiao()">保存</div>
       		</div>
       	</div>
   </div>
</body>
</html><?php }} ?>