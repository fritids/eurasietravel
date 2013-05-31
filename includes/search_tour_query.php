<?php 
	//Query string of Tour and Hotel search
	
	$search_tour_type = trim($_GET['qtour_type']);	
	$search_tour_destination_area = trim($_GET['qdestination_area']);	
	$search_tour_minprice = trim($_GET['qminprice_tour']);		
	$search_tour_maxprice = trim($_GET['qmaxprice_tour']);		
	$search_tour_country = trim($_GET['c']);	
	
	$search_tour_query = trim($_GET['qtourquery']);
	
	/*$search_hotel_area = trim($_POST['hotel_area']);
	$search_hotel_type = trim($_POST['hotel_type']);
	$search_hotel_minprice = trim($_POST['minprice_hotel']);	
	$search_hotel_maxprice = trim($_POST['maxprice_hotel']);	
	$search_hotel_query = trim($_POST['hotelquery']);*/
	
?>

<?php
$metakey = 'minprice_value';
$orderby = 'name';
$order = 'desc';

if($search_tour_type == '0' && $search_tour_destination_area == '0' && $search_tour_minprice == '0' && $search_tour_maxprice == '0' && $search_tour_country == ''){
	$all_tour_listings = true;
}

$_ids = array();
function getIds( $query ) {
    global $wpdb;
    
    $searchresults = $wpdb->get_results($query, ARRAY_A);
    if ( !empty ($searchresults) ) {
        foreach( $searchresults as $_post ) {
            $tmp[] = $_post['ID'];
        }
    }

    return $tmp;
}


global $wpdb;

//Check value when click search on tour

if(!empty($search_tour_query)) {
	if ($search_tour_minprice !=='0' || $search_tour_maxprice !=='0') 
	{
		$query = "SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
				WHERE p.ID = p1.post_id AND p1.meta_key='minprice_value' AND convert(p1.meta_value, signed) BETWEEN '$search_tour_minprice' AND '$search_tour_maxprice'";
	}		
	
	$spm = getIds( $query );
	//print_r($spm);
	$_ids = ( !empty($spm) ? ( !empty($_ids) ? array_intersect( $_ids, $spm) : $spm ) : "" );			
}	

if($search_tour_type !=='0')
{
	$query = "SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
			WHERE  p.ID = p1.post_id AND p1.meta_key ='tourtype_value' AND p1.meta_value ='$search_tour_type'";
			
	$tt = getIDs($query);
	//print_r($tt);
	$_ids = ( !empty($tt) ? ( !empty($_ids) ? array_intersect( $_ids, $tt) : "" ) : "" );
}

if($search_tour_destination_area !=='0')
{
	$query = "SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
			WHERE p.ID = p1.post_id AND p1.meta_key ='tourarea_value' AND p1.meta_value LIKE '%$search_tour_destination_area%'";
	$ta = getIDs($query);
	//print_r($ta);
	$_ids = ( !empty($ta) ? ( !empty($_ids) ? array_intersect( $_ids, $ta) : "" ) : "" );
}

if($search_tour_country !=='')
{
	$query = "SELECT p.* FROM $wpdb->posts p, $wpdb->postmeta p1
			WHERE p.ID = p1.post_id AND p1.meta_key ='tourcountry_value' AND p1.meta_value ='$search_tour_country'";
	$tc = getIDs($query);
	//print_r($tc);
	$_ids = ( !empty($tc) ? ( !empty($_ids) ? array_intersect( $_ids, $tc) : "" ) : "" );
}


if (!empty($_ids) && !$all_tour_listings) {
    $wpq = array ('post_type' => 'tours', 'meta_key' => $metakey, 'orderby' => $orderby, 'order' => $order, 'post__in' => $_ids, 'post_status' => 'publish', 'paged' => $paged, 'posts_per_page' => 5);
	
} elseif (empty($_ids) && !$all_tour_listings) {	
	
	// $_ids array is empty because search got no results
	// $_ids array will be empty if page is an "All Listings" page. Don't run this code if is All Listings because All Listings will show all listings. This code will display "no results found"
    $wpq = array ('post_type' =>'tours', 'meta_key' => $metakey, 'orderby' => $orderby, 'order' => $order, 'post__in' => array('0'),'post_status' => 'publish', 'paged' => $paged, 'posts_per_page' => 5);
} else {
	
	// This is an All Listings page, so show all results
	$wpq = array ('post_type' =>'tours', 'meta_key' => $metakey, 'orderby' => $orderby, 'order' => $order, 'post_status' => 'publish', 'paged' => $paged, 'posts_per_page' => 5);
}

//$tourlisting = new WP_Query($wpq);


?>

