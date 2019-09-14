<?php
include "connect.php";
$sql = "SELECT t.t_id,t.t_name,d.d_name FROM department d,teacher t WHERE t.d_id = d.d_id";
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
            <td width="266">รายงานข้อมูลอาจารย์</td>
            <td width="518"><div align="right">[ <a href="frm_addteacher.php">เพิ่มอาจารย์</a> ]</div></td>
          </tr>
        </tbody>
      </table>
        <table width="800" border="1" align="center">
          <tr>
            <td width="95">รหัสอาจารย์</td>
            <td width="165">ชื่อจารย์</td>
            <td width="58">กลุ่มสาระ</td>
            <td width="78">&nbsp;</td>
            <td width="70">&nbsp;</td>
          </tr>
          <?php
		  	while($rs = mysql_fetch_array($result)){
		  ?>
          <tr>
            <td><?php echo "$rs[t_id]"; ?></td>
            <td><?php echo "<a href=\"frm_detailteacher.php?t_id=$rs[t_id]\">$rs[t_name]</a>"?></td>
            <td><?php echo "$rs[d_name]"; ?></td>
            <td><div align="center"><?php echo "<a href=\"frm_editteacher.php?t_id=$rs[t_id]\">"; ?>แก้ไข</a></div></td>
            <td><div align="center"><?php echo "<a href=\"frm_deleteteacher.php?t_id=$rs[t_id]\">"; ?>ลบ</a></div></td>
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
