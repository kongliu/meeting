<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class base extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("CrmException");
        $this->load->model('m_cache');
    }

    protected function getCacheKey($key=''){
        $cache = $this->m_cache->connect();
        $item = @$cache->get($key);
        $cache->close();
        return $item;
    }

    protected function setCache($key = '', $value='', $expire = 0){
        if($key && $value){
            $cache = $this->m_cache->connect();
            $item = @$cache->set($key, $value, $expire);
            $cache->close();
        }
    }

    protected function jsonError($message, $code) {
        $err = array('success'=>false,'error_response' => array("code" => $code, "msg" => $message));
        return json_encode($err);
    }

    protected function returnSuccess($data = array()) {
        echo json_encode(array('success' => true, 'data' => $data), 200);
    }

}