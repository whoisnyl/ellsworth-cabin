<?php

// Disable manual signup
exit;

$root = $_SERVER["DOCUMENT_ROOT"] . "/ellsworth-cabin";

session_save_path( $root . "/admin/cgi-bin/tmp" );
session_start();

// Setup connections
require $root . "/connect.php";

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Setup variables
$email 	= 'jerekel87@gmail.com'; //$_POST['email_address'];
$fn   	= 'Jeremy'; // $_POST['first_name'];
$ln   	= 'Ellsworth'; // $_POST['last_name'];
$pass 	= 'm~)Bdp?EM&~iGpS{'; // $_POST["password"];
$opt	= ['cost' => 12];
$hash 	= password_hash($pass, PASSWORD_BCRYPT, $opt);

// Run insert query
$sql = "INSERT INTO users(
	email_address, 
	password,
	first_name, 
	last_name
) VALUES (
	'".mysqli_real_escape_string($conn,$email)."',
	'".mysqli_real_escape_string($conn,$hash)."',
	'".mysqli_real_escape_string($conn,$fn)."',
	'".mysqli_real_escape_string($conn,$ln)."'
)";

if ($conn->query($sql) === TRUE) {
	echo 'Creating new user successful!';
	exit;
} else {
  echo 'Creating new user failed!';
	exit;
}

$conn->close();

?>