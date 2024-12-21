<?php

session_start();
if (isset($_GET['logout'])) {
  session_destroy();
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
<body class="bg-warning d-flex flex-column align-items-center justify-content-center">
  <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
      <form class="col-md-5 mt-5" action="actions/login.php" method="POST">
        <div class="card">
          <img src="./images/banner.jpg" alt="logo" style="max-height: 120px; width: 100%;">
          <div class="p-4">
            <div class="text-center">
              <h1 class="h3 fw-blod mt-3 mb-4">ยินดีต้อนรับสู่ครอบครัว PermSap เที่ยวคนเดียว</h1>
            </div>
            <div class="d-flex flex-column gap-2">
              <a href="./register.php" class="btn btn-success w-100 py-2" name="login" type="submit"><i class="fa-solid fa-user-plus"></i> สมัครสมาชิก</a>
              <a href="./login.php" class="btn btn-primary w-100 py-2" name="login" type="submit"><i class="fa-solid fa-pen-to-square"></i> แก้ไขข้อมูลจัดส่ง</a>
            </div>
            <div class="text-center mt-3">
              <a style="text-decoration: none;" class="text-danger" href="https://www.youtube.com/@PERMSAP"><i class="fa-brands fa-youtube"></i> Youtube: @PERMSAP</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
<?php
  include_once("./component/footer.php")
?>
</html>