<?php 

get_header();

	if(have_posts()):
	?>	
	
	<h2><?php 
		if(is_category()) {
			echo 'This is a category';
		} elseif(is_tag()) {
			echo 'Tag';
		} elseif(is_author()) {
			echo 'Author Archive '.get_the_author();
		} elseif(is_day()) {
			echo 'Day Archive';
		}elseif(is_month()) {
			echo 'Month Archive '.get_the_date('F Y');
		}elseif(is_year()) {
			echo 'Year Archive '.get_the_date('Y');
		} else {
			echo 'Archive';
		}
			
	?></h2>
<?php 
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
		<?php the_content(); ?>
		</article>
		<?php endwhile;
		
		else:
			echo '<p>No Content Found</p>';
	endif;
?>

<?php get_footer(); ?>