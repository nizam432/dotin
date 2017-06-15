<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset')?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>	
	</head>
	
<body <?php body_class(); ?>>

	<!--Logo & Menu Section-->	
	<nav class="navbar navbar-default">
		<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
				<?php if($header_setting['text_title'] == 1) { ?>
				<h1><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
					 if($header_setting['enable_header_logo_text'] == 1) 
					{ echo "<div class=appointment_title_head>" . get_bloginfo( ). "</div>"; }
					elseif($header_setting['upload_image_logo']!='') 
					{ ?>
					<img class="img-responsive" src="<?php echo $header_setting['upload_image_logo']; ?>" style="height:<?php echo $header_setting['height']; ?>px; width:<?php echo $header_setting['width']; ?>px;"/>
					<?php } else { ?>
					<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/logo.png">
					<?php } ?>
				</a></h1>
				<?php } ?>	
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only"><?php echo 'Toggle navigation'; ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
		

			<?php wp_nav_menu( array(  
				'theme_location' => 'primary',
				'container'  => '',
				'menu_class' => 'nav navbar-nav navbar-right',
				'fallback_cb' => 'webriti_fallback_page_menu',
				'items_wrap'  => $social,
				'walker' => new webriti_nav_walker()
				 ) );
				?>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>	
<!--/Logo & Menu Section-->	
<div class="clearfix"></div>		

	</header> <!-- /site-header -->