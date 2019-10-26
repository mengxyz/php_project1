<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0') {
  include "connect.php";
  $pa_id = $_GET['pa_id'];
  $sql = "SELECT * FROM parent WHERE pa_id = '$pa_id'";
  $result = mysql_query($sql, $conn)
    or die("ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
  mysql_close();
  $rs = mysql_fetch_array($result);
  ?>
  <!doctype html>
  <meta charset="utf-8">
  <title>แก้ไขข้อมูลผู้ปกครอง</title>
  <?php include "cdn.php"; ?>
  <script>
    $(document).on('change', '.custom-file-input', function(event) {
      $(this).next('.custom-file-label').html(event.target.files[0].name);
    })
  </script>
  </head>

  <body>
    <?php include "admin.nav.php";
      include "connect.php"; ?>
    <div class="container h-100 ">
      <div class="row h-100 justify-content-center align-items-center">
        <div class="card col-sm-6">
          <div class="card-body" align="center">
            <h5 class="card-title text-center">แก้ไขข้อมูลผู้ปกครอง</h5>
            <br>
            <form action="editparent.php" method="post" name="form1" id="form1">

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">รหัสบัตรประชาชน</span>
                </div>
                <input maxlength="13" pattern=".{13}" value="<?php echo "$rs[pa_id]"; ?>" required name="pa_id" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">ชื่อ</span>
                </div>
                <input required name="pa_name" value="<?php echo "$rs[pa_name]"; ?>"  type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">อาชีพ</span>
                </div>
                <input required name="pa_occupation" value="<?php echo "$rs[pa_occupation]"; ?>"  type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">เบอร์โทร</span>
                </div>
                <input required name="pa_tel" value="<?php echo "$rs[pa_tel]"; ?>" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
              </div>

              <div align="center">
                <button type="submit" class="btn btn-primary">บันทึก</button>
                <button type="reset" class="btn btn-secondary">ยกเลิก</button>
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