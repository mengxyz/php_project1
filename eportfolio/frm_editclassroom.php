<?php
include "connect.php";
$c_id = $_GET['c_id'];
$sql = "SELECT * FROM classroom WHERE c_id = '$c_id'";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
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
      <td height="184"><form action="editclassroom.php" method="post" name="form1" id="form1">
        <table width="324" border="1" align="center">
          <tbody>
            <tr>
              <td colspan="2" bgcolor="#FFAD00"><div align="center">แก้ไขชั้นเรียน</div></td>
              </tr>
            <tr>
              <td width="92">ชื่อชั้นเรียน</td>
              <td width="216">
                <input name="c_name" type="text" id="c_name" value="<?php echo "$rs[c_name]"; ?>">
                <input name="c_id" type="hidden" id="c_id" value="<?php echo "$rs[c_id]"; ?>"></td>
            </tr>
            <tr>
                <td width="92">&nbsp;</td>
                <td width="216">&nbsp;</td>
            </tr>
            <tr>
                <td width="92">&nbsp;</td>
                <td width="216">&nbsp;</td>
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