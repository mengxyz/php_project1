<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<?php
include "cdn.php";?>
</head>
<body>
<?php
include "connect.php";
include "alert.php";

$d_name = $_POST["d_name"];


if($d_name){	
	$sql = "SELECT * FROM department WHERE d_name = '$d_name'";
	$result = mysql_query($sql,$conn);
	$total = mysql_num_rows($result);

	if($total == 0){
		$sql = "INSERT INTO department (d_name) VALUES('$d_name')";
		mysql_query($sql,$conn)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
		mysql_close();
		echo success("บันทึกข้อมูลเรียบร้อยแล้ว","showdept.php");
	}else{
		echo error_h3("ชื่อกลุ่มสาระซ้ำ");
	}
}else{
	echo error_h3("กรุณาป้อนชื่อกลุ่มสาระ");
}
?>
</body>
</html>