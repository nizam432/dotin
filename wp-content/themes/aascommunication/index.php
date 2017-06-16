<?php
get_header();
get_template_part('template-parts/page/content-banner','page'); ?>

<!-- Blog Section with Sidebar -->
<div class="page-builder">
	<div class="container">
		<div class="row">
		 <!-- Blog Area -->
			<div class="<?php post_layout_class(); ?> col-md-8 " >
				<?php
					if ( have_posts() ) :
					// Start the Loop.
						while ( have_posts() ) : the_post();
							get_template_part('template-parts/post/content',''); 
						endwhile; 
					 endif; 
					 //Previous/next page navigation.
					the_posts_pagination( array(
					'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
					'next_text'          => '<i class="fa fa-angle-double-right"></i>',
					) );
					?>
			</div>
			<!-- /Blog Area -->			
			<!--Sidebar Area-->
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
			<!--Sidebar Area-->
		</div>
	</div>
</div>
<!-- /Blog Section with Sidebar -->
<?php get_footer(); ?>