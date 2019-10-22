<?php 
include "connect.php";
$sql = "SELECT s.std_id,std_name,pa_name,c_name FROM student s LEFT JOIN classroom c ON s.c_id = c.c_id LEFT JOIN parent p ON s.pa_id = p.pa_id";
$result = mysql_query($sql,$conn);
mysql_close();
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>หน้าหลัก</title>
    <script src="./js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <?php include "cdn.php"; ?>
</head>

<body>

    <?php include "none.nav.php"; ?>
    <div class="container h-100 ">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title text-center">รายงานข้อมูลนักเรียน</h5>
                    <br>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>ชื่อ</td>
                                <td>ชั้นเรียน</td>
                                <td>ผู้ปกครอง</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($rs = mysql_fetch_array($result)){ ?>
                            <tr>
                                <td><?php echo "$rs[std_name]"; ?></td>
                                <td><?php echo "$rs[c_name]"; ?></td>
                                <td><?php echo "$rs[pa_name]"; ?></td>
                                <td> <?php echo "<a href=\"frm_showdetail2.php?std_id=$rs[std_id]\">รายละเอียด</a>"; ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php include "bt4footer.php"; ?>
    </div>
</body>

</html>