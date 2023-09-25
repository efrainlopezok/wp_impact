<?php get_header();

?>
<!--content_container-->
<div id="content_container" class="main_top_margin">
  <!-- This is for the hero -->
  <?php
  $inner_banner_enabled = get_field('banner_enabled', 474);
  $inner_banner_image = get_field('inner_banner_image', 474);
  $inner_banner_heading = get_field('banner_heading', 474);
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
  <?php while (have_posts()) : the_post();
    $thumbnail = get_the_post_thumbnail_url();
    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $alt_text = get_post_meta($thumbnail->ID, '_wp_attachment_image_alt', true);
    $product_support = get_field('product_support') ?  get_field('product_support') : '';
    $where_to_buy = get_field('where_to_buy') ?  get_field('where_to_buy') : '';
    /* TODO: delete */
    $fe_content = get_field('fe_content') ?  get_field('fe_content') : '';
    $fe_content_items = get_field('fe_content_items') ?  get_field('fe_content_items') : '';
    $sp_content = get_field('sp_content') ?  get_field('sp_content') : '';
    $acc_content = get_field('acc_content') ?  get_field('acc_content') : '';
    /* $video_content = get_field('video_content') ?  get_field('video_content') : '';
    $br_content = get_field('br_content') ?  get_field('br_content') : ''; */
    $terms = get_the_terms(get_the_ID(), 'cat-prod');
    foreach ($terms as $term) {
      $term_name[] = $term->name;
    }

  ?>
    <div class="products--item">
      <div class="container">
        <div class="row">
          <div class="col-md-8">

            <div class="products--item__header">
              <div class="content_heading">
                <?php if (count($term_name) > 0) : ?>
                  <?php echo $term_name[0] ?>
                <?php endif; ?>
              </div>
              <a href="<?php echo get_site_url() ?>/office-solutions/"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/left-arrow.png" alt="left arrow"> BACK</a>
            </div>
            <div class="products--item__content">
              <div class="products--item__content__img">
                <div class="feature-image" style="max-width: 400px;">
                  <div class="slider-for">
                    <div class="image-slide">
                      <img src="<?php echo $featured_img_url ?>" alt="<?php echo $alt_text ?>">
                    </div>
                    <?php $gallery = get_field('gallery_prod'); ?>
                    <?php foreach ($gallery as $image) : ?>
                      <div class="image-slide">
                        <img src="<?php echo $image['url'] ?>" alt="">
                      </div>
                    <?php endforeach ?>
                  </div>
                </div>

                <div class="wrap-th">
                  <div class="slider-nav">
                    <div class="item-slide">
                      <img src="<?php echo $featured_img_url ?>" alt="<?php echo $alt_text ?>">
                    </div>
                    <?php $gallery = get_field('gallery_prod'); ?>
                    <?php foreach ($gallery as $image) : ?>
                      <div class="item-slide">
                        <img src="<?php echo $image['url'] ?>" alt="">
                      </div>
                    <?php endforeach ?>
                  </div>
                </div>
              </div>
              <div class="products--item__content__txt">
                <h4><?php echo get_the_title() ?></h4>
                <?php the_content() ?>
                <div class="products--item__content__links">
                  <?php if ($product_support != '') : ?>
                    <a href="<?php echo $product_support['url'] ?>"> <?php echo $product_support['title'] ?> <img src="<?php echo get_stylesheet_directory_uri() ?>/images/arrow-right2.png" alt="arrow"></a>
                  <?php endif; ?>
                  <?php if ($where_to_buy != '') : ?>
                    <a href="<?php echo $where_to_buy['url'] ?>"> <?php echo $where_to_buy['title'] ?> <img src="<?php echo get_stylesheet_directory_uri() ?>/images/arrow-right2.png" alt="arrow"></a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="products--item__more">
              <ul class="tabs">
                <li><a href="#panel1">Features</a></li>
                <li><a href="#panel2">Specifications</a></li>
                <!-- <li><a href="#panel3">Accessories</a></li> -->
                <!-- <li><a href="#panel4">Videos</a></li>
                <li><a href="#panel5">Brochures</a></li> -->
              </ul>
              <div class="products--item__more__content">
                <div id="panel1" class="panel">

                  <?php
                  if ($fe_content_items != '') :
                    foreach ($fe_content_items as $item) :
                      $fe_title_item = $item['fe_title_item'] ? $item['fe_title_item'] : '';
                      $fe_content_item = $item['fe_content_item'] ? $item['fe_content_item'] : '';
                  ?>
                      <div>
                        <button class="accordion"> <?php echo $fe_title_item ;?> </button>
                        <div class="panel">
                          <p> <?php echo $fe_content_item ;?></p>
                        </div>
                      </div>
                  <?php endforeach;
                  endif;
                  ?>

                  <!-- <?php echo $fe_content ?> -->

                </div>
                <div id="panel2" class="panel">
                  <?php echo $sp_content ?>
                </div>
                <div id="panel3" class="panel">
                  <?php echo $acc_content ?>
                </div>
                <!-- <div id="panel4" class="panel">
                  <?php echo $video_content ?>
                </div>
                <div id="panel5" class="panel">
                  <div class="broshures">
                    <?php echo $br_content ?>
                  </div>
                </div> -->

              </div>
            </div>
          </div>
          <!-- Sidebar -->
          <div class="col-md-4 pl-md-5">

            <div id="sidebar-widgets" class="primary-sidebar widget-area single-sidebar" role="complementary">
              <?php
              $taxonomies = get_terms(array(
                'taxonomy' => 'cat-prod',
                'hide_empty' => true
              ));

              if (!empty($taxonomies)) :
                echo '<ul>';
                echo '<li class="sf-field-taxonomy-cat-prod">';
                echo '<h4>Product Categories</h4>';
                echo '<ul>';
                echo '<li class="sf-level-0"><a href="' . get_site_url() . '/office-solutions/">All Product Categories</a></li>';
                foreach ($taxonomies as $category) {
                  if ($category->parent == 0) {


                    if ($category->name == $term_name[0]) {
                      echo '<li class="sf-level-0 sf-option-active">
                                              ' . esc_html($category->name) . '</li>';
                    } else {
                      echo '<li class="sf-level-0"><a href="' . get_site_url() . '/office-solutions/?_sft_cat-prod=' . $category->slug . '">
                                              ' . esc_html($category->name) . '</a></li>';
                    }
                  }
                }
                echo '</li></li></ul>';

              endif;
              ?>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- End of the hero -->
</div>
<?php endwhile; ?>

<!--content_container_end-->
<?php get_footer(); ?>