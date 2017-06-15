<?php 
	get_header();  

	//****** get index static banner  ********
	get_template_part('index', 'slider');
	//****** get top contact ********				
	get_template_part('index', 'topcontact');
	//****** get index service  ********				
	get_template_part('index', 'service');
		
	get_footer();
?>
