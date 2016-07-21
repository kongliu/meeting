<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>列表</title>
	<link rel="stylesheet" href="__PUBLIC__/home/css/bootstrap.min.css">
	<script src="__PUBLIC__/home/js/jquery.min.js"></script>
	<script src="__PUBLIC__/home/js/unslider.js"></script>
	<script src="__PUBLIC__/home/js/bootstrap.min.js"></script>
	<style type="text/css">
		.navbar-nav li{
			margin-right: 15px;
		}
		.navbar-nav > li > a{
			margin-top: 5px;
			padding-bottom: 10px;
    		padding-top: 10px;
		}
		.content{
			margin: 2% 2%;
		}
		.title{
			font-size: 16px;
			text-align: center;
			margin:15px 0;
		}
		.details{
			width: 100%;
			text-indent:2em;
		}
		.details img{
			display: block;
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<nav class="navbar" style="background-color: #000;border-radius:0; margin-bottom: 0" role="navigation">
	   <div class="navbar-header" style="margin-left: 2%">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" 
	         data-target="#example-navbar-collapse">
	         <span class="sr-only"></span>
	         <span class="icon-bar"></span>
	         <span class="icon-bar"></span>
	         <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" style="padding:10px"><img src="__PUBLIC__/home/images/logo.png" width="60"></a>
	      <a class="navbar-brand" style="padding-top: 18px"><img src="__PUBLIC__/home/images/character.png" width="300"></a>
	   </div>
	   <div class="collapse navbar-collapse" id="example-navbar-collapse">
	      <ul class="nav navbar-nav" style="float: right; padding-top: 15px">
	         <?php if(is_array($nav_menu)): $key = 0; $__LIST__ = $nav_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($key % 2 );++$key; if(($key == 0) ): ?><li class="active"><a class="btn btn-danger" href="__APP__/<?php echo ($menu["cname_en"]); ?>/index"><?php echo ($menu["cname"]); ?></a>
	         </li>
	         <?php else: ?>
	         <li><a class="btn btn-danger" href="__APP__/<?php echo ($menu["cname_en"]); ?>/index/cid/<?php echo ($menu["cid"]); ?>"><?php echo ($menu["cname"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
	        <!--  <li><a class="btn btn-danger" href="#">粉丝入口</a></li>
	         <li><a class="btn btn-danger" href="#">下载APP</a></li>
	         <li><a class="btn btn-danger" href="#">新闻相关</a></li> -->
	         </volist>
	      </ul>
	   </div>
	</nav>

	<div class="content">
		<div>
		<a class="" href="__APP__">首页</a>
		<?php if(is_array($bread_crumbs)): $i = 0; $__LIST__ = $bread_crumbs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$col): $mod = ($i % 2 );++$i; if($col["cid"] == $current_head_navigation): ?><span>-</span>
        <span class=""><?php echo ($col["cname"]); ?>&nbsp;</span>
        <?php else: ?>
        <span>-</span>
        <span><a href="__APP__/<?php echo ($menu["cname_en"]); ?>/index"><?php echo ($col["cname"]); ?>&nbsp;</a></span><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        -<span>正文</span>
		</div>
	
		<div class="title">
			<h3><?php echo ($article_info["title"]); ?></h3>
		</div>
		<p class = "text-center"><?php echo ($article_info["atime"]); ?></p><br><br>
		<div class="details">
			<!-- <div class="row text-center">
			<video src = "<?php echo ($article_info["video"]); ?>"  height="500" width="80%" controls="controls"> </video>
			</div> -->
			<?php echo ($article_info["content"]); ?>
			
		</div>
	</div>

	<footer style="background-color: #000; text-align: center; margin-top: 30px">
		<img src="__PUBLIC__/home/images/xfb_logo.png" width="100" style="margin: 10px 0;"><br>
		<span style="color: #fff">©2015 星发布（xingfabu.cn）. All Rights Reserved 京ICP备15063222号 </span>
	</footer>

	<script>
		$(function() {
		    var unslider = $('.banner').unslider({
				speed: 500,             
				delay: 3000,             
				complete: function() {}, 
				keys: true,               
				dots: true,              
				fluid: true              
			});
		    $('.unslider-arrow').click(function() {
		        var fn = this.className.split(' ')[1];
		        unslider.data('unslider')[fn]();
		    });
		    $(".banner").width("100%");
		});
	</script>
</body>
</html>