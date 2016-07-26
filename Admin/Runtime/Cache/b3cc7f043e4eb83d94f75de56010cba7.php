<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="__PUBLIC__/admin/css/base.css" />
<script type="text/javascript" src="__PUBLIC__/admin/js/jquery-1.9.1.min.js"></script>
</head>
<body>
<div class="content">
<div class="content_title">文章管理</div>
<div class="content_table" style="border:1px solid #b8d0d6; padding:10px;">

	<div style="margin-bottom:10px; padding-bottom:10px; border-bottom:1px solid #b8d0d6;">
    <form name="searchForm" action="__APP__/Article/article_search" method="post">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
    	<td width="50">栏目：</td>
        <td width="200"><select name="cid" style="width:180px">
        <option value="0">请选择栏目</option>
        <?php if(is_array($column_list)): $i = 0; $__LIST__ = $column_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$col): $mod = ($i % 2 );++$i;?><option value="<?php echo ($col["cid"]); ?>"<?php if($col["cid"] == $cid): ?>selected="selected"<?php endif; ?>><?php if($col["parent_id"] == 0): echo ($col["cname"]); else: ?>|----<?php echo ($col["cname"]); endif; ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        </td>
        <td width="50">标题：</td>
        <td width="220"><input type="text" name="title" size="30" maxlength="50" style="width:200px;"<?php if($title != '' and $title != 'null'): ?>value="<?php echo ($title); ?>"<?php endif; ?> /></td>
        <td width="50">选项：</td>
        <td width="130">
        <select name="option" style="width:100px;">
        <option value="0" <?php if($option == 0): ?>selected="selected"<?php endif; ?>>其他选项</option>
        <option value="1" <?php if($option == 1): ?>selected="selected"<?php endif; ?>>已发布</option>
        <option value="2" <?php if($option == 2): ?>selected="selected"<?php endif; ?>>未发布</option>
        <option value="3" <?php if($option == 3): ?>selected="selected"<?php endif; ?>>首页轮播图</option>
        <option value="4" <?php if($option == 4): ?>selected="selected"<?php endif; ?>>非首页轮播图</option>
        <option value="5" <?php if($option == 5): ?>selected="selected"<?php endif; ?>>栏目轮播图</option>
        <option value="6" <?php if($option == 6): ?>selected="selected"<?php endif; ?>>非栏目轮播图</option>
        </select>
        </td>
        <td><input type="submit" value="查询" /></td>
        <td>&nbsp;</td>
	</tr>
    </table>
    </form>
    </div>
    
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
    	<th width="50" height="25" align="left">编号</th>
        <th width="150" align="left">栏目</th>
        <th align="left">标题</th>
        <th width="80" align="left">发布</th>
        <th width="80" align="left">首页轮播图</th>
        <th width="80" align="left">栏目轮播图</th>
        <th width="80" align="left">首页轮播排序</th>
        <th width="80" align="left">列表页轮播排序</th>
        <th width="150" align="left">添加时间</th>
        <th width="100" align="left">操作</th>
	</tr>
   
	
		<?php if(is_array($article_list)): $i = 0; $__LIST__ = $article_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?><tr>
			<td height="25" align="left"><?php echo ($art["aid"]); ?></td>
			<td><?php echo ($art["cname"]); ?></td>
			<td><?php echo ($art["title"]); ?></td>
			<td><?php if($art["is_pub"] == 1): ?>已发布<?php else: ?>未发布<?php endif; ?></td>
			<td><?php if($art["home_show"] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
			<td><?php if($art["is_focus"] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
            <td><?php echo ($art["sort_order_home"]); ?></td>
            <td><?php echo ($art["sort_order"]); ?></td>
			<td><?php echo ($art["add_time"]); ?></td>
			<td><a href="__APP__/Article/article_edit/id/<?php echo ($art["aid"]); ?>">编辑</a>&nbsp;&nbsp;
			<a href="__APP__/Article/article_delete/id/<?php echo ($art["aid"]); ?>" onclick="return confirm('你确定要删除吗');">删除</a>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	
	<tr><td colspan="8">&nbsp;</td></tr>
	<?php if($flag_list == '1'): ?><tr>
    	<td colspan="8" align="right">
        一共<?php echo ($page["total"]); ?>条记录,&nbsp;&nbsp;第<?php echo ($page["p"]); ?>/<?php echo ($page["page_total"]); ?>页&nbsp;&nbsp;
        <?php if($page["page_total"] > 1): ?><a href="__APP__/Article/article_list/p/1">首页</a>&nbsp;&nbsp;
        <a href="__APP__/Article/article_list/p/<?php echo ($page["prev_page"]); ?>">前页</a>&nbsp;&nbsp;
        <a href="__APP__/Article/article_list/p/<?php echo ($page["next_page"]); ?>">后页</a>&nbsp;&nbsp;
        <a href="__APP__/Article/article_list/p/<?php echo ($page["page_total"]); ?>">尾页</a><?php endif; ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
    </tr>
	<?php else: ?>
	<tr>
    	<td colspan="8" align="right">
        一共<?php echo ($page["total"]); ?>条记录,&nbsp;&nbsp;第<?php echo ($page["p"]); ?>/<?php echo ($page["page_total"]); ?>页&nbsp;&nbsp;
        <?php if($page["page_total"] > 1): ?><a href="__APP__/Article/article_search/p/1/cid/<?php echo ($cid); ?>/title/<?php echo ($title/option/$option); ?>">首页</a>&nbsp;&nbsp;
        <a href="__APP__/Article/article_search/p/<?php echo ($page["prev_page"]); ?>/cid/<?php echo ($cid); ?>/title/<?php echo ($title); ?>/option/<?php echo ($option); ?>">前页</a>&nbsp;&nbsp;
        <a href="__APP__/Article/article_search/p/<?php echo ($page["next_page"]); ?>/cid/<?php echo ($cid); ?>/title/<?php echo ($title); ?>/option/<?php echo ($option); ?>">后页</a>&nbsp;&nbsp;
        <a href="__APP__/Article/article_search/p/<?php echo ($page["page_total"]); ?>/cid/<?php echo ($cid); ?>/title/<?php echo ($title); ?>/option/<?php echo ($option); ?>">尾页</a><?php endif; ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
    </tr><?php endif; ?>
    </table>

</div>
</div>
</body>
</html>