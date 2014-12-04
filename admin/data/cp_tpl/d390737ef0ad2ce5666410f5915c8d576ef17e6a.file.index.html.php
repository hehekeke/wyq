<?php /* Smarty version Smarty-3.1.14, created on 2014-11-10 18:43:05
         compiled from "admin\tpl\counselor\index.html" */ ?>
<?php /*%%SmartyHeaderCode:20793544de8d0a51425-62377929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd390737ef0ad2ce5666410f5915c8d576ef17e6a' => 
    array (
      0 => 'admin\\tpl\\counselor\\index.html',
      1 => 1415616181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20793544de8d0a51425-62377929',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544de8d1268d22_66077452',
  'variables' => 
  array (
    'web_url' => 0,
    'type' => 0,
    'list' => 0,
    'isnew' => 0,
    'info' => 0,
    'noticelist' => 0,
    'select' => 0,
    'grade' => 0,
    'majorlist' => 0,
    'major' => 0,
    'nenglist' => 0,
    'num' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544de8d1268d22_66077452')) {function content_544de8d1268d22_66077452($_smarty_tpl) {?><?php if (!is_callable('smarty_function_page')) include 'E:\\wamp\\www\\nkgn\\been/View/plugins\\function.page.php';
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
<script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/My97DatePicker/WdatePicker.js"></script>
<title>辅导员评估工作</title>
<style type="text/css"> 
.leibie-container{margin-left:10px;  height:27px; width:auto; border-left: #999 double 1px; }
.leibie{cursor:pointer; width:100px; height:25px; line-height:25px;border-right: #999 double 1px; border-bottom: #999 double 1px; border-top: #999 double 1px; float:left; text-align:center; background:#E7E7E7;}
.leibie:hover{background:#FCF1CA;}
.leibie-selected{	width:100px; height:25px; line-height:25px;border-right: #999 double 1px;border-bottom: #999 double 1px; border-top: #999 double 1px; float:left; text-align:center; background: #FCF1CA;}
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
.jindu{position:relative; border:1px #CCC solid; height:28px; width:240px; margin:0 auto; padding:1px;float:left;}
.jindu_text{margin:0px 0px 0px 5px; width:100px; height:28px; line-height: 20px; font-size:10px;float:left;}
.jindu-weiqidong{ display:block;width:0px; height:28px;}
.jindu-daishenhe{ display:block;width:48px; height:28px;background:#FFCC99;}
.jindu-gognshi{ display:block;width:96px; height:28px;background:#FFFF99;}
.jindu-xuanjiang{ display:block;width:144px; height:28px;background:#CCCCFF;}
.jindu-pinggu{ display:block;width:192px; height:28px;background:#9900FF;}
.jindu-jiesu{ display:block;width:240px; height:28px;background:#008000;}
.mask{height:100%; width:100%; position:fixed; _position:absolute; top:0; z-index:1000;  opacity:0.5; filter: alpha(opacity=50); background-color:#000; display:none;}
.pop{width:560px;position:absolute; left:100px; top:100px;margin-top:10px; margin-left:200px; border-top:#F50 solid 2px; border-left:1px solid #CCC; border-right:1px solid #CCC; border-bottom:1px solid #CCC; background:#F0F5FB;z-index:1001; display:none;}
.pop-form-header{ width:560px; border-bottom:solid #999 1px;}
.add-pop-form-title{float:left;text-align:left; padding:2px 5px; width:500px; }
.pingshen-container{ padding:5px 0px; margin:5px 10px;}
.pingshen-title{ font-size:12px; line-height:22px; color:#000; text-align:right; width:100px; float:left;}
.pingshen-input{ font-size:12px; color:#000; text-align:left; margin:0px 10px 0px 10px; width:300px; min-height:20px;  float:left;}
.meau-container{ padding:5px 0px; margin:5px 10px;border-bottom: 1px dotted #DDD;width:400px;height:40px;}
.pingshen-meau{ font-size:12px; color:#000; text-align:left; width:600px; height:40px;min-height:20px;  float:left;}
.pingshen-meau-btn{cursor:pointer;font-size:11px;background:#DBEAF9; margin:0px 10px 0px 10px; border:1px solid #CCC; text-align:center; width:88px;height:20px;float:left;}
.pingshen-meau-btn:hover{background:#FCF1CA;}
.closebtn{ float:right; text-align:right; padding:2px 5px;width:30px;cursor:pointer;  font-size:11px; line-height:20px; color:#000; background:#DBEAF9; border:1px solid #CCC;}
.closebtn:hover{background:#FCF1CA;}
#pop-info th {  
 border-right: 1px solid #adceff;  
 border-bottom: 1px solid #adceff;  
 border-top: 1px solid #adceff;  
 letter-spacing: 2px;  
 text-transform: uppercase;  
 text-align: left;  
 padding: 6px 6px 6px 12px;  
 background: #f4f7fc;  
}  
#pop-info td {  
 border-right: 1px solid #adceff;  
 border-bottom: 1px solid #adceff;  
 background: #fff;  
 font-size:11px;  
 padding: 6px 6px 6px 12px;  
 
}  
#pop-info th.spec {  
 border-left: 1px solid #adceff;  
 border-top: 0;  
 background: #fff;   
} 
</style> 
<script type="text/javascript">
	$(function(){
		$(".leibie").click(function(){
			//alert("111");
			var type_id = $(this).attr("data");
			$(".leibie-selected").removeClass("leibie-selected");
			$(this).addClass("leibie-selected");
			location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/index/type/"+type_id;
		});
		$(".process").change(function(){
			var id = $(this).attr('data');
			var process_id = $(this).val();
            var isnew=$("#isnew").val();
			//alert(id + process_id);
			$.ajax({
				url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/Counselor/setstate",
				type:"POST",
				data:{id:id, state:process_id,isnew:isnew},
				async:false,
				dataType:"json",
				success:function(data){
					if (data.json.state == 1){
						alert("设置成功");
					}else{
						alert("设置失败");
					}
				},
				error:function(msg){
					alert("网络出现问题！");
				}
			});
		});
		
		//$("#start").bind('focus',function(){
			//alert("111");
		//	WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});
		//});
		
		//$("#end").bind('focus',function(){
			//WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});
		//});
	});
	function piliangPass(){
		//alert($(".checkbox-mes:checked").length);
		if ($(".checkbox-mes:checked").length > 0){
			var str = "";
			$(".checkbox-mes:checked").each(function(index,doEle){
				//.alert($("doEle").val());
				if (index == $(".checkbox-mes:checked").length - 1){
					str += $(doEle).attr("data");
				}else{
					str += $(doEle).attr("data")+",";
				}
			});
			$.ajax({
				url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/passselfplan",
				type:"POST",
				data:{id:str},
				async:false,
				dataType:"json",
				success:function(data){
					if (data.json.state == 1){
						alert("批量通过成功！");
						location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/index/type/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
";
					}else {
						alert("批量通过失败！");
					}
				},
				error:function(msg){
					alert("网络出现问题！");
				}
			});
		}else{
			alert("你没有选择任何学生！");
		}
	}
	
	function addpingshen(majorid, nianji, majorName){
        alert("请选择用户名");
		$("#mask").show();
		$("#pop").show();
		var title = nianji + "级-" + majorName + "-评审委员账号申请";
		$("#pop-title").html(title);
		$("#hidden-major").val(majorid);
		$("#hidden-grade").val(nianji);
	}
	
	function cancel(){
		$("#pop-title").val("");
		$("#pop-realname").val("");
		$("#hidden-major").val("");
		$("#hidden-grade").val("");
		$("#renyuanleixing").val("");
		$("#pop-username").val("");
		$("#pop-pw").val("");
		$("#pop-repw").val("");
		$("#mask").hide();
		$("#pop").hide();
	}
	
	function saveshenhe(){
		var realname = $("#pop-realname").val();
		var major_id = $("#hidden-major").val();
		var nianji = $("#hidden-grade").val();
		var leixing = $("#renyuanleixing").val();
		var username = $("#pop-username").val();
		var pw = $("#pop-pw").val();
		var repw = $("#pop-repw").val();
		if (realname == ""){
			alert("请填写姓名");
			$("#pop-realname").focus();
		}else if (leixing == ""){
			alert("请选择类型");
			$("#renyuanleixing").focus();
		}else if (username == ""){
			alert("请选择用户名");
			$("#pop-username").focus();;
		}else if(pw == ""){
			alert("请填写密码");
			$("#pop-pw").focus();
			flag = false;
			return false;
		}else if (repw == ""){
			alert("请确认密码");
			$("#pop-repw").focus();
		}else if (pw != repw){
			alert("密码不一致");
			$("#pop-pw").focus()
		}else {
			$.ajax({
				url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/addpingshen",
				type:"POST",
				data:{name:realname, major:major_id, grade:nianji, type:leixing, code:username, password:pw},
				async:false,
				dataType:"json",
				success:function(data){
					if (data.json.state == 1){
						alert("添加成功！");
						$("#pop-title").val("");
						$("#pop-realname").val("");
						$("#hidden-major").val("");
						$("#hidden-grade").val("");
						$("#renyuanleixing").val("");
						$("#pop-username").val("");
						$("#pop-pw").val("");
						$("#pop-repw").val("");
						$("#mask").hide();
						$("#pop").hide();
						location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/index/type/2";
					}else{
						alert(data.json.msg);
					}
				},
				error:function(msg){
					alert("网络出现问题!");
				}
			});
		}
	}	
	
	function changeTime(gdid){
		var str = "<input id=\"start\" name=\"start\"  onfocus=\"showData('start')\" class=\"Wdate\" type=\"text\" style=\"width:200px; height:20px;\" />至";
		str += "<input id=\"end\" name=\"end\" onfocus=\"showData('end')\" class=\"Wdate\" type=\"text\" style=\"width:200px; height:20px;\" />";
		str += "<input type=\"button\" value=\"确定\" onclick=\"quedingTime("+gdid+")\" />";
		$("#shiduan-"+gdid).html(str);	
	}
	function showData(elemId){
		WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});
	}
	
	function quedingTime(gdid){
		var begin = $("#start").val();
		var end = $("#end").val();
		//alert(end);
		//var url = "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/changemajortime?id="+gdid+"&start="+begin+"&end="+end;
		//alert(url);
		$.ajax({
			url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/Counselor/changemajortime",
			type:"POST",
			data:{id:gdid, start:begin, end:end},
			async:false,
			dataType:"json",
			success:function(data){
				if (data.json.state == 1){
					alert("修改成功");
					var str = begin + "至" + end;
					str += "<input type=\"button\" value=\"修改\" onclick=\"changeTime("+gdid+")\" />";
					$("#shiduan-"+gdid).html(str);
				}else {
					alert(data.json.msg);
				}
			},
			error:function(msg){
				alert("网络出现问题");
			}
		});
	}
	function feedback(id){
		var select_id = $("#pinggutonggao").val();
		location.href = "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/feedback/id/"+id+"/aid/"+select_id; 
	}
	function seepswy(num,mid,$name,grade){
		if (num == 0){
			alert("目前没有评审委员账号");
		}else{
			$("#mask").show();
			$("#pswy-pop").show();
			var title = grade+"级-"+$name+"-评审委员会账号"; 
			$("#pswy-title").html(title);
			var str = "<tr>";
			str += "<th scope=\"col\" width=\"80px\" style=\"border-left:1px solid #adceff;\" >序号</th>";
			str += "<th scope=\"col\" width=\"100px\" >姓名</th>";
			str += "<th scope=\"col\" width=\"200px\" >人员类型</th>";
			str += "<th scope=\"col\" width=\"80px\" >用户名</th>";
			str += "<th scope=\"col\" width=\"80px\" >操作</th>";
		    str += "</tr>"; 
		    //var url = "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/seepswy/major/"+mid+"/grade/"+grade;
		    //alert(url);
			$.ajax({
				url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/seepswy",
				data:{major:mid, grade:grade},
				type:"POST",
				async:false,
				dataType:"json",
				success:function(data){
					if (data.json.state == 1){
						$.each(data.json.data, function(i,item){
							str += "<tr>";
							var j = i + 1;
							str += "<td style=\"border-left:1px solid #adceff;\" >"+j+"</td>";
							str += "<td>"+item.fu_realname+"</td>";
							str += "<td>"+item.fu_type+"</td>";
							str += "<td>"+item.fu_username+"</td>";
							str += "<td><a href=\"#\" onclick=\"shanchupswy(this,"+item.fu_id+")\">删除</a></td>";
							str += "</tr>";
						});
						$("#pop-mytable").html(str);
					}else{
						str += "<tr>";
						str += "<th class=\"spec\" colspan=\"5\">获取信息出错！</td>";
						str += "</tr>";
						$("#pop-mytable").html(str);
					}
				},
				error:function(msg){
					alert("网路出现问题！");
					str += "<tr>";
					str += "<th class=\"spec\" colspan=\"5\">网络出现错误！</td>";
					str += "</tr>";
					$("#pop-mytable").html(str);
				}
			});
		}
	}
	function pswyclose(){
		$("#pswy-title").html("");
		$("#pop-mytable").html("");
		$("#mask").hide();
		$("#pswy-pop").hide();
	}
	
	function shanchupswy(objBtn, id){
		 if (!confirm("确定要删除！")){
			 return false;
		 }
		 $.ajax({
			url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/delpswy/id/"+id,
			type:"POST",
			async:false,
			dataType:"json",
			success:function(data){
				if (data.json.state == 1){
					 var tb = document.getElementById('pop-mytable');
					 var tr = objBtn.parentNode.parentNode;
					 tb.deleteRow(tr.rowIndex);
					alert("删除成功！");
				}else{
					alert("删除失败！");
				}
			},
			error:function(msg){
				alert("网络出现问题！");
			}
		 });
	}
	function chaxun(){
		//alert(111);
		var selectId = $("#pinggutonggao").val();
		var majorId = $("#xuesheng_zhuanye").val();
		var grade = $("#xuesheng_nianji").val();
		//alert(grade);
		var name = $("#xingming_text").val();
		location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/Counselor/index?type=5&selected="+selectId+"&grade="+grade+"&major="+majorId+"&name="+name;
	}

function chaxun_banji(){
    var selectid = $("#pingguxiangmu").val();
    location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/Counselor/index?type=2&selected="+selectid;
}
</script>
</head>
<body>
	<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  		<TR height=28><TD background=images/title_bg1.jpg>当前位置:辅导员评估工作</TD></TR>
  		<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
		</TR>
	</TABLE>
	<div id="leibie-container" class = "leibie-container" >
		<div <?php if ($_smarty_tpl->tpl_vars['type']->value==1){?> class="leibie leibie-selected"<?php }else{ ?>class="leibie"<?php }?> data="1">学院评估小组维护</div>
		<div <?php if ($_smarty_tpl->tpl_vars['type']->value==2){?> class="leibie leibie-selected"<?php }else{ ?>class="leibie"<?php }?> data="2">评估工作安排</div>
		<div <?php if ($_smarty_tpl->tpl_vars['type']->value==3){?> class="leibie leibie-selected"<?php }else{ ?>class="leibie"<?php }?> data="3">未参评学生维护</div>
		<div <?php if ($_smarty_tpl->tpl_vars['type']->value==4){?> class="leibie leibie-selected"<?php }else{ ?>class="leibie"<?php }?> data="4">审批成长训练计划</div>
		<div <?php if ($_smarty_tpl->tpl_vars['type']->value==5){?> class="leibie leibie-selected"<?php }else{ ?>class="leibie"<?php }?> data="5">评估结果及反馈</div>
		<div style="clear:both;" ></div>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['type']->value==1){?>
	</br>
	<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
		<a href ="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/adduser" >新增评估人员</a>
	</div>
	</br>
	<div id="info" style=" margin-left:10px;">
		<table id="mytable" cellspacing="0" >  
  			<tr>  
    			<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>  
    			<th scope="col" width="100px" >职工号/学号</th> 
    			<th scope="col" width="100px" >姓名</th>   
    			<th scope="col" width="100px" >人员类型</th>
    			<th scope="col" width="80px" >维护人</th>
    			<th scope="col" width="80px" >维护时间</th>
    			<th scope="col" width="120" >操作</th>
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['fl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['fl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['name'] = 'fl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['fl']['total']);
?>
 		 	<tr >  
    			<td style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['fl']['index']]['admin_id'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['fl']['index']]['admin_name'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['fl']['index']]['admin_realname'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['fl']['index']]['admin_type'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['fl']['index']]['create_real_name'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['fl']['index']]['admin_create_time'];?>
</td>
			<td>
		    	<a onClick="if (confirm('确认要删除？')) return true; else return false;" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/Counselor/index/type/1/do/del/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['fl']['index']]['admin_id'];?>
">删除</a>
			</td>
  		</tr>  
  		<?php endfor; else: ?>
 		 <tr >
    		<th class="spec" colspan="7">暂无评估小组人员！</td>
  		</tr>
  		<?php endif; ?>
	</table> 
	<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/counselor/index/type/".((string)$_smarty_tpl->tpl_vars['type']->value)),$_smarty_tpl);?>
 
	</div>
	<?php }elseif($_smarty_tpl->tpl_vars['type']->value==2){?>
		</br>
    <div style="width:300px;height:30px">
        <div id="notice_search" style="margin-left:20px;float: left">
            <input id="isnew" type="text" style="display: none" value="<?php echo $_smarty_tpl->tpl_vars['isnew']->value;?>
"/>
            评估:
            <select name="pingguxiangmu" id="pingguxiangmu">
                <option value="0" <?php if ($_smarty_tpl->tpl_vars['isnew']->value==0){?> selected="selected" <?php }?>>学年末评估</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['isnew']->value==1){?> selected="selected" <?php }?>>新生入学</option>
            </select>
        </div>
        <div id="anniu_search" style="margin-left:20px;float: right">
            <input type="button" id= "chaxuan_bj" onclick="chaxun_banji();" style="width:80px; height:25px;" value="查询" />
        </div>
    </div></br>
	<div style="padding-left:30px;padding-top:0px;background-color:white;width:800px;height:30px; ">
		<?php echo $_smarty_tpl->tpl_vars['info']->value['title'];?>
&nbsp;学院评估时段为：<?php echo $_smarty_tpl->tpl_vars['info']->value['begin'];?>
--<?php echo $_smarty_tpl->tpl_vars['info']->value['end'];?>

	</div>
	</br>
	<div id="info" style=" margin-left:10px;">
		<table id="mytable" cellspacing="0" >  
  			<tr>
                <th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>
                <th scope="col" width="100px" >专业</th>
    			<th scope="col" width="50px" >年级</th>   
    			<th scope="col" width="650px" >评估时间段设计</th>
                <?php if ($_smarty_tpl->tpl_vars['isnew']->value==0){?><th scope="col" width="100px" >评审委员账号</th><?php }?>
    			<th scope="col" width="100px" >进度</th>
    			<th scope="col" width="80" >评估情况</th>
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['gl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['gl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['name'] = 'gl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['gl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
 		 	<tr data="<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_id'];?>
" >
               <?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_id']){?>
    			<td style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_id'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['major_name'];?>
</td>
    			<td id="nianji-<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_grade'];?>
</td>
    			<td id="shiduan-<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_id'];?>
">
    				<?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_begin']==''||$_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_begin']=="0000-00-00 00:00:00"){?> 
    				<?php echo $_smarty_tpl->tpl_vars['info']->value['begin'];?>
至<?php echo $_smarty_tpl->tpl_vars['info']->value['end'];?>

    				<?php }else{ ?>
    				<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_begin'];?>
至<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_end'];?>

    				<?php }?>                
    				<input type="button" value="修改" onclick="changeTime(<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_id'];?>
)" />
    			</td>
                <?php if ($_smarty_tpl->tpl_vars['isnew']->value==0){?><td><a href="#" onclick="seepswy(<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['num'];?>
,<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['major_id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['major_name'];?>
','<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_grade'];?>
')">已有<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['num'];?>
人</a><input id="btn-<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_id'];?>
" data="btn-<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_id'];?>
" major="btn-<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['major_id'];?>
" type="button" value="+" onclick="addpingshen('<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['major_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_grade'];?>
','<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['major_name'];?>
')"/></td><?php }?>
    			<td>
    			 <select class = "process" data="<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_id'];?>
">
    			 	<?php if ($_smarty_tpl->tpl_vars['isnew']->value==1){?>
    			 	 <option value="0" <?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_state']==0){?>selected="selected"<?php }?>>未启动</option>
    				 <option value="1" <?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_state']==1){?>selected="selected"<?php }?>>自评</option>
    				 <option value="3" <?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_state']==3){?>selected="selected"<?php }?>>辅导员反馈</option>
    				 <option value="4" <?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_state']==4){?>selected="selected"<?php }?>>完成</option>
    			 	<?php }else{ ?>
    				 <option value="0" <?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_state']==0){?>selected="selected"<?php }?>>未启动</option>
    				 <option value="1" <?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_state']==1){?>selected="selected"<?php }?>>自评</option>
    				 <option value="2" <?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_state']==2){?>selected="selected"<?php }?>>班级公开展示</option>
    				 <option value="3" <?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_state']==3){?>selected="selected"<?php }?>>结果统计和反馈</option>
    				 <option value="4" <?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_state']==4){?>selected="selected"<?php }?>>完成</option>
    				 <?php }?>
    			</td>
				<td>
		    	<?php if ($_smarty_tpl->tpl_vars['isnew']->value==0){?><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/classdetail/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_id'];?>
/type_stu/0">查看</a><?php }else{ ?><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/classdetail/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['gl']['index']]['gd_id'];?>
/type_stu/3">查看<?php }?>
				</td>
                <?php }else{ ?>
                <th class="spec" colspan="7">没有开始评估！</td>
                <?php }?>
  			</tr> 
  			<?php endfor; else: ?>
  			 	<th class="spec" colspan="7">没有开始评估！</td>
  			<?php endif; ?>
		</table> 
		<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/counselor/index/type/".((string)$_smarty_tpl->tpl_vars['type']->value)),$_smarty_tpl);?>
 
	</div>
	<?php }elseif($_smarty_tpl->tpl_vars['type']->value==3){?>
	</br>
	<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
		<a href ="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/addnopartstu">添加</a>
	</div>
	</br>
	<div id="info" style=" margin-left:10px;">
		<table id="mytable" cellspacing="0" >  
  			<tr>  
    			<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>  
    			<th scope="col" width="150px" >学年</th> 
    			<th scope="col" width="100px" >年级</th>  
    			<th scope="col" width="150px" >专业</th>  
    			<th scope="col" width="100px" >姓名</th>
    			<th scope="col" width="130px" >学号</th>
    			<th scope="col" width="80px" >操作</th>
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['name'] = 'sl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
 		 	<tr >  
    			<td style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sl']['index']]['nps_id'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sl']['index']]['nps_xuenian'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sl']['index']]['nps_grade'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sl']['index']]['major_name'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sl']['index']]['nps_name'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sl']['index']]['nps_no'];?>
</td>
			<td>
		    	<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/editnopartstu/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['sl']['index']]['nps_id'];?>
">修改</a>
			</td>
  		</tr>  
  		<?php endfor; else: ?>
 		 <tr >
    		<th class="spec" colspan="7">暂无未参评学生！</td>
  		</tr>
  		<?php endif; ?>
	</table> 
	<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/counselor/index/type/".((string)$_smarty_tpl->tpl_vars['type']->value)),$_smarty_tpl);?>
 
	</div>
	<?php }elseif($_smarty_tpl->tpl_vars['type']->value==4){?>
	</br>
	<div id="info" style=" margin-left:10px;">
		<table id="mytable" cellspacing="0" >  
  			<tr>  
    			<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>  
    			<th scope="col" width="100px" >年级</th> 
    			<th scope="col" width="100px" >专业</th>   
    			<th scope="col" width="100px" >姓名</th>
    			<th scope="col" width="80px" >学号</th>
    			<th scope="col" width="80px" >提交时间</th>
    			<th scope="col" width="120" >操作<input type="button" id="shenhe_button" onclick="piliangPass();" value="批量通过" /></th>
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['name'] = 'pl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pl']['total']);
?>
 		 	<tr >  
    			<td style="border-left:1px solid #adceff;" >
    			<input id="mes-checkbox<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['id'];?>
"  type="checkbox" onclick="isChecked(<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['id'];?>
)" name="mes-checkbox" class="checkbox-mes" value="1" data="<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['id'];?>
"/>
    			<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['id'];?>

    			</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['fu_grade'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['major_name'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['fu_realname'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['fu_username'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['create_time'];?>
</td>
				<td>
					<?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['state']==2){?>
		    		<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/shenhe/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['id'];?>
">审批</a>
					<?php }?>
				</td>
  			</tr>  
  			<?php endfor; else: ?>
 		 	<tr >
    			<th class="spec" colspan="7">暂无需要审批学生！</td>
  			</tr>
  			<?php endif; ?>
		</table> 
		<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/counselor/index/type/".((string)$_smarty_tpl->tpl_vars['type']->value)),$_smarty_tpl);?>
 
	<?php }elseif($_smarty_tpl->tpl_vars['type']->value==5){?>
		</br>
	<div id="notice_search" style="margin-left:20px;">
		评估:
		<select name="pinggutonggao" id="pinggutonggao"> 
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['name'] = 'pgtgl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['noticelist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pgtgl']['total']);
?>
		<option value="<?php echo $_smarty_tpl->tpl_vars['noticelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pgtgl']['index']]['asspro_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['select']->value==$_smarty_tpl->tpl_vars['noticelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pgtgl']['index']]['asspro_id']){?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['noticelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pgtgl']['index']]['asspro_title'];?>
</option>
		<?php endfor; endif; ?>
		</select>
	</div>
	</br>
	<div id="xuesheng_search" style="margin-left:20px;">
		年级:
		<select name="xuesheng_nianji" id="xuesheng_nianji"> 
		<option value="0" <?php if ($_smarty_tpl->tpl_vars['grade']->value==0){?>selected="selected"<?php }?>>所有</option>
		<option value="2007" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2007){?>selected="selected"<?php }?>>2007</option>
		<option value="2008" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2008){?>selected="selected"<?php }?>>2008</option>
		<option value="2009" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2009){?>selected="selected"<?php }?>>2009</option>
		<option value="2010" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2010){?>selected="selected"<?php }?>>2010</option>
		<option value="2011" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2011){?>selected="selected"<?php }?>>2011</option>
		<option value="2012" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2012){?>selected="selected"<?php }?>>2012</option>
		<option value="2013" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2013){?>selected="selected"<?php }?>>2013</option>
		<option value="2014" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2014){?>selected="selected"<?php }?>>2014</option>
        <option value="2015" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2015){?>selected="selected"<?php }?>>2015</option>
        <option value="2016" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2016){?>selected="selected"<?php }?>>2016</option>
		</select>
		&nbsp;
		专业：
		<select name="xuesheng_zhuanye" id="xuesheng_zhuanye"> 
		<option value="0" selected="selected">所有</option>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['zyl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['name'] = 'zyl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['majorlist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['zyl']['total']);
?>
		<option value="<?php echo $_smarty_tpl->tpl_vars['majorlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zyl']['index']]['major_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['major']->value==$_smarty_tpl->tpl_vars['majorlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zyl']['index']]['major_id']){?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['majorlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['zyl']['index']]['major_name'];?>
</option>
		<?php endfor; endif; ?>
		</select>
	</div>
	</br>
	<div id="anniu_search" style="margin-left:20px;">
		姓名：<input type="text" id= "xingming_text" style="width:100px; height:20px;" value="" />
		&nbsp;
		<input type="button" id= "shousuo" onclick="chaxun()" style="width:80px; height:25px;" value="查询" />
	</div>
	</br>
	<div id="info" style=" margin-left:10px;">
		<table id="mytable" cellspacing="0" >  
  			<tr>  
    			<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>  
    			<th scope="col" width="80px" >学号</th> 
    			<th scope="col" width="120px" >姓名</th>   
    			<th scope="col" width="150px" >公指标</th>
    			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['nl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['nl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['name'] = 'nl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['nl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['nenglist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    				<th scope="col" width="150px" ><?php echo $_smarty_tpl->tpl_vars['nenglist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nl']['index']];?>
</th>
    			<?php endfor; endif; ?>
    			<th scope="col" width="150px" >操作</th>
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ul'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ul']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['name'] = 'ul';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ul']['total']);
?>
  				<tr>
  					<td style="border-left:1px solid #adceff;"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['ul']['index_next'];?>
</td>
  					<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ul']['index']]['fu_username'];?>
</td>
  					<td><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/common/index/fuid/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ul']['index']]['fu_id'];?>
/isnew/<?php echo $_smarty_tpl->tpl_vars['isnew']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ul']['index']]['fu_realname'];?>
</a></td>
  					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['snl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['snl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['name'] = 'snl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ul']['index']]['score']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['snl']['total']);
?>
  						<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ul']['index']]['score'][$_smarty_tpl->getVariable('smarty')->value['section']['snl']['index']];?>
</td>
  					<?php endfor; endif; ?>
  					<?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ul']['index']]['isfb']==1){?>
  					<td><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/counselor/feedbackdetail/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ul']['index']]['pid'];?>
">查看反馈</a></td>
  					<?php }else{ ?>
  					<td><a href="#" onclick="feedback(<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ul']['index']]['fu_id'];?>
)">反馈</a></td>
  					<?php }?>
  				</tr>
  			<?php endfor; else: ?>
  				<th class="spec" colspan="<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
">暂无评估学生！</td>
  			<?php endif; ?>
		</table> 
		<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/counselor/index/type/".((string)$_smarty_tpl->tpl_vars['type']->value)."/selected/".((string)$_smarty_tpl->tpl_vars['select']->value)."/grade/".((string)$_smarty_tpl->tpl_vars['grade']->value)."/major/".((string)$_smarty_tpl->tpl_vars['major']->value)."/name/".((string)$_smarty_tpl->tpl_vars['name']->value)),$_smarty_tpl);?>
 
	</div>
	<?php }?>
	<div id="mask" class="mask"></div>
	<div id = "pop" class="pop">
		<div class="add-pop-form-header">
			<div class="add-pop-form-title" id="pop-title"></div>
    		<div style="clear:both;"></div>
    	</div>
    	</br>
		<div class="pingshen-container" >  
			<div class="pingshen-title">姓名:</div>
			<div class="pingshen-input">
				<input type="text" id="pop-realname" value="" style="width:100px; height:20px" />
				<input type="hidden" id="hidden-major" value="" />
				<input type="hidden" id="hidden-grade" value="" />
				</div>
			<div style="clear:both;"></div>
 		</div>
 		<div class="pingshen-container" >  
			<div class="pingshen-title">人员类型:</div>
			<div class="pingshen-input">
				<select id="renyuanleixing" name="renyuanleixing">
					<option value="">请选择</option>
					<option value="学生代表">学生代表</option>
					<option value="辅导员">辅导员</option>
					<option value="专业教师">专业教师</option>
					<option value="班导师（班主任）">班导师（班主任）</option>
					<option value="校友代表">校友代表</option>
					<option value="用人单位代表">用人单位代表</option>
					<option value="高年级学生">高年级学生</option>
					<option value="其他">其他</option>
				</select>
			</div>
			<div style="clear:both;"></div>
 		</div>
 		<div class="pingshen-container" >  
			<div class="pingshen-title">用户名:</div>
			<div class="pingshen-input"><input id="pop-username" value="" type="text" style="width:100px; height:20px" /></div>
			<div style="clear:both;"></div>
 		</div>
 		<div class="pingshen-container" >  
			<div class="pingshen-title">密码:</div>
			<div class="pingshen-input"><input id="pop-pw" value="" type="password" style="width:150px; height:20px" /></div>
			<div style="clear:both;"></div>
 		</div>
 		<div class="pingshen-container" >  
			<div class="pingshen-title">确认密码:</div>
			<div class="pingshen-input"><input id="pop-repw" type="password" value="" style="width:150px; height:20px" /></div>
			<div style="clear:both;"></div>
 		</div>
 		  <div class ="meau-container">
       		<div class="pingshen-meau">
       			<div style="margin-left:100px;margin-top:10px;height:20px; float:left;">
       				<div class="pingshen-meau-btn" id="btn-ok" onclick="saveshenhe()">保存</div>
       				<div class="pingshen-meau-btn" onclick="cancel()">取消</div>
       			</div>
       		</div>
       	</div>
	</div>
	
	<div id= "pswy-pop" class="pop">
		<div class="add-pop-form-header">
			<div class="add-pop-form-title" id="pswy-title"></div>
			<div class="closebtn" id="closebtn" onclick="pswyclose();">关闭</div>
    		<div style="clear:both;"></div>
    	</div>
    	</br>
		<div id="pop-info" style=" margin-left:10px;">
			<table id="pop-mytable" cellspacing="0" >    
			</table> 
 		</div>
 		</br>
	</div>
</body>
</html><?php }} ?>