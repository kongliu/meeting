<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="__PUBLIC__/admin/css/base.css" />
</head>
<body>
<div class="content">
<div class="content_title">栏目管理</div>
<div class="content_table" style="border:1px solid #b8d0d6; padding:10px;">

    <?php if($col_info["cid"] > 0): ?><form name="columnForm" action="__APP__/Cms/Column/col_update" method="post">
    <?php else: ?>
    <form name="columnForm" action="__APP__/Cms/Column/col_insert" method="post"><?php endif; ?>
    <table border="0" cellpadding="0" cellspacing="0">
    <tr><td colspan="3"><input type="hidden" name="cid" value="<?php echo ($col_info["cid"]); ?>" /></td></tr>
    <tr>
    	<td height="25">父级栏目：</td>
        <td>
        <select name="parent_id" style="width:200px;">
        	<option value="0">--无--</option>
            <?php if(is_array($col_all_info)): $i = 0; $__LIST__ = $col_all_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$col): $mod = ($i % 2 );++$i;?><option value="<?php echo ($col["cid"]); ?>" <?php if($col["cid"] == $col_info[parent_id]): ?>selected="selected"<?php endif; ?> ><?php echo ($col["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
		</td>
        <td>&nbsp;</td>
	</tr>
	<tr>
    	<td height="25">栏目名称：</td>
        <td><input type="text" name="cname" size="30" maxlength="50" value="<?php echo ($col_info["cname"]); ?>" style="width:200px;" />
        &nbsp;&nbsp;<span style="color:#FF0000">
        <?php if($col_error and $col_error["cname"] == 1): ?>栏目名称不能为空<?php elseif($col_error and $col_error["cname"] == 2): ?>栏目名称已存在<?php else: ?>*<?php endif; ?>
        </span>
        </td>
        <td>&nbsp;</td>
	</tr>
   <tr>
    	<td height="25">栏目英文名称：</td>
        <td><input type="text" name="cname_en" size="30" maxlength="50" value="<?php echo ($col_info["cname_en"]); ?>" style="width:200px;" />
        &nbsp;&nbsp;<span style="color:#FF0000">
        <?php if($col_error and $col_error["cname_en"] == 1): ?>栏目英文名称不能为空<?php elseif($col_error and $col_error["cname_en"] == 2): ?>栏目英文名称已存在<?php else: ?>*<?php endif; ?>
        </span>
        </td>
        <td>&nbsp;</td>
	</tr>
    <tr>
    	<td height="25">独立页面：</td>
        <td>
        <?php if($col_info["is_alone_page"] == '1'): ?><input type="radio" name="is_alone_page" value="0" />&nbsp;否
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="is_alone_page" value="1" checked="checked" />&nbsp;是
        <?php else: ?>
        <input type="radio" name="is_alone_page" value="0" checked="checked" />&nbsp;否
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="is_alone_page" value="1" />&nbsp;是<?php endif; ?>
        </td>
        <td>&nbsp;</td>
	</tr>
    <tr>
    	<td height="25">是否导航：</td>
        <td>
        <?php if($col_info["is_nav"] == '0'): ?><input type="radio" name="is_nav" value="0" checked="checked" />&nbsp;否
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="is_nav" value="1" />&nbsp;是
        <?php else: ?>
        <input type="radio" name="is_nav" value="0" />&nbsp;否
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="is_nav" value="1" checked="checked" />&nbsp;是<?php endif; ?>
        </td>
        <td>&nbsp;</td>
	</tr>
    <tr>
    	<td height="25">排列序号：</td>
        <td><input type="text" name="sort_order" size="10" maxlength="10" value="<?php echo ($col_info["sort_order"]); ?>" /></td>
        <td>&nbsp;</td>
	</tr>
    <tr>
    	<td height="25">页面标题：</td>
        <td><input type="text" name="page_title" size="50" maxlength="100" value="<?php echo ($col_info["page_title"]); ?>" /></td>
        <td>&nbsp;</td>
	</tr>    
    <tr>
    	<td height="25">关键词：</td>
        <td><input type="text" name="page_key" size="50" maxlength="100" value="<?php echo ($col_info["page_key"]); ?>" /></td>
        <td>&nbsp;</td>
	</tr>     
    <tr>
    	<td height="25">页面描述：</td>
        <td><input type="text" name="page_desc" size="100" maxlength="200" value="<?php echo ($col_info["page_desc"]); ?>" /></td>
        <td>&nbsp;</td>
	</tr>
    <tr>
    	<td height="25">是否关闭：</td>
        <td>
        <?php if($col_info["is_close"] == '1'): ?><input type="radio" name="is_close" value="0" />&nbsp;否
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="is_close" value="1" checked="checked" />&nbsp;是
        <?php else: ?>
        <input type="radio" name="is_close" value="0" checked="checked" />&nbsp;否
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="is_close" value="1" />&nbsp;是<?php endif; ?>
        </td>
        <td>&nbsp;</td>
	</tr>
    <tr><td colspan="3">&nbsp;</td></tr>
    <tr><td colspan="3"><input type="submit" value="保 存" /></td></tr>
    <tr><td colspan="3">&nbsp;</td></tr>
    </table>
    </form>

</div>
</div>
</body>
</html>