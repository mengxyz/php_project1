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

	$t_name = $_POST['t_name'];
	$t_address = $_POST['t_address'];
	$t_tel = $_POST['t_tel'];
	$t_username = $_POST['t_username'];
	$t_password = $_POST['t_password'];
	$po_id = $_POST['po_id'];
	$d_id = $_POST['d_id'];

	$fileupload = $_FILES['photo']['tmp_name'];
	$fileupload_name = uniqid() . $_FILES['photo']['name'];

	if ($t_name && $t_username) {

		$sql = "SELECT * FROM teacher WHERE t_name = '$t_name' OR t_username = '$t_username'";
		$result = mysql_query($sql, $conn);
		$total = mysql_fetch_array($result);

		if ($total == 0) {
			if ($fileupload != "") {
				if (!is_dir("./picture")) {
					mkdir("./picture");
				}
				copy($fileupload, "./picture/" . $fileupload_name);
				$sql = "INSERT INTO teacher (t_name,t_address,t_tel,t_pic,po_id,d_id,t_username,t_password)";
				$sql .= " VALUES ('$t_name','$t_address','$t_tel','$fileupload_name','$po_id','$d_id','$t_username','$t_password')";
			} else {
				$sql = "INSERT INTO teacher (t_name,t_address,t_tel,po_id,d_id,t_username,t_password)";
				$sql .= " VALUES ('$t_name','$t_address','$t_tel','$po_id','$d_id','$t_username','$t_password')";
			}
			mysql_query($sql, $conn)
				or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
		} else {
			echo error_h3("ชื่อ - สกุล หรือ username ซ้ำ", "frm_addteacher.php");
			return;
		}
	} else {
		$msg = "";
		if (!$t_username) $msg .= " username";
		if (!$t_name) $msg .= " ชื่อ - สกุล";
		echo error_h3("กรุณาป้อน{$msg}", "frm_addteacher.php");
		return;
	}

	mysql_close();
	echo success_h3("บันทึกข้อมูลเรียบร้อยแล้ว","showteacher.php");
	?>
</body>

</html>