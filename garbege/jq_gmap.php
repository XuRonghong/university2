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
$query_uni_total_loc = "SELECT * FROM `university` ";//WHERE university.uName LIKE '%國立%' AND university.uType NOT LIKE '%技職%'";
$uni_total_loc = mysql_query($query_uni_total_loc, $conn_university_list) or die(mysql_error());
$row_uni_total_loc = mysql_fetch_assoc($uni_total_loc);
$totalRows_uni_total_loc = mysql_num_rows($uni_total_loc);
?>

