<?php

class mts_featured_author_box_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'mts_featured_author_box_widget',
			__( 'MTS Featured Author Box', 'socialme' ),
			array( 'description' => __( 'Author Box Widget. Will be visible site-wide except on single posts and author archive.', 'socialme' ) )
		);
	}

 	public function form($instance){
		$defaults = array( 'username' => '', 'consumerkey' => '', 'consumersecret' => '', 'accesstoken' => '', 'accesstokensecret' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		echo '<p>Use this widget to show <strong>Author Box on all pages except single posts</strong>. If you want to show author box on Single Posts, please use MTS Author Box Widget';
		echo '<p><label>'.__('Author Username', 'socialme' ).':</label><input type="text" name="'.$this->get_field_name( 'username' ).'" id="'.$this->get_field_id( 'username' ).'" value="'.esc_attr($instance['username']).'" class="widefat" /></p>';
		echo '<p><label>'.__('Twitter App API Key', 'socialme' ).':</label><input type="text" name="'.$this->get_field_name( 'consumerkey' ).'" id="'.$this->get_field_id( 'consumerkey' ).'" value="'.esc_attr($instance['consumerkey']).'" class="widefat" /></p>';
		echo '<p><label>'.__('Twitter App API Secret', 'socialme' ).':</label><input type="text" name="'.$this->get_field_name( 'consumersecret' ).'" id="'.$this->get_field_id( 'consumersecret' ).'" value="'.esc_attr($instance['consumersecret']).'" class="widefat" /></p>';
		echo '<p><label>'.__('Twitter App Access Token', 'socialme' ).':</label><input type="text" name="'.$this->get_field_name( 'accesstoken' ).'" id="'.$this->get_field_id( 'accesstoken' ).'" value="'.esc_attr($instance['accesstoken']).'" class="widefat" /></p>';
		echo '<p><label>'.__('Twitter App Access Token Secret', 'socialme' ).':</label><input type="text" name="'.$this->get_field_name( 'accesstokensecret' ).'" id="'.$this->get_field_id( 'accesstokensecret' ).'" value="'.esc_attr($instance['accesstokensecret']).'" class="widefat" /></p>';

		echo '<p><strong>For Twitter API</strong> Visit <a href="https://dev.twitter.com/apps/" target="_blank">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you don\'t have already</p>';
	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['consumerkey'] = strip_tags( $new_instance['consumerkey'] );
		$instance['consumersecret'] = strip_tags( $new_instance['consumersecret'] );
		$instance['accesstoken'] = strip_tags( $new_instance['accesstoken'] );
		$instance['accesstokensecret'] = strip_tags( $new_instance['accesstokensecret'] );
		
		return $instance;
	}

	public function widget( $args, $instance ) {

		$post_types = apply_filters( 'mts_author_widget_post_types', array( 'post' ) );

		if ( !is_singular( $post_types ) && !is_author() ) {

			extract( $args );

			$user = get_user_by( 'login', $instance['username'] );

			if ( $user ) {

				$author_id = $user->ID;

				$twitter_username = ltrim( get_the_author_meta( 'mts_twitter', $author_id ), '@' );

				$found_twitter_user = false;
				$followers = 0;
				if ( !empty( $twitter_username ) ) {
					if ( require_once('twitteroauth.php') ) {
						$connection = $this->getConnectionWithAccessToken( $instance['consumerkey'], $instance['consumersecret'], $instance['accesstoken'], $instance['accesstokensecret'] );
						$user_data = $connection->get("https://api.twitter.com/1.1/users/lookup.json?screen_name=".$twitter_username);
						if ( !empty( $user_data ) ) {
							if ( empty( $user_data->errors ) ) {
								$found_twitter_user = true;
								$followers = $user_data[0]->followers_count;
							}
						}
					}
				}

				echo $before_widget;

					echo '<div class="mts-author-box">';
						echo '<div class="mts-author-box-top">';
							echo '<div class="mts-profile-avatar">';
								echo get_avatar( get_the_author_meta( 'email', $author_id ), '90' );
							echo '</div>';
							echo '<div class="mts-profile-links">';
								echo '<strong>' . get_the_author_meta( 'display_name', $author_id ) . '</strong>';
								echo '<span>' . get_the_author_meta( 'mts_city', $author_id ) . '</span>';
							echo '</div>';
						echo '</div>';
						echo '<div class="mts-author-box-bottom">';
							$left_class = $found_twitter_user ? 'class="mts-author-box-left"' : 'class="mts-author-box-full"';
							echo '<a href="' . esc_url( get_author_posts_url( $author_id ) ) . '" '.$left_class.'>';
								echo '<strong>' . count_user_posts( $author_id ) . '</strong>';
								echo '<span><i class="fa fa-file-text"></i>' . __( 'Posts', 'socialme' ) . '</span>';
							echo '</a>';
							if ( $found_twitter_user ) {
								echo '<a href="https://www.twitter.com/'.$twitter_username.'" class="mts-author-box-right">';
									echo '<strong>' . $followers . '</strong>';
									echo '<span><i class="fa fa-twitter"></i>' . __( 'Followers', 'socialme' ) . '</span>';
								echo '</a>';
							}
						echo '</div>';
					echo '</div>';

				echo $after_widget;

			} else {
				echo $before_widget . __( "Username does't exists", 'socialme' ) . $after_widget;
			}
		}
	}

	public function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
		$connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
		return $connection;
	}
}

// Register Widget
add_action( 'widgets_init', 'mts_register_featured_author_box_widget' );
function mts_register_featured_author_box_widget() {
	register_widget( "mts_featured_author_box_widget" );
}
