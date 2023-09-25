<?php get_header();
/**
 * Template Name: About
 */
?>
<?php
$inner_banner_enabled = get_field('banner_enabled');
$inner_banner_image = get_field('inner_banner_image');
$inner_banner_heading = get_field('banner_heading');
?>
<!--content_container-->
<div id="content_container" class="main_top_margin">
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

    <?php
    // check if columns display is enabled
    $enabledisable_columns_display = get_field('enabledisable_columns_display');
    if ($enabledisable_columns_display == 1) {
        if (have_rows('columns_content')) : ?>


            <!--white_layer-->
            <div id="about_section" class="white_layer white_layer_new_padd white_layer--p_y" <?php if ($enabledisable_columns_display == 0) : ?> style="padding-top:20px;" <?php endif; ?>>
                <!--container-->
                <div class="container">
                    <?php while (have_rows('columns_content')) : the_row();
                        // vars
                        $image_content = get_sub_field('image_content');
                        $image_alignment = get_sub_field('image_alignment');
                        $article_subtitle = get_sub_field('article_subtitle');
                        $article_title = get_sub_field('article_title');
                        $content_area = get_sub_field('content_area');
                    ?>
                        <!--row-->
                        <div class="row row-element d-flex flex-row <?php if ($image_alignment == 'left') {
                                                                        echo 'd-flex flex-row-reverse thumb_set';
                                                                    } ?>">
                            <!--layer_left_content-->
                            <div class="col-12 col-lg-6">
                                <div class="row-content row-text-content">
                                    <div class="content_title"><?php echo $article_subtitle; ?></div>
                                    <div class="content_heading"><?php echo $article_title; ?></div>
                                    <?php echo $content_area; ?>
                                </div>
                            </div>
                            <!--layer_left_content_end-->
                            <!--layer_right_content-->
                            <div class="col-12 col-lg-6">
                                <div class="row-content row-img-content">
                                    <?php if (strlen($image_content['url'])) { ?>
                                        <img src="<?php print_r($image_content['url']); ?>" class="img-fluid" alt="<?php echo $image_content['alt']; ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <!--layer_right_content_end-->
                        </div>
                        <!--row_end-->
                    <?php endwhile; ?>
                </div>
                <!--container_end-->
            </div>
            <!--white_layer_end-->
    <?php endif;
    }
    ?>
    <!-- Support -->
    <?php
    $support_background = get_field('support_background');
    $support_title = get_field('support_title');
    $support_content_left = get_field('support_content_left');
    $support_content_right = get_field('support_content_right');
    $enabledisable_support_display = get_field('enabledisable_support_display');
    if ($enabledisable_support_display == 1) { ?>
        <!--support-->
        <div id="support_section" class="c-support" style="background-image: url('<?php echo $support_background; ?> ');">
            <div class="container">
                    <div class="c-support__container">
                    <h2 class="c-support__title"><?php echo $support_title;?></h2>
                    <div class="row d-flex flex-row ">
                        <!--layer_left_content-->
                        <div class="col-12 col-lg-6">
                            <div class="c-support__content row-content">
                                <?php echo $support_content_left;?>
                            </div>
                        </div>
                        <!--layer_left_content_end-->
                        <!--layer_right_content-->
                        <div class="col-12 col-lg-6">
                            <div class="c-support__content">
                                <?php echo $support_content_right;?>
                            </div>
                        </div>
                        <!--layer_right_content_end-->
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- End Support -->
    <!-- Start Staff -->
    <?php
    $all_items = get_field('all_items') ? get_field('all_items') : '';
    if ($all_items != '') :
    ?>
        <div id="team_section" class="staff">
            <div class="container">
                <div class="row">
                    <?php
                    foreach ($all_items as $item) {
                        $item_title = $item['item_title'] ? '<h3>' . $item['item_title'] . '</h3>' : '';
                        $item_linkedin_url = $item['item_linkedin_url'] ? $item['item_linkedin_url'] : '#';
                        $item_description = $item['item_description'] ? $item['item_description'] : '';
                    ?>
                        <div class="col-md-4">
                            <div class="staff--item pr-md-5">
                                <header class="staff--item__title">
                                    <?php echo $item_title ?> <a href="<?php echo $item_linkedin_url ?>" title="linkedin" target="_blank"><i class="fab fa-linkedin"></i></a>
                                </header>
                                <?php echo $item_description ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
    endif;
    ?>
    <!-- End Staff -->
    <?php
    $gray_enabledisable_columns_display = get_field('gray_enabledisable_columns_display');
    $gray_content = get_field('gray_content');
    $gray_options = get_field('gray_options');
    $gray_options = explode("\n", $gray_options);
    ?>
    <?php if ($gray_enabledisable_columns_display == 1) : ?>
        <!--bullets_layer-->
        <div class="bullets_layer">
            <div class="bullets_layer_txt"><?php echo $gray_content; ?></div>
            <?php $countt = count($gray_options);
            if ($countt > 0) { ?>
                <ul>
                    <?php foreach ($gray_options as $value) { ?>
                        <li><?php echo $value; ?></li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
        <!--bullets_layer_end-->
    <?php endif; ?>


    <?php $common_title = get_field('common_title') ? '<div class="content_heading guarantees__content-heading"><h2>' . get_field('common_title') . '</h2></div>' : '';
    // check if columns display is enabled
    $enabledisable_columns_display = get_field('common_enabledisable_columns_display');
    if ($enabledisable_columns_display == 1) {
    ?>


        <!--white_layer-->
        <div id="programs_section" class="white_layer white_layer_new_padd guarantees" <?php if ($enabledisable_columns_display == 0) : ?> style="padding-top:20px;" <?php endif; ?>>
            <!--container-->
            <div class="container">
                <?php echo $common_title ?>
                <!--row-->
                <div class="row row-element">
                    <div class="col-lg-6">
                        <?php if (have_rows('common_left_column_options')) : ?>
                            <?php while (have_rows('common_left_column_options')) : the_row();
                                // vars
                                $article_title = get_sub_field('article_title');
                                $content = get_sub_field('content');
                            ?>
                                <div class="col-lg-12">
                                    <div class="row-content row-text-content">
                                        <div class="main_list_heading"><?php echo $article_title; ?></div>
                                        <div class="main_list_content">
                                            <?php echo $content; ?>
                                        </div>
                                    </div>
                                </div>
                        <?php endwhile;
                        endif; ?>
                    </div>
                    <div class="col-lg-6">
                        <?php if (have_rows('common_right_column_options')) : ?>
                            <?php while (have_rows('common_right_column_options')) : the_row();
                                // vars
                                $article_title = get_sub_field('article_title');
                                $content = get_sub_field('content');
                            ?>
                                <div class="col-lg-12">
                                    <div class="row-content row-text-content">
                                        <div class="main_list_heading"><?php echo $article_title; ?></div>
                                        <div class="main_list_content">
                                            <?php echo $content; ?>
                                        </div>
                                    </div>
                                </div>
                        <?php endwhile;
                        endif;  ?>
                    </div>
                </div>
                <!--row_end-->
            </div>
            <!--container_end-->
        </div>
        <!--white_layer_end-->
    <?php
    }
    ?>
    <?php $recent = new WP_Query('page_id=21');
    while ($recent->have_posts()) : $recent->the_post(); ?>
        <?php
        // check if columns display is enabled
        $enabledisable_testimonials_display = get_field('enabledisable_testimonials_display');
        if ($enabledisable_testimonials_display == 1) { ?>
            <!--testimonials_section-->
            <div class="testimonials_section testimonials_section--about bkg--color__gray">
                <!--container-->
                <div class="container">
                    <div class="testimonials_section_heading">What <strong>Our Customers</strong> Are Saying</div>
                    <!--row-->
                    <div class="row">
                        <?php if (have_rows('testimonials')) : ?>

                            <?php while (have_rows('testimonials')) : the_row();
                                // vars
                                $profile_image = get_sub_field('profile_image');
                                $profile_name = get_sub_field('profile_name');
                                $company = get_sub_field('company');
                                $description = get_sub_field('description');
                                $stars = get_sub_field('stars');

                            ?>
                                <!--testimonials_box-->
                                <div class="col-lg-4 testimonials_box">
                                    <div class="testimonials_box_inner">
                                        <div class="testimonials_box_padd">
                                            <!--row-->
                                            <div class="row">
                                                <!-- <div class="col-lg-3" >
                                	<div class="testimonials_thumb" >
                                		<img src="<?php echo $profile_image['url']; ?>" class="rounded-circle" width="65" height="64" >
                                    </div>
                                </div> -->
                                                <div class="col-lg-12">
                                                    <div class="person_name"><?php echo $profile_name ?></div>
                                                    <div class="person_company"><?php echo $company ?></div>
                                                </div>
                                            </div>
                                            <!--row_end-->
                                            <!--row-->
                                            <div class="row">
                                                <div class="person_desc"><?php echo $description ?></div>
                                                <div class="person_rating stars at_<?php echo $stars ?>_star">&nbsp;</div>
                                            </div>
                                            <!--row_end-->
                                        </div>
                                    </div>
                                </div>
                                <!--testimonials_box_end-->
                        <?php endwhile;
                        endif; ?>

                    </div>
                    <!--row_end-->
                </div>
                <!--container_end-->
            </div>
            <!--testimonials_section_end-->
        <?php } ?>
    <?php endwhile;
    wp_reset_query(); ?>
</div>
<!--content_container_end-->
<?php get_footer(); ?>