<?php function get_header($page) { ?>

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
	<?php switch ($page) {
		case 'home':
			echo '<link href="/ellsworth-cabin/assets/css/home.css" rel="stylesheet">';
			break;
		
		case 'booking':
			echo '<link href="/ellsworth-cabin/assets/css/booking.css" rel="stylesheet">';
	} ?>
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

<?php } ?>