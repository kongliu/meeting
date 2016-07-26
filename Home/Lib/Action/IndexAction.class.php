<?php

// 首页模块
class IndexAction extends Action {

	// 网站首页
	public function index()
	{
		// 导航
		$navigation = get_navigation();
		$this->assign('nav_menu', $navigation['head_navigation']);
		$this->assign('bottom_menu', $navigation['bottom_navigation']);
		$this->assign('current_head_navigation', 0);
		// print_r($navigation['head_navigation']);exit;
		// 轮播图
		$myweb_cms_article = M('cms_article');
		$focus_article = $myweb_cms_article->field('aid,cid,title,focus_img,sort_order_home ')->where('is_pub=1 and home_show=1')->order('sort_order_home desc, aid desc')->limit(0,5)->select();
		// var_dump($focus_article );exit;
		

		// 轮播图所属column
		$myweb_cms_column = M('cms_column');
		foreach ($focus_article as $key => $value) {
			$col_info = $myweb_cms_column->where('cid = ' . $value['cid'] . ' and is_close = 0')->find();
			if($col_info){$focus_article[$key]['cname_en'] = $col_info['cname_en']; 
			// echo $col_info['cname_en'];
			}
			
		}
		// var_dump($focus_article );exit;
		$this->assign('focus_article', $focus_article);
		// 友情链接
		$ts_friend_links = M('friend_links');
		$links_list = $ts_friend_links->order('sort_order asc, lid asc')->limit(0,4)->select();
		$this->assign('links_list', $links_list);

		// 联系方式
		$ts_website_info = M('website_info');
		$info_list = $ts_website_info->order('sort_order asc')->limit(0,3)->select();
		$this->assign('info_list', $info_list);
		$this->display();
	}

}