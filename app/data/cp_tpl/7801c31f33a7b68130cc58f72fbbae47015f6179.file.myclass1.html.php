<?php /* Smarty version Smarty-3.1.14, created on 2014-11-27 16:49:46
         compiled from "app\tpl\record\myclass1.html" */ ?>
<?php /*%%SmartyHeaderCode:24584544f54976e6b54-73578602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7801c31f33a7b68130cc58f72fbbae47015f6179' => 
    array (
      0 => 'app\\tpl\\record\\myclass1.html',
      1 => 1416992334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24584544f54976e6b54-73578602',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544f54978816b4_15266084',
  'variables' => 
  array (
    'web_url' => 0,
    'student' => 0,
    'studentsList' => 0,
    'prePage' => 0,
    'nextPage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544f54978816b4_15266084')) {function content_544f54978816b4_15266084($_smarty_tpl) {?><!DOCTYPE html>

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
    function select(){
        var searchData = $("#search").val();
        location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myclass/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/fu_realname/"+searchData;

    }
    function skip(){
        var totalPage = parseInt('<?php echo $_smarty_tpl->tpl_vars['studentsList']->value['totalPage'];?>
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
/index.php/record/myclass/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/page/"+num;
        }
    }
</script>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
  <div class="col-md-8">
    <div class="page-header"><h3>当前位置：成长档案</h3></div>
    <center><h1><?php echo $_smarty_tpl->tpl_vars['student']->value['fu_grade'];?>
级 <?php echo $_smarty_tpl->tpl_vars['student']->value['major_name'];?>
班级 成长档案</h1></center>
    <table class="table" style="border:1px solid #ddd;"><tr>
      	<td>姓名：</td><td><input class="form-control" id="search"></td>
      	<td><button style="color: #661550" type="button" class="select" onclick="select()">查询</button></td>
    </tr></table>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>序号</th>
        <th>姓名</th>
        <th>学号</th>
        <th>个人成长计划</th>
        <th>个人成果</th>
        <th>辅学活动成长记录</th>
        <th>成长档案</th>
       </tr>
    </thead>
    <tbody>
      <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['stu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['stu']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['name'] = 'stu';
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['studentsList']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['stu']['total']);
?>
      <tr>
        <td><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']+1;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['studentsList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['bks_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['studentsList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['bks_code'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['studentsList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['plans'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['studentsList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['gps'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['studentsList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['acts'];?>
</td>
        <td><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/bks_code/<?php echo $_smarty_tpl->tpl_vars['studentsList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['bks_code'];?>
/id/<?php echo $_smarty_tpl->tpl_vars['studentsList']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['stu']['index']]['fu_id'];?>
">查看</a></td>
      </tr>
      <?php endfor; endif; ?>

    </tbody>
    </table>
      <div class="doPage" style="height: 50px;text-align: center">
          <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myclass/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/page/1">首页</a>
          <?php if ($_smarty_tpl->tpl_vars['studentsList']->value['page']>1){?>
          <?php $_smarty_tpl->tpl_vars['prePage'] = new Smarty_variable($_smarty_tpl->tpl_vars['studentsList']->value['page']-1, null, 0);?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myclass/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/page/<?php echo $_smarty_tpl->tpl_vars['prePage']->value;?>
">上一页</a>
          <?php }?>

          <?php if ($_smarty_tpl->tpl_vars['studentsList']->value['page']<$_smarty_tpl->tpl_vars['studentsList']->value['totalPage']){?>
          <?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_variable($_smarty_tpl->tpl_vars['studentsList']->value['page']+1, null, 0);?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myclass/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/page/<?php echo $_smarty_tpl->tpl_vars['nextPage']->value;?>
">下一页</a>
          <?php }?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myclass/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/page/<?php echo $_smarty_tpl->tpl_vars['studentsList']->value['totalPage'];?>
">尾页</a>

          <span style="margin-left: 20px">当前第<?php echo $_smarty_tpl->tpl_vars['studentsList']->value['page'];?>
页/共<?php echo $_smarty_tpl->tpl_vars['studentsList']->value['totalPage'];?>
页</span>
          跳转到<input id="num" type="text" style="line-height:10px;color:#000000;width: 50px;height: 20px;margin-left: 5px"><input style="height:20px;line-height:10px;color: #000000" type="button" value="GO" onclick="skip()">
      </div>
  </div>
  <div class="col-md-4">
    <?php echo $_smarty_tpl->getSubTemplate ('news.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


  </div>
</ul>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>