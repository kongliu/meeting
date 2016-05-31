<?php

// 用户基本模块
class UserAction extends Action {

	// 用户列表
	public function user_list()
	{
		$this->display();
	}
	
	// 用户锁定
	public function user_lock()
	{
		$this->redirect('user_list');
	}

}