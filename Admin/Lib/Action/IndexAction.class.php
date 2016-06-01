<?php

// 首页模块
class IndexAction extends MyBaseAction {
	public function __construct() {
		parent::__construct();
       	// var_dump( session('admin_id') );exit;
	/*	if(!session('?admin_id')){
			$this->redirect('login/index','',0,'请登录');
		}*/
	}


	// 后台登录页面
	public function index()
	{
		$this->display();
	}

	

	// 首页
	
	
	// 头部
	public function head()
	{
		$this->display();
	}

	// 左边导航
	public function menu()
	{
		$this->display();
	}

	// 右边默认
	public function content()
	{
		$this->display();	
	}

}