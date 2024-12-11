<?php

include('db.php');

$user_id = $_POST['user_id'];
$sql = "UPDATE users SET sent=sent+1 WHERE id='$user_id'";
$result = mysqli_query($condb, $sql);

if ($result) { 
    echo "<script>
    alert('อัปเดตข้อมูลการส่งเรียบร้อยแล้ว!');
    window.location.href='../admin.php';
    </script>"; 
} else {
    echo "<script>
    alert('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง');
    window.history.back();
    </script>";

}

mysqli_close($condb);

?>