<?php

function novalite_widgets_init() {
	
	register_sidebar(array(
	
		'name' => 'Sidebar',
		'id'   => 'side_sidebar_area',
		'description'   => 'This sidebar will be shown at the side of content.',
		'before_widget' => '<div class="pin-article span4"><div class="article">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>'
	
	));

	register_sidebar(array(
	
		'name' => 'Header Sidebar',
		'id'   => 'header_sidebar_area',
		'description'   => 'This sidebar will be shown before the content.',
		'before_widget' => '<div class="pin-article ' . novalite_setting('wip_header_sidebar_area') . '"><div class="article">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>'
	
	));

	register_sidebar(array(
	
		'name' => 'Bottom Sidebar',
		'id'   => 'bottom_sidebar_area',
		'description'   => 'This sidebar will be shown after the content.',
		'before_widget' => '<div class="' . novalite_setting('wip_bottom_sidebar_area') . '"><div class="widget-box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>'
	
	));
}

add_action( 'widgets_init', 'novalite_widgets_init' );

?>