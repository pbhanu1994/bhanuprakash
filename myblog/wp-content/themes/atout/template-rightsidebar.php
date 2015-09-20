<?php
// Template Name: Right sidebar
get_header(); ?>

<div class="container">
	<div class="row">
		<main class="col-md-9 col-sm-8 content-left">
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

			<?php
				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', 'page' );
			?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

			<?php endwhile; ?>

	</main>
	<aside class="sidebar col-md-3 col-sm-4 col-xs-12">
		<?php dynamic_sidebar(); ?>
	</aside>
</div>
</div>

<?php get_footer(); ?>