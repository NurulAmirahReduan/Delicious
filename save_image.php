<?php
include("config.php");

if (isset ($_POST['but_upload'])){
	$name=$_FILES['file']['name'];
	$target_dir= "Delicious/";
	$target_file=$target_dir. basename($_FILES ["file"]["name"]);

	//select file type
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	//valid fiel extensions
	$extensions_arr = array("jpg","jpeg", "png", "gif");

	//check extension
	if (in_array($imageFileType,$extensions_arr)){


			//insert record
			$query = "insert into images(name) values('".$name."')";
			mysqli_query($conn,$query);

			//upload file
			move_uploaded_file($_FILES ['file']['tmp_name'], $target_dir.$name);
		}



}


?>

<form method = "post" action="" enctype='multipart/form-data'>
	<input type='file' name="file" />
	<input type="submit" value="save name"  name="but_upload">
</form>