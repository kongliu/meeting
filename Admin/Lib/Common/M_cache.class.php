<?php

class Cache1{
    private $connect;
 
    function __construct($connect){
        $this->connect = $connect;
    }
    
    function get($key){
        return $this->connect->get($key);
    }
    
    function set($key, $value, $expire=0){
        $this->connect->set($key, $value, 0, $expire);
    }

    function delete($key){
        $this->connect->delete($key);
    }
    
    function close(){
        $this->connect->quit();
    }
}

class Cache2{
    private $connect;
 
    function __construct($connect){
        $this->connect = $connect;
    }
    
    function get($key){
        return $this->connect->get($key);
    }
    
    function set($key, $value, $expire=0){
        $this->connect->set($key, $value, 0, $expire);
    }

    function delete($key){
        $this->connect->delete($key);
    }
    
    function close(){
        $this->connect->close();
    }
}

class m_cache{
    public function connect(){
        // var_dump(C('APP_STATUS'));exit;
        if(C('APP_STATUS')== 'debug'){
            $memcache = new Memcache;
            $memcache->connect('127.0.0.1', 11211);
            return new Cache2($memcache);
        }else{
            $connect = new Memcached;  //声明一个新的memcached链接
            $connect->setOption(Memcached::OPT_COMPRESSION, false); //关闭压缩功能
            $connect->setOption(Memcached::OPT_BINARY_PROTOCOL, true); //使用binary二进制协议
            $connect->addServer('45e60eecd0ba4e7e.m.cnbjalicm12pub001.ocs.aliyuncs.com', 11211);
            $connect->setSaslAuthData('45e60eecd0ba4e7e', 'WGluZ2ZhYnUyMDE1'); #设置OCS帐号密码进行鉴权，如已开启免密码功能，则无需此步骤
            return new Cache1($connect);
        }
    }
    
}