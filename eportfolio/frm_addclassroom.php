
<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])){
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เพิ่มชั้นเรียน</title>
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
      <form id="form1" name="form1" method="post" action="addclassroom.php">
        <table width="273" border="1">
          <tr>
            <td colspan="2" bgcolor="#FFB700"><div align="center">เพิ่มชั้นเรียน</div></td>
            </tr>
          <tr>
            <td>ชื่อชั้นเรียน</td>
            <td><input type="text" name="c_name" id="c_name" /></td>
          </tr>
          <tr>
            <td>std_id</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="90">t_id</td>
            <td width="144">&nbsp;</td>
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
</body>
</html>
<?php 
}else{
    echo "<script> alert('Please Login');window.history.go(-1);</script>";
        exit();
}
?>
