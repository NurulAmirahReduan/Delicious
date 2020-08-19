<?php
session_start();
include("db.php");


if($_GET['act'] == 'lgout') {

	session_destroy();
	header("Location: index2");

}

if($_POST['data'] == 'chk_usr') {

	$usr = $_POST['temp_usr'];

	$query = "SELECT * from user_detail WHERE uName = '$uName'";
	$result = mysqli_fetch_assoc(mysqli_query($conn, $query));

	echo json_encode($result);
}


if (isset($_POST['signup'])) {

	if( (!empty($_POST['username'])) && (!empty($_POST['password'])) ){

		$usr = stripslashes($_REQUEST['username']);
		$usr = mysqli_real_escape_string($conn,$usr); 
		$pwd = stripslashes($_REQUEST['password']);
		$pwd = md5(mysqli_real_escape_string($conn,$pwd));
		$name = stripslashes($_REQUEST['fullname']);
		$name = mysqli_real_escape_string($conn,$name);
		$phone = stripslashes($_REQUEST['phone']);
		$phone = mysqli_real_escape_string($conn,$phone);
		$address = stripslashes($_REQUEST['address']);
		$address = mysqli_real_escape_string($conn,$address);
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($conn,$email);

		$query = "INSERT INTO user_detail (uName,uPwd,uFname,uPnum,uAddress,uEmail,uStatus,uCreatedAt) VALUES('$usr','$pwd','$name','$phone','$address','$email','user','$date')";
		$result = mysqli_query($conn, $query);

		echo json_encode($result);

	}
}


if (isset($_POST['login'])) {

	$usr = stripslashes($_REQUEST['username']);
	$usr = mysqli_real_escape_string($conn,$usr); 
	$pwd = stripslashes($_REQUEST['password']);
	$pwd = md5(mysqli_real_escape_string($conn,$pwd));

	$query = "SELECT * FROM user_detail WHERE uName='$usr' AND uPwd='$pwd'";
	$result = mysqli_query($conn, $query) or die($query . '  ERROR!');

	if(mysqli_num_rows($result) > 0 ) {

		$data = mysqli_fetch_assoc($result);
		
		$_SESSION['sess_id'] = $data["uID"];
		$_SESSION['sess_username'] = $data["uName"];
		$_SESSION['sess_fullname'] = $data["uFname"];
		$_SESSION['sess_status'] = $data["uStatus"];
		$_SESSION['sess_address'] = $data["uAddress"];

		echo 'true';

	} else {

		echo 'false';

	}

}

if (isset($_POST['ad_login'])) {

	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn,$usr); 
	$password = stripslashes($_REQUEST['password']);
	$password = md5(mysqli_real_escape_string($conn,$pwd));

	$query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND status='admin'";
	$result = mysqli_query($conn, $query) or die($query . '  ERROR!');

	if(mysqli_num_rows($result) > 0 ) {

		$data = mysqli_fetch_assoc($result);
		
		$_SESSION['sess_id'] = $data["id"];
		$_SESSION['sess_username'] = $data["username"];
		$_SESSION['sess_fullname'] = $data["fullname"];
		$_SESSION['sess_status'] = $data["status"];

		echo 'true';
		exit();

	} else {

		echo 'false';
		exit();

	}

}


if (isset($_POST['update'])) {

	if( (!empty($_POST['nTitle'])) && (!empty($_POST['nDetail'])) && (!empty($_POST['nDescription']))  (!empty($_POST['nDate'])){

		$title = stripslashes($_REQUEST['nTitle']);
		$title = mysqli_real_escape_string($conn,$title); 
		$detail = stripslashes($_REQUEST['nDetail']);
		$detail = md5(mysqli_real_escape_string($conn,$detail));
		$desc = stripslashes($_REQUEST['nDescription']);
		$desc = mysqli_real_escape_string($conn,$desc);
		$date = stripslashes($_REQUEST['nDate']);
		$date = mysqli_real_escape_string($conn,$date);
		

		$query = "INSERT INTO news_detail (nTitle,nDetail,nDescription,nDate) VALUES('$title','$detail','$desc','$date')";
		$result = mysqli_query($conn, $query);

		echo json_encode($result);

	}
}


if (isset($_POST['update'])) {

	if( (!empty($_POST['fullname'])) && (!empty($_POST['address'])) ){

		$name = $_POST['fullname'];
		$address = $_POST['address'];
		$id = $_SESSION['sess_id'];

		$query = "UPDATE user_detail SET uFname = '$name', uAddress = '$address' WHERE uID = '$id'";
		$result = mysqli_query($conn, $query);

		$_SESSION['sess_fullname'] = $name;
		$_SESSION['sess_address'] = $address;

		echo json_encode($result);

	}
}


if($_POST['data'] == 'get_menu') {

	$pID = decryptIt($_POST['menu_id']);

	$query = "SELECT * from product_catalogue_detail WHERE pID = '$pID'";
	$result = mysqli_fetch_assoc(mysqli_query($conn, $query));

	echo json_encode($result);
}


if($_POST['data'] == 's_query') {

	$s_data = $_POST['s_data'];
	$q_data = $_POST['q_filter'];

	if ($q_data == 'shop') {

		$query = "SELECT * from product_catalogue_detail WHERE pDetail LIKE '%$s_data%'";
		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result) > 0) {

			$key = 0;
			while ($row = mysqli_fetch_assoc($result)) {

				$new_data[$key]['pID'] = encryptIt($row['pID']);
				$new_data[$key]['pType'] = encryptIt($row['pType']);
				$new_data[$key]['pName'] = $row['pName'];
				$new_data[$key]['pPrice'] = $row['pPrice'];
				$new_data[$key]['pDescription'] = $row['pDescription'];
				$new_data[$key]['pDetail'] = $row['pDetail'];
				

				$key++;
			};


			echo json_encode($new_data);
		} else {

			echo json_encode('none');
		}

	} else {

		$query = "SELECT * from product_catalogue_detail WHERE pName LIKE '$s_data%'";
		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result) > 0) {
			
			$key = 0;
			while ($row = mysqli_fetch_assoc($result)) {
				
				$new_data[$key]['pID'] = encryptIt($row['pID']);
				$new_data[$key]['pType'] = encryptIt($row['pType']);
				$new_data[$key]['pName'] = $row['pName'];
				$new_data[$key]['pPrice'] = $row['pPrice'];
				$new_data[$key]['pDescription'] = $row['pDescription'];
				$new_data[$key]['pDetail'] = $row['pDetail'];
				$key++;
			};


			echo json_encode($new_data);
		} else {

			echo json_encode('none');
		}

	} 
}



?>
