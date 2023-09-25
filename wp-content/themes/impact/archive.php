<?php
get_header();
?>
<!--content_container-->
<div id="content_container" class="main_top_margin">
	<!--container-->
    <div class="container">
    <div class="inner_content_heading" ><?php echo the_archive_title($before = '', $after = ''); ?></div>
    <?php 
    if (have_posts()) : 
        while (have_posts()) : the_post(); 
     ?>
    	<!--inner_page-->
        <div class="inner_page" >
        	<div class="inner_content_title" ></div>
            <div class="inner_content_heading" ><a href="<?php echo get_permalink(); ?>" ><?php the_title(); ?></a></div>
            <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) { ?>
                            <?php the_post_thumbnail('forummedium', array( 'class' => 'img-responsive' )); ?>
                        <?php } ?>
            <div class="inner_content" ><?php the_excerpt(); ?></div>
        </div>
        <!--inner_page_end-->
    <?php endwhile; else: ?> 
    <div class="inner_page" >
        <div class="inner_content_heading" >Sorry, no result found.</div>
    </div>    
    <?php endif; wp_reset_query(); ?>   
                    <!--pagenation-->
                    <div class="pagenation" >
                        <?php echo custom_pagination(); ?>
                    </div>     
                    <!--pagenation_end-->      
	</div>
    <!--container_end-->          
</div>
<!--content_container_end-->
<?php get_footer(); ?>