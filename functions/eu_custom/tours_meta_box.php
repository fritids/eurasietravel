<?php

// custom meta box for tour Listing
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category");


$meta_box_tour_info =
array(

	"miniprice" => array(
	"name" => "minprice",
	"type" => "input",
	"std" => "",
	"description" => "Enter only the minimum price for this tour. For example, 150 or 250 ..., if doesn't has just put only N/A",
	"title" => "<strong>Min. Price</strong>"),
	
	"tourcountry" => array(
	"name" => "tourcountry",
	"type" => "select",
	"std" => "",
	"title" => "<strong>Country</strong>",
	"options" => array('Cambodia', 'Vietnam', 'Laos', 'Myanmar', 'Thailand', 'Group Tours'),
	"description" => "Select Coutnry for this tour. (If multiples countries, please select Group Tours)",
	),
		
	"tourarea" => array(
	"name" => "tourarea",
	"type" => "input",
	"std" => "",
	"title"	=> "<strong>Destinations</strong>",
	"description" => "Please enter the area or city name for this tour. Ex: Phnom Penh, Siem Reap.",
	),
	
	"tourtype" => array(
	"name" => "tourtype",
	"type" => "tourtype_select",
	"std" => "",
	"title" => "<strong>Tour Type</strong>",	
	"description" => "Select Tour's type for this tour",
	),
	
	"images" => array(
	"name" => "images",
	"type" => "info",
	"title" => "<strong>Slideshow Image</strong>",
	"description" => "")

);

function meta_box_tour_info() {
global $post, $meta_box_tour_info;
	
	foreach($meta_box_tour_info as $meta_box) {
		
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		
		echo $meta_box['title'].'<br />';
		
		if( $meta_box['type'] == "input" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" size="55" /><br />';
			
		} elseif( $meta_box['type'] == "textarea" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<textarea name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" style="width:100%" cols="20" rows="7">'.$meta_box_value.'</textarea><br />';
			
		} elseif ( $meta_box['type'] == "tourcountry_select" ) {
			
			echo'<select name="'.$meta_box['name'].'_value">';
			
			$categories =  get_categories('taxonomy=countries_destination'); 
			  foreach ($categories as $category) {
				$countries = '<option value="' . $category->cat_name . '"';
				if ($category->cat_name == get_post_meta($post->ID, $meta_box['name'].'_value', true)) $countries .= "selected";
				$countries .= ">";
				$countries .= $category->cat_name;
				$countries .= '</option>';
				echo $countries;		
			  }
			
			echo'</select>';
			
		} elseif ( $meta_box['type'] == "tourtype_select" ) {
			
			echo'<select name="'.$meta_box['name'].'_value">';
			
			$categories =  get_categories('taxonomy=tour_type&hierarchical=0&hide_empty=0'); 
			  foreach ($categories as $category) {
				$countries = '<option value="' . $category->cat_name . '"';
				if ($category->cat_name == get_post_meta($post->ID, $meta_box['name'].'_value', true)) $countries .= "selected";
				$countries .= ">";
				$countries .= $category->cat_name;
				$countries .= '</option>';
				echo $countries;		
			  }
			
			echo'</select>';
			
		}/*elseif ($meta_box['type'] == "tourtype") {			
				
			$areas =  get_categories('taxonomy=tourtype&hide_empty=0'); 				
				foreach ($areas as $area) {					
					echo '<label>';
					echo '<input type="checkbox" name="'. $area->cat_name.' value="'. $area->cat_name. '"' ;
					if ($area == get_post_meta($post->ID, $area->cat_name, true) ) {
							echo ' checked="checked"'; 	
					} echo '/>';
					echo $area->cat_name;
					echo '</label>';
				}
		
		} */elseif ( $meta_box['type'] == "select" ) {
			
			echo'<select name="'.$meta_box['name'].'_value">';
			
			foreach ($meta_box['options'] as $option) {
                
				echo'<option';
				if ( get_post_meta($post->ID, $meta_box['name'].'_value', true) == $option ) { 
					echo ' selected="selected"'; 
				} elseif ( $option == $meta_box['std'] ) { 
					echo ' selected="selected"'; 
				} 
				echo'>'. $option .'</option>';
			
			}
			
			echo'</select>';
		} elseif ( $meta_box['type'] == "checkbox") {
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
				
			echo '<input type="checkbox" name="', $meta_box['name'], '_value"', $meta_box_value ? ' checked="checked"' : '', ' />';
			
		}elseif ($meta_box['type'] == "info") {					
		
			echo '<p><strong>Add your property images</strong> using the "Upload/Insert" button above the Price Tabel and Image Upload textbox.</p>';
		}
		
		
		echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
	}

}


function create_meta_box() {
global $theme_name, $meta_box_tour_minprice;
	if (function_exists('add_meta_box') ) {	
	add_meta_box( 'meta-box-tour-info', 'Tour information', 'meta_box_tour_info', 'tours', 'normal', 'high' );	
	}
}

function save_postdata( $post_id ) {
	global $post, $meta_box_tour_info;  
	
	foreach($meta_box_tour_info as $meta_box) {  
		
		// Verify  
		if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {  
		return $post_id;  
		}  
	
	if ( 'page' == $_POST['post_type'] ) {  
	if ( !current_user_can( 'edit_page', $post_id ))  
	return $post_id;  
	} else {  
	if ( !current_user_can( 'edit_post', $post_id ))  
	return $post_id;  
	}  
	
	$data = $_POST[$meta_box['name'].'_value'];  
	
	if(get_post_meta($post_id, $meta_box['name'].'_value') == "")  
	add_post_meta($post_id, $meta_box['name'].'_value', $data, true);  
	elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))  
	update_post_meta($post_id, $meta_box['name'].'_value', $data);  
	elseif($data == "")  
	delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));  
	}
	
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');



// create the Description meta box
$custom_desc_metabox = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_desc_meta',
	'title' => 'Short Description',
	'types' => array('tours'),
	'priority' => 'default',
	'template' => TEMPLATEPATH . '/functions/eu_custom/tour_desc_meta.php'
));



// create the list of date meta box
$custom_list_date_metabox = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_list_date_meta',
	'title' => 'List of Date for Group Tours',
	'types' => array('tours'),
	'priority' => 'default',
	'template' => TEMPLATEPATH . '/functions/eu_custom/tour_list_date_meta.php'
));


// create the Intenary meta box
$custom_price_table_metabox = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_price_table_meta',
	'title' => 'Prices Table',
	'types' => array('tours'),
	'priority' => 'default',
	'template' => TEMPLATEPATH . '/functions/eu_custom/tour_price_table_meta.php'
));

// create the stay in hotel type meta box
$custom_stay_hotel_metabox = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_stay_hotel_meta',
	'title' => 'Stay in Hotel',
	'types' => array('tours'),
	'priority' => 'default',
	'template' => TEMPLATEPATH . '/functions/eu_custom/stay_in_hotel_meta.php'
));


// create the highlights meta box
$custom_highlights_metabox = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_highlights_meta',
	'title' => 'Highlights',
	'types' => array('tours'),
	'priority' => 'default',
	'template' => TEMPLATEPATH . '/functions/eu_custom/tour_highlights_meta.php'
));

// create the tour includes and not includes meta box
$custom_cost_includes_metabox = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_cost_includes_meta',
	'title' => 'Cost Includes and Not Includes',
	'types' => array('tours'),
	'priority' => 'default',
	'template' => TEMPLATEPATH . '/functions/eu_custom/tour_includes_meta.php'
));
