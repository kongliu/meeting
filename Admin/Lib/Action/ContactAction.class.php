<?php

// 联系方式模块
class ContactAction extends MyBaseAction {

	// 联系方式列表
	public function contact_list()
	{	
		$ts_website_info=M('website_info');
		$contact_list=$ts_website_info->select();
		$this->assign('contact_list',$contact_list);
		$this->display();
	}
	
	// 添加联系方式页面
	public function add_contact()
	{	
		
		$this->display('contact_info');
	}

	// 添加联系方式
	public function insert_contact()
	{
		// 获取友情链接信息
		$con_info['wname'] = $this->_post('wname');
		
		$con_info['sort_order'] = intval($_POST['sort_order']);
		$con_info['wvalue'] = $this->_post('wvalue');
		$con_info['add_time'] = intval($_POST['add_time']);

		// 信息检查
		$lin_error = array();
		if(empty($con_info['wname']))
		{
			$con_error['wname'] = 1;
		}
		if(empty($con_info['wvalue']))
		{
			$con_error['wvalue'] = 1;
		}
		
		// 站点信息表
		$ts_website_info = M('website_info');
		
		// 联系方式类型不能重复
		$contact_name_info = $ts_website_info->where("wname = '" . $con_info['wname'] . "'")->find();
		if(!empty($contact_name_info) && intval($contact_name_info['wid']) > 0)
		{
			$con_error['wname'] = 2;
		}
		// 详细信息不能重复
		$contact_value_info = $ts_website_info->where("wvalue = '" . $con_info['wvalue'] . "'")->find();
		if(!empty($contact_value_info) && intval($contact_value_info['wid']) > 0)
		{
			$con_error['wvalue'] = 2;
		}

		// 错误返回
		if(!empty($con_error))
		{
			$this->assign('con_info', $lin_info);
			$this->assign('con_error', $lin_error);
			$this->display('contact_info');
			exit;
		}

		// 当前时间
		$con_info['add_time'] = date('Y-m-d H:i:s');

		// 排列序号纠正
		if($con_info['sort_order'] == 0)
		{
			$con_sort_order = $ts_website_info->field('sort_order')->order('sort_order desc')->limit(0,1)->find();
			if(!empty($con_sort_order) && intval($con_sort_order['sort_order']) > 0)
			{
				$con_info['sort_order'] = intval($con_sort_order['sort_order']) + 1;
			}
			else
			{
				$con_info['sort_order'] = 1;
			}
		}

		// 添加联系方式
		$wid =$ts_website_info->add($con_info);

		// 添加是否成功
		if($wid > 0)
		{
			$this->assign('success', 1);
			$url = __APP__ . '/Contact/contact_list';
			$this->assign('url', $url);
			$this->display('/Public/message');
			exit;
		}
		else
		{
			$this->assign('success', 0);
			$url = __APP__ . '/Contact/add_contact';
			$this->assign('url', $url);
			$this->assign('error_reson', '');
			$this->display("/Public/message");
			exit;
		}
	}

	// 编辑联系方式页面
	public function edit_contact()
	{
		// 站点信息表
		$wid=$_GET['wid'];
		$ts_website_info=M('website_info');
		$contact_info= $ts_website_info->where('wid ='.$wid)->find();
		$this->assign('contact_info', $contact_info);
		$this->assign('wid', $wid);
		
		$this->display('contact_info');
	}

	// 编辑联系方式
	public function update_contact()
	{
		$wid=$_POST['wid'];
		
		// 获取联系信息
		$con_info['wname'] = $this->_post('wname');
		
		$con_info['sort_order'] = intval($_POST['sort_order']);
		$con_info['wvalue'] = $this->_post('wvalue');
		
		// 信息检查
		$con_error = array();
		if(empty($con_info['wname']))
		{
			$con_error['wname'] = 1;
		}
		if(empty($con_info['wvalue']))
		{
			$con_error['wvalue'] = 1;
		}
		
		// 站点信息表
		$ts_website_info= M('website_info');
		
		// 联系方式类型不能重复
		
		
		$contact_name_info = $ts_website_info->where("wname = '" . $con_info['wname'] . "' and wid<>".$wid."'")->find();
		if(!empty($contact_name_info) && intval($contact_name_info['wid']) > 0)
		{
			$con_error['wname'] = 2;
		}
		// 详细信息不能重复
		$contact_value_info = $ts_website_info->where("wvalue = '" . $con_info['wvalue'] . "' and wid<>".$wid."'")->find();
		if(!empty($contact_value_info) && intval($contact_value_info['wid']) > 0)
		{
			$con_error['wvalue'] = 2;
		}

		// 错误返回
		if(!empty($con_error))
		{
			$this->assign('con_info', $con_info);
			$this->assign('con_error', $con_error);
			$this->display('contact_info');
			exit;
		}

		// 当前时间
		$con_info['add_time'] = date('Y-m-d H:i:s');

		// 排列序号纠正
		if($con_info['sort_order'] == 0)
		{
			$con_sort_order = $ts_website_info->field('sort_order')->order('sort_order desc')->limit(0,1)->find();
			if(!empty($con_sort_order) && intval($con_sort_order['sort_order']) > 0)
			{
				$con_info['sort_order'] = intval($con_sort_order['sort_order']) + 1;
			}
			else
			{
				$con_info['sort_order'] = 1;
			}
		}

		// 添加联系方式
		$flag = $ts_website_info->where('wid = ' . $wid)->save($con_info);

		// 添加是否成功
		if($flag > 0)
		{
			$this->assign('success', 1);
			$url = __APP__ . '/Contact/contact_list';
			$this->assign('url', $url);
			$this->display('/Public/message');
			exit;
		}
		else
		{
			$this->assign('success', 0);
			$url = __APP__ . '/Contact/edit_contact/wid/'.$wid;
			$this->assign('url', $url);
			$this->assign('error_reson', '');
			$this->display("/Public/message");
			exit;
		}
	}

	// 删除联系方式
	public function del_contact()
	{
		// 友情链接ID
		$wid = intval($_GET['id']);
		
	

		// 删除栏目
		$ts_website_info = M('website_info');
		$flag = $ts_website_info->where('wid = ' . $wid)->delete();

		// 删除是否成功
		if($flag > 0)
		{
			$this->assign('success', 1);
			$url = __APP__ . '/Contact/contact_list';
			$this->assign('url', $url);
			$this->display('/Public/message');
			exit;
		}
		else
		{
			$this->assign('success', 0);
			$url = __APP__ . '/Contact/contact_list';
			$this->assign('url', $url);
			$this->assign('error_reson', '');
			$this->display("/Public/message");
			exit;
		}
	}
	}

