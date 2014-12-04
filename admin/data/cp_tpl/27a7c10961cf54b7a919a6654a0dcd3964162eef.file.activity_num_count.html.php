<?php /* Smarty version Smarty-3.1.14, created on 2014-11-28 16:08:03
         compiled from "admin\tpl\activitymanage\activity_num_count.html" */ ?>
<?php /*%%SmartyHeaderCode:20979547805b53b9360-35004892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27a7c10961cf54b7a919a6654a0dcd3964162eef' => 
    array (
      0 => 'admin\\tpl\\activitymanage\\activity_num_count.html',
      1 => 1417161986,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20979547805b53b9360-35004892',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547805b5451905_73284353',
  'variables' => 
  array (
    'web_url' => 0,
    'activity_type' => 0,
    'value3' => 0,
    'select_class' => 0,
    'value1' => 0,
    'value2' => 0,
    'count' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547805b5451905_73284353')) {function content_547805b5451905_73284353($_smarty_tpl) {?><html>
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
    <script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#start").focus(function(){
                WdatePicker({dateFmt:'yyyy-MM-dd'});
            });

            $("#end").focus(function(){
                WdatePicker({dateFmt:'yyyy-MM-dd'});
            });
        });
        function xnhd_onclick(){
            $("#zn").hide();
            $("#nian").show();
        }
        function zhd_onclick(){
            $("#nian").hide();
            $("#zn").show();
        }
    </script>
</head>
<body>
<div style="width: 100%; "></div></br></br>
<div style="width: 80%;margin:0 auto;border-style:solid;border-width: 1px">
    <form action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/activityManage/activity_num_count" name="form1" method="post">
    <div>统计条件</div></br>
    <div>统计对象<input type="radio" id="zhd" value="0" onclick="zhd_onclick()" checked name="activity"/>周活动<input type="radio" id="xnhd" value="1" name="activity" onclick="xnhd_onclick()"/>学年活动</div>
	</br>
	<div id="" style="float: left">时间段<input type="text" value="日期控件" name="start_time" id="start" class="Wdate"/>至<input type="text" value="日期控件" name="end_time" id="end" class="Wdate"/></div>
    <div id="zn" style="">
        统计单位
        <select name="time_zn" id="" >
            <option value="7" selected>周</option>
            <option value="365">年</option>

        </select>
    </div>
	</br>
    <div id="nian" style="display: none">
        统计单位
            <select name="" id="" >
                <option selected>请选择</option>
                <option value="365">年</option>
            </select>
    </div></br>
    <div>分类标准
        <select name="st1"  >
            <OPTION  selected value="1">全部</OPTION>
            <OPTION  value="2">按类型</OPTION>
            <OPTION  value="3">按学院</OPTION>
            <OPTION  value="4">按主办方</OPTION>
            <OPTION  value="5">按辅学目标</OPTION>
        </select>
    </div></br>
    <input type="submit" name="submit" value="统计"/>
    </form>
</div>

<div style="width: 620px;margin: 0 auto;margin-top: 30px">
    <div style="width: 160px;float: left;border-width: 1px;border-style: solid">时间</div>

    <?php  $_smarty_tpl->tpl_vars['value3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['activity_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value3']->key => $_smarty_tpl->tpl_vars['value3']->value){
$_smarty_tpl->tpl_vars['value3']->_loop = true;
?>
    <div style="width: 80px;float: left;border-width: 1px;border-style: solid"> <?php echo $_smarty_tpl->tpl_vars['value3']->value['at_name'];?>
</div>

    <?php } ?>

    <div style="width: 80px;float: left;border-width: 1px;border-style: solid">发布量</div>
</div>
<div style="width:620px;margin: 0 auto;margin-top: 2px">
    <?php  $_smarty_tpl->tpl_vars['value1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['select_class']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value1']->key => $_smarty_tpl->tpl_vars['value1']->value){
$_smarty_tpl->tpl_vars['value1']->_loop = true;
?>
    <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(0, null, 0);?>
    <div style="width: 160px;float: left;border-width: 1px;border-style: solid"><?php echo $_smarty_tpl->tpl_vars['value1']->value[0];?>
/<?php echo $_smarty_tpl->tpl_vars['value1']->value[1];?>
</div>
    <?php  $_smarty_tpl->tpl_vars['value2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['value1']->value[2]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value2']->key => $_smarty_tpl->tpl_vars['value2']->value){
$_smarty_tpl->tpl_vars['value2']->_loop = true;
?>
      <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_smarty_tpl->tpl_vars['value2']->value['num']+$_smarty_tpl->tpl_vars['count']->value, null, 0);?>
    <div style="width: 80px;float: left;border-width: 1px;border-style: solid"><?php echo $_smarty_tpl->tpl_vars['value2']->value['num'];?>
</div>

    <?php } ?>
    <div style="width: 80px;float: left;border-width: 1px;border-style: solid"><?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</div>
    <?php } ?>

</div>



</body>
</html><?php }} ?>