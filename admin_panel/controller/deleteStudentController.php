<?php

    include_once "../config/dbconnect.php";
    
    $id=$_POST['id'];
    $query="DELETE FROM students where id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Size Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>