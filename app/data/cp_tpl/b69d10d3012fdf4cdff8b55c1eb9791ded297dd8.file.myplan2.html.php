<?php /* Smarty version Smarty-3.1.14, created on 2014-10-27 17:07:31
         compiled from "app\tpl\record\myplan2.html" */ ?>
<?php /*%%SmartyHeaderCode:24923544e0b538dc6b2-91327667%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b69d10d3012fdf4cdff8b55c1eb9791ded297dd8' => 
    array (
      0 => 'app\\tpl\\record\\myplan2.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24923544e0b538dc6b2-91327667',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'student' => 0,
    '__userinfo__' => 0,
    'bks' => 0,
    'profile_info' => 0,
    'result_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544e0b53b43552_45455387',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544e0b53b43552_45455387')) {function content_544e0b53b43552_45455387($_smarty_tpl) {?><!DOCTYPE html>

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
<style>
    #liColor a{
        color: #000000;
        font-weight: bold;
    }
</style>
<script>
    function getContent(profile_id){
        $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myPlanOfContent",{"id":'<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
',"a_id":profile_id},function(data){
              $(".panel-body").html(data);
        });
    }
</script>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row" style="padding-top:15px;">
    <div class="col-md-12">
        <div class="page-header"><h3>当前位置：成长档案>成长档案详情</h3></div>
        <?php if ($_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id']==$_smarty_tpl->tpl_vars['student']->value['fu_id']){?>
        <center><h1><?php echo $_smarty_tpl->tpl_vars['student']->value['fu_grade'];?>
级 <?php echo $_smarty_tpl->tpl_vars['student']->value['college_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['student']->value['major_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['student']->value['fu_realname'];?>
 成长档案</h1></center>
        <?php }else{ ?>
        <center><h1><?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_grade'];?>
级 <?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_college'];?>
 <?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_major'];?>
 <?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_name'];?>
 成长档案</h1></center>
        <?php }?>
    </div>
    <div class="col-md-12" id="liColor">
        <ul class="nav nav-tabs navbar-right">
            <?php if ($_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id']==$_smarty_tpl->tpl_vars['student']->value['fu_id']){?>
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myplan/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">个人成长计划</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievement/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">个人成果清单</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">辅学活动成长记录</a></li>
            <?php }else{ ?>
            <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myplan/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">个人成长计划</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievement/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">个人成果清单</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">辅学活动成长记录</a></li>
            <?php }?>
        </ul>
    </div>

    <div class="col-md-12 panel panel-default">
        <div style="margin-top: 10px;margin-left: 21px;color: #5E005E" >
           <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pr'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pr']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['name'] = 'pr';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['profile_info']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pr']['total']);
?>
            <button onclick="getContent('<?php echo $_smarty_tpl->tpl_vars['profile_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pr']['index']]['mm'];?>
')"><?php echo $_smarty_tpl->tpl_vars['profile_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pr']['index']]['title'];?>
</button>
            <?php endfor; endif; ?>
       </div>

        <div class="panel-body" style="height:500px;width: 1100px;border:solid #ffffff 1px;margin-top: 10px;margin-left: 20px">
            <?php if (isset($_smarty_tpl->tpl_vars['result_info']->value)){?>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['info'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['info']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['name'] = 'info';
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['result_info']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total']);
?>
               <?php echo $_smarty_tpl->tpl_vars['result_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['info']['index']]['content'];?>

            <?php endfor; else: ?>
               暂无数据
            <?php endif; ?>
            <?php }else{ ?>
            暂无数据
            <?php }?>
        </div>

    </div>
    </ul>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>