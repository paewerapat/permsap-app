<?php

session_start();
include('db.php');

if (isset($_POST['login'])) {
    $tel = mysqli_real_escape_string($condb, $_POST['tel']);
    $password = mysqli_real_escape_string($condb, $_POST['password']);
    $password = md5($password);
    $check_query = "SELECT * FROM users WHERE tel = '$tel' AND password = '$password' ";
    $query = mysqli_query($condb, $check_query);
    $result = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) == 1 && $result['role'] == 'user') {
        $_SESSION['id'] = $result['id'];
        $_SESSION['tel'] = $result['tel'];
        $_SESSION['login'] = true;
        echo "<script>
            alert('เข้าสู่ระบบเรียบร้อยแล้ว');
            window.location.href='../profile.php';
            </script>";

    } else if (mysqli_num_rows($query) == 1 && $result['role'] == 'admin') {
        $_SESSION['id'] = $result['id'];
        $_SESSION['admin'] = true;
        $_SESSION['login'] = true;
        echo "<script>
            alert('ยินดีต้อนรับแอดมิน!');
            window.location.href='../admin.php';
            </script>";    
        
    } else {
        echo "<script>
        alert('เบอร์โทรศัพท์หรือรหัสผ่านไม่ถูกต้อง');
        window.location.href='../login.php';
        </script>";

    }
    mysqli_close($condb);
}

?>