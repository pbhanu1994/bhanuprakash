<?php
/**
 * 404 page template file
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

				<h5 class="alert alert-grey"><?php echo __('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'atout'); ?></h5>

			</div>
		</main>
		<aside class="sidebar col-md-3 col-sm-4 col-xs-12 <?php echo $atout_sidebar_float; ?>">
			<?php dynamic_sidebar(); ?>
		</aside>
	</div>
</div>

<?php get_footer(); ?>