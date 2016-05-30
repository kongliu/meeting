<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="__PUBLIC__/admin/css/base.css" />
<script type="text/javascript" src="__PUBLIC__/admin/js/jquery-1.9.1.min.js"></script>
</head>
<body>
<div class="content">
<div class="content_title">操作说明</div>
<div class="content_table" style="border:1px solid #b8d0d6; padding:10px;">
	<div style="line-height:50px;">
        <?php if($success == 1): ?><span>操作成功！&nbsp;</span>
        <?php else: ?>
            <span>操作失败！&nbsp;</span>
            <span><?php echo (urldecode($error_reson)); ?></span><?php endif; ?>
        <span><a href="<?php echo ($url); ?>">返回</a></span>    
	</div>
</div>
</div>
</body>
</html>