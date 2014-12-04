<?php /* Smarty version Smarty-3.1.14, created on 2014-10-27 15:01:12
         compiled from "app\tpl\account\login.html" */ ?>
<?php /*%%SmartyHeaderCode:9086544dedb8358b25-84235812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5db6e0d5a695a8620227fe0de9e64c217c4d6273' => 
    array (
      0 => 'app\\tpl\\account\\login.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9086544dedb8358b25-84235812',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'zz_cuowu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544dedb83e79f4_90810061',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544dedb83e79f4_90810061')) {function content_544dedb83e79f4_90810061($_smarty_tpl) {?><!DOCTYPE html>
<html>
  <head>
    <title>登录</title>
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
    <script>
  
    </script>
  </head>
  <body class="login">
    <div class="container">
      <form class="form-signin" role="form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Account/doLogin">
        <h2 class="form-signin-heading">南开大学公能素质发展辅学平台</h2>
        <input id="username" name="username" type="text" class="form-control" placeholder="用户名" required autofocus>
        <input id="password" name="password" type="password" class="form-control" placeholder="密码" required>
         <label class="checkbox">
          <?php if (isset($_smarty_tpl->tpl_vars['zz_cuowu']->value)){?><span style="color:#f00; margin-left:130px;"><?php echo $_smarty_tpl->tpl_vars['zz_cuowu']->value;?>
</span><?php }?>
        </label>
        <button style="margin-bottom:100px;" class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
      </form>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  </body>
</html><?php }} ?>