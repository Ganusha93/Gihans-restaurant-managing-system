<?php
include 'config.php';
$id= $_GET['id'];
$delete="DELETE FROM tablersv WHERE id='$id'";

if ($conn->query($delete) === TRUE) {
	header("Location: admin-reservations.php");
} else {
	echo "Error: " . $delete. "<br>" . $conn->error;
}$conn->close();

?> 