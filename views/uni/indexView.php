<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>大學地址網站</title>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	
	<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">

	<?php require_once("_topNav.php"); ?>

	<div id="mainNav">
	<?php require_once("_mainNav.php"); ?>  
	</div>


	<div id="contain">
		<div id="_top"><strong>‧ </strong>首頁 &gt; 最新消息</div>
		<div id="main">
			<table id='tab_total' width='100%'>
			    
			    
		<?php foreach($result as $row ){ ?>			
					<tr>
						<td width='20%'>
						<font color='gray' size='1px' style="font-family:cursive;"><?php echo $row['mWho'];?></font>
						</td>
						<td width='60%' align='midden'>
						<font color='blue' size='small' style="font-family:Microsoft JhengHei;"><?php echo $row['mMessage'];?></font>
						</td>	
						<td width='20%' align='right'>
						<font color='black' size='1px' style="font-family:sans-serif;"><?php $date=explode(" ",$row['mTime']); echo $date[0];?></font>
						</td>
					</tr>	
					<tr><td> <br/> </td></tr>
			<?php } ?>
		
			</table>
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
