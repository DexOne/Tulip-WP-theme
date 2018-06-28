/*global console, $ */
$(function() {
   'use strict';
    $('.tulip-navbar li a').click(function(e) {
       e.preventDefault();
        $('html, body').animate({
            scrollTop: $('#' + $(this).data('scroll')).offset().top
        },1000)
    });
});

  // Add Class With Scroll
    $(window).scroll(function () {
        if ($('.navbar-nav').offset().top >= $(window).innerHeight() / 4) {
            $('.navbar-nav').addClass('bg-dark');
        } else {
            $('.navbar-nav').removeClass('bg-dark');
        }
    });