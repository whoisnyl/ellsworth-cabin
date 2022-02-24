<?php

$root = $_SERVER["DOCUMENT_ROOT"];

session_save_path( $root . "/cgi-bin/tmp" );
session_start();

require $root . "/connect.php";

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function getUuid(mysqli $db, $short=false) {
	$query = "SELECT " . ($short ? "UUID_SHORT()" : "UUID()");
	$result = $db->query($query)->fetch_array();
	return $result[0];
}

$checkInVal = str_replace('-', '/', $_POST['check_in']);
$checkOutVal = str_replace('-', '/', $_POST['check_out']);

$bookingId = getUuid($conn, true);
$checkIn = date('Y-m-d', strtotime($checkInVal));
$checkOut = date('Y-m-d', strtotime($checkOutVal));
$guests = $_POST['guests'];

if ($checkIn === "" || $checkOut === "" || $guests === "") {
	$_SESSION['booking']['search_error'] = 'Please check input value';

	header('Location: /');
	exit;
}

$sql = "SELECT COUNT(*) as booking FROM booking WHERE '$checkIn' BETWEEN check_in AND check_out OR '$checkOut' BETWEEN check_in AND check_out OR ('$checkIn' <= check_in AND '$checkOut' >= check_out)";

$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if ($data['booking'] > 0) {
	$_SESSION['booking']['search_error'] = 'Selected date not available anymore';

	header('Location: /');
	exit;
}

unset($_SESSION['booking']['search_error']);

$_SESSION['booking']['id'] = $bookingId;
$_SESSION['booking']['check_in'] = $checkIn;
$_SESSION['booking']['check_out'] = $checkOut;
$_SESSION['booking']['guests'] = $guests;

$conn->close();

header('Location: /booking');
exit;

?>