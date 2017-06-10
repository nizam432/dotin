<?php get_header(); ?>
<div class="main_div">
	<?php 
		if(have_posts()):
			while(have_posts()): the_post();
				 get_template_part('content',get_post_format()); 
			endwhile;
			
			else:
				echo '<p>No Content Found</p>';
		endif;
	?>
</div>
<div  class="sidebar">
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>