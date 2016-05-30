<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="__PUBLIC__/admin/css/base.css" />
</head>
<body>
<div class="content">
<div class="content_title">友情链接管理</div>
<div class="content_table" style="border:1px solid #b8d0d6; padding:10px;">

    <?php if($lid > 0): ?><form name="linkForm" action="__APP__/Siteinfo/Links/update_link" method="post">
    <?php else: ?>
    <form name="linkForm" action="__APP__/Siteinfo/Links/insert_link" method="post"><?php endif; ?>
    <table border="0" cellpadding="0" cellspacing="0">
    <tr><td colspan="3"><input type="hidden" name="lid" value="<?php echo ($lid); ?>" /></td></tr>

	<tr>
    	<td height="25">友情链接名称：</td>
        <td><input type="text" name="link_name" size="30" maxlength="100" value="<?php echo ($links_info["link_name"]); ?>" style="width:200px;" />
        &nbsp;&nbsp;<span style="color:#FF0000">
        <?php if($lin_error and $lin_error["lname"] == 1): ?>友情链接名称不能为空<?php elseif($lin_error and $lin_error["lname"] == 2): ?>友情链接名称已存在<?php else: ?>*<?php endif; ?>
        </span>
        </td>
        <td>&nbsp;</td>
	</tr>

	<tr>
    	<td height="25">友情链接地址：</td>
        <td><input type="text" name="link_add" size="50" maxlength="100" value="<?php echo ($links_info["link_add"]); ?>" style="width:400px;" />
        &nbsp;&nbsp;<span style="color:#FF0000">
        <?php if($lin_error and $lin_error["ladd"] == 1): ?>友情链接地址不能为空<?php elseif($lin_error and $lin_error["ladd"] == 2): ?>友情链接地址已存在<?php else: ?>*<?php endif; ?>
        </span>
        </td>
        <td>&nbsp;</td>
	</tr>

	<tr>
    	<td height="25">排列序号：</td>
        <td><input type="text" name="sort_order" size="10" maxlength="10" value="<?php echo ($links_info["sort_order"]); ?>" /></td>
        <td>&nbsp;</td>
	</tr>
	<?php if($lid != ''): ?><tr>
    	<td height="25">添加时间：</td>
        <td><span><?php echo ($links_info["add_time"]); ?> </span></td>
        <td>&nbsp;</td>
	</tr><?php endif; ?>
    <tr><td colspan="3">&nbsp;</td></tr>
    <tr><td colspan="3"><input type="submit" value="保 存" /></td></tr>
    <tr><td colspan="3">&nbsp;</td></tr>
    </table>
    </form>

</div>
</div>
</body>
</html>