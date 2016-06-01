<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($col_info["title"]); ?></title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/styles.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/bootstrap.min.css">
<script type="text/javascript" src="__PUBLIC__/home/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/home/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container_main">

<!-- 头部 -->
<div class="header">
<div class="row"><div class="col-lg-3 col-lg-push-9"><a href="#">申请注册</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">会员登陆</a></div>
</div>


<div class="row">
<ul class="nav nav-pills">
    <li class="active"><a href="__APP__">Home</a></li>
    <?php if(is_array($nav_menu)): $key = 0; $__LIST__ = $nav_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($key % 2 );++$key; if(empty($menu['col_sub_list'])): ?><li><a href="__APP__/Article/column/cid/<?php echo ($menu["cid"]); ?>"><?php echo ($menu["cname"]); ?></a></li><?php endif; ?>
    <?php if(!empty($menu['col_sub_list'])): ?><li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="__APP__/Article/column/cid/<?php echo ($menu["cid"]); ?>">
           <?php echo ($menu["cname"]); ?> <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
        <?php if(is_array($menu['col_sub_list'])): $i = 0; $__LIST__ = $menu['col_sub_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><li><a href="__APP__/Article/column/cid/<?php echo ($sub_menu["cid"]); ?>"><?php echo ($sub_menu["cname"]); ?></a>
         </li><?php endforeach; endif; else: echo "" ;endif; ?>
       
      </ul>
    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
</div>



<div class="main_content">
<div class="col-lg-3">
    <div class="row">
        <span class=""><?php echo ($nav_col_info["cname"]); ?></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       
    </div>
    <div class="row">
        <ul>
        <?php if(is_array($nav_col_list)): $i = 0; $__LIST__ = $nav_col_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$col): $mod = ($i % 2 );++$i;?><li class="">
        <?php if($col["cid"] == $nav_current_col_id): ?><a href="__APP__/Article/column/cid/<?php echo ($col["cid"]); ?>" class=""><?php echo ($col["cname"]); ?></a>
        <?php else: ?>
        <a href="__APP__/Article/column/cid/<?php echo ($col["cid"]); ?>"><?php echo ($col["cname"]); ?></a><?php endif; ?>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
<div class="col-lg-9">
	<div class="">
    	<img src="__PUBLIC__/home/images/nav_bread_bg.png" width="18" height="20" />
        <span class="current_pos">当前位置：</span>
        <span><a href="__APP__">首页&nbsp;</a></span>
        <?php if(is_array($bread_crumbs)): $i = 0; $__LIST__ = $bread_crumbs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$col): $mod = ($i % 2 );++$i; if($col["cid"] == $current_head_navigation): ?><span>&gt;</span>
        <span class="current_cat"><?php echo ($col["cname"]); ?>&nbsp;</span>
        <?php else: ?>
        <span>&gt;</span>
        <span><a href="__APP__/Article/column/cid/<?php echo ($col["cid"]); ?>"><?php echo ($col["cname"]); ?>&nbsp;</a></span><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="article_content">
    	<div class="article_content_title">
            <div class="title_img_bg"></div>
            <div class="title_name">
            <div class="title_name_cn"><?php echo ($col_info["cname"]); ?></div>
            </div>
        </div>
        <div class="article_list">
        	<ul>
            <?php if(is_array($article_list)): $i = 0; $__LIST__ = $article_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?><li>
            <div class="news_name"><a href="__APP__/Article/article/id/<?php echo ($art["aid"]); ?>" ><?php echo ($art["title"]); ?></a></div>
            <div class="news_time"><?php echo ($art["atime"]); ?></div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            
			<div class="page_code">
            <div class="page_list">
            	<?php if($page_code): ?><span class="total">共&nbsp;<?php echo ($page_code["record_total"]); ?>&nbsp;条记录&nbsp;&nbsp;
                当前&nbsp;<?php echo ($page_code["page_current"]); ?>/<?php echo ($pagecode["page_total"]); ?>&nbsp;页&nbsp;&nbsp;&nbsp;</span>
                <a href='__APP__/Article/column/cid/<?php echo ($current_head_navigation); ?>/p/1'>首页</a>&nbsp;
                <a href='__APP__/Article/column/cid/<?php echo ($current_head_navigation); ?>/p/<?php echo ($page_code["page_prev"]); ?>'>前一页</a>&nbsp;
                <?php if(is_array($page_code["page_num"])): $i = 0; $__LIST__ = $page_code["page_num"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$num): $mod = ($i % 2 );++$i; if($page_code["page_current"] == $num): ?><a href='__APP__/Article/column/cid/<?php echo ($current_head_navigation); ?>/p/<?php echo ($num); ?>' class='current'><?php echo ($num); ?></a>&nbsp;
                <?php else: ?>
                <a href='__APP__/Article/column/cid/<?php echo ($current_head_navigation); ?>/p/<?php echo ($num); ?>'><?php echo ($num); ?></a>&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
                <a href='__APP__/Article/column/cid/<?php echo ($current_head_navigation); ?>/p/<?php echo ($page_code["page_next"]); ?>'>后一页</a>&nbsp;
                <a href='__APP__/Article/column/cid/<?php echo ($current_head_navigation); ?>/p/<?php echo ($page_code["page_total"]); ?>'>尾页</a>&nbsp;<?php endif; ?>
			</div>
			</div>
        </div>
    </div>
</div>

</div>
</div>
<!-- 尾部 -->
<div class="foot">
<div class="foot_up">
<div class="foot_left"></div>
<div class="foot_center">
    <ul>
    <?php if(is_array($bottom_menu)): $i = 0; $__LIST__ = $bottom_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li><a href="__APP__/Article/column/cid/<?php echo ($menu["cid"]); ?>"><?php echo ($menu["cname"]); ?></a></li>
    <?php if($key < $bottom_menu_len): ?><li>&nbsp;&nbsp;|&nbsp;&nbsp;</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>
<div class="foot_right"></div>
</div>
<div class="foot_down">版权所有&copy;星发布</div>
</div>


</body>
</html>