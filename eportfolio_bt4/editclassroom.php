<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
include "connect.php";
include "cdn.php";
include "alert.php";
$c_id = $_POST['c_id'];
$c_name = $_POST['c_name'];
// check bank text
if($c_name){
	// check diplicate priamry key
	$sql = "SELECT * FROM classroom WHERE c_name = '$c_name' AND c_id != '$c_id'";
	$total = mysql_query($sql,$conn);
	
	if(mysql_num_rows($total) == 0){
		$sql = "UPDATE classroom SET c_name = '$c_name' WHERE c_id = '$c_id'";
		mysql_query($sql,$conn)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
	}else{
		echo error_h3("ชื่อชั้นเรียนซ้ำ","showclassroom.php");
		return;
	}
}else{
	echo error_h3("กรุณาป้อนชื่อชั้นเรียน","showclassroom.php");
		return;
}
mysql_close();
echo success_h3("แก้ไขข้อมูลเรียบร้อยแล้ว","showclassroom.php");
		return;
?>
</body>
</html>