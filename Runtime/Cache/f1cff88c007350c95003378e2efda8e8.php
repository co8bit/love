<?php if (!defined('THINK_PATH')) exit();?><title>爱情银行</title>
<html>
<head>
	<meta charset="utf-8">
	<title>爱情银行</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0", user-scalable=no>

	<!-- Loading Bootstrap -->
	<link href="__TMPL__FlatUI/bootstrap/css/bootstrap.css" rel="stylesheet">

	<!-- Loading Flat UI -->
	<link href="__TMPL__FlatUI/css/flat-ui.css" rel="stylesheet">
	<link href="__TMPL__FlatUI/css/demo.css" rel="stylesheet">

	<link rel="shortcut icon" href="__TMPL__FlatUI/images/favicon.ico">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	<!--[if lt IE 9]>
	  <script src="__TMPL__FlatUI/js/html5shiv.js"></script>
	<![endif]-->
</head>

<body>
			  <!--    <dl class="palette palette-orange"> -->
			
	<div class="container">
	
		<div class="row demo-row">
			<div class="col-md-12">
			  <div class="navbar navbar-inverse">
				<div class="navbar-header">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-collapse-01"></button>
				</div>            
				<div class="navbar-collapse collapse navbar-collapse-01">
					<ul class="nav navbar-nav navbar-left">
						<li>
						  <a href="<?php echo U('User/index');?>">
							<?php echo (session('_APPNAME')); ?>
						  </a>
						</li>
						<li>
							<a href="#fakelink">
								对方心情：<?php echo (session('moodValue')); ?>
							</a>
							<ul>
								<li><a href="#fakelink">我的心情：<?php echo (session('myMoodValue')); ?></a></li>
								<li>
								  <a href="#fakelink">变更我的心情</a>
								  <ul>
									<li><a href="<?php echo U('User/changeMood?mood=幸福');?>">幸福</a></li>
									<li><a href="<?php echo U('User/changeMood?mood=开心');?>">开心</a></li>
									<li><a href="<?php echo U('User/changeMood?mood=郁闷');?>">郁闷</a></li>
									<li><a href="<?php echo U('User/changeMood?mood=难过');?>">难过</a></li>
									<li><a href="<?php echo U('User/changeMood?mood=生气');?>">生气</a></li>
								  </ul> <!-- /Sub menu -->
								</li>
							</ul> <!-- /Sub menu -->
						</li>
						<li>
						  <a href="<?php echo U('User/friend');?>">
							好友圈
							<span class="navbar-unread">1</span>
						  </a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
						  <a href="<?php echo U('User/newPost');?>">
							写点滴
						  </a>
						</li>
						<li class="active">
							<a href="<?php echo U('User/account');?>">
								<?php echo (session('userName')); ?>
							</a>
							<ul>
								<li><a href="<?php echo U('User/account');?>">账户设置</a></li>
								<li><a href="<?php echo U('Index/logout');?>">退出</a></li>
							</ul> <!-- /Sub menu -->
						</li>
					</ul>
				</div><!--/.nav -->
			  </div>
			</div>
		</div>

		    

<form class="form-signin" id="selectTreaty" name="selectTreaty" method="post" action="<?php echo U('User/selectTreaty');?>" >
	<div class="row demo-row">
		<h2><center>选择条约</center></h2>
		<div class="col-md-6">
			<label class="checkbox" for="checkbox1">
				<span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span>
				<input value="" id="checkbox1" data-toggle="checkbox" type="checkbox">
				Unchecked
			</label>
			<label class="checkbox checked" for="checkbox2">
				<span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span>
				<input value="" id="checkbox2" data-toggle="checkbox" type="checkbox">
				Checked
			</label>
		</div>
		<div class="col-md-6">
			<label class="checkbox" for="checkbox1">
				<span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span>
				<input value="" id="checkbox1" data-toggle="checkbox" type="checkbox">
				Unchecked
			</label>
			<label class="checkbox checked" for="checkbox2">
				<span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span>
				<input value="" id="checkbox2" data-toggle="checkbox" type="checkbox">
				Checked
			</label>
		</div>
		<button class="btn btn-info btn-lg btn-block" type="submit">完成</button>
	</div>
</form>
<form class="form-signin" id="newPost" name="newPost" method="post" action="<?php echo U('User/newTreaty');?>" >
	<div class="row demo-row">
		<h3 class="demo-panel-title">添加条约</h3>
		<div class="col-md-7">
			第一步，请输入条款：
			<div class="form-group">
				<input class="form-control login-field" id="login-id" placeholder="例如：一起去自习室" name="content" type="text">
			</div>
		</div>
		<div class="col-md-3">
			第二步，奖惩爱情币：
			<div class="form-group">
				<input class="form-control login-field" id="login-id" placeholder="例如：5" name="score" type="text">
			</div>
		</div>
		<div class="col-md-2">
			第三步
			<div class="form-group">
				<button class="btn btn-info btn-lg btn-block" type="submit">添加</button>
			</div>
		</div>
		<a class="login-link" href="#">说明：“奖惩爱情币”一栏只需输入数字即可。如若没做到则扣除相应数量的爱情币，如若做到则会有相应数量的爱情币进账。</a>
	</div>
</form>
		
	</div> <!-- /container -->

	<!-- </dl> -->
	
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<h3 class="footer-title">关于</h3>
					<p>您是不是喜欢这个应用呢？<br>
					  如果喜欢的话可以关注我们的微博：<a href="http://weibo.com/u/3947676737" target="_blank">新浪微博</a><br>
					  您也可以赞助我们：
						<a class="footer-brand" href="https://me.alipay.com/co8bit" target="_blank">
							<img src="__TMPL__FlatUI/images/donate_link.png" alt="donate_link">
						</a>
					</p>
				</div> <!-- /col-md-7 -->

				<div class="col-md-5">
					<div class="footer-banner">
						<h3 class="footer-title">使用帮助</h3>
						<ul>
							<li><a href="http://www.co8bit.com/love/help.php" target="_blank">新手教程</a></li>
							<li><a href="http://www.co8bit.com/love/" target="_blank">提交建议</a></li>
							<li><a href="http://www.co8bit.com/love/" target="_blank">官方网站</a></li>
						</ul>
						
					</div>
				</div>
			</div>
		</div>
	</footer>
	
	<!-- Load JS here for greater good =============================-->
	<script src="__TMPL__FlatUI/js/jquery-1.8.3.min.js"></script>
	<script src="__TMPL__FlatUI/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="__TMPL__FlatUI/js/jquery.ui.touch-punch.min.js"></script>
	<script src="__TMPL__FlatUI/js/bootstrap.min.js"></script>
	<script src="__TMPL__FlatUI/js/bootstrap-select.js"></script>
	<script src="__TMPL__FlatUI/js/bootstrap-switch.js"></script>
	<script src="__TMPL__FlatUI/js/flatui-checkbox.js"></script>
	<script src="__TMPL__FlatUI/js/flatui-radio.js"></script>
	<script src="__TMPL__FlatUI/js/jquery.tagsinput.js"></script>
	<script src="__TMPL__FlatUI/js/jquery.placeholder.js"></script>
	<script src="__TMPL__FlatUI/js/jquery.stacktable.js"></script>
	<script src="http://vjs.zencdn.net/4.1/video.js"></script>
	<script src="__TMPL__FlatUI/js/application.js"></script>
</body>
</html>