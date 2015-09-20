<?php
global $convac_lite_themename;
global $convac_lite_shortname;

if ( !class_exists( 'OT_Loader' )){	
	//THEME SHORTNAME	
	$convac_lite_shortname = 'convac-lite';	
	$convac_lite_themename = 'Convac';	
	define('CONVAC_LITE_ADMIN_MENU_NAME','Convac');
}
 

/***************** EXCERPT LENGTH ************/
function convac_lite_excerpt_length($length) {
	return 40;
}
add_filter('excerpt_length', 'convac_lite_excerpt_length');

/***************** READ MORE ****************/
function convac_lite_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'convac_lite_excerpt_more');

/************* CUSTOM PAGE TITLE ************/
add_filter( 'wp_title', 'convac_lite_title' );
function convac_lite_title($title)
{
	$convac_lite_title = $title;
	if ( is_home() && !is_front_page() ) {
		$convac_lite_title .= get_bloginfo('name');
	}
	if ( is_front_page() ){
		$convac_lite_title .=  get_bloginfo('name');
		$convac_lite_title .= ' | '; 
		$convac_lite_title .= get_bloginfo('description');
	}
	if ( is_search() ) {
		$convac_lite_title .=  get_bloginfo('name');
	}
	if ( is_author() ) { 
		global $wp_query;
		$curauth = $wp_query->get_queried_object();	
		$convac_lite_title .= __('Author: ','convac-lite');
		$convac_lite_title .= $curauth->display_name;
		$convac_lite_title .= ' | ';
		$convac_lite_title .= get_bloginfo('name');
	}
	if ( is_single() ) {
		$convac_lite_title .= get_bloginfo('name');
	}
	if ( is_page() && !is_front_page() ) {
		$convac_lite_title .= get_bloginfo('name');
	}
	if ( is_category() ) {
		$convac_lite_title .= get_bloginfo('name');
	}
	if ( is_year() ) { 
		$convac_lite_title .= get_bloginfo('name');
	}
	if ( is_month() ) {
		$convac_lite_title .= get_bloginfo('name');
	}
	if ( is_day() ) {
		$convac_lite_title .= get_bloginfo('name');
	}
	if (function_exists('is_tag')) { 
		if ( is_tag() ) {
			$convac_lite_title .= get_bloginfo('name');
		}
		if ( is_404() ) {
			$convac_lite_title .= get_bloginfo('name');
		}					
	}
	return $convac_lite_title;
}

/********************************************
 PAGINATION
*********************************************
* Retrieve or display pagination code.
*
* The defaults for overwriting are:
* 'page' - Default is null (int). The current page. This function will
*      automatically determine the value.
* 'pages' - Default is null (int). The total number of pages. This function will
*      automatically determine the value.
* 'range' - Default is 3 (int). The number of page links to show before and after
*      the current page.
* 'gap' - Default is 3 (int). The minimum number of pages before a gap is 
*      replaced with ellipses (...).
* 'anchor' - Default is 1 (int). The number of links to always show at begining
*      and end of pagination
* 'before' - Default is '<div class="emm-paginate">' (string). The html or text 
*      to add before the pagination links.
* 'after' - Default is '</div>' (string). The html or text to add after the
*      pagination links.
* 'title' - Default is '__('Pages:', 'convac-lite')' (string). The text to display before the
*      pagination links.
* 'next_page' - Default is '__('&raquo;', 'convac-lite')' (string). The text to use for the 
*      next page link.
* 'previous_page' - Default is '__('&laquo', 'convac-lite')' (string). The text to use for the 
*      previous page link.
* 'echo' - Default is 1 (int). To return the code instead of echo'ing, set this
*      to 0 (zero).
*
*
* @param array|string $args Optional. Override default arguments.
* @return string HTML content, if not displaying.
*  
* Usage:
* 
* <?php if (function_exists("convac_lite_paginate")) { convac_lite_paginate(); } ?>
* 
*/

function convac_lite_paginate($args = null) {

    global $convac_lite_themename, $convac_lite_shortname;

    $defaults = array(
        'page'   => null, 
		'pages'  => null, 
        'range'  => 3, 
		'gap'    => 3, 
		'anchor' => 1,
        'before' => '<div id="'.$convac_lite_shortname.'-paginate">', 
		'after'  => '<div class="clear"></div></div>',
        'title'  => __('', 'convac-lite'),
        'nextpage' => __('<i class="fa fa-angle-right"></i>', 'convac-lite'), 
		'previouspage' => __('<i class="fa fa-angle-left"></i>', 'convac-lite'),
        'echo' => 1
    );
	
    $r = wp_parse_args($args, $defaults);
    extract($r, EXTR_SKIP);
    if (!$page && !$pages) {
        global $wp_query;
        $page = get_query_var('paged');
        $page = !empty($page) ? intval($page) : 1;
        $posts_per_page = intval(get_query_var('posts_per_page'));
        $pages = intval(ceil($wp_query->found_posts / $posts_per_page));
    }

    $output = "";

    if ($pages > 1) {    
        $output .= "$before<span class='$convac_lite_shortname-title'>$title</span>";
        $ellipsis = "<span class='$convac_lite_shortname-gap'>...</span>";
        if ($page > 1 && !empty($previouspage)) {
            $output .= "<a href='" . get_pagenum_link($page - 1) . "' class='$convac_lite_shortname-prev'>$previouspage</a>";
        }

        $min_links = $range * 2 + 1;
        $block_min = min($page - $range, $pages - $min_links);
        $block_high = max($page + $range, $min_links);
        $left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
        $right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;

        if ($left_gap && !$right_gap) {
            $output .= sprintf('%s%s%s', 
                convac_lite_paginate_loop(1, $anchor), 
                $ellipsis, 
                convac_lite_paginate_loop($block_min, $pages, $page)
            );
        }
        else if ($left_gap && $right_gap) {
            $output .= sprintf('%s%s%s%s%s', 
                convac_lite_paginate_loop(1, $anchor), 
                $ellipsis, 
                convac_lite_paginate_loop($block_min, $block_high, $page), 
                $ellipsis, 
                convac_lite_paginate_loop(($pages - $anchor + 1), $pages)
            );
        }
        else if ($right_gap && !$left_gap) {
            $output .= sprintf('%s%s%s', 
                convac_lite_paginate_loop(1, $block_high, $page),
                $ellipsis,
                convac_lite_paginate_loop(($pages - $anchor + 1), $pages)
            );
        }
        else {
            $output .= convac_lite_paginate_loop(1, $pages, $page);
        }
        if ($page < $pages && !empty($nextpage)) {
            $output .= "<a href='" . get_pagenum_link($page + 1) . "' class='$convac_lite_shortname-next'>$nextpage</a>";
        }
        $output .= $after;
    }
    if ($echo) {
        echo $output;
    }
    return $output;
}

/**
 * Helper function for pagination which builds the page links.
 *
 * @access private
 *
 * @param int $start The first link page.
 * @param int $max The last link page.
 * @return int $page Optional, default is 0. The current page.
 */

function convac_lite_paginate_loop($start, $max, $page = 0) {
    global $convac_lite_themename, $convac_lite_shortname;
    $output = "";
    for ($i = $start; $i <= $max; $i++) {
        $output .= ($page === intval($i)) 
		? "<span class='$convac_lite_shortname-page $convac_lite_shortname-current'>$i</span>" 
		: "<a href='" . get_pagenum_link($i) . "' class='$convac_lite_shortname-page'>$i</a>";
    }
    return $output;
}

/**
 * SETS UP THE CONTENT WIDTH VALUE BASED ON THE THEME'S DESIGN.
 */
if ( ! isset( $content_width ) ){
    $content_width = 900;
}

/*********************************************
 LIMIT WORDS
*********************************************/

function convac_lite_slider_limit_words($string, $word_limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));
}

/********************************************************
	#DEFINE REQUIRED CONSTANTS HERE# &
	#OPTIONAL: SET 'OT_SHOW_PAGES' FILTER TO FALSE#.
	#THIS WILL HIDE THE SETTINGS & DOCUMENTATION PAGES.#
*********************************************************/

//CHECK AND FOUND OUT THE THEME VERSION AND ITS BASE NAME

if(function_exists('wp_get_theme')){
    $convac_lite_theme_data = wp_get_theme(get_option('template'));
    $convac_lite_theme_version = $convac_lite_theme_data->Version;  
} 

define( 'CONVAC_LITE_OPTS_FRAMEWORK_DIRECTORY_URI', trailingslashit(get_template_directory_uri() . '/SketchBoard/includes/') );	
define( 'CONVAC_LITE_OPTS_FRAMEWORK_DIRECTORY_PATH', trailingslashit(get_template_directory() . '/SketchBoard/includes/') );
define( 'CONVAC_LITE_THEME_VERSION',$convac_lite_theme_version);	
	
add_filter( 'ot_show_pages', '__return_false' );

// REQUIRED: SET 'OT_THEME_MODE' FILTER TO TRUE.
add_filter( 'ot_theme_mode', '__return_true' );

// DISABLE ADD NEW LAYOUT SECTION FROM OPTIONS PAGE.
add_filter( 'ot_show_new_layout', '__return_false' );

// REQUIRED: INCLUDE OPTIONTREE.
require_once get_template_directory() . '/SketchBoard/includes/ot-loader.php';

// THEME OPTIONS
require_once get_template_directory() . '/SketchBoard/includes/options/theme-options.php';


/********************************************
	GET THEME OPTIONS VALUE FUNCTION
*********************************************/
function convac_lite_get_option( $option_id, $default = '' ){
	return ot_get_option( $option_id, $default = '' );
}

