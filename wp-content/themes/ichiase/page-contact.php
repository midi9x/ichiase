<?php
/**
 * Template Name: Contact Page
 */
?>
<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<?php get_header(); ?>
<div id="page" class="<?php mts_single_page_class(); ?>">
	<?php $header_animation = mts_get_post_header_effect(); ?>
	<?php if ( 'parallax' === $header_animation ) {?>
		<?php if (mts_get_thumbnail_url()) : ?>
	        <div id="parallax" <?php echo 'style="background-image: url('.mts_get_thumbnail_url().');"'; ?>></div>
	    <?php endif; ?>
	<?php } else if ( 'zoomout' === $header_animation ) {?>
		 <?php if (mts_get_thumbnail_url()) : ?>
	        <div id="zoom-out-effect"><div id="zoom-out-bg" <?php echo 'style="background-image: url('.mts_get_thumbnail_url().');"'; ?>></div></div>
	    <?php endif; ?>
	<?php } ?>
	<div class="sidebar-left-article <?php $page_class = mts_article_class(); if($page_class == 'ss-full-width') echo $page_class; ?>">
	 	<article class="<?php if($page_class != 'ss-full-width') echo $page_class; ?>">
			<div id="content_box" >
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
						<div class="single_page single_post">
							<?php if ($mts_options['mts_breadcrumb'] == '1') { ?>
								<div class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#"><?php mts_the_breadcrumb(); ?></div>
							<?php } ?>
							<header>
								<h1 class="title entry-title"><?php the_title(); ?></h1>
							</header>
							<div class="post-content thecontent box mark-links entry-content">
								<?php the_content(); ?>
								<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('Next', 'socialme' ), 'previouspagelink' => __('Previous', 'socialme' ), 'pagelink' => '%','echo' => 1 )); ?>
								<?php mts_contact_form() ?>
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