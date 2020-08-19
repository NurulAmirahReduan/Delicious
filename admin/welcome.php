<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginAdmin.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 30px sans-serif; text-align:center ;color:white; background-image: url("background1.jpg"); background-size: 100%; background-attachment: fixed; max-width: 100%; height: auto;
            background-repeat: no-repeat;}
        
</head>
<body>
  
</style>

    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars ($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="reset_password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
        <a href="index.php" class="btn btn-success">Go to Homepage</a>
    </p>

</body>
</html>