<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
$sql = "SELECT t.t_id,t.t_name,d.d_name FROM department d,teacher t WHERE t.d_id = d.d_id";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close();
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>รายงานข้อมูลอาจารย์t</title>
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
                                <td width="266">รายงานข้อมูลอาจารย์</td>
                                <td width="518">
                                    <div align="right"><a href="frm_addteacher.php" class="btn btn-success btn-sm"><i class="fas fa-user-plus"></i> เพิ่มอาจารย์</a></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td >รหัสอาจารย์</td>
                            <td >ชื่อจารย์</td>
                            <td >กลุ่มสาระ</td>
                            <td ></td>
                            <td ></td>
                        </tr>
                        <?php while($rs = mysql_fetch_array($result)){?>
                        <tr>
                            <td><?php echo "$rs[t_id]"; ?></td>
                            <td><?php echo "<a href=\"frm_detailteacher.php?t_id=$rs[t_id]\">$rs[t_name]</a>"?></td>
                            <td><?php echo "$rs[d_name]"; ?></td>
                            <td>
                                <div align="center">
                                    <?php echo "<a class=\"btn btn-warning text-white btn-sm\" href=\"frm_editteacher.php?t_id=$rs[t_id]\">"; ?><i class="fas fa-pen"></i> แก้ไข</a></div>
                            </td>
                            <td>
                                <div align="center">
                                    <?php echo "<a class=\"btn btn-danger text-white btn-sm\" href=\"frm_deleteteacher.php?t_id=$rs[t_id]\">"; ?><i class="fas fa-trash-alt"></i> ลบ</a></div>
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