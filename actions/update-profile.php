<?php

include('db.php');

if (isset($_POST['update-profile'])) {
    $tel = $_POST['tel'];
    $id_line = $_POST['id_line'];
    $fullname = $_POST['fullname'];
    $address = htmlspecialchars($_POST['address']);

    $sql = "UPDATE users SET tel='$tel', id_line='$id_line', address='$address', fullname='$fullname'";
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