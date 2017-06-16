<div id="post-<?php the_ID(); ?>" <?php post_class('blog-lg-area-left'); ?>>
	<div class="media">						
	<?php aside_meta_content(); ?>
		<div class="media-body">
			<?php // Check Image size for fullwidth template
				 post_thumbnail('','img-responsive');
				 post_meta_content(); 
				?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php		
				// call editor content of post/page	
				the_content( __('Read More', 'appointment' ) );
				wp_link_pages( );
			   ?>
		</div>
	 </div>
</div>