<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.all.min.js"></script>

<head>
    <style>
        button {
            background-color: red;
        }
    </style>
</head>

<?php
include 'connect.php';
$query = "SELECT * FROM students";
if (isset($_POST['search'])) {
    $msv = $_POST['noidung'];
    $query = "SELECT * FROM students WHERE masv = '$msv'";
}

$result = mysqli_query($conn, $query);
?>

<table class="table table-bordered text-center">
    <thead class="table-light">
        <tr>
            <th>STT</th>
            <th>Mã sinh viên</th>
            <th>Tên</th>
            <th>Lớp</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Số điện thoại</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <?php

    if (!$result) {
        die("Truy vấn không thành công: " . mysqli_error($conn));
    }
    if (mysqli_num_rows($result) == 0) {
        echo "<tr><td colspan='9'>Không tìm thấy kết quả</td></tr>";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <tr>
                <td><?php echo $row['stt'] ?></td>
                <td><?php echo $row['masv'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['lop'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['birthday'] ?></td>
                <td><?php echo ($row['sex'] == 1 ? "Nữ" : ($row['sex'] == 0 ? "Nam" : "Không xác định")) ?></td>
                <td>+84 <?php echo $row['phone'] == 0 ? "Chưa có số" : $row['phone'] ?></td>
                <td>
                    <button class="btn btn-success" onclick="window.location.href='edit_student.php?masv=<?php echo $row['masv']; ?>';">
                        <i class="bi bi-pencil"></i>
                    </button>

                    <button class="btn btn-danger" onclick="deleteStudent()">
                        <i class="bi bi-trash"></i>
                    </button>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        function deleteStudent() {
                            Swal.fire({
                                title: 'Xác nhận',
                                text: 'Bạn có muốn xóa không?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Xóa',
                                cancelButtonText: 'Hủy'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'delete_student.php?masv=<?php echo $row['masv']; ?>';
                                }
                                
                            });
                        }
                    </script>
                </td>
            </tr>
    <?php
        }
    }
    ?>
</table>
<?php
mysqli_close($conn);
?>

</html>