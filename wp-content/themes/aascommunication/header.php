<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset')?>">
		<meta name="viewport" content="width-device-width">
		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>	
	</head>
	
<body <?php body_class(); ?>>
	<!--Logo & Menu Section-->	
	<nav class="navbar navbar-default">
		<div class="container">
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			<?php
				$args= array(
					'theme_location'=>'primary'
				);
			?>
			<?php //wp_nav_menu($args); ?>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>	
<!--/Logo & Menu Section-->	
<div class="clearfix"></div>		
		<h1> <a href="<?php echo home_url(); ?>"> <?php bloginfo('name');?> </a> </h1>
		<h5><?php bloginfo('description'); ?></h5>
		<?php if(is_page('protfolio')) {?>
			Tanks for frotpolio
		<?php } ?>
		<nav class="site-nav">
			<?php
				//$args= array(
				//	'theme_location'=>'primary'
				//);
			?>
			<?php //wp_nav_menu($args); ?>
		</nav>
	</header> <!-- /site-header -->