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
$c_id = $_POST['c_id'];
$sql = "DELETE FROM classroom WHERE c_id = '$c_id'";
mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลคำสั่งได้").mysql_error();
mysql_close();
echo success_h3("ลบข้อมูลเรียบร้อยเเล้ว","showclassroom.php");
?>
</body>
</html>