<?php

// tpcms 公共函数库

/**
 *
 * @desc	导航信息
 * @access	public
 * 
 * @return	array
 *
**/
function get_navigation()
{
	// 头部导航
	$ts_cms_column = M('cms_column');
	$col_list = $ts_cms_column->field('cid,cname,cname_en')->where('parent_id = 0 and is_nav = 1 and is_close = 0')->order('sort_order asc, cid asc')->select();
	foreach($col_list as $key=>$col_info)
	{
		// 二级导航
		$cid = $col_info['cid'];
		$col_sub_list = $ts_cms_column->field('cid,cname,cname_en')->where('parent_id = '.$cid.' and is_close = 0')->order('sort_order asc, cid asc')->select();
		if(!empty($col_sub_list) && count($col_sub_list) > 0)
		{
			$col_list[$key]['col_sub_list'] = $col_sub_list;
		}
	}
	$navigation['head_navigation'] = $col_list;

	// 底部导航
	$bottom_navigation = 11;
	$col_list = $ts_cms_column->field('cid,cname,cname_en')->where('parent_id = '.$bottom_navigation.' and is_close = 0')->order('sort_order asc, cid asc')->select();
	$navigation['bottom_navigation'] = $col_list;

	// 返回
	return $navigation;
}

/**
 *
 * @desc	面包屑信息
 * @access	public
 * @param	$cid	int
 *
 * @return array
 *
**/
function get_bread_crumbs($cid)
{
	// 面包屑数组
	$bread_crumbs = array();
	
	// 查询本分类信息
	$ts_cms_column = M('cms_column');
	$col_info = $ts_cms_column->where('cid = ' . $cid . ' and is_close = 0')->find();
	
	// 查询父分类信息
	if($col_info['parent_id'] > 0)
	{
		$parent_col_info = $ts_cms_column->where('cid = ' . $col_info['parent_id'] . ' and is_close = 0')->find();
		$bread_crumbs[] = $parent_col_info;
	}
	
	// 顺序添加面包屑
	$bread_crumbs[] = $col_info;
	
	// 返回面包屑数组
	return $bread_crumbs;
}

/**
 *
 * @desc 	截取字符串
 * @access	public
 * @param	$sourcestr	string 
 * @param	$cutlength	int
 * 
 * @return	string
 *
**/
function get_substr($sourcestr,$cutlength)
{
	$returnstr = '';
	$i = 0;
	$n = 0;
	$str_length = strlen($sourcestr);
	while(($n<$cutlength) and ($i<=$str_length))
	{
		$temp_str = substr($sourcestr,$i,1);
		$ascnum = Ord($temp_str);
		if($ascnum>=224)
		{
			$returnstr = $returnstr.substr($sourcestr,$i,3);
			$i = $i + 3;
			$n++;
		}
		elseif($ascnum>=192)
		{
			$returnstr = $returnstr.substr($sourcestr,$i,2);
			$i = $i + 2;
			$n++;
		}
		elseif($ascnum>=65 && $ascnum<=90)
		{
			$returnstr = $returnstr.substr($sourcestr,$i,1);
			$i = $i + 1;
			$n++;
		}
		else
		{
			$returnstr = $returnstr.substr($sourcestr,$i,1);
			$i = $i + 1;
			$n = $n + 0.5;
		}
	}
	return $returnstr;
}

/**
 *
 * @desc	计算分页页码
 * @access	public
 * @param	$record_total	int 
 * @param	$page_size		int
 * 
 * @return array
 *
**/
function get_page_code($record_total, $page_size, $page_current)
{
	// 页码数组
	$page_code = array();
	$page_num =	array();
	
	// 无数据判断
	if($record_total == 0)
	{
		return NULL;
	}

	// 存放总记录数和当前页
	$page_code['record_total'] = $record_total;
	$page_code['page_current'] = $page_current;
	
	// 计算分页大小
	$page_total = ceil($record_total / $page_size);
	$page_code['page_total'] = $page_total;
	
	// 前后页码
	$page_prev	= $page_current - 1;
	if($page_prev <= 0) { $page_prev = 1; }
	$page_next = $page_current + 1;
	if($page_next > $page_total) { $page_next = $page_total; }
	$page_code['page_prev'] = $page_prev;
	$page_code['page_next'] = $page_next;
	
	// 计算数字页码
	if($page_total <= PAGE_CODE_LEN)
	{
		for($i=1; $i<=$page_total; $i++) { $page_num[$i] = $i; }
	}
	else
	{
		$page_num_left = floor(PAGE_CODE_LEN / 2);
		$page_num_right = $page_total - PAGE_CODE_LEN;
		
		if($page_current <= $page_num_left)
		{
			for($i=1; $i<=PAGE_CODE_LEN; $i++) { $page_num[$i] = $i; }
		}
		elseif($page_current > $page_num_right)
		{
			for($i=($page_num_right+1); $i<=$page_total; $i++) { $page_num[$i] = $i; }
		}
		else
		{
			for($i=($page_current-page_num_left); $i<=($page_current+page_num_left); $i++) { $page_num[$i] = $i; }
		}
	}
	$page_code['page_num'] = $page_num;

	// 返回页码数组
	return $page_code;
}

































