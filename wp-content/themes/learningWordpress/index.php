<?php get_header(); ?>

<?php 
	if(have_posts()):
		while(have_posts()): the_post(); ?>
		<article class="post">
		<p><?php the_time('F jS, Y'); ?> By  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'))?>"><?php the_author(); ?></a></p>
		Post  in |
		<?php 
			$categories=get_the_category(); 
			$separator=", ";
			$output='';
			
			if($categories){
				foreach($categories as $category){
					$output .= '<a href="'.get_category_link($category->term_id).'">'.$category->cat_name.'</a>'.$separator;
				}
			}
			echo trim($output,$separator);
			
		?>
		
		<h2><a href="<?php the_permalink()?>"><?php the_title();?></a></h2>
		<?php the_post_thumbnails('small-thumbnails');
		<?php the_content(); ?>
		
	<!--	<a href="<?php the_permalink(); ?>">Read More</a>-->
		
		</article>
		<?php endwhile;
		
		else:
			echo '<p>No Content Found</p>';
	endif;
?>

<?php get_footer(); ?>