<?php /* Smarty version Smarty-3.1.14, created on 2014-10-27 16:31:27
         compiled from "app\tpl\assessment\xnmpropaganda.html" */ ?>
<?php /*%%SmartyHeaderCode:732544e02df5dbcb5-17427506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3a3ccc2c072d4f32624c467e882d8009314a5db' => 
    array (
      0 => 'app\\tpl\\assessment\\xnmpropaganda.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '732544e02df5dbcb5-17427506',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544e02df6c31b7_05965420',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544e02df6c31b7_05965420')) {function content_544e02df6c31b7_05965420($_smarty_tpl) {?><!DOCTYPE html>

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

  </head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
  <div class="col-md-12">
    <div class="page-header"><h3>当前位置：综合素质评估>学年末评估</h3></div>
  </div>
   <?php $_smarty_tpl->tpl_vars['lefttype'] = new Smarty_variable(1, null, 0);?>
   <?php echo $_smarty_tpl->getSubTemplate ('assessment/xnm-left-function.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <div class="col-md-10 panel panel-default">
  <?php if (isset($_smarty_tpl->tpl_vars['content']->value['article_content'])){?>
	<div class="panel-body" style="">
	<center>
      <h3><?php echo $_smarty_tpl->tpl_vars['content']->value['article_title'];?>
</h3>
      <h6><?php echo $_smarty_tpl->tpl_vars['content']->value['article_create_time'];?>
</h6>
    </center>
		<?php echo $_smarty_tpl->tpl_vars['content']->value['article_content'];?>

		</br><p style="margin-top:15px">附件：<a style="color:#FFFFFF;" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload/files/<?php echo $_smarty_tpl->tpl_vars['content']->value['file_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['content']->value['file_name'];?>
</a></p>
    </div>
<?php }else{ ?>
目前无数据
<?php }?>
  </div>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  </body>
</html><?php }} ?>