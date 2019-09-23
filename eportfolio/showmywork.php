<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])){
	include "connect.php";
	$uname = $_SESSION['valid_uname'];
	$sql = "SELECT * FROM teacher WHERE t_username = '$uname'";
	$result = mysql_query($sql,$conn);
	$rs = mysql_fetch_array($result);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เพิ่มชั้นเรียน</title>
</head>

<body>
	<table width="832" border="1" align="center">
		<?php
		include "head.php";
		include "teacher_menu.php";
		?>
  <tr>
    <td><div align="center">
      <p>&nbsp;</p>
      <table width="832" border="0">
        <tr>
          <td><div align="center">ผลงานครูอาจารย์</div></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <table width="615" border="0">
        <tr>
          <td width="406">อาจารย์ <?php echo "$rs[t_name]"; ?></td>
          <td width="134"><div align="right"><a href="frm_addmywork.php">[เพิ่มข้อมูล]</a></div></td>
        </tr>
      </table>
      <table width="615" border="1">
        <tr>
          <td width="156" bgcolor="#FFAD00">ชื่อผลงาน</td>
          <td width="115" bgcolor="#FFAD00">ปีที่รับ</td>
          <td width="185" bgcolor="#FFAD00">หน่วยงานที่มอบ</td>
          <td width="131" bgcolor="#FFAD00">&nbsp;</td>
        </tr>
        <?php 
			$sql = "SELECT w.w_id,w.w_name,w_year,w_org FROM work w,work_detail wd WHERE wd.t_id = $rs[t_id] AND wd.w_id = w.w_id";
			$result2 = mysql_query($sql,$conn);
			while($rs2 = mysql_fetch_array($result2)){
		?>
        <tr>
          <td><?php echo "$rs2[w_name]"; ?></td>
          <td><?php echo "$rs2[w_year]"; ?></td>
          <td><?php echo "$rs2[w_org]"; ?></td>
          <td><div align="center">
          <?php echo "<a href=\"frm_deletemywork.php?w_id=$rs2[w_id]&t_id=$rs[t_id]\">ลบ</option>";
		  ?>
          </div></td>
        </tr>
    <?php } ?>
    </table>	  
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div></td>
  </tr>
		<?php include "foot.php" ?>
</table>
</body>
</html>
<?php 
}else{
    echo "<script> alert('Please Login');window.history.go(-1);</script>";
        exit();
}
?>
