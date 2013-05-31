<?php

add_theme_support( 'post-thumbnails', array( 'post'));
add_image_size( 'large', 665, 200, true );

add_theme_support( 'menus' );
register_nav_menu('main', 'Main Navigation Menu');
register_nav_menu('footer', 'Footer Navigation Menu');

require_once(TEMPLATEPATH . '/functions/theme-functions.php');

add_action('init', 'tour_listing');
add_action('init', 'hotel_listing');

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
		'supports' => array('title', 'editor', 'thumbnail')
		
	);

	register_post_type( 'tours' , $args );
}

function hotel_listing() {
	$args = array(
		'description' => 'Hotel Listing Post Type',
		'show_ui' => true,
		'menu_position' => 4,
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
		'supports' => array('title', 'editor', 'thumbnail')
		
	);

	register_post_type( 'hotels' , $args );
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
					'show_in_nav_menus' => true,
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
					'public'=>true)
			);
}



// lets use the WPAlchemy helper
include_once TEMPLATEPATH . '/WPAlchemy/MetaBox.php';
 
// custom constant (opposite of TEMPLATEPATH)
define('_TEMPLATEURL',WP_CONTENT_URL . '/themes/' . basename(TEMPLATEPATH));
 
// custom css for our meta boxes
if (is_admin()) wp_enqueue_style('custom_meta_css',_TEMPLATEURL . '/functions/custom/meta.css');
 
// create the meta box
$custom_intenary_metabox = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_intenary_meta',
	'title' => 'Intenary',
	'types' => array('tours'),
	'template' => TEMPLATEPATH . '/functions/custom/meta.php'
));
 
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



// enable widgets
if ( function_exists('register_sidebar') ) {

register_sidebar(array('name'=>'Left Sidebar',
	'before_widget' => "<div class='sidebarwidget'>",
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3 >',
));
}


//Reposition the Editor

/*add_action('admin_init','admin_init_hook');
function admin_init_hook()
{
	function blank(){}
 
	foreach (array('page','post','tours') as $type)
	{
		add_meta_box('custom_editor', 'Highligh', 'blank', $type, 'normal', 'high');
	}
}
 
add_action('admin_head','admin_head_hook');
function admin_head_hook()
{
	?><style type="text/css">
		#postdiv.postarea, #postdivrich.postarea { margin:0; }
		#post-status-info { line-height:1.4em; font-size:13px; }
		#custom_editor .inside { margin:2px 6px 6px 6px; }
		#ed_toolbar { display:none; }
		#postdiv #ed_toolbar, #postdivrich #ed_toolbar { display:block; }
	</style><?php
}
 
add_action('admin_footer','admin_footer_hook');
function admin_footer_hook()
{
	?><script type="text/javascript">
		jQuery('#postdiv, #postdivrich').prependTo('#custom_editor .inside');
	</script><?php
}*/

?>


