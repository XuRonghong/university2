<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">    
	<title>學校總覽標示</title>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<style>
		div#map-canvas {
			height: 720px;
			margin: 0 auto;
			padding: 0px
		}
		div#div-pin{
			width:100px;
			height:150px; 			
		}
	</style>

	<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>

	<script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="js/gmap.js" type="text/javascript"></script>
</head>
<body>
<div id='divloc'>
<?php 
	echo "<ul>";	$i=1;
	//do{  	
	foreach($uni_total_loc as $row_uni_total_loc ){
		$id = "una".$i;
		$id0 = "uloc".$i;
		$id1 = "lat".$i;
		$id2 = "lng".$i;
		$id3 = "divimg".$i++;
		echo "<li><div id='".$id."'>" . $row_uni_total_loc['uName']."</div>
				  <div id='".$id0."'>" . $row_uni_total_loc['uLocation']."</div>
				  <div id='".$id1."'>" . $row_uni_total_loc['uLat']	."</div>
				  <div id='".$id2."'>" . $row_uni_total_loc['uLng']	."</div>
				  <div id='".$id3."'>" . "./images/bg.gif"	."</div></li>";
	}//while($row_uni_total_loc = mysql_fetch_assoc($uni_total_loc));
	echo "</ul>";
?>
</div>

<div id="map-canvas"></div>
<div id="foot">
  <p>Copyright © 2013  Xu,Rong-hong  All rights reserved<br/>
	  Best Viewed in Chrome or Firefox or Internet Explorer 9 @1024x768 Resolution or higher. </p>
</div>
</body>
</html>