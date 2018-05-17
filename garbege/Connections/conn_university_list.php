<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn_university_list = "localhost";
$database_conn_university_list = "university_list";
$username_conn_university_list = "root";
$password_conn_university_list = "123456";
$conn_university_list = mysql_pconnect($hostname_conn_university_list, $username_conn_university_list, $password_conn_university_list) or trigger_error(mysql_error(),E_USER_ERROR); 

mysql_query("set names utf8");
?>