<?php /* Smarty version Smarty-3.1.14, created on 2014-11-27 11:16:33
         compiled from "app\tpl\header.html" */ ?>
<?php /*%%SmartyHeaderCode:31129544de73b6516b7-77563412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0407cc30255fa2efd07c2132514ad9bb0bf08bed' => 
    array (
      0 => 'app\\tpl\\header.html',
      1 => 1417058190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31129544de73b6516b7-77563412',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544de73b8714d1_30373674',
  'variables' => 
  array (
    'web_url' => 0,
    '__userinfo__' => 0,
    'countNotReadMessage' => 0,
    'countMessage' => 0,
    'type' => 0,
    'selectMenu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544de73b8714d1_30373674')) {function content_544de73b8714d1_30373674($_smarty_tpl) {?><script>

    function openClock(){
        $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/common/clock",function(data){
            if(data!=0){
                alert(data);
            }
            // $("#body").html(data);
        });
    }
    if('<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
'){
        window.onload = function(){
            setInterval(openClock, 3000);
        }
    }

</script>
<link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/css/header.css" rel="stylesheet">
<header class="navbar site-user-operation" id="top" role="banner">
    <div class="container">
        <div class="header-logo"></div>
        <ul class="nav navbar-nav navbar-right">
            <li  style="background:#9C2D7C;margin:10px;">
                <?php if (isset($_smarty_tpl->tpl_vars['__userinfo__']->value)){?>
                <a style="color:white;" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Account/Logout">退出</a>
                <?php }else{ ?>
                <a style="color:white;" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Account/login">登录 </a>
                <?php }?>
            </li>
            <li class="active"  style="background:#9C2D7C;margin:10px;">
                <?php if (isset($_smarty_tpl->tpl_vars['__userinfo__']->value)){?>
                <a style="color:white;" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/mycenter">个人中心</a>
                <?php }else{ ?>
                <a style="color:white;" href="#">个人中心</a>
                <?php }?>
            </li>
            <li  style="background:#9C2D7C;margin:10px;">
                <?php if (isset($_smarty_tpl->tpl_vars['__userinfo__']->value)){?>
                <a style="color:white;" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/message">查看消息<span style="color: red"><?php if ($_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id']!=null){?>(<?php echo $_smarty_tpl->tpl_vars['countNotReadMessage']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['countMessage']->value;?>
)<?php }?></span></a>
                <?php }else{ ?>
                <a style="color:white;" href="#">查看消息<span style="color: red"></span></a>
                <?php }?>
            </li>
        </ul>
        <?php if (isset($_smarty_tpl->tpl_vars['__userinfo__']->value)){?>
        <p class="navbar-text navbar-right" style="margin-top:25px;color:white;">您好，<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_realname'];?>
</p>
        <?php }?>
    </div>
</header>
<div class="container-bg">
    <div class="header-guide-container">
        <div class="header-guide-leftbg header-guide-bg"></div>
        <div class="header-guide-rightbg header-guide-bg"></div>
        <div style="clear:both;"></div>
        <div class="header-guide">
            <div id="header-guide">
                <!-- <div class="col-md-12">
                  <div class="full-banner"></div>
                </div>
                -->
            </div>
            <script>
                function remove_class(){
                    $("#first_ele").removeClass();
                }
                function add_class(){
                    $("#first_ele").addClass("nav-selected");
                }
            </script>
            <div class="row">
                <div class="col-md-12">
                    <div id="guide-text" class="navbar navbar-default">
                        <ul class="nav navbar-nav">
                            <li onclick="add_class()" id="first_ele"  class="<?php if (isset($_smarty_tpl->tpl_vars['type']->value)&&$_smarty_tpl->tpl_vars['type']->value==1){?>nav-selected<?php }?>">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Index/index">首页</a>
                            </li>
                            <li onclick="remove_class()" class="dropdown <?php if (isset($_smarty_tpl->tpl_vars['type']->value)&&$_smarty_tpl->tpl_vars['type']->value==2){?>nav-selected<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['selectMenu']->value)&&$_smarty_tpl->tpl_vars['selectMenu']->value==0){?>nav-selected<?php }?>" >
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="width:192px;">素质发展辅学平台</a>
                                <?php if (isset($_smarty_tpl->tpl_vars['__userinfo__']->value)){?>
                                <ul class="dropdown-menu">
                                    <?php if ($_smarty_tpl->tpl_vars['__userinfo__']->value['role_id']==7||$_smarty_tpl->tpl_vars['__userinfo__']->value['role_id']==8){?>
                                    <li onclick="shao(this)"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/AssistActivity/activity_class/1">辅学活动(周活动)</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/AssistActivity/activity_class/0">辅学活动(年活动)</a></li>
                                    <li><a onclick="alert('正在建设中..');" href="#">辅学课程</a></li>
                                    <li><a href="http://career.nankai.edu.cn/">生涯发展咨询</a></li>
                                    <li><a href="#">心理发展咨询</a></li>
                                    <?php }?>
                                </ul>
                                <?php }?>
                            </li>
                            <li onclick="remove_class()" class="dropdown <?php if (isset($_smarty_tpl->tpl_vars['type']->value)&&$_smarty_tpl->tpl_vars['type']->value==3){?>nav-selected<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['selectMenu']->value)&&$_smarty_tpl->tpl_vars['selectMenu']->value==1){?>nav-selected<?php }?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="width:180px;">综合素质评估</a>
                                <?php if (isset($_smarty_tpl->tpl_vars['__userinfo__']->value)){?>
                                <ul class="dropdown-menu">
                                    <?php if ($_smarty_tpl->tpl_vars['__userinfo__']->value['role_id']==7){?>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/xsrxPropaganda">新生入学评估</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/xnmPropaganda">学年末评估</a></li>
                                    <?php }elseif($_smarty_tpl->tpl_vars['__userinfo__']->value['role_id']==8){?>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/collegeAssessmentList">各学院评估细则</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/collegePropagandaList">各学院宣讲方案</a></li>
                                    <?php }elseif($_smarty_tpl->tpl_vars['__userinfo__']->value['role_id']==11){?>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/Committee">评委会定性评价</a></li>
                                    <?php }?>
                                </ul>
                                <?php }?>
                            </li>
                            <li onclick="remove_class()"  class="dropdown <?php if (isset($_smarty_tpl->tpl_vars['type']->value)&&$_smarty_tpl->tpl_vars['type']->value==4){?>nav-selected<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['selectMenu']->value)&&$_smarty_tpl->tpl_vars['selectMenu']->value==3){?>nav-selected<?php }?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="width:140px;">成长档案</a>
                                <?php if (isset($_smarty_tpl->tpl_vars['__userinfo__']->value)){?>
                                <ul class="dropdown-menu">
                                    <?php if ($_smarty_tpl->tpl_vars['__userinfo__']->value['role_id']==7){?>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/id/<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
">我的成长档案（学生）</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myclass/id/<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
">查看本专业成长档案（学生）</a></li>
                                    <?php }elseif($_smarty_tpl->tpl_vars['__userinfo__']->value['role_id']==8){?>
                                    <!--<li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/assistant/id/<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
">查看班级成长档案（辅导员）</a></li>-->
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/dean/id/<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
">查看本院成长档案（教职工）</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/president/id/<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
">查看所有成长档案（校领导）</a></li>
                                    <?php }?>
                                </ul>
                                <?php }?>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container main"><?php }} ?>