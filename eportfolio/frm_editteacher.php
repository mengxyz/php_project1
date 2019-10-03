<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
$t_id = $_GET['t_id'];

$sql = "SELECT * FROM teacher WHERE t_id = '$t_id'";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close();
$rs = mysql_fetch_array($result);	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>แก้ไขข้อมูลอาจารย์</title>
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
              <td width="216"><input readonly value=<?php echo "$rs[t_username]"; ?> type="text" name="t_username" id="t_username"></td>
            </tr>
            <tr>
                <td width="92">Password</td>
                <td width="216"><input value=<?php echo "$rs[t_password]"; ?> type="text" name="t_password" id="t_password"></td>
            </tr>
            <tr>
              <td>ชื่อ - สกุล</td>
              <td><input type="text" value=<?php echo "$rs[t_name]"; ?> name="t_name" id="t_name"></td>
            </tr>
            <tr>
              <td height="64">ที่อยู่</td>
              <td><textarea name="t_address" id="t_address"><?php echo "$rs[t_address]"; ?></textarea></td>
            </tr>
            <tr>
              <td>เบอร์โทร</td>
              <td><input type="text" name="t_tel" id="t_tel" value=<?php echo "$rs[t_tel]"; ?>></td>
            </tr>
            <tr>
              <td height="118">รูป</td>
              <td>
              	<?php
                	if("$rs[t_pic]" != ""){
				?>  
                <img src="<?php echo "./picture/$rs[t_pic]"; ?>" width="100" height="130" >
                <?php 
					}
				?>
                <input type="file" name="photo" id="photo">   
              </tr>
            <tr>
              <td>ตำเเหน่ง</td>
              <td><select name="po_id" id="po_id">
              <?php
			  $sql1 = "SELECT * FROM position";
			  $result1 = mysql_query($sql1,$conn);
			  	while($rs1 = mysql_fetch_array($result1)){
					echo "<option value=\"$rs1[po_id]\"";
					if("$rs[po_id]" == "$rs1[po_id]") {echo "selected";}
					echo ">$rs1[po_name]";
					echo "</option>\n";
				}
			  ?>
              </select></td>
            </tr>
            <tr>
              <td>กลุ่มสาระ</td>
              <td><select name="d_id" id="d_id">
              <?php
			  $sql1 = "SELECT * FROM department";
			  $result1 = mysql_query($sql1,$conn);
			  	while($rs1 = mysql_fetch_array($result1)){
					echo "<option value=\"$rs1[d_id]\"";
					if("$rs[d_id]" == "$rs1[d_id]") {echo "selected";}
					echo ">$rs1[d_name]";
					echo "</option>\n";
				}
			  ?>
			  </select></td>
            </tr>
            <tr>
              <td colspan="2"><div align="center">
                <input type="submit" name="submit" id="submit" value="บันทึก">
                <input type="button" name="Button" onClick=window.history.back() id="reset" value="ยกเลิก">
                 <input type="hidden" name="t_id" id="t_id" value="<?php echo "$rs[t_id]"; ?>">
      			<input type="hidden" name="t_pic" id="t_pic" value="<?php echo "$rs[t_pic]" ;?>" >
                </div></td>
            </tr>
          </tbody>
        </table>
      </form>
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