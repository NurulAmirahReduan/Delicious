<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$type = $name = $price=$description = $detail = $image="";
$type_err= $name_err = $price_err=  $description_err = $detail_err = $image_err= "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate product type
    $input_type = trim($_POST["type"]);
    if(empty($input_type)){
        $type_err = "Please enter product type.";     
    } else{
        $type = $input_type;
    }

    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate price
    $input_price = trim($_POST["price"]);
    if(empty($input_price)){
        $price_err = "Please enter product price.";     
    } else{
        $price = $input_price;
    }
    
    // Validate description
      $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Please enter product description.";     
    } else{
        $description = $input_description;
    }
    
    // Validate product detail
      $input_detail= trim($_POST["detail"]);
    if(empty($input_detail)){
        $detail_err = "Please enter an detail.";     
    } else{
        $detail = $input_detail;
    }

     // Validate product image
      $input_image= trim($_POST["image"]);
    if(empty($input_image)){
        $image_err = "Please enter an detail.";     
    } else{
        $image = $input_image;
    }
   

    if(!empty($_FILES['image']['name'])){
        
        //Fetch file info
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $newdir = '../img';

        if (!file_exists($newdir)) {
            mkdir ($newdir, 0744);
        }

        move_uploaded_file($file_tmp, "../img" . $file_name);

        // $query = "UPDATE fds_ctlog SET ctlog_img = '$file_name', ctlog_nme = '$nme', ctlog_prc = '$prc', ctlog_desc = '$desc', ctlog_shp = '$shp', ctlog_log = '$date' WHERE ctlog_id = '$id'";
        // $result = mysqli_query($conn, $query);

        //header ('location: product.php');
        exit();

    }

    // Check input errors before inserting in database
    if(empty($type_err) && empty($name_err) && empty($price_err) && empty($description_err) && empty($detail_err) && empty($image_err)){
        // Prepare an update statement
        $sql = "UPDATE product SET type=?, name=?,price=?, description=?, detail=? , image='?' WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssissbi", $param_type, $param_name, $param_price, $param_description, $param_detail,$param_image, $param_id);
            
            // Set parameters
            $param_type=$type;
            $param_name = $name;
            $param_price = $price;
            $param_description = $description;
            $param_detail = $detail;
            $param_image=$image;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: product.php");
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
        $sql = "SELECT * FROM product WHERE id = ?";
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
                    $type = $row["type"];
                    $name = $row["name"];
                    $price = $row["price"];
                    $description = $row["description"];
                    $detail = $row["detail"];
                    $image=$row["image"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: productError.php");
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
        header("location: productError.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Feedback Record</title>
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
                        <h2>Update Product Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        
                        <div class="form-group <?php echo (!empty($type_err)) ? 'has-error' : ''; ?>">
                            <label>Product Type</label>
                            <input type="text" name="type" class="form-control" value="<?php echo $type; ?>">
                            <span class="help-block"><?php echo $type_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="int" name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                            <label>Description</label>
                            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                            <span class="help-block"><?php echo $description_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($detail_err)) ? 'has-error' : ''; ?>">
                            <label>Detail</label>
                            <textarea name="detail" class="form-control"><?php echo $detail; ?></textarea>
                            <span class="help-block"><?php echo $detail_err;?></span>
                        </div>

                         <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Upload</label>
                           <input type="file" name="image" class="form-control" value="<?php echo $image;?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>


                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="product.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>