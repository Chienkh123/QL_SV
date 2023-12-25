<?php
session_start();

include"./config/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE masv = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    
    $check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE masv = '$username' AND password = '$password'"));
    if ($check == 0) {
        echo "<script>alert('Thông tin tài khoản và mật khẩu không chính xác.');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
        exit();

    }

    if ($check == 1) {
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            
                // Store user information in session
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $row['name'];
                $_SESSION['user_image'] = $row['user_image'];
                $_SESSION['isAdmin'] = $row['isAdmin'];
                $_SESSION['masv'] = $row['masv'];
                
                // Check if the user is an admin (assuming isAdmin is a column in your users table)
                if ($row['isAdmin'] == 1) {
                    // User is an admin, redirect to the admin dashboard (change the URL accordingly)
                    header("Location: ./index.php");
                } else {
                    // User is not an admin, redirect to the regular user dashboard
                    header("Location: ../index.php");
                }
                exit();
            } else {
                echo "Đăng nhập thất bại";
            }
        } else {
            echo "Lỗi truy vấn CSDL";
        }
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="login.php" method="post" class="form-control">
                    <h1 class="text-center">Đăng nhập</h1>
                    <label for="username" class="form-label"><i class="bi bi-person"></i>Tên người dùng</label>
                    <input class="form-control" type="text" name="username" placeholder="Username" required><br>
                    <label for="password" class="form-label"><i class="bi bi-lock"></i>Mật khẩu</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Password" required><br>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="showPassword" id="showPasswordCheckbox">
                        <label class="form-check-label" for="showPasswordCheckbox">Hiển thị mật khẩu</label><br>
                    </div>
                    <a style="display: flex;justify-content: flex-end;" class="text-decoration-none" href="forget.php">Quên mật khẩu?</a>
                    <input class="btn btn-success form-control" type="submit" value="Đăng nhập">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('showPasswordCheckbox');
        showPasswordCheckbox.addEventListener('change', function() {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>

</body>

</html>