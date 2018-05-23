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

	 var cookieBar = document.getElementById("cookie-law-info-bar");

	$(cookieBar).delay(1000).animate({'bottom': '0'}, 2000);
	

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

	

});

