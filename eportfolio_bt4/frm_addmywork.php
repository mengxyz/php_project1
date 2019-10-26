<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])) {
    include "connect.php";
    $uname = $_SESSION['valid_uname'];
    $sql = "SELECT * FROM teacher WHERE t_username = '$uname'";
    $result = mysql_query($sql, $conn);
    $rs = mysql_fetch_array($result);
    ?>
    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>เพิ่มชั้นเรียน</title>
        <?php include "cdn.php"; ?>
    </head>

    <body>
        <?php include "teacher.nav.php"; ?>
        <div class="container h-100 ">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="card col-sm-4">
                    <div class="card-body" align="center">
                        <h5 class="card-title text-center">เพิ่มข้อมูลผลงาน</h5>
                        <br>
                        <form name="form1" method="post" action="addmywork.php">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">ผลงาน</span>
                                </div>
                                <select class="custom-select" required name="w_id" id="t_id">
                                    <option value="">-- ผลงาน --</option>
                                    <?php
                                        $sql = "SELECT * FROM work";
                                        $result2 = mysql_query($sql, $conn);
                                        while ($rs2 = mysql_fetch_array($result2)) {
                                            echo "<option value=\"$rs2[w_id]\">$rs2[w_name]</option>";
                                        }
                                        ?>
                                </select>
                                <input type="hidden" name="t_id" id="t_id" value="<?php echo "$rs[t_id]"; ?>"></td>
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
} else {
    echo "<script> alert('Please Login');window.history.go(-1);</script>";
    exit();
}
?>