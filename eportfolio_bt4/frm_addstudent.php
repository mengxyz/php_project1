<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>เพิ่มข้อมูลนักเรียน</title>
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
                    <h5 class="card-title text-center">เพิ่มข้อมูลนักเรียน</h5>
                    <br>
                    <form action="addstudent.php" method="post" enctype="multipart/form-data" name="form1" id="form1">


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ชื่อ - สกุล</span>
                            </div>
                            <input required name="std_name" type="text" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ที่อยู่</span>
                            </div>
                            <textarea name="std_address" class="form-control" aria-label="With textarea"></textarea>
                        </div>
                        <br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">เบอร์โทร</span>
                            </div>
                            <input required name="std_tel" type="number" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
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
                                <span class="input-group-text" id="inputGroup-sizing-sm">ผู้ปกครอง</span>
                            </div>
                            <select class="custom-select" required name="pa_id" id="t_id">
                                <option value="">-- ผู้ปกครอง --</option>
                                <?php
                                  $sql1 = "SELECT * FROM parent";
                                  $result1 = mysql_query($sql1,$conn);
                                  while($rs1 = mysql_fetch_array($result1)){
                                    echo "<option value=$rs1[pa_id]>$rs1[pa_name]</option>";	
                                  }
                                ?>
                            </select>
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ชั้นเรียน</span>
                            </div>
                            <select class="custom-select" required name="c_id" id="t_id">
                                <option value="">-- ชั้นเรียน --</option>
                                <?php
                                  $sql2 = "SELECT * FROM classroom";
                                  $result2 = mysql_query($sql2,$conn);
                                  while($rs2 = mysql_fetch_array($result2)){
                                    echo "<option value=$rs2[c_id]>$rs2[c_name]</option>";
                                  }
                                ?>
                            </select>
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