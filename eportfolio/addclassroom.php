<?php
include "connect.php";

$tb_name = "classroom";
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
		echo "window.location = 'showclassroom.php'";
		//echo "window.history.back();";
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