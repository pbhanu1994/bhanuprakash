<?php
/**
* The Header for our theme.
*/
?><!DOCTYPE html>
<?php global $convac_lite_shortname, $convac_lite_themename; ?>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<!--[if IE 9]>
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<![endif]-->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

	<div id="wrapper" class="skepage">
	
		<div class="header-top-wrap">
		
			<!-- IF IS CONTACT PAGE TEMPLATE -->
			<?php if ( is_page_template('template-contact-page.php') ) {
				global $post;
				$_contact_map_shortcode = get_post_meta($post->ID, "_contact_map_shortcode", true);
				if($_contact_map_shortcode){
			?>
				<div id="contact_map_wrap">
					<?php echo do_shortcode($_contact_map_shortcode); ?>
				</div>
			<?php } } ?>
			<!-- IF IS CONTACT PAGE TEMPLATE END -->
		
			<div class="header-topbar clearfix">
				<div class="container"> 
					<div class="row-fluid">
						<!-- #logo -->
						<div id="logo" class="span4">
							<?php if(convac_lite_get_option($convac_lite_shortname."_logo_img")){ ?>
								<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" ><img class="logo" src="<?php echo esc_url(convac_lite_get_option($convac_lite_shortname."_logo_img")); ?>" alt="<?php echo esc_attr(convac_lite_get_option($convac_lite_shortname."_logo_alt")); ?>" /></a>
							<?php } else{ ?>
							<!-- #description -->
							<div id="site-title" class="logo_desp">
								<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name') ?>" ><?php bloginfo('name'); ?></a> 
								<div id="site-description"><?php bloginfo( 'description' ); ?></div>
							</div>
							<!-- #description -->
							<?php } ?>
						</div>
						<!-- #logo -->
						
						<!-- .top-nav-menu --> 
						<div class="top-nav-menu span8"> 
							<div class="top-nav-menu span11">
								<?php 
									if( function_exists( 'has_nav_menu' ) && has_nav_menu( 'Header' ) ) {
										wp_nav_menu(array( 'container_class' => 'ske-menu', 'container_id' => 'skenav', 'menu_id' => 'menu-main','theme_location' => 'Header' )); 
									} else {
								?>
								<div class="ske-menu" id="skenav">
									<ul id="menu-main" class="menu">
										<?php wp_list_pages('title_li=&depth=0'); ?>
									</ul>
								</div>
								<?php } ?>
							</div>
							<?php if(convac_lite_get_option($convac_lite_shortname.'_headserach') === 'on'){ ?>
								<li class="nav-search-icon span1">
									<a href="javascript:void(0);" class="search-strip" title="search"><i class="fa fa-search"></i></a>
									<!-- search-strip -->
									<div class="hsearch" >
										<div class="container">
											<div class="row-fluid">
												<form method="get" id="header-searchform" action="<?php echo esc_url(home_url('/')); ?>">
													<fieldset>
														<input type="text" value="" placeholder="Search Here ..." id="s" name="s">
														<input type="submit" value="Search" id="header-searchsubmit">
													</fieldset>
												</form>
												<div class="hsearch-close"></div>
											</div>
										</div>
									</div>
									<!-- search-strip -->
								</li>
							<?php } ?>
						</div>
						<!-- .top-nav-menu --> 
					</div>
				</div>					
			</div>
			<div class="header-clone"></div>
			<!-- header-topbar -->
			
			
			<!-- Header Author Slider Starts -->
			<?php 
				if(is_front_page()) {
					include_once('includes/header-author-slider.php'); 
				}
			?>
			<!-- Header Author Slider Ends -->
			
			
			<!-- Social Links Section -->
			<div class="social_icon container">
				<?php if(convac_lite_get_option($convac_lite_shortname.'_sconnect_txt')){?><div class="head_social_title"><?php echo convac_lite_get_option($convac_lite_shortname.'_sconnect_txt'); ?></div><?php } ?>
				<ul class="clearfix">
					<?php if(convac_lite_get_option($convac_lite_shortname.'_fbook_link')){?><li class="fb-icon"><a target="_blank" href="<?php echo esc_url(convac_lite_get_option($convac_lite_shortname.'_fbook_link','timeliner')); ?>"><span class="fa fa-facebook" title="Facebook"></span></a></li><?php } ?>
					<?php if(convac_lite_get_option($convac_lite_shortname.'_twitter_link')){?><li class="tw-icon"><a target="_blank" href="<?php echo esc_url(convac_lite_get_option($convac_lite_shortname.'_twitter_link','timeliner')); ?>"><span class="fa fa-twitter" title="Twitter"></span></a></li><?php } ?>
					<?php if(convac_lite_get_option($convac_lite_shortname.'_gplus_link')){ ?><li class="gplus-icon"><a target="_blank" href="<?php echo esc_url(convac_lite_get_option($convac_lite_shortname.'_gplus_link','timeliner')); ?>"><span class="fa fa-google-plus" title="Google Plus"></span></a></li><?php } ?>
					<?php if(convac_lite_get_option($convac_lite_shortname.'_pinterest_link')){ ?><li class="pinterest-icon"><a target="_blank" href="<?php echo esc_url(convac_lite_get_option($convac_lite_shortname.'_pinterest_link','timeliner')); ?>"><span class="fa fa-pinterest" title="Pinterest"></span></a></li><?php } ?>
					<?php if(convac_lite_get_option($convac_lite_shortname.'_linkedin_link')){ ?><li class="linkedin-icon"><a target="_blank" href="<?php echo convac_lite_get_option($convac_lite_shortname.'_linkedin_link','timeliner'); ?>"><span class="fa fa-linkedin" title="Linkedin"></span></a></li><?php } ?>
					<?php if(convac_lite_get_option($convac_lite_shortname.'_foursquare_link')){ ?><li class="foursquare-icon"><a target="_blank" href="<?php echo esc_url(convac_lite_get_option($convac_lite_shortname.'_foursquare_link','timeliner')); ?>"><span class="fa fa-foursquare" title="Foursquare"></span></a></li><?php } ?>
					<?php if(convac_lite_get_option($convac_lite_shortname.'_flickr_link')){ ?><li class="flickr-icon"><a target="_blank" href="<?php echo esc_url(convac_lite_get_option($convac_lite_shortname.'_flickr_link','timeliner')); ?>"><span class="fa fa-flickr" title="Flickr"></span></a></li><?php } ?>
					<?php if(convac_lite_get_option($convac_lite_shortname.'_youtube_link')){ ?><li class="youtube-icon"><a target="_blank" href="<?php echo esc_url(convac_lite_get_option($convac_lite_shortname.'_youtube_link','timeliner')); ?>"><span class="fa fa-youtube-play" title="Youtube"></span></a></li><?php } ?>
				</ul>
			</div>
			<!-- Social Links Section -->
			
		</div>
	
	<!-- header image section -->

<div id="main" class="clearfix">
