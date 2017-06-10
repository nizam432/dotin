<?php

function learningWordPress_resources(){
	wp_enqueue_style('style',get_stylesheet_uri());
}

add_action('wp_enqueue_scripts','learningWordpress_resources');




// Get top ancestor
function get_top_ancestor_id(){
	global $post;
	if($post->post_parent){
		$ancestors=array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}
	return $post->ID;
}

// Does have children?
function has_children()
{
	global $post;
	$pages=get_pages('child_of'.$post->ID);
	return count($pages);
}

// Customize excerpt word count length 
function custom_excerpt_length()
{
	return  25;
}

add_filter('excerpt_lenght','custom_excerpt_length');

// Add featured image support
function learningWordPress_setup() { 

	//Navigation Menus
	register_nav_menus(array(
		'primary'=>__('Primary Menu'),
		'footer' =>__('Footer Menu'),
	));
	
	// Add featured image support
	add_theme_support('post-tumbnails');
	add_image_size('small-thumbnails',180,120,true);
	
	// Add post format support
	add_theme_support('post-formats',array('aside','gallery','link'));
}

add_action('after_setup_theme', 'learningWordPress_setup');


//widgets initialize
function ourWidgetsInit() {
	register_sidebar(array(
		'name'=> 'Sidebar',
		'id' => 'sidebar1',
	)); 
	
	register_sidebar(array(
		'name'=> 'Footer area 1',
		'id' => 'footer1',
	));	
}

add_action('widgets_init','ourWidgetsInit');


function learningWordPress_customize_register($wp_customize) {
	
	//Customize Appearence Option
	$wp_customize->add_setting('lwp_link_color',array(
			'default'=> '#006ec3',
			'transport'=> 'refresh',		
		));

	$wp_customize->add_section('lwp_standard_colors',array(
			'title'=> __('Standard Color','learningWordPress'),
			'priority'=> 30,		
		));	
		
	$wp_customize->add_control(New Wp_Customize_Color_Control($wp_customize, 'lwp_link_color_control', array(
		'label'=> __('Link Color','learningWordPress'),
		'section'=> 'lwp_standard_colors',
		'settings'=> 'lwp_link_color',
	) ) );			
}

add_action('customize_register','learningWordPress_customize_register');

// Output Customize Css

function learningWordPress_customize_cs() {?>
	<style type="text/css">
		a:link,
		a:visited{
			color: <?php echo get_theme_mod('lwp_link_color'); ?> ;
		}
		
	</style>
	
<?php }
	add_action('wp_head','learningWordPress_customize_cs');