<?php

session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])){
include "connect.php";
$c_id = $_GET['c_id'];
$sql = "SELECT * FROM classroom WHERE c_id = '$c_id'";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
$rs = mysql_fetch_array($result); 	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<table width="851" height="390" border="1" align="center">
  <tbody>
   <?php
	  include "head.php";
	  include "admin_menu.php";
	?>
    <tr>
      <td height="184"><form action="addclassroomdetail.php" method="post" name="form1" id="form1">
        <table width="324" border="1" align="center">
          <tbody>
            <tr>
              <td colspan="2" bgcolor="#FFAD00"><div align="center">จัดการข้อมูลชั้นเรียน</div></td>
              </tr>
            <tr>
              <td width="92">ชื่อชั้นเรียน</td>
              <td width="216">
                <input name="c_name" type="text" id="c_name" value="<?php echo "$rs[c_name]"; ?>" readonly>
                <input name="c_id" type="hidden" id="c_id" value="<?php echo "$rs[c_id]"; ?>"></td>
            </tr>
            <tr>
                <td width="92">หัวหน้าห้อง</td>
                <td width="216"><select name="std_id" id="std_id">
                <?php
					$sql = "SELECT * FROM student";
					$result1 = mysql_query($sql,$conn);
					while($rs1 = mysql_fetch_array($result1)){
						echo "<option value=\"$rs1[std_id]\">$rs1[std_name]</option>";	
					}	
				?>
                </select></td>
            </tr>
            <tr>
                <td width="92">ครูประชั้น</td>
                <td width="216"><select name="t_id" id="t_id">
                <?php
					$sql = "SELECT * FROM teacher";
					$result2 = mysql_query($sql,$conn);
					while($rs2 = mysql_fetch_array($result2)){
						echo "<option value=\"$rs2[t_id]\">$rs2[t_name]</option>";	
					}	
				?>
                </select></td>
              </tr>
            <tr>
              <td colspan="2"><div align="center">
                <input type="submit" name="submit" id="submit" value="บันทึก">
                <input type="button" name="Button" onClick=window.history.back() id="reset" value="ยกเลิก">
              </div></td>
              </tr>
          </tbody>
        </table>
      </form></td>
    </tr>
    <?php include "foot.php"; 
	mysql_close();
	?>
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
