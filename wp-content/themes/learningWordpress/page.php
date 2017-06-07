<?php 
get_header();  
	
	if(have_posts()):
		while(have_posts()): the_post(); ?>
		<article class="post">
		
		<?php if(has_children() OR $post->post_parent>0 ) {?>
			
		<a href="<?php echo get_the_permalink(get_top_ancestor_id())?>">
			<?php echo get_the_title(get_top_ancestor_id())?>
		</a>
		
		<?php 
			$args=array(
				'child_of'=> get_top_ancestor_id(),
				'title_li'=>'',
			);
		?>
		
		<?php wp_list_pages($args); ?>
		
		<?php } ?>
		<h2><a href="<?php the_permalink()?>"><?php the_title();?></a></h2>
		<?php the_content(); ?>
		</article>
		<?php endwhile;
		
		else:
			echo '<p>No Content Found</p>';
	endif;

get_footer();
?>