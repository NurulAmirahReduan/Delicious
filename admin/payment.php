<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$username = $fullname = $address = $email = $paymenttype = $date = $amount="";
$username_err = $fullname_err = $address_err= $email_err = $paymenttype_err = $date_err= $amount_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate username
    $input_username= trim($_POST["username"]);
    if(empty($input_username)){
        $tusername_err = "Please enter a title.";
    } elseif(!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $username_err = "Please enter a valid title.";
    } else{
        $username = $input_username;
    }
    
    // Validate fullname
    $input_fullname = trim($_POST["fullname"]);
    if(empty($input_fullname)){
        $fullname_err = "Please enter an news detail.";     
    } else{
        $fullname = $input_fullname;
    }

    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an news detail.";     
    } else{
        $address = $input_address;
    }
    
    // Validate email
      $input_email= trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email.";     
    } else{
        $email = $input_email;
    }

    // Validate detail
    $input_paymenttype = trim($_POST["paymenttype"]);
    if(empty($input_paymenttype)){
        $paymenttype_err = "Please enter an payment type.";     
    } else{
        $paymenttype = $input_paymenttype;
    }
     // Validate date
      $input_date = trim($_POST["date"]);
    if(empty($input_date)){
        $date_err = "Please enter an date.";     
    } else{
        $date = $input_date;
    }

    // Validate amount
    $input_amount = trim($_POST["amount"]);
    if(empty($input_amount)){
        $amount_err = "Please enter an valid amount.";     
    } else{
        $amount = $input_detail;
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($fullname_err) && empty($address_err) && empty($email_err) && empty($paymenttype_err) && empty($date_err) && empty($amount_err)){
        // Prepare an update statement
        $sql = "UPDATE payment_detail SET username=?, fullname=?,address=?,email=?, paymenttype=? , date=? ,amount=?,WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssis", $param_username, $param_fullname, $param_address, $param_email,$param_paymenttype, $param_date,$param_amount,$param_id);
            
            // Set parameters
            $param_username= $username;
            $param_fullname= $fullname;
            $param_address = $address;
             $param_email= $email;
              $param_paymenttype = $paymenttype;
            $param_date = $date;
             $param_amount= $amount;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: news1.php");
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
        $sql = "SELECT * FROM news WHERE id = ?";
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
                    $title = $row["title"];
                    $detail = $row["detail"];
                    $description = $row["description"];
                    $date = $row["date"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: newsError.php");
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
        header("location: newsError.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update News Record</title>
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
                        <h2>Update Feedback Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                            <label>News Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
                            <span class="help-block"><?php echo $title_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($detail_err)) ? 'has-error' : ''; ?>">
                            <label>Detail</label>
                            <textarea name="detail" class="form-control"><?php echo $detail; ?></textarea>
                            <span class="help-block"><?php echo $detail_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                            <label>Description</label>
                            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                            <span class="help-block"><?php echo $description_err;?></span>
                        </div>

                          <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                            <label>Date</label>
                            <input type ="date" name= "date" class="form-control"><?php echo $date; ?>
                            <span class="help-block"><?php echo $date_err;?></span>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="news1.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>