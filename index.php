<?php

    include('actions/db.php');
    session_start();
    $id = $_SESSION['id'];

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
<?php
    include_once('./component/navbar.php')
?>
<body>
    <div>
        <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            
            <div class="card p-3 py-4 mx-auto" style="max-width: 400px;">
                
                <div class="d-flex flex-column">
                    <small class="badge bg-success text-center mx-auto" style="max-width: 200px;">@Line กลุ่มครอบครัว PermSap</small>
                    <img src="images/qr-code.jpg" class="mx-auto" width="200">
                </div>
                
                <div class="text-center mt-3">
                    <span>รหัสสมาชิก <span class="bg-secondary fs-6 badge text-white"><?php echo $user_id ?></span></span>
                </div>
                <div class="mb-3 mt-3 d-flex flex-column mx-auto" style="max-width: 400px;">
                    <div class="mb-3">
                         <label class="form-label">เบอร์โทรศัพท์</label>
                         <input type="text" disabled class="form-control" value="<?php echo $result['tel'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ชื่อ-สกุล</label>
                        <input type="text" disabled class="form-control" value="<?php echo $result['fullname'] ?>">
                    </div>
                    <div class="mb-3">
                         <label class="form-label">ไอดีไลน์</label>
                         <input type="text" disabled class="form-control" value="<?php echo $result['id_line'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ที่อยู่</label>
                        <input type="text" disabled class="form-control" value="<?php echo $result['address'] ?>">
                   </div>
                </div>
                <div class="buttons text-center">
                    <button class="btn btn-outline-primary px-4" data-bs-toggle="modal" data-bs-target="#updateProfileModal">แก้ไขข้อมูล</button>
                    <a href="index.php?logout='1'" class="btn btn-outline-secondary px-4">ออกจากระบบ</a>
                </div>
            </div>
              
          </div>
        </div>
    </div>

    <div class="modal fade" id="updateProfileModal" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <form id="update-profile" class="modal-content" action="actions/update-profile.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">แก้ไขข้อมูลส่วนตัว</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div>
                        <div class="text-center mb-3">
                            <img src="./images/logo-name.jpg" alt="logo" style="max-height: 120px; border-radius: 50%;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" value="<?php echo $result['tel'] ?>" name="tel" maxlength="10" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ชื่อ-สกุล</label>
                            <input type="text" name="fullname" value="<?php echo $result['fullname'] ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ไอดีไลน์</label>
                            <input type="text" name="id_line" class="form-control" value="<?php echo $result['id_line'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ที่อยู่</label>
                            <textarea type="text" name="address" class="form-control" required><?php echo $result['address'] ?></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary" name="update-profile">บันทึกข้อมูล</button>
                </div>
            </form>
        </div>
    </div>
</body>
<?php
include_once("./component/footer.php")
?>
</html>