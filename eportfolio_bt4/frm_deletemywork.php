<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])){
	include "connect.php";
	$w_id = $_GET['w_id'];
	$t_id = $_GET['t_id'];
	$uname = $_SESSION['valid_uname'];
	$sql = "SELECT * FROM work WHERE w_id = '$w_id'";
	$result = mysql_query($sql,$conn);
	$rs = mysql_fetch_array($result);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ลบผลงาน</title>
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
      <p>&nbsp;</p>
      <form action="deletemywork.php" method="post">
      <table width="375" border="1">
        <tr>
          <td colspan="2" bgcolor="#FFAD00"><div align="center">ลบผลงาน</div></td>
          </tr>
        <tr>
          <td width="120">ชื่อผลงาน</td>
          <td width="239"><?php echo "$rs[w_name]";?>
            <input type="hidden" value="<?php echo "$t_id";?>" name="t_id" id="t_id">
            <input type="hidden" value="<?php echo "$w_id";?>" name="w_id" id="w_id"></td>
        </tr>
        <tr>
          <td>ปีที่รับ</td>
          <td><?php echo "$rs[w_year]";?></td>
        </tr>
        <tr>
          <td>หน่วยงานที่มอบ</td>
          <td><?php echo "$rs[w_org]";?></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <input type="submit" name="button2" id="button2" value="ลบ">
            <input type="button" onclick="window.history.back()" name="button" id="button" value="ยกเลิก">
          </div></td>
          </tr>
      </table>
      </form>
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
