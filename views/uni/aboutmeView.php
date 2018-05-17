<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>關於我們</title>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	
	<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">
	<div id="topNav">
	<?php require_once("_topNav.php"); ?>
	</div>

	<div id="mainNav">
	<?php require_once("_mainNav.php"); ?>  
	</div>

	<div id="contain">
		<div id="_top"><strong>‧</strong><a href="">首頁</a> &gt; 關於我們</div>
		
		<h4 class="h4_title">關於我們</h4>
		<div id="main"> 
			<div id='aboutme'><?php echo nl2br(str_replace('','&nbsp;',$row['aContent']));?></div>
		</div>
	</div>

	<div id="footer">
	<br/>
	  <p>Copyright © 2013  Xu,Rong-hong  All rights reserved<br/>
	  Best Viewed in Chrome or Firefox or Internet Explorer 9 @1024x768 Resolution or higher. </p>
	</div>
</div>
</body>
</html>
