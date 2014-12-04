<?php /* Smarty version Smarty-3.1.14, created on 2014-11-03 09:59:55
         compiled from "app\tpl\center\message.html" */ ?>
<?php /*%%SmartyHeaderCode:321505456e19b04e4e9-11893069%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be0bb362b605e097533efeabef8008dbb85b343e' => 
    array (
      0 => 'app\\tpl\\center\\message.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '321505456e19b04e4e9-11893069',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'messageListPage' => 0,
    'num' => 0,
    'prePage' => 0,
    'nextPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5456e19b37cb52_03486882',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5456e19b37cb52_03486882')) {function content_5456e19b37cb52_03486882($_smarty_tpl) {?><!DOCTYPE html>

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
      function deleteFeedback(mes_id){
          $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/center/delMessage",{"mes_id":mes_id},function(data){
                if(data != false){
                      location.reload();
                }else{
                    alert("删除失败！");
                }
          });
      }
      function checkAll(){
          var messages = document.getElementsByName("messageInfo");
          if($("#checkAll").is(':checked')){
              for(var i=0;i<messages.length;i++){
                messages[i].checked="checked";
              }
          }else{
              for(var i=0;i<messages.length;i++){
                  messages[i].checked="";
              }
          }
      }

      function delAll(){
          var message = $("#messageList input");
          var messageValues = new Array();
          var j = 0;
          for(var i= 0;i<message.length;i++){
              if(message[i].checked){
                  messageValues[j++] = message[i].value;

              }
          }
          $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/center/delAll",{"messageValues":messageValues},function(data){

                if(data==1){
                    alert("批量删除成功！!");
                    location.reload();
                }else{
                    alert("删除失败！！");
                }

          });
      }
      function readAll(){
          var message = $("#messageList input");
          var messageValues = new Array();
          var j = 0;
          for(var i= 0;i<message.length;i++){
              if(message[i].checked){
                  messageValues[j++] = message[i].value;
              }
          }
          $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/center/readAll",{"messageValues":messageValues},function(data){
              if(data==1){
                  alert("标志为已读成功");
                  location.reload();
              }else{
                  alert("标志失败");
              }

          });
      }

      function skip(){
          var totalPage = parseInt('<?php echo $_smarty_tpl->tpl_vars['messageListPage']->value['totalPage'];?>
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
/index.php/center/message/page/"+num;
          }
      }
  </script>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
        
  <div class="col-md-12">
    <div class="page-header"><h3>当前位置：首页>我的消息</h3></div>
  </div>
  <div class="col-md-1">
  </div>
  <div class="col-md-11">
	<table class="table table-bordered">
        <?php if ($_smarty_tpl->tpl_vars['messageListPage']->value['totalPage']==0){?>
        <?php }else{ ?>
  	  <thead style="">
  	  	<td><input id="checkAll" type="checkbox" name="checkAll" onclick="checkAll()"></td>
  	  	<td>內容</td>
  	  	<td>时间</td>
  	  	<td style="width: 190px">
            <button class="btn btn-default" onclick="javascript:if(confirm('确实要删除吗?'))delAll()">批量删除</button>
            <button class="btn btn-default" onclick="javascript:if(confirm('确实要标志为已读吗?'))readAll()">标志已读</button>
        </td>
  	  </thead>
        <?php }?>
  	  <tbody id="messageList">

      <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['me'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['me']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['me']['name'] = 'me';
$_smarty_tpl->tpl_vars['smarty']->value['section']['me']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['messageListPage']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['me']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['me']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['me']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['me']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['me']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['me']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['me']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['me']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['me']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['me']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['me']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['me']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['me']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['me']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['me']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['me']['total']);
?>
  	  <tr>
  	    <td><input type="checkbox" name="messageInfo" value="<?php echo $_smarty_tpl->tpl_vars['messageListPage']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['me']['index']]['mes_id'];?>
"></td>
  	  	<td>
            <?php if ($_smarty_tpl->tpl_vars['messageListPage']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['me']['index']]['mes_type']==0){?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/<?php echo $_smarty_tpl->tpl_vars['messageListPage']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['me']['index']]['activity_class'];?>
/activityId/<?php echo $_smarty_tpl->tpl_vars['messageListPage']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['me']['index']]['activity_id'];?>
/if_read/1/mes_id/<?php echo $_smarty_tpl->tpl_vars['messageListPage']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['me']['index']]['mes_id'];?>
">
                <?php echo $_smarty_tpl->tpl_vars['messageListPage']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['me']['index']]['mes_content'];?>

                <?php if ((strtotime($_smarty_tpl->tpl_vars['messageListPage']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['me']['index']]['activity_start_time'])-time())<0){?>
                <?php $_smarty_tpl->tpl_vars['num'] = new Smarty_variable(0, null, 0);?>
                <?php }else{ ?>
                <?php $_smarty_tpl->tpl_vars['num'] = new Smarty_variable(ceil((strtotime($_smarty_tpl->tpl_vars['messageListPage']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['me']['index']]['activity_start_time'])-time())/(60*60*24)), null, 0);?>
               <?php }?>
                <?php echo $_smarty_tpl->tpl_vars['num']->value;?>
天
            </a>
            <?php }else{ ?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/<?php echo $_smarty_tpl->tpl_vars['messageListPage']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['me']['index']]['activity_class'];?>
/activityId/<?php echo $_smarty_tpl->tpl_vars['messageListPage']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['me']['index']]['activity_id'];?>
/if_read/1/mes_id/<?php echo $_smarty_tpl->tpl_vars['messageListPage']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['me']['index']]['mes_id'];?>
">
                <?php echo $_smarty_tpl->tpl_vars['messageListPage']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['me']['index']]['mes_content'];?>

            </a>
            <?php }?>
        </td>
  	  	<td style="width: 170px"><?php echo $_smarty_tpl->tpl_vars['messageListPage']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['me']['index']]['mes_create_time'];?>
</td>
  	  	<td><button class="btn btn-default" onclick="javascript:if(confirm('确实要删除吗?'))deleteFeedback('<?php echo $_smarty_tpl->tpl_vars['messageListPage']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['me']['index']]['mes_id'];?>
')">删除　　</button><?php if ($_smarty_tpl->tpl_vars['messageListPage']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['me']['index']]['if_read']==1){?>已读<?php }?></td>
  	  </tr>
      <?php endfor; else: ?>
      <!--<tr><td><span>暂无消息</span></td></tr>-->
      <?php endif; ?>
  	  </tbody>
	</table>
      <div id="page" style="text-align: center">
          <?php if ($_smarty_tpl->tpl_vars['messageListPage']->value['totalPage']>0){?>
          <?php if ($_smarty_tpl->tpl_vars['messageListPage']->value['totalPage']>1){?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/center/message/page/1">首页</a>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['messageListPage']->value['page']>1){?>
          <?php $_smarty_tpl->tpl_vars['prePage'] = new Smarty_variable($_smarty_tpl->tpl_vars['messageListPage']->value['page']-1, null, 0);?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/center/message/page/<?php echo $_smarty_tpl->tpl_vars['prePage']->value;?>
">上一页</a>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['messageListPage']->value['page']<$_smarty_tpl->tpl_vars['messageListPage']->value['totalPage']){?>
          <?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_variable($_smarty_tpl->tpl_vars['messageListPage']->value['page']+1, null, 0);?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/center/message/page/<?php echo $_smarty_tpl->tpl_vars['nextPage']->value;?>
">下一页</a>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['messageListPage']->value['totalPage']>1){?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/center/message/page/<?php echo $_smarty_tpl->tpl_vars['messageListPage']->value['totalPage'];?>
">尾页</a>
          跳转到<input id="num" type="text" style="line-height:10px;color:#000000;width: 50px;height: 20px;margin-left: 5px"><input style="height:20px;line-height:10px;color: #000000" type="button" value="GO" onclick="skip()">
          <?php }?>

          <span style="margin-left: 20px">当前第<?php echo $_smarty_tpl->tpl_vars['messageListPage']->value['page'];?>
页/共<?php echo $_smarty_tpl->tpl_vars['messageListPage']->value['totalPage'];?>
页</span>
          <?php }else{ ?>
          <h2 style="border: 1px solid">暂无消息</h2>
          <?php }?>
      </div>
  </div>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  </body>
</html><?php }} ?>