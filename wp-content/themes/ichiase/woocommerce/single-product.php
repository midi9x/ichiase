<?php
$mts_options = get_option(MTS_THEME_NAME);
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header('shop'); ?>
<div id="page">
    <div class="sidebar-left-article">
		<article class="<?php echo mts_article_class(); ?>">
			<div id="content_box" class="single_post">
				<?php do_action('woocommerce_before_main_content'); ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php woocommerce_get_template_part( 'content', 'single-product' ); ?>
					<?php endwhile; // end of the loop. ?>
				<?php do_action('woocommerce_after_main_content'); ?>
			</div>
		</article>
		<?php get_sidebar('left'); ?>
	</div>
	<?php if ( isset($mts_options['mts_layout']) && ($mts_options['mts_layout'] == 'scslayout' || $mts_options['mts_layout'] == 'csslayout' ) ) {
        get_sidebar(); 
    }
get_footer(); ?>