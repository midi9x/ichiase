<?php

class mts_users_count_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'mts_users_count_widget',
			__( 'MTS Total Site Members', 'socialme' ),
			array( 'description' => __( 'Total Site Members Widget', 'socialme' ) )
		);
	}

	public function form($instance){
		$defaults = array( 'number' => '', 'text' => _('Total Site Members','socialme') );
		$instance = wp_parse_args( (array) $instance, $defaults );

		echo '<p><label>'.__( 'Enter Numbers:', 'socialme' ).'</label><input type="text" name="'.$this->get_field_name( 'number' ).'" id="'.$this->get_field_id( 'number' ).'" value="'.esc_attr($instance['number']).'" class="widefat" /><em>'.__( 'Leave empty to show actual number of members.', 'socialme' ).'</em></p>';
		echo '<p><label>'.__( 'Text', 'socialme' ).'</label><input type="text" name="'.$this->get_field_name( 'text' ).'" id="'.$this->get_field_id( 'text' ).'" value="'.esc_attr($instance['text']).'" class="widefat" /></p>';
	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['number'] = strip_tags( $new_instance['number'] );
		$instance['text'] = strip_tags( $new_instance['text'] );
		
		return $instance;
	}

	public function widget( $args, $instance ) {

		extract( $args );

		echo $before_widget;
			if ( !empty( $instance['number'] ) ) {
				$number = $instance['number'];
			} else {
				$result = count_users();
				$number = $result['total_users'];
			}

			if ( !empty( $instance['text'] ) ) {
				$text = $instance['text'];
			} else {
				$text = __('Total Site Members', 'socialme');
			}
			
			echo '<i class="fa fa-globe"></i>';
			echo '<strong>' . $number . '</strong>';
			echo '<span>' . $text . '</span>';

		echo $after_widget;
	}
}

// Register Widget
add_action( 'widgets_init', 'mts_register_users_count_widget' );
function mts_register_users_count_widget() {
	register_widget( "mts_users_count_widget" );
}
