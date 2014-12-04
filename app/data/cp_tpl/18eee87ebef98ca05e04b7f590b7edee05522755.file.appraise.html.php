<?php /* Smarty version Smarty-3.1.14, created on 2014-10-28 10:03:40
         compiled from "app\tpl\assessment\appraise.html" */ ?>
<?php /*%%SmartyHeaderCode:15723544ef97c965431-39422711%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18eee87ebef98ca05e04b7f590b7edee05522755' => 
    array (
      0 => 'app\\tpl\\assessment\\appraise.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15723544ef97c965431-39422711',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'exist' => 0,
    'front_info' => 0,
    'num' => 0,
    'content' => 0,
    'assproid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544ef97cad1750_19505714',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ef97cad1750_19505714')) {function content_544ef97cad1750_19505714($_smarty_tpl) {?><!DOCTYPE html>

<html>
<head>
<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type="text/css"
	href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/bootstrap/bootstrap.min.css"
	rel="stylesheet">
<link type="text/css"
	href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/css/index/font-awesome.min.css"
	rel="stylesheet">
<link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/css/index/site.css"
	rel="stylesheet">
<script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/js/holder.js"></script>
<script type="text/javascript">
 $(function(){
	var obj = new Object();
	obj.num = $("#num").val();
	obj.assproid = $("#assproid").val();


    $("#appraisecommit").click(function(){
	   $(".pingjia").each(function(index,ele){
		   //alert(index);
		var score = $(this).find('option:selected').val();	
		if($(this).parents("tr").find("td").eq(0).html() == '公'){
		//var zhibiao = $(this).parents("tr").find("td").eq(0).html();
		var zhibiao = 'gong';
		}else{
		//var zhibiao = $(this).parents("tr").find("td").eq(1).html();
		var zhibiao = 'neng'+index;
		}
		//alert(zhibiao);
		eval("obj."+zhibiao+" = "+score);
		
	});
	   obj.good1 = $("#good_1").val();
	   obj.good2 = $("#good_2").val();
	   obj.good3 = $("#good_3").val();
	   obj.bad1 = $("#bad_1").val();
	   obj.bad2 = $("#bad_2").val();
	   obj.bad3 = $("#bad_3").val();
        if(obj.good1==''||obj.good2==''||obj.good3==''||obj.bad1==''||obj.bad2==''||obj.bad3==''){
            alert('您还有未完成的互评项！');
           return;
        }
	 $.ajax({
				url:"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/appraise_ajax",
				async:false,
				type:"POST",
				data:obj,
				success:function(msg){		
					 var obj = eval("("+msg+")");
					if(obj.json.state == 1){
						//alert("评价完成");
						alert(obj.json.msg);
						location.href = "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/mutualAssessment";  
					 }else if(obj.json.state == 0){
						alert("评价失败");
					} 
					//alert(msg);
					},
					error:function(){
						alert("网络连接错误");
					} 
				}) 
				//alert(JSON.stringify(obj));
	
}) 
})
</script>
</head>
<style>
.zz_good_pingjia{color:#000};
</style>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h3>当前位置：综合素质评估>学年末评估</h3>
			</div>
		</div>
	<?php $_smarty_tpl->tpl_vars['lefttype'] = new Smarty_variable(4, null, 0);?>
   <?php echo $_smarty_tpl->getSubTemplate ('assessment/xnm-left-function.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php if ($_smarty_tpl->tpl_vars['exist']->value==1){?>
		<div class="col-md-10">
            <div class="row">
                <div class="col-md-12">
                  <span>姓名：<?php echo $_smarty_tpl->tpl_vars['front_info']->value['fu_realname'];?>
</span>
                    <ul class="nav nav-tabs">
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/bks_code/<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['front_info']->value['fu_id'];?>
">查看成长档案</a></li>
                    </ul>
                </div>
            </div>
			<table class="table table-bordered">
				<thead style="background-color: #e7e7e7">
					<tr style="color:#000000">
						<th>一级指标</th>
						<th>二级指标</th>
						<th>三级指标</th>
						<th>评价</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td rowspan="<?php echo $_smarty_tpl->tpl_vars['content']->value['asspro_gong_num'];?>
"
							style="vertical-align: middle">公</td>
						<td><?php echo $_smarty_tpl->tpl_vars['content']->value['second'][0];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['content']->value['third'][0];?>
</td>
						<td rowspan="<?php echo $_smarty_tpl->tpl_vars['content']->value['asspro_gong_num'];?>
"
							style="vertical-align: middle"><select class="pingjia" style="color:#000"
							id="pingjia_0" >
								<option value="6">1</option>
								<option value="4">2</option>
								<option value="2">3</option>
						</select></td>
					</tr>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['gong'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['gong']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['name'] = 'gong';
$_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['content']->value['asspro_gong_num']-1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['gong']['total']);
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['content']->value['second'][$_smarty_tpl->getVariable('smarty')->value['section']['gong']['rownum']];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['content']->value['third'][$_smarty_tpl->getVariable('smarty')->value['section']['gong']['rownum']];?>
</td>
						<?php endfor; endif; ?> 
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['neng'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['neng']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['name'] = 'neng';
$_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['start'] = (int)$_smarty_tpl->tpl_vars['content']->value['asspro_gong_num'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['content']->value['asspro_gong_num']+$_smarty_tpl->tpl_vars['content']->value['asspro_neng_num']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['neng']['total']);
?>
					<tr>
						<td>能</td>
						<td><?php echo $_smarty_tpl->tpl_vars['content']->value['second'][$_smarty_tpl->getVariable('smarty')->value['section']['neng']['index']];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['content']->value['third'][$_smarty_tpl->getVariable('smarty')->value['section']['neng']['index']];?>
</td>
						<td><select class="pingjia" style="color:#000"
							id="pingjia_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['neng']['rownum'];?>
">
								<option value="6">1</option>
								<option value="4">2</option>
								<option value="2">3</option>
						</select></td>
					</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
		</div>
		
	</div>
	<div>
<div>
<center><div>评价选1非常好,继续保持;2.一般,还有提升空间;3.不太好,提升空间很大</div></center>
<br/>
<center>
	  <div>
	<table style="color:#FFFFFF;">
		<tr>
			<td>做的最好：</td>
			<td>
				<table class="table table-bordered" style="color:#FFFFFF;">
					<tr>
						<td>1</td>
						<td>
							<input id="good_1" class="textgood1" type="text"  value="" onfocus="if(this.value==''){this.value=''}" onblur="if(this.value==''){this.value=''}" style="color:#2E3641;" size="60"/>						</td>
					</tr>
					<tr>
						<td>2</td>
						<td>
							<input id="good_2" class="textgood2" type="text"  value="" onfocus="if(this.value==''){this.value=''}" onblur="if(this.value==''){this.value=''}" style="color:#2E3641;" size="60"/>
						</td>
					</tr>
					<tr>
						<td>3</td>
						<td>
							<input id="good_3" class="textgood3" type="text"  value="" onfocus="if(this.value==''){this.value=''}" onblur="if(this.value==''){this.value=''}" style="color:#2E3641;" size="60"/>						</td>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>还需改进：</td>
			<td>
				<table class="table table-bordered" style="border:1px;color:#FFFFFF;">
					<tr>
						<td>1</td>
						<td>
							<input id="bad_1" class="textImprovement1" type="text"  value="" onfocus="if(this.value==''){this.value=''}" onblur="if(this.value==''){this.value=''}" style="color:#2E3641;" size="60"/>						</td>
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td>
							<input id="bad_2" class="textImprovement2" type="text"  value="" onfocus="if(this.value==''){this.value=''}" onblur="if(this.value==''){this.value=''}" style="color:#2E3641;" size="60"/>						</td>
						</td>
					</tr>
					<tr>
						<td>3</td>
						<td>
							<input id="bad_3" class="textImprovement3" type="text"  value="" onfocus="if(this.value==''){this.value=''}" onblur="if(this.value==''){this.value=''}" style="color:#2E3641;" size="60"/>						</td>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
</center>
</div>
</div>
	<center>
	<input id="num" type = "hidden" value = "<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
"/>
	<input id="assproid" type = "hidden" value = "<?php echo $_smarty_tpl->tpl_vars['assproid']->value;?>
"/>
		<button style="color:#000000" id="appraisecommit">提交</button>
	</center>
	</div>
	<?php }else{ ?>
		目前学院未制定评估细则
		<?php }?>
	<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>