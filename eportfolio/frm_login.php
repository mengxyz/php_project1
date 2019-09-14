<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<table width="832" height="544" border="1" align="center">
  <tbody>
    <?php 
		include "head.php";
		include "none_menu.php" 
		?>
    <tr>
      <td height="485"><form name="form1" method="post" action="login.php">
        <table width="404" border="1" align="center">
          <tr>
            <td colspan="2" bgcolor="#FFAD00"><div align="center">ข้อมูลอาจารย์</div></td>
          </tr>
          <tr>
            <td>ชื่อล็อกอิน</td>
            <td><input type="text" name="login" id="login"></td>
          </tr>
          <tr>
            <td width="92">รหัสผ่าน</td>
            <td width="296"><input type="password" name="password" id="password"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><p>
              <input name="user_status" type="radio" id="radio" value="1">
              ครูอาจารย์
  </p>
              <p>
                <input type="radio" name="user_status" id="radio2" value="0">
              ผู้ดูเเลระบบ</p></td>
          </tr>
          </table>
        <p>&nbsp;</p>
        <div align="center">
          <input type="submit" name="button" id="button" value="เข้าสู่ระบบ">
          <input type="reset" name="g" id="g" value="ยกเลิก">
        </div>
      </form></td>
    </tr>
	<?php include "foot.php"; ?>
  </tbody>
</table>
</body>
</html>
