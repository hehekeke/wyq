<?php /* Smarty version Smarty-3.1.14, created on 2014-11-27 16:38:54
         compiled from "app\tpl\center\syllabus.html" */ ?>
<?php /*%%SmartyHeaderCode:4526544dedd293e857-63924254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94d168ac663e48128956615967c5ded7892148dc' => 
    array (
      0 => 'app\\tpl\\center\\syllabus.html',
      1 => 1417077528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4526544dedd293e857-63924254',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544dedd2b57179_03187008',
  'variables' => 
  array (
    'web_url' => 0,
    'student' => 0,
    'stupw' => 0,
    'get_ifopen' => 0,
    'syllabusList' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544dedd2b57179_03187008')) {function content_544dedd2b57179_03187008($_smarty_tpl) {?><!DOCTYPE html>
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
    .noopen{
        width: 78px;
        height: 26px;
        background-image: url("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/images/noopen.png");
    }
    .yesopen{
        width: 78px;
        height: 26px;
        background-image: url("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/images/yesopen.png");
    }
    #syllabusTable td{
        border: solid 1px;
        width: 100px;
        text-align: center;
        height: 60px;
    }
    #addTable td{

        color: #000000;

    }
    #addTable{
       margin-top: 30px;
        margin-left: 100px;
    }
    #mengban{
        position:absolute;
        top:0px;
        left:105px;
        background-color: #D4D0C8;
        line-height:10px;
        width:10px;height:10px;display:none;z-index:998;
    }

</style>
<script>
    var x = 0;
    function addCourse(){
        if(x%2==0){
        $("#addBox").css("display","block");
            x++;
        }else{
            $("#addBox").css("display","none");
            x++;
        }
    }
    function cancel(){
        $("#addBox").css("display","none");
        $("#editBox").css("display","none");
        $("#deleteBox").css("display","none");
    }

    function editMon(sy_id,sy_class_address,week){

        var arr = new Array();
        arr = sy_class_address.split("(");
        var arr2 = new Array();
        arr2 = arr[1].split(")");
        $("#editClass").val(arr[0]);
        $("#editAddress").val(arr2[0]);
        $("#sy_id").val(sy_id);
        $("#week").val(week);
        if(x%2==0){
         $("#editBox").css("display","block");
            x++;
        }else{
          $("#editBox").css("display","none");
            x++;
        }
    }
</script>
<script>
    function gaibian(o){
        $(o).children().css("display","block");
    }
    function shiqu(o){
        $(o).children().css("display","none");
    }
    function delete_kebiao(sy_id,week){
        $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/deleteSyllabus",{"sy_id":sy_id,"week":week},function(data){
            location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/syllabus";
        });
    }

 function set_openflag(o){
      $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/update_ifopen",{"if_open":o},function(data){
          if(o==0){
              $("#if_noopen").css("display","none");
              $("#if_yesopen").css("display","block");
          }else{
              $("#if_noopen").css("display","block");
              $("#if_yesopen").css("display","none");
          }
         //alert(o);
         // location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/syllabus";
     });

     //alert(o);

 }
 	 
	function addSyllabus(){
		if($("input[name='name']").val().length>20){
		    alert("输入的课程名字不能超过20位");
			return;
		}
		if($("input[name='name']").val().length==0){
			alert("输入的课程名字不能为空");
			return;
		}
		if($("input[name='address']").val().length>10){
		    alert("输入的上课地点不能超过10位");
			return;
		}
		if($("input[name='address']").val().length==0){
			alert("输入的上课地点不能为空");
			return;
		}
		$.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/addSyllabus",
				{"fu_id":<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
,week:$("input[type='radio']:checked").val(),point:$("input[name='point']:checked").val(),name:$("input[name='name']").val(),address:$("input[name='address']").val()},
				function(data){	
                 location.href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/syllabus";
         
		});
		$("#addBox").hide();
	}
</script>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<p id="pw" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['stupw']->value['fu_pw'];?>
</p>
<p id="salt" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['stupw']->value['fu_salt'];?>
</p>
<div class="row" >
    <div class="col-md-12">
        <div class="page-header"><h3><?php echo $_smarty_tpl->tpl_vars['student']->value['fu_realname'];?>
的个人中心</h3></div>
    </div>
    <div class="col-md-2">
        <div class="list-group">
            <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/mycenter" class="list-group-item">个人资料</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/followActivity" class="list-group-item">我关注的活动</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/syllabus" class="list-group-item active">我的课程表</a>
        </div>
    </div>
    <div>
    <div class="col-md-8" style="width: 82%">
            <fieldset>
                <legend style="color:#FFFFFF;"><span>我的课程表</span>
                    <?php if ($_smarty_tpl->tpl_vars['get_ifopen']->value==0){?>
                    <div id="if_noopen" style="float: right;" onclick="set_openflag(0)" class="noopen" ></div>
                    <div id="if_yesopen" style="float: right;display: none" onclick="set_openflag(1)" class="yesopen" ></div>
                    <?php }else{ ?><div id="if_yesopen" style="float: right;" onclick="set_openflag(1)" class="yesopen" ></div>
                    <div id="if_noopen" style="float: right;display: none" onclick="set_openflag(0)" class="noopen" ></div>
                    <?php }?>
                <span style="float:right">开启课程表&nbsp;&nbsp;</span></legend>
            </fieldset>
            <div id="editBox" style="color:#000000;width: 550px;height: 220px;background: #ffffff;z-index:999;position: absolute;left: 100px;top:230px;display: none">
                <h3 style="text-align: center;background: #428bca;color: #ffffff">修改课程</h3>
                <form action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/editSyllabus" method="post" style="margin-left: 100px;margin-top: 20px;font-weight:bold">
                    <input id="sy_id" type="hidden" name="sy_id"/>
                    <input id="week" type="hidden" name="week"/>
                    课程名称：<input name="sy_class" id="editClass" style="margin-bottom: 20px;width: 234px" type="text" value=""/><br>
                    上课地点：<input name="sy_address" id="editAddress" style="width: 234px" type="text"/><br>
                    <input style="margin-left: 70px" type="submit" value="修改"/><input style="margin-left: 70px" type="button" value="取消" onclick="cancel()"/>
                </form>
            </div>
            <div id="addBox" style="width: 550px;background: #ffffff;position: absolute;z-index:1001;left: 100px;top:230px;display: none">
                <h3 style="text-align: center;background: #428bca;color: #ffffff">添加课程</h3>
                <form   style="font-weight: bold;margin-bottom: 50px">
				<!-- action="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Center/addSyllabus"-->
                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['student']->value['fu_id'];?>
" name="fu_id"/>
                    <table id="addTable" style="">
                        <tr>
                            <td>
                                周次：<input type="radio" name="week" value="1"/>周一<input type="radio" name="week" value="2"/>周二<input type="radio" name="week" value="3"/>周三<input name="week" type="radio" value="4"/>周四
                                <input type="radio" name="week" value="5"/>周五<input type="radio" name="week" value="6"/>周六<input type="radio" name="week" value="7"/>周日
                            </td>
                        </tr>
                        <tr>
                            <td>
                                节次： <input type="radio" name="point" value="1">1<input type="radio" name="point" value="2">2<input type="radio" name="point" value="3">3<input type="radio" name="point" value="4">4<input type="radio" name="point" value="5">5
                                <input type="radio" name="point" value="6">6<input type="radio" name="point" value="7">7<input type="radio" name="point" value="8">8<input type="radio" name="point" value="9">9<input type="radio" name="point" value="10">10
                                <input type="radio" name="point" value="11">11<input type="radio" name="point" value="12">12
                            </td>
                        </tr>
                        <tr>
                            <td>
                                课程名称：<input type="text"  name="name" style="width: 263px"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                上课地点：<input type="text" name="address" style="width: 263px">
                            </td>
                        </tr>
                        <tr>
                            <td><input type="button" value="保存" onclick="addSyllabus()" style="margin-left: 80px" /><input style="margin-left: 50px" type="button" value="取消" onclick="cancel()"/></td>
                        </tr>
                    </table>
                </form>
            </div>
         <input type="button" value="添加课程" onclick="addCourse()" style="color:#661550;margin-left:857px;"/>
        <table id="syllabusTable" style="border: solid 1px;width: 100% ">

            <tr>
                <td>时间</td><td>星期一</td><td>星期二</td><td>星期三</td><td>星期四</td><td>星期五</td><td>星期六</td><td>星期日</td>
            </tr>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sy'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sy']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['name'] = 'sy';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['syllabusList']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sy']['total']);
?>
			
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_number'];?>
</td>
                <td style="cursor: pointer;position:relative;" onmouseout="shiqu(this)" onmouseover="gaibian(this)" title="<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_monday'];?>
"  ondblclick="editMon('<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_monday'];?>
',1)"><?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_monday'];?>

                  <a id="mengban"  onclick="javascript:if(confirm('确实要删除吗?'))delete_kebiao('<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_id'];?>
',1)">X</a>
                </td>
                <td style="cursor: pointer;position:relative;" onmouseout="shiqu(this)" onmouseover="gaibian(this)" title="<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_tuesday'];?>
" ondblclick="editMon('<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_tuesday'];?>
',2)"><?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_tuesday'];?>

                    <a id="mengban" style="width:10px;height:10px;display:none;z-index:999" onclick="javascript:if(confirm('确实要删除吗?'))delete_kebiao('<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_id'];?>
',2)">X</a>
                </td>
                <td style="cursor: pointer;position:relative"  onmouseout="shiqu(this)" onmouseover="gaibian(this)" title="<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_wednesday'];?>
" ondblclick="editMon('<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_wednesday'];?>
',3)"><?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_wednesday'];?>

                    <a id="mengban" style="width:10px;height:10px;display:none;z-index:999" onclick="javascript:if(confirm('确实要删除吗?'))delete_kebiao('<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_id'];?>
',3)">X</a>
                </td>
                <td style="cursor: pointer;position:relative"  onmouseout="shiqu(this)" onmouseover="gaibian(this)"  title="<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_thursday'];?>
" ondblclick="editMon('<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_thursday'];?>
',4)"><?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_thursday'];?>

                    <a id="mengban" style="width:10px;height:10px;display:none;z-index:999" onclick="javascript:if(confirm('确实要删除吗?'))delete_kebiao('<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_id'];?>
',4)">X</a>
                </td>
                <td style="cursor: pointer;position:relative"  onmouseout="shiqu(this)" onmouseover="gaibian(this)" title="<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_friday'];?>
" ondblclick="editMon('<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_friday'];?>
',5)"><?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_friday'];?>

                    <a id="mengban" style="width:10px;height:10px;display:none;z-index:999" onclick="javascript:if(confirm('确实要删除吗?'))delete_kebiao('<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_id'];?>
',5)">X</a>
                </td>
                <td style="cursor: pointer;position:relative"  onmouseout="shiqu(this)" onmouseover="gaibian(this)" title="<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_saturday'];?>
" ondblclick="editMon('<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_saturday'];?>
',6)"><?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_saturday'];?>

                    <a id="mengban" style="width:10px;height:10px;display:none;z-index:999" onclick="javascript:if(confirm('确实要删除吗?'))delete_kebiao('<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_id'];?>
',6)">X</a>
                </td>
                <td style="cursor: pointer;position:relative"  onmouseout="shiqu(this)" onmouseover="gaibian(this)" title="<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_sunday'];?>
" ondblclick="editMon('<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_sunday'];?>
',7)"><?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_sunday'];?>

                    <a id="mengban" style="width:10px;height:10px;display:none;z-index:999" onclick="javascript:if(confirm('确实要删除吗?'))delete_kebiao('<?php echo $_smarty_tpl->tpl_vars['syllabusList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sy']['index']]['sy_id'];?>
',7)">X</a>
                </td>
            </tr>
            <?php endfor; endif; ?>
        </table>
        </div>
    </div>
</div>
<div style="margin-top: 50px">
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
</body>
</html><?php }} ?>