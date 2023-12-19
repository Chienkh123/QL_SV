<?php
include "./config/dbconnect.php";
$query = "SELECT first_name, last_name, user_image FROM users";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$firstname = $row['first_name'];
$lastname = $row['last_name'];
$image = $row['user_image'];

?>
<style>
    .admin-image{
        width: 120px;
        height: 120px;
        border-radius: 50%;
    }
</style>

<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img class="admin-image" src="<?php echo $image; ?>" alt="Swiss Collection"> 
    <h4 style="margin-top: 10px; font-size: 20px;" class="admin-heading"><?php echo $lastname . " " . $firstname?></h4>
</div>

<hr>
    <a href="javascript:void(0)" class="closebtn" style="color: #ff5500;" onclick="closeNav()">×</a>
    <a href="./index.php" ><i class="fa fa-home" style="color:#ff5500;"></i> Dashboard</a>
    <a href="#customers"  onclick="showCustomers()" ><i class="fa fa-users" style="color: #6ad78e;"></i> Customers</a>
    <a href="#category"   onclick="showCategory()" ><i class="fa fa-th-large" style="color: #41e9ee;"></i> Category</a>
    <a href="#sizes"   onclick="showSizes()" ><i class="fa fa-th" style="color: #ff9700;"></i> Sizes</a>
    <a href="#productsizes"   onclick="showProductSizes()" ><i class="fa fa-th-list" style="color: #d766a3;"></i> Product Sizes</a>    
    <a href="#products"   onclick="showProductItems()" ><i class="fa fa-th" style="color: #fb00ff;"></i> Products</a>
    <a href="#orders" onclick="showOrders()"><i class="fa fa-list" style="color: #a255ec;"></i> Orders</a>
    <a href="#students" onclick="showStudents()"><i class="fa fa-graduation-cap" style="color: #5757ba;"></i> Sinh viên</a>
  <!---->
</div>

 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home" style="color:#ff5500;"></i></button>
</div>


