<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if (is_home()) { echo "Impact Office"; } else { wp_title('',true); } ?></title>	
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
    <!-- Bootstrap core CSS -->
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php bloginfo('template_url'); ?>/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/media.css"  />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>

  </head>
<body>

<!--wrapper-->
<div id="wrapper" >
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
    	<!--header-->
        <div id="header" >
	    	<!--container-->
    	   	<div class="container">
            	<!--row-->
            	<div class="row" >
                    <div class="col-md-3" >
                    	<div class="logo_box" ><a href="<?php echo get_site_url(); ?>" ><img src="<?php bloginfo('template_url'); ?>/images/impact-logo.jpg" alt="" class="impact_office_logo" ></a></div>				
                    </div>
                    <!--col-sm-9-->
                    <div class="col-md-9" >
                        <button class="navbar-toggler toggler_btn" type="button" data-toggle="collapse" data-target="#navbarTop" aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <?php main_nav(); ?>
                        <?php //include("includes/nav.php"); ?>
                        
                    </div>
                    <!--col-sm-9_end-->
            	</div>
                <!--row_end-->        
       	 	</div>
        	<!--container_end-->
    	</div>
        <!--header_end-->    
	</nav>