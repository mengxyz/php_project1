<?php
include "connect.php";
$std_id = $_GET['std_id'];
$sql = "SELECT s.std_id,std_address,std_tel,std_pic,std_name,pa_name,c_name FROM student s LEFT JOIN classroom c ON s.c_id = c.c_id LEFT JOIN parent p ON s.pa_id = p.pa_id WHERE s.std_id = '$std_id'";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
$rs = mysql_fetch_array($result);	
mysql_close();
?>
<!doctype html>
  <html>

  <head>
    <meta charset="utf-8">
    <title>ข้อมูลนักเรียน</title>
    <?php include "cdn.php"; ?>
    <script>
      $(document).on('change', '.custom-file-input', function(event) {
        $(this).next('.custom-file-label').html(event.target.files[0].name);
      })
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
        <div class="card col-sm-6">
          <div class="card-body" align="center">
            <h5 class="card-title text-center">ข้อมูลนักเรียน</h5>
            <br>
            <form action="deletestudent.php" method="post" enctype="multipart/form-data" name="form1" id="form1">


              <?php
                if ("$rs[std_pic]" != "") {
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
                <input readonly value="<?php echo "$rs[std_name]"; ?>" required name="std_name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
              </div>




              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">ที่อยู่</span>
                </div>
                <input readonly value="<?php echo "$rs[std_address]"; ?>" required name="std_tel" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
              </div>
              <br>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">เบอร์โทร</span>
                </div>
                <input readonly value="<?php echo "$rs[std_tel]"; ?>" required name="std_tel" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">ผู้ปกครอง</span>
                </div>
                <select disabled class="custom-select" required name="pa_id" id="t_id">
                  <option value=""><?php echo "$rs[pa_name]"; ?></option>

                </select>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">ชั้นเรียน</span>
                </div>
                <select disabled class="custom-select" required name="c_id" id="t_id">
                  <option value=""><?php echo "$rs[c_name]"; ?></option>
                
                </select>
              </div>
              <br>
            </form>
          </div>
        </div>
      </div>
      <?php include "bt4footer.php"; ?>
    </div>
  </body>

  </html>
