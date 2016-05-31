<?php

// 友情链接模块
class LinksAction extends Action {

	// 友情链接列表
	public function links_list()
	{		
		// 友情链接表
		$myweb_friend_links = M('friend_links');
		$friend_links_list = $myweb_friend_links->order('sort_order asc, lid asc')->select();
		$this->assign('friend_links_list', $friend_links_list);
		
		$this->display();
	}
	
	// 添加友情链接页面
	public function add_link()
	{	
		
		$this->display('links_info');
	}
	
	// 添加友情链接
	public function insert_link()
	{	
		// 获取友情链接信息
		$lin_info['link_name'] = $this->_post('link_name');
		
		$lin_info['sort_order'] = intval($_POST['sort_order']);
		$lin_info['link_add'] = $this->_post('link_add');
		$lin_info['add_time'] = $_POST['add_time'];

		// 信息检查
		$lin_error = array();
		if(empty($lin_info['link_name']))
		{
			$lin_error['lname'] = 1;
		}
		if(empty($lin_info['link_add']))
		{
			$lin_error['ladd'] = 1;
		}
		
		// 友情链接表
		$myweb_friend_links = M('friend_links');
		
		// 友情链接名称不能重复
		$friend_links_info = $myweb_friend_links->where("link_name = '" . $lin_info['link_name'] . "'")->find();
		if(!empty($friend_links_info) && intval($friend_links_info['lid']) > 0)
		{
			$lin_error['lname'] = 2;
		}
		// 友情链接地址不能重复
		$friend_links_info = $myweb_friend_links->where("link_add = '" . $lin_info['link_add'] . "'")->find();
		if(!empty($friend_links_info) && intval($friend_links_info['lid']) > 0)
		{
			$lin_error['ladd'] = 2;
		}

		// 错误返回
		if(!empty($lin_error))
		{
			$this->assign('lin_info', $lin_info);
			$this->assign('lin_error', $lin_error);
			$this->display('links_info');
			exit;
		}

		// 当前时间
		$lin_info['add_time'] = date('Y-m-d H:i:s');

		// 排列序号纠正
		if($lin_info['sort_order'] == 0)
		{
			$lin_sort_order = $myweb_friend_links->field('sort_order')->order('sort_order desc')->limit(0,1)->find();
			if(!empty($lin_sort_order) && intval($lin_sort_order['sort_order']) > 0)
			{
				$lin_info['sort_order'] = intval($lin_sort_order['sort_order']) + 1;
			}
			else
			{
				$lin_info['sort_order'] = 1;
			}
		}

		// 添加友情链接
		$lid = $myweb_friend_links->add($lin_info);

		// 添加是否成功
		if($lid > 0)
		{
			$this->assign('success', 1);
			$url = __APP__ . '/Links/links_list';
			$this->assign('url', $url);
			$this->display('/Public/message');
			exit;
		}
		else
		{
			$this->assign('success', 0);
			$url = __APP__ . '/Links/add_link';
			$this->assign('url', $url);
			$this->assign('error_reson', '');
			$this->display("/Public/message");
			exit;
		}
		
	}
	
	// 编辑友情链接页面
	public function edit_link()
	{
		// 友情链接表
		$lid=$_GET['lid'];
		$myweb_friend_links = M('friend_links');
		$links_info= $myweb_friend_links->where('lid ='.$lid)->find();
		$this->assign('links_info', $links_info);
		$this->assign('lid', $lid);
		
		$this->display('links_info');
	}
	
	// 修改友情链接
	public function update_link()
	{	
		$lid=$_POST['lid'];
		
		// 获取友情链接信息
		$lin_info['link_name'] = $this->_post('link_name');
		
		$lin_info['sort_order'] = intval($_POST['sort_order']);
		$lin_info['link_add'] = $this->_post('link_add');
		/* $lin_info['add_time'] = intval($_POST['add_time']); */

		// 信息检查
		$lin_error = array();
		if(empty($lin_info['link_name']))
		{
			$lin_error['lname'] = 1;
		}
		if(empty($lin_info['link_add']))
		{
			$lin_error['ladd'] = 1;
		}
		
		// 友情链接表
		$myweb_friend_links = M('friend_links');
		
		// 友情链接名称不能重复
		
		
		$friend_links_info = $myweb_friend_links->where("link_name = '" . $lin_info['link_name'] . "' and lid<>".$lid)->find();
		if(!empty($friend_links_info) && intval($friend_links_info['lid']) > 0)
		{
			$lin_error['lname'] = 2;
		}
		// 友情链接地址不能重复
		$friend_links_info = $myweb_friend_links->where("link_add = '" . $lin_info['link_add'] . "' and lid<>".$lid)->find();
		if(!empty($friend_links_info) && intval($friend_links_info['lid']) > 0)
		{
			$lin_error['ladd'] = 2;
		}

		// 错误返回
		if(!empty($lin_error))
		{
			$this->assign('links_info', $lin_info);
			$this->assign('lin_error', $lin_error);
			$this->display('links_info');
			exit;
		}

		// 当前时间
		$lin_info['add_time'] = date('Y-m-d H:i:s',time());

		// 排列序号纠正
		if($lin_info['sort_order'] == 0)
		{
			$lin_sort_order = $myweb_friend_links->field('sort_order')->order('sort_order desc')->limit(0,1)->find();
			if(!empty($lin_sort_order) && intval($lin_sort_order['sort_order']) > 0)
			{
				$lin_info['sort_order'] = intval($lin_sort_order['sort_order']) + 1;
			}
			else
			{
				$lin_info['sort_order'] = 1;
			}
		}

		// 
		$flag = $myweb_friend_links->where('lid = ' . $lid)->save($lin_info);

		// 添加是否成功
		if($flag > 0)
		{
			$this->assign('success', 1);
			$url = __APP__ . '/Links/links_list';
			$this->assign('url', $url);
			$this->display('/Public/message');
			exit;
		}
		else
		{
			$this->assign('success', 0);
			$url = __APP__ . '/Links/edit_link/lid/'.$lid;
			$this->assign('url', $url);
			$this->assign('error_reson', '');
			$this->display("/Public/message");
			exit;
		}
		
		
	}
	
	// 删除友情链接
	public function del_link()
	{
		// 友情链接ID
		$lid = intval($_GET['id']);
		
	

		// 删除栏目
		$myweb_friend_links = M('friend_links');
		$flag = $myweb_friend_links->where('lid = ' . $lid)->delete();

		// 删除是否成功
		if($flag > 0)
		{
			$this->assign('success', 1);
			$url = __APP__ . '/Links/links_list';
			$this->assign('url', $url);
			$this->display('/Public/message');
			exit;
		}
		else
		{
			$this->assign('success', 0);
			$url = __APP__ . '/Links/links_list';
			$this->assign('url', $url);
			$this->assign('error_reson', '');
			$this->display("/Public/message");
			exit;
		}
	}

}
