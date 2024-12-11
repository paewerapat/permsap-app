<?php

session_start();
include('db.php');

$delete_id = $_POST['delete_id'];
$check_query = "DELETE FROM users WHERE id='$delete_id'";
$query = mysqli_query($condb, $check_query);

if ($query) {
    echo "<script>
    alert('ลบข้อมูล user เรียบร้อยแล้ว!');
    window.location.href='../user_list.php';
    </script>";
} else {
    echo "<script>
    alert('เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง!');
    window.history.back();
    </script>";
}
mysqli_close($condb);

?>