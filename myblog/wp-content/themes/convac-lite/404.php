<?php 
/**
 * The template for displaying Error 404 page.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>
<?php global $convac_lite_shortname; ?>

<div class="bread-title-holder">
	<div class="bread-title-bg-image full-bg-breadimage-fixed"></div>
	<div class="container">
		<div class="row-fluid">
			<div class="container_inner clearfix">
				<h1 class="title"><?php _e('404','convac-lite'); ?></h1>
				<?php if ((class_exists('convac_lite_breadcrumb_class'))) {$convac_lite_breadcumb->custom_breadcrumb();} ?>
			</div>
		</div>
	</div>
</div>

<div class="page-content">
	<div class="container" id="error-404">
		<div class="row-fluid">
			<div id="content" class="span12">
				<div class="post">
					<div class="skepost _404-page">
						<div class="_404_artbg">
							<?php _e('Error 404','convac-lite'); ?>
						</div>
						<?php get_search_form(); ?></br></br>
						<?php _e('Sorry, but the requested resource was not found on this site. Please try again or contact the administrator for assistance.','convac-lite'); ?>
					</div>
					<!-- post --> 
				</div>
				<!-- post -->
			</div>
			<!-- content --> 
		</div>
	</div>
</div>
<?php get_footer(); ?>