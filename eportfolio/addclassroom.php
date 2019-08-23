<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "db_eportfolio";
$tb_name = "classroom";
$conn = mysql_connect($server,$user,$password);
if(!$conn)
	die("1. ไม่สามารถติดต่อกับ mysql ได้");
mysql_select_db($dbname,$conn)
	or die("2. ไม่สามารถเรียกใช้งานฐานข้อมูลได้");

mysql_query("SET character_set_result=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

$c_name = $_POST["c_name"];


if($c_name){	
	$sql = "SELECT * FROM $tb_name WHERE c_name = '$c_name'";
	$result = mysql_query($sql,$conn);
	$total = mysql_num_rows($result);

	if($total == 0){
		$sql = "INSERT INTO $tb_name (c_name) VALUES('$c_name')";
		mysql_query($sql,$conn)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
		mysql_close();
		echo "<script language=\"javascript\">";
		echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
		//echo "window.location = 'shwodept.php'";
		echo "window.history.back();";
		echo "</script>";
	}else{
		echo "<script language=\"javascript\">";
		echo "alert('ชื่อชั้นเรียนซ้ำ');";
		echo "window.history.back();";
		echo "</script>";
	}
}else{
	echo "<script language=\"javascript\">";
	echo "alert('กรุณาป้อนชื่อชั้นเรียน');";
	echo "window.history.back();";
	echo "</script>";	
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>