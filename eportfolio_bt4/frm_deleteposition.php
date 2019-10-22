<?php 
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
$po_id = $_GET['po_id'];
$sql = "SELECT * FROM position WHERE po_id = '$po_id'";
$result = mysql_query($sql,$conn)
	or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close();
$rs = mysql_fetch_array($result);
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>ลบข้อมูลตำเเหน่ง</title>
    <?php include "cdn.php"; ?>
</head>

<body>
    <?php include "admin.nav.php"; ?>
    <div class="container h-100 ">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card col-sm-4">
                <div class="card-body" align="center">
                    <h5 class="card-title text-center">ลบข้อมูลตำเเหน่ง</h5>
                    <br>
                    <form action="deleteposition.php" method="post" name="form1" id="form1">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ชื่อตำเเหน่ง</span>
                            </div>
                            <input readonly value="<?php echo "$rs[po_name]"; ?>" required name="po_name" type="text"
                                class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <input name="po_id" type="hidden" id="po_id" value="<?php echo "$rs[po_id]"; ?>"></td>
                        <div align="center">
                            <button type="submit" class="btn btn-danger">ลบ</button>
                            <button type="button" onClick=window.history.back()
                                class="btn btn-secondary">ยกเลิก</button>
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