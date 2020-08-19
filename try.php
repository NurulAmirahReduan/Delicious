<?php
$servername = "localhost";
$dbname = "whbms";

// Create connection
$conn = mysqli_connect($servername, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO order_detail (oName, oPhoneNum, oEmail, oType, oSize, oDetFlav, oQuantity, oDetWght, oDetAddOn, oDate)
VALUES ('john', '0145471360', 'john@example.com', 'cake', 4, 'peanutButter', 1, 5, 'candles', '12/12/2012')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>