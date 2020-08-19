<?php 
session_start();
include("db.php");
include("auth.php");
$pPrice = 0.00;
if (isset($_GET['id'] )) {
$id = $_GET['id'];
}


if (isset($_GET['act'] )) {
if($_GET['act'] == 'add'){
	$_SESSION['sess_cart'][$id] += 1;
	header ('location: addToCart');
}

if($_GET['act'] == 'del'){
	$_SESSION['sess_cart'][$id] -= 1;
	if ($_SESSION['sess_cart'][$id] == 0) {
		unset($_SESSION['sess_cart'][$id]);
	}
	header ('location: addToCart');
}

if ($_GET['act'] == 'confirm') {

	if(isset($_SESSION['sess_cart'])) {

		$query = "SELECT * from order_detail WHERE orID='$orID'";
		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result) > 0 ) {

			unset($_SESSION['sess_cart']);
			header ('location: addToCart?act=error');
			exit();

		} else {

			foreach ($_SESSION['sess_cart'] as $key => $data) {

				$ctlog_id = decryptIt($key); 

				$query = "INSERT INTO order_detail (orID, oName, oPhoneNum, oEmail, oType, oSize, oDetFlav, oQuantity, oDetWght, oDetAddOn) VALUES('$orID','$oName','$oPhoneNum',  '$ctlog_id', '$data', '$date')";
				mysqli_query($conn, $query) or die($query . '  ERROR!');

			}

			unset($_SESSION['sess_cart']);
			header ('location: cart?act=success');
			exit();

		}

	} else {

		header ('location: cart');
		exit();

	}
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add To Cart</title>
	<link rel="stylesheet" href="bootstrap/css/all.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="bootstrap/js/popper.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script>

		$(document).ready(function(){

		//Fetching URL Parameters
		var url_string = window.location.href;
		var url = new URL(url_string);
		var action = url.searchParams.get("act");

		if (action == 'success') {
			$('#alert').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
				'<strong>Success!</strong>  Your order has been place and please wait patiently, thank you.'+
				'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
				'<span aria-hidden="true">&times;</span>'+
				'</button>'+
				'</div>');

		}

		if (action == 'error') {
			$('#alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
				'<strong>Error!</strong> Please wait current order to be delivered before placing a new order, thank you.'+
				'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
				'<span aria-hidden="true">&times;</span>'+
				'</button>'+
				'</div>');

		}
	});

</script>

</head>
<body class="content bg-light">

	<!-- Navbar -->

	<!-- Content -->
	<div class="container pt-5">

		<!-- Alert -->
		<div id="alert" style="position:absolute;z-index:1;">
		</div>

		<h2 class="display-4">Checkout Cart</h2>

		<table id="cart" class="table table-hover table-condensed">
			<thead>
				<tr>
					<th style="width:50%">Meals Info</th>
					<th style="width:10%">Price</th>
					<th style="width:8%">Quantity</th>
					<th style="width:22%" class="text-center">Subtotal</th>
					<th style="width:10%"></th>
				</tr>
			</thead>
			<tbody>
				<?php

				if (!empty($_SESSION['sess_cart'])) {

					$tot_prc = 0;

					foreach ($_SESSION['sess_cart'] as $key => $data) {

						$ctlog_id = decryptIt($key); 

						$query = "SELECT * from fds_ctlog WHERE ctlog_id = '$ctlog_id'";
						$row = mysqli_fetch_assoc(mysqli_query($conn, $query));

						?>

						<tr>
							<td data-th="Product">
								<div class="row">

									<?php 

									if ($row['ctlog_img'] != null) {

										echo '<div class="col-3 hidden-xs"><img src="img/menu/'. $row['ctlog_img'] .'" alt="No available Image" class="img-fluid"/></div>';

									} else {

										echo '<div class="col-3 hidden-xs"><img src="http://placehold.it/100x100" alt="No available Image" class="img-fluid"/></div>';
									}

									?>

									<div class="col">
										<h4 class="nomargin"><?php echo $row['ctlog_nme'];?></h4>
										<p><?php echo $row['ctlog_desc'];?></p>
									</div>
								</div>
							</td>
							<td data-th="Price"><?php echo $row['ctlog_prc'];?></td>
							<td data-th="Quantity">
								<p><?php echo $data;?></p>
							</td>
							<td data-th="Subtotal" class="text-center"><?php echo $row['ctlog_prc'] * $data;?></td>
							<td class="actions" data-th="">
								<a href="checkout?act=add&id=<?php echo $key; ?>"  class="btn btn-info btn-sm"><i class="fas fa-plus"></i></a>
								<a href="checkout?act=del&id=<?php echo $key; ?>"  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>	
							</td>
						</tr>

						<?php

						$tot_prc = $tot_prc + $row['ctlog_prc'] * $data;	
					}

				} else {

					echo '<tr><td colspan="5"><p>Nothing yet in your cart :( <br><small> Order some meal now!</small></p></td></tr>';
				}
				
				?>

			</tbody>
			<tfoot>
				<tr>
					<td colspan="3" class="hidden-xs"></td>
					<td class="hidden-xs text-center"><strong>Total RM <?php echo round($tot_prc);?></strong></td>
					<td><a href="checkout?act=confirm" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
				</tr>
			</tfoot>
		</table>


		<h2 class="display-4">Order Status</h2>

		<div class="row px-3">

			<div class="col">
				<div class="row border-top py-3 text-info">
					<div class="col-6">Meals Info</div>
					<div class="col-2">Price</div>
					<div class="col-2">Quantity</div>
					<div class="col-2">Status</div>
				</div>

				<?php
				$query = "SELECT * from fds_ordr WHERE ordr_usrdt_id='$usr_id'";
				$result = mysqli_query($conn, $query);
				$count = 1;

				if (mysqli_num_rows($result) > 0 ) {

					while($row = mysqli_fetch_assoc($result)){

						$ordr_ctlog_id = $row['ordr_ctlog_id'];

						$query = "SELECT * from fds_ctlog WHERE ctlog_id = '$ordr_ctlog_id'";
						$row_data = mysqli_fetch_assoc(mysqli_query($conn, $query));

						echo '<div class="row border-top py-3">';
						echo '<div class="col-6">'. $row_data['ctlog_nme'] .'</div>';
						echo '<div class="col-2">'. $row_data['ctlog_prc'] .'</div>';
						echo '<div class="col-2">'. $row['ordr_qty'] .'</div>';
						echo '<div class="col-2">'. $row['ordr_stat'] .'</div>';
						echo '</div>';
						$tot_prc += $row_data['ctlog_prc'] * $row['ordr_qty'];
						
					}

					echo '<div class="row border-top pt-3">';
					echo '<div class="col text-center text-success">Total price: RM '. round($tot_prc, 1) .'</div>';
					echo '</div>';

					echo '<div class="row pb-5">';
					echo '<div class="col text-center text-muted">Note: Please ready small changes and follow exact total price.</div>';
					echo '</div>';
				}

				?>
			</div>
		</div>

	</div>
</body>
</html>