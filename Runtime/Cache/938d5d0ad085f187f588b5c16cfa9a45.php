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
	
		    

<form class="form-signin" id="selectTreaty" name="selectTreaty" method="post" action="<?php echo U('User/toAddBySelect');?>" >
	<div class="row demo-row">
		<dl class="palette palette-peter-river">
        	<h3 class="demo-panel-title"><center>加分订单</center></h3>
        </dl>
		<h3 class="demo-panel-title">选择适用条约</h3>
		<div class="col-md-6">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($mod) == "0"): ?><!-- 0是奇数 -->
					<label class="radio">
           				<span class="icons">
           					<span class="first-icon fui-radio-unchecked"></span>
           					<span class="second-icon fui-radio-checked"></span>
           				</span>
           				<input id="optionsRadios1" value="<?php echo ($i-1); ?>" name = "radio" data-toggle="radio" type="radio">
            			<?php echo ($vo); ?>
          			</label><?php endif; endforeach; endif; else: echo "没有数据" ;endif; ?>
		</div>
		<div class="col-md-6">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($mod) == "1"): ?><label class="radio">
           				<span class="icons">
           					<span class="first-icon fui-radio-unchecked"></span>
           					<span class="second-icon fui-radio-checked"></span>
           				</span>
           				<input id="optionsRadios1" value="<?php echo ($i-1); ?>" name = "radio" data-toggle="radio" type="radio">
            			<?php echo ($vo); ?>
          			</label><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>
	<div class="row demo-row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<button class="btn btn-info btn-lg btn-block" type="submit">确认</button>
		</div>
	</div>
</form>
<div class="row demo-row">
	<form class="form-signin" id="newPost" name="newPost" method="post" action="<?php echo U('User/toAdd');?>" >
		<div class="row demo-row">
			<h3 class="demo-panel-title">或自定义条目</h3>
			<div class="col-md-7">
				1.理由：
				<div class="form-group">
					<input class="form-control login-field" id="login-id" placeholder="例如：一起去自习室" name="remark" type="text">
				</div>
			</div>
			<div class="col-md-3">
				2.奖励的爱情币数量：
				<div class="form-group">
					<input class="form-control login-field" id="login-id" placeholder="例如：5" name="money" type="text">
				</div>
			</div>
			<div class="col-md-2">
				3.然后
				<div class="form-group">
					<button class="btn btn-info btn-lg btn-block" type="submit">提交</button>
				</div>
			</div>
			<a class="login-link" href="#">对方确定账单后即生效</a>
		</div>
		<a class="btn btn-primary btn-lg btn-block" href="<?php echo U('User/index');?>">返回</a>
	</form>
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