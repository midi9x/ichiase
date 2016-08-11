<?php
/**
 * The template for displaying all pages.
 *
 * Other pages can use a different template by creating a file following any of these format:
 * - page-$slug.php
 * - page-$id.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>
<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<?php get_header(); ?>
<div id="page" class="<?php mts_single_page_class(); ?>">
	<div class="sidebar-left-article <?php $page_class = mts_article_class(); if($page_class == 'ss-full-width') echo $page_class; ?>">
		<article class="<?php if($page_class != 'ss-full-width') echo $page_class; ?>">
			<div id="content_box" >
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>

						<?php $header_animation = mts_get_post_header_effect();
						if ( 'parallax' === $header_animation ) {
							if (mts_get_thumbnail_url()) : ?>
						        <div id="parallax" <?php echo 'style="background-image: url('.mts_get_thumbnail_url().');"'; ?>></div>
						    <?php endif;
						} else if ( 'zoomout' === $header_animation ) {
							if (mts_get_thumbnail_url()) : ?>
						        <div id="zoom-out-effect"><div id="zoom-out-bg" <?php echo 'style="background-image: url('.mts_get_thumbnail_url().');"'; ?>></div></div>
						    <?php endif;
						} ?>
						
						<div class="single_page single_post">
							<?php if ($mts_options['mts_breadcrumb'] == '1') { ?>
								<div class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#"><?php mts_the_breadcrumb(); ?></div>
							<?php } ?>
							<header>
								<h1 class="title entry-title"><?php the_title(); ?></h1>
							</header>
							<div class="post-content box mark-links entry-content">
								<?php if (!empty($mts_options['mts_social_buttons_on_pages']) && isset($mts_options['mts_social_button_position']) && $mts_options['mts_social_button_position'] == 'top') mts_social_buttons(); ?>
								<div class="thecontent">
									<?php the_content(); ?>
								</div>
								<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('<i class="fa fa-angle-right"></i>', 'socialme' ), 'previouspagelink' => __('<i class="fa fa-angle-left"></i>', 'socialme' ), 'pagelink' => '%','echo' => 1 )); ?>
								
								<?php if (!empty($mts_options['mts_social_buttons_on_pages']) && isset($mts_options['mts_social_button_position']) && $mts_options['mts_social_button_position'] !== 'top') mts_social_buttons(); ?>
							</div><!--.post-content box mark-links-->
						</div>
					</div>
					<?php comments_template( '', true ); ?>
				<?php endwhile; ?>
			</div>
		</article>
	 	<?php get_sidebar('left') ?>
	</div>
	<?php if ( isset($mts_options['mts_layout']) && ($mts_options['mts_layout'] == 'scslayout' || $mts_options['mts_layout'] == 'csslayout' ) ) {
        get_sidebar(); 
    }
get_footer(); ?>