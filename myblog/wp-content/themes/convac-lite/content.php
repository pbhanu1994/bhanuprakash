<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 */
?>
<div <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">

	<?php if(is_sticky($post->ID)) { _e("<div class='sticky-post'>featured</div>",'convac-lite'); } ?>
	
	<h1 class="post-title">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
	</h1>
	
	<div class="convac-post-box clearfix">
	
		<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
		<div class="featured-image-shadow-box">
			<?php
				$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'convac_lite_standard_img');
			?>
			<a href="<?php the_permalink(); ?>" class="image"><img src="<?php echo $thumbnail[0];?>" alt="<?php the_title(); ?>" class="featured-image alignnon"/></a>
		</div>
		
		<div class="skepost-meta clearfix">
			<span class="post-type-img"><img src="<?php echo get_template_directory_uri(); ?>/images/standard-post.png"/></span>
			<span class="date"><span><?php the_time('j');?></span></br><?php the_time('M');?>,<?php the_time('Y') ?></span>
			<span class="author-name"><?php echo get_avatar( get_the_author_meta( 'ID' ), 70 ); ?></span>
			<span class="comments"><img src="<?php echo get_template_directory_uri(); ?>/images/comment-box.png"/></br><?php comments_popup_link(__('<span>0</span>','convac-lite'), __('<span>1</span>','convac-lite'), __('<span>%</span>','convac-lite'), __('','convac-lite'), __('off','convac-lite')); ?></span>
		</div><!-- skepost-meta -->
		<?php } else { ?>
		
		<div class="skepost-meta vert-skepost-meta clearfix">
			<span class="post-type-img"><img src="<?php echo get_template_directory_uri(); ?>/images/standard-post.png"/></span>
			<span class="date"><span><?php the_time('j');?></span></br><?php the_time('M');?>,<?php the_time('Y') ?></span>
			<span class="author-name"><?php echo get_avatar( get_the_author_meta( 'ID' ), 70 ); ?></span>
			<span class="comments"><img src="<?php echo get_template_directory_uri(); ?>/images/comment-box.png"/></br><?php comments_popup_link(__('<span>0</span>','convac-lite'), __('<span>1</span>','convac-lite'), __('<span>%</span>','convac-lite'), __('','convac-lite'), __('off','convac-lite')); ?></span>
		</div><!-- skepost-meta -->
		<?php } ?>
	</div><!--  -->

	
	<div class="skepost clearfix">
		<?php the_excerpt(); ?>   
	</div>
	<!-- skepost -->
	<div class="continue"><a href="<?php the_permalink(); ?>"><?php _e('Read More','convac-lite');?></a></div>		
</div>
<!-- post -->