/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	// Update the site title in real time...
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( 'a.navbar-brand' ).html( newval );
		} );
	} );
	
	// Update the site description in real time...
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).html( newval );
		} );
	} );

	// Update the site description in real time...
	wp.customize( 'footer_copyright', function( value ) {
		value.bind( function( newval ) {
			$( '.footer-copy b' ).html( newval );
		} );
	} );

	// Update site title color in real time...
	wp.customize( 'navbar_namecolor', function( value ) {
		value.bind( function( newval ) {
			$('.navbar-default .navbar-brand').css('color', newval );
		} );
	} );

	// Update primary color in real time...
	wp.customize( 'primary_color', function( value ) {
		value.bind( function( newval ) {
			$('.btn-primary').css('background-color', newval );
			$('.btn-primary').css('border-color', newval );
			$('a').css('border-color', newval );
			$('.entry-date').css('color', newval );
			$('.post-meta .author a').css('color', newval );
		} );
	} );

	// Update site background color...
	wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background-color', newval );
		} );
	} );

	// Update site font in real time...
	wp.customize( 'body_font', function( value ) {
		value.bind( function( newval ) {
			$('body').css('font-family', newval );
		} );
	} );

	//Update site font in real time...
	wp.customize( 'headings_font', function( value ) {
		value.bind( function( newval ) {
			$('h1 a, .h1 a, h2 a, .h2 a, h3 a, .h3 a, h4 a, .h4 a, h5 a, .h5 a, h6 a, .h6 a, h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6').css('font-family', newval );
		} );
	} );

	//Update site font in real time...
	wp.customize( 'uppercase_headings', function( value ) {
		value.bind( function( newval ) {
			$('h1 a, .h1 a, h2 a, .h2 a, h3 a, .h3 a, h4 a, .h4 a, h5 a, .h5 a, h6 a, .h6 a, h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6').css('text-transform', newval );
		} );
	} );

	//Update site font in real time...
	wp.customize( 'spacing_headings', function( value ) {
		value.bind( function( newval ) {
			$('h1 a, .h1 a, h2 a, .h2 a, h3 a, .h3 a, h4 a, .h4 a, h5 a, .h5 a, h6 a, .h6 a, h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6').css('letter-spacing', newval );
		} );
	} );

	// Update body font size in real time...
	wp.customize( 'body_font_size', function( value ) {
		value.bind( function( newval ) {
			$('body').css('font-size', newval );
		} );
	} );
	
} )( jQuery );
