$(function() {
    $('.scroll-down').click (function() {
      $('html, body').animate({scrollTop: $('section.menu2').offset().top }, 'slow');
      return false;
    });
  });

  