<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>เพิ่มกลุ่มสาระ</title>
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
                    <form id="form1" name="form1" method="post" action="adddept.php">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ชื่อกลุ่มสาระ</span>
                            </div>
                            <input required name="d_name" type="text" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        
                        <div align="center">
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                            <button type="reset" class="btn btn-secondary">ยกเลิก</button>
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