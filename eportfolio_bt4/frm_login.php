<!doctype html>
<html>

<head>
    <title>เข้าสู่ระบบ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include "cdn.php"; ?>
    <style>
    body,
    html {
        height: 80vh;
    }

    nav {}
    </style>
</head>

<body>

    <?php include "none.nav.php"; ?>
    <div class="container h-100 ">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card col-sm-4">
                <div class="card-body">
                <h5 class="card-title text-center">เข้าสู่ระบบ</h5>
                <br>
                    <form name="form1" method="post" action="login.php">

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ชื่อล็อกอิน</span>
                            </div>
                            <input required name="login" type="text" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">รหัสผ่าน</span>
                            </div>
                            <input required name="password" type="password" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <div class="form-check">
                            <input required class="form-check-input" value="1" type="radio" name="user_status" id="exampleRadios1"
                                value="option1">
                            <label class="form-check-label" for="user_status">
                                ครูอาจารย์
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" value="0" type="radio" name="user_status" id="exampleRadios2"
                                value="option2">
                            <label class="form-check-label" for="user_status">
                                ผู้ดูเเลระบบ
                            </label>
                        </div>
                        <br>
                        <div align="center">
                            <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                            <button type="reset" class="btn btn-secondary">ยกเลิก</button>
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