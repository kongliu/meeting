<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="__PUBLIC__/admin/css/base.css" />
<style type="text/css">#think_page_trace { display:none; }#think_page_trace_open { display:none; }</style>
</head>
<body>
<div class="menu">
<div class="main_menu"><div class="menu_title">主菜单</div></div>
<div class="menu_list">
    <div class="menu_head"><div class="menu_head_folder">&nbsp;</div><div class="menu_head_title">内容管理</div></div>
    <div class="menu_table">
    <ul>
    	<li><div class="node_bg1"></div><div class="node_bg2"></div><a href="__APP__/Column/col_add" target="content">新增栏目</a></li>
        <li><div class="node_bg1"></div><div class="node_bg2"></div><a href="__APP__/Column/col_list" target="content">栏目列表</a></li>
        <li><div class="node_bg1"></div><div class="node_bg2"></div><a href="__APP__/Article/article_add" target="content">添加文章</a></li>
        <li><div class="node_bg1"></div><div class="node_bg2"></div><a href="__APP__/Article/article_list" target="content">文章列表</a></li>
	</ul>
    </div>
    <div class="menu_head"><div class="menu_head_folder">&nbsp;</div><div class="menu_head_title">站点信息</div></div>
    <div class="menu_table">
    <ul>
    	<li><div class="node_bg1"></div><div class="node_bg2"></div><a href="__APP__/Links/links_list" target="content">友情链接</a></li>
        <li><div class="node_bg1"></div><div class="node_bg2"></div><a href="__APP__/Contact/contact_list" target="content">联系信息</a></li>
	</ul>
    </div>
   <!--  <div class="menu_head"><div class="menu_head_folder">&nbsp;</div><div class="menu_head_title">会员管理</div></div>
   <div class="menu_table">
   <ul>
       <li><div class="node_bg1"></div><div class="node_bg2"></div><a href="__APP__/User/User/user_list" target="content">会员列表</a></li>
       </ul>
   </div> -->
</div>
</div>
</body>
</html>