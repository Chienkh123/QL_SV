<?php
include_once "../config/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add_user"])) {
        $hoten = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sdt = $_POST["phone"];

        $query =  mysqli_query($conn,"INSERT INTO users (name, email, password, phone) VALUES ('$hoten', '$email', '$password', '$sdt')");


        if (!$query) {
            echo mysqli_error($conn);
            header("Location: ../index.php?size=error");
        } else {
            echo "Records added successfully.";
            header("Location: ../index.php?size=success");
        }
    }
}