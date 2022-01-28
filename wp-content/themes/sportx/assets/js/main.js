$(document).ready(function () {
  $('#btnMobileMenu, #btnMobileMenuClose').click(function () {
    if ($('.mobileMenu').hasClass('hidden')) {
      $('.mobileMenu').removeClass('hidden');
      $('.mobileMenu').addClass('visible');
    } else {
      $('.mobileMenu').removeClass('visible');
      $('.mobileMenu').addClass('hidden');
    }
  });
  VanillaTilt.init(document.querySelectorAll('.flex-item'), {
    max: 25,
    speed: 400,
  });
});
