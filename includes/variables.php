<?php

/* Get all our options from the database */                    
	/*global $options;
	
	foreach ($options as $value) 
	{
		if (get_settings( $value['id'] ) === FALSE) 
		{ 
			$$value['id'] = $value['std'];
		} 
		else 
		{ 
			$$value['id'] = get_settings( $value['id'] ); 
		}
	}*/					
	
	
	//Tours meta option value
	$tourminiprice = get_post_meta($post->ID, "minprice_value", true);
	$tourarea = get_post_meta($post->ID, "tourarea_value", true);					
	$tourcode = get_post_meta($post->ID, "tourcode_value", true);
	$tourcountry = get_post_meta($post->ID, "tourcountry_value", true);
	$tourtype = get_post_meta($post->ID, "tourtype_value", true);
	
	//Hotel meat option value
	$hotelwifi = get_post_meta($post->ID, "hotelwifi_value", true);
	$hoteladdress = get_post_meta($post->ID, "address_value", true);
	$hotelrooms = get_post_meta($post->ID, "numberofroom_value", true);	
	$hotelminiprice = get_post_meta($post->ID, "hotelminprice_value", true);	
	$hotelcountry = get_post_meta($post->ID, "hotelcountry_value", true);
	$hotelarea = get_post_meta($post->ID, "hotelarea_value", true);					
	$hoteltype = get_post_meta($post->ID, "hoteltype_value", true);
	$hotellat = get_post_meta($post->ID, "latitude_value", true);
	$hotellng = get_post_meta($post->ID, "longitude_value", true);

?>