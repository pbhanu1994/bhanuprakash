<?php 
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>

<?php global $convac_lite_shortname; ?>
<div class="main-wrapper-item">
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
	
		<div class="page-content">	
		<div class="container post-wrap">
			<div class="row-fluid">
				<div id="container" class="span8">
					<div id="content">  
							<div class="post" id="post-<?php the_ID(); ?>">
						
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
								
								<div class="conv-tags"><?php the_tags('<span class="tags"><i class="fa fa-tag"></i> ',',','</span>'); ?></div>
								<div class="conv-category"><?php if (has_category()) { ?><span class="category"><i class="fa fa-folder">&nbsp;</i><?php _e('','convac-lite');?><?php the_category(','); ?></span><?php } ?></div>

								<div class="skepost clearfix">
									<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'convac-lite' ) ); ?>
									<?php wp_link_pages(__('<p><strong>Pages:</strong> ','convac-lite'), '</p>', __('number','convac-lite')); ?>
								</div>
								<!-- skepost -->

								<div class="navigation"> 
									<span class="nav-previous"><?php previous_post_link( __('&larr; %link','convac-lite')); ?></span>
									<span class="nav-next"><?php next_post_link( __('%link &rarr;','convac-lite')); ?></span> 
								</div>
								<div class="clearfix"></div>
								<div class="comments-template">
									<?php comments_template( '', true ); ?>
								</div>
							</div>
						<!-- post -->
						<?php endwhile; ?>
						<?php else :  ?>

						<div class="post">
							<h2><?php _e('Post Does Not Exist','convac-lite'); ?></h2>
						</div>
						<?php endif; ?>
					</div><!-- content --> 
				</div><!-- container --> 

				<!-- Sidebar -->
				<div id="sidebar" class="span4">
					<?php get_sidebar(); ?>
				</div>
				<!-- Sidebar --> 

			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>