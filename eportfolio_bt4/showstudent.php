<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
$sql = "SELECT s.std_id,s.std_name,c.c_name FROM student s,classroom c WHERE s.c_id = c.c_id";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close();
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>รายงานข้อมูลนักเรียน</title>
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
                                <td width="266">รายงานข้อมูลนักเรียน</td>
                                <td width="518">
                                    <div align="right">
                                        <a href="frm_addstudent.php" class="btn btn-success btn-sm"><i
                                                class="fas fa-plus-square"></i> เพิ่มข้อมูลนักเรียน</a>
                                        <a class="btn btn-info btn-sm" href="showparent.php"><i class="fas fa-pen"></i> จัดการข้อมูลผู้ปกครอง</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td width="156">รหัสนักเรียน</td>
                            <td width="212">ชื่อนักเรียน</td>
                            <td width="152">ชั้นเรียน</td>
                            <td width="128">&nbsp;</td>
                            <td width="118">&nbsp;</td>
                        </tr>
                        <?php
		  	while($rs = mysql_fetch_array($result)){
		  ?>
                        <tr>
                            <td><?php echo "$rs[std_id]"; ?></td>
                            <td><?php echo "<a href=\"frm_detailstudent.php?std_id=$rs[std_id]\">$rs[std_name]</a>"?>
                            </td>
                            <td><?php echo "$rs[c_name]"; ?></td>
                            <td>
                                <div align="center">
                                    <?php echo "<a class=\"btn btn-warning text-white btn-sm\" href=\"frm_editstudent.php?std_id=$rs[std_id]\">"; ?><i class="fas fa-pen"></i> แก้ไข</a>
                                </div>
                            </td>
                            <td>
                                <div align="center">
                                    <?php echo "<a class=\"btn btn-danger btn-sm\" href=\"frm_deletestudent.php?std_id=$rs[std_id]\">"; ?><i class="fas fa-trash-alt"></i> ลบ</a>
                                </div>
                            </td>
                        </tr>
                        <?php
			}
		  ?>
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