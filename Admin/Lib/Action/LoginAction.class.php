<?php

// 首页模块
class LoginAction extends BaseAction  {
	public function __construct() {
		parent::__construct();
       

	}

	// 验证码
	public function verify()
	{
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}

	// 后台登录页面
	public function index()
	{
		$this->display();
	}

	// 后台登录
	public function login()
	{	

       	$token = @cookie('xfb_token');

		if(!$this->getCacheKey($token)){
			$this->redirect('login/index','',0,'请登录');
		}else{
			$this->redirect('index/index','',0,'');
		}
		// 验证码
		/*$verify = $this->_session('verify');
		$verify_input = $this->_post('verify');
		if($verify != md5($verify_input))
		{
			$this->assign('error', 2);
			$this->display('index');
			exit;
		}*/
		
		// 账户和密码
		$account = $this->_post('account');
		$password = $this->_post('password');
		
		// 检查
		$myweb_admin = M('sys_account');
		$where = "username = '" . $account . "' and password = md5('" . $password . "')";
		$admin_info = $myweb_admin->where($where)->find();
		if(!empty($admin_info) && intval($admin_info['id']) > 0)
		{
			// $_SESSION['admin_id'] = md5(intval($admin_info['id']) );
			$token = $admin_info['id'] . sha1($account . rand(100000, 999999));
			cookie("xfb_token",$token,3600*12);  
			$this->setCache($token,md5(intval($admin_info['id'])),7200);  
			$this->redirect('/Index/index/');
			exit;
		}
		else
		{
			$this->assign('error', 1);
			$this->display();
			exit;
		}
	}

	// 退出
	public function logout()
	{
		$token = cookie('xfb_token');

		if($this->getCacheKey($token))
		{
			// unset($_SESSION['admin_id']);
			$this->delCache($token);
		}
		$this->redirect('login/index');
	}


	
	
}