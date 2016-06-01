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
	//主页缓存文件名

	$pagename = 'index_static.html';
       if(file_exists(APP_PATH.'/Runtime/Cache/Index/'.$pagename)){
       		if (unlink(APP_PATH.'/Runtime/Cache/Index/'.$pagename) ){
       			$data = file_get_contents(__APP__);
       			$res  = file_put_contents(APP_PATH.'/Runtime/Cache/Index/'.$pagename, $data);
       		}
       }else{
       			$view = new View;
       			$content = $view->fetch('Index/index');
       			var_dump($content);exit;
       			$data = file_get_contents( urlencode ('127.0.0.1/'.__APP__));

       			var_dump($data);exit;
       			$res  = file_put_contents(APP_PATH.'/Runtime/Cache/Index/'.$pagename, $data);
       }
	
	}

}
