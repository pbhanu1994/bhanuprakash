<?php
/**
 * Atout functions
 * 
 * @package Atout
 * @author Frenchtastic.eu
 */

if ( ! function_exists( 'atout_setup' ) ) :

function atout_setup(){

	/*
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 789; /* pixels */
	}

	// Translation ready
	load_theme_textdomain( 'atout', get_template_directory() . '/languages' );

	// RSS feed links support
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Setup the WordPress core custom background feature.
	$cb_args = array(
	'default-color' => 'F6F6F6',
	);
	add_theme_support( 'custom-background', $cb_args );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1170, 460, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'atout' ),
		'top-menu' => __( 'Top menu', 'atout' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'audio', 'video', 'quote', 'link',
	) );
}
endif; // atout_setup
add_action( 'after_setup_theme', 'atout_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function atout_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'atout' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	));
	register_sidebar( array(
	    'name'          => __( 'Footer Widgets 1 (left)', 'atout' ),
	    'id'            => 'footer-1',
	    'description'   => __( 'Widgets will appear in the footer area. To hide widgetized area in the footer simply remove all widgets from Footer 1, 2 and 3', 'atout' ),
	    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	    'after_widget'  => '</aside>',
	    'before_title'  => '<h1 class="widget-title">',
	    'after_title'   => '</h1>',
    ));
  	register_sidebar( array(
	    'name'          => __( 'Footer Widgets 2 (center)', 'atout' ),
	    'id'            => 'footer-2',
	    'description'   => __( 'Widgets will appear in the footer area. To hide widgetized area in the footer simply remove all widgets from Footer 1, 2 and 3', 'atout' ),
	    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	    'after_widget'  => '</aside>',
	    'before_title'  => '<h1 class="widget-title">',
	    'after_title'   => '</h1>',
    ));
  	register_sidebar( array(
	    'name'          => __( 'Footer Widgets 3 (right)', 'atout' ),
	    'id'            => 'footer-3',
	    'description'   => __( 'Widgets will appear in the footer area. To hide widgetized area in the footer simply remove all widgets from Footer 1, 2 and 3', 'atout' ),
	    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	    'after_widget'  => '</aside>',
	    'before_title'  => '<h1 class="widget-title">',
	    'after_title'   => '</h1>',
    ));
}
add_action( 'widgets_init', 'atout_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function atout_scripts() {

	wp_enqueue_style( 'atout-bootstrap', get_template_directory_uri() . '/framework/stylesheets/bootstrap.css' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/framework/stylesheets/font-awesome.min.css' );
	wp_enqueue_style( 'atout-style', get_template_directory_uri() . '/framework/stylesheets/style.css' );
	wp_enqueue_style( 'atout-prism', get_template_directory_uri() . '/framework/stylesheets/prism.css' );

	wp_enqueue_script( 'atout-bootstrap-js', get_template_directory_uri() . '/framework/js/bootstrap.min.js', array('jquery'), '8eb52b2e962280817af7', true );
	wp_enqueue_script( 'atout-fitvids', get_template_directory_uri() . '/framework/js/jquery.fitvids.min.js', array('jquery') );
	wp_enqueue_script( 'atout-prism-js', get_template_directory_uri() . '/framework/js/prism.min.js', array('jquery') );
	wp_enqueue_script( 'atout-skip-link-focus-fix', get_template_directory_uri() . '/framework/js/skip-link-focus-fix.js', array('jquery'), '20130115', true );
	wp_enqueue_script( 'atout-js', get_template_directory_uri() . '/framework/js/atout-script.js', array('jquery'));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'atout_scripts' );

/**
 * Load admin CSS
 */
function atout_admin_styles() {
	wp_enqueue_style('atout_admin_css', get_template_directory_uri() .'/framework/stylesheets/admin.css');
}
add_action('admin_enqueue_scripts', 'atout_admin_styles');

/**
* Add editor styles
*
* @since Atout 1.0
*/
function atout_editor_styles() {
    add_editor_style( 'framework/stylesheets/editor-style.css' );
}
add_action( 'after_setup_theme', 'atout_editor_styles' );

/**
* Replaces [...] by ... in post excerpt
* @since Atout 1.0
*/
function atout_trim_excerpt( $more ) {       
     return ' ...';
}
add_filter('excerpt_more', 'atout_trim_excerpt');

/**
 * Change the excerpt length
 */
function atout_excerpt_length( $length ) {
	
	$excerpt = get_theme_mod('excerpt_lenght', '55');
	return $excerpt;

}
add_filter( 'excerpt_length', 'atout_excerpt_length', 999 );

/**
* Backwards compatibility for wp_title
*
* @since Atout 1.0
*/
if ( ! function_exists( '_wp_render_title_tag' ) ) :
function atout_render_title() {
	?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php
}
add_action( 'wp_head', 'atout_render_title' );
endif;

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/framework/template-tags.php';
require get_template_directory() . '/framework/comment-walker.php';
require get_template_directory() . '/framework/customizer/customizer.php';
require get_template_directory() . '/framework/customizer/header.php';
require get_template_directory() . '/framework/customizer/customizer-sanitize.php';
require get_template_directory() . '/framework/wp_bootstrap_navwalker.php';