<?php 

$meta_box_hotel_info =
array(

	"hotelwifi" => array(
  	"name" => "hotelwifi",
	"type" => "select",
	"std" => "",
	"title" => "<strong>Wifi</strong>",
	"options" => array('No', 'Free', 'Charge'),
	"description" => "There are wifi in this hotel? if yes, please select Free or Charge. if no, please select No",
	),
	
	"address" => array(
	"name" => "address",
	"type" => "input",
	"std" => "",
	"description" => "Enter the full address (e.g: No. 1, Street 92, Sangkat Wat Phnom, P.O Box 633, Phnom Penh 12202)",
	"title" => "<strong>Hotel Address</strong>"),
	
	"hotelminiprice" => array(
	"name" => "hotelminprice",
	"type" => "input",
	"std" => "",
	"description" => "Enter the minimum for this hotel. For example, 150 or 250 ...",
	"title" => "<strong>Hotel Min. Price</strong>"),
	
	"numberofroom" => array(
	"name" => "numberofroom",
	"type" => "input",
	"std" => "",
	"description" => "Enter how many room in this hotel (e.g: 300)",
	"title" => "<strong>Number of room</strong>"),
	
	"hotelcountry" => array(
	"name" => "hotelcountry",
	"type" => "select",
	"std" => "",
	"title" => "<strong>Country</strong>",
	"options" => array('Cambodia', 'Vietnam', 'Laos', 'Myanmar', 'Thailand', 'Group Tours'),
	"description" => "Select Coutnry for this hotel",
	),
		
	/*"areaofhotel" => array(
	"name" => "areaofhotel",
	"type" => "hotelarea",
	"std" => "",
	"title"	=> "<strong>Hotel Area</strong>",
	"description" => "Select Hotel's area",
	),*/

	"hotelarea" => array(
	"name" => "hotelarea",
	"type" => "input",
	"std" => "",
	"title"	=> "<strong>Hotel Area</strong>",
	"description" => "Select Hotel's area",
	),	
	
	"hoteltype" => array(
	"name" => "hoteltype",
	"type" => "hoteltype",
	"std" => "",
	"title" => "<strong>Hotel Type</strong>",
	"description" => "Select Hotel's type",
	),
	
	"images" => array(
	"name" => "images",
	"type" => "info",
	"title" => "<strong>Slideshow Image</strong>",
	"description" => "")

);


$meta_box_hotel_map =
array(
	"hotelmap" => array(
	"name" => "hotelmap",
	"type" => "map",
	"title" => "<strong>Set Location for this hotel</strong>",
	"description" => "Just drag the marker to the right location."),	
	"latitude" => array(
	"name" => "latitude",
	"type" => "input",
	"std" => "",
	"title"	=> "<strong>Latitude</strong>",
	"description" => "Optional",
	),
	"longitude" => array(
	"name" => "longitude",
	"type" => "input",
	"std" => "",
	"title"	=> "<strong>Longitude</strong>",
	"description" => "Optional",
	)
	
);

function meta_box_hotel_info() {
global $post, $meta_box_hotel_info;
	
	foreach($meta_box_hotel_info as $meta_box) {
		
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
			
		} elseif ( $meta_box['type'] == "hotelcountry" ) {
			
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
			
		} elseif ($meta_box['type'] == "hotelarea") {	
		
			echo'<select name="'.$meta_box['name'].'_value">';		
				
			$areas =  get_categories('taxonomy=countries_destination&hide_empty=0&child_of=3'); 				
				foreach ($areas as $area) {					
					$hotelprovince = '<option value="' . $area->cat_name . '"';
					if ($area->cat_name == get_post_meta($post->ID, $meta_box['name'].'_value', true)) $hotelprovince .= "selected";
					$hotelprovince .= ">";
					$hotelprovince .= $area->cat_name;
					$hotelprovince .= '</option>';
					echo $hotelprovince;
				}
			echo'</select>';	
		
		} elseif ($meta_box['type'] == "hoteltype") {	
		
			echo'<select name="'.$meta_box['name'].'_value">';		
				 
			$hoteltypes =  get_categories('taxonomy=hotel_type&hide_empty=0'); 				
				foreach ($hoteltypes as $hoteltype) {					
					$typeofhotel = '<option value="' . $hoteltype->category_nicename . '"';
					if ($hoteltype->category_nicename == get_post_meta($post->ID, $meta_box['name'].'_value', true)) $typeofhotel .= "selected";
					$typeofhotel .= ">";
					$typeofhotel .= $hoteltype->cat_name;
					$typeofhotel .= '</option>';
					echo $typeofhotel;
				}
			echo'</select>';	
		 
		} elseif ( $meta_box['type'] == "select" ) {
			
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
		
			echo '<p><strong>Add your property images</strong> using the "Upload/Insert" button above the hotel facilities textbox.</p>';
		}
		
		
		echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
	}

}

function create_hotel_meta_box() {
global $theme_name, $meta_box_hotel_info;
	if (function_exists('add_meta_box') ) {	
	add_meta_box( 'meta-box-hotel-info', 'Hotel information', 'meta_box_hotel_info', 'hotels', 'normal', 'high' );	
	}
}

function save_hoteldata( $post_id ) {
	global $post, $meta_box_hotel_info;  
	
	foreach($meta_box_hotel_info as $meta_box) {  
		
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

add_action('admin_menu', 'create_hotel_meta_box');
add_action('save_post', 'save_hoteldata');


//Create Hotel Map Metabox
function meta_box_hotel_map(){
	global $post, $meta_box_hotel_map;
	
	foreach($meta_box_hotel_map as $meta_box) {
		
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';				
		echo $meta_box['title'].'<br />';
	
		if( $meta_box['type'] == "input" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<input type="text" id ="'.$meta_box['name'].'" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" size="55" /><br />';
			
		}elseif( $meta_box['type'] == "map" ) {
		?>
        	<div class="nova_input nova_maps">
                
                <script type="text/javascript"
							src="http://maps.google.com/maps/api/js?sensor=false">
						</script>
						<script type="text/javascript">						 
						  
						  jQuery(document).ready(function ($)
							{
								var lat = <?php if ( get_post_meta($_GET['post'], 'latitude_value', 12346) != ""){ echo stripslashes(get_post_meta($_GET['post'], 'latitude_value', 12346)); } else { echo '11.572473'; }?>;
								var lng = <?php if ( get_post_meta($_GET['post'], 'longitude_value', 12346) != ""){ echo stripslashes(get_post_meta($_GET['post'], 'longitude_value', 12346)); } else { echo '104.923296'; }?>;								
					  
								var myLatlng = new google.maps.LatLng(lat,lng);
								var myOptions = {							  
								  zoom: 12,
								  center: myLatlng,
								  mapTypeId: google.maps.MapTypeId.ROADMAP
								}
								var map = new google.maps.Map(document.getElementById("map"), myOptions);
								
								var marker = new google.maps.Marker({
									position: myLatlng, 
									draggable:true,
									map: map,
									animation: google.maps.Animation.DROP
								});
								
								google.maps.event.addListener(marker, 'dragend', function() {
									myLatlng = marker.getPosition();
									//location.hash = "#lat=" + point.lat() + "&lng=" + point.lng();			
									jQuery('#latitude').attr('value', fix6ToString(myLatlng.lat()));
									jQuery('#longitude').attr('value', fix6ToString(myLatlng.lng()));									
								});
								
								function fix6ToString(n) {
									return n.toFixed(6).toString();
								}  
							});
						</script>
                
                
                <div id="map"></div>                
                <style media="screen"type="text/css">#map { width:700px; height:360px; margin-top:5px; }</style>
                                
            </div>
        <?php 	
		}
		
		echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
	}	
}

function create_hotel_map_meta_box() {
global $theme_name, $meta_box_hotel_map;
	if (function_exists('add_meta_box') ) {	
	add_meta_box( 'meta-box-hotel-map', 'Hotel Map', 'meta_box_hotel_map', 'hotels', 'normal', 'high' );	
	}
}

function save_hotelmap( $post_id ) {
	global $post, $meta_box_hotel_map;  
	
	foreach($meta_box_hotel_map as $meta_box) {  
		
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

add_action('admin_menu', 'create_hotel_map_meta_box');
add_action('save_post', 'save_hotelmap');





// create Hotel Overview meta box
$custom_overview_metabox = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_overview_meta',
	'title' => 'Overview',
	'types' => array('hotels'),
	'priority' => 'high',
	'template' => TEMPLATEPATH . '/functions/eu_custom/hotel_overview_meta.php'
));


// create Hotel Price meta box
$custom_hotel_price_metabox = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_hotel_price_meta',
	'title' => 'Room Rates',
	'types' => array('hotels'),
	'priority' => 'high',
	'template' => TEMPLATEPATH . '/functions/eu_custom/hotel_price_meta.php'
));
