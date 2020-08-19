<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $fullname= $address = $email =$paymenttype= $amount="";// $date="";

$username_err = $fullname_err= $address_err = $email_err = $paymenttype_err=$amount_err="";//= $date_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate title
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter a username.";
    } elseif(!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $username_err = "Please enter a username.";
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

    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter address.";     
    } else{
        $address = $input_address;
    }
    

    // Validate email
     $input_email= trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter email.";     
    } else{
        $email = $input_email;
    }

    // Validate payment type
     $input_paymenttype = trim($_POST["paymenttype"]);
    if(empty($input_paymenttype)){
        $paymenttype_err = "Please enter payment type.";     
    } else{
        $paymenttype = $input_paymenttype;
    }

    // // Validate date
    //  $input_date= trim($_POST["date"]);
    // if(empty($input_date)){
    //     $date_err = "Please enter date.";     
    // } else{
    //     $date = $input_date;
    // }
    // Validate amount
     $input_amount= trim($_POST["amount"]);
    if(empty($input_amount)){
        $amount_err = "Please enter amount.";     
    } else{
        $amount = $input_amount;
    }


    

    // Check input errors before inserting in database
    if(empty($username_err) && empty($fullname_err) &&empty($address_err) && empty($email_err) &&  empty($paymenttype_err)  &&empty($amount_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO payment_detail (username, fullname, address, email, paymenttype, amount) VALUES (?, ?, ?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi", $param_username,$param_fullname,$param_address,  $param_email, $param_paymenttype,$param_amount);
            
            // Set parameters
            $param_username = $username;
            $param_fullname=$fullname;
            $param_address = $address;
            $param_email = $email;
             $param_paymenttype= $paymenttype;
           // $param_date = $date;
            $param_amount=$amount;
           // $param_date=$date;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: pay.php");
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
    <title>Order Payment</title>
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
                        <h2>Order Payment</h2>
                    </div>
                    <p>Please fill this form and submit as payment prove  record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($fullname_err)) ? 'has-error' : ''; ?>">
                            <label>Full Name</label>
                            <input type="text" name="fullname" class="form-control" value="<?php echo $fullname; ?>">
                            <span class="help-block"><?php echo $fullname_err;?></span>
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

                        <div class="form-group <?php echo (!empty($paymenttype_err)) ? 'has-error' : ''; ?>">
                            <label>Payment Type</label>
                            <input type="text" name="paymenttype" class="form-control" value="<?php echo $paymenttype; ?>">
                            <span class="help-block"><?php echo $paymenttype_err;?></span>
                        </div>

                        <!-- <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control" value="<?php echo $date; ?>">
                            <span class="help-block"><?php echo $date_err;?></span>
                        </div> -->

                         <div class="form-group <?php echo (!empty($amount_err)) ? 'has-error' : ''; ?>">
                            <label>Amount</label>
                            <input type="number" name="amount" class="form-control" value="<?php echo $amount; ?>">
                            <span class="help-block"><?php echo $amount_err;?></span>
                        </div>

                         

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="pay.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
