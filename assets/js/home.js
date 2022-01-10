

$(window).on('load', function() {
	$('#navigation a').on('click', function(e) {
		e.preventDefault();

		const section = $(this).attr('href')

		$('html, body').animate({
			scrollTop: $(section).offset().top
		}, 300);
	})
})

$(document).ready(function() {
	// navigation

	$(window).on('resize', function() {
		if ($(this).outerWidth() <= 1200) {
			let windowHeight = $(this).outerHeight()
			$('#navigation').css('top', -Math.abs(windowHeight))
		}
	}).resize();

	$('#burger').on('click', function() {
		$('#navigation').toggleClass('open')
	});

	// booking form

	$('#checkInDatePicker input').datepicker({
		dateFormat:'mm-dd-yy',
		minDate: new Date(),
		onSelect: function(date){
			const startDate = $(this).datepicker('getDate');
			$('#checkOutDatePicker input').datepicker('setDate', startDate)
			$('#checkOutDatePicker input').datepicker('option', 'minDate', startDate)
			// ui update
			$('#checkInDatePicker .fc-ui--value').text(date)
			$(this).datepicker('hide')
		}
	});

	$('#checkOutDatePicker input').datepicker({
		dateFormat:'mm-dd-yy',
		onSelect: function(date) {
			// ui update
			$('#checkOutDatePicker .fc-ui--value').text(date)
			$(this).datepicker('hide')
		}
	});

	$('#numberOfPax select').on('change', function() {
		$('#numberOfPax .fc-ui--value').text($(this).val())
	})

	// gallery filtering

	$('.gallery-category li').on('click', function() {
		$(this).addClass('active').siblings().removeClass('active')
		const filter = $(this).text();

		if (filter.toLowerCase() === 'all') {
			$('.gallery-list').fadeIn()
		} else {
			$('.gallery-list').each(function() {
				if ($(this).data('category') !== filter.toLowerCase()) {
					$(this).fadeOut()
				} else {
					$(this).fadeIn()
				}
			})
		}
	})

	// initiate testimonials slider
	$('#testimonialsSlider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		speed: 800,
		dots: true,
		prevArrow: $('.prev'),
		nextArrow: $('.next')
	});
});