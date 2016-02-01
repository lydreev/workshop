<?php 
$db_host='localhost';
$db_database='workshop';
$db_username='root';
$db_password='';
$connection = mysql_connect($db_host, $db_username, $db_password); mysql_query("SET NAMES 'utf8'"); 
//if (!$connection) { die("Невозможно подключиться к базе данных:". mysql_error()); }
$db_select = mysql_select_db($db_database); 
//if (!$db_select) { die("Невозможно выбрать базу данных:". mysql_error()); } 
?>