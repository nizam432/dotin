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
		while(have_posts()): the_post();
		get_template_part('content'); 
		 endwhile;
		
		else:
			echo '<p>No Content Found</p>';
	endif;
?>

<?php get_footer(); ?>