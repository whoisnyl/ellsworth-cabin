<?php

$root = $_SERVER["DOCUMENT_ROOT"];

require $root . "/connect.php";

session_save_path( $root . "/admin/cgi-bin/tmp" );
session_start();

// Check session
if (!isset($_SESSION['auth']) || isset($_SESSION['auth']['error'])) {
	header('Location: /');
	exit;
}

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['id'])) {
	header('Location: /admin/booking');
	exit;
}

$user = $_SESSION['auth']['name'];
$id = $_GET['id'];

$sql = "UPDATE booking SET booking_status='cancelled', updated_by='$user' WHERE booking_id = '$id'";

if ($conn->query($sql) === TRUE) {
  header('Location: /admin/booking');
	exit;
} else {
  header('Location: /admin/booking?id=' . $id);
	exit;
}


$conn->close();

?>