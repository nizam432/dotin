<?php 
//widgets initialize
function ourWidgetsInit() {
	register_sidebar(array(
		'name'=> 'Sidebar',
		'id' => 'sidebar1',
		'description' => __( 'Sidebar widget area', 'appointment' ),
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="sidebar-widget-title"><h3>',
		'after_title' => '</h3></div>',
	)); 
	
	register_sidebar(array(
		'name'=> 'Footer area 1',
		'id' => 'footer1',
		'before_widget' => '<div class="col-md-3 col-sm-6 footer-widget-column">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>',
	));	
}

add_action('widgets_init','ourWidgetsInit');
?>