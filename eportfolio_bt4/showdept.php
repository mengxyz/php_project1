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
    <?php include "cdn.php"; ?>
</head>

<body>
    <?php include "admin.nav.php"; ?>
    <div class="container h-100 ">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card w-100">
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td >รายงานข้อมูลกลุ่มสาระ</td>
                                <td >
                                    <div align="right"><a  href="frm_adddept.php" class="btn btn-success btn-sm"><i class="fas fa-plus-square"></i> เพิ่มกลุ่มสาระ</a></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped table-bordered">
                        <tbody>

                            <tr>
                                <td>รหัสกลุมสาระ </td>
                                <td>หัวหน้ากลุ่มสาระ</td>
                                <td>ชื่อกลุ่มสาระ</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
			                        while($rs = mysql_fetch_array($result)){
			                      ?>
                            <tr>
                                <td ><?php echo "$rs[d_id]"; ?></td>
                                <td ><?php echo "$rs[t_name]"; ?></td>
                                <td ><?php echo "$rs[d_name]"; ?></td>
                                <td class="text-center" >
                                    <?php echo "<a class=\"btn btn-info btn-sm\" href=\"frm_adddeptdetail.php?d_id=$rs[d_id]\">"; ?>จัดการกลุ่มสาระ<?php echo "</a>" ?>
                                </td>
                                <td >
                                    <div align="center">
                                        <?php echo "<a class=\"btn btn-warning text-white btn-sm\" href=\"frm_editdept.php?d_id=$rs[d_id]\">"; ?><i class="fas fa-pen"></i> แก้ไข<?php echo "</a>" ?>
                                    </div>
                                </td>
                                <td >
                                    <div align="center">
                                        <?php echo "<a class=\"btn btn-danger btn-sm\" href=\"frm_deletedept.php?d_id=$rs[d_id]\">"; ?><i class="fas fa-trash-alt"></i> ลบ<?php echo "</a>"; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php
			  }
				?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php include "bt4footer.php"; ?>
    </div>
</body>

</html>
<?php 
}else{
    echo "<script> alert('Please Login');window.history.go(-1);</script>";
        exit();
}
?>