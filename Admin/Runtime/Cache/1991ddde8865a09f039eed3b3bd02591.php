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

	<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <?php if($column_list): ?><tr>
    	<th height="25" align="left" width="100">编号</th>
        <th align="left">栏目名称</th>
        <th align="left">栏目英文名称</th>
        <th align="left" width="100">独立页面</th>
        <th align="left" width="100">是否导航</th>
        <th align="left" width="100">是否关闭</th>
        <th align="left" width="100">排列顺序</th>
        <th align="left" width="100">父级栏目编号</th>
        <th align="left" width="100">操作</th>
	</tr>
    <?php if(is_array($column_list)): $i = 0; $__LIST__ = $column_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$col): $mod = ($i % 2 );++$i;?><tr>
    	<td height="25"><?php echo ($col["cid"]); ?></td>
        <td><?php echo ($col["cname"]); ?></td>
        <td><?php echo ($col["cname_en"]); ?></td>
        <td><?php if($col["is_alone_page"] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
        <td><?php if($col["is_nav"] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
        <td><?php if($col["is_close"] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
        <td><?php echo ($col["sort_order"]); ?></td>
        <td><?php echo ($col["parent_id"]); ?></td>
        <td><a href="__APP__/Column/col_edit/id/<?php echo ($col["cid"]); ?>">编辑</a>&nbsp;&nbsp;
        <a href="javascript:void(0)" onclick="del_col(<?php echo ($col["cid"]); ?>)">删除</a></td>
	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php else: ?>
    <tr><td height="25">还没有栏目，要&nbsp;<a href="__APP__/Column/col_add">添加</a>&nbsp;吗？</td></tr><?php endif; ?>
    </table>
    <script type="text/javascript">
	function del_col(cid)
	{
		if(confirm("确定要删除该栏目吗？"))
		{
			window.location.href = '__APP__/Column/col_delete/id/' + parseInt(cid);
		}
	}
	</script>

</div>
</div>
</body>
</html>