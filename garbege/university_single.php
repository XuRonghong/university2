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

$colname_uni_sing = "-1";
if (isset($_GET['universiteId'])) {
  $colname_uni_sing = $_GET['universiteId'];
}
mysql_select_db($database_conn_university_list, $conn_university_list);
$query_uni_sing = sprintf("SELECT * FROM university WHERE `uId` = %s", GetSQLValueString($colname_uni_sing, "int"));
$uni_sing = mysql_query($query_uni_sing, $conn_university_list) or die(mysql_error());
$row_uni_sing = mysql_fetch_assoc($uni_sing);
$totalRows_uni_sing = mysql_num_rows($uni_sing);
?>
<!DOCTYPE HTML>
<html>
<head>

    <meta charset="utf-8">
    
<title>無標題文件</title>
<link rel="stylesheet" type="text/css" href="css/layout.css">
<link rel="stylesheet" type="text/css" href="css/university_single.css">

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />


<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script src="js/jquery.js" type="text/javascript"></script>


<script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="js/gmap_pin.js" type="text/javascript"></script>
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
<div id="_top"><strong>‧ </strong><a href="index.php">首頁</a> &gt; <a href="total_list.php">台灣全國大專院校</a> &gt;  <a href="classfly.php">分類找尋</a>  &gt; <?php
if(strstr ($row_uni_sing['uName'], "國立")!=false && strstr ($row_uni_sing['uType'], "技職")==false)echo "公立大學";

else if(strstr ($row_uni_sing['uName'], "國立")==false && strstr ($row_uni_sing['uType'], "技職")==false)echo "私立大學";

else if(strstr ($row_uni_sing['uName'], "國立")!=false && strstr ($row_uni_sing['uType'], "技職")!=false)echo "公立技職大學";

else if(strstr ($row_uni_sing['uName'], "國立")==false && strstr ($row_uni_sing['uType'], "技職")!=false)echo "私立技職大學";
?>  &gt; <?php echo $row_uni_sing['uName']; ?></div>

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
    <div id="map-canvas"><span id="lat"><?php echo $row_uni_sing['uLat']; ?></span>
        					<span id="lng"><?php echo $row_uni_sing['uLng']; ?></span></div>
    
  <p>&nbsp;</p>
  <p>	JSON	 意見回饋鍵</p>
  <p>&nbsp;</p>
  <p> ● 
      </p>
  <p>● 資料集描述：本資料集提供臺南市教師學習護照研習課程資訊</p>
  <p> ● 主要欄位說明：「MasterEmail」(承辦人EMail)、「MasterTel」(承辦人電話)、「courseClass」(研習類別)、「courseDIV」(研習區分)、「courseDay」(研習日期)、「courseLocation」(研習地點)、「courseLocation2」(研習地點2)、「courseMaster」(承辦人)、「courseName」(研習名稱)、「courseNum」(研習代號)、「courseOption」(研習限制)、「courseProperty」(研習屬性)、「courseSchool」(承辦學校)、「courseTarget」(研習對象)、「courseTotal」(名額)、「courseTotal2」(報名人數)    </p>
  <p>● 資料集提供機關：臺南市政府資訊中心</p>
  <p> ● 資料量：約100筆    </p>
  <p>● 更新頻率：即時</p>
  <p> ● 授權方式：政府資料開放平臺資料使用規範    </p>
  <p>● 授權說明網址：http://data.gov.tw/opendata/principle    </p>
  <p>● 計費方式： 免費    </p>
  <p>● 資料集說明網址：http://e-learning.tn.edu.tw/User/OnlineList.aspx    </p>
  <p>● 編碼格式： UTF-8    </p>
  <p>● 資料集提供機關聯絡人：傅先生    </p>
  <p>● 資料集提供機關聯絡人電話：06-2130669#30    </p>
  <p>● 備　　註：API參數：year代表年度 </p>
</div>

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
mysql_free_result($uni_sing);
?>
