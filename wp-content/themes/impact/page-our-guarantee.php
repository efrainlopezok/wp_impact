<?php get_header(); 
/**
 * Template Name: Our Guarantee
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
			$enabledisable_columns_display = get_field('common_enabledisable_columns_display');
			if($enabledisable_columns_display == 1){
           ?>
                
                 
    <!--white_layer-->
    <div class="white_layer white_layer_new_padd" <?php if($enabledisable_columns_display == 0): ?> style="padding-top:20px;"<?php endif; ?> >
   		<!--container-->
    	<div class="container"> 
        	<!--row-->
            <div class="row row-element" >
            <div class="col-lg-6" >
             <?php if( have_rows('common_left_column_options') ): ?>
                   <?php while( have_rows('common_left_column_options') ): the_row(); 
                    // vars
					$article_title = get_sub_field('article_title');
                    $content = get_sub_field('content');
                   ?>   
                <div class="col-lg-12" >
                	<div class="row-content row-text-content">
                        <div class="main_list_heading" ><?php echo $article_title; ?></div>
                        <div class="main_list_content" >
                        <?php echo $content; ?>
                        </div>
                    </div>    
                </div>
                <?php endwhile;  endif; ?> 
           </div>
           <div class="col-lg-6" >       
                <?php if( have_rows('common_right_column_options') ): ?>
                <?php while( have_rows('common_right_column_options') ): the_row(); 
                    // vars
					$article_title = get_sub_field('article_title');
                    $content = get_sub_field('content');
                   ?>   
                <div class="col-lg-12" >
                	<div class="row-content row-text-content">
                        <div class="main_list_heading" ><?php echo $article_title; ?></div>
                        <div class="main_list_content" >
                        <?php echo $content; ?>
                        </div>
                    </div>    
                </div>
                <?php endwhile;  endif;  ?> 
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

<?php $recent = new WP_Query( 'page_id=21' ); while($recent->have_posts()) : $recent->the_post();?>
<?php
// check if columns display is enabled
   $enabledisable_testimonials_display = get_field('enabledisable_testimonials_display');
   if($enabledisable_testimonials_display == 1){?>  
   	<div class="seprator"></div>     
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