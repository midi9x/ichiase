<?php
/**
 * The template for displaying 404 (Not Found) pages.
 */
?>
<?php get_header(); ?>
<div id="page">
	<div class="sidebar-left-article">	
		<article class="article">
			<div id="content_box" class="single_post">
				<header>
					<div class="title">
						<h1><?php _e('Error 404 Not Found', 'socialme' ); ?></h1>
					</div>
				</header>
				<div class="post-content">
					<p><?php _e('Oops! We couldn\'t find this Page.', 'socialme' ); ?></p>
					<p><?php _e('Please check your URL or use the search form below.', 'socialme' ); ?></p>
					<?php get_search_form();?>
				</div><!--.post-content--><!--#error404 .post-->
			</div><!--#content-->
		</article>
		<?php get_sidebar('left') ?>
	</div>
	<?php if ( isset($mts_options['mts_layout']) && ($mts_options['mts_layout'] == 'scslayout' || $mts_options['mts_layout'] == 'csslayout' ) ) {
        get_sidebar(); 
    }
get_footer(); ?>