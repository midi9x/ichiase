<?php

class mts_login_form_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'mts_login_form_widget',
			__( 'MTS Login Form', 'socialme' ),
			array( 'description' => __( 'Login Form Widget', 'socialme' ) )
		);
	}

	public function widget( $args, $instance ) {

		extract( $args );

		//$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		
		echo $before_widget;

			//if ( ! empty( $title ) ) echo $before_title . $title . $after_title;
			
			if ( is_user_logged_in() ) {

				$user_id      = get_current_user_id();
				$current_user = wp_get_current_user();
				$profile_url  = get_edit_profile_url( $user_id );

				if ( $user_id ) {

					$avatar   = get_avatar( $user_id, 90 );
					$username = "<span class='display-name'>{$current_user->display_name}</span>";

					if ( $current_user->display_name !== $current_user->user_login ) {
						$username .= " (<span class='username'>{$current_user->user_login}</span>)";
					}
					
					echo $before_title . __( 'My Profile', 'socialme' ) . $after_title;
					echo '<div class="mts-profile">';
						echo '<div class="mts-profile-avatar">';
							echo $avatar;
						echo '</div>';
						echo '<div class="mts-profile-links">';
							echo '<a href="'.esc_url( $profile_url ).'">'.$username.'</a>';
							echo '<a href="'.esc_url( $profile_url ).'" class="mts-author-box-left">'.__( 'Edit Profile', 'socialme' ).'</a>';
							echo '<a href="'.esc_url( wp_logout_url() ).'" class="mts-author-box-right">'.__( 'Log Out', 'socialme' ).'</a>';
						echo '</div>';
					echo '</div>';
				}

			} else {

				echo $before_title . __( 'Login', 'socialme' ) . $after_title;

				echo '<div class="mts-login-form">';
					//echo wp_login_form( array( 'echo' => false ) );

					$redirect = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
					$redirect = apply_filters( 'mts_login_form_widget_redirect_to', $redirect );

					$form = '
					<form name="mts-login-form" id="mts-login-form" action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post">
						<p class="login-username">
							<input type="text" name="log" id="user_login" class="input" value="" placeholder="'.__( 'Username', 'socialme' ).'" />
						</p>
						<p class="login-password">
							<input type="password" name="pwd" id="user_pass" class="input" value="" placeholder="'.__( 'Password', 'socialme' ).'" />
						</p>
						<!--<p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" /> ' . __( 'Remember Me', 'socialme' ) . '</label></p>-->
						<p class="login-submit">
							<input type="submit" name="wp-submit" id="wp-submit" value="' . __( 'Log In', 'socialme' ) . '" />
							<input type="hidden" name="redirect_to" value="' . esc_url( $redirect ) . '" />
						</p>
					</form>';

					echo apply_filters( 'mts_login_form_widget_html', $form );

					$forgot_password = '<p>' . __( 'Forgot Password?', 'socialme' ).' <a href="'.wp_lostpassword_url().'">'.__( 'Reset Now', 'socialme' ).'</a></p>';
					echo apply_filters( 'mts_login_form_forgot_password', $forgot_password );

				echo '</div>';
			}
			

		echo $after_widget;
	}
}

// Register Widget
add_action( 'widgets_init', 'mts_register_login_form_widget' );
function mts_register_login_form_widget() {
	register_widget( "mts_login_form_widget" );
}
