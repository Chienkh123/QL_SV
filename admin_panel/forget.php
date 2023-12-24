<?php
include "./config/dbconnect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Retrieve the password from the database
        $row = $result->fetch_assoc();
        $password = $row['password'];
    } else {
        echo "<script>alert('Email không tồn tại trong hệ thống')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Quên mật khẩu</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <form action="forget.php" method="post" class="form-control">
                    <h1 class="text-center">Quên mật khẩu</h1>
                    <label class="form-label" for="email">Email:</label>
                    <input class="form-control" type="email" id="email" name="email" required>
                    <?php if (isset($password)) { ?>
                    <p class="mt-3">Mật khẩu của bạn là: <?php echo $password; ?></p>
                    <?php } ?>
                    <button class="btn btn-primary mt-3" type="submit">Tra cứu</button>
                    <a href="login.php"><input class="btn btn-success mt-3" type="button" value="Quay lại"></a>

                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>