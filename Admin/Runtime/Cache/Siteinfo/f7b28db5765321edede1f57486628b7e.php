<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="__PUBLIC__/admin/css/base.css" />
</head>
<body>
<div class="content">
<div class="content_title">联系信息管理</div>
<div class="content_table" style="border:1px solid #b8d0d6; padding:10px;">

    <?php if($wid > 0): ?><form name="contactForm" action="__APP__/Siteinfo/Contact/update_contact" method="post">
    <?php else: ?>
    <form name="contactForm" action="__APP__/Siteinfo/Contact/insert_contact" method="post"><?php endif; ?>
    <table border="0" cellpadding="0" cellspacing="0">
    <tr><td colspan="3"><input type="hidden" name="wid" value="<?php echo ($wid); ?>" /></td></tr>

	<tr>
    	<td height="25">联系方式类型：</td>
        <td><input type="text" name="wname" size="30" maxlength="100" value="<?php echo ($contact_info["wname"]); ?>" style="width:200px;" />
        &nbsp;&nbsp;<span style="color:#FF0000">
        <?php if($con_error and $con_error["wname"] == 1): ?>联系方式类型不能为空<?php elseif($con_error and $con_error["wname"] == 2): ?>联系方式类型已存在<?php else: ?>*<?php endif; ?>
        </span>
        </td>
        <td>&nbsp;</td>
	</tr>

	<tr>
    	<td height="25">详细信息：</td>
        <td><input type="text" name="wvalue" size="50" maxlength="100" value="<?php echo ($contact_info["wvalue"]); ?>" style="width:400px;" />
        &nbsp;&nbsp;<span style="color:#FF0000">
        <?php if($con_error and $con_error["wvalue"] == 1): ?>详细信息不能为空<?php elseif($con_error and $con_error["wvalue"] == 2): ?>此信息已存在<?php else: ?>*<?php endif; ?>
        </span>
        </td>
        <td>&nbsp;</td>
	</tr>

	<tr>
    	<td height="25">排列序号：</td>
        <td><input type="text" name="sort_order" size="10" maxlength="10" value="<?php echo ($contact_info["sort_order"]); ?>" /></td>
        <td>&nbsp;</td>
	</tr>
	<?php if($wid != ''): ?><tr>
    	<td height="25">添加时间：</td>
        <td><input type="text" name="add_time" size="20" maxlength="40" value="<?php echo ($contact_info["add_time"]); ?>" readonly/></td>
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