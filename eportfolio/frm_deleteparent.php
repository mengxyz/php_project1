<?php

session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])){
include "connect.php";
$pa_id = $_GET['pa_id'];
$sql = "SELECT * FROM parent WHERE pa_id = '$pa_id'";
$result = mysql_query($sql,$conn)
	or die("ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close(); 
$rs = mysql_fetch_array($result);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ลบผู้ปกครอง</title>
</head>

<body>
<table width="851" height="431" border="1" align="center">
  <tbody>
   <?php
	  include "head.php";
	  include "admin_menu.php";
	  ?>
    <tr>
      <td height="225"><form action="deleteparent.php" method="post" name="form1" id="form1">
        <table width="350" border="1" align="center">
          <tbody>
            <tr>
              <td colspan="2" bgcolor="#FFAD00"><div align="center">ลบข้อมูลผู้ปกครอง</div></td>
              </tr>
            <tr>
              <td width="92">รหัสบัตรประชาชน</td>
              <td width="216">
                <input name="pa_id" type="text" id="pa_id" value="<?php echo "$rs[pa_id]"; ?>" maxlength="13" readonly>
                <input name="pa_id_old" type="hidden" id="pa_id_old" value="<?php echo "$rs[pa_id]"; ?>"></td>
            </tr>
            <tr>
              <td width="92">ชิ่อ</td>
              <td width="216">
                <input name="pa_name" type="text" id="pa_name" value="<?php echo "$rs[pa_name]"; ?>" readonly>
            </tr>
            <tr>
              <td width="92">อาชีพ</td>
              <td width="216">
                <input name="pa_occupation" type="text" id="pa_occupation" value="<?php echo "$rs[pa_occupation]"; ?>" readonly>
            </tr>
            <tr>
              <td width="92">เบอร์โทร</td>
              <td width="216">
                <input name="pa_tel" type="text" id="pa_tel" value="<?php echo "$rs[pa_tel]"; ?>" readonly>
            </tr>
            <tr>
              <td colspan="2"><div align="center">
                <input type="submit" name="submit" id="submit" value="ลบ">
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
