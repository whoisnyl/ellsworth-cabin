<?php

$root = $_SERVER["DOCUMENT_ROOT"] . '/ellsworth-cabin';

require $root . "/connect.php";

// Check session
if (!isset($_SESSION['auth']) || isset($_SESSION['auth']['error'])) {
	header('Location: /ellsworth-cabin');
	exit;
}

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM booking WHERE payment_status = 'for payment' AND booking_status = 'pending' ORDER BY date_created ASC";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
} else {
  $data = [];
}

$conn->close();

?>