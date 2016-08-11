<!DOCTYPE html>
<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<html class="no-js" <?php language_attributes(); ?>>
<head itemscope itemtype="http://schema.org/WebSite">
	<meta charset="<?php bloginfo('charset'); ?>">
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php mts_meta(); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>
<body id="blog" <?php body_class('main'); ?> itemscope itemtype="http://schema.org/WebPage">       
	<div class="main-container">
	    <header id="site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">  
	        <?php if ( $mts_options['mts_sticky_nav'] == '1' ) { ?>
	    	    <div class="clear" id="catcher"></div>
	            <div class="header-wrap sticky-navigation">
		        <?php } else { ?>
			    <div class="header-wrap">
		        <?php } ?>
		            <div class="container">
						<div id="header">
							<?php if ( $mts_options['mts_show_primary_nav'] == '1' ) { ?>
			     				<div id="primary-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
								<a href="#" id="pull" class="toggle-mobile-menu"><i class="fa fa-bars"></i></a>
								<?php if ( has_nav_menu( 'mobile' ) ) { ?>
									<nav class="navigation clearfix">
									<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
										<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'menu clearfix', 'container' => '', 'walker' => new mts_menu_walker ) ); ?>
										<?php } else { ?>
											<ul class="menu clearfix">
												<?php wp_list_categories('title_li='); ?>
											</ul>
										<?php } ?>
									</nav>
									<nav class="navigation mobile-only clearfix mobile-menu-wrapper">
										<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_class' => 'menu clearfix', 'container' => '', 'walker' => new mts_menu_walker ) ); ?>
									</nav>
								<?php } else { ?>
									<nav class="navigation clearfix mobile-menu-wrapper">
										<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
											<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'menu clearfix', 'container' => '', 'walker' => new mts_menu_walker ) ); ?>
										<?php } ?>
									</nav>
								<?php } ?>
								</div>
				    		<?php } ?>

							<div class="logo-wrap">
								<?php if ($mts_options['mts_logo'] != '') { ?>
									<?php if( is_front_page() || is_home() || is_404() ) { ?>
										<h1 id="logo" class="image-logo" itemprop="headline">
											<a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_attr( $mts_options['mts_logo'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
										</h1><!-- END #logo -->
									<?php } else { ?>
								  		<h2 id="logo" class="image-logo" itemprop="headline">
											<a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_attr( $mts_options['mts_logo'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
										</h2><!-- END #logo -->
									<?php } ?>
								<?php } else { ?>
									<?php if( is_front_page() || is_home() || is_404() ) { ?>
										<h1 id="logo" class="text-logo" itemprop="headline">
											<a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>
										</h1><!-- END #logo -->
									<?php } else { ?>
								  		<h2 id="logo" class="text-logo" itemprop="headline">
											<a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>
										</h2><!-- END #logo -->
									<?php } ?>
								<?php } ?>
							</div>
			 
							<?php if ( isset($mts_options['mts_header_search']) && $mts_options['mts_header_search'] == '1' ) { ?>
		                		<form method="get" id="searchform" class="searchbox search-form" action="<?php echo esc_attr( home_url() ); ?>" _lpchecked="1">
	                       			<input type="text" placeholder="Search......" name="s" id="s" class="searchbox-input" onkeyup="buttonUp();" value="<?php the_search_query(); ?>" <?php if (!empty($mts_options['mts_ajax_search'])) echo ' autocomplete="off"'; ?> />
	                       			<input type="submit" class="searchbox-submit" value="">
	                       			<span class="searchbox-icon"><i class="fa fa-search"></i></span>
	                			</form>
	               			<?php } ?>

	               			<?php if ( $mts_options['mts_login_register'] == '1' ) { ?>
		            			<div class="login-menu"><?php wp_loginout(); ?> <?php if ( get_option( 'users_can_register' ) ) _e('or','socialme'); ?> <?php wp_register('',''); ?></div>
		            		<?php } ?>  

						</div><!--#header-->
					</div><!--.container-->
				</div>
			</header>