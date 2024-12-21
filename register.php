<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร่วมเป็นส่วนหนึ่งของครอบครัว PermSap</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
        overflow-x: hidden;
        }
        :root {
        width: 100vw;
        }
    </style>

    <script src="./assets/js/register.js"></script>
    <script src="./assets/js/jquery-3.7.1.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <form id="register-form" class="col-md-4 mt-5" action="actions/register.php" method="POST">
                <div class="text-center">
                    <img src="./images/logo.JPG" alt="logo" style="max-height: 120px; border-radius: 50%;">
                    <h1 class="h3 mb-4 fw-blod mt-2">สมัครเข้าสู่ครอบครัว PermSap</h1>
                </div>

                <div class="form-check text-start my-3 text-end">
                    <label class="form-check-label" for="flexCheckDefault">
                        เป็นสมาชิกครอบครัว PermSap อยู่แล้ว?
                    </label>
                    <br>
                    <a href="login.php">เข้าสู่ระบบ</a>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" name="tel" minlength="6" maxlength="10" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">รหัสผ่าน</label>
                    <input type="password" name="password" class="form-control" required minlength="4">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">ยืนยันรหัสผ่าน</label>
                    <input type="password" name="cfPassword" class="form-control" required minlength="4">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">ชื่อ-สกุล(ในการจัดส่ง)</label>
                    <input type="text" name="fullname" class="form-control" placeholder="ชื่อในการส่งไปรษณีย์" required minlength="4">
                </div>
                
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">ที่อยู่(ในการจัดส่ง)</label>
                    <textarea type="text" name="address" class="form-control" required minlength="4"></textarea>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">ไอดีไลน์</label>
                    <input type="text" name="id_line" class="form-control" required minlength="4">
                </div>

                <button type="submit" name="register" class="btn btn-success w-100 py-2">ยืนยันข้อมูล</button>
            </form>

        </div>
    </div>
</body>
<?php
include_once("./component/footer.php")
?>
</html>