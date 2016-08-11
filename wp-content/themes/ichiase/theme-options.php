<?php

defined('ABSPATH') or die;

/*
 * 
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 *
 */
require_once( dirname( __FILE__ ) . '/options/options.php' );
/*
 * 
 * Custom function for filtering the sections array given by theme, good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for urls, and dir will NOT be available at this point in a child theme, so you must use
 * get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function add_another_section($sections){
	
	//$sections = array();
	$sections[] = array(
				'title' => __('A Section added by hook', 'socialme' ),
				'desc' => '<p class="description">' . __('This is a section created by adding a filter to the sections array, great to allow child themes, to add/remove sections from the options.', 'socialme' ) . '</p>',
				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
				//You dont have to though, leave it blank for default.
				'icon' => trailingslashit(get_template_directory_uri()).'options/img/glyphicons/glyphicons_062_attach.png',
				//Lets leave this as a blank section, no options just some intro text set above.
				'fields' => array()
				);
	
	return $sections;
	
}//function
//add_filter('nhp-opts-sections-twenty_eleven', 'add_another_section');


/*
 * 
 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){
	
	//$args['dev_mode'] = false;
	
	return $args;
	
}//function
//add_filter('nhp-opts-args-twenty_eleven', 'change_framework_args');

/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 *
 *
 */

function setup_framework_options(){
$args = array();

//Set it to dev mode to view the class settings/info in the form - default is false
$args['dev_mode'] = false;
//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
//$args['stylesheet_override'] = true;

//Add HTML before the form
//$args['intro_text'] = __('<p>This is the HTML which can be displayed before the form, it isnt required, but more info is always better. Anything goes in terms of markup here, any HTML.</p>', 'socialme' );

if ( ! MTS_THEME_WHITE_LABEL ) {
	//Setup custom links in the footer for share icons
	$args['share_icons']['twitter'] = array(
		'link' => 'http://twitter.com/mythemeshopteam',
		'title' => __( 'Follow Us on Twitter', 'socialme' ),
		'img' => 'fa fa-twitter-square'
	);
	$args['share_icons']['facebook'] = array(
		'link' => 'http://www.facebook.com/mythemeshop',
		'title' => __( 'Like us on Facebook', 'socialme' ),
		'img' => 'fa fa-facebook-square'
	);
}

//Choose to disable the import/export feature
//$args['show_import_export'] = false;

//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
$args['opt_name'] = MTS_THEME_NAME;

//Custom menu icon
//$args['menu_icon'] = '';

//Custom menu title for options page - default is "Options"
$args['menu_title'] = __('Theme Options', 'socialme' );

//Custom Page Title for options page - default is "Options"
$args['page_title'] = __('Theme Options', 'socialme' );

//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
$args['page_slug'] = 'theme_options';

//Custom page capability - default is set to "manage_options"
//$args['page_cap'] = 'manage_options';

//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
//$args['page_type'] = 'submenu';

//parent menu - default is set to "themes.php" (Appearance)
//the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'themes.php';

//custom page location - default 100 - must be unique or will override other items
$args['page_position'] = 62;

//Custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';

if ( ! MTS_THEME_WHITE_LABEL ) {
	//Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition
	$args['help_tabs'][] = array(
		'id' => 'nhp-opts-1',
		'title' => __('Support', 'socialme' ),
		'content' => '<p>' . sprintf( __('If you are facing any problem with our theme or theme option panel, head over to our %s.', 'socialme' ), '<a href="http://community.mythemeshop.com/">'. __( 'Support Forums', 'socialme' ) . '</a>' ) . '</p>'
	);
	$args['help_tabs'][] = array(
		'id' => 'nhp-opts-2',
		'title' => __('Earn Money', 'socialme' ),
		'content' => '<p>' . sprintf( __('Earn 70%% commision on every sale by refering your friends and readers. Join our %s.', 'socialme' ), '<a href="http://mythemeshop.com/affiliate-program/">' . __( 'Affiliate Program', 'socialme' ) . '</a>' ) . '</p>'
	);
}

//Set the Help Sidebar for the options page - no sidebar by default										
//$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'socialme' );

$mts_patterns = array(
	'nobg' => array('img' => NHP_OPTIONS_URL.'img/patterns/nobg.png'),
	'pattern0' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern0.png'),
	'pattern1' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern1.png'),
	'pattern2' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern2.png'),
	'pattern3' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern3.png'),
	'pattern4' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern4.png'),
	'pattern5' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern5.png'),
	'pattern6' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern6.png'),
	'pattern7' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern7.png'),
	'pattern8' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern8.png'),
	'pattern9' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern9.png'),
	'pattern10' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern10.png'),
	'pattern11' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern11.png'),
	'pattern12' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern12.png'),
	'pattern13' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern13.png'),
	'pattern14' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern14.png'),
	'pattern15' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern15.png'),
	'pattern16' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern16.png'),
	'pattern17' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern17.png'),
	'pattern18' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern18.png'),
	'pattern19' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern19.png'),
	'pattern20' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern20.png'),
	'pattern21' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern21.png'),
	'pattern22' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern22.png'),
	'pattern23' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern23.png'),
	'pattern24' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern24.png'),
	'pattern25' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern25.png'),
	'pattern26' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern26.png'),
	'pattern27' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern27.png'),
	'pattern28' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern28.png'),
	'pattern29' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern29.png'),
	'pattern30' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern30.png'),
	'pattern31' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern31.png'),
	'pattern32' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern32.png'),
	'pattern33' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern33.png'),
	'pattern34' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern34.png'),
	'pattern35' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern35.png'),
	'pattern36' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern36.png'),
	'pattern37' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern37.png'),
	'hbg' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg.png'),
	'hbg2' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg2.png'),
	'hbg3' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg3.png'),
	'hbg4' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg4.png'),
	'hbg5' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg5.png'),
	'hbg6' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg6.png'),
	'hbg7' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg7.png'),
	'hbg8' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg8.png'),
	'hbg9' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg9.png'),
	'hbg10' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg10.png'),
	'hbg11' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg11.png'),
	'hbg12' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg12.png'),
	'hbg13' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg13.png'),
	'hbg14' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg14.png'),
	'hbg15' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg15.png'),
	'hbg16' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg16.png'),
	'hbg17' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg17.png'),
	'hbg18' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg18.png'),
	'hbg19' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg19.png'),
	'hbg20' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg20.png'),
	'hbg21' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg21.png'),
	'hbg22' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg22.png'),
	'hbg23' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg23.png'),
	'hbg24' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg24.png'),
	'hbg25' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg25.png')
);

$sections = array();

$sections[] = array(
				'icon' => 'fa fa-cogs',
				'title' => __('General Settings', 'socialme' ),
				'desc' => '<p class="description">' . __('This tab contains common setting options which will be applied to the whole theme.', 'socialme' ) . '</p>',
				'fields' => array(
					array(
						'id' => 'mts_logo',
						'type' => 'upload',
						'title' => __('Logo Image', 'socialme' ),
						'sub_desc' => __('Upload your logo using the Upload Button or insert image URL. preferable height <strong>20pxfd</strong>', 'socialme' )
						),
					array(
						'id' => 'mts_favicon',
						'type' => 'upload',
						'title' => __('Favicon', 'socialme' ),
						'sub_desc' => sprintf( __('Upload a %s image that will represent your website\'s favicon.', 'socialme' ), '<strong>32 x 32 px</strong>' )
						),
					array(
						'id' => 'mts_touch_icon',
						'type' => 'upload',
						'title' => __('Touch icon', 'socialme' ),
						'sub_desc' => sprintf( __('Upload a %s image that will represent your website\'s touch icon for iOS 2.0+ and Android 2.1+ devices.', 'socialme' ), '<strong>152 x 152 px</strong>' )
						),
					array(
						'id' => 'mts_metro_icon',
						'type' => 'upload',
						'title' => __('Metro icon', 'socialme' ),
						'sub_desc' => sprintf( __('Upload a %s image that will represent your website\'s IE 10 Metro tile icon.', 'socialme' ), '<strong>144 x 144 px</strong>' )
						),
					array(
						'id' => 'mts_twitter_username',
						'type' => 'text',
						'title' => __('Twitter Username', 'socialme' ),
						'sub_desc' => __('Enter your Username here.', 'socialme' ),
						),
					array(
						'id' => 'mts_feedburner',
						'type' => 'text',
						'title' => __('FeedBurner URL', 'socialme' ),
						'sub_desc' => sprintf( __('Enter your FeedBurner\'s URL here, ex: %s and your main feed (http://example.com/feed) will get redirected to the FeedBurner ID entered here.)', 'socialme' ), '<strong>http://feeds.feedburner.com/mythemeshop</strong>' ),
						'validate' => 'url'
						),
					array(
						'id' => 'mts_header_code',
						'type' => 'textarea',
						'title' => __('Header Code', 'socialme' ),
						'sub_desc' => wp_kses( __('Enter the code which you need to place <strong>before closing &lt;/head&gt; tag</strong>. (ex: Google Webmaster Tools verification, Bing Webmaster Center, BuySellAds Script, Alexa verification etc.)', 'socialme' ), array( 'strong' => '' ) )
						),
					array(
						'id' => 'mts_analytics_code',
						'type' => 'textarea',
						'title' => __('Footer Code', 'socialme' ),
						'sub_desc' => wp_kses( __('Enter the codes which you need to place in your footer. <strong>(ex: Google Analytics, Clicky, STATCOUNTER, Woopra, Histats, etc.)</strong>.', 'socialme' ), array( 'strong' => '' ) )
						),
					array(
                        'id' => 'mts_pagenavigation_type',
                        'type' => 'radio',
                        'title' => __('Pagination Type', 'socialme' ),
                        'sub_desc' => __('Select pagination type. Note: This option will work only if you enable more than one tabs on homepage.', 'socialme' ),
                        'options' => array(
                                        '0'=> __('Default (Next / Previous)', 'socialme' ),
                                        '1' => __('Numbered (1 2 3 4...)', 'socialme' ),
                                        '2' => __( 'AJAX (Load More Button)', 'socialme' ),
                                        '3' => __( 'AJAX (Auto Infinite Scroll)', 'socialme' ) ),
                        'std' => '2'
                        ),
                    array(
                        'id' => 'mts_ajax_search',
                        'type' => 'button_set',
                        'title' => __('AJAX Quick search', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => __('Enable or disable search results appearing instantly below the search form', 'socialme' ),
						'std' => '0'
                        ),
                    array(
                        'id' => 'mts_full_posts',
                        'type' => 'button_set',
                        'title' => __('Posts on blog pages', 'socialme' ),
						'options' => array('0' => 'Excerpts','1' => 'Full posts'),
						'sub_desc' => __('Show post excerpts or full posts on the homepage and other archive pages.', 'socialme' ),
						'std' => '0',
                        'class' => 'green'
                        ),
                    array(
						'id' => 'mts_points_feature',
						'type' => 'button_set',
						'title' => __('Points System [Upvotes]', 'socialme'), 
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => __('Use this button to enable Points feature for posts.', 'socialme'),
						'std' => '1'
						),
					array(
						'id' => 'mts_responsive',
						'type' => 'button_set',
						'title' => __('Responsiveness', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => __('MyThemeShop themes are responsive, which means they adapt to tablet and mobile devices, ensuring that your content is always displayed beautifully no matter what device visitors are using. Enable or disable responsiveness using this option.', 'socialme' ),
						'std' => '1'
						),
					array(
						'id' => 'mts_shop_products',
						'type' => 'text',
						'title' => __('No. of Products', 'socialme' ),
						'sub_desc' => __('Enter the total number of products which you want to show on shop page (WooCommerce plugin must be enabled).', 'socialme' ),
						'validate' => 'numeric',
						'std' => '9',
						'class' => 'small-text'
						),
					)
				);
$sections[] = array(
				'icon' => 'fa fa-bolt',
				'title' => __('Performance', 'socialme' ),
				'desc' => '<p class="description">' . __('This tab contains performance-related options which can help speed up your website.', 'socialme' ) . '</p>',
				'fields' => array(
					array(
						'id' => 'mts_prefetching',
						'type' => 'button_set',
						'title' => __('Prefetching', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => __('Enable or disable prefetching. If user is on homepage, then single page will load faster and if user is on single page, homepage will load faster in modern browsers.', 'socialme' ),
						'std' => '0'
						),
					array(
						'id' => 'mts_lazy_load',
						'type' => 'button_set_hide_below',
						'title' => __('Lazy Load', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => __('Delay loading of images outside of viewport, until user scrolls to them.', 'socialme' ),
						'std' => '0',
						'args' => array('hide' => 2)
						),
					array(
						'id' => 'mts_lazy_load_thumbs',
						'type' => 'button_set',
						'title' => __('Lazy load featured images', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => __('Enable or disable Lazy load of featured images across site.', 'socialme' ),
						'std' => '0'
						),
					array(
						'id' => 'mts_lazy_load_content',
						'type' => 'button_set',
						'title' => __('Lazy load post content images', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => __('Enable or disable Lazy load of images inside post/page content.', 'socialme' ),
						'std' => '0'
						),
					array(
						'id' => 'mts_async_js',
						'type' => 'button_set',
						'title' => __('Async JavaScript', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => sprintf( __('Add %s attribute to script tags to improve page download speed.', 'socialme' ), '<code>async</code>' ),
						'std' => '1',
						),
					array(
						'id' => 'mts_remove_ver_params',
						'type' => 'button_set',
						'title' => __('Remove ver parameters', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => sprintf( __('Remove %s parameter from CSS and JS file calls. It may improve speed in some browsers which do not cache files having the parameter.', 'socialme' ), '<code>ver</code>' ),
						'std' => '1',
						),
					array(
						'id' => 'mts_optimize_wc',
						'type' => 'button_set',
						'title' => __('Optimize WooCommerce scripts', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => __('Load WooCommerce scripts and styles only on WooCommerce pages (WooCommerce plugin must be enabled).', 'socialme' ),
						'std' => '1'
						),
					'cache_message' => array(
						'id' => 'mts_cache_message',
						'type' => 'info',
						'title' => __('Use Cache', 'socialme' ),
						/*
							Translators: %1$s = popup link to W3 Total Cache, %2$s = popup link to WP Super Cache
						 */
						'desc' => sprintf(
							__('A cache plugin can increase page download speed dramatically. We recommend using %1$s or %2$s.', 'socialme' ),
							'<a href="https://community.mythemeshop.com/tutorials/article/8-make-your-website-load-faster-using-w3-total-cache-plugin/" target="_blank" title="W3 Total Cache">W3 Total Cache</a>',
							'<a href="'.admin_url( 'plugin-install.php?tab=plugin-information&plugin=wp-super-cache&TB_iframe=true&width=772&height=574' ).'" class="thickbox" title="WP Super Cache">WP Super Cache</a>'
						),
					),
				)
			);

// Hide cache message on multisite or if a chache plugin is active already
if ( is_multisite() || strstr( join( ';', get_option( 'active_plugins' ) ), 'cache' ) ) {
	unset( $sections[1]['fields']['cache_message'] );
}

$sections[] = array(
				'icon' => 'fa fa-adjust',
				'title' => __('Styling Options', 'socialme' ),
				'desc' => '<p class="description">' . __('Control the visual appearance of your theme, such as colors, layout and patterns, from here.', 'socialme' ) . '</p>',
				'fields' => array(
					array(
						'id' => 'mts_color_scheme',
						'type' => 'color',
						'title' => __('Color Scheme', 'socialme' ), 
						'sub_desc' => __('The theme comes with unlimited color schemes for your theme\'s styling.', 'socialme' ),
						'std' => '#49d0c0'
						),
					array(
						'id' => 'mts_second_color_scheme',
						'type' => 'color',
						'title' => __('Hover Color', 'socialme' ), 
						'sub_desc' => __('The theme comes with unlimited color schemes for your theme\'s styling.', 'socialme' ),
						'std' => '#b37ba4'
						),
					array(
						'id' => 'mts_layout',
						'type' => 'radio_img',
						'title' => __('Layout Style', 'socialme' ),
						'sub_desc' => wp_kses( __('Choose the <strong>default sidebar position</strong> for your site. The position of the sidebar for individual posts can be set in the post editor.<div><strong>[LS]</strong> Left Sidebar </div><div><strong>[C]</strong> Content </div><div><strong>[RS]</strong> Right Sidebar</div>', 'socialme' ), array( 'strong' => '', 'div' => '' ) ),
						'options' => array(
										'scslayout' => array('img' => NHP_OPTIONS_URL.'img/layouts/scs.png'),
										'csslayout' => array('img' => NHP_OPTIONS_URL.'img/layouts/css.png'),
										'sclayout' => array('img' => NHP_OPTIONS_URL.'img/layouts/sc.png'),
										'cslayout' => array('img' => NHP_OPTIONS_URL.'img/layouts/cs.png')
											),
						'std' => 'scslayout'
						),
					array(
						'id' => 'mts_background',
						'type' => 'background',
						'title' => __('Site Background', 'socialme' ),
						'sub_desc' => __('Set background color, pattern and image from here.', 'socialme' ),
						'options' => array(
							'color'         => '',            // false to disable, not needed otherwise
							'image_pattern' => $mts_patterns, // false to disable, array of options otherwise ( required !!! )
							'image_upload'  => '',            // false to disable, not needed otherwise
							'repeat'        => array(),       // false to disable, array of options to override default ( optional )
							'attachment'    => array(),       // false to disable, array of options to override default ( optional )
							'position'      => array(),       // false to disable, array of options to override default ( optional )
							'size'          => array(),       // false to disable, array of options to override default ( optional )
							'gradient'      => '',            // false to disable, not needed otherwise
							'parallax'      => array(),       // false to disable, array of options to override default ( optional )
						),
						'std' => array(
							'color'         => '#f7f7ff',
							'use'           => 'pattern',
							'image_pattern' => 'nobg',
							'image_upload'  => '',
							'repeat'        => 'repeat',
							'attachment'    => 'scroll',
							'position'      => 'left top',
							'size'          => 'cover',
							'gradient'      => array('from' => '#ffffff', 'to' => '#000000', 'direction' => 'horizontal' ),
							'parallax'      => '0',
						)
					),
					array(
						'id' => 'mts_custom_css',
						'type' => 'textarea',
						'title' => __('Custom CSS', 'socialme' ),
						'sub_desc' => __('You can enter custom CSS code here to further customize your theme. This will override the default CSS used on your site.', 'socialme' )
						),
					array(
						'id' => 'mts_lightbox',
						'type' => 'button_set',
						'title' => __('Lightbox', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => __('A lightbox is a stylized pop-up that allows your visitors to view larger versions of images without leaving the current page. You can enable or disable the lightbox here.', 'socialme' ),
						'std' => '0'
						),
					)
				);
$sections[] = array(
				'icon' => 'fa fa-credit-card',
				'title' => __('Header', 'socialme' ),
				'desc' => '<p class="description">' . __('From here, you can control the elements of header section.', 'socialme' ) . '</p>',
				'fields' => array(
					array(
						'id' => 'mts_header_background',
						'type' => 'color',
						'title' => __('Header Background', 'socialme' ), 
						'sub_desc' => __('Set Header background color, pattern and image from here.', 'socialme' ),
						'std' => '#32353A'
						),
					array(
						'id' => 'mts_sticky_nav',
						'type' => 'button_set',
						'title' => __('Floating Navigation Menu', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => sprintf( __('Use this button to enable %s.', 'socialme' ), '<strong>' . __('Floating Navigation Menu', 'socialme' ) . '</strong>' ),
						'std' => '0'
						),
                    array(
						'id' => 'mts_show_primary_nav',
						'type' => 'button_set',
						'title' => __('Show Primary Menu', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => sprintf( __('Use this button to enable %s.', 'socialme' ), '<strong>' . __( 'Primary Navigation Menu', 'socialme' ) . '</strong>' ),
						'std' => '1'
						),
					array(
						'id' => 'mts_header_section2',
						'type' => 'button_set',
						'title' => __('Show Logo', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => wp_kses( __('Use this button to Show or Hide the <strong>Logo</strong> completely.', 'socialme' ), array( 'strong' => '' ) ),
						'std' => '1'
						),
					array(
						'id' => 'mts_login_register',
						'type' => 'button_set',
						'title' => __('Show Login/Register URL', 'socialme' ), 
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Use this button to enable <strong>Login/Register</strong> for site.', 'socialme' ),
						'std' => '1'
						),
					array(
						'id' => 'mts_header_search',
						'type' => 'button_set',
						'title' => __('Show Header Search', 'socialme' ), 
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Use this button to enable <strong>Header Search</strong>.', 'socialme' ),
						'std' => '1'
						),
					)
				);
$sections[] = array(
				'icon' => 'fa fa-table',
				'title' => __('Footer', 'socialme' ),
				'desc' => '<p class="description">' . __('From here, you can control the elements of Footer section.', 'socialme' ) . '</p>',
				'fields' => array(
					array(
						'id' => 'mts_footer_background',
						'type' => 'color',
						'title' => __('Footer Background', 'socialme' ), 
						'sub_desc' => __('Set Footer background color, pattern and image from here.', 'socialme' ),
						'std' => '#ffffff'
						),
					array(
						'id' => 'mts_first_footer',
						'type' => 'button_set_hide_below',
						'title' => __('Footer Widgets', 'socialme' ),
						'sub_desc' => __('Enable or disable footer widgets with this option.', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'std' => '0'
					),
                    array(
						'id' => 'mts_first_footer_num',
						'type' => 'button_set',
                        'class' => 'green',
						'title' => __('Footer Layout', 'socialme' ),
						'sub_desc' => wp_kses( __('Choose the number of widget areas in the <strong>footer</strong>', 'socialme' ), array( 'strong' => '' ) ),
						'options' => array(
							'4' => __( '4 Widgets', 'socialme' ),
							'5' => __( '5 Widgets', 'socialme' ),
						),
						'std' => '5'
						),
					array(
						'id' => 'mts_show_footer_nav',
						'type' => 'button_set',
						'title' => __('Show Footer Navigation Menu', 'socialme'), 
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Use this button to enable <strong>Footer Navigation Menu</strong>.', 'socialme'),
						'std' => '1'
					),
					array(
						'id' => 'mts_copyrights',
						'type' => 'textarea',
						'title' => __('Copyrights Text', 'socialme' ),
						'sub_desc' => __( 'You can change or remove our link from footer and use your own custom text.', 'socialme' ) . ( MTS_THEME_WHITE_LABEL ? '' : wp_kses( __('(You can also use your affiliate link to <strong>earn 70% of sales</strong>. Ex: <a href="https://mythemeshop.com/go/aff/aff" target="_blank">https://mythemeshop.com/?ref=username</a>)', 'socialme' ), array( 'strong' => '', 'a' => array( 'href' => array(), 'target' => array() ) ) ) ),
						'std' => MTS_THEME_WHITE_LABEL ? null : sprintf( __( 'Theme by %s', 'socialme' ), '<a href="http://mythemeshop.com/" rel="nofollow">MyThemeShop</a>' )
						),
				)
			);
$sections[] = array(
				'icon' => 'fa fa-home',
				'title' => __('Homepage', 'socialme' ),
				'desc' => '<p class="description">' . __('From here, you can control the elements of the homepage.', 'socialme' ) . '</p>',
				'fields' => array(
					array(
						'id' => 'mts_homepage_tabs',
						'type' => 'button_set_hide_below',
						'title' => __('Homepage Tabs', 'socialme') ,
						'options' => array(
							'0' => 'Off',
							'1' => 'On'
							) ,
						'sub_desc' => __('Display tabs, or show only latest posts by turning off tabs.', 'socialme') ,
						'std' => '1',
						'args' => array('hide' => 2)
						),
					array(
                        'id'       => 'mts_home_tabs',
                        'type'     => 'layout2',
                        'title'    => __('Homepage Tabs', 'socialme' ),
                        'sub_desc' => __('Customize the tabs on Homepage', 'socialme' ),
                        'options'  => array(
                            'enabled'  => array(
                                'popular'   => array(
                                	'label' 	=> __('Trending', 'socialme' ),
                                	'subfields'	=> array(
                                		array(
											'id' => 'mts_popular_icon',
											'type' => 'icon_select',
											'title' => __('Trending Tab Title Icon', 'socialme'), 
											'sub_desc' => __('Select an icon from the vector icon set.', 'socialme'),
											'std' => 'thumbs-up'
											),
										array(
											'id' => 'mts_popular_title',
											'type' => 'text',
											'title' => __('Trending Tab Title', 'socialme'),
											'sub_desc' => __('Enter trending tab title.', 'socialme'),
											'std' => __( 'Trending', 'socialme' ),
											),
										array(
											'id' => 'mts_popular_posts_order',
											'type' => 'select',
											'title' => __('Order Trending Posts by', 'socialme'), 
											'sub_desc' => __('Select a trending posts order from this section', 'socialme'),
											'std' => 'views',
											'options' => array(
												'views' => __('Post Views','socialme'),
												'comment_count' => __('Comment Count','socialme'),
												'points' => __('Points','socialme')
												),
											),
										array(
											'id' => 'mts_popular_posts_num',
											'type' => 'text',
											'args' => array( 'type' => 'number'),
											'class' => 'small-text',
											'title' => __('Trending posts number:', 'socialme'),
											'sub_desc' => __('Enter the number of posts to show in trending section.', 'socialme'),
											'std' => '4',
											'validate' => 'numeric'
											),
										array(
											'id' => 'mts_popular_posts_limit',
											'type' => 'text',
											'args' => array( 'type' => 'number'),
											'class' => 'small-text',
											'title' => __('Trending Post limit (days):', 'socialme'),
											'sub_desc' => __('Enter trending post limit. Enter \'0\' to disable the limit', 'socialme'),
											'std' => '365',
											'validate' => 'numeric'
											),
                                	)
                                ),
                                'latest'   => array(
                                	'label' 	=> __('Latest', 'socialme' ),
                                	'subfields'	=> array(
					        			array(
											'id' => 'mts_latest_icon',
											'type' => 'icon_select',
											'title' => __('Latest Tab Title Icon', 'socialme'), 
											'sub_desc' => __('Select an icon from the vector icon set.', 'socialme'),
											'std' => 'clock-o'
											),
										array(
											'id' => 'mts_latest_title',
											'type' => 'text',
											'title' => __('Latest Tab Title', 'socialme'),
											'sub_desc' => __('Enter latest tab title.', 'socialme'),
											'std' => __( 'Latest', 'socialme' )
											),
										array(
											'id' => 'mts_latest_posts_num',
											'type' => 'text',
											'args' => array( 'type' => 'number'),
											'class' => 'small-text',
											'title' => __('Latest posts number:', 'socialme'),
											'sub_desc' => __('Enter the number of posts to show in latest section.', 'socialme'),
											'std' => '6',
											'validate' => 'numeric'
											),
                                	)
                                ),
                                'random'   => array(
                                	'label' 	=> __('Random', 'socialme' ),
                                	'subfields'	=> array(
                                		array(
											'id' => 'mts_random_icon',
											'type' => 'icon_select',
											'title' => __('Random Tab Title Icon', 'socialme'), 
											'sub_desc' => __('Select an icon from the vector icon set.', 'socialme'),
											'std' => 'random'
											),
										array(
											'id' => 'mts_random_title',
											'type' => 'text',
											'title' => __('Random Tab Title', 'socialme'),
											'sub_desc' => __('Enter Random tab title.', 'socialme'),
											'std' => __( 'Random', 'socialme' )
											),
										array(
											'id' => 'mts_random_posts_number',
											'type' => 'text',
											'args' => array( 'type' => 'number'),
											'class' => 'small-text',
											'title' => __('Random posts number:', 'socialme'),
											'sub_desc' => __('Enter the number of posts to show in random section.', 'socialme'),
											'std' => '6',
											'validate' => 'numeric'
											),
                                	)
                                ),
                            ),
                            'disabled' => array(
                            )
                        )
                    ),
					array(
						'id' => 'mts_home_pagenavigation_type',
						'type' => 'radio',
						'title' => __('Homepage Tabs Pagination Type', 'socialme'),
						'sub_desc' => __('Select pagination type.', 'socialme'),
						'options' => array(
							'0' => __('Off', 'socialme'),
							'1' => __('AJAX Load More Button', 'socialme'),
						),
						'std' => '1'
						),
					array(
                       'id' => 'mts_home_meta_info_enable',
                       'type' => 'multi_checkbox',
                       'title' => __('HomePage Post Meta Info', 'socialme' ),
                       'sub_desc' => __('Organize how you want the post meta info to appear on the homepage', 'socialme' ),
                       'options' => array(
                               'author_image'=> __('Enable Author Image', 'socialme' ), 
                               'author' => __('Enable Author Nickname', 'socialme' ), 
                               'post_date' => __('Enable Date', 'socialme' ), 
                               'comment' => __('Enable Comment Count', 'socialme' ),
                               'category' => __('Enable Categories', 'socialme' ),
                               ),
                       'std' => array(
                               'author_image'=> '1',
                               'author'=> '1',
                               'post_date'=> '1',
                               'comment'=> '1',
                               'author_name' => '1',
                               'category' => '1'
                               )
                        ),
					)
				);	
$sections[] = array(
				'icon' => 'fa fa-file-text',
				'title' => __('Single Posts', 'socialme' ),
				'desc' => '<p class="description">' . __('From here, you can control the appearance and functionality of your single posts page.', 'socialme' ) . '</p>',
				'fields' => array(
					array(
                        'id'       => 'mts_single_post_layout',
                        'type'     => 'layout2',
                        'title'    => __('Single Post Layout', 'socialme' ),
                        'sub_desc' => __('Customize the look of single posts', 'socialme' ),
                        'options'  => array(
                            'enabled'  => array(
                                'content'   => array(
                                	'label' 	=> __('Post Content', 'socialme' ),
                                	'subfields'	=> array(
                                		
                                	)
                                ),
                            	'categories'   => array(
                                	'label' 	=> __('Categories', 'socialme' ),
                                	'subfields'	=> array(
                                	)
                                ),
                                'related'   => array(
                                	'label' 	=> __('Related Posts', 'socialme' ),
                                	'subfields'	=> array(
					        			array(
					        				'id' => 'mts_related_posts_taxonomy',
					        				'type' => 'button_set',
					        				'title' => __('Related Posts Taxonomy', 'socialme' ) ,
					        				'options' => array(
					        					'tags' => __( 'Tags', 'socialme' ),
					        					'categories' => __( 'Categories', 'socialme' )
					        				) ,
					        				'class' => 'green',
					        				'sub_desc' => __('Related Posts based on tags or categories.', 'socialme' ) ,
					        				'std' => 'categories'
					        			),
					        			array(
					        				'id' => 'mts_related_postsnum',
					        				'type' => 'text',
					        				'class' => 'small-text',
					        				'title' => __('Number of related posts', 'socialme' ) ,
					        				'sub_desc' => __('Enter the number of posts to show in the related posts section.', 'socialme' ) ,
					        				'std' => '3',
					        				'args' => array(
					        					'type' => 'number'
					        				)
					        			),

                                	)
                                ),
                                'author'   => array(
                                	'label' 	=> __('Author Box', 'socialme' ),
                                	'subfields'	=> array(

                                	)
                                ),
                            ),
                            'disabled' => array(
                            	'tags'   => array(
                                	'label' 	=> __('Tags', 'socialme' ),
                                	'subfields'	=> array(
                                	)
                                ),
                            )
                        )
                    ),
					array(
                       'id' => 'mts_single_meta_info_enable',
                       'type' => 'multi_checkbox',
                       'title' => __('Single-Page Post Meta Info', 'socialme' ),
                       'sub_desc' => __('Organize how you want the post meta info to appear on the homepage', 'socialme' ),
                        'options' => array(
                               'author_image'=> __('Enable Author Image', 'socialme' ), 
                               'author' => __('Enable Author Name', 'socialme' ), 
                               'post_date' => __('Enable Date', 'socialme' ), 
                               'comment' => __('Enable Comment Count', 'socialme' )
                               ),
                        'std' => array(
                               'author_image'=> '1',
                               'author'=> '1',
                               'post_date'=> '1',
                               'comment'=> '1'
                               )
                       ),
					array(
						'id' => 'mts_breadcrumb',
						'type' => 'button_set',
						'title' => __('Breadcrumbs', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => __('Breadcrumbs are a great way to make your site more user-friendly. You can enable them by checking this box.', 'socialme' ),
						'std' => '0'
						),
					array(
						'id' => 'mts_author_comment',
						'type' => 'button_set',
						'title' => __('Highlight Author Comment', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => __('Use this button to highlight author comments.', 'socialme' ),
						'std' => '1'
						),
					array(
						'id' => 'mts_comment_date',
						'type' => 'button_set',
						'title' => __('Date in Comments', 'socialme' ),
						'options' => array( '0' => __( 'Off', 'socialme' ), '1' => __( 'On', 'socialme' ) ),
						'sub_desc' => __('Use this button to show the date for comments.', 'socialme' ),
						'std' => '1'
						),
					)
				);
$sections[] = array(
				'icon' => 'fa fa-group',
				'title' => __('Social Buttons', 'socialme' ),
				'desc' => '<p class="description">' . __('Enable or disable social sharing buttons on single posts using these buttons.', 'socialme' ) . '</p>',
				'fields' => array(
					array(
						'id' => 'mts_social_button_position',
						'type' => 'button_set',
						'title' => __('Social Sharing Buttons Position', 'socialme' ),
						'options' => array('top' => __('Above Content', 'socialme' ), 'bottom' => __('Below Content', 'socialme' ), 'floating' => __('Floating', 'socialme' )),
						'sub_desc' => __('Choose position for Social Sharing Buttons.', 'socialme' ),
						'std' => 'top',
						'class' => 'green'
					),
					array(
						'id' => 'mts_social_buttons_on_pages',
						'type' => 'button_set',
						'title' => __('Social Sharing Buttons on Pages', 'socialme' ),
						'options' => array('0' => __('Off', 'socialme' ), '1' => __('On', 'socialme' )),
						'sub_desc' => __('Enable the sharing buttons for pages too, not just posts.', 'socialme' ),
						'std' => '0',
					),
					array(
                        'id'       => 'mts_social_buttons',
                        'type'     => 'layout',
                        'title'    => __('Social Media Buttons', 'socialme' ),
                        'sub_desc' => __('Organize how you want the social sharing buttons to appear on single posts', 'socialme' ),
                        'options'  => array(
                            'enabled'  => array(
                            	'facebook'  => __('Facebook Share', 'socialme' ),
                                'twitter'   => __('Twitter', 'socialme' ),
                                'gplus'     => __('Google Plus', 'socialme' ),
                                'pinterest' => __('Pinterest', 'socialme' ),
                            ),
                            'disabled' => array(
                            	'linkedin'  => __('LinkedIn', 'socialme' ),
                                'stumble'   => __('StumbleUpon', 'socialme' ),
                            )
                        ),
                        'std'  => array(
                            'enabled'  => array(
                            	'facebookshare'   => __('Facebook Share', 'socialme' ),
                            	'facebook'  => __('Facebook Like', 'socialme' ),
                                'twitter'   => __('Twitter', 'socialme' ),
                                'gplus'     => __('Google Plus', 'socialme' ),
                                'pinterest' => __('Pinterest', 'socialme' ),
                            ),
                            'disabled' => array(
                            	'linkedin'  => __('LinkedIn', 'socialme' ),
                                'stumble'   => __('StumbleUpon', 'socialme' ),
                            )
                        )
                    ),
				)
			);
$sections[] = array(
				'icon' => 'fa fa-bar-chart-o',
				'title' => __('Ad Management', 'socialme' ),
				'desc' => '<p class="description">' . __('Now, ad management is easy with our options panel. You can control everything from here, without using separate plugins.', 'socialme' ) . '</p>',
				'fields' => array(
					array(
						'id' => 'mts_posttop_adcode',
						'type' => 'textarea',
						'title' => __('Below Post Title', 'socialme' ),
						'sub_desc' => __('Paste your Adsense, BSA or other ad code here to show ads below your article title on single posts.', 'socialme' )
						),
					array(
						'id' => 'mts_posttop_adcode_time',
						'type' => 'text',
						'title' => __('Show After X Days', 'socialme' ),
						'sub_desc' => __('Enter the number of days after which you want to show the Below Post Title Ad. Enter 0 to disable this feature.', 'socialme' ),
						'validate' => 'numeric',
						'std' => '0',
						'class' => 'small-text',
                        'args' => array('type' => 'number')
						),
					array(
						'id' => 'mts_postend_adcode',
						'type' => 'textarea',
						'title' => __('Below Post Content', 'socialme' ),
						'sub_desc' => __('Paste your Adsense, BSA or other ad code here to show ads below the post content on single posts.', 'socialme' )
						),
					array(
						'id' => 'mts_postend_adcode_time',
						'type' => 'text',
						'title' => __('Show After X Days', 'socialme' ),
						'sub_desc' => __('Enter the number of days after which you want to show the Below Post Title Ad. Enter 0 to disable this feature.', 'socialme' ),
						'validate' => 'numeric',
						'std' => '0',
						'class' => 'small-text',
                        'args' => array('type' => 'number')
						),
					)
				);
$sections[] = array(
				'icon' => 'fa fa-columns',
				'title' => __('Sidebars', 'socialme' ),
				'desc' => '<p class="description">' . __('Now you have full control over the sidebars. Here you can manage sidebars and select one for each section of your site, or select a custom sidebar on a per-post basis in the post editor.', 'socialme' ) . '<br></p>',
                'fields' => array(
                    array(
                        'id'        => 'mts_custom_sidebars',
                        'type'      => 'group', //doesn't need to be called for callback fields
                        'title'     => __('Custom Sidebars', 'socialme' ),
                        'sub_desc'  => wp_kses( __('Add custom sidebars. <strong style="font-weight: 800;">You need to save the changes to use the sidebars in the dropdowns below.</strong><br />You can add content to the sidebars in Appearance &gt; Widgets.', 'socialme' ), array( 'strong' => '', 'br' => '' ) ),
                        'groupname' => __('Sidebar', 'socialme' ), // Group name
                        'subfields' => 
                            array(
                                array(
                                    'id' => 'mts_custom_sidebar_name',
            						'type' => 'text',
            						'title' => __('Name', 'socialme' ),
            						'sub_desc' => __('Example: Homepage Sidebar', 'socialme' )
            						),	
                                array(
                                    'id' => 'mts_custom_sidebar_id',
            						'type' => 'text',
            						'title' => __('ID', 'socialme' ),
            						'sub_desc' => __('Enter a unique ID for the sidebar. Use only alphanumeric characters, underscores (_) and dashes (-), eg. "sidebar-home"', 'socialme' ),
            						'std' => 'sidebar-'
            						),
                            ),
                        ),
                    array(
						'id' => 'mts_sidebar_for_home_2',
						'type' => 'sidebars_select',
						'title' => __('Homepage Left', 'socialme' ),
						'sub_desc' => __('Select a left sidebar for the homepage.', 'socialme' ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_home',
						'type' => 'sidebars_select',
						'title' => __('Homepage Right', 'socialme' ),
						'sub_desc' => __('Select a right sidebar for the homepage.', 'socialme' ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_post_2',
						'type' => 'sidebars_select',
						'title' => __('Single Post Left', 'socialme' ),
						'sub_desc' => __('Select a left sidebar for the single posts. If a post has a custom sidebar set, it will override this.', 'socialme' ),
                        'args' => array('exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_post',
						'type' => 'sidebars_select',
						'title' => __('Single Post Right', 'socialme' ),
						'sub_desc' => __('Select a right sidebar for the single posts. If a post has a custom sidebar set, it will override this.', 'socialme' ),
                        'args' => array('exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_page_2',
						'type' => 'sidebars_select',
						'title' => __('Single Page Left', 'socialme' ),
						'sub_desc' => __('Select a Left sidebar for the single pages. If a page has a custom sidebar set, it will override this.', 'socialme' ),
                        'args' => array('exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_page',
						'type' => 'sidebars_select',
						'title' => __('Single Page Right', 'socialme' ),
						'sub_desc' => __('Select a right sidebar for the single pages. If a page has a custom sidebar set, it will override this.', 'socialme' ),
                        'args' => array('exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_archive_2',
						'type' => 'sidebars_select',
						'title' => __('Archive Left', 'socialme' ),
						'sub_desc' => __('Select a Left sidebar for the archives. Specific archive sidebars will override this setting (see below).', 'socialme' ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_archive',
						'type' => 'sidebars_select',
						'title' => __('Archive Right', 'socialme' ),
						'sub_desc' => __('Select a right sidebar for the archives. Specific archive sidebars will override this setting (see below).', 'socialme' ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_category_2',
						'type' => 'sidebars_select',
						'title' => __('Category Archive Left', 'socialme' ),
						'sub_desc' => __('Select a Left sidebar for the category archives.', 'socialme' ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_category',
						'type' => 'sidebars_select',
						'title' => __('Category Archive Right', 'socialme' ),
						'sub_desc' => __('Select a right sidebar for the category archives.', 'socialme' ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_tag_2',
						'type' => 'sidebars_select',
						'title' => __('Tag Archive Left', 'socialme' ),
						'sub_desc' => __('Select a Left sidebar for the tag archives.', 'socialme' ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_tag',
						'type' => 'sidebars_select',
						'title' => __('Tag Archive Right', 'socialme' ),
						'sub_desc' => __('Select a right sidebar for the tag archives.', 'socialme' ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_date_2',
						'type' => 'sidebars_select',
						'title' => __('Date Archive Left', 'socialme' ),
						'sub_desc' => __('Select a Left sidebar for the date archives.', 'socialme' ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_date',
						'type' => 'sidebars_select',
						'title' => __('Date Archive Right', 'socialme' ),
						'sub_desc' => __('Select a right sidebar for the date archives.', 'socialme' ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_author_2',
						'type' => 'sidebars_select',
						'title' => __('Author Archive Left', 'socialme' ),
						'sub_desc' => __('Select a Left sidebar for the author archives.', 'socialme' ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_author',
						'type' => 'sidebars_select',
						'title' => __('Author Archive Right', 'socialme' ),
						'sub_desc' => __('Select a right sidebar for the author archives.', 'socialme' ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_search_2',
						'type' => 'sidebars_select',
						'title' => __('Search Left', 'socialme' ),
						'sub_desc' => __('Select a Left sidebar for the search results.', 'socialme' ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_search',
						'type' => 'sidebars_select',
						'title' => __('Search Right', 'socialme' ),
						'sub_desc' => __('Select a right sidebar for the search results.', 'socialme' ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_notfound_2',
						'type' => 'sidebars_select',
						'title' => __('404 Error Left', 'socialme' ),
						'sub_desc' => __('Select a Left sidebar for the 404 Not found pages.', 'socialme' ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_notfound',
						'type' => 'sidebars_select',
						'title' => __('404 Error Right', 'socialme' ),
						'sub_desc' => __('Select a right sidebar for the 404 Not found pages.', 'socialme' ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => ''
						),
                    array(
						'id' => 'mts_sidebar_for_wc',
						'type' => 'sidebars_select',
						'title' => __('WooComerce Left', 'socialme' ),
						'sub_desc' => wp_kses( __('Select a Left sidebar for Shop main page, product archive pages and single products (WooCommerce plugin must be enabled). Default is <strong>WC Left Sidebar</strong>.', 'socialme' ), array( 'strong' => '' ) ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => 'shop-sidebar'
						),
                    /*array(
						'id' => 'mts_sidebar_for_shop_2',
						'type' => 'sidebars_select',
						'title' => __('Shop Pages Left', 'socialme' ),
						'sub_desc' => wp_kses( __('Select a Left sidebar for Shop main page and product archive pages (WooCommerce plugin must be enabled). Default is <strong>Shop Page Sidebar</strong>.', 'socialme' ), array( 'strong' => '' ) ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => 'shop-sidebar'
						),*/
                    array(
						'id' => 'mts_sidebar_for_shop',
						'type' => 'sidebars_select',
						'title' => __('Shop Pages Right', 'socialme' ),
						'sub_desc' => wp_kses( __('Select a right sidebar for Shop main page and product archive pages (WooCommerce plugin must be enabled). Default is <strong>WC Shop Right Sidebar</strong>.', 'socialme' ), array( 'strong' => '' ) ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => 'shop-sidebar'
						),
                    /*array(
						'id' => 'mts_sidebar_for_product_2',
						'type' => 'sidebars_select',
						'title' => __('Single Product Left', 'socialme' ),
						'sub_desc' => wp_kses( __('Select a Left sidebar for single products (WooCommerce plugin must be enabled). Default is <strong>Single Product Sidebar</strong>.', 'socialme' ), array( 'strong' => '' ) ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => 'product-sidebar'
						),*/
                    array(
						'id' => 'mts_sidebar_for_product',
						'type' => 'sidebars_select',
						'title' => __('Single Product Right', 'socialme' ),
						'sub_desc' => wp_kses( __('Select a right sidebar for single products (WooCommerce plugin must be enabled). Default is <strong>WC Single Product Right Sidebar</strong>.', 'socialme' ), array( 'strong' => '' ) ),
                        'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'left-sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar', 'left-wc-sidebar')),
                        'std' => 'product-sidebar'
						),
                    ),
				);
//$sections[] = array(
//				'icon' => NHP_OPTIONS_URL.'img/glyphicons/fontsetting.png',
//				'title' => __('Fonts', 'socialme' ),
//				'desc' => __('<p class="description"><div class="controls">You can find theme font options under the Appearance Section named <a href="themes.php?page=typography"><b>Theme Typography</b></a>, which will allow you to configure the typography used on your site.<br></div></p>', 'socialme' ),
//				);
$sections[] = array(
	'icon' => 'fa fa-list-alt',
	'title' => __('Navigation', 'socialme' ),
	'desc' => '<p class="description"><div class="controls">' . sprintf( __('Navigation settings can now be modified from the %s.', 'socialme' ), '<a href="nav-menus.php"><b>' . __( 'Menus Section', 'socialme' ) . '</b></a>' ) . '<br></div></p>'
);

				
	$tabs = array();
    
    $args['presets'] = array();
	$args['show_translate'] = false;
    include('theme-presets.php');
    
	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, $args, $tabs);

}//function
add_action('init', 'setup_framework_options', 0);

/*
 * 
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}//function

/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value){
	
	$error = false;
	$value =  'just testing';
	/*
	do your validation
	
	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/
	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;
	
}//function

/*--------------------------------------------------------------------
 * 
 * Default Font Settings
 *
 --------------------------------------------------------------------*/
if(function_exists('mts_register_typography')) { 
  mts_register_typography(array(
  	'logo_font' => array(
      'preview_text' => 'Logo Font',
      'preview_color' => 'dark',
      'font_family' => 'Signika Negative',
      'font_variant' => 'normal',
      'font_size' => '26px',
      'font_color' => '#ffffff',
      'css_selectors' => '#logo a'
    ),
    'navigation_font' => array(
      'preview_text' => 'Navigation Font',
      'preview_color' => 'dark',
      'font_family' => 'Open Sans',
      'font_variant' => '600',
      'font_size' => '15px',
      'font_color' => '#878a94',
      'css_selectors' => '#primary-navigation a, .login-menu a'
    ),
    'home_title_font' => array(
      'preview_text' => 'Home Article Title',
      'preview_color' => 'light',
      'font_family' => 'Signika Negative',
      'font_size' => '25px',
	  'font_variant' => 'normal',
      'font_color' => '#6b6d76',
      'css_selectors' => '.latestPost .title a'
    ),
    'single_title_font' => array(
      'preview_text' => 'Single Article Title',
      'preview_color' => 'light',
      'font_family' => 'Signika Negative',
      'font_size' => '30px',
	  'font_variant' => 'normal',
      'font_color' => '#4f515b',
      'css_selectors' => '.single-title'
    ),
    'content_font' => array(
      'preview_text' => 'Content Font',
      'preview_color' => 'light',
      'font_family' => 'Open Sans',
      'font_size' => '14px',
	  'font_variant' => 'normal',
      'font_color' => '#878a94',
      'css_selectors' => 'body'
    ),
    'widget_h3' => array(
      'preview_text' => 'Widget Title',
      'preview_color' => 'normal',
      'font_family' => 'Signika Negative',
      'font_variant' => 'normal',
      'font_size' => '19px',
      'font_color' => '#5e7399',
      'css_selectors' => '.widget h3, .widget .wpt_widget_content .tab_title.selected a, .widget .wpt_widget_content .tab_title a'
    ),
    'widget_text' => array(
      'preview_text' => 'Widget Text',
      'preview_color' => 'normal',
      'font_family' => 'Open Sans',
      'font_variant' => 'normal',
      'font_size' => '14px',
      'font_color' => '#91939c',
      'css_selectors' => '.widget'
    ),
    'footer_widget_h3' => array(
      'preview_text' => 'Footer Widget Title',
      'preview_color' => 'normal',
      'font_family' => 'Signika Negative',
      'font_variant' => 'normal',
      'font_size' => '22px',
      'font_color' => '#5e7399',
      'css_selectors' => '#site-footer .widget h3'
    ),
    'footer_widget_text' => array(
      'preview_text' => 'Footer Widget Text',
      'preview_color' => 'normal',
      'font_family' => 'Open Sans',
      'font_variant' => 'normal',
      'font_size' => '14px',
      'font_color' => '#91939c',
      'css_selectors' => '#site-footer .widget, #site-footer'
    ),
    'h1_headline' => array(
      'preview_text' => 'Content H1',
      'preview_color' => 'normal',
      'font_family' => 'Signika Negative',
      'font_variant' => 'normal',
      'font_size' => '30px',
      'font_color' => '#4f515b',
      'css_selectors' => 'h1'
    ),
	'h2_headline' => array(
      'preview_text' => 'Content H2',
      'preview_color' => 'normal',
      'font_family' => 'Signika Negative',
      'font_variant' => 'normal',
      'font_size' => '28px',
      'font_color' => '#4f515b',
      'css_selectors' => 'h2'
    ),
	'h3_headline' => array(
      'preview_text' => 'Content H3',
      'preview_color' => 'normal',
      'font_family' => 'Signika Negative',
      'font_variant' => 'normal',
      'font_size' => '26px',
      'font_color' => '#4f515b',
      'css_selectors' => 'h3'
    ),
	'h4_headline' => array(
      'preview_text' => 'Content H4',
      'preview_color' => 'normal',
      'font_family' => 'Signika Negative',
      'font_variant' => 'normal',
      'font_size' => '24px',
      'font_color' => '#4f515b',
      'css_selectors' => 'h4'
    ),
	'h5_headline' => array(
      'preview_text' => 'Content H5',
      'preview_color' => 'normal',
      'font_family' => 'Signika Negative',
      'font_variant' => 'normal',
      'font_size' => '22px',
      'font_color' => '#4f515b',
      'css_selectors' => 'h5'
    ),
	'h6_headline' => array(
      'preview_text' => 'Content H6',
      'preview_color' => 'normal',
      'font_family' => 'Signika Negative',
      'font_variant' => 'normal',
      'font_size' => '20px',
      'font_color' => '#4f515b',
      'css_selectors' => 'h6'
    )
  ));
}