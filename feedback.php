<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $email = $comment = "";
$name_err = $email_err = $comment_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter email.";     
    } else{
        $email = $input_email;
    }
    
    // Validate salary
    $input_comment = trim($_POST["comment"]);
    if(empty($input_comment)){
        $comment_err = "Please enter comment.";     
    } else{
        $comment = $input_comment;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($email_err) && empty($comment_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO user_feedback (name, email, comment) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_comment);
            
            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_comment = $comment;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: User_feedback.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Feedback_Form</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- =======================================================
    Theme Name: Delicious
    Theme URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>
<style>

.form {
    padding-top: 10px;
    padding-bottom: 10px;
    font-family: "HelveticaNeue-Light", "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-weight: 200;
    margin: 0;
    font-size: 15px;
    line-height: 18px;
}

span{

  ba
}
</style>
<body>
  <!--banner-->
  <section id="banner">
    <div class="background-color: rgb(203, 77, 99)">
	
      <header id="header">
        <div class="container">
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#about">About</a>
            <a href="#event">Event</a>
            <a href="#menu-list">Menu</a>
            <a href="#contact">Book a order</a>
          </div>
          <!-- Use any element to open the sidenav -->
          <span onclick="openNav()" class="pull-right menu-icon">☰</span>
        </div>
      </header>
      <div class="container">
        <div class="row">
          <div class="inner text-right">
            <h1 class="logo-name">Wahida's Homemade Bakery</h1>
            <h2>Food To fit your satisfaction</h2>
            <p>Specialized in cakes and pastry!!</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / banner -->
 

	<!-- Start Reservation -->
<div class="reservation-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading-title text-center">
					<h1 class="header-h">User's Feedback</h1>
					<p>Support our bakery by showing your feedback</p>
				</div>
			</div>
		</div>
	</div>

   

		<div class="form-group">
		 <div class="imagebg"></div>
		<div class="row " style="margin-top: 50px">
		    <div class="col-md-6 col-md-offset-3 form-container">
		        
		        <form role="form" method="post" id="reused_form">
		            <div class="row">
		                <div class="col-sm-12 form-group">
		                <label>How do you rate your overall experience?</label>
		                
		                </div>
		            </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="name">
                            Your Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email">
                            Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
		            <div class="row">
		                <div class="col-sm-12 form-group">
		                    <label for="comments">
		                        Comments:</label>
		                    <textarea class="form-control" type="textarea" name="comment" id="comments" placeholder="Your Comments" maxlength="6000" rows="2"></textarea>
		                </div>
		            </div>
		            

		                        <div class="row">
		                <div class="col-sm-12 form-group">
		                    <button type="submit" class="btn btn-lg btn-warning btn-block" >Post <a href="User_feedback.php"></a>
                      </button>
		                </div>
		            </div>

		        </form>
		    </div>
      </div>
    </div>
		</div>
	<!-- End Reservation -->
	
  

  <!-- footer -->
  <footer class="footer text-center">
    <div class="footer-top">
      <div class="row">
        <div class="col-md-offset-3 col-md-6 text-center">
          <div class="widget">
            <h4 class="widget-title">Wahida's Homemade Bakery</h4>
            <address>Lot 885 Kampung Wakaf Bunut<br>Pasir Puteh, 16800 Kelantan</address>
            <div class="social-list">
              <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
            </div>
            <p class="copyright clear-float">
              © Delicious Theme. All Rights Reserved
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Delicious
                -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
