<?php
//* Includes all style and script files
 
function asscommunication_resources(){
	wp_enqueue_style('style',get_stylesheet_uri());
	wp_enqueue_style('bootstrap-css',WEBRITI_TEMPLATE_DIR_URI.'/assets/css/bootstrap.min.css');
	wp_enqueue_style('default',WEBRITI_TEMPLATE_DIR_URI.'/assets/css/default.css');
	wp_enqueue_style('menu-css',WEBRITI_TEMPLATE_DIR_URI.'/assets/css/theme-menu.css');
	wp_enqueue_style('element-css',WEBRITI_TEMPLATE_DIR_URI.'/assets/css/element.css');
	
	/* Media Responsive Css */
	wp_enqueue_style('media-responsive-css',WEBRITI_TEMPLATE_DIR_URI.'/assets/css/media-responsive.css');
	
	/* Font Awesome */
    wp_enqueue_style('font-awesome-min', WEBRITI_TEMPLATE_DIR_URI . '/assets/css/font-awesome/css/font-awesome.min.css');		

	
	//wp_enqueue_script( 'jquery' );
	wp_enqueue_script('jquery.min.js' , WEBRITI_TEMPLATE_DIR_URI.'/assets/js/jquery.min.js');	
    wp_enqueue_script('bootstrap-js' , WEBRITI_TEMPLATE_DIR_URI.'/assets/js/bootstrap.min.js');
	wp_enqueue_script('menu-js' , WEBRITI_TEMPLATE_DIR_URI.'/assets/js/menu/menu.js');
}

add_action('wp_enqueue_scripts','asscommunication_resources');
?>