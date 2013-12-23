<?php if (!defined('THINK_PATH')) exit();?><title>爱情银行</title>
<html>
<head>
	<meta charset="utf-8">
	<title>爱情银行</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0", user-scalable=no>

	<!-- Loading Bootstrap -->
	<link href="__PUBLIC__/Mobile/FlatUI/bootstrap/css/bootstrap.css" rel="stylesheet">

	<!-- Loading Flat UI -->
	<link href="__PUBLIC__/Mobile/FlatUI/css/flat-ui.css" rel="stylesheet">
	<link href="__PUBLIC__/Mobile/FlatUI/css/demo.css" rel="stylesheet">

	<link rel="shortcut icon" href="__PUBLIC__/Mobile/FlatUI/images/favicon.ico">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	<!--[if lt IE 9]>
	  <script src="__PUBLIC__/Mobile/FlatUI/js/html5shiv.js"></script>
	<![endif]-->
</head>

<body>
			  <!--    <dl class="palette palette-orange"> -->
			
	<div class="container">
	
		    

<dl class="palette palette-wet-asphalt">
 	<h3 class="demo-panel-title"><center>消息中心</center></h3>
 </dl>
 <p>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "您没有未处理的消息" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row demo-row">
		<div class="col-md-12">
			<dl class=<?php echo ($vo["classStr"]); ?>>
        		<h3 class="demo-panel-title"><center><?php echo ($vo["messageTitle"]); ?></center></h3>
        	</dl>
			
			<form class="form-signin" id="login" name="login" method="post" action="<?php echo U('User/editMessage');?>" >
				<div class="login-form">
					<input type="hidden" name="mId"  value=<?php echo ($vo["mId"]); ?>>
					<b><font color="#000000"><center><?php echo ($vo["messageTitle"]); ?></center></font></b>
					<font color="#000000">金额：</font>
					<div class="form-group">
						<input class="form-control login-field" value="<?php echo ($vo["money"]); ?>"  id="pairUserName" name="money" type="text">
						<label class="login-field-icon fui-user" for="login-name"></label>
					</div>
					<font color="#000000">理由：</font>
					<div class="form-group">
						<input class="form-control login-field" value="<?php echo ($vo["remark"]); ?>"  id="login-pass" type="text" name="remark">
						<label class="login-field-icon fui-mail" for="login-pass"></label>
					</div>
					<button class="btn btn-primary btn-lg btn-block" type="submit">修改</button>
					<a class="btn btn-primary btn-lg btn-block" href="__APP__/User/acceptMessage?id=<?php echo ($vo["mId"]); ?>">确认</a>
					<a class="login-link" href="#">对方确定账单后即生效</a>
				</div>
			</form>
		</div>
	</div><?php endforeach; endif; else: echo "您没有未处理的消息" ;endif; ?>
<p>
<div class="row demo-row">
	<div class="col-md-12">
		<a class="btn btn-info btn-lg btn-block" href="<?php echo U('User/index');?>">返回</a>
	</div>
</div>

		
	</div> <!-- /container -->

	<!-- </dl> -->
	
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<center>
						<h3 class="footer-title">关于</h3>
						<p>您是不是喜欢这个应用呢？<br>
						  可以关注我们的微博：<a href="http://weibo.com/u/3947676737" target="_blank">新浪微博</a><br>
						 也欢迎访问我们的官网：<a href="http://aqyh.sinaapp.com/" target="_blank">官方网站</a><br>
						  您也可以赞助我们：
							<a class="footer-brand" href="https://me.alipay.com/co8bit" target="_blank">
								<img src="__PUBLIC__/FlatUI/images/donate_link.png" alt="donate_link">
							</a>
						</p>
					</center>
				</div> <!-- /col-md-7 -->

			</div>
		</div>
	</footer>
	
	<!-- Load JS here for greater good =============================-->
	<script src="__PUBLIC__/Mobile/FlatUI/js/jquery-1.8.3.min.js"></script>
	<script src="__PUBLIC__/Mobile/FlatUI/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="__PUBLIC__/Mobile/FlatUI/js/jquery.ui.touch-punch.min.js"></script>
	<script src="__PUBLIC__/Mobile/FlatUI/js/bootstrap.min.js"></script>
	<script src="__PUBLIC__/Mobile/FlatUI/js/bootstrap-select.js"></script>
	<script src="__PUBLIC__/Mobile/FlatUI/js/bootstrap-switch.js"></script>
	<script src="__PUBLIC__/Mobile/FlatUI/js/flatui-checkbox.js"></script>
	<script src="__PUBLIC__/Mobile/FlatUI/js/flatui-radio.js"></script>
	<script src="__PUBLIC__/Mobile/FlatUI/js/jquery.tagsinput.js"></script>
	<script src="__PUBLIC__/Mobile/FlatUI/js/jquery.placeholder.js"></script>
	<script src="__PUBLIC__/Mobile/FlatUI/js/jquery.stacktable.js"></script>
	<script src="http://vjs.zencdn.net/4.1/video.js"></script>
	<script src="__PUBLIC__/Mobile/FlatUI/js/application.js"></script>
</body>
</html>