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
$po_id = $_POST['po_id'];
$po_name = $_POST['po_name'];
// check bank text
if($po_name){
	// check diplicate priamry key
	$sql = "SELECT * FROM position WHERE po_name = '$po_name' AND po_id != '$po_id'";
	$total = mysql_query($sql,$conn);
	
	if(mysql_num_rows($total) == 0){
		$sql = "UPDATE position SET po_name = '$po_name' WHERE po_id = '$po_id'";
		mysql_query($sql,$conn)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
	}else{
		echo error_h3("ชื่อตำเเหน่งซ้ำ","showposition.php");
		return;
	}
}else{
	echo error_h3("กรุณาป้อนชื่อตำเเหน่ง","showposition.php");
	return;
}
mysql_close();
echo success_h3("แก้ไขข้อมูลเรียบร้อยแล้ว","showposition.php");
?>
</body>
</html>