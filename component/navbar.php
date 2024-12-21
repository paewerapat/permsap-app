<?php
  include('auth.php');

  if (isset($_GET['logout'])) {
    session_destroy();
    Header('location: ./index.php');
  }

  $id = $_SESSION['id'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="css/styles.css" rel="stylesheet">

  <style>
    body {
      overflow-x: hidden;
    }
    :root {
      width: 100vw;
    }
  </style>

</head>
<nav class="navbar bg-danger navbar-expand-lg mb-5" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand ms-5" href="https://www.youtube.com/@permsap"><i class="fa-brands fa-youtube"></i> PermSap</a>
  </div>
</nav>
</html>