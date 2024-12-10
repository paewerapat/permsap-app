<?php

session_start();
include('db.php');

    $user_id = $_POST['user_id'];
    $check_query = "DELETE FROM portfolio WHERE user_id='$user_id'";
    $query = mysqli_query($condb, $check_query);

    if ($query) {
        echo "<script>
        alert('ลบข้อมูล portfolio เรียบร้อยแล้ว!');
        window.location.href='../portfolio_list.php';
        </script>";
    } else {
        echo "<script>
        alert('เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง!');
        window.history.back();
        </script>";
    }
    mysqli_close($condb);


?>