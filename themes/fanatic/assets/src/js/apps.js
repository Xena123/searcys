//------------------------------------------------------------------|
// Site Setup. Call functions & initialize plugins                  |
// inside of window.onload function                                 |
//------------------------------------------------------------------|
window.onload = function () {

	// Strict Mode On
	"use strict";


	//------------------------------------------------------------------|
	// Cut the Mustard Check                                            |
	// Check if browser supports modern js. Don't load wrapped JS if    |
	// it doesn't pass this check.                                      |
	// Ensure base non-js functionality when JS doesn't load.           |
	//------------------------------------------------------------------|
	var supports = !!document.querySelector && !!window.addEventListener;
	if (!supports) {
		return;
	}
	// Add class to body if js supported. Use this for styling elements requiring JS
	document.body.className += ' has-modern-js';

	//------------------------------------------------------------------|
	// Define variables                                                 |
	//------------------------------------------------------------------|
	var targetId = document.getElementById("targetId");

	//------------------------------------------------------------------|
	// Initialize Site: Call setup functions & code                     |
	//------------------------------------------------------------------|
	if (document.getElementById(targetId)) {
		// Run code if ID exists on page
	}

	//------------------------------------------------------------------|
	// Initialize Site: Plugins                                         |
	//------------------------------------------------------------------|
	if (document.getElementById(targetId)) {
		// Initialise Plugin if ID exists on page
	}

	//------------------------------------------------------------------|
	// Initialize Site: Event Listeners                                 |
	//------------------------------------------------------------------|

	var burger = document.getElementById("js-menu-toggle");

	burger.addEventListener('click', checkMobileNav);

	/* Check Mobile Open Status & add appropriate classes to open/close **/
	function checkMobileNav() {
		$('.l-header__nav').removeClass('js-remove');
		if ($('body').hasClass('is-menu-open')) {
			$('body').removeClass('is-menu-open');
			$('body').addClass('is-menu-closed');
		} else {
			$('body').removeClass('is-menu-closed');
			$('body').addClass('is-menu-open');
		}
	}

	var header = document.getElementById("js-header");

	window.onscroll = function () {
		Headerscroll()
	};

	function Headerscroll() {
		if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
			document.getElementById("js-header").className = "l-header is-scrolled";
		} else {
			document.getElementById("js-header").className = "l-header";
		}
	}


};

$(document).ready(function () {
	if (document.getElementById("slider")) {
		$('.l-slider').slick({
			dots: true,
			infinite: true,
			speed: 300,
			slidesToShow: 1
		});
	}

	// initializing select2 to advanced search select components
	$('#venue-search select').select2(
		{
			width: 'resolve',
			dropdownAutoWidth : true
		}
	);

	// Setting up select2 events
	$('.venue-filter, .restaurant-filter, .event-type-filter, .event-location-filter').on("select2:open", function() {
		$(".select2-search--dropdown .select2-search__field").attr("placeholder", "Type to filter");
	});
	$('.venue-filter, .restaurant-filter, .event-type-filter, .event-location-filter').on("select2:opening", function() {
		setTimeout(function(){
			$('.select2-dropdown').css("opacity", "1");
		}, 100);
	});

	$('.venue-filter, .restaurant-filter, .event-type-filter, .event-location-filter').on('select2:closing', function (e) {
		$('.select2-dropdown').css("opacity", "0");
	});
	$('.venue-filter, .restaurant-filter, .event-type-filter, .event-location-filter').on('select2:close', function (e) {
		$('.select2-dropdown').css("opacity", "");
	});

	// Search functionality

	$( ".venue-filter" ).change(function() {
		$(location).attr('href', $(this).val());
	});

	$( ".restaurant-filter" ).change(function() {
		$(location).attr('href', $(this).val());
	});

	$( ".event-type-filter" ).change(function() {
		var currentDomain = document.location.origin;
		if ($(this).val() !== '0') {
			$('.reset-filter.type').removeClass('hidden');

			if ($('.event-location-filter').val() !== '0') {
				$( ".filter-url" ).val(currentDomain + '/' + $(this).val() + '-in-' +  $('.event-location-filter').val())
			}  else {
				$( ".filter-url" ).val(currentDomain + '/venue-event/' + $(this).val());
			}
		} else {
			$('.reset-filter.type').addClass('hidden');
		}
	});

	$( ".event-location-filter" ).change(function() {
		var currentDomain = document.location.origin;
		if ($(this).val() !== '0') {
			$('.reset-filter.location').removeClass('hidden');

			if ($('.event-type-filter').val() !== '0') {
				$( ".filter-url" ).val(currentDomain + '/' + $('.event-type-filter').val() + '-in-' + $(this).val())
			}  else {
				$( ".filter-url" ).val(currentDomain + '/venue-location/' + $(this).val());
			}
		} else {
			$('.reset-filter.location').addClass('hidden');
		}
	});

	$( ".event-type-filter, .event-location-filter" ).change(function() {

		showVenues();
		handleSubmit(false);

		var location = $(".event-location-filter"),
			type = $(".event-type-filter");

		if (type.val() !== '0') {
			hideVenues();
			$('.event-type-filter, .event-location-filter').closest('div').removeClass('disabled');
		}
		if (location.val() !== '0') {
			hideVenues();
			$('.event-type-filter, .event-location-filter').closest('div').removeClass('disabled');
		}
	});

	function hideVenues() {
		$('.venue-filter, .event-type-filter, .restaurant-filter, .event-location-filter').closest('div').addClass('disabled');
		handleSubmit(true)
	}

	function showVenues() {
		$('.venue-filter, .event-type-filter, .restaurant-filter, .event-location-filter').closest('div').removeClass('disabled');
	}

	function handleSubmit(disabled) {
		if (disabled === true) {
			$('.search-button').removeClass('disabled');
		} else {
			$('.search-button').addClass('disabled');
		}
	}

	$( "#venue-search form" ).submit(function(e) {
		e.preventDefault();
		var $url = $( ".filter-url" ).val();
		$(location).attr('href',$url);
	});

	$( ".reset-filter.type" ).click(function(e) {
		e.preventDefault();
		$('.event-type-filter').val(0).trigger('change');
		$(this).addClass('hidden');
		console.log("Remove filter");
	});

	$( ".reset-filter.location" ).click(function(e) {
		e.preventDefault();
		$('.event-location-filter').val(0).trigger('change');
		$(this).addClass('hidden');
	});


});


// $(window).bind("load", function() {
//    $(".nav__container").css("display","flex");
// });
