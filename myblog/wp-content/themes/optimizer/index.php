<?php 
/**
 * The index page of Optimizer
 *
 * Displays the home page elements.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
global $optimizer;
?>
<?php get_header(); ?>

<?php if ( is_front_page() ) { ?>
<div class="home_wrap layer_wrapper">
	<div class="fixed_wrap fixindex">
				<!--FRONTPAGE WIDGET AREA-->
                <?php if ( is_active_sidebar( 'front_sidebar' ) ) : ?>
                    <div id="frontsidebar" class="frontpage_sidebar">       
						<?php dynamic_sidebar( 'front_sidebar' ); ?>
                     </div> 
                <?php endif; ?>

 
	<?php if(!empty($optimizerdb) && empty($optimizer['converted'])) { ?>              
        <?php
        
        $home_blocks = $optimizer['home_sort_id'];
        
        if ($home_blocks):
        
        foreach ($home_blocks as $key=>$value) {
        
            switch($key) {
            //About Section
            case 'about':
            ?>
            <?php $about = $optimizer['home_sort_id']; if(!empty($about['about'])){ ?>
                <div class="home_blocks aboutblock"><?php get_template_part('frontpage/content','about'); ?></div>
            <?php } ?>
            
            <?php
            //Welcome Text
            break;
            case 'welcome-text':
            ?>
            <?php $welcome = $optimizer['home_sort_id']; if(!empty($welcome['welcome-text'])){ ?>
                <div class="home_blocks welcmblock"><?php get_template_part('frontpage/content','welcome-text'); ?></div>
            <?php } ?>
            
            <?php
            //Blocks
            break;
            case 'blocks':
            ?>
            <?php $blocks = $optimizer['home_sort_id']; if(!empty($blocks['blocks'])){ ?>
                <div class="home_blocks ast_blocks"><?php get_template_part('frontpage/content','blocks'); ?></div>
            <?php } ?>
            
            <?php
            //Front Page Posts
            break;
            case 'posts':
            ?>
                <?php $homeposts = $optimizer['home_sort_id']; if(!empty($homeposts['posts'])){ ?>
                    <div class="home_blocks postsblck <?php if(!empty($optimizer['hide_mob_frontposts'])){ echo 'mobile_hide_frontposts';} ?>" data-scroll="front_posts">
            <!--Latest Posts-->
            <?php 
			if(!empty($optimizer['front_layout_id'])){	$layout = $optimizer['front_layout_id'];	}else{		$layout = ''; }
			if(!empty($optimizer['n_posts_type_id'])){	$type = $optimizer['n_posts_type_id'];		}else{		$type = ''; }
			if(!empty($optimizer['n_posts_field_id'])){	$count = $optimizer['n_posts_field_id'];	}else{		$count = ''; }
			if(!empty($optimizer['posts_cat_id'])){		$category = $optimizer['posts_cat_id'];		}else{		$category = ''; }
			if(!empty($optimizer['navigation_type'])){	$navigation = $optimizer['navigation_type'];}else{		$navigation = ''; }
			if(!empty($category) && $type == 'post'){	$blogcat = $category;	$blogcats =implode(',', $blogcat);	}else{	$blogcats = '';	}
			?>
                <div class="lay<?php echo $optimizer['front_layout_id']; ?> optimposts" id="frontposts" data-post-layout="<?php echo $layout;?>" data-post-type="<?php echo $type;?>" data-post-count="<?php echo $count;?>" data-post-category="<?php echo $blogcats;?>" data-post-navigation="<?php echo $navigation;?>">
                    <div class="center">
                    
                    <?php /* If homepage Display the Title */?>
                    <?php if ( is_home() ) { ?>
                    	<!--POSTS TITLE-->
                        <div class="homeposts_title">
                            <?php if($optimizer['posts_title_id']) { ?>
								<h2 class="home_title"><?php echo do_shortcode($optimizer['posts_title_id']); ?></h2>
							<?php }?>
                            <?php if($optimizer['posts_subtitle_id']) { ?>
								<div class="home_subtitle"><?php echo do_shortcode($optimizer['posts_subtitle_id']); ?></div>
							<?php }?>
                            <?php if($optimizer['posts_title_id']) { ?>
								<?php get_template_part('template_parts/divider','icon'); ?>
                            <?php }?>
                        </div>
                    <?php }?>
            
                    <!--POSTS-->
					<?php if($type == 'product'){ ?>
                        	<?php get_template_part('template_parts/post','woo'); ?>
					<?php }else{ ?>
                    		<?php if($type !== 'post'){ $optimizer['posts_cat_id'] ='';} ?>
                    		<?php optimizer_posts($layout, $type, $count, $category, $navigation); ?>
                    <?php } ?>
                    
            
                       </div><!--center class end-->
                    </div><!--lay1 class end-->
                </div>
                <?php } ?>
        
        
            <?php
            break;
            }
        
        }
        
        endif;
        ?>
        

        

        <?php } ?>
        
</div>
</div><!--layer_wrapper class END-->

	
	<?php if(!empty($optimizerdb) && empty($optimizer['converted'])) { ?>
    <?php }else{ ?>
    		<?php if ( !is_active_sidebar( 'front_sidebar' ) ) : ?>
                <div class="fixed_site">
                        <div class="fixed_wrap fixindex dummypost">
                        
								<?php if(is_customize_preview()){ ?>
                                        <div class="replace_widget"><?php _e('You can Replace this Posts Section with Optimizer Widgets.','optimizer'); ?> <a class="add_widget_home"><?php _e('Add Widgets','optimizer'); ?></a></div>
                                <?php } ?>
                                
                                <?php get_template_part('template_parts/post','layout4'); ?> 
                                
                    </div>
                </div>
            <?php endif; ?>
    <?php } ?>
    
<?php }else{ ?>



<div class="fixed_site">
	<div class="fixed_wrap fixindex">
		<?php get_template_part('template_parts/post','layout4'); ?> 
	</div>
</div>
        

<?php } //is_front_page ENDS ?>
<?php get_footer(); ?>