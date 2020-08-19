<?php
session_start();
include ('../db.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User List Record (admin)</title>
	<link rel="stylesheet" href="../bootstrap/css/all.min.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/js/jquery-3.4.1.min.js"></script>
</head>
<style type="text/css" href="..style.css"></style>

</style>
<body>

	<div class="container">
		

		<div class="row p-4">
			<div class="col">
				<h2>User List Record | <small><a href="profile?act=addctlog&id=null">add new user data</a> </small></h2>
				<table class="table">
					<tr>
						<th>User id</th>
					
						<th>image</th>
						<th>Username</th>
						<th>Password</th>
						<th>Full Name</th>
						<th>Phone Num</th>
						<th>Address</th>
						<th>Email</th>
						<th>Action</th>
					</tr>

					<?php
					$query = "SELECT * from user_detail";
					$result = mysqli_query($conn, $query);
					$count = 1;

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)){

							echo '<tr>';
							echo '<td>' . $count++ . '</td>';
							echo '<td><img class="img-fluid" width="150" src="../img'. $row['uImg'] .'" alt="no image"></td>';
							echo '<td>' . $row['uName'] . '</td>';
							echo '<td>' . $row['uPwd'] . '</td>';
							echo '<td>' . $row['uFname'] . '</td>';
							echo '<td>' . $row['uPnum'] . '</td>';
							echo '<td>' . $row['uAddress'] . '</td>';
							echo '<td>' . $row['uEmail'] . '</td>';
							echo '<td><a href="profile?act=upctlog&id=' . encryptIt($row['uID']) . '">Update</a> | <a href="profile?act=delctlog&id=' . encryptIt($row['uID']) . '">Delete</a></td>';
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