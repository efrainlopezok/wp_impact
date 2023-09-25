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
            <div class="inner_content_heading" ><a href="<?php echo get_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a></div>
            <div class="inner_content" ><?php the_excerpt(); ?></div>
        </div>
        <!--inner_page_end-->
    <?php endwhile; else: ?> 
    <div class="inner_page" >
        <div class="inner_content_heading" >Sorry, no result found.</div>
        <div class="search_box m_top_20" >
                            	<form id="searchform" method="get" action="<?php echo get_settings('home'); ?>/">
                                    <input type="text" class="search_tf c_w50" placeholder="Your Keyword..." name="s" id="searchbox" value="<?php if(isset($_GET['s']) && $_GET['s']!=""){echo $_GET['s'];} ?>" />
                                    <input type="submit" class="search_submit_btn" value="Search" />
                            	</form>
                            	</div>
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