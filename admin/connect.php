<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_management";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}
