
navInitPos = $('nav').position().top;

$(window).scroll(function () {
  if ($(window).scrollTop() > navInitPos) {
    $('nav').addClass('fixed');
  }
  else {
    $('nav').removeClass('fixed');
  }
}
);