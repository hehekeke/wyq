<?php /* Smarty version Smarty-3.1.14, created on 2014-10-27 17:08:22
         compiled from "app\tpl\record\achievement.html" */ ?>
<?php /*%%SmartyHeaderCode:24056544e0b86a1e7c5-62838744%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '386c0529bd140607917075211679419684e4a192' => 
    array (
      0 => 'app\\tpl\\record\\achievement.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24056544e0b86a1e7c5-62838744',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'student' => 0,
    'bks' => 0,
    '__userinfo__' => 0,
    'gpList' => 0,
    'achievement_end_time' => 0,
    'limitAddAndEdit' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544e0b86ebefc1_51843306',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544e0b86ebefc1_51843306')) {function content_544e0b86ebefc1_51843306($_smarty_tpl) {?><!DOCTYPE html>

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
/common/app/js/removeSpaces.js"></script>

  </head>
  <script>

      function add(data){
           var gpt = data;
            $('#addBox').css("display","block");
            $('.gpt').val(gpt);
      }
      function cancelAdd(){
          $('#addBox').css("display","none");
      }

      function cancelEdit(){
          $('#editBox').css("display","none");
      }
      function edit(gp_content,gp_id,rule){
          var gp_content = gp_content;
          var gp_id = gp_id;
          var rule = rule;

          if(rule==1){
              $("#rule1").html("<input id='open' type='radio' name='rule1' value='0'/>公开<input id='limit' type='radio' name='rule1' value='1' checked/>只允许老师查看");
              //$("#limit").attr("checked","true");
          }else{
              $("#rule1").html("<input id='open' type='radio' name='rule1' value='0' checked/>公开<input id='limit' type='radio' name='rule1' value='1'/>只允许老师查看");
              //$("#open").attr("checked","true");
          }
          $('.e_content').val(gp_content);
          $('.gp_id').val(gp_id);
          $('#editBox').css("display","block");
      }

      function save(){

          var gpt = $('.gpt').val();
          var content = $('.content').val();
          content = trim(content);
          var rule = $("input[name='rule']:checked").val();
          if(content ==""){
              alert("内容不能为空！");
          }else{
              $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/addAchievement",{"gpt":gpt,"content":content,"rule":rule,"fu_id":'<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
'},function(data){
                    if(data>0){
                        alert("添加成功！");
                        location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievement/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
";
                    }else{
                        alert("添加失败");
                    }

              });
          }

      }

      function modify(){
          var gp_id = $('.gp_id').val();
          var gp_content = $(".e_content").val();
          gp_content = trim(gp_content);
          var rule = $("input[name='rule1']:checked").val();
          if(gp_content==""){
              alert("内容不能为空！");
          }else{
              $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/editAchievement",{"gp_id":gp_id,"gp_content":gp_content,"rule":rule},function(data){
                    if(data>0){
                        alert("修改成功！");
                        location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievement/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
";
                    }else{
                        alert("修改失败");
                    }
              });
          }
      }

      function btn1(){
          if('<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
'==false){
              location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievement/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
";
          }else{
              location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievement/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
";
          }

      }

      function btn2(){
          //入学年~入学年+1 = 大一
          var data = '<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_grade'];?>
';
          var start_time = '<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_grade'];?>
'+'-09';
          var end_time = parseInt(data)+1+"-09";
          if('<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
'==false){
              location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievementByYear/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/start_time/"+start_time+"/end_time/"+end_time;
          }else{
              location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievementByYear/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/start_time/"+start_time+"/end_time/"+end_time;
          }

      }

      function btn3(){
          //入学年+1~入学年+2 = 大二
          var data = '<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_grade'];?>
';
          var start_time = parseInt(data)+1+'-09';
          var end_time = parseInt(data)+2+"-09";
          if('<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
'==false){
              location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievementByYear/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/start_time/"+start_time+"/end_time/"+end_time;
          }else{
              location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievementByYear/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/start_time/"+start_time+"/end_time/"+end_time;
          }

      }

      function btn4(){
          //入学年+2~入学年+3 = 大三
          var data = '<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_grade'];?>
';
          var start_time = parseInt(data)+2+'-09';
          var end_time = parseInt(data)+3+"-09";
          if('<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
'==false){
              location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievementByYear/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/start_time/"+start_time+"/end_time/"+end_time;
          }else{
              location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievementByYear/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/start_time/"+start_time+"/end_time/"+end_time;
          }

      }

      function btn5(){
          //入学年+2~入学年+3 = 大三
          var data = '<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_grade'];?>
';
          var start_time = parseInt(data)+3+'-09';
          var end_time = parseInt(data)+4+"-09"
          if('<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
'==false){
              location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievementByYear/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/start_time/"+start_time+"/end_time/"+end_time;
          }else{
              location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievementByYear/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/start_time/"+start_time+"/end_time/"+end_time;
          }

      }

  </script>
  <style type="text/css">
      #addBox,#editBox{
          color: #000000;
      }

      #liColor a{
          color: #000000;
          font-weight: bold;
      }

  </style>
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
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myplan/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">个人成长计划</a></li>
          <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/achievement/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">个人成果清单</a></li>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myrecord/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">辅学活动成长记录</a></li>
          <?php }else{ ?>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/myplan/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
/id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
">个人成长计划</a></li>
          <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
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
  <div class="col-md-12 panel panel-default"  >
	<div class="panel-body">
	 阶段：
     <?php if ($_smarty_tpl->tpl_vars['student']->value['role_id']==7){?>
	 <button type="button" class="btn btn-default" onclick="btn1()">全部</button>
	 <button type="button" class="btn btn-default" onclick="btn2()">大一</button>
	 <button type="button" class="btn btn-default" onclick="btn3()">大二</button>
	 <button type="button" class="btn btn-default" onclick="btn4()">大三</button>
	 <button type="button" class="btn btn-default" onclick="btn5()">大四</button>
     <?php }elseif($_smarty_tpl->tpl_vars['student']->value['role_id']==9){?>
        <button type="button" class="btn btn-default" onclick="btn1()">全部</button>
        <button type="button" class="btn btn-default" onclick="btn2()">大一</button>
        <button type="button" class="btn btn-default" onclick="btn3()">大二</button>
        <button type="button" class="btn btn-default" onclick="btn4()">大三</button>
        <button type="button" class="btn btn-default" onclick="btn5()">大四</button>
        <button type="button" class="btn btn-default" onclick="btn5()">大五</button>
      <?php }elseif($_smarty_tpl->tpl_vars['student']->value['role_id']==null){?>
        <button type="button" class="btn btn-default">无数据</button>
      <?php }else{ ?>
        <button type="button" class="btn btn-default" onclick="btn1()">全部</button>
        <button type="button" class="btn btn-default" onclick="btn2()">大一</button>
        <button type="button" class="btn btn-default" onclick="btn3()">大二</button>
        <button type="button" class="btn btn-default" onclick="btn4()">大三</button>
        <button type="button" class="btn btn-default" onclick="btn5()">大四</button>
        <button type="button" class="btn btn-default" onclick="btn5()">大五</button>
        <button type="button" class="btn btn-default" onclick="btn5()">大六</button>
        <button type="button" class="btn btn-default" onclick="btn5()">大七</button>
     <?php }?>


        <div id="addBox" style="width: 560px;height: 233px;display: none;border: 1px solid;z-index:999;background: #ffffff;position:fixed;*position:absolute;left:30%;top: 50%" >
            <div style="width: 500px;height: 200px;margin-left: 26px;margin-top: 20px;border: 1px solid">
                <table>
                    <form name="addForm">
                        <input type="hidden" name="gpt" class="gpt">

                        <tr>
                            <td>成果内容：</td>
                            <td><textarea  style="width: 400px;height: 120px" class="content"></textarea></td>
                        </tr>
                        <tr>
                            <td>查看范围：</td>
                            <td><input type="radio" id="rule"  name="rule" title="0" value="0" checked/>公开<input type="radio" id="rule" title="1" name="rule" value="1" />只允许老师查看</td>
                        </tr>
                        <tr>
                            <td><input type="button" value="保存" onclick="save()"/></td>
                            <td><input type="button" value="取消" onclick="cancelAdd()"/></td>
                        </tr>
                    </form>

                </table>
            </div>
        </div>

        <div id="editBox" style="width: 560px;height: 233px;display: none;z-index:999;border: 1px solid;background: #ffffff;position:fixed;*position:absolute;left:30%;top: 50%" >
            <div style="width: 500px;height: 200px;margin-left: 26px;margin-top: 20px;border: 1px solid">
                <table>
                    <form name="editForm">
                        <input type="hidden" class="gp_id"/>
                        <tr>
                            <td>成果内容：</td>
                            <td><textarea style="width: 400px;height: 120px" class="e_content"></textarea></td>
                        </tr>
                        <tr>
                            <td>查看范围：</td>
                            <td id="rule1"><input type="radio"  name="rule1" id="open" value="0"/>公开<input  type="radio" id="limit" name="rule1" value="1" />只允许老师查看</td>
                        </tr>
                        <tr>
                            <td><input type="button" value="修改" onclick="modify()"/></td>
                            <td><input type="button" value="取消" onclick="cancelEdit()"/></td>
                        </tr>
                    </form>

                </table>
            </div>
        </div>

	 <table class="table" style="">

	   <tr>
         <?php if ($_smarty_tpl->tpl_vars['gpList']->value[0][0]!=null){?>
	    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['gpt'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['name'] = 'gpt';
$_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['gpList']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['gpt']['total']);
?>
		 <td style="float: left;border-top: none">
		   <table class="table table-bordered">
  	   		 <tr style="background:#28a4c9"><td style="height: 37px;width: 253px"><?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][0];?>
<?php if ($_smarty_tpl->tpl_vars['student']->value['role_id']==null){?><a></a><?php }else{ ?><a style="float: right;color: #ffffff;cursor: pointer" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/record/moreAchievement/gpt_name/<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][0];?>
/isALL/1/fu_id/<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
/bks_code/<?php echo $_smarty_tpl->tpl_vars['bks']->value['bks_code'];?>
">更多>></a><?php }?></td></tr>
		   	 <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['gp'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['gp']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['name'] = 'gp';
$_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['gp']['total']);
?>
		   	 <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']==0){?>
		   	 <?php }else{ ?>
               <?php if ($_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id']==$_smarty_tpl->tpl_vars['student']->value['fu_id']){?>
                   <?php if ($_smarty_tpl->tpl_vars['achievement_end_time']->value>=time()){?>
                    <tr style="color:#2E3641;height: 57px;width: 258px"><td style="text-overflow:ellipsis;max-width:180px;white-space:nowrap;overflow: hidden"><a style="cursor:pointer;" title="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['gp']['index'];?>
.<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['grade_id'];?>
年<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['gp_content'];?>
" onclick="edit('<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['gp_content'];?>
','<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['gp_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['rule'];?>
')"> <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['gp']['index'];?>
.<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['grade_id'];?>
<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['gp_content'];?>
</a> <br><i style="color: #ff0000"><?php echo date("Y-m-d H:i:s",$_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['gp_create_time']);?>
</i></td></tr>
                    <?php }else{ ?>
                   <tr style="color:#2E3641;height: 57px;width: 258px"><td style="text-overflow:ellipsis;max-width:180px;white-space:nowrap;overflow: hidden"><a style="cursor:pointer;" title="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['gp']['index'];?>
.<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['grade_id'];?>
年<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['gp_content'];?>
" onclick="alert('已过填写个人成果时间')"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['gp']['index'];?>
.<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['grade_id'];?>
<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['gp_content'];?>
</a> <br><i style="color: #ff0000"><?php echo date("Y-m-d H:i:s",$_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['gp_create_time']);?>
</i></td></tr>
                   <?php }?>
               <?php }else{ ?>
                   <?php if ($_smarty_tpl->tpl_vars['__userinfo__']->value['role_id']==7&&$_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['rule']==1){?>
                   <tr  style="color:#428bca;height: 57px;width: 258px;overflow:hidden"><td><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['gp']['index'];?>
.此成果清单只允许老师查看</td></tr>
                   <?php }else{ ?>
                   <tr style="color:#2E3641;height: 57px;width: 258px;overflow:hidden"><td style="text-overflow:ellipsis;max-width:180px;white-space:nowrap;overflow: hidden"><a title="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['gp']['index'];?>
.<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['grade_id'];?>
年<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['gp_content'];?>
"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['gp']['index'];?>
.<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['grade_id'];?>
年<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['gp_content'];?>
</a> <br><i style="color: #ff0000"><?php echo date("Y-m-d H:i:s",$_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']]['gp_create_time']);?>

                    <?php }?>
               <?php }?>
		   	 <?php }?>
		   	 <?php endfor; endif; ?>
                <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']<6){?>

                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['total'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['total']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['total']['name'] = 'total';
$_smarty_tpl->tpl_vars['smarty']->value['section']['total']['loop'] = is_array($_loop=6-$_smarty_tpl->getVariable('smarty')->value['section']['gp']['index']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['total']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['total']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['total']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['total']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['total']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['total']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['total']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['total']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['total']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['total']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['total']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['total']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['total']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['total']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['total']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['total']['total']);
?>
               <tr>
                   <td style="height: 57px;width: 255px"><br><i></i></td>
               </tr>
                <?php endfor; endif; ?>

                <?php }?>
               <?php if ($_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id']==$_smarty_tpl->tpl_vars['student']->value['fu_id']){?>
                 <?php if ($_smarty_tpl->tpl_vars['limitAddAndEdit']->value==1){?>
                     <?php if ($_smarty_tpl->tpl_vars['achievement_end_time']->value>=time()){?>
                        <tr style=""><td style="float:right;"> <button type="button" class="btn btn-default" onclick="add('<?php echo $_smarty_tpl->tpl_vars['gpList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['gpt']['index']][0];?>
')">添加</button></tr>
                       <?php }else{ ?>
                           <tr style=""><td style="float:right;"> <button type="button" class="btn btn-default" onclick="alert('已过填写个人成果时间！')">添加</button></tr>
                      <?php }?>
                  <?php }?>
               <?php }?>
		   </table>

		 </td>
		<?php endfor; endif; ?>
        <?php }?>
	   </tr>

	 </table>




	</div>
  </div>
</ul>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>