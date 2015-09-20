<?php

global $convac_lite_themename;
global $convac_lite_shortname;

/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', '_custom_theme_options', 1 );

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_theme_options() {

global $convac_lite_themename;
global $convac_lite_shortname;
  
   /**
    * Get a copy of the saved settings array. 
    */
	$saved_settings = get_option( 'option_tree_settings', array() );

	
	// If using image radio buttons, define a directory path
	$imagepath  =  get_template_directory_uri() . '/images/';
	$sktsiteurl = home_url();
	$sktsitenm  = get_bloginfo('name');
	
  /**
   * Create a custom settings array that we pass to 
   * the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'contextual_help' => array(
		'content'       => array( 
			array(
				'id'        => 'general_help',
				'title'     => 'General',
				'content'   => '<p>Help content goes here!</p>'
			)
		),
		'sidebar'     => '<p>Sidebar content goes here!</p>'
		),
		'sections'        => array(
			array(
				'title'   => 'General Settings',
				'id'      => 'general_default'
			),
			array(
				'title'   => 'Header Settings',
				'id'      => 'header_settings'
			),
			array(
				'title'   => 'Author Settings',
				'id'      => 'author_settings'
			), 
			array(      
				'title'   => 'Header Social Links',
				'id'      => 'social_links'

			),
			array(      
				'title'   => 'Inner Page Settings',
				'id'      => 'innerpage_settings'

			),
			array(
				'title'   => 'Blog Settings',
				'id'      => 'blog_settings'
			), 			
			array(      
				'title'   => 'Footer Settings',
				'id'      => 'footer_section'
			),
		),
    'settings'        => array(
	

		//==================================================================
		// GENERAL SETTINGS SECTION STARTS =================================
		//==================================================================
		
		array(
			'id'          => 'convac_welcome_speach',
			'label'       => 'Welcome to Convac',
			'desc'        => '<h1>Welcome to Convac</h1>
			<p>Thank you for using Convac. Get started below and go through the left tabs to set up your website.</p>',
			'std'         => '',
			'type'        => 'textblock',
			'section'     => 'general_default',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => ''
		),
		array(
			'label'       => __( 'Color Scheme', 'convac-lite'),
			'id'          => $convac_lite_shortname.'_colorpicker',
			'type'        => 'colorpicker',
			'desc'        => 'Set color scheme',
			'std'         => '#f65e13',
			'section'     => 'general_default'
		),
		array(
			'label'       => __( 'Upload Favicon', 'convac-lite'),
			'id'          => $convac_lite_shortname.'_favicon',
			'type'        => 'upload',
			'desc'        => 'This creates a custom favicon for your website.',
			'std'         => '',
			'section'     => 'general_default'
		),
		array(
			'id'          => $convac_lite_shortname.'_show_pagination',
			'label'       => __('Custom Pagination', 'convac-lite'),
			'desc'        => __('On/Off custom pagination on blog page.', 'convac-lite'),
			'type'        => 'on-off',
			'std'         => 'on',
			'section'     => 'general_default'
		),


		//------ END GENERAL SETTINGS SECTION ------------------------------
		
		
		//==================================================================
		// HEADER SETTINGS SECTION STARTS ==================================
		//==================================================================	

		
		array(
			'label'       => __( 'Header Static Image', 'convac-lite'),
			'id'          => $convac_lite_shortname.'_header_static_img',
			'type'        => 'upload',
			'desc'        => 'Please add header static image for author slider.',
			'std'         => '',
			'section'     => 'header_settings'
		),
		array(
			'label'       => __( 'Change Logo', 'convac-lite'),
			'id'          => $convac_lite_shortname.'_logo_img',
			'type'        => 'upload',
			'desc'        => 'This creates a custom logo for your website.',
			'std'         => '',
			'section'     => 'header_settings'
		),
		array(
			'id'          => $convac_lite_shortname.'_logo_alt',
			'label'       => __( 'Logo ALT Text', 'convac-lite'),
			'desc'        => 'Enter logo image alt attribute text.',
			'std'         => '',
			'type'        => 'text',
			'section'     => 'header_settings'
		),	
		array(
			'id'          => $convac_lite_shortname.'_moblie_menu',
			'label'       => __( 'Mobile Menu Activate Width', 'convac-lite'),
			'desc'        => __( 'Layout width after which mobile menu will get activated', 'convac-lite' ),
			'std'         => '1025',
			'type'        => 'numeric-slider',
			'section'     => 'header_settings',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '100,1180,1'

		),
		array(
			'label'       => __('Search Form In Header', 'convac-lite'),
			'desc'        => __('On/Off search form in header.', 'convac-lite'),
			'id'          => $convac_lite_shortname.'_headserach',
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'header_settings'
        ),
		
		//------ END HEADER SETTINGS SECTION -------------------------------
		
		
		//==================================================================
		// AUTHOR SETTINGS SECTION STARTS ============================
		//==================================================================
		array(
			'label'       => __( 'Upload Author Image', 'convac-lite'),
			'id'          => $convac_lite_shortname.'_author_img',
			'type'        => 'upload',
			'desc'        => 'This creates a author image for your website.',
			'std'         => '',
			'section'     => 'author_settings'
			),
		array(
			'id'          => $convac_lite_shortname.'_author_name',
			'label'       => __( 'Enter Author Name', 'convac-lite'),
			'desc'        => 'Enter Author Name.',
			'std'         => '',
			'type'        => 'text',
			'section'     => 'author_settings'
			),
		array(
			'label'       => 'Enter Author Discrbtion',
			'id'          => $convac_lite_shortname.'_author_desp',
			'type'        => 'textarea-simple',
			'desc'        => 'You can use HTML for links etc..',
			'std'         => '',
			'section'     => 'author_settings'
		),	
			
		//------ END AUTHOR SETTINGS SECTION -------------------------------
			
			
		//==================================================================
		// SOCIAL LINKS SETTINGS SECTION STARTS ============================
		//==================================================================
		
		
		array(
			'label'       => 'Connect Lable Text',
			'id'          => $convac_lite_shortname.'_sconnect_txt',
			'type'        => 'text',
			'desc'        => 'Enter text for connect label.',
			'std'         => '',
			'section'     => 'social_links'
		),
	  	array(
			'label'       => 'Facebook Link',
			'id'          => $convac_lite_shortname.'_fbook_link',
			'type'        => 'text',
			'desc'        => 'Enter Facebook Link.',
			'std'         => '',
			'section'     => 'social_links'
		),
		array(
			'label'       => 'Twitter Link',
			'id'          => $convac_lite_shortname.'_twitter_link',
			'type'        => 'text',
			'desc'        => 'Enter Twitter link.',
			'std'         => '',
			'section'     => 'social_links'
		),
		array(
			'label'       => 'Google Plus ID',
			'id'          => $convac_lite_shortname.'_gplus_link',
			'type'        => 'text',
			'desc'        => 'Enter Google plus Id.',
			'std'         => '',
			'section'     => 'social_links'
		),
		array(
			'label'       => 'Linkedin Link',
			'id'          => $convac_lite_shortname.'_linkedin_link',
			'type'        => 'text',
			'desc'        => 'Enter Linkedin link.',
			'std'         => '',
			'section'     => 'social_links'
		),	
		array(
			'label'       => 'Pinterest Link',
			'id'          => $convac_lite_shortname.'_pinterest_link',
			'type'        => 'text',
			'desc'        => 'Enter Pinterest link.',
			'std'         => '',
			'section'     => 'social_links'
		),	
		array(
			'label'       => 'Flickr Link',
			'id'          => $convac_lite_shortname.'_flickr_link',
			'type'        => 'text',
			'desc'        => 'Enter Flickr link.',
			'std'         => '',
			'section'     => 'social_links'
		),
		array(
			'label'       => 'Foursquare Link',
			'id'          => $convac_lite_shortname.'_foursquare_link',
			'type'        => 'text',
			'desc'        => 'Enter Foursquare link.',
			'std'         => '',
			'section'     => 'social_links'
		),		
		array(
			'label'       => 'Youtube Link',
			'id'          => $convac_lite_shortname.'_youtube_link',
			'type'        => 'text',
			'desc'        => 'Enter Youtube link.',
			'std'         => '',
			'section'     => 'social_links'
		),
	   
		//------ END SOCIAL LINKS SETTINGS SECTION -------------------------
		
				
		
		//==================================================================
		// BLOG SETTINGS SECTION STARTS ====================================
		//==================================================================	

		array(
			'id'          => $convac_lite_shortname.'_blogpage_heading',
			'label'       => __( 'Enter Blog Page Title', 'convac-lite'),
			'desc'        => 'Enter Blog Page Title text.',
			'std'         => 'Blog',
			'type'        => 'text',
			'section'     => 'blog_settings'
		),
			
		//------ END BLOG SETTINGS SECTION ---------------------------------
	

	
		//==================================================================
		// INNER PAGE SETTINGS SECTION STARTS ====================================
		//==================================================================	

		array(
			'label'       => __( 'Upload Inner Page Header Image', 'convac-lite'),
			'id'          => $convac_lite_shortname.'_innerpage_img',
			'type'        => 'upload',
			'desc'        => 'This creates a image for your website.',
			'std'         => '',
			'section'     => 'innerpage_settings'
			),
			
		//------ END INNER PAGE SETTINGS SECTION ---------------------------------
	
		//==================================================================
		// FOOTER SETTINGS SECTION STARTS ==================================
		//==================================================================
		
		array(
			'label'       => 'Copyright Text',
			'id'          => $convac_lite_shortname.'_copyright',
			'type'        => 'textarea',
			'desc'        => 'You can use HTML for links etc..',
			'std'         => 'Copyright text',
			'section'     => 'footer_section'
		),		
		
		
		//------ END FOOTER SETTINGS SECTION -------------------------------
		
		
			
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}

?>