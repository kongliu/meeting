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
		$focus_article = $myweb_cms_article->field('aid,cid,title,focus_img')->where('is_pub=1 and is_focus=1 and home_show=1')->order('sort_order asc, aid desc')->limit(0,5)->select();
		$this->assign('focus_article', $focus_article);

		// 会长发言
		$from_president = 9;
		$president_article = $myweb_cms_article->field('aid,title,summary,summary_en')->where('is_pub=1 and cid='.$from_president)->find();
		$this->assign('president_article', $president_article);
		
		// 新闻公告
		$news_events = 10;
		$news_list = $myweb_cms_article->field('aid,title,add_time')->where(' is_pub=1 and home_show=1 and  is_focus=0')->order('aid desc')->limit(0,10)->select();
		// 格式化时间
		foreach($news_list as $key=>$value)
		{
			// $news_list[$key]['atime'] = date('Y-m-d',strtotime($value['atime']));
			$news_list[$key]['add_time'] = substr($value['add_time'],0,10);
		}
		$this->assign('news_list', $news_list);
		$this->assign('news_events', $news_events);

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