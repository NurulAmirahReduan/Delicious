<?php
session_start();
include ('../db.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product catalogue (admin)</title>
	<link rel="stylesheet" href="../bootstrap/css/all.min.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/js/jquery-3.4.1.min.js"></script>
</head>

<style>


	table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<body>

	<div class="container">
		

		<div class="row p-4">
			<div class="col">
				<h2>catalog list | <small><a href="add_product?act=addctlog&id=null">add new menu</a> </small></h2>
				<table class="table">
					<tr>
						<th>no.</th>
						<th>product id</th>
						<th>product type</th>
						<th>product name</th>
						<th>product price</th>
						<th>product description</th>
						<th>product detail</th>
						<th>action</th>
					</tr>

					<?php
					$query = "SELECT * from product_catalogue_detail";
					$result = mysqli_query($conn, $query);
					$count = 1;

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)){

							echo '<tr>';
							echo '<td>' . $count++ . '</td>';
							echo '<td><img class="img-fluid" width="150" src="../img'. $row['pImg'] .'" alt="no image"></td>';
							echo '<td>' . $row['pType'] . '</td>';
							echo '<td>' . $row['pName'] . '</td>';
							echo '<td>' . $row['pPrice'] . '</td>';
							echo '<td>' . $row['pDescription'] . '</td>';
							echo '<td>' . $row['pDetail'] . '</td>';
							echo '<td><a href="product_form?act=upctlog&id=' . encryptIt($row['pID']) . '">Update</a> | <a href="product_form?act=delctlog&id=' . encryptIt($row['pID']) . '">Delete</a></td>';
							echo '</tr>';

						}
					}

					?>
				</table>
			</div>
		</div>

	</div>

</body>
</html>