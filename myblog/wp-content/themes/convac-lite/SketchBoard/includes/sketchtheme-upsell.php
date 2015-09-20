<?php
/**
 * Title: Theme Upsell.
 *
 * Description: Displays list of all Sketchtheme themes linking to it's pro and free versions.
 *
 *
 * @author   Sketchtheme
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.sketchthemes.com/
 */

// Add stylesheet and JS for sell page.
function convac_lite_sell_style() {

    // Set template directory uri
    $directory_uri = get_template_directory_uri();
    wp_enqueue_style( 'upsell_style', get_template_directory_uri() . '/SketchBoard/includes/css/upsell.css' );
}

// Add upsell page to the menu.
function convac_lite_add_upsell() {
    $page = add_theme_page( __('Sketch Themes', 'convac-lite'), __('Sketch Themes', 'convac-lite'), 'administrator', 'sketch-themes', 'convac_lite_display_upsell' );
    add_action( 'admin_print_styles-' . $page, 'convac_lite_sell_style' );
}

add_action( 'admin_menu', 'convac_lite_add_upsell',12 );

// Define markup for the upsell page.
function convac_lite_display_upsell() {

    // Set template directory uri
    $directory_uri = get_template_directory_uri();
    ?>

    <div class="wrap">
    <div class="container-fluid">
    <div id="upsell_container">
    <div class="row-fluid clearfix">
        <div id="upsell_header" class="span12">
            <h2>
                <a href="http://www.sketchthemes.com/" target="_blank">
                    <img src="<?php echo $directory_uri; ?>/SketchBoard/includes/images/sketch-logo.png"/>
                </a>
            </h2>
        </div>
		<div class="sketch-social-container clearfix">
			<div class="sketch-social">
				    <a href="https://twitter.com/sketchthemes" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @twitterapi</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
			<div class="sketch-social">
				<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FSketchThemes&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=false&amp;height=21&amp;appId=333709623346310" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
			</div>
		</div>
    </div>
    <div id="upsell_themes" class="clearfix row-fluid">


    <!-- -------------- Rational Pro ------------------- -->

        <div id="Rational" class="row-fluid">
            <div class="theme-container">
                <div class="theme-image span3">
                    <a href="http://www.sketchthemes.com/themes/rational-impressive-one-pager-responsive-business-wordpress-theme/" target="_blank">
                        <img src="<?php echo $directory_uri; ?>/SketchBoard/includes/images/Rational.png" width="300px"/>
                    </a>
                </div>
                <div class="theme-info span9">
                    <a class="theme-name" href="http://www.sketchthemes.com/themes/rational-impressive-one-pager-responsive-business-wordpress-theme/" target="_blank"><h4><?php _e('Rational – Impressive One Pager Responsive Business WordPress Theme','convac-lite');?></h4></a>

                    <div class="theme-description">
                        <p><?php _e("Every business requires an approach that shows the logic behind floating the trade and the exact objective with which the venture is initiated.Adding a rational approach to every business in the first place, the Rational – One Pager Responsive Business WordPress Theme certainly promises to better user’s experience.",'convac-lite'); ?></p>

                    </div>

                    <a class="free btn btn-success" href="https://wordpress.org/themes/download/rational-lite.1.0.0.zip?nostats=1" target="_blank"><?php _e( 'Try Rational Free', 'convac-lite' ); ?></a>
                    <a class="buy  btn btn-info" href="http://sketchthemes.com/samples/incart-responsive-woocommerce-demo/" target="_blank"><?php _e( 'View Demo', 'convac-lite' ); ?></a>
                    <a class="buy btn btn-primary" href="http://www.sketchthemes.com/themes/rational-impressive-one-pager-responsive-business-wordpress-theme/" target="_blank"><?php _e( 'Buy Rational Pro', 'convac-lite' ); ?></a>
                    
                </div>
            </div>
        </div>
    

    <!-- -------------- Incart Pro ------------------- -->

        <div id="Incart" class="row-fluid">
            <div class="theme-container">
                <div class="theme-image span3">
                    <a href="http://www.sketchthemes.com/themes/incart-responsive-woocommerce-wordpress-theme/" target="_blank">
                        <img src="<?php echo $directory_uri; ?>/SketchBoard/includes/images/Incart.png" width="300px"/>
                    </a>
                </div>
                <div class="theme-info span9">
                    <a class="theme-name" href="http://www.sketchthemes.com/themes/incart-responsive-woocommerce-wordpress-theme/" target="_blank"><h4><?php _e('InCart - Responsive WooCommerce WordPress Theme','convac-lite');?></h4></a>

                    <div class="theme-description">
                        <p><?php _e("SketchThemes continues the legacy of best multipurpose responsive business WordPress themes. Here we are gearing up to introduce a new WooCommerce WordPress theme which keeps it at the top priority for the customers to proliferate their business. This classy theme is fully WooCommerce compatible, SEO optimized and fully responsive so forget the fear of screen sizes, SEO optimization, just go and grab it.",'convac-lite'); ?></p>

                    </div>

                    <a class="free btn btn-success" href="https://wordpress.org/themes/download/incart-lite.1.0.3.zip?nostats=1" target="_blank"><?php _e( 'Try Incart Free', 'convac-lite' ); ?></a>
                    <a class="buy  btn btn-info" href="http://sketchthemes.com/samples/incart-responsive-woocommerce-demo/" target="_blank"><?php _e( 'View Demo', 'convac-lite' ); ?></a>
                    <a class="buy btn btn-primary" href="http://www.sketchthemes.com/themes/incart-responsive-woocommerce-wordpress-theme/" target="_blank"><?php _e( 'Buy Incart Pro', 'convac-lite' ); ?></a>
                    
                </div>
            </div>
        </div>
	
		<!-- -------------- Foodeez Pro ------------------- -->

        <div id="Foodeez" class="row-fluid">
            <div class="theme-container">
                <div class="theme-image span3">
                    <a href="http://www.sketchthemes.com/themes/foodeez-multi-cuisine-restaurant-wordpress-theme/" target="_blank">
                        <img src="<?php echo $directory_uri; ?>/SketchBoard/includes/images/Foodeez.png" width="300px"/>
                    </a>
                </div>
                <div class="theme-info span9">
                    <a class="theme-name" href="http://www.sketchthemes.com/themes/" target="_blank"><h4><?php _e('Foodeez - Multi Cuisine Restaurant WordPress Theme','convac-lite');?></h4></a>

                    <div class="theme-description">
                        <p><?php _e("Foodeez is the classy theme created for Restaurants and hotel Industry. To provide a Classy, elegant theme for the hospitality industry and to fill in the void Foodeez was designed. Every restaurant or hotel desires to showcase it's cuisines and ambiance in a beautiful manner.",'convac-lite'); ?></p>

                    </div>

					<a class="free btn btn-success" href="http://wordpress.org/themes/foodeez-lite" target="_blank"><?php _e( 'Try Foodeez Free', 'convac-lite' ); ?></a>
                    <a class="buy  btn btn-info" href="http://sketchthemes.com/samples/foodeez-multi-cuisine-restaurant-demo/" target="_blank"><?php _e( 'View Demo', 'convac-lite' ); ?></a>
					<a class="buy btn btn-primary" href="http://www.sketchthemes.com/members/signup.php?price_group=63&product_id=63&paysys_id=twocheckout_r" target="_blank"><?php _e( 'Buy Foodeez Pro', 'convac-lite' ); ?></a>
                    
                </div>
            </div>
        </div>
	
		<!-- -------------- Advertica Pro ------------------- -->

        <div id="Advertica" class="row-fluid">
            <div class="theme-container">
                <div class="theme-image span3">
                    <a href="http://www.sketchthemes.com/themes/advertica-the-uber-clean-multipurpose-wordpress-theme/" target="_blank">
                        <img src="<?php echo $directory_uri; ?>/SketchBoard/includes/images/Advertica_screen_420px.png" width="300px"/>
                    </a>
                </div>
                <div class="theme-info span9">
                    <a class="theme-name" href="http://www.sketchthemes.com/themes/" target="_blank"><h4><?php _e('Advertica - Creative MultiPurpose WordPress Theme','convac-lite');?></h4></a>

                    <div class="theme-description">
                        <p><?php _e('A Clean, Multipurpose, Responsive Business WordPress Theme by SketchThemes. With easy customization options one can easily setup a perfect business theme in a few minutes. The striking features of INVERT are Easy Custom Admin Options, 3 Custom Page Templates, Parallax Section, Custom Logo, Custom favicon, Social links Setup, SEO Optimized, Call To Action, Featured Text.','convac-lite'); ?></p>

                    </div>

					<a class="free btn btn-success" href="http://wordpress.org/themes/advertica-lite" target="_blank"><?php _e( 'Try Advertica Free', 'convac-lite' ); ?></a>
                    <a class="buy  btn btn-info" href="http://sketchthemes.com/samples/advertica-creative-demo/" target="_blank"><?php _e( 'View Demo', 'convac-lite' ); ?></a>
					<a class="buy btn btn-primary" href="http://www.sketchthemes.com/members/signup.php?price_group=58&product_id=58&paysys_id=twocheckout_r" target="_blank"><?php _e( 'Buy Advertica Pro', 'convac-lite' ); ?></a>
                    
                </div>
            </div>
        </div>

		<!-- -------------- Invert Pro ------------------- -->

        <div id="Invert" class="row-fluid">
            <div class="theme-container">
                <div class="theme-image span3">
                    <a href="http://www.sketchthemes.com/themes/invert-responsive-multipurpose-wordpress-theme/" target="_blank">
                        <img src="<?php echo $directory_uri; ?>/SketchBoard/includes/images/Invert-mac-300px.png"/>
                    </a>
                </div>
                <div class="theme-info span9">
                    <a class="theme-name" href="http://www.sketchthemes.com/themes/invert-responsive-multipurpose-wordpress-theme/" target="_blank"><h4><?php _e('Invert - Responsive MultiPurpose WordPress Theme','convac-lite');?></h4></a>

                    <div class="theme-description">
                        <p><?php _e('A Clean, Multipurpose, Responsive Business WordPress Theme by SketchThemes. With easy customization options one can easily setup a perfect business theme in a few minutes. The striking features of INVERT are Easy Custom Admin Options, 3 Custom Page Templates, Parallax Section, Custom Logo, Custom favicon, Social links Setup, SEO Optimized, Call To Action, Featured Text.','convac-lite'); ?></p>

                    </div>

					<a class="free btn btn-success" href="http://wordpress.org/themes/invert-lite" target="_blank"><?php _e( 'Try Invert Free', 'convac-lite' ); ?></a>
                    <a class="buy  btn btn-info" href="http://sketchthemes.com/samples/invert-business-demo/" target="_blank"><?php _e( 'View Demo', 'convac-lite' ); ?></a>
					<a class="buy btn btn-primary" href="http://www.sketchthemes.com/members/signup.php?price_group=44&product_id=44&paysys_id=twocheckout_r" target="_blank"><?php _e( 'Buy Invert Pro', 'convac-lite' ); ?></a>
                    
                </div>
            </div>
        </div>
		
        <!-- -------------- BizNez Pro ------------------- -->

        <div id="biznez" class="row-fluid">
            <div class="theme-container">
                <div class="theme-image span3">
                    <a href="http://www.sketchthemes.com/themes/biznez-multi-purpose-wordpress-theme/" target="_blank">
                        <img src="<?php echo $directory_uri; ?>/SketchBoard/includes/images/biznez-career-counseling-demo.png"/>
                    </a>
                </div>
                <div class="theme-info span9">
                    <a class="theme-name" href="http://www.sketchthemes.com/themes/biznez-multi-purpose-wordpress-theme/" target="_blank"><h4><?php _e('Biznez - Multi Purpose Wordpress Theme','convac-lite');?></h4></a>

                    <div class="theme-description">
                        <p><?php _e('BizNez is a powerful Responsive Multipurpose WordPress Theme with clean and crispy design. BizNez is modern and flexible enough. It allows you to create your website around any niche without the need of any complicated HTML code knowledge. Be it a Blog, Business, Portfolio, Corporate, Agency, an online store or any other kind of website BizNez will be a good pick for you. With our advanced admin panel, tons of customizations are possible and that&#39;ll help you redefine your website&#39;s brand value. You can also change site layout with only a single click. Also, this theme comes with retina ready feature. You can see great details on any devices screen. Woo Commerce and RTL languages are also supported with our BizNez theme.','convac-lite'); ?></p>

                    </div>

					<a class="free btn btn-success" href="http://wordpress.org/themes/biznez-lite" target="_blank"><?php _e( 'Try Biznez Free', 'convac-lite' ); ?></a>
                    <a class="buy  btn btn-info" href="http://demo.sketchthemes.com/preview-images/biznez/" target="_blank"><?php _e( 'View Demo', 'convac-lite' ); ?></a>
					<a class="buy btn btn-primary" href="http://www.sketchthemes.com/members/signup.php?price_group=19&product_id=19&hide_paysys=paypal_r" target="_blank"><?php _e( 'Buy Biznez Pro', 'convac-lite' ); ?></a>
                    
                </div>
            </div>
        </div>

        <!-- -------------- Analytical Pro ------------------- -->

        <div id="analytical" class="row-fluid">
            <div class="theme-container">
                <div class="theme-image span3">
                    <a href="http://www.sketchthemes.com/themes/analytical-full-width-responsive-wordpress-theme/" target="_blank">
                        <img src="<?php echo $directory_uri; ?>/SketchBoard/includes/images/Analytical_Interior_Demo.png"/>
                    </a>
                </div>
                <div class="theme-info span9">
                    <a class="theme-name" href="http://www.sketchthemes.com/themes/analytical-full-width-responsive-wordpress-theme/" target="_blank"><h4><?php _e('Analytical Full Width Responsive Wordpress Theme','convac-lite');?></h4></a>

                    <div class="theme-description">
                        <p><?php _e('Analytical is a full width WordPress theme built especially for photographers and others who want to feature more graphics on their website. This theme features a full width background slider which is highly customizable and totally responsive.','convac-lite');?></p>
                    </div>

					<a class="free btn btn-success" href="http://wordpress.org/themes/analytical-lite" target="_blank"><?php _e( 'Try Analytical Free', 'convac-lite' ); ?></a>
                    <a class="buy  btn btn-info" href="http://demo.sketchthemes.com/preview-images/analytical/" target="_blank"><?php _e( 'View Demo', 'convac-lite' ); ?></a>
					<a class="buy btn btn-primary" href="http://www.sketchthemes.com/members/signup.php?price_group=17&product_id=17&hide_paysys=paypal_r" target="_blank"><?php _e( 'Buy Analytical Pro', 'convac-lite' ); ?></a>
                    
                </div>
            </div>
        </div>
		
        <!-- -------------- BizStudio Pro ------------------- -->

        <div id="bizstudio" class="row-fluid">
            <div class="theme-container">
                <div class="theme-image span3">
                    <a href="http://www.sketchthemes.com/themes/bizstudio-full-width-responsive-wordpress-theme/" target="_blank">
                        <img src="<?php echo $directory_uri; ?>/SketchBoard/includes/images/bizstudio-default-demo.png" width="300px"/>
                    </a>
                </div>
                <div class="theme-info span9">
                    <a class="theme-name" href="http://www.sketchthemes.com/themes/bizstudio-full-width-responsive-wordpress-theme/" target="_blank"><h4><?php _e('BizStudio Full Width Responsive Wordpress Theme','convac-lite');?></h4></a>

                    <div class="theme-description">
                        <p><?php _e('Bizstudio is a Simple, Minimal, Responsive, One Click Install, Beautiful and Elegent WordPress Theme. Along with the elegent design the theme is highly flexible and customizable with easy to use Admin Panel Options. From a wide range of options some key options are custom two different layout option(full width and with sidebar), 5 widget areas, custom follow us and contact widget, Logo, logo alt text, custom favicon, social links, rss feed button, custom copyright text and many more. Also it is compitable with various popular plugins like All in One SEO Pack, WP Super Cache, Contact Form 7 etc. It is translation ready as well.','convac-lite')?></p>
                    </div>

					<a class="free btn btn-success" href="http://wordpress.org/themes/bizstudio-lite" target="_blank"><?php _e( 'Try BizStudio Lite', 'convac-lite' ); ?></a>
                    <a class="buy btn btn-info" href="http://demo.sketchthemes.com/preview/bizstudio/" target="_blank"><?php _e( 'View Demo', 'convac-lite' ); ?></a>
					<a class="buy btn btn-primary" href="http://www.sketchthemes.com/members/signup.php?price_group=14&product_id=14&hide_paysys=paypal_r" target="_blank"><?php _e( 'Buy BizStudio Pro', 'convac-lite' ); ?></a>
                </div>
            </div>
        </div>
		
		
		<!-- -------------- Irex Pro ------------------- -->

        <div id="Irex" class="row-fluid">
            <div class="theme-container">
                <div class="theme-image span3">
                    <a href="http://www.sketchthemes.com/themes/irex-full-width-wordpress-theme/" target="_blank">
                        <img src="<?php echo $directory_uri; ?>/SketchBoard/includes/images/irex-mac-420px.png" width="300px"/>
                    </a>
                </div>
                <div class="theme-info span9">
                    <a class="theme-name" href="http://www.sketchthemes.com/themes/irex-full-width-wordpress-theme/" target="_blank"><h4><?php _e('Irex Full Width Portfolio Wordpress Theme','convac-lite');?></h4></a>

                    <div class="theme-description">
                        <p><?php _e('Irex is a simple, minimal, responsive, easy to use, one click install, beautiful and Elegent WordPress Theme with Easy Custom Admin Options Created by SketchThemes.com. Using Irex theme options any one can easily customize this theme according to their need. You can use your own Logo, logo alt text, custom favicon, you can add social links, rss feed to homepage, you can use own copyright text etc. And all this information can be entered using Irex Theme Options Panel. You have to just set the content from the Irex  Themes Options Panel and it will be up ready to use.','convac-lite');?></p>
                    </div>

					<a class="free btn btn-success" href="http://wordpress.org/themes/irex-lite" target="_blank"><?php _e( 'Try Irex Lite', 'convac-lite' ); ?></a>
                    <a class="buy btn btn-info" href="http://demo.sketchthemes.com/preview/irex/" target="_blank"><?php _e( 'View Demo', 'convac-lite' ); ?></a>
					<a class="buy btn btn-primary" href="http://www.sketchthemes.com/members/signup.php?price_group=15&product_id=15&hide_paysys=paypal_r" target="_blank"><?php _e( 'Buy Irex Pro', 'convac-lite' ); ?></a>
                </div>
            </div>
        </div>
		
		<!-- -------------- Sketchmini Pro ------------------- -->

        <div id="Sketchmini" class="row-fluid">
            <div class="theme-container">
                <div class="theme-image span3">
                    <a href="http://www.sketchthemes.com/themes/sketchmini-free-wordpress-theme/" target="_blank">
                        <img src="<?php echo $directory_uri; ?>/SketchBoard/includes/images/sketchmini-mac-420px.png" width="300px"/>
                    </a>
                </div>
                <div class="theme-info span9">
                    <a class="theme-name" href="http://www.sketchthemes.com/themes/sketchmini-free-wordpress-theme/" target="_blank"><h4><?php _e('SketchMini Free Responsive WordPress Theme','convac-lite');?></h4></a>

                    <div class="theme-description">
                        <p><?php _e('SketchMini is a Responsive WordPress Theme Free to use with a GPL. SketchMini has got great features and awesome backend to make use of the available features in the theme. You dont need to be an expert to use this SketchMini theme. SketchMini can act as a great base theme to create any great website.','convac-lite')?></p>

                    </div>
					<a class="free btn btn-success" href="http://www.sketchthemes.com/themes/sketchmini-free-wordpress-theme/#FreeDownloadButton" target="_blank"><?php _e( 'Try Sketchmini Lite', 'convac-lite' ); ?></a>
                    <a class="buy btn btn-info" href="http://demo.sketchthemes.com/preview/sketchmini/" target="_blank"><?php _e( 'View Demo', 'convac-lite' ); ?></a>
                </div>
            </div>
        </div>
		
	
	<!-- -------------- Fullscreen Pro ------------------- -->

        <div id="FullScreen" class="row-fluid">
            <div class="theme-container">
                <div class="theme-image span3">
                    <a href="http://www.sketchthemes.com/themes/fullscreen-onepager-responsive-wordpress-theme/" target="_blank">
                        <img src="<?php echo $directory_uri; ?>/SketchBoard/includes/images/fullscreen-mac-420px.png" width="300px"/>
                    </a>
                </div>
                <div class="theme-info span9">
                    <a class="theme-name" href="http://www.sketchthemes.com/themes/fullscreen-onepager-responsive-wordpress-theme/" target="_blank"><h4><?php _e('FullScreen - OnePager Responsive WordPress Theme','convac-lite');?></h4></a>

                    <div class="theme-description">
                        <p><?php _e('FullScreen is clean, multipurpose and elegant WordPress theme with fully responsive layout. Theme is suited for all photographers, creative, business and portfolio websites. Theme includes lots of features like full-screen slider, modular homepage, layout shortcodes and more. With our advanced admin panel, tons of customizations are possible and that will help you redefine your website brand value.','convac-lite');?></p>
                    </div>

                    <a class="buy btn btn-info" href="http://sketchthemes.com/samples/fullscreen-default-demo/" target="_blank"><?php _e( 'View Demo', 'convac-lite' ); ?></a>
					<a class="buy btn btn-primary" href="http://www.sketchthemes.com/members/signup.php?price_group=27&product_id=27&hide_paysys=paypal_r" target="_blank"><?php _e( 'Buy FullScreen Pro', 'convac-lite' ); ?></a>
                </div>
            </div>
        </div>
		
		
	<!-- -------------- Timeliner Pro ------------------- -->

        <div id="Timeliner" class="row-fluid">
            <div class="theme-container">
                <div class="theme-image span3">
                    <a href="http://www.sketchthemes.com/themes/timeliner-minimal-ultra-responsive-wordpress-theme/" target="_blank">
                        <img src="<?php echo $directory_uri; ?>/SketchBoard/includes/images/Timeliner_Modeling_Demo.png"/>
                    </a>
                </div>
                <div class="theme-info span9">
                    <a class="theme-name" href="http://www.sketchthemes.com/themes/timeliner-minimal-ultra-responsive-wordpress-theme/" target="_blank"><h4><?php _e('Timeliner - Minimal Ultra Responsive WordPress Theme','convac-lite');?></h4></a>

                    <div class="theme-description">
                        <p><?php _e('Timeliner is a premier timeline theme for WordPress. Timeliner is a minimal, clean, modern and highly customizable theme. It allows you to create their website around any niche without the need of any complicated HTML code knowledge. Be it a Blog, Portfolio, Corporate, Agency, any other kind of website Timeliner will be a good pick for you. With our advanced admin panel, tons of customizations are possible and that will help you redefine your website&#39;s brand value. Also, this theme comes with retina ready feature. You can see great details on any devices screen.','convac-lite');?></p>
                    </div>

                    <a class="buy  btn btn-info" href="http://sketchthemes.com/samples/timeliner-modeling-agency/" target="_blank"><?php _e( 'View Demo', 'convac-lite' ); ?></a>
					<a class="buy btn btn-primary" href="http://www.sketchthemes.com/members/signup.php?price_group=30&product_id=30&hide_paysys=paypal_r" target="_blank"><?php _e( 'Buy Timeliner Pro', 'convac-lite' ); ?></a>
 
                </div>
            </div>
        </div>

		
    </div>
    <!-- upsell themes -->
    </div>
    <!-- upsell container -->
    </div>
    <!-- container-fluid -->
    </div>
<?php
}

?>