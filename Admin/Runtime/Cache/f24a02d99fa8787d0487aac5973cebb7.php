<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="__PUBLIC__/admin/css/base.css" />
</head>
<body>
<div class="content">

<div class="content_title" style="border-bottom:1px solid #b8d0d6;">友情链接</div>

<div class="content_table" style="border:1px solid #b8d0d6; padding:10px;">

	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<?php if($friend_links_list): ?><th height="25" align="left" width="100">编号</th>
        <th align="left" width="200">友情链接名称</th>
        <th align="left" >链接地址</th>
        <th align="center" width="100">排列顺序</th>
        <th align="left" width="100">添加时间</th>
        <th align="left" width="100">操作</th>
	</tr>
    <?php if(is_array($friend_links_list)): $i = 0; $__LIST__ = $friend_links_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lin): $mod = ($i % 2 );++$i;?><tr>
    	<td height="25"><?php echo ($lin["lid"]); ?></td>
        <td><?php echo ($lin["link_name"]); ?></td>
        <td><?php echo ($lin["link_add"]); ?></td>
		<td><?php echo ($lin["sort_order"]); ?></td>
        <td><?php echo ($lin["add_time"]); ?></td>
        <td><a href="__APP__/Links/edit_link/lid/<?php echo ($lin["lid"]); ?>" >编辑</a>&nbsp;&nbsp;
        <a href="javascript:void(0)" onclick="del_lin(<?php echo ($lin["lid"]); ?>)">删除</a>&nbsp;&nbsp;
        <a href="__APP__/Links/add_link" >添加</a></td>
	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php else: ?>
    <tr><td height="25">还没有友情链接，要&nbsp;<a href="__APP__/Links/add_link" >添加</a>&nbsp;吗？</td></tr><?php endif; ?>
    </table>
    <script type="text/javascript">
	function del_lin(lid)
	{
		if(confirm("确定要删除该链接吗？"))
		{
			window.location.href = '__APP__/Links/del_link/id/' + parseInt(lid);
		}
	}
	</script>

</div>

</div>
</body>
</html>