<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Atout
 * @author Frenchtastic.eu
 */
get_header(); 
if(get_option('atout_blog_layout_opt') == 'left'):
	$atout_sidebar_float = '';
	$atout_md = 9;
	$atout_sm = 8;
	$atout_sp = 'content-right';
elseif(get_option('atout_blog_layout_opt') == 'full_width'):
	$atout_sidebar_float = 'hide';
	$atout_md = 12;
	$atout_sm = 12;
	$atout_sp = 'full-width';
else:
	$atout_sidebar_float = '';
	$atout_md = 9;
	$atout_sm = 8;
	$atout_sp = 'content-left';
endif; ?>

<div class="container">
	<div class="row">
		<main class="col-md-<?php echo $atout_md; ?> col-sm-<?php echo $atout_sm; ?> <?php echo $atout_sp; ?>">
			<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

			<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>
				
				<?php atout_paging_nav(); ?>

			<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</main>

	<aside class="sidebar col-md-3 col-sm-4 col-xs-12 <?php echo $atout_sidebar_float; ?>">
		<?php dynamic_sidebar(); ?>
	</aside>
	
</div>
</div>

<?php get_footer(); ?>