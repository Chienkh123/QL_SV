<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="./assets/css/style.css">
        </link>
    </head>
</head>

<body>

    <?php
    include "./sidebar.php";

    include_once "./config/dbconnect.php";
    ?>

    <div id="main-content" class="container allContent-section py-10">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-users d-flex justify-content-between mb-2" style="font-size: 30px; color: #6ad78e;">
                    <div class="d-flex align-items-center" style="font-size: 15px;">
                        <p class="mb-0 text-success me-1">+
                            <?php
                            $sql = "SELECT COUNT(*) as count from users where isAdmin = 0";
                            $result = $conn->query($sql);
                            $count = 0;
                            $maxValue = 1000;

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $count = $row['count'];
                            }

                            $percentage = ($count / $maxValue) * 100;
                            echo $percentage;
                            ?>
                        %</p>
                        <i class="bi bi-chevron-up text-success mb-2 fa-1x" ></i>
                    </div>
                    </i>
                    <h4>Total Users</h4>
                    <h5>
                        <?php
                        $sql = "SELECT * from users where isAdmin=0";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?></h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-th-large mb-2" style="font-size: 30px; color: #41e9ee;"></i>
                    <h4>Categories</h4>
                    <h5>
                        <?php

                        $sql = "SELECT * from category";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 30px; color: #d766a3;"></i>
                    <h4>Total Products</h4>
                    <h5>
                        <?php

                        $sql = "SELECT * from product";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-list mb-2" style="font-size: 30px; color: #a255ec;"></i>
                    <h4>Total orders</h4>
                    <h5>
                        <?php

                        $sql = "SELECT * from orders";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-graduation-cap d-flex justify-content-between mb-2" style="font-size: 30px; color: #5757ba;">
                    <div class="d-flex align-items-center" style="font-size: 15px;">
                        <p class="mb-0 text-success me-1">+
                            <?php

                            $sql = "SELECT * from students";
                            $result = $conn->query($sql);
                            $count = 0;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $count = $count + 1;
                                }
                            }

                            $percentage = ($count / 1000) * 100;
                            echo $percentage;
                            ?>
                        %</p>
                        <i class="bi bi-chevron-up text-success mb-2 fa-1x" ></i>
                    </div>
                    </i>
                    <h4>Sinh viên</h4>
                    <h5>
                        <?php

                        $sql = "SELECT * from students";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </h5>
                </div>
            </div>
        </div>

    </div>


    <?php
    if (isset($_GET['category']) && $_GET['category'] == "success") {
        echo '<script> alert("Category Successfully Added")</script>';
    } else if (isset($_GET['category']) && $_GET['category'] == "error") {
        echo '<script> alert("Adding Unsuccess")</script>';
    }
    if (isset($_GET['size']) && $_GET['size'] == "success") {
        echo '<script>';
        echo 'Swal.fire({';
        echo 'title: "Thêm thành công",';
        echo 'icon: "success"';
        echo '});';
        echo '</script>';
        
    } else if (isset($_GET['size']) && $_GET['size'] == "error") {
        echo '<script>';
        echo 'Swal.fire({';
        echo 'icon: "error"';
        echo 'title: "Thất bại",';
        echo 'text: "Vui lòng thử lại!"';
        echo '});';
        echo '</script>';
    }
    if (isset($_GET['variation']) && $_GET['variation'] == "success") {
        echo '<script> alert("Variation Successfully Added")</script>';
    } else if (isset($_GET['variation']) && $_GET['variation'] == "error") {
        echo '<script> alert("Adding Unsuccess")</script>';
    }
    ?>


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>