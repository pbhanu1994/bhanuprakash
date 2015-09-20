<?php
/**
 * Post template file
 *
 * @package atout
 * @author Frenchtastic.eu
 * @link http://codex.wordpress.org/Template_Hierarchy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<div class="post-meta uppercase">
			<?php atout_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php atout_thumbnail(); ?>
	</header>
	<div class="post-content">
		<?php if(get_option('atout_post_content') == 'content' 	&& !is_search() && !is_archive() && !is_single() ):
			/* translators: %s: Name of current post */
			the_content();
		elseif(is_single()):
			the_content();
		else: 
			the_excerpt();
		endif; ?>
	</div>
	<?php if(has_tag() && is_single() ): ?>
		<p class="post-tags"><?php the_tags(); ?></p>
	<?php endif; ?>
	<?php  wp_link_pages(array('before' => '<p><strong>'. __('Pages: ', 'atout').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</article>