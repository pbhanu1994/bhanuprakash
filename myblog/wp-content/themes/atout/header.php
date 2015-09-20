<?php
/**
 * The header
 *
 * Displays all of the <head> section and everything up till <main id="content">
 *
 * @package Atout
 * @author Frenchtastic.eu
 */
$atout_favicon = get_theme_mod( 'atout_favicon');
$atout_bookmark_other = get_theme_mod( 'atout_bookmark_other');
$atout_bookmark_iphone = get_theme_mod( 'atout_bookmark_iphone');
$atout_bookmark_ipad = get_theme_mod( 'atout_bookmark_ipad');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php if(!empty($atout_favicon)): ?>
	<link rel="shortcut icon" href="<?php echo esc_url( get_theme_mod( 'atout_favicon' ) ); ?>" type="image/png" />
	<?php endif; ?>

	<?php if(!empty($atout_bookmark_other)): ?>
	<link rel="apple-touch-icon" href="<?php echo esc_url( get_theme_mod( 'atout_bookmark_other' ) ); ?>">
	<?php endif; ?>

	<?php if(!empty($atout_bookmark_iphone)): ?>
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url( get_theme_mod( 'atout_bookmark_iphone' ) ); ?>">
	<?php endif; ?>
	
	<?php if(!empty($atout_bookmark_ipad)): ?>
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url( get_theme_mod( 'atout_bookmark_ipad' ) ); ?>">
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="<?php echo esc_attr(get_theme_mod( 'navbar_state' )); ?>">
	<div id="wrap">
		<!-- Fixed navbar -->
		<div class="topbar" style="display:<?php echo esc_attr(get_theme_mod('topbar_show')); ?>;">
			<div class="container">
				<div class="topbarnav">
					<?php
				        wp_nav_menu( array(
				            'menu'              => 'top-menu',
				            'theme_location'    => 'top-menu',
			                'depth'             => 2,
			                'container'         => 'div',
			                'container_class'   => 'topbarnav',
			        		'container_id'      => 'topbarnav',
			                'menu_class'        => 'topbarnav-menu',)
			            );
			   		?>
			   		<?php if ( is_user_logged_in() ): ?>
					<ul class="pull-right">
						<li><a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Login"><?php echo __('Logout', 'atout'); ?></a></li>
					</ul>
					<?php else: ?>
					<ul class="pull-right">
						<li><a href="<?php echo wp_login_url( esc_url( home_url( '/' ) ) ); ?>" title="Login"><?php echo __('Login', 'atout'); ?></a></li>
					</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="navbar navbar-default navbar-<?php echo get_theme_mod( 'navbar_state' ); ?>-top" role="navigation">
			<div class="container">
				<button class="mobile-search-icon" type="button" data-toggle="modal" data-target="#myModal">
					<i class="fa fa-search"></i>
				</button>
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-search">
				      	<?php get_search_form(); ?>
				      </div>
				    </div>
				  </div>
				</div>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only"><?php echo __('Toggle navigation', 'atout'); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php if(get_theme_mod('logo') != ''): ?>
						<div class="image-logo">
							<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr(bloginfo('name')); ?>"><img src="<?php echo esc_url( get_theme_mod( 'logo' ) ); ?>" alt="<?php esc_attr(bloginfo('name')); ?>"></a>
						</div>
					<?php else: ?>
						<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>
					<?php endif; ?>
				</div>
				<ul id="menu-menu-1" class="search-container nav navbar-nav" style="display:<?php echo esc_attr(get_theme_mod('nav_search')); ?>;">
				    <li class="home-link menu-item menu-item-type-post_type menu-item-object-page">
				      <?php get_search_form(); ?>
 				    </li>
				</ul>
				<?php
			        wp_nav_menu( array(
			            'menu'              => 'primary',
			            'theme_location'    => 'primary',
		                'depth'             => 2,
		                'container'         => 'div',
		                'container_class'   => 'collapse navbar-collapse',
		        		'container_id'      => 'bs-example-navbar-collapse-1',
		                'menu_class'        => 'nav navbar-nav topnav',
		                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		                'walker'            => new wp_bootstrap_navwalker())
		            );
			   	?>
			</div>
		</div>

	    <!-- Content -->
	    <div id="content">