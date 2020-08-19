<?php
include ('../db.php');

// $usr_id = $_SESSION['sess_id'];
$id = decryptIt($_GET['id']);

if (isset($_POST['submit'])) {

	$type = $_POST['type'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$detail = $_POST['detail'];


	if(!empty($_FILES['image']['name'])){
		
		//Fetch file info
		$file_name = $_FILES['image']['name'];
		$file_tmp = $_FILES['image']['tmp_name'];

		$newdir = '../img';

		if (!file_exists($newdir)) {
			mkdir ($newdir, 0744);
		}

		move_uploaded_file($file_tmp, "../img" . $file_name);

		$query = "UPDATE product SET image = '$file_name',type = '$type', name = '$name', price = '$price', description = '$description', detail = '$detail' WHERE id = '$id'";
		$result = mysqli_query($conn, $query);

		header ('location: product');
		exit();

	} else {

		$query = "UPDATE product SET type = '$type', name = '$name', price = '$price', description = '$description', detail = '$detail' WHERE id= = '$id'";
		$result = mysqli_query($conn, $query);

		header ('location: product');
		exit();

	}


}

if ($_GET['act'] == 'delctlog') {

	$query = "SELECT image from product WHERE id = '$id'";
	$data = mysqli_fetch_assoc(mysqli_query($conn, $query));
	$file_name = $data["image"];

	$query = "DELETE FROM product WHERE id = '$id'";
	$result = mysqli_query($conn, $query);

	if ($file_name != null && $result){
		unlink('../img'.$file_name);
	}

	header ('location: product');
	exit();
}

// if ($_GET['act'] == 'addctlog') {

// 	$query = "INSERT INTO image (ctlog_log) VALUES('$date')";
// 	mysqli_query($conn, $query) or die($query . '  ERROR!');

// 	header ('location: pnl_catalog');
// 	exit();
// }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>admin@fds</title>
	<link rel="stylesheet" href="../bootstrap/css/all.min.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/js/jquery-3.4.1.min.js"></script>
</head>
<body>
	<div class="container">

		<div class="row p-4">
			<div class="col">
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item"><a href="pnl_user">User Panel</a></li>
					<li class="list-group-item"><a href="pnl_order">Order Panel</a></li>
					<li class="list-group-item"><a href="pnl_catalog">Catalog Panel</a></li>
				</ul>
			</div>
		</div>

		<div class="row p-4">
			<div class="col">
				<h2 class="border-bottom">catalog update</h2>

				<form action="" method="post" enctype="multipart/form-data">

					<?php
					$query = "SELECT * from product WHERE id='$id'";
					$result = mysqli_query($conn, $query);

					if (mysqli_num_rows($result) > 0) {

						$row = mysqli_fetch_assoc($result);

						?>

						<div class="row py-2">
							<div class="col-2">
								<div>picture</div>
							</div>
							<div class="col-3">

								<?php echo '<img class="img-fluid" width="150" src="../img'. $row['image'] .'" alt="no image">';?>
								<input type="file" name="image" id="image">

							</div>
						</div>

						<div class="row py-2">
							<div class="col-2">
								<div>Product Type</div>
							</div>
							<div class="col-3">
								<?php echo '<input type="text" class="form-control" name="type" value="' . $row['type'] . '">'?>
							</div>
						</div>

						<div class="row py-2">
							<div class="col-2">
								<div>name</div>
							</div>
							<div class="col-3">
								<?php echo '<input type="text" class="form-control" name="name" value="' . $row['name'] . '">'?>
							</div>
						</div>

						<div class="row py-2 ">
							<div class="col-2">
								<div>price</div>
							</div>
							<div class="col-3">
								<?php echo '<input type="text" class="form-control" name="price" value="' . $row['price'] . '">'?>
							</div>
						</div>

						<div class="row py-2">
							<div class="col-2">
								<div>description</div>
							</div>
							<div class="col-3">
								<?php echo '<textarea rows="3" class="form-control" name="description">' . $row['description'] . '</textarea>'?>
							</div>
						</div>

						<div class="row py-2">
							<div class="col-2">
								<div>Detail</div>
							</div>
							<div class="col-3">
								<?php echo '<input type="text" class="form-control" name="detail" value="' . $row['detail'] . '">'?>
							</div>
						</div>

						<div class="row py-2">
							<div class="col">
								<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
								<input type="submit" name="submit" class="btn btn-info" value="Update">

								<a class="btn btn-danger" href="unknown4.php?act=delctlog&id='<?php echo encryptIt($row['id']);?>'">Delete</a>
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