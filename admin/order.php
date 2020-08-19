
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>order list(admin)</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <!-- =======================================================
    Theme Name: Delicious
    Theme URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>
<style>

.form {
    padding-top: 10px;
    padding-bottom: 10px;
    font-family: "HelveticaNeue-Light", "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-weight: 200;
    margin: 0;
    font-size: 15px;
    line-height: 18px;
}

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


			<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h1 class="header-h">Order List</h1>
					</div>
				</div>
			</div>
				
				<table class="table">
					<tr>
						<th>No.</th>
						<th>Name</th>
						<th>Address</th>
						<th>Type</th>
						<th>Quantity</th>
						<th>Action</th>
					</tr>

					<?php

					$count = 1;

					$query = "SELECT fds_usrdt.usrdt_nme as 'usr_nme', fds_usrdt.usrdt_adrs as 'usr_add', fds_usrdt.usrdt_id as 'usr_id', GROUP_CONCAT(ordr_ctlog_id) as ordr_list, GROUP_CONCAT(ordr_stat) as ordr_stat, GROUP_CONCAT(ordr_qty) as ordr_qty FROM fds_ordr JOIN fds_usrdt ON fds_ordr.ordr_usrdt_id = fds_usrdt.usrdt_id WHERE fds_ordr.ordr_usrdt_id = fds_usrdt.usrdt_id GROUP BY fds_ordr.ordr_usrdt_id";


					$query = "SELECT fds_usrdt.usrdt_nme as 'usr_nme', fds_usrdt.usrdt_adrs as 'usr_add', fds_usrdt.usrdt_id as 'usr_id', GROUP_CONCAT(ordr_ctlog_id) as ordr_list, GROUP_CONCAT(ordr_stat) as ordr_stat, GROUP_CONCAT(ordr_qty) as ordr_qty FROM fds_ordr JOIN fds_usrdt ON fds_ordr.ordr_usrdt_id = fds_usrdt.usrdt_id WHERE fds_ordr.ordr_usrdt_id = fds_usrdt.usrdt_id GROUP BY fds_ordr.ordr_usrdt_id";


					$result = mysqli_query($conn, $query);
					$order_list = array();


					if (mysqli_num_rows($result) > 0) {

						while($row = mysqli_fetch_assoc($result)) {

							$order_list = explode(",", $row['ordr_list']);
							$order_qty = explode(",", $row['ordr_qty']);

							echo '<tr>';
							echo '<td>' . $count++ . '</td>';
							echo '<td>' . $row['usr_nme'] . '<hr>' . $row['usr_add']  .  '</td>';
							echo '<td>';
							for($i = 0; $i < sizeof($order_list); $i++) {

								$orID = $order_list[$i];
								$query = "SELECT * FROM order_detail WHERE orID = '$orID'";
								$data = mysqli_fetch_assoc(mysqli_query($conn, $query));

								echo '<p><span class="text-info">' . $data['oName'] . '</span>; ' . $data['ctlog_shp'] . ' (' . $order_qty[$i] . ' Qty)</p>';

							}
							echo '</td>';
							if ($row['ordr_stat'] == null) {
								echo '<td><p class="text-warning">pending</p></td>';
							} else {
								echo '<td><p class="text-success">ready</p></td>';
							}

							echo '<td><a href="pnl_order?act=ordrrdy&id=' . encryptIt($row['usr_id']) . '" onclick="return confirm()">Mark ready</a><br><a href="pnl_order?act=ordrdel&id=' . encryptIt($row['usr_id']) . '" onclick="return confirm()">Delete order</a></td>';
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