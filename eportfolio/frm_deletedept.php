
<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ลบกลุ่มสาระ</title>
</head>

<body>
<table width="832" border="1" align="center">
	<?php 
		include "head.php";
		include "admin_menu.php";
		include "connect.php";
		$d_id = $_GET['d_id'];
		$sql = "SELECT * FROM department WHERE d_id = '$d_id'";
		$result = mysql_query($sql,$conn);
		$rs = mysql_fetch_array($result);
	?>
  <tr>
    <td><div align="center">
      <p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="deletedept.php">
        <table width="246" border="1">
          <tr>
            <td colspan="2" bgcolor="#FFB700"><div align="center">ลบกลุ่มสาระ</div></td>
            </tr>
          <tr>
            <td width="90">ชื่อกลุ่มสาระ</td>
            <td width="144"><input value= <?php echo "$rs[d_name]" ?> name="d_name" type="text" id="d_name" readonly="readonly" />
              <input name="hiddenField" type="hidden" id="hiddenField" value="<?php echo "$d_id" ?>" /></td>
          </tr>
          <tr>
            <td height="29" colspan="2"><div align="center">
              <input type="submit" name="button" id="button" value="ลบ" />
              <input type="button" onclick="window.history.back()" name="button2" id="button2" value="ยกเลิก" />
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
