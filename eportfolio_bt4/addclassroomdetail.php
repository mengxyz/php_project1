<?php
include "connect.php";
$std_id = $_POST['std_id'];
$t_id = $_POST['t_id'];
$c_id = $_POST['c_id'];
$sql = "UPDATE classroom SET t_id = '$t_id',std_id = '$std_id' WHERE c_id = '$c_id'";
mysql_query($sql,$conn);
mysql_close();
?>
<script language="javascript">
alert("บันทึกข้อมูลเรียบร้อยแล้ว")
window.location = "showclassroom.php"
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