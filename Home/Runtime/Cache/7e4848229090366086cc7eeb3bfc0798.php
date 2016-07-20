<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>星发布官网</title>

<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/styles.css">
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



<div class="">
<div class="row">
<div class="col-lg-12">
	
    
    <div id="myCarousel" class="carousel slide">
    <!-- 轮播（Carousel）指标 -->
    <ol class="carousel-indicators">
    <?php if(is_array($focus_article)): foreach($focus_article as $key=>$focus): if(($key == 0) ): ?><li data-target="#myCarousel" data-slide-to="<?php echo ($key); ?>" class="active"></li>
    <?php else: ?>
    <li data-target="#myCarousel" data-slide-to="<?php echo ($key); ?>"></li><?php endif; endforeach; endif; ?>
     </ol>   
    
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner">
    <?php if(is_array($focus_article)): foreach($focus_article as $key=>$focus): if(($key == 0) ): ?><div class="item active">
    <?php else: ?> 
    <div class="item "><?php endif; ?>

            <img src="__PUBLIC__/images/focus/<?php echo ($focus["focus_img"]); ?>"  alt="<?php echo ($focus["title"]); ?>">
    </div><?php endforeach; endif; ?>
      </div>
    </div>
    <!-- 轮播（Carousel）导航 -->
    <a class="carousel-control left" href="#myCarousel" 
      data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" 
      data-slide="next">&rsaquo;</a>
    </div> 
 

    
      
<!--  <div class="col-lg-4" >
        <div class="">
            <span class="">欢迎词</span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="">Welcome</span>
        </div>
        <div class=""> -->
        <!--    <img src="__PUBLIC__/home/img/huizhuang.jpg" width="87" height="114" /> -->
     <!--        <div class="">
            <div class=""><?php echo ($president_article["title"]); ?>：</div>
            &nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($president_article["summary"]); ?>
            <a href="__APP__/Article/article/id/<?php echo ($president_article["aid"]); ?>">&gt;&gt;详细</a>
            </div>
        </div>
    </div>
    </div> -->

    <div class="row">
    <div class="col-lg-8">
    	<div class="row">
        	
            <span class="col-lg-3"><h3>新闻公告</h3></span>
            
             <span class="col-lg-1 col-lg-push-5"><a href="__APP__/Article/column/cid/<?php echo ($news_events); ?>" >more&nbsp;&gt;&gt;</a>
             </span>
            
        </div>
           
		<div class="row">
        	<ul>
            <?php if(is_array($news_list)): $i = 0; $__LIST__ = $news_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?><li>
            <span class="col-lg-5 ">
                <a href="__APP__/Article/article/id/<?php echo ($news["aid"]); ?>" ><?php echo ($news["title"]); ?></a>
            </span>
            <span class="col-lg-2 col-lg-push-1"><?php echo ($news["add_time"]); ?>
            </span>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
</div>

<div class="col-lg-4">

    <div class="links">
    	<div class="links_title">
        	<span class="title_name_cn">友情链接</span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
		</div>
        <div class="contact_content">
        	<div class="contact_left"><img src="__PUBLIC__/home/images/phone.jpg" /></div>
            <div class="contact_right">
            <?php if(is_array($info_list)): $i = 0; $__LIST__ = $info_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><div><span><?php echo ($info["wname"]); ?>：</span><span class="tel"><?php echo ($info["wvalue"]); ?></span></div><?php endforeach; endif; else: echo "" ;endif; ?>
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