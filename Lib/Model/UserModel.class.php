<?php
class UserModel extends Model {

	// 自动验证设置
	protected $_validate = array(
			array('userName', 'require', '用户名不能为空！'),
			array('userName','','用户名已经存在！',0,'unique',Model::MODEL_BOTH), //验证name字段是否唯一
			array('userPassword', 'require', '密码不能为空！', 0),
			array('userPassword2', 'require', '请输入第二遍密码', 0),
			array('userPassword2','userPassword','两次输入的密码不一样',0,'confirm',Model::MODEL_BOTH), // 验证确认密码是否和密码一致
			
			/*
			 * 自动验证的模板
			 *
			array('verify','require','验证码必须！'), //默认情况下用正则进行验证
			array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
			array('value',array(1,2,3),'值的范围不正确！',2,'in'), // 当值不为空的时候判断是否在一个范围内
			array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
			array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式
			*/
	);
	
	//修改映射
	protected $_map = array(
			'userPassword2' =>'userPassword', // 把表单中userPassword2映射到数据表的userPassword字段
			'userPassword' =>'userPassword',
	);
}
?>