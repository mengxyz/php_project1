<?php
include "connect.php";

$std_name = $_POST['std_name'];
$std_address = $_POST['std_address'];
$std_tel = $_POST['std_tel'];
$pa_id = $_POST['pa_id'];
$c_id = $_POST['c_id'];

$fileupload = $_FILES['photo']['tmp_name'];
$fileupload_name = $_FILES['photo']['name'];

if($fileupload != ""){
	copy($fileupload,"./picture/".$fileupload_name);
	$sql = "INSERT INTO student (std_name,std_address,std_tel,pa_id,c_id,std_pic) VALUES ('$std_name','$std_address','$std_tel','$pa_id','$c_id','$fileupload_name')";	
}else{
	$sql = "INSERT INTO student (std_name,std_address,std_tel,pa_id,c_id) VALUES ('$std_name','$std_address','$std_tel','$pa_id','$c_id')";	
}
mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();	
mysql_close();

?>
<script language="javascript">
alert("บันทึกข้อมูลเรียบร้อยแล้ว");
//window.history.back();
window.location = "showstudent.php";
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