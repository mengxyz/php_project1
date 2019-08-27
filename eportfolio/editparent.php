<?php
include "connect.php";
$pa_id = $_POST['pa_id'];
$pa_id_old = $_POST['pa_id_old'];
$pa_name = $_POST['pa_name'];
$pa_occupation = $_POST['pa_occupation'];
$pa_tel = $_POST['pa_tel'];
// check bank text
if(strlen($pa_id)==13 && $pa_name && $pa_occupation && $pa_tel){
	// check diplicate priamry key
	$sql = "SELECT * FROM parent WHERE pa_id = '$pa_id'";
	$total = mysql_query($sql,$conn);
	
	if(mysql_num_rows($total) == 0){
		$sql = "UPDATE parent SET pa_id = '$pa_id',pa_name = '$pa_name',pa_occupation = '$pa_occupation',pa_tel = '$pa_tel' WHERE pa_id = '$pa_id_old'";
		mysql_query($sql,$conn)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
	}else{
		echo "<script language=\"javascript\">";
		echo "alert('ผู้ปกครองซ้ำ');";
		echo "window.location = \"showparent.php\";";
		echo "</script>";
	}
}else{
	$msg = "";
	if(strlen($pa_id)!=13) $msg = $msg." รหัสบัตรประชาชน";
	if(!$pa_name) $msg = $msg." ชื่อ";
	if(!$pa_occupation) $msg = $msg." อาชีพ";	
	if(!$pa_tel) $msg = $msg." เบอร์โทร";
	echo "<script language=\"javascript\">alert('กรุณาป้อน{$msg}');window.location = 'showparent.php';</script>";
}
mysql_close();
?>
<script language="javascript">
alert("แก้ไขข้อมูลเรียบร้อยแล้ว");
window.location = "showparent.php";
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