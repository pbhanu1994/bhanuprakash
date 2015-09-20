<?php
/**
 * Page content
 *
 * @package Atout
 * @author Frenchtastic.eu
 * @link http://codex.wordpress.org/Template_Hierarchy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php atout_thumbnail(); ?>
		<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<div class="post-meta uppercase">
			<?php atout_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header>
	<div class="page-content">
		<?php the_content(); ?>
	</div>
	<?php if(has_tag()): ?>
		<p class="post-tags"><?php the_tags(); ?></p>
	<?php endif; ?>
	<?php  wp_link_pages(array('before' => '<p><strong>'. __('Pages: ', 'atout').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</article>