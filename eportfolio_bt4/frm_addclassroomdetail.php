<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0') {
    include "connect.php";
    $c_id = $_GET['c_id'];
    $sql = "SELECT * FROM classroom WHERE c_id = '$c_id'";
    $result = mysql_query($sql, $conn)
        or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
    $rs = mysql_fetch_array($result);
    ?>
    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>จัดการข้อมูลชั้นเรียน</title>
        <?php include "cdn.php"; ?>
    </head>

    <body>
        <?php include "admin.nav.php"; ?>
        <div class="container h-100 ">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="card col-sm-4">
                    <div class="card-body" align="center">
                        <h5 class="card-title text-center">จัดการข้อมูลชั้นเรียน</h5>
                        <br>
                        <form action="addclassroomdetail.php" method="post" name="form1" id="form1">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">ชื่อชั้นเรียน</span>
                                </div>
                                <input readonly value=<?php echo "$rs[c_name]"; ?> name="c_name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                <input name="c_id" type="hidden" id="c_id" value="<?php echo "$rs[c_id]"; ?>">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">หัวหน้าห้อง</span>
                                </div>
                                <select class="custom-select" required name="std_id" id="t_id">
                                    <option value="">-- หัวหน้าห้อง --</option>
                                    <?php
                                        $sql = "SELECT * FROM student where c_id = '$c_id'";
                                        $result1 = mysql_query($sql, $conn);
                                        while ($rs1 = mysql_fetch_array($result1)) {
                                            if("$rs1[std_id]" == "$rs[std_id]"){
                                                echo "<option selected value=\"$rs1[std_id]\">$rs1[std_name]</option>";
                                            }else{
                                                echo "<option value=\"$rs1[std_id]\">$rs1[std_name]</option>";
                                            }
                                        }
                                        ?>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">ครูประชั้น</span>
                                </div>
                                <select class="custom-select" required name="t_id" id="t_id">
                                    <option value="">-- ครูประชั้น --</option>
                                    <?php
                                        $sql = "SELECT * FROM teacher";
                                        $result2 = mysql_query($sql, $conn);
                                        while ($rs2 = mysql_fetch_array($result2)) {
                                            if("$rs[t_id]" == "$rs2[t_id]"){
                                                echo "<option selected value=\"$rs2[t_id]\">$rs2[t_name]</option>";
                                            }else{
                                                echo "<option value=\"$rs2[t_id]\">$rs2[t_name]</option>";
                                            }
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
        </div>
    </body>

    </html>
<?php
} else {
    echo "<script> alert('Please Login');window.history.go(-1);</script>";
    exit();
}
?>