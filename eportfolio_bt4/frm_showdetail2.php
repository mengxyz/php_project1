<?php
include "connect.php";
$std_id = $_GET['std_id'];
$sql = "SELECT s.std_id,std_address,std_tel,std_pic,std_name,pa_name,c_name FROM student s LEFT JOIN classroom c ON s.c_id = c.c_id LEFT JOIN parent p ON s.pa_id = p.pa_id WHERE s.std_id = '$std_id'";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
$rs = mysql_fetch_array($result);	
mysql_close();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รายละเอียด</title>
</head>

<body>
<table width="832" height="544" border="1" align="center">
  <tbody>
    <?php 
		include "head.php";
		include "none_menu.php"; 
		?>
    <tr>
      <td height="485"><div align="center">
        <p>&nbsp;</p>
        <table width="404" border="1" align="center">
          <tr>
            <td colspan="2" bgcolor="#FFAD00"><div align="center">ข้อมูลนักเรียน</div></td>
            </tr>
          <tr>
            <td height="146" colspan="2">
              <div align="center">
                <?php 
				        if("$rs[std_pic]" != ""){
			          ?>
                <img src="<?php echo "./picture/$rs[std_pic]" ?>" width="100" height="130">
                <?php } ?>
              </div></td>
            </tr>
          <tr>
            <td width="92">ชื่อ - สกุล</td>
            <td width="296"><?php echo "$rs[std_name]"; ?></td>
            </tr>
          <tr>
            <td>ที่อยู่</td>
            <td><?php echo "$rs[std_address]"; ?></td>
            </tr>
          <tr>
            <td>เบอร์โทร</td>
            <td><?php echo "$rs[std_tel]"; ?></td>
            </tr>
          <tr>
            <td>ชั้นเรียน</td>
            <td><?php echo "$rs[c_name]"; ?></td>
            </tr>
          <tr>
            <td>ผู้ปกครอง</td>
            <td><?php echo "$rs[pa_name]"; ?></td>
            </tr>
        </table>
        <p>&nbsp;</p>
      </div></td>
    </tr>
<?php include "foot.php"; ?>
  </tbody>
</table>
</body>
</html>
