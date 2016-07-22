<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="__PUBLIC__/admin/css/base.css" />
</head>
<body>
<div class="content">

<div class="content_title" style="border-bottom:1px solid #b8d0d6;">联系信息</div>

<div class="content_table" style="border:1px solid #b8d0d6; padding:10px;">

	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<?php if($contact_list): ?><th height="25" align="left" width="100">编号</th>
        <th align="left" width="200">联系方式类型</th>
        <th align="left" width="200">详细信息</th>
        <th align="center" width="100">排列顺序</th>
        <th align="left" width="100">添加时间</th>
        <th align="left" width="100">操作</th>
	</tr>
	
    <?php if(is_array($contact_list)): $i = 0; $__LIST__ = $contact_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$con): $mod = ($i % 2 );++$i;?><tr>
    	<td height="25"><?php echo ($con["wid"]); ?></td>
        <td><?php echo ($con["wname"]); ?></td>
        <td><?php echo ($con["wvalue"]); ?></td>
		<td><?php echo ($con["sort_order"]); ?></td>
        <td><?php echo ($con["add_time"]); ?></td>
        <td><a href="__APP__/Contact/edit_contact/wid/<?php echo ($con["wid"]); ?>" >编辑</a>&nbsp;&nbsp;
        <a href="javascript:void(0)" onclick="del_con(<?php echo ($con["wid"]); ?>)">删除</a>&nbsp;&nbsp;
        <a href="__APP__/Contact/add_contact" >添加</a></td>
	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	<?php else: ?>
    <tr><td height="25">还没有联系方式，要&nbsp;<a href="__APP__/Contact/add_contact" >添加</a>&nbsp;吗？</td></tr><?php endif; ?> 
    </table>
    <script type="text/javascript">
	function del_con(wid)
	{
		if(confirm("确定要删除该联系方式吗？"))
		{
			window.location.href = '__APP__/Contact/del_contact/id/' + parseInt(wid);
		}
	}
	</script>

</div>

</div>
</body>
</html>