<?php

session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
	include "connect.php";
	$d_id = $_GET["d_id"];
	$sql = "SELECT * FROM department WHERE d_id = '$d_id'";
	$result = mysql_query($sql,$conn)
		or die().mysql_error();
	mysql_close();
	$rs = mysql_fetch_array($result);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<table width="851" height="390" border="1" align="center">
  <tbody>
   <?php
	  include "head.php";
	  include "admin_menu.php";
	  ?>
    <tr>
      <td height="184"><form action="editdept.php" method="post" name="form1" id="form1">
        <table width="324" border="1" align="center">
          <tbody>
            <tr>
              <td colspan="2" bgcolor="#FFAD00"><div align="center">แก้ไขกลุ่มสาระ</div></td>
              </tr>
            <tr>
              <td width="92">ชื่อกลุมสาระ</td>
              <td width="216">
                <input name="d_name" type="text" id="d_name" value="<?php echo "$rs[d_name]"; ?>">
                <input name="d_id" type="hidden" id="d_id" value="<?php echo "$rs[d_id]"; ?>"></td>
            </tr>
            <tr>
              <td colspan="2"><div align="center">
                <input type="submit" name="submit" id="submit" value="บันทึก">
                <input type="button" name="Button" onClick=window.history.back() id="reset" value="ยกเลิก">
              </div></td>
              </tr>
          </tbody>
        </table>
      </form></td>
    </tr>
    <?php include "foot.php"; ?>
  </tbody>
</table>
</body>
</html>
<?php 
}else{
    echo "<script> alert('Please Login');window.history.go(-1);</script>";
        exit();
}
?>
