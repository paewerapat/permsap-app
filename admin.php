<?php

    include('actions/db.php');

    $query = "SELECT * FROM users";
    $result = mysqli_query($condb,$query);

    $search_name = (isset($_GET['search_input']) ? $_GET['search_input'] : '');
    $sort = (isset($_GET['sort']) ? $_GET['sort'] : '');
    $sql_num = "SELECT COUNT(id) FROM users WHERE id LIKE '%$search_name%' ORDER BY '$sort' DESC";
    $query_num = mysqli_query($condb,$sql_num);
    $row_num = mysqli_fetch_row($query_num);
 
	$rows = $row_num[0];
	$page_rows = 10;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 
	$last = ceil($rows/$page_rows);
 
	if($last < 1){
		$last = 1;
	}
 
	$pagenum = 1;
 
	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
 
	if ($pagenum < 1) {
		$pagenum = 1;
	}
	else if ($pagenum > $last) {
		$pagenum = $last;
	}
 
	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
 
	$nquery=mysqli_query($condb,"SELECT * FROM users WHERE id LIKE '%$search_name%' ORDER BY '$sort' DESC $limit");
 
	$paginationCtrls = '';
 
	if($last != 1){
        if ($pagenum > 1) {
            $previous = $pagenum - 1;
            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-primary">Previous</a> &nbsp; &nbsp; ';
    
            for($i = $pagenum-4; $i < $pagenum; $i++){
                if($i > 0){
            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn">'.$i.'</a> &nbsp; ';
                }
            }
        }
    
        $paginationCtrls .= ''.$pagenum.' &nbsp; ';
    
        for($i = $pagenum+1; $i <= $last; $i++){
            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn">'.$i.'</a> &nbsp; ';
            if($i >= $pagenum+4){
                break;
            }
        }
    
        if ($pagenum != $last) {
            $next = $pagenum + 1;
            $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-primary">Next</a> ';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>
<?php
    include_once('./component/navbar_admin.php')
?>
<body>
    
    <div class="text-center">
        <h1><i class="fa-solid fa-clipboard-list"></i></h1>
        <h4>รายชื่อสมาชิกทั้งหมด</h4>
        <hr style="max-width: 300px" class="mx-auto" >
    </div>
    
    <form class="mx-auto align-items-center d-flex col-md-6" method="GET" enctype="multipart/form-data" action="">
        <label for="sort" id="search" >ค้นหา</label>&nbsp;
        <input class="form-control" type="text" id="search_input" name="search_input" placeholder="รหัสสมาชิกเฉพาะตัวเลขเท่านั้น" value="<?php echo $search_name ?>">&nbsp;
        <button class="btn btn-primary" type="submit" id="search_btn"><i class="fa fa-search"></i></button>&nbsp;
    </form>
    <small class="text-secondary">ตัวอย่างเช่น รหัส PS0101 ให้พิมพ์แค่ 101</small>
    
    <div class="table-responsive mt-3">
        <table class="table table-striped">
            <thead class="bg-success">
                <tr>
                <th scope="col">รหัสสมาชิก</th>
                <th scope="col">เบอร์โทรศัพท์</th>
                <th scope="col">ชื่อ-สกุล</th>
                <th scope="col">ที่อยู่</th>
                <th scope="col">ส่งแล้ว</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    if(mysqli_num_rows($nquery) > 0 ) {
                    while($row = mysqli_fetch_assoc($nquery)) { ?>
                <tr>
                    <td><?php $user_id = "PS" . sprintf("%04d", $row['id']); echo $user_id; ?></td>
                    <td><?php echo $row['fullname'];?></td>
                    <td><?php echo $row['role'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['sent'];?></td>
                    <td class="d-flex flex-column gap-1">
                        <a href="./print.php?id=<?php echo $row['id']; ?>" 
                            class="btn btn-primary btn-sm d-flex justify-content-center align-items-center gap-1" style="max-width: max-content;"
                        >
                            <i class="fa fa-print" aria-hidden="true"></i> Print
                        </a>

                        <form
                            id="submitSendUser<?php echo $user_id ?>"
                            action="./actions/update-sent.php"
                            method="POST"
                        >
                            <button
                                class="btn btn-sm btn-success d-flex justify-content-center align-items-center gap-1" style="max-width: max-content;"
                                type="button"
                                onclick="confirmSendHandler('<?php echo $user_id; ?>');"
                            >
                                <input type="text" name="user_id" value="<?php echo $row['id']; ?>" style="display: none;">
                                <i class="fa fa-check-circle" aria-hidden="true"></i> ส่ง+1
                            </button>
                        </form>

                        <form
                            id="submitDeleteUser<?php echo $user_id ?>"
                            action="./actions/delete_user.php"
                            method="POST"
                        >
                            <button
                                type="button"
                                onclick="confirmDeleteHandler('<?php echo $user_id; ?>');"
                                class="btn btn-sm btn-danger d-flex justify-content-center align-items-center gap-1" style="max-width: max-content;"
                            >
                                <input type="text" name="delete_id" value="<?php echo $row['id']; ?>" style="display: none;">
                                <i class="fa fa-trash" aria-hidden="true"></i> ลบสมาชิก
                            </button>
                        </form>
                        
                    </td>
                <?php }
                } mysqli_close($condb);?>
                </tr>
            </tbody>
        </table>
        <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
    </div>

</body>
<?php
include_once("./component/footer.php")
?>
</html>

<script>
    function confirmDeleteHandler(user_id) {
        if (confirm("ยืนยันที่จะลบข้อมูลของ " + user_id) == true) {
            document.getElementById("submitDeleteUser" + user_id).submit();
        } else return;
    }

    function confirmSendHandler(user_id) {
        if (confirm("ยืนยันที่จะส่งของให้กับ " + user_id) == true) {
            document.getElementById("submitSendUser" + user_id).submit();
        } else return;
    }
</script>