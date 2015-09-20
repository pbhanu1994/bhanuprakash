<?php
/**
 * Link template file
 *
 * @package atout
 * @author Frenchtastic.eu
 * @link http://codex.wordpress.org/Template_Hierarchy
 */
?>

<?php $link = get_post_meta( $post->ID, '_atout_link_url', true ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php if(is_single()): ?>
			<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<div class="post-meta uppercase">
				<?php atout_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php atout_thumbnail(); ?>
		<?php else: ?>
			<?php atout_thumbnail(); ?>
			<div class="post-link text-center">
				<a href="<?php echo the_permalink(); ?>"><i class="fa fa-link fa-3x"></i></a>
				<?php the_title( sprintf( '<h2 class="entry-title post-link-title"><a href="%s">', esc_url( atout_get_link_url() ) ), '</a></h2>' ); ?>
			</div>
		<?php endif; ?>
	</header>
	
	<div class="post-content">
		<?php if(is_single()):
			the_content();
		endif; ?>
	</div>
</article>