<?php
/**
 * The main template file.
 *
 * Used to display the homepage when home.php doesn't exist.
 */
?>
<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<?php get_header(); ?>
<div id="page">
    <div class="sidebar-left-article">
        <div class="<?php echo mts_article_class(); ?>">
            <div id="content_box">
                <?php if ( !is_paged() ) { ?>
                    <?php if (!empty($mts_options['mts_homepage_tabs'])) {
                        if ( isset( $mts_options['mts_home_tabs'] ) && is_array( $mts_options['mts_home_tabs'] ) && array_key_exists( 'enabled', $mts_options['mts_home_tabs'] ) ) {
                            $tabs = $mts_options['mts_home_tabs']['enabled'];
                        } else {
                            $tabs = array( 'popular' => 'popular', 'latest' => 'latest', 'random' => 'random' );
                        }
                        $tabs_num = count($tabs);

                        $mts_options['mts_popular_icon'] = isset( $mts_options['mts_popular_icon'] ) ? $mts_options['mts_popular_icon'] : 'thumbs-up';
                        $mts_options['mts_popular_title'] = isset( $mts_options['mts_popular_title'] ) ? $mts_options['mts_popular_title'] : __( 'Trending', 'socialme' );
                        $mts_options['mts_latest_icon'] = isset( $mts_options['mts_latest_icon'] ) ? $mts_options['mts_latest_icon'] : 'clock-o';
                        $mts_options['mts_latest_title'] = isset( $mts_options['mts_latest_title'] ) ? $mts_options['mts_latest_title'] : __( 'Latest', 'socialme' );
                        $mts_options['mts_random_icon'] = isset( $mts_options['mts_random_icon'] ) ? $mts_options['mts_random_icon'] : 'random';
                        $mts_options['mts_random_title'] = isset( $mts_options['mts_random_title'] ) ? $mts_options['mts_random_title'] : __( 'Random', 'socialme' );
                        ?>
                        <div class="featured-stories-tabs clearfix">
                            <ul class="tabs mts-has-<?php echo $tabs_num; ?>-tabs">
                            <?php foreach( $tabs as $tab => $label ) { ?>
                                <li class="tab">
                                    <a href="#<?php echo $tab; ?>-tab" class="tab-link">
                                        <?php if ( !empty( $mts_options['mts_'.$tab.'_icon'] ) || !empty( $mts_options['mts_'.$tab.'_title'] ) )
                                            echo '<i class="fa fa-'. $mts_options['mts_'.$tab.'_icon'] .'"></i> ';
                                            echo $mts_options['mts_'.$tab.'_title'];
                                        ?>
                                    </a>
                                </li>
                            <?php } ?>
                            </ul>
                            <div id="tab-content" class="tabs-content">
                                <?php foreach( $tabs as $tab => $label ) { ?>
                                    <div id="<?php echo $tab; ?>-tab-content"></div>
                                <?php } ?>
                            </div>
                        </div> <!--End of Tabs section-->
                    <?php } else { //No Tabs ?>
                        <?php $j = 0; if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <article class="latestPost excerpt">
                                <?php mts_archive_post(); ?>
                            </article>
                        <?php $j++; endwhile; endif; ?>

                        <?php if ( $j !== 0 ) { // No pagination if there is no posts ?>
                            <?php mts_pagination(); ?>
                        <?php } ?>
                    <?php } ?>
                <?php } else { //Paged ?>
                    <?php $j = 0; if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <article class="latestPost excerpt">
                            <?php mts_archive_post(); ?>
                        </article>
                    <?php $j++; endwhile; endif; ?>

                    <?php if ( $j !== 0 ) { // No pagination if there is no posts ?>
                        <?php mts_pagination(); ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <?php get_sidebar('left') ?>
    </div>
    <!-- END #sidebar-with-content -->
    <?php if ( isset($mts_options['mts_layout']) && ($mts_options['mts_layout'] == 'scslayout' || $mts_options['mts_layout'] == 'csslayout' )) {
        get_sidebar(); 
    }
get_footer(); ?>