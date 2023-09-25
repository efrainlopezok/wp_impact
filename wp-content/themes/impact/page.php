<?php get_header(); ?>
<!--content_container-->
<div id="content_container" class="main_top_margin">
	<!--container-->
    <div class="container">
    <?php 
    if (have_posts()) : 
        while (have_posts()) : the_post(); 
     ?>
    	<!--inner_page-->
        <div class="inner_page" >
        	<div class="inner_content_title" ></div>
            <div class="inner_content_heading" ><?php the_title(); ?></div>
            <div class="inner_content" ><?php the_content(); ?></div>
            <?php edit_post_link('edit', '<p>', '</p>'); ?>
        </div>
        <!--inner_page_end-->
    <?php endwhile; else: ?> 
    <div class="inner_page" >
        <div class="inner_content_heading" >Sorry, no result found.</div>
    </div>    
    <?php endif; wp_reset_query(); ?>     
	</div>
    <!--container_end-->          
</div>
<!--content_container_end-->
<?php get_footer(); ?>