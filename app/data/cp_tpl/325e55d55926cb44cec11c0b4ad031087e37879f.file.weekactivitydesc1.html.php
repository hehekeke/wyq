<?php /* Smarty version Smarty-3.1.14, created on 2014-11-27 10:57:06
         compiled from "app\tpl\assist\weekactivitydesc1.html" */ ?>
<?php /*%%SmartyHeaderCode:25003544deef16bf280-08340548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '325e55d55926cb44cec11c0b4ad031087e37879f' => 
    array (
      0 => 'app\\tpl\\assist\\weekactivitydesc1.html',
      1 => 1417056987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25003544deef16bf280-08340548',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544deef1b7e882_18434804',
  'variables' => 
  array (
    'web_url' => 0,
    '__userinfo__' => 0,
    'weekActivityContent' => 0,
    'weekActivityOrg' => 0,
    'weekActivityUdt' => 0,
    'picList' => 0,
    'attitude' => 0,
    'activityGoals' => 0,
    'sumPerson' => 0,
    'activityAvg' => 0,
    'commentCounts' => 0,
    'list' => 0,
    'val' => 0,
    'activityId' => 0,
    'prePage' => 0,
    'nextPage' => 0,
    'HotActivityList' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544deef1b7e882_18434804')) {function content_544deef1b7e882_18434804($_smarty_tpl) {?><!DOCTYPE html>
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
/common/app/js/jquery.slideBox.js"></script>
      <script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/js/jquery.slideBox.min.js"></script>
      <link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/css/jquery.slideBox.css" rel="stylesheet">
  </head>
<style type="text/css">
.commentList{
	widht:500px;
  }
.word{
	widht:500px;background-color:yellow;height:30px;
}
.comment{
	widht:500px;margin:10px 1px;min-height:150px;border-bottom: 1px dashed #ffffff;
}
.reply{
	widht:500px;margin:0 1px;color: #000000;
}
.comment_content_list{width:500px;}
.touxiang{width:120px;min-height:120px;margin:2px;float:left;}
.touxiang img{width:100px;height:100px;margin-bottom: 7px; margin-right: 7px;}
.comment_content{width:370px;margin:2px;float:right;}
.comment_content_reply{width:40px;margin-bottom:2px;margin-right:10px;height:20px;float:right;}
<!--
/* 星级评分 */
.shop-rating {
	width:175px;
    overflow: hidden;
    zoom: 1;
    position: relative;
    z-index: 999;
}
.shop-rating span {
    height: 23px;
    display: block;
    line-height: 23px;
    float: left;
}
.shop-rating span.title {
    width: 150px;
    text-align: right;
    margin-right: 5px;
}
.shop-rating ul {
    float: left;
    margin:0;padding:0
}
.shop-rating .result {
    margin-left: 20px;
    padding-top: 2px;
}
.shop-rating .result span {
    color: #ff6d02;
}
.shop-rating .result em {
    color: #f60;
    font-family: arial;
    font-weight: bold;
}
.shop-rating .result strong {
    color: #666666;
    font-weight: normal;
}
.rating-level,
.rating-level a {
    background: url(http://www.nowamagic.net/librarys/images/veda/star_v2.png) no-repeat scroll 1000px 1000px;
}
.rating-level {
    background-position: 0px 0px;
    width: 120px;
    height: 23px;
    position: relative;
    z-index: 1000;
}
.rating-level li {
    display: inline;
}
.rating-level a {
    line-height: 23px;
    height: 23px;
    position: absolute;
    top: 0px;
    left: 0px;
    text-indent: -999em;
    *zoom: 1;
    outline: none;
}
.rating-level a.one-star {
    width: 20%;
    z-index: 6;
}
.rating-level a.two-stars {
width: 40%;
z-index: 5;
}
.rating-level a.three-stars {
    width: 60%;
    z-index: 4;
}
.rating-level a.four-stars {
    width: 80%;
    z-index: 3;
}
.rating-level a.five-stars {
    width: 100%;
    z-index: 2;
}
.rating-level .current-rating,.rating-level a:hover{background-position:0 -28px;}
.rating-level a.one-star:hover,.rating-level a.two-stars:hover,.rating-level a.one-star.current-rating,.rating-level a.two-stars.current-rating{background-position:0 -116px;}
.rating-level .three-stars .current-rating,.rating-level .four-stars .current-rating,.rating-level .five-stars .current-rating{background-position:0 -28px;}
-->

</style>
  <script>
      //下载本周活动安排
      function exportExcel(){
          location.href = "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/exportAssistExcel/getAct/activity_class/1";
      }
  //关键字搜索
	$(function(){
	    $("#keyword_search").click(function(){
            var search = $("#search").val();
            //alert(search);
            var key=encodeURI(search);
            //alert(key);exit;
            window.location.href= "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/AssistActivity/activity_class/1/keywords/"+key;
		});
	});
	
	//提交评论
          $(function(){
              $("#tijiao_pinglun").click(function(){
                  var pinglunContent = $("#mycommentcontent").val();
                  if(pinglunContent !='' && pinglunContent.length<=140){
                      $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/UpActivityComment",
					          {userId:<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
,content:pinglunContent,activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
,"parent_id":1},
							  function(data){
                                window.location.reload(true);
							
                            });
                }else if(pinglunContent.length>140){
                      alert('亲，评论内容不能为超过140字！');
                  }else{
                      alert('亲，评论内容不能为空！');
              }
          });
      });
	
	//活动评分
	//存在
	$(function(){
		$("#want").click(function(){
			$.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/UpActivityAttitudewant",{activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
,userId:<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
},function(data){
                var data =JSON.parse(data);
				console.log(data);
				if(data.status == 0){
				  alert(data.msg);
				}else{
					$("#wantNum").html(data.data[0].activity_want_num+"人");
				}    
			});
		});
	});
	$(function(){
		$("#flowers").click(function(){
			$.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/UpActivityAttitudeflowers",{activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
,userId:<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
},function(data){
				var data =JSON.parse(data);
				
				if(data.status == 0){
				  alert(data.msg);
				}else{
					$("#flowerNum").html(data.data[0].activity_flowers_num+"人");
				}
			});
		});
	});
	$(function(){
		$("#egg").click(function(){
			$.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/UpActivityAttitudeegg",{activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
,userId:<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
},function(data){
                var data =JSON.parse(data);
				console.log(data);
				if(data.status == 0){
				  alert(data.msg);
				}else{
					$("#eggNum").html(data.data[0].activity_egg_num+"人");
				}    
			});
		});
	});
	//不存在，即为0
	$(function(){
		$("#egg0").click(function(){
			$.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/AddActivityAttitudeegg",{activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
,userId:<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
},function(data){
                alert(data);
				window.location.reload(true);
			});
		});
	});
	$(function(){
		$("#want0").click(function(){
			$.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/AddActivityAttitudewant",{activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
,userId:<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
},function(data){
                 alert(data);
				window.location.reload(true);
			});
		});
	});
	$(function(){
		$("#flowers0").click(function(){
			$.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/AddActivityAttitudeflowers",{activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
,userId:<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
},function(data){
                alert(data);
				window.location.reload(true);
			});
		});
	});
	//辅学评分
     function liangfen(o){
         var score_fuxue=o.dataset.val;
    //	 alert(o.dataset.val);
         //alert(o.id);
         var idd=o.id;
        // alert(idd);
         var name_id="id"+idd;
         var sg_name=document.getElementById(name_id).innerHTML;
        // alert(sg_name);
         $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/fuxuepingfen",{sg_id:idd,userId:"<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
",activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
,score:score_fuxue,sg_name:sg_name},function(data){
             alert(data);
            // console.info(data);
         });
     }
     function sifen(o){
         var score_fuxue=o.dataset.val;
         //	 alert(o.dataset.val);
             //alert(o.id);
             var idd=o.id;
            // alert(idd);
             var name_id="id"+idd;
             var sg_name=document.getElementById(name_id).innerHTML;
            // alert(sg_name);
             $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/fuxuepingfen",{sg_id:idd,userId:"<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
",activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
,score:score_fuxue,sg_name:sg_name},function(data){
                 alert(data);
                // console.info(data);
             });
     }
     function liufen(o){
         var score_fuxue=o.dataset.val;
         //	 alert(o.dataset.val);
             //alert(o.id);
             var idd=o.id;
            // alert(idd);
             var name_id="id"+idd;
             var sg_name=document.getElementById(name_id).innerHTML;
            // alert(sg_name);
             $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/fuxuepingfen",{sg_id:idd,userId:"<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
",activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
,score:score_fuxue,sg_name:sg_name},function(data){
                 alert(data);
                // console.info(data);
             });
     }
     function bafen(o){
         var score_fuxue=o.dataset.val;
         //	 alert(o.dataset.val);
             //alert(o.id);
             var idd=o.id;

            // alert(idd);
             var name_id="id"+idd;
             var sg_name=document.getElementById(name_id).innerHTML;
            // alert(sg_name);
             $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/fuxuepingfen",{sg_id:idd,userId:"<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
",activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
,score:score_fuxue,sg_name:sg_name},function(data){
                 alert(data);
                // console.info(data);
             });
     }
     function shifen(o){
         var score_fuxue=o.dataset.val;
         //	 alert(o.dataset.val);
             //alert(o.id);
             var idd=o.id;

            // alert(idd);
             var name_id="id"+idd;
             var sg_name=document.getElementById(name_id).innerHTML;
            // alert(sg_name);
             $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/fuxuepingfen",{sg_id:idd,userId:"<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
",activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
,score:score_fuxue,sg_name:sg_name},function(data){
                 alert(data);
             });
     }
</script>

<script>
    function userful(o){
        var comment_id= o.value;
        $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/comment_userful",{comment_id:comment_id},function(data){
            if(data==0)
            {alert("失败!");
            }else{
                window.location.reload(true);
            }
    });
    }
function reply(obj){
	var parent_id=$(obj).data('parent_id');
	var comment_id=$(obj).data('comment_id');
    var comment_user_id=$(obj).data('user_id');
	var str=" <div class='reply'><textarea id='comment_per_content' cols=\"63\" rows='6' style='color:black;'></textarea><br><input type='button' value='回复' onclick='doreply(this,"+parent_id+","+comment_id+","+comment_user_id+");'><input style='margin-left: 350px' type='button' value='取消' onclick='cancelReply()'/><div>";
	$("#comment"+comment_id).empty();
	$("#comment"+comment_id).append(str);
}
function doreply(obj,parent_id,comment_id,comment_user_id){
	var comment_content=$("#comment_per_content").val();
        if(comment_content !="" && comment_content.length <=140){
            $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/inserComment",{userId:<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
,activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
,parent_id:parent_id,comment_id:comment_id,comment_content:comment_content,comment_user_id:comment_user_id},function(data){
              alert(data);
             window.location.reload(true);
    if(!data){
                alert('网络繁忙');
            }else{
                var str1="最新回复:"+comment_content;
                $("#comment"+comment_id).empty();
                $("#comment"+comment_id).append(str1);
                //alert('成功');
            }
        });
    }else if(comment_content.length >140){
        alert('亲，回复内容不能超过140个字！');
       }else{
        alert('亲，回复内容不能为空！');
}
}
function cancelReply(){
    $(".reply").css("display","none");
}

    jQuery(function($){
        $('#demo1').slideBox();
        $('#demo2').slideBox({
            direction : 'top',//left,top#方向
            duration : 0.3,//滚动持续时间，单位：秒
            easing : 'linear',//swing,linear//滚动特效
            delay : 5,//滚动延迟时间，单位：秒
            startIndex : 1//初始焦点顺序
        });
        $('#demo3').slideBox({
            duration : 0.3,//滚动持续时间，单位：秒
            easing : 'linear',//swing,linear//滚动特效
            delay : 5,//滚动延迟时间，单位：秒
            hideClickBar : false,//不自动隐藏点选按键
            clickBarRadius : 10
        });
        $('#demo4').slideBox({
            hideBottomBar : true//隐藏底栏
        });
    });
</script>
<body style="color: #ffffff">
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
  <div class="col-md-12">
    <div class="page-header"><h3>当前位置：辅学活动>周活动>活动详情</h3></div>
  </div>
  <div class="col-md-8">
    <div class="avtivity_title" ><?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_title'];?>
</div>
	<div class="activity_main_content">
	    <div id="activity_table" style="word-break:break-all;width:698px">
		 <table>
		     <tr>
			     <td>时间:</td>
				 <td><?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_start_time'];?>
</td>
			 </tr>
			 <tr>
			     <td>地点:</td>
				 <td><?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_address'];?>
</td>
			 </tr>
			 <tr>
			     <td>主题:</td>
				 <td><?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_theme'];?>
</td>
			 </tr>
			 <tr>
			     <td>类型:</td>
				 <td><?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['at_name'];?>
</td>
			 </tr>
			 <tr>
			     <td>主办方:</td>
				   <td>
				     <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['weekActivityOrg']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total']);
?>
				     <?php echo $_smarty_tpl->tpl_vars['weekActivityOrg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['organizers_name'];?>
、
				     <?php endfor; else: ?>
				     <td>无主办方</td>
				     <?php endif; ?>
				   </td>
			 </tr>
			 <tr>
			     <td>承办方:</td>
			      <td>
				 <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['weekActivityUdt']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total']);
?>
				  <?php echo $_smarty_tpl->tpl_vars['weekActivityUdt']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['undertake_name'];?>

				   <?php endfor; else: ?>
				   无承办方
				 <?php endif; ?>
				 </td>
			 </tr>
			 <tr>
			     <td>规模:</td>
				 <td><?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_scale'];?>
人</td>
			 </tr>
			 <tr>
			     <td>专业性等级:</td>
				 <td>
				 <?php if ($_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_level']=='0'){?>校级
				 <?php }else{ ?>院级
				 <?php }?>
				 </td>
			 </tr>
			 <tr>
			     <td>活动负责人:</td>
				 <td><?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_duty_preson'];?>
</td>
			 </tr>
		 </table>
            <tr>
                <td>活动简介:</td>
                <td><?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_content'];?>
</td>
            </tr>
            <?php if ($_smarty_tpl->tpl_vars['picList']->value){?>
            <tr>
                <td>
                    <div id="demo1" class="slideBox" style="display: block;width: 700px;height: 370px">
                        <ul class="items">
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pic'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['name'] = 'pic';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['picList']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pic']['total']);
?>
                            <li><img style="width: 700px;height: 370px" src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['picList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pic']['index']]['pic_link'];?>
"></li>
                            <?php endfor; endif; ?>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php }?>
		 </div>
		 <div class="activity_comment" style="width:700px">
                 <div style="width: 500px;height: 30px;">
                       <span style="font-size: 22px;">活动评分</span>
                       <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['al'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['al']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['name'] = 'al';
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['attitude']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                       <input type="submit" name="egg" id="egg" value="扔鸡蛋"  style="margin-left: 115px;color:black;"/><label id="eggNum"><?php echo $_smarty_tpl->tpl_vars['attitude']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_egg_num'];?>
人</label>
                       <input type="submit" name="flowers" id="flowers" value="献鲜花"   style="color:black;"/><label id="flowerNum"><?php echo $_smarty_tpl->tpl_vars['attitude']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_flowers_num'];?>
人</label>
                       <input type="submit" name="want" id="want" value="想参加"  style="color:black;"/><label id="wantNum"><?php echo $_smarty_tpl->tpl_vars['attitude']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_iswant_num'];?>
人</label>
                       <?php endfor; else: ?>
                       <input type="submit" name="egg0" id="egg0" value="扔鸡蛋"  style="margin-left: 115px;color:black;"/><label>0人</label>
                       <input type="submit" name="flowers0" id="flowers0" value="献鲜花"   style="color:black;"/><label>0人</label>
                       <input type="submit" name="want0" id="want0" value="想参加"  style="color:black;"/><label>0人</label>
                       <?php endif; ?>
                 </div>
                 <hr>
                 <div id="activity_score">
                       <table id="<?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['as_id'];?>
">
                               <tr>
                                  <td>共<?php echo $_smarty_tpl->tpl_vars['sumPerson']->value['count(*)'];?>
人评分</td>
                                  <td>辅学目标</td>
                                  <td>评分</td>
                               </tr>
                              <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['al'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['al']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['name'] = 'al';
$_smarty_tpl->tpl_vars['smarty']->value['section']['al']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['activityAvg']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                               <tr>
                                     <td><label>平均分<?php echo $_smarty_tpl->tpl_vars['activityAvg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']];?>
</label></td>
                                     <td id="id<?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_name'];?>
</td>
                                   <td id="jd<?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_id'];?>
" style="display: none"><?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_id'];?>
</td>
                                     <td>
                                           <div class="shop-rating" id="">
                                                      <ul class="rating-level" id="stars1">
                                                                    <li><a id="<?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_id'];?>
" class="one-star" data-val="2" href="#" title="2分" onclick="liangfen(this)">2分</a></li>
                                                                    <li><a id="<?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_id'];?>
" class="two-stars" data-val="4" href="#" title="4分" onclick="sifen(this)">4分</a></li>
                                                                    <li><a id="<?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_id'];?>
" class="three-stars" data-val="6" href="#" title="6分" onclick="liufen(this)">6分</a></li>
                                                                    <li><a id="<?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_id'];?>
" class="four-stars" data-val="8" href="#" title="8分" onclick="bafen(this)">8分</a></li>
                                                                    <li><a id="<?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_id'];?>
" class="five-stars" data-val="10" href="#" title="10分" onclick="shifen(this)">10分</a></li>
                                                      </ul>
                                           <span class="result" id="stars1-tips"></span>
                                           <input type="hidden" id="stars1-input" name="a" value="" size="2" />
                                           </div>
                                     </td>
                               </tr>
                               <?php endfor; else: ?>
                               <tr><td>该活动无对应辅学目标！</td></tr>
                               <?php endif; ?> 
                       </table>
                 </div><br><hr>
                 <div id="huodongpinglun">
                       <span style="font-size: 22px;">活动评论</span>
                       <span style="float: right;">共<?php echo $_smarty_tpl->tpl_vars['commentCounts']->value['count(*)'];?>
条评论</span>
                 </div>
                 <hr>
                 <input type="hidden" id="userId" value="<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
">
                 <div>
                       <textarea rows="5" cols="68" style="color:black;" id = "mycommentcontent" placeholder="我也说两句......"></textarea>
                 </div><br>
                 <div><input type="submit" value="提交评论" id="tijiao_pinglun" style="color: black; float: right;"/></div><br>
                 <hr>
                
                 <?php if (isset($_smarty_tpl->tpl_vars['list']->value)){?>
					<!---------------------祁长春------------------活动评论------->
					 <div class="commentList" >
						<div class="words"><b>看看大家说什么...</b></div>
						<div class="comment_content_list">
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ll'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ll']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['name'] = 'll';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ll']['total']);
?>
							<?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['parent_id']==0){?>
							<div  class="comment" style="word-break:break-all;width:498px" >
								<div class="touxiang">
                                    <?php if ($_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['pic_link']!=null){?>
									<img src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['pic_link'];?>
"/>
                                    <?php }else{ ?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/images/headPicture.jpg"/>
                                    <?php }?>
									<span><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['fu_realname'];?>
</span>&nbsp;&nbsp;&nbsp;<button id="userful" style="color:red;font-weight:bold" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['comment_id'];?>
"onclick="userful(this)">有用</button><br>
                                    <span>已被标记有用<span style="color:mediumvioletred"><?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['comment_useful_num'];?>
</span>次</span>
								</div>
								<div class="comment_content" id="reply_div">
									说：<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['toUser'];?>
<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['comment_content'];?>

									<div class="comment_content_reply" ><span style="cursor:pointer" data-user_id="<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['comment_user_id'];?>
" data-parent_id=	"<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['comment_id'];?>
" data-comment_id="<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['comment_id'];?>
" onclick="reply(this)">	[回复]</span>
									</div>
									<div id="comment<?php echo $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['comment_id'];?>
" style="width:490px;"></div>
								</div>
								<!---回复-->
								<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value['list'][$_smarty_tpl->getVariable('smarty')->value['section']['ll']['index']]['sonList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
								<div class="comment_content" id="reply_div">
									<font color="#f5deb3"><?php echo $_smarty_tpl->tpl_vars['val']->value['fu_realname'];?>
</font>&nbsp;&nbsp;回复:&nbsp;&nbsp;<font color="#f5deb3"><?php echo $_smarty_tpl->tpl_vars['val']->value['toUser'];?>
</font><br><?php echo $_smarty_tpl->tpl_vars['val']->value['comment_content'];?>

									<div class="comment_content_reply" ><span style="cursor:pointer" data-user_id="<?php echo $_smarty_tpl->tpl_vars['val']->value['comment_user_id'];?>
" data-parent_id="<?php echo $_smarty_tpl->tpl_vars['val']->value['comment_id'];?>
" data-comment_id="<?php echo $_smarty_tpl->tpl_vars['val']->value['comment_id'];?>
" onclick="reply(this)">	[回复]</span>
									</div>
									<div id="comment<?php echo $_smarty_tpl->tpl_vars['val']->value['comment_id'];?>
" style="width:490px;"></div>
								</div>
								<?php } ?>
								<!---->	
							<div style="clear:both;"></div>	<!--清除浮动-->							
							</div>
							<?php }?>
						 <?php endfor; endif; ?>
							
						</div>
						
				</div>				
					<!----end----->
                    <div id="page" style="line-height: 15px;margin: 5px auto; text-align: center">
                        <span>共<?php echo $_smarty_tpl->tpl_vars['list']->value['totalPage'];?>
页</span>&nbsp;&nbsp;<span>当前第<?php echo $_smarty_tpl->tpl_vars['list']->value['page'];?>
页</span>
                    	<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/1/activityId/<?php echo $_smarty_tpl->tpl_vars['activityId']->value;?>
/page/1">首页</a>
                    	<?php if ($_smarty_tpl->tpl_vars['list']->value['page']>1){?>
                    	<?php $_smarty_tpl->tpl_vars['prePage'] = new Smarty_variable($_smarty_tpl->tpl_vars['list']->value['page']-1, null, 0);?>
                    	       <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/1/activityId/<?php echo $_smarty_tpl->tpl_vars['activityId']->value;?>
/page/<?php echo $_smarty_tpl->tpl_vars['prePage']->value;?>
">上一页</a>
                    	<?php }?>
                    	<?php if ($_smarty_tpl->tpl_vars['list']->value['page']<$_smarty_tpl->tpl_vars['list']->value['totalPage']){?>
                    	<?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_variable($_smarty_tpl->tpl_vars['list']->value['page']+1, null, 0);?>
                    	       <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/1/activityId/<?php echo $_smarty_tpl->tpl_vars['activityId']->value;?>
/page/<?php echo $_smarty_tpl->tpl_vars['nextPage']->value;?>
">下一页</a>
                    	<?php }?>
                    	<a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/1/activityId/<?php echo $_smarty_tpl->tpl_vars['activityId']->value;?>
/page/<?php echo $_smarty_tpl->tpl_vars['list']->value['totalPage'];?>
">尾页</a>
                    </div><br>
                 <?php }?>
                 </div>
               <div></div>
         </div>
	</div>
	
  <div class="col-md-3">
  	<button type="button" class="btn btn-default big_button" style="float:none;width:262px;" onclick="exportExcel()">下载本周活动安排</button>
	<input type="text" id="search" placeholder="请输入关键字" style="float:left;margin-top:7px;width:200px;color:black;"/>
  	<button type="button" id="keyword_search"  class="btn btn-default big_button" style="float:right;width:60px;">搜索</button>
  	<table class="table table-striped"  style="border:1px solid #ddd;">
  	  <thead>
  	    <tr style="background:#2E3641"><td><center>周热门活动</center></td></tr>
  	  </thead>
  	  <tbody style="background:#FFFFFF;color:#ADBECA;" id = "listshow">
  	  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['HotActivityList']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total']);
?>
  	    <tr><td>
  	    <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/1/activityId/<?php echo $_smarty_tpl->tpl_vars['HotActivityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_id'];?>
">
  	     <?php if ($_smarty_tpl->tpl_vars['HotActivityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_if_import']==1){?>【推荐】<?php echo $_smarty_tpl->tpl_vars['HotActivityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_title'];?>

		  <?php }else{ ?>⊙ <?php echo $_smarty_tpl->tpl_vars['HotActivityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_title'];?>

		 <?php }?>
		  </a>
		</td></tr>
		<tr style="background-color:gray;"><td>发布日期：<?php echo $_smarty_tpl->tpl_vars['HotActivityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_create_time'];?>
</td></tr>
	   <?php endfor; endif; ?>
  	  </tbody>
  	</table>
  </div>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
var Class = {
    create: function() {
        return function() { this.initialize.apply(this, arguments); }
    }
}
var Extend = function(destination, source) {
    for (var property in source) {
        destination[property] = source[property];
    }
}
function stopDefault( e ) {
     if ( e && e.preventDefault ){
        e.preventDefault();
    }else{
        window.event.returnValue = false;
    }
    return false;
} 
/**
 * 星星打分组件
 */
var Stars = Class.create();
Stars.prototype = {
    initialize: function(star,options) {
        this.SetOptions(options); //默认属性
        var flag = 999; //定义全局指针
        var isIE = (document.all) ? true : false; //IE?
        var starlist = document.getElementById(star).getElementsByTagName('a'); //星星列表
        var input = document.getElementById(this.options.Input) || document.getElementById(star+"-input"); // 输出结果
        var tips = document.getElementById(this.options.Tips) || document.getElementById(star+"-tips"); // 打印提示
        var nowClass = " " + this.options.nowClass; // 定义选中星星样式名
        var tipsTxt = this.options.tipsTxt; // 定义提示文案
        var len = starlist.length; //星星数量
        
        for(i=0;i<len;i++){ // 绑定事件 点击 鼠标滑过
            starlist[i].value = i;
            starlist[i].onmouseover = function(){
                if (flag < 999){
                    var reg = RegExp(nowClass,"g");
					tips.innerHTML = tipsTxt[this.value];
                    starlist[flag].className = starlist[flag].className.replace(reg,"");
					//tips.innerHTML = tipsTxt[this.value]
                }
            }
            starlist[i].onmouseout = function(){
                if (flag < 999){
                    starlist[flag].className = starlist[flag].className + nowClass;
                }
            }
        };
        if (isIE){ //FIX IE下样式错误
            var li = document.getElementById(star).getElementsByTagName('li');
            for (var i = 0, len = li.length; i < len; i++) {
                var c = li[i];
                if (c) {
                    c.className = c.getElementsByTagName('a')[0].className;
                }
            }
        }
    },
    //设置默认属性
    SetOptions: function(options) {
        this.options = {//默认值
            Input:		"",//设置触保存分数的INPUT
            Tips:    	"",//设置提示文案容器
            nowClass:	"current-rating",//选中的样式名
            tipsTxt: 	["2分","4分","6分","8分","10分"]//提示文案
        };
        Extend(this.options, options || {});
    }
}
var Stars1 = new Stars("stars1",{nowClass:"current-rating",tipsTxt:["2分","4分","6分","8分","10分"]})
var Stars2 = new Stars("stars2");
/* For TEST */
</script>
</body>
</html><?php }} ?>