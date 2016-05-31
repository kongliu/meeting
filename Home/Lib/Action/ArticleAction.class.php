<?php

// 文章模块
class ArticleAction extends Action {

	// 单一文章栏目详细页面, 参数传入 栏目ID
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

		// 面包屑
		$bread_crumbs = get_bread_crumbs($cid);
		$this->assign('bread_crumbs', $bread_crumbs);

		// 文章模型类
		$myweb_cms_article = M('cms_article');

		// 导航栏目列表, 显示子栏目
		if($col_info['parent_id'] == 0)
		{
			$nav_col_info = $col_info;
			$nav_col_list = $myweb_cms_column->where('parent_id = ' . $cid . ' and is_close = 0')->order('sort_order asc, cid asc')->select();
			if(!empty($nav_col_list) && count($nav_col_list) > 0)
			{
				$nav_current_col_id = intval($nav_col_list[0]['cid']); // 默认选中第一个子栏目
			}
			else
			{
				$nav_current_col_id = $cid;
			}
			$column_collection = '('.$cid;
			foreach($nav_col_list as $k => $v){
			 $column_collection .= ','. $v['cid'];

			}
			$column_collection .= ')';
			// var_dump($column_collection);exit;

		}
		// 导航栏目列表, 显示兄弟栏目
		else
		{
			$nav_col_info = $myweb_cms_column->where('cid = ' . $col_info['parent_id'] . ' and is_close = 0')->find();
			$nav_col_list = $myweb_cms_column->where('parent_id = ' . $col_info['parent_id'] . ' and is_close = 0')->order('sort_order asc, cid asc')->select();
			$nav_current_col_id = $cid;
			$column_collection = '('.$cid.')';
		}
		
		$this->assign('nav_col_list_len', count($nav_col_list)-1);
		$this->assign('nav_col_list', $nav_col_list);
		$this->assign('nav_col_info', $nav_col_info);
		$this->assign('nav_current_col_id', $nav_current_col_id);
		
		// 查询栏目的文章条目数
		$article_list_len = $myweb_cms_article->where('cid = ' . $nav_current_col_id . ' and is_pub = 1')->count();
		$this->assign('article_list_len', $article_list_len);

	/*	// 单篇文章
		if($article_list_len <= 1)
		{
			$article_info = $myweb_cms_article->field('aid,cid,title,content,atime')->where('cid='.$nav_current_col_id.' and is_pub=1')->find();
			$this->assign('article_info', $article_info);
		}
		// 多篇文章
		else
		{*/
			// 分页页码计算
			$page_size = 20;
			$page_current = isset($_GET['p']) ? intval($_GET['p']) : 1;
			$page_code = get_page_code($article_list_len, $page_size, $page_current);
			$this->assign('page_code', $page_code);
			
			// 查询文章
			$from = ($page_current - 1) * $page_size;
			$article_list = $myweb_cms_article->field('aid,cid,title,add_time')->where('cid in'.$column_collection.' and is_pub=1')->limit($from, $page_size)->select();
			foreach($article_list as $key=>$value)
		{
			// $news_list[$key]['atime'] = date('Y-m-d',strtotime($value['atime']));
			$article_list[$key]['add_time'] = substr($value['add_time'],0,10);
		}
			$this->assign('article_list', $article_list);
		/*	var_dump($nav_current_col_id);exit;
			var_dump($article_list);exit;*/
		
	
		// 页面
		$this->display();
	}

	// 文章详细页, 参数传入 文章ID
	public function article()
	{
		// 导航
		$navigation = get_navigation();
				// var_dump($navigation);exit;

		$this->assign('nav_menu', $navigation['head_navigation']);
		$this->assign('bottom_menu', $navigation['bottom_navigation']);

		// 文章ID
		$myweb_cms_article = M('cms_article');
		$id = isset($_GET['id']) ? intval($_GET['id']) : 1;
		$article_info = $myweb_cms_article->field('aid,cid,title,content,atime')->where('aid='.$id.' and is_pub=1')->find();
		$this->assign('article_info', $article_info);
		$this->assign('article_list_len', 1);

		// 文章栏目
		$cid = $article_info['cid'];
		if($cid == 10) { $cid = 1; }
		$myweb_cms_column = M('cms_column');
		$col_info = $myweb_cms_column->where('cid = ' . $cid . ' and is_close = 0')->find();
		$this->assign('col_info', $col_info);
		$this->assign('current_head_navigation', $cid);

		// 右侧导航栏目列表
		if($col_info['parent_id'] == 0)
		{
			$nav_col_info = $col_info;
			$nav_col_list = $myweb_cms_column->where('parent_id = ' . $cid . ' and is_close = 0')->order('sort_order asc, cid asc')->select();
			$nav_current_col_id = intval($nav_col_list[0]['cid']); // 默认选中第一个子栏目
		}
		// 右侧导航栏目列表, 显示兄弟栏目
		else
		{
			$nav_col_info = $myweb_cms_column->where('cid = ' . $col_info['parent_id'] . ' and is_close = 0')->find();
			$nav_col_list = $myweb_cms_column->where('parent_id = ' . $col_info['parent_id'] . ' and is_close = 0')->order('sort_order asc, cid asc')->select();
			$nav_current_col_id = $cid;
		}
		$this->assign('nav_col_list_len', count($nav_col_list)-1);
		$this->assign('nav_col_list', $nav_col_list);
		$this->assign('nav_col_info', $nav_col_info);
		$this->assign('nav_current_col_id', $nav_current_col_id);

		// 面包屑
		$bread_crumbs = get_bread_crumbs($cid);
		$this->assign('bread_crumbs', $bread_crumbs);

		// 页面
		$this->display();
	}

}