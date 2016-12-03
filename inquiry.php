<html>
<head> <center><h1> INQUIRY</h1> </center></head>

<body>

	<?php

		#connecting to database
		$conn=mysqli_connect("localhost","root","","programming_project");
		if(!$conn){
		    echo "connection failed".mysqli_connect_error();
		}

		// define variables and set to empty values
		$fNameErr = $lNameErr = $emailErr = $confirm_emailErr = $phoneNumErr = $inquiryErr = "";
		$title = $fName = $lName = $email = $confirm_email = $phoneNum = $inquiry = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$title = test_input($_POST["title"]);

			if (empty($_POST["fName"])) {
		    	$fNameErr = "First Name is required";
		  	} else {			
				$fName = test_input($_POST["fName"]);
				if (!preg_match("/^[a-zA-Z ]*$/",$fName)) {
 					$fNameErr = "Only letters and white space allowed"; 
				}
			}


			if (empty($_POST["lName"])) {
		    	$lNameErr = "Last Name is required";
		  	} else {				
				$lName = test_input($_POST["lName"]);
				if (!preg_match("/^[a-zA-Z ]*$/",$lName)) {
	 					$lNameErr = "Only letters are allowed"; 
				}
			}


			if (empty($_POST["email"])) {
		    	$emailErr = "Please type your email address";
		  	} else {				
				$email = test_input($_POST["email"]);
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$emailErr = "Invalid email format"; 
				}
			}
			if (empty($_POST["confirm_email"])) {
		    	$confirm_emailErr = "Please retype your email";
		  	} else {	
			$confirm_email = test_input($_POST["confirm_email"]);
				if(!($confirm_email==$email)){
					$confirm_emailErr = "Please recheck the emails, they are not matching!";
				}
			}

			if (empty($_POST["phoneNum"])) {
		    	$phoneNumErr = "Phone number is required";
		  	} else {	
			$phoneNum = test_input($_POST["phoneNum"]);
			}

			if (empty($_POST["inquiry"])) {
		    	$inquiryErr = "Let us know your inquiries";
		  	} else {	
			$inquiry = test_input($_POST["inquiry"]);
			}
			$sql = "INSERT INTO inquiry (title, fname, lname, email, phone_num, inquiry)VALUES ('$title', '$fName', '$lName', '$email', '$phoneNum', '$inquiry')";
			if (mysqli_query($conn,$sql)){
			}else{
				echo "error";
			}
		}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}


	?>


	<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<h4>Hi!!! :D<br/> Have a look around! let us know if you have any questions...</h4>	
		<p>Title:
		<select name="title" size="1">
		<option value="Mr.">Mr.</option>
		<option value="Mrs.">Mrs.</option>
		<option value="Miss.">Miss.</option>
		<option value="Dr.">Dr.</option>
		<option value="Rev.">Rev.</option>
		<option value="Ms.">Ms.</option>
		</select></p>
		
		First Name:<input type="text" name="fName" placeholder="First Name">
		<span class="error">*<?php echo $fNameErr;?></span><br/><br/>

		Last Name:<input type="text" name="lName" placeholder="Last Name">
		<span class="error">*<?php echo $lNameErr;?></span><br/><br/>

		E-mail:<input type="text" name="email" placeholder="email"">
		<span class="error">*<?php echo $emailErr;?></span><br/><br/>
		
		Confirm E-mail:<input type="text" name="confirm_email" placeholder="Retype your email">
		<span class="error">*<?php echo $confirm_emailErr;?></span><br/><br/>
		
		Phone Number:<input type="text" name="phoneNum" placeholder="Phone number">
		<span class="error">*<?php echo $phoneNumErr;?></span><br/><br/>
		
		Inquiry:<textarea name="inquiry" rows="10" cols="70" placeholder="Let us know your questions..."></textarea>
		<span class="error">*<?php echo $inquiryErr;?></span><br/><br/><br/>
		
		<input type="submit" name="submit" value="Submit"> 
		</form>

</body>
</html>