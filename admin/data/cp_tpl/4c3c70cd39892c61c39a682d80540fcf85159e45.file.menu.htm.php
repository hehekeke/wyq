<?php /* Smarty version Smarty-3.1.14, created on 2014-10-27 14:33:34
         compiled from "admin\tpl\index\menu.htm" */ ?>
<?php /*%%SmartyHeaderCode:6306544de73ee83202-05322392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c3c70cd39892c61c39a682d80540fcf85159e45' => 
    array (
      0 => 'admin\\tpl\\index\\menu.htm',
      1 => 1412910186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6306544de73ee83202-05322392',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_url' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_544de73f28c7f7_21165064',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544de73f28c7f7_21165064')) {function content_544de73f28c7f7_21165064($_smarty_tpl) {?>﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/css/admin.css" type="text/css" rel="stylesheet">
<SCRIPT language=javascript>
	function expand(el)
	{
		childObj = document.getElementById("child" + el);

		if (childObj.style.display == 'none')
		{
			childObj.style.display = 'block';
		}
		else
		{
			childObj.style.display = 'none';
		}
		return;
	}
</SCRIPT>
</HEAD>
<BODY>

<TABLE height="100%" cellSpacing=0 cellPadding=0 width=170 background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_bg.jpg" border=0>
	<TR>
    	<TD vAlign=top align=middle>
      		<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        		<TR><TD height=10></TD></TR>
			</TABLE>


	  	<?php if ($_smarty_tpl->tpl_vars['menu']->value['other']==1){?>
			<TABLE cellSpacing=0 cellPadding=0 width=150 border=0>
        		<TR height=22>
          			<TD style="PADDING-LEFT: 30px" background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_bt.jpg">
						<A class=menuParent onclick=expand(1) href="javascript:void(0);">其他维护</A>
					</TD>
				</TR>
        		<TR height=4><TD></TD></TR>
			</TABLE>
			<TABLE id=child1 style="DISPLAY: none" cellSpacing=0 cellPadding=0 width=150 border=0>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/other/linklist" target=main>友情链接管理</A></TD>
				</TR>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/other/logo" target=main>logo图片维护</A></TD>
				</TR>
        		<TR height=4><TD colSpan=2></TD></TR>
			</TABLE>
			<?php }?>
            <TABLE cellSpacing=0 cellPadding=0 width=150 border=0>
                <TR height=22>
                    <TD style="PADDING-LEFT: 30px" background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_bt.jpg">
                        <A class=menuParent onclick=expand(19) href="javascript:void(0);">个人中心</A>
                    </TD>
                </TR>
                <TR height=4><TD></TD></TR>
            </TABLE>
            <TABLE id=child19 style="DISPLAY: none" cellSpacing=0 cellPadding=0 width=150 border=0>
                <TR height=20>
                    <TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
                        <TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/adminmessage/getmymessage" target=main>我的消息</A></TD>
                </TR>
                <TR height=4><TD colSpan=2></TD></TR>
            </TABLE>
            <TABLE cellSpacing=0 cellPadding=0 width=150 border=0>
                <TR height=22>
                    <TD style="PADDING-LEFT: 30px" background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_bt.jpg">
                        <A class=menuParent onclick=expand(14) href="javascript:void(0);">通知公告</A>
                    </TD>
                </TR>
                <TR height=4><TD></TD></TR>
            </TABLE>
			   <?php if ($_smarty_tpl->tpl_vars['menu']->value['notice']==1){?>
            <TABLE id=child14 style="DISPLAY: none" cellSpacing=0 cellPadding=0 width=150 border=0>
               <TR height=20>
                    <TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
                    <TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/notice/noticeTypeList" target=main>通知公告类型维护</A></TD>
                </TR>
                <TR height=20>
                    <TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
                    <TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/notice/noticeList" target=main>通知公告维护</A></TD>
                </TR>
                <TR height=4><TD colSpan=2></TD></TR>
                 </TABLE>
              <?php }?>
            <TABLE cellSpacing=0 cellPadding=0 width=150 border=0>
        		<TR height=22>
          			<TD style="PADDING-LEFT: 30px" background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_bt.jpg">
						<A class=menuParent onclick=expand(2) href="javascript:void(0);">辅学活动维护</A>
					</TD>
				</TR>
        		<TR height=4><TD></TD></TR>
			</TABLE>
			<TABLE id=child2 style="DISPLAY: none" cellSpacing=0 cellPadding=0 width=150 border=0>				
				<?php if ($_smarty_tpl->tpl_vars['menu']->value['activity']==1){?>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/activity/Getactivitylist" target=main>历史活动库维护</A></TD>
				</TR>
                <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['menu']->value['addactivity']==1){?>     
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/addactivity/ActivityList/type/0" target=main>学年活动维护</A></TD>
				</TR>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/addactivity/ActivityList/type/1" target=main>周活动维护</A></TD>
				</TR>
		        <?php }?>
				<?php if ($_smarty_tpl->tpl_vars['menu']->value['checkactivity']==1){?>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/CheckActivity/ActivityList/" target=main>活动审批</A></TD>
				</TR>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['menu']->value['publishactivity']==1){?>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/PublishActivity/ActivityList" target=main>活动发布</A></TD>
				</TR>
				<?php }?>
        		<TR height=4><TD colSpan=2></TD></TR>
			</TABLE>
			
			<TABLE cellSpacing=0 cellPadding=0 width=150 border=0>
        		<TR height=22>
          			<TD style="PADDING-LEFT: 30px" background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_bt.jpg">
						<A class=menuParent onclick=expand(3) href="javascript:void(0);">活动设置维护</A>
					</TD>
				</TR>
        		<TR height=4><TD></TD></TR>
			</TABLE>
			<!--活动模块管理-->
			<TABLE id=child3 style="DISPLAY: none" cellSpacing=0 cellPadding=0 width=150 border=0>
			<?php if ($_smarty_tpl->tpl_vars['menu']->value['activitymanage']==1){?>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          		<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/mubiao" target=main>辅学目标维护</A></TD>
				</TR>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/type" target=main>活动类型维护</A></TD>
				</TR>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/getAssistActivity" target=main>辅学活动介绍维护</A></TD>
				</TR>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['menu']->value['activity']==1){?>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/Activity/Getactivitydata" target=main>活动数据维护</A></TD>
				</TR>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/Activity/GetCommentsList" target=main>活动评论维护</A></TD>
				</TR>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['menu']->value['activitymanage']==1){?>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/sensitive_words_list" target=main>敏感词维护</A></TD>
				</TR>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/organizerslist" target=main>主办方维护</A></TD>
				</TR>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/undertakelist" target=main>承办方维护</A></TD>
				</TR>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/activity_num_count" target=main>发布量分析</A></TD>
				</TR>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/rolelist" target=main>活动关注度对比统计</A></TD>
				</TR>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/ActivityManage/rolelist" target=main>活动关注度交叉统计</A></TD>
				</TR>
				<?php }?>
				<!--系统评估-->
        		<TR height=4><TD colSpan=2></TD></TR>
			</TABLE>
			
			<TABLE cellSpacing=0 cellPadding=0 width=150 border=0>
        		<TR height=22>
          			<TD style="PADDING-LEFT: 30px" background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_bt.jpg">
						<A class=menuParent onclick=expand(4) href="javascript:void(0);">系统评估</A>
					</TD>
				</TR>
        		<TR height=4><TD></TD></TR>
			</TABLE>
			<TABLE id=child4 style="DISPLAY: none" cellSpacing=0 cellPadding=0 width=150 border=0>
				<?php if ($_smarty_tpl->tpl_vars['menu']->value['assessment']==1){?>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/assessment/thelastass" target=main>评估项目说明维护</A></TD>
				</TR>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/assessment/zbdjlist" target=main>评估项目等级维护</A></TD>
				</TR>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['menu']->value['questionnaire']==1){?>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/questionnaire/index" target=main>评估问卷库维护</A></TD>
				</TR>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['menu']->value['personnal']==1){?>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/personnal/personalachievementstype" target=main>个人成果类型维护</A></TD>
				</TR>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/personnal/personalachievementstime" target=main>个人成果填写时间维护</A></TD>
				</TR>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['menu']->value['tips']==1){?>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/tips/gettipslist/type/3" target=main>小贴士维护</A></TD>
				</TR>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['menu']->value['school']==1){?>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/school/index/type/1" target=main>校级评估工作</A></TD>
				</TR>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['menu']->value['college']==1){?>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/college/index/type/1" target=main>学院评估工作</A></TD>
				</TR>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['menu']->value['counselor']==1){?>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/Counselor/index/type/1" target=main>辅导员评估工作</A></TD>
				</TR>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['menu']->value['suggest']==1){?>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/Suggest/index" target=main>自评结果建议维护</A></TD>
				</TR>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['menu']->value['otherset']==1){?>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/otherset/index" target=main>其他设置</A></TD>
				</TR>
				<?php }?>
        		<TR height=4><TD colSpan=2></TD></TR>
			</TABLE>
			<?php if ($_smarty_tpl->tpl_vars['menu']->value['basedata']==1){?>
			<TABLE cellSpacing=0 cellPadding=0 width=150 border=0>
        		<TR height=22>
          			<TD style="PADDING-LEFT: 30px" background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_bt.jpg">
						<A class=menuParent onclick=expand(35) href="javascript:void(0);">基础数据管理</A>
					</TD>
				</TR>

        		<TR height=4><TD></TD></TR>
			</TABLE>
			<TABLE id=child35 style="DISPLAY: none" cellSpacing=0 cellPadding=0 width=150 border=0>
        		<TR height=20>
          			<TD align=middle width=30>
		  				<IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9>
					</TD>
          			<TD>
		  				<A class=menuChild  href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/basedata/getcollegelist" target=main>学院管理</A>
		  			</TD>
				</TR>
				<TR height=20>
          			<TD align=middle width=30>
		  				<IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9>
					</TD>
          			<TD>
		  				<A class=menuChild  href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/basedata/getmajorlist" target=main>专业管理</A>
		  			</TD>
				</TR>
	  		</TABLE>
	  		<?php }?>
	  		<!-- 年级管理- -->	
	  		<?php if ($_smarty_tpl->tpl_vars['menu']->value['grade']==1){?>
			<TABLE cellSpacing=0 cellPadding=0 width=150 border=0>
        		<TR height=22>
          			<TD style="PADDING-LEFT: 30px" background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_bt.jpg">
						<A class=menuParent onclick=expand(8) href="javascript:void(0);">年级管理</A>
					</TD>
				</TR>
        		<TR height=4><TD></TD></TR>
			</TABLE>
			<TABLE id=child8 style="DISPLAY: none" cellSpacing=0 cellPadding=0 width=150 border=0>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/grade/xinsheng" target=main>新生入学评估</A></TD>
				</TR>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/grade/yearEnd" target=main>学年末评估</A></TD>
				</TR>
        		<TR height=4><TD colSpan=2></TD></TR>
			</TABLE>
			<?php }?>
			<!-- 系统维护- -->	
			<?php if ($_smarty_tpl->tpl_vars['menu']->value['system']==1){?>
			<TABLE cellSpacing=0 cellPadding=0 width=150 border=0>
        		<TR height=22>
          			<TD style="PADDING-LEFT: 30px" background="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_bt.jpg">
						<A class=menuParent onclick=expand(13) href="javascript:void(0);">系统维护</A>
					</TD>
				</TR>
        		<TR height=4><TD></TD></TR>
			</TABLE>
			<TABLE id=child13 style="DISPLAY: none" cellSpacing=0 cellPadding=0 width=150 border=0>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/system/userlist" target=main>用户账号维护</A></TD>
				</TR>
				 <TR height=20>
                    <TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
                    <TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/system/userorglist" target=main>用户部门维护</A></TD>
                </TR>
				<TR height=20>
          			<TD align=middle width=30><IMG height=9 src="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/common/admin/images/menu_icon.gif" width=9></TD>
          			<TD><A class=menuChild href="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
/mannkgn.php/system/rolelist" target=main>角色维护</A></TD>
				</TR>
        		<TR height=4><TD colSpan=2></TD></TR>
			</TABLE>
			<?php }?>
	  	</TD>
		<TD width=1 bgColor="#d1e6f7"></TD>
	</TR>
</TABLE>
</BODY>
</HTML>
<?php }} ?>