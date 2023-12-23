<?php
include_once "../config/dbconnect.php";

$Id = $_POST['record'];
$query = mysqli_query($conn, "SELECT * FROM students WHERE id='$Id'");
$numberOfRow = mysqli_num_rows($query);
if ($numberOfRow > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $studentId = $row['masv'];
        $studentName = $row['hoten'];
        $studentLop = $row['lop'];
        $studentEmail = $row['email'];
        $studentBirthday = $row['ngaysinh'];
        $studentSex = $row['gioitinh'];
        $studentPhone = $row['sdt'];
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row" style="border-bottom: 2px solid #ccc">
            <div class="col-md-5">
                <h1>Sửa sinh viên</h1>
            </div>
        </div>
        <form id="update-Items" onsubmit = "update_Student()" enctype='multipart/form-data'>
            <div class="row mt-3">
            <div class="col-md-5 mb-3">
                    <label for="name" class="form-label">ID:</label>
                    <input type="text" id="id" name="id" class="form-control" value="<?php echo $Id; ?>" readonly>
                </div>
                <div class="col-md-5 mb-3">
                    <label for="name" class="form-label">Mã sinh viên:</label>
                    <input type="text" id="masv" name="masv" class="form-control" value="<?php echo $studentId; ?>" readonly>
                </div>

                <div class="col-md-5 mb-3">
                    <label for="name" class="form-label">Họ và tên:</label>
                    <input type="text" id="hoten" name="hoten" class="form-control" value="<?php echo $studentName; ?>" required>
                </div>

                <div class="col-md-5 mb-3">
                    <label for="name" class="form-label">Lớp:</label>
                    <input type="text" id="lop" name="lop" class="form-control" value="<?php echo $studentLop; ?>" required>
                </div>

                <div class="col-md-5 mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $studentEmail; ?>" required>
                </div>

                <div class="col-md-5 mb-3 ">
                    <label for="dateofbirth" class="form-label">Ngày sinh</label>
                    <?php
                    $currentDate = date('Y-m-d');
                    ?>
                    <input type="date" id="ngaysinh" name="ngaysinh" class="form-control" value="<?php echo $studentBirthday; ?>" max="<?php echo $currentDate; ?>" required>
                </div>
                <div class="col-md-5 mb-3 ">
                    <label for="phonenumber" class="form-label">Số điện thoại</label>
                    <input type="number" id="sdt" name="sdt" class="form-control" value="<?php echo $studentPhone; ?>" required>
                </div>
            </div>

            <label class="form-check-label">Giới tính:</label>
            <div class="row p-3">
                <div class="form-check col-md-1">
                    <input type="radio" id="gioitinh" name="gioitinh" value="0" class="form-check-input" <?php if ($studentSex == 0) echo "checked"; ?>>
                    <label for="sex" class="form-check-label">Nam</label>
                </div>
                <div class="form-check col-md-1">
                    <input type="radio" id="gioitinh" name="gioitinh" value="1" class="form-check-input" <?php if ($studentSex == 1) echo "checked"; ?>>
                    <label for="sex" class="form-check-label">Nữ</label>
                </div>
                <div class="form-check col-md-1">
                    <input type="radio" id="gioitinh" name="gioitinh" value="2" class="form-check-input" <?php if ($studentSex == 2) echo "checked"; ?>>
                    <label for="sex" class="form-check-label">Khác</label>
                </div>
            </div>

            <button style="height: 40px" type="submit" name="edit_student" class="btn btn-success" >Cập nhật</button>
        </form>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.all.min.js"></script>


</html>