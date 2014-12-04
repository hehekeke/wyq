<?php /* Smarty version Smarty-3.1.14, created on 2014-11-26 15:33:22
         compiled from "app\tpl\assist\yearactivitydesc.html" */ ?>
<?php /*%%SmartyHeaderCode:12652547510f12c23f1-18119498%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b8646508d1b6b761fa6fbb8d2081f0b4b71d5a5' => 
    array (
      0 => 'app\\tpl\\assist\\yearactivitydesc.html',
      1 => 1416986003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12652547510f12c23f1-18119498',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547510f156de17_45401070',
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
<?php if ($_valid && !is_callable('content_547510f156de17_45401070')) {function content_547510f156de17_45401070($_smarty_tpl) {?><!DOCTYPE html>
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
	 //关键字搜索
	$(function(){
	    $("#keyword_search").click(function(){
            var search = $("#search").val();
            //alert(search);
            var key=encodeURI(search);
            //alert(key);exit;
            window.location.href= "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/AssistActivity/activity_class/0/keywords/"+key;
		});
	});
	
	//提交评论
    $(function(){
		$("#tijiao_pinglun").click(function(){
			var pinglunContent = $("#mycommentcontent").val();
			//alert(pinglunContent);
			if(pinglunContent !=''){
				$.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/UpActivityComment",{userId:<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
,content:pinglunContent,activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
},function(data){
			        window.location.reload(true);
				});
			}else{
				alert('亲，评论内容不能为空！');
			}
		});
	});
	//活动评论
	
	
	function liangfen(obj){
		console.log() ;//这个就是sg_name
		score2database(2,obj.id,$(obj).parent().parent().parent().parent().prev().prev().html());
		
	}
	function sifen(obj){
		console.log() ;//这个就是sg_name
		score2database(4,obj.id,$(obj).parent().parent().parent().parent().prev().prev().html());
		
	}
	function liufen(obj){
		console.log() ;//这个就是sg_name
		score2database(6,obj.id,$(obj).parent().parent().parent().parent().prev().prev().html());
		
	}
	function bafen(obj){
		console.log() ;//这个就是sg_name
		score2database(8,obj.id,$(obj).parent().parent().parent().parent().prev().prev().html());
		
	}
	function shifen(obj){
		console.log() ;//这个就是sg_name
		score2database(10,obj.id,$(obj).parent().parent().parent().parent().prev().prev().html());
		
	}
	
	function score2database(i,sg_id,sg_name){
	    $.post(
			"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/fuxuepingfen",
			{score:i,userId:<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
,sg_name:sg_name,sg_id:sg_id,activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
},
			function(re){
			     alert(re);
		    });
	}
	//---------------------丢鸡蛋-------------
	function diujidan(obj){
	   $.post(
			"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/AddActivityAttitudeegg",
			{userId:<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
,activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
},
			function(re){
			     alert(re);
		    });
	}
	//---------------------献鲜花-------------
	function xianxianhua(obj){
		$.post(
			"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/UpActivityAttitudeflowers",
			{userId:<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
,activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
},
			function(re){
			     alert(re);
		    });
	}
	//------------想参加-----------
	function wantjoin(obj){
		$.post(
			"<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/AddActivityAttitudewant",
			{userId:<?php echo $_smarty_tpl->tpl_vars['__userinfo__']->value['fu_id'];?>
,activityId:<?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
},
			function(re){
			     alert(re);
		    });
	}
</script>
<body style="color: #ffffff">
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
  <div class="col-md-12">
    <div class="page-header"><h3>当前位置：辅学活动>年活动>活动详情</h3></div>
  </div>
  <div class="col-md-8">
    <div class="avtivity_title"><?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_title'];?>
</div>
	<div class="activity_main_content">
	    <div id="activity_table"  style="word-break:break-all;width:698px">
		 <table style="table-layout:fixed">
		    <tr>
			     <td>ID:</td>
				 <td><?php echo $_smarty_tpl->tpl_vars['weekActivityContent']->value['activity_id'];?>
</td>
			 </tr>
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
            <tr >
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
                <input type="submit" name="egg" id="egg" onclick="diujidan(this)" value="扔鸡蛋"  style="margin-left: 115px;color:black;"/><label id="eggNum"><?php echo $_smarty_tpl->tpl_vars['attitude']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_egg_num'];?>
人</label>
                <input type="submit" name="flowers" id="flowers" onclick="xianxianhua(this)" value="献鲜花"   style="color:black;"/><label><?php echo $_smarty_tpl->tpl_vars['attitude']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_flowers_num'];?>
人</label>
                <input type="submit" name="want" id="want" onclick="wantjoin(this)" value="想参加"  style="color:black;"/><label><?php echo $_smarty_tpl->tpl_vars['attitude']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['activity_iswant_num'];?>
人</label>
                <?php endfor; else: ?>
                <input type="submit" name="egg0" id="egg0" onclick="diujidan(this)" value="扔鸡蛋"  style="margin-left: 115px;color:black;"/><label>0人</label>
                <input type="submit" name="flowers0" id="flowers0" onclick="xianxianhua(this)" value="献鲜花"   style="color:black;"/><label>0人</label>
                <input type="submit" name="want0" id="want0" onclick="wantjoin(this)"  value="想参加"  style="color:black;"/><label>0人</label>
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
" class="pingjunfen_name"><?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_name'];?>
</td>
                        <td id="jd<?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_id'];?>
" style="display: none"><?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_id'];?>
</td>
                        <td>
                            <div class="shop-rating" id="">
                                <ul class="rating-level" id="stars1">
                                    <li><a id="<?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_id'];?>
" class="one-star" data-val="2"  title="2分" onclick="liangfen(this)">2分</a></li>
                                    <li><a id="<?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_id'];?>
" class="two-stars" data-val="4"  title="4分" onclick="sifen(this)">4分</a></li>
                                    <li><a id="<?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_id'];?>
" class="three-stars" data-val="6"  title="6分" onclick="liufen(this)">6分</a></li>
                                    <li><a id="<?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_id'];?>
" class="four-stars" data-val="8"  title="8分" onclick="bafen(this)">8分</a></li>
                                    <li><a id="<?php echo $_smarty_tpl->tpl_vars['activityGoals']->value[$_smarty_tpl->getVariable('smarty')->value['section']['al']['index']]['sg_id'];?>
" class="five-stars" data-val="10"  title="10分" onclick="shifen(this)">10分</a></li>
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
                    <div  class="comment"  style="word-break:break-all;width:498px">
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
" onclick="reply(this)"></span>
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
</font>&nbsp;&nbsp;:&nbsp;&nbsp;<font color="#f5deb3"><?php echo $_smarty_tpl->tpl_vars['val']->value['toUser'];?>
</font><br><?php echo $_smarty_tpl->tpl_vars['val']->value['comment_content'];?>

                            <div class="comment_content_reply" ><span style="cursor:pointer" data-user_id="<?php echo $_smarty_tpl->tpl_vars['val']->value['comment_user_id'];?>
" data-parent_id="<?php echo $_smarty_tpl->tpl_vars['val']->value['comment_id'];?>
" data-comment_id="<?php echo $_smarty_tpl->tpl_vars['val']->value['comment_id'];?>
" onclick="reply(this)">	</span>
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
            <div id="page" style="line-height: 15px;margin: 5px auto;text-align:center">
                <span>共<?php echo $_smarty_tpl->tpl_vars['list']->value['totalPage'];?>
页</span>&nbsp;&nbsp;<span>当前第<?php echo $_smarty_tpl->tpl_vars['list']->value['page'];?>
页</span>
                <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/0/activityId/<?php echo $_smarty_tpl->tpl_vars['activityId']->value;?>
/page/1">首页</a>
                <?php if ($_smarty_tpl->tpl_vars['list']->value['page']>1){?>
                <?php $_smarty_tpl->tpl_vars['prePage'] = new Smarty_variable($_smarty_tpl->tpl_vars['list']->value['page']-1, null, 0);?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/0/activityId/<?php echo $_smarty_tpl->tpl_vars['activityId']->value;?>
/page/<?php echo $_smarty_tpl->tpl_vars['prePage']->value;?>
">上一页</a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['list']->value['page']<$_smarty_tpl->tpl_vars['list']->value['totalPage']){?>
                <?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_variable($_smarty_tpl->tpl_vars['list']->value['page']+1, null, 0);?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/0/activityId/<?php echo $_smarty_tpl->tpl_vars['activityId']->value;?>
/page/<?php echo $_smarty_tpl->tpl_vars['nextPage']->value;?>
">下一页</a>
                <?php }?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Assist/getWeekActivityContent/activity_class/0/activityId/<?php echo $_smarty_tpl->tpl_vars['activityId']->value;?>
/page/<?php echo $_smarty_tpl->tpl_vars['list']->value['totalPage'];?>
">尾页</a>
            </div><br>
            <?php }?>
        </div>
        <div></div>


	</div>
  </div>
  <div class="col-md-3">
  	<button type="button" class="btn btn-default big_button" style="float:none;width:262px;">下载本学年活动安排</button>
	<input type="text" id="search" placeholder="请输入关键字" style="float:left;margin-top:7px;width:200px;color:black;"/>
  	<button type="button" id="keyword_search"  class="btn btn-default big_button" style="float:right;width:60px;">搜索</button>
  	<table class="table table-striped"  style="border:1px solid #ddd;">
  	  <thead>
  	    <tr style="background:#2E3641"><td><center>年热门活动</center></td></tr>
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
/index.php/Assist/getWeekActivityContent/activity_class/0/activityId/<?php echo $_smarty_tpl->tpl_vars['HotActivityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_id'];?>
">
  	     <?php if ($_smarty_tpl->tpl_vars['HotActivityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_if_import']==1){?>【推荐】<?php echo $_smarty_tpl->tpl_vars['HotActivityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_title'];?>

		  <?php }else{ ?>⊙  <?php echo $_smarty_tpl->tpl_vars['HotActivityList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['activity_title'];?>

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

</body>
</html><?php }} ?>