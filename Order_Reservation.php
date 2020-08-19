<?php
require_once "config.php"


$product=$flavour=$filling=$quantity=$addon=$ordernotes=$image="";
$product_err=$flavour_err=$filling_err=$quantity_err=$addon_err=$ordernotes_err=$image_err="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate product
    $input_product= trim($_POST["product"]);
    if(empty($input_product)){
        $product_err = "Please choose product.";     
    } else{
        $product = $input_productl;
    }
  
// Validate flavour
     $input_flavour = trim($_POST["flavour"]);
    if(empty($input_flavour)){
        $flavour_err = "Please enter product flavour.";     
    } else{
        $flavour = $input_flavour;
    }
    // Validate quantity
     $input_quantity = trim($_POST["quantity"]);
    if(empty($input_quantity)){
        $quantity_err = "Please enter product quantity.";     
    } else{
        $quantity = $input_quantity;
    }
    // Validate ad - on
     $input_addon = trim($_POST["addon"]);
    if(empty($input_addon)){
        $addon_err = "Please enter product add on.";     
    } else{
        $addon = $input_addon;
    }

    // Validate order
     $input_ordernotes = trim($_POST["ordernotes"]);
    if(empty($input_ordernotes)){
        $ordernotes_err = "Please enter product order notes";     
    } else{
        $ordernotes = $input_ordernotes;
    }

 // Check input errors before inserting in database
    if(empty($product_err)  && empty($flavour_err) && empty($quantity_err) && empty($aadon_err) && empty($ordernotes_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO order (product, flavour, quantity, addon,ordernotes) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssiss", $param_product, $param_flavour,$param_quantity, $param_addon, $param_ordernotes);
            
            // Set parameters
            $param_product= $product;
            $param_flavour = $flavour;
            $param_quantity = $quantity;
            $param_addon= $addon;
            $param_ordernotes = $ordernotes;
            //$param_date=$date;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: orderList.php");
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
            <a href="#about/index.php">About</a>
            <a href="index.php">Event</a>
            <a href="index.php">Menu</a>
            <a href="Main_News.php">What's new</a>
            <a href="Order_Reservation.php">Book a order</a>
            <a href="Customade_Reservation.php">Customized order</a>
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
						<h1 class="header-h">Order Reservation</h1>
						<p>Take your orders to our's kitchen bakers </p>
					</div>
				</div>
			</div>
      
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create New Order</h2>
                    </div>
                    <p>Please fill this form and submit to add news record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($product_err)) ? 'has-error' : ''; ?>">
                            <label>Product</label>
                                    <div>
                                     <input type="radio" id="cake" name="cake">Cake
                                     <input type="radio" id="dessert" name="dessert">Dessert
                                     <input type="radio" id="bread" name="bread">Bread
                                     <input type="radio" id="traditional" name="traditional">Traditional
                                     <input type="radio" id="cookies" name="cake">Cookies
                                   </div>
                            <input type="text" name="product" class="form-control" value="<?php echo $product; ?>">
                            <span class="help-block"><?php echo $product_err;?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($detail_err)) ? 'has-error' : ''; ?>">
                            <label>Detail</label>
                            <textarea name="detail" class="form-control"><?php echo $detail; ?></textarea>
                            <span class="help-block"><?php echo $detail_err;?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                            <label>Description</label>
                            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                            <span class="help-block"><?php echo $description_err;?></span>
                        </div>
<!-- 
                        <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                            <label>Date</label>
                            <input type ="date" name= "date" class="form-control"><?php echo $date; ?>
                            <span class="help-block"><?php echo $date_err;?></span>
                        </div>

                        <div>
                            <input type= "file" name = "image"/>
                          
                        </div> -->

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="orderList.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
<form>




  <div class="form-row">
           <div class="col">
          <label for="name">Tell us what you need *</label>
          <div>
             <input type="radio" id="cake" name="cake">Cake
             <input type="radio" id="dessert" name="dessert">Dessert
            <input type="radio" id="bread" name="bread">Bread
             <input type="radio" id="traditional" name="traditional">Traditional
             <input type="radio" id="cookies" name="cake">Cookies
           </div>
        </div>
      </div>


<div class="form-group">
<label for="level">Level</label>
<select class="form-control"  id="level" name="level">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select>
</div>


<div class="form-group">
<label for="cakeFlav">Flavour</label>
<select class="form-control" id="cakeFlav" name="cakeFlav">
  <option value="Vanilla">Vanilla</option>
  <option value="Chocolate">Chocolate</option>
  <option value="Red Velvet">Red Velvet</option>
  <option value="Marble">Marble</option>
</select>
</div>

<div class="form-group">
<label for="cakeFill">Filling</label>
<select class="form-control" id="cakeFill" name="cakeFill">
  <option value="Vanilla">Vanilla</option>
  <option value="Chocolate">Chocolate</option>
  <option value="Red Velvet">Red Velvet</option>
  <option value="Marble">Marble</option>
</select>
</div>

<div class="form-group">
<label for="cakeQuantity">Quantity</label>
<select class="form-control" id="cakeQuantity" name="cakeQuantity">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select>
</div>

 <form action="/.php">
            <div class="form-group">
                 <div class="column">
                    <label for="oDetAddOn">Add On:</label>
                    <input type="checkbox" name="favorite1" value="candle" /> Candle
                  <input type="checkbox" name="favorite2" value="ballon" /> Ballon
                  <input type="checkbox" name="favorite3" value="knife" /> Knife
                  <input type="checkbox" name="favorite3" value="card" /> Gifted Card
                  </div>
                </div>

 <form action="/.php">
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

      <div class="reservation-box">
    <div class="container">
  <div class="form-group">
  <div class="row">
  <div class="col-md-12">                       

<div>
  <h2>Order Info Details</h2>
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
</div>
</div>
</div>
<div>
                <center><div class="row">
                             <div class="col-sm-5 form-group">
                              <button type="submit" class="btn btn-lg btn-warning btn-block" >Submit </button>
                                 </div>
                             </div>
                          </center>
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
