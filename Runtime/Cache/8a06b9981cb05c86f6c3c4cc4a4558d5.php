<?php if (!defined('THINK_PATH')) exit();?><title>爱情银行</title>
<html>
<head>
	<meta charset="utf-8">
	<title>爱情银行</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0", user-scalable=no>

	<!-- Loading Bootstrap -->
	<link href="__PUBLIC__/FlatUI/bootstrap/css/bootstrap.css" rel="stylesheet">

	<!-- Loading Flat UI -->
	<link href="__PUBLIC__/FlatUI/css/flat-ui.css" rel="stylesheet">
	<link href="__PUBLIC__/FlatUI/css/demo.css" rel="stylesheet">

	<link rel="shortcut icon" href="__PUBLIC__/FlatUI/images/favicon.ico">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	<!--[if lt IE 9]>
	  <script src="__PUBLIC__/FlatUI/js/html5shiv.js"></script>
	<![endif]-->
</head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>爱情银行</title>
<!-- Bootstrap -->   <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet" media="screen">

   <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
</head>



<body>
			  <!--    <dl class="palette palette-orange"> -->
			
	<div class="container">
	
		<div class="row demo-row">
			<div class="col-md-1">
			</div>
			<div class="col-md-10">
			  <div class="navbar navbar-inverse navbar-fixed-top">
			      <div class="navbar-inner">
			        <div class="container-fluid">
			          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			          </button>
			          <a class="brand" href="<?php echo U('User/index');?>"><?php echo (session('_APPNAME')); ?></a>
			          <div class="nav-collapse collapse">
			            <p class="navbar-text pull-right">
			            	 <a href="<?php echo U('User/displayAddDiary');?>">
							写点滴
						  </a>
			            </p>
			            <p class="navbar-text pull-right">
			            	<a href="<?php echo U('Index/logout');?>">退出</a>
			            </p>
			            <ul class="nav">
			              <li><a href="__URL__/main" class="btn dropdown-toggle data-toggle="dropdown" btn-small btn btn-inverse">首页 </a></li>
			               <li><a href="__URL__/purchases" class="btn dropdown-toggle btn-small btn btn-inverse">进货单 </a></li>
			               <li><a href="__URL__/sale" class="btn dropdown-toggle btn-small btn btn-inverse">销售单 </a></li>
			               <li><a href="__URL__/inventory" class="btn dropdown-toggle btn-small btn btn-inverse">库存单 </a></li>
			               <li><a href="__URL__/accountpayable" class="btn dropdown-toggle btn-small btn btn-inverse">应付款 </a></li>
			               <li><a href="__URL__/accountdue" class="btn dropdown-toggle btn-small btn btn-inverse">应收款 </a></li>
			               <li><a href="__URL__/finance" class="btn dropdown-toggle btn-small btn btn-inverse">财务</a></li>
			               <li><a href="__URL__/staffmanage" class="btn dropdown-toggle btn-small btn btn-inverse">员工管理 </a></li>
			               <li><a href="__URL__/user" class=" btn dropdown-toggle btn-small btn btn-inverse">账户管理 </a></li>
			               <li><a href="__URL__/about" class=" btn dropdown-toggle btn-small btn btn-inverse">关于 </a></li>
			            </ul>
			          </div><!--/.nav-collapse -->
			        </div>
			      </div>
			    </div>
			</div>
			<div class="col-md-1">
			</div>
		</div>

		    

<div class="col-md-2">
	</div>
	<div class="col-md-8">
		  <div class="todo">
			<div class="todo-search">
			  <input class="todo-search-field" value="" disabled="disabled" placeholder="爱情账户明细" type="search">
			</div>
			<ul>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "还没有日记，去创建吧" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class=<?php echo ($vo["gouxuan"]); ?>>
						<div class=<?php echo ($vo["icon"]); ?>></div>
						<div class="todo-content">
							<h4 class="todo-name">
								<?php echo ($vo["contant"]); ?>
							</h4>
								<?php echo ($vo["score"]); ?>
						</div>
					</li><?php endforeach; endif; else: echo "还没有日记，去创建吧" ;endif; ?>
			</ul>
		  </div>
		</div>
	<div class="col-md-2">
</div>
		
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
							<img src="__PUBLIC__/FlatUI/images/donate_link.png" alt="donate_link">
						</a>
					</p>
				</div> <!-- /col-md-7 -->

				<div class="col-md-5">
					<div class="footer-banner">
						<h3 class="footer-title">使用帮助</h3>
						<ul>
							<li><a href="http://aqyh.sinaapp.com/help.php" target="_blank">新手教程</a></li>
							<li><a href="http://aqyh.sinaapp.com/" target="_blank">提交建议</a></li>
							<li><a href="http://aqyh.sinaapp.com/" target="_blank">官方网站</a></li>
						</ul>
						
					</div>
				</div>
			</div>
		</div>
	</footer>
	
	<!-- Load JS here for greater good =============================-->
	<script src="__PUBLIC__/FlatUI/js/jquery-1.8.3.min.js"></script>
	<script src="__PUBLIC__/FlatUI/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="__PUBLIC__/FlatUI/js/jquery.ui.touch-punch.min.js"></script>
	<script src="__PUBLIC__/FlatUI/js/bootstrap.min.js"></script>
	<script src="__PUBLIC__/FlatUI/js/bootstrap-select.js"></script>
	<script src="__PUBLIC__/FlatUI/js/bootstrap-switch.js"></script>
	<script src="__PUBLIC__/FlatUI/js/flatui-checkbox.js"></script>
	<script src="__PUBLIC__/FlatUI/js/flatui-radio.js"></script>
	<script src="__PUBLIC__/FlatUI/js/jquery.tagsinput.js"></script>
	<script src="__PUBLIC__/FlatUI/js/jquery.placeholder.js"></script>
	<script src="__PUBLIC__/FlatUI/js/jquery.stacktable.js"></script>
	<script src="http://vjs.zencdn.net/4.1/video.js"></script>
	<script src="__PUBLIC__/FlatUI/js/application.js"></script>
</body>
</html>
	
<!-- Bootstrap -->    <script src="__PUBLIC__/js/bootstrap.min.js"></script>