<?php
/**
 * Template Name: Home
 */
get_header(); 
?>
<?php 
			$banner_enabled = get_field('banner_enabled');
            $banner_image = get_field('banner_image');
			$banner_title = get_field('banner_title');
			$banner_heading = get_field('banner_heading');
			$learn_more_link = get_field('learn_more_link');

            $banners = get_field( 'banners' );
		?>
<!--content_container-->
<div id="content_container" class="main_top_margin">
    <div class="banner-slide">
    <?php if($banner_enabled == 1): ?>
    	<!--main_banner-->
        <?php if ($banners): ?>
            <?php foreach ($banners as $banner): ?>
                <?php if ($banner['banner_image']['url']): ?>
                    <?php $url_image = $banner['banner_image']['url']; ?>
                <?php else: ?>
                    <?php $url_image = get_stylesheet_directory_uri() . "/images/banner-img-2.jpg"; ?>
                <?php endif ?>
            	<div class="main_banner" style="background-image:url('<?php echo $url_image; ?>');" >
                	<!--banner_right-->
                	<div class="banner_right" >
                    	<!--banner_right_inner-->
                        <div class="banner_right_inner" >
                        	<div class="main_banner_title" ><?php echo $banner['banner_title']; ?></div>
                            <div class="main_banner_heading" ><?php echo $banner['banner_heading']; ?></div>
                            <?php echo $banner['banner_content']; ?>
                            <div class="" ><a href="<?php echo $banner['learn_more_link']; ?>" class="learn_more_btn" >Learn More &nbsp; &gt;</a></div>
                        </div>
                        <!--banner_right_inner_end-->
                    </div>
                    <!--banner_right_end-->
                </div>
            <?php endforeach ?>
        <?php endif ?>
        <!--main_banner_end-->
    <?php endif; ?>  
    </div>
<?php 
			$home_article_enabled = get_field('home_article_enabled');
            $home_article_subtitle = get_field('home_article_subtitle');
			$home_article_title = get_field('home_article_title');
			$home_article_content = get_field('home_article_content');
			$home_our_guarantee_link = get_field('home_our_guarantee_link');
			$home_contact_us_link = get_field('home_contact_us_link');
			$home_article_right_image = get_field('home_article_right_image');
		?>
<?php if($home_article_enabled == 1): ?>        
    <!--white_layer-->
    <div class="white_layer" id="customer" <?php if($banner_enabled == 0): ?> style="padding-top:20px;"<?php endif; ?> >
   		<!--container-->
    	<div class="container">
        	<!--row-->
            <div class="row" >
                <!--layer_left_content-->
                <div class="layer_left_content col-md-6" >
                    <div class="content_title m_top_35" ><?php echo $home_article_subtitle; ?></div>
                    <div class="content_heading" ><?php echo $home_article_title; ?></div>
                    <?php echo $home_article_content; ?>
                    
                    <div class="content_btns row" >
                    	<div class="col-sm-6 img-btns1" ><a href="<?php echo $home_our_guarantee_link; ?>" ><img src="<?php bloginfo('template_url'); ?>/images/our-guarantee.png" alt="" class="img-btns" ></a></div>
                    	<div class="col-sm-6 img-btns2" ><a href="<?php echo $home_contact_us_link; ?>" ><img src="<?php bloginfo('template_url'); ?>/images/contact-us.png" alt="" class="img-btns" ></a></div>
                    </div>
                </div>
                <!--layer_left_content_end-->
                <!--layer_right_content-->
                <div class="layer_right_content col-md-6" >
                <?php if(strlen($home_article_right_image['url'])){?>
                	<img src="<?php print_r($home_article_right_image['url']); ?>" class="img-fluid" alt="" >
                <?php }?>    
                </div>
                <!--layer_right_content_end-->
   			</div>
        	<!--row_end-->        
       	</div>
    	<!--container_end-->
    </div>
    <!--white_layer_end-->
<?php endif; ?>   
<?php 
			$home_about_area_enabled = get_field('home_about_area_enabled');
            $about_title = get_field('about_title');
			$about_content = get_field('about_content');
			$about_banner_background_image = get_field('about_banner_background_image');
		?>
<?php if($home_about_area_enabled == 1): ?>    
    <!--about_section-->
	<div class="about_section" style="background-image:url('<?php if(!strlen($about_banner_background_image['url'])){ echo get_stylesheet_directory_uri() . "/images/";}else{print_r($about_banner_background_image['url']);}?>');" >
    	<!--about_section_inner-->
    	<div class="about_section_inner" >
                <div class="about_section_heading" ><?php echo $about_title; ?></div>
                <div class="about_section_content" ><?php echo $about_content; ?> </div>
        </div>
        <!--about_section_inner_end-->
    </div>
    <!--about_section_end-->
<?php endif; ?>  
<?php
// check if columns display is enabled
   $enabledisable_services_display = get_field('enabledisable_services_display');
   if($enabledisable_services_display == 1){?>   
    <!--services_section-->
	<div class="services_section" >
    	<!--container-->
    	<div class="container">
    	<div class="row" >
        
         <?php   if( have_rows('services') ): ?>
                
                <?php while( have_rows('services') ): the_row(); 
                    // vars
					$service_image = get_sub_field('service_image');
                    $service_name = get_sub_field('service_name');
                    $service_description = get_sub_field('service_description');
                    $service_link = get_sub_field('service_link');

                    ?>
            <!--services_box-->
            
       		<div class="col-lg-4 services_box" >
            	<a href="<?php echo $service_link ?>" >
            	<div class="services_box_inner" >
                	<div class="services_box_padd" >
                        <div class="services_box_logo" ><img src="<?php echo $service_image['url']; ?>" alt="" class="ser_logo" ></div>
                        <div class="services_box_title" ><?php echo $service_name ?></div>
                        <div class="services_box_short_des" ><?php echo $service_description ?></div>
                    </div>   
                </div>
                </a>
            </div>
            
            <!--services_box_end-->   
            <?php  endwhile; endif; ?>
        </div>
        </div>
    	<!--container_end-->
        
    </div>
    <?php } ?>
    <!--services_section_end-->
<?php
// check if columns display is enabled
   $enabledisable_testimonials_display = get_field('enabledisable_testimonials_display');
   if($enabledisable_testimonials_display == 1){?>       
    <div class="seprator"></div>
    <!--testimonials_section-->
	<div class="testimonials_section" >
    	<!--container-->
    	<div class="container">
        	<div class="testimonials_section_heading" >What <strong>Our Customers</strong> Are Saying</div>
            <!--row-->
    		<div class="row justify-content-center" >
            <?php   if( have_rows('testimonials') ): ?>
                
                <?php while( have_rows('testimonials') ): the_row(); 
                    // vars
					$profile_image = get_sub_field('profile_image');
                    $profile_name = get_sub_field('profile_name');
                    $company = get_sub_field('company');
                    $description = get_sub_field('description');
					$stars = get_sub_field('stars');

                    ?>
            	<!--testimonials_box-->
                <div class="col-lg-4 testimonials_box" >
                    <div class="testimonials_box_inner" >
                        <div class="testimonials_box_padd" >
                        	<!--row-->
							<div class="row justify-content-center" >
                            	<!-- <div class="col-lg-3" >
                                	<div class="testimonials_thumb" >
                                		<img src="<?php //echo $profile_image['url']; ?>" class="rounded-circle" width="65" height="64" >
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-9" > -->
                                	<div class="person_name" ><?php echo $profile_name ?></div>
                                    <div class="person_company" ><?php echo $company ?></div>
                                <!-- </div> -->
                            </div>
                            <!--row_end-->
                            <!--row-->
                            <div class="row" >
                            	<div class="person_desc" ><?php echo $description ?></div>
                                <div class="person_rating stars at_<?php echo $stars ?>_star" >&nbsp;</div>
                            </div>
                            <!--row_end-->
                        </div>    
                    </div>
                </div>
                <!--testimonials_box_end-->
                <?php  endwhile; endif; ?>
                
         	</div>
            <!--row_end-->
        </div>
    	<!--container_end-->
    </div>
    <!--testimonials_section_end-->  
    <?php } ?>
    
</div>
<!--content_container_end-->
<?php get_footer(); ?>