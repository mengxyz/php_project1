<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "connect.php";
$std_id = $_POST['std_id'];
$std_pic = $_POST['std_pic'];
$std_name = $_POST['std_name'];
$std_address = $_POST['std_address'];
$std_tel = $_POST['std_tel'];
$pa_id = $_POST['pa_id'];
$c_id = $_POST['c_id'];

$fileupload = $_FILES['photo']['tmp_name'];
$fileupload_name = uniqid().$_FILES['photo']['name'];

$sql = "SELECT * FROM student WHERE std_name = '$std_name' AND std_id != '$std_id'";
$total = mysql_query($sql,$conn);
if(mysql_num_rows($total) > 0){
	echo "<script language=\"javascript\">alert('นักเรียนซ้ำ');window.location = 'showstudent.php';</script>";
	return;
}

if($fileupload != ""){
	if($std_pic != ""){
		@unlink("./picture/$std_pic");
	}
	copy($fileupload,"./picture/".$fileupload_name);
	$sql = "UPDATE student SET std_name = '$std_name',std_address = '$std_address',std_tel = '$std_tel',pa_id = '$pa_id',c_id = '$c_id',std_pic = '$fileupload_name' WHERE std_id = '$std_id' ";	
}else{
	$sql = "UPDATE student SET std_name = '$std_name',std_address = '$std_address',std_tel = '$std_tel',pa_id = '$pa_id',c_id = '$c_id' WHERE std_id = '$std_id' ";
}

mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close();

?>
<script language="javascript">
alert("บันทึกข้อมูลเรียบร้อยเเล้ว");
window.location = "showstudent.php";
</script>>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>