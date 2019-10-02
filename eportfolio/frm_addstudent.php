<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เพิ่มข้อมูลนักเรียน</title>
</head>

<body>
	<table width="832" border="1" align="center">
		<?php
		include "head.php";
		include "admin_menu.php";
		include "connect.php";
		?>
  <tr>
    <td><div align="center">
      <p>&nbsp;</p>
      <form action="addstudent.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table width="375" border="1">
          <tr>
            <td colspan="2" bgcolor="#FFB700"><div align="center">เพิ่มข้อมูลนักเรียน</div></td>
            </tr>
          <tr>
            <td width="132">ชื่อ - สกุล</td>
            <td width="227"><input type="text" name="std_name" id="std_name" /></td>
          </tr>
          <tr>
            <td height="44">ที่อยู่</td>
            <td><textarea name="std_address" id="std_address"></textarea></td>
          </tr>
          <tr>
            <td>เบอร์โทร</td>
            <td><input type="text" name="std_tel" id="std_tel"></td>
          </tr>
          <tr>
            <td>รูป</td>
            <td><div align="right">
              <input type="file" name="photo" id="photo">
              </div></td>
          </tr>
          <tr>
            <td>ผู้ปกครอง</td>
            <td>
            <select required name="pa_id" id="pa_id">   
            <option value="">-- ผู้ปกครอง --</option>
            <?php
            	$sql1 = "SELECT * FROM parent";
				$result1 = mysql_query($sql1,$conn);
				while($rs1 = mysql_fetch_array($result1)){
					echo "<option value=$rs1[pa_id]>$rs1[pa_name]</option>";	
				}
			?>
            </select>
            </td>
          </tr>
          <tr>
            <td>ชั้นเรียน</td>
            <td>
            <select required name="c_id" id="c_id">
            <option value="">-- ชั้นเรียน --</option>
            <?php
            	$sql2 = "SELECT * FROM classroom";
				$result2 = mysql_query($sql2,$conn);
				while($rs2 = mysql_fetch_array($result2)){
					echo "<option value=$rs2[c_id]>$rs2[c_name]</option>";
				}
			?>
            </select></td>
          </tr>
          <tr>
            <td height="29" colspan="2"><div align="center">
              <input type="submit" name="button" id="button" value="บันทึก" />
              <input type="reset" name="button2" id="button2" value="ยกเลิก" />
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