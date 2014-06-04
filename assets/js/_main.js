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
            if (felcsoki++ >= 0 ) {
              lecsoki=0;
              $('.fixedhead').addClass('show');
            }
            }
        else
            {
            //console.log('Lefele');
            if (lecsoki++ > 2 ) {
              felcsoki=0;
              $('.fixedhead').removeClass('show');
            }
            }
    }
);

//*********** Smooth scroll *************
$(function() {
  $('a[href*=#]:not([href=#]):not([data-toggle=collapse])').click(function() {
    
       if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top - ($('body').attr('data-offset') - 1 )
          }, 1000);
          //return false;
          return true;

      }
      }

  
  });
});

var resizeHero = function() {
  if ( ($(window).height() > 700) && ($(window).width() >= 768) ) {
    $('.fullscreen').height( $(window).height() - ( $('.banner').height()  ) );
    $('.contact-body').height( $(window).height() - 100  );
    if ($(window).width() >= 1024) {
      $('.subsec-sidebar').height( $(window).height()  );
    } else {
      $('.subsec-sidebar').height( 'auto' );
    }
  } else {
    
  }
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
    var top = $('.subsec-sidebar').offset().top - parseFloat($('.subsec-sidebar').css('marginTop').replace(/auto/, 0));
    $(window).scroll(function (event) {
      var y = $(this).scrollTop();
      if (y >= top) {
        $('.subsec-sidebar').addClass('fixed');
      } else {
        $('.subsec-sidebar').removeClass('fixed');
      }
    });
  }
  /************* End of fixing ***********/

  /************* Main header Fixing ***********/
  var htop = $('.banner').offset().top - parseFloat($('.banner').css('marginTop').replace(/auto/, 0));
  $(window).scroll(function (event) {
    var y = $(this).scrollTop();
    if (y-69 >= htop) {
      $('.banner').addClass('fixedhead');
    } else {
      $('.banner').removeClass('fixedhead');
    }
    //$('body').attr('data-offset' ,  $('.banner').height() );
  });
  /************* End of fixing ***********/
  
  resizeHero();
 

});
