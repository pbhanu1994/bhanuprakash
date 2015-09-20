<?php
global $convac_lite_themename;
global $convac_lite_shortname;

/***********************************************
*  ENQUQUE CSS AND JAVASCRIPT
************************************************/
//ENQUEUE JQUERY 
function convac_lite_script_enqueqe() {
	global $convac_lite_shortname;
	if(!is_admin()) {
		wp_enqueue_script('convac_lite_componentssimple_slide', get_template_directory_uri() .'/js/custom.js',array('jquery'),'1.0',0 );
		wp_enqueue_script("comment-reply");
	}

}
add_action('init', 'convac_lite_script_enqueqe');


//ENQUEUE STYLE FOR IE BROWSER
function convac_lite_IE_enqueue_scripts() {
	global $is_IE;
	if($is_IE ) {
		if ( !is_admin() ) {
			wp_register_style( 'ie-style', get_template_directory_uri().'/css/ie-style.css', false, $theme->Version );
			wp_enqueue_style( 'ie-style' );
			wp_register_style( 'awesome-theme-stylesheet', get_template_directory_uri().'/css/font-awesome-ie7.css', false, $theme->Version );
			wp_enqueue_style( 'awesome-theme-stylesheet' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'convac_lite_IE_enqueue_scripts' );

//ENQUEUE FRONT SCRIPTS
function convac_lite_theme_stylesheet()
{
	global $convac_lite_themename;
	global $convac_lite_shortname;
	if ( !is_admin() ) 
	{
		$theme = wp_get_theme();
		wp_enqueue_script('hoverIntent');
		wp_enqueue_script('convac_lite_superfish', get_template_directory_uri().'/js/superfish.js',array('jquery'),true,'1.0');
		wp_enqueue_script('convac_lite_animatedHeader', get_template_directory_uri().'/js/cbpAnimatedHeader.js',array('jquery'),true,'1.0');
		wp_enqueue_script('convac_lite_easing_slide',get_template_directory_uri().'/js/jquery.easing.1.3.js',array('jquery'),'1.0',true);
		wp_enqueue_script('convac_lite_waypoints',get_template_directory_uri().'/js/waypoints.min.js',array('jquery'),'1.0',true );
		
		wp_enqueue_style('convac-style', get_stylesheet_uri());
		wp_enqueue_style('convac-animation-stylesheet', get_template_directory_uri().'/css/convac-animation.css', false, $theme->Version);
		wp_enqueue_style('convac-awesome-theme-stylesheet', get_template_directory_uri().'/css/font-awesome.css', false, $theme->Version);
		wp_enqueue_style('flexslider-theme-stylesheet', get_template_directory_uri().'/css/flexslider.css', false, $theme->Version);
		
		/*PRETTYPHOTO*/
		wp_enqueue_script('convac-prettyPhoto',get_template_directory_uri() .'/js/jquery.prettyPhoto.js',array('jquery'),true,'1.0');
		wp_enqueue_style('convac-prettyPhoto-style', get_template_directory_uri().'/css/prettyPhoto.css', false, $theme->Version);
		
		/*SUPERFISH*/
		wp_enqueue_style('convac-ddsmoothmenu-superfish-stylesheet', get_template_directory_uri().'/css/superfish.css', false, $theme->Version);
		wp_enqueue_style('bootstrap-responsive-theme-stylesheet', get_template_directory_uri().'/css/bootstrap-responsive.css', false, $theme->Version);
		
		/*GOOGLE FONTS*/
		wp_enqueue_style('googleFontsOpensans','//fonts.googleapis.com/css?family=Open+Sans:400,600', false, $theme->Version);

	}
}
add_action('wp_enqueue_scripts', 'convac_lite_theme_stylesheet');

function convac_lite_head() {
	global $convac_lite_shortname;
	$convac_lite_favicon = "";
	$convac_lite_meta = '<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">'."\n";

	if(convac_lite_get_option($convac_lite_shortname.'_favicon')) {
		$convac_lite_favicon = esc_url(convac_lite_get_option($convac_lite_shortname.'_favicon','convac-lite'));
		$convac_lite_meta .= "<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"$convac_lite_favicon\"/>\n";
	}
	echo $convac_lite_meta;

	if(!is_admin()) {
		require_once(get_template_directory().'/includes/convac-custom-css.php');
	}
 
}
add_action('wp_head', 'convac_lite_head');
