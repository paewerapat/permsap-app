<?php

    include('actions/db.php');
  
    $id = htmlspecialchars($_GET["id"]);

    if(!isset($id)) {
      header('location: index.php');
    }

    $sql = "SELECT * FROM users WHERE id = '$id'";
    $query = mysqli_query($condb,$sql);
    $result = mysqli_fetch_assoc($query);

    $user_id = "PS" . sprintf("%04d", $result['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยินดีต้อนรับสู่ครอบครัว PermSap</title>
</head>
<body>
    <p>
      รหัสสมาชิก: <?php echo $user_id ?> | ชื่อ-สกุล: <?php echo $result['fullname']; ?> | เบอร์โทรศัพท์: <?php echo $result['tel']; ?> | ที่อยู่: <?php echo $result['address'] ?>
    </p>
</body>
</html>

<script>
  window.print();
</script>