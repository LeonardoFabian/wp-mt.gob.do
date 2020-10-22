$(document).ready(function () {

    
    $('#site-main-navbar div .navbar-toggler-button').on('click', function () {  
      $('#site-main-navbar div  .navbar-toggler-animated-icon').toggleClass('open');
    });
  });

  // execute when the user scrolls the page
  window.onscroll = function(){ fixedOnScroll() };

  // Get the navbar
  let navbar = document.getElementById();

  // Get the offset position of the navbar
  let fixed = header.offsetTop;

  // Add fixedOnScroll class to the navbar when reach its scroll position. 
  // Remove "fixedOnScroll" when leave the scroll position
  function fixedOnScroll(){
    if( window.pageYOffset > fixed ){
      navbar.classList.add( "fixedOnScroll" );
    } else {
      header.classList.remove( "fixedOnScroll" );
    }
  }