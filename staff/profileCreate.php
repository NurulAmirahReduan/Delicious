<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$username = $fullname = $phone = $address = $email="";
$username_err = $fullname_err = $phone_err = $address_err = $email_err= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter a name.";
    } elseif(!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $username_err = "Please enter a valid name.";
    } else{
        $username = $input_username;
    }
    
    // Validate fullname
    $input_fullname = trim($_POST["fullname"]);
    if(empty($input_fullname)){
        $fullname_err = "Please enter full name.";     
    } else{
        $fullname = $input_fullname;
    }
    
    // Validate phone
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Please enter phone number.";     
    } else{
        $phone = $input_phone;
    }
    
     // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter address.";     
    } else{
        $address = $input_address;
    }

    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter email.";     
    } else{
        $email = $input_email;
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($fullname_err) && empty($phone_err) && empty($address_err) && empty($email_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, fullname, phone, address, email) VALUES (?, ?, ?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssiss", $param_name, $param_fullname, $param_phone,$param_address, $param_email);
            
            // Set parameters
            $param_username = $username;
            $param_fullname=$fullname;
            $param_phone=$phone;
            $param_address= $address;
            $param_email = $email;
           
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: profileMain.php");
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
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add profile detail record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($fullname_err)) ? 'has-error' : ''; ?>">
                            <label>Full name</label>
                            <input name="text" name="fullname" class="form-control" value="<?php echo $fullname; ?>">
                            <span class="help-block"><?php echo $fullname_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                            <label>Contact Number</label>
                            <input type="number"  name= "phone" class="form-control" value ="<?php echo $phone;?>">
                            <span class="help-block"><?php echo $phone_err;?></span>
                        </div>
                         <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                         <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="profileMain.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>