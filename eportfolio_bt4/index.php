<?php 
include "connect.php";
$sql = "SELECT t.t_id,t.t_name,d.d_name,p.po_name FROM teacher t,department d,position p WHERE t.d_id = d.d_id AND t.po_id = p.po_id";
$result = mysql_query($sql,$conn);
mysql_close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>หน้าหลัก</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include "cdn.php"; ?>
    
</head>

<body>
    <?php include "none.nav.php"; ?>
    <div class="container h-100 ">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title text-center">รายงานข้อมูลครู</h5>
                    <br>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>ชื่อ</td>
                                <td>ตำเเหน่ง</td>
                                <td>กลุ่มสาระ</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($rs = mysql_fetch_array($result)){ ?>
                            <tr>
                                <td><?php echo "$rs[t_name]"; ?></td>
                                <td><?php echo "$rs[po_name]"; ?></td>
                                <td><?php echo "$rs[d_name]"; ?></td>
                                <td class="text-center"><?php echo "<a class=\"btn btn-primary btn-sm\" href=\"frm_showdetail.php?t_id=$rs[t_id]\"><i class=\"fas fa-info-circle\"></i>  รายละเอียด</a>"; ?></td>
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