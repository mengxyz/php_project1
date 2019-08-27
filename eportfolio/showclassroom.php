<?php
include "connect.php";
$sql = "SELECT * FROM classroom ORDER BY c_id";
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
      <td height="128"><table width="800" border="1" align="center">
        <tbody>
          <tr>
            <td width="266">รายงานข้อมูลชั้นเรียน</td>
            <td width="518">&nbsp;</td>
          </tr>
        </tbody>
      </table>
        <table width="800" border="1" align="center">
          <tr>
            <td width="95">รหัสชั้นเรียน</td>
            <td width="165">ชื่อชั้นเรียน</td>
            <td width="58">&nbsp;</td>
            <td width="176">&nbsp;</td>
            <td width="112">&nbsp;</td>
            <td width="78">&nbsp;</td>
            <td width="70">&nbsp;</td>
          </tr>
          <?php
		  	while($rs = mysql_fetch_array($result)){
		  ?>
          <tr>
            <td><?php echo "$rs[c_id]"; ?></td>
            <td><?php echo "$rs[c_name]"; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>จัดการผลงานะ</td>
            <td><div align="center"><?php echo "<a href=\"frm_editclassroom.php?c_id=$rs[c_id]\">"; ?>แก้ไข</a></div></td>
            <td><div align="center"><?php echo "<a href=\"deleteclassroom.php?c_id=$rs[c_id]\">"; ?>ลบ</a></div></td>
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