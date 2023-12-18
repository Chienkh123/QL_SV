<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class='bx bxl-codepen'></i>
                <span>MyAdmin</span>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <div class="user">
            <img src="./img/user.png" alt="me" class="user-img">
            <div>
                <p class="bold">NV.Chiến</p>
                <p>Admin</p>
            </div>
        </div>
        <ul>
            <li>
                <a href="#">
                    <i class='bx bx-user' ></i>
                    <span class="nav-item">Thông tin cá nhân</span>
                </a>
                <span class="tooltip">Thông tin cá nhân</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxl-stack-overflow' ></i>
                    <span class="nav-item">Nghành học</span>
                </a>
                <span class="tooltip">Nghành học</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-folder-open' ></i>
                    <span class="nav-item">Giấy tờ nhập trường</span>
                </a>
                <span class="tooltip">Giấy tờ nhập trường</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-street-view' ></i>
                    <span class="nav-item">Quan hệ gia đình</span>
                </a>
                <span class="tooltip">Quan hệ gia đình</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-male'></i>
                    <span class="nav-item">Tuyển sinh</span>
                </a>
                <span class="tooltip">Tuyển sinh</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-graduation'></i>
                    <span class="nav-item">Kết quả học tập THPT</span>
                </a>
                <span class="tooltip">Kết quả học tập THPT</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-log-out'></i>
                    <span class="nav-item">Đăng xuất</span>
                </a>
                <span class="tooltip">Đăng xuất</span>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <div class="container">
            <h1>Hello World</h1>
        </div>
    </div>
    
    <script>
        let btn = document.querySelector("btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function(){
            sidebar.classList.toggle("active");
        };
    </script>
</body>
</html>