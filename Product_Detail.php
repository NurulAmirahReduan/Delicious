<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product Detail</title>
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

h{
  text-align: right;
  color: #20b2aa;
  font-family: Comic Sans, Comic Sans MS, cursive;;
  font-size: 25px;
}
label{

  font-size:150%;
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

.form {
    padding-top: 10px;
    padding-bottom: 10px;
    font-family: "HelveticaNeue-Light", "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-weight: 200;
    margin: 0;
    font-size: 15px;
    line-height: 18px;
}

.btn {
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
 position: right;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.btn:hover {background-color: #3e8e41}

.btn:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
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

          <strong><label><h>FRUIT CAKE</h></label></strong><br>
                      <p>  Hey there, let's try our delicious cake which are combination of fresh mixed fruit. You can choose what type of fruit that you prefer plus other decoration can also be made.</p>
               
          <div class="form-group">
                  <label>Size:</label>
                  <select id="size" name="size" >
                    <option value="4*6.Rm20">4*6.Rm20</option>
                      <option value="6*9.Rm30">6*9.Rm30</option>
                      <option value="9*13.Rm40">9*13.Rm40</option>
                      <option value="11*15.Rm50">11*15.Rm50</option>
                      <option value="18*24.Rm60">18*24.Rm60</option>
                  </select>
              </div>

      <div class="form-group">
                    <label>Quantity:</label>
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
                   <label> Description: </label>
                        <div><textarea rows = "5" cols = "50" name = "description">
                            Enter description here...
                         </textarea></div>
                       </div>
                     </div>

            <div class="form-group">
                <div class="column">
                <div><input type = "file" name = "fileupload" accept = "image/*" /></div>
              </div>
            </div>
        
       
        <div type="submit" class="col-sm-2 form-group">
         <input type = "submit" name = "submit" value = "Submit" class="btn btn-lg btn-warning btn-block" />
         <input type = "reset" name = "reset"  value = "Reset"class="btn btn-lg btn-warning btn-block" />
        </div>
      
          

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