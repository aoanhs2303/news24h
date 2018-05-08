$(function(){
   	
   	'use strict';
     // scroll to top
    $("#toTop").scrollToTop();

    // loader
    $('#fakeLoader').fakeLoader({
      
      zIndex: 999,
      spinner: "spinner4",
      bgColor: "#ec644b"

    });

    // work filter container
    $('.filtr-container').filterizr();

    // work filter
    $('.simplefilter li').click(function() {
        $('.simplefilter li').removeClass('active');
        $(this).addClass('active');
    });

    // slider
    $("#slider-home").owlCarousel({

        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true

    });
    
});