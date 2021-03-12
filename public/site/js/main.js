(function ($) {
"use strict";

// preloader
function loader() {
	$('#ctn-preloader').addClass('loaded');
	$("#loading").fadeOut(500);
	// Una vez haya terminado el preloader aparezca el scroll

	if ($('#ctn-preloader').hasClass('loaded')) {
		// Es para que una vez que se haya ido el preloader se elimine toda la seccion preloader
		$('#preloader').delay(900).queue(function () {
			$(this).remove();
		});
	}
}

$(window).on('load', function () {
	loader();
	// wowanimation();
  // mainSlider();
  // counterOn()
});


// meanmenu



// sticky
$(window).on('scroll', function () {
	var scroll = $(window).scrollTop();
	if (scroll < 245) {
		$("#header-sticky").removeClass("sticky-menu");
	} else {
		$("#header-sticky").addClass("sticky-menu");
	}
});

$(function () {
	$('a.icon-scroll').on('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 80
        }, 1000);
        event.preventDefault();
    });
});


// testimonial-active





// active
$('.single-pricing').on('mouseenter', function () {
	$(this).addClass('active').parent().siblings().find('.single-pricing').removeClass('active');
})

// paroller
if ($('.paroller').length) {
	$('.paroller').paroller();
}




/* magnificPopup video view */


// counterUp
// function counterOn() {
//   $('.count').counterUp({
//     delay: 10,
//     time: 2000
//   });
// }



// isotop


//for menu active class
$('.portfolio-menu button').on('click', function(event) {
	$(this).siblings('.active').removeClass('active');
	$(this).addClass('active');
	event.preventDefault();
});


// aos-active


// scrollToTop
// $.scrollUp({
// 	scrollName: 'scrollUp',
// 	topDistance: '300',
// 	topSpeed: 500,
// 	animation: 'fade',
// 	animationInSpeed: 200,
// 	animationOutSpeed: 200,
// 	scrollText: '<i class="fas fa-level-up-alt"></i>',
// 	activeOverlay: false,
// });

// WOW active



})(jQuery);