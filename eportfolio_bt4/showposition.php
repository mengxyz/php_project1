<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
$sql = "SELECT * FROM position ORDER BY po_id";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
	mysql_close();
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>รายงานข้อมูลตำเเหน่ง</title>
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
                                <td width="239">รายงานข้อมูลตำเเหน่ง</td>
                                <td width="415">
                                    <div align="right"><a class="btn btn-success btn-sm" href="frm_addposition.php"><i class="fas fa-plus-square"></i> เพิ่มตำเเหน่ง</a></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>รหัสตำเเหน่ง</td>
                            <td>ชื่อตำเเหน่ง</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <?php while($rs = mysql_fetch_array($result)){ ?>
                        <tr>
                            <td><?php echo "$rs[po_id]"; ?></td>
                            <td><?php echo "$rs[po_name]"; ?></td>
                            <td>
                                <div align="center">
                                    <?php echo "<a class=\"btn btn-warning text-white btn-sm\" href=\"frm_editposition.php?po_id=$rs[po_id]\">"; ?><i
                                        class="fas fa-pen"></i> แก้ไข</a></div>
                            </td>
                            <td>
                                <div align="center">
                                    <?php echo "<a class=\"btn btn-danger text-white btn-sm\" href=\"frm_deleteposition.php?po_id=$rs[po_id]\">"; ?><i
                                        class="fas fa-trash-alt"></i> ลบ</a></div>
                            </td>
                        </tr>
                        <?php } ?>
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