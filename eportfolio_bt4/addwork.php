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
$tb_name = "work";

$w_name = $_POST["w_name"];
$w_year = $_POST["w_year"];
$w_org = $_POST["w_org"];


if($w_name && $w_org && $w_year){	
	$sql = "SELECT * FROM $tb_name WHERE w_name = '$w_name' AND w_year = '$w_year' AND w_org = '$w_org'";
	$result = mysql_query($sql,$conn);
	$total = mysql_num_rows($result);

	if($total == 0){
		$sql = "INSERT INTO $tb_name (w_name,w_year,w_org) VALUES('$w_name','$w_year','$w_org')";
		mysql_query($sql,$conn)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
		mysql_close();
		echo success_h3("บันทึกข้อมูลเรียบร้อยแล้ว","showwork.php");
		return;
	}else{
		echo error_h3("ผลงานซ้ำ");
		return;
	}
}else{
	$msg = "";
	if(!$w_name) $msg = $msg." ชื่อผลงาน";
	if(!$w_year) $msg = $msg." ปี";
	if(!$w_org) $msg = $msg." หน่วยงาน";
	echo error_h3("กรุณาป้อน{$msg}'");
	return;	
}
?>
</body>
</html>