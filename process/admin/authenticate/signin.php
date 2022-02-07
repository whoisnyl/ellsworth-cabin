<?php

$root = $_SERVER["DOCUMENT_ROOT"] . '/ellsworth-cabin';

session_save_path( $root . "/admin/cgi-bin/tmp" );
session_start();

require $root . "/connect.php";

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email_address'];
$password = $_POST['password'];

if ($email == '' || $password == '') {
	$_SESSION['auth']['error'] = 'Invalid email address or password';

	header('Location: /ellsworth-cabin/admin');
	exit;
}

$sql = "SELECT * FROM users WHERE email_address = '$email'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
	$row = $result->fetch_array(MYSQLI_ASSOC);

	if (password_verify($password, $row['password'])) {

		unset($_SESSION['auth']['error']);
		$_SESSION['auth']['name'] = $row['first_name'] . ' ' . $row['last_name'];
		$_SESSION['auth']['email'] = $row['email_address'];
		$_SESSION['auth']['is_logged_in'] = 1;

		header('Location: /ellsworth-cabin/admin/booking');
		exit;

	} else {

		$_SESSION['auth']['error'] = 'Invalid email address or password';

		header('Location: /ellsworth-cabin/admin');
		exit;

	}

} else {

	$_SESSION['auth']['error'] = 'Invalid email address or password';

	header('Location: /ellsworth-cabin/admin');
	exit;

}

exit;