<?php
    include ('connect.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM tbuser WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        echo "Đăng nhập thành công";
    }else{
        echo "Đăng nhập thất bại";
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
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="login.php" method="post" class="form-control">
                    <h1 class="text-center">Đăng nhập</h1>
                    <label for="username" class="form-label"><i class="bi bi-person"></i>Tài Khoản</label>
                    <input class="form-control" type="text" name="username" placeholder="Username" required><br>
                    <label for="password" class="form-label"><i class="bi bi-lock"></i>Mật khẩu</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Password" required><br>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="showPassword" id="showPasswordCheckbox">
                        <label class="form-check-label" for="showPasswordCheckbox">Hiển thị mật khẩu</label><br>
                    </div>
                    <a style="display: flex;justify-content: flex-end;" class="text-decoration-none" href="sign_in.php">Chưa có tài khoản?</a>
                    <input class="btn btn-success form-control" type="submit" value="Đăng nhập">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('showPasswordCheckbox');
            showPasswordCheckbox.addEventListener('change', function () {
                if (showPasswordCheckbox.checked) {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
            });
      </script>
      
</body>
</html>
