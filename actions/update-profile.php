<?php

include('db.php');

if (isset($_POST['update-profile'])) {

    $id = $_POST['id'];
    $address = htmlspecialchars($_POST['address']);

    $sql = "UPDATE users SET address='$address' WHERE id='$id'";
    $result = mysqli_query($condb, $sql);
    if ($result) { 
        echo "<script>
        alert('อัปเดตข้อมูลส่วนตัวเรียบร้อยแล้ว!');
        window.location.href='../';
        </script>"; 
    } else {
        echo "<script>
        alert('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง');
        window.history.back();
        </script>";
    
    }

    mysqli_close($condb);
}

?>