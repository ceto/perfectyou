/*! responsive offcanva
 * http://jasonweaver.name/lab/offcanvas/
 */
var showMenu = function() {
  $('body').toggleClass("active-nav");
  $('.navtoggle').toggleClass("active-button"); 
}

// add/remove classes everytime the window resize event fires
jQuery(window).resize(function(){
  var off_canvas_nav_display = $('.off-canvas-navigation').css('display');
  var menu_button_display = $('.navtoggle').css('display');
  if (off_canvas_nav_display === 'block') {     
    $("body").removeClass("three-column").addClass("small-screen");       
  } 
  if (off_canvas_nav_display === 'none') {
    $("body").removeClass("active-sidebar active-nav small-screen")
      .addClass("three-column");      
  } 
  
}); 

jQuery(document).ready(function($) {
    // Toggle for nav menu
    $('.navtoggle').click(function(e) {
      e.preventDefault();
      showMenu();             
    }); 
});