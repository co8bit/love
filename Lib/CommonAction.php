<?php
Class CommonAction extends Action
{
	Public function _initialize()
	{
		//移动设备浏览，则切换模板
		if (ismobile()) 
		{
			//设置默认默认主题为 Mobile
			//C('DEFAULT_THEME','Mobile');
		}
		//............你的更多代码.......
	}
}
?>