<?php
include "connect.php";
$sql = "SELECT * FROM position ORDER BY po_id";
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
            <td width="239">รายงานข้อมูลตำเเหน่ง</td>
            <td width="415">&nbsp;</td>
          </tr>
        </tbody>
      </table>
        <table width="670" border="1" align="center">
          <tr>
            <td width="124">รหัสตำเเหน่ง</td>
            <td width="109">ชื่อตำเเหน่ง</td>
            <td width="182">&nbsp;</td>
            <td width="110">&nbsp;</td>
            <td width="111">&nbsp;</td>
          </tr>
          <?php
		  	while($rs = mysql_fetch_array($result)){
		  ?>
          <tr>
            <td><?php echo "$rs[po_id]"; ?></td>
            <td><?php echo "$rs[po_name]"; ?></td>
            <td>จัดการกลุ่มสาระ</td>
            <td><div align="center"><?php echo "<a href=\"frm_editposition.php?po_id=$rs[po_id]\">"; ?>แก้ไข</a></div></td>
            <td><div align="center"><?php echo "<a href=\"deleteposition.php?po_id=$rs[po_id]\">"; ?>ลบ</a></div></td>
          </tr>
          <?php
			}
		  ?>
      </table></td>
    </tr>
<?php include "foot.php"; ?>
  </tbody>
</table>
</body>
</html>