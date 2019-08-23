<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "db_eportfolio";
$conn = mysql_connect($server,$user,$password);
if(!$conn)
	die("1. ไม่สามารถติดต่อกับ mysql ได้");
mysql_select_db($dbname,$conn)
	or die("2. ไม่สามารถเรียกใช้งานฐานข้อมูลได้");

mysql_query("SET character_set_result=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

$po_name = $_POST["po_name"];


if($po_name){	
	$sql = "SELECT * FROM position WHERE po_name = '$po_name'";
	$result = mysql_query($sql,$conn);
	$total = mysql_num_rows($result);

	if($total == 0){
		$sql = "INSERT INTO position (po_name) VALUES('$po_name')";
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
		echo "alert('ชื่อตำเเหน่งซ้ำ');";
		echo "window.history.back();";
		echo "</script>";
	}
}else{
	echo "<script language=\"javascript\">";
	echo "alert('กรุณาป้อนชื่อตำเเหน่ง');";
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