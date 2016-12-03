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
						<li><a href="contact.html">Contact</a></li>|
						<li class="active"><a href="#feedback" class="scroll">Feedback</a></li>
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
				<h3>Feedback</h3>
				<p>Home/Feedback</p>
			</div>
		</div>

		<div class="contact_top">
			 		<div class="container">
			 			<div class="col-md-6 contact_left wow fadeInRight" data-wow-delay="0.4s">
			 				
			 				<p>We would love to hear your thoughts, concerns with anything, so we can improve!<br><br> Please take a minute to let us know what you think about us.</p>
	<?php
		#connecting to database
		$conn=mysqli_connect("localhost","root","","gihans_db");
		if(!$conn){
		    echo "connection failed".mysqli_connect_error();
		}

        $error=FALSE;
        $yourname = $fdback = ""; 
            
            if (isset($_POST['submit'])) {
                
                if(empty($_POST['yourname'])){ 
                    $error = TRUE;
                }else{
                    $yourname = $_POST['yourname'];
                }
                
                if(empty($_POST['fdback'])){ 
                    $error = TRUE;
                }else{
                    $fdback = $_POST['fdback'];
                }
            
                if ($error==FALSE){
                $sql = "INSERT INTO feedback(yourname, fdback) VALUES ('$yourname','$fdback')";
                if(mysqli_query($conn,$sql)){

        ?>
                    <div id="popup" align = "center">
                    <h2>Thank you for submiting your feedback :D</h2><br/><br/>
                    </div>
                    <div class="sub-button wow swing animated" data-wow-delay= "0.4s">
			      	<input type="button" onclick="location.href='feedback.php';" value="OK" />
					</div>
        <?php
                    die();
                } else{
                    echo "<script type='text/javascript'>alert('Not successfully datatranfer!')</script>";}
                }
                else{
		?>
					<div id="popup" align = "center">
                    <h2>Please fill all fields and resubmiting your feedback :D</h2><br/><br/>
                    </div>
                    <div class="sub-button wow swing animated" data-wow-delay= "0.4s">
			      	<input type="button" onclick="location.href='feedback.php';" value="OK" />
					</div>
		<?php
                }
            }
        ?>


							<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
							  	<form id="fb5" action="feedback.php" method="post">
								 <div class="form_details">
					                 <input type="text" class="text" id="yourname" name="yourname" placeholder="Your Name">

									 <textarea placeholder="Feedback" name="fdback" id="fdback"></textarea>

									 <div class="clearfix"> </div>
									 <div class="sub-button wow swing animated" data-wow-delay= "0.4s">
									 	<input type="submit" name="submit" value="Send Feedback">
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
					        <div>
				        		<img src="http://www.arebbusch.com/wp-content/uploads/2011/02/Feedback.jpg" align="center" width="35%" height="55%">
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