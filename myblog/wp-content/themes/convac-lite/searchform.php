<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
	<div class="searchleft">
		<input type="text" value="" placeholder="<?php _e('Search','convac-lite');?>" name="s" id="searchbox" class="searchinput"/>
	</div>
    <div class="searchright">
    	<input type="submit" class="submitbutton" value="<?php _e('Search','convac-lite');?>" />
    </div>
    <div class="clearfix"></div>
</form>

