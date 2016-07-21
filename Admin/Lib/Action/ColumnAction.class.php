<?php

// 栏目模块
class ColumnAction extends MyBaseAction {
	public function __construct() {
		parent::__construct();
       
		
	}
	// 栏目列表
	public function col_list()
	{
		// 栏目表
		$web_cms_column = M('cms_column');
		$column_list = $web_cms_column->order('sort_order asc, cid asc')->select();
		$this->assign('column_list', $column_list);
		$this->display();
	}

	// 栏目添加页
	public function col_add()
	{	$web_cms_column=M('cms_column');
		$col_all_info = $web_cms_column->where("parent_id=0")->select();
		
		$this->assign('col_all_info',$col_all_info);
		$this->display('col_info');
	}

	// 栏目添加
	public function col_insert()
	{
		// 获取栏目信息
		$col_info['cname'] = $this->_post('cname');
		$col_info['cname_en'] = $this->_post('cname_en');
		// $col_info['is_alone_page'] = intval($_POST['is_alone_page']);
		// $col_info['is_nav'] = intval($_POST['is_nav']);
		$col_info['sort_order'] = intval($_POST['sort_order']);
		// $col_info['page_title'] = $this->_post('page_title');
		// $col_info['page_key'] = $this->_post('page_key');
		// $col_info['page_desc'] = $this->_post('page_desc');
		$col_info['is_close'] = intval($_POST['is_close']);
		$col_info['parent_id'] = intval($_POST['parent_id']);

		// 信息检查
		$col_error = array();
		if(empty($col_info['cname']))
		{
			$col_error['cname'] = 1;
		}
		
		// 栏目表
		$web_cms_column = M('cms_column');
		
		// 栏目名称不能重复
		$col_cname_info = $web_cms_column->where("cname = '" . $col_info['cname'] . "'")->find();
		if(!empty($col_cname_info) && intval($col_cname_info['cid']) > 0)
		{
			$col_error['cname'] = 2;
		}
		// 栏目英文名称不能重复
		$col_cname_info = $web_cms_column->where(" cname_en = '" . $col_info['cname_en'] . "'")->find();
		if(!empty($col_cname_info) && intval($col_cname_info['cid']) > 0)
		{
			$col_error['cname_en'] = 2;
		}

		// 错误返回
		if(!empty($col_error))
		{
			$this->assign('col_info', $col_info);
			$this->assign('col_error', $col_error);
			$this->display('col_info');
			exit;
		}

		// 当前时间
		$col_info['add_time'] = date('Y-m-d H:i:s');

		// 排列序号纠正
		if( empty($col_info['sort_order']) )
		{
			$col_sort_order = $web_cms_column->field('sort_order')->order('sort_order desc')->limit(0,1)->find();
			if(!empty($col_sort_order) && intval($col_sort_order['sort_order']) > 0)
			{
				$col_info['sort_order'] = intval($col_sort_order['sort_order']) + 1;
			}
			else
			{
				$col_info['sort_order'] = 1;
			}
		}

		// 添加栏目
		$cid = $web_cms_column->add($col_info);

		// 添加是否成功
		if($cid > 0)
		{
			$this->assign('success', 1);
			$url = __APP__ . '/Column/col_list';
			$this->assign('url', $url);
			$this->assign('waitSecond', 2);
			$this->display('/Public/message');
			exit;
		}
		else
		{
			$this->assign('success', 0);
			$url = __APP__ . '/Column/col_add';
			$this->assign('url', $url);
			$this->assign('waitSecond', 2);
			$this->assign('error_reson', '');
			$this->display("/Public/message");
			exit;
		}
	}

	// 栏目修改页
	public function col_edit()
	{
		// 栏目ID
		$cid = intval($_GET['id']);
		
		// 查询栏目
		$web_cms_column = M('cms_column');
		$col_all_info = $web_cms_column->where("parent_id=0")->select();
		$column_info = $web_cms_column->where('cid = ' . $cid)->find();
		
		
		/* dump($col_parent_info['cid']);
		exit(); */
		$this->assign('cid',$cid);
		$this->assign('col_info', $column_info);
		$this->assign('col_all_info',$col_all_info);
		$this->display('col_info');
	}

	// 栏目修改
	public function col_update()
	{
		// 获取栏目信息
		$cid = intval($_POST['cid']);
		$col_info['cname'] = $this->_post('cname');
		// $col_info['is_alone_page'] = intval($_POST['is_alone_page']);
		// $col_info['is_nav'] = intval($_POST['is_nav']);
		$col_info['sort_order'] = intval($_POST['sort_order']);
		// $col_info['page_title'] = $this->_post('page_title');
		// $col_info['page_key'] = $this->_post('page_key');
		// $col_info['page_desc'] = $this->_post('page_desc');
		$col_info['is_close'] = intval($_POST['is_close']);
		$col_info['parent_id'] = intval($_POST['parent_id']);
		$col_info['cname_en'] =$this->_post('cname_en');
		
		// 信息检查
		$col_error = array();
		if(empty($col_info['cname']))
		{
			$col_error['cname'] = 1;
		}
		
		// 栏目表
		$web_cms_column = M('cms_column');
		
		// 栏目名称不能重复
		$col_cname_info = $web_cms_column->where("cid <> " . $cid . " and cname = '" . $col_info['cname'] . "'")->find();
		if(!empty($col_cname_info) && intval($col_cname_info['cid']) > 0)
		{
			$col_error['cname'] = 2;
		}
		// 栏目英文名称不能重复
		$col_cname_info = $web_cms_column->where("cid <> " . $cid . " and cname_en = '" . $col_info['cname_en'] . "'")->find();
		if(!empty($col_cname_info) && intval($col_cname_info['cid']) > 0)
		{
			$col_error['cname_en'] = 2;
		}

		// 错误返回
		if(!empty($col_error))
		{
			$col_info['cid'] = $cid;
			$this->assign('col_info', $col_info);
			$this->assign('col_error', $col_error);
			$this->display('col_info');
			exit;
		}

		// 排列序号纠正
		if($col_info['sort_order'] == 0)
		{
			$col_sort_order = $web_cms_column->field('sort_order')->order('sort_order desc')->limit(0,1)->find();
			if(!empty($col_sort_order) && intval($col_sort_order['sort_order']) > 0)
			{
				$col_info['sort_order'] = intval($col_sort_order['sort_order']) + 1;
			}
			else
			{
				$col_info['sort_order'] = 1;
			}
		}
		
		// 修改栏目
		$flag = $web_cms_column->where('cid = ' . $cid)->save($col_info);

		// 修改是否成功
		if($flag > 0)
		{
			$this->assign('success', 1);
			$url = __APP__ . '/Column/col_list';
			$this->assign('url', $url);
			$this->assign('waitSecond', 2);
			$this->display('/Public/message');
			exit;
		}
		else
		{
			$this->assign('success', 0);
			$url = __APP__ . '/Column/col_edit/id/' . $cid;
			$this->assign('url', $url);
			$this->assign('waitSecond', 2);
			$this->assign('error_reson', '');
			$this->display("/Public/message");
			exit;
		}
	}

	// 栏目删除
	public function col_delete()
	{
		// 栏目ID
		$cid = intval($_GET['id']);
		
		// 栏目下存在文章,不能直接删除
		$web_cms_article = M('cms_article');
		$flag = $web_cms_article->where('cid = ' . $cid)->count('aid');
		if($flag > 0)
		{
			$this->assign('success', 0);
			$url = __APP__ . '/Column/col_list';
			$this->assign('url', $url);
			$this->assign('waitSecond', 2);
			// error_reson = 该栏目下存在文章，不能删除
			$this->assign('error_reson', '');
			$this->display("/Public/message");
			exit;
		}

		// 删除栏目
		$web_cms_column = M('cms_column');
		$flag = $web_cms_column->where('cid = ' . $cid)->delete();

		// 删除是否成功
		if($flag > 0)
		{
			$this->assign('success', 1);
			$url = __APP__ . '/Column/col_list';
			$this->assign('url', $url);
			$this->assign('waitSecond', 2);
			$this->display('/Public/message');
			exit;
		}
		else
		{
			$this->assign('success', 0);
			$url = __APP__ . '/Column/col_list';
			$this->assign('url', $url);
			$this->assign('waitSecond', 2);
			$this->assign('error_reson', '');
			$this->display("/Public/message");
			exit;
		}
	}

}