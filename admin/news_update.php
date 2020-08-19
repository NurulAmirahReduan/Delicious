<?php
include ('../db.php');

// $usr_id = $_SESSION['sess_id'];
$id = decryptIt($_GET['id']);

if (isset($_POST['submit'])) {

  $title = $_POST['nTitle'];
  $detail = $_POST['nDetail'];
  $desc = $_POST['nDescription'];
  $date = $_POST['nDate'];

  if(!empty($_FILES['nImg']['name'])){
    
    //Fetch file info
    $file_name = $_FILES['nImg']['name'];
    $file_tmp = $_FILES['nImg']['tmp_name'];

    $newdir = '../img';

    if (!file_exists($newdir)) {
      mkdir ($newdir, 0744);
    }

    move_uploaded_file($file_tmp, "../img" . $file_name);

    $query = "UPDATE news_detail SET nImg = '$file_name', nTitle = '$title', nDetail = '$detail',nDescription = '$desc', nDate = '$date', WHERE nID = '$id'";
    $result = mysqli_query($conn, $query);

    header ('location: news');
    exit();

  } else {

    $query = "UPDATE news_detail SET nTitle = '$title', nDetail = '$detail',nDescription = '$desc', nDate = '$date' WHERE nID = '$id'";
    $result = mysqli_query($conn, $query);

    header ('location: news');
    exit();

  }


}

if ($_GET['act'] == 'delctlog') {

  $query = "SELECT nImg from news_detail WHERE nID = '$id'";
  $data = mysqli_fetch_assoc(mysqli_query($conn, $query));
  $file_name = $data["nImg"];

  $query = "DELETE FROM news_detail WHERE nID = '$id'";
  $result = mysqli_query($conn, $query);

  if ($file_name != null && $result){
    unlink('../img'.$file_name);
  }

  header ('location: news');
  exit();
}

if ($_GET['act'] == 'addctlog') {

  $query = "INSERT INTO news_detail (nDate) VALUES('$date')";
  mysqli_query($conn, $query) or die($query . '  ERROR!');

  header ('location: news');
  exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>add news(admin)</title>
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
input[type=text], input[type=Date],textarea, select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


.form-row {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

</style>
<body>
  <!--banner-->
  
  
      <header id="header">
        <div class="container">
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="add_product">Product</a>
            <a href="add_news">News</a>
            <a href="generate_report">Sales Report</a>
          </div>
          <!-- Use any element to open the sidenav -->
          <span onclick="openNav()" class="pull-right menu-icon"><img src="../img/menu.png" width="50"></span>
        </div>
      </header>
  <!-- / banner -->
 

  <!-- Start Reservation -->
  <div class="reservation-box">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="heading-title text-center">
            <h1 class="header-h">Admin News Board</h1>
          </div>
        </div>
      </div>
       


       <form action="" method="post" enctype="multipart/form-data">

        <?php
          $query = "SELECT * from news_detail WHERE nID='$id'";
          $result = mysqli_query($conn, $query);

          if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            ?>

              <div class="form-row">
              <div class="col-2">
                <div><label>Picture: </label></div>
              </div>
              <div class="col-3">

                <?php echo '<img class="img-fluid" width="150" src="../img'. $row['nImg'] .'" alt="no image">';?>
                <input type="file" name="nImg" id="nImg">

              </div>
            </div>

          <div class="form-row">
            <div><label for="nTitle"> Title :</label>
             <div class="col-3">
                <?php echo '<input type="text" name="nTitle" value="' . $row['nTitle'] . '">'?>
              </div>
          </div>
        </div>
       
     
        <div class="form-row">
          <div><label for="nDetail">Detail :</label>
          <div class="col-3">
                <?php echo '<input type="text" name="nDetail" value="' . $row['nDetail'] . '">'?>
              </div>
        </div></div>
  


           <div class="form-row">
                  <div> <label for="nDescription"> Description :</label>
                       <div class="col-3">   
                <?php echo '<input type="text" name="nDescription" value="' . $row['nDescription'] . '">'?>
                         </div>
                         </div>
                     </div>

			 <div class="form-row">
                  <div> <label for="nDate"> Date :</label>
                       <div class="col-3">   
                <?php echo '<input type="date(format)" name="nDate" value="' . $row['nDate'] . '">'?>
                         </div>
                         </div>
                     </div>

       <div class="form-row">
              <div class="col">
                <input type="hidden" name="nID" value="<?php echo $row['nID']; ?>">
                <input type="submit" name="submit" class="btn btn-info" value="Update">

                <a class="btn btn-danger" href="news_update?act=delctlog&id='<?php echo encryptIt($row['nID']);?>'">Delete</a>
              </div>
            </div>
            <?php
          }
          ?>


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

  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery.easing.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/custom.js"></script>
  <script src="../contactform/contactform.js"></script>

</body>

</html>
