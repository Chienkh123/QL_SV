<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./admin_panel/login.php");
    exit();
}
if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
    header("Location: ./admin_panel/index.php");
    exit();
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$name = $_SESSION['name'];
$image = $_SESSION['user_image'];
$masv = $_SESSION['masv'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>

<body>
    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container-fluid justify-content-between">
            <!-- Left elements -->
            <div class="d-flex">
                <!-- Brand -->
                <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="#">
                    <img src="./assets/images/edu.jpg" height="35" loading="lazy" style="margin-top: 2px;" />
                </a>

                <!-- Search form -->
                <form class="input-group w-auto my-auto d-none d-sm-flex">
                    <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search" style="min-width: 125px;" />
                    <span class="input-group-text border-0 d-none d-lg-flex"><i class="bi bi-search"></i></span>
                </form>
            </div>
            <!-- Left elements -->

            <!-- Center elements -->
            <ul class="navbar-nav flex-row d-none d-md-flex">
                <li class="nav-item me-3 me-lg-1 active">
                    <a class="nav-link" href="#">
                        <span><i class="bi bi-house-door"></i></span>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                </li>

                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="#">
                        <span><i class="bi bi-flag"></i></span>
                    </a>
                </li>

                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="#">
                        <span><i class="bi bi-camera-video"></i></span>
                    </a>
                </li>

                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="#">
                        <span><i class="bi bi-bag"></i></span>
                    </a>
                </li>

                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="#">
                        <span><i class="bi bi-people"></i></span>
                        <span class="badge rounded-pill badge-notification bg-danger">2</span>
                    </a>
                </li>
            </ul>
            <!-- Center elements -->

            <!-- Right elements -->
            <ul class="navbar-nav flex-row">
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link d-sm-flex align-items-sm-center" href="#">
                        <img src="<?php echo $image?>" class="rounded-circle" height="22" alt="Black and White Portrait of a Man" loading="lazy" />
                        <strong class="d-none d-sm-block ms-1"><?php echo $name?></strong>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="#">
                        <span><i class="bi bi-plus-circle"></i></span>
                    </a>
                </li>
                <li class="nav-item dropdown me-3 me-lg-1">
                    <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="chatDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-chat"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">6</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatDropdown">
                        <li>
                            <a class="dropdown-item" href="#">Chat 1</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Chat 2</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Chat 3</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown me-3 me-lg-1">
                    <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">12</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                        <li>
                            <a class="dropdown-item" href="#">Notification 1</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Notification 2</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Notification 3</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown me-3 me-lg-1">
                    <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Help</a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li>
                            <a class="dropdown-item" href="#">Logout</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="./admin_panel/logout.php">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Right elements -->
        </div>
    </nav>
    <!-- Navbar -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
