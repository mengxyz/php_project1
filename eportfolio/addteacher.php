<?php
include "connect.php";

$t_name = $_POST['t_name'];
$t_address = $_POST['t_address'];
$t_tel = $_POST['t_tel'];
$t_username = $_POST['t_username'];
$t_password = $_POST['t_password'];
$po_id = $_POST['po_id'];
$d_id = $_POST['d_id'];

$fileupload = $_FILES['photo']['tmp_name'];
$fileupload_name = $_FILES['photo']['name'];

if($fileupload != ""){
	copy($fileupload,"./picture/".$fileupload_name);
	$sql = "INSERT INTO teacher (t_name,t_address,t_tel,t_pic,po_id,d_id,t_username,t_password)";
	$sql .= " VALUES ('$t_name','$t_address','$t_tel','$fileupload_name','$po_id','$d_id','$t_username','$t_password')";
}else{
	$sql = "INSERT INTO teacher (t_name,t_address,t_tel,po_id,d_id,t_username,t_password)";
	$sql .= " VALUES ('$t_name','$t_address','$t_tel','$po_id','$d_id','$t_username','$t_password')";
}
mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close();
?>

<script language="javascript">
alert("บันทึกข้อมูลเรียบร้อยแล้ว");
window.location = "frm_addteacher.php";
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>