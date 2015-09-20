<?php
/*
 Header Author Slider
*/

	global $convac_lite_shortname;
	$authImageSet = convac_lite_get_option($convac_lite_shortname.'_author_img');
	$author_email = get_the_author_meta( 'ID' );
	
	if(isset($authImageSet) && $authImageSet !="") {
		// Get the image URL using the author ID and image size params
		$imgURL = $authImageSet;
		$authImageSet = "<img src='$imgURL' />";
	}else{
		$authImageSet = get_avatar( $author_email  ,200 );
	}
	
	$authName     = convac_lite_get_option($convac_lite_shortname.'_author_name');
	$authDesp = convac_lite_get_option($convac_lite_shortname."_author_desp");
?>
		<div class="container">
			<div class="row-fluid">
				<div id="author-slider" class="">
					<ul class="slides clearfix">
						<li>
							<p class="flex-caption">
								<?php echo $authImageSet; ?>
								<span class="slider-title"><?php if($authName) { echo $authName; } ?></span>
								<?php if($authDesp) { ?><span class="text"><?php echo $authDesp; ?></span><?php } ?>
							</p>
						</li>
					</ul>
					<!-- .slides -->
				</div>
				<!-- #author-slider ends -->
			</div>
			<!-- .row-fluid ends -->
		</div>
		<!-- .container ends -->