<?php
/**
* The template for displaying the footer.
*
* Contains footer content and the closing of the
* #main and #page div elements.
*
*/
global $convac_lite_shortname;
?>

	<div class="clearfix"></div>
</div>
<!-- #main --> 

<!-- Footer Strip Starts Here -->
	<div id="footer_strip"></div>
<!-- Footer Strip Ends Here -->

<!-- #footer -->
<div id="footer">
	<div class="container">
		<div class="row-fluid">
			<div class="second_wrapper">
				<?php dynamic_sidebar( 'Footer Sidebar' ); ?>
				<div class="clearfix"></div>
			</div><!-- second_wrapper -->
		</div>
	</div>

	<div class="third_wrapper">
		<div class="container">
			<div class="row-fluid">
				<?php $convac_lite_page = 'http://www.sketchthemes.com/themes/convac-multi-cuisine-restaurant-wordpress-theme/'; ?>
				<div class="copyright span12"> <?php echo stripslashes(convac_lite_get_option($convac_lite_shortname."_copyright")); ?> </div>
				<div class="owner span12"><?php _e('Convac Theme by','convac-lite'); ?> <a href="<?php echo $convac_lite_page; ?>" target="_blank"><?php _e('SketchThemes','convac-lite'); ?></a></div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div><!-- third_wrapper --> 
</div>
<!-- #footer -->

</div>
<!-- #wrapper -->
	<a href="JavaScript:void(0);" title="Back To Top" id="backtop"></a>
	<?php wp_footer(); ?>
	
	<?php
	$_custom_js = convac_lite_get_option($convac_lite_shortname.'_custom_js');
	// Custom JS
	if (!empty($_custom_js )) {
		?><script><?php
		echo PHP_EOL.'// Custom JS'.PHP_EOL;
		echo $_custom_js;
		?></script><?php
	}
	?>
	<?php // [[[[[[[[[[[[  google analytics 
	if(convac_lite_get_option($convac_lite_shortname."_analytics")){ 	
		echo stripslashes(convac_lite_get_option($convac_lite_shortname."_analytics"));
	}
	// google analytics ]]]]]]]]]]]]]]]]]]]
	?>
</body>
</html>