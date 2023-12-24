<?php
session_start();
include('./config/dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate input data
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirmPassword) || empty($sdt)) {
        echo "Vui lòng điền đầy đủ thông tin.";
        exit();
    }

    if ($password !== $confirmPassword) {
        echo "Mật khẩu không khớp.";
        exit();
    }

    // Check if the email already exists
    $checkSql = "SELECT COUNT(*) FROM users WHERE email = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    $checkRow = $checkResult->fetch_row();

    if ($checkRow[0] > 0) {
        echo "Email đã tồn tại.";
        exit();
    }

    // Insert new user with plaintext password
    $sql = "INSERT INTO users (first_name, last_name, email, password, phone) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $firstname, $lastname, $email, $password, $sdt);

    if ($stmt->execute()) {
       
        header("Location: login.php");
        exit();
    } else {
        echo "Đăng ký thất bại";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form class="form-control" method="post">
                    <h1 class="text-center">Đăng ký</h1>
                    <label for="firstname" class="form-label"><i class="bi bi-person"></i>Họ</label>
                    <input class="form-control" type="text" name="firstname" placeholder="Firstname" required><br>
                    <label for="lastname" class="form-label"><i class="bi bi-person"></i>Tên</label>
                    <input class="form-control" type="text" name="lastname" placeholder="Lastname" required><br>
                    <label for="email" class="form-label"><i class="bi bi-person"></i>Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Email" required><br>
                    <label for="sdt" class="form-label"><i class="bi bi-person"></i>Số điện thoại</label>
                    <input class="form-control" type="number" name="sdt" placeholder="Phone" required><br>
                    <label for="password" class="form-label"><i class="bi bi-lock"></i>Mật khẩu</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Password" required><br>
                    <label for="confirmPassword" class="form-label"><i class="bi bi-lock"></i>Xác nhận mật khẩu</label>
                    <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
                    <span class="text-danger" id="passwordMatchError">*Mật khẩu không khớp.</span>
                    <div class="form-check mt-3 mb-3">
                        <input type="checkbox" class="form-check-input" name="showPassword" id="showPasswordCheckbox">
                        <label class="form-check-label" for="showPasswordCheckbox">Hiển thị mật khẩu</label><br>
                    </div>
                    <input class="btn btn-success form-control" type="submit" id="Submit" value="Đăng ký">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        //Kiểm tra điều kiện submit
        document.getElementById("Submit").addEventListener("click", function (event) {
            if (!checkPasswordMatch()) {
                event.preventDefault();
            }
        });

        //Xác nhận mật khẩu
        function checkPasswordMatch() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            var errorElement = document.getElementById("passwordMatchError");

            if (password !== confirmPassword) {
                errorElement.style.display = "inline";
                return false;
            } else {
                errorElement.style.display = "none";
                return true;
            }
        }

        //Hiển thị mật khẩu
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const showPasswordCheckbox = document.getElementById('showPasswordCheckbox');
        showPasswordCheckbox.addEventListener('change', function () {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
                confirmPasswordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
                confirmPasswordInput.type = 'password';
            }
        });
    </script>
</body>
</html>
