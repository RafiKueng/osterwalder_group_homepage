/************************************************************************
 * INIT VARS
 ************************************************************************/

var navInitPos = $('nav').position().top;
var touch = Modernizr.touch;

/************************************************************************
 * FUNCTION DEFINITIONS
 ************************************************************************/

/*
 * This part alignes the sub menu items below the top menu entry
 * runs once at startup
 */
function alignSubMenus() {
  $('.menu.top > li').each(function(i){
    //console.log(this.id);
    var $this = $(this);
    var posl = $this.position().left;
    var $sm_element = $('#sm_'+this.id); 
    if($sm_element.length>0){
      //console.log('Y');
      var delta = 1*$sm_element.css('margin-left').slice(0,-2);
      $sm_element.css({"padding-left":posl-delta+"px"});
    }
  });
}



/************************************************************************
 * REGISTER EVENT HANDLERS
 ************************************************************************/

$( window ).resize(function() {
  alignSubMenus();
});


/***
 * menu animations
 */

// events of top menu

$('nav ul.top li')
  .mouseenter(function() {
    if (touch) {return;}
    //if ($(this).hasClass('active')) {return;}
    $("nav ul.sub").css("z-index", 5).hide();
    $('#sm_' + this.id)
      //.hide()
      .css("z-index", 9)
      .slideDown('fast');
  })
  /*
  .mouseleave(function(evt){
    if (touch) {return;}
    var e = event.toElement || event.relatedTarget;
    // break if childnode of the li
    if (e.parentNode == this || e == this) {return;}
    // don't do anything if this is active anyways    
    if ($(this).hasClass('active')) {return;}
    
    $('#sm_' + this.id).slideUp('fast');
  })*/
  ;


//correct handling if entering / leaving sub menu
/*
$('nav ul.sub')
  .mouseenter(function(){
    if (touch) {return;}
    $(this).stop(true).show();
  })*/
  
/*  .mouseleave(function(){
    if (touch) {return;}
    if ($(this).hasClass('active')) {return;}
    $(this).slideUp('fast');
  })*/
;

$('nav')
  .mouseleave(function(){
    if (touch) {return;}
    $("nav ul.sub.active").show();
    $("nav ul.sub").not('.active').slideUp('fast');
  })
;




/***
 * sticky menu bar (only on full scale view, width>960px)
 * while scrolling, menubar sticks at top
 */

$(window).scroll(function () {
  if ($(window).scrollTop() > navInitPos) {
    $('nav').addClass('fixed');
  }
  else {
    $('nav').removeClass('fixed');
  }
}
);




/************************************************************************
 * START UP FUNCTIONS
 ************************************************************************/
alignSubMenus();

