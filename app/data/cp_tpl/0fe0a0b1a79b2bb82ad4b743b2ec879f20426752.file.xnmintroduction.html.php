<?php /* Smarty version Smarty-3.1.14, created on 2014-10-28 09:46:59
         compiled from "app\tpl\assessment\xnmintroduction.html" */ ?>
<?php /*%%SmartyHeaderCode:30726544ef593165d47-70408384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0fe0a0b1a79b2bb82ad4b743b2ec879f20426752' => 
    array (
      0 => 'app\\tpl\\assessment\\xnmintroduction.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30726544ef593165d47-70408384',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'content' => 0,
    'zz_zhibiao' => 0,
    'file_result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544ef59339ffc0_02879261',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ef59339ffc0_02879261')) {function content_544ef59339ffc0_02879261($_smarty_tpl) {?><!DOCTYPE html>

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
  <?php $_smarty_tpl->tpl_vars['lefttype'] = new Smarty_variable(2, null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ('assessment/xnm-left-function.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <div class="col-md-10">
  <?php if ($_smarty_tpl->tpl_vars['content']->value!=0){?>
  <?php if ($_smarty_tpl->tpl_vars['content']->value['asspro_state']==3){?>
    <center>
      <h3><?php echo $_smarty_tpl->tpl_vars['content']->value['asspro_title'];?>
</h3>
      <h6><?php echo $_smarty_tpl->tpl_vars['content']->value['asspro_create_time'];?>
</h6>
    </center>
      <table class="table table-bordered">
	  <thead style="background-color:#e7e7e7;color:#2E3641;">
	<?php if (!isset($_smarty_tpl->tpl_vars['zz_zhibiao']->value)){?>
	<tr><th style="text-align:center;">一级指标</th><th style="text-align:center;">二级指标</th><th style="text-align:center;">内容</th></tr>
	<?php }else{ ?>
	<tr><th style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['zz_zhibiao']->value[0]['zbdj_name'];?>
</th><th style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['zz_zhibiao']->value[1]['zbdj_name'];?>
</th><th style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['zz_zhibiao']->value[2]['zbdj_name'];?>
</th></tr>
	<?php }?>
	    
	   
	  </thead>
	  <tbody>
	    <tr>
	      <td rowspan="<?php echo $_smarty_tpl->tpl_vars['content']->value['asspro_gong_num'];?>
" style="vertical-align:middle">公</td>
	      <td><?php echo $_smarty_tpl->tpl_vars['content']->value['second'][0];?>
</td>
	      <td><?php echo $_smarty_tpl->tpl_vars['content']->value['third'][0];?>
</td>
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
		<tr>
	      <td rowspan="<?php echo $_smarty_tpl->tpl_vars['content']->value['asspro_neng_num']+1;?>
" style="vertical-align:middle">能</td>
	    </tr>
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
	      <td><?php echo $_smarty_tpl->tpl_vars['content']->value['second'][$_smarty_tpl->getVariable('smarty')->value['section']['neng']['index']];?>
</td>
	      <td><?php echo $_smarty_tpl->tpl_vars['content']->value['third'][$_smarty_tpl->getVariable('smarty')->value['section']['neng']['index']];?>
</td>
	    </tr>
	    <?php endfor; endif; ?>
	  </tbody>
	</table>
      <?php if (isset($_smarty_tpl->tpl_vars['file_result']->value)){?>
      <div style="margin-bottom:15px">
          <span>附件:</span>
          <ul>
             <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['files'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['files']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['name'] = 'files';
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['file_result']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['files']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['files']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['files']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['files']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['files']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['files']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['files']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['files']['total']);
?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['file_result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['files']['index']]['file_link'];?>
"><li ><?php echo $_smarty_tpl->tpl_vars['file_result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['files']['index']]['file_name'];?>
</li></a>
              <?php endfor; endif; ?>
          </ul>
      </div>
      <?php }?>
	<?php }else{ ?>
	评估细则审核中
	<?php }?>
	<?php }else{ ?>
	暂无数据
	<?php }?>
  </div>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  </body>
</html><?php }} ?>