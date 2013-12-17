<?php
include('.\Conf\MyConfigINI.php');

class IndexAction extends Action 
{
    public function index()
    {
    	$this->assign('View_SOFTNAME',_SOFTNAME);
    	$this->assign('View_VERSION',_VERSION);
    	$this->display();
	}
	
	private function isLogin()//判断是否已经登陆
	{
		if (session('?userName'))//如果用户已经存在
		{
			redirect(U('User/Index'),0);//不能写成$this->redirect(U('User/Index'),0);不然地址会变成：http://项目名a/模块名b/操作c/项目名a/模块名b/操作c/..
		}
	}
	
	public function login()
	{
		$this->isLogin();
		$this->display();
	}
	
	public function sign()
	{
		$this->isLogin();//无论isLogin()是不是private，调用的时候都要加$this->。？因为php不能像c++那样可以直接用，必须要指出是谁的
		$this->display();
	}
	
	public function toLogin()//判断登录是否成功
	{
		$dbuser = M("User");//NOTE:thinkphp是用参数名确定是哪个数据库的，比如M("User")的User
    	$condition['userName'] = $this->_post('userName');
    	$condition['userPassword'] = $this->_post('userPassword');
    	$result = $dbuser->where($condition)->select();
    	if($result)
    	{
    		session('userName',$result[0]['userName']);
    		session('userPower',$result[0]['userPower']);
    		//$this->success('登陆成功','__APP__/User/Index');
    		$this->success('登陆成功',U('User/Index'));//U方法用于完成对URL地址的组装，特点在于可以自动根据当前的URL模式和设置生成对应的URL地址
    	}
    	else
    	{
    		$this->error('登录失败');
    	}
	}
	
	public function toSign()//判断是否注册成功
	{
		$this->assign('waitSecond',135);
		
		$dbUser = D("User");
		//trace($fields = $dbUser->getDbFields(),"my output:");     //for debug
		$dbUser->create();
		
		if(!$dbUser->add())//添加失败  TODO
		{
			if ( $dbUser->getError() == '非法数据对象！')//! 号后面有个空格
				$this->error('注册失败：'.'有未填项');
			else
				$this->error('注册失败：'.$dbUser->getError());
		}
		else
		{
			session('userName',$$dbUser->userName);//////////////////这里进行了session
			session('userPower',$dbUser->userPower);
			$this->success('注册成功',U('User/Index'));//U函数必须要指定具体操作，不然会出错（即,不能U('User')）
		}
	}
}