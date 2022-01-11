

$(window).on('load', function() {
	$('#header a').on('click', function(e) {
		e.preventDefault();

		const section = $(this).attr('href')

		$('html, body').animate({
			scrollTop: $(section).offset().top
		}, 300);
	})
})

$(document).ready(function() {

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

	let filter = 'all';
	let count = 0;

	$('.gallery-category li').on('click', function() {
		$(this).addClass('active').siblings().removeClass('active')
		filter = $(this).text();

		$('.gallery-list').each(function() {
			if (filter.toLowerCase() === 'all') {
				if ($(this).data('visibility') === 'hidden') {
					$(this).addClass('hidden').hide()
				} else {
					$(this).fadeIn();
				}
			} else {
				if ($(this).data('category') === filter.toLowerCase()) {
					if ($(this).data('visibility') === 'hidden') {
						$(this).addClass('hidden').hide()
					} else {
						$(this).fadeIn();
					}
					count++;
				} else {
					$(this).fadeOut()
				}
			}

			console.log(count)
			$('#showMoreGallery').show()
		});

		// hide show more button if no images to show
		if (filter.toLowerCase() !== 'all' && count === 0) {
			$('#showMoreGallery').hide()
		} else {
			$('#showMoreGallery').show();
		}
		
		// scroll to top of section every time filter reset
		$('html, body').animate({
			scrollTop: $('#gallerySection').offset().top
		}, 100);
		
		// reset count
		count = 0;
	});

	$('#showMoreGallery').on('click', function() {
		if (filter.toLowerCase() === 'all') {
			$('.gallery-list.hidden').fadeIn().removeClass('hidden')
		} else {
			$('.gallery-list.hidden').each(function() {
				if ($(this).data('category') !== filter.toLowerCase()) {
					$(this).fadeOut()
				} else {
					$(this).fadeIn().removeClass('hidden')
				}
			})
		}
		$(this).hide()
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