<?php 

session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
$d_id = $_GET['d_id'];
$sql = "SELECT * FROM department WHERE d_id = '$d_id'";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
$rs = mysql_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เพิ่มกลุ่มสาระ</title>
</head>

<body>
<table width="832" border="1" align="center">
	<?php 
		include "head.php";
		include "admin_menu.php";
	?>
  <tr>
    <td><div align="center">
      <p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="adddeptdetail.php">
        <table width="246" border="1">
          <tr>
            <td colspan="2" bgcolor="#FFB700"><div align="center">จัดการหัวหน้ากลุ่มสาระ</div></td>
            </tr>
          <tr>
            <td>ชื่อกลุ่มสาระ</td>
            <td><?php echo "$rs[d_name]" ?>
              <input type="hidden" name="d_id" id="d_id" value="<?php echo "$d_id" ?>" /></td>
          </tr>
          <tr>
            <td width="90">&nbsp;</td>
            <td width="144"><div align="center">
              <select name="t_id" id="t_id">
                <?php
			  $sql1 = "SELECT * FROM teacher WHERE d_id = '$d_id'";
			  $result1 = mysql_query($sql1,$conn);
			  	while($rs1 = mysql_fetch_array($result1)){
					echo "<option value=\"$rs1[t_id]\"";
					if("$rs[t_id]" == "$rs1[t_id]") {echo "selected";}
					echo ">$rs1[t_name]";
					echo "</option>\n";
				}
			  ?>
              </select>
            </div></td>
          </tr>
          <tr>
            <td height="29" colspan="2"><div align="center">
              <input type="submit" name="button" id="button" value="บันทึก" />
              <input type="button" name="button2" id="button2" value="ยกเลิก" onclick="window.history.back()" />
            </div></td>
            </tr>
        </table>
      </form>
      <p>&nbsp;</p>
    </div></td>
  </tr>
  <?php
  	include "foot.php";
	?>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php 
}else{
    echo "<script> alert('Please Login');window.history.go(-1);</script>";
        exit();
}
?>
