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
		
		.icon-bar{
			background-color: #ccc
		}
		.banner { position: relative; overflow: auto; }
		.banner ul { width: 100%; height: auto; padding: 0}
    	li { list-style: none; }
        .banner ul li { float: left; width: 100%}
        .dots {
		    position: absolute;
		    padding: 0;
		    text-align: center;
		    left: 0;
		    right: 0;
		    bottom: 10px;
		}
		.banner .dots li {
			display: inline-block;
			width: 10px;
			height: 10px;
			margin: 0 4px;
			text-indent: -999em;
			border: 2px solid #fff;
			border-radius: 6px;
			cursor: pointer;
			opacity: .4;
			-webkit-transition: background .5s, opacity .5s;
			-moz-transition: background .5s, opacity .5s;
			transition: background .5s, opacity .5s;
		}
		.banner .dots li.active {
			background: #fff;
			opacity: 1;
		}
		.prev{
			position: absolute; 
			left: 10px;
			top:40%
		}
		.next{
			position: absolute; 
			right: 10px;
			top:40%
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
	      <a class="navbar-brand" style="padding:10px" href="__APP__"><img src="__PUBLIC__/home/images/logo.png" width="60"></a>
	      <a class="navbar-brand" style="padding-top: 18px"><img src="__PUBLIC__/home/images/character.png" width="300"></a>
	   </div>
	   <div class="collapse navbar-collapse" id="example-navbar-collapse">
	      <ul class="nav navbar-nav" style="float: right; padding-top: 15px">
	      <!-- <?php var_dump($nav_menu) ?> -->
	         <?php if(is_array($nav_menu)): $key = 0; $__LIST__ = $nav_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($key % 2 );++$key; if(($key == 0) ): ?><li class="active">
	         
	         <?php else: ?>
	         <li><?php endif; ?>

	         <?php if(($menu["cname_en"] == app) ): ?><a class="btn btn-danger" href="#" onmouseout="$('#code').hide();" onmouseover="$('#code').show();">下载APP</a>
				<div id="code" style="position: absolute; left:-24px; display: none;z-index:999" >
					<img src="__PUBLIC__/home/images/code.png" width="140">
		        </div>
			<?php elseif(($menu["cname_en"] == news) ): ?>	
	         <a class="btn btn-danger" href="__APP__/<?php echo ($menu["cname_en"]); ?>/index/cid/<?php echo ($menu["cid"]); ?>"><?php echo ($menu["cname"]); ?></a>
	         <?php else: ?>
	         <a class="btn btn-danger" href="#"><?php echo ($menu["cname"]); ?></a><?php endif; ?>
	         </li><?php endforeach; endif; else: echo "" ;endif; ?>
	        <!--  <li><a class="btn btn-danger" href="#">粉丝入口</a></li>
	         <li><a class="btn btn-danger" href="#">下载APP</a></li>
	         <li><a class="btn btn-danger" href="#">新闻相关</a></li> -->
	         </volist>
	      </ul>
	   </div>
	</nav>

	<div class="banner" style="min-height: 300px">
	    <ul>
	    <?php if(is_array($focus_article)): foreach($focus_article as $key=>$focus): ?><li>
	        	<a href="__APP__/news/detail/cid/<?php echo ($menu["cid"]); ?>/aid/<?php echo ($focus["aid"]); ?>">
	        		<img height="300" src="__PUBLIC__/images/focus/<?php echo ($focus["focus_img"]); ?>" style="width: 100%">
	        	</a>
	        </li><?php endforeach; endif; ?>
	       
	    </ul>
	    <a href="javascript:;;" class="unslider-arrow prev"><img src="__PUBLIC__/home/images/left.png" width="30"></a>
		<a href="javascript:;;" class="unslider-arrow next"><img src="__PUBLIC__/home/images/right.png" width="30"></a>
	</div>

	<div class="container" style="width: 100%; margin-top: 20px;">
		<div class="row">
			<span class="col-xs-1" style="width: 10px;height: 30px; background-color: red; margin-left: 30px"> </span>
			<span class="col-xs-10" style="font-size: 20px">全部新闻</span>
		</div>

		<div class="row" style="margin-top: 30px;">
			<ul class="col-xs-12">230018
			<?php if(is_array($article_list)): $i = 0; $__LIST__ = $article_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article_info): $mod = ($i % 2 );++$i;?><li class="col-xs-3" style="margin-bottom:15px">
					<a href="__APP__/News/detail/cid/<?php echo ($cid); ?>/aid/<?php echo ($article_info["aid"]); ?>">
					<img src="__PUBLIC__/images/focus/<?php echo ($article_info["focus_img"]); ?>" style="width: 300px; height: 165px">
					</a>
					<br>
					<span style="font-size: 16px"><?php echo ($article_info["title"]); ?></span>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>	
			</ul>
		</div>
		<div class="row" style="text-align: center;">
		<?php if($page_code): ?><span class="total">共&nbsp;<?php echo ($page_code["record_total"]); ?>&nbsp;条记录&nbsp;&nbsp;
                当前&nbsp;<?php echo ($page_code["page_current"]); ?>/<?php echo ($page_code["page_total"]); ?>&nbsp;页&nbsp;&nbsp;&nbsp;</span>
                <a href='__APP__/News/index/cid/<?php echo ($cid); ?>/p/1'>首页</a>&nbsp;
                <a href='__APP__/News/index/cid/<?php echo ($cid); ?>/p/<?php echo ($page_code["page_prev"]); ?>'>前一页</a>&nbsp;
                <?php if(is_array($page_code["page_num"])): $i = 0; $__LIST__ = $page_code["page_num"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$num): $mod = ($i % 2 );++$i; if($page_code["page_current"] == $num): ?><a href='__APP__/News/index/cid/<?php echo ($cid); ?>/p/<?php echo ($num); ?>' class='current'><?php echo ($num); ?></a>&nbsp;
                <?php else: ?>
                <a href='__APP__/News/index/cid/<?php echo ($cid); ?>/p/<?php echo ($num); ?>'><?php echo ($num); ?></a>&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
                <a href='__APP__/News/index/cid/<?php echo ($cid); ?>/p/<?php echo ($page_code["page_next"]); ?>'>后一页</a>&nbsp;
                <a href='__APP__/News/index/cid/<?php echo ($cid); ?>/p/<?php echo ($page_code["page_total"]); ?>'>尾页</a>&nbsp;<?php endif; ?>
		<!-- 	<ul class="pagination">
			  <li><a href="#">&laquo;</a></li>
			  <li><a href="#">1</a></li>
			  <li><a href="#">2</a></li>
			  <li><a href="#">3</a></li>
			  <li><a href="#">4</a></li>
			  <li><a href="#">5</a></li>
			  <li><a href="#">&raquo;</a></li>
			</ul> -->
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