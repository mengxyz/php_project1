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
    <?php include "cdn.php"; ?>
</head>

<body>
    <?php include "admin.nav.php"; ?>
    <div class="container h-100 ">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card col-sm-4">
                <div class="card-body" align="center">
                    <h5 class="card-title text-center">เพิ่มกลุ่มสาระ</h5>
                    <br>
                    <form name="form1" method="post" action="addmywork.php">
                        <table width="347" border="1">
                            <tr>
                                <td colspan="2" bgcolor="#FFAD00">
                                    <div align="center">เพิ่มข้อมูลผลงานครูอาจารย์</div>
                                </td>
                            </tr>
                            <tr>
                                <td>ผลงาน</td>
                                <td>
                                    <select required name="w_id" id="w_id">
                                        <option value="">-- ผลงาน --</option>
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
                                <td colspan="2">
                                    <div align="center">
                                        <input type="submit" name="button" id="button" value="บันทึก">
                                        <input type="reset" name="button2" id="button2" value="ยกเลิก">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                </div>
                </div>
                </div>
</body>

</html>
<?php 
}else{
    echo "<script> alert('Please Login');window.history.go(-1);</script>";
        exit();
}
?>