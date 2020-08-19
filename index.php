<!-- <?php
session_start();

if (isset($_SESSION["sess_id"])) {

    header('location: welcome.php');
}
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
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

<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;

}


button:hover {
  opacity: 0.8;
 
}


}
</style>

</head>

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
            <a href="Main_News.php">What's new</a>
            <a href="orderCreate.php">Book a order</a>
            <a href="profileMain.php">Profile</a>
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
  <!--about-->
  <section id="about" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center marb-35">
          <h1 class="header-h">What we can offer you</h1>
          <p class="header-p"> Our classic treats are made daily by in-house bakers, using the freshest & finest ingredients. Come visit us for delicious, sentimental sweets and a friendly, old-fashioned neighborhood experience
            guarantee the customer's satisfaction </p>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="col-md-6 col-sm-6">
            <div class="about-info">
              <h2 class="heading">About us</h2>
              <p>Wahida Homemade Bakery striving to create customade yummy baked goods, including variety of bread, dessert , and traditional appetizer for any occasion. We are up-to-date on the new baking trends. Then, we add our own twists to create a true original tasty recipe.</p>
              <br>
              <p>We will make sure that our product:</p>
              <div class="details-list">
                <ul>
                  <li><i class="fa fa-check"></i>Customade </li>
                  <li><i class="fa fa-check"></i>Fresh ingredients</li>
                  <li><i class="fa fa-check"></i>Guarantee customer's satisfaction</li>
                  <li><i class="fa fa-check"></i>Order delivered on time </li>
                 </ul>
                 <br>
                 <p>So, don't affraid to challenge us with your craziest idea pastry that you want and we will sent the order straight to your door </p>
            
                  
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <img src="img/pavlova.jpg" alt="" class="img-responsive">
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
    </div>
  </section>
  <!--/about-->
  <!-- event -->
  <section id="event">
    <div class="bg-color" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 text-center" style="padding:60px;">
            <h1 class="header-h">Best of the February</h1>
            <p class="header-p">Hot Selling!</p>
          </div>
          <div class="col-md-12" style="padding-bottom:60px;">
            <div class="item active left">
              <div class="col-md-6 col-sm-6 left-images">
                <img src="img/pulut_kuning.jpg" class="img-responsive">
              </div>
              <div class="col-md-6 col-sm-6 details-text">
                <div class="content-holder">
                  <h2>Pulut Kuning Berhias</h2>
                  <p>Combination of glutinuous rice layered with minced beef or chicken. On top of it, there will be carved from fruit, vegetables and etc decoration to meet your occassion. </p>
                <!--   <address>
                              <strong>Place: </strong>
                              1612 Collins Str, Victoria 8007
                              <br>
                              <strong>Time: </strong>
                              07:30pm
                            </address> -->
                  <a class="btn btn-imfo btn-read-more" href="readmore.php">Read more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ event -->
  <!-- menu -->
  <section id="menu-list" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center marb-35">
          <h1 class="header-h">Menu List</h1>
          <p class="header-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
            <br>nibh euismod tincidunt ut laoreet dolore magna aliquam. </p>
        </div>

        <div class="col-md-12  text-center" id="menu-flters">
          <ul>
            <li><a class="filter active" data-filter=".menu-restaurant">Show All</a></li>
            <li><a class="filter" data-filter=".cakes">Cakes</a></li>
            <li><a class="filter" data-filter=".cookies">Cookies</a></li>
            <li><a class="filter" data-filter=".dessert">Dessert</a></li>
			<li><a class="filter" data-filter=".traditional">Traditional</a></li>
			<li><a class="filter" data-filter=".bread">Bread</a></li>



          </ul>
        </div>

        <div id="menu-wrapper">

          <div class="cakes menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php?id=1" data-meal-img="img/restaurant/rib.jpg">Cheesecakes</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">chocolate , vanilla flavour</span>
          </div>

          <div class="cakes menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Chocolate </a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">baked , steam method</span>
          </div>

          <div class="cakes menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Borneo Layer</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">consist chocolate bars</span>
          </div>

          <div class="cakes menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Span Cakes</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">chocolate, vanilla</span>
          </div>

		  <div class="cakes menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Caramel Pudding</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">rainbow cakes with the caramel on top</span>
          </div>
		  
		  <div class="cakes menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Marble Cakes</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">fluffy cakes for tea party</span>
          </div>
		  
          <div class="cookies menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Cubic Tart</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">consist of pineapple jam</span>
          </div>

          <div class="cookies menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Red Pearl </a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">combination of chocolate chip and peanut</span>
          </div>

          <div class="cookies menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Untaian Kasih </a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">combination of chocolate chip</span>
          </div>

          <div class="cookies menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg"> Pineapple Tart </a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">combination of butter and pineapple jam</span>
          </div>

          <div class="cookies menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Dates Layer </a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">combination of butter and dates jam</span>
          </div>
          <div class="cookies menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Almond London </a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">consist of almond </span>
          </div><div class="cookies menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Chocolate Cookies</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">consist of almond and chocolate chips</span>
          </div>

		   </div><div class="cookies menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Shortbread Cookies</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">fluffy cookies with cherry on top</span>
          </div>
		  
          <div class="dessert menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Pavlova Fruit</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">+ Mixed fruit</span>
            <br>
			<span class="menu-subtitle">+ Extra fruit</span>
		</br>
          </div>

          <div class="dessert menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Fluffy CreamPuff</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">+ Custard</span>
            <br><span class="menu-subtitle">+ Creamy Corn</span></br>

          </div>

 <div class="dessert menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Cheese Tart</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
			<span class="menu-subtitle">+ Peanut Butter</span>
            <br><span class="menu-subtitle">+ Strawberry</span></br>
            <span class="menu-subtitle">+ Blueberry</span>
            <br><span class="menu-subtitle">+ Kiwie</span></br>
</div>

 <div class="dessert menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Delicious Egg Tart</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
			<span class="menu-subtitle">+ Mini tart</span>
            <br><span class="menu-subtitle">+ Large Tart</span></br>
</div>


<div class="traditional menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Pulut Berhias</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">For wedding and engagement</span>
          </div>

<div class="traditional menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Apam Polkadot</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">dessert with the polkadot decoration on top</span>
          </div>

<div class="traditional menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Talam Sri Muka</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">pandan flavour and coconut milk</span>
          </div>

<div class="traditional menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Puteri Ayu</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">dessert with the grated coconut on top</span>
          </div>

<div class="bread menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Fluffy Doughnut</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">bread that coated with castor sugar</span>
          </div>
<div class="bread menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Cinnamon Roll</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">bread that coated with cinnamon spices and sugar</span>
          </div>
<div class="bread menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Mini Pizza</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">consist of sausages, vegetables</span>
          </div>
<div class="bread menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="Product_Detail.php" data-meal-img="assets/img/restaurant/rib.jpg">Minced Bread</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">RM 20.99</span>
            </span>
            <span class="menu-subtitle">chicken or meat on top</span>
          </div>




        </div>

      </div>
    </div>
  </section>
  <!--/ menu -->
  <!-- contact -->
  <section id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="header-h">Book Your Seat for Workshop</h1>
          <p class="header-p">This form is for workshop class where we need your details to book seat. Firstly, filled up this form then make payment according to the class you entered.Hopefully you enjoyed the class well. Have fun </p>
        </div>
      </div>
      <div class="row msg-row">
        <div class="col-md-4 col-sm-4 mr-15">
          <div class="media-2">
            <div class="media-left">
              <div class="contact-phone bg-1 text-center"><span class="phone-in-talk fa fa-phone"></span></div>
            </div>
            <div class="media-body">
              <h4 class="dark-blue regular">Phone Numbers</h4>
              <p class="light-blue regular alt-p">+0137654315 - <span class="contacts-sp">Phone Booking</span></p>
            </div>
          </div>
          <div class="media-2">
            <div class="media-left">
              <div class="contact-email bg-14 text-center"><span class="hour-icon fa fa-clock-o"></span></div>
            </div>
            <div class="media-body">
              <h4 class="dark-blue regular">Opening Hours</h4>
              <p class="light-blue regular alt-p"> Monday to Friday 09.00 - 18:00</p>
              <p class="light-blue regular alt-p">
                Friday and Sunday 08:00 - 15.00
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-sm-8">
          <form action="" method="post" role="form" class="contactForm">
            <div id="sendmessage">Your booking request has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <div class="col-md-6 col-sm-6 contact-form pad-form">
              <div class="form-group label-floating is-empty">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>

            </div>
            <div class="col-md-6 col-sm-6 contact-form">
              <div class="form-group">
                <input type="date" class="form-control label-floating is-empty" name="date" id="date" placeholder="Date" data-rule="required" data-msg="This field is required" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 contact-form pad-form">
              <div class="form-group">
                <input type="email" class="form-control label-floating is-empty" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 contact-form">
              <div class="form-group">
                <input type="time" class="form-control label-floating is-empty" name="time" id="time" placeholder="Time" data-rule="required" data-msg="This field is required" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 contact-form">
              <div class="form-group">
                <input type="text" class="form-control label-floating is-empty" name="phone" id="phone" placeholder="Phone" data-rule="required" data-msg="This field is required" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 contact-form">
              <div class="form-group">
                <input type="text" class="form-control label-floating is-empty" name="people" id="people" placeholder="People" data-rule="required" data-msg="This field is required" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="col-md-12 contact-form">
              <div class="form-group label-floating is-empty">
                <textarea class="form-control" name="message" rows="5" rows="3" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>

            </div>
            <div class="col-md-12 btnpad">
              <div class="contacts-btn-pad">
                <button class="contacts-btn">Book Seat</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- / contact -->
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
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
