<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
include "connect.php";
include "cdn.php";
include "alert.php";

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
		echo success_h3("บันทึกข้อมูลเรียบร้อยแล้ว","showposition.php");
		return;
	}else{
		echo error_h3("ชื่อตำเเหน่งซ้ำ");
		return;
	}
}else{
	echo error_h3("กรุณาป้อนชื่อตำเเหน่ง");
	return;
}
?>
</body>
</html>