<?php /* Smarty version Smarty-3.1.14, created on 2014-10-28 16:32:23
         compiled from "app\tpl\news.html" */ ?>
<?php /*%%SmartyHeaderCode:929544f5497897b12-24937215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4b973e9ad467a94d64a3112f953f320c8a6ea3c' => 
    array (
      0 => 'app\\tpl\\news.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '929544f5497897b12-24937215',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'activityByMajorGrade' => 0,
    'web_url' => 0,
    'commentByMajorGrade' => 0,
    'growthProfileByMajorGrade' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544f54979730a4_33213773',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544f54979730a4_33213773')) {function content_544f54979730a4_33213773($_smarty_tpl) {?><style>

    i{
        color: wheat;
    }
    a{
        color: #ffffff;
    }
</style>
<table class="table table-bordered" id="newTable">
    <thead>
    <tr style="background:#EEAEEE">
        <th><center>最新动态</center></th>
    </tr>
    </thead>
    <tbody>
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ac'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ac']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['name'] = 'ac';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['activityByMajorGrade']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ac']['total']);
?>
    <tr>
        <td><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/<?php echo $_smarty_tpl->tpl_vars['activityByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ac']['index']]['activity_class'];?>
/activityId/<?php echo $_smarty_tpl->tpl_vars['activityByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ac']['index']]['activity_id'];?>
"><i><?php echo $_smarty_tpl->tpl_vars['activityByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ac']['index']]['fu_realname'];?>
</i>&nbsp;&nbsp;参加了“<?php echo $_smarty_tpl->tpl_vars['activityByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ac']['index']]['activity_title'];?>
”活动</a></td>
    </tr>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['activityByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ac']['index']]['activity_registration_create_time'];?>
　　浏览（<?php echo $_smarty_tpl->tpl_vars['activityByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['ac']['index']]['activity_read_num'];?>
次）</td>
    </tr>
    <?php endfor; endif; ?>

    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['co'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['co']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['co']['name'] = 'co';
$_smarty_tpl->tpl_vars['smarty']->value['section']['co']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['commentByMajorGrade']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['co']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['co']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['co']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['co']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['co']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['co']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['co']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['co']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['co']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['co']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['co']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['co']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['co']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['co']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['co']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['co']['total']);
?>
    <tr>
        <td><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/<?php echo $_smarty_tpl->tpl_vars['commentByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['co']['index']]['activity_class'];?>
/activityId/<?php echo $_smarty_tpl->tpl_vars['commentByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['co']['index']]['activity_id'];?>
"><i><?php echo $_smarty_tpl->tpl_vars['commentByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['co']['index']]['fu_realname'];?>
</i>&nbsp;&nbsp;在“<?php echo $_smarty_tpl->tpl_vars['commentByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['co']['index']]['activity_title'];?>
”活动中发表了评论</a></td>
    </tr>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['commentByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['co']['index']]['comment_create_time'];?>
　　浏览（<?php echo $_smarty_tpl->tpl_vars['commentByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['co']['index']]['activity_read_num'];?>
次）</td>
    </tr>
    <?php endfor; endif; ?>

    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['gr'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['gr']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['name'] = 'gr';
$_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['growthProfileByMajorGrade']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['gr']['total']);
?>
    <tr>
        <td><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievement/bks_code/<?php echo $_smarty_tpl->tpl_vars['growthProfileByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gr']['index']]['fu_username'];?>
/id/<?php echo $_smarty_tpl->tpl_vars['growthProfileByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gr']['index']]['fu_id'];?>
"><i><?php echo $_smarty_tpl->tpl_vars['growthProfileByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gr']['index']]['fu_realname'];?>
</i>&nbsp;&nbsp;录入了个人成果</a></td>
    </tr>
    <tr>
        <td><?php echo date("Y-m-d H:i:s",$_smarty_tpl->tpl_vars['growthProfileByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gr']['index']]['gp_create_time']);?>
　　浏览（<?php echo $_smarty_tpl->tpl_vars['growthProfileByMajorGrade']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gr']['index']]['gp_read_num'];?>
次）</td>
    </tr>
    <?php endfor; endif; ?>
    </tbody>
</table><?php }} ?>