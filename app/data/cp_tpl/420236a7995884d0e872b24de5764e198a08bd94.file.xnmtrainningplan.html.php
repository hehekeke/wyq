<?php /* Smarty version Smarty-3.1.14, created on 2014-10-28 11:28:08
         compiled from "app\tpl\assessment\xnmtrainningplan.html" */ ?>
<?php /*%%SmartyHeaderCode:14391544f0d48670191-90332991%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '420236a7995884d0e872b24de5764e198a08bd94' => 
    array (
      0 => 'app\\tpl\\assessment\\xnmtrainningplan.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14391544f0d48670191-90332991',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'stuId' => 0,
    'item' => 0,
    'feedback' => 0,
    'state' => 0,
    'status' => 0,
    'state2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544f0d487c9084_27129310',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544f0d487c9084_27129310')) {function content_544f0d487c9084_27129310($_smarty_tpl) {?><!DOCTYPE html>

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
function clickSave(){
       var txt = document.getElementById('content').value;
	    var type = 3;
	    var stuId =<?php echo $_smarty_tpl->tpl_vars['stuId']->value;?>
;
       var isnew=0;
	  <?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?>
	   var id = <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
;
	  <?php }else{ ?>
	    var id = 0;
	  <?php }?>
	  $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/saveItem02",{content:txt,id:id,type:type,isnew:isnew,stuId:stuId},function(result){
		  var f=result;
		     if (f>0){
		    	  alert("保存成功！");
		    		 location.reload();
		    	 }else{
		    	   alert("保存失败！");
		    	 //alert(f);
		     }
	  });
	}

	function clickCommit(){
		<?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?>
			var id = <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
;
		<?php }else{ ?>
			alert("请先点击保存按钮！");
		<?php }?>
         var txt = document.getElementById('content').value;
		$.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/commitItem",{content:txt,id:id},function(result){
			var c=result;
		     if (c>0){
		    	 	alert("提交成功！");
		    	 $('#content').prop('disabled', 'disabled');
		    	 window.location.reload();
		     }else{
		    	 alert("提交失败！");
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
   <?php $_smarty_tpl->tpl_vars['lefttype'] = new Smarty_variable(6, null, 0);?>
   <?php echo $_smarty_tpl->getSubTemplate ('assessment/xnm-left-function.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

   
  <div class="col-md-10">	

   <?php if ($_smarty_tpl->tpl_vars['feedback']->value){?> <b>辅导员反馈：</b><?php echo $_smarty_tpl->tpl_vars['feedback']->value['content'];?>
<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['feedback']->value){?><p>附件：<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload/files/<?php echo $_smarty_tpl->tpl_vars['feedback']->value['file_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['file_name'];?>
</a></p><?php }?>
<?php if ($_smarty_tpl->tpl_vars['state']->value>=3){?> 
	<center><h3>我的成长训练计划</h3></center>
	<h6>当前状态：
		<?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?>
		  <?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>

		<?php }else{ ?>
		  <?php echo $_smarty_tpl->tpl_vars['status']->value;?>

		<?php }?>
	</h6>

	<?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?>
	  <?php if ($_smarty_tpl->tpl_vars['state2']->value==2||$_smarty_tpl->tpl_vars['state2']->value==3){?>
	    <textarea class="form-control" rows="15" name="content" id="content" placeholder="在此填写成长训练计划" disabled="disabled"><?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>
</textarea>
	  <?php }else{ ?>
	    <textarea class="form-control" rows="15" name="content" id="content" placeholder="在此填写成长训练计划"><?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>
</textarea>
	  <?php }?>
	<?php }else{ ?>
	    <textarea class="form-control" rows="15" name="content" id="content" placeholder="在此填写成长训练计划"></textarea>
	<?php }?>

    <center>
     <?php if ($_smarty_tpl->tpl_vars['state2']->value==2||$_smarty_tpl->tpl_vars['state2']->value==3){?>
     <?php }else{ ?>
      <button type="button" class="btn btn-success" style="margin:10px;" onclick="clickSave()">保存</button>
      <button type="button" class="btn btn-danger" style="margin:10px;" onclick="clickCommit()">提交</button>
      <?php }?>
    </center>
  </div>
  <?php }else{ ?>
  <center>
		<div style="height:150px;font-size:30px;">
	目前不可填写成长训练计划
	</div>
		</center>

 
  <?php }?>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  </body>
</html><?php }} ?>