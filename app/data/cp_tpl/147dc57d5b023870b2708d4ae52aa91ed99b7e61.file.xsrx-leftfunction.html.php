<?php /* Smarty version Smarty-3.1.14, created on 2014-11-17 10:51:12
         compiled from "app\tpl\assessment\xsrx-leftfunction.html" */ ?>
<?php /*%%SmartyHeaderCode:8532546962a07b5b13-70506835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '147dc57d5b023870b2708d4ae52aa91ed99b7e61' => 
    array (
      0 => 'app\\tpl\\assessment\\xsrx-leftfunction.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8532546962a07b5b13-70506835',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lefttype' => 0,
    'web_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_546962a07fe370_04190661',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546962a07fe370_04190661')) {function content_546962a07fe370_04190661($_smarty_tpl) {?><div class="col-md-2">
    <ul id="left-nav"  class="nav nav-pills nav-stacked">
        <li class="<?php if ($_smarty_tpl->tpl_vars['lefttype']->value==1){?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/xsrxPropaganda">本学院宣讲方案</a></li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['lefttype']->value==2){?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/xsrxIntroduction">本学院评估细则</a></li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['lefttype']->value==3){?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/xsrxSelfAssessment">自评</a></li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['lefttype']->value==4){?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/xsrxtrainningPlan">成长训练计划</a></li>
    </ul>
</div><?php }} ?>