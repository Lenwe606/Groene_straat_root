jQuery(document).ready(function($) {
	
	
	  if (jQuery('nav').hasClass('mokka-sticky')) {	
		$(".mokka-sticky").sticky({ topSpacing: 0 });
	  }
	
	//////////////////////////////////////////////
	// Sidebar in Mobile View
	//////////////////////////////////////////////
	var sidebar = $('#pageslide');
	$('.mokka-main-menu').children().clone().removeClass('nav-sub-posts').removeAttr('id').removeAttr('class').appendTo($(sidebar));
	$('.mokka-secondary-menu, .sidebar-mobile').children().clone().removeClass('dropdown').removeAttr('id').removeAttr('class').appendTo($(sidebar));
	$(sidebar).children().nextUntil().wrap('<div class="block" />');
	
	//////////////////////////////////////////////
	// Main Menu
	//////////////////////////////////////////////
    $('.primary-nav li .nav-sub-menus').not($('.nav-sub-wrap .nav-sub-menus')).wrap('<div class="fave" />');
    $('.primary-nav li .nav-sub-wrap .fave').each(function(index, element) {
        if ($(element).children().length === 1) {
            if ($(element).children().attr('class') == 'nav-sub-menus') {
                $(element).parents('li').addClass('simple-nav-offset');
                $(element).parent().addClass('simple-nav').removeClass('container');
                $(element).removeClass('row');
            } else {
                $(element).addClass('fave-full');
            }
        }

        if ($(element).children().length === 0) {
            $(element).parent().remove();
        }

        if ($(element).children().length === 2) {
            $(element).find('.nav-sub-posts').addClass('col-sm-9');
            $(element).find('.nav-sub-posts .col-sm-3:last-child').remove();
            $(element).find('.nav-sub-posts .col-sm-3').addClass('col-sm-4').removeClass('col-sm-3');
            $(element).find('.nav-sub-menus').addClass('col-sm-3').insertBefore($(element).find('.nav-sub-posts'));
            $(element).find('.nav-sub-menus:not(:first-child)').remove();
        }
    });

    $('.nav-sub-menus > ul > li > .nav-sub-menus').each(function(index, element) {
        $(element).wrap('<div class="nav-sub-wrap simple-nav" />');
        $(element).wrap('<div class="fave" />');
    });

    $('.primary-nav li').each(function(index, element) {
        var sub_simple_i = 'fa fa-angle-right';
        if ($(element).children('.nav-sub-wrap').length > 0) {
            if ($(element).parent().parent().hasClass('primary-nav')) {
                sub_simple_i = 'fa fa-angle-down';
            } else {
                sub_simple_i = 'fa fa-angle-right';
            }
            $(element).children('a').append('<span class="sub-simple-nav"> <i class="' + sub_simple_i + '"></i> </span>');
        }
    });

    $('.primary-nav li').mouseenter(function() {
        $(this).find('> .nav-sub-wrap').addClass("nav-sub-wrap-open").show().animate({opacity: 1}, 130);
        $('.primary-nav li').addClass("dropdown");
    }).mouseleave(function() {
        $(this).find('> .nav-sub-wrap').removeClass("nav-sub-wrap-open").animate({opacity: 0}, 130).hide();
         $('.primary-nav li').removeClass("dropdown");
    });
	
	
	
	//////////////////////////////////////////////
	//Fluid Width Video
	//////////////////////////////////////////////
	if ( $().fitVids ){
		$('.video-wrapper').fitVids();
		$('.entry-content').fitVids();
		$('.post-content .entry').fitVids();
	}
	
	
	//////////////////////////////////////////////
	// WP Native Gallery
	//////////////////////////////////////////////
	$('.custom-gallery .gallery-item a').iLightBox({
		skin: 'dark',
		path: 'horizontal',
		fullViewPort: 'fill',
		infinite: false,
		styles: {
			nextOffsetX: 75,
			nextOpacity: .55,
			prevOffsetX: 75,
			prevOpacity: .55
		},
		thumbnails: {
			normalOpacity: .6,
			activeOpacity: 1
		}
	});
	
	//////////////////////////////////////////////
	// Grid Gallery
	//////////////////////////////////////////////
	$('.mokka-ilightbox').iLightBox({
		skin: 'dark',
		path: 'horizontal',
		fullViewPort: 'fill',
		infinite: false,
		styles: {
			nextOffsetX: 75,
			nextOpacity: .55,
			prevOffsetX: 75,
			prevOpacity: .55
		},
		thumbnails: {
			normalOpacity: .6,
			activeOpacity: 1
		}
	});
	
	//////////////////////////////////////////////
	// carousel Gallery
	//////////////////////////////////////////////
	$('.mokka-carousel-ilightbox').iLightBox({
		skin: 'dark',
		path: 'horizontal',
		fullViewPort: 'fill',
		infinite: false,
		styles: {
			nextOffsetX: 75,
			nextOpacity: .55,
			prevOffsetX: 75,
			prevOpacity: .55
		},
		thumbnails: {
			normalOpacity: .6,
			activeOpacity: 1
		}
	});

	//////////////////////////////////////////////
	// Masonry
	//////////////////////////////////////////////
    var $container = $('.masonry-row');
      $container.imagesLoaded(function(){
	   $container.masonry({
		  itemSelector: '.post-holder'
	  });
    });  

	//////////////////////////////////////////////
	// Detect full screenvideo
	//////////////////////////////////////////////      
	$(document).on('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
	    $(".primary-nav").toggleClass("primary-nav-fullScreenModeOn");
	});
	
});	