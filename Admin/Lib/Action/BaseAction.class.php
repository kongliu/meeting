<?php

// 首页模块
class BaseAction extends Action {
	public function __construct() {
		parent::__construct();
		import('@.Common.M_cache');
       	// var_dump( session('admin_id') );exit;
       
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
        if($key){
            $memcache = new m_cache();
            $cache = $memcache->connect();
            $cache -> delete($key);
            $cache->close();
        }
    }


}
