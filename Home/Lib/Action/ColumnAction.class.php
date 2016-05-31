<?php

// 栏目模块
class ColumnAction extends Action {

	// 栏目列表页
	public function column()
	{
		// 导航
		$navigation = get_navigation();
		$this->assign('nav_menu', $navigation['head_navigation']);
		$this->assign('bottom_menu', $navigation['bottom_navigation']);

		// 当前栏目
		$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 1;
		$myweb_cms_column = M('cms_column');
		$col_info = $myweb_cms_column->where('cid = ' . $cid . ' and is_close = 0')->find();
		$this->assign('col_info', $col_info);
		$this->assign('current_head_navigation', $cid);
		
		// 右侧导航栏目列表
		if($col_info['parent_id'] > 0)
		{
			// 兄弟栏目
			$nav_col_list = $myweb_cms_column->where('parent_id = ' . $col_info['parent_id'] . ' and is_close = 0')->order('sort_order asc, cid asc')->select();
			
			// 父栏目信息
			$nav_col_info = $myweb_cms_column->where('cid = ' . $col_info['parent_id'] . ' and is_close = 0')->find();
		}
		else
		{
			// 子栏目
			$nav_col_list = $myweb_cms_column->where('parent_id = ' . $cid . ' and is_close = 0')->order('sort_order asc, cid asc')->select();
			
			// 本栏目信息
			$nav_col_info = $col_info;
		}
		$this->assign('nav_col_list_len', count($nav_col_list)-1);
		$this->assign('nav_col_list', $nav_col_list);
		$this->assign('nav_col_info', $nav_col_info);

		// 面包屑
		$bread_crumbs = get_bread_crumbs($cid);
		$this->assign('bread_crumbs', $bread_crumbs);

		// 总的文章数量
		$myweb_cms_article = M('cms_article');
		$record_total = $myweb_cms_article->where('cid = ' . $cid . ' and is_pub = 1')->count();
		
		// 分页页码计算
		$page_size = 20;
		$page_current = isset($_GET['p']) ? intval($_GET['p']) : 1;
		$page_code = get_page_code($record_total, $page_size, $page_current);
		$this->assign('page_code', $page_code);

		// 文章列表
		$from = ($page_current - 1) * $page_size;
		$article_list = $myweb_cms_article->where('cid = ' . $cid . ' and is_pub = 1')->order('sort_order asc, aid desc')->limit($from, $page_size)->select();
		$this->assign('article_list', $article_list);
		$this->display();
	}

}