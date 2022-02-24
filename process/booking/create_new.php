<?php

$root = $_SERVER["DOCUMENT_ROOT"];

session_save_path( $root . "/cgi-bin/tmp" );
session_start();

require $root . "/connect.php";

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$bookingId = $_POST['booking_id'];
$checkIn = $_POST['check_in'];
$checkOut = $_POST['check_out'];
$guests = $_POST['guests'];
$total = $_POST['total'];
$fullName = $_POST['full_name'];
$mobileNumber = $_POST['mobile_number'];

if ($fullName === "" || $mobileNumber === "") {
	$_SESSION['booking']['create_error'] = 'Please check input value';

	header('Location: /booking');
	exit;
}

$sql = "INSERT INTO booking (
	booking_id, 
	full_name, 
	mobile_number, 
	check_in, 
	check_out, 
	guests, 
	total
) VALUES (
	$bookingId, 
	'$fullName', 
	'$mobileNumber', 
	'$checkIn', 
	'$checkOut', 
	$guests, 
	$total
)";

if ($conn->query($sql) === TRUE) {
	unset($_SESSION['booking']);
	$_SESSION['confirmation'] = $bookingId;
	
	header('Location: /confirmation');
	exit;
} else {
  $_SESSION['booking']['create_error'] = 'Something went wrong, please try again.';

	header('Location: /booking');
	exit;
}

$conn->close();

?>