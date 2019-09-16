<?php

session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
$std_id = $_GET['std_id'];

$sql = "SELECT * FROM student WHERE std_id = '$std_id'";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close();
$rs = mysql_fetch_array($result);	
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
      <form action="deletestudent.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table width="375" border="1">
          <tr>
            <td colspan="2" bgcolor="#FFB700"><div align="center">แก้ไขข้อมูลนักเรียน</div></td>
            </tr>
          <tr>
            <td width="132">ชื่อ - สกุล</td>
            <td width="227"><input name="std_name" type="text" id="std_name" value="<?php echo "$rs[std_name]"; ?>" readonly />
              <input name="std_id" type="hidden" id="std_id" value="<?php echo "$rs[std_id]"; ?>">
              <input name="std_pic" type="hidden" id="std_pic" value="<?php echo "$rs[std_pic]"; ?>"></td>
          </tr>
          <tr>
            <td height="44">ที่อยู่</td>
            <td><textarea name="std_address" readonly="readonly" id="std_address"><?php echo "$rs[std_address]"; ?></textarea></td>
          </tr>
          <tr>
            <td>เบอร์โทร</td>
            <td><input name="std_tel" type="text" id="std_tel" value="<?php echo "$rs[std_tel]"; ?>" readonly="readonly" ></td>
          </tr>
          <tr>
            <td height="170">รูป</td>
            <td><div align="center">
              <?php
                	if("$rs[std_pic]" != ""){
				?>  
              <img src="<?php echo "./picture/$rs[std_pic]"; ?>" width="100" height="130" >
              <?php 
					}
				?>
            </div></td>
          </tr>
          <tr>
            <td>ผู้ปกครอง</td>
            <td>
            <select name="pa_id" id="pa_id">   
            <?php
			  $sql1 = "SELECT * FROM parent";
			  $result1 = mysql_query($sql1,$conn);
			  	while($rs1 = mysql_fetch_array($result1)){
					echo "<option value=\"$rs1[pa_id]\"";
					if("$rs[pa_id]" == "$rs1[pa_id]") {echo "selected";}
					echo ">$rs1[pa_name]";
					echo "</option>\n";
				}
			  ?>
            </select>
            </td>
          </tr>
          <tr>
            <td>ชั้นเรียน</td>
            <td>
            <select name="c_id" id="c_id">
            <?php
			  $sql1 = "SELECT * FROM classroom";
			  $result1 = mysql_query($sql1,$conn);
			  	while($rs1 = mysql_fetch_array($result1)){
					echo "<option value=\"$rs1[c_id]\"";
					if("$rs[c_id]" == "$rs1[c_id]") {echo "selected";}
					echo ">$rs1[c_name]";
					echo "</option>\n";
				}
			  ?>
            </select></td>
          </tr>
          <tr>
            <td height="29" colspan="2"><div align="center">
              <input type="submit" name="button" id="button" value="ลบ" />
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
