<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$type = $name = $price = $description = $detail = $image="";
$type_err = $name_err = $price_err = $description_err = $detail_err= $image_err= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate type
    $input_type= trim($_POST["type"]);
    if(empty($input_type)){
        $type_err = "Please enter product's type; cake, cookies, snacks and etc.";     
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
    $input_price= trim($_POST["price"]);
    if(empty($input_price)){
        $price_err = "Please enter price.";     
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
    

    // Validate detail
    $input_detail= trim($_POST["detail"]);
    if(empty($input_detail)){
        $detail_err = "Please enter product detail.";     
    } else{
        $detail = $input_detail;
    }
    
    // if(!empty($_FILES['image']['name'])){
        
    //     //Fetch file info
    //     $file_name = $_FILES['image']['name'];
    //     $file_tmp = $_FILES['image']['tmp_name'];

    //     $newdir = '../img';

    //     if (!file_exists($newdir)) {
    //         mkdir ($newdir, 0744);
    //     }

    //     move_uploaded_file($file_tmp, "../img" . $file_name);

       
    //     exit();

    // }

    // Check input errors before inserting in database
    if(empty($type_err) && empty($name_err) && empty($price_err) && empty($description_err) && empty($detail_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO product (type, name , price, description, detail) VALUES (?, ?, ?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_type, $param_name, $param_price, $param_description, $param_detail);
            
            // Set parameters
            $param_type=$type;
            $param_name = $name;
            $param_price=$price;
            $param_detail = $detail;
            $param_description = $description;
            // $param_image = $image;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
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
                        <h2>Create Product Record</h2>
                    </div>
                    <p>Please fill this form and submit to add product record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <div class="form-group <?php echo (!empty($type_err)) ? 'has-error' : ''; ?>">
                            <label>Product Type</label>
                            <input name="type" class="form-control" value=
                            "<?php echo $type; ?>">
                            <span class="help-block"><?php echo $type_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="double" name="price" class="form-control" value="<?php echo $price; ?>">
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

                     <!--    <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Upload</label>
                           <input type="file" name="image" class="form-control" value="<?php echo $image;?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div> -->

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="product.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>