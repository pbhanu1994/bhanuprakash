<?php
/**
 * Contains methods for customizing the theme customization screen.
 * 
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since Atout 1.0
 * @author Frenchtastic.eu
 */
class Atout_Customize {
   /**
    * This hooks into 'customize_register' (available as of WP 3.4) and allows
    * you to add new sections and controls to the Theme Customize screen.
    * 
    * Note: To enable instant preview, we have to actually write a bit of custom
    * javascript. See live_preview() for more.
    *  
    * @see add_action('customize_register',$func)
    * @param \WP_Customize_Manager $wp_customize
    * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
    * @since Atout 1.0
    */
   public static function register ( $wp_customize ) {

    // =============================================================================
    // Register Sections
    // =============================================================================

    $wp_customize->add_section( 'atout_frenchtastic', array(
      'priority'       => 10,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '',
      'title'          => __('Support & More', 'atout'),
      'description'    => '<p><a href="https://wordpress.org/support/theme/atout" target="_blank">Ask for support</a></p> <p><a href="http://frenchtastic.eu" target="_blank">Check out my other themes <br> (they\'re all free).</a></p><p>If you like Atout, please consider making a donation to its developer. It will help fixing bugs and bringing new features to the theme. Thank You!</p><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="8Q9QZCFX84GY4">
<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
',
    ));

    // -----------------------------------------------------------------------------
    
    $wp_customize->add_section( 'atout_logo', array(
      'priority'       => 20,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '',
      'title'          => __('Logo', 'atout'),
      'description'    => '',
    ));

    // -----------------------------------------------------------------------------

    $wp_customize->add_section( 'atout_post_options', array(
      'priority'       => 30,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '',
      'title'          => __('Post Options', 'atout'),
      'description'    => '',
    ));

    // -----------------------------------------------------------------------------

    $wp_customize->add_section( 'atout_navbar', array(
      'priority'       => 40,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '',
      'title'          => __('Header & Navbar', 'atout'),
      'description'    => '',
    ));

    // -----------------------------------------------------------------------------

    $wp_customize->add_section( 'atout_layout', array(
      'priority'       => 50,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '',
      'title'          => __('Layout', 'atout'),
      'description'    => '',
    ));

    // -----------------------------------------------------------------------------

    $wp_customize->add_section( 'atout_fonts', array(
      'priority'       => 70,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '',
      'title'          => __('Font Options', 'atout'),
      'description'    => '',
    ));

    // -----------------------------------------------------------------------------

    $wp_customize->add_section( 'atout_favicon_section', array(
      'priority'       => 100,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '',
      'title'          => __('Favicon', 'atout'),
      'description'    => '',
    ));

    // -----------------------------------------------------------------------------

    $wp_customize->add_section( 'atout_footer', array(
      'priority'       => 110,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '',
      'title'          => __('Footer', 'atout'),
      'description'    => '',
    ));

    // =============================================================================
    // Settings & Controls
    // =============================================================================

    /**
    * Logo
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting( 'logo', array(
        'sanitize_callback' => 'esc_url_raw',
        'default'           => get_template_directory_uri() .'/framework/img/atout-logo.png',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'atout_logo_option', array(
      'label'    => __( 'Logo', 'atout' ),
      'section'  => 'atout_logo',
      'settings' => 'logo',
      'description' => __('Choose an image to replace the website\'s name in the header. Format must be .png. <br><b>Height should be 80px</b><br><b>Width should not exceed 240px.</b>', 'atout'),
    )));

    // -----------------------------------------------------------------------------

    /**
    * Favicon
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting( 'atout_favicon', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'atout_favicon_option', array(
      'label'    => __( 'Favicon', 'atout' ),
      'section'  => 'atout_favicon_section',
      'settings' => 'atout_favicon',
      'description' => __('Change your site\'s favicon, <b>Image must be <u>16x16px</u> or <u>32x32px</u>, format must be <u>.png</u></b>', 'atout'),
    )));

    // -----------------------------------------------------------------------------

    /**
    * Apple bookmark for iPhones
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting( 'atout_bookmark_iphone', array(
      'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'atout_bookmark_iphone_option', array(
      'label'    => __( 'Retina iPhone Bookmark', 'atout' ),
      'section'  => 'atout_favicon_section',
      'settings' => 'atout_bookmark_iphone',
      'description' => __('Upload image to be used as bookmark on iPhones with retina screen. <b>Size must be <u>120x120</u> and format <u>.png</u></b>', 'atout'),
    )));

    // -----------------------------------------------------------------------------

    /**
    * Apple bookmark for iPads
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting( 'atout_bookmark_ipad', array(
      'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'atout_bookmark_ipad_option', array(
      'label'    => __( 'Retina iPad Bookmark', 'atout' ),
      'section'  => 'atout_favicon_section',
      'settings' => 'atout_bookmark_ipad',
      'description' => __('Upload image to be used as bookmark on iPads with retina screen. <b>Size must be <u>152x152</u> and format <u>.png</u></b>', 'atout'),
    )));

    // -----------------------------------------------------------------------------

    /**
    * Apple bookmark for iPads
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting( 'atout_bookmark_other', array(
      'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'atout_bookmark_other_option', array(
      'label'    => __( 'Bookmark Icon', 'atout' ),
      'section'  => 'atout_favicon_section',
      'settings' => 'atout_bookmark_other',
      'description' => __('Upload image to be used as bookmark icon on other Apple devices. <b>Size must be <u>76x76px</u> and format <u>.png</u></b>', 'atout'),
    )));

    // -----------------------------------------------------------------------------

    /**
    * Fixed/static navbar
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting('topbar_show', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'transport'      => 'refresh',
        'sanitize_callback' => 'atout_sanitize_topbar',
        ));

    $wp_customize->add_control('topbar_show', array(
        'label'      => __('Topbar', 'atout'),
        'section'    => 'atout_navbar',
        'settings'   => 'topbar_show',
        'description' => __('Choose to hide or show the top navigation bar. <b>Please note:</b> this bar will be replaced by the native WP admin bar when logged in.', 'atout'),
        'type'       => 'radio',
        'choices'    => array(
            'block'=> __('Show', 'atout'),
            'none' => __('Hide', 'atout')
            ),
    ));

    // -----------------------------------------------------------------------------

    /**
    * Fixed/static navbar
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting('navbar_state', array(
        'default'        => 'static',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'transport'      => 'refresh',
        'sanitize_callback' => 'atout_sanitize_navbar_state',
        ));

    $wp_customize->add_control('navbar_state', array(
        'label'      => __('Fixed Navbar', 'atout'),
        'section'    => 'atout_navbar',
        'settings'   => 'navbar_state',
        'description' => __('Pick fixed and your navbar will be fixed to the top of the page.', 'atout'),
        'type'       => 'radio',
        'choices'    => array(
            'static'=> __('static', 'atout'),
            'fixed' => __('fixed', 'atout')
            ),
    ));

    // -----------------------------------------------------------------------------

    /**
    * Search form in header
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting('nav_search', array(
        'default'        => 'block',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'transport'      => 'refresh',
        'sanitize_callback' => 'atout_sanitize_display_block',
        ));

    $wp_customize->add_control('nav_search', array(
        'label'      => __('Search form', 'atout'),
        'section'    => 'atout_navbar',
        'settings'   => 'nav_search',
        'description' => __('Set to yes to display the search form in the site header.', 'atout'),
        'type'       => 'radio',
        'choices'    => array(
            'block'=> __('Yes', 'atout'),
            'none' => __('No', 'atout')
            ),
    ));

    // -----------------------------------------------------------------------------

    /**
    * Thumbnail link to post?
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting('thumbnail_link', array(
        'default'        => 'yes',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'transport'      => 'refresh',
        'sanitize_callback' => 'atout_sanitize_thumbnail_link',
        ));

    $wp_customize->add_control('thumbnail_link', array(
        'label'      => __('Thumbnail Link', 'atout'),
        'section'    => 'atout_post_options',
        'settings'   => 'thumbnail_link',
        'description' => __('Do you want thumbnails to be linked to their article?', 'atout'),
        'type'       => 'radio',
        'choices'    => array(
            'yes'=> __('Yes', 'atout'),
            'no' => __('No', 'atout')
            ),
    ));

    // -----------------------------------------------------------------------------

    /**
    * Btn color
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting( 'primary_color',
    array(
      'default' => '#29d9c2',
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    ));      
            
    $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'atout_primary_color',
    array(
      'label' => __( 'Accent color', 'atout' ),
      'section' => 'colors',
      'settings' => 'primary_color',
      'priority' => 10,
      'description' => __('Not feeling inspired? Try these ones: <p style="background-color: #d62862; border-radius: 3px; color:#fff;text-align: center;">#d62862</p><p style="background-color: #4671fb; border-radius: 3px; color:#fff;text-align: center;">#4671fb</p><p style="background-color: #7ad03a; border-radius: 3px; color:#fff;text-align: center;">#7ad03a</p><p style="background-color: #f1c40f; border-radius: 3px; color:#fff;text-align: center;">#f1c40f</p><p style="background-color: #29d9c2; border-radius: 3px; color:#fff;text-align: center;">#29d9c2</p><p style="background-color: #e74c3c; border-radius: 3px; color: #FFF; text-align: center;">#e74c3c</p><br>', 'atout')
    )));

    // -----------------------------------------------------------------------------

    /**
    * Site title color
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting( 'navbar_namecolor',
    array(
      'default' => '222', 
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'transport' => 'postMessage', 
      'sanitize_callback' => 'sanitize_hex_color',
    ));      
            

    $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize, 
    'atout_navbar_namecolor',
    array(
      'label' => __( 'Site Title', 'atout' ),
      'section' => 'colors',
      'settings' => 'navbar_namecolor',
      'priority' => 10,
    )));

    // -----------------------------------------------------------------------------

    /**
    * Body Font size
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting('body_font_size', array(
        'default'        => '15px',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'transport'      => 'postMessage',
        'sanitize_callback' => 'atout_sanitize_body_font_size',
        ));

    $wp_customize->add_control('body_font_size', array(
        'label'      => __('Body font size', 'atout'),
        'section'    => 'atout_fonts',
        'settings'   => 'body_font_size',
        'description' => __('Choose body font size. <b>Default is 15px.</b>', 'atout'),
        'type'       => 'select',
        'choices'    => array(
            '11px'=> __('11px', 'atout'),
            '12px' => __('12px', 'atout'),
            '13px' => __('13px', 'atout'),
            '14px' => __('14px', 'atout'),
            '15px' => __('15px', 'atout'),
            '16px' => __('16px', 'atout'),
            '17px' => __('17px', 'atout'),
            '18px' => __('18px', 'atout')
            ),
    ));

    // -----------------------------------------------------------------------------

    $font_choices = 
        array(
          'Helvetica Neue' => __('Helvetica Neue', 'atout'),
          'Open Sans' => __('Open Sans', 'atout'),
          'Arial' => __('Arial', 'atout'),
          'Comic Sans MS' => __('Comic Sans MS', 'atout'),
          'Times New Roman' => __('Times New Roman', 'atout'),
          'Verdana' => __('Verdana', 'atout'),
          'Fantasy' => __('Fantasy', 'atout'),
          'Monospace' => __('Monospace', 'atout'),
          'Cursive' => __('Cursive', 'atout'),
          'Serif' => __('Serif', 'atout'),
          'Courier' => __('Courier', 'atout'),
          'Monaco' => __('Monaco', 'atout'),
        );

    /**
    * Body Font
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting('body_font', array(
      'default'        => 'Open Sans',
      'capability'     => 'edit_theme_options',
      'type'           => 'theme_mod',
      'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
      'sanitize_callback' => 'atout_sanitize_body_fontfamily',
    ));

    $wp_customize->add_control('atout_body_font', array(
      'label'      => __('Body Font', 'atout'),
      'section'    => 'atout_fonts',
      'settings'   => 'body_font',
      'description' => __('Pick a font for body text. <b>Default is Open Sans.</b>', 'atout'),
      'type'       => 'select',
      'choices'    => $font_choices,
    ));

    // -----------------------------------------------------------------------------

    /**
    * Headings
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting('headings_font', array(
        'default'        => 'Helvetica Neue',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
        'sanitize_callback' => 'atout_sanitize_fontfamily',
        ));

    $wp_customize->add_control('atout_headings_font', array(
        'label'      => __('Heading Font', 'atout'),
        'section'    => 'atout_fonts',
        'settings'   => 'headings_font',
        'description' => __('Pick a font for all headings. <b>Default is Helvetic Neue.</b>', 'atout'),
        'type'       => 'select',
        'choices'    => $font_choices,
    ));

    // -----------------------------------------------------------------------------

    /**
    * Font Spacing
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting('spacing_headings', array(
        'default'        => '0.20em',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'transport'      => 'postMessage',
        'sanitize_callback' => 'atout_sanitize_spacing_headings',
        ));

    $wp_customize->add_control('spacing_headings', array(
        'label'      => __('Letter Spacing', 'atout'),
        'section'    => 'atout_fonts',
        'settings'   => 'spacing_headings',
        'description' => __('Letter spacing for headings and titles.', 'atout'),
        'type'       => 'radio',
        'choices'    => array(
            '0.20em'=> __('Spaced', 'atout'),
            '0em' => __('Not spaced', 'atout')
            ),
    ));

    // -----------------------------------------------------------------------------

    /**
    * Uppercase Headings
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting('uppercase_headings', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'transport'      => 'postMessage',
        'sanitize_callback' => 'atout_sanitize_uppercase_headings',
        ));

    $wp_customize->add_control('uppercase_headings', array(
        'label'      => __('Uppercase Headings', 'atout'),
        'section'    => 'atout_fonts',
        'settings'   => 'uppercase_headings',
        'description' => '',
        'type'       => 'radio',
        'choices'    => array(
            'uppercase'=> __('Uppercase', 'atout'),
            'none' => __('No', 'atout')
            ),
    ));

    // -----------------------------------------------------------------------------

    /*
    * Post Options
    */

    /**
    * Excerpt or content
    * @author Frenchtastic.eu
    * @since atout 1.0
    */
    $wp_customize->add_setting('atout_post_content', array(
        'default'        => 'excerpt',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'transport'      => 'refresh',
        'sanitize_callback' => 'atout_sanitize_content',
    ));

    $wp_customize->add_control('atout_post_content', array(
        'label'      => __('Post Content', 'atout'),
        'section'    => 'atout_post_options',
        'settings'   => 'atout_post_content',
        'description' => __('<b>Show content</b> will show the whole post content while <b>show excerpt</b> will only show the first few lines', 'atout'),
        'type'       => 'radio',
        'choices'    => array(
            'content' => __('Show content', 'atout'),
            'excerpt' => __('Show excerpt', 'atout')
            ),
    ));

    // -----------------------------------------------------------------------------

    /**
    * Show sidebar on mobile devices
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting('atout_sidebar_mobile', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'transport'      => 'refresh',
        'sanitize_callback' => 'atout_sanitize_display_none',
        ));

    $wp_customize->add_control('atout_sidebar_mobile', array(
        'label'      => __('Sidebar on Mobile', 'atout'),
        'section'    => 'atout_layout',
        'settings'   => 'atout_sidebar_mobile',
        'description' => __('Show sidebar on mobile devices?', 'atout'),
        'type'       => 'radio',
        'choices'    => array(
            'block'=> __('Yes', 'atout'),
            'none' => __('No', 'atout')
            ),
    ));

    // -----------------------------------------------------------------------------

    /**
    * Blog Layout
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting('atout_blog_layout_opt', array(
      'default'        => 'right',
      'capability'     => 'edit_theme_options',
      'type'           => 'option',
      'transport'      => 'refresh',
      'sanitize_callback' => 'atout_sanitize_layout',
    ));

    $wp_customize->add_control('atout_blog_layout_opt', array(
      'label'      => __('Blog', 'atout'),
      'section'    => 'atout_layout',
      'settings'   => 'atout_blog_layout_opt',
      'description' => '',
      'type'       => 'radio',
      'choices'    => array(
        'left' => __('Left sidebar', 'atout'),
        'full_width' => __('Content Full Width / No sidebar', 'atout'),
        'right'   => __('Right sidebar', 'atout'),
        ),
    ));

    // -----------------------------------------------------------------------------

    /**
    * Post Layout
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting('atout_post_layout_opt', array(
      'default'        => 'right',
      'capability'     => 'edit_theme_options',
      'type'           => 'option',
      'transport'      => 'refresh',
      'sanitize_callback' => 'atout_sanitize_layout',
    ));

    $wp_customize->add_control('atout_post_layout_opt', array(
      'label'      => __('Single post pages', 'atout'),
      'section'    => 'atout_layout',
      'settings'   => 'atout_post_layout_opt',
      'description' => '',
      'type'       => 'radio',
      'choices'    => array(
          'left' => __('Left sidebar', 'atout'),
          'full_width' => __('Content Full Width / No sidebar', 'atout'),
          'right'   => __('Right sidebar', 'atout')
          ),
    ));

    // -----------------------------------------------------------------------------

    /**
    * Page Layout
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting('atout_page_layout_opt', array(
      'default'        => 'right',
      'capability'     => 'edit_theme_options',
      'type'           => 'option',
      'transport'      => 'refresh',
      'sanitize_callback' => 'atout_sanitize_layout',
    ));

    $wp_customize->add_control('atout_page_layout_opt', array(
      'label'      => __('Pages', 'atout'),
      'section'    => 'atout_layout',
      'settings'   => 'atout_page_layout_opt',
      'description' => '',
      'type'       => 'radio',
      'choices'    => array(
          'left' => __('Left sidebar', 'atout'),
          'full_width' => __('Content Full Width / No sidebar', 'atout'),
          'right'   => __('Right sidebar', 'atout')
          ),
    ));

    // -----------------------------------------------------------------------------

    /**
    * Footer copyright notice
    * @author Frenchtastic
    * @since Atout 1.0
    */
    $wp_customize->add_setting( 'footer_copyright', array(
        'default' => '',
        'type' => 'theme_mod',
        'transport' =>  'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( 'footer_copyright', array(
        'label' => __('Footer copyright notice', 'atout'),
        'section' => 'atout_footer',
        'type' => 'text',
    ));

    // -----------------------------------------------------------------------------

    $wp_customize->add_setting( 'excerpt_lenght', array(
            'sanitize_callback' => 'absint',
            'default'           => '55',
    ));
    $wp_customize->add_control( 'excerpt_lenght', array(
        'type'        => 'number',
        'section'     => 'atout_post_options',
        'label'       => __('Excerpt lenght', 'atout'),
        'description' => __('Choose the excerpt length (in words). Default is 55', 'atout'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'padding: 12px;',
        ),
    ) );  

    // -----------------------------------------------------------------------------

    //Pro
    $wp_customize->add_setting('atout_frenchtastic_info', array(
      'sanitize_callback' => 'atout_no_sanitize',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( 'atout_frenchtastic_info', array(
        'section' => 'atout_frenchtastic',
        'settings' => 'atout_frenchtastic_info',
        'priority' => 10,
        )
    );

    // -----------------------------------------------------------------------------
      
    //4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->get_setting( 'navbar_namecolor' )->transport = 'postMessage';
    $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
    $wp_customize->get_setting( 'body_font' )->transport = 'postMessage';
    $wp_customize->get_setting( 'spacing_headings' )->transport = 'postMessage';
    $wp_customize->get_setting( 'footer_copyright' )->transport = 'postMessage';
   }

   /**
    * This will output the custom WordPress settings to the live theme's WP head.
    * 
    * Used by hook: 'wp_head'
    * 
    * @see add_action('wp_head',$func)
    * @since Atout 1.0
    */
   public static function header_output() {
    
    $atout_heading_classes = "h1 a, .h1 a, h2 a, .h2 a, h3 a, .h3 a, h4 a, .h4 a, h5 a, .h5 a, h6 a, .h6 a, h1, .h1, h2, .h2, h3, .h3, 
    h4, .h4, h5, .h5, h6, .h6";
    ?>

    <!--Customizer CSS--> 
    <style type="text/css">
    <?php 
    
    // Font size
    self::generate_css('body', 'font-size', 'body_font_size');
    // Site title color
    self::generate_css('.navbar-default .navbar-brand', 'color', 'navbar_namecolor');
    // Primary color
    self::generate_css('.btn-primary, .modal-backdrop', 'background-color', 'primary_color'); 
    self::generate_css('.btn-primary', 'border-color', 'primary_color'); 
    self::generate_css('a, .entry-date, .post-meta .author a', 'color', 'primary_color'); 
    // Background color
    self::generate_css('body', 'background-color', 'background_color', '#'); 
    // Body font
    self::generate_css('body', 'font-family', 'body_font');
    // Heading font
    self::generate_css($atout_heading_classes, 'font-family', 'headings_font');
    self::generate_css($atout_heading_classes, 'text-transform', 'uppercase_headings');
    self::generate_css($atout_heading_classes, 'letter-spacing', 'spacing_headings');
    // Sidebar ?>
    @media(max-width: 767px){
    <?php
    self::generate_css('aside.sidebar', 'display', 'atout_sidebar_mobile');
    ?> } <?php
    // Content      
    if(get_option('atout_blog_layout_opt') == 'full_width'){ ?>
        <style type="text/css">
            main.blog{
                padding-right: 15px;
            }
    <?php } ?>
    </style> 
    <!--/Customizer CSS-->
    <?php

   }
   
   /**
    * This outputs the javascript needed to automate the live settings preview.
    * Also keep in mind that this function isn't necessary unless your settings 
    * are using 'transport'=>'postMessage' instead of the default 'transport'
    * => 'refresh'
    * 
    * Used by hook: 'customize_preview_init'
    * 
    * @see add_action('customize_preview_init',$func)
    * @since Atout 1.0
    */
   public static function live_preview() {
      wp_enqueue_script( 
           'atout-themecustomizer', // Give the script a unique ID
           get_template_directory_uri() . '/framework/js/customizer.js', // Define the path to the JS file
           array(  'jquery', 'customize-preview' ), // Define dependencies
           '', // Define a version (optional) 
           true // Specify whether to put in footer (leave this true)
      );
   }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     * 
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since Atout 1.0
     */
    public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'Atout_Customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'Atout_Customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'Atout_Customize' , 'live_preview' ) );