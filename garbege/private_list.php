<?php require_once('Connections/conn_university_list.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_conn_university_list, $conn_university_list);
$query_uni_private = "SELECT * FROM university WHERE university.uName NOT LIKE '%國立%' AND university.uType NOT LIKE '%技職%'";
$uni_private = mysql_query($query_uni_private, $conn_university_list) or die(mysql_error());
$row_uni_private = mysql_fetch_assoc($uni_private);
$totalRows_uni_private = mysql_num_rows($uni_private);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
<link rel="stylesheet" type="text/css" href="css/layout.css">
<link rel="stylesheet" type="text/css" href="css/total_list.css">

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script src="js/jquery.js" type="text/javascript"></script>
</head>

<body>

<div id="wrapper">
<div id="header">
    <h2>DATA.GOV.TW</h2>
    <h2>政府資料開放平台(測試Beta版)</h2>
    <div id="search">
    	<input type="text" name="search">
        <a href="">搜尋</a>
    </div>
</div>

<div id="topNav">
<?php require_once("_topNav.php"); ?>
</div>

<div id="mainNav">
<?php require_once("_mainNav.php"); ?>  
</div>


<div id="contain">
<div id="_top"><strong>‧ </strong><a href="index.php">首頁</a> &gt; <a href="classfly.php">分類找尋</a>  &gt; 私立大學</div>

<?php 
echo "<table id='tab_total'>";

echo "<tr><td>序</td><td>學校名稱</td><td>地點</td><td>電話</td><td>網址</td><td>代碼</td></tr>";

$i=1;
do{
	echo "<tr>";
	echo "<td>".($i++) . "</td>";
	echo "<td><a href='university_single.php?universiteId={$row_uni_private['uId']}'>"
		.$row_uni_private['uName']. "</a></td>";
	echo "<td>".$row_uni_private['uLocation']. "</td>";
	echo "<td>".$row_uni_private['uPhone']. "</td>";
	echo "<td><a href='{$row_uni_private['uWeb']}'>".$row_uni_private['uWeb']. "</a></td>";
	echo "<td>".$row_uni_private['uNumber']. "</td>";
	echo "</tr>";
}while($row_uni_private = mysql_fetch_assoc($uni_private));

echo "</table>";
?>

</div>

<div id="footer">
<br/>
  <p>Copyright © 2013 Goldenbird All rights reserved<br/>
  Best Viewed in Firefox or Internet Explorer 8 @1024x768 Resolution or higher. </p>
</div>
</div>

</body>
</html>
<?php
mysql_free_result($uni_private);
?>
