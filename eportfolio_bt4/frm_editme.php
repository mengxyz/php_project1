<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])) {
  include "connect.php";
  $valid_uname = $_SESSION["valid_uname"];
  $sql = "SELECT * FROM teacher WHERE t_username = '$valid_uname'";
  $result = mysql_query($sql, $conn)
    or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
  $rs = mysql_fetch_array($result);
  mysql_close();
  ?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>ข้อมูลส่วนตัว</title>
    <?php include "cdn.php"; ?>
    <script>
    $(document).on('change', '.custom-file-input', function(event) {
        $(this).next('.custom-file-label').html(event.target.files[0].name);
    })
    </script>
</head>

<body>
    <?php include "teacher.nav.php"; include "connect.php"; ?>
    <div class="container h-100 ">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card col-sm-6">
                <div class="card-body" align="center">
                    <h5 class="card-title text-center">ข้อมูลส่วนตัว</h5>
                    <br>
                    <form action="editme.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        <?php
                            if("$rs[t_pic]" != ""){
                        ?>
                        <img src="<?php echo "./picture/$rs[t_pic]"; ?>" width="100" height="100">
                        <?php 
                           }
                        ?>

                        <br>
                        <br>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Username</span>
                            </div>
                            <input readonly value="<?php echo "$rs[t_username]"; ?> "name="t_username" type="text"
                                class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
                            </div>
                            <input value="<?php echo "$rs[t_password]"; ?>" name="t_password" type="text"
                                class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ชื่อ - สกุล</span>
                            </div>
                            <input value="<?php echo "$rs[t_name]"; ?>" name="t_name" type="text" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ที่อยู่</span>
                            </div>
                            <textarea name="t_address" class="form-control"
                                aria-label="With textarea"><?php echo "$rs[t_address]"; ?></textarea>
                        </div>
                        <br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">เบอร์โทร</span>
                            </div>
                            <input value="<?php echo "$rs[t_tel]"; ?>" name="t_tel" type="number" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>


                        <div class="input-group mb-3">

                            <div class="input-group-prepend w-20">
                                <span class="input-group-text" id="inputGroupFileAddon01">รูป</span>
                            </div>
                            <div class="custom-file">
                                <input name="photo" type="file" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ตำเเหน่ง</span>
                            </div>
                            <select class="custom-select" required name="po_id" id="t_id">
                                <option value="">-- ตำเเหน่ง --</option>
                                <?php
                                      $sql1 = "SELECT * FROM position";
                                      $result1 = mysql_query($sql1,$conn);
                                        while($rs1 = mysql_fetch_array($result1)){
                                        echo "<option value=\"$rs1[po_id]\"";
                                        if("$rs[po_id]" == "$rs1[po_id]") {echo "selected";}
                                        echo ">$rs1[po_name]";
                                        echo "</option>\n";
                                      }
                                      ?>
                            </select>
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ตำเเหน่ง</span>
                            </div>
                            <select class="custom-select" required name="d_id" id="t_id">
                                <option value="">-- กลุ่มสาระ --</option>
                                <?php
                                      $sql1 = "SELECT * FROM department";
                                      $result1 = mysql_query($sql1,$conn);
                                        while($rs1 = mysql_fetch_array($result1)){
                                        echo "<option value=\"$rs1[d_id]\"";
                                        if("$rs[d_id]" == "$rs1[d_id]") {echo "selected";}
                                        echo ">$rs1[d_name]";
                                        echo "</option>\n";
                                      }
                                      ?>
                            </select>
                            </select>
                        </div>


                        <div align="center">
                            <input type="hidden" name="t_id" id="t_id" value="<?php echo "$rs[t_id]"; ?>">
                            <input type="hidden" name="t_pic" id="t_pic" value="<?php echo "$rs[t_pic]" ;?>">
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