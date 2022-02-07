<?php

$root = $_SERVER["DOCUMENT_ROOT"] . '/ellsworth-cabin';

session_save_path( $root . "/admin/cgi-bin/tmp" );
session_start();

if (isset($_SESSION['auth']['is_logged_in']) && $_SESSION['auth']['is_logged_in'] === 1) {
	header("location: /ellsworth-cabin/admin/booking");
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
	<link href="/ellsworth-cabin/assets/css/jquery-ui.min.css" rel="stylesheet">
	<link href="/ellsworth-cabin/assets/css/global.css" rel="stylesheet">
	<link href="/ellsworth-cabin/assets/css/admin/signin.css" rel="stylesheet">
	<!-- seo -->
	<title>Ellsworth Cabin</title>
</head>
<body>
	<main class="form-signin">
		<form method="POST" action="/ellsworth-cabin/process/admin/authenticate/signin.php">
			<h1 class="h3 mb-3 fw-normal">Please sign in</h1>

			<div class="col-12">
				<label class="fc-ui mb-3">
					<p class="fc-ui--placeholder">Email address</p>
					<input type="email" name="email_address" id="emailAddress" />
				</label>
			</div>
			<div class="col-12">
				<label class="fc-ui mb-3">
					<p class="fc-ui--placeholder">Password</p>
					<input type="password" name="password" id="password" />
				</label>
			</div>
			<button class="w-100 mt-3 btn btn-primary text-uppercase" type="submit">Sign in</button>
			<p id="errorMessage" class="text-danger mt-4 text-center <?= isset($_SESSION['auth']['error']) ? 'd-block' : 'd-none' ?>"><?= isset($_SESSION['auth']['error']) ? $_SESSION['auth']['error'] : '' ?></p>
		</form>
	</main>

	<!-- script -->
	<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			$('form').on('submit', function(e) {
				if ($('#emailAddress').val() === '' || $('#password').val() === '') {
					e.preventDefault();
					$('#errorMessage').removeClass('d-none').addClass('d-block');
				}
			})
		})
	</script>
</body>
</html>