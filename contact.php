<?php 
require ("dbcon.php");


$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];

$in_sql="INSERT INTO contact VALUES ('$name','$email','$subject','$message');";


  if (mysqli_query($conn,$in_sql)) {
    $status= "Successfully Inserted";
  }else{

    echo "Error".$in_sql. "<br> ".mysqli_error($conn);
  }

  header("Refresh:0;url=contact.html")

 ?>