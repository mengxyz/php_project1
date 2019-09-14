<?php 
ob_start();
include "connect.php";

$login = $_POST['login'];
$password = $_POST['password'];
$user_status = $_POST['user_status'];

if(!empty($login) && !empty($password)){
	if($user_status == '1'){
	$sql = "SELECT * FROm teacher WHERE t_username = '$login' AND t_password = '$password'";
	$result = mysql_query($sql);
	$total = mysql_num_rows($result);
	if($total){
		session_start();
		$_SESSION["valid_uname"]=$login;
		$_SESSION["valid_pwd"]=$password;
		mysql_close($conn);
		echo "<script> alert('Wellcome');window.location = 'frm_editme.php';</script>";
		exit();
	}else{
		echo "<script> alert('Not Found');window.history.go(-1);</script>";
		exit();
	}
	}else{
		if($login == "Admin" && $password == "Admin"){
			session_start();
			$_SESSION["valid_uname"]=$login;
			$_SESSION["valid_pwd"]=$password;
			mysql_close($conn);
			echo "<script> alert('Wellcome');window.location = 'showdept.php';</script>";
			exit();
		}else{
			echo "<script> alert('Not Found');window.history.go(-1);</script>";
			exit();	
		}
	}
}else{
	echo "<script> alert('ขออภัย...!..กรุณากรอกข้อมูลให้ครบ');window.history.go(-1);</script>";
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>