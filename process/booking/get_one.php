<?php

$root = $_SERVER["DOCUMENT_ROOT"] . '/ellsworth-cabin';

require $root . "/connect.php";

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$bookingId = $_SESSION['confirmation'];

$sql = "SELECT COUNT(*) as booking FROM booking WHERE booking_id = '$bookingId'";

$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

$conn->close();

?>