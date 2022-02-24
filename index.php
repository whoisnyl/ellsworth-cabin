<?php

$root = $_SERVER["DOCUMENT_ROOT"];

session_save_path( $root . "/cgi-bin/tmp" );
session_start();

require $root . '/header.php';
require $root . '/footer.php';

get_header('home');

?>

	
<main id="main">
	<!-- ========================== MAIN BANNER -->
	<div id="mainBanner">
		<div class="container-fluid">
			<div id="headerReview">
				<section class="text-center">
					<h1 class="text-uppercase text-white">True Glamping</h1>
					<p class="text-white">"The best A-Frame cabin I've ever stayed in and I've stayed in lots of a-frame cabins" - One Arm Wonderer</p>
					<a href="#" class="btn btn-primary text-uppercase">Watch Video</a>
				</section>
			</div>
			<form method="POST" action="/process/booking/search_date.php" id="bookingForm">
				<div class="wrapper">
					<div class="d-flex flex-column align-items-center flex-md-row">
						<div class="date">
							<label class="fc-ui mb-3 mb-md-0" id="checkInDatePicker">
								<p class="fc-ui--placeholder">Check-in</p>
								<p class="fc-ui--value">mm-dd-yyyy</p>
								<input type="text" name="check_in" class="sr-only" val="">
							</label>
							<label class="fc-ui mb-3 mb-md-0" id="checkOutDatePicker">
								<p class="fc-ui--placeholder">Check-out</p>
								<p class="fc-ui--value">mm-dd-yyyy</p>
								<input type="text" name="check_out" class="sr-only" val="">
							</label>
						</div>
						<div class="spacing d-none d-md-block"></div>
						<div class="guest">
							<label class="fc-ui mb-3 mb-md-0" id="numberOfPax">
								<p class="fc-ui--placeholder">Number of persons (max 10 pax)</p>
								<p class="fc-ui--value">1</p>
								<select class="form-control" name="guests">
									<option value="1" selected>1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>
							</label>
						</div>
						<div class="spacing d-none d-md-block"></div>
						<button type="submit" id="searchBooking" class="btn btn-primary text-uppercase">Search</button>
						<?php if (isset($_SESSION['booking']['search_error'])) { ?>
							<div id="searchResponse"><?= $_SESSION['booking']['search_error'] ?></div>
						<?php } ?>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<!-- ========================== ABOUT -->
	<div id="aboutSection">
		<img class="img-fluid flaoting-plant d-none d-xxl-block" src="assets/images/about__plant-bg.png" alt="Plant" />
		<div class="container-fluid">
			<div class="wrapper">
				<div class="d-flex flex-column flex-lg-row align-items-start">
					<div id="aboutBanner">
						<canvas></canvas>
					</div>
					<div id="aboutDetails">
						<section id="aboutHeading">
							<h2 class="text-uppercase heading-title">Welcome</h2>
							<p>Tucked away in the province of Daraitan, known for its beautiful mountains and rivers, The Ellsworth Cabin is ready for all those looking to balance tranquility and adventure. The tropical destination is private and exclusive where guests can either choose to relax at the cabin or go fishing, swimming, treking, tubing and so much more!</p>
							<div class="hstack">
								<button class="btn btn-primary text-uppercase">Inclusions</button>
								<button class="btn btn-outline-primary text-uppercase">Cabin Rules</button>
							</div>
							<a href="#">Download our cabin rules + inclusions</a>
						</section>
						<div id="aboutIcons">
							<div class="d-flex flex-wrap justify-content-between align-items-end">
								<div class="icons-with-text text-center">
									<img src="assets/images/icon__peaceful.png" alt="Peaceful" class="img-fluid">
									<p>Peaceful</p>
								</div>
								<div class="icons-with-text text-center">
									<img src="assets/images/icon__comfortable.png" alt="Comfortable" class="img-fluid">
									<p>Comfortable</p>
								</div>
								<div class="icons-with-text text-center">
									<img src="assets/images/icon__nature.png" alt="Nature" class="img-fluid">
									<p>Nature</p>
								</div>
								<div class="icons-with-text text-center">
									<img src="assets/images/icon__unique.png" alt="Unique" class="img-fluid">
									<p>Unique</p>
								</div>
								<div class="icons-with-text text-center">
									<img src="assets/images/icon__safe.png" alt="Safe" class="img-fluid">
									<p>Safe</p>
								</div>
								<div class="icons-with-text text-center">
									<img src="assets/images/icon__clean.png" alt="Clean" class="img-fluid">
									<p>Clean</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- ========================== ACTIVITIES -->
	<div id="activitiesSection">
		<img class="img-fluid flaoting-plant d-none d-xxl-block" src="assets/images/activities__plant-bg.png" alt="Plant" />
		<div class="container">
			<section id="activitiesHeading">
				<h2 class="text-uppercase heading-title">Activities</h2>
				<p>The Ellsworth Cabin offers lots of fun activities for all ages! When you participate in any of the following activities, you are also helping the locals with a sustainable income! Activities are also a great way to bond with friends and family.</p>
			</section>
			<div id="activitiesList">
				<div class="row">
					<div class="col-12 col-md-4">
						<div class="list-thumbnail">
							<canvas class="bg-image" style="background-image: url('/assets/images/activities__thumbnail-01.webp');"></canvas>
							<p class="tag">Popular choice</p>
						</div>
						<section class="list-section">
							<h4 class="mini-title text-uppercase">Hiking</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adispisci elit, sed do eiusmod tempor.</p>
						</section>
					</div>
					<div class="col-12 col-md-4">
						<div class="list-thumbnail">
							<canvas class="bg-image" style="background-image: url('/assets/images/activities__thumbnail-02.webp');"></canvas>
						</div>
						<section class="list-section">
							<h4 class="mini-title text-uppercase">Fishing</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adispisci elit, sed do eiusmod tempor.</p>
						</section>
					</div>
					<div class="col-12 col-md-4">
						<div class="list-thumbnail">
							<canvas class="bg-image" style="background-image: url('/assets/images/activities__thumbnail-03.webp');"></canvas>
						</div>
						<section class="list-section">
							<h4 class="mini-title text-uppercase">River Rafting</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adispisci elit, sed do eiusmod tempor.</p>
						</section>
					</div>
				</div>
			</div>
			<div class="text-center button-holder">
				<button type="button" class="btn btn-primary text-uppercase">Show more</button>
			</div>
		</div>
	</div>
	
	<!-- ========================== GALLERY -->
	<div id="gallerySection">
		<img class="img-fluid flaoting-plant d-none d-xxl-block" src="assets/images/gallery__plant-bg.png" alt="Plant" />
		<div class="container">
			<section id="galleryHeading">
				<h2 class="heading-title text-uppercase">Gallery</h2>
			</section>
			<div id="galleryContent">
				<div class="gallery-category">
					<nav class="hstack align-items-center">
						<li class="active">All</li>
						<li class="divider"></li>
						<li>Interior</li>
						<li class="divider"></li>
						<li>Exterior</li>
						<li class="divider"></li>
						<li>Activities</li>
					</nav>
				</div>
				<div id="galleryGrid">
					<div class="row">
						<div class="col-12 col-md-6 col-lg-4 gallery-list" data-category="exterior">
							<div class="grid-thumbnail">
								<canvas class="bg-image" style="background-image: url('/assets/images/gallery__thumbnail-01.webp');"></canvas>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4 gallery-list" data-category="exterior">
							<div class="grid-thumbnail">
								<canvas class="bg-image" style="background-image: url('/assets/images/gallery__thumbnail-02.webp');"></canvas>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4 gallery-list" data-category="exterior">
							<div class="grid-thumbnail">
								<canvas class="bg-image" style="background-image: url('/assets/images/gallery__thumbnail-03.webp');"></canvas>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4 gallery-list" data-category="exterior">
							<div class="grid-thumbnail">
								<canvas class="bg-image" style="background-image: url('/assets/images/gallery__thumbnail-04.webp');"></canvas>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4 gallery-list" data-category="exterior">
							<div class="grid-thumbnail">
								<canvas class="bg-image" style="background-image: url('/assets/images/gallery__thumbnail-05.webp');"></canvas>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4 gallery-list" data-category="interior">
							<div class="grid-thumbnail">
								<canvas class="bg-image" style="background-image: url('/assets/images/gallery__thumbnail-06.webp');"></canvas>
							</div>
						</div>
						<!-- ====================================================== -->
						<!-- ======== LIST ALL THAT NEEDS TO BE HIDDEN BELOW ====== -->
						<!-- ****************************************************** -->
						<!-- ========== Just copy one of the list below =========== --> <!-- ====================================================== -->
						<div class="col-12 col-md-6 col-lg-4 gallery-list hidden" data-visibility="hidden" data-category="exterior">
							<div class="grid-thumbnail">
								<canvas class="bg-image" style="background-image: url('/assets/images/gallery__thumbnail-01.webp');"></canvas>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4 gallery-list hidden" data-visibility="hidden" data-category="exterior">
							<div class="grid-thumbnail">
								<canvas class="bg-image" style="background-image: url('/assets/images/gallery__thumbnail-02.webp');"></canvas>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4 gallery-list hidden" data-visibility="hidden" data-category="exterior">
							<div class="grid-thumbnail">
								<canvas class="bg-image" style="background-image: url('/assets/images/gallery__thumbnail-03.webp');"></canvas>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4 gallery-list hidden" data-visibility="hidden" data-category="exterior">
							<div class="grid-thumbnail">
								<canvas class="bg-image" style="background-image: url('/assets/images/gallery__thumbnail-04.webp');"></canvas>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4 gallery-list hidden" data-visibility="hidden" data-category="exterior">
							<div class="grid-thumbnail">
								<canvas class="bg-image" style="background-image: url('/assets/images/gallery__thumbnail-05.webp');"></canvas>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4 gallery-list hidden" data-visibility="hidden" data-category="interior">
							<div class="grid-thumbnail">
								<canvas class="bg-image" style="background-image: url('/assets/images/gallery__thumbnail-06.webp');"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="text-center button-holder">
				<button type="button" class="btn btn-primary text-uppercase" id="showMoreGallery">Show more</button>
			</div>
		</div>
	</div>
	
	<!-- ========================== TESTIMONIALS -->
	<div id="testimonialsSection">
		<img class="img-fluid flaoting-plant d-none d-xxl-block" src="assets/images/testimonials__plant-bg.png" alt="Plant" />
		<div class="container-fluid">
			<div class="wrapper">
				<div class="inner-wrapper">
					<section id="testimonialHeading">
						<h2 class="heading-title text-uppercase">Testimonails</h2>
						<p>You don't have to take our word of it, here are some reviews left by past guest who stayed at the cabin</p>
					</section>
					<div id="testimonialsSlider">
						<div class="testimonials-item">
							<div class="d-flex flex-column flex-md-row align-items-center">
								<div class="slider-thumbnail">
									<img src="assets/images/activities__thumbnail-01.webp" alt="" class="img-fluid">
								</div>
								<section class="slider-details">
									<h4 class="text-uppercase">Leslie Kho</h4>
									<p>"We love Ellsworth Cabin Even our fur baby loved the cabin. All the staff were so nice and helpful.<br/><br/>Definitely coming back!"</p>
									<img src="assets/images/icon__fb.png" alt="Facebook" class="img-fluid">
								</section>
							</div>
						</div>
						<div class="testimonials-item">
							<div class="d-flex flex-column flex-md-row align-items-center">
								<div class="slider-thumbnail">
									<img src="assets/images/activities__thumbnail-01.webp" alt="" class="img-fluid">
								</div>
								<section class="slider-details">
									<h4 class="text-uppercase">Leslie Kho</h4>
									<p>"We love Ellsworth Cabin Even our fur baby loved the cabin. All the staff were so nice and
										helpful.<br /><br />Definitely coming back!"</p>
									<img src="assets/images/icon__fb.png" alt="Facebook" class="img-fluid">
								</section>
							</div>
						</div>
						<div class="testimonials-item">
							<div class="d-flex flex-column flex-md-row align-items-center">
								<div class="slider-thumbnail">
									<img src="assets/images/activities__thumbnail-01.webp" alt="" class="img-fluid">
								</div>
								<section class="slider-details">
									<h4 class="text-uppercase">Leslie Kho</h4>
									<p>"We love Ellsworth Cabin Even our fur baby loved the cabin. All the staff were so nice and
										helpful.<br /><br />Definitely coming back!"</p>
									<img src="assets/images/icon__fb.png" alt="Facebook" class="img-fluid">
								</section>
							</div>
						</div>
						<div class="testimonials-item">
							<div class="d-flex flex-column flex-md-row align-items-center">
								<div class="slider-thumbnail">
									<img src="assets/images/activities__thumbnail-01.webp" alt="" class="img-fluid">
								</div>
								<section class="slider-details">
									<h4 class="text-uppercase">Leslie Kho</h4>
									<p>"We love Ellsworth Cabin Even our fur baby loved the cabin. All the staff were so nice and
										helpful.<br /><br />Definitely coming back!"</p>
									<img src="assets/images/icon__fb.png" alt="Facebook" class="img-fluid">
								</section>
							</div>
						</div>
					</div>
				</div>
				<div class="custom-arrows d-none d-xl-block">
					<div class="prev"></div>
					<div class="next"></div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- ========================== MAP -->
	<div id="mapSection">
		<div class="container-fluid">
			<div class="wrapper">
				<div class="d-flex flex-column-reverse flex-xl-row align-items-center justify-content-between">
					<section id="mapDetails">
						<h2 class="heading-title text-uppercase">Map</h2>
						<p>The Ellsworth Cabin is located in brgy. Daraitan, Tanay, Rizal, Philippines Surrounded by the beautiful mountains of serra madre. Pickup location for all guest will be at "Blue Eagle Parking"</p>
						<a href="https://goo.gl/maps/sUJjbiYXj2JXcCQx5" class="btn btn-outline-primary text-uppercase">
							<div class="hstack align-items-center">
								<span class="btn-icon"></span>
								<span>Direction</span>
							</div>
						</a>
					</section>
					<div id="mapFrame">
						<canvas class="bg-image" style="background-image: url('/assets/images/map__googlemap.webp');"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<div id="galleryModal">
	<div class="wrapper">
		<div id="closeModal"></div>
		<canvas></canvas>
	</div>
</div>

<?php get_footer('home'); ?>