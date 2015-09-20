<?php

/**
* Sanitize customizer options
*
* @author Frenchtastic.eu
* @since Atout 1.0
*/

/**
* Sanitize admin email
*
* @since Atout 1.0
*
* @param string $input
*/
function atout_sanitize_admin_email( $input ){
    if( is_email($input) ){
      return $input;
    } else {
      return get_bloginfo('admin_email', 'raw');
    }
}

// -----------------------------------------------------------------------------

/**
* Sanitize thumbnail link
*
* @since Atout 1.0
*
* @param string $font_size font_size type.
* @return string Filtered font_size type (11px|12px|13px|14px|15px|16px|17px|18px).
*/
function atout_sanitize_body_font_size( $font_size ) {
    if ( ! in_array( $font_size, array( '11px', '12px', '13px', '14px', '15px', '16px', '17px', '18px' ) ) ) {
        $font_size = '15px';
    }

    return $font_size;
}

// -----------------------------------------------------------------------------

/**
* Sanitize thumbnail link
*
* @since Atout 1.0
*
* @param string $thumbnail_link thumbnail_link type.
* @return string Filtered thumbnail_link type (yes|no).
*/
function atout_sanitize_thumbnail_link( $thumbnail_link ) {
    if ( ! in_array( $thumbnail_link, array( 'yes', 'no' ) ) ) {
        $thumbnail_link = 'yes';
    }

    return $thumbnail_link;
}

// -----------------------------------------------------------------------------

/**
* Sanitize blog content
*
* @since Atout 1.0
*
* @param string $content content type.
* @return string Filtered content type (content|excerpt).
*/
function atout_sanitize_content( $content ) {
    if ( ! in_array( $content, array( 'content', 'excerpt' ) ) ) {
        $content = 'excerpt';
    }

    return $content;
}

// -----------------------------------------------------------------------------

/**
* Sanitize layout options
*
* @since Atout 1.0
*
* @param string $layout Layout type.
* @return string Filtered layout type (left|full_width|right).
*/
function atout_sanitize_layout( $layout ) {
    if ( ! in_array( $layout, array( 'left', 'full_width', 'right' ) ) ) {
        $layout = 'right';
    }

    return $layout;
}

// -----------------------------------------------------------------------------

/**
* Sanitize 'uppercase headings' option
*
* @since Atout 1.0
*
* @param string $transform Transform type.
* @return string Filtered transform type (uppercase|none).
*/
function atout_sanitize_uppercase_headings( $transform ) {
    if ( ! in_array( $transform, array( 'uppercase', 'none' ) ) ) {
        $transform = 'none';
    }

    return $transform;
}

// -----------------------------------------------------------------------------

/**
* Sanitize navbar state
*
* @since Atout 1.0
*
* @param string $navbar_state Navbar spacing type.
* @return string Filtered navbar type (static|fixed).
*/
function atout_sanitize_navbar_state( $navbar_state ) {
    if ( ! in_array( $navbar_state, array( 'static', 'fixed' ) ) ) {
        $navbar_state = 'static';
    }

    return $navbar_state;
}

// -----------------------------------------------------------------------------

/**
* Sanitize navbar search
*
* @since Atout 1.0
*
* @param string $navbar_search Navbar spacing type.
* @return string Filtered navbar type (block|none).
*/
function atout_sanitize_display_block( $navbar_search ) {
    if ( ! in_array( $navbar_search, array( 'block', 'none' ) ) ) {
        $navbar_search = 'block';
    }

    return $navbar_search;
}

// -----------------------------------------------------------------------------

/**
* Sanitize navbar search
*
* @since Atout 1.0.4
*
* @param string $navbar_search Navbar spacing type.
* @return string Filtered navbar type (block|none).
*/
function atout_sanitize_display_none( $navbar_search ) {
    if ( ! in_array( $navbar_search, array( 'block', 'none' ) ) ) {
        $navbar_search = 'none';
    }

    return $navbar_search;
}

// -----------------------------------------------------------------------------

/**
* Sanitize topbar
*
* @since Atout 1.0
*
* @param string $topbar_show Navbar spacing type.
* @return string Filtered topbar view (none|block).
*/
function atout_sanitize_topbar( $topbar_show ) {
    if ( ! in_array( $topbar_show, array( 'none', 'block' ) ) ) {
        $topbar_show = 'none';
    }

    return $topbar_show;
}

// -----------------------------------------------------------------------------

/**
* Sanitize 'letter spacing headings' option
*
* @since Atout 1.0
*
* @param string $letter_spacing Letter spacing type.
* @return string Filtered letter spacing type (0.20em|0em).
*/
function atout_sanitize_spacing_headings( $letter_spacing ) {
    if ( ! in_array( $letter_spacing, array( '0.20em', '0em' ) ) ) {
        $letter_spacing = '0.20em';
    }

    return $letter_spacing;
}

// -----------------------------------------------------------------------------

/**
 * Sanitize Checkbox
 * 
 * @since Atout 1.0
 * @access public
 * @param mixed $input
 * @return int|bool
 */
function atout_sanitize_checkbox( $input ) {
    if ( $input ) {
    $output = '1';
    } else {
    $output = false;
    }
    return $output;
}

// -----------------------------------------------------------------------------

/**
* Sanitize site font
*
* @since Atout 1.0
*
* @param string $font font type.
* @return string Filtered font type (Helvetica Neue|Open Sans|Arial|Comic Sans MS|Times New Roman|Verdana|Fantasy|Monospace|Cursive|Serif|Courier|Monaco).
*/
function atout_sanitize_fontfamily( $font ) {
    if ( ! in_array( $font, array( 'Helvetica Neue', 'Open Sans', 'Arial', 'Comic Sans MS', 'Times New Roman', 'Verdana', 'Fantasy', 'Monospace', 'Cursive', 'Serif', 'Courier', 'Monaco' ) ) ) {
        $font = 'Helvetica Neue';
    }

    return $font;
}

/**
* Sanitize site font
*
* @since Atout 1.0
*
* @param string $font font type.
* @return string Filtered font type (Helvetica Neue|Open Sans|Arial|Comic Sans MS|Times New Roman|Verdana|Fantasy|Monospace|Cursive|Serif|Courier|Monaco).
*/
function atout_sanitize_body_fontfamily( $font ) {
    if ( ! in_array( $font, array( 'Helvetica Neue', 'Open Sans', 'Arial', 'Comic Sans MS', 'Times New Roman', 'Verdana', 'Fantasy', 'Monospace', 'Cursive', 'Serif', 'Courier', 'Monaco' ) ) ) {
        $font = 'Open Sans';
    }

    return $font;
}

// ---------------------------------------------------------------------------

//No sanitize - empty function for options that do not require sanitization
function atout_no_sanitize( $input ) {
}

// ---------------------------------------------------------------------------