<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>全台灣大學列表</title>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/total_list.css">
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

	<!--div id="_top"><strong>‧ </strong><a href="index.php">首頁</a> &gt; 台灣全國大專院校 </div-->
	<div id="_top"><strong>‧ </strong>
			<a href="index.php">首頁</a> &gt; 
			<a href="<?php echo $_SERVER['PHP_SELF'].'?c=uni&a=classfly'; ?>">分類找尋</a>  &gt; 
			<?php echo @$searchKey; ?>
	<?php 
		if( isset($classfly) /*$classfly!==''*/  )$get_area = stripslashes($classfly);
		
		if(!isset($get_area)){}
		else if($get_area=='north'){echo '北部';	}
		else if($get_area=='wast'){echo '中部';	}
		else if($get_area=='south'){echo '南部';	}
		else if($get_area=='east'){echo '東部';	}
		else if($get_area=='other'){echo '離島';	}
		
		else if($get_area=='nu'){echo '國立大學';	}
		else if($get_area=='nt'){echo '國立技職';	}
		else if($get_area=='pu'){echo '私立大學';	}
		else if($get_area=='pt'){echo '私立技職';	}
		else{	echo '';	}
	?>
	</div>

		<?php 
		echo "<table id='tab_total'>";

		echo "<tr><td>序</td><td>學校名稱</td><td>地點</td><td>電話</td><td>網址</td><td>代碼</td></tr>";

		//while($row_uni_total = mysql_fetch_assoc($uni_total)){
		if(!empty($row_uni)){	$ii=1;
			foreach($row_uni as $key => $row_uni_total){
				//if($row_uni_total['uId']==1)continue;   //第一列資料不印，例外
				echo "<tr>";
				echo "<td>".($ii++) . "</td>";
				//echo "<td><a href='university_single.php?universiteId={$row_uni_total['uId']}'>"
				//	.$row_uni_total['uName']. "</a></td>";
				
				echo "<td><a href='./index.php?c=uni&a=uni_single&p={$row_uni_total['uId']}'>"
					.$row_uni_total['uName']. "</a></td>";	
				echo "<td>".$row_uni_total['uLocation']. "</td>";
				echo "<td>".$row_uni_total['uPhone']. "</td>";
				echo "<td><a href='{$row_uni_total['uWeb']}'>".$row_uni_total['uWeb']. "</a></td>";
				echo "<td>".$row_uni_total['uNumber']. "</td>";
				echo "</tr>";
			}
		}

		echo "</table>";
		?>

	</div>

	<div id="footer">
	<br/>
	  <p>Copyright © 2013  Xu,Rong-hong  All rights reserved<br/>
	  Best Viewed in Chrome or Firefox or Internet Explorer 9 @1024x768 Resolution or higher. </p>
	</div>
	</div>
</body>
</html>