<?php /* Smarty version Smarty-3.1.14, created on 2014-10-27 16:31:27
         compiled from "app\tpl\assessment\xnm-left-function.html" */ ?>
<?php /*%%SmartyHeaderCode:28645544e02df6fb249-74661346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0e9a005bd08f07e616df177e4bff236350dfdfc' => 
    array (
      0 => 'app\\tpl\\assessment\\xnm-left-function.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28645544e02df6fb249-74661346',
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
  'unifunc' => 'content_544e02df7b4260_47747583',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544e02df7b4260_47747583')) {function content_544e02df7b4260_47747583($_smarty_tpl) {?> <div class="col-md-2">
    <!-- xnmSelfAssessment-->
    <ul id="left-nav"  class="nav nav-pills nav-stacked">
	  <li class="<?php if ($_smarty_tpl->tpl_vars['lefttype']->value==1){?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/xnmPropaganda">本学院宣讲方案</a></li>
	  <li class="<?php if ($_smarty_tpl->tpl_vars['lefttype']->value==2){?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/xnmIntroduction">本学院评估细则</a></li>
	  <li class="<?php if ($_smarty_tpl->tpl_vars['lefttype']->value==3){?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/xnmSelfAssessment">自评</a></li>
	  <li class="<?php if ($_smarty_tpl->tpl_vars['lefttype']->value==4){?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/mutualAssessment">互评</a></li>
	  <li class="<?php if ($_smarty_tpl->tpl_vars['lefttype']->value==5){?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/common/AssessmentResult">评估结果</a></li>
	  <li class="<?php if ($_smarty_tpl->tpl_vars['lefttype']->value==6){?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/xnmtrainningPlan">成长训练计划</a></li>
	 <!--  <li class="<?php if ($_smarty_tpl->tpl_vars['lefttype']->value==7){?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/xnmmyplanning">自我规划</a></li> -->
	 <!--  <li class="<?php if ($_smarty_tpl->tpl_vars['lefttype']->value==7){?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/oldAssessment">往年评估</a></li> -->
	</ul>
  </div><?php }} ?>