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
	
		    

<form class="form-signin" id="selectTreaty" name="selectTreaty" method="post" action="<?php echo U('User/toChangeMoodMobile');?>" >
	<div class="row demo-row">
		<dl class="palette palette-peter-river">
        	<h3 class="demo-panel-title"><center>改变心情</center></h3>
        </dl>
        <div class="col-md-12">
        	我的心情：<?php echo (session('myMoodValue')); ?>
			<label class="radio">
    				<span class="icons">
    					<span class="first-icon fui-radio-unchecked"></span>
    					<span class="second-icon fui-radio-checked"></span>
    				</span>
    				<input id="optionsRadios1" value="幸福" name = "radio" data-toggle="radio" type="radio">
     			幸福
   			</label>
   			<label class="radio">
    				<span class="icons">
    					<span class="first-icon fui-radio-unchecked"></span>
    					<span class="second-icon fui-radio-checked"></span>
    				</span>
    				<input id="optionsRadios1" value="开心" name = "radio" data-toggle="radio" type="radio">
     			开心
   			</label>
   			<label class="radio">
    				<span class="icons">
    					<span class="first-icon fui-radio-unchecked"></span>
    					<span class="second-icon fui-radio-checked"></span>
    				</span>
    				<input id="optionsRadios1" value="郁闷" name = "radio" data-toggle="radio" type="radio">
     			郁闷
   			</label>
   			<label class="radio">
    				<span class="icons">
    					<span class="first-icon fui-radio-unchecked"></span>
    					<span class="second-icon fui-radio-checked"></span>
    				</span>
    				<input id="optionsRadios1" value="难过" name = "radio" data-toggle="radio" type="radio">
     			难过
   			</label>
   			<label class="radio">
    				<span class="icons">
    					<span class="first-icon fui-radio-unchecked"></span>
    					<span class="second-icon fui-radio-checked"></span>
    				</span>
    				<input id="optionsRadios1" value="难过" name = "radio" data-toggle="radio" type="radio">
     			难过
   			</label>
			<button class="btn btn-info btn-lg btn-block" type="submit">确认</button>
		</div>
	</div>
</form>

		
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