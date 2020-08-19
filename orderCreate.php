<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$product = $name= $flavour = $quantity =$addon =$ordernotes = $status="";// $date="";

$product_err = $name_err= $flavour_err = $quantity_err = $addon_err= $ordernotes_err=$status_err="";//= $date_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate title
    $input_product = trim($_POST["product"]);
    if(empty($input_product)){
        $product_err = "Please enter a product.";
    } elseif(!filter_var($input_product, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $product_err = "Please enter a product type.";
    } else{
        $product = $input_product;
    }
     // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter product name.";     
    } else{
        $name = $input_name;
    }

    // Validate flavour
    $input_flavour = trim($_POST["flavour"]);
    if(empty($input_flavour)){
        $flavour_err = "Please enter flavour.";     
    } else{
        $flavour = $input_flavour;
    }
    

    // Validate quantity
     $input_quantity= trim($_POST["quantity"]);
    if(empty($input_quantity)){
        $quantity_err = "Please enter product quantity.";     
    } else{
        $quantity = $input_quantity;
    }

    // Validate add on
     $input_addon = trim($_POST["addon"]);
    if(empty($input_addon)){
        $addon_err = "Please enter add on.";     
    } else{
        $addon = $input_addon;
    }

    // Validate order notes
     $input_ordernotes= trim($_POST["ordernotes"]);
    if(empty($input_ordernotes)){
        $ordernotes_err = "Please enter order notes.";     
    } else{
        $ordernotes = $input_ordernotes;
    }

     $input_status= trim($_POST["status"]);
    if(empty($input_status)){
        $status_err = "Please enter order status.";     
    } else{
        $status = $input_status;
    }


    // // Validate date
    //  $input_date= trim($_POST["date"]);
    // if(empty($input_date)){
    //     $date_err = "Please enter date.";     
    // } else{
    //     $date = $input_date;
    // }

    // Validate date
    // $input_date = trim($_POST["date"]);
    // if(empty($input_date)){
    //     $date_err = "Please enter the date";
    // } elseif(!ctype_digit($input_date)){
    //     $date_err = "Please enter a correct date.";
    // } else{
    //     $date = (int) $input_date;
    // }


    
    // if (isset($_POST["upload"])){
    //     //get image dimension
    //     $fileinfo= @getimagesize($_FILES["file-input"] ["tmp_name"]);
    //     $width = $fileinfo[0];
    //     $height =$fileinfo[1];

    //     $allowed_image_extension = array(
    //         "png",
    //          "jpg",
    //          "jpeg");

    //     //Get image file extension
    //     $file_extension=pathinfo($_FILES["file-input"]["name"],PATHINFO_EXTENSION);

    //     //validate file input to check if it is not empty
    //     if (!file_exists($_FILES ["file-input"]["tmp_name"]))
    //     {
    //         $response=array(
    //             "type"=> "error",
    //             "message"=> "Choose image file to upload.");
    //     }
    //         //validate file input to check if it is valid extension
    //     else if (!in_array($file_extension,$allowed_image_extension)){
    //         $response = array(
    //             "type"=>"error",
    //             "message"=> "Upload valid images. Only PNG and JPEG are allowed.");
    //         echo $result;
    //     }
    //     //validate image file
    //     else if (($_FILES["file-input"]["size"] > 2000000)){
    //         $response = array(
    //             "type" => "error",
    //              "message" =>"Image size exceeds 2MB");
    //     }
    //    //validate image file dimension 
    //     else if ($width > "300" || $height>"200"){
    //     $response = array(
    //         "type" => "error",
    //         "message" =>"Image dimension sholud be within 300 X 200");
    //     }

    //     else {
    //         $target = "image/".basename($_FILES["file-input"]["name"]);
    //         if (move_uploaded_file($_FILES["file-input"]["tmp_name"],$target))
    //         {
    //             $response = array(
    //                 "type" => "success",
    //                 "message" => "Image uploaded successfully.");
    //         }
        
    //     else {
    //         $response = array(
    //             "type" => "error",
    //             "message" =>"Problem in uploading image files.");
    //     }
    // }


    // Check input errors before inserting in database
    if(empty($product_err) && empty($name_err) &&empty($flavour_err) && empty($quantity_err) &&  empty($addon_err) && empty($ordernotes_err)&& empty($status_err) ){//&& empty($date_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO orders (product, name,flavour, quantity, addon, ordernotes,status) VALUES (?, ?, ?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssisss", $param_product,$param_name,$param_flavour,  $param_quantity, $param_addon,$param_ordernotes,$param_status);
            
            // Set parameters
            $param_product = $product;
            $param_name=$name;
            $param_flavour = $flavour;
            $param_quantity = $quantity;
             $param_addon= $addon;
            $param_ordernotes = $ordernotes;
            $param_status=$status;
           // $param_date=$date;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
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

}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Order</title>
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
                        <h2>Create Order</h2>
                    </div>
                    <p>Please fill this form and submit to add order record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($product_err)) ? 'has-error' : ''; ?>">
                            <label>Product Title</label>
                            <input type="text" name="product" class="form-control" value="<?php echo $product; ?>">
                            <span class="help-block"><?php echo $product_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Product Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($flavour_err)) ? 'has-error' : ''; ?>">
                            <label>Flavour</label>
                            <textarea name="flavour" class="form-control"><?php echo $flavour; ?></textarea>
                            <span class="help-block"><?php echo $flavour_err;?></span>
                        </div>

                         <div class="form-group <?php echo (!empty($quantity_err)) ? 'has-error' : ''; ?>">
                            <label>Quantity</label>
                            <input type="number" name="quantity" class="form-control" value="<?php echo $quantity; ?>">
                            <span class="help-block"><?php echo $quantity_err;?></span>
                        </div>

                         <div class="form-group <?php echo (!empty($addon_err)) ? 'has-error' : ''; ?>">
                            <label>Add on</label>
                            <textarea name="addon" class="form-control"><?php echo $addon; ?></textarea>
                            <span class="help-block"><?php echo $addon_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($ordernotes_err)) ? 'has-error' : ''; ?>">
                            <label>Order notes</label>
                            <textarea name="ordernotes" class="form-control"><?php echo $ordernotes; ?></textarea>
                            <span class="help-block"><?php echo $ordernotes_err;?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($status_err)) ? 'has-error' : ''; ?>">
                            <label>Order status</label>
                            <textarea name="status" class="form-control"><?php echo $status; ?></textarea>
                            <span class="help-block"><?php echo $status_err;?></span>
                        </div>
                       <!--  <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                            <label>Date</label>
                            <input type ="date" name= "date" class="form-control" value="<?php echo $date; ?>">
                            <span class="help-block"><?php echo $date_err;?></span>
                        </div> -->

                        <!-- <div>
                            <input type= "file" name = "image"/>
                          
                        </div> -->

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="orderList.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>