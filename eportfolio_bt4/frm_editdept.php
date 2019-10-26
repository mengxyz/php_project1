<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0') {
    include "connect.php";
    $d_id = $_GET["d_id"];
    $sql = "SELECT * FROM department WHERE d_id = '$d_id'";
    $result = mysql_query($sql, $conn)
        or die() . mysql_error();
    mysql_close();
    $rs = mysql_fetch_array($result);
    ?>
    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>แก้ไขข้อมูลกลุ่มสาระ</title>
        <?php include "cdn.php"; ?>
    </head>

    <body>
        <?php include "admin.nav.php"; ?>
        <div class="container h-100 ">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="card col-sm-4">
                    <div class="card-body" align="center">
                        <h5 class="card-title text-center">แก้ไขกลุ่มสาระ</h5>
                        <br>
                        <form id="form1" name="form1" method="post" action="editdept.php">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">ชื่อกลุ่มสาระ</span>
                                </div>
                                <input value="<?php echo "$rs[d_name]"; ?>" required name="d_name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                <input name="d_id" type="hidden" id="d_id" value="<?php echo "$rs[d_id]"; ?>"></td>
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
} else {
    echo "<script> alert('Please Login');window.history.go(-1);</script>";
    exit();
}
?>