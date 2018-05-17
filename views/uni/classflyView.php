<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>無標題文件</title>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="css/classfly.css" >
	
	<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="js/jquery.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">

	<?php require_once("_topNav.php"); ?>

	<div id="mainNav">
	<?php require_once("_mainNav.php"); ?>  
	</div>

	<div id="contain">
	<div id="_top"><strong>‧ </strong><a href="index.php">首頁</a> &gt; 分類找尋 </div>
	<h4>&nbsp;</h4>
	<div id="main"> 
	  <ul class="classflymenu">
		 <li>
			<a href="">►依照區域分類</a>        
			<ul class="submenu">
				<?php $p="?c=uni&a=choosing&p="; ?>
				<li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$p.'north'; ?>" >北部</a></li>
				<li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$p.'wast'; ?>" >中部</a></li>
				<li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$p.'south'; ?>" >南部</a></li>
				<li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$p.'east'; ?>" >東部</a></li>
				<li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$p.'other'; ?>" >離島</a></li>
			</ul>
		</li>	
		<li>
			<a href="">►依照種類分類</a>        
			<ul class="submenu">
				<?php $p="?c=uni&a=total_list&p="; ?>
				<li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$p.'nu'; ?>" >公立大學</a></li>
				<li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$p.'pu'; ?>" >私立大學</a></li>
				<li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$p.'nt'; ?>" >公立技職</a></li>
				<li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$p.'pt'; ?>" >私立技職</a></li>
			</ul>
		</li>	
	</ul>  
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
