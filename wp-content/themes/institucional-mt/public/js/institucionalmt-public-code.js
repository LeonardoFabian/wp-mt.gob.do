jQuery(document).ready(function ($) {

    /*
    $(document).ready(function() {
        // grab the initial top offset of the navigation 
           var stickyNavTop = $('#site-main-navbar').offset().top;
           
           // our function that decides weather the navigation bar should have "fixed" css position or not.
           var stickyNav = function(){
            var scrollTop = $(window).scrollTop(); // our current vertical position from the top
                 
            // if we've scrolled more than the navigation, change its position to fixed to stick to top,
            // otherwise change it back to relative
            if (scrollTop > stickyNavTop) { 
                $('#site-main-navbar').addClass('sticky');
            } else {
                $('#site-main-navbar').removeClass('sticky'); 
            }
        };
      
        stickyNav();
        // and run it again every time you scroll
        $(window).scroll(function() {
          stickyNav();
        });
      
        
      });

      */

     var header = document.querySelector('#site-main-navbar');
     var origOffsetY = header.offsetTop;
     
     function onScroll(e) {
       window.scrollY >= origOffsetY ? header.classList.add('sticky') :
                                       header.classList.remove('sticky');
     }
     
     document.addEventListener('scroll', onScroll);
      

});



//console.log( typeof jQuery);