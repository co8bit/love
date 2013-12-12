<?php
include('.\Conf\MyConfigINI.php');

class UserAction extends Action
{
	public function islogin()
	{
		$this->assign('View_SOFTNAME',_SOFTNAME);
		$this->assign('View_VERSION',_VERSION);
		$this->display();
	}
}