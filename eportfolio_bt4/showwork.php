<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
$sql = "SELECT * FROM work ORDER BY w_id";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close();
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>รายงานข้อมูลผลงาน</title>
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
                                <td width="293">รายงานข้อมูลผลงาน</td>
                                <td width="491">
                                    <div align="right"><a href="frm_addwork.php"class="btn btn-success btn-sm"><i class="fas fa-plus-square"></i>เพิ่มผลงาน</a></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td >รหัสผลงาน</td>
                            <td >ชื่อผลงาน</td>
                            <td >ปี</td>
                            <td >หน่วยงาน</td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                        </tr>
                        <?php
		  	while($rs = mysql_fetch_array($result)){
		  ?>
                        <tr>
                            <td><?php echo "$rs[w_id]"; ?></td>
                            <td><?php echo "$rs[w_name]"; ?></td>
                            <td><?php echo "$rs[w_year]"; ?></td>
                            <td><?php echo "$rs[w_org]"; ?></td>
                            <td>
                                <div align="center">
                                    <?php echo "<a class=\"btn btn-warning text-white btn-sm\" href=\"frm_editwork.php?w_id=$rs[w_id]\">"; ?><i class="fas fa-pen"></i> แก้ไข</a></div>
                            </td>
                            <td>
                                <div align="center">
                                    <?php echo "<a class=\"btn btn-danger btn-sm\" href=\"frm_deletework.php?w_id=$rs[w_id]\">"; ?><i class="fas fa-trash-alt"></i> ลบ</a></div>
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