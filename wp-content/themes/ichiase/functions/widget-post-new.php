<?php

class mts_post_new_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'mts_post_new_widget',
			__( 'MTS New Post Button', 'socialme' ),
			array( 'description' => __( 'New Post Button Widget', 'socialme' ) )
		);
	}

	public function widget( $args, $instance ) {

		if ( is_user_logged_in() && current_user_can( 'publish_posts' ) ) {
			echo '<a href="'. esc_url( admin_url( 'post-new.php' ) ) . '" class="widget mts-post-new">';
				echo __( 'Create new post', 'socialme' );
			echo '</a>';
		}
	}
}

// Register Widget
add_action( 'widgets_init', 'mts_register_post_new_widget' );
function mts_register_post_new_widget() {
	register_widget( "mts_post_new_widget" );
}
