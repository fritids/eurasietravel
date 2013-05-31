<?php

##  CUSTOM LOGO LOGIN
function my_custom_login_logo() {
    echo '<style type="text/css">
        .login h1 a { background-image:url('.get_bloginfo('template_directory').'/images/custom-login-logo.png)!important; height:157px!important; background-size: 310px 157px!important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

add_theme_support('post-thumbnails');
add_theme_support( 'automatic-feed-links' );

add_theme_support( 'menus' );
register_nav_menu('main', 'Main Navigation Menu');
register_nav_menu('footer', 'Footer Navigation Menu');
register_nav_menu('country', 'Left Navigation Menu');

require_once(TEMPLATEPATH . '/functions/theme-functions.php');

add_action('init', 'tour_listing');
add_action('init', 'hotel_listing');
add_action('init', 'our_people');
add_action('init', 'embassies');

function tour_listing() { 
	$args = array(
		'description' => 'Tour Listing Post Type',
		'show_ui' => true,		
		'menu_position' => 4,
		'exclude_from_search' => true,
		'labels' => array(
			'name'=> 'Tour Listings',
			'singular_name' => 'Tour Listing',
			'add_new' => 'And New Tour Listing',
			'add_new' => 'Add New Tour Listing', 
			'add_new_item' => 'Add New Tour Listing',
			'edit' => 'Edit Listings',
			'edit_item' => 'Edit Tour Listing',
			'new-item' => 'New Tour Listing',
			'view' => 'View Tour Listing',
			'view_item' => 'View Tour Listing',
			'search_items' => 'Search Tour Listings',
			'not_found' => 'No Tour Listings Found',
			'not_found_in_trash' => 'No Tour Listings Found in Trash',
			'parent' => 'Parent Listing'
			
		),
		'public' => true,
		//'taxonomies' => array('tourtype'),
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,		
		'show_in_nav_menus' => false,		
		'supports' => array('title', 'editor'),
		'menu_icon' => get_stylesheet_directory_uri() . '/images/admin_icon.png',		
		
	);

	register_post_type( 'tours' , $args );
}

function hotel_listing() {
	$args = array(
		'description' => 'Hotel Listing Post Type',
		'show_ui' => true,
		'menu_position' => 5,
		'exclude_from_search' => true,
		'labels' => array(
			'name'=> 'Hotel Listings',
			'singular_name' => 'Hotel Listing',
			'add_new' => 'And New Hotel Listing',
			'add_new' => 'Add New Hotel Listing', 
			'add_new_item' => 'Add Hotel New Listing',
			'edit' => 'Edit Hotel Listings',
			'edit_item' => 'Edit Hotel Listing',
			'new-item' => 'New Listing',
			'view' => 'View Hotel Listing',
			'view_item' => 'View Hotel Listing',
			'search_items' => 'Search Hotel Listings',
			'not_found' => 'No Hotel Listings Found',
			'not_found_in_trash' => 'No Hotel Listings Found in Trash',
			'parent' => 'Parent Listing'
			
		),		
		'public' => true,
		//'taxonomies' => array('Hoteltype'),
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,
		'show_in_nav_menus' => false,
		'supports' => array('title', 'editor'),
		'menu_icon' => get_stylesheet_directory_uri() . '/images/admin_icon.png',
		
		
	);

	register_post_type( 'hotels' , $args );
}


function our_people() { 
	$args = array(
		'description' => 'Our People Post Type',
		'show_ui' => true,
		'menu_position' => 6,
		'exclude_from_search' => true,
		'labels' => array(
			'name'=> 'Our People',
			'singular_name' => 'Our People',
			'add_new' => 'And New People',
			'add_new' => 'Add New People', 
			'add_new_item' => 'Add New People',
			'edit' => 'Edit People',
			'edit_item' => 'Edit People',
			'new-item' => 'New People',
			'view' => 'View People',
			'view_item' => 'View People',
			'search_items' => 'Search People',
			'not_found' => 'No People Found',
			'not_found_in_trash' => 'No People Found in Trash',
			'parent' => 'Parent Listing'
			
		),
		'public' => true,
		//'taxonomies' => array('tourtype'),
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,		
		'show_in_nav_menus' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'author'),
		'menu_icon' => get_stylesheet_directory_uri() . '/images/admin_icon.png',		
		
	);

	register_post_type( 'people' , $args );
}

function embassies() { 
	$args = array(
		'description' => 'Embassies Post Type',
		'show_ui' => true,
		'menu_position' => 7,
		'exclude_from_search' => true,
		'labels' => array(
			'name'=> 'Embassies',
			'singular_name' => 'Embassies',
			'add_new' => 'And New Embassy',
			'add_new' => 'Add New Embassy', 
			'add_new_item' => 'Add New Embassy',
			'edit' => 'Edit Embassy',
			'edit_item' => 'Edit Embassy',
			'new-item' => 'New Embassy',
			'view' => 'View Embassy',
			'view_item' => 'View Embassy',
			'search_items' => 'Search Embassy',
			'not_found' => 'No Embassy Found',
			'not_found_in_trash' => 'No Embassy Found in Trash',
			'parent' => 'Parent Listing'
			
		),
		'public' => true,
		//'taxonomies' => array('tourtype'),
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,		
		'show_in_nav_menus' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'author'),
		'menu_icon' => get_stylesheet_directory_uri() . '/images/admin_icon.png',		
		
	);

	register_post_type( 'embassy' , $args );
}


// custom taxonomies for Embassy

add_action('init', 'embassies_taxonomies');
function embassies_taxonomies() {
	register_taxonomy('embassies_area',
			'embassy',
			array (
			'labels' => array (
					'name' => 'Embassy Area',
					'singluar_name' => 'Embassy Area',
					'search_items' => 'Search Embassy Area',
					'popular_items' => 'Popular Embassy Area',
					'all_itmes' => 'All Embassy Area',
					'parent_item' => 'Parent Embassy Area',
					'parent_item_colon' => 'Parent Embassy Area',
					'edit_item' => 'Edit Embassy Area',
					'update_item' => 'Update Embassy Area',
					'add_new_item' => 'Add New Embassy Area',
					'new_item_name' => 'New Embassy Area',
					'separate_items_with_commas' => 'Separate Embassy Area with commas',
					'add_or_remove_items' => 'Add or remove Embassy Area',
					'choose_from_most_used' => 'Choose from the most used Embassy Area',
					'menu_name' => 'Embassy Area',
			),
					'hierarchical' =>true,
					'label' => "Embassy Area",
					'singular_label' => "Embassy Category",
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => false,
					'show_in_nav_menus' => false,
					'query_var' => true,
					'public'=>true)
			);
			
}

// custom taxonomies for People Area

add_action('init', 'people_area_taxonomies');
function people_area_taxonomies() {
	register_taxonomy('people_area',
			'people',
			array (
			'labels' => array (
					'name' => 'People Area',
					'singluar_name' => 'People Area',
					'search_items' => 'Search People Area',
					'popular_items' => 'Popular People Area',
					'all_itmes' => 'All People Area',
					'parent_item' => 'Parent People Area',
					'parent_item_colon' => 'Parent People Area',
					'edit_item' => 'Edit People Area',
					'update_item' => 'Update People Area',
					'add_new_item' => 'Add New People Area',
					'new_item_name' => 'New People Area',
					'separate_items_with_commas' => 'Separate People Area with commas',
					'add_or_remove_items' => 'Add or remove People Area',
					'choose_from_most_used' => 'Choose from the most used People Area',
					'menu_name' => 'People Area',
			),
					'hierarchical' =>true,
					'label' => "People Area",
					'singular_label' => "People Category",
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => false,
					'show_in_nav_menus' => false,
					'query_var' => true,
					'public'=>true)
			);
			
}


// custom taxonomies for Tour Listing

add_action('init', 'countries_destination_taxonomies');
function countries_destination_taxonomies() {
	register_taxonomy('countries_destination',
			'tours',
			array (
			'labels' => array (
					'name' => 'Countries Destination',
					'singluar_name' => 'Countries Destination',
					'search_items' => 'Search Countries Destination',
					'popular_items' => 'Popular Countries Destination',
					'all_itmes' => 'All Countries Destination',
					'parent_item' => 'Parent Countries Destination',
					'parent_item_colon' => 'Parent Countries Destination',
					'edit_item' => 'Edit Countries Destination',
					'update_item' => 'Update Countries Destination',
					'add_new_item' => 'Add New Countries Destination',
					'new_item_name' => 'New Countries Destination',
					'separate_items_with_commas' => 'Separate Countries with commas',
					'add_or_remove_items' => 'Add or remove Countries',
					'choose_from_most_used' => 'Choose from the most used Countries',
					'menu_name' => 'Countries Destination',
			),
					'hierarchical' =>true,
					'label' => "Countries Destination",
					'singular_label' => "Countries Category",
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => false,	
					'show_in_nav_menus' => false,				
					'query_var' => true,
					'public'=>true)
			);
			
}


add_action('init', 'tour_type_taxonomies');
function tour_type_taxonomies() {
	register_taxonomy('tour_type',
			'tours',
			array (
			'labels' => array (
					'name' => 'Tour Type',
					'singluar_name' => 'Tour Type',
					'search_items' => 'Search Tour Type',
					'popular_items' => 'Popular Tour Types',
					'all_items' => 'All Tour Types',
					'parent_item' => 'Parent Tour Type',
					'parent_item_colon' => 'Parent Tour Type',
					'edit_item' => 'Edit Tour Type',
					'update_item' => 'Update Tour Type',
					'add_new_item' => 'Add New Tour Type',
					'new_item_name' => 'New Tour Type',
			),
					'hierarchical' =>true,
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => false,
					'show_in_nav_menus' => false,
					'public'=>true)
			);
}

add_action('init', 'tour_pricerange_taxonomies');
function tour_pricerange_taxonomies() {
	register_taxonomy('tour_pricerange',
			'tours',
			array (
			'labels' => array (
					'name' => 'Tour Price Range',
					'singluar_name' => 'Tour Price Range',
					'search_items' => 'Search Tour Price Range',
					'popular_items' => 'Popular Tour Price Range',
					'all_itmes' => 'All Tour Price Range',
					'parent_item' => 'Parent Tour Price Range',
					'parent_item_colon' => 'Parent Tour Price Range',
					'edit_item' => 'Edit Tour Price Range',
					'update_item' => 'Update Tour Price Range',
					'add_new_item' => 'Add New Tour Price Range',
					'new_item_name' => 'New Tour Price Range',
			),
					'hierarchical' =>true,
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => false,
					'show_in_nav_menus' => false,
					'public'=>true)
			);
}

add_action('init', 'tour_top_taxonomies');
function tour_top_taxonomies() {
	register_taxonomy('tour_top',
			'tours',
			array (
			'labels' => array (
					'name' => '6 Top Tour',
					'singluar_name' => '6 Top Tour',
					'search_items' => 'Search 6 Top Tour',
					'popular_items' => 'Popular 6 Top Tour',
					'all_itmes' => 'All 6 Top Tour',
					'parent_item' => 'Parent 6 Top Tour',
					'parent_item_colon' => 'Parent 6 Top Tour',
					'edit_item' => 'Edit 6 Top Tour',
					'update_item' => 'Update 6 Top Tour',
					'add_new_item' => 'Add 6 Top Tour Country',
					'new_item_name' => 'New 6 Top Tour',
			),
					'hierarchical' =>true,
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => false,
					'show_in_nav_menus' => false,
					'public'=>true)
			);
}


add_action('init', 'tour_slider_taxonomies');
function tour_slider_taxonomies() {
	register_taxonomy('tour_slider',
			'tours',
			array (
			'labels' => array (
					'name' => 'Tour Slider',
					'singluar_name' => 'Tour Slider',
					'search_items' => 'Search Tour Slider',
					'popular_items' => 'Popular Tour Slider',
					'all_itmes' => 'All Tour Slider',
					'parent_item' => 'Parent Tour Slider',
					'parent_item_colon' => 'Parent Tour Slider',
					'edit_item' => 'Edit Tour Slider',
					'update_item' => 'Update Tour Slider',
					'add_new_item' => 'Add New Tour Slider in',
					'new_item_name' => 'New Tour Slider',
			),
					'hierarchical' =>true,
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => false,
					'show_in_nav_menus' => false,
					'public'=>true)
			);
}


// custom taxonomies for Hotel Listing

add_action('init', 'hotel_countries_taxonomies');
function hotel_countries_taxonomies() {
	register_taxonomy('hotel_countries',
			'hotels',
			array (
			'labels' => array (
					'name' => 'Hotel Countries',
					'singluar_name' => 'Hotel Countries',
					'search_items' => 'Search Hotel Countries',
					'popular_items' => 'Popular Hotel Countries',
					'all_itmes' => 'All Hotel Countries',
					'parent_item' => 'Parent Hotel Countries',
					'parent_item_colon' => 'Parent Hotel Countries',
					'edit_item' => 'Edit Hotel Countries',
					'update_item' => 'Update Hotel Countries',
					'add_new_item' => 'Add New Hotel Countries',
					'new_item_name' => 'New Hotel Countries',
			),
					'hierarchical' =>true,
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => false,
					'show_in_nav_menus' => false,
					'public'=>true)
			);
}


add_action('init', 'hotel_type_taxonomies');
function hotel_type_taxonomies() {
	register_taxonomy('hotel_type',
			'hotels',
			array (
			'labels' => array (
					'name' => 'Hotel Type',
					'singluar_name' => 'Hotel Type',
					'search_items' => 'Search Hotel Type',
					'popular_items' => 'Popular Hotel Types',
					'all_items' => 'All Hotel Types',
					'parent_item' => 'Parent Hotel Type',
					'parent_item_colon' => 'Parent Hotel Type',
					'edit_item' => 'Edit Hotel Type',
					'update_item' => 'Update Hotel Type',
					'add_new_item' => 'Add New Hotel Type',
					'new_item_name' => 'New Hotel Type',
			),
					'hierarchical' =>true,
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => false,
					'show_in_nav_menus' => false,
					'public'=>true)
			);
}

add_action('init', 'hotel_pricerange_taxonomies');
function hotel_pricerange_taxonomies() {
	register_taxonomy('hotel_pricerange',
			'hotels',
			array (
			'labels' => array (
					'name' => 'Hotel Price Range',
					'singluar_name' => 'Hotel Price Range',
					'search_items' => 'Search Hotel Price Range',
					'popular_items' => 'Popular Hotel Price Range',
					'all_itmes' => 'All Hotel Price Range',
					'parent_item' => 'Parent Hotel Price Range',
					'parent_item_colon' => 'Parent Hotel Price Range',
					'edit_item' => 'Edit Hotel Price Range',
					'update_item' => 'Update Hotel Price Range',
					'add_new_item' => 'Add New Hotel Price Range',
					'new_item_name' => 'New Hotel Price Range',
			),
					'hierarchical' =>true,
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => false,
					'show_in_nav_menus' => false,
					'public'=>true)
			);
}


add_action('init', 'hotel_top_taxonomies');
function hotel_top_taxonomies() {
	register_taxonomy('hotel_top',
			'hotels',
			array (
			'labels' => array (
					'name' => '3 Top Hotel',
					'singluar_name' => '3 Top Hotel',
					'search_items' => 'Search 3 Top Hotel',
					'popular_items' => 'Popular 3 Top Hotel',
					'all_itmes' => 'All Hotel 3 Top Hotel',
					'parent_item' => 'Parent 3 Top Hotel',
					'parent_item_colon' => 'Parent 3 Top Hotel',
					'edit_item' => 'Edit 3 Top Hotel',
					'update_item' => 'Update 3 Top Hotel',
					'add_new_item' => 'Add 3 Top Hotel Country',
					'new_item_name' => 'New 3 Top Hotel',
			),
					'hierarchical' =>true,
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => false,
					'show_in_nav_menus' => false,
					'public'=>true)
			);
}



## CREATE COUNTRIES PAGE TYPE CUSTOM META BOXES

add_action('save_post', 'o_save_country_select');
add_action('add_meta_boxes', 'o_add_country_select_box');

function o_add_country_select_box(){
	add_meta_box('o_work_select', "Select Country Options", 'o_country_select_meta_box', 'page', 'normal', 'high');
}

function o_country_select_meta_box(){
	wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

	$custom_fields = get_post_custom_values('_wp_page_template', $_GET['post']);
	$page_template = $custom_fields[0];
	
	?>
	
	<div style="padding: 0px 20px 0px 20px;">
	
	<?php
	
	if ($page_template == "tpl_country.php") {
	
	echo '<h2>Choose the Country you wish to display.</h2>';
	
	$country_check = get_post_meta($_GET['post'], 'o_country_select', 23231);
	
	?>
	
	<select name="o_country_select" style="width: 99%;"> 
	 <option value="">Select a Country...</option> 
     <?php 								
		$country_page = array('Cambodia', 'Vietnam', 'Laos', 'Myanmar', 'Thailand', 'Group Tours');
											
		foreach ($country_page as $country) {										
			$option= '<option value="'.$country.'"';
			if ($country == $country_check) $option .= "selected";
			$option.= '>';
			$option.= $country;
			$option.='</option>'; 
			echo $option;
		}									
	?>
	</select>
    <?php
    } else {

	echo '<h2>Choose from one of the page templates in order to display one.</h2>';

	}
	?>
	
	</div>
	<?php 
}


function o_save_country_select ($post_id) {

 if ( !wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) {
    return $post_id;
  }

  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return $post_id;
  }
  
  $p_country_select = $_POST['o_country_select'];
    
  $custom_fields = get_post_custom_values('_wp_page_template', $_GET['post']);
  $page_template = $custom_fields[0];
  
  update_post_meta($post_id, 'o_country_select', $p_country_select);
  
  return;
    
}

// lets use the WPAlchemy helper
include_once TEMPLATEPATH . '/WPAlchemy/MetaBox.php';
 
// custom constant (opposite of TEMPLATEPATH)
define('_TEMPLATEURL',WP_CONTENT_URL . '/themes/' . basename(TEMPLATEPATH));
 
// custom css for our meta boxes
if (is_admin()) :
	wp_enqueue_style('custom_meta_css',_TEMPLATEURL . '/functions/custom/meta.css');
	
	// use for select datepicker in Admin page
	/*wp_enqueue_style('datepicker_css',_TEMPLATEURL . '/styles/datepicker.css');
	
	wp_enqueue_script('datepicker_date',_TEMPLATEURL . '/js/datepicker.js');
	wp_enqueue_script('eye_date',_TEMPLATEURL . '/js/eye.js');
	wp_enqueue_script('utils_date',_TEMPLATEURL . '/js/utils.js');
	wp_enqueue_script('layout_date',_TEMPLATEURL . '/js/layout.js?ver=1.0.2');*/
	
endif; 

// custom post type 'TOUR' Meta box
include_once TEMPLATEPATH . '/functions/eu_custom/tours_meta_box.php';

// custom post type 'HOTEL' Meta box
include_once TEMPLATEPATH . '/functions/eu_custom/hotels_meta_box.php';

// custom post type 'PEOPLE' Meta box
include_once TEMPLATEPATH . '/functions/eu_custom/people_info_meta_box.php';
 
// important: note the priority of 99, the js needs to be placed after tinymce loads
add_action('admin_print_footer_scripts','my_admin_print_footer_scripts',99);
function my_admin_print_footer_scripts()
{
	?><script type="text/javascript">/* <![CDATA[ */
		jQuery(function($)
		{
			var i=1;
			$('.customEditor textarea').each(function(e)
			{
				var id = $(this).attr('id');
 
				if (!id)
				{
					id = 'customEditor-' + i++;
					$(this).attr('id',id);
				}
 
				tinyMCE.execCommand('mceAddControl', false, id);
 
			});
		});
	/* ]]> */</script>	
	<?php
}


// SHORT CODES (Columns)
 
add_shortcode("single_day", "single_day");
 
function single_day($atts, $content = null) {
	return "<div class='single-day'>".$content."</div>";
}


// enable widgets
if ( function_exists('register_sidebar') ) {

register_sidebar(array('name'=>'Left Sidebar',
	'before_widget' => "<div class='sidebarwidget'>",
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3 >',
));
}


//Hide the WordPress Upgrade Message in the Dashboard
add_action('admin_menu','wphidenag');
function wphidenag() {
remove_action( 'admin_notices', 'update_nag', 3 );
}


//limited the character
	function limit_word($desc, $num){
		$max_len = $num;
		$len_title = strlen($desc);
		if ($len_title >= $max_len) {
			echo substr($desc, 0, $max_len) . '...'; 
		} else {
			echo $desc;
		}
		
	}
	
	
//Reposition the Editor
add_action('admin_init','admin_init_hook');
function admin_init_hook()
{
	function blank(){}
 
	foreach (array('tours', 'hotels') as $type)
	{
		if($type == 'tours')
		add_meta_box('custom_editor', 'Intenary and Images Upload', 'blank', $type, 'normal', 'high');
		
		if($type == 'hotels')
		add_meta_box('custom_editor', ' Facilities and Services', 'blank', $type, 'normal', 'high');
	}
}

add_action('admin_head','admin_head_hook');
function admin_head_hook()
{
	?><style type="text/css">
		#postdiv.postarea, #postdivrich.postarea { margin:0 0 20px; }
		#post-status-info { line-height:1.4em; font-size:13px; }
		#custom_editor .inside { margin:2px 6px 6px 6px; }
		#ed_toolbar { display:none; }
		#postdiv #ed_toolbar, #postdivrich #ed_toolbar { display:block; }
		#meta-box-hotel-info label{margin-bottom:20px; display:block;}
	</style><?php
}
 
add_action('admin_footer','admin_footer_hook');
function admin_footer_hook()
{
	?><script type="text/javascript">
		jQuery('#postdiv, #postdivrich').prependTo('#custom_editor .inside');
	</script><?php
}

##   REMOVE WORDPRESS VERSION GENERATION   
function remove_version_info() {
     return '';
}
add_filter('the_generator', 'remove_version_info'); 

function remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
	//$wp_admin_bar->remove_menu('my-account');
	$wp_admin_bar->remove_menu('updates');
	$wp_admin_bar->remove_menu('appearance');
	$wp_admin_bar->remove_menu('new-link', 'new-content');
	$wp_admin_bar->remove_menu('new-post', 'new-content');
	$wp_admin_bar->remove_menu('new-page', 'new-content');
	$wp_admin_bar->remove_menu('new-user', 'new-content');
	$wp_admin_bar->remove_menu('new-theme', 'new-content');
	$wp_admin_bar->remove_menu('new-plugin', 'new-content');
	$wp_admin_bar->remove_menu('new-media', 'new-content');
	
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('about');
	$wp_admin_bar->remove_menu('wporg');
	$wp_admin_bar->remove_menu('documentation');
	$wp_admin_bar->remove_menu('support-forums');
	$wp_admin_bar->remove_menu('feedback');
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );


##  REMOVE ERROR MESSAGE LOGIN
add_filter('login_errors',create_function('$a', "return null;"));


##   REMOVE WORDPRESS LINK ON ADMIN LOGIN LOGO 
function remove_link_on_admin_login_info() {
     return  get_bloginfo('url');
}
  
add_filter('login_headerurl', 'remove_link_on_admin_login_info');


##   SET FAVICONS FOR BACKEND CODE 
function adminfavicon() {
echo '<link rel="icon" type="image/x-icon" href="'.get_bloginfo('template_directory').'/favicon.png" />';
}

add_action( 'admin_head', 'adminfavicon' );

## Add Post Thumbnails to RSS Feeds

function rss_post_thumbnail($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
	$content = '<p>' . get_the_post_thumbnail($post->ID) .
	'</p>' . get_the_content();
	}
	return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');


?>