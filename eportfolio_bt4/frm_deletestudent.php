<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
$std_id = $_GET['std_id'];

$sql = "SELECT * FROM student WHERE std_id = '$std_id'";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close();
$rs = mysql_fetch_array($result);	
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>ลบข้อมูลนักเรียน</title>
    <?php include "cdn.php"; ?>
    <script>
    $(document).on('change', '.custom-file-input', function(event) {
        $(this).next('.custom-file-label').html(event.target.files[0].name);
    })
    </script>
</head>

<body>
    <?php include "admin.nav.php"; include "connect.php"; ?>
    <div class="container h-100 ">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card col-sm-6">
                <div class="card-body" align="center">
                    <h5 class="card-title text-center">ลบข้อมูลนักเรียน</h5>
                    <br>
                    <form action="deletestudent.php" method="post" enctype="multipart/form-data" name="form1" id="form1">


                        <?php
                            if("$rs[std_pic]" != ""){
                        ?>
                        <img src="<?php echo "./picture/$rs[std_pic]"; ?>" width="100" height="100">
                        <?php 
                           }
                        ?>

                        <br>
                        <br>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ชื่อ - สกุล</span>
                            </div>
                            <input readonly value="<?php echo "$rs[std_name]"; ?>" required name="std_name" type="text"
                                class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm">
                        </div>




                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ที่อยู่</span>
                            </div>
                            <textarea readonly name="std_address" class="form-control"
                                aria-label="With textarea"><?php echo "$rs[std_address]"; ?></textarea>
                        </div>
                        <br>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">เบอร์โทร</span>
                            </div>
                            <input readonly value="<?php echo "$rs[std_tel]"; ?>" required name="std_tel" type="text"
                                class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ผู้ปกครอง</span>
                            </div>
                            <select disabled class="custom-select" required name="pa_id" id="t_id">
                                <option value="">-- ผู้ปกครอง --</option>
                                <?php
                                  $sql1 = "SELECT * FROM parent";
                                  $result1 = mysql_query($sql1,$conn);
                                    while($rs1 = mysql_fetch_array($result1)){
                                    echo "<option value=\"$rs1[pa_id]\"";
                                    if("$rs[pa_id]" == "$rs1[pa_id]") {echo "selected";}
                                    echo ">$rs1[pa_name]";
                                    echo "</option>\n";
                                  }
                                  ?>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ชั้นเรียน</span>
                            </div>
                            <select disabled class="custom-select" required name="c_id" id="t_id">
                                <option value="">-- ชั้นเรียน --</option>
                                <?php
                                  $sql1 = "SELECT * FROM classroom";
                                  $result1 = mysql_query($sql1,$conn);
                                    while($rs1 = mysql_fetch_array($result1)){
                                    echo "<option value=\"$rs1[c_id]\"";
                                    if("$rs[c_id]" == "$rs1[c_id]") {echo "selected";}
                                    echo ">$rs1[c_name]";
                                    echo "</option>\n";
                                  }
                                  ?>
                            </select>
                        </div>
                        <div align="center">
                            <input name="std_id" type="hidden" id="std_id" value="<?php echo "$rs[std_id]"; ?>">
                            <input name="std_pic" type="hidden" id="std_pic" value="<?php echo "$rs[std_pic]"; ?>">
                            <button type="submit" class="btn btn-danger">ลบ</button>
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
}else{
    echo "<script> alert('Please Login');window.history.go(-1);</script>";
        exit();
}
?>