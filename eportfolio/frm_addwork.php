
<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เพิ่มผลงาน</title>
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
      <form id="form1" name="form1" method="post" action="addwork.php">
        <table width="273" border="1">
          <tr>
            <td colspan="2" bgcolor="#FFB700"><div align="center">เพิ่มผลงาน</div></td>
            </tr>
          <tr>
            <td>ชื่อผลงาน</td>
            <td><input type="text" name="w_name" id="w_name" /></td>
          </tr>
          <tr>
            <td>ปี</td>
            <td>
              <input name="w_year" type="text" id="w_year"></td>
          </tr>
          <tr>
            <td width="90">หน่วยงาน</td>
            <td width="144"><input name="w_org" type="text" id="w_org"></td>
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
<?php
include "foot.php";
?>
</table>
<?php 
}else{
    echo "<script> alert('Please Login');window.history.go(-1);</script>";
        exit();
}
?>
