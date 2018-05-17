<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>全國大學校列表</title>
	<link rel="stylesheet" type="text/css" href="css/layout_edit.css">
	<link rel="stylesheet" type="text/css" href="css/total_list_edit.css">

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
	<!--div id="_top"><strong>‧ </strong><a href="index.php">首頁</a> &gt; 台灣全國大專院校 </div-->
	<div id="_top"><strong>‧ </strong>
			<a href="index.php">首頁</a> &gt;
			台灣全國大專院校 &gt; 
			<?php echo $searchKey; ?> &gt; 
			<font size='small' color='green'>選擇其中一項編輯~</font>
	<?php 
		if($classfly!=='')$get_area = stripslashes($classfly);
		
		if($get_area=='north'){echo '北部';	}
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
	echo "<tr><td>序</td><td>學校名稱</td><td>地點</td><td>電話</td><td>網址</td><td>代碼</td><td>砍</td></tr>";

	//while($row_uni_total = mysql_fetch_assoc($uni_total)){
	if(!empty($row_uni)){	$ii=1;
		foreach($row_uni as $key => $row_uni_total){
			echo "<tr>";
			echo "<td>".($ii++) . "</td>";
			//echo "<td><a href='university_single.php?universiteId={$row_uni_total['uId']}'>"
			//	.$row_uni_total['uName']. "</a></td>";
			
			echo "<td><a href='./index.php?c=user&a=university&p={$row_uni_total['uId']}'>"
				.$row_uni_total['uName']. "</a></td>";	
			echo "<td>".$row_uni_total['uLocation']. "</td>";
			echo "<td>".$row_uni_total['uPhone']. "</td>";
			echo "<td><a href='{$row_uni_total['uWeb']}'>".$row_uni_total['uWeb']. "</a></td>";
			echo "<td>".$row_uni_total['uNumber']. "</td>";
			
			echo "<td><input type='button' value='X'>
					  <input type='hidden' value='". $row_uni_total['uId'] ."' id='uid'></td>
					  <input type='hidden' value='". $row_uni_total['uName'] ."' id='uname'></td>";		//這行是為了要存刪除哪個學校的名稱的最新消息
			echo "</tr>";
		}
	}
	echo "<tr><td colspan='5' align='middle'><br/><a href='./index.php?c=user&a=add'>新增學校</a></td></tr>";
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