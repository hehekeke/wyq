<?php /* Smarty version Smarty-3.1.14, created on 2014-10-28 09:25:33
         compiled from "admin\tpl\school\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2356544ef08d3bded0-27829206%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b72da009739133cfa3b6dae7b90b5448cdf1d0de' => 
    array (
      0 => 'admin\\tpl\\school\\index.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2356544ef08d3bded0-27829206',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'type' => 0,
    'list' => 0,
    'isnew' => 0,
    'result' => 0,
    'year' => 0,
    'xuenian' => 0,
    'state' => 0,
    'noticelist' => 0,
    'select' => 0,
    'grade' => 0,
    'college' => 0,
    'colllist' => 0,
    'nenglist' => 0,
    'num' => 0,
    'major' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544ef08d98a389_13190713',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ef08d98a389_13190713')) {function content_544ef08d98a389_13190713($_smarty_tpl) {?><?php if (!is_callable('smarty_function_page')) include 'E:\\wamp\\www\\nkgn\\been/View/plugins\\function.page.php';
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
<title>校级评估工作</title>
</head>
<script type="text/javascript">
	$(function(){
		$(".leibie").click(function(){
			//alert("111");
			var type_id = $(this).attr("data");
			$(".leibie-selected").removeClass("leibie-selected");
			$(this).addClass("leibie-selected");
			if (type_id == 3){
				location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/school/index/type/"+type_id+"/state/4";
			}else{
				location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/school/index/type/"+type_id;
			}
		});
		$("#pop-close").click(function(){
			$("#mask").hide();
			$("#pop").hide();
		});
		$("#xuesheng_xueyuan").change(function(){
			var coll_id = $("#xuesheng_xueyuan").val();
			//var url = "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/school/getmajorlist/id/"+coll_id;
			//alert(url);
			var str = "";
			$.ajax({
				url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/school/getmajorlist/id/"+coll_id,
				type:"POST",
				async:false,
				dataType:"json",
				success:function(data){
					if(data.json.state == 1){
						str += "<option value=\"0\">所有</option>";
						$.each(data.json.data,function(i, item){
							str += "<option value=\""+item.major_name+"\">"+item.major_name+"</option>";
						});
					}else{
						str += "获取数据出错";
					}
					$("#xuesheng_zhuanye").html(str);
				},
				error:function(msg){
					alert("网络出现问题！");
					str += "网络出现问题";
					$("#xuesheng_zhuanye").html(str);
				}
			});
		});
	});
	function searchlist(){
		var xuenian = $("#xuenian").val();
		var state = $("#state").val();
		//var url = "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/school/index?type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&xuenian="+xuenian+"&state="+state;
		//alert(url);
		location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/school/index?type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&xuenian="+xuenian+"&state="+state;
	}
	function showMes(id){
		$("#mask").show();
		$("#pop").show();
		$.ajax({
			url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/school/getassdetail/id/"+id,
			type:"POST",
			async:false,
			dataType:"json",
			success:function(data){
				var str = "<tr>";
				if (data.json.state == 1){
					$("#pop-title").html(data.json.data.asspro_title);
					str += "<th scope=\"col\" width=\"80px\" style=\"border-left:1px solid #adceff;\" >"+data.json.data.zbdj.first+"</th>";
					str += "<th scope=\"col\" width=\"250px\" >"+data.json.data.zbdj.second+"</th>";
					str += "<th scope=\"col\" width=\"300px\" >"+data.json.data.zbdj.third+"</th>";
				    str += "</tr>"; 
					$.each(data.json.data.gong, function(i,item){
						str += "<tr>";
						str += "<td style=\"border-left:1px solid #adceff;\" >公</td>";
						str += "<td>"+item.second+"</td>";
						str += "<td>"+item.third+"</td>";
						str += "</tr>";
					});
					$.each(data.json.data.neng, function(j,elem){
						str += "<tr>";
						str += "<td style=\"border-left:1px solid #adceff;\" >能</td>";
						str += "<td>"+elem.second+"</td>";
						str += "<td>"+elem.third+"</td>";
						str += "</tr>";
					});
					$("#pop-mytable").html(str);
				}else{
					str += "<tr>";
					str += "<th class=\"spec\" colspan=\"3\">获取信息出错！</td>";
					str += "</tr>";
					$("#pop-mytable").html(str);
				}
			},
			error:function(msg){
				alert("网路出现问题！");
			}
		});
	}
	function setState(id,type){
		//var url = "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/school/setassstate/id/"+id+"/type/"+type;
		//alert(url);
		$.ajax({
			url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/school/setassstate/id/"+id+"/type/"+type,
			type:"POST",
			async:false,
			dataType:"json",
			success:function(data){
				if (data.json.state == 1){
					alert("设置成功！");
					window.location.reload();
				}else{
					alert("设置失败！");
				}
			},
			error:function(msg){
				alert("网络出现错误！");
			}
		});
	}
	function chaxun(){
		var selectId = $("#pinggutonggao").val();
		var collegeId = $("#xuesheng_xueyuan").val();
		var majorId = $("#xuesheng_zhuanye").val();
		var grade = $("#xuesheng_nianji").val();
		var name = $("#xingming_text").val();
		location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/school/index?type=4&selected="+selectId+"&grade="+grade+"&college="+collegeId+"&major="+majorId+"&name="+name;
	}
    function chaxun_banji(){

            var selectid = $("#pingguxiangmu").val();
            location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/School/index?type=2&selected="+selectid;
    }
</script>
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
#pop{width:720px;position:absolute; left:100px; top:100px;margin-top:10px; margin-left:200px; border-top:#F50 solid 2px; border-left:1px solid #CCC; border-right:1px solid #CCC; border-bottom:1px solid #CCC; background:#F0F5FB;z-index:1001; display:none;}
.pop-form-header{ width:720px; border-bottom:solid #999 1px;}
.pop-closebtn{ float:right; text-align:right; padding:2px 5px;width:30px;cursor:pointer;  font-size:11px; line-height:20px; color:#000; background:#DBEAF9; border:1px solid #CCC;}
.pop-closebtn:hover{background:#FCF1CA;}
.add-pop-form-title{float:left;text-align:left; padding:2px 5px; width:400px; }
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
<body>
	<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  		<TR height=28><TD background=images/title_bg1.jpg>当前位置:校级评估工作</TD></TR>
  		<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
		</TR>
	</TABLE>
	<div id="leibie-container" class = "leibie-container" >
		<div <?php if ($_smarty_tpl->tpl_vars['type']->value==1){?> class="leibie leibie-selected"<?php }else{ ?>class="leibie"<?php }?> data="1">学校评估通知</div>
		<div <?php if ($_smarty_tpl->tpl_vars['type']->value==2){?> class="leibie leibie-selected"<?php }else{ ?>class="leibie"<?php }?> data="2">查看学院工作</div>
		<div <?php if ($_smarty_tpl->tpl_vars['type']->value==3){?> class="leibie leibie-selected"<?php }else{ ?>class="leibie"<?php }?> data="3">审核评估细则</div>
		<div <?php if ($_smarty_tpl->tpl_vars['type']->value==4){?> class="leibie leibie-selected"<?php }else{ ?>class="leibie"<?php }?> data="4">查看评估结果</div>
		<div style="clear:both;" ></div>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['type']->value==1){?>
	</br>
	<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
		<a href ="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/school/addnotice" >发布评估通告</a>
	</div>
	</br>
	<div id="info" style=" margin-left:10px;">
		<table id="mytable" cellspacing="0" >  
  			<tr>  
    			<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>  
    			<th scope="col" width="150px" >学年</th> 
    			<th scope="col" width="200px" >标题</th>   
    			<th scope="col" width="80px" >评估时间段</th>
    			<th scope="col" width="100px" >发布时间</th>
    			<th scope="col" width="50px" >操作</th>
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['al'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['al']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['name'] = 'al';
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total']);
?>
 		 	<tr >  
    			<td style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['article_id'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['article_xuenian'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['article_title'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['article_begin_time'];?>
至<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['article_end_time'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['article_create_time'];?>
</td>
			<td>
		    	[<a onClick="return confirm('确认要删除？');" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/school/index/type/1/do/del/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['article_id'];?>
">删除</a>]
			</td>
  		</tr>  
  		<?php endfor; else: ?>
 		 <tr >
    		<th class="spec" colspan="6">暂无评估通告！</td>
  		</tr>
  		<?php endif; ?>
	</table> 
	<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/school/index/type/".((string)$_smarty_tpl->tpl_vars['type']->value)),$_smarty_tpl);?>
 
	</div>
	<?php }elseif($_smarty_tpl->tpl_vars['type']->value==2){?>
		</br>
     <div id="notice_search" style="margin-left:20px;float: left">
        评估:
        <select name="pingguxiangmu" id="pingguxiangmu">
            <option value="0" <?php if ($_smarty_tpl->tpl_vars['isnew']->value==0){?> selected="selected" <?php }?>>学年末评估</option>
            <option value="1" <?php if ($_smarty_tpl->tpl_vars['isnew']->value==1){?> selected="selected" <?php }?>>新生入学</option>
        </select>
     </div>

     <div id="anniu_search" style="margin-left:30px;">
         <input type="button" id= "chaxuan_bj" onclick="chaxun_banji();" style="width:80px; height:25px;" value="查询" />
     </div><br>
		<div style="margin-left:200px;margin-top:0px;background-color:white;width:400px;height:30px;font-size:20px;">
			各个学院评估进度表
		</div>
		</br>
			<div id="info" style=" margin-left:10px;">
		<table id="mytable" cellspacing="0" >  
  			<tr>  
    			<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>  
    			<th scope="col" width="200px" >学院</th> 
    			<th scope="col" width="380px" >进度</th>   
  			</tr>  
  			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['name'] = 'cl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cl']['total']);
?>
 		 	<tr>  
    			<td style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_id'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_name'];?>
</td>
                <?php if ($_smarty_tpl->tpl_vars['isnew']->value==0){?>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_isstate']==0){?>
                    <div class="jindu">
                        <div class="jindu-weiqidong"></div>
                    </div>
                    <div class="jindu_text">
                        未启动
                    </div>
                    <div style="clear:both;"></div>
                    <?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_isstate']==1){?>
                    <div class="jindu">
                        <div class="jindu-daishenhe"></div>
                    </div>
                    <div class="jindu_text">
                        待审核
                    </div>
                    <?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_isstate']==2){?>
                    <div class="jindu">
                        <div class="jindu-gognshi"></div>
                    </div>
                    <div class="jindu_text">
                        公示
                    </div>
                    <?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_isstate']==3){?>
                    <div class="jindu">
                        <div class="jindu-xuanjiang"></div>
                    </div>
                    <div class="jindu_text">
                        宣讲
                    </div>
                    <?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_isstate']==4){?>
                    <div class="jindu">
                        <div class="jindu-pinggu"></div>
                    </div>
                    <div class="jindu_text">
                        评估
                    </div>
                    <?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_isstate']==5){?>
                    <div class="jindu">
                        <div class="jindu-jiesu"></div>
                    </div>
                    <div class="jindu_text">
                        结束
                    </div>
                    <?php }else{ ?>
                    <?php }?>
                </td>
                <?php }else{ ?>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_xsstate']==0){?>
                    <div class="jindu">
                        <div class="jindu-weiqidong"></div>
                    </div>
                    <div class="jindu_text">
                        未启动
                    </div>
                    <div style="clear:both;"></div>
                    <?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_xsstate']==1){?>
                    <div class="jindu">
                        <div class="jindu-daishenhe"></div>
                    </div>
                    <div class="jindu_text">
                        待审核
                    </div>
                    <?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_xsstate']==2){?>
                    <div class="jindu">
                        <div class="jindu-gognshi"></div>
                    </div>
                    <div class="jindu_text">
                        公示
                    </div>
                    <?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_xsstate']==3){?>
                    <div class="jindu">
                        <div class="jindu-xuanjiang"></div>
                    </div>
                    <div class="jindu_text">
                        宣讲
                    </div>
                    <?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_xsstate']==4){?>
                    <div class="jindu">
                        <div class="jindu-pinggu"></div>
                    </div>
                    <div class="jindu_text">
                        评估
                    </div>
                    <?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['cl']['index']]['college_xsstate']==5){?>
                    <div class="jindu">
                        <div class="jindu-jiesu"></div>
                    </div>
                    <div class="jindu_text">
                        结束
                    </div>
                    <?php }else{ ?>
                    <?php }?>
                </td>
                <?php }?>

  		</tr>  
  		<?php endfor; endif; ?>
     </table>
        <?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/school/index/type/".((string)$_smarty_tpl->tpl_vars['type']->value)."/selected/".((string)$_smarty_tpl->tpl_vars['isnew']->value)),$_smarty_tpl);?>

	</div>
	<?php }elseif($_smarty_tpl->tpl_vars['type']->value==3){?>
	<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">
		<font id="result" color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font>
	</div>
	</br>
	<div id="leixing_search" style="margin-left:20px;">
		学年:
		<select name="xuenian" id="xuenian"> 
		<option value="" <?php if ($_smarty_tpl->tpl_vars['year']->value==''){?>selected="selected"<?php }?> >全部</option>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['xl'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['xl']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['name'] = 'xl';
$_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['xuenian']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['xl']['total']);
?>
		<option value="<?php echo $_smarty_tpl->tpl_vars['xuenian']->value[$_smarty_tpl->getVariable('smarty')->value['section']['xl']['index']]['asspro_xuenian'];?>
" <?php if ($_smarty_tpl->tpl_vars['year']->value==$_smarty_tpl->tpl_vars['xuenian']->value[$_smarty_tpl->getVariable('smarty')->value['section']['xl']['index']]['asspro_xuenian']){?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['xuenian']->value[$_smarty_tpl->getVariable('smarty')->value['section']['xl']['index']]['asspro_xuenian'];?>
</option>
		<?php endfor; endif; ?>
		</select>
		&nbsp;
		状态：
		<select name="state" id="state"> 
		<option value="4" <?php if ($_smarty_tpl->tpl_vars['state']->value==4){?>selected="selected"<?php }?> >全部</option>
		<option value="0" <?php if ($_smarty_tpl->tpl_vars['state']->value==0){?>selected="selected"<?php }?> >未审核</option>
		<option value="1" <?php if ($_smarty_tpl->tpl_vars['state']->value==1){?>selected="selected"<?php }?> >通过</option>
		<option value="2" <?php if ($_smarty_tpl->tpl_vars['state']->value==2){?>selected="selected"<?php }?> >未通过</option>
		<option value="3" <?php if ($_smarty_tpl->tpl_vars['state']->value==3){?>selected="selected"<?php }?> >已生效</option>
		</select>
		&nbsp;
		<input id="button-search" name="button-search" type="button" value="查询" onclick="searchlist();"/>
	</div>
	</br>
	<div id="info" style=" margin-left:10px;">
		<table id="mytable" cellspacing="0" >  
  			<tr>  
    			<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>  
    			<th scope="col" width="80px" >学年</th> 
    			<th scope="col" width="120px" >学院</th>   
    			<th scope="col" width="150px" >标题</th>
    			<th scope="col" width="100px" >发布时间</th>
    			<th scope="col" width="50px" >状态</th>
    			<th scope="col" width="100px" >操作</th>
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
    			<td style="border-left:1px solid #adceff;" ><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pl']['index_next'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['asspro_xuenian'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['college_name'];?>
</td>
    			<td onclick="showMes(<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['asspro_id'];?>
)" style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['asspro_title'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['asspro_create_time'];?>
</td>
    			<td>
    			<?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['asspro_state']==0){?>
    			未审核
    			<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['asspro_state']==1){?>
    			通过
    			<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['asspro_state']==2){?>
    			未通过
    			<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['asspro_state']==3){?>
    			已生效
    			<?php }else{ ?>
    			<?php }?>
    			</td>
    			<td>
    			<?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['asspro_state']==0){?>
    			[<a href="#" onclick="setState(<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['asspro_id'];?>
,1)">通过</a>]
    			[<a href="#" onclick="setState(<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['asspro_id'];?>
,2)">不通过</a>]
    			<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['asspro_state']==1){?>
    			[<a href="#" onclick="setState(<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['asspro_id'];?>
,3)">生效</a>]
    			[<a href="#" onclick="setState(<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['pl']['index']]['asspro_id'];?>
,2)">不通过</a>]
    			<?php }else{ ?>
    			<?php }?>
    			</td>
  		</tr>  
  		<?php endfor; else: ?>
 		 <tr >
    		<th class="spec" colspan="7">暂无评估细则！</td>
  		</tr>
  		<?php endif; ?>
	</table> 
	<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/school/index/type/".((string)$_smarty_tpl->tpl_vars['type']->value)."/xuenian/".((string)$_smarty_tpl->tpl_vars['year']->value)."/state/".((string)$_smarty_tpl->tpl_vars['state']->value)),$_smarty_tpl);?>
 
	</div>
	<?php }elseif($_smarty_tpl->tpl_vars['type']->value==4){?>
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
		<option value="<?php echo $_smarty_tpl->tpl_vars['noticelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pgtgl']['index']]['article_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['select']->value==$_smarty_tpl->tpl_vars['noticelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pgtgl']['index']]['article_id']){?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['noticelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pgtgl']['index']]['article_title'];?>
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
        <option value="2015" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2013){?>selected="selected"<?php }?>>2015</option>
        <option value="2016" <?php if ($_smarty_tpl->tpl_vars['grade']->value==2014){?>selected="selected"<?php }?>>2016</option>
		</select>
		&nbsp;
		学院：
		<select name="xuesheng_xueyuan" id="xuesheng_xueyuan"> 
		<option value="0"  <?php if ($_smarty_tpl->tpl_vars['college']->value==0){?>selected="selected"<?php }?>>所有</option>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['name'] = 'xsxy';
$_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['colllist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['xsxy']['total']);
?>
		<option value="<?php echo $_smarty_tpl->tpl_vars['colllist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['xsxy']['index']]['college_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['college']->value==$_smarty_tpl->tpl_vars['colllist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['xsxy']['index']]['college_id']){?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['colllist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['xsxy']['index']]['college_name'];?>
</option>
		<?php endfor; endif; ?>
		</select>
		专业：
		<select name="xuesheng_zhuanye" id="xuesheng_zhuanye"> 
		<option value="0" selected="selected">所有</option>
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
  				</tr>
  			<?php endfor; else: ?>
  				<th class="spec" colspan="<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
">暂无评估学生！</td>
  			<?php endif; ?>
		</table> 
		<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/school/index/type/".((string)$_smarty_tpl->tpl_vars['type']->value)."/selected/".((string)$_smarty_tpl->tpl_vars['select']->value)."/grade/".((string)$_smarty_tpl->tpl_vars['grade']->value)."/major/".((string)$_smarty_tpl->tpl_vars['major']->value)."/college/".((string)$_smarty_tpl->tpl_vars['college']->value)),$_smarty_tpl);?>
 
	</div>
	<?php }?>
	<div id="mask" class="mask"></div>
	<div id="pop">
		<div class="add-pop-form-header">
			<div class="add-pop-form-title" id="pop-title"></div>
			<div class="pop-closebtn" id="pop-close">关闭</div>
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