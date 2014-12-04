<?php /* Smarty version Smarty-3.1.14, created on 2014-11-26 16:17:25
         compiled from "app\tpl\index\index.htm" */ ?>
<?php /*%%SmartyHeaderCode:4832544de73b38c7d1-32351721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ca4b744d523ff77c1a0f65a6dd3ac7261f3fd8f' => 
    array (
      0 => 'app\\tpl\\index\\index.htm',
      1 => 1416989842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4832544de73b38c7d1-32351721',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544de73b63f6a8_74677305',
  'variables' => 
  array (
    'web_url' => 0,
    'flag' => 0,
    'getPicture' => 0,
    'notice' => 0,
    'weibo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544de73b63f6a8_74677305')) {function content_544de73b63f6a8_74677305($_smarty_tpl) {?><!DOCTYPE html>
<html xmlns:wb="http://open.weibo.com/wb">

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
    <link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/css/index/index.css" rel="stylesheet">
      <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
      <script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/jquery.min.js"></script>

      <script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/bootstrap/bootstrap.min.js"></script>
      <script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/libs/bootstrap/bootstrap-hover-dropdown.min.js"></script>
  	<script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/js/holder.js"></script>
  	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--[if lte IE 6]>
	<script src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/js/index/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script>
	    <script type="text/javascript">
	        DD_belatedPNG.fix('div, ul, img, li, input , a');
	    </script>
	<![endif]-->
  	<script type="text/javascript">
		var web_url = "<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
";
	  	$(function(){
	  		flag = $("#flag").html();
	  		if(flag == 0){
	  			$("#no_notice").show();
	  			$("#is_notice").hide();
	  		}else{
	  			$("#is_notice").show();
	  			$("#no_notice").hide();
	  		}
	  	})

        function homePage(){
            var page = 1;

            $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/index/page",{"page":page},function(data){
                    //document.getElementById("noticeDiv").innerHTML = data;

                    var div = $('#is_notice');
                    div.text("");
                    div.append(data);
            });
        }
        function nextPage(){

            var nowPage = document.getElementById("nowPage").innerHTML;
            var page =  1+parseInt(nowPage);
            if(nowPage)

            alert(page);
            $.post("<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/index/page",{"page":page},function(data){
                //document.getElementById("noticeDiv").innerHTML = data;
                var div = $('#is_notice');
                div.text("");
                div.append(data);
            });
        }
    </script>
      <style>
          #page a{
              color: wheat;
          }
          #page input{
              color: #000000;
          }
      </style>
  </head>
  <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable(1, null, 0);?>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<p id="flag" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['flag']->value;?>
</p>
<div class="row">
<div class="main-top col-md-12">
  <div class="col-md-8">
    <div class="row">
      <div class="col-md-12">
        <div id="site-index-carousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#site-index-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#site-index-carousel" data-slide-to="1"></li>
            <li data-target="#site-index-carousel" data-slide-to="2"></li>
            <li data-target="#site-index-carousel" data-slide-to="3"></li>

          </ol>
          <div class="carousel-inner">
		  <!--
            <div class="item active">
              <img src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/images/index/nk1.jpg" alt="..." style="width:750px;height:360px;">
              <div class="carousel-caption">
                轮播1
              </div>
            </div>
			-->
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['nat'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['nat']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['name'] = 'nat';
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['getPicture']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['total']);
?>
				<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['nat']['index']==0){?>
				<div class="item active">
				<img src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload/images/<?php echo $_smarty_tpl->tpl_vars['getPicture']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nat']['index']]['pic_link'];?>
" alt="..." style="width:750px;height:360px;">
              <div class="carousel-caption">
				轮播1
			  </div>
				</div>
			  <?php }else{ ?>
				<div class="item">
              <img src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/upload/images/<?php echo $_smarty_tpl->tpl_vars['getPicture']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nat']['index']]['pic_link'];?>
" alt="..." style="width:750px;height:360px;">
				<div class="carousel-caption">
				轮播<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['nat']['index']+1;?>

			  </div>
			  </div>
				<?php }?>
             
            
			<?php endfor; endif; ?>
            

          </div>
        </div>
      </div>
    </div>
</div>
 <div class="col-md-4">
    <div id="newsinfo" class="panel panel-default">
      <div id="newsinfo-header" class="panel-heading">
      	<div id="newsinfo-header-words">通知公告</div>
      	 <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Notice/moreNotice"><div id="newsinfo-header-more"></div></a>
      </div>
      <div id="is_notice" class="list-group" style="color:#2E3641;">
      <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['nat'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['nat']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['name'] = 'nat';
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['notice']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['nat']['total']);
?>
        <div href="#" class="news-item list-group-item" id="noticeDiv">
          <a href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/index.php/Notice/noticeDetail/id/<?php echo $_smarty_tpl->tpl_vars['notice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nat']['index']]['notice_id'];?>
" class="list-group-item-heading">【<?php echo $_smarty_tpl->tpl_vars['notice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nat']['index']]['nt_name'];?>
】<?php echo $_smarty_tpl->tpl_vars['notice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nat']['index']]['notice_title'];?>
</a>
          <p class="list-group-item-text">发布时间：<?php echo $_smarty_tpl->tpl_vars['notice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nat']['index']]['notice_create_time'];?>
    浏览(<?php if ($_smarty_tpl->tpl_vars['notice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nat']['index']]['notice_read_num']==null){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['notice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nat']['index']]['notice_read_num'];?>
<?php }?>)</p>
       </div>
       <?php endfor; endif; ?>
      </div>
    </div>
</div>
</div>
<div class="main-bottom col-md-12">
    <div class="row home-extern-link col-md-12">
      <div class="col-md-3">
        <a href="http://xsfww.nku.cn/">
          <img src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/images/index/enterschool.png" class="img-circle"/>
        </a>
      </div>
      <div class="col-md-3">
        <a href="javascript:alert('正在建设中..')">
        <img src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/images/index/mentaldir.png" class="img-circle"/>

        </a>
      </div>
      <div class="col-md-3">
        <a href="http://career.nankai.edu.cn/">
          <img src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/images/index/job.png" class="img-circle"/>
        </a>
      </div>
      <div class="col-md-3">
        <a href="http://urp.nku.cn/">
          <img src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/images/index/info-door.png" class="img-circle"/>
        </a>
      </div>
    </div>
    <div id="weibo" class="row col-md-12">
       <div class="site-weibo-header col-md-2">
          <div class="weibo-avatar"><img src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/app/images/index/blog.jpg" /></div>
           <wb:follow-button uid="1851774145" type="red_1" width="67" height="24" ></wb:follow-button>
        </div>
      <div class="col-md-10 site-weibo">
        <div class="site-weibo-up">
          <ul>
            <li><span style="height:67px;width:194px;overflow:hidden;"><a href="http://weibo.com/nankaiuni" style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['weibo']->value[0]['content'];?>
</a></span><span class="date" style="text-align:right"><?php echo $_smarty_tpl->tpl_vars['weibo']->value[0]['time'];?>
</span><div class="weibo-item-bottom"></div></li>
            <li><span style="height:67px;width:194px;overflow:hidden;"><a href="http://weibo.com/nankaiuni" style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['weibo']->value[1]['content'];?>
</a></span><span class="date" style="text-align:right"><?php echo $_smarty_tpl->tpl_vars['weibo']->value[1]['time'];?>
</span><div class="weibo-item-bottom"></div></li>
            <li><span style="height:67px;width:194px;overflow:hidden;"><a href="http://weibo.com/nankaiuni" style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['weibo']->value[2]['content'];?>
</a></span><span class="date" style="text-align:right"><?php echo $_smarty_tpl->tpl_vars['weibo']->value[2]['time'];?>
</span><div class="weibo-item-bottom"></div></li>
          </ul>
        </div>
        <div class="site-weibo-line"></div>
        <div class="site-weibo-down">
          <ul>
            <li><span style="height:67px;width:194px;overflow:hidden;"><a href="http://weibo.com/nankaiuni" style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['weibo']->value[3]['content'];?>
</a></span><span class="date" style="text-align:right"><?php echo $_smarty_tpl->tpl_vars['weibo']->value[3]['time'];?>
0</span></li>
            <li><span style="height:67px;width:194px;overflow:hidden;"><a href="http://weibo.com/nankaiuni" style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['weibo']->value[4]['content'];?>
</a></span><span class="date" style="text-align:right"><?php echo $_smarty_tpl->tpl_vars['weibo']->value[4]['time'];?>
</span></li>
            <li><span style="height:67px;width:194px;overflow:hidden;"><a href="http://weibo.com/nankaiuni" style="color:#ffffff"><?php echo $_smarty_tpl->tpl_vars['weibo']->value[5]['content'];?>
</a></span><span class="date" style="text-align:right"><?php echo $_smarty_tpl->tpl_vars['weibo']->value[5]['time'];?>
</span></li>
          </ul>
        </div>
      </div>
    </div>
</div>

</div>
</div>
  <?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>