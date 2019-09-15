<?php

session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])){
include "connect.php";
$sql = "SELECT * FROM work ORDER BY w_id";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<table width="832" height="292" border="1" align="center">
  <tbody>
    <?php 
		include "head.php";
		include "admin_menu.php"; 
		?>
    <tr>
      <td height="128"><p>&nbsp;</p>
        <table width="800" border="1" align="center">
        <tbody>
          <tr>
            <td width="293">รายงานข้อมูลผลงาน</td>
            <td width="491"><div align="right">[ <a href="frm_addwork.php">เพิ่มผลงาน</a> ]</div></td>
          </tr>
        </tbody>
      </table>
        <table width="800" border="1" align="center">
          <tr>
            <td width="79">รหัสผลงาน</td>
            <td width="149">ชื่อผลงาน</td>
            <td width="53">ปี</td>
            <td width="151">หน่วยงาน</td>
            <td width="188">&nbsp;</td>
            <td width="67">&nbsp;</td>
            <td width="67">&nbsp;</td>
          </tr>
          <?php
		  	while($rs = mysql_fetch_array($result)){
		  ?>
          <tr>
            <td><?php echo "$rs[w_id]"; ?></td>
            <td><?php echo "$rs[w_name]"; ?></td>
            <td><?php echo "$rs[w_year]"; ?></td>
            <td><?php echo "$rs[w_org]"; ?></td>
            <td>จัดการข้อมูลผลงาน</td>
            <td><div align="center"><?php echo "<a href=\"frm_editwork.php?w_id=$rs[w_id]\">"; ?>แก้ไข</a></div></td>
            <td><div align="center"><?php echo "<a href=\"frm_deletework.php?w_id=$rs[w_id]\">"; ?>ลบ</a></div></td>
          </tr>
          <?php
			}
		  ?>
      </table>
      <p>&nbsp;</p></td>
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
