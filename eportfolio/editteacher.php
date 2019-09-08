<?php
include "connect.php";
$t_pic = $_POST['t_pic'];
$t_name = $_POST['t_name'];
$t_id = $_POST['t_id'];
$t_tel = $_POST['t_tel'];
$t_address = $_POST['t_address'];
$t_username = $_POST['t_username'];
$t_password = $_POST['t_password'];
$d_id = $_POST['d_id'];
$po_id = $_POST['po_id'];

$fileupload = $_FILES['photo']['tmp_name'];
$fileupload_name = $_FILES['photo']['name'];

if($fileupload != ""){
	if($t_pic != ""){
		unlink("./picture/$t_pic");
	}
	copy($fileupload,"./picture/".$fileupload_name);
	$sql = "UPDATE teacher SET t_name = '$t_name',t_address = '$t_address',t_tel = '$t_tel',";
	$sql .= "t_username = '$t_username',t_password = '$t_password',d_id = '$d_id',po_id = '$po_id',";
	$sql .= "t_pic = '$fileupload_name' WHERE t_id = '$t_id'";
}else{
	$sql = "UPDATE teacher SET t_name = '$t_name',t_address = '$t_address',t_tel = '$t_tel',";
	$sql .= "t_username = '$t_username',t_password = '$t_password',d_id = '$d_id',po_id = '$po_id'";
	$sql .= " WHERE t_id = '$t_id'";
}

mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close();
?>
<script language="javascript">
alert("บันทึกข้อมูลเรียบร้อยเเล้ว");
window.location = "showteacher.php";
</script>>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>