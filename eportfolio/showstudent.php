<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
$sql = "SELECT s.std_id,s.std_name,c.c_name FROM student s,classroom c WHERE s.c_id = c.c_id";
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
            <td width="266">รายงานข้อมูลผลงาน</td>
            <td width="518"><div align="right">[<a href="frm_addstudent.php">เพิ่มข้อมูลนักเรียน</a>][ <a href="showparent.php">จัดการข้อมูลผู้ปรครอง</a> ]</div></td>
          </tr>
        </tbody>
      </table>
        <table width="800" border="1" align="center">
          <tr>
            <td width="156">รหัสนักเรียน</td>
            <td width="212">ชื่อนักเรียน</td>
            <td width="152">ชั้นเรียน</td>
            <td width="128">&nbsp;</td>
            <td width="118">&nbsp;</td>
          </tr>
          <?php
		  	while($rs = mysql_fetch_array($result)){
		  ?>
          <tr>
            <td><?php echo "$rs[std_id]"; ?></td>
            <td><?php echo "<a href=\"frm_detailstudent.php?std_id=$rs[std_id]\">$rs[std_name]</a>"?></td>
            <td><?php echo "$rs[c_name]"; ?></td>
            <td><div align="center"><?php echo "<a href=\"frm_editstudent.php?std_id=$rs[std_id]\">"; ?>แก้ไข</a></div></td>
            <td><div align="center"><?php echo "<a href=\"frm_deletestudent.php?std_id=$rs[std_id]\">"; ?>ลบ</a></div></td>
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