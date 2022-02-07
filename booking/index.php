<?php

$root = $_SERVER["DOCUMENT_ROOT"] . '/ellsworth-cabin';

session_save_path( $root . "/cgi-bin/tmp" );
session_start();

require $root . '/header.php';
require $root . '/footer.php';

if (!isset($_SESSION['booking']) || isset($_SESSION['booking']['search_error'])) {
	header('Location: /ellsworth-cabin');
	exit;
}

$bookingId = $_SESSION['booking']['id'];
$checkIn = $_SESSION['booking']['check_in'];
$checkOut = $_SESSION['booking']['check_out'];
$guests = $_SESSION['booking']['guests'];

// format date
$checkInDate = date_format(date_create($checkIn), 'M d, Y');
$checkOutDate = date_format(date_create($checkOut), 'M d, Y');

// price per night
$pricePerNight = 25000;
$priceFormat = number_format($pricePerNight);

// calculate how many nights guests stay
$date1 = new DateTime($checkIn);
$date2 = new DateTime($checkOut);
$numberOfNights = $date2->diff($date1)->format("%a");

// total amount
$totalAmount = $numberOfNights * $pricePerNight;
$totalAmountFormat = number_format($totalAmount);

get_header('booking');

?>

<main id="main">
	<div id="bookingResult">
		<div class="container">
			<?php if (isset($_SESSION['booking']['create_error'])) { ?>
				<div class="alert alert-danger mb-5" role="alert">
					<?= $_SESSION['booking']['create_error'] ?>
				</div>
			<?php } ?>
			<div class="d-flex flex-column-reverse flex-lg-row align-items-lg-start">
				<div id="bookingDescription">
					<section class="heading">
						<h1 class="mini-title">The Ellsworth Cabin - A unique glamping experience</h1>
						<p>Tanay, Rizal</p>
						<div class="d-flex align-items-center">
							<div class="heading-list">
								<div class="d-flex align-items-center">
									<p>1 bedroom</p>
								</div>
							</div>
							<div class="heading-list">
								<div class="d-flex align-items-center">
									<p>2 beds</p>
							</div>
							</div>
							<div class="heading-list">
								<div class="d-flex align-items-center">
									<p>10 guests</p>
							</div>
							</div>
							<div class="heading-list">
								<div class="d-flex align-items-center">
									<p>3 bathrooms</p>
							</div>
							</div>
						</div>
						<p>Make some memories at The Ellsworth Cabin, a unique and family-friendly to relax and connect with everything nature has to offer.</p>
					</section>
					<section class="amenities">
						<div class="row">
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Oven</p>
								</div>
							</div>
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Dishes &amp; Utensils</p>
								</div>
							</div>
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Pantry items</p>
								</div>
							</div>
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Stove</p>
								</div>
							</div>
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Linens provided</p>
								</div>
							</div>
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Paid parking off premises</p>
								</div>
							</div>
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Television</p>
								</div>
							</div>
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Free wifi</p>
								</div>
							</div>
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Fire extinguisher</p>
								</div>
							</div>
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Microwave</p>
								</div>
							</div>
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Kitchen</p>
								</div>
							</div>
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Refrigerator</p>
								</div>
							</div>
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Internet</p>
								</div>
							</div>
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Parking</p>
								</div>
							</div>
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Living room</p>
								</div>
							</div>
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Outdoor grill</p>
								</div>
							</div>
							<div class="col-6">
								<div class="d-flex align-items-center">
									<p>Cleaned with disinfectant</p>
								</div>
							</div>
						</div>
					</section>
				</div>
				<div id="reservationForm" class="mb-5 mb-lg-0">
					<section>
						<h3>PHP <?= $priceFormat ?><span>per night</span></h3>
						<p>The Ellsworth Cabin - A Unique Glamping Experience</p>
					</section>
					<form method="POST" action="/ellsworth-cabin/process/booking/create_new.php">
						<input type="hidden" name="booking_id" value="<?= $bookingId ?>" />
						<input type="hidden" name="check_in" value="<?= $checkIn ?>" />
						<input type="hidden" name="check_out" value="<?= $checkOut ?>" />
						<input type="hidden" name="guests" value="<?= $guests ?>" />
						<input type="hidden" name="total" value="<?= $totalAmount ?>" />
						<div class="row">
							<div class="col-6">
								<label class="fc-ui mb-4">
									<p class="fc-ui--placeholder">Check-in</p>
									<p class="fc-ui--value"><?= $checkInDate ?></p>
								</label>
							</div>
							<div class="col-6">
								<label class="fc-ui mb-4">
									<p class="fc-ui--placeholder">Check-out</p>
									<p class="fc-ui--value"><?= $checkOutDate ?></p>
								</label>
							</div>
							<div class="col-12">
								<label class="fc-ui mb-4">
									<p class="fc-ui--placeholder">Number of guests</p>
									<p class="fc-ui--value"><?= $guests ?></p>
								</label>
							</div>
							<div class="col-12">
								<label class="fc-ui mb-4">
									<p class="fc-ui--placeholder">Full name</p>
									<input type="text" name="full_name" />
								</label>
							</div>
							<div class="col-12">
								<label class="fc-ui mb-4">
									<p class="fc-ui--placeholder">Mobile number</p>
									<input type="text" name="mobile_number" />
								</label>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-between">
							<p>Accommodation total</p>
							<p>PHP <?= $totalAmountFormat ?></p>
						</div>
						<div class="d-flex align-items-center justify-content-between">
							<p>Total</p>
							<p>PHP <?= $totalAmountFormat ?></p>
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-primary text-uppercase">Instant Book</button>
							<p class="text-center mt-2 mb-0">You won't be charged yet</p>
						</div>
					</section>
				</div>
		</div>
	</div>
</main>

<?php get_footer('booking') ?>