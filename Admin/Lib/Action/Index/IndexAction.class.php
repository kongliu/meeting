<?php

// 首页模块
class IndexAction extends Action {

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
		// 验证码
		$verify = $this->_session('verify');
		$verify_input = $this->_post('verify');
		if($verify != md5($verify_input))
		{
			$this->assign('error', 2);
			$this->display('index');
			exit;
		}
		
		// 账户和密码
		$account = $this->_post('account');
		$password = $this->_post('password');
		
		// 检查
		$ts_admin = M('sys_account');
		$where = "username = '" . $account . "' and password = md5('" . $password . "')";
		$admin_info = $ts_admin->where($where)->find();
		if(!empty($admin_info) && intval($admin_info['id']) > 0)
		{
			$_SESSION['admin_id'] = intval($admin_info['id']);
			$this->redirect('/Index/Index/home');
			exit;
		}
		else
		{
			$this->assign('error', 1);
			$this->display('index');
			exit;
		}
	}

	// 首页
	public function home()
	{
		$this->display();
	}
	
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

	// 退出
	public function logout()
	{
		if(isset($_SESSION['admin_id']))
		{
			unset($_SESSION['admin_id']);
		}
		$this->redirect('Index/Index/index');
	}

}