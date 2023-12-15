<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["add_student"])) {
        $masv = $_GET["masv"];
        $name = $_GET["name"];
        $lop = $_GET["lop"];
        $email = $_GET["email"];
        $birthday = date("Y-m-d", strtotime($_GET["birthday"]));
        $sex = $_GET["sex"];
        $phone = $_GET["phone"];
        
        $query = "INSERT INTO students (masv, name, lop, email, birthday, sex, phone) VALUES ('$masv', '$name', '$lop', '$email', '$birthday', '$sex', '$phone')";
        
        if (mysqli_query($conn, $query)) {
            header("Location: student.php");
            exit;
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);