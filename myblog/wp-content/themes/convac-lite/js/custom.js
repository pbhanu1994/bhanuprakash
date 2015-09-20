var $j = jQuery.noConflict();

/* ---------------------------------------------------- */
/*	MOBILE MENU 										*/
/* ---------------------------------------------------- */
jQuery(document).ready(function(){
	'use strict';
	jQuery('#menu-main').superfish();
});

(function( $ ) {
	'use strict';
	$.fn.sktmobilemenu = function( options ) { 
		var defaults = {
			'fwidth': 1025
		};
		//call in the default otions
		var options = $.extend(defaults, options);
		var obj = $(this);
		
		return this.each(function() {
			if($(window).width() < options.fwidth) {
				sktMobileRes();
			}
			
			$(window).resize(function() {
				if($(window).width() < options.fwidth) {
					sktMobileRes();
				}else{
					sktDeskRes();
				}
			});
			function sktMobileRes() {
				jQuery('#menu-main').superfish('destroy');
				obj.addClass('skt-mob-menu').hide();
				obj.parent().css('position','relative');
				if(obj.prev('.sktmenu-toggle').length === 0) {
					obj.before('<div class="sktmenu-toggle" id="responsive-nav-button"></div>');
				}
				obj.parent().find('.sktmenu-toggle').removeClass('active');
			}
			function sktDeskRes() {
				jQuery('#menu-main').superfish('init');
				obj.removeClass('skt-mob-menu').show();
				if(obj.prev('.sktmenu-toggle').length) {
					obj.prev('.sktmenu-toggle').remove();
				}
			}
			obj.parent().on('click','.sktmenu-toggle',function() {
				if(!$(this).hasClass('active')){
					$(this).addClass('active');
					$(this).next('ul').stop(true,true).slideDown();
				}
				else{
					$(this).removeClass('active');
					$(this).next('ul').stop(true,true).slideUp();
				}
			});
		});
	};
})( jQuery );

jQuery(window).load(function(){
	'use strict';
   jQuery('#menu-main.skt-mob-menu').on('click','li.menu-item-has-children,li.page_item_has_children',function() {
		if(jQuery(this).hasClass('active')){
			jQuery(this).removeClass('active');
			jQuery(this).next('ul:first').stop(true,true).slideUp();
		}
		else{
			jQuery(this).addClass('active');
			jQuery(this).next('ul:first').stop(true,true).slideDown();
		}
	});

});

jQuery(document).ready(function ($) {
	'use strict';
	document.getElementById('s') && document.getElementById('s').focus();
});

jQuery(window).load(function(){ 
	if(jQuery('#skenav .skt-mob-menu').length > 0){		
		jQuery('#skenav .skt-mob-menu').css('width',jQuery('.row-fluid').width());
	}
});


/* ---------------------------------------------------- */
/*	BACK TO TOP 										*/
/* ---------------------------------------------------- */
jQuery(document).ready( function() {
	'use strict';
	jQuery('#back-to-top,#backtop').hide();
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > 100) {
			jQuery('#back-to-top,#backtop').fadeIn();
		} else {
			jQuery('#back-to-top,#backtop').fadeOut();
		}
	});
	jQuery('#back-to-top,#backtop').click(function(){
		jQuery('html, body').animate({scrollTop:0}, 'slow');
	});
});





/* ---------------------------------------------------- */
/*	WAYPOINTS MAGIC										*/
/* ---------------------------------------------------- */
if ( typeof window['vc_waypoints'] !== 'function' ) {
	function vc_waypoints() {
		if (typeof jQuery.fn.waypoint !== 'undefined') {
			$j('.fade_in_hide').waypoint(function() {
				$j(this).addClass('skt_start_animation');
			}, { offset: '90%' });
			$j('.skt_animate_when_almost_visible').waypoint(function() {
				$j(this).addClass('skt_start_animation');
			}, { offset: '90%' });
		}
	}
}


jQuery(document).ready(function($) {
	'use strict';
	vc_waypoints();
	
	//SEARCH BOX
	jQuery('.search-strip, .hsearch .hsearch-close').on('click', function(){
		jQuery('.hsearch .row-fluid').fadeToggle( "fast", "linear" );
	});
	
}); 


/* ---------------------------------------------------- */
/*	PRETTYPHOTO								            */
/* ---------------------------------------------------- */
jQuery(document).ready(function ($) {
	'use strict';
	jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
		hook: 'data-rel',
		animation_speed:'normal',
		theme:'light_square',
		slideshow:3000,
		show_title:false,
		autoplay_slideshow: false,
		social_tools: false		
	});
	jQuery("a[rel^='prettyPhoto']").prettyPhoto({
		animation_speed:'normal',
		theme:'light_square',
		slideshow:3000,
		show_title:false,
		autoplay_slideshow: false,
		social_tools: false		
	});
});

//--------------------------------------------------------