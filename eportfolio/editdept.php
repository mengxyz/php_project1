<?php
include "connect.php";
$d_name = $_POST["d_name"];
$d_id = $_POST["d_id"];
// check bank text
if($d_name){
	// check diplicate primary key
	$sql = "SELECT * FROM department WHERE d_id = '$d_id'";
	$total = mysql_query($sql,$conn);

	if(mysql_num_rows($total) == 0){
		$sql = "UPDATE department SET d_name = '$d_name' WHERE d_id = '$d_id'";
		mysql_query($sql,$conn)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
	}else{
		echo "<script language=\"javascript\">";
		echo "alert('ชื่อชั้นเรียนซ้ำ');";
		echo "window.location = \"showdept.php\";";
		echo "</script>";
	}
	
}else{
	echo "<script language=\"javascript\">alert('กรุณาป้อนชื่อกลุ่มสาระ');window.location = 'showdept.php';</script>";
}
mysql_close();
?>
<script language="javascript">
	alert("เเก้ไขข้อมูลเรียบร้อยแล้ว");
	window.location = 'showdept.php';
</script>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>