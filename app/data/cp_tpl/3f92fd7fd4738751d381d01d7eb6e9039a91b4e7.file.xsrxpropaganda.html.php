<?php /* Smarty version Smarty-3.1.14, created on 2014-11-17 10:51:12
         compiled from "app\tpl\assessment\xsrxpropaganda.html" */ ?>
<?php /*%%SmartyHeaderCode:26791546962a0648b23-33950584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f92fd7fd4738751d381d01d7eb6e9039a91b4e7' => 
    array (
      0 => 'app\\tpl\\assessment\\xsrxpropaganda.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26791546962a0648b23-33950584',
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
  'unifunc' => 'content_546962a0757844_11716668',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546962a0757844_11716668')) {function content_546962a0757844_11716668($_smarty_tpl) {?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
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
        <div class="page-header"><h3>当前位置：综合素质评估>新生入学评估</h3></div>
    <?php $_smarty_tpl->tpl_vars['lefttype'] = new Smarty_variable(1, null, 0);?>
    <?php echo $_smarty_tpl->getSubTemplate ('assessment/xsrx-leftfunction.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
           </div></div>
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