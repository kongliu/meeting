<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>星发布官网</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/base.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/index.css">
<script type="text/javascript" src="__PUBLIC__/home/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/home/js/jquery.focus.js"></script>
</head>
<body>
<div class="container">
<div class="container_left"></div>
<div class="container_main">

<!-- 头部 -->
<div class="head"><div class="regedit"><a href="#">申请注册</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">会员登陆</a></div></div>

<div class="nav_menu">
	<ul>
    <li>
    <a href="__APP__" class="select">
    <div class="menu_item">
    <div class="menu_left"></div>
    <div class="menu_content"><div class="menu_cn lan_cn">首&nbsp;页</div><div class="menu_en lan_en">Home</div></div>
    <div class="menu_right"></div>
    </div>
    </a>
    </li>
    <?php if(is_array($nav_menu)): $i = 0; $__LIST__ = $nav_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="separate"></li>
    <li>
    <a href="__APP__/Cms/Article/column/cid/<?php echo ($menu["cid"]); ?>">
    <div class="menu_item">
    <div class="menu_left"></div>
    <div class="menu_content"><div class="menu_cn lan_cn"><?php echo ($menu["cname"]); ?></div><div class="menu_en lan_en"><?php echo ($menu["cname_en"]); ?></div></div>
    <div class="menu_right"></div>
    </div>
    </a>
    	
        <!-- <?php if($menu[col_sub_list]): ?><ul>
        <?php if(is_array($menu[col_sub_list])): $i = 0; $__LIST__ = $menu[col_sub_list];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><li><a href="__APP__/Cms/Article/column/cid/<?php echo ($sub_menu["cid"]); ?>"><?php echo ($sub_menu["cname"]); ?>&nbsp;&nbsp;<?php echo ($sub_menu["cname_en"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul><?php endif; ?> -->
      
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>


<div class="main_content">
<div class="main_content_left">
	<div class="focus_img">
    <div id="focus_img_container">
    <div id="focus_img_list">
    	<?php if(is_array($focus_article)): $i = 0; $__LIST__ = $focus_article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$focus): $mod = ($i % 2 );++$i;?><div class="focus_item">
        <div class="focus_picture"><a href="__APP__/Cms/Article/article/id/<?php echo ($focus["aid"]); ?>"><img src="__PUBLIC__/images/focus/<?php echo ($focus["focus_img"]); ?>" /></a></div>
        <div class="focus_title"><div class="focus_title_cn lan_cn"><?php echo ($focus["title"]); ?></div><div class="focus_titie_en lan_en"><?php echo ($focus["title_en"]); ?></div></div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
    </div>
    </div>    
    <div class="news_list">
    	<div class="news_list_title">
        	<div class="news_title_left">
            <span class="title_name_cn">新闻公告</span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="title_name_en">News and Events</span>
            </div>
            <div class="news_title_right"><a href="__APP__/Cms/Article/column/cid/<?php echo ($news_events); ?>" >more&nbsp;&gt;&gt;</a></div>
		</div>
		<div class="news_list_ul">
        	<ul>
            <?php if(is_array($news_list)): $i = 0; $__LIST__ = $news_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?><li>
            <div class="news_name"><a href="__APP__/Cms/Article/article/id/<?php echo ($news["aid"]); ?>" ><?php echo ($news["title"]); ?></a></div>
            <div class="news_time"><?php echo ($news["add_time"]); ?></div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>
<div class="main_content_right">
	<div class="talk">
    	<div class="talk_title">
        	<span class="title_name_cn">欢迎词</span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	<span class="title_name_en">Welcome</span>
		</div>
        <div class="talk_content">
        <!-- 	<img src="__PUBLIC__/home/img/huizhuang.jpg" width="87" height="114" /> -->
            <div class="talk_summary">
            <div class="talk_desc"><?php echo ($president_article["title"]); ?>：</div>
            &nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($president_article["summary"]); ?>
            <a href="__APP__/Cms/Article/article/id/<?php echo ($president_article["aid"]); ?>">&gt;&gt;详细</a>
            </div>
        </div>
    </div>
    <div class="links">
    	<div class="links_title">
        	<span class="title_name_cn">友情链接</span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="title_name_en">Links</span>
		</div>
        <div class="links_content">
        	<ul>
            <?php if(is_array($links_list)): $i = 0; $__LIST__ = $links_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$links): $mod = ($i % 2 );++$i;?><li><img src="__PUBLIC__/home/images/link_item.png" width="14" height="20" border="0" />
            <a href="<?php echo ($links["link_add"]); ?>" target="_ "><?php echo ($links["link_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        	</ul>
        </div>
    </div>
    <div class="contact">
    	<div class="contact_title">
        	<span class="title_name_cn">联系方式</span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="title_name_en">Contact</span>
		</div>
        <div class="contact_content">
        	<div class="contact_left"><img src="__PUBLIC__/home/images/phone.jpg" /></div>
            <div class="contact_right">
            <?php if(is_array($info_list)): $i = 0; $__LIST__ = $info_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><div><span><?php echo ($info["wname"]); ?>：</span><span class="tel"><?php echo ($info["wvalue"]); ?></span></div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
		</div>
    </div>
</div>
<div style="clear:both"></div>
</div>

<!-- 尾部 -->
<div class="foot">
<div class="foot_up">
<div class="foot_left"></div>
<div class="foot_center">
    <ul>
    <?php if(is_array($bottom_menu)): $i = 0; $__LIST__ = $bottom_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li><a href="__APP__/Cms/Article/column/cid/<?php echo ($menu["cid"]); ?>"><?php echo ($menu["cname"]); ?></a></li>
    <?php if($key < $bottom_menu_len): ?><li>&nbsp;&nbsp;|&nbsp;&nbsp;</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>
<div class="foot_right"></div>
</div>
<div class="foot_down">版权所有&copy;星发布</div>
</div>


</div>
<div class="container_right"></div>
</div>
</body>
</html>