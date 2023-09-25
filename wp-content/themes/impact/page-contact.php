<?php get_header(); 
/**
 * Template Name: Contact
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
			$enabledisable_columns_display = get_field('enabledisable_columns_display');
            $contact_subtitle = get_field('contact_subtitle');
			$contact_title = get_field('contact_title');
			$contact_content = get_field('contact_content');
			$contact_form = get_field('contact_form');
            $map_image = get_field('map_image');
           /*  $list_of_locations = get_field('list_of_locations') ? get_field('list_of_locations') : ''; */
            $map_location = get_field('map_location') ? get_field('map_location') : '';


            
		?>
<?php if($enabledisable_columns_display == 1): ?>        
    <!--white_layer-->
    <div class="white_layer white_layer_new_padd contact_page" >
   		<!--container-->
    	<div class="container">
        	<!--row-->
            <div class="row" >
                <!--layer_left_content-->
                <div class="layer_left_content col-lg-12 content__form--pre " >
                    <div class="content_title" ><?php echo $contact_subtitle; ?></div>
                    <div class="content_heading" ><?php echo $contact_title; ?></div>
                    <?php echo $contact_content; ?>
                    <div class="contact_form"  >
                    	 <?php echo $contact_form; ?>
                    </div>
                </div>
                <!--layer_left_content_end-->
                <!--layer_right_content-->
              
                <div  class="col-lg-12">


                </div>
                <!--layer_right_content_end-->
   			</div>

           
            <!--row_end-->        
           </div>
           <div id="map-find" >

           </div>
    <div >
<?php 
  $list__map =   $map_location['list__map'] ? $map_location['list__map'] : '';    
?>
            <div  class="map__location--section">
                <div id="map-canvas"></div>
            </div>
            <div id="services" class="locations__map--pre" >
                <div class="container">
                <div class="list-link-map">
                        <?php
                        $col_11 = array();
                        $col_22 = array();
                        $col_33 = array();
                        $lentElement =  count($list__map)/3; 
                        $element_count = round($lentElement, 0);
                        if( $list__map != ''){
                            $count_1= 0;
                            $col_number = 1; 
                            foreach($list__map as $list_map_item ) {
                                $title_map_l = $list_map_item['title_map_l'] ? $list_map_item['title_map_l'] : ''; 

                                if($element_count > $count_1  ){
                                    $count_1++;
                                }else{
                                    $col_number++;
                                    $count_1 = 1; 
                                }

                                if( $col_number  == 1){
                                    $col_11[] = $title_map_l;
                                }
                                else if( $col_number  == 2){
                                    $col_22[] = $title_map_l;
                                }else{
                                    $col_33[] = $title_map_l;
                                }
                            }
                        }
                        ?>
                    <div class="row list-location-pre map-location">
                        <div class="col-sm-4">
                            <?php 
                            $count_map = 0;
                            ?>
                            <ul> 
                                <?php for($i = 0; $i< count($col_11); $i++){ 
                                        ?>
                                            <li>
                                                <p data-markerid="<?php echo $count_map; ?>" ><a  class="marker-link active read-more-2" data-markerid="<?php echo $count_map; ?>" href="#map-find"><?php echo $col_11[$i]; ?></a></p>
                                            </li>
                                            <?php 
                                            $count_map++;
                                    }
                                ?>
                            </ul>
                            <?php ?>
                        </div>
                         <div class="col-sm-4">
                            
                            <ul>
                                <?php foreach($col_22 as $col_item){ ?>
                                <li>
                                <p data-markerid="<?php echo $count_map; ?>" ><a  class="marker-link active read-more-2" data-markerid="<?php echo $count_map; ?>" href="#map-find"><?php echo $col_item; ?></a></p>
            
                                </li>
                                <?php 
                                $count_map++;
                                    }
                                ?>
                            </ul>
                            <?php  ?>
                        </div> 
                         <div class="col-sm-4">
                            <ul>
                                <?php foreach($col_33 as $col_item){ ?>
                                <li>
                                <p data-markerid="<?php echo $count_map; ?>" ><a  class="marker-link active read-more-2" data-markerid="<?php echo $count_map; ?>" href="#map-find"><?php echo $col_item; ?></a></p>

                                </li>
                                <?php 
                                $count_map++;
                                    }
                                ?>
                            </ul>
                            <?php  ?>
                        </div> 
                    </div> 
                </div>
                </div>
            </div>
           
    	<!--container_end-->
    </div>
    <!--white_layer_end-->
<?php endif; ?>   

</div>
<!--content_container_end-->

<script>
        // Map Amenities Settings
        function initialize() {

        var markers = new Array();
        var markers2 = new Array();
        var markers3 = new Array();
        var markers4 = new Array();
        var markers5 = new Array();

        var mapOptions = {
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: new google.maps.LatLng(39.18848882938559, -76.75329967285195),
            disableDefaultUI: true,
            // gestureHandling: 'none',
            styles: [
            {
                "featureType": "all",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#975c16"
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            }
        ]
        };


        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        var infowindow = new google.maps.InfoWindow();

        function addLinksServices() {
		//	var locationsServices = [];
			var arrayInt = [];
			<?php if($list__map != ''){
								$count_map_2 = 0;
								echo "var locationsServices = [";
								?>
						
							<?php foreach($list__map as $list_map_item ) {
								$title_map_l = $list_map_item['title_map_l'] ? $list_map_item['title_map_l'] : ''; 
							    
								$post_map = $list_map_item['post_map'] ? $list_map_item['post_map'] : ''; 
								
					 
						
							  echo  '[new google.maps.LatLng('.$post_map.'), "", "'.$title_map_l.'"],';
						 
						$count_map_2++;
						} echo "];" ?>
								
						<?php
						} ?>

           for (var i = 0; i < locationsServices.length; i++) {
                // Append a link to the markers DIV for each marker
              /*   jQuery('#services ul').append('<li><a class="marker-link" data-markerid="' + i + '" href="#">' + locationsServices[i][1] + '</a></li>'); */

                var marker = new google.maps.Marker({
                    position: locationsServices[i][0],
                    map: map,
                    title: locationsServices[i][1],
                    icon: '<?php echo get_stylesheet_directory_uri(); ?>/images/marker-violet.png',
                });
                // marker.addListener('click', toggleBounce);
                // Register a click event listener on the marker to display the corresponding infowindow content
                google.maps.event.addListener(marker, 'click', (function (marker, i) {

                    return function () {
                        infowindow.setContent(locationsServices[i][2]);
                        infowindow.open(map, marker);
                        marker.setAnimation(google.maps.Animation.BOUNCE);
                        setTimeout(function(){ marker.setAnimation(null); }, 760);
                    }
                })(marker, i));
                // Add marker to markers array
                markers.push(marker);
            }
        }
        addLinksServices();
          


            // Trigger a click event on each marker when the corresponding marker link is clicked
			jQuery(".marker-link").click(function (e) {
				e.preventDefault();
                jQuery(".marker-link").removeClass("active");
				jQuery(this).addClass("active");
				
            });
            jQuery('#services .marker-link').on('click', function (e) {
				e.preventDefault();
				google.maps.event.trigger(markers[jQuery(this).data('markerid')], 'click');
				setTimeout(function(){  
				var target = jQuery("#map-find");
				var position = target.offset().top;
				jQuery("body, html").animate({
						scrollTop: position  
					} , 500 );
				}, 20); 
			});
		}

    </script>
 

 
<?php get_footer(); ?>