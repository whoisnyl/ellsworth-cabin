<?php

$root = $_SERVER["DOCUMENT_ROOT"];

require $root . "/connect.php";

// Check session
if (!isset($_SESSION['auth']) || isset($_SESSION['auth']['error'])) {
	header('Location: /');
	exit;
}

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if date filter is set
if (isset($_GET['date_start']) && isset($_GET['date_end'])) {

	$dateStart = date('Y-m-d', strtotime(str_replace('-', '/', $_GET['date_start'])));
	$dateEnd = date('Y-m-d', strtotime(str_replace('-', '/', $_GET['date_end'])));

	$sql = "SELECT * FROM booking WHERE payment_status = 'paid' AND booking_status = 'reserved' AND check_in BETWEEN '$dateStart' AND '$dateEnd' ORDER BY date_created ASC";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
	} else {
		$data = [];
	}

} else {
	
	// Grab all reserved this month

	$sql = "SELECT * FROM booking WHERE payment_status = 'paid' AND booking_status = 'reserved' AND MONTH(check_in) = MONTH(CURRENT_DATE()) ORDER BY date_created ASC";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
	} else {
		$data = [];
	}

}

$conn->close();

?>