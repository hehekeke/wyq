<?php /* Smarty version Smarty-3.1.14, created on 2014-11-26 07:28:10
         compiled from "app\tpl\notice\morenotice.html" */ ?>
<?php /*%%SmartyHeaderCode:72845474825dd5ea81-23669426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a1fdcb450b5922786bbd05e78c7428ae5563449' => 
    array (
      0 => 'app\\tpl\\notice\\morenotice.html',
      1 => 1416958084,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72845474825dd5ea81-23669426',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5474825ded5ae3_38833324',
  'variables' => 
  array (
    'web_url' => 0,
    'noticeList' => 0,
    'prePage' => 0,
    'nextPage' => 0,
    'hotNotice' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5474825ded5ae3_38833324')) {function content_5474825ded5ae3_38833324($_smarty_tpl) {?><!DOCTYPE html>
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
    .content span{
        float: right;
    }
    .content li{
        list-style-type: none;
        margin-top: 10px;
        color: wheat;
        letter-spacing:3px
    }
    input{
        color: #000000;

    }
</style>
<script>

        function skip(){
            var totalPage = parseInt('<?php echo $_smarty_tpl->tpl_vars['noticeList']->value['totalPage'];?>
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
/index.php/Notice/moreNotice/page/"+num;
            }
         }
</script>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="center">
    <div>

        <h3 style="border-bottom: 1px solid #eee;padding-bottom:9px ">当前位置：首页>通知公告>更多</h3>

    </div>
    <div style="width: 800px;height: 500px;float: left">
        <div class="content" style="height:350px">
            <ul>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['no'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['no']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['name'] = 'no';
$_smarty_tpl->tpl_vars['smarty']->value['section']['no']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['noticeList']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Notice/noticeDetail/id/<?php echo $_smarty_tpl->tpl_vars['noticeList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['notice_id'];?>
"><?php echo ($_smarty_tpl->tpl_vars['noticeList']->value['page']-1)*10+$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']+1;?>
.【<?php echo $_smarty_tpl->tpl_vars['noticeList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['nt_name'];?>
】<?php echo $_smarty_tpl->tpl_vars['noticeList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['notice_title'];?>
</a><span>浏览：<?php if ($_smarty_tpl->tpl_vars['noticeList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['notice_read_num']==null){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['noticeList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['notice_read_num'];?>
<?php }?>次&nbsp;<?php echo $_smarty_tpl->tpl_vars['noticeList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['notice_create_time'];?>
</span></a></li>
                <?php endfor; endif; ?>
            </ul>
        </div>
        <div id="page" style="text-align: center;margin-top: 20px;">
            <?php if ($_smarty_tpl->tpl_vars['noticeList']->value['totalPage']>1){?>
            <span>当前第<?php echo $_smarty_tpl->tpl_vars['noticeList']->value['page'];?>
页/共<?php echo $_smarty_tpl->tpl_vars['noticeList']->value['totalPage'];?>
页</span>
            <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Notice/moreNotice/page/1">首页</a>
            <?php if ($_smarty_tpl->tpl_vars['noticeList']->value['page']>1){?>
            <?php $_smarty_tpl->tpl_vars['prePage'] = new Smarty_variable($_smarty_tpl->tpl_vars['noticeList']->value['page']-1, null, 0);?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Notice/moreNotice/page/<?php echo $_smarty_tpl->tpl_vars['prePage']->value;?>
">上一页</a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['noticeList']->value['page']<$_smarty_tpl->tpl_vars['noticeList']->value['totalPage']){?>
            <?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_variable($_smarty_tpl->tpl_vars['noticeList']->value['page']+1, null, 0);?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Notice/moreNotice/page/<?php echo $_smarty_tpl->tpl_vars['nextPage']->value;?>
">下一页</a>
            <?php }?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Notice/moreNotice/page/<?php echo $_smarty_tpl->tpl_vars['noticeList']->value['totalPage'];?>
">尾页</a>
            跳转到<input id="num" type="text" style="line-height:10px;width: 50px;height: 20px;margin-left: 5px"><input style="height: 20px;line-height: 11px" type="button" value="GO" onclick="skip()">
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
  浏览：<?php if ($_smarty_tpl->tpl_vars['hotNotice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['notice_read_num']==null){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['hotNotice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['no']['index']]['notice_read_num'];?>
<?php }?>次</td>
            </tr>
            <?php endfor; endif; ?>

            </tbody>
        </table>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>