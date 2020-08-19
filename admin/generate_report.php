<?php
include_once('db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Generate_Report</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
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

img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}

label{

  font-size:300%;
  text-align: center;
  font-family:'Monotype Corsiva','Apple Chancery','ITC Zapf Chancery','URW Chancery L',cursive;
  color: #ffc0cb;
  text-decoration-style: 
}

p{
text-align: center;

}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}


</style>

  
    <!-- Start Reservation -->
    <div class="reservation-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h1 class="header-h">Generate Report</h1>
                    </div>
                </div>
            </div>
       

  <form action="/admin/index.php" method="POST"
      <div class="form-group">
         <div class="row">
           <div class="col-md-12"> 
          </div>
     </div>
          </div>
          <center><div class="data">

            <select name="Month">
              <option>Select</option>
             
              <option>January</option>
              <option>February</option>
              <option>March</option>
              <option>April</option>
              <option>May</option>
              <option>June</option>
              <option>July</option>
              <option>August</option>
              <option>September</option>
              <option>October</option>
              <option>November</option>
              <option>December</option>
            </select>

            <input type="submit" name="submit" class="submit"/>
        </div></center>
<table>
  <tr>
    <th>No</th>
    <th>Product ID</th>
    <th>Product Type</th>
    <th>Product Name</th>
    <th>Product Price</th>
    <th>Product Sold</th>
    <th>Quantity</th>
    <th>Total</th>
    <th>Action</th>
  </tr>
  <tr>
    <td>1.</td>
    <td>100</td>
    <td>Cakes</td>
    <td>CHEESECAKES</td>
    <td>20.99</td>
    <td>100</td>
    <td>150</td>
    <td>209.90</td>
    <td>Edit | Delete</td>
  </tr>
  <tr>
    <td>2.</td>
    <td>101</td>
    <td>Cakes</td>
    <td>CHOCOLATE</td>
    <td>20.99</td>
    <td>100</td>
    <td>150</td>
    <td>209.90</td>
    <td>Edit | Delete</td>
  </tr>
  <tr>
    <td>3.</td>
    <td>102</td>
    <td>Cakes</td>
    <td>MARBLE</td>
    <td>20.99</td>
    <td>100</td>
    <td>150</td>
    <td>209.90</td>
    <td>Edit | Delete</td>
  </tr>
  <tr>
    <td>4.</td>
    <td>103</td>
    <td>Cookies</td>
    <td>RED PEARL</td>
    <td>20.99</td>
    <td>100</td>
    <td>150</td>
    <td>209.90</td>
    <td>Edit | Delete</td>
  </tr>
  <tr>
    <td>5.</td>
    <td>104</td>
    <td>Cookies</td>
    <td>CUBIC TART</td>
    <td>20.99</td>
    <td>100</td>
    <td>150</td>
    <td>209.90</td>
    <td>Edit | Delete</td>
  </tr>
  <tr>
    <td>6.</td>
    <td>100</td>
    <td>Cookies</td>
    <td>DATES LAYER</td>
    <td>20.99</td>
    <td>100</td>
    <td>150</td>
    <td>209.90</td>
    <td>Edit | Delete</td>
  </tr>
</table>
        </form>
        
  
                   </div>
                </div>
            </div>
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

  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery.easing.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/custom.js"></script>
  <script src="../contactform/contactform.js"></script>

</body>

</html>
