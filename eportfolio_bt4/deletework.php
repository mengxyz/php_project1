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
$w_id = $_POST["w_id"];
$sql = "DELETE FROM work WHERE w_id = '$w_id'";
mysql_query($sql,$conn)
	or die("3. ไมสามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close(); 
echo success_h3("ลบข้อมูลเรีบยร้อยแล้ว","showwork.php")
?>
</body>
</html>