<?php /* Smarty version Smarty-3.1.14, created on 2014-10-28 11:02:38
         compiled from "app\tpl\common\assessmentresult_taping.html" */ ?>
<?php /*%%SmartyHeaderCode:600544f074ebc5de5-06771634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbc28daab7495c522b34194eb5bcebcf125c10da' => 
    array (
      0 => 'app\\tpl\\common\\assessmentresult_taping.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '600544f074ebc5de5-06771634',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544f074ee55f89_59135015',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544f074ee55f89_59135015')) {function content_544f074ee55f89_59135015($_smarty_tpl) {?><!DOCTYPE html>

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
    <script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/highcharts/highcharts.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/highcharts/highcharts-more.js"></script>
<script type="text/javascript">

var zz_do = '';
page = 1;
function tab1(m){
	// alert(m);
	if(m == 1){
		window.location.href = "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/common/AssessmentResult/mod/huping";
	}else if(m == 2){
		window.location.href = "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/common/AssessmentResult/mod/taping";
	}else{
		window.location.href = "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/common/AssessmentResult/mod/leida";
	}

}
	/*function ajax_goodbad(flag,type){
		$.ajax({
			url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/ajax_goodbad",
			async:false,
			type:'POST',
			data:({'flag':flag,'type':type}),
			success:function(msg){
				var obj = eval("("+msg+")");
				if(page<=1){
					$("#good_shang").hide();
					$("#bad_shang").hide();
				}else{
					$("#good_shang").show();
					$("#bad_shang").show();
				}
  				if(obj.json.state==1){
					$("#good_xia").hide();
					$("#bad_xia").hide();
				}else{  
					$("#good_xia").show();
					$("#bad_xia").show();
				}
				var str = '';
				var dd = obj.json.data;
				for(x in dd){
					//var num = x+1;
					var content = dd[x].goodorbad_content;
					str += "<tr><td>"+x+"</td><td>"+content+"</td></tr>";
				}
				$("#"+zz_do+" table").html('');
				$("#"+zz_do+" table").append(str);
				},
				error:function(){
					alert('网络发生错误');
					}
							})
	}
	*/
	function ajax_goodbad(flag,type,page){
		$.ajax({
			url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/ajax_goodbad",
			async:false,
			type:'POST',
			data:({'flag':flag,'type':type,'page':page}),
			success:function(msg){
				//alert(JSON.stringify(msg));
				var obj = eval("("+msg+")");
  				if(page<=1){
					$("#good_shang").hide();
					$("#bad_shang").hide();
				}else{
					$("#good_shang").show();
					$("#bad_shang").show();
				}
  				if(obj.json.state==1){
					$("#good_xia").hide();
					$("#bad_xia").hide();
				}else{  
					$("#good_xia").show();
					$("#bad_xia").show();
				}
				var str = '';
				var dd = obj.json.data;
				for(x in dd){
					//var num = x+1;
					var content = dd[x].goodorbad_content;
					str += "<tr><td>"+x+"</td><td>"+content+"</td></tr>";
				}
				$("#"+zz_do+" table").html('');
				$("#"+zz_do+" table").append(str);
				
			},
				/* var obj = eval("("+msg+")");
				var data = obj.json.data;
				//alert(JSON.stringify(data));
				page(data);
				},*/
				error:function(){
					alert('网络发生错误');
					} 
							})
	}
	
 function	tab2(n){
		if(n == 1){
			zz_do = 'do_good';
			$("#do_good").show();
			$("#do_bad").hide();
			ajax_goodbad(0,2,1);
		}else if(n == 2){
			zz_do = 'do_bad';
			$("#do_good").hide();
			$("#do_bad").show();
			ajax_goodbad(1,2);
			ajax_goodbad(1,2,1);
		}else{
			alert("非法参数");
		}
	}
 $(function(){
	 $("#good_shang").click(function(){

		 page--;
		 ajax_goodbad(0,2,page);
		
	 })
	 
	 $("#good_xia").click(function(){
		 //alert(22);
		 page++;
		 ajax_goodbad(0,2,page); 
	 })
	 
	  $("#bad_shang").click(function(){
		 //alert(22);
		 page--;
		 ajax_goodbad(1,2,page); 
	 })
	 
	  $("#bad_xia").click(function(){
		 //alert(22);
		 page++;
		 ajax_goodbad(1,2,page); 
	 })
	 })
	

</script>
<style type="text/css">
.zz_but {color:#000;display:none};
</style>
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
  <div class="col-md-12">
    <div class="page-header"><h3>当前位置：综合素质评估>学年末评估</h3></div>
  </div>
<?php $_smarty_tpl->tpl_vars['lefttype'] = new Smarty_variable(5, null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ('assessment/xnm-left-function.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <div class="col-md-10">
    <center><h3>评估结果-他评结果</h3></center>
	<div class="btn-group">
	  <button type="button" class="btn btn-info" onclick="tab1(1)">互评结果</button>
	  <button type="button" class="btn btn-info" onclick="tab1(2)">他评结果</button>
	  <button type="button" class="btn btn-info" onclick="tab1(3)">雷达图</button>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['info']->value['exist']==1){?>
	<div id="mutual" style="margin-top:20px;">
	  <table class="table table-bordered" style="margin-top:20px;">
		<thead style="color:#FFFFFF">
		  <tr><th>一级指标</th><th>我二级指标</th><th>三级指标</th><th>平均得分</th><th>班级排名</th></tr>
		</thead>
		<tbody style="color:#FFFFFF">
		  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['info']->value['gong_nums']+$_smarty_tpl->tpl_vars['info']->value['neng_nums']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total']);
?>
		  <tr>
		    <td><?php if ($_smarty_tpl->getVariable('smarty')->value['section']['n']['index']<=($_smarty_tpl->tpl_vars['info']->value['gong_nums']-1)){?>公<?php }else{ ?>能<?php }?></td>
		    <td><?php echo $_smarty_tpl->tpl_vars['info']->value['second_content'][$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['info']->value['third_content'][$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']];?>
</td>
			<td><?php if ($_smarty_tpl->getVariable('smarty')->value['section']['n']['index']<=($_smarty_tpl->tpl_vars['info']->value['gong_nums']-1)){?><?php echo $_smarty_tpl->tpl_vars['info']->value['myscore'][0];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['info']->value['myscore'][$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']+1-$_smarty_tpl->tpl_vars['info']->value['gong_nums']];?>
<?php }?></td>
			<td><?php if ($_smarty_tpl->getVariable('smarty')->value['section']['n']['index']<=($_smarty_tpl->tpl_vars['info']->value['gong_nums']-1)){?><?php echo $_smarty_tpl->tpl_vars['info']->value['rankding'][0]['ranking'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['info']->value['rankding'][$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']+1-$_smarty_tpl->tpl_vars['info']->value['gong_nums']]['ranking'];?>
<?php }?></td>
		  </tr>
		  <?php endfor; endif; ?>
		  </tbody>
		</table>
		
		<div class="btn-group">
		  <button type="button" class="btn btn-info" onclick="tab2(1)">做的最好</button>
		  <button type="button" class="btn btn-info" onclick="tab2(2)">最需改进</button>
		</div>
		<div id="do_good" style="margin-top:20px;">
		  <table class="table table-bordered">

		  </table>
		  <button id='good_shang' class="zz_but">上一页</button>  <button id='good_xia' class="zz_but">下一页</button>
		</div>
		<div id="do_bad" style="margin-top:20px;display:none;">
		  <table class="table table-bordered">

		  </table>
		  <button id='bad_shang' class="zz_but">上一页</button>  <button id='bad_xia' class="zz_but">下一页</button>
		</div>
	</div>
	<?php }else{ ?>
	<center>
		<div style="height:150px;font-size:30px;">
	尚未有人对此学生评分
	</div>
		</center>
	<?php }?>
	<div id="other" style="margin-top:20px;display:none;">
		<table class="table table-bordered" style="margin-top:20px;">
		  <thead style="background-color:#e7e7e7">
		    <tr><th>一级指标</th><th>二级指标</th><th>内容</th><th>平均分值</th><th>班级排名</th></tr>
		  </thead>
		  <tbody>
		    <tr>
		      <td rowspan="3" style="vertical-align:middle">公</td>
		      <td>公2</td>
		      <td>公3</td>
		      <td>9.2</td>
		      <td>13</td>
		    </tr>
		    <tr>
		      <td>公2</td>
		      <td>公3</td>
		      <td>9.2</td>
		      <td>13</td>
		    </tr>
		    <tr>
		      <td>公2</td>
		      <td>公3</td>
		      <td>9.2</td>
		      <td>13</td>
		    </tr>
		    <tr>
		      <td rowspan="5" style="vertical-align:middle">能</td>
		      <td>生活</td>
		      <td>能3</td>
		      <td>9.2</td>
		      <td>13</td>
		    </tr>
		    <tr>
		      <td>学习</td>
		      <td>能3</td>
		      <td>9.2</td>
		      <td>13</td>
		    </tr>
		    <tr>
		      <td>创新</td>
		      <td>能3</td>
		      <td>9.2</td>
		      <td>13</td>
		    </tr>
		    <tr>
		      <td>文化素养</td>
		      <td>能3</td>
		      <td>9.2</td>
		      <td>13</td>
		    </tr>
		    <tr>
		      <td>协作</td>
		      <td>能3</td>
		      <td>9.2</td>
		      <td>13</td>
		    </tr>

		  </tbody>
		</table>
	</div>
	<div id="radar" style="margin-top:20px;display:none;">
		<div id="container1" style="min-width: 400px; max-width: 600px; height: 400px;float:left;"></div>
		<div id="container2" style="min-width: 400px; max-width: 600px; height: 400px;float:right;"></div>
	</div>

  </div>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  </body>
</html><?php }} ?>