<?php
include_once "../config/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add_student"])) {
        $masv = $_POST["masv"];
        $hoten = $_POST["hoten"];
        $lop = $_POST["lop"];
        $email = $_POST["email"];
        $ngaysinh = date("Y-m-d", strtotime($_POST["ngaysinh"]));
        $gioitinh = $_POST["gioitinh"];
        $sdt = $_POST["sdt"];

        $query = mysqli_query($conn, "INSERT INTO students (masv, hoten, lop, email, ngaysinh, gioitinh, sdt) VALUES ('$masv', '$hoten', '$lop', '$email', '$ngaysinh', '$gioitinh', '$sdt')");
        $query1 = mysqli_query($conn, "INSERT INTO users (masv, name, email, phone) VALUES ('$masv', '$hoten', '$email','$sdt')");

        if (!$query || !$query1) {
            echo mysqli_error($conn);
            header("Location: ../index.php?size=error");
        } else {
            echo "Records added successfully.";
            header("Location: ../index.php?size=success");
        }
    }
}