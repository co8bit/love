<?php
return array(
	//'配置项'=>'配置值'
	'SHOW_PAGE_TRACE' =>true, // 显示页面Trace信息
	
	//主题相关
	'DEFAULT_THEME' => 'PC',//设置默认主题为PC
	'THEME_LIST'=>'PC,Mobile',//支持的模板主题项
	//'TMPL_DETECT_THEME' => 	true, // 自动侦测模板主题,开启后会把火狐识别成手机
		
	// 数据库配置信息
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'love', // 数据库名
	'DB_USER'   => 'love', // 用户名
	'DB_PWD'    => 'love1314', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => '', // 数据库表前缀
	
	'SESSION_AUTO_START'    => true,    // 是否自动开启Session
	
	'TMPL_PARSE_STRING'=> array('__PUBLIC__' => '/love/Public'),//定义__PUBLIC__在哪里
	//'TMPL_ACTION_ERROR'     => THINK_PATH.'Public:error', // 默认错误跳转对应的模板文件
	//'TMPL_ACTION_SUCCESS'   => THINK_PATH.'Public:success', // 默认成功跳转对应的模板文件
	//默认错误跳转对应的模板文件
	'TMPL_ACTION_ERROR' => APP_PATH . 'Tpl/PC/dispatch_jump.tpl',
	//默认成功跳转对应的模板文件
	'TMPL_ACTION_SUCCESS' => APP_PATH . 'Tpl/PC/dispatch_jump.tpl',
);
?>