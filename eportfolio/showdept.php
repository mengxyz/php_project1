<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
$sql = "SELECT d.d_id,d.d_name,t.t_name FROM department d LEFT JOIN teacher t ON d.t_id = t.t_id ORDER BY d.d_id ASC";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close();
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>รายงานข้อมูลกลุ่มสาระ</title>
</head>

<body>
    <table width="832" height="292" border="1" align="center">
        <tbody>
            <?php 
		include "head.php";
		include "admin_menu.php"; 
		?>
            <tr>
                <td height="128">
                    <p>&nbsp;</p>
                    <table width="783" border="0" align="center">
                        <tbody>
                            <tr>
                                <td width="240">รายงานข้อมูลกลุ่มสาระ</td>
                                <td width="416">
                                    <div align="right">[ <a href="frm_adddept.php">เพิ่มกลุ่มสาระ</a> ]</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="783" border="1" align="center">
                        <tbody>

                            <tr>
                                <td>รหัสกลุมสาระ </td>
                                <td>หัวหน้ากลุ่มสาระ</td>
                                <td>ชื่อกลุ่มสาระ</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <?php
			                        while($rs = mysql_fetch_array($result)){
			                      ?>
                            <tr>
                                <td width="100"><?php echo "$rs[d_id]"; ?></td>
                                <td width="149"><?php echo "$rs[t_name]"; ?></td>
                                <td width="164"><?php echo "$rs[d_name]"; ?></td>
                                <td width="174">
                                    <?php echo "<a href=\"frm_adddeptdetail.php?d_id=$rs[d_id]\">"; ?>จัดการกลุ่มสาระ<?php echo "</a>" ?>
                                </td>
                                <td width="80">
                                    <div align="center">
                                        <?php echo "<a href=\"frm_editdept.php?d_id=$rs[d_id]\">"; ?>แก้ไข<?php echo "</a>" ?>
                                    </div>
                                </td>
                                <td width="76">
                                    <div align="center">
                                        <?php echo "<a href=\"frm_deletedept.php?d_id=$rs[d_id]\">"; ?>ลบ<?php echo "</a>"; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php
			  }
				?>
                        </tbody>
                    </table>
                    <p>&nbsp;</p>
                </td>
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