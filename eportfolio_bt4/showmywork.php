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
    <title>ผลงาน</title>
    <?php include "cdn.php"; ?>
    <script>
      $(document).on('change', '.custom-file-input', function(event) {
        $(this).next('.custom-file-label').html(event.target.files[0].name);
      })
    </script>
  </head>

  <body>
    <?php include "teacher.nav.php";
      include "connect.php"; ?>
    <div class="container h-100 ">
      <div class="row h-100 justify-content-center align-items-center">
        <div class="card col-sm-8">
          <div class="card-body" align="center">
            <h5 class="card-title text-center">ผลงานครูอาจารย์</h5>
            <br>

            <table class="table table-borderless">
              <tr>
                <td>อาจารย์ <?php echo "$rs[t_name]"; ?></td>
                <td>
                  <div align="right"><a href="frm_addmywork.php" class="btn btn-success btn-sm"><i class="fas fa-plus-square"></i> เพิ่มข้อมูลผลงาน</a></div>
                </td>
              </tr>
            </table>
            <table class="table table-striped table-bordered">
              <tr>
                <td>ชื่อผลงาน</td>
                <td>ปีที่รับ</td>
                <td>หน่วยงานที่มอบ</td>
                <td>&nbsp;</td>
              </tr>
              <?php
                $sql = "SELECT w.w_id,w.w_name,w_year,w_org FROM work w,work_detail wd WHERE wd.t_id = $rs[t_id] AND wd.w_id = w.w_id";
                $result2 = mysql_query($sql, $conn);
                while ($rs2 = mysql_fetch_array($result2)) {
                  ?>
                <tr>
                  <td><?php echo "$rs2[w_name]"; ?></td>
                  <td><?php echo "$rs2[w_year]"; ?></td>
                  <td><?php echo "$rs2[w_org]"; ?></td>
                  <td>
                    <div align="center">
                      <?php echo "<a class=\"btn btn-danger btn-sm\" href=\"frm_deletemywork.php?w_id=$rs2[w_id]&t_id=$rs[t_id]\">"; ?><i class="fas fa-trash-alt"></i> ลบ</a></div>
                  </td>
                </tr>
              <?php } ?>
            </table>
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