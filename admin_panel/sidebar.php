<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$name = $_SESSION['name'];
$image = $_SESSION['user_image'];

?>

<style>
    .admin-image {
        width: 60px;
        height: 60px;
        border-radius: 50%;
    }
</style>

<!-- Sidebar -->

<div class="sidebar" id="mySidebar">
    <div class="side-header">
        <img class="admin-image" id="admin-image" src="<?php echo $image; ?>" alt="Swiss Collection">
        <h4 style="margin-top: 10px; font-size: 20px; color: #ff5500;" id="admin-name" class="admin-heading"><?php echo $name?></h4>
       
    </div>

    <hr>
    <a href="javascript:void(0)" class="closebtn" style="color: #ff5500;" onclick="closeNav()">×</a>
    <a href="./index.php"><i class="fa fa-home" style="color:#ff5500;"></i><span id="hide-text"> Dashboard</span></a>
    <a href="#customers" onclick="showCustomers()"><i class="fa fa-users" style="color: #6ad78e;"></i><span id="hide-text"> Customers</span></a>
    <a href="#category" onclick="showCategory()"><i class="fa fa-th-large" style="color: #41e9ee;"></i><span id="hide-text"> Category</span></a>
    <a href="#sizes" onclick="showSizes()"><i class="fa fa-th" style="color: #ff9700;"></i><span id="hide-text"> Sizes</span></a>
    <a href="#productsizes" onclick="showProductSizes()"><i class="fa fa-th-list" style="color: #d766a3;"></i><span id="hide-text"> Product Sizes</span></a>
    <a href="#products" onclick="showProductItems()"><i class="fa fa-th" style="color: #fb00ff;"></i><span id="hide-text"> Products</span></a>
    <a href="#orders" onclick="showOrders()"><i class="fa fa-list" style="color: #a255ec;"></i><span id="hide-text"> Orders</span></a>
    <a href="#students" onclick="showStudents()"><i class="fa fa-graduation-cap" style="color: #5757ba;"></i><span id="hide-text"> Sinh viên</span></a>
    <!---->
    <hr>
    <div class="side-footer">
        <a href="logout.php"><i class="fa fa-sign-out" style="color: #ff5500;"></i><span id="hide-text"> Đăng xuất</span></a>
    </div>
</div>
<div id="main">

</div>
<a class="openbtn btn" onclick="openNav()"><i class="bi bi-list-task" style="color:#ff5500; font-size: 35px;"></i></a>
