<?php $quote_meta = get_post_meta( get_the_ID(), '_format_quote_source_name', true ); ?>
<blockquote class="quotes">
<?php if ( $quote_meta == '' ) { ?>
	<div class="message_box warning">
		<div class="quotes"><?php _e( 'Please Insert Some Quote.', 'socialme' ); ?></div>
	</div>
<?php } else {
	$embed_code = esc_attr( $quote_meta );
	echo the_content().' <strong>'.$quote_meta.'</strong>';
} ?>
</blockquote>