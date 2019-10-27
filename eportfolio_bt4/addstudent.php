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

$std_name = $_POST['std_name'];
$std_address = $_POST['std_address'];
$std_tel = $_POST['std_tel'];
$pa_id = $_POST['pa_id'];
$c_id = $_POST['c_id'];

$fileupload = $_FILES['photo']['tmp_name'];
$fileupload_name = uniqid().$_FILES['photo']['name'];
if($std_name && $std_address && $std_tel){
	$sql = "SELECT * FROM student WHERE std_name = '$std_name'";
	$result = mysql_query($sql,$conn);
	$total = mysql_fetch_array($result);
	
	if($total == 0){
		if($fileupload != ""){
			if(!is_dir("./picture")){
				mkdir("./picture");
			}
			copy($fileupload,"./picture/".$fileupload_name);
			$sql = "INSERT INTO student (std_name,std_address,std_tel,pa_id,c_id,std_pic) VALUES ('$std_name','$std_address','$std_tel','$pa_id','$c_id','$fileupload_name')";	
		}else{
			$sql = "INSERT INTO student (std_name,std_address,std_tel,pa_id,c_id) VALUES ('$std_name','$std_address','$std_tel','$pa_id','$c_id')";	
		}
		mysql_query($sql,$conn)
		or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
	}else{
		echo error_h3("ชื่อ - สกุล ซ้ำ","frm_addstudent.php");
		return;
	}
}else{
	$msg = "";
	if(!$std_name) $msg .= " ชื่อ - สกุล";
	if(!$std_address) $msg .= " ที่อยู่";
	if(!$std_tel) $msg .= " เบอร์โทร";
	echo error_h3("กรุณาป้อน{$msg}","frm_addstudent.php");
	return;	
}	
mysql_close();
echo success_h3("บันทึกข้อมูลเรียบร้อยแล้ว","showstudent.php");
?>
</body>
</html>