<?php

// 栏目模块
class NewsAction extends Action {

	// 栏目列表页
	public function index()
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
		$this->assign('cid', $cid);
		
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
/*
		// 面包屑
		$bread_crumbs = get_bread_crumbs($cid);
		$this->assign('bread_crumbs', $bread_crumbs);*/
		// 轮播图
		$myweb_cms_article = M('cms_article');
		$focus_article = $myweb_cms_article->field('aid,cid,title,focus_img,sort_order')->where('is_pub=1 and is_focus=1')->order('sort_order desc, aid desc')->limit(0,5)->select();
		$this->assign('focus_article', $focus_article);

		// 总的文章数量
		$myweb_cms_article = M('cms_article');
		$record_total = $myweb_cms_article->where('cid = ' . $cid . ' and is_pub = 1')->count();
		
		// 分页页码计算
		$page_size = 8;
		$page_current = isset($_GET['p']) ? intval($_GET['p']) : 1;
		$page_code = get_page_code($record_total, $page_size, $page_current);
		// var_dump($page_code);exit;
		$this->assign('page_code', $page_code);

		// 文章列表
		$from = ($page_current - 1) * $page_size;
		$article_list = $myweb_cms_article->where('cid = ' . $cid . ' and is_pub = 1')->order('sort_order asc, aid desc')->limit($from, $page_size)->select();
		// var_dump($article_list);exit;
		$this->assign('article_list', $article_list);
		$this->display();
	}


	// 新闻详情页
	public function detail()
	{
		// 导航
		$navigation = get_navigation();
		$this->assign('nav_menu', $navigation['head_navigation']);
		// $this->assign('bottom_menu', $navigation['bottom_navigation']);

		// 当前栏目
		$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 1;
		$myweb_cms_column = M('cms_column');
		$col_info = $myweb_cms_column->where('cid = ' . $cid . ' and is_close = 0')->find();
		$this->assign('col_info', $col_info);
		$this->assign('current_head_navigation', $cid);
		$this->assign('cid', $cid);
		
		// 右侧导航栏目列表
	/*	if($col_info['parent_id'] > 0)
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
		$this->assign('nav_col_info', $nav_col_info);*/

		// 面包屑
		$bread_crumbs = get_bread_crumbs($cid);
		$this->assign('bread_crumbs', $bread_crumbs);
		// 轮播图
		/*$myweb_cms_article = M('cms_article');
		$focus_article = $myweb_cms_article->field('aid,cid,title,focus_img')->where('is_pub=1 and is_focus=1')->order('sort_order asc, aid desc')->limit(0,5)->select();
		$this->assign('focus_article', $focus_article);
*/
		// 文章详情
		$myweb_cms_article = M('cms_article');
		$id = isset($_GET['aid']) ? intval($_GET['aid']) : 1;
		$article_info = $myweb_cms_article->where('aid='.$id.' and is_pub=1')->find();
		$this->assign('article_info', $article_info);
		// $this->assign('article_list_len', 1);

		
		$this->display();
	}

}