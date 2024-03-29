<!doctype html>
<html >
<head>
	<!-- <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title>Modal Login Window Demo</title>
	<link rel="shortcut icon" href="http://designshack.net/favicon.ico">
	<link rel="icon" href="http://designshack.net/favicon.ico"> -->
	<link rel="stylesheet" type="text/css" media="all" href="./css/style.css">
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="js/jquery.leanModal.min.js"></script>
	<!-- jQuery plugin leanModal under MIT License http://leanmodal.finelysliced.com.au/ -->
  
	<script type="text/javascript">
	  function nonull(){
			u = document.getElementById('username').value;
			p = document.getElementById('password').value;
			if(u != '')
				if(p != '')return true;
			return false;
		}
	</script>
</head>
<body>
	<?php echo $login_error; ?>
	<div id="w">
		<div id="content">
		  <h1>Hello, 小徐. Welcome back !!</h1>
			<p>Just click the login link below to expand the modal window. 
			  <br/>This is only a demo so the input form will not load anything, 
			  <br/>but it is easy to connect into a backend system.
			</p>
		  <center><a href="#loginmodal" class="flatbtn" id="modaltrigger">登入管理</a></center>
		</div>
	</div>
	  
	<div id="loginmodal" style="display:none;">
		<h1>User Login</h1>
		<form id="loginform" name="loginform" method="post"  action="<?php echo $_SERVER['PHP_SELF'].'?c=user&a=login&p=bj4';?>">
		  <label for="username">Username:</label>
		  <input type="text" name="username" id="username" class="txtfield" tabindex="1">
		  
		  <label for="password">Password:</label>
		  <input type="password" name="password" id="password" class="txtfield" tabindex="2">
		  
		  <div class="center">
		  <input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blu hidemodal" value="Log In" tabindex="3" onclick="return nonull();">
		  </div>
		</form>
	</div>
	
	<script type="text/javascript">
	$(function(){
		
		
	  $('#loginform').submit(function(e){
		  
			return true;
	  });
	  
	  $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
	});
	</script>
</body>
</html>