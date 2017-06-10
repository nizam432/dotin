<?php
/**Includes reqired resources here**/
define('WEBRITI_TEMPLATE_DIR_URI', get_template_directory_uri());


/* Includes all style and script files
 */
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
	wp_enqueue_script('jquery-3.2.1.min.js' , WEBRITI_TEMPLATE_DIR_URI.'/assets/js/jquery-3.2.1.min.js');	
    wp_enqueue_script('bootstrap-js' , WEBRITI_TEMPLATE_DIR_URI.'/assets/js/bootstrap.min.js');
	wp_enqueue_script('menu-js' , WEBRITI_TEMPLATE_DIR_URI.'/assets/js/menu/menu.js');
}

add_action('wp_enqueue_scripts','asscommunication_resources');




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
	
	
/** nav-menu-walker.php */
class webriti_nav_walker extends Walker_Nav_Menu {	
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		if ($args->has_children && $depth > 0) {
			$classes[] = 'dropdown-submenu';
		} else if($args->has_children && $depth === 0) {
			$classes[] = 'dropdown';
		}
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		//$attributes .= ($args->has_children) 	    ? ' data-toggle="dropdown" data-target="#" class="dropdown-toggle"' : '';
			
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ($args->has_children && $depth == 0) ? '<b class="caret"></b></a>' : '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) ) 
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array($this, 'start_el'), $cb_args);

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array($this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array($this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array($this, 'end_el'), $cb_args);
	}
}
function webriti_nav_menu_css_class( $classes ) {
	if ( in_array('current-menu-item', $classes ) OR in_array( 'current-menu-ancestor', $classes ) )
		$classes[]	=	'active';

	return $classes;
}
add_filter( 'nav_menu_css_class', 'webriti_nav_menu_css_class' );


function webriti_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'webriti_page_menu_args' );

 
function webriti_fallback_page_menu( $args = array() ) {

	$defaults = array('sort_column' => 'menu_order, post_title', 'menu_class' => 'menu', 'echo' => true, 'link_before' => '', 'link_after' => '');
	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'wp_page_menu_args', $args );

	$menu = '';

	$list_args = $args;

	// Show Home in the menu
	if ( ! empty($args['show_home']) ) {
		if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
			$text = __('Home','appointment');
		else
			$text = $args['show_home'];
		$class = '';
		if ( is_front_page() && !is_paged() )
			$class = 'class="current_page_item"';
		$menu .= '<li ' . $class . '><a href="' . home_url( '/' ) . '" title="' . esc_attr($text) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
		// If the front page is a page, add it to the exclude list
		if (get_option('show_on_front') == 'page') {
			if ( !empty( $list_args['exclude'] ) ) {
				$list_args['exclude'] .= ',';
			} else {
				$list_args['exclude'] = '';
			}
			$list_args['exclude'] .= get_option('page_on_front');
		}
	}

	$list_args['echo'] = false;
	$list_args['title_li'] = '';
	$list_args['walker'] = new webriti_walker_page_menu;
	$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages($list_args) );

	if ( $menu )
		$menu = '<ul class="'. esc_attr($args['menu_class']) .'">' . $menu . '</ul>';

	$menu = '<div class="' . esc_attr($args['container_class']) . '">' . $menu . "</div>\n";
	$menu = apply_filters( 'wp_page_menu', $menu, $args );
	if ( $args['echo'] )
		echo $menu;
	else
		return $menu;
}
class webriti_walker_page_menu extends Walker_Page{
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class='dropdown-menu'>\n";
	}
	function start_el( &$output, $page, $depth=0, $args = array(), $current_page = 0 ) {
		if ( $depth )
			$indent = str_repeat("\t", $depth);
		else
			$indent = '';

		extract($args, EXTR_SKIP);
		$css_class = array('page_item', 'page-item-'.$page->ID);
		if ( !empty($current_page) ) {
			$_current_page = get_post( $current_page );
			if ( in_array( $page->ID, $_current_page->ancestors ) )
				$css_class[] = 'current_page_ancestor';
			if ( $page->ID == $current_page )
				$css_class[] = 'current_page_item';
			elseif ( $_current_page && $page->ID == $_current_page->post_parent )
				$css_class[] = 'current_page_parent';
		} elseif ( $page->ID == get_option('page_for_posts') ) {
			$css_class[] = 'current_page_parent';
		}

		$css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

		$output .= $indent . '<li class="' . $css_class . '"><a href="' . get_permalink($page->ID) . '">' . $link_before . apply_filters( 'the_title', $page->post_title, $page->ID ) . $link_after . '</a>';

		if ( !empty($show_date) ) {
			if ( 'modified' == $show_date )
				$time = $page->post_modified;
			else
				$time = $page->post_date;

			$output .= " " . mysql2date($date_format, $time);
		}
	}
}
