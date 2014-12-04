<?php /* Smarty version Smarty-3.1.14, created on 2014-10-28 09:24:29
         compiled from "app\tpl\assessment\mutualassessment.html" */ ?>
<?php /*%%SmartyHeaderCode:10822544ef04dae5a11-58227670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce2240a089d768971034c25123bfa302ba745254' => 
    array (
      0 => 'app\\tpl\\assessment\\mutualassessment.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10822544ef04dae5a11-58227670',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'state' => 0,
    'weikaishi' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544ef04dbae2a2_02157101',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ef04dbae2a2_02157101')) {function content_544ef04dbae2a2_02157101($_smarty_tpl) {?><!DOCTYPE html>

<html>
  <head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/css/index/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/css/index/site.css" rel="stylesheet">
    <script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/js/holder.js"></script>
<script type="text/javascript">
  function search(){
	  var name1 = document.getElementById('search').value;
	  $.ajax({
			url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/searchStu",
			type:'POST',
			async:false,
			dataType:"json",
            data:{'name':name1},
			success:function(obj){
                if(obj.json.state == 1){
                  var innerHtml='';
                for(var i=0;i<obj.json.data.length;i++){
                    innerHtml+= '<tr>';
                    innerHtml+="<td id='cxid'>"+(i+1)+"</td>";
                    innerHtml+="<td id='cxrn'>"+obj.json.data[i].bks_name+"</td>";
                    innerHtml+="<td id='cxun'>"+obj.json.data[i].bks_code+"</td>";
                    innerHtml+="<td><button type='button'  data-xuhao='"+obj.json.data[i].bks_code+"' onclick='goo(this)' id='cxlj' class='btn btn-default btn-xs active bttn' role='button'>评价</button></td>";
                    innerHtml+="</tr>";
                  }
                    $("#xuesheng").parent().show();
                    $("#content").hide();
                    document.getElementById("xuesheng").innerHTML=innerHtml;
                }else{
                    document.getElementById("content").innerHTML="没有此学生信息！";
                    $("#stu_info").hide();
                    $("#content").show();

				}
			},
		    	error:function(msg){
				alert("查询失败！");
			}
		});
  }
function goo(o){
    var num1 = o.getAttribute('data-xuhao');
    $.ajax({
			url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/pingjia_check",
			type:'POST',
			async:false,
			data:({'num':num1}),
			success:function(data){
				var obj = eval("("+data+")");
				if(obj.json.state == 1){
					location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/appraise/num/"+num1;
				}else{
					alert(obj.json.msg);
				}
			},
			error:function(msg){
				alert("查询失败！");
			}
		});
}

</script>
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
  <div class="col-md-12">
    <div class="page-header"><h3>当前位置：综合素质评估>学年末评估</h3></div>
  </div>
   <?php $_smarty_tpl->tpl_vars['lefttype'] = new Smarty_variable(4, null, 0);?>
   <?php echo $_smarty_tpl->getSubTemplate ('assessment/xnm-left-function.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php if ($_smarty_tpl->tpl_vars['state']->value>=2){?>
  <div class="col-md-10">
    <center><h3>班内互评</h3></center>
   
    <?php if (isset($_smarty_tpl->tpl_vars['weikaishi']->value)){?>
    评价尚未开始
    <?php }else{ ?>
      <table class="table" style="border:1px solid #ddd;"><tr>
          <td>姓名：</td><td><input class="form-control num" id="search"></td>
          <td><button name = "username" type="button" class="btn btn-default" onclick="search()" id="btn">查询</button></td>
      </tr></table>
      <table style="display: none" id="stu_info" class="table table-bordered table-hover">
          <thead style="background-color:#e7e7e7;color:#2E3641;">
          <td>序号</td>
          <td>姓名</td>
          <td>学号</td>
          <td>定性评价</td>
          </thead>
          <tbody id="xuesheng" style="color:#666666;">

          </tbody>
      </table>
      <div id="content" style="margin-left:50px;">
      </div>
	<?php }?>
  </div>
  <?php }else{ ?>
  互评尚未进行
  <?php }?>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  </body>
</html><?php }} ?>