<?php /* Smarty version Smarty-3.1.14, created on 2014-11-02 16:26:49
         compiled from "admin\tpl\adminmessage\getmymessage.html" */ ?>
<?php /*%%SmartyHeaderCode:327125455eac9b989a9-87042702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4634ea265cfbee3c9b25edab7fd3cdf2f4e746e8' => 
    array (
      0 => 'admin\\tpl\\adminmessage\\getmymessage.html',
      1 => 1412909666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '327125455eac9b989a9-87042702',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'xuenian' => 0,
    'zhuangtai' => 0,
    'result' => 0,
    'list' => 0,
    'page' => 0,
    'riqi' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5455eac9d7e947_58888464',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5455eac9d7e947_58888464')) {function content_5455eac9d7e947_58888464($_smarty_tpl) {?><?php if (!is_callable('smarty_function_page')) include 'E:\\wamp\\www\\nkgn\\been/View/plugins\\function.page.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery-migrate-1.1.0.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/My97DatePicker/WdatePicker.js"></script>
    <LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
    <title>我的消息</title>
    <script type="text/javascript">
        $(function() {
            $("#search_button").live("click",function() {
                //alert("111");
                var xuenian = $("#xuenian").val();
                var riqi = $("#riqi").val();
                var zhuangtai = $("#zhuangtai").val();
                window.location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/adminmessage/getmymessage/xuenian/"+xuenian+"/zhuangtai/"+zhuangtai+"/riqi/"+riqi;
            });
        });

        //点击选中
        $(function(){
            $(":checkBox#quanxuan").click(function(){
                //点击一次
                var checked=$(this).attr('checked');
                if(checked=='checked'){
                    $(":checkBox").attr("checked",true);
                }
                if(checked!='checked'){
                    $(":checkBox").attr("checked",false);
                }
            });

            $("#riqi").focus(function(){
                WdatePicker({dateFmt:'yyyy-MM-dd'});
            });
        });


    </script>
</head>
<body>
<style type="text/css">
    #info th {
        border-right: 1px solid #adceff;
        border-bottom: 1px solid #adceff;
        border-top: 1px solid #adceff;
        letter-spacing: 2px;
        text-transform: uppercase;
        text-align: left;
        padding: 6px 6px 6px 12px;
        background: #f4f7fc;
    }
    #info td {
        border-right: 1px solid #adceff;
        border-bottom: 1px solid #adceff;
        background: #fff;
        font-size:11px;
        padding: 6px 6px 6px 12px;

    }
    #info th.spec {
        border-left: 1px solid #adceff;
        border-top: 0;
        background: #fff;
    }
</style>

<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
    <TR height=28><TD background=images/title_bg1.jpg>当前位置:我的消息</TD></TR>
    <TR><TD bgColor=#b1ceef height=1></TD></TR>
    <TR height=20>
        <TD background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/shadow_bg.jpg"></TD>
    </TR>
</TABLE>
<div style="padding-left:30px;padding-top:0px;background-color:white;width:100px;height:30px; ">

</div>
</br>
<div id="search_activity" style="margin-left:20px;">
    学年:
    <select name="xuenian" id="xuenian">
        <option value="0" >全部</option>
        <option value="2013" <?php if ($_smarty_tpl->tpl_vars['xuenian']->value==2013){?>selected="selected"<?php }?> >2013</option>
        <option value="2014" <?php if ($_smarty_tpl->tpl_vars['xuenian']->value==2014){?>selected="selected"<?php }?> >2014</option>
        <option value="2015" <?php if ($_smarty_tpl->tpl_vars['xuenian']->value==2015){?>selected="selected"<?php }?> >2015</option>
        <option value="2016" <?php if ($_smarty_tpl->tpl_vars['xuenian']->value==2016){?>selected="selected"<?php }?> >2016</option>
        <option value="2017" <?php if ($_smarty_tpl->tpl_vars['xuenian']->value==2017){?>selected="selected"<?php }?> >2017</option>
        <option value="2018" <?php if ($_smarty_tpl->tpl_vars['xuenian']->value==2018){?>selected="selected"<?php }?> >2018</option>
    </select>
    状态:
    <select name="zhuangtai" id="zhuangtai">
        <option value="10" <?php if ($_smarty_tpl->tpl_vars['zhuangtai']->value==0||$_smarty_tpl->tpl_vars['zhuangtai']->value==10){?>selected="selected"<?php }?> >全部</option>
        <option value="12" <?php if ($_smarty_tpl->tpl_vars['zhuangtai']->value==12){?>selected="selected"<?php }?> >已读</option>
        <option value="11" <?php if ($_smarty_tpl->tpl_vars['zhuangtai']->value==11){?>selected="selected"<?php }?> >未读</option>

    </select>
    &nbsp;
    日期:
    <input type="text" name="riqi" id="riqi" style="width:200px" class="Wdate"/>
    &nbsp;
    <input id ="search_button" type="button" value="查询" />
</div>
</br>
<div id="info" style=" margin-left:10px;">
    <font color="#CC0000"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value)===null||$tmp==='' ? '' : $tmp);?>
</font>
    <table id="mytable" cellspacing="0" >
        <tr>
            <th scope="col" width="50px" style="border-left:1px solid #adceff;" ><input type="checkBox" id="quanxuan" />全选</th>
            <th scope="col" width="150px" >学年</th>
            <th scope="col" width="400px" >消息内容</th>
            <th scope="col" width="80px" >消息状态</th>
            <th scope="col" width="80px" >时间</th>
            <th scope="col" width="140px" >操作</th>
        </tr>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['al'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['al']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['name'] = 'al';
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['al']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['al']['total']);
?>
        <tr >
            <td style="border-left:1px solid #adceff;" ><input type="checkBox" id="selectchecked[]" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['id'];?>
"/></td>
            <td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['xuenian'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['mess_content'];?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['if_flag']==0){?>未读<?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['if_flag']==1){?>已读<?php }?></td>
            <td><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['create_time'];?>
</td>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/adminmessage/dispose/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['id'];?>
/flag/1">[查看]</a>
                <?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['if_flag']==0){?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/adminmessage/dispose/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['id'];?>
/flag/2">[标为已读]</a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/adminmessage/dispose/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['id'];?>
/flag/3">[删除]</a>
                <?php }elseif($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['if_flag']==1){?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/adminmessage/dispose/id/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['id'];?>
/flag/3">[删除]</a>
                <?php }?>
            </td>
        </tr>
        <?php endfor; else: ?>
        <tr >
            <th class="spec" colspan="5">暂无活动！</td>
        </tr>
        <?php endif; ?>
    </table>
</select>
    <span id="msg2"></span>
    <?php echo smarty_function_page(array('info'=>$_smarty_tpl->tpl_vars['list']->value,'web_url'=>$_smarty_tpl->tpl_vars['web_url']->value,'url'=>"/mannkgn.php/adminmessage/getmymessage/page/".((string)$_smarty_tpl->tpl_vars['page']->value)."/xuenian/".((string)$_smarty_tpl->tpl_vars['xuenian']->value)."/riqi/".((string)$_smarty_tpl->tpl_vars['riqi']->value)."/zhuangtai/".((string)$_smarty_tpl->tpl_vars['zhuangtai']->value)),$_smarty_tpl);?>

</div>
</body>
</html><?php }} ?>