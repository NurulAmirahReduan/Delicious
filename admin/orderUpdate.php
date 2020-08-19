<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$product = $name= $flavour =$quantity =$addon = $ordernotes = $status="";
$product_err = $name_err=$flavour_err = $quantity_err = $addon_err = $ordernotes_err =$status_err="";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate product
    $input_product = trim($_POST["product"]);
    if(empty($input_product)){
        $product_err = "Please enter a product.";
    } elseif(!filter_var($input_product, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $product_err = "Please enter a product.";
    } else{
        $product = $input_product;
    }
    
     // Validate fullname
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter your product name.";     
    } else{
        $name = $input_name;
    }

    // Validate fullname
    $input_flavour = trim($_POST["flavour"]);
    if(empty($input_flavour)){
        $flavour_err = "Please enter your flavour.";     
    } else{
        $flavour = $input_flavour;
    }

    // Validate phone
    $input_quantity= trim($_POST["quantity"]);
    if(empty($input_quantity)){
        $quantity_err = "Please enter quantity.";     
    } else{
        $quantity = $input_quantity;
    }

    // Validate addon 
    $input_addon= trim($_POST["addon"]);
    if(empty($input_addon)){
        $addon_err = "Please enter an add on.";     
    } else{
        $addon = $input_addon;
    }

    // Validate address address
    $input_ordernotes = trim($_POST["ordernotes"]);
    if(empty($input_ordernotes)){
        $ordernotes_err = "Please enter an order notes.";     
    } else{
        $ordernotes = $input_ordernotes;
    }
     // Validate status
    $input_status = trim($_POST["status"]);
    if(empty($input_status)){
        $status_err = "Please enter your product status.";     
    } else{
        $status = $input_status;
    }

    
    // Check input errors before inserting in database
    if(empty($product_err) && empty($name_err) && empty($flavour_err) && empty($quantity_err)&& empty($addon_err) && empty($ordernotes_err) && empty($status_err)){
        // Prepare an update statement
        $sql = "UPDATE orders SET product=?, name=?, flavour=?, quantity=? , addon=? , ordernotes=? , status=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssisssi", $param_product,$param_name, $param_flavour, $param_quantity, $param_addon, $param_ordernotes,$param_status, $param_id);
            
            // Set parameters
            $param_product = $product;
            $param_name= $name;
            $param_flavour= $flavour;
            $param_quantity= $quantity;
            $param_addon= $addon;
             $param_ordernotes= $ordernotes;
              $param_status= $status;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: orderList.php");
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
        $sql = "SELECT * FROM orders WHERE id = ?";
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
                    $product = $row["product"];
                    $name = $row["name"];
                    $flavour = $row["flavour"];
                    $quantity = $row["quantity"];
                    $addon = $row["addon"];
                    $ordernotes = $row["ordernotes"];
                     $status = $row["status"];

                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: orderError.php");
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
        header("location: orderError.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Order Record</title>
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
                        <h2>Update order Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($product_err)) ? 'has-error' : ''; ?>">
                            <label>Product Title</label>
                            <input type="text" name="product" class="form-control" value="<?php echo $product; ?>">
                            <span class="help-block"><?php echo $product_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Product Name</label>
                            <textarea name="name" class="form-control"><?php echo $name; ?></textarea>
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($flavour_err)) ? 'has-error' : ''; ?>">
                            <label>Flavour</label>
                            <textarea name="flavour" class="form-control"><?php echo $flavour; ?></textarea>
                            <span class="help-block"><?php echo $flavour_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($quantity_err)) ? 'has-error' : ''; ?>">
                            <label>Quantity</label>
                            <input type="number" name="quantity" class="form-control"><?php echo $quantity; ?></textarea>
                            <span class="help-block"><?php echo $quantity_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($addon_err)) ? 'has-error' : ''; ?>">
                            <label>Add on</label>
                            <textarea name="addon" class="form-control"><?php echo $addon; ?></textarea>
                            <span class="help-block"><?php echo $addon_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($ordernotes)) ? 'has-error' : ''; ?>">
                            <label>Order Notes</label>
                            <textarea name="ordernotes" class="form-control"><?php echo $ordernotes; ?></textarea>
                            <span class="help-block"><?php echo $ordernotes_err;?></span>
                        </div>

                           <div class="form-group <?php echo (!empty($status)) ? 'has-error' : ''; ?>">
                            <label>Order status</label>
                            <textarea name="status" class="form-control"><?php echo $status; ?></textarea>
                            <span class="help-block"><?php echo $status_err;?></span>
                        </div>

                        
                       
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="orderList.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>