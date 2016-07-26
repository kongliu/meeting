<?php

// 首页模块
class MyBaseAction extends Action {
	public function __construct() {
		parent::__construct();
		import('@.Common.M_cache');
       	// var_dump( session('admin_id') );exit;
       
       	$token = @cookie('xfb_token');

       	// var_dump($token);exit;
        // $key = $this->getCacheKey($token);
        // var_dump($key);exit;
		if(!$this->getCacheKey($token)){
			$this->redirect('login/index','',0,'请登录');
		}
	}


 	protected function getCacheKey($key=''){
        $memcache = new m_cache();
        $cache = $memcache->connect();
        $item = @$cache->get($key);
        $cache->close();
        return $item;
    }

    protected function setCache($key = '', $value='', $expire = 0){
        if($key && $value){
        	$memcache = new m_cache();
            $cache = $memcache->connect();
            $item = @$cache->set($key, $value, $expire);
            $cache->close();
        }
    }  
     protected function delCache($key = ''){
        if($key && $value){
            $memcache = new m_cache();
            $cache = $memcache->delete($key);
            $cache->close();
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
