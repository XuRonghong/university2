<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn_university_list = /*"sql210.000space.com";*/  "localhost";
$database_conn_university_list = "id4956274_university_list"; //"university_list";
$username_conn_university_list = "id4956274_hellorh"; //"root";
$password_conn_university_list = "rke5oosj"; //"123456";
$conn_university_list = mysqli_connect($hostname_conn_university_list, $username_conn_university_list, $password_conn_university_list) or trigger_error(mysqli_error(),E_USER_ERROR); 

mysqli_select_db($conn_university_list,$database_conn_university_list  );

mysqli_query($conn_university_list,"SET NAMES 'UTF8'");

/*$dbhost = "localhost";
    $dbuser = "id4956274_hellorh";
    $dbpass = "rke5oosj";
    $dbname = "id4956274_university_list";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);// or die('Error with MySQL connection');
    mysqli_query("SET NAMES 'utf8' ");
    mysqli_select_db($dbname);
*/

?>