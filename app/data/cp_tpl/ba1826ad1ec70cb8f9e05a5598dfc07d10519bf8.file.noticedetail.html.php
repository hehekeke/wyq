<?php /* Smarty version Smarty-3.1.14, created on 2014-11-26 13:08:55
         compiled from "app\tpl\notice\noticedetail.html" */ ?>
<?php /*%%SmartyHeaderCode:20441547526deacedb1-03114604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba1826ad1ec70cb8f9e05a5598dfc07d10519bf8' => 
    array (
      0 => 'app\\tpl\\notice\\noticedetail.html',
      1 => 1416978531,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20441547526deacedb1-03114604',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547526dec17000_16271177',
  'variables' => 
  array (
    'web_url' => 0,
    'notice_detail' => 0,
    'preNotice' => 0,
    'nextNotice' => 0,
    'hotNotice' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547526dec17000_16271177')) {function content_547526dec17000_16271177($_smarty_tpl) {?><!DOCTYPE html>
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
    function upload(file_name,file_link){
        var file_link = ('<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
'+file_link).replace(/\//g,"=");
        var file_name = file_name;
        //alert(file_link);
        location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/UploadFile/uploadFile/file_name/"+file_name+"/file_link/"+file_link;

    }
</script>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div>
    <div>
        <h3 style="border-bottom: 1px solid #eee;padding-bottom:9px ">当前位置：首页>通知公告>详情</h3>
    </div>
    <div class="center" style="float: left;width: 800px;">
        <h3 style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['notice_detail']->value[0]['notice_title'];?>
</h3>
        <span><center><?php echo $_smarty_tpl->tpl_vars['notice_detail']->value[0]['notice_create_time'];?>
  浏览次数：<?php echo $_smarty_tpl->tpl_vars['notice_detail']->value[0]['notice_read_num'];?>
次</center></span>
        <div class="content" style="width: 800px;border-bottom:  1px solid #eee;overflow:hidden;">
         <?php echo $_smarty_tpl->tpl_vars['notice_detail']->value[0]['notice_content'];?>
<br>
          <?php if ($_smarty_tpl->tpl_vars['notice_detail']->value[0]['file_id']==0||$_smarty_tpl->tpl_vars['notice_detail']->value[0]['file_id']==null){?>
          <?php }else{ ?>
          附件：<a style="cursor: pointer" onclick="upload('<?php echo $_smarty_tpl->tpl_vars['notice_detail']->value[0]['file_name'];?>
','<?php echo $_smarty_tpl->tpl_vars['notice_detail']->value[0]['file_link'];?>
')"><?php echo $_smarty_tpl->tpl_vars['notice_detail']->value[0]['file_name'];?>
</a>
          <?php }?>
        </div>
        <div style="margin-top: 10px">
            <?php if ($_smarty_tpl->tpl_vars['preNotice']->value==false){?>
            <span>上一条：没有了</span><br>
            <?php }else{ ?>
            <span>上一条：<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Notice/noticeDetail/id/<?php echo $_smarty_tpl->tpl_vars['preNotice']->value[0]['notice_id'];?>
">【<?php echo $_smarty_tpl->tpl_vars['preNotice']->value[0]['nt_name'];?>
】<?php echo $_smarty_tpl->tpl_vars['preNotice']->value[0]['notice_title'];?>
</a></span><br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['nextNotice']->value==false){?>
            <span>下一条：没有了</span><br>
            <?php }else{ ?>
            <span>下一条：<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Notice/noticeDetail/id/<?php echo $_smarty_tpl->tpl_vars['nextNotice']->value[0]['notice_id'];?>
">【<?php echo $_smarty_tpl->tpl_vars['nextNotice']->value[0]['nt_name'];?>
】<?php echo $_smarty_tpl->tpl_vars['nextNotice']->value[0]['notice_title'];?>
</a></span>
            <?php }?>

        </div>
    </div>

    <div style="width: 300px;height: 500px;float: right">
        <table class="table table-bordered" id="newTable">
            <thead>
            <tr style="background:#EEAEEE">
                <th><center>热门公告</center></th>
            </tr>
            </thead>
            <tbody>

            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['no'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['no']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['name'] = 'no';
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['hotNotice']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['no']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['no']['total']);
?>
            <tr>
                <td><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Notice/noticeDetail/id/<?php echo $_smarty_tpl->tpl_vars['hotNotice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['notice_id'];?>
">【<?php echo $_smarty_tpl->tpl_vars['hotNotice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['nt_name'];?>
】  <?php echo $_smarty_tpl->tpl_vars['hotNotice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['notice_title'];?>
</a></td>
            </tr>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['hotNotice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['notice_create_time'];?>
  浏览：<?php echo $_smarty_tpl->tpl_vars['hotNotice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['notice_read_num'];?>
次</td>
            </tr>
            <?php endfor; endif; ?>

            </tbody>
        </table>
    </div>

</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>