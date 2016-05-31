<?php

// 用户基本模块
class UserAction extends Action {

	// 验证码
	public function verify()
	{
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}

	// 用户注册页
	public function regedit()
	{
		$this->display();
	}

	// 用户注册
	public function act_regedit()
	{
		$verify = $this->_session('verify');
		$this->redirect('ucenter');
	}

	// 用户登录页
	public function login()
	{
		$this->display();
	}

	// 用户登录
	public function act_login()
	{
		$verify = $this->_session('verify');
		$this->redirect('ucenter');
	}

	// 用户退出
	public function logout()
	{
		$this->redirect('login');
	}

	// 用户中心页
	public function ucenter()
	{
		$this->display();
	}

	// 修改个人资料页面
	public function edit()
	{
		$this->display();
	}

	// 修改个人资料
	public function act_edit()
	{
		$this->redirect('ucenter');
	}

	// 修改密码页面
	public function edit_pass()
	{
		$this->display();
	}

	// 修改密码
	public function act_edit_pass()
	{
		$this->redirect('login');
	}
	
}