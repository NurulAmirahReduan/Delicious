<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$title = $detail = $description = $date="";

$title_err = $detail_err = $description_err= $date_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate title
    $input_title = trim($_POST["title"]);
    if(empty($input_title)){
        $name_err = "Please enter a news title.";
    } elseif(!filter_var($input_title, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $title_err = "Please enter a correct title.";
    } else{
        $title = $input_title;
    }
    
    // Validate detail
    $input_detail = trim($_POST["detail"]);
    if(empty($input_detail)){
        $detail_err = "Please enter detail.";     
    } else{
        $detail = $input_detail;
    }
    

    // Validate description
     $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Please enter news description.";     
    } else{
        $description = $input_description;
    }

    // Validate description
     $input_date = trim($_POST["date"]);
    if(empty($input_date)){
        $date_err = "Please enter news date.";     
    } else{
        $date = $input_date;
    }

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
    if(empty($title_err) && empty($detail_err) && empty($description_err) && empty($date)){
        // Prepare an insert statement
        $sql = "INSERT INTO news (title, detail, description, date) VALUES (?, ?, ?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_title, $param_detail, $param_description,$date);
            
            // Set parameters
            $param_title = $title;
            $param_detail = $detail;
            $param_description = $description;
            $param_date=$date;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
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

}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create News</title>
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
                        <h2>Create News</h2>
                    </div>
                    <p>Please fill this form and submit to add news record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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

                        <div>
                            <input type= "file" name = "image"/>
                          
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="news1.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>