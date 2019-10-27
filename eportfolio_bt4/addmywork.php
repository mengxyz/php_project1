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
$t_id = $_POST['t_id'];
$w_id = $_POST['w_id'];
$sql = "SELECT * FROM work_detail WHERE w_id = '$w_id' AND t_id = '$t_id'";
//echo $sql;
$result = mysql_query($sql,$conn);
$total = mysql_fetch_array($result);
if($total == 0){
	$sql = "INSERT INTO work_detail (w_id,t_id) VALUES('$w_id','$t_id')";
	mysql_query($sql,$conn);
}else{
	echo error_h3("ผลงานซ้ำ","showmywork.php");
	return;
}
mysql_close();
echo success_h3("บันทึกข้อมูลเรียบร้อยเเล้ว","showmywork.php");
?>
</body>
</html>