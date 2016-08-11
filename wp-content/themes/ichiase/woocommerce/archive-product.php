<?php
$mts_options = get_option(MTS_THEME_NAME);
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header('shop'); ?>
<div id="page">
    <div class="sidebar-left-article">
		<article class="<?php echo mts_article_class(); ?>">
			<div id="content_box" class="single_post">
				<?php do_action('woocommerce_before_main_content'); ?>
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
					<?php endif; ?>
					<?php do_action( 'woocommerce_archive_description' ); ?>
					<?php if ( have_posts() ) : ?>
						<?php do_action( 'woocommerce_before_shop_loop' ); ?>
						<?php woocommerce_product_loop_start(); ?>
							<?php woocommerce_product_subcategories(); ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php woocommerce_get_template_part( 'content', 'product' ); ?>
							<?php endwhile; // end of the loop. ?>
						<?php woocommerce_product_loop_end(); ?>
						<?php do_action( 'woocommerce_after_shop_loop' ); ?>
					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
						<?php woocommerce_get_template( 'loop/no-products-found.php' ); ?>
					<?php endif; ?>
				<?php do_action('woocommerce_after_main_content'); ?>
			</div>
		</article>
		<?php get_sidebar('left'); ?>
	</div>
	<?php if ( isset($mts_options['mts_layout']) && ($mts_options['mts_layout'] == 'scslayout' || $mts_options['mts_layout'] == 'csslayout' ) ) {
        get_sidebar(); 
    }
get_footer(); ?>