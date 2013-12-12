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
	
	public function toLogin()
	{
		$this->assign('View_SOFTNAME',_SOFTNAME);
		$this->assign('View_VERSION',_VERSION);
		$this->display();
	}
}