
<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])){
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เพิ่มผู้ปกครอง</title>
</head>

<body>
	<table width="832" border="1" align="center">
		<?php 
		include "head.php";
		include "admin_menu.php";
		?>
  <tr>
    <td><div align="center">
      <p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="addparent.php">
        <table width="351" border="1">
          <tr>
            <td colspan="2" bgcolor="#FFB700"><div align="center">เพิ่มผู้ปกครอง</div></td>
            </tr>
          <tr>
            <td>รหัสบัตรประชาชน</td>
            <td><input name="pa_id" type="text" id="pa_id" maxlength="13" /></td>
          </tr>
          <tr>
            <td>ชื่อ</td>
            <td>
              <input name="pa_name" type="text" id="pa_name"></td>
          </tr>
          <tr>
            <td>อาชีพ</td>
            <td><input name="pa_occupation" type="text" id="pa_occupation"></td>
          </tr>
          <tr>
            <td width="195">เบอร์โทร</td>
            <td width="144"><input name="pa_tel" type="text" id="pa_tel"></td>
          </tr>
          <tr>
            <td height="29" colspan="2"><div align="center">
              <input type="submit" name="button" id="button" value="บันทึก" />
              <input type="reset" name="button2" id="button2" value="ยกเลิก" />
            </div></td>
            </tr>
        </table>
      </form>
      <p>&nbsp;</p>
    </div></td>
  </tr>
<?php include "foot.php" ?>
</table>
<?php 
}else{
    echo "<script> alert('Please Login');window.history.go(-1);</script>";
        exit();
}
?>
