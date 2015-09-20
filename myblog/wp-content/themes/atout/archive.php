<?php
/**
 * Archive template file
 *
 * @package Atout
 * @author Frenchtastic.eu
 */
get_header();
if(get_option('atout_page_layout_opt') == 'left'):
	$atout_sidebar_float = '';
	$atout_md = 9;
	$atout_sm = 8;
	$atout_sp = 'content-right';
elseif(get_option('atout_page_layout_opt') == 'full_width'):
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
			<div class="searchpage">
				<header class="search-header">
					<h3 class="headtitle"><?php echo __('Archives', 'atout'); ?></h3>
					<?php get_search_form(); ?>
				</header><!-- .page-header -->
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
					

				<?php else : ?>

				<h5 class="alert alert-grey"><?php echo __('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'atout'); ?></h5>

				<?php endif; ?>
			</div>
			<?php atout_paging_nav(); ?>
		</main>
		<aside class="sidebar col-md-3 col-sm-4 col-xs-12 <?php echo $atout_sidebar_float; ?>">
			<?php dynamic_sidebar(); ?>
		</aside>
	</div>
</div>

<?php get_footer(); ?>