/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages
    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.


//********** Scroll Direction Check *************//
var felcsoki=0;
var lecsoki=0;
var mousewheelevt = (/Firefox/i.test(navigator.userAgent)) ? "DOMMouseScroll" : "mousewheel"; //FF doesn't recognize mousewheel as of FF3.x
$(document).bind(mousewheelevt, function(e) {
        var evt = window.event || e; //equalize event object     
        evt = evt.originalEvent ? evt.originalEvent : evt; //convert to originalEvent if possible               
        var delta = evt.detail ? evt.detail*(-40) : evt.wheelDelta; //check for detail first, because it is used by Opera and FF
        if(delta > 0)
            {
            //console.log('Felfele');
            if (felcsoki++ >= 2 ) {
              lecsoki=0;
              $('.fixedhead').addClass('show');
              $('body').attr('data-offset','69');
            }
            }
        else
            {
            //console.log('Lefele');
            if (lecsoki++ > 2 ) {
              felcsoki=0;
              $('.fixedhead').removeClass('show');
              $('body').attr('data-offset','0');
            }
            }
    }
);

//*********** Smooth scroll *************
$(function() {
  $('a[href*=#]:not([href=#]):not([data-toggle=collapse]):not([data-toggle=tab])').click(function() {
    
       if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top - ($('body').attr('data-offset') - 1 )
          }, 1000);
          return false;
          //return true;

      }
      }

  
  });
});



var resizeHero = function() {

  if ($(window).width() >= 1024) {
    $('.subsec-sidebar').height( $(window).height()  );
  } else {
    $('.subsec-sidebar').removeClass('fixed');
    $('.subsec-sidebar').height( 'auto');
  }
  
  if ( ($(window).height() > 600) ) {

    $('.fullscreen .homeh-inner').css('margin-top', ( $(window).height() - $('.homeh-inner').height())/2 );
    $('.fullscreen .homeh-inner').css('margin-bottom', ($(window).height() - $('.homeh-inner').height())/2 - $('.illnavrow').height() - 18 );
    
    $('.home-hero').height($(window).height() - $('.callme').height());
    $('.treat-header').height($(window).height() - $('.callme').height());

    $('.contact-body').height( $(window).height());
  } else {

    $('.homeh-inner').css('margin-top','140px');
  }


  /***** Anim defaults *****/
  //$('.ah-inner').height($(window).height() );
  var contWidth=$('.ah-inner').width();
  var contHeight=$('.ah-inner').height();
  $('.fiatal').css('clip', 'rect(0px, ' + contWidth + 'px , ' + contHeight + 'px, '+ (0.5) * contWidth + 'px)');
  $('.oreg').css('clip', 'rect(0px, ' + (0.5) * contWidth + 'px , ' + contHeight + 'px, 0px)');

};

jQuery(window).resize(function(){
  resizeHero();
});


jQuery(document).ready(function($){

  /********* Gallery thumb zoom ***********/
  $('.gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    closeOnContentClick: false,
    closeBtnInside: false,
    mainClass: 'mfp-with-zoom mfp-img-mobile',
    image: {
      verticalFit: true,
      titleSrc: function(item) {
        return item.el.parent().find('.caption').text() + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
      }
    },
    gallery: {
      enabled: true
    },
    zoom: {
      enabled: true,
      duration: 300, // don't foget to change the duration also in CSS
      opener: function(element) {
        return element.find('img');
      }
    }
    
  });
  /******* Image zoom ******/

  $('figure a').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-with-zoom mfp-img-mobile',
    image: {
      verticalFit: true,
      titleSrc: function(item) {
        return item.el.parent().find('.caption').text() + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
      }
    },
    zoom: {
      enabled: true,
      duration: 300, // don't foget to change the duration also in CSS
      opener: function(element) {
        return element.find('img');
      }
    }
    
  });

  /************* Subsec sidebar Fixing ***********/
  if ( ($('.subsec-sidebar').length > 0)  && ($(window).width() >= 1024) ){
    $(window).scroll(function (event) {

      var topi = $('.subsections').offset().top;
      var bottomi =  $('.subsections').offset().top + $('.subsections').height() - $(window).height();
      
      var ypsz = $(this).scrollTop();
      if (ypsz >= topi ) {
        $('.subsec-sidebar').addClass('fixed');
      } else {
        $('.subsec-sidebar').removeClass('fixed');
      }
      if (ypsz >= bottomi ) {
        $('.subsec-sidebar').addClass('bottom');
      } else {
        $('.subsec-sidebar').removeClass('bottom');
      }
    });

  }
  /************* End of Subsec Sidebar Fixing ***********/
  
  /************* End of fixing ***********/

  /************* Main header Fixing ***********/
  var htop = $('.banner').offset().top - parseFloat($('.banner').css('marginTop').replace(/auto/, 0));
  $(window).scroll(function (event) {
    var y = $(this).scrollTop();
    if (y-3 >= htop) {
      $('.banner').addClass('fixedhead');
    } else {
      $('.banner').removeClass('fixedhead');
    }
    //$('body').attr('data-offset' ,  $('.banner').height() );
  });
  /************* End of fixing ***********/




  resizeHero();

});
