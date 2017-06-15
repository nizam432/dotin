<?php
/**Includes reqired resources here**/
define('WEBRITI_TEMPLATE_DIR_URI', get_template_directory_uri());

// Set the content_width with 900
if ( ! isset( $content_width ) ) $content_width = 900;
require_once('theme_setup_data.php');

	

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
function asscommunication_setup() { 

	//Navigation Menus
	register_nav_menus(array(
		'top_menu'=>__('Top Menu'),
		'footer' =>__('Footer Menu'),
	));
	
	// Add featured image support
	add_theme_support('post-tumbnails');
	add_image_size('small-thumbnails',180,120,true);
	
	// Add post format support
	add_theme_support('post-formats',array('aside','gallery','link'));
}

add_action('after_setup_theme', 'asscommunication_setup');





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
	
	

/**
 * breadcum function.
 */
require get_parent_theme_file_path( '/inc/script.php' );

/**
 * breadcum function.
 */
require get_parent_theme_file_path( '/inc/breadcrumbs.php' );

/**
 * widgets functions.
 */
require get_parent_theme_file_path( '/inc/widgets.php' );

/**
 * Nav menu functions.
 */
require get_parent_theme_file_path( '/inc/nav_walker.php' );

