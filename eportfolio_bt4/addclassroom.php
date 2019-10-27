
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<?php include "cdn.php"; ?>
</head>

<body><?php
include "connect.php";
include "alert.php";

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
		echo success_h3("บันทึกข้อมูลเรียบร้อยแล้ว","showclassroom.php");
	}else{
		echo error_h3("ชื่อชั้นเรียนซ้ำ");
	}
}else{
	echo error_h3("กรุณาป้อนชื่อชั้นเรียน");	
}
?>
</body>
</html>