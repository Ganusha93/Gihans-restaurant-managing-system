<html>
	
	<head>
		
			<title> Inquiry Handling </title>

	</head>

	<body>
		
	<?php

		#connecting to database
		$conn=mysqli_connect("localhost","root","","programming_project");
		if(!$conn){
		    echo "connection failed".mysqli_connect_error();
		}

		// define variables and set to empty values
		$inqType = $title = $fName = $lName = $email = $confirm_email = $phoneNum = $inquiry = $reply = $replyErr = "";	

		$sql="SELECT * FROM inquiry";
		$query=(mysqli_query($conn,$sql));
		#left notifcation bar
			echo '<div class="navidiv" align="left">';
    
            while($row = mysqli_fetch_array($query)) {
    ?>
    			<button class="but"  onclick="location.href='inquiryclient.php?no=<?php echo $row['inquiry_id'] ?>'">
    <?php
    			echo $row['title'],$row['lname'];
    			echo '</button><br/>';               
            } 
    	echo '</div>';

    	#displaying bar
   		echo '<div class="display" align="center">';
    	if(isset($_GET['no'])){
	        $no = $_GET['no'];
			$sql1 = "SELECT * FROM inquiry WHERE inquiry_id = '$no'";
			$result= mysqli_query($conn, $sql1);
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
					echo '<div class ="container" align = "center">';
			    	echo '<br>';
		    		echo 'Customer Name : ';
		    		echo $row['title'].' '.$row['fname'].' '.$row['lname'];
		    		echo '</br>';
		    		echo 'Email Address : ';
		    		echo $row['email'];
		    		echo '</br>';
		    		echo 'Phone Number : ';
		    		echo $row['phone_num'];
		    		echo '</br>';
		    		echo 'Inquiry : ';
		    		echo $row['inquiry'];
		    		echo '</br>';
		    		if($row['reply']){
		    			echo 'Reply : ';
		    			echo $row['reply'];
		    			echo '</br>';
		    		}else{
	?>
		    			<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
							Reply: <textarea name="reply" rows="10" cols="70" placeholder="Reply for the inquiry..."></textarea>
							<span class="error">*<?php echo $replyErr;?></span><br/><br/><br/>
						</form>
	<?php
		    		} 		
		    	
	?>		
			    		<button class="rep"  onclick="location.href='inquiryclient.php?accept=<?php echo $no ?>'">Reply</button>
			    		<button class="rej"  onclick="location.href='inquiryclient.php?reject=<?php echo $no ?>'">Delete</button>
    			</div>
			</div>

	<?php
				}
		    }
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["reply"])) {
		    	$replyErr = "You have to reply for their inquiery to submit";
		  	} else {	
			$reply = test_input($_POST["reply"]);
			echo $reply;
			}
		}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		if(isset($_GET['accept'])){
        $accept = $_GET['accept'];
		$sqlu = "UPDATE inquiry SET reply='$reply' WHERE inquiry_id = '$accept'";
		mysqli_query($conn,$sqlu);

        echo "<script>alert('Update Form.'); window.location.href='inquiryclient.php'; </script>";
        }



		if(isset($_GET['reject'])){
	        $reject = $_GET['reject'];
	        $sqld= "DELETE FROM inquiry WHERE inquiry_id = $reject";
	        mysqli_query($conn,$sqld);

	        echo "<script>alert('Delete Form.'); window.location.href='inquiryclient.php'; </script>";
	    }


	?>


	</body>

</html>