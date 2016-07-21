 <?php
return array(
	'DB_TYPE'		=> 'mysql',					// 数据库类型
	'DB_HOST'		=> 'localhost',				// 服务器地址
	'DB_NAME'		=> 'myweb',				// 数据库名
	// 'DB_USER'		=> 'tpcms2013_root',		// 用户名
	'DB_USER'		=> 'root',		// 用户名
	'DB_PWD'		=> '00000000',		// 密码
	// 'DB_PWD'		=> 'tpcms2013_pass',		// 密码
	
	'DB_PORT'		=> 3306,					// 端口
	'DB_PREFIX'		=> 'myweb_',					// 表前缀

/*	'APP_GROUP_LIST'		=> 'Index,Cms,User,Siteinfo',			// 模块列表
	'DEFAULT_GROUP'			=> 'Index',								// 默认模块*/
	// 'URL_MODEL'=>2,

	'LOAD_EXT_FILE'			=> "extend",							// 预载入 Common 目录下的 extend.php

	'URL_CASE_INSENSITIVE'	=> true,								// URL不区分大小写

	'TMPL_ACTION_ERROR'		=> 'Public:error',						
	// 默认错误跳转对应的模板文件
	'TMPL_ACTION_SUCCESS'	=> 'Public:success',					
	// 默认成功跳转对应的模板文件
	'ERROR_PAGE'			=> '/Public/error.html',				
	// 错误页面

	'DEFAULT_FILTER'		=> 'trim,strip_tags,htmlspecialchars',	
	// 用户录入过滤
	//session设置
	    'SESSION_OPTIONS'         =>  array(
        'name'                =>  'MYWEBSESSION',                    //设置session名
        'expire'              =>  3600,                      //SESSION保存15天
        'use_trans_sid'       =>  1,                               //跨页传递
        'use_only_cookies'    =>  0,                               //是否只开启基于cookies的session的会话方式
    ),

);