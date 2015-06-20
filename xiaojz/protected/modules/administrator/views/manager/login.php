<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>管理员登录</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href=""<?php echo B_CSS_URL ?>bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo B_CSS_URL; ?>bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo B_CSS_URL; ?>font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo B_CSS_URL; ?>style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo B_CSS_URL; ?>style.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo B_CSS_URL; ?>style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo B_CSS_URL; ?>default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo B_CSS_URL; ?>uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?php echo B_CSS_URL; ?>login.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="media/image/favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
	<!-- BEGIN LOGO -->
	<div class="logo">
		<img src="media/image/logo-big.png" alt="" /> 
	</div>
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
        <form id="yw0" class="form-vertical login-form" method="post" action="<?php echo SITE_URL; ?>?r=administrator/manager/login">
			<h3 class="form-title">小金钟网站管理系统</h3>
			<div class="alert alert-error hide">
				<button class="close" data-dismiss="alert"></button>
				<span>请输入帐号密码</span>
			</div>
			<div class="control-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">管理员帐号</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-user"></i>
						<input class="m-wrap placeholder-no-fix" type="text" placeholder="管理员名" name="LoginForm[username]"/>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">密码</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-lock"></i>
						<input class="m-wrap placeholder-no-fix" type="password" placeholder="密码" name="LoginForm[password]"/>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<label class="checkbox">
				<input type="checkbox" name="remember" value="1"/> 记住我
				</label>
				<button type="submit" class="btn green pull-right">
				登陆 <i class="m-icon-swapright m-icon-white"></i>
				</button>            
			</div>
			
			
                  </form>
		<!-- END LOGIN FORM -->        
		<!-- BEGIN FORGOT PASSWORD FORM -->
		
		<!-- END FORGOT PASSWORD FORM -->
		<!-- BEGIN REGISTRATION FORM -->
		
		<!-- END REGISTRATION FORM -->
	</div>
	<!-- END LOGIN -->
	<!-- BEGIN COPYRIGHT -->
	<div class="copyright">
		2014 &copy; 远维网络. www.unvweb.com
	</div>
	<!-- END COPYRIGHT -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<script src="<?php echo B_JS_URL; ?>jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="<?php echo B_JS_URL; ?>jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo B_JS_URL; ?>jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="<?php echo B_JS_URL; ?>bootstrap.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo B_JS_URL; ?>excanvas.min.js"></script>
	<script src="<?php echo B_JS_URL; ?>respond.min.js"></script>  
	<![endif]-->   
	<script src="<?php echo B_JS_URL; ?>jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo B_JS_URL; ?>jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?php echo B_JS_URL; ?>jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo B_JS_URL; ?>jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo B_JS_URL; ?>jquery.validate.min.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo B_JS_URL; ?>app.js" type="text/javascript"></script>
	<script src="<?php echo B_JS_URL; ?>login.js" type="text/javascript"></script>      
	<!-- END PAGE LEVEL SCRIPTS --> 
	<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>
<!-- END BODY -->
</html>
