<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>RECEIPES Bootstarp responsive Website Template| order page :: w3layouts</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.min.css" rel="stylesheet">
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
<script src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script src="js/tms-0.4.1.js"></script>
<script>
 $(window).load(function(){
      $('.slider')._TMS({
              show:0,
              pauseOnHover:false,
              prevBu:'.prev',
              nextBu:'.next',
              playBu:false,
              duration:800,
              preset:'fade', 
              pagination:true,//'.pagination',true,'<ul></ul>'
              pagNums:false,
              slideshow:8000,
              numStatus:false,
              banners:false,
          waitBannerAnimation:false,
        progressBar:false
      })  
      });
      
     $(window).load (
    function(){$('.carousel1').carouFredSel({auto: false,prev: '.prev',next: '.next', width: 960, items: {
      visible : {min: 1,
       max: 4
},
height: 'auto',
 width: 240,

    }, responsive: false, 
    
    scroll: 1, 
    
    mousewheel: false,
    
    swipe: {onMouse: false, onTouch: false}});
    
    
    });      

     </script>
     <style>
.error {color: #FF0000;}
</style>

<style> tr {
    height: 1px;
    width:2px;
}</style>
<script src="js/jquery.easydropdown.js"></script>
<script src="js/simpleCart.min.js"> </script>
<?php
include_once 'config.php';
// define variables and set to empty values
$name = $email = $phone = $date = $time =$party=$branch="";
$nameErr = $emailErr = $phoneErr = $dateErr =$timeErr=$partyErr=$branchErr= "";
$err=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $err=1;
      $nameErr = "Name is required";
   } else {
      $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed"; 
      }
    }
    if (empty($_POST["email"])) {
      $err=1;
      $emailErr = "email is required";
    } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format"; 
      }
  }
  if (empty($_POST["phone"])) {
    $err=1;
      $phoneErr = "phone Number is required";
    } else {
    $phone = test_input($_POST["phone"]);
  }
  if (empty($_POST["date"])) {
    $err=1;
      $dateErr = "Date is required";
    } else {
      $date = test_input($_POST["date"]);
    }
    if (empty($_POST["time"])) {
      $err=1;
      $timeErr = "time is required";
    } else {
      $time = test_input($_POST["time"]);
  }
  if (empty($_POST["party"])) {
    $err=1;
      $partyErr = "party is required";
    } else {
      $party = test_input($_POST["party"]);
    }
    if (empty($_POST["branch"])) {
    $err=1;
      $branchErr = "party is required";
    } else {
      $branch = test_input($_POST["branch"]);
    }
    if($err==0){
      $insert="INSERT INTO tablersv (name,email,phone,date,time,party,branch)VALUES ('$name','$email','$phone','$date','$time','$party','$branch')";
if ($conn->query($insert) === TRUE) {
  echo "New record created successfully";
} else {
echo "Error: " . $insert . "<br>" . $conn->error;
}$conn->close();

      header('Location:TableReservation.php');
    exit();
  }
          else{htmlspecialchars($_SERVER["PHP_SELF"]);}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>  
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
          <p>Questions? Call us Toll-free!<span> </span><label>(11AM to 11PM)</label></p>
        </div>
        <div class="header-right">
            <div class="cart box_1">
              <a href="checkout.html">
                <h3> <span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span> items)<img src="images/bag.png" alt=""></h3>
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
            <li><a href="popular-restaurents.html">Popular Restaurants</a></li>|
            <li><a href="order.html">Order</a></li>|
            <li class="active"><a href="TableReservation.php">Table Reservation</a></li>|
            <li><a href="contact.html">contact</a></li>
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
    </div>
  <!-- header-section-ends -->
  <div class="order-section-page">
    <div class="ordering-form">
      <div class="container">
      <div class="order-form-head text-center wow bounceInLeft" data-wow-delay="0.4s">
            <h3>Image Upload</h3>
            <p>Add to Gallary</p>
          </div>
        <div class="col-md-6 order-form-grids">
          
          <div style="background-color:#F1F1F1;  border-radius:50px; border: 3px solid #5BBD50;">
<form method="POST" action="getData.php" enctype="multipart/form-data">  
 <div class="form-group" style="width: 70%;  left:100px;   line-height: 18px; position: relative;  left: 20%; background-color:#F1F1F1;color: black;">
<br><br>
  <input class="btn btn-success" type="file" name="myimage"><br>
  Product name:<input class="form-control" type="text" name="name"><br>
  Description:<p><textarea class="form-control" name="dcp" rows="5" cols="40"></textarea></p><br>
  <input class="btn btn-success" type="submit" name="submit_image" value="Upload">
</div>
</form>


</div>
        </div>
        <div class="col-md-6 ordering-image wow bounceIn" data-wow-delay="0.4s">
          <img src="images/gallaryadd.jpg" class="img-responsive" alt="" />
        
      </div>
    </div>

  </div>
  <!-- footer-section-starts -->
  <div class="footer">
    <div class="container">
      <p class="wow fadeInLeft" data-wow-delay="0.4s">&copy; Gihan's Family Resturent </p>
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