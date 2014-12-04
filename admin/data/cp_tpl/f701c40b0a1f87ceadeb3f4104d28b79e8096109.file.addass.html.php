<?php /* Smarty version Smarty-3.1.14, created on 2014-10-28 09:32:38
         compiled from "admin\tpl\college\addass.html" */ ?>
<?php /*%%SmartyHeaderCode:28972544ef236ecf4b8-47824816%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f701c40b0a1f87ceadeb3f4104d28b79e8096109' => 
    array (
      0 => 'admin\\tpl\\college\\addass.html',
      1 => 1412909654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28972544ef236ecf4b8-47824816',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'zbdj' => 0,
    'info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544ef237092451_76290810',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ef237092451_76290810')) {function content_544ef237092451_76290810($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/bootstrap/bootstrap.min.css">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/bootstrap/bootstrap.min.js"></script>
<title>学院评估工作-制定评估细则</title>
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

.file_box {
    position: relative;
    height: 100%;
    margin: 0 auto;
}

.file_input {
    position: absolute;
    top: 0;
    right: 80px;
    height: 24px;
    filter: alpha(opacity:0);
    opacity: 0;
}
</style>
<script type="text/javascript">
    //添加附件的js
    function add(ele) {
        if ($(ele).text() == "删除") {
            $($(ele).parent()).remove();
        } else {
            $($(ele).next()).trigger('click');
        }
    }
    function fileChoose(ele) {
        $($(ele).next()).text($(ele).val());
        $($(ele).prev()).text("删除")
        $("#file_contain").append('<div class="file_block"><button  type="button" class="btn btn-danger btn-xs" onclick="add(this)">继续添加</button> 	<input  name="file[]" type="file" class="file_input"  onchange="fileChoose(this)">	<span></span>	</div>');
    }
	
	 function addTr(objBtn, cn_type_name, en_type_name){
	     //获取table最后一行 $("#tab tr:last")
	     //获取table第一行 $("#tab tr").eq(0)
	     //获取table倒数第二行 $("#tab tr").eq(-2)
	     var row = objBtn.parentNode.parentNode.rowIndex;
	     //alert(row);
	     var $tr=$("#mytable"+" tr").eq(row);
	     if($tr.size()==0){
	        alert("指定的table id或行数不存在！");
	        return;
	     }
	     var str = "<tr class=\""+en_type_name+"\">";
	     str += "<td style=\"border-left:1px solid #adceff;\">"+cn_type_name+"</td>";
	     str += "<td class=\""+en_type_name+"-second\"><input type=\"text\" class=\"input_class\"/></td>";
	     str +="<td class=\""+en_type_name+"-third\"><input type=\"text\" class=\"input_class\" /></td>";
	     str +="<td><input type=\"button\" value=\"删除本行\" onclick=\"delTr(this)\" /><input type=\"button\" value=\"确定\" onclick=\"btn_ok(this,'0')\" /><input type=\"button\" value=\"增加下一行\" onclick=\"addTr(this,'"+cn_type_name+"','"+en_type_name+"')\" /></td>";
	     str += "</tr>";
	     $tr.after(str);
	  }
	 
	 function changeValue(objBtn, flag){
		 $(objBtn).val("确定");
		 if (flag == '0'){
			 $(objBtn).attr("onclick","btn_ok(this,'0')"); 
			 var row = objBtn.parentNode.parentNode.rowIndex;
			 var second_text = document.getElementById("mytable").rows[row].cells[1].innerHTML;
			 var third_text = document.getElementById("mytable").rows[row].cells[2].innerHTML;
			 var second_str = "<input type=\"text\" value=\""+second_text+"\" class=\"input_class\" />";
			 var third_str = "<input type=\"text\" value=\""+third_text+"\" class=\"input_class\" />";
			 document.getElementById("mytable").rows[row].cells[1].innerHTML = second_str;
			 document.getElementById("mytable").rows[row].cells[2].innerHTML = third_str;
		 }else{
			 $(objBtn).attr("onclick","btn_ok(this,'1')"); 
			 var row = objBtn.parentNode.parentNode.rowIndex;
			 //var second_text = document.getElementById("mytable").rows[row].cells[1].innerHTML;
			 var third_text = document.getElementById("mytable").rows[row].cells[2].innerHTML;
			 var third_str = "<input type=\"text\" value=\""+third_text+"\" class=\"input_class\" />";
			 //document.getElementById("mytable").rows[row].cells[1].innerHTML = second_str;
			 document.getElementById("mytable").rows[row].cells[2].innerHTML = third_str;
		 }
		// alert(document.getElementById("mytable").rows[row].cells[1].getElementsByTagName('input').value); 
	 }
	 function btn_ok(objBtn, flag){
		 if (flag == '0'){
			 var row = objBtn.parentNode.parentNode.rowIndex;
			 var second_str = document.getElementById("mytable").rows[row].cells[1].getElementsByTagName('input')[0].value;
			 var third_str = document.getElementById("mytable").rows[row].cells[2].getElementsByTagName('input')[0].value;
			 if (second_str == "" || third_str == ""){
				 alert("评估指标不能为空！");
			 }else{
				 $(objBtn).val("修改");
				 $(objBtn).attr("onclick","changeValue(this,'0')");
				 document.getElementById("mytable").rows[row].cells[1].innerHTML = second_str.replace(/,/g,"，");
				 document.getElementById("mytable").rows[row].cells[2].innerHTML = third_str.replace(/,/g,"，"); 
			 }
		 }else{
			 var row = objBtn.parentNode.parentNode.rowIndex;
			// var second_str = document.getElementById("mytable").rows[row].cells[1].getElementsByTagName('input')[0].value;
			 var third_str = document.getElementById("mytable").rows[row].cells[2].getElementsByTagName('input')[0].value;
			// document.getElementById("mytable").rows[row].cells[1].innerHTML = second_str;
			if (third_str == ""){
				 alert("评估指标不能为空！");
			}else{
				$(objBtn).val("修改");
				$(objBtn).attr("onclick","changeValue(this,'1')");
				document.getElementById("mytable").rows[row].cells[2].innerHTML = third_str.replace(/,/g,"，");
			}
		 }
	 }
	 
	 function delTr(objBtn){
		 if (!confirm("确定要删除！")){
			 return false;
		 }
		 var tb = document.getElementById('mytable');
		 var tr = objBtn.parentNode.parentNode;
		 tb.deleteRow(tr.rowIndex);
	 }
	 
	 function tijiao(){

	 var title = $("#title").val();
		 var leixing = $("#leixing").val();
		 if (title == ""){
			 alert("请填写标题")
			 $("#title").focus();
			 return false;
		 }
		if ($(".input_class").length > 0){
			alert("有正在编辑的，请先保存！");
			return false;
		}
		var gong_num = $(".gong").length;
		var neng_num = $(".neng").length;
		var second = "";
		var third = "";
		if ($(".gong").length > 0){
			var y = $(".gong").length - 1;
			$(".gong-second").each(function(index, item){
				if (index < y){
					second += $(item).text();
					second += ",";
				}else{
					if ($(".neng").length > 0){
						second += $(item).text();
						second += ",";
					}else{
						second += $(item).text();
					}
				}
			});
			$(".gong-third").each(function(i, ele){
				if (i < y){
					third += $(ele).text();
					third += ",";
				}else{
					if ($(".neng").length > 0){
						third += $(ele).text();
						third += ",";
					}else{
						third += $(ele).text();
					}
				}
			});
		}
		if($(".neng").length > 0){
			var z = $(".neng").length - 1;
			$(".neng-second").each(function(j,elem){
				if (j < z){
					second += $(elem).text();
					second += ","
				}else{
					second += $(elem).text();
				}
			});
			$(".neng-third").each(function(a,aele){
				if (a < z){
					third += $(aele).text();
					third += ","
				}else{
					third += $(aele).text();
				}
			});
		}


         document.getElementById("title2").value=title;
         document.getElementById("leixing2").value=leixing;
         document.getElementById("gong_num").value=gong_num;
         document.getElementById("neng_num").value=neng_num;
         document.getElementById("second").value=second;
         document.getElementById("third").value=third;
         $("#form1").submit();

	 }
	 function chongzhi(){
		 location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/college/addass";
	 }

//uoqu
    $(function(){
        var mm= document.getElementById("error").innerHTML;
        if(mm){
            alert(mm);
        }
    });
</script>
</head>
<body>
	<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
  		<TR height=28><TD background=images/title_bg1.jpg>当前位置:学院评估工作-制定评估细则</TD></TR>
  		<TR><TD bgColor=#b1ceef height=1></TD></TR>
  		<TR height=20>
    		<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
		</TR>
	</TABLE>
	<div id="title-container" class = "title-container" >
		<div class="title">
		标题：<input type="text" id="title" value="" style="width:400px;height:20px;"/>
		</div>
		<div style="clear:both;" ></div>
	</div>
	<div id="leixing-container" class = "title-container" >
		<div class="title">
		类型：
		<select id="leixing">
			<option value="0">学年末</option>
			<option value="1">新生入学后</option>
		</select>
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
    			<th scope="col" width="200px" >操作</th>
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
    			<td>
    			<input type="button" value="修改" onclick="changeValue(this,'1')" />
    			<input type="button" value="增加下一行" onclick="addTr(this,'公','gong')" />
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
    			<td>
    			<input type="button" value="修改" onclick="changeValue(this,'1')"/>
    			<input type="button" value="增加下一行" onclick="addTr(this,'能','neng')" />
    			</td>
  			</tr>
  			<?php endfor; endif; ?>
           	</table>
        <form id="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/college/insertass"  enctype="multipart/form-data">

        <input id="title2" name="title" type="text" style="display: none"/>
        <input id="leixing2" name="leixing" type="text" style="display: none"/>
        <input id="gong_num" name="gong_num" type="text" style="display: none"/>
        <input id="neng_num" name="neng_num" type="text" style="display: none"/>
        <input id="second" name="second" type="text" style="display: none"/>
        <input id="third" name="third" type="text" style="display: none"/>
            <tr>
                <td height="40">
                    上传附件：
                </td>
                <td height="40" colspan="2" id="pic">&nbsp;
                    <div class="file_box">
                        <div id="file_contain">
                            <div class="file_block">
                                <button type='button' class="btn btn-danger btn-xs" onclick="add(this)"/>
                                添加附件</button>
                                <input name="file[]" type="file" class="file_input" onchange="fileChoose(this)">
                                <span></span>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
       </form>

	</div>
	<div class ="meau-container">
       <div class="pinggu-meau">
       		<div style="padding-left:250px;padding-top:10px;height:20px; float:left;">
      		 	<div class="pinggu-meau-btn" onclick="tijiao()">
       			提交
       			</div>
       			<div class="pinggu-meau-btn" onclick="chongzhi()">
       			重置
       			</div>
       		</div>
       	</div>
    </div>
</body>
</html><?php }} ?>