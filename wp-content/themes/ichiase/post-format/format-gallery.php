<?php $mts_options = get_option(MTS_THEME_NAME);

if ( $images = get_children( array( 'post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image' ) ) ) { ?>
	<div class="full-slider-container loading">
		<div class="big-image-container">
			<div id="big-image" class="owl-carousel">
				<?php foreach( $images as $image ) {
					if($mts_options['mts_layout'] == 'scslayout' || $mts_options['mts_layout'] == 'csslayout') {
						$attachment_img = wp_get_attachment_image_src( $image->ID, 'socialme-featured' );
						$width  = '530';
						$height = '250';
					} else {
						$attachment_img = wp_get_attachment_image_src( $image->ID, 'socialme-slider' );
						$width  = '728';
						$height = '342';
					}
					$attachment_url = $attachment_img[0];
					$image_src      = $attachment_url;
					echo '<div><img src="'.$image_src.'" width="'.$width.'" height="'.$height.'"></div>';
				} ?>
			</div>
		</div>
		<div class="thumb-container">
			<div id="thumb" class="owl-carousel">
				<?php foreach( $images as $image ) {
					$attachment_img = wp_get_attachment_image_src( $image->ID, 'socialme-sliderthumb' );
					$attachment_url = $attachment_img[0];
					$image_src      = $attachment_url;
					echo '<div><img src="'.$image_src.'" width="128" height="107"></div>';
				} ?>
		  </div>	
		</div>
	</div>	
<?php if (function_exists('wp_review_show_total')) wp_review_show_total(true, 'latestPost-review-wrapper');
} ?>