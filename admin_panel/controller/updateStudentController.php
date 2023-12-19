<?php
include_once "../config/dbconnect.php";
    // Update the student record in the database
    $Id = $_POST['id'];
    $studentID = $_POST['masv'];
    $studentName = $_POST['hoten'];
    $studentLop = $_POST['lop'];
    $studentEmail = $_POST['email'];
    $studentBirthday = date("Y-m-d", strtotime($_POST["ngaysinh"]));
    $studentPhone = $_POST['sdt'];
    $studentSex = $_POST['gioitinh'];

    $updateQuery = mysqli_query($conn, "UPDATE students SET
        masv = '$studentID',
        hoten = '$studentName',
        lop = '$studentLop',
        email = '$studentEmail',
        ngaysinh = '$studentBirthday',
        sdt = '$studentPhone',
        gioitinh = '$studentSex' WHERE id = $Id");
    if($updateQuery)
    {
        echo "true";
    }
?>