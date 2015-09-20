<?php
/**
 * Theme setup
 *
 * @package    Modern
 * @copyright  2015 WebMan - Oliver Juhas
 *
 * @since    1.0
 * @version  1.4
 *
 * CONTENT:
 * -  10) Actions and filters
 * -  20) Global variables
 * -  30) Theme setup
 * -  40) Assets and design
 * -  50) Site global markup
 * - 100) Other functions
 */





/**
 * 10) Actions and filters
 */

	/**
	 * Actions
	 */

		//Styles and scripts
			add_action( 'init',                'wm_register_assets',       10   );
			add_action( 'wp_enqueue_scripts',  'wm_enqueue_assets',        100  );
			add_action( 'wp_enqueue_scripts',  'wm_post_nav_background',   110  );
			add_action( 'wp_footer',           'wm_footer_custom_scripts', 9998 );
			add_action( 'comment_form_before', 'wm_comment_reply_js_enqueue'    );
		//Customizer assets
			add_action( 'customize_controls_enqueue_scripts', 'wm_customizer_enqueue_assets'             );
			add_action( 'customize_preview_init',             'wm_customizer_preview_enqueue_assets', 10 );
		//Theme setup
			add_action( 'after_setup_theme', 'wm_setup', 10 );
		//Register widget areas
			add_action( 'widgets_init', 'wm_register_widget_areas', 1 );
		//Sticky posts
			add_action( 'pre_get_posts', 'wm_home_query_ignore_sticky_posts' );
		//Pagination fallback
			add_action( 'wmhook_postslist_after', 'wm_pagination', 10 );
		//Visual Editor addons
			add_action( 'init', 'wm_visual_editor', 999 );
		//Display Settings > Media recommended images sizes notice
			add_action( 'admin_init', 'wm_image_size_notice' );
		//Website sections
			//DOCTYPE
				add_action( 'wmhook_html_before',    'wm_doctype',        10   );
			//HEAD
				add_action( 'wmhook_head_bottom',    'wm_head',           10   );
			//Body
				add_action( 'wmhook_body_top',       'wm_site_top',       10   );
				add_action( 'wmhook_footer_before',  'wm_site_bottom',    100  );
			//Header
				add_action( 'wmhook_header_top',     'wm_header_top',     10   );
				add_action( 'wmhook_header',         'wm_navigation',     10   );
				add_action( 'wmhook_header',         'wm_logo',           20   );
				add_action( 'wmhook_header',         'wm_menu_social',    30   );
				add_action( 'wmhook_header_bottom',  'wm_header_bottom',  10   );
			//Content
				add_action( 'wmhook_content_top',    'wm_content_top',    10   );
				add_action( 'wmhook_entry_top',      'wm_post_title',     10   );
				add_action( 'wmhook_entry_top',      'wm_entry_top',      30   );
				add_action( 'wmhook_entry_bottom',   'wm_entry_bottom',   10   );
				add_action( 'wmhook_entry_bottom',   'wm_sticky_label',   20   );
				add_action( 'wmhook_entry_after',    'wm_entry_after',    10   );
				add_action( 'wmhook_entry_after',    'wm_post_nav',       20   );
				add_action( 'wmhook_content_bottom', 'wm_content_bottom', 100  );
			//Footer
				add_action( 'wmhook_footer_top',     'wm_footer_top',     100  );
				add_action( 'wmhook_footer',         'wm_footer',         100  );
				add_action( 'wmhook_footer_bottom',  'wm_footer_bottom',  100  );
		//Front page template more links
			add_action( 'wmhook_template_front_portfolio_postslist_after', 'wm_portfolio_more_link', 10 );
			add_action( 'wmhook_template_front_blog_postslist_after',      'wm_blog_more_link',      10 );



	/**
	 * Filters
	 */

		//Set up image sizes
			add_filter( 'wmhook_wm_setup_image_sizes', 'wm_image_sizes' );
		//Set required Google Fonts
			add_filter( 'wmhook_wm_google_fonts_url_fonts_setup', 'wm_google_fonts' );
		//BODY classes
			add_filter( 'body_class', 'wm_body_classes', 98 );
		//Post classes
			add_filter( 'post_class', 'wm_post_classes', 98 );
		//[gallery] shortcode modifications
			add_filter( 'post_gallery', 'wm_shortcode_gallery_assets', 10, 2 );
		//Navigation improvements
			add_filter( 'nav_menu_css_class',       'wm_nav_item_classes', 10, 4 );
			add_filter( 'walker_nav_menu_start_el', 'wm_nav_item_process', 10, 4 );
		//Excerpt modifications
			add_filter( 'the_excerpt',                        'wm_remove_shortcodes',        10 );
			add_filter( 'the_excerpt',                        'wm_excerpt',                  20 );
			add_filter( 'excerpt_length',                     'wm_excerpt_length',           10 );
			add_filter( 'excerpt_more',                       'wm_excerpt_more',             10 );
			add_filter( 'wmhook_wm_excerpt_continue_reading', 'wm_excerpt_continue_reading', 10 );
		//Entry HTML attributes
			add_filter( 'wmhook_entry_container_atts', 'wm_entry_container_atts', 10 );
		//Post thumbnail
			add_filter( 'wmhook_entry_featured_image_size',    'wm_post_thumbnail_size' );
			add_filter( 'wmhook_entry_featured_image_display', 'wm_post_media_display'  );
		//Custom CSS fonts
			add_filter( 'wmhook_wm_custom_styles_value', 'wm_css_font_name', 10, 2 );
		//Disable post title
			add_filter( 'wmhook_wm_post_title_disable', 'wm_disable_post_title' );





/**
 * 20) Global variables
 */

	/**
	 * Max content width
	 *
	 * Required here, because we don't set it up in functions.php.
	 * The $content_width is calculated as golden ratio of the site container width.
	 */

		if ( ! isset( $content_width ) || ! $content_width ) {
			global $content_width;
			$content_width = absint( apply_filters( 'wmhook_site_container_width', 1200 ) * .62 );
		}




	/**
	 * Theme helper variables
	 *
	 * @since    1.0
	 * @version  1.2.2
	 *
	 * @param  string $variable Helper variables array key to return
	 * @param  string $key      Additional key if the variable is array
	 */
	if ( ! function_exists( 'wm_helper_var' ) ) {
		function wm_helper_var( $variable, $key = '' ) {
			//Helper variables
				$output = array();

				//Google Fonts
					$i = 0;
					$output['google-fonts'] = array(
							//No Google Font
								' ' => __( ' - do not use Google Font', 'wm_domain' ),

							//Default theme font
								'optgroup' . $i  => _x( 'Theme default', 'Google Font default setup options group title.', 'wm_domain' ),
									'Fira Sans:400,300'  => 'Fira Sans',
								'/optgroup' . $i => '',

							//Insipration from http://femmebot.github.io/google-type/
								'optgroup' . ++$i => sprintf( _x( 'Recommendation #%d', 'Google Font setup recommendation (numbered) group title.', 'wm_domain' ), $i ),
									'Playfair Display' => 'Playfair Display',
									'Fauna One'        => 'Fauna One',
								'/optgroup' . $i => '',

								'optgroup' . ++$i => sprintf( _x( 'Recommendation #%d', 'Google Font setup recommendation (numbered) group title.', 'wm_domain' ), $i ),
									'Fugaz One'   => 'Fugaz One',
									'Oleo Script' => 'Oleo Script',
									'Monda'       => 'Monda',
								'/optgroup' . $i => '',

								'optgroup' . ++$i => sprintf( _x( 'Recommendation #%d', 'Google Font setup recommendation (numbered) group title.', 'wm_domain' ), $i ),
									'Unica One' => 'Unica One',
									'Vollkorn'  => 'Vollkorn',
								'/optgroup' . $i => '',

								'optgroup' . ++$i => sprintf( _x( 'Recommendation #%d', 'Google Font setup recommendation (numbered) group title.', 'wm_domain' ), $i ),
									'Megrim'                  => 'Megrim',
									'Roboto Slab:400,300,100' => 'Roboto Slab',
								'/optgroup' . $i => '',

								'optgroup' . ++$i => sprintf( _x( 'Recommendation #%d', 'Google Font setup recommendation (numbered) group title.', 'wm_domain' ), $i ),
									'Open Sans:400,300' => 'Open Sans',
									'Gentium Basic'     => 'Gentium Basic',
								'/optgroup' . $i => '',

								'optgroup' . ++$i => sprintf( _x( 'Recommendation #%d', 'Google Font setup recommendation (numbered) group title.', 'wm_domain' ), $i ),
									'Ovo'          => 'Ovo',
									'Muli:300,400' => 'Muli',
								'/optgroup' . $i => '',

								'optgroup' . ++$i => sprintf( _x( 'Recommendation #%d', 'Google Font setup recommendation (numbered) group title.', 'wm_domain' ), $i ),
									'Neuton:200,300,400' => 'Neuton',
								'/optgroup' . $i => '',

								'optgroup' . ++$i => sprintf( _x( 'Recommendation #%d', 'Google Font setup recommendation (numbered) group title.', 'wm_domain' ), $i ),
									'Quando' => 'Quando',
									'Judson' => 'Judson',
									'Montserrat' => 'Montserrat',
								'/optgroup' . $i => '',

								'optgroup' . ++$i => sprintf( _x( 'Recommendation #%d', 'Google Font setup recommendation (numbered) group title.', 'wm_domain' ), $i ),
									'Ultra'                => 'Ultra',
									'Stint Ultra Expanded' => 'Stint Ultra Expanded',
									'Slabo 13px'           => 'Slabo 13px',
								'/optgroup' . $i => '',

							//Google Fonts selection
								'optgroup' . ++$i => _x( 'Fonts selection', 'Title for selection of fonts picked from Google Fontss', 'wm_domain' ),
									'Abril Fatface'             => 'Abril Fatface',
									'Arvo'                      => 'Arvo',
									'Domine'                    => 'Domine',
									'Droid Sans'                => 'Droid Sans',
									'Droid Serif'               => 'Droid Serif',
									'Duru Sans'                 => 'Duru Sans',
									'Inconsolata'               => 'Inconsolata',
									'Josefin Slab:400,300'      => 'Josefin Slab',
									'Lato:400,300,100'          => 'Lato',
									'Lobster'                   => 'Lobster',
									'Merriweather:400,300'      => 'Merriweather',
									'Merriweather Sans:400,300' => 'Merriweather Sans',
									'Metamorphous'              => 'Metamorphous',
									'Michroma'                  => 'Michroma',
									'Monoton'                   => 'Monoton',
									'Nixie One'                 => 'Nixie One',
									'Noto Sans'                 => 'Noto Sans',
									'Nunito:400,300'            => 'Nunito',
									'Old Standard TT'           => 'Old Standard TT',
									'Open Sans Condensed:300'   => 'Open Sans Condensed',
									'Oswald:400,300'            => 'Oswald',
									'PT Sans'                   => 'PT Sans',
									'PT Serif'                  => 'PT Serif',
									'Quicksand:400,300'         => 'Quicksand',
									'Raleway:400,300,200'       => 'Raleway',
									'Roboto:400,300'            => 'Roboto',
									'Rokkitt'                   => 'Rokkitt',
									'Source Sans Pro:400,300'   => 'Source Sans Pro',
									'Tenor Sans'                => 'Tenor Sans',
									'Ubuntu:400,300'            => 'Ubuntu',
									'Ubuntu Condensed'          => 'Ubuntu Condensed',
									'Yanone Kaffeesatz:400,300' => 'Yanone Kaffeesatz',
								'/optgroup' . $i => '',
						);

				//Google Fonts subsets
					$output['google-fonts-subset'] = array(
							'latin'        => 'Latin',
							'latin-ext'    => 'Latin Extended',
							'cyrillic'     => 'Cyrillic',
							'cyrillic-ext' => 'Cyrillic Extended',
							'greek'        => 'Greek',
							'greek-ext'    => 'Greek Extended',
							'vietnamese'   => 'Vietnamese',
						);

				//Widget areas
					$output['widget-areas'] = array(
							'sidebar' => array(
								'name'        => __( 'Sidebar', 'wm_domain' ),
								'description' => __( 'Page sidebar.', 'wm_domain' ),
							),
							'footer'  => array(
								'name'        => __( 'Footer Widgets', 'wm_domain' ),
								'description' => __( 'Masonry layout is used to display footer widgets.', 'wm_domain' ),
							),
						);

			//Output
				$output = apply_filters( 'wmhook_wm_helper_var_output', $output );

				if ( isset( $output[ $variable ] ) ) {
					$output = $output[ $variable ];
					if ( isset( $output[ $key ] ) ) {
						$output = $output[ $key ];
					}
				} else {
					$output = '';
				}

				return $output;
		}
	} // /wm_helper_var





/**
 * 30) Theme setup
 */

	/**
	 * Theme setup
	 *
	 * @since    1.0
	 * @version  1.4.2
	 */
	if ( ! function_exists( 'wm_setup' ) ) {
		function wm_setup() {

			//Helper variables
				$image_sizes = array_filter( apply_filters( 'wmhook_wm_setup_image_sizes', array() ) );

				//WordPress visual editor CSS stylesheets
					$visual_editor_css = array_filter( (array) apply_filters( 'wmhook_wm_setup_visual_editor_css', array(
							str_replace( ',', '%2C', wm_google_fonts_url() ),
							esc_url( add_query_arg( array( 'ver' => wp_get_theme()->get( 'Version' ) ), wm_get_stylesheet_directory_uri( 'genericons/genericons.css' ) ) ),
							esc_url( add_query_arg( array( 'ver' => wp_get_theme()->get( 'Version' ) ), wm_get_stylesheet_directory_uri( 'css/editor-style.css' ) ) ),
						) ) );

			/**
			 * Localization
			 *
			 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
			 */

				//wp-content/languages/theme-name/it_IT.mo
					load_theme_textdomain( 'wm_domain', trailingslashit( WP_LANG_DIR ) . 'themes/' . WM_THEME_SHORTNAME );

				//wp-content/themes/child-theme-name/languages/it_IT.mo
					load_theme_textdomain( 'wm_domain', get_stylesheet_directory() . '/languages' );

				//wp-content/themes/theme-name/languages/it_IT.mo
					load_theme_textdomain( 'wm_domain', get_template_directory() . '/languages' );

			//Title tag
				add_theme_support( 'title-tag' );

			//Visual editor styles
				add_editor_style( $visual_editor_css );

			//Feed links
				add_theme_support( 'automatic-feed-links' );

			//Enable HTML5 markup
				add_theme_support( 'html5', array(
						'comment-list',
						'comment-form',
						'search-form',
						'gallery',
						'caption',
					) );

			//Post formats
				add_theme_support( 'post-formats', apply_filters( 'wmhook_wm_setup_post_formats', array(
						'audio',
						'gallery',
						'image',
						'link',
						'quote',
						'status',
						'video',
					) ) );

			//Custom menus
				register_nav_menus( apply_filters( 'wmhook_wm_setup_menus', array(
						'primary' => __( 'Primary Menu', 'wm_domain' ),
						'social'  => __( 'Social Links Menu', 'wm_domain' ),
					) ) );

			//Custom header
				add_theme_support( 'custom-header', apply_filters( 'wmhook_wm_setup_custom_background_args', array(
						'default-image' => wm_get_stylesheet_directory_uri( 'images/header.jpg' ),
						'header-text'   => false,
						'width'         => 1920,
						'height'        => 1080,
						'flex-height'   => true,
						'flex-width'    => true,
					) ) );

			//Custom background
				add_theme_support( 'custom-background', apply_filters( 'wmhook_wm_setup_custom_background_args', array(
						'default-color'    => '1a1c1e',
						'wp-head-callback' => '__return_null', //This has to be set to callable function name (not just '') to prevent PHP warning!
					) ) );

			//Thumbnails support
				add_post_type_support( 'attachment:audio', 'thumbnail' );
				add_post_type_support( 'attachment:video', 'thumbnail' );

				add_theme_support( 'post-thumbnails', array( 'attachment:audio', 'attachment:video' ) );
				add_theme_support( 'post-thumbnails' );

				//Image sizes (x, y, crop)
					if ( ! empty( $image_sizes ) ) {

						foreach ( $image_sizes as $size => $setup ) {

							if (
									in_array( $size, array( 'thumbnail', 'medium', 'large' ) )
									&& ! get_theme_mod( '__image_size-' . $size )
								) {

								/**
								 * Force the default image sizes on theme installation only.
								 * This allows users to set their own sizes later, but a notification is displayed.
								 */

								if ( $image_sizes[ $size ][0] != get_option( $size . '_size_w' ) ) {
									update_option( $size . '_size_w', $image_sizes[ $size ][0] );
								}
								if ( $image_sizes[ $size ][1] != get_option( $size . '_size_h' ) ) {
									update_option( $size . '_size_h', $image_sizes[ $size ][1] );
								}
								if ( $image_sizes[ $size ][2] != get_option( $size . '_crop' ) ) {
									update_option( $size . '_crop', $image_sizes[ $size ][2] );
								}

								set_theme_mod( '__image_size-' . $size, true );

							} else {

								add_image_size( $size, $image_sizes[ $size ][0], $image_sizes[ $size ][1], $image_sizes[ $size ][2] );

							}

						} // /foreach

					}

		}
	} // /wm_setup



	/**
	 * Set images: default image sizes
	 *
	 * @since    1.2.2
	 * @version  1.4.2
	 *
	 * @param  array $image_sizes
	 */
	if ( ! function_exists( 'wm_image_sizes' ) ) {
		function wm_image_sizes( $image_sizes ) {
			//Helper variables
				global $content_width;

			//Preparing output
				/**
				 * image_size = array(
				 *   width,
				 *   height,
				 *   cropped?,
				 *   theme_usage //Optional
				 * )
				 */
				$image_sizes = array(
						'thumbnail' => array(
								420,
								9999,
								false,
								__( 'In posts list.', 'wm_domain' )
							),
						'medium' => array(
								absint( $content_width ),
								9999,
								false
							),
						'large' => array(
								1200,
								9999,
								false,
								__( 'In single post or page.', 'wm_domain' )
							),
						'modern_banner' => array(
								1920,
								1080,
								true,
								__( 'In banner and post/page background.', 'wm_domain' )
							),
					);

			//Output
				return $image_sizes;
		}
	} // /wm_image_sizes



		/**
		 * Set images: register recommended image sizes notice
		 *
		 * @since    1.2.2
		 * @version  1.2.2
		 */
		if ( ! function_exists( 'wm_image_size_notice' ) ) {
			function wm_image_size_notice() {
				add_settings_field(
						//$id
						'recommended-image-sizes',
						//$title
						'',
						//$callback
						'wm_image_size_notice_html',
						//$page
						'media',
						//$section
						'default',
						//$args
						array()
					);

				register_setting(
						//$option_group
						'media',
						//$option_name
						'recommended-image-sizes',
						//$sanitize_callback
						'esc_attr'
					);
			}
		} // /wm_image_size_notice



		/**
		 * Set images: display recommended image sizes notice
		 *
		 * @since    1.2.2
		 * @version  1.3
		 */
		if ( ! function_exists( 'wm_image_size_notice_html' ) ) {
			function wm_image_size_notice_html() {
				//Helper variables
					$default_image_size_names = array(
							'thumbnail' => _x( 'Thumbnail size', 'WordPress predefined image size name.', 'wm_domain' ),
							'medium'    => _x( 'Medium size', 'WordPress predefined image size name.', 'wm_domain' ),
							'large'     => _x( 'Large size', 'WordPress predefined image size name.', 'wm_domain' ),
						);

					$image_sizes = array_filter( apply_filters( 'wmhook_wm_setup_image_sizes', array() ) );

				//Requirements check
					if ( empty( $image_sizes ) ) {
						return;
					}

				//Output
					echo '<style type="text/css" media="screen">'
						. '.recommended-image-sizes { display: inline-block; padding: 1.62em; border: 2px solid #dadcde; }'
						. '.recommended-image-sizes h3:first-child { margin-top: 0; }'
						. '.recommended-image-sizes table { margin-top: 1em; }'
						. '.recommended-image-sizes th, .recommended-image-sizes td { width: auto; padding: .19em 1em; border-bottom: 2px dotted #dadcde; vertical-align: top; }'
						. '.recommended-image-sizes thead th { padding: .62em 1em; border-bottom-style: solid; }'
						. '.recommended-image-sizes tr[title] { cursor: help; }'
						. '.recommended-image-sizes .small, .recommended-image-sizes tr[title] th, .recommended-image-sizes tr[title] td { font-size: .81em; }'
						. '</style>';

					echo '<div class="recommended-image-sizes">';

						do_action( 'wmhook_wm_image_size_notice_html_top' );

						echo '<h3>' . __( 'Recommended image sizes', 'wm_domain' ) . '</h3>'
							. '<p>' . __( 'For the theme to work correctly, please, set these recommended image sizes:', 'wm_domain' ) . '</p>';

						echo '<table>';

							echo '<thead>'
								. '<tr>'
								. '<th>' . __( 'Size name', 'wm_domain' ) . '</th>'
								. '<th>' . __( 'Size parameters', 'wm_domain' ) . '</th>'
								. '<th>' . __( 'Theme usage', 'wm_domain' ) . '</th>'
								. '</tr>'
								. '</thead>';

							echo '<tbody>';

								foreach ( $image_sizes as $size => $setup ) {

									if ( isset( $default_image_size_names[ $size ] ) ) {

										$crop = ( $setup[2] ) ? ( __( 'cropped', 'wm_domain' ) ) : ( __( 'scaled', 'wm_domain' ) );

										echo '<tr>'
											. '<th>' . $default_image_size_names[ $size ] . ':</th>'
											. '<td>' . sprintf(
													_x( '%1$s &times; %2$s, %3$s', '1: image width, 2: image height, 3: cropped or scaled?', 'wm_domain' ),
													$setup[0],
													$setup[1],
													$crop
												) . '</td>'
											. '<td class="small">' . ( ( isset( $setup[3] ) ) ? ( $setup[3] ) : ( '&mdash;' ) ) . '</td>'
											. '</tr>';

									} else {

										$crop = ( $setup[2] ) ? ( __( 'cropped', 'wm_domain' ) ) : ( __( 'scaled', 'wm_domain' ) );

										echo '<tr title="' . __( 'Additional image size added by the theme. Can not be changed on this page.', 'wm_domain' ) . '">'
											. '<th>' . '<code>' . $size . '</code>:</th>'
											. '<td>' . sprintf(
													_x( '%1$s &times; %2$s, %3$s', '1: image width, 2: image height, 3: cropped or scaled?', 'wm_domain' ),
													$setup[0],
													$setup[1],
													$crop
												) . '</td>'
											. '<td class="small">' . ( ( isset( $setup[3] ) ) ? ( $setup[3] ) : ( '&mdash;' ) ) . '</td>'
											. '</tr>';

									}

								} // /foreach

							echo '</tbody>';

						echo '</table>';

						do_action( 'wmhook_wm_image_size_notice_html_bottom' );

					echo '</div>';
			}
		} // /wm_image_size_notice_html



	/**
	 * Set typography: Google Fonts
	 *
	 * @since    1.3
	 * @version  1.4
	 *
	 * @param  array $fonts_setup
	 */
	if ( ! function_exists( 'wm_google_fonts' ) ) {
		function wm_google_fonts( $fonts_setup ) {
			//Helper variables
				$fonts_setup = array_unique( array_filter( array(
						get_theme_mod( 'font-family-body' ),
						get_theme_mod( 'font-family-headings' )
					) ) );

				if (
						! is_admin()
						&& ! ( function_exists( 'jetpack_get_site_logo' ) && jetpack_get_site_logo( 'id' ) )
						&& get_theme_mod( 'font-family-logo' )
					)  {
					$fonts_setup[] = get_theme_mod( 'font-family-logo' );
				}

				if ( empty( $fonts_setup ) ) {
					$fonts_setup = array( 'Fira Sans:400,300' );
				}

			//Output
				return $fonts_setup;
		}
	} // /wm_google_fonts





/**
 * 40) Assets and design
 */

	/**
	 * Registering theme styles and scripts
	 *
	 * @since    1.0
	 * @version  1.4.2
	 */
	if ( ! function_exists( 'wm_register_assets' ) ) {
		function wm_register_assets() {

			//Helper variables
				$version = esc_attr( trim( wp_get_theme()->get( 'Version' ) ) );

			/**
			 * Styles
			 */

				$register_styles = apply_filters( 'wmhook_wm_register_assets_register_styles', array(
						'wm-genericons'   => array( wm_get_stylesheet_directory_uri( 'genericons/genericons.css' ) ),
						'wm-google-fonts' => array( wm_google_fonts_url() ),
						'wm-starter'      => array( wm_get_stylesheet_directory_uri( 'css/starter.css' ) ),
						'wm-stylesheet'   => array( 'src' => get_stylesheet_uri(), 'deps' => array( 'wm-genericons', 'wm-slick', 'wm-starter' ) ),
						'wm-colors'       => array( wm_get_stylesheet_directory_uri( 'css/colors.css' ), 'deps' => array( 'wm-stylesheet' ) ),
						'wm-slick'        => array( wm_get_stylesheet_directory_uri( 'css/slick.css' ) ),
					) );

				foreach ( $register_styles as $handle => $atts ) {
					$src   = ( isset( $atts['src'] )   ) ? ( $atts['src']   ) : ( $atts[0] );
					$deps  = ( isset( $atts['deps'] )  ) ? ( $atts['deps']  ) : ( false    );
					$ver   = ( isset( $atts['ver'] )   ) ? ( $atts['ver']   ) : ( $version );
					$media = ( isset( $atts['media'] ) ) ? ( $atts['media'] ) : ( 'all'    );

					wp_register_style( $handle, $src, $deps, $ver, $media );
				}

			/**
			 * Scripts
			 */

				$register_scripts = apply_filters( 'wmhook_wm_register_assets_register_scripts', array(
						'wm-imagesloaded'        => array( wm_get_stylesheet_directory_uri( 'js/imagesloaded.pkgd.min.js' ) ),
						'wm-slick'               => array( wm_get_stylesheet_directory_uri( 'js/slick.min.js' ) ),
						'wm-scripts-global'      => array( 'src' => wm_get_stylesheet_directory_uri( 'js/scripts-global.js' ), 'deps' => array( 'wm-imagesloaded', 'wm-slick' ) ),
						'wm-skip-link-focus-fix' => array( wm_get_stylesheet_directory_uri( 'js/skip-link-focus-fix.js' ) ),
					) );

				foreach ( $register_scripts as $handle => $atts ) {
					$src       = ( isset( $atts['src'] )       ) ? ( $atts['src']       ) : ( $atts[0]          );
					$deps      = ( isset( $atts['deps'] )      ) ? ( $atts['deps']      ) : ( array( 'jquery' ) );
					$ver       = ( isset( $atts['ver'] )       ) ? ( $atts['ver']       ) : ( $version          );
					$in_footer = ( isset( $atts['in_footer'] ) ) ? ( $atts['in_footer'] ) : ( true              );

					wp_register_script( $handle, $src, $deps, $ver, $in_footer );
				}

		}
	} // /wm_register_assets



	/**
	 * Frontend HTML head assets enqueue
	 *
	 * @since    1.0
	 * @version  1.4.2
	 */
	if ( ! function_exists( 'wm_enqueue_assets' ) ) {
		function wm_enqueue_assets() {

			//Helper variables
				$enqueue_styles = $enqueue_scripts = array();

				$custom_styles = wm_custom_styles();

				$inline_styles_handle = ( wp_style_is( 'wm-colors', 'registered' ) ) ? ( 'wm-colors' ) : ( 'wm-stylesheet' );
				$inline_styles_handle = apply_filters( 'wmhook_wm_enqueue_assets_inline_styles_handle', $inline_styles_handle );

			/**
			 * Styles
			 */

				//Google Fonts
					if ( wm_google_fonts_url() ) {
						$enqueue_styles[] = 'wm-google-fonts';
					}
				//Main
					$enqueue_styles[] = 'wm-stylesheet';

				//Colors
					if ( 'wm-colors' === $inline_styles_handle ) {
						$enqueue_styles[] = 'wm-colors';
					}

				$enqueue_styles = apply_filters( 'wmhook_wm_enqueue_assets_enqueue_styles', $enqueue_styles );

				foreach ( $enqueue_styles as $handle ) {
					wp_enqueue_style( $handle );
				}

			/**
			 * Styles - inline
			 */

				//Customizer setup custom styles
					if ( $custom_styles ) {
						wp_add_inline_style( $inline_styles_handle, "\r\n" . apply_filters( 'wmhook_esc_css', $custom_styles ) . "\r\n" );
					}
				//Custom styles set in post/page 'custom-css' custom field
					if (
							is_singular()
							&& $output = get_post_meta( get_the_ID(), 'custom_css', true )
						) {
						$output = apply_filters( 'wmhook_wm_enqueue_assets_singular_inline_styles', "\r\n\r\n/* Custom singular styles */\r\n" . $output . "\r\n" );

						wp_add_inline_style( $inline_styles_handle, apply_filters( 'wmhook_esc_css', $output ) . "\r\n" );
					}

			/**
			 * Scripts
			 */

				//Masonry footer only if there are more widgets in footer than columns settings
					$footer_widgets = wp_get_sidebars_widgets();
					if (
							is_array( $footer_widgets )
							&& isset( $footer_widgets['footer'] )
							&& count( $footer_widgets['footer'] ) > absint( apply_filters( 'wmhook_widgets_columns', 3, 'footer' ) )
						) {
						$enqueue_scripts[] = 'jquery-masonry';
					}

				//Global theme scripts
					$enqueue_scripts[] = 'wm-scripts-global';

				//Skip link focus fix
					$enqueue_scripts[] = 'wm-skip-link-focus-fix';

				$enqueue_scripts = apply_filters( 'wmhook_wm_enqueue_assets_enqueue_scripts', $enqueue_scripts );

				foreach ( $enqueue_scripts as $handle ) {
					wp_enqueue_script( $handle );
				}

		}
	} // /wm_enqueue_assets



	/**
	 * Enqueue comment-reply.js the right way
	 *
	 * @since    1.4.2
	 * @version  1.4.2
	 */
	if ( ! function_exists( 'wm_comment_reply_js_enqueue' ) ) {
		function wm_comment_reply_js_enqueue() {
			if ( get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}
	} // /wm_comment_reply_js_enqueue



	/**
	 * Customizer controls assets enqueue
	 *
	 * @since    1.3
	 * @version  1.4.2
	 */
	if ( ! function_exists( 'wm_customizer_enqueue_assets' ) ) {
		function wm_customizer_enqueue_assets() {
			//Styles
				wp_enqueue_style(
						'wm-customizer',
						get_template_directory_uri() . '/css/customizer.css',
						false,
						esc_attr( trim( wp_get_theme()->get( 'Version' ) ) ),
						'all'
					);
		}
	} // /wm_customizer_enqueue_assets



		/**
		 * Customizer preview assets enqueue
		 *
		 * @since    1.3
		 * @version  1.4.2
		 */
		if ( ! function_exists( 'wm_customizer_preview_enqueue_assets' ) ) {
			function wm_customizer_preview_enqueue_assets() {
				//Scripts
					wp_enqueue_script(
							'wm-customizer-preview',
							wm_get_stylesheet_directory_uri( 'js/customizer-preview.js' ),
							array( 'customize-preview' ),
							esc_attr( trim( wp_get_theme()->get( 'Version' ) ) ),
							true
						);
			}
		} // /wm_customizer_preview_enqueue_assets



	/**
	 * HTML Body classes
	 *
	 * @since    1.0
	 * @version  1.3
	 *
	 * @param  array $classes
	 */
	if ( ! function_exists( 'wm_body_classes' ) ) {
		function wm_body_classes( $classes ) {
			//Helper variables
				$body_classes = array();

				$i = 0;

			//Preparing output
				//Is not front page?
					if ( ! is_front_page() ) {
						$body_classes['not-front-page'] = ++$i;
					}

				//Singular?
					if ( is_singular() ) {
						$body_classes['is-singular'] = ++$i;
					} else {
						$body_classes['is-not-singular'] = ++$i;
					}

				//Has featured image?
					if ( is_singular() && has_post_thumbnail() ) {
						$body_classes['has-post-thumbnail'] = ++$i;
					}

				//Is posts list?
					if ( is_archive() || is_search() ) {
						$body_classes['is-posts-list'] = ++$i;
					}

				//Featured posts
					if (
							class_exists( 'NS_Featured_Posts' )
							&& (
									is_home()
									|| is_archive()
									|| is_search()
								)
						) {
						$body_classes['has-featured-posts'] = ++$i;
					}

				//Enable hiding site navigation and footer credits on down scroll
					$body_classes['downscroll-enabled'] = ++$i;

			//Output
				$body_classes = array_filter( (array) apply_filters( 'wmhook_wm_body_classes_output', $body_classes ) );
				$classes      = array_merge( $classes, array_flip( $body_classes ) );

				asort( $classes );

				return $classes;
		}
	} // /wm_body_classes



	/**
	 * Post classes
	 *
	 * @since    1.3
	 * @version  1.3
	 *
	 * @param  array $classes
	 */
	if ( ! function_exists( 'wm_post_classes' ) ) {
		function wm_post_classes( $classes ) {
			//Preparing output
				//Sticky post
					/**
					 * On paginated posts list the sticky class is not
					 * being applied, so, we need to compensate.
					 */
					if ( is_sticky() ) {
						$classes[] = 'is-sticky';
					}

				//Featured post
					if (
							class_exists( 'NS_Featured_Posts' )
							&& get_post_meta( get_the_ID(), '_is_ns_featured_post', true )
						) {
						$classes[] = 'is-featured';
					}

			//Output
				return $classes;
		}
	} // /wm_post_classes



	/**
	 * Add featured image as background image to post navs
	 *
	 * @since    1.0
	 * @version  1.2
	 */
	if ( ! function_exists( 'wm_post_nav_background' ) ) {
		function wm_post_nav_background() {
			//Requrements check
				if ( ! is_single() ) {
					return;
				}

			//Helper variables
				$output   = '';
				$previous = ( is_attachment() ) ? ( get_post( get_post()->post_parent ) ) : ( get_adjacent_post( false, '', true ) );
				$next     = get_adjacent_post( false, '', false );

				if (
						is_attachment()
						&& 'attachment' == $previous->post_type
					) {
					return;
				}

			//Preparing output
				if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
					$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
					$output .= '.post-navigation .nav-previous { background-image: url(\'' . esc_url( $prevthumb[0] ) . '\'); }';
				}

				if ( $next && has_post_thumbnail( $next->ID ) ) {
					$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
					$output .= '.post-navigation .nav-next { background-image: url(\'' . esc_url( $nextthumb[0] ) . '\'); }';
				}

				$output = apply_filters( 'wmhook_wm_post_nav_background_output', $output );

			//Output
				wp_add_inline_style( 'wm-stylesheet', apply_filters( 'wmhook_esc_css', $output ) . "\r\n" );
		}
	} // /wm_post_nav_background





/**
 * 50) Site global markup
 */

	/**
	 * Website DOCTYPE
	 *
	 * @since    1.0
	 * @version  1.1
	 */
	if ( ! function_exists( 'wm_doctype' ) ) {
		function wm_doctype() {
			echo '<!doctype html>';
		}
	} // /wm_doctype



	/**
	 * Website HEAD
	 *
	 * @since    1.0
	 * @version  1.1
	 */
	if ( ! function_exists( 'wm_head' ) ) {
		function wm_head() {
			//Helper variables
				$output = array();

			//Preparing output
				$output[10] = '<meta charset="' . get_bloginfo( 'charset' ) . '" />';
				$output[20] = '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />';
				$output[30] = '<link rel="profile" href="http://gmpg.org/xfn/11" />';
				$output[40] = '<link rel="pingback" href="' . get_bloginfo( 'pingback_url' ) . '" />';

				//Filter output array
					$output = apply_filters( 'wmhook_wm_head_output_array', $output );

			//Output
				echo apply_filters( 'wmhook_wm_head_output', implode( "\r\n", $output ) . "\r\n" );
		}
	} // /wm_head



	/**
	 * Body top
	 *
	 * @since    1.0
	 * @version  1.1
	 */
	if ( ! function_exists( 'wm_site_top' ) ) {
		function wm_site_top() {
			//Helper variables
				$output  = '<div id="page" class="hfeed site">' . "\r\n";
				$output .= "\t" . '<div class="site-inner">' . "\r\n";

			//Output
				echo $output;
		}
	} // /wm_site_top



		/**
		 * Body bottom
		 *
		 * @since    1.0
		 * @version  1.1
		 */
		if ( ! function_exists( 'wm_site_bottom' ) ) {
			function wm_site_bottom() {
				//Helper variables
					$output  = "\r\n\t" . '</div><!-- /.site-inner -->';
					$output .= "\r\n" . '</div><!-- /#page -->' . "\r\n\r\n";

				//Output
					echo $output;
			}
		} // /wm_site_bottom



	/**
	 * Header top
	 *
	 * @since    1.0
	 * @version  1.1
	 */
	if ( ! function_exists( 'wm_header_top' ) ) {
		function wm_header_top() {
			//Preparing output
				$output = "\r\n\r\n" . '<header id="masthead" class="site-header" role="banner"' . wm_schema_org( 'WPHeader' ) . '>' . "\r\n\r\n";

			//Output
				echo $output;
		}
	} // /wm_header_top



		/**
		 * Header bottom
		 *
		 * @since    1.0
		 * @version  1.1
		 */
		if ( ! function_exists( 'wm_header_bottom' ) ) {
			function wm_header_bottom() {
				//Helper variables
					$output = "\r\n\r\n" . '</header>' . "\r\n\r\n";

				//Output
					echo $output;
			}
		} // /wm_header_bottom



		/**
		 * Display social links
		 */
		if ( ! function_exists( 'wm_menu_social' ) ) {
			function wm_menu_social() {
				get_template_part( 'menu', 'social' );
			}
		} // /wm_menu_social



	/**
	 * Navigation
	 *
	 * @since    1.0
	 * @version  1.2
	 */
	if ( ! function_exists( 'wm_navigation' ) ) {
		function wm_navigation() {
			//Helper variables
				$output = '';

				$args = apply_filters( 'wmhook_wm_navigation_args', array(
						'theme_location'  => 'primary',
						'container'       => 'div',
						'container_class' => 'menu',
						'menu_class'      => 'menu', //fallback for pagelist
						'echo'            => false,
						'items_wrap'      => '<ul>%3$s</ul>',
					) );

			//Preparing output
				$output .= '<nav id="site-navigation" class="main-navigation" role="navigation"' . wm_schema_org( 'SiteNavigationElement' ) . '>';
					$output .= '<span class="screen-reader-text">' . sprintf( __( '%s site navigation', 'wm_domain' ), get_bloginfo( 'name' ) ) . '</span>';
					$output .= wm_accessibility_skip_link( 'to_content' );
					$output .= '<div class="main-navigation-inner">';
						$output .= wp_nav_menu( $args );
						$output .= '<div id="nav-search-form" class="nav-search-form"><a href="#" id="search-toggle" class="search-toggle"><span class="screen-reader-text">' . _x( 'Search', 'Display search form button title.', 'wm_domain' ) . '</span></a>' . get_search_form( false ) . '</div>';
					$output .= '</div>';
					$output .= '<button id="menu-toggle" class="menu-toggle" aria-controls="site-navigation" aria-expanded="false">' . _x( 'Menu', 'Mobile navigation toggle button title.', 'wm_domain' ) . '</button>';
				$output .= '</nav>';

			//Output
				echo apply_filters( 'wmhook_wm_navigation_output', $output );
		}
	} // /wm_navigation



		/**
		 * Navigation item classes
		 *
		 * @since    1.0
		 * @version  1.2
		 *
		 * @param  array  $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param  object $item    The current menu item.
		 * @param  array  $args    An array of wp_nav_menu() arguments.
		 * @param  int    $depth   Depth of menu item. Used for padding. Since WordPress 4.1.
		 */
		if ( ! function_exists( 'wm_nav_item_classes' ) ) {
			function wm_nav_item_classes( $classes, $item, $args, $depth = 0 ) {
				//Requirements check
					if ( ! isset( $item->title ) ) {
						return $classes;
					}

				//Preparing output
					//Converting array to string for searching the specific class name parts
						$classes = implode( ' ', $classes );

					//General class for active menu
						if ( false !== strpos( $classes, 'current-menu' ) ) {
							$classes .= ' active-menu-item';
						}

					//Converting the string back to array
						$classes = explode( ' ', $classes );

				//Output
					return $classes;
			}
		} // /wm_nav_item_classes



		/**
		 * Navigation item improvements
		 */
		if ( ! function_exists( 'wm_nav_item_process' ) ) {
			function wm_nav_item_process( $item_output, $item, $depth, $args ) {
				//Preparing output
					//Display item description
						if (
								'primary' == $args->theme_location
								&& trim( $item->description )
							) {
							$item_output = str_replace( $args->link_after . '</a>', '<span class="menu-item-description">' . trim( $item->description ) . '</span>' . $args->link_after . '</a>', $item_output );
						}

				//Output
					return $item_output;
			}
		} // /wm_nav_item_process



	/**
	 * Post/page heading (title)
	 *
	 * @since    1.0
	 * @version  1.2.1
	 *
	 * @param  array $args Heading setup arguments
	 */
	if ( ! function_exists( 'wm_post_title' ) ) {
		function wm_post_title( $args = array() ) {
			//Helper variables
				global $post;

				//Requirements check
					if (
							! ( $title = get_the_title() )
							|| apply_filters( 'wmhook_wm_post_title_disable', false )
						) {
						return;
					}

				$output = '';

				$args = wp_parse_args( $args, apply_filters( 'wmhook_wm_post_title_defaults', array(
						'class'           => 'entry-title',
						'class_container' => 'entry-header',
						'link'            => esc_url( get_permalink() ),
						'output'          => '<header class="{class_container}"><{tag} class="{class}"' . wm_schema_org( 'name' ) . '>{title}</{tag}></header>',
						'tag'             => 'h1',
						'title'           => '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $title . '</a>',
					) ) );

			//Preparing output
				//Singular title (no link applied)
					if (
							is_single()
							|| ( is_page() && 'page' === get_post_type() ) //not to display the below stuff on posts list on static front page
						) {

						if ( $suffix = wm_paginated_suffix( 'small' ) ) {
							$args['title'] .= $suffix;
						} else {
							$args['title'] = $title;
						}

						if ( ( $helper = get_edit_post_link( get_the_ID() ) ) && is_page() ) {
							$args['title'] .= ' <a href="' . esc_url( $helper ) . '" class="entry-edit" title="' . esc_attr( sprintf( __( 'Edit the "%s"', 'wm_domain' ), the_title_attribute( array( 'echo' => false ) ) ) ) . '"><span>' . _x( 'Edit', 'Edit post link.', 'wm_domain' ) . '</span></a>';
						}

					}

				//Filter processed $args
					$args = apply_filters( 'wmhook_wm_post_title_args', $args );

				//Generating output HTML
					$replacements = apply_filters( 'wmhook_wm_post_title_replacements', array(
							'{class}'           => esc_attr( $args['class'] ),
							'{class_container}' => esc_attr( $args['class_container'] ),
							'{tag}'             => esc_attr( $args['tag'] ),
							'{title}'           => do_shortcode( $args['title'] ),
						), $args );
					$output = strtr( $args['output'], $replacements );

			//Output
				echo apply_filters( 'wmhook_wm_post_title_output', $output, $args );
		}
	} // /wm_post_title



		/**
		 * Disable post title
		 *
		 * @since    1.2
		 * @version  1.2
		 *
		 * @param  bool $disable
		 */
		if ( ! function_exists( 'wm_disable_post_title' ) ) {
			function wm_disable_post_title( $disable ) {
				//Helper variables
					$disabled_post_formats = array( 'link', 'quote', 'status' );
					if ( ! is_single() && has_excerpt() ) {
						$disabled_post_formats[] = 'image';
					}

				//Preparing output
					if ( in_array( get_post_format(), $disabled_post_formats ) ) {
						$disable = true;
					}

				//Output
					return $disable;
			}
		} // /wm_disable_post_title



	/**
	 * Content top
	 *
	 * @since    1.0
	 * @version  1.1
	 */
	if ( ! function_exists( 'wm_content_top' ) ) {
		function wm_content_top() {
			//Helper variables
				$output  = "\r\n\r\n" . '<div id="content" class="site-content">';
				$output .= "\r\n\r\n" . wm_get_breadcrumbs();
				$output .= "\r\n\t"   . '<div id="primary" class="content-area">';
				$output .= "\r\n\t\t" . '<main id="main" class="site-main clearfix" role="main">' . "\r\n\r\n";

			//Output
				echo $output;
		}
	} // /wm_content_top



		/**
		 * Content bottom
		 *
		 * @since    1.0
		 * @version  1.1
		 */
		if ( ! function_exists( 'wm_content_bottom' ) ) {
			function wm_content_bottom() {
				//Helper variables
					$output  = "\r\n\r\n\t\t" . '</main><!-- /#main -->';
					$output .= "\r\n\t"       . '</div><!-- /#primary -->';
					$output .= "\r\n"         . '</div><!-- /#content -->' . "\r\n\r\n";

				//Output
					echo $output;
			}
		} // /wm_content_bottom



		/**
		 * Breadcrumbs
		 *
		 * @since    1.1
		 * @version  1.1
		 */
		if ( ! function_exists( 'wm_get_breadcrumbs' ) ) {
			function wm_get_breadcrumbs() {
				if ( function_exists( 'bcn_display' ) && ! is_front_page() ) {
					return '<div class="breadcrumbs-container"><nav class="breadcrumbs" itemprop="breadcrumbs">' . bcn_display( true ) . '</nav></div>';
				}
			}
		} // /wm_get_breadcrumbs



		/**
		 * Entry container attributes
		 *
		 * @since    1.0
		 * @version  1.2
		 */
		if ( ! function_exists( 'wm_entry_container_atts' ) ) {
			function wm_entry_container_atts() {
				return wm_schema_org( 'entry' );
			}
		} // /wm_entry_container_atts



		/**
		 * Entry top
		 *
		 * @since    1.0
		 * @version  1.2
		 */
		if ( ! function_exists( 'wm_entry_top' ) ) {
			function wm_entry_top() {
				//Post meta
					if ( in_array( get_post_type(), apply_filters( 'wmhook_wm_entry_top_meta_post_types', array( 'post', 'jetpack-portfolio' ) ) ) ) {

						if ( is_single() ) {

							echo wm_post_meta( apply_filters( 'wmhook_wm_entry_top_meta', array(
									'class' => 'entry-meta entry-meta-top',
									'meta'  => array( 'edit', 'date', 'likes', 'category', 'author' ),
								) ) );

						}

					}
			}
		} // /wm_entry_top



		/**
		 * Entry bottom
		 *
		 * @since    1.0
		 * @version  1.2
		 */
		if ( ! function_exists( 'wm_entry_bottom' ) ) {
			function wm_entry_bottom() {
				//Post meta
					if ( in_array( get_post_type(), apply_filters( 'wmhook_wm_entry_bottom_meta_post_types', array( 'post' ) ) ) ) {

						if ( is_single() ) {

							echo wm_post_meta( apply_filters( 'wmhook_wm_entry_bottom_meta', array(
									'class' => 'entry-meta entry-meta-bottom',
									'meta'  => array( 'edit', 'tags' ),
								) ) );

						} else {

							echo wm_post_meta( apply_filters( 'wmhook_wm_entry_bottom_meta', array(
									'class'       => 'entry-meta',
									'meta'        => array( 'date', 'comments', 'likes' ),
									'date_format' => 'j M Y',
								) ) );

						}

					}
			}
		} // /wm_entry_bottom



		/**
		 * Entry after
		 *
		 * @since    1.0
		 * @version  1.3
		 */
		if ( ! function_exists( 'wm_entry_after' ) ) {
			function wm_entry_after() {
				//Comments
					if (
							! ( is_page() && is_front_page() )
							&& ! is_page_template()
						) {
						comments_template( '', true );
					}
			}
		} // /wm_entry_after



		/**
		 * Sticky post label
		 */
		if ( ! function_exists( 'wm_sticky_label' ) ) {
			function wm_sticky_label() {
				if ( is_sticky() ) {
					echo '<div class="label-sticky" title="' . __( 'This is sticky post', 'wm_domain' ) . '"><i class="genericon genericon-pinned"></i></div>';
				}
			}
		} // /wm_sticky_label



		/**
		 * Post thumbnail (featured image) display size
		 *
		 * @since    1.3
		 * @version  1.3
		 *
		 * @param  string $image_size
		 */
		if ( ! function_exists( 'wm_post_thumbnail_size' ) ) {
			function wm_post_thumbnail_size( $image_size ) {
				//Preparing output
					if (
							is_single( get_the_ID() )
							|| is_page()
						) {

						$image_size = 'large';

					} else {

						$image_size = 'thumbnail';

					}

				//Output
					return $image_size;
			}
		} // /wm_post_thumbnail_size



		/**
		 * Excerpt
		 *
		 * Displays the excerpt properly.
		 * If the post is password protected, display a message.
		 * If the post has more tag, display the content appropriately.
		 *
		 * @since    1.0
		 * @version  1.2
		 *
		 * @param  string $excerpt
		 */
		if ( ! function_exists( 'wm_excerpt' ) ) {
			function wm_excerpt( $excerpt ) {
				//Requirements check
					if ( post_password_required() ) {
						if ( ! is_single() ) {
							return sprintf( __( 'This content is password protected. To view it please <a%s>enter the password</a>.', 'wm_domain' ), ' href="' . esc_url( get_permalink() ) . '"' );
						}
						return;
					}

				//Preparing output
					if (
							! is_single()
							&& wm_has_more_tag()
						) {

						/**
						 * Post has more tag
						 */

							//Required for <!--more--> tag to work
								global $more;
								$more = 0;

							if ( has_excerpt() ) {
								$excerpt = '<p class="post-excerpt has-more-tag">' . get_the_excerpt() . '</p>';
							}
							$excerpt = apply_filters( 'the_content', $excerpt . get_the_content( '' ) );

					} else {

						/**
						 * Default excerpt for posts without more tag
						 */

							$excerpt = strtr( $excerpt, apply_filters( 'wmhook_wm_excerpt_replacements', array( '<p' => '<p class="post-excerpt"' ) ) );

					}

					//Adding "Continue reading" link
						if (
								! is_single()
								&& in_array( get_post_type(), apply_filters( 'wmhook_wm_excerpt_continue_reading_post_type', array( 'post', 'page' ) ) )
							) {
							$excerpt .= apply_filters( 'wmhook_wm_excerpt_continue_reading', '' );
						}

				//Output
					return $excerpt;
			}
		} // /wm_excerpt



			/**
			 * Excerpt length
			 *
			 * @param  absint $length
			 */
			if ( ! function_exists( 'wm_excerpt_length' ) ) {
				function wm_excerpt_length( $length ) {
					return 20;
				}
			} // /wm_excerpt_length



			/**
			 * Excerpt more
			 *
			 * @param  string $more
			 */
			if ( ! function_exists( 'wm_excerpt_more' ) ) {
				function wm_excerpt_more( $more ) {
					return '&hellip;';
				}
			} // /wm_excerpt_more



			/**
			 * Excerpt "Continue reading" text
			 *
			 * @since    1.0
			 * @version  1.2
			 *
			 * @param  string $continue
			 */
			if ( ! function_exists( 'wm_excerpt_continue_reading' ) ) {
				function wm_excerpt_continue_reading( $continue ) {
					return '<div class="link-more"><a href="' . esc_url( get_permalink() ) . '">' . sprintf( __( 'Continue reading%s&hellip;', 'wm_domain' ), '<span class="screen-reader-text"> "' . get_the_title() . '"</span>' ) . '</a></div>';
				}
			} // /wm_excerpt_continue_reading



		/**
		 * Previous and next post links
		 *
		 * Since WordPress 4.1 you can use the_post_navigation() and/or get_the_post_navigation().
		 * However, you are modifying markup by applying custom classes, so stick with this
		 * cusotm function for now.
		 *
		 * @todo  Transfer to WordPress 4.1+ core functionality.
		 */
		if ( ! function_exists( 'wm_post_nav' ) ) {
			function wm_post_nav() {
				//Requirements check
					if ( ! is_singular() || is_page() ) {
						return;
					}

				//Helper variables
					$output = $prev_class = $next_class = '';

					$previous = ( is_attachment() ) ? ( get_post( get_post()->post_parent ) ) : ( get_adjacent_post( false, '', true ) );
					$next     = get_adjacent_post( false, '', false );

				//Requirements check
					if (
							( ! $next && ! $previous )
							|| ( is_attachment() && 'attachment' == $previous->post_type )
						) {
						return;
					}

				//Preparing output
					if ( $previous && has_post_thumbnail( $previous->ID ) ) {
						$prev_class = " has-post-thumbnail";
					}
					if ( $next && has_post_thumbnail( $next->ID ) ) {
						$next_class = " has-post-thumbnail";
					}

					if ( is_attachment() ) {
						$output .= get_previous_post_link( '<div class="nav-previous' . $prev_class . '">%link</div>', __( '<span class="meta-nav">Published In</span><span class="post-title">%title</span>', 'wm_domain' ) );
					} else {
						$output .= get_previous_post_link( '<div class="nav-previous' . $prev_class . '">%link</div>', __( '<span class="meta-nav">Previous</span><span class="post-title">%title</span>', 'wm_domain' ) );
						$output .= get_next_post_link( '<div class="nav-next' . $next_class . '">%link</div>', __( '<span class="meta-nav">Next</span><span class="post-title">%title</span>', 'wm_domain' ) );
					}

					if ( $output ) {
						$output = '<nav class="navigation post-navigation" role="navigation"><h1 class="screen-reader-text">' . __( 'Post navigation', 'wm_domain' ) . '</h1><div class="nav-links">' . $output . '</div></nav>';
					}

				//Output
					echo apply_filters( 'wmhook_wm_post_nav_output', $output );
			}
		} // /wm_post_nav



		/**
		 * Pagination
		 *
		 * @since    1.0
		 * @version  1.4
		 */
		if ( ! function_exists( 'wm_pagination' ) ) {
			function wm_pagination() {
				//Requirements check
					if ( class_exists( 'The_Neverending_Home_Page' ) ) {
						//Don't display pagination if Jetpack Infinite Scroll in use
							return;
					}

				//Helper variables
					global $wp_query, $wp_rewrite;

					$output = '';

					$pagination = array(
							'prev_text' => '&laquo;',
							'next_text' => '&raquo;',
						);

				//Preparing output
					if ( $output = paginate_links( $pagination ) ) {
						$output = '<div class="pagination">' . $output . '</div>';
					}

				//Output
					echo $output;
			}
		} // /wm_pagination



		/**
		 * Front page blog more link
		 */
		if ( ! function_exists( 'wm_blog_more_link' ) ) {
			function wm_blog_more_link() {
				if ( $page_for_posts_id = absint( get_option( 'page_for_posts' ) ) ) {
					echo '<div class="archive-link"><a href="' . esc_url( get_permalink( $page_for_posts_id ) ) . '" class="button">' . __( 'All posts', 'wm_domain' ) . '</a></div>';
				}
			}
		} // /wm_blog_more_link



			/**
			 * Front page portfolio more link
			 */
			if ( ! function_exists( 'wm_portfolio_more_link' ) ) {
				function wm_portfolio_more_link() {
					echo '<div class="archive-link"><a href="' . esc_url( get_post_type_archive_link( 'jetpack-portfolio' ) ) . '" class="button">' . __( 'All projects', 'wm_domain' ) . '</a></div>';
				}
			} // /wm_portfolio_more_link



	/**
	 * Footer
	 *
	 * Theme author credits:
	 * =====================
	 * It is completely optional, but if you like this
	 * WordPress theme, I would appreciate it if you keep the credit link
	 * in the theme's footer area.
	 *
	 * @since    1.0
	 * @version  1.4.2
	 */
	if ( ! function_exists( 'wm_footer' ) ) {
		function wm_footer() {
			//Footer widgets
				get_sidebar( 'footer' );

			//Credits
				echo '<div class="site-footer-area footer-area-site-info">';
					echo '<div class="site-info-container">';
						echo '<div class="site-info" role="contentinfo">';
							echo apply_filters( 'wmhook_wm_credits_output',
									'&copy; ' . date( 'Y' ) . ' <a href="' . home_url( '/' ) . '" title="' . get_bloginfo( 'name' ) . '">' . get_bloginfo( 'name' ) . '</a>. '
									. sprintf(
											__( 'Powered by %s.', 'wm_domain' ),
											'<a href="https://wordpress.org">WordPress</a>'
										)
									. ' '
									. sprintf(
											__( 'Theme by %s.', 'wm_domain' ),
											'<a href="' . esc_url( wp_get_theme()->get( 'AuthorURI' ) ) . '">WebMan Design</a>'
										)
									. ' <a href="#top" id="back-to-top" class="back-to-top">' . __( 'Back to top &uarr;', 'wm_domain' ) . '</a>'
								);
						echo '</div>';
						wm_menu_social();
					echo '</div>';
				echo '</div>';
		}
	} // /wm_footer



		/**
		 * Footer top
		 *
		 * @since    1.0
		 * @version  1.1
		 */
		if ( ! function_exists( 'wm_footer_top' ) ) {
			function wm_footer_top() {
				//Preparing output
					$output = "\r\n\r\n" . '<footer id="colophon" class="site-footer"' . wm_schema_org( 'WPFooter' ) . '>' . "\r\n\r\n";

				//Output
					echo $output;
			}
		} // /wm_footer_top



		/**
		 * Footer bottom
		 *
		 * @since    1.0
		 * @version  1.1
		 */
		if ( ! function_exists( 'wm_footer_bottom' ) ) {
			function wm_footer_bottom() {
				//Preparing output
					$output = "\r\n\r\n" . '</footer>' . "\r\n\r\n";

				//Output
					echo $output;
			}
		} // /wm_footer_bottom



		/**
		 * Website footer custom scripts
		 *
		 * Outputs custom scripts set in post/page 'custom-js' custom field.
		 *
		 * @since    1.0
		 * @version  1.1
		 */
		if ( ! function_exists( 'wm_footer_custom_scripts' ) ) {
			function wm_footer_custom_scripts() {
				//Requirements check
					if (
							! is_singular()
							|| ! ( $output = get_post_meta( get_the_ID(), 'custom_js', true ) )
						) {
						return;
					}

				//Helper variables
					$output = "\r\n\r\n<!--Custom singular JS -->\r\n<script type='text/javascript'>\r\n/* <![CDATA[ */\r\n" . wp_unslash( esc_js( str_replace( array( "\r", "\n", "\t" ), '', $output ) ) ) . "\r\n/* ]]> */\r\n</script>\r\n";

				//Output
					echo apply_filters( 'wmhook_wm_footer_custom_scripts_output', $output );
			}
		} // /wm_footer_custom_scripts





/**
 * 100) Other functions
 */

	/**
	 * Register predefined widget areas (sidebars)
	 */
	if ( ! function_exists( 'wm_register_widget_areas' ) ) {
		function wm_register_widget_areas() {
			foreach( wm_helper_var( 'widget-areas' ) as $id => $area ) {
				register_sidebar( array(
						'id'            => $id,
						'name'          => $area['name'],
						'description'   => $area['description'],
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h3 class="widget-title">',
						'after_title'   => '</h3>'
					) );
			}
		}
	} // /wm_register_widget_areas



	/**
	 * Ignore sticky posts in main loop
	 *
	 * @param  obj $query
	 */
	if ( ! function_exists( 'wm_home_query_ignore_sticky_posts' ) ) {
		function wm_home_query_ignore_sticky_posts( $query ) {
			if (
					$query->is_home()
					&& $query->is_main_query()
				) {
				$query->set( 'ignore_sticky_posts', 1 );
			}
		}
	} // /wm_home_query_ignore_sticky_posts



	/**
	 * Include additional JavaScript when [gallery] shortcode used
	 *
	 * Not really satisfied with this solution as we're hooking into filter,
	 * but have no choice as there is no action hook in the gallery_shortcode()
	 * WordPress function.
	 *
	 * @see  wp-includes/media.php > gallery_shortcode()
	 *
	 * @param  string $output
	 * @param  array  $attr
	 */
	if ( ! function_exists( 'wm_shortcode_gallery_assets' ) ) {
		function wm_shortcode_gallery_assets( $output, $attr ) {
			wp_enqueue_script( 'jquery-masonry' );
			return $output;
		}
	} // /wm_shortcode_gallery_assets



	/**
	 * Include Visual Editor addons
	 *
	 * @since    1.2
	 * @version  1.2
	 */
	if ( ! function_exists( 'wm_visual_editor' ) ) {
		function wm_visual_editor() {
			if ( is_admin() || isset( $_GET['fl_builder'] ) ) {
				locate_template( WM_INC_DIR . 'lib/visual-editor.php', true );
			}
		}
	} // /wm_visual_editor



	/**
	 * Conditional not to display featured image on single post/page
	 */
	if ( ! function_exists( 'wm_post_media_display' ) ) {
		function wm_post_media_display() {
			return ! is_page_template( 'page-template/_sidebar.php' );
		}
	} // /wm_post_media_display



	/**
	 * Font CSS name
	 *
	 * @param  string $value       @see wm_custom_styles_value()
	 * @param  array  $skin_option @see wm_custom_styles_value()
	 */
	if ( ! function_exists( 'wm_css_font_name' ) ) {
		function wm_css_font_name( $value, $skin_option ) {
			//Helper variables
				$helper = wm_helper_var( 'google-fonts' );

			//Preparing output
				if (
						isset( $skin_option['id'] )
						&& false !== strpos( $skin_option['id'], 'font-family' )
						&& is_string( $value )
					) {
					$value = trim( $value );

					if ( isset( $helper[ $value ] ) ) {
						$value = "'" . $helper[ $value ] . "', ";
					}
				}

			//Output
				return $value;
		}
	} // /wm_css_font_name

?>