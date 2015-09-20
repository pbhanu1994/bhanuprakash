<?php
/**
 * Quote template file
 *
 * @package atout
 * @author Frenchtastic.eu
 * @link http://codex.wordpress.org/Template_Hierarchy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<?php atout_thumbnail(); ?>
		</header>

		<div class="quote-icon text-center">
			<a href="<?php the_permalink(); ?>"><i class="fa fa-quote-right fa-3x"></i></a>
		</div>
		
		<blockquote class="post-quote">
			<a href="<?php echo the_permalink(); ?>">&#8220;<?php echo strip_tags(get_the_content()); ?>&#8221;</a>
			<p class="quote-author"><?php the_title( '&#8211; ' ); ?></p>
		</blockquote>
</article>