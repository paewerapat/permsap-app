<?php

include('db.php');

if (isset($_POST['register'])) {
    $tel = mysqli_real_escape_string($condb, $_POST['tel']);
    $id_line = mysqli_real_escape_string($condb, $_POST['id_line']);
    $fullname = mysqli_real_escape_string($condb, $_POST['fullname']);
    $password = mysqli_real_escape_string($condb, $_POST['password']);
    $cfPassword = mysqli_real_escape_string($condb, $_POST['cfPassword']);
    $address = mysqli_real_escape_string($condb, htmlspecialchars($_POST['address']));

    if ($password != $cfPassword) {
        echo "<script>
            alert('รหัสผ่านไม่ตรงกัน!');
            window.history.back();
            </script>";
        exit();
    }

    $password = md5($password);
    $check_query = "SELECT * FROM users WHERE tel = '$tel'";
    $query = mysqli_query($condb, $check_query);
    $result = mysqli_fetch_assoc($query);

    if($result) {
        echo "<script>
        alert('เบอร์โทรศัพท์ $tel นี้มีการลงทะเบียนไว้แล้ว');
        window.location.href='../register.html';
        </script>";
    } else {
        $sql = "INSERT INTO users (tel, id_line, password, address, fullname) VALUES ('$tel','$id_line','$password', '$address', '$fullname')";
        $result = mysqli_query($condb, $sql);
        if ($result) { 
            echo "<script>
            alert('สมัครสมาชิกเสร็จเรียบร้อยแล้ว!');
            window.location.href='../login.php';
            </script>"; 
        } else {
            echo "<script>
            alert('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง');
            window.history.back();
            </script>";
     
        }
    }
    mysqli_close($condb);
}

?>