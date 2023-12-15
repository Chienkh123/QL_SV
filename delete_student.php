<?php
    include 'connect.php';
    $id = $_GET['masv'];
    $sql = "DELETE FROM students WHERE masv = $id";
    $query = mysqli_query($conn, $sql);
    header("Location: student.php");
?>