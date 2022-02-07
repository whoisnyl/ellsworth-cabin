<?php

$root = $_SERVER["DOCUMENT_ROOT"] . '/ellsworth-cabin';

session_save_path( $root . "/cgi-bin/tmp" );
session_start();

require $root . '/process/booking/get_one.php';

if (!isset($_SESSION['confirmation']) || $data['booking'] == 0) {
	header('Location: /ellsworth-cabin');
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
	<!-- css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="/ellsworth-cabin/assets/css/slick.css" rel="stylesheet">
	<link href="/ellsworth-cabin/assets/css/jquery-ui.min.css" rel="stylesheet">
	<link href="/ellsworth-cabin/assets/css/global.css" rel="stylesheet">
	<link href="/ellsworth-cabin/assets/css/booking.css" rel="stylesheet">
	<link href="/ellsworth-cabin/assets/css/media.css" rel="stylesheet">
	<!-- seo -->
	<title>Ellsworth Cabin</title>
</head>
<body>
	<header id="header">
		<div class="container-fluid">
			<div class="wrapper">
				<div class="hstack align-items-center justify-content-between">
					<div id="logo">
						<a href="/ellsworth-cabin">
							<img src="/ellsworth-cabin/assets/images/ellsworth-cabin.png" alt="Ellsworth Cabin" class="img-fluid">
						</a>
					</div>
					<div id="navigation" class="d-none d-xl-block">
						<nav class="d-flex flex-column flex-xl-row align-items-center justify-content-center">
							<li><a class="link-primary nav-list" href="#mainBanner">Cabin</a></li>
							<li><a class="link-primary nav-list" href="#aboutSection">About</a></li>
							<li><a class="link-primary nav-list" href="#activitiesSection">Activities</a></li>
							<li><a class="link-primary nav-list" href="#gallerySection">Gallery</a></li>
							<li><a class="link-primary nav-list" href="#testimonialsSection">Testimonials</a></li>
							<li><a class="link-primary nav-list" href="#mapSection">Map</a></li>
						</nav>
					</div>
					<div id="booking">
						<a href="#mainBanner" class="btn btn-primary text-uppercase">
							<div class="hstack align-items-center">
								<span class="btn-icon"></span>
								<span>Book now</span>
							</div>
						</a>
					</div>
				</div>
				<img class="img-fluid flaoting-plant" src="/ellsworth-cabin/assets/images/header__plant-bg.png" alt="Plant" />
			</div>
		</div>
	</header>

	<main id="main">
		<div id="bookingResult">
			<div class="container">

					<section class="text-center" id="bookingConfirmation">
						<h2>Booking Reservation Successful</h2>
						<p class="mb-5">We will contact your for your payment as soon as possible. If you have any concern, don't hesitate to contact as and provide your booking ID: <?= $_SESSION['confirmation'] ?></p>
						<a href="/ellsworth-cabin/process/booking/clear_session.php" class="btn btn-primary text-uppercase">Go back home</a>
					</section>

			</div>
		</div>
	</main>

	<footer id="footer">
		<p class="text-center">The Ellsworth Cabin &copy; 2021 All rights reserved. <a href="#">Terms and Conditions.</a></p>
	</footer>
	
	<!-- script -->
	<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
	<script src="/ellsworth-cabin/assets/js/slick.min.js"></script>
	<script src="/ellsworth-cabin/assets/js/jquery-ui.min.js"></script>
	<script src="/ellsworth-cabin/assets/js/home.js"></script>
</body>
</html>