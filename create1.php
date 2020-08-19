<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $fullname = $phonenum = $address = $email = "";
$username_err = $fullname_err = $phonenum_err = $address_err = $email_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter a name.";
    } elseif(!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $username_err = "Please enter a valid name.";
    } else{
        $username = $input_username;
    }
    
//validate full name
     $input_fullname = trim($_POST["fullname"]);
    if(empty($input_fullname)){
        $fullname_err = "Please enter a name.";
    } elseif(!filter_var($input_fullname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $fullname_err = "Please enter a valid name.";
    } else{
        $fullname = $input_fullname;
    }

//validate phone number
    $input_phonenum = trim($_POST["phonenum"]);
    if(empty($input_phonenum)){
        $phonenum_err = "Please enter the phone number.";     
    } elseif(!ctype_digit($input_phonenum)){
        $phonenum_err = "Please enter a right value.";
    } else{
        $phonenum = $input_phonenum;
    }


    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    
    // Validate email
   $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter valid email.";
    } elseif(!filter_var($input_email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $email_err = "Please enter a valid email.";
    } else{
        $email = $input_email;
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($fullname_err) && empty($phonenum_err) && empty($address_err) && empty($email_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO users (username,fullname,phonenum, address, email) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_fullname, $param_phonenum, $param_address, $param_email);
            
            // Set parameters
            $param_username = $username;
            $param_fullname = $fullname;
            $param_phonenum = $phonenum;
            $param_address = $address;
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index1.php");
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
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err;?></span>
                        </div>

                         <div class="form-group <?php echo (!empty($fullname_err)) ? 'has-error' : ''; ?>">
                            <label>Full Name</label>
                            <input type="text" name="fullname" class="form-control" value="<?php echo $fullname; ?>">
                            <span class="help-block"><?php echo $fullname_err;?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($phonenum_err)) ? 'has-error' : ''; ?>">
                            <label>Phone Number</label>
                            <input type="number" name="phonenum" class="form-control"value="<?php echo $phonenum; ?>">
                            <span class="help-block"><?php echo $phonenum_err;?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>

                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index1.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>