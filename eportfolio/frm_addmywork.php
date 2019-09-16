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
      
      	  
      <form name="form1" method="post" action="addmywork.php">
<table width="347" border="1">
  <tr>
    <td colspan="2" bgcolor="#FFAD00"><div align="center">เพิ่มข้อมูลผลงานครูอาจารย์</div></td>
    </tr>
  <tr>
    <td>ผลงาน</td>
    <td><select name="w_id" id="w_id">
    	<?php
        	$sql = "SELECT * FROM work";
			$result2 = mysql_query($sql,$conn);
			while($rs2 = mysql_fetch_array($result2)){
				echo "<option value=\"$rs2[w_id]\">$rs2[w_name]</option>";	
			}
		?>
      </select>
      <input type="hidden" name="t_id" id="t_id" value="<?php echo "$rs[t_id]"; ?>"></td>
    </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="button" id="button" value="บันทึก">
      <input type="reset" name="button2" id="button2" value="ยกเลิก">
      </div></td>
    </tr>
</table>
      </form>
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
