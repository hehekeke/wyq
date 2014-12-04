<?php /* Smarty version Smarty-3.1.14, created on 2014-11-29 15:45:57
         compiled from "app\tpl\center\center.html" */ ?>
<?php /*%%SmartyHeaderCode:23081544dedd028c222-53861430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba110c43f7b38a08721b3c89730e856fe22f294d' => 
    array (
      0 => 'app\\tpl\\center\\center.html',
      1 => 1417247152,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23081544dedd028c222-53861430',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544dedd03cc412_31059686',
  'variables' => 
  array (
    'web_url' => 0,
    'student' => 0,
    'stupw' => 0,
    '__userinfo__' => 0,
    'headPicture' => 0,
    'detail' => 0,
    'smg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544dedd03cc412_31059686')) {function content_544dedd03cc412_31059686($_smarty_tpl) {?>﻿<!DOCTYPE html>
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
     <script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/js/dot.min.js"></script>
	 <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/jquery.uploadify.min.js"></script>
    <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/css/dialog.css">
    <script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/js/dialog.min.js"></script>
    <script type="text/javascript">
        function editName(){
            var id = '<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
';
            var name = $('#name').val();
            $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/editName",{"name":name,"id":id},function(data){

                if(data==1){
                    alert("修改成功,下次登录生效");
                }else{
                    alert("修改失败");
                }
            });
        }
		
	
    </script>
    <style>
        input{
            color: #000000;
        }
    </style>
</head>
<body><?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <p id="pw" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['stupw']->value['fu_pw'];?>
</p>
  <p id="salt" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['stupw']->value['fu_salt'];?>
</p>
 <div class="row">
    <div class="col-md-12">
        <div class="page-header"><h3><?php echo $_smarty_tpl->tpl_vars['student']->value['fu_realname'];?>
的个人中心</h3></div>
    </div>
    <div class="col-md-2">
        <div class="list-group">
            <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/mycenter" class="list-group-item active">个人资料</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/followActivity" class="list-group-item">我关注的活动</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/syllabus" class="list-group-item">我的课程表</a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/message" class="list-group-item">我的消息</a>
        </div>
    </div>
    <div class="col-md-8" style="height: 350px">

        <fieldset style="border-bottom: solid 1px">
            <legend style="color:#FFFFFF">个人资料设置</legend>
            <form>
                昵称：<input id="name" type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_nickname'];?>
"/><input type="button" onclick="editName()" value="修改"/>
            </form>
            <div style="margin-left: 45px;margin-top: 10px">
                <form action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/pictureUpload" method="post" enctype="multipart/form-data" style="margin-bottom: 20px">
                    <input type="file" id="upFile" name="upFile"   value="选择图片">
					<div id="img">
						<img  style="width: 150px;height: 150px" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['headPicture']->value;?>
"><br>
					</div>
					<input type="hidden" name="picid" id="hidFileID" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['pic_id'];?>
" />
                    <input type="submit" value="保存头像"><span style="color: red"><?php echo $_smarty_tpl->tpl_vars['smg']->value;?>
</span>
                </form>
            </div>
        </fieldset>

    </div>
</div>
   <?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>