<?php
include ('../db.php');

// $usr_id = $_SESSION['sess_id'];
$id = decryptIt($_GET['id']);

if (isset($_POST['submit'])) {

	$Type = $_POST['pType'];
	$Name = $_POST['pName'];
	$Price = $_POST['pPrice'];
	$Description = $_POST['pDescription'];
	$Detail = $_POST['pDetail'];

	if(!empty($_FILES['pImg']['name'])){
		
		//Fetch file info
		$file_name = $_FILES['pImg']['name'];
		$file_tmp = $_FILES['pImg']['tmp_name'];

		$newdir = '../img';

		if (!file_exists($newdir)) {
			mkdir ($newdir, 0744);
		}

		move_uploaded_file($file_tmp, "../img" . $file_name);

		$query = "UPDATE product_catalague_detail SET pImg = '$file_name', pType = '$Type', pName = '$Name', pPrice = '$Price', pDescription = '$Description', pLogDet = '$date' WHERE pID = '$id'";
		$result = mysqli_query($conn, $query);

		header ('location: product_catalogue');
		exit();

	} else {

		$query = "UPDATE product_catalague_detail SET pType = '$Type', pName = '$Name', pPrice = '$Price', pDescription = '$Description', pDetail = '$Detail', pLogDet = '$date' WHERE pID = '$id'";
		$result = mysqli_query($conn, $query);

		header ('location: product_catalogue');
		exit();

	}


}

if ($_GET['act'] == 'delctlog') {

	$query = "SELECT pImg from product_catalague_detail WHERE pID = '$id'";
	$data = mysqli_fetch_assoc(mysqli_query($conn, $query));
	$file_name = $data["pImg"];

	$query = "DELETE FROM product_catalague_detail WHERE pID = '$id'";
	$result = mysqli_query($conn, $query);

	if ($file_name != null && $result){
		unlink('../img'.$file_name);
	}

	header ('location: product_catalogue');
	exit();
}

if ($_GET['act'] == 'addctlog') {

	$query = "INSERT INTO product_catalague_detail (pLogDet) VALUES('$date')";
	mysqli_query($conn, $query) or die($query . '  ERROR!');

	header ('location: product_catalogue');
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Product(admin) </title>
	<link rel="stylesheet" href="../bootstrap/css/all.min.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/js/jquery-3.4.1.min.js"></script>
</head>
<body>
	<div class="container">


		<div class="row p-4">
			<div class="col">
				<h2 class="border-bottom">catalog update</h2>

				<form action="" method="post" enctype="multipart/form-data">

					<?php
					$query = "SELECT * from product_catalague_detail WHERE pID='$id";
					$result = mysqli_query($conn, $query);

					if (mysqli_num_rows($result) > 0) {

						$row = mysqli_fetch_assoc($result);

						?>

						<div class="row py-2">
							<div class="col-2">
								<div>picture</div>
							</div>
							<div class="col-3">

								<?php echo '<img class="img-fluid" width="150" src="../img'. $row['pImg'] .'" alt="no image">';?>
								<input type="file" name="pImg" id="pImg">

							</div>
						</div>

						<div class="row py-2">
							<div class="col-2">
								<div>Product Type</div>
							</div>
							<div class="col-3">
								<?php echo '<input type="text" class="form-control" name="pType" value="' . $row['pType'] . '">'?>
							</div>
						</div>

						<div class="row py-2">
							<div class="col-2">
								<div>Product Name</div>
							</div>
							<div class="col-3">
								<?php echo '<input type="text" class="form-control" name="pName" value="' . $row['pName'] . '">'?>
							</div>
						</div>

						<div class="row py-2 ">
							<div class="col-2">
								<div>Product Price</div>
							</div>
							<div class="col-3">
								<?php echo '<input type="text" class="form-control" name="pPrice" value="' . $row['pPrice'] . '">'?>
							</div>
						</div>

						<div class="row py-2">
							<div class="col-2">
								<div>Product Description</div>
							</div>
							<div class="col-3">
								<?php echo '<textarea rows="3" class="form-control" name="pDescription">' . $row['pDescription'] . '</textarea>'?>
							</div>
						</div>


						<div class="row py-2">
							<div class="col-2">
								<div>Product Detail</div>
							</div>
							<div class="col-3">
								<?php echo '<textarea rows="3" class="form-control" name="pDetail">' . $row['pDetail'] . '</textarea>'?>
							</div>
						</div>


						<div class="row py-2">
							<div class="col">
								<input type="hidden" name="pID" value="<?php echo $row['pID']; ?>">
								<input type="submit" name="submit" class="btn btn-info" value="Update">

								<a class="btn btn-danger" href="add_product?act=delctlog&id='<?php echo encryptIt($row['pID']);?>'">Delete</a>
							</div>
						</div>
						<?php
					}
					?>
				</form>
			</div>
		</div>
	</div>
</body>
</html>