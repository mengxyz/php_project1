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
$pa_id = $_POST['pa_id'];
$pa_name = $_POST['pa_name'];
$pa_occupation = $_POST['pa_occupation'];
$pa_tel = $_POST['pa_tel'];
// check bank text
if(strlen($pa_id)==13 && $pa_name && $pa_occupation && $pa_tel){
	// check diplicate priamry key
	$sql = "SELECT * FROM parent WHERE pa_name = '$pa_name' AND pa_id != '$pa_id'";
	$total = mysql_query($sql,$conn);
	
	if(mysql_num_rows($total) == 0){
		$sql = "UPDATE parent SET pa_name = '$pa_name',pa_occupation = '$pa_occupation',pa_tel = '$pa_tel' WHERE pa_id = '$pa_id'";
		mysql_query($sql,$conn)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
	}else{
		echo error_h3("ผู้ปกครองซ้ำ","showparent.php");
		return;
	}
}else{
	$msg = "";
	if(strlen($pa_id)!=13) $msg = $msg." รหัสบัตรประชาชน";
	if(!$pa_name) $msg = $msg." ชื่อ";
	if(!$pa_occupation) $msg = $msg." อาชีพ";	
	if(!$pa_tel) $msg = $msg." เบอร์โทร";
	echo error_h3("กรุณาป้อน{$msg}","showparent.php");
	return;
}
mysql_close();
echo success_h3("แก้ไขข้อมูลเรียบร้อยแล้ว","showparent.php");
?>
</body>
</html>