<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
<?php
include "cdn.php";
include "connect.php";
include "alert.php";
$d_name = $_POST["d_name"];
$d_id = $_POST["d_id"];
// check bank text
if($d_name){
	// check diplicate primary key
	$sql = " SELECT * FROM department WHERE d_name = '$d_name' AND d_id != '$d_id' ";
	$total = mysql_query($sql,$conn);
	echo mysql_num_rows($total);

	if(mysql_num_rows($total) == 0){
		$sql = "UPDATE department SET d_name = '$d_name' WHERE d_id = '$d_id'";
		mysql_query($sql,$conn)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
	}else{
		echo error_h3("ชื่อกลุ่มสาระซ้ำ","showdept.php"); 
		return;
	}
	
}else{
	echo error_h3("กรุณาป้อนชื่อกลุ่มสาระ","showdept.php"); 
	return;
}
mysql_close();
echo success_h3("แก้ไขข้อมูลเรียบร้อยแล้ว","showdept.php");
?>

</body>
</html>