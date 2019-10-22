<?php 
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
$d_id = $_GET['d_id'];
$sql = "SELECT * FROM department WHERE d_id = '$d_id'";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
$rs = mysql_fetch_array($result);
?>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>จัดการหัวหน้ากลุ่มสาระ</title>
    <?php include "cdn.php"; ?>
</head>

<body>
    <?php include "admin.nav.php"; ?>
    <div class="container h-100 ">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card col-sm-4">
                <div class="card-body" align="center">
                    <h5 class="card-title text-center">จัดการหัวหน้ากลุ่มสาระ</h5>
                    <form id="form1" name="form1" method="post" action="adddeptdetail.php">

                        <input type="hidden" name="d_id" id="d_id" value="<?php echo "$d_id" ?>" /></td>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ชื่อกลุ่มสาระ</span>
                            </div>
                            <input value="<?php echo "$rs[d_name]" ?>" readonly name="d_name" type="text"
                                class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">อาจารย์</span>
                            </div>
                            <select class="custom-select" required name="t_id" id="t_id">
                                <option value="">-- อาจารย์ --</option>
                                <?php
                                              $sql1 = "SELECT * FROM teacher WHERE d_id = '$d_id'";
                                              $result1 = mysql_query($sql1,$conn);
                                                while($rs1 = mysql_fetch_array($result1)){
                                                echo "<option value=\"$rs1[t_id]\"";
                                                if("$rs[t_id]" == "$rs1[t_id]") {echo "selected";}
                                                echo ">$rs1[t_name]";
                                                echo "</option>\n";
                                              }
                                              ?>
                            </select>
                        </div>

                        <div align="center">
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                            <button type="button" onClick=window.history.back() class="btn btn-secondary">ยกเลิก</button>
                        </div>

                    </form>
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