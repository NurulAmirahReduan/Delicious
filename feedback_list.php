<?php
session_start();
include ('../db.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Feedback form</title>
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
				<h2>Feedback list</h2>
				<table class="table">
					<tr>
						<th>no.</th>
						<th>Feedback Rate</th>
						<th>Feedback Detail</th>
						<th>Feedback User</th>
						<th>Feedback Email</th>
						<th>action</th>
					</tr>

					<?php
					$query = "SELECT * from feedback_detail";
					$result = mysqli_query($conn, $query);
					$count = 1;

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)){

							echo '<tr>';
							echo '<td>' . $count++ . '</td>';
							echo '<td>' . $row['fRate'] . '</td>';
							echo '<td>' . $row['fDetail'] . '</td>';
							echo '<td>' . $row['fUser'] . '</td>';
							echo '<td>' . $row['fEmail'] . '</td>';
							echo '<td><a href="Feedback_Form?act=delctlog&id=' . encryptIt($row['fID']) . '">Delete</a></td>';
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