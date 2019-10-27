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
	$tb_name = "parent";

	$pa_id = $_POST["pa_id"];
	$pa_name = $_POST["pa_name"];
	$pa_occupation = $_POST["pa_occupation"];
	$pa_tel = $_POST["pa_tel"];


	if (strlen($pa_id) == 13 && $pa_name && $pa_occupation && $pa_tel) {
		$sql = "SELECT * FROM $tb_name WHERE pa_id = '$pa_id'";
		$result = mysql_query($sql, $conn);
		$total = mysql_num_rows($result);

		if ($total == 0) {
			$sql = "INSERT INTO $tb_name VALUES('$pa_id','$pa_name','$pa_occupation','$pa_tel')";
			mysql_query($sql, $conn)
				or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
			mysql_close();
			echo success_h3("บันทึกข้อมูลเรียบร้อยแล้ว", "showparent.php");
			return;
		} else {
			echo error_h3("ผู้ปกครองซ้ำ");
			return;
		}
	} else {
		$msg = "";
		if (strlen($pa_id) != 13) $msg = $msg . " รหัสบัตรประชาชน";
		if (!$pa_name) $msg = $msg . " ชื่อ";
		if (!$pa_occupation) $msg = $msg . " อาชีพ";
		if (!$pa_tel) $msg = $msg . " เบอร์โทร";
		echo error_h3("กรุณาป้อน{$msg}");
	}
	?>
</body>

</html>