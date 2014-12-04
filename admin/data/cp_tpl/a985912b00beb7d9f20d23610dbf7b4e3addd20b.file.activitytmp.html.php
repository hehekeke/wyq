<?php /* Smarty version Smarty-3.1.14, created on 2014-11-29 15:16:05
         compiled from "admin\tpl\addactivity\activitytmp.html" */ ?>
<?php /*%%SmartyHeaderCode:21018544de743802d39-48878759%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a985912b00beb7d9f20d23610dbf7b4e3addd20b' => 
    array (
      0 => 'admin\\tpl\\addactivity\\activitytmp.html',
      1 => 1417245073,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21018544de743802d39-48878759',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544de743c7f3a1_49085542',
  'variables' => 
  array (
    'web_url' => 0,
    'ac_type' => 0,
    'typeInfo' => 0,
    'show_type' => 0,
    'msg' => 0,
    'result' => 0,
    'list' => 0,
    'activityInfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544de743c7f3a1_49085542')) {function content_544de743c7f3a1_49085542($_smarty_tpl) {?><?php if (!is_callable('smarty_function_page')) include 'C:\\Myphp\\apache\\htdocs\\nkgn\\been/View/plugins\\function.page.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<title>辅学活动维护</title>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
<script type="text/javascript">
	function searchtipslist(){
		var typeId = $("#his_type").val();
        var level = $("#level").val();
        var weekYear = $("#weekYear").val();

        $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/activity/selectHisActivity",{"typeId":typeId,"level":level,"weekYear":weekYear},function(data){

            data=eval("("+data+")");

            var innerHtml='';
            innerHtml+='<table id="listTable" style="margin-top:20px" cellspacing="0" ><tr> <th scope="col" width="50px" class="mytr" ></th>' +
                    '<th scope="col" width="400px" class="mytr" >名称</th>' +
                    '<th scope="col" width="80px" class="mytr" >专业性级别</th>' +
                    '<th scope="col" width="80px" class="mytr" >活动类型</th>' +
                    '<th scope="col" width="80px" class="mytr" >创建时间</th>' +
                    '<th scope="col" width="80px" class="mytr" >类型</th></tr>';
            for(var i=0;i<data.length;i++){
                var classT='';
                if(data[i].activity_class == '1'){
                    classT='周活动';
                }else{
                    classT='年活动';
                }
                innerHtml+='<tr>';
                innerHtml+='<td scope="col" width="50px" class="mytr" ><input type="checkBox" value="'+data[i].activity_id+'"></td>';
                innerHtml+='<td scope="col" width="400px" class="mytr" >'+data[i].activity_title+'</td> ';
                innerHtml+='<td scope="col" width="80px" class="mytr" >'+data[i].activity_level+'</td>';
                innerHtml+='<td scope="col" width="80px" class="mytr" >'+data[i].at_name+'</td>';
                innerHtml+='<td scope="col" width="80px" class="mytr" >'+data[i].activity_create_time+'</td>';
                innerHtml+='<td scope="col" width="80px" class="mytr" >'+classT+'</td>';
                innerHtml+='</tr>';

            }
            innerHtml+='</table>';
            innerHtml+='</br><input type="button" value="添加" id="sure" onclick="mksuref();">';
            $("#listDiv").html(innerHtml);

        });
		//要记得该type
		//location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/activity/selectActivity/type/1;
	}
	//点击事件
	function mksuref(){
		//alert('aaaa');
		var ins=$("input:checkBox");
		//alert(ins.length);
		var reCheck=new Array();
		var i=0;
		for(var j=0;j<ins.length;j++){
			if(ins[j].checked==true){
				reCheck[i]=ins[j].value;
				i++;
			}
		}
		var returnArr=JSON.stringify(reCheck);
		//alert(returnArr);
		//回传给函数
		var activity_class=$("#flag").val();
		$.post('<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ActivityFromH',{"checkedValue":returnArr,"activity_class":activity_class},function(data){
			if(data=='1'){
				$("#historyList").append('添加成功，<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ActivityList">点此返回</a>');
			}
			if(data=='2'){
				$("#historyList").append('请选择至少一项，<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ActivityList">点此返回</a>');
			}
	    });
	}
	function addFromHis(page){
		$(".mengban").show();
		$(".hideDiv").show();
        
		$.post('<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ActivityList',{"is_ajex":'1',"shenhe":'6',"ajaxPage":page},function(data){

			data=eval("("+data+")");

            var innerHtml='';
            innerHtml+='<table id="listTable" style="margin-top:20px" cellspacing="0" ><tr> <th scope="col" width="50px" class="mytr" ></th>' +
                    '<th scope="col" width="400px" class="mytr" >名称</th>' +
                    '<th scope="col" width="80px" class="mytr" >专业性级别</th>' +
                    '<th scope="col" width="80px" class="mytr" >活动类型</th>' +
                    '<th scope="col" width="80px" class="mytr" >创建时间</th>' +
                    '<th scope="col" width="80px" class="mytr" >类型</th></tr>';
			for(var i=0;i<data['list'].length;i++){
                var classT='';

                if(data['list'][i].activity_class == '1'){
                    classT='周活动';
                }else{
                    classT='年活动';
                }
                innerHtml+='<tr>';
                innerHtml+='<td scope="col" width="50px" class="mytr" ><input type="checkBox" value="'+data['list'][i].activity_id+'"></td>';
                innerHtml+='<td scope="col" width="400px" class="mytr" >'+data['list'][i].activity_title+'</td> ';
                innerHtml+='<td scope="col" width="80px" class="mytr" >'+data['list'][i].activity_level+'</td>';
                innerHtml+='<td scope="col" width="80px" class="mytr" >'+data['list'][i].at_name+'</td>';
                innerHtml+='<td scope="col" width="80px" class="mytr" >'+data['list'][i].activity_create_time+'</td>';
                innerHtml+='<td scope="col" width="80px" class="mytr" >'+classT+'</td>';
                innerHtml+='</tr>';

       			}

            innerHtml+='</table>';
            innerHtml+='</br><input type="button" value="添加" id="sure" onclick="mksuref();">';
//            innerHtml+='<div id="ajPage" style="text-align: center">';
            innerHtml+='<a onclick="firstPage()">首页</a>';
            if(data["page"]>1){
                innerHtml+='<a onclick="prePage()">上一页</a>';
            }
            if(data['page']<data['totalPage']){
                innerHtml+='<a onclick="nextPage()">下一页</a>';
            }
            innerHtml+='<a onclick="lastPage()">尾页</a>';
//            innerHtml+='</div>';
            $("#page").val(data["page"]);
            $("#total").val(data['total']);
            $("#totalPage").val(data['totalPage']);
            $("#listDiv").html(innerHtml);

			});

		}
    function nextPage(){
        var page = $('#page').val();
        page = parseInt(page)+1;
        addFromHis(page);
    }
    function prePage(){
        var page = $('#page').val();
        page = parseInt(page)-1;
        addFromHis(page);
    }
        function firstPage(){
            var page = 1
            addFromHis(1);
        }
    function lastPage(){
        var page = $("#totalPage").val();
        addFromHis(page);
    }
</script>
</head>
<body>
<style type="text/css">
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
.hideDiv{
	width:900px;
	height:500px;
	background-color:white;
	position:absolute;
	top:5%;
	z-index:999;
	left:10%;display:none;
	padding:10px;
}
.mengban{
	height:100%;
	width:100%;
	background-color:black;
	position:absolute;
	filter:alpha(opacity=50);
	-moz-opacity:0.5;
	z-index:998;
	-khtml-opacity: 0.5;
	opacity: 0.5;
    display:none;
}
.mytr{
	border:1px solid #adceff;
    text-align:center;
}
</style>
<body>
<div class="mengban">
</div>
<div class="hideDiv" id="historyList">
    <div id="leixing_search" style="margin-left:20px;">
            <input type="hidden" name="showRemove" value="1" />
            活动类型:
            <select name="ac_type" id="his_type" style="width:100px;margin-left:10px;">
                <option value="0">全部</option>
                <?php  $_smarty_tpl->tpl_vars['typeInfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['typeInfo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ac_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['typeInfo']->key => $_smarty_tpl->tpl_vars['typeInfo']->value){
$_smarty_tpl->tpl_vars['typeInfo']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['typeInfo']->value['at_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['typeInfo']->value['at_name'];?>
</option>
                <?php } ?>
            </select>
            &nbsp;
            专业性级别：
            <select id="level">
                <option value="-1">全部</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            &nbsp;
            类型:
            <select id="weekYear">
                <option value="-1">全部</option>
                <option value="1">周活动</option>
                <option value="0">年活动</option>
            </select>
             &nbsp;
            <input type="button" value="查询" onclick="searchtipslist()">
     </div>
    <div id="listDiv">
    <table id="listTable" style="margin-top:20px" cellspacing="0" >
        <tr>
            <th scope="col" width="50px" class="mytr" ></th>
            <th scope="col" width="400px" class="mytr" >名称</th>
            <th scope="col" width="80px" class="mytr" >专业性级别</th>
            <th scope="col" width="80px" class="mytr" >活动类型</th>
            <th scope="col" width="80px" class="mytr" >创建时间</th>
            <th scope="col" width="80px" class="mytr" >类型</th>
        </tr>
     </table>
     </div>
    <input type="hidden" id="total"/>
    <input type="hidden" id="totalPage"/>
    <input type="hidden" id="page"/>
</div>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
	<?php if ($_smarty_tpl->tpl_vars['show_type']->value==0){?>
  		<TR height=28><TD background=images/title_bg1.jpg>当前位置:学年活动维护</TD></TR>
	<?php }else{ ?>
		<TR height=28><TD background=images/title_bg1.jpg>当前位置:周活动维护</TD></TR>
	<?php }?>

  	<TR><TD bgColor=#b1ceef height=1></TD></TR>
  	<TR height=20>
    	<TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
	</TR>
</TABLE>

</br>
<div id="leixing_search" style="margin-left:20px;">
<form action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/Addactivity/ActivityList/type/<?php echo $_smarty_tpl->tpl_vars['show_type']->value;?>
" method="post">
<input type="hidden" name="showRemove" value="1" />
		类别:
		<select name="ac_type" id="ac_type" style="width:100px;margin-left:10px;">

		<option value="0">全部</option>
		<?php  $_smarty_tpl->tpl_vars['typeInfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['typeInfo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ac_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['typeInfo']->key => $_smarty_tpl->tpl_vars['typeInfo']->value){
$_smarty_tpl->tpl_vars['typeInfo']->_loop = true;
?>
       	 <option value="<?php echo $_smarty_tpl->tpl_vars['typeInfo']->value['at_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['typeInfo']->value['at_name'];?>
</option>
		<?php } ?>
		</select>
		&nbsp;
		审核状态:
		<select name="shenhe" id="shenhe"  style="width:100px;margin-left:10px;">
			<option value="-1" selected="selected">全部</option>
			<option value="3">未提交</option>
			<option value="0">待审核</option>
			<!--<option value="5">未发布</option>
			<option value="6">已发布</option>
			<option value="1" >审核通过</option>-->
			<option value="2" >审核未通过</option>
		</select>
		关键字:
		<input type="text" name="keywords"  style="width:100px;margin-left:10px;margin-left:10px;"/>
		<input id="button-leixing" name="button-leixing" type="submit" value="查询" onclick="searchtipslist();"/>
</form>
</div>
</br>
<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['show_type']->value;?>
" id="flag"/>
<div style="margin-left:10px;padding-top:10px;background-color:white;width:800px;height:30px; ">
	<?php if ($_smarty_tpl->tpl_vars['show_type']->value==0){?>
	<font color="red"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</font>
	<div style="float:right;margin-right:20px"><a><font color="blue" onclick="addFromHis()">从历史库添加</font></a></div>
	<div style="float:right;margin-right:20px"><a href ="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/addactivity/addANew/type/0" >添加新活动</a></div>
	<?php }else{ ?>
	<font color="red"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</font>
	<div style="float:right;margin-right:20px"><a><font color="blue" onclick="addFromHis()">从历史库添加</font></a></div>
	<div style="float:right;margin-right:20px"><a href ="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/addactivity/addANew/type/1" >添加新活动</a></div>
	<?php }?>
</div>
<div id="info" style=" margin-left:10px;">
	<font color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font>
	<table id="mytable" cellspacing="0" >
  		<tr>
    		<th scope="col" width="50px" style="border-left:1px solid #adceff;" >序号</th>
    		<th scope="col" width="250px" >名称</th>
    		<th scope="col" width="50px" >类型</th>
    		<th scope="col" width="100px" >审核状态</th>
    		<th scope="col" width="250px" >操作</th>
  		</tr>

		<?php  $_smarty_tpl->tpl_vars['activityInfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['activityInfo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['activityInfo']->key => $_smarty_tpl->tpl_vars['activityInfo']->value){
$_smarty_tpl->tpl_vars['activityInfo']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['activityInfo']->value!==false){?>
 		 <tr>
		    <?php if ($_smarty_tpl->tpl_vars['activityInfo']->value['activity_approval']<5){?>
    		<td style="border-left:1px solid #adceff;" >★</td>
    		<td><?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_title'];?>
</td>
    		<td><?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['at_name'];?>
</td>
			<?php }?>

    		<?php if ($_smarty_tpl->tpl_vars['activityInfo']->value['activity_approval']==0&&$_smarty_tpl->tpl_vars['activityInfo']->value['activity_remove']==1){?>
			<td>待审核</td>
			<td>
				[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ViewActivity/id/<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_id'];?>
">查看</a>]&nbsp;&nbsp;
		    	[<a onClick="" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ViewActivity02/type/<?php echo $_smarty_tpl->tpl_vars['show_type']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_id'];?>
">撤销</a>]
		   	</td>
			<?php }elseif($_smarty_tpl->tpl_vars['activityInfo']->value['activity_approval']==4&&$_smarty_tpl->tpl_vars['activityInfo']->value['activity_remove']==1){?>
			<td>待审核</td>
			<td>
				[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ViewActivity/id/<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_id'];?>
">查看</a>]&nbsp;&nbsp;
		    	[<a onClick="return confirm('确认要撤销？');" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ViewActivity02/type/<?php echo $_smarty_tpl->tpl_vars['show_type']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_id'];?>
">撤销</a>]

			</td>
             <?php }elseif($_smarty_tpl->tpl_vars['activityInfo']->value['activity_approval']<5&&$_smarty_tpl->tpl_vars['activityInfo']->value['activity_remove']==0){?>
             <td>已撤销</td>
             <td>
                 [ <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ViewActivity/id/<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_id'];?>
">查看</a>]&nbsp;&nbsp;
             </td>
             <?php }elseif($_smarty_tpl->tpl_vars['activityInfo']->value['activity_approval']==1&&$_smarty_tpl->tpl_vars['activityInfo']->value['activity_ispublish']==0){?>
             <td>未发布</td>
             <td>
                 [<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ViewActivity/id/<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_id'];?>
">查看</a>]&nbsp;&nbsp;
                 [<a onClick="return confirm('确认要撤销？');" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ViewActivity02/type/<?php echo $_smarty_tpl->tpl_vars['show_type']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_id'];?>
">撤销</a>]
             </td>
			<?php }elseif($_smarty_tpl->tpl_vars['activityInfo']->value['activity_approval']==1&&$_smarty_tpl->tpl_vars['activityInfo']->value['activity_ispublish']==1&&$_smarty_tpl->tpl_vars['activityInfo']->value['activity_remove']==1&&time()<strtotime($_smarty_tpl->tpl_vars['activityInfo']->value['activity_start_time'])){?>
			<td>未开始</td>
			<td>
				[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ViewActivity/id/<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_id'];?>
">查看</a>]&nbsp;&nbsp;
				[<a onClick="return confirm('确认要撤销？');" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/removeActivity/type/<?php echo $_smarty_tpl->tpl_vars['show_type']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_id'];?>
">撤销</a>]
			</td>
             <?php }elseif($_smarty_tpl->tpl_vars['activityInfo']->value['activity_approval']==1&&$_smarty_tpl->tpl_vars['activityInfo']->value['activity_ispublish']==1&&$_smarty_tpl->tpl_vars['activityInfo']->value['activity_remove']==1&&time()>=strtotime($_smarty_tpl->tpl_vars['activityInfo']->value['activity_start_time'])&&time()<=strtotime($_smarty_tpl->tpl_vars['activityInfo']->value['activity_end_time'])){?>
             <td>进行中</td>
             <td>
                 [<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ViewActivity/id/<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_id'];?>
">查看</a>]&nbsp;&nbsp;
             </td>
             <?php }elseif($_smarty_tpl->tpl_vars['activityInfo']->value['activity_approval']==1&&$_smarty_tpl->tpl_vars['activityInfo']->value['activity_ispublish']==1&&$_smarty_tpl->tpl_vars['activityInfo']->value['activity_remove']==1&&time()>strtotime($_smarty_tpl->tpl_vars['activityInfo']->value['activity_end_time'])){?>
             <td>已结束</td>
             <td>
                 [<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ViewActivity/id/<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_id'];?>
">查看</a>]&nbsp;&nbsp;
             </td>
			<?php }elseif($_smarty_tpl->tpl_vars['activityInfo']->value['activity_approval']==2&&$_smarty_tpl->tpl_vars['activityInfo']->value['activity_remove']==1){?>
			<td>未通过</td>
			<td>
				[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/ViewActivity/id/<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_id'];?>
">查看</a>]&nbsp;&nbsp;
			</td>
			<?php }elseif($_smarty_tpl->tpl_vars['activityInfo']->value['activity_approval']==3&&$_smarty_tpl->tpl_vars['activityInfo']->value['activity_remove']==1){?>
			<td>未提交</td>
			<td>
				[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/editActivity/id/<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_id'];?>
">修改</a>]&nbsp;&nbsp;
		    	[<a onClick="return confirm('确认要删除？');" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/delActivity/type/<?php echo $_smarty_tpl->tpl_vars['show_type']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_id'];?>
">删除</a>]&nbsp;&nbsp;
				[<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/AddActivity/TjActivity/type/<?php echo $_smarty_tpl->tpl_vars['show_type']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['activityInfo']->value['activity_id'];?>
">提交</a>]&nbsp;&nbsp;
			</td>

			<?php }?>
  		</tr>
		<?php }else{ ?>
		   <b>暂无数据</b>
		<?php }?>
		<?php } ?>
	</table>
	<?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/addactivity/ActivityList/type/".((string)$_smarty_tpl->tpl_vars['show_type']->value)),$_smarty_tpl);?>

</div>
</body>
</html><?php }} ?>