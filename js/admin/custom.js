(function ($) {
    "use strict";

    // Activate Feather icons
    $(function () {
        var speed = 800;
        "use strict";
        $(".preLoader").fadeOut(speed)
    });

    function myFunction() {
        var speed = 800;
        "use strict";
        $(".preLoader").fadeOut(speed)
    }


    feather.replace();

    // Active Sidebar
    $("#sidebarToggleTop").on('click', function (e) {
        $("body").toggleClass("sidenav-toggled");
        $(".sidebar").toggleClass("toggled");
    });



    // Scroll to top button appear
    $(document).on('scroll', function () {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function (e) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        e.preventDefault();
    });
    // settings

    // settings


})(jQuery);
$(document).ready(function () {
    /*
    AOS.init({
        disable: 'mobile'
    });
    */
});

$(function () {
    "use strict";
   $(".rightToggle").click(function () {
        $(".rightSidebar").slideDown(70), $(".rightSidebar").toggleClass("openRightSide2")
    });
   
});