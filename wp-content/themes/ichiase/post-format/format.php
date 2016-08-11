<?php $mts_options = get_option(MTS_THEME_NAME);

if( has_post_thumbnail() && !is_singular()) { ?>
	<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
		<div class="featured-thumbnail">
			<?php
				$id        = get_post_thumbnail_id();
				if($mts_options['mts_layout'] == 'scslayout' || $mts_options['mts_layout'] == 'csslayout') {
					$image = wp_get_attachment_image_src( $id, 'socialme-featured' );
					$width  = '530';
					$height = '250';
				} else {
					$image = wp_get_attachment_image_src( $id, 'socialme-slider' );
					$width  = '728';
					$height = '342';
				}
				$image_url = $image[0];
				$thumbnail = $image_url;
			echo '<img src="'.$thumbnail.'" class="wp-post-image" width="'.$width.'" height="'.$height.'">';
			if (function_exists('wp_review_show_total')) wp_review_show_total(true, 'latestPost-review-wrapper'); ?>
		</div>
	</a>
<?php } ?>