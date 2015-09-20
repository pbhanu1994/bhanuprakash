<?php
/*
Template Name: Page : No Sidebar Template
*/
?>

<?php get_header(); ?>
<?php global $convac_lite_shortname; ?>
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>

	<div class="bread-title-holder">
		<div class="bread-title-bg-image full-bg-breadimage-fixed"></div>
		<div class="container">
			<div class="row-fluid">
				<div class="container_inner clearfix">
					<h1 class="title"><?php the_title(); ?></h1>
					<?php if ((class_exists('convac_lite_breadcrumb_class'))) {$convac_lite_breadcumb->custom_breadcrumb();} ?>
				</div>
			</div>
		</div>
	</div>


<div class="page-content fullwidth-temp">
	<div class="container post-wrap">
		<div class="row-fluid">
			<div id="content" class="span12">
				<div class="post" id="post-<?php the_ID(); ?>">
					<div class="skepost">
						<?php the_content(); ?>
						<?php wp_link_pages(__('<p><strong>Pages:</strong> ','convac-lite'), '</p>', __('number','convac-lite')); ?>
						<?php edit_post_link('Edit', '', ''); ?>	
					</div>
					<!-- skepost -->
				</div>
				<!-- post -->

				<?php endwhile; ?>
				<?php else :  ?>
					<div class="post">
						<h2><?php _e('Not Found','convac-lite'); ?></h2>
					</div>
				<?php endif; ?>
			</div>
			<!-- content --> 
		</div>
	</div>
</div>
<?php get_footer(); ?>