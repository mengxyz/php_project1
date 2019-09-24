<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เพิ่มข้อมูลอาจารย์</title>
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
      <form action="addteacher.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table width="375" border="1">
          <tr>
            <td colspan="2" bgcolor="#FFB700"><div align="center">เพิ่มข้อมูลอาจารย์</div></td>
            </tr>
          <tr>
            <td width="132">ชื่อ - สกุล</td>
            <td width="227"><input type="text" name="t_name" id="t_name" /></td>
          </tr>
          <tr>
            <td height="44">ที่อยู่</td>
            <td><textarea name="t_address" id="t_address"></textarea></td>
          </tr>
          <tr>
            <td>เบอร์โทร</td>
            <td><input type="text" name="t_tel" id="t_tel"></td>
          </tr>
          <tr>
            <td> Username</td>
            <td><input type="text" name="t_username" id="t_username"></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="text" name="t_password" id="t_password"></td>
          </tr>
          <tr>
            <td>รูป</td>
            <td><div align="right">
              <input type="file" name="photo" id="photo">
            </div></td>
          </tr>
          <tr>
            <td>ตำเเหน่ง</td>
            <td>
            <select name="po_id" id="po_id">
            
            <?php
            	$sql1 = "SELECT * FROM position";
				$result1 = mysql_query($sql1,$conn);
				echo "sssss";
				while($rs1 = mysql_fetch_array($result1)){
					echo "<option value=$rs1[po_id]>$rs1[po_name]</option>";	
				}
			?>
            </select>
            </td>
          </tr>
          <tr>
            <td>กลุ่มสาระ</td>
            <td>
            <select name="d_id" id="d_id">
            <?php
            	$sql2 = "SELECT * FROM department";
				$result2 = mysql_query($sql2,$conn);
				while($rs2 = mysql_fetch_array($result2)){
					echo "<option value=$rs2[d_id]>$rs2[d_name]</option>";
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