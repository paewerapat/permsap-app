<?php

session_start();
include('db.php');

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

// First Section
$full_name = $_POST['full_name'];
$gender = $_POST['gender'];
$nickname = $_POST['nickname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$address_id_card = $_POST['address_id_card'];

// Second Section
$profile_img_file_path = "../images/profile/";
$profile_img_basename = $_FILES["profile_img"]["name"];
$profile_img_extension = pathinfo($profile_img_basename, PATHINFO_EXTENSION);
$profile_img_file_name = "";

if(isset($_FILES["profile_img"]) && $_FILES["profile_img"]["error"] == 0) {
    $profile_img_file_name = ($_SESSION['user_id']).'_profile.'.$profile_img_extension;
    move_uploaded_file($_FILES["profile_img"]["tmp_name"], $profile_img_file_path.$profile_img_file_name);
} else if(isset($_POST['current_profile_img'])) {
    $profile_img_file_name = $_POST['current_profile_img'];
}


$cover_img_file_path = "../images/cover/";
$cover_img_basename = $_FILES["cover_img"]["name"];
$cover_img_extension = pathinfo($cover_img_basename, PATHINFO_EXTENSION);
$cover_img_file_name = "";

if(isset($_FILES["cover_img"]) && $_FILES["cover_img"]["error"] == 0) {
    $cover_img_file_name = ($_SESSION['user_id']).'_cover.'.$cover_img_extension;
    move_uploaded_file($_FILES["cover_img"]["tmp_name"], $cover_img_file_path.$cover_img_file_name);
} else if(isset($_POST['current_cover_img'])) {
    $cover_img_file_name = $_POST['current_cover_img'];
}
$occupation = $_POST['occupation'];
$occupation_description = $_POST['occupation_description'];

// Third Section
$portfolio_description = $_POST['portfolio_description'];
$birthday = $_POST['birthday'];
$website = $_POST['website'];
$age = $_POST['age'];
$degree = $_POST['degree'];

// Fourth Section
$skills_description = $_POST['skills_description'];
$skills_specialisms = $_POST['skills_specialisms'];
$skills_language = $_POST['skills_language'];

$education = $_POST['education'];
$experience = $_POST['experience'];


$user_id = $_SESSION['user_id'];

$sql = "REPLACE INTO portfolio (user_id, full_name, gender, nickname, email, phone, address, address_id_card, profile_img,
cover_img, occupation, portfolio_description, birthday, website, age, degree, skills_specialisms, skills_language, experience, education, 
occupation_description, skills_description) 
VALUES ('$user_id','$full_name','$gender','$nickname','$email','$phone','$address','$address_id_card','$profile_img_file_name','$cover_img_file_name',
'$occupation','$portfolio_description','$birthday','$website','$age','$degree','$skills_specialisms','$skills_language','$experience','$education',
'$occupation_description','$skills_description')";

$result = mysqli_query($condb, $sql);

if ($result) { 
    echo "<script>
    alert('อัปเดตโปรไฟล์เรียบร้อยแล้ว!');
    window.location.href='../index.php';
    </script>"; 
} else {
    echo "<script>
    alert('เกิดข้อผิดพลาดในการอัพโหลดหรือการสมัครสมาชิก !');
    window.history.back();
    </script>";
}


?>