<?php 
get_header();  
	
		if(have_posts()):
			while(have_posts()): the_post();
				 the_content(); 
			endwhile;
			
			else:
				echo '<p>No Content Found</p>';
		endif;
		//sfecific category post
		$optionPots= new WP_Query('cat=3&post_per_page=1&orderby=title&order=ASC');
		if($optionPots->have_posts()):
			while($optionPots->have_posts()): $optionPots->the_post();?>
			<h2>
				<a href="<?php the_permalink()?>">
					<?php the_title()?>
				</a>
			</h2>
				<?php the_excerpt()?>

			<?php endwhile;
			
			else:
				echo '<p>No Content Found</p>';
		endif;
		wp_reset_postdata();
		
		//news post
		$newsPost= new WP_Query('cat=1&post_per_page=1&orderby=title&order=ASC');
		if($newsPost->have_posts()):
			while($newsPost->have_posts()): $newsPost->the_post();?>
			<h2><?php the_title()?></h2>

			<?php endwhile;
			
			else:
				echo '<p>No Content Found</p>';
		endif;
		wp_reset_postdata();
		
get_footer();
?>