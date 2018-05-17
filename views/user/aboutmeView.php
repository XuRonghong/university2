<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">    
	<title>編輯關於我們</title>
	<link rel="stylesheet" type="text/css" href="css/layout_edit.css">
	<link rel="stylesheet" type="text/css" href="css/university_single.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="js/jquery_edit.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<h2>DATA.GOV.TW</h2>
		<h2>政府資料開放平台(測試Beta版)</h2>
		<div id="search">
			<form id="f_search" action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
				<input type="hidden" name="c" value="user">
				<input type="hidden" name="a" value="search">
				<input id="btn_search1" type="text" name="p" value="">
				<!--a id="btn_search" href="">搜尋</a-->
				<input id="btn_search2" type="submit" value="搜尋">
			</form>
		</div>
	</div>

	<div id="topNav">
		<ul>
		<li><a href="<?php echo $_SERVER['PHP_SELF'].'?c=user&a=add&p='.$_SESSION['us'];?>">新增學校</a></li>
		<li><a href="<?php echo $_SERVER['PHP_SELF'].'?c=user&a=home&p='.$_SESSION['us'];?>">台灣全國大專院校</a></li>
		<li><a href="<?php echo $_SERVER['PHP_SELF'].'?c=user&a=aboutme&p='.$_SESSION['us'];?>">關於我們</a></li>
		<li><a href="">&nbsp; </a></li>
		<li><a href="">&nbsp; </a></li>
		<li><a href="<?php echo $_SERVER['PHP_SELF'].'?c=user&a=logout';?>">登出</a></li>
		</ul>
	</div>

	<!--左邊的jquery菜單欄，目前無用處-->	
	<div id="mainNav">
	<?php require_once("_mainNav.php"); ?>  
	</div>

	<div id="contain">
	<div id="_top"><strong>‧ </strong>&gt; 關於我們 &gt;     
	</div>

	<h4 class="h4_title"></h4>
	<div id="main"> 
	<form id="editform" action="<?php echo $_SERVER['PHP_SELF'].'?c=user&a=aboutme';?>" method="POST">
		
		<h5>內容</h5>
		<textarea name="aboutme" rows='30' cols='90'>
			<?php echo ($row['aContent']); ?>
		</textarea>
		
		<br/>
		<input class="btn_editok" type="submit" value="修改">
	  
	</form>  	  
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