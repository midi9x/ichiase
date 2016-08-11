<?php
/**
 * The template for displaying all single posts.
 */
?>
<?php get_header(); ?>
<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<div id="page" class="<?php mts_single_page_class(); ?>">
	<div class="sidebar-left-article <?php $page_class = mts_article_class(); if($page_class == 'ss-full-width') echo $page_class; ?>">
		<article class="<?php if($page_class != 'ss-full-width') echo $page_class; ?>">
			<div id="content_box" >
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
						<?php if ($mts_options['mts_breadcrumb'] == '1') { ?>
							<div class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#"><?php mts_the_breadcrumb(); ?></div>
						<?php }
						
						$header_animation = mts_get_post_header_effect();
						if ( 'parallax' === $header_animation ) {
							if (mts_get_thumbnail_url()) : ?>
						        <div id="parallax" <?php echo 'style="background-image: url('.mts_get_thumbnail_url().');"'; ?>></div>
						    <?php endif;
						} else if ( 'zoomout' === $header_animation ) {
							if (mts_get_thumbnail_url()) : ?>
						        <div id="zoom-out-effect"><div id="zoom-out-bg" <?php echo 'style="background-image: url('.mts_get_thumbnail_url().');"'; ?>></div></div>
						    <?php endif;
						}

						// Single post parts ordering
						if ( isset( $mts_options['mts_single_post_layout'] ) && is_array( $mts_options['mts_single_post_layout'] ) && array_key_exists( 'enabled', $mts_options['mts_single_post_layout'] ) ) {
							$single_post_parts = $mts_options['mts_single_post_layout']['enabled'];
						} else {
							$single_post_parts = array( 'content' => 'content', 'related' => 'related', 'author' => 'author' );
						}
						foreach( $single_post_parts as $part => $label ) { 
							switch ($part) {
								case 'content':
									?>
									<div class="single_post">
										<header>
											<?php if ( isset ( $mts_options['mts_single_meta_info_enable']['author_image'] ) == '1' || isset ( $mts_options['mts_single_meta_info_enable']['author'] ) == '1' || isset ( $mts_options['mts_single_meta_info_enable']['post_date'] ) == '1' || isset ( $mts_options['mts_single_meta_info_enable']['comment'] ) == '1') { ?>
							 			    	<div class="post-info">
		                                      		<div class="post-info-left"> 
				                                        <?php if ( isset ( $mts_options['mts_single_meta_info_enable']['author_image'] ) == '1' ) { ?> 
				                                          <div class="author-image"><?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '60' );  } ?></div>
				                                        <?php } ?>
				                                        <div class="author-info">
					                                        <?php if ( isset ( $mts_options['mts_single_meta_info_enable']['author'] ) == '1' ) { ?>
					                                          <div class="vcard"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="nofollow" class="fn"><?php the_author_meta( 'display_name' ); ?></a></div>
					                                        <?php } ?>
					                                        <?php if ( isset ( $mts_options['mts_single_meta_info_enable']['post_date'] ) == '1' ) { ?>
					                                         <div class="thetime updated"><span><?php the_time( get_option( 'date_format' ) ); ?></span></div>
					                                        <?php  } ?>
					                                    </div>
				                                    </div> 
				                                    <?php if ( isset ( $mts_options['mts_single_meta_info_enable']['comment'] ) == '1' ) { ?>
				                                        <div class="thecomment">
				                                            <a rel="nofollow" href="<?php echo esc_url( get_comments_link() ); ?>" itemprop="interactionCount"><i class="fa fa-comment"></i> <?php comments_number();?></a>
				                                        </div>
				                                    <?php } ?>
		                                    	</div>
		                                    <?php } ?>
                                        	<h1 class="title single-title entry-title"><?php the_title(); ?></h1>
									  	</header><!--.headline_area-->
										<div class="post-single-content box mark-links entry-content">
											<?php if ($mts_options['mts_posttop_adcode'] != '') { ?>
												<?php $toptime = $mts_options['mts_posttop_adcode_time']; if (strcmp( date("Y-m-d", strtotime( "-$toptime day")), get_the_time("Y-m-d") ) >= 0) { ?>
													<div class="topad">
														<?php echo do_shortcode($mts_options['mts_posttop_adcode']); ?>
													</div>
												<?php } ?>
											<?php } ?>
											<?php if (isset($mts_options['mts_social_button_position']) && $mts_options['mts_social_button_position'] == 'top') mts_social_buttons(); ?>
	                                        <?php get_template_part( 'post-format/format', get_post_format() ); ?>
											<div class="thecontent">
												<?php the_content(); ?>
											</div>
											<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('<i class="fa fa-angle-right"></i>', 'socialme' ), 'previouspagelink' => __('<i class="fa fa-angle-left"></i>', 'socialme' ), 'pagelink' => '%','echo' => 1 )); ?>
											<?php if ($mts_options['mts_postend_adcode'] != '') { ?>
												<?php $endtime = $mts_options['mts_postend_adcode_time']; if (strcmp( date("Y-m-d", strtotime( "-$endtime day")), get_the_time("Y-m-d") ) >= 0) { ?>
													<div class="bottomad">
														<?php echo do_shortcode($mts_options['mts_postend_adcode']); ?>
													</div>
												<?php } ?>
											<?php } ?> 
											<?php if (isset($mts_options['mts_social_button_position']) && $mts_options['mts_social_button_position'] !== 'top') mts_social_buttons(); ?>
										</div><!--.post-single-content-->
									</div><!--.single_post-->
									<?php
								break;

								case 'categories': ?>
									<div class="post-footer">
									<?php if ( isset ( $mts_options['mts_home_meta_info_enable']['category'] ) == '1' ) { ?>
                						<div class="thecategory"><?php mts_the_category(' ') ?></div>
									<?php }
        							if ( !empty( $mts_options['mts_points_feature'])) { mts_like_dislike(); } ?>
        							</div> <?php
								break;

								case 'tags':
									?>
									<?php mts_the_tags('<div class="tags">',' ') ?>
									<?php
								break;

								case 'related':
									mts_related_posts();
								break;

								case 'author':
									?>
									<div class="postauthor">
										<h4><?php _e('About The Author', 'socialme' ); ?></h4>
										<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '100' );  } ?>
										<h5 class="vcard author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="fn"><?php the_author_meta( 'display_name' ); ?></a></h5>
										<p><?php the_author_meta('description') ?></p>
									</div>
									<?php
								break;
							}
						} ?>
					</div><!--.g post-->
					<?php comments_template( '', true ); ?>
				<?php endwhile; /* end loop */ ?>
			</div>
		</article>
		<?php get_sidebar('left') ?>
	</div>
	<?php if ( isset($mts_options['mts_layout']) && ($mts_options['mts_layout'] == 'scslayout' || $mts_options['mts_layout'] == 'csslayout' ) ) {
        get_sidebar(); 
    }
get_footer(); ?>