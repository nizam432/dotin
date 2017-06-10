<?php 
/*
	Template Name: Special Layout
*/
get_header();  
	
	if(have_posts()):
		while(have_posts()): the_post(); ?>
		<article class="post">
		<h2><a href="<?php the_permalink()?>"><?php the_title();?></a></h2>
		<!-- info-box -->
		<div class="info-box">
			<h4>Disclaimer Title</h4>
			<p>Disclaimer Title Disclaimer Title Disclaimer
			Title Disclaimer Title Disclaimer Title Disclaimer 
			Title Disclaimer Title Disclaimer Title
			Disclaimer Title Disclaimer Title Disclaimer Title </p>
		</div><!-- /info-box -->
		
		<?php the_content(); ?>
		</article>
		<?php endwhile;
		
		else:
			echo '<p>No Content Found</p>';
	endif;

get_footer();?>