<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
$w_id = $_GET['w_id'];
$sql = "SELECT * FROM work WHERE w_id = '$w_id'";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close();
$rs = mysql_fetch_array($result); 	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ลบข้อมูลผลงาน</title>
<?php include "cdn.php"; ?>
</head>

<body>
<?php include "admin.nav.php"; ?>
    <div class="container h-100 ">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card col-sm-4">
                <div class="card-body" align="center">
                    <h5 class="card-title text-center">ลบข้อมูลผลงาน</h5>
                    <br>
                    <form id="form1" name="form1" method="post" action="deletework.php">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ชื่อผลงาน</span>
                            </div>
                            <input readonly required name="w_name" type="text" value="<?php echo "$rs[w_name]"; ?>" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                <input name="w_id" type="hidden" id="w_id" value="<?php echo "$rs[w_id]"; ?>">
                        </div>

                        <div style="cursor:pointer" class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ปี</span>
                            </div>
                            <input readonly value="<?php echo "$rs[w_year]"; ?>" style="cursor:pointer" data-date-language="th" required name="w_year" type="text"
                                class="form-control datepicker" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">หน่วยงาน</span>
                            </div>
                            <input readonly value="<?php echo "$rs[w_org]"; ?>" required name="w_org" type="text" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <div align="center">
                            <button type="submit" class="btn btn-danger">ลบ</button>
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