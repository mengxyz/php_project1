<?php
include "connect.php";
$t_id = $_GET['t_id'];
$sql = "SELECT t.t_pic,t.t_name,t.t_tel,t.t_address,p.po_name,t.t_username,t.t_password,d.d_name FROM department d,position p,teacher t WHERE t.t_id = '$t_id' and t.d_id = d.d_id and t.po_id = p.po_id ";
$result = mysql_query($sql, $conn)
  or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
$rs = mysql_fetch_array($result);
mysql_close();
?>

<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>รายละเอียด</title>
  <?php include "cdn.php"; ?>
  <script>
    $(document).on('change', '.custom-file-input', function(event) {
      $(this).next('.custom-file-label').html(event.target.files[0].name);
    }) <
  </script>
  <style>
    .form-control:disabled,
    .form-control[readonly] {
      background-color:
        #fff;
      opacity: 1;
    }

    .input-group-text {
      background-color: #fff;
      border: 1px solid #fff;
    }

    .form-control {
      border: 1px solid #fff;
    }

    .custom-select:disabled {
      color: #495057;
      background-color: #fff;
    }

    .custom-select {
      border: 1px solid #fff;
      background: none !important;
    }

    textarea,
    input[type="text"],
    input[type="password"],
    input[type="datetime"],
    input[type="datetime-local"],
    input[type="date"],
    input[type="month"],
    input[type="time"],
    input[type="week"],
    input[type="number"],
    input[type="email"],
    input[type="url"],
    input[type="search"],
    input[type="tel"],
    input[type="color"],
    .uneditable-input {
      cursor: default;
    }

    textarea,
    textarea:hover,
    textarea:focus,
    textarea:active,
    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="datetime"]:focus,
    input[type="datetime-local"]:focus,
    input[type="date"]:focus,
    input[type="month"]:focus,
    input[type="time"]:focus,
    input[type="week"]:focus,
    input[type="number"]:focus,
    input[type="email"]:focus,
    input[type="url"]:focus,
    input[type="search"]:focus,
    input[type="tel"]:focus,
    input[type="color"]:focus,
    .uneditable-input:focus {
      border-color: #fff;
      box-shadow: 0 1px 1px #fff inset, 0 0 0px #fff;
      outline: 0 none;
    }
  </style>
</head>

<body>
  <?php include "none.nav.php";
  include "connect.php"; ?>
  <div class="container h-100 ">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="card col-sm-10">
        <div class="card-body align-content-center align-items-center" align="center">
          <h5 class="card-title text-center">ข้อมูลอาจารย์</h5>
          <br>

          <?php
          if ("$rs[t_pic]" != "") {
            ?>
            <img src="<?php echo "./picture/$rs[t_pic]"; ?>" width="100" height="100">
          <?php
          }
          ?>

          <br>
          <br>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">ชื่อ - สกุล</span>
            </div>
            <input readonly value=<?php echo "$rs[t_name]"; ?> name="t_name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">ที่อยู่</span>
            </div>
            <input readonly name="t_address" type="text" class="form-control" value="<?php echo "$rs[t_address]"; ?>">
          </div>
          <br>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">เบอร์โทร</span>
            </div>
            <input readonly value=<?php echo "$rs[t_tel]"; ?> name="t_tel" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">ตำเเหน่ง</span>
            </div>
            <input readonly value=<?php echo "$rs[d_name]"; ?> name="t_tel" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
          </div>
          <br>
          <br>
          ผลงาน
          <table class="table table-striped table-bordered">
            <tr>
              <td>ชือผลงาน</td>
              <td ">ปีที่ได้รับ</td>
                <td >หน่วยงานที่มอบ</td>
              </tr>
              <?php
              $sql = "SELECT w.w_id,w.w_name,w_year,w_org FROM work w,work_detail wd WHERE wd.t_id = $t_id AND wd.w_id = w.w_id";
              $result2 = mysql_query($sql, $conn);
              while ($rs2 = mysql_fetch_array($result2)) {
                ?>
                <tr>
                  <td><?php echo "$rs2[w_name]"; ?></td>
                  <td><?php echo "$rs2[w_year]"; ?></td>
                  <td><?php echo "$rs2[w_org]"; ?></td>
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