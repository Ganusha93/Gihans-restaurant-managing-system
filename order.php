<?php 
require ("dbcon.php");


$order_type=$_POST['order_type'];
$rest_location=$_POST['rest_location'];
$location=$_POST['location'];
$food_name=$_POST['food_name'];
$time=$_POST['time'];

$in_sql="INSERT INTO food_order VALUES ('$order_type','$rest_location','$location','$food_name','$time');";


  if (mysqli_query($conn,$in_sql)) {
    $status= "Successfully Inserted";
  }else{

    echo "Error".$in_sql. "<br> ".mysqli_error($conn);
  }

  header("Refresh:0;url=order.html")

 ?>