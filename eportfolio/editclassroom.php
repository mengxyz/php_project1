<?php
include "connect.php";
$c_id = $_POST['c_id'];
$c_name = $_POST['c_name'];
// check bank text
if($c_name){
	// check diplicate priamry key
	$sql = "SELECT * FROM classroom WHERE c_id = '$c_id'";
	$total = mysql_query($sql,$conn);
	
	if(mysql_num_rows($total) == 0){
		$sql = "UPDATE classroom SET c_name = '$c_name' WHERE c_id = '$c_id'";
		mysql_query($sql,$conn)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
	}else{
		echo "<script language=\"javascript\">";
		echo "alert('ชื่อชั้นเรียนซ้ำ');";
		echo "window.location = \"showclassroom.php\";";
		echo "</script>";
	}
}else{
	echo "<script language=\"javascript\">alert('กรุณาป้อนชื่อชั้นเรียน');window.location = 'showclassroom.php';</script>";
}
mysql_close();
?>
<script language="javascript">
alert("แก้ไขข้อมูลเรียบร้อยแล้ว");
window.location = "showclassroom.php";
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