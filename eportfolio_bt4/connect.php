<?php
/*
$server = "10.10.10.63";
$user = "s601102064106";
$password = "601102064106";
$dbname = "db601102064106";
*/
$server = "localhost";
$user = "root";
$password = "";
$dbname = "db_eportfolio";
$conn = mysql_connect($server,$user,$password);
if(!$conn)
	die("1. ไม่สามารถติดต่อกับ mysql ได้");
mysql_select_db($dbname,$conn)
	or die("2. ไม่สามารถเรียกใช้งานฐานข้อมูลได้");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
?>