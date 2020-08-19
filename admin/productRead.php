<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "../config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM product WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
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
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
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
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: productError.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Product Record</title>
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
                        <h1>View Product Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Product Type</label>
                        <p class="form-control-static"><?php echo $row["type"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <p class="form-control-static"><?php echo $row["price"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <p class="form-control-static"><?php echo $row["description"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <p class="form-control-static"><?php echo $row["detail"]; ?></p>
                    </div>
                    <div><a href="product.php" class="btn btn-primary">Back</a>
                    <a href="pay.php" class="btn btn-primary">Proceed to Pay</a></div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>