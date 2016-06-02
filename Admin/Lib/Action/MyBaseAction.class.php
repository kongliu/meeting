<?php

// 首页模块
class MyBaseAction extends Action {
	public function __construct() {
		parent::__construct();
       	// var_dump( session('admin_id') );exit;
		if(!session('?admin_id')){
			$this->redirect('login/index','',0,'请登录');
		}
	}

	public function __destruct() {
		parent::__destruct();
		// var_dump( is_dir(dirname(dirname(dirname(__DIR__))).'/Home/Html') );exit;
		//执行结束后自动删除缓存
		if(is_dir(dirname(dirname(dirname(__DIR__))).'/Home/Html')){
		if ($handle = opendir(dirname(dirname(dirname(__DIR__))).'/Home/Html')) {
	    while (false !== ($file = readdir($handle))) {
	        if ($file != "." && $file != "..") {
	            unlink(dirname(dirname(dirname(__DIR__))).'/Home/Html/'.$file) ;
	        }
	    }
	    closedir($handle);
		}
		}
	
	}

}
