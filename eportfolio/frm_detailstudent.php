<?php

session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
$std_id = $_GET['std_id'];
$sql = "SELECT s.std_address,s.std_tel,s.std_name,c.c_name,p.pa_name,s.std_pic FROM student s,classroom c,parent p WHERE s.c_id = c.c_id AND s.std_id = '$std_id' AND s.pa_id = p.pa_id";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
$rs = mysql_fetch_array($result);	
mysql_close();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<table width="832" height="544" border="1" align="center">
  <tbody>
    <?php 
		include "head.php";
		include "admin_menu.php"; 
		?>
    <tr>
      <td height="485"><table width="404" border="1" align="center">
        <tr>
          <td colspan="2" bgcolor="#FFAD00"><div align="center">ข้อมูลอาจารย์</div></td>
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
      </table></td>
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
