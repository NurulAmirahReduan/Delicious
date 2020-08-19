<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $email = $phone = $date = $address = $services = $notes =""; 

$name_err = $email_err = $phone_err = $date_err = $address_err = $services_err = $notes_er="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a news title.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a correct title.";
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
    

    // Validate phone
     $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Please enter phone number.";     
    } else{
        $phone = $input_phone;
    }

     // Validate date
     $input_date = trim($_POST["date"]);
    if(empty($input_date)){
        $date_err = "Please enter date.";     
    } else{
        $date = $input_date;
    }

     // Validate address
     $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter address.";     
    } else{
        $address = $input_address;
    }

     // Validate service
     $input_service = trim($_POST["service"]);
    if(empty($input_service)){
        $service_err = "Please enter service.";     
    } else{
        $service = $input_service;
    }

     // Validate notes
     $input_notes = trim($_POST["notes"]);
    if(empty($input_notes)){
        $notes_err = "Please enter notes.";     
    } else{
        $notes = $input_notes;
    }



    // Check input errors before inserting in database
    if(empty($name_err) && empty($email_err) && empty($phone_err) && empty($date_err) && empty($address_err) && empty($service_err) && empty($notes_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO custom_order (name,email,phone, date, address, service, notes) VALUES (?, ?, ?, ?, ? , ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_phone, $param_date , $param_address , $param_service , $param_notes);
            
            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_phone = $phone;
            $param_date= $date;
            $param_address = $address;
            $param_service = $service;
            $param_notes = $notes;
            //$param_date=$date;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: Customade_Reservation.php");
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
  <title>Order Form</title>
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

</style>
<body>
  <!--banner-->
  <section id="banner">
    <div class="background-color: rgb(203, 77, 99)">
	
      <header id="header">
        <div class="container">
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="index.php">About</a>
            <a href="index.php">Event</a>
            <a href="index.php">Menu</a>
            <a href="Main_News.php">What's new</a>
            <a href="Order_Reservation.php">Book a order</a>
            <a href="Customade_Reservation.php">Customized Order</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
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
						<h1 class="header-h">Customade Order Reservation</h1>
						<p>Take your orders to our's kitchen bakers </p>
					</div>
				</div>
			</div>
      

<form>
<p>When it comes to the someone's event such as birthday, anniversary, or any special occasions, Wahida's Homemade Bakery are here for you. We are specialized for the customization cake for you.Please note that we require 
  <strong>at least 5 working days of notice</strong> to ensure smooth ordering!</p>
  

<div class="form-group">
<label for="Name">Name</label>
<input class="form-control" id="name" name="name">
</div>

<div class="form-group">
<label for="email">Email</label>
<input class="form-control" id="email" name="email">
</div>

<div class="form-group">
<label for="phone">Phone</label>
<input class="form-control" id="phone" name="phone">
</div>

<div class="form-group">
<label for ="Pickup Date/Time">Pickup Date/Time</label>
<input type="datetime-local" name="pickup_time" required>
</label>
</div>

<div class="form-group">
<label for ="address">Address</label>
<input class="form-control" id ="address" name="address">
</div>

  <div class="form-group">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadios" id="inlineRadios1" value="option1" checked>
        <label class="form-check-label" for="inlineRadios1">Pick-up</label>
      </div>
      </div>

      <div class="form-group">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadios" id="inlineRadios2" value="option2">
             <label class="form-check-label" for="inlineRadios2">Delivery</label>
             </div>
      </div>

       <div class="form-group">
            <div class="column">
               <label for="Description"> Order Notes: </label>
                    <div><textarea rows = "5" cols = "50" name = "description">
                        Enter description here...
                     </textarea></div>
                   </div>
                 </div>


<div class="form-group">
  <label for="uploadImg"> Upload the Image</label>
  <input type="file" class="form-control" id="uploadImg">
</div>

                <div>
                     <div class="column">
                       <center><div class="col-sm-5 form-group">
                              <button type="submit" class="btn btn-lg btn-warning btn-block" >Submit </button>   
                                 </div></center>
                             </div>
                       
                <div class="column">
                          <center><div class="col-sm-5 form-group">
                              <button type="cancel" class="btn btn-lg btn-warning btn-block" >Cancel </button>   
                                 </div></center>
                             </div>
                        </div>


</div>
</div>
</div>
</div>
</div>
</div>
</div> 
</form>
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
