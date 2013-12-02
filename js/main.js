
$(window).scroll(function () {
  if ($(window).scrollTop() > 312) {
    $('nav').addClass('fixed');
  }
  else {
    $('nav').removeClass('fixed');
  }
}
);