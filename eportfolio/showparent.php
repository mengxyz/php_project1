<?php
include "connect.php";
$sql = "SELECT * FROM parent ORDER BY pa_id";
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
      <td height="128"><table width="810" border="1" align="center">
        <tbody>
          <tr>
            <td width="303">รายงานข้อมูลผู้ปกครอง</td>
            <td width="491">&nbsp;</td>
          </tr>
        </tbody>
      </table>
        <table width="810" border="1" align="center">
          <tr>
            <td width="143">รหัสบัตรประชาชน</td>
            <td width="154">ชื่อ</td>
            <td width="106">อาชีพ</td>
            <td width="100">เบอร์โทร</td>
            <td width="112">&nbsp;</td>
            <td width="76">&nbsp;</td>
            <td width="73">&nbsp;</td>
          </tr>
          <?php
		  	while($rs = mysql_fetch_array($result)){
		  ?>
          <tr>
            <td><?php echo "$rs[pa_id]"; ?></td>
            <td><?php echo "$rs[pa_name]"; ?></td>
            <td><?php echo "$rs[pa_occupation]"; ?></td>
            <td><?php echo "$rs[pa_tel]"; ?></td>
            <td>จัดการผลงานะ</td>
            <td><div align="center"><?php echo "<a href=\"frm_editparent.php?pa_id=$rs[pa_id]\">"; ?>แก้ไข</a></div></td>
            <td><div align="center"><?php echo "<a href=\"deleteparent.php?pa_id=$rs[pa_id]\">"; ?>ลบ</a></div></td>
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
