jQuery(document).ready(function ($) {

    $('#site-main-navbar div .navbar-toggler-button').on('click', function () {  
      $('#site-main-navbar div  .navbar-toggler-animated-icon').toggleClass('open');
    });  


    /********************************
    ScrollMagic
    *********************************/

    const CONTROLLER = new ScrollMagic.Controller();
    

    var service = new TimelineMax({ onUpdate: updateService });
    const $service_item = document.querySelectorAll(`#_themename-front-page-portfolio-section .card`);
    
    service.from($service_item[0], 1, {x:-100, opacity: 0 }, "=-1");
    service.from($service_item[1], 1, {y:100, opacity: 0 }, "=-1" );
    service.from($service_item[2], 1, {x:100, opacity: 0 }, "=-1");

    const SERVICE_SECTION_SCENE = new ScrollMagic.Scene({
        triggerElement: ".service-scene",
        triggerHook: "onCenter",
        duration: "5%"
    })
    .setPin(".service-scene")
    .setTween(service)
    .addTo(CONTROLLER);

    function updateService(){
        service.progress();
        console.log( service.progress() );
    }

    // mobile section animation
    //const CONTROLLER = new ScrollMagic.Controller();
    var timeline = new TimelineMax({ onUpdate: updatePercentage });

    timeline.from("#mobile-img1", 1, { y:-100, opacity: 0 }, "=-1");
    timeline.from("#mobile-img2", 1, { x:100, opacity: 0, rotation: 360 }, "=-1");
    timeline.from("#mobile-img3", 1, { y:100, opacity: 0 }, "=-1");
    timeline.from(".mobile-description div", 2, { y:-100, opacity: 0 });
    timeline.from("#mobile-img-hero", .5, { x:-100, opacity: 0 });    

    const MOBILE_SECTION_SCENE = new ScrollMagic.Scene({
        triggerElement: ".mobile-scene",
        triggerHook: "onLeave", // onEnter, onLeave, onCenter
        duration: "20%"
    })
    .setPin(".mobile-scene")
    .setTween(timeline)
    .addTo(CONTROLLER);  

    function updatePercentage(){
        timeline.progress();
        console.log( timeline.progress() );
    }


/********************************
    Carousel
*********************************/

    
    $('#bannerCarousel').on('slide.bs.carousel', function (e) {

  
      var $e = $(e.relatedTarget);
      var idx = $e.index();
      var itemsPerSlide = 3;
      var totalItems = $('.banner-item').length;
      
      if (idx >= totalItems-(itemsPerSlide-1)) {
          var it = itemsPerSlide - (totalItems - idx);
          for (var i=0; i<it; i++) {
              // append slides to end
              if (e.direction=="left") {
                  $('.banner-item').eq(i).appendTo('.banner-carousel-inner');
              }
              else {
                  $('.banner-item').eq(0).appendTo('.banner-carousel-inner');
              }
          }
      }
  });

});



