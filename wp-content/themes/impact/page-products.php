<?php get_header();
/**
 * Template Name: Products
 */
?>
<!--content_container-->
<div id="content_container" class="main_top_margin">
    <!-- This is for the hero -->
    <?php
    $inner_banner_enabled = get_field('banner_enabled');
    $inner_banner_image = get_field('inner_banner_image');
    $inner_banner_heading = get_field('banner_heading');
    $inner_title_office_solutions = get_field('title_office_solutions');
    ?>

    <?php if ($inner_banner_enabled == 1) : ?>
        <!--inner_banner-->
        <div class="inner_banner" style="background-image:url('<?php if (!strlen($inner_banner_image['url'])) {
                                                                    echo get_stylesheet_directory_uri() . "/images/";
                                                                } else {
                                                                    print_r($inner_banner_image['url']);
                                                                } ?>');">
            <!--inner_banner_left-->
            <div class="inner_banner_left">
                <!--inner_banner_left_inner-->
                <div class="inner_banner_left_inner">
                    <div class="inner_banner_heading"><?php echo $inner_banner_heading; ?></div>
                </div>
                <!--inner_banner_left_inner_end-->
            </div>
            <!--inner_banner_left_end-->
        </div>
        <!--inner_banner_end-->
    <?php endif; ?>
    <div class="products__list">
        <div class="container">
            <div class="row row-content d-flex flex-row">
                <div class="col-md-8">
                    <div class="inner_content_products">
                        <div class="subtitle">
                            <h2>
                            <?php echo $inner_title_office_solutions; ?>
                            </h2>
                            <div class="sort">
                                <strong>SORT: </strong><?php echo do_shortcode('[searchandfilter id="511"]'); ?>
                            </div>
                        </div>
                        <div id="products__list">
                            <div class="row">
                                <?php
                                if (get_query_var('paged')) {
                                    $paged = get_query_var('paged');
                                }
                                if (get_query_var('page')) {
                                    $paged = get_query_var('page');
                                }
                                $paged = intval($paged);
                                $args = array(
                                    'post_type'      => 'product',
                                    'posts_per_page' => 6,
                                    'paged'          => $paged,
                                    'post_status'    => 'publish',
                                    'search_filter_id' => 511
                                );
                                $loop = new WP_Query($args);
                                if ($loop->have_posts()) :
                                    while ($loop->have_posts()) :
                                        $loop->the_post();
                                        $image = get_the_post_thumbnail($page->ID, 'full') ? get_the_post_thumbnail($page->ID, 'full') : '<img src="' . get_site_url() . '/wp-content/themes/impact/images/impact-logo.jpg" style="width:150px;padding-top: 30%;" alt="impact office logo" />';
                                ?>
                                        <div class="col-md-4 col-6">
                                            <div class="product__item">
                                                <div class="image_product"><?php echo $image ?></div>
                                                <h4 class="title_product"><?php the_title(); ?></h4>
                                                <a href="<?php the_permalink(); ?>"> VIEW DETAILS <img src="<?php echo get_stylesheet_directory_uri() ?>/images/arrow-right2.png" alt=""> </a>
                                            </div>
                                        </div>
                                <?php
                                    endwhile;
                                endif;
                                wp_reset_postdata();
                                ?>
                            </div>
                            <?php
                            $big = 9999999;
                            $args = array(
                                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format' => '?paged=%#%',
                                'current' => max(1, get_query_var('paged')), //toma el valor 1 de la consulta 'paged'
                                'show_all' => false,
                                'end_size' => 1,
                                'mid_size' => 2,
                                'prev_next' => true,
                                'prev_text' => __('< PREVIOUS', 'atr-opt'),
                                'next_text' => __('NEXT >', 'atr-opt'),
                                'type' => 'plain',
                                'add_args' => false,
                                'add_fragment' => '',
                                'before_page_number' => '',
                                'after_page_number' => '',
                                'total' => $loop->max_num_pages
                            );
                            ?>
                            <div class="row paginate-links pager">
                                <?php echo paginate_links($args); ?>
                            </div>
                            <!-- <div class="pager" style="text-align: center;">
                <div class="btnAlbum"><?php previous_posts_link('< PREVIUS', $loop->max_num_pages); ?> <img src="<?php echo get_stylesheet_directory_uri() ?>/images/r-arrow.png" alt=""></div>
                <div class="btnAlbum"><?php next_posts_link('NEXT >', $loop->max_num_pages); ?> </div>
            </div> -->
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-md-4 pl-md-5">

                    <div id="sidebar-widgets" class="primary-sidebar widget-area" role="complementary">
                        <?php echo do_shortcode('[searchandfilter id="511"]'); ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- End of the hero -->
</div>
<!--content_container_end-->
<?php get_footer(); ?>