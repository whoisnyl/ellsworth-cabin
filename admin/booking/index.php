<?php

$root = $_SERVER["DOCUMENT_ROOT"];

session_save_path( $root . "/admin/cgi-bin/tmp" );
session_start();

require $root . '/process/admin/booking/get_all_pending.php';

if (!isset($_SESSION['auth']['is_logged_in']) || $_SESSION['auth']['is_logged_in'] !== 1) {
	header("location: /admin");
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
	<link href="/assets/css/admin/main.css" rel="stylesheet">
	<!-- seo -->
	<title>Ellsworth Cabin</title>
</head>
<body>

	<main>
		<div class="flex-shrink-0 p-3 bg-white" id="adminSidebar" style="width: 280px;">
			<a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
				<svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
				<span class="fs-5 fw-semibold">Ellsworth Cabin</span>
			</a>
			<ul class="list-unstyled ps-0">
				<li class="mb-1">
					<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
						Booking
					</button>
					<div class="collapse show" id="home-collapse">
						<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
							<li><a href="/admin/booking" class="link-dark rounded">Pending</a></li>
							<li><a href="/admin/booking/reserved" class="link-dark rounded">Reserved</a></li>
						</ul>
					</div>
				</li>
				<li class="border-top my-3"></li>
				<li class="mb-1">
					<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
						Account
					</button>
					<div class="collapse" id="account-collapse">
						<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
							<li><a href="/process/admin/authenticate/signout.php" class="link-dark rounded">Sign out</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
		
		<div id="adminContent">
			<h2 class="mb-5">Pending payment</h2>
			
			<table class="table table table-hover">
				<thead class="table-dark">
					<tr>
						<td>Date created</td>
						<td>Booking ID</td>
						<td>Full name</td>
						<td>Mobile number</td>
						<td>Check-in</td>
						<td>Check-out</td>
						<td>Guests</td>
						<td>Total</td>
						<td>&nbsp;</td>
					</tr>
				</thead>
				<tbody>

					<?php if (sizeof($data) === 0) { ?>
						
						<tr>
							<td colspan="9" align="center">No pending booking.</td>
						</tr>
					
					<?php } else { ?>

						<?php for ($i = 0; $i < sizeOf($data); $i++) { ?>

							<tr>
								<td><?= date_format(date_create($data[$i]['date_created']), 'M d, Y') ?></td>
								<td><?= $data[$i]['booking_id'] ?></td>
								<td><?= ucwords($data[$i]['full_name']) ?></td>
								<td><?= $data[$i]['mobile_number'] ?></td>
								<td><?= date_format(date_create($data[$i]['check_in']), 'M d, Y') ?></td>
								<td><?= date_format(date_create($data[$i]['check_out']), 'M d, Y') ?></td>
								<td><?= $data[$i]['guests'] ?></td>
								<td><?= number_format($data[$i]['total']) ?></td>
								<td>
									<div class="dropdown">
										<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
											Action
										</button>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
											<li><a href="/process/admin/booking/mark_as_paid.php?id=<?= $data[$i]['booking_id'] ?>" class="dropdown-item">Mark as paid</a></li>
											<li><a href="/process/admin/booking/cancel.php?id=<?= $data[$i]['booking_id'] ?>" class="dropdown-item">Cancel booking</a></li>
										</ul>
									</div>
								</td>
							</tr>

						<?php } ?>

					<?php } ?>
					
				</tbody>
			</table>
		</div>
	</main>
	

	<!-- script -->
	<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
</body>
</html>