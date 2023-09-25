<?php 
/**
 * Template Name: Footer
 */
$recent = new WP_Query( 'page_id=85' ); while($recent->have_posts()) : $recent->the_post();?>
<?php 
			$company_name = get_field('company_name');
            $company_address = get_field('company_address');
			$company_phone = get_field('company_phone');
			$company_email = get_field('company_email');
			$company_facebook_url = get_field('company_facebook_url');
			$newsletter_title = get_field('newsletter_title');
			$newsletter_description = get_field('newsletter_description');
		?>
<div id="footer" >
	<!--container-->
    <div class="container">
    <!--row-->
    <div class="row" >
        <div class="col-lg-4" >
        	<div class="footer_col_heading" ><?php echo $newsletter_title; ?></div>
            <div class="footer_col_content" >
            	<?php echo $newsletter_description; ?>
            <!-- <input type="text" class="new_tf" placeholder="Your Name" >
            <input type="text" class="new_tf" placeholder="Email Address" >
            <input type="text" class="btn_submit" value="SUBMIT  >" > -->
            </div>
        </div>
    
        <div class="col-lg-4 lets-help" >
        	<div class="footer_col_heading" >Let us Help You</div>
            <div class="footer_col_content" >
                <ul>
                	<li><a href="<?php echo get_site_url(); ?>/" >Home </a></li>
                    <li><a href="<?php echo get_site_url(); ?>/about/" >About </a></li>
                    <li><a href="<?php echo get_site_url(); ?>/services/" >Services </a></li>
                    <li><a href="<?php echo get_site_url(); ?>/case-studies/" >Case Studies </a></li>
                    <li><a href="<?php echo get_site_url(); ?>/contact/" >Contact </a></li>
                    <li><a href="<?php echo get_site_url(); ?>/portal/" >Portal </a></li>
                </ul>
            </div>
        </div>
      
        <div class="col-lg-4" >
        	<div class="footer_col_heading" >Contact Info</div>
            <div class="footer_col_content" >
            <ul>
            	<li><?php echo $company_name; ?></li>
                <li><?php echo $company_address; ?></li>
                <li><a href="tel:<?php echo $company_phone; ?>" ><?php echo $company_phone; ?></a></li>
                <li><a href="mailto:<?php echo $company_email; ?>" ><?php echo $company_email; ?></a></li>
            </ul>    
                <div class="footer_fb_icon" ><a href="<?php echo $company_facebook_url; ?>" target="_blank" >Visit us on Facebook!</a></div> 
            </div>
        </div>
    
    </div> 
    <!--row_end-->  
    <!--row-->
    <div class="row" >
        <div class="copyright" >
            <ul>
                <li>© 2019 Impact Office</li> | 
                <li>All Rights Reserved</li>  |
              <!--   <li><a href="<?php //echo get_site_url(); ?>/privacy-policy/" >Privacy Policy</a></li> |
                <li><a href="<?php// echo get_site_url(); ?>/terms-and-conditions/" >Terms & Conditions</a></li> | -->
                <li>Powered by:  <a href="https://www.thepivotplan.com/" target="_blnak"><img src="<?php bloginfo('template_url'); ?>/images/pivot.png" alt="" class="pivot" ></a> </li>
            </ul>
        </div>
                      
    </div>
    <!--row_end-->  
    </div>
    <!--container_end-->   
</div>
<?php endwhile; wp_reset_query(); ?>
<!--footer_end-->
<?php wp_footer(); ?>  
</div>
<!--wrapper_end-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php /*?> <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>--><?php */?>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
  </body>
</html>