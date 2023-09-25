<?php get_header(); 
/**
 * Template Name: Services
 */
?>
<?php 
			$inner_banner_enabled = get_field('banner_enabled');
            $inner_banner_image = get_field('inner_banner_image');
			$inner_banner_heading = get_field('banner_heading');
		?>
<!--content_container-->
<div id="content_container" class="main_top_margin">
<?php if($inner_banner_enabled == 1): ?>
	<!--inner_banner-->
	<div class="inner_banner" style="background-image:url('<?php if(!strlen($inner_banner_image['url'])){ echo get_stylesheet_directory_uri() . "/images/";}else{print_r($inner_banner_image['url']);}?>');" >
    	<!--inner_banner_left-->
    	<div class="inner_banner_left" >
        	<!--inner_banner_left_inner-->
            <div class="inner_banner_left_inner" >
                <div class="inner_banner_heading" ><?php echo $inner_banner_heading; ?></div>
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
			if($enabledisable_columns_display == 1){
            if( have_rows('columns_content') ): ?>
                
                 
    <!--white_layer-->
    <div class="white_layer white_layer_new_padd" <?php if($enabledisable_columns_display == 0): ?> style="padding-top:20px;"<?php endif; ?> >
   		<!--container-->
    	<div class="container">
        <?php while( have_rows('columns_content') ): the_row(); 
                    // vars
					$image_content = get_sub_field('image_content');
                    $image_alignment = get_sub_field('image_alignment');
					$article_subtitle = get_sub_field('article_subtitle');
                    $article_title = get_sub_field('article_title');
					$content_area = get_sub_field('content_area');
                   ?>    
        	<!--row-->
            <div class="row row-element d-flex flex-row <?php if($image_alignment == 'left'){echo 'd-flex flex-row-reverse';} ?>" >
                <!--layer_left_content-->
                <div class="col-12 col-lg-6" >
                	<div class="row-content row-text-content padd_right_20">
                        <div class="content_title" ><?php echo $article_subtitle; ?></div>
                        <div class="content_heading" ><?php echo $article_title; ?></div>
                        <?php echo $content_area; ?>
                    </div>    
                </div>
                <!--layer_left_content_end-->
                <!--layer_right_content-->
                <div class="col-12 col-lg-6" >
                	<div class="row-content row-img-content">
						<?php if(strlen($image_content['url'])){?>
                            <img src="<?php print_r($image_content['url']); ?>" class="img-fluid" alt="<?php echo $image_content['alt']; ?>" >
                        <?php }?>    
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
<?php endif; } ?>   
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
                <?php echo do_shortcode('[contact-form-7 id="219" title="Services Contact Form"]'); ?>
                <?php /*?><div class="help_form" >
                	<div class="textfield_box" >
	                	<input type="text" class="tf tf_size" name="name" placeholder="Your Name"  />
                    </div>    
                    <div class="textfield_box" >
                    	<input type="text" class="tf tf_size" name="name" placeholder="Your Name"  />
                    </div>    
                    <div class="textfield_box" >
                    	<input type="text" class="tf tf_size" name="name" placeholder="Your Name"  />
                    </div>  
                    <div class="textfield_box n_r_m submit_btn_box" ><input type="submit" class="submit_btn" value="SUBMIT >"  /></div>  
                </div><?php */?>
        </div>
        <!--about_section_inner_end-->
    </div>
    <!--about_section_end-->
<?php endif; ?>  

<?php $recent = new WP_Query( 'page_id=21' ); while($recent->have_posts()) : $recent->the_post();?>
<?php
// check if columns display is enabled
   $enabledisable_testimonials_display = get_field('enabledisable_testimonials_display');
   if($enabledisable_testimonials_display == 1){?>       
    <!--testimonials_section-->
	<div class="testimonials_section padd_top_80" >
    	<!--container-->
    	<div class="container">
        	<div class="testimonials_section_heading" >What <strong>Our Customers</strong> Are Saying</div>
            <!--row-->
    		<div class="row" >
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
							<div class="row" >
                            	<!-- <div class="col-lg-3" >
                                	<div class="testimonials_thumb" >
                                		<img src="<?php echo $profile_image['url']; ?>" class="rounded-circle" width="65" height="64" >
                                    </div>
                                </div> -->
                                <div class="col-lg-12" >
                                	<div class="person_name" ><?php echo $profile_name ?></div>
                                    <div class="person_company" ><?php echo $company ?></div>
                                </div>
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
    <?php endwhile; wp_reset_query(); ?>    
</div>
<!--content_container_end-->
<?php get_footer(); ?>