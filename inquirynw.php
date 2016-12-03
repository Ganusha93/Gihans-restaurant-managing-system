<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
	<head>
		<title>RECEIPES Bootstarp responsive Website Template| contact :: w3layouts</title>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		<!-- Custom Theme files -->
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfont-->
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<!--Animation-->
		<script src="js/wow.min.js"></script>
		<link href="css/animate.css" rel='stylesheet' type='text/css' />
		<script>
			new WOW().init();
		</script>
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
						});
					});
		</script>
		<script src="js/simpleCart.min.js"> </script>

		<script type="text/javascript">
		    window.onload = function() {
		        var overlay = document.getElementById("overlay");
		        var popup = document.getElementById("popup");
		        overlay.style.display = "block";
		        popup.style.display = "block";
		    
		    document.getElementById("CloseBtn").onclick = function(){
		            var overlay = document.getElementById("overlay");
		            var popup = document.getElementById("popup");
		            overlay.style.display = "none";
		            popup.style.display = "none";      
		        }
		    };
		</script>
	</head>
	<body>
	    <!-- header-section-starts -->
		<div class="header">
			<div class="container">
				<div class="top-header">
					<div class="logo">
						<a href="index.html"><img src="images/logo.png" class="img-responsive" alt="" /></a>
					</div>
					<div class="queries">
						<p>Questions? Call us!<span>+94112 814 194 </span><label>(11AM to 11PM)</label></p>
					</div>
					<div class="header-right">
							<div class="cart box_1">
								<a href="checkout.html">
									<h3> <span class="simpleCart_total"> Rs:0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span> items)<img src="images/bag.png" alt=""></h3>
								</a>	
								<p><a href="javascript:;" class="simpleCart_empty">Empty card</a></p>
								<div class="clearfix"> </div>
							</div>
						</div>
					<div class="clearfix"></div>
				</div>
			</div>
				<div class="menu-bar">
				<div class="container">
					<div class="top-menu">
					<ul>
						<li><a href="index.html">Home</a></li>|
						<li><a href="branches.html">Branches</a></li>|
						<li><a href="#">Gallery</a></li>|
						<li><a href="#">Shopping Cart</a></li>|
						<li><a href="#">Table Reservation</a></li>|
						<li class="active"><a href="#contact.html" class="scroll">Contact</a></li>|
						<li><a href="feedback.php">Feedback</a></li>
						<div class="clearfix"></div>
					</ul>
					</div>
					<div class="login-section">
						<ul>
							<li><a href="login.html">Login</a>  </li> |
							<li><a href="register.html">Register</a> </li> |
							<li><a href="#">Help</a></li>
							<div class="clearfix"></div>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		<!-- header-section-ends -->
		<div class="contact-section-page">
			<div class="contact-head">
			    <div class="container">
					<h3>Inquiry</h3>
					<p>Home/Contact/Inquiry</p>
				</div>
			</div>

			<div class="contact_top">
				<div class="container">
				 	<div class="col-md-6 contact_left wow fadeInRight" data-wow-delay="0.4s">

				 		<p>Hi!!! :D<br/> Have a look around! let us know if you have any questions...</p>
						<?php

							//connecting to database
							$conn=mysqli_connect("localhost","root","","gihans_db");
							if(!$conn){
							    echo "connection failed".mysqli_connect_error();
							}

							// define variables and set to empty values
							$fNameErr = $lNameErr = $emailErr = $confirm_emailErr = $phoneNumErr = $inquiryErr = $error ="";
							$title = $fName = $lName = $email = $confirm_email = $phoneNum = $inquiry = "";

							//validate
							if ($_SERVER["REQUEST_METHOD"] == "POST") {
								$title = test_input($_POST["title"]);

								if (empty($_POST["fName"])) {
							    	$fNameErr = "First Name is required";$error = TRUE;
							  	} else {			
									$fName = test_input($_POST["fName"]);
									if (!preg_match("/^[a-zA-Z ]*$/",$fName)) {
											$fNameErr = "Only letters and white space allowed";$error = TRUE; 
									}
								}


								if (empty($_POST["lName"])) {
							    	$lNameErr = "Last Name is required";$error = TRUE;
							  	} else {				
									$lName = test_input($_POST["lName"]);
									if (!preg_match("/^[a-zA-Z ]*$/",$lName)) {
						 					$lNameErr = "Only letters are allowed";$error = TRUE; 
									}
								}


								if (empty($_POST["email"])) {
							    	$emailErr = "Please type your email";$error = TRUE;
							  	} else {				
									$email = test_input($_POST["email"]);
									if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
										$emailErr = "Invalid email format";$error = TRUE;
									}
								}
								if (empty($_POST["confirm_email"])) {
							    	$confirm_emailErr = "Please retype your email";$error = TRUE;
							  	} else {	
								$confirm_email = test_input($_POST["confirm_email"]);
									if(!($confirm_email==$email)){
										$confirm_emailErr = "Please recheck the emails, they are not matching!";$error = TRUE;
									}
								}

								if (empty($_POST["phoneNum"])) {
							    	$phoneNumErr = "Phone number is required";$error = TRUE;
							  	} else {	
									$phoneNum = test_input($_POST["phoneNum"]);
									if(!preg_match("/^\d{10}$/",$phoneNum)){
										$phoneNumErr = "Invalid number";$error = TRUE;
									}
								}

								$inquiry = test_input($_POST["inquiry"]);

								if($error == False){
									$sql = "INSERT INTO inquiry (title, fname, lname, email, phone_num, inquiry)VALUES ('$title', '$fName', '$lName', '$email', '$phoneNum', '$inquiry')";
									if (mysqli_query($conn,$sql)){
									}else{
										echo "error";
									}
								}
							}

							function test_input($data) {
								$data = trim($data);
								$data = stripslashes($data);
								$data = htmlspecialchars($data);
								return $data;
							}


						?>



						<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						  	<form id="fb5" action="feedback.php" method="post">
							 <div class="form_details">

								<p>Title:
								<select name="title" size="1">
								<option value="Mr.">Mr.</option>
								<option value="Mrs.">Mrs.</option>
								<option value="Miss.">Miss.</option>
								<option value="Dr.">Dr.</option>
								<option value="Rev.">Rev.</option>
								<option value="Ms.">Ms.</option>
								</select></p>

						         <input type="text" class="text"  Name" id="fName" name="fName" placeholder="* First Name">
						         <span class="error"><?php echo $fNameErr;?></span><br/><br/>

						         <input type="text" class="text"  id="lName" name="lName" placeholder="* Last Name">
						         <span class="error"><?php echo $lNameErr;?></span><br/><br/>

						         <input type="text" class="text" id="email" name="email" placeholder="* E-mail">
						         <span class="error"><?php echo $emailErr;?></span><br/><br/>

						         <input type="text" class="text" id="confirm_email" name="confirm_email" placeholder="* Confirm E-mail">
						         <span class="error"><?php echo $confirm_emailErr;?></span><br/><br/>

						         <input type="text" class="text" id="phoneNum" name="phoneNum" placeholder="* Phone Number">
						         <span class="error"><?php echo $phoneNumErr;?></span><br/><br/>

								 <textarea name="inquiry" id="inquiry" placeholder="Inquiry"></textarea>
								 
								 <div class="clearfix"> </div>
								 <div class="sub-button wow swing animated" data-wow-delay= "0.4s">
								 	<input type="submit" name="submit" value="Inquire!!!">
								 </div>
						      </div>
						    </form>
						</form>
					    <div class="col-md-6 company-right wow fadeInLeft" data-wow-delay="0.4s">
							<div class="follow-us">
								<h3>follow us on</h3>
								<a href="#"><i class="facebook"></i></a>
								<a href="#"><i class="twitter"></i></a>
								<a href="#"><i class="google-pluse"></i></a>
							</div>
						</div>
					</div>
					<!--photo-->
					<div>
		        		<img src="https://websiteservice360.com/wp-content/uploads/2013/11/website-maintenance-inquiry-e1385502275481-236x300.jpg" align="center" width="35%" height="45%">
		        	</div>
				</div>
			</div>
		</div>
		<!-- footer-section-starts -->
		<div class="footer">
			<div class="container">
				<p class="wow fadeInLeft" data-wow-delay="0.4s">New Gihans Family restaurent</p>
			</div>
		</div>
		<!-- footer-section-ends -->
		<script type="text/javascript">
			$(document).ready(function() {
				/*
				var defaults = {
		  			containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
		 		};
				*/
				
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
		</script>
		<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

	</body>
</html>

