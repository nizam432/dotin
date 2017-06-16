<?php 
//header part
get_header();

//include banner page
get_template_part( 'template-parts/page/content-banner', 'page' );

//content part
if(have_posts()):
	while(have_posts()): the_post();
		//include page 
		the_content();
	endwhile;
	
	else:
		echo '<p>No Content Found</p>';
endif;

//footer part	
get_footer(); 
?>eeeeeeeeeeeeee