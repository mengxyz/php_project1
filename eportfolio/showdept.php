<?php
include "connect.php";
$tb_name = "department";
$sql = "SELECT * FROM $tb_name ORDER BY d_id ASC";
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
		include "admin_menu.php" 
		?>
    <tr>
      <td height="128"><table width="670" border="1" align="center">
        <tbody>
          <tr>
            <td width="240">รายงานข้อมูลกลุ่มสาระ</td>
            <td width="416"><div align="right">[ <a href="frm_adddept.php">เพิ่มกลุ่มสาระ</a> ]</div></td>
          </tr>
        </tbody>
      </table>
        <table width="670" border="1" align="center">
          <tbody>
			  
            <tr>
                <td>รหัสกลุมสาระ </td>
                <td>ชื่อกลุ่มสาระ</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
			<?php
			  while($rs = mysql_fetch_array($result)){
			?>
            <tr>
              <td width="126"><?php echo "$rs[d_id]"; ?></td>
              <td width="107"><?php echo "$rs[d_name]"; ?></td>
              <td width="154">จัดการกลุ่มสาระ</td>
              <td width="100"><div align="center">
			  <?php echo "<a href=\"frm_editdept.php?d_id=$rs[d_id]\">"; ?>แก้ไข<?php echo "</a>" ?></div></td>
              <td width="149"><div align="center">
             <?php echo "<a href=\"frm_deletedept.php?d_id=$rs[d_id]\">"; ?>ลบ<?php echo "</a>"; ?></div></td>
            </tr>
			  <?php
			  }
				?>
          </tbody>
      </table></td>
    </tr>
<?php include "foot.php"; ?>
  </tbody>
</table>
</body>
</html>