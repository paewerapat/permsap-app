<?php
  session_start();
  if(isset($_SESSION['id'])) {
    Header('location: ./index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ครอบครัว PermSap</title>

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
</head>
<body>
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <form class="col-md-4 mt-5" action="actions/login.php" method="POST">
        
        <div class="text-center">
          <img src="./images/logo.JPG" alt="logo" style="max-height: 120px; border-radius: 50%;">
          <h1 class="h3 mb-4 mt-2 fw-blod">ยินดีต้อนรับสู่ครอบครัว PermSap</h1>
        </div>

        <div class="mb-3">
          <label for="floatingInput">เบอร์โทรศัพท์</label>
          <input type="text" class="form-control" name="tel" required maxlength="10">
        </div>
        <div class="mb-3">
          <label for="floatingPassword">รหัสผ่าน</label>
          <input type="password" class="form-control" name="password" required>
        </div>

        <div class="form-check text-start my-3 text-end">
          <label class="form-check-label" for="flexCheckDefault">
            ยังไม่ได้เป็นสมาชิกครอบครัว PermSap?
          </label>
          <br>
          <a href="register.php">สมัครสมาชิกที่นี่</a>
        </div>
        <button class="btn btn-primary w-100 py-2" name="login" type="submit">เข้าสู่ระบบ</button>
      </form>
    </div>
  </div>
</body>
<?php
  include_once("./component/footer.php")
?>
</html>