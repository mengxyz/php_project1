<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
$sql = "SELECT c.c_name,c.c_id,t.t_name,s.std_name FROM classroom c LEFT JOIN student s ON c.std_id = s.std_id LEFT JOIN teacher t ON c.t_id = t.t_id ORDER BY c.c_id";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close();
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>รายงานข้อมูลชั้นเรียน</title>
    <?php include "cdn.php"; ?>
</head>

<body>
    <?php include "admin.nav.php"; ?>
    <div class="container h-100 ">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card w-100">
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td>รายงานข้อมูลชั้นเรียน</td>
                            <td>
                                <div align="right"><a href="frm_addclassroom.php" class="btn btn-success btn-sm"><i
                                            class="fas fa-plus-square"></i> เพิ่มชั้นเรียน</a></div>
                            </td>
                        </tr>
                    </table>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>รหัสชั้นเรียน</td>
                            <td>ชื่อชั้นเรียน</td>
                            <td>ครูประจำชั้น</td>
                            <td>หัวหน้าชั้นเรียน</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php
		  	while($rs = mysql_fetch_array($result)){
		  ?>
                        <tr>
                            <td><?php echo "$rs[c_id]"; ?></td>
                            <td><?php echo "$rs[c_name]"; ?></td>
                            <td><?php echo "$rs[t_name]"; ?></td>
                            <td><?php echo "$rs[std_name]"; ?></td>
                            <td>
                                <div align="center">
                                    <?php echo "<a class=\"btn btn-info btn-sm\" href=\"frm_addclassroomdetail.php?c_id=$rs[c_id]\">"; ?>จัดการข้อมูลชั้นเรียน</a>
                                </div>
                            </td>
                            <td>
                                <div align="center">
                                    <?php echo "<a class=\"btn btn-warning text-white btn-sm\" href=\"frm_editclassroom.php?c_id=$rs[c_id]\">"; ?><i
                                        class="fas fa-pen"></i> แก้ไข</a></div>
                            </td>
                            <td>
                                <div align="center">
                                    <?php echo "<a class=\"btn btn-danger btn-sm\" href=\"frm_deleteclassroom.php?c_id=$rs[c_id]\">"; ?><i
                                        class="fas fa-trash-alt"></i> ลบ</a></div>
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