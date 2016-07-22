<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="__PUBLIC__/admin/css/base.css" />
<script type="text/javascript" src="__PUBLIC__/admin/js/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="__PUBLIC__/plugin/ueditor_mini1_0_0-utf8-php/themes/default/css/umeditor.css">
<!-- 引用jquery -->
<script src="__PUBLIC__/plugin/ueditor_mini1_0_0-utf8-php/third-party/jquery.min.js"></script>
<!-- 配置文件 -->
<script type="text/javascript" src="__PUBLIC__/plugin/ueditor_mini1_0_0-utf8-php/umeditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="__PUBLIC__/plugin/ueditor_mini1_0_0-utf8-php/umeditor.js"></script>
<!-- 语言包文件 -->
<script type="text/javascript" src="__PUBLIC__/plugin/ueditor_mini1_0_0-utf8-php/lang/zh-cn/zh-cn.js"></script>

</head>
<body>
<div class="content">
<div class="content_title">文章管理</div>
<div class="content_table" style="border:1px solid #b8d0d6; padding:10px;">
	
    <?php if($is_add == 1): ?><form name="articleForm" action="__APP__/Article/article_insert" method="post" enctype="multipart/form-data">
    <?php else: ?>
    <form name="articleForm" action="__APP__/Article/article_update" method="post" enctype="multipart/form-data"><?php endif; ?>
    
    <div class="form_tab">
    <ul>
    	<li><a href="javascript:void(0)" onclick="show_content(this,'basic')" class="select">基本信息</a></li>
        <li><a href="javascript:void(0)" onclick="show_content(this,'detail')">详细信息</a></li>
	</ul>
    </div>
    
    <div id="form_content_div" class="form_content">
    	<div class="form_content_item" id="basic" style="display:block;">
        <table border="0" cellpadding="0" cellspacing="0">
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
        	<td width="100">栏目：</td>
            <td><select name="cid" style="width:200px;">
            <option value="0">请选择栏目</option>
            <?php if(is_array($column_list)): $i = 0; $__LIST__ = $column_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$col): $mod = ($i % 2 );++$i; if($col["cid"] == $article_info[cid]): ?><option value="<?php echo ($col["cid"]); ?>" selected="selected"><?php if($col["parent_id"] == 0): echo ($col["cname"]); else: ?>|----<?php echo ($col["cname"]); endif; ?></option>
            <?php else: ?>
            <option value="<?php echo ($col["cid"]); ?>"><?php if($col["parent_id"] == 0): echo ($col["cname"]); else: ?>|----<?php echo ($col["cname"]); endif; ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
            &nbsp;&nbsp;<span style="color:#FF0000"><?php if($article_error and $article_error["cid"] == 1): ?>请选择栏目<?php else: ?>*<?php endif; ?></span>
            </td>
            <td>&nbsp;</td>
		</tr>
        <tr><td colspan="3">&nbsp;<input type="hidden" name="article_aid" value="<?php echo ($article_info["aid"]); ?>"/></td></tr>
        <tr>
        	<td>标题：</td>
            <td><input type="text" name="title" size="40" maxlength="50" style="width:300px;" value="<?php echo ($article_info["title"]); ?>" />
            &nbsp;&nbsp;<span style="color:#FF0000"><?php if($article_error and $article_error["title"] == 1): ?>标题不能为空<?php else: ?>*<?php endif; ?></span>
            </td>
            <td>&nbsp;</td>
		</tr>
        <tr>
            <td>首页轮播图：</td>
            <td>
            <?php if($article_info["home_show"] == 1): ?><input type="radio" name="home_show" value="1" checked="checked" />&nbsp;首页轮播图&nbsp;&nbsp;&nbsp;
            <input type="radio" name="home_show" value="0"  />&nbsp;非首页轮播图
            <?php else: ?>
            <input type="radio" name="home_show" value="1" />&nbsp;首页轮播图&nbsp;&nbsp;&nbsp;
            <input type="radio" name="home_show" value="0" checked="checked" />&nbsp;非首页轮播图<?php endif; ?>
            </td>
            <td>&nbsp;</td>
        </tr>
        
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
            <td>栏目轮播图：</td>
            <td>
            <?php if($article_info["is_focus"] == 1): ?><input type="radio" name="is_focus" value="1" checked="checked" />&nbsp;栏目轮播图
            <input type="radio" name="is_focus" value="0" />&nbsp;非栏目轮播图&nbsp;&nbsp;&nbsp;
            <?php else: ?>
            <input type="radio" name="is_focus" value="1" />&nbsp;栏目轮播图
            &nbsp;&nbsp;&nbsp;
            
            <input type="radio" name="is_focus" value="0" checked="checked" />&nbsp;非栏目轮播图<?php endif; ?>
            </td>
            <td>&nbsp;</td>
        </tr>
      <!--   <tr>
            <td>视频地址(URL)：</td>
            <td><input type="text" name="video" size="100"  style="width:300px;" value="<?php echo ($article_info["video"]); ?>" />
            
            </td>
            <td>&nbsp;</td>
            
        </tr> -->

        <?php if($article_info["is_focus"] == 1 and $article_info["focus_img"] != ''): ?><tr><td colspan="3">&nbsp;</td></tr>
        <tr>
            <td>焦点图片：</td>
            <td><img src="__PUBLIC__/images/focus/<?php echo ($article_info["focus_img"]); ?>" width="300" />
            
            <td>&nbsp;</td>
        </tr><?php endif; ?>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
            <td>焦点图片：</td>
            <td><input type="file" name="focus_img" size="30" /><span style="color:#FF0000"><?php if($article_error and $article_error["focus_img"] == 1): ?>图片不能为空<?php else: ?>*<?php endif; ?></span></td>
            <td>&nbsp;</td>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
            <td>排序：</td>
            <td><input type="text" name="sort_order" size="10" maxlength="10" value="<?php echo ($article_info["sort_order"]); ?>" /></td>
            <td>&nbsp;</td>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>

        
        	
  
        
        </table>
        <!-- 加载编辑器的容器 -->
            <script id="container" name="content" type="text/plain" style="width:100%;height:300px;"><?php echo ($article_info["content"]); ?></script>
        </div>
        <div class="form_content_item" id="detail" style="display:none">
        <table border="0" cellpadding="0" cellspacing="0">
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
        	<td width="100">作者：</td>
            <td><input type="text" name="author" size="30" maxlength="50" style="width:200px;" value="<?php echo ($article_info["author"]); ?>" /></td>
            <td>&nbsp;</td>
		</tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
        	<td>来源：</td>
            <td><input type="text" name="afrom" size="30" maxlength="50" style="width:200px;" value="<?php echo ($article_info["afrom"]); ?>" /></td>
            <td>&nbsp;</td>
		</tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
        	<td>发布时间：</td>
            <td><input type="text" name="atime" size="30" maxlength="50" style="width:200px;" value="<?php echo ($article_info["atime"]); ?>" /></td><td>时间格式为0000-00-00 00:00:00 留空默认为当前时间</td>
            <td>&nbsp;</td>
        </tr> 
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
        	<td>关键词：</td>
            <td><input type="text" name="keyword" size="50" maxlength="100" style="width:300px;" value="<?php echo ($article_info["keyword"]); ?>" /></td>
            <td>&nbsp;</td>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
        	<td>简介：</td>
            <td><textarea name="summary" rows="5" cols="40" style="width:300px; height:60px;"><?php echo ($article_info["summary"]); ?></textarea></td>
            <td>&nbsp;</td>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
        	<td>立即发布：</td>
            <td>
            <?php if($article_info and $article_info["is_pub"] == 0): ?><input type="radio" name="is_pub" value="1" />&nbsp;立即发布&nbsp;&nbsp;&nbsp;
            <input type="radio" name="is_pub" value="0" checked="checked" />&nbsp;暂不发布
            <?php else: ?>
            <input type="radio" name="is_pub" value="1" checked="checked" />&nbsp;立即发布&nbsp;&nbsp;&nbsp;
            <input type="radio" name="is_pub" value="0" />&nbsp;暂不发布<?php endif; ?>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
      
        <tr><td colspan="3">&nbsp;</td></tr>
        
        </table>
        </div>
	</div>
    <div class="form_submit"><input type="submit" value="保 存" /></div>
    </form>

	<script type="text/javascript">
		document.getElementById("form_content_div").style.height = (parseInt(document.documentElement.clientHeight) - 160) + "px";
		function show_content(obj, id)
		{
			$(".form_tab li a").each(function(index,element){ $(element).attr("class",""); });
			$(obj).attr("class","select");
			$(".form_content div.form_content_item").each(function(index,element){ $(element).hide(); });
			$("#" + id).show();
		}
	</script>
    <script type="text/javascript">
    $(function(){
        window.um = UM.getEditor('container', {
            /* 传入配置参数,可配参数列表看umeditor.config.js */
            
        });
    });
</script>

</div>
</div>
</body>
</html>