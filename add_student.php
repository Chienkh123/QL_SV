<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php include ('php/navbar.php');?>
<style>
    body {
        font-family: Arial, sans-serif;
        
    }

    .container {
        max-width: 90%;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    label {
        font-weight: bold;
    }
    form {
        margin-bottom: 20px;
    }
    button {
        background-color: #4caf50;
        color: rgb(255, 255, 255);
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    button:hover {
        background-color: #45a049;
    }
    .col-md-6{
        margin-bottom: 20px;
        
    }
</style>

<body>
    <div class="container">
        <div class="row" style="border-bottom: 2px solid #ccc">
            <div class="col-md-6">
                <h1>Thêm sinh viên</h1>
            </div>
            <div class="col-md-6">
                <button type="submit" name="add_student" class="btn btn-primary float-end"
                    onclick="window.location.href = 'student.php';">Danh sách sinh viên</button>
            </div>
        </div>

        <form action="process.php" method="get">
            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Mã sinh viên:</label>
                    <input type="text" id="masv" name="masv" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Họ và tên:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Lớp:</label>
                    <input type="text" id="lop" name="lop" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3 ">
                    <label for="dateofbirth" class="form-label">Ngày sinh</label>
                        <?php
                            $currentDate = date('Y-m-d');
                        ?>
                    <input type="date" id="birthday" name="birthday" class="form-control" max="<?php echo $currentDate; ?>" required>
                </div>
                <div class="col-md-6 mb-3 ">
                    <label for="phonenumber" class="form-label">Số điện thoại</label>
                    <input type="number" id="phone" name="phone" class="form-control" required>
                </div>
            </div>

            <label class="form-check-label">Giới tính:</label>
            <div class="row p-3">
                <div class="form-check col-md-1">
                    <input type="radio" id="sex" name="sex" value="0" class="form-check-input">
                    <label for="sex" class="form-check-label">Nam</label>
                </div>
                <div class="form-check col-md-1">
                    <input type="radio" id="sex" name="sex" value="1" class="form-check-input">
                    <label for="sex" class="form-check-label">Nữ</label>
                </div>
                <div class="form-check col-md-1">
                    <input type="radio" id="sex" name="sex" value="2" class="form-check-input">
                    <label for="sex" class="form-check-label">Khác</label>
                </div>
            </div>

            <button type="submit" name="add_student" class="btn btn-success">Lưu</button>
        </form>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.all.min.js"></script>

</html>