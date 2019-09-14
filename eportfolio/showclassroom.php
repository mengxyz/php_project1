<?php
include "connect.php";
$sql = "SELECT c.c_name,c.c_id,t.t_name,s.std_name FROM classroom c LEFT JOIN student s ON c.std_id = s.std_id LEFT JOIN teacher t ON c.t_id = t.t_id ORDER BY c.c_id";
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
            <td width="518"><div align="right">[ <a href="frm_addclassroom.php">เพิ่มชั้นเรียน</a> ]</div></td>
          </tr>
        </tbody>
      </table>
        <table width="800" border="1" align="center">
          <tr>
            <td width="93">รหัสชั้นเรียน</td>
            <td width="154">ชื่อชั้นเรียน</td>
            <td width="116">ครูประจำชั้น</td>
            <td width="118">หัวหน้าชั้นเรียน</td>
            <td width="134">&nbsp;</td>
            <td width="73">&nbsp;</td>
            <td width="66">&nbsp;</td>
          </tr>
          <?php
		  	while($rs = mysql_fetch_array($result)){
		  ?>
          <tr>
            <td><?php echo "$rs[c_id]"; ?></td>
            <td><?php echo "$rs[c_name]"; ?></td>
            <td><?php echo "$rs[t_name]"; ?></td>
            <td><?php echo "$rs[std_name]"; ?></td>
            <td><div align="center"><?php echo "<a href=\"frm_addclassroomdetail.php?c_id=$rs[c_id]\">"; ?>จัดการข้อมูลชั้นเรียน</a></div></td>
            <td><div align="center"><?php echo "<a href=\"frm_editclassroom.php?c_id=$rs[c_id]\">"; ?>แก้ไข</a></div></td>
            <td><div align="center"><?php echo "<a href=\"frm_deleteclassroom.php?c_id=$rs[c_id]\">"; ?>ลบ</a></div></td>
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