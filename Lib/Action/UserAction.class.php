<?php

class UserAction extends Action
{
	public function index()
	{
		echo "hello this is user/index";
		echo '<p><a href="logout">logot </a>';
	}
	
	public function logout()//安全退出
	{
		//$this->assign('waitSecond',135);
		
		//判断session是否存在
		if (!session('?userName'))
		{
			$this->error('非法登录',U('Index/index'));
		}
		
		//删除session
		session('userName',null);
		session('userPower',null);
		
		//再次判断session是否存在
		if ( (session('?userName')) || (session('?userPower')) )
			$this->error('退出失败');
		else
			$this->success('退出成功',U('Index/index'));////////////////////////////////////////////////////////
	}
}