<?php 
session_start();
include("db.php");
include("auth.php");
if (isset( $_GET['pID'])) {


$pID = $_GET['pID'];

}

if (isset($_GET['act'] )) {
if($_GET['act'] == 'add'){

  if(!isset($_SESSION['sess_cart'])){
    $_SESSION['sess_cart'] = array(); //create a session ($_SESSION)
  }


  $_SESSION['sess_cart'][$pID] += 1;

  
  header ('location: Product_Detail_Other');
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product Detail Other</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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

/*.form {
    padding-top: 10px;
    padding-bottom: 10px;
    font-family: "HelveticaNeue-Light", "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-weight: 200;
    margin: 0;
    font-size: 15px;
    line-height: 18px;
}*/

img {
 float:left;
}

label{

  font-size:200%;
  text-align: center;
  font-family:'Monotype Corsiva','Apple Chancery','ITC Zapf Chancery','URW Chancery L',cursive;
  color: #000000;
  text-decoration-style: 
}

p{
text-align: center;

}

input{
  
  justify-content: center; 
}




</style>
	<!-- Start Reservation -->
	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h1 class="header-h">Our Menu</h1>
						<p>Let us tell you how it taste</p>
					</div>
				</div>
			</div>
       

  <form>
      <div class="form-group">
       <div class="row">
          <div class="col-md-12">
            <div>
             <img src="img/fruitCake.jpg" alt="fruitCake"  style="width:500px; height:500px; margin-right:15px;">
              </div>
                <div>
                        <strong><label for="nTitle">FRUIT CAKE</label></strong><br>
                      <p>  Hey there, let's try our delicious cake which are combination of fresh mixed fruit. You can choose what type of fruit that you prefer plus other decoration can also be made.</p>
               
<div class="form-group">
  <div class="form-row">
           <div class="col">
          <label for="name">Name</label>
          <input type="text" id="pName" name="pName"><br>
        </div>
     
 
           <div class="col">
          <label for="phone">Phone</label>
          <input type="number" id="phone" name="phone"><br>
        </div>
      </div>

  <div class="form-row">
           <div class="col">
          <label for="email">Email</label>
          <input type="text" id="email" name="email"><br>
        </div>
      </div>

      
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




    <div><h1><strong>Cake</strong></h1></div>
        <div class="form-row">
           <div class="col">
          <label for="size">Size:</label>
          <select id="size" name="size" >
            <option value="4*6.Rm20">4*6.Rm20</option>
              <option value="6*9.Rm30">6*9.Rm30</option>
              <option value="9*13.Rm40">9*13.Rm40</option>
              <option value="11*15.Rm50">11*15.Rm50</option>
              <option value="18*24.Rm60">18*24.Rm60</option>
          </select>
        </div>
      </div>

          
          <div class="column">
               <label for="flavour">Flavour:</label>
                  <select id="flavour" name="flavour" >
                      <option value="strawberry">Strawberry</option>
                        <option value="blueberry">Bluebery</option>
                        <option value="vanilla">Vanilla</option>
                        <option value="chocolate">Chocolate</option>
                        <option value="original">same as picture</option>
                    </select>
                  </div>       
              
                 <div class="column">
                    <label for="quantity">Quantity:</label>
                    <select id="quantity" name="quantity" >
                      <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                  </div>
               
            <div class="form-group">
                 <div class="column">
                    <label for="method">Delivery or Self Pick-up:</label>
                    <select id="method" name="method" placeholder="Choose Method">
                      <option value="delivery">Delivery</option>
                        <option value="pickup">Self Pick-up</option>
                    </select>
                  </div>
                </div>

           <div class="col">
          <label for="dateDeliver">Date of Delivery / Pick-up</label>
          <input type="date" id="dateDeliver" name="dateDeliver"><br>
        </div>
     


           <div class="col">
          <label for="deliverArea">Area of Delivery</label>
          <input type="text" id="deliverArea" name="deliverArea"><br>
        </div>
    

           
                <div class="column">
                    <label for="pImg">Upload Yor Design Here</label>
                <div><input type = "file" name = "fileupload" accept = "image/*" /></div>
              </div>
          
                <div class="column">
                   <label for="Description"> Order Notes: </label>
                        <div><textarea rows = "5" cols = "50" name = "description">
                            Enter description here...
                         </textarea></div>
                       </div>
                   

         <input type = "submit" name = "submit" value = "Submit" />
         <input type = "reset" name = "reset"  value = "Reset" />
         <input type = "button" name = "ok" value = "OK" />
        <a href="index.php"> <input type = "button" name = "back" value = "Back" /></a>

<?php

    $query = "SELECT * from product_catalogue_detail";
    $result = mysqli_query($conn, $query);

    $tot_item = mysqli_num_rows($result);

    ?>

    <div class="row">
      <div class="col">
        <div class="card-columns" id="display_area">
          <?php
          while($row = mysqli_fetch_assoc($result)){

            $pID = $row['pID'];
            $pType = $row['pType'];
            $pName = $row['pName'];
            $pPrice = $row['pPrice'];
            $pDescription = $row['pDescription'];
            $pDetail = $row['pDetail'];
            $pImg = $row['pImg'];

            ?>

            <div class="card text-right" style="width: 18rem;">
              
              <?php 

              if ($pImg != null) {

                echo '<img class="card-img-top" src="img/'. $pImg .'" alt="Card image cap">';

              } else {

                echo '<img class="card-img-top" src="https://dummyimage.com/640x360/f0f0f0/aaa" alt="Card image cap">';
              }

              ?>

              <div class="card-body">
                <h5 class="card-title"><?php echo $pName; ?></h5>
                <p class="card-text">RM <?php echo $pPrice; ?></p>
              </div>
              <div class="card-body" id="<?php echo encryptIt($pID); ?>">
                <a href="menu?act=view&id=<?php echo encryptIt($pID); ?>" class="btn btn-outline-success mx-1">More info</a>
                <a href="menu?act=add&id=<?php echo encryptIt($pID); ?>" class="btn btn-success">Add to cart</a>
              </div>
            </div>
           
          <div class="container p-5 d-none" id="menu_info">

    <?php
    $pId = decryptIt($_GET['pID']);

    $query = "SELECT * from product_catalogue_detail WHERE product='$pID'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $query));
    ?>

    <h2 class="display-4 text-light"><?php echo $row['pName']; ?></h2>

    <div class="card">
      <?php

      if ($row['pImg'] != null) {

        echo '<img class="card-img-top" src="img/'. $row['pImg'] .'" alt="Card image cap">';

      } else {

        echo '<img class="card-img-top" src="https://dummyimage.com/640x360/f0f0f0/aaa" alt="Card image cap">';
      }

      ?>

      <div class="card-body">
        <p class="card-text text-truncate"><?php echo $row['pDetail']; ?></p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">RM <?php echo $row['pPrice']; ?></li>
        <li class="list-group-item"><?php echo $row['pDescription']; ?></li>
      </ul>
      <div class="card-body text-center" id="<?php echo encryptIt($row['pID']); ?>">
        <a href="menu?act=add&id=<?php echo encryptIt($row['pID']); ?>" class="btn btn-success">Add to cart</a>
      </div>
    </div>
  </div>
          ?>


                 </div>
               </div>
             </div>
           </div>
          </div>
        </div>
      </div>
    </div>
</div></div>

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