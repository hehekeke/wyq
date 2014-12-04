<?php /* Smarty version Smarty-3.1.14, created on 2014-10-28 09:52:51
         compiled from "app\tpl\assessment\xnmselfassessment.html" */ ?>
<?php /*%%SmartyHeaderCode:3730544ef6f3c7f910-59595310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '167442205a5a1dc5382d9ed886d7bf0ae420e997' => 
    array (
      0 => 'app\\tpl\\assessment\\xnmselfassessment.html',
      1 => 1412909604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3730544ef6f3c7f910-59595310',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'mm' => 0,
    'stuId' => 0,
    'item' => 0,
    'state' => 0,
    'commit' => 0,
    'info' => 0,
    'name' => 0,
    'articleList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544ef6f3f06549_82755994',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ef6f3f06549_82755994')) {function content_544ef6f3f06549_82755994($_smarty_tpl) {?><!DOCTYPE html>

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
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/uploadify.css">
    <script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/upload/jquery.uploadify.min.js?ver=<?php echo $_smarty_tpl->tpl_vars['mm']->value;?>
"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/js/holder.js"></script>
    <script type="text/javascript">
        function clickSave(){
            var txt = document.getElementById('content').value;
            var type = 1;
            var isnew=0;
            var stuId =<?php echo $_smarty_tpl->tpl_vars['stuId']->value;?>
;

            var fileid = $("#hidFileID").val();
             <?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?>
                var id = <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
;
             <?php }else{ ?>
                var id = 0;
            <?php }?>
            document.getElementById("content2").value=txt;
            document.getElementById("id2").value=id;
            document.getElementById("type2").value=type;
            document.getElementById("isnew2").value=isnew;
            document.getElementById("stuId2").value=stuId;
            $("#form1").submit();
          }

                function clickCommit(){
                <?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?>
                        var id = <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
;
                    <?php }else{ ?>
                        alert("请先点击保存按钮！");
                    <?php }?>
                           var txt = document.getElementById('content').value;
                            $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/commitItem",{content:txt,id:id},function(result){
                                var c=result;
                                if (c>0){
                                    alert("提交成功！");
                                    $('#content').prop('disabled', 'disabled');
                                }else{
                                    alert("提交失败！");
                                }
                            });
                        }

                     $(function(){
                            $("#zz_question").click(function(){
                                window.location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/question/mod/show";
                            });
                           });
                        $(function(){
                            var mm= document.getElementById("error").innerHTML;
                            if(mm){
                                alert(mm);
                            }
                        });
    </script>
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-12">
        <div class="page-header"><h3>当前位置：综合素质评估>学年末评估</h3></div>
    </div>
    <?php $_smarty_tpl->tpl_vars['lefttype'] = new Smarty_variable(3, null, 0);?>
    <?php echo $_smarty_tpl->getSubTemplate ('assessment/xnm-left-function.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php if ($_smarty_tpl->tpl_vars['state']->value>=1){?>
    <div class="col-md-7">
        <center><h3>自我评价</h3></center>
        <?php if ($_smarty_tpl->tpl_vars['state']->value<1){?>
           评价尚未开始
        <?php }else{ ?>
        <?php if ($_smarty_tpl->tpl_vars['commit']->value==false){?>
        定性评价：<button type="button" id="zz_question" class="btn btn-default"><a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/question">开始答卷</a></button>
        <?php }else{ ?>
        <table class="table table-bordered" style="margin:20px;">
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['x'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['x']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['name'] = 'x';
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['info']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['x']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['x']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['x']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['x']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['x']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['x']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['x']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['x']['total']);
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['x']['index']][0];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['x']['index']][1];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['x']['index']][2];?>
</td>
            </tr>
            <?php endfor; endif; ?>
        </table>

        <?php }?>
        <p style="margin:20px;">书面总结：</p>
        <?php if (isset($_smarty_tpl->tpl_vars['item']->value)){?>
        <?php if (($_smarty_tpl->tpl_vars['item']->value['commit']==1)){?>
        <textarea class="form-control" rows="15" name="content" id="content" placeholder="在此填写书面总结" disabled="disabled" style="margin:20px;"><?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>
 </textarea>
            <?php }else{ ?>
            <textarea class="form-control" rows="15" name="content" id="content" placeholder="在此填写书面总结" style="margin:20px;"><?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>
</textarea>
                <?php }?>
                <?php }else{ ?>
                <textarea class="form-control" rows="15" name="content" id="content" placeholder="在此填写书面总结" style="margin:20px;"></textarea>
                <?php }?>

                <div>（可选，文件大小不能超过100M）</div>
              <form id="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/saveItem"  enctype="multipart/form-data">
                <?php if (isset($_smarty_tpl->tpl_vars['name']->value['file_name'])){?><div id="file_name">附件名称：<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['name']->value['file_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['name']->value['file_name'];?>
</a></div><?php }else{ ?><div id="file_name">  <input type="file" name="file"/></div><?php }?>
                     <input id="content2" name="content" type="text" style="display: none"/>
                    <input id="id2" name="id" type="text" style="display: none"/>
                    <input id="type2" name="type" type="text" style="display: none"/>
                    <input id="isnew2" name="isnew" type="text" style="display: none"/>
                    <input id="stuId2" name="stuId" type="text" style="display: none"/>

                </form>
                <font size="2px" color="#70A4DA">文件大小不能超过20M,视频文件以及大文件压缩后上传</font>
                <center>
                    <button type="button" class="btn btn-success" style="margin:10px;" onclick="clickSave()">保存</button>
                    <button type="button" class="btn btn-danger" style="margin:10px;" onclick="clickCommit()">提交</button>
                </center>
                <?php }?>
    </div>
    <div class="col-md-3">
        <table class="table table-bordered">
            <thead>
            <tr style="background:#2E3641">
                <th><center style="color: #ffffff">如何做好评价</center></th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['articleList']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['max'] = (int)5;
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['max']);
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
                <td><a style="color:white;" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/helpDetail/id/<?php echo $_smarty_tpl->tpl_vars['articleList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['article_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['articleList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['article_title'];?>
</a></td>
            </tr>
            <?php endfor; endif; ?>
            <tr>
                <td style="float:right;"><a style="color:white;" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/assessment/helpList/type/1">更多》</a></td>
            </tr>
            </tbody>
        </table>
    </div>
    <?php }else{ ?>
    <div>自评尚未进行</div>
    <?php }?>

</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>