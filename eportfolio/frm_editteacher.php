<?php
include "connect.php";
$t_id = $_GET['t_id'];

$sql = "SELECT * FROM teacher WHERE t_id = '$t_id'";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close();
$teacher = mysql_fetch_array($result);
$sql2 = "SELECT * FROM department"; 
$sql3 =  "SELECT * FROM position";
$result1 = mysql_query($sql2,$conn);
$result2 = mysql_query($sql3,$conn);

//echo $_GET['t_id'];	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<table width="851" height="542" border="1" align="center">
  <tbody>
   <?php
	  include "head.php";
	  include "admin_menu.php";
	  ?>
    <tr>
      <td height="511"><form action="editteacher.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table width="324" border="1" align="center">
          <tbody>
            <tr>
              <td colspan="2" bgcolor="#FFAD00"><div align="center">แก้ไขข้อมูลอาจารย์</div></td>
              </tr>
            <tr>
              <td width="92">Uername</td>
              <td width="216"><input value=<?php echo "$teacher[t_username]"; ?> type="text" name="textfield" id="textfield"></td>
            </tr>
            <tr>
                <td width="92">Password</td>
                <td width="216"><input value=<?php echo "$teacher[t_password]"; ?> type="text" name="textfield2" id="textfield2"></td>
            </tr>
            <tr>
              <td>ชื่อ - สกุล</td>
              <td><input type="text" value=<?php echo "$teacher[t_name]"; ?> name="textfield3" id="textfield3"></td>
            </tr>
            <tr>
              <td height="64">ที่อยู่</td>
              <td><textarea name="textfield4" id="textfield4"><?php echo "$teacher[t_address]"; ?></textarea></td>
            </tr>
            <tr>
              <td>เบอร์โทร</td>
              <td><input value=<?php echo "$teacher[t_tel]"; ?> type="text" name="textfield5" id="textfield5" value=<?php echo "$teacher[t_name]"; ?>></td>
            </tr>
            <tr>
              <td height="118">รูป</td>
              <td>
              	<img src=<?php echo "picture/"."$teacher[t_pic]" ?> width="65" height="65">    
                <input type="file" name="fileField" id="fileField">   
              </tr>
            <tr>
              <td>ตำเเหน่ง</td>
              <td><select name="select2" id="select2">
              <?php
			  	while($position = mysql_fetch_array($result2)){
					if("$position[po_id]" != "$teacher[po_id]")
						echo "<option value=$position[po_id]>$position[po_name]</optgroup>";
					else 
						echo "<option selected value=$position[po_id]>$position[po_name]</optgroup>";
				}
			  ?>
              </select></td>
            </tr>
            <tr>
              <td>กลุ่มสาระ</td>
              <td><select name="select" id="select">
              <?php
			  	while($dept = mysql_fetch_array($result1)){
					if("$dept[d_id]" != "$teacher[d_id]")
						echo "<option value=$dept[d_id]>$dept[d_name]</optgroup>";
					else 
						echo "<option selected value=$dept[d_id]>$dept[d_name]</optgroup>";
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
    <?php include "foot.php"; ?>
  </tbody>
</table>
</body>
</html>