<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">    
	<title><?php echo $row_uni_sing['uName']; ?></title>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/university_single.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

	<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>

	<script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="js/gmap_pin.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">

	<?php require_once("_topNav.php"); ?>

	<div id="mainNav">
	<?php require_once("_mainNav.php"); ?>  
	</div>

	<div id="contain">
		<div id="_top"><strong>‧ </strong><a href="index.php">首頁</a> &gt;台灣全國大專院校 &gt;  分類找尋  &gt; <?php
		if(strstr ($row_uni_sing['uName'], "國立")!=false && strstr ($row_uni_sing['uType'], "技職")==false)echo "公立大學";

		else if(strstr ($row_uni_sing['uName'], "國立")==false && strstr ($row_uni_sing['uType'], "技職")==false)echo "私立大學";

		else if(strstr ($row_uni_sing['uName'], "國立")!=false && strstr ($row_uni_sing['uType'], "技職")!=false)echo "公立技職大學";

		else if(strstr ($row_uni_sing['uName'], "國立")==false && strstr ($row_uni_sing['uType'], "技職")!=false)echo "私立技職大學";
		?>  &gt; <?php echo $row_uni_sing['uName']; ?>
		</div>

		<h4 class="h4_title"><?php echo $row_uni_sing['uName']; ?></h4>
		<div id="main"> 

			<ul id='ul_single'>
				<li><h5>學校代碼：</h5><?php echo $row_uni_sing['uNumber']; ?></li>
				<li><h5>學校網址：</h5><?php echo $row_uni_sing['uWeb']; ?>	</li>
				<li><h5>學校地址：</h5><?php echo $row_uni_sing['uLocation']; ?></li>
				<li><h5>學校電話：</h5><?php echo $row_uni_sing['uPhone']; ?>	</li>
				<li><h5>台灣縣市：</h5><?php echo $row_uni_sing['uCounties']; ?></li>
				<li><h5>學校類型：</h5><?php echo $row_uni_sing['uType']; ?>	</li>
			</ul>
			
			<br/><br/>
			<div id="map-canvas">
				<span id="lat"><?php echo $row_uni_sing['uLat']; ?></span>
				<span id="lng"><?php echo $row_uni_sing['uLng']; ?></span>
			</div>
			
			<div><?php echo nl2br( str_replace(' ','&nbsp;',$row_uni_sing['aContent']) );?></div>
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
