<?php
include 'config.php';

$imagename=$_FILES["myimage"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

$name=$_POST['name'];
$dcp=$_POST['dcp'];

//Insert the image name and image content in image_table
$insert_image="INSERT INTO images VALUES('$imagetmp','$imagename','$name','$dcp')";

if(mysqli_query($conn,$insert_image)){
	echo "upload successful";
	header('Location:gallary.php');
					exit();
}


?>