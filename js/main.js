
navInitPos = $('nav').position().top;

$(window).scroll(function () {
  if ($(window).scrollTop() > navInitPos) {
  //if ($(window).scrollTop() > $('nav').position().top) {
    $('nav').addClass('fixed');
  }
  else {
    $('nav').removeClass('fixed');
  }
}
);

$('nav li')
  .mouseenter(function() {
    console.log(this.id);
    //var e = event.toElement || event.relatedTarget;
    // break if childnode of the li
    //if (e.parentNode == this || e == this) {return;}

    if ($(this).hasClass('active')) {return;}

  	$('#sm_' + this.id)
  	  .hide()
  	  .css("z-index", 9)
  	  //.removeClass('hidden')
  	  .slideDown('fast');
  })
  
  .mouseleave(function(evt){
    var e = event.toElement || event.relatedTarget;
    
    // break if childnode of the li
    if (e.parentNode == this || e == this) {return;}
    
    // don't do anything if this is active anyways    
    if ($(this).hasClass('active')) {return;}
    
    $('#sm_' + this.id).slideUp('fast');
  })
  ;

$('nav ul.sub')
  .mouseenter(function(){
    $(this).stop(true).show();
  })
  
  .mouseleave(function(){
    if ($(this).hasClass('active')) {return;}
    $(this).slideUp('fast');
  })
  ;
