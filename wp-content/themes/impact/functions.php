<?php

define( 'CHILD_THEME_VERSION', '4.1.9' );

require_once('wp_bootstrap_navwalker.php');

/*--add-side-bar-widget--*/
if (function_exists('register_sidebar')) {
     register_sidebar(array(
      'name' => 'Sidebar Widgets',
      'id'   => 'sidebar-widgets',
      'description'   => 'Widget Area',
      'before_widget' => '<div id="one" class="two">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
     ));
}
/*--add-featured-image--*/

if (function_exists('add_theme_support')) {						
	add_theme_support( 'post-thumbnails' );	 // this adds in the Featured image support
	//set_post_thumbnail_size( 380, 260, true);
}
//the_post_thumbnail( 'thumbnail', array( 'class' => 'img-responsive' ) ); 
//add_image_size( 'single-post-thumbnail', 380, 260 );

// ADD CUSTOM NAVIGATION
add_theme_support( 'menus' );	

/*--remove-width-height-from-post-img--*/
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
/*--set-session--*/
add_action('init', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}

function myEndSession() {
    session_destroy ();
}
/*--limit_words--*/
function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}
/*---display-approve-comments-count--*/
add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']);
	}else {
		return $count;
	}
} 


/*--limit-words--*/
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
    } else {
    $excerpt = implode(" ",$excerpt);
    }	
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
    }
     
    function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
    } else {
    $content = implode(" ",$content);
    }	
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

/*--post-views--*/
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function theme_widgets_init() {

	/*--footer-sidebar--*/
	register_sidebar( array(
	'name' => 'Footer Sidebar 1',
	'id' => 'footer-sidebar-1',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'theme_widgets_init' );

// functions run on activation –> important flush to clear rewrites
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
$wp_rewrite->flush_rules();
}


function custom_pagination() {
                            global $wp_query;
                            $big = 999999999; // need an unlikely integer
                            $pages = paginate_links( array(
                                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                    'format' => '?paged=%#%',
                                    'current' => max( 1, get_query_var('paged') ),
                                    'total' => $wp_query->max_num_pages,
                                    'prev_next' => false,
                                    'type'  => 'array',
                                    'prev_next'   => TRUE,
                                    'prev_text'    => __('«'),
                                    'next_text'    => __('»'),
                                ) );
                                if( is_array( $pages ) ) {
                                    $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
                                    echo '<ul class="pagination">';
                                    foreach ( $pages as $page ) {
                                            echo "<li>$page</li>";
                                    }
                                   echo '</ul>';
                                }
   }


if(!get_option("medium_crop"))
    add_option("medium_crop", "1");
	else
    update_option("medium_crop", "1");
	if(!get_option("large_crop"))
    add_option("large_crop", "1");
	else
    update_option("large_crop", "1");	
    if( FALSE === get_option("thumbnail_large_size_w") )
	{
		
	add_option("featured_size_w", "400");
	add_option("featured_large_size_h", "325");
	add_option("featured_large_crop", "1");	
	
	add_option("thumbnail_large_size_w", "200");
	add_option("thumbnail_large_size_h", "200");
	add_option("thumbnail_large_crop", "1");	

	add_option("featuredleft_size_w", "400");
	add_option("featuredleft_size_h", "290");
	add_option("featuredleft_crop", "1");	
	}
	else
	{		
	
	update_option("featured_size_w", "400");
	update_option("featured_size_h", "325");
	update_option("featured_crop", "1");	
	
	update_option("thumbnail_large_size_w", "200");
	update_option("thumbnail_large_size_h", "200");
	update_option("thumbnail_large_crop", "1");	
	
	update_option("featuredleft_size_w", "400");
	update_option("featuredleft_size_h", "290");
	update_option("featuredleft_crop", "1");	
	}

function additional_image_sizes( $sizes ){
	$sizes[] = "featured";
	$sizes[] = "thumbnail_large";
	$sizes[] = "featuredleft";
	return $sizes;
	}
add_filter( 'intermediate_image_sizes', 'additional_image_sizes' );

add_action('after_setup_theme', 'remove_admin_bar');
	function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
    }
    

// HTML5 Blank navigation
function main_nav(){

	wp_nav_menu(
	array(
		'theme_location'  => '',
		'menu'            => 'Main menu',
		'container'       => 'div',
		'container_class' => 'collapse navbar-collapse topnavbar',
		'container_id'    => 'navbarTop',
		'menu_class'      => 'navbar-nav',
		'menu_id'         => '',
		'echo'            => true,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="navbar-nav">%3$s</ul>',
		'depth'           => 2,
		'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
		'walker'          => new wp_bootstrap_navwalker()
		)
	);
}

// Products Page and Product Detail
function custom_post_type() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Products', 'Post Type General Name', 'impact' ),
            'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'impact' ),
            'menu_name'           => __( 'Products', 'impact' ),
            'parent_item_colon'   => __( 'Parent Product', 'impact' ),
            'all_items'           => __( 'All Products', 'impact' ),
            'view_item'           => __( 'View Product', 'impact' ),
            'add_new_item'        => __( 'Add New Product', 'impact' ),
            'add_new'             => __( 'Add New', 'impact' ),
            'edit_item'           => __( 'Edit Product', 'impact' ),
            'update_item'         => __( 'Update Product', 'impact' ),
            'search_items'        => __( 'Search Product', 'impact' ),
            'not_found'           => __( 'Not Found', 'impact' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'impact' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'Products', 'impact' ),
            'description'         => __( 'Products', 'impact' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions' ),
    
            'taxonomies'          => array(),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 25,
            'menu_icon'           => 'dashicons-products',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        );
         
        register_post_type( 'product', $args );
     
    }
     

add_action( 'init', 'custom_post_type', 0 );



// Register Custom Taxonomy
function custom_taxonomy_product()  {

    $labels = array(
        'name'                       => 'Product Categories',
        'singular_name'              => 'Product Category',
        'menu_name'                  => 'Product Category',
        'all_items'                  => 'All Product Categories',
        'parent_item'                => 'Parent Product Category',
        'parent_item_colon'          => 'Parent Product Category:',
        'new_item_name'              => 'New Product Category Name',
        'add_new_item'               => 'Add New Product Category',
        'edit_item'                  => 'Edit Product Category',
        'update_item'                => 'Update Product Category',
        'separate_items_with_commas' => 'Separate Item with commas',
        'search_items'               => 'Search Product Categories',
        'add_or_remove_items'        => 'Add or remove Product Categories',
        'choose_from_most_used'      => 'Choose from the most used Product Categories',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'cat-prod', 'product', $args );
}

add_action( 'init', 'custom_taxonomy_product', 0 );

add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
function enqueue_load_fa() {

    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css' );

    wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/css/slick.css','', CHILD_THEME_VERSION);

    wp_enqueue_script( 'child-gps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC1BZVwoHBGy4Cj5vrRrQd9uSn0eHEa1JU&callback=initialize&extension=.js' , array(),'20201210', true );


}

// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);

//Add Widget for Custom Post Products
class products_widget extends WP_Widget {
    function __construct() {
        parent::__construct('products_widget', __('Products Custom Post', 'products_widget_domain'), array( 'description' => __( 'Products widget, list of taxonomy Prouducts', 'products_widget_domain' ),));
    }
      
    // Products Widget front-end
    public function widget( $args, $instance ) {
        ?><div class="content_product_widget"><?php 
        $title = "Product Categories:";
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
        
        echo $args['after_widget'];

        $terms = get_terms('cat-prod');
        if ( !empty( $terms ) && !is_wp_error( $terms ) ){
            echo "<ul>";
            foreach ( $terms as $term ) { ?>
                    <li><a href='<?php echo get_term_link($term); ?>'><?php echo $term->name; ?> </a></li><?php
            }
            echo "</ul>";
        }
        ?></div><?php
    }
              
    // Products Widget Backend 
    public function form( $instance ) {
        echo "List of a Products Custom Post";
        /*if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = __( 'New title', 'products_widget_domain' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Products Categories:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php */
    }
          
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}

function products_load_widget() {
    register_widget( 'products_widget' );
}
add_action( 'widgets_init', 'products_load_widget' );


function shortcode_accordion_text( $atts, $content = null ) {
     $a = shortcode_atts( array(
        'title' => 'Title',
        'link' => '',
        'taget' => 'self',
    ), $atts );
    return '<div><button class="accordion">'.$a['title'].'</button><div class="panel"><p>' . $content . '</p></div></div>';
}
add_shortcode( 'accordion', 'shortcode_accordion_text' );

/* Default Value Feature Products */
add_filter('acf/load_value/key=field_5fac509364435',  'acf_load_my_defaults', 10, 3);

function acf_load_my_defaults($value, $post_id, $field) {

  if ($value === false) {

    $value = array();

    $value[] = array(
      'field_5fac512264436' => 'Workflow Efficiency',
      'field_5fac514864437' => '<ul>
      <li>10.1" intuitive touchscreen with smartphone-like usability.</li>
      <li>A unique, customized experience tailored to individual preferences using My ADVANCE.</li>
      <li>Supports mobile solutions and integration with many popular cloud services like Google Drive.</li>
      <li>Scan and convert documents to searchable digital files in a variety of file formats.</li>
      <li>Integration with Canon and various third-party software with embedded application platform.</li>
      <li>Hot Folders allow users to drag and drop a file into a hot folder, and automatically print with predefined settings such as number of copies and finishing requirements.</li>
 </ul>'
    );
    $value[] = array(
      'field_5fac512264436' => 'Security',
      'field_5fac514864437' => '<ul>
      <li>Advanced standard security feature set to help safeguard sensitive information and assist in regulatory compliance.</li>
      <li>Integrates with existing, third-party Security Information and Event Management (SIEM) systems to help provide real-time comprehensive insights into potential threats to the network and printers.</li>
      <li>Technology to verify that the device boot process, firmware, and applications initialize at startup, without any alterations or tampering by malicious third parties. During operation, McAfee Embedded Control utilizes a whitelist to protect against malware and tampering of firmware and applications.</li>
      <li>Security policy settings can be controlled with a dedicated password, configured from a central location, and exported to other supported devices.</li>
      <li>Control aCess to the device and specific features, using a host of flexible authentication methods - PIN code, username/password, or card aCess.</li>
 </ul>'
    );
    $value[] = array(
      'field_5fac512264436' => 'Quality and Reliability',
      'field_5fac514864437' => '<ul>
      <li>Canon\'s signature reliability and engine technologies help keep productivity high and minimize the impact on support resources.</li>
      <li>Outstanding imaging technologies and toner allow for consistently striking images, thanks to Canon\'s V2 color profile.</li>
      <li>Designed to achieve maximum uptime with status notifications that help keep supplies replenished and intuitive maintenance videos for consumables replacement.</li>
      <li>imageRUNNER ADVANCE models have received many awards and recognition from leading industry analysts, often referencing strong reliability.</li>
 </ul>'
    );
    $value[] = array(
      'field_5fac512264436' => 'Device and Fleet Management',
      'field_5fac514864437' => '<ul>
      <li>Designed for quick, easy deployment.</li>
      <li>Remote diagnostics and parts life management for proactive maintenance and rapid fixes.</li>
      <li>Easy and intuitive to monitor device status and consumable levels, turn off devices remotely, observe meter readings, manage settings, and implement security policies.</li>
      <li>Common firmware and regular updates with Unified Firmware Platform (UFP) for continuous improvements and consistency across a fleet.</li>
 </ul>'
    );
    $value[] = array(
      'field_5fac512264436' => 'Cost Management',
      'field_5fac514864437' => '<ul>
      <li>Track and assess print, copy, scan, and fax usage and allocate costs to departments or projects.</li>
      <li>Apply print policies and restrict usage by user to help reduce unnecessary printing and contribute to cost efficiency.</li>
      <li>Standard cloud-based solution provides a centralized dashboard with up-to-the-minute insights into printer activity.</li>
      <li>Upgrade to uniFLOW server or cloud-based solutions for full aCounting and reporting for compatible Canon and third-party devices, pull printing, job routing, and powerful scan workflows.</li>
 </ul>'
    );
    $value[] = array(
      'field_5fac512264436' => 'Sustainability',
      'field_5fac514864437' => '<ul>
      <li>A combination of fusing technologies and low-melting-point toner minimizes power requirements and helps achieve low energy consumption.</li>
      <li>Encourage environmentally conscious work practices by enabling multiple settings that can help save paper and energy.</li>
      <li>ENERGY STAR® certified and rated EPEAT® Gold.</li>
 </ul>'
    );
  }

  return $value;
} 
