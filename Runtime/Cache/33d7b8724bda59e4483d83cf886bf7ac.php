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
	
		    

<div class="demo-headline">
	<h1 class="demo-logo">
		<div class="logo"><img src="http://localhost/love/Public/FlatUI/images/demo/logo-mask.png"></div>
		<?php echo ($View_money); ?>
		<small><?php echo ($View_currency); ?></small>
		<small><?php echo ($View_target); ?></small>
	</h1>
</div> <!-- /demo-headline -->

<div class="row demo-row">
	<div class="col-md-6">
		<a href="<?php echo U('User/add');?>" class="btn btn-block btn-lg btn-info">加分订单</a>
	</div>
	<p>
	<div class="col-md-6">
		<a href="<?php echo U('User/sub');?>" class="btn btn-block btn-lg btn-primary">减分订单</a>
	</div>
</div> <!-- /row -->
<p>
<div class="row demo-row">
	<div class="col-md-6">
		<a href="<?php echo U('User/displayAddDiary');?>" class="btn btn-block btn-lg btn-info">写点滴</a>
	</div>
	<p>
	<div class="col-md-6">
		<a href="<?php echo U('User/changeMoodMobile');?>" class="btn btn-block btn-lg btn-primary">对方心情：<?php echo (session('moodValue')); ?></a>
	</div>
</div> <!-- /row -->

<div class="row demo-tiles">
	<div class="col-md-3">
		<div class="tile">
			<a href="<?php echo U('User/message');?>">
				<img src="__PUBLIC__/FlatUI/images/icons/svg/chat.svg" alt="Chat" class="tile-image">
			</a>
			<h3 class="tile-title">新消息</h3>
			<p>您有<b><?php echo ($View_messageCount); ?></b>条未处理的消息</p>
		</div>
	</div>
	<div class="col-md-3">
		<div class="tile">
			<a href="<?php echo U('User/note');?>">
				<img src="__PUBLIC__/FlatUI/images/icons/svg/clocks.svg" alt="Chat" class="tile-image">
			</a>
			<h3 class="tile-title">重要提醒</h3>
			<p>您今天有<?php echo ($View_noteCount); ?>项待处理事宜</p>
		</div>
	</div>
	<div class="col-md-3">
		<div class="tile">
			<a href="<?php echo U('User/treaty');?>">
				<img src="__PUBLIC__/FlatUI/images/icons/svg/clipboard.svg" alt="Chat" class="tile-image">
			</a>
			<h3 class="tile-title">爱情条约</h3>
			<p>共有条约<?php echo ($View_lowCount); ?>条</p>
		</div>
	</div>
	<div class="col-md-3">
		<div class="tile">
			<a href="<?php echo U('User/diary');?>">
				<img src="__PUBLIC__/FlatUI/images/icons/svg/book.svg" alt="Chat" class="tile-image">
			</a>
			<h3 class="tile-title">爱情账户明细</h3>
			<p>共有点滴<?php echo ($View_diaryCount); ?>条</p>
		</div>
	</div>
<p>
<div class="row demo-row">
	<div class="col-md-6">
		<center><a href="<?php echo U('User/account');?>" class="btn btn-block btn-lg btn-info"><?php echo (session('userName')); ?></a></center>
	</div>
<p>
	<div class="col-md-6">
		<a href="<?php echo U('Index/logout');?>" class="btn btn-block btn-lg btn-primary">退出</a>
	</div>
</div> <!-- /row -->
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