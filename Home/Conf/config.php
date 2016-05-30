<?php
return array(
	'DB_TYPE'		=> 'mysql',					// 数据库类型
	'DB_HOST'		=> 'localhost',				// 服务器地址
	'DB_NAME'		=> 'myweb',				// 数据库名
	// 'DB_USER'		=> 'tpcms2013_root',		// 用户名
	// 'DB_PWD'		=> 'tpcms2013_pass',		// 密码
	'DB_USER'		=> 'root',		// 用户名
	'DB_PWD'		=> '00000000',		// 密码
	'DB_PORT'		=> 3306,					// 端口
	'DB_PREFIX'		=> 'myweb_',					// 表前缀

	'APP_GROUP_LIST'		=> 'Index,Cms,User',					// 模块列表
	'DEFAULT_GROUP'			=> 'Index',								// 默认模块

	'LOAD_EXT_FILE'			=> "extend,tpcms_common_function",		// 预载入 Common 目录下的 extend.php 和 tpcms_common_function.php

	'URL_CASE_INSENSITIVE'	=> true,								// URL不区分大小写

	'TMPL_ACTION_ERROR'		=> 'Public:error',						// 默认错误跳转对应的模板文件
	'TMPL_ACTION_SUCCESS'	=> 'Public:success',					// 默认成功跳转对应的模板文件
	'ERROR_PAGE'			=> '/Public/error.html',				// 错误页面

	'DEFAULT_FILTER'		=> 'trim,strip_tags,htmlspecialchars',	// 用户录入过滤
/*
	'HTML_CACHE_ON'		=> true,						
	// 开启静态缓存
	'HTML_FILE_SUFFIX'	=> '.html',						// 缓存文件后缀为.html
	'HTML_CACHE_TIME'		=> 0,							// 缓存时间为120秒
	'HTML_CACHE_RULES'	=> array(						// 定义缓存规则
		'*'=>array('{$_SERVER.REQUEST_URI|md5}', 120),		// 全局缓存120秒
		'Artical:'=>array('Artical/{:action}_{id}','0','md5') ,

	)
	*/

);