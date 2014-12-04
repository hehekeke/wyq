<?php /* Smarty version Smarty-3.1.14, created on 2014-11-27 16:50:33
         compiled from "app\tpl\assessment\helplist.html" */ ?>
<?php /*%%SmartyHeaderCode:88635476e5d9c13b71-72772216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12e98a71d2444509dfb3f4e0326fb662fc661bfd' => 
    array (
      0 => 'app\\tpl\\assessment\\helplist.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88635476e5d9c13b71-72772216',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'assList' => 0,
    'list' => 0,
    'prePage' => 0,
    'nextPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5476e5d9d158b5_36107260',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5476e5d9d158b5_36107260')) {function content_5476e5d9d158b5_36107260($_smarty_tpl) {?><!DOCTYPE html>

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
  <script>

      function skip(){
          var totalPage = parseInt('<?php echo $_smarty_tpl->tpl_vars['assList']->value['totalPage'];?>
');
          var num = $("#num").val();
          var pattern = /^([0-9]+)$/;
          if(num==""){
              alert("请输入页数！");
          }else if(!pattern.test(num)){
              alert("请输入数字！");
          }else if(num > totalPage){
              alert("超过最大页码");
          }else{
              location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/helpList/type/1/page/"+num;
          }
      }
  </script>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
        
  <div class="col-md-12">
    <div class="page-header" style="margin: 0;margin-top: 10px"><h3>当前位置：小贴士</h3></div>
  </div>
  <div class="col-md-1">
  </div>
  <div class="col-md-11">
    <table class="table">
       <?php if (isset($_smarty_tpl->tpl_vars['list']->value)){?>
     <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total']);
?>
       <tr>
           <td style="width:700px"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/helpDetail/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['article_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['article_title'];?>
</a></td>
           <td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['article_create_time'];?>
</td>
       </tr>
    <?php endfor; endif; ?>
        <?php }else{ ?>
        暂无数据
        <?php }?>
    </table>
      <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
      <div style="text-align:center;margin-top:20px" id="page">
          <?php if ($_smarty_tpl->tpl_vars['list']->value['page']>1){?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/helpList/type/1/page/1">首页</a>
          <?php $_smarty_tpl->tpl_vars['prePage'] = new Smarty_variable($_smarty_tpl->tpl_vars['list']->value['page']-1, null, 0);?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/helpList/type/1/page/<?php echo $_smarty_tpl->tpl_vars['prePage']->value;?>
">上一页</a>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['list']->value['page']<$_smarty_tpl->tpl_vars['list']->value['totalPage']){?>
          <?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_variable($_smarty_tpl->tpl_vars['list']->value['page']+1, null, 0);?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/helpList/type/1/page/<?php echo $_smarty_tpl->tpl_vars['nextPage']->value;?>
">下一页</a>
          <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/helpList/type/1/page/<?php echo $_smarty_tpl->tpl_vars['list']->value['totalPage'];?>
">尾页</a>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['list']->value['totalPage']>1){?>
          跳转到<input id="num" type="text" style="color:#000000;width: 40px;height:20px;margin-left: 5px">
          <button onclick="skip()">GO</button>
          <?php }?>
          <span style="margin-left: 20px">当前第<?php echo $_smarty_tpl->tpl_vars['list']->value['page'];?>
页/共<?php echo $_smarty_tpl->tpl_vars['list']->value['totalPage'];?>
页</span>
      </div>
      <?php }?>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  </body>
</html><?php }} ?>