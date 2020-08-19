<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $fullname = $phonenum = $address = $email = "";
$username_err =$fullname_err = $phonenum_err = $address_err = $email_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter a username.";
    } elseif(!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $username_err = "Please enter a valid name.";
    } else{
        $username= $input_username;
    }
    
  // Validate name
    $input_fullname = trim($_POST["fullname"]);
    if(empty($input_fullname)){
        $fullname_err = "Please enter a full name.";
    } elseif(!filter_var($input_fullname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $fullname_err = "Please enter a valid name.";
    } else{
        $fullname = $input_fullname;
    }
    

    // // Validate phonenumber 
    // $input_phonenum = trim($_POST["uPnum"]);
    // if(empty($input_phonenum)){
    //     $uPhonenum__err = "Please enter an address.";     
    // } else{
    //     $uPhonenum = $input_phonenum;
    // }


    
    // Validate phonenumber
    $input_phonenum= trim($_POST["phonenum"]);
    if(empty($input_phonenum)){
        $phonenum_err = "Please enter the phone number .";     
    } elseif(!ctype_digit($input_phonenum)){
        $phonenum_err = "Please enter a positive integer value.";
    } else{
        $phonenum = $input_phonenum;
    }
    
     // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_uAddress)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    
  // Validate address
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email.";     
    } else{
        $email = $input_email;
    }
    



    // Check input errors before inserting in database
    if(empty($username_err)  && empty($fullname_err)  && empty($phonenum_err) && empty($address_err) && empty($email_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET username=?, fullname=?, phonenum=? , address=?, email=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_username, $param_fullname,$param_phonenum, $param_address,$param_uEmail, $param_id);
            
            // Set parameters
            $param_username = $username;
            $param_fullname= $fullname;
            $param_phonenum= $phonenum;
            $param_address = $address;
            $param_email = $email;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $username = $row["username"];
                    $fullname=$row["fullname"];
                    $phonenum = $row["phonenum"];   
                    $address = $row["address"];
                    $email = $row["email"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error1.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error1.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
                            <input type="number" name="phonenum" class="form-control" value="<?php echo $phonenum; ?>">
                            <span class="help-block"><?php echo $phonenum_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <textarea name="text" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>